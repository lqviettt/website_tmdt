<?php
if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
    echo "<h2>$message</h2>";
} else {
    echo "<h2>Đã xảy ra lỗi không xác định!</h2>";
}
echo "<a href='home.php'>Quay lại trang chủ</a>";
?>
