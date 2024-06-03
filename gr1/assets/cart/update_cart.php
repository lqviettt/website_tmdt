<?php
include "session.php";  // Include session management

Session::init();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
    $cart = Session::get('cart') ? Session::get('cart') : [];

    foreach ($_POST['quantity'] as $key => $quantity) {
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = intval($quantity);
        }
    }

    Session::set('cart', $cart);
    header("Location: cart.php");
    exit();
}
?>
