<?php
session_start();

// Kiểm tra quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Chuyển hướng nếu không phải admin
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trang Quản Trị</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
.inputbox {
  position: relative;
  width: 196px;
}

.inputbox input {
  position: relative;
  width: 100%;
  padding: 20px 10px 10px;
  background: transparent;
  outline: none;
  box-shadow: none;
  border: none;
  color:rgb(0, 0, 0);
  font-size: 1em;
  letter-spacing: 0.05em;
  transition: 0.5s;
  z-index: 10;
}

.inputbox span {
  position: absolute;
  left: 0;
  padding: 20px 10px 10px;
  font-size: 1em;
  color:rgb(0, 0, 0);
  letter-spacing: 00.05em;
  transition: 0.5s;
  pointer-events: none;
}

.inputbox input:valid ~span,
.inputbox input:focus ~span {
  color:rgb(0, 0, 0);
  transform: translateX(-10px) translateY(-34px);
  font-size: 0,75em;
}

.inputbox i {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background:rgb(235, 214, 121);
  border-radius: 4px;
  transition: 0.5s;
  pointer-events: none;
  z-index: 9;
}

.inputbox input:valid ~i,
.inputbox input:focus ~i {
  height: 44px;
}
/* CSS cho tiêu đề */
h3 {
    color: #304156;
    font-family: Arial, sans-serif;
    font-size: 18px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

/* Container chính cho danh sách */
.userl {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Card cho mỗi người dùng */
.userc {
    background-color: #f9f9f9;
    border-radius: 6px;
    padding: 15px;
    width: calc(33.33% - 15px);
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* Hiệu ứng hover cho card */
.userc:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

/* Định dạng text đậm trong card */
.userc strong {
    color: #555;
    display: inline-block;
    width: 60px;
    font-weight: 600;
}

/* Màu xen kẽ cho các card */
.userc:nth-child(odd) {
    background-color: #f0f7ff;
}

.userc:nth-child(even) {
    background-color: #fff;
    border: 1px solid #eee;
}

/* Định dạng thông báo khi không có tài khoản */
p {
    color: #777;
    font-style: italic;
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    width: 80%;
    margin: 20px auto;
}

/* CSS cho nút tìm kiếm */
.search-btn {
    padding: 10px 15px;
    background-color:rgb(235, 214, 121);
    color: #304156;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    margin-left: 10px;
    transition: background-color 0.3s;
}

.search-btn:hover {
    background-color:rgb(51, 255, 0);
}

/* CSS cho nút hiển thị tất cả */
.show-all-btn {
    padding: 10px 15px;
    background-color: #6c757d;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    margin-left: 10px;
    transition: background-color 0.3s;
}

.show-all-btn:hover {
    background-color: #5a6268;
}

/* CSS cho form tìm kiếm */
.search-form {
    display: flex;
    align-items: flex-end;
    margin-bottom: 20px;
}

/* Đáp ứng cho màn hình nhỏ hơn */
@media (max-width: 768px) {
    .userc {
        width: calc(50% - 15px);
    }
}

@media (max-width: 480px) {
    .userc {
        width: 100%;
    }
}
</style>
</head>
<body>
  <div class="container">
    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
      <div class="profile">
        <img src="avatar.jpg" alt="User Avatar" />
        <p>Admin</p>
      </div>
      <nav>
        <ul>
          <li><a href="admin.php"><i class="fas fa-home"></i> Bảng điều khiển</a></li>
          <li class="treeview">
            <a href="#"><i class="fa-solid fa-user"></i> <span>Quản Lý Tài Khoản</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="user.php"><i class="fa fa-angle-right pull-right"></i> Tài Khoản Khách</a></li>
              <li><a href="adminshow.php"><i class="fa fa-angle-right pull-right"></i> Tài Khoản Admin</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa-solid fa-film"></i><span>Phim</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="../config/themphim.php"><i class="fa fa-angle-right pull-right"></i> Thêm Phim</a></li>
              <li><a href="../config/danhsachphim.php"><i class="fa fa-angle-right pull-right"></i> Danh Sách Phim</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <div class="top-icons">
        <div class="left-icons">
          <div class="circle orange" id="toggleSidebar">
            <i class="fas fa-bars"></i>
          </div>
          <a href="index.php">
          <div class="circle teal">
            <i class="fas fa-home"></i>
          </div>
        </a>
          <div class="circle green">
            <i class="fas fa-comments"></i>
          </div>
        </div>
        <div class="welcome-text">
          Chào mừng trở lại
        </div>
      </div>
      <br>
<!-- Form tìm kiếm tài khoản -->
<form method="GET" action="" class="search-form">
    <div class="inputbox">
        <input type="text" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <span>Nhập tài khoản </span>
    </div>
    <button type="submit" class="search-btn">
        <i class="fas fa-search"></i> Tìm kiếm
    </button>
    <a href="user.php" class="show-all-btn">
        <i class="fas fa-users"></i> Hiển thị tất cả
    </a>
</form>

<?php
include 'database.php';

// Xử lý tìm kiếm
$search = isset($_GET['search']) ? $_GET['search'] : '';
$whereClause = "role = 'user'";

if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $whereClause .= " AND username LIKE '%$search%'";
}

$sql = "SELECT * FROM users WHERE $whereClause";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Danh sách tài khoản:</h3>";
    echo "<div class='userl'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='userc'>";
        echo "<strong>Tên:</strong> " . $row["username"] . "<br>";
        echo "<strong>Email:</strong> " . $row["email"] . "<br>";
        echo "</div>";
    }
    echo "</div>";
} else {
    if (!empty($search)) {
        echo "<p>Không tìm thấy tài khoản nào với tên '$search'.</p>";
    } else {
        echo "<p>Không có tài khoản nào.</p>";
    }
}
$conn->close();
?>

    </main>
  </div>
</body>
<script>
        document.addEventListener("DOMContentLoaded", function () {
        // Toggle sidebar khi nhấn vào dấu 3 gạch
        const toggleButton = document.getElementById("toggleSidebar");
        const sidebar = document.querySelector(".sidebar");
        const mainContent = document.querySelector(".main-content");

        if (toggleButton) {
            toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("expanded");
            });
        }

        // Toggle submenu mượt
        const treeviews = document.querySelectorAll(".treeview > a");

        treeviews.forEach(menu => {
            menu.addEventListener("click", function (e) {
            e.preventDefault();

            const parent = this.parentElement;
            const submenu = parent.querySelector(".treeview-menu");
            const isOpen = parent.classList.contains("open");

            // Đóng tất cả các treeview khác
            document.querySelectorAll(".treeview").forEach(item => {
                item.classList.remove("open");
                const sub = item.querySelector(".treeview-menu");
                if (sub) sub.style.maxHeight = null;
            });

            // Nếu chưa mở thì mở
            if (!isOpen) {
                parent.classList.add("open");
                if (submenu) {
                submenu.style.maxHeight = submenu.scrollHeight + "px";
                }
            }
            });
        });
        });
    </script>
</html>