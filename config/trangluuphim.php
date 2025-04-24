<?php
session_start();
// Kết nối CSDL
$host = 'localhost';
$db = 'phim';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối CSDL: " . $e->getMessage());
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Lấy danh sách phim từ bảng `movies`
$sql = "SELECT * FROM movies";
$stmt = $pdo->query($sql);
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Thêm chức năng tìm kiếm nếu có từ khóa
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = '%' . trim($_GET['keyword']) . '%';
    $sql = "SELECT * FROM movies WHERE ten_phim LIKE :keyword OR the_loai LIKE :keyword";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phim</title>
    <link rel="stylesheet" href="CSS/trangluuphim.css">
</head>
<body>
<header>
<div class="header">
    <a href="index.php" style="text-decoration: none; color: inherit;">
    <div class="logo">LTNNMovie</div>
    </a>
        <form method="GET" class="search-container" style="display: flex; align-items: center;">
            <input type="text" name="keyword" class="search-input" placeholder="Tìm theo tên phim hoặc thể loại">
            <button type="submit" class="search-icon" style="background: none; border: none; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </form>
    <div class="user-actions">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="user-info" style="margin-right: 10px; color: white;">
                👋 Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            </div>
            <!-- ĐÃ ĐĂNG NHẬP: Hiện nút Đăng xuất -->
            <a href="logout.php" class="Btn">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Đăng xuất</div>
            </a>
        <?php else: ?>
            <!-- CHƯA ĐĂNG NHẬP: Hiện nút Đăng nhập -->
            <a href="login.php" class="Btn" style="background-color:rgb(0, 255, 60); color: white;">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Đăng nhập</div>
            </a>
        <?php endif; ?>
    </div>
</header>

<main>
    <div class="movie-details" style="display: none;" id="movie-details">
        <h1 id="movie-title"></h1>
        <p id="movie-description"></p>
        <img id="movie-image" src="" alt="Poster phim">
        <p id="movie-duration"></p>
        <p id="movie-category"></p>
        <p id="movie-country"></p>
        <a id="watch-now-button" href="viewscreen.php?movie_id=<?php echo htmlspecialchars($movie['id']); ?>" class="button">
            <span class="button_lg">
                <span class="button_sl"></span>
                <span class="button_text">Xem ngay</span>                       
            </span>
        </a>
    </div>

    <div class="movie-list" id="movie-list">
        <?php foreach ($movies as $movie): ?>
            <div class="movie-card" onclick="showDetails(<?php echo htmlspecialchars(json_encode($movie)); ?>)">
                <img src="<?php echo htmlspecialchars('../config/uploads/image/' . $movie['image_path']); ?>" 
                     alt="<?php echo htmlspecialchars($movie['ten_phim']); ?>">
                <h3><?php echo htmlspecialchars($movie['ten_phim']); ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
    function showDetails(movie) {
    document.getElementById('movie-title').innerText = movie.ten_phim;
    document.getElementById('movie-description').innerText = movie.mo_ta;
    document.getElementById('movie-image').src = "../config/uploads/image/" + movie.image_path;
    document.getElementById('movie-duration').innerText = 'Thời lượng: ' + movie.thoi_luong;
    document.getElementById('movie-category').innerText = 'Danh mục: ' + movie.danh_muc;
    document.getElementById('movie-country').innerText = 'Quốc gia: ' + movie.quoc_gia;

    // Thay đổi liên kết của nút "Xem ngay"
    document.getElementById('watch-now-button').href = "viewscreen.php?movie_id=" + movie.id;

    document.getElementById('movie-details').style.display = 'block';
  }  
</script>
</body>
</html>
