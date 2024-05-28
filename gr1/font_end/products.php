<?php
include "menu.php";
include "slider_Fe.php";
include "class/product_class.php";
?>

<?php
$product = new product;
if (isset($_GET['items_id'])) {
    $items_id = $_GET['items_id'];
}
$show_product = $product->show_product_by_items($items_id);
?>

<div class="category-right row">
    <div class="category-right-top_item">
        <p>Danh Mục Trà Hoa Quả</p>
    </div>
    <div class="category-right-top_item">
        <button><span>Bộ lọc</span><i class="fa-solid fa-sort-down icon-down"></i></button>
    </div>
    <div class="category-right-top_item">
        <select name="" id="">
            <option value="">Sắp xếp</option>
            <option value="">Giá cao đến thấp</option>
            <option value="">Giá thấp đến cao</option>
        </select>
    </div>
    <div class="category-right-sp row">
        <?php
        if ($show_product) {
            while ($result = $show_product->fetch_assoc()) {
                echo '<div class="category-right-sp-item">';
                echo '<a href="product_detail.php?id=' . $result["product_id"] . '">';
                echo '<img src="' . $result["product_img"] . '" width="200px" height="200px" alt="">';
                echo '<h1>' . $result["product_name"] . '</h1>';
                echo '<p>' . $result["product_price"] . '₫</p>';
                echo '</a>';
                echo '</div>';
        ?>
        <?php
            }
        }
        ?>
    </div>
</div>
</div>
</div>
</section>

<?php
include "footer.php";
?>
