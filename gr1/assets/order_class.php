<?php
require_once "database.php";
require_once "session.php";

Session::init();

$cart = Session::get('cart') ? Session::get('cart') : [];
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['name'];
    $customer_phone = $_POST['number'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $order_others = $_POST['others'];
    $gender = $_POST['gender'];
    $total_amount = 0;

    foreach ($cart as $item) {
        $total_amount += $item['product_price'] * $item['quantity'];
    }

    $order_date = date('Y-m-d H:i:s');

    // Bắt đầu transaction
    $db->link->begin_transaction();

    try {
        // // Lấy user_id của người dùng đã đăng nhập
        // $user_id = Session::get('user_id');


        // if ($user_id === false) {
        //     // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        //     header("Location: login.php");
        //     exit();
        // }

            // Cập nhật thông tin khách hàng trong bảng customers
        $query = "INSERT INTO tbl_customers (
        customer_name, 
        customer_phone, 
        customer_email, 
        customer_address, 
        gender) VALUE (
        ?, 
        ?,
        ?, 
        ?, 
        ?)";
        $stmt = $db->link->prepare($query);
        $stmt->bind_param('sssss', $customer_name, $customer_phone, $customer_email, $customer_address, $gender);
        $stmt->execute();
        
        $customer_id = $db->link->insert_id;


        // Thêm đơn hàng vào bảng orders
        $query = "INSERT INTO tbl_orders (
            order_date,
            total_amount, 
            customer_id, 
            order_others
            ) VALUES (
            ?, 
            ?, 
            ?, 
            ?)";
        $stmt = $db->link->prepare($query);
        $stmt->bind_param('sdis', $order_date, $total_amount, $customer_id, $order_others);
        $stmt->execute();

        $order_id = $db->link->insert_id;

        // Thêm chi tiết đơn hàng vào bảng order_product
        foreach ($cart as $item) {
            $product_id = $item['product_id'];
            $product_name = $item['product_name'];
            $quantity = $item['quantity'];
            $product_price = $item['product_price'];
            $query = "INSERT INTO tbl_order_product (order_id, product_id, product_name, quantity, product_price) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->link->prepare($query);
            $stmt->bind_param('iisid', $order_id, $product_id, $product_name, $quantity, $product_price);
            $stmt->execute();
        }

        // Hoàn tất transaction
        $db->link->commit();

        // Xóa giỏ hàng sau khi hoàn tất
        Session::set('cart', []);

        // Chuyển hướng đến trang thông báo thành công
        header("Location: success.php");
        exit();
    } catch (Exception $e) {
        // Nếu có lỗi, rollback transaction
        $db->link->rollback();

        // Chuyển hướng đến trang thông báo lỗi
        header("Location: error.php?message=" . urlencode("Đã xảy ra lỗi khi đặt hàng: " . $e->getMessage()));
        exit();
    }
}
