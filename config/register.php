<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>register</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin="anonymous"></script>  
        <link rel="stylesheet" href="CSS/login.css">
    </head>
<body>
    <div class="background">
        <header class="header">
            <nav class="nav">
                <a href="index.php">Trang chủ</a>
                <a href="about.php">Về chúng tôi</a>
                <a href="#">Chăm sóc khách hàng</a>
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
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
        </section>
        <div class="login">
            <h2>Đăng ký</h2>
            <div class="input">
                <input type="text" class="input1" placeholder="Tên tài khoản" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input">
                <input type="text" class="input1" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <input type="password" class="input1" placeholder="Mật khẩu" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input">
                <input type="password" class="input1" placeholder="Xác nhận mật khẩu" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="check">
                <label><input type="checkbox"> Tôi đồng ý với điều khoản sử dụng</label>
            </div>
            <div class="button">
                <button class="btn">Đăng ký</button>
            </div>
            <div class="sign-up">
                <p>Đã có tài khoản?</p>
                <a href="login.php">Đăng nhập</a>
            </div>
        </div>
    </div>
</body>
</html>