<?php
require_once "session.php";

Session::init();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $cart = Session::get('cart') ? Session::get('cart') : [];

    // Tìm và xóa sản phẩm khỏi giỏ hàng
    foreach ($cart as $key => $item) {
        if ($item['product_id'] == $product_id) {
            unset($cart[$key]);
            break;
        }
    }

    // Cập nhật lại session giỏ hàng
    Session::set('cart', $cart);

    // Chuyển hướng quay lại trang giỏ hàng
    header("Location: cart.php");
    exit();
} else {
    // Nếu không có product_id trong yêu cầu, chuyển hướng quay lại trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>
