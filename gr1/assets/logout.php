<?php
require_once "session.php";

Session::init();

// Xóa các biến session và đăng xuất
Session::destroy();
header("Location: home.php");
exit();
?>
