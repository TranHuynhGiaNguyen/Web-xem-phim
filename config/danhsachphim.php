<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kết nối CSDL
include '../config/database.php';

// Xử lý tìm kiếm
$search = $_GET['search'] ?? '';
$search_condition = '';
if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $search_condition = " WHERE ten_phim LIKE '%$search_safe%'";
}

$sql = "SELECT * FROM movies" . $search_condition;
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trang Quản Trị</title>
  <link rel="stylesheet" href="CSS/style.css?v=1.0.1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
            
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
              <li><a href="themphim.php"><i class="fa fa-angle-right pull-right"></i> Thêm Phim</a></li>
              <li><a href="danhsachphim.php"><i class="fa fa-angle-right pull-right"></i> Danh Sách Phim</a></li>
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
      <hr class="section-divider" />
        <div class="header-with-search">
          <h2 class="page-title">Danh Sách Phim</h2>
          <form method="GET" action="" class="search-form">
          <div class="search-input-wrapper">
            <input
              type="text"
              name="search"
              value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
              placeholder="Tìm kiếm..."
              class="search-input"
            >
            <i class="fa fa-search search-icon"></i>
          </div>
          </form>
        </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Tên Phim</th>
              <th>Tập Phim</th>
              <th>Số Tập</th>
              <th>Thời Lượng</th>
              <th>Hình Ảnh</th>
              <th>Mô Tả</th>
              <th>Định Dạng</th>
              <th>Danh Mục</th>
              <th>Thể Loại</th>
              <th>Quốc Gia</th>
              <th>Ngày Tạo</th>
              <th>Quản Lý</th>
            </tr>
          </thead>
          <tbody>
                <?php
                $i = 1;
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['ten_phim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tapphim'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['so_tap']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['thoi_luong']) . "</td>";
                    echo "<td><img src='../config/uploads/image/" . htmlspecialchars($row['image_path']) . "' width='100'></td>";
                    echo "<td>" . htmlspecialchars($row['mo_ta']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dinh_dang']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['danh_muc']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['the_loai']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quoc_gia']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ngay_tao']) . "</td>";
                    echo "<td>
                      <button class='edit' onclick=\"window.location.href='sua_phim.php?id={$row['id']}'\">
                        <i class='fas fa-pen'></i> Sửa
                      </button>
                      <button class='delete' data-id='" . $row['id'] . "'>
                          <i class='fas fa-trash'></i> Xóa
                      </button>
                    </td>";
                    echo "</tr>";
                }
                } else {
                echo "<tr><td colspan='12'>Không có phim nào.</td></tr>";
                }
                ?>
            <div id="confirmDeleteModal" class="modal-overlay" style="display: none;">
              <div class="modal-box">
                <p>Bạn có chắc chắn muốn xóa phim này không?</p>
                <div class="modal-buttons">
                  <button id="confirmYes" class="btn-confirm"><i class="fas fa-check"></i> Có</button>
                  <button id="confirmNo" class="btn-cancel"><i class="fas fa-times"></i> Không</button>
                </div>
              </div>
            </div>
          </tbody>    
        </table>
      </div>    
    </main>      
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        let deleteButtons = document.querySelectorAll("button.delete[data-id]");
        let modal = document.getElementById("confirmDeleteModal");
        let confirmYes = document.getElementById("confirmYes");
        let confirmNo = document.getElementById("confirmNo");
        let deleteUrl = "";

        deleteButtons.forEach(btn => {
          btn.addEventListener("click", function () {
            // Lấy ID của phim
            deleteUrl = 'xoa_phim.php?id=' + this.getAttribute("data-id");
            
            // Hiển thị modal xác nhận
            modal.style.display = "flex";
          });
        });

        // Nếu bấm "Có" trong modal, chuyển hướng đến URL xóa
        confirmYes.addEventListener("click", function () {
          window.location.href = deleteUrl;
        });

        // Nếu bấm "Không", ẩn modal
        confirmNo.addEventListener("click", function () {
          modal.style.display = "none";
        });
      });
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
</body>
</html>
