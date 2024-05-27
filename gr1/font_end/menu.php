<?php
include "header_top.php";
include "class/category_class.php";

$category = new Category();
$categories = $category->show_category();
?>

<div class="h_menu">
    <?php
    if ($categories) {
        while ($show_cate = $categories->fetch_assoc()) {
            echo '<li><a href="main.php?category_id=' . $show_cate['category_id'].'"> ' . $show_cate['category_name'] . '</a>';
            $items = $category->show_items_by_category($show_cate['category_id']);
            if ($items && $show_cate['category_name'] == 'SẢN PHẨM') {
                echo '<div class="list-box"><ul>';
                while ($item_row = $items->fetch_assoc()) {
                    echo '<li class="list-box-item"><a href="products.php?category_id=' . $show_cate['category_id']
                        . '&items_id=' . $item_row['items_id'] . '">' . $item_row['items_name'] . '</a></li>';
                }
                echo '</ul></div>';
            }
            echo '</li>';
        }
    }
    ?>
</div>
</header>