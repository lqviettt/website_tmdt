<?php
include "session.php";  // Include session management

Session::init();
$cart = Session::get('cart') ? Session::get('cart') : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Xóa sản phẩm khỏi giỏ hàng
    foreach ($cart as $key => $item) {
        if ($item['product_id'] == $productId) {
            unset($cart[$key]);
            break;
        }
    }

    // Lưu lại giỏ hàng đã cập nhật vào phiên làm việc
    Session::set('cart', array_values($cart));  // Sử dụng array_values để làm lại các key của mảng

    // Tính lại tổng tiền
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['product_price'] * $item['quantity'];
    }

    // Trả về phản hồi JSON với thông tin tổng tiền đã được cập nhật
    echo json_encode(['success' => true, 'total' => $total]);
    exit;
}

// Nếu không phải là request POST, trả về phản hồi JSON với thông báo lỗi
echo json_encode(['success' => false]);
?>