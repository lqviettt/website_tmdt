<?php
include "menu.php";
include "class/product_class.php";
?>

<?php
    $product = new product;
    $cf_items_id = 25;
    $tsua_items_id = 28;
    $tea_items_id = 31;
    $coffee_products = $product->get_top_products_by_items($cf_items_id);
    $milk_tea_products = $product->get_top_products_by_items($tsua_items_id);
    $tea_products = $product->get_top_products_by_items($tea_items_id);
?>


<!----------------------Slider----------------------->
<section id="Slide">
    <div class="slide_container">
        <img src="./uploads_img/banner1.png">
        <img src="./uploads_img/banner.png">

    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>

    </div>
</section>

<!---------------------Sản phẩm----------------------->
<section id="container">
    <div class="slide-product-one">
        <h1>COFFE BÁN CHẠY</h1>
        <div class="slider-product-bodyyy-filtering">
            <?php
            if ($milk_tea_products) {
                while ($result = $coffee_products->fetch_assoc()) {
            ?>
                    <div class="productt-p10">
                        <a href="product_detail.php?id=<?php echo $result['product_id']; ?>">

                            <div class="home-product-item__img">
                                <img width="200px" height="200px" src="<?php echo $result['product_img']; ?>" alt="">
                            </div>
                            <h1 class="home-product-item__name"><?php echo $result['product_name']; ?></h1>
                            <div class="home-product-item__price">
                                <span class="price"><?php echo $result['product_price']; ?>₫</span>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="view_product">
        <a href="products.php?items_id=<?php echo $cf_items_id; ?>"><button id="view-more-button">Xem thêm</button></a>
        </div>
    </div>

    <div class="slide-product-one">
        <h1>TRÀ SỮA BÁN CHẠY</h1>
        <div class="slider-product-bodyyy-filtering">
            <?php
            if ($milk_tea_products) {
                while ($result = $milk_tea_products->fetch_assoc()) {
            ?>
                    <div class="productt-p10">
                        <a href="product_detail.php?id=<?php echo $result['product_id']; ?>">
                            <div class="home-product-item__img">
                                <img width="200px" height="200px" src="<?php echo $result['product_img']; ?>" alt="">
                            </div>
                            <h1 class="home-product-item__name"><?php echo $result['product_name']; ?></h1>
                            <div class="home-product-item__price">
                                <span class="price"><?php echo $result['product_price']; ?>₫</span>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="view_product">
        <a href="products.php?items_id=<?php echo $tsua_items_id; ?>"><button id="view-more-button">Xem thêm</button></a>
        </div>
    </div>

    <div class="slide-product-one">
        <h1>TRÀ HOA QUẢ BÁN CHẠY</h1>
        <div class="slider-product-bodyyy-filtering">
            <?php
            if ($milk_tea_products) {
                while ($result = $tea_products->fetch_assoc()) {
            ?>
                    <div class="productt-p10">
                        <a href="product_detail.php?id=<?php echo $result['product_id']; ?>">
                            <div class="home-product-item__img">
                                <img width="200px" height="200px" src="<?php echo $result['product_img']; ?>" alt="">
                            </div>
                            <h1 class="home-product-item__name"><?php echo $result['product_name']; ?></h1>
                            <div class="home-product-item__price">
                                <span class="price"><?php echo $result['product_price']; ?>₫</span>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="view_product">
            <a href="products.php?items_id=<?php echo $tea_items_id; ?>"><button id="view-more-button">Xem thêm</button></a>
        </div>
    </div>
</section>

<script src="./JS/slider.js"></script>

<?php
include "footer.php";
?>