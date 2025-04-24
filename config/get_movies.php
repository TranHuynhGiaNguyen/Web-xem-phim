<?php
// Kết nối tới CSDL
$conn = new mysqli("localhost", "username", "password", "database_name");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy xuất dữ liệu phim từ bảng "movies"
$sql = "SELECT id, title, description, image_url FROM movies";
$result = $conn->query($sql);

$movies = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

// Trả về danh sách phim dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($movies);

$conn->close();
?>
