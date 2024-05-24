<?php
include "class/items_class.php";
?>

<?php
    $items = new items;
    if(!isset($_GET['items_id']) || $_GET['items_id'] == NULL){
        echo "<script>window.location = 'itemslist.php'</script";
    }else{
        $items_id = $_GET['items_id'];
    }

    $delete_items = $items -> delete_items($items_id);

?>