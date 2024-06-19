<?php
include "menu.php";
include "slider_Fe.php";
include "class/product_class.php";
?>

<?php
    $product = new product;
    $items_id = isset($_GET['items_id']) ? $_GET['items_id'] : null;
    $sort_option = isset($_GET['sort']) ? $_GET['sort'] : '';

    $show_items = $product -> show_by_items($items_id);
    $show_product = $product->show_product_by_items($items_id, $sort_option);
?>

<div class="category-right row">
    <div class="category-right-top_item">
        <?php
            if($show_items){
                while($name = $show_items->fetch_assoc()){
                    echo '<p>'."Danh mục ". $name["items_name"] . '</p>';
                }
            }
        ?>
    </div>
    <!-- <div class="category-right-top_item">
        <button><span>Bộ lọc</span><i class="fa-solid fa-sort-down icon-down"></i></button>
    </div> -->
    <div class="category-right-top_item">
        <form method="GET" id="sort-form">
            <input type="hidden" name="items_id" value="<?php echo htmlspecialchars($items_id); ?>">
            <select name="sort" id="sort" onchange="document.getElementById('sort-form').submit();">
                <option value="">Sắp xếp</option>
                <option value="price_asc" <?php echo $sort_option == 'price_asc' ? 'selected' : ''; ?>>Giá thấp đến cao</option>
                <option value="price_desc" <?php echo $sort_option == 'price_desc' ? 'selected' : ''; ?>>Giá cao đến thấp</option>
            </select>
        </form>
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