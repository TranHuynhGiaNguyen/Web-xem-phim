<?php
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $ten_phim = $_POST['ten_phim'] ?? '';
    $so_tap = $_POST['so_tap'] ?? '';
    $thoi_luong = $_POST['thoi_luong'] ?? '';
    $duong_dan = $_POST['duong_dan'] ?? '';
    $mo_ta = $_POST['mo_ta'] ?? '';
    $dinh_dang = $_POST['dinh_dang'] ?? '';
    $danh_muc = $_POST['danh_muc'] ?? '';
    $quoc_gia = $_POST['quoc_gia'] ?? '';
    $the_loai = isset($_POST['the_loai']) ? implode(', ', $_POST['the_loai']) : '';

    // Xử lý video
    $video_path = '';
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video_name = time() . '_' . basename($_FILES['video']['name']); // Đổi tên file video để đảm bảo duy nhất
        $target_video_dir = "../config/uploads/movies/"; // Thư mục lưu video
        move_uploaded_file($_FILES['video']['tmp_name'], $target_video_dir . $video_name);
        $video_path = $video_name; // Chỉ lưu tên file vào CSDL
}

    // Xử lý ảnh
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_image_dir = "../config/uploads/image/";
        move_uploaded_file($_FILES['image']['tmp_name'], $target_image_dir . $image_name);
        $image_path = $image_name; // <-- Chỉ lưu tên file vào CSDL
    }

    // Thêm vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO movies (ten_phim, so_tap, thoi_luong, duong_dan, mo_ta, dinh_dang, danh_muc, quoc_gia, the_loai, video_path, image_path) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssss", $ten_phim, $so_tap, $thoi_luong, $duong_dan, $mo_ta, $dinh_dang, $danh_muc, $quoc_gia, $the_loai, $video_path, $image_path);
    if ($stmt->execute()) {
        ?>
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <title>Thêm phim thành công</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </head>
        <body>
            <h2 style="color: green;">✅ Thêm phim thành công!</h2>
            <p>Trang sẽ quay lại form thêm phim sau <span id="countdown">3</span> giây...</p>

            <script>
                $(document).ready(function() {
                    let seconds = 3;
                    let countdown = setInterval(function() {
                        seconds--;
                        $('#countdown').text(seconds);
                        if (seconds <= 0) {
                            clearInterval(countdown);
                            window.location.href = '../config/themphim.php'; // Đường dẫn trang thêm phim
                        }
                    }, 1000);
                });
            </script>
        </body>
        </html>
        <?php
        exit(); // dừng xử lý sau khi hiển thị HTML
    } else {
        echo "❌ Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
