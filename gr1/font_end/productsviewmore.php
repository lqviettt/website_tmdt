<?php
include "menu.php";
include "slider_Fe.php";
include "class/product_class.php";

$product = new product;
if (isset($_GET['items_id'])) {
    $items_id = $_GET['items_id'];
}
$show_product = $product->show_product_by_items($items_id);

$products = [];
if ($show_product) {
    while ($result = $show_product->fetch_assoc()) {
        $products[] = $result;
    }
}
?>

<div class="category-right row">
    <div class="category-right-top_item">
        <p>Danh Mục Sản Phẩm</p>
    </div>
    <!-- <div class="category-right-top_item">
        <button><span>Bộ lọc</span><i class="fa-solid fa-sort-down icon-down"></i></button>
    </div> -->
    <div class="category-right-top_item">
        <select name="" id="">
            <option value="">Sắp xếp</option>
            <option value="">Giá cao đến thấp</option>
            <option value="">Giá thấp đến cao</option>
        </select>
    </div>
    <div class="category-right-sp row" id="product-list">
        <?php
        $max_products = min(8, count($products));
        for ($i = 0; $i < $max_products; $i++) {
            echo '<div class="category-right-sp-item">';
            echo '<a href="product_detail.php?id=' . $products[$i]["product_id"] . '">';
            echo '<img src="' . $products[$i]["product_img"] . '" width="200px" height="200px" alt="">';
            echo '<h1>' . $products[$i]["product_name"] . '</h1>';
            echo '<p>' . $products[$i]["product_price"] . '₫</p>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
    <?php if (count($products) > 8) { ?>
        <div class="category-right-bottom_item">
            <button id="view-more-button">Xem thêm</button>
        </div>
    <?php } ?>
</div>
</div>
</div>
</section>

<?php
include "footer.php";
?>

<!-- Khi ấn nút xem thêm -->
<script>
    const products = <?php echo json_encode($products); ?>;
    let shownProducts = 8;

    document.getElementById('view-more-button').addEventListener('click', function(event) {
        event.stopPropagation(); // Ngăn chặn sự kiện click lan truyền
        const productList = document.getElementById('product-list');
        for (let i = shownProducts; i < products.length; i++) {
            const productItem = document.createElement('div');
            productItem.className = 'category-right-sp-item';
            productItem.innerHTML = `
                <a href="product_detail.php?id=${products[i]['product_id']}">
                    <img src="${products[i]['product_img']}" width="200px" height="200px" alt="">
                    <h1>${products[i]['product_name']}</h1>
                    <p>${products[i]['product_price']}₫</p>
                </a>
            `;
            productList.appendChild(productItem);
        }
        this.style.display = 'none';
    });
</script>
