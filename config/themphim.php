<?php
session_start();
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
        <header>
          <h2>Thêm Phim</h2>
        </header>

        <form action="../config/upload_movie.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
            <td>Tên Phim <br>
                <input type="text" name="ten_phim" placeholder="Nhập tên Phim">
            </td>
            </tr>
            <tr>
            <td>Số Tập Phim <br>
                <input type="text" name="so_tap" placeholder="Nhập Số Tập Phim">
            </td>
            </tr>
            <tr>
            <td>Thời Lượng Phim <br>
                <input type="text" name="thoi_luong" placeholder="Nhập Thời Lượng Phim">
            </td>
            </tr>
            <tr>
            <td>Đường Dẫn <br>
                <input type="text" name="duong_dan" placeholder="Nhập đường dẫn">
            </td>
            </tr>
            <tr>
            <td>Mô Tả Phim<br>
                <textarea name="mo_ta" placeholder="Mô Tả Phim"></textarea>
            </td>
            </tr>
            <tr>
            <td>Định Dạng<br>
                <select name="dinh_dang">
                <option value="1440p60 HD">1440p60 HD</option>
                <option value="1080p60 HD">1080p60 HD</option>
                <option value="720p">720p</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>Thuộc Phim<br>
                <select name="danh_muc">
                <option value="Phim Bộ">Phim Bộ</option>
                <option value="Phim Lẻ">Phim Lẻ</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>Quốc Gia<br>
                <select name="quoc_gia">
                <option value="Việt Nam">Việt Nam</option>
                <option value="Mỹ">Mỹ</option>
                <option value="Hàn Quốc">Hàn Quốc</option>
                <option value="Trung Quốc">Trung Quốc</option>
                <option value="Anh">Anh</option>
                <option value="Đài Loan">Đài Loan</option>
                <option value="Ấn Độ">Ấn Độ</option>
                <option value="Nhật Bản">Nhật Bản</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>Thể Loại <br>
                <div class="checkbox-group">
                <input type="checkbox" name="the_loai[]" value="Hành động"> Hành Động
                <input type="checkbox" name="the_loai[]" value="Lãng Mạn"> Lãng Mạn
                <input type="checkbox" name="the_loai[]" value="Hài Hước"> Hài Hước
                <input type="checkbox" name="the_loai[]" value="Khoa Học Viễn Tưởng"> Khoa Học Viễn Tưởng
                <input type="checkbox" name="the_loai[]" value="Kinh Dị"> Kinh Dị
                <input type="checkbox" name="the_loai[]" value="Hình Sự"> Hình Sự
                <input type="checkbox" name="the_loai[]" value="Phim Thuyết Minh"> Phim Thuyết Minh
                <input type="checkbox" name="the_loai[]" value="Phim Truyền Hình"> Phim Truyền Hình
                <input type="checkbox" name="the_loai[]" value="Cổ Trang"> Cổ Trang
                <input type="checkbox" name="the_loai[]" value="Gia Đình"> Gia Đình
                <input type="checkbox" name="the_loai[]" value="Anime"> Anime
                <input type="checkbox" name="the_loai[]" value="Vietsub"> Vietsub
                <input type="checkbox" name="the_loai[]" value="Hoạt Hình"> Hoạt Hình
                </div>
            </td>
            </tr>
            <tr>
            <td>Tải Phim<br>
                <input type="file" name="video" />
            </td>
            </tr>
            <tr>
            <td>Hình<br>
                <input type="file" name="image" />
            </td>
            </tr>
            <tr>
            <td>
                <button type="submit" class="green">Thêm Phim</button>
            </td>
            </tr>
        </table>
        </form>
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
