<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quản lý nhân viên</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
              <li><a href="#"><i class="fa fa-angle-right pull-right"></i> Tài Khoản Khách</a></li>
              <li><a href="#"><i class="fa fa-angle-right pull-right"></i> Tài Khoản Admin</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa-solid fa-headset"></i> <span>CSKH</span> <i class="fa fa-angle-left pull-right"></i></a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa-solid fa-film"></i><span>Phim</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-angle-right pull-right"></i> Thêm Phim</a></li>
              <li><a href="#"><i class="fa fa-angle-right pull-right"></i> Xóa Phim</a></li>
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
          <div class="circle teal">
            <i class="fas fa-bell"></i>
          </div>
          <div class="circle green">
            <i class="fas fa-comments"></i>
          </div>
        </div>
        <div class="welcome-text">
          Chào mừng trở lại
        </div>
      </div>
      <hr class="section-divider" />
      <div>
        <h2>Tổng Quan</h2>
      </div>
      <div class="stats-container">
        <div class="card">
          <div class="icon purple"><i class="fas fa-dollar-sign"></i></div>
          <div class="info">
            <h3>859.000 VNĐ</h3>
            <p>Tổng Doanh Thu</p>
          </div>
        </div>
        <div class="card">
          <div class="icon green"><i class="fas fa-users"></i></div>
          <div class="info">
            <h3>1450</h3>
            <p>Total Users</p>
          </div>
        </div>
      </div>
      <div class="charts-container">
        <div class="chart-box">
          <h3>Biểu đồ tròn</h3>
          <canvas id="pieChart"></canvas>
        </div>
        <div class="chart-box">
          <h3>Biểu đồ doanh thu</h3>
          <canvas id="lineChart"></canvas>
        </div>
      </div>
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

  // Biểu đồ tròn
  const pieCtx = document.getElementById("pieChart");
  if (pieCtx) {
    new Chart(pieCtx, {
      type: "doughnut",
      data: {
        labels: ["Đăng Ký 1 Tháng", "Đăng Ký 2 Tháng", "Đăng Ký 3 Tháng"],
        datasets: [{
          label: "Tỉ lệ doanh thu",
          data: [40, 30, 30],
          backgroundColor: ["#3498db", "#2ecc71", "#f1c40f"],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom"
          }
        }
      }
    });
  }

  // Biểu đồ đường
  const lineCtx = document.getElementById("lineChart");
  if (lineCtx) {
    new Chart(lineCtx, {
      type: "line",
      data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5"],
        datasets: [{
          label: "Doanh thu theo tháng",
          data: [120, 190, 300, 250, 400],
          borderColor: "#e74c3c",
          backgroundColor: "rgba(231, 76, 60, 0.2)",
          tension: 0.4,
          fill: true,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
});
</script>
</html>
