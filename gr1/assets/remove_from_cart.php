

<?php
include "session.php";  // Bao gồm quản lý phiên làm việc

    Session::init();
    $cart = Session::get('cart') ? Session::get('cart') : [];

    // Kiểm tra nếu product_id đã được thiết lập
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Kiểm tra nếu giỏ hàng tồn tại trong session
        if (isset($_SESSION['cart'])) {
            // Duyệt qua giỏ hàng và xóa mặt hàng có product_id tương ứng
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['product_id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    // Tùy chọn: sắp xếp lại mảng
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
            }
        }
    }

    // Chuyển hướng về trang giỏ hàng (hoặc bất kỳ trang nào khác)
    header("Location: cart.php");
    exit;
?>