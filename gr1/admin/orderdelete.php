<?php
include "class/order_class.php";

$order = new order;

if(!isset($_GET['order_id']) || $_GET['order_id'] == NULL){
    echo "<script>window.location = 'orderlist.php'</script>";
}else{
    $order_id = $_GET['order_id'];
}

if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $delete = $order->delete_order($order_id);

    echo "<script>window.location = 'orderlist.php'</script>";
}

echo "<script>
    if (confirm('Bạn chắc chắn muốn xóa không?')) {
        window.location.href = 'your_current_page.php?customer_id=$customer_id&confirm=yes';
    } else {
        window.location.href = 'orderlist.php'
    }
</script>";
?>
