<?php
include "class/customers_class.php";

$customers = new customers;

if(!isset($_GET['customer_id']) || $_GET['customer_id'] == NULL){
    echo "<script>window.location = 'customerlist.php'</script>";
}else{
    $customer_id = $_GET['customer_id'];
}

if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $delete = $customers->delete_customer($customer_id);

    echo "<script>window.location = 'customerlist.php'</script>";
}

echo "<script>
    if (confirm('Bạn chắc chắn muốn xóa không?')) {
        window.location.href = 'your_current_page.php?customer_id=$customer_id&confirm=yes';
    } else {
        window.location.href = 'customerlist.php'
    }
</script>";
?>
