<?php
session_start();
include '../config/database.php';

// Lấy thông tin phim dựa theo ID trên URL
if (!isset($_GET['movie_id'])) {
    echo "Lỗi: Không tìm thấy ID phim.";
    exit;
}

$movie_id = $_GET['movie_id'];
$sql_movie = "SELECT * FROM movies WHERE id = '$movie_id'";
$result_movie = mysqli_query($conn, $sql_movie);
$movie = mysqli_fetch_assoc($result_movie);

// Xử lý gửi bình luận
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Ẩn danh';
    $comment = mysqli_real_escape_string($conn, $_POST['comment_text']);

    $sql_insert = "INSERT INTO comments (movie_id, username, content) VALUES ('$movie_id', '$username', '$comment')";
    mysqli_query($conn, $sql_insert);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTNNMovie</title>
    <link rel="stylesheet" href="CSS/viewscreen.css">
</head>
<body>
<header>
    <!-- Header -->
    <div class="header">
    <a href="index.php" style="text-decoration: none; color: inherit;">
    <div class="logo">LTNNMovie</div>
        <div class="user-actions">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div style="color: white;">
                👋 Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            </div>
            <a href="logout.php" class="Btn">
                <div class="sign">
                <svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9
                    c-18.7 0-33.9-15.2-33.9-33.9v-62.1h-128c-17.7 0-32-14.3-32-32v-64c0-17.7 14.3-32 32-32h128V139.8
                    c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96H96c-17.7 0-32 14.3-32 32v256c0 17.7 14.3 32 32 32h64
                    c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-53 0-96-43-96-96V128C0 75 43 32 96 32h64c17.7 0 32 14.3 32 32
                    s-14.3 32-32 32z"></path>
                </svg>
                </div>
                <div class="text">Đăng xuất</div>
            </a>
            <?php endif; ?>
        </div>
    </div>

        </header>    
    
    <!-- Main Content -->
    <div class="container">
        <!-- Main Video Section -->
        <div class="main-video">
            <video controls width="100%">
                <source src="../config/uploads/movies/<?php echo htmlspecialchars($movie['video_path']); ?>" type="video/mp4">
                Trình duyệt của bạn không hỗ trợ video.
            </video>
            <div class="video-info">
                <h1><?php echo htmlspecialchars($movie['ten_phim']); ?></h1>
            </div>

            <!-- Video Actions -->
            <div class="video-actions">
                <!-- Like Button -->
                <div class="action-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                    </svg>
                </div>
            </div>
            <div class="comment-section">
                <h2>Bình luận</h2>
                <form method="post" action="">
                    <textarea name="comment_text" placeholder="Viết bình luận..." required></textarea>
                    <button type="submit" name="submit_comment">Gửi</button>
                </form>

                <div class="comment-list">
                    <?php
                    $sql_comments = "SELECT * FROM comments WHERE movie_id = '$movie_id' ORDER BY created_at DESC";
                    $result_comments = mysqli_query($conn, $sql_comments);

                    while ($row = mysqli_fetch_assoc($result_comments)) {
                        echo '<div class="comment">';
                        echo '<strong>' . htmlspecialchars($row['username']) . '</strong>: ';
                        echo '<span>' . htmlspecialchars($row['content']) . '</span>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div> 
</body>
</html> 