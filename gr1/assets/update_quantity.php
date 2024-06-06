<?php
include "session.php";  // Include session management
Session::init();

$cart = Session::get('cart') ? Session::get('cart') : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];
    
    foreach ($cart as &$item) {
        if ($item['product_id'] == $productId) {
            $item['quantity'] = $newQuantity;
            break;
        }
    }
    Session::set('cart', $cart);

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['product_price'] * $item['quantity'];
    }
    
    echo json_encode(['success' => true, 'total' => $total]);
    exit;
}
echo json_encode(['success' => false]);
?>
