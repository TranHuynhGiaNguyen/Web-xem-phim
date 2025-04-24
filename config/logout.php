<?php
session_start();        // Bắt đầu session
session_unset();        // Xoá tất cả các biến session
session_destroy();      // Huỷ phiên đăng nhập

// Xóa cookie nếu có (nếu bạn có sử dụng cookie lưu đăng nhập)
if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 3600, '/');
}
// Chuyển về trang chủ hoặc đăng nhập
header("Location: login.php");
exit;
