<?php
include "session.php";  // Bao gồm quản lý phiên làm việc
?>

<?php
    Session::init();
    $cart = Session::get('cart') ? Session::get('cart') : [];

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Kiểm tra nếu giỏ hàng tồn tại trong session
        if (isset($_SESSION['cart'])) {
            // Duyệt qua giỏ hàng và xóa mặt hàng có product_id tương ứng
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['product_id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
            }
        }
    }

    header("Location: cart.php");
    exit;
?>