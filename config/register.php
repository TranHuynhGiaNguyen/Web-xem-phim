<?php
include 'database.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $raw_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($raw_password !== $confirm_password) {
        $error = 'Mật khẩu không khớp';
    } else {
        $password = password_hash($raw_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $success = 'Đăng ký thành công!';
            // Chuyển hướng sau 2 giây
            header("refresh:2;url=login.php");
        } else {
            $error = 'Lỗi: Tên tài khoản đã tồn tại hoặc có lỗi hệ thống';
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>register</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin="anonymous"></script>  
        <link rel="stylesheet" href="CSS/login.css">
        <style>
            .message-error {
                color: red;
                background-color: rgba(255, 0, 0, 0.1);
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 15px;
                display: none;
            }
            
            .message-success {
                color: green;
                background-color: rgba(0, 128, 0, 0.1);
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 15px;
                display: none;
            }
            
            .message-error.show, .message-success.show {
                display: block;
            }
        </style>
    </head>
<body>
    <div class="background">
        <header class="header">
            <nav class="nav">
                <a href="index.php">Trang chủ</a>
                <a href="about.php">Về chúng tôi</a>
            </nav>
        </header>
        <section class="home"> 
            <div class="content">
                <a href="./index.php" class="logo">LTNN Movie</a>
                <h2>Chào mừng!</h2>
                <pre>Liên hệ với chúng tôi qua các nền tảng xã hội sau</pre>
                <div class="icon">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
        </section>
        <form class="login" method="POST" action="">
            <h2>Đăng ký</h2>
            
            <!-- Thông báo lỗi -->
            <div class="message-error <?php echo !empty($error) ? 'show' : ''; ?>">
                <?php echo htmlspecialchars($error); ?>
            </div>
            
            <!-- Thông báo thành công -->
            <div class="message-success <?php echo !empty($success) ? 'show' : ''; ?>">
                <?php echo htmlspecialchars($success); ?>
            </div>
            
            <div class="input">
                <input type="text" class="input1" name="username" placeholder="Tên tài khoản" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input">
                <input type="email" class="input1" name="email" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <input type="password" class="input1" name="password" placeholder="Mật khẩu" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input">
                <input type="password" class="input1" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="check">
                <label><input type="checkbox" required> Tôi đồng ý với điều khoản sử dụng</label>
            </div>
            <div class="button">
                <button class="btn" type="submit">Đăng ký</button>
            </div>
            <div class="sign-up">
                <p>Đã có tài khoản?</p>
                <a href="login.php">Đăng nhập</a>
            </div>
        </form>
    </div>
</body>
</html>