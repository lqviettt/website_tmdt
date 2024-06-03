<?php
include "session.php";  // Include session management

Session::init();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $cart = Session::get('cart');
    if (isset($cart[$product_id])) {
        unset($cart[$product_id]);
        Session::set('cart', $cart);
    }
}

header("Location: cart.php");
exit();
?>
