<?php
session_start();
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa phim khỏi cơ sở dữ liệu
    $sql = "DELETE FROM movies WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            // Chuyển hướng về trang danh sách phim sau khi xóa thành công
            header("Location: danhsachphim.php");
            exit();
        } else {
            echo "Lỗi khi xóa phim.";
        }
    } else {
        echo "Lỗi chuẩn bị câu lệnh SQL.";
    }
}
?>
