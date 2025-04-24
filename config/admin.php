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
          <li><a href="#"><i class="fas fa-home"></i> Bảng điều khiển</a></li>
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
        <a href="#">
          <div class="circle orange" id="toggleSidebar">
            <i class="fas fa-bars"></i>
          </div>
        </a>
        <a href="index.php">
          <div class="circle teal">
            <i class="fas fa-home"></i>
          </div>
        </a>
      </div>
    </div>
        <div class="welcome-text">
          Chào mừng!
        </div>
      </div>
      <hr class="section-divider" />

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
