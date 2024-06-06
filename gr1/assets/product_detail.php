<?php
include "menu.php";
include "class/product_class.php";
include "session.php";  // Include session management

Session::init();

$product = new product;
$product_detail = null;
$similar_products = null;
$items_id = null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $product_detail = $product->get_product_by_id($product_id);

    if ($product_detail) {
        $result = $product_detail->fetch_assoc();
        $items_id = $result['items_id'];
        $similar_products = $product->get_random_similar_products($result['items_id'], $product_id);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];

    $product = [
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_img' => $product_img,
        'quantity' => 1
    ];

    $cart = Session::get('cart');
    if (!$cart) {
        $cart = [];
    }

    if (isset($cart[$product_id])) {
        $cart[$product_id]['quantity'] += 1;
    } else {
        $cart[$product_id] = $product;
    }

    Session::set('cart', $cart);

    if (isset($_POST['action']) && $_POST['action'] == 'buy_now'){
        header("Location: cart.php");
        exit();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'add_to_cart'){
        header("Location: cart.php");
        exit();
    }
}
?>

<section id="section">
    <div class="container-product-details">
        <div class="history">
            <?php
            if ($product_detail) {
                echo '<span class="text1">';
                echo '<a href="products.php?items_id=' . $result['items_id'] . '">' . $result["items_name"] . '<i class="fa-solid fa-angle-right"></i></a>';
                echo '<span class="text2">' . $result["product_name"] . '</span>';
            }
            ?>
        </div>

        <?php
        if ($product_detail) {
            echo '<div class="list-item-content-box">';
            echo '<div class="li1">';
            echo '<div class="imgg" style="position: relative;">';
            echo '<img src="' . $result["product_img"] . '" width="370px" height="400px" alt="">';
            echo '</div>';
            echo '</div>';
            echo '<div class="li2">';
            echo '<div class="left2">';
            echo '<h1 class="txt-24" style="margin: 10px 0 0">' . $result["product_name"] . '</h1>';
            echo '<div class="pr">';
            echo '<span class="price" style="font-size: 24px;">' . $result["product_price"] . '₫</span>';
            echo '</div>';
            echo '<div class="promotion-product">';
            echo '<div class="head-promotion">';
            echo 'KHUYẾN MÃI:';
            echo '<div style="font-size:12px;">Giá và khuyến mãi áp dụng khi đặt hàng từ 30/4 - hết 30/5</div>';
            echo '</div>';
            echo '<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">';
            echo '<div class="body-promotion">';
            echo 'Khách hàng được hưởng 2 ưu đãi sau:';
            echo '<br>1.Ưu đãi khi thanh toán';
            echo '<br><i class="fa-solid fa-circle-check" style="color: coral;"></i>&nbsp;&nbsp;Áp dụng Voucher giảm giá khi thanh toán online';
            echo '<br><i class="fa-solid fa-circle-check" style="color: coral;"></i>&nbsp;&nbsp;Được freeship khi mua 2 Sản phẩm trở lên khi thanh toán tiền mặt';
            echo '<br><i class="fa-solid fa-circle-check" style="color: coral;"></i>&nbsp;&nbsp;Giảm 50% khi thanh toán bằng ví điện tử MOMO';
            echo '<br>2.Ưu đãi khách hàng';
            echo '<br><i class="fa-solid fa-circle-check" style="color: coral;"></i>&nbsp;&nbsp;Mua 1 tặng 1 khi đi từ 3 người<br>';
            echo '</div>';
            echo '<div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 19px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 231.481px;"></div>';
            echo '<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="buy">';
            echo '<form action="product_detail.php?id=' . $product_id . '" method="post">';
            echo '<input type="hidden" name="product_id" value="' . $result['product_id'] . '">';
            echo '<input type="hidden" name="product_name" value="' . $result['product_name'] . '">';
            echo '<input type="hidden" name="product_price" value="' . $result['product_price'] . '">';
            echo '<input type="hidden" name="product_img" value="' . $result['product_img'] . '">';
            echo '<button type="submit" name="action" value="buy_now" class="btn-buynow">MUA NGAY</button>';
            echo '</form>';
            echo '</div>';
            echo '<div class="buy">';
            echo '<form action="product_detail.php?id=' . $product_id . '" method="post">';
            echo '<input type="hidden" name="product_id" value="' . $result['product_id'] . '">';
            echo '<input type="hidden" name="product_name" value="' . $result['product_name'] . '">';
            echo '<input type="hidden" name="product_price" value="' . $result['product_price'] . '">';
            echo '<input type="hidden" name="product_img" value="' . $result['product_img'] . '">';
            echo '<button type="submit" name="action" value="add_to_cart" class="btn-buynow">THÊM VÀO GIỎ HÀNG</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        <div class="compare-produce">
            <div class="compare-produce-left">
                <h1>Sản Phẩm Tương Tự</h1>
                <div class="compare-product-items row">
                    <?php
                    if ($similar_products) {
                        while ($similar_product = $similar_products->fetch_assoc()) {
                            echo '<li class="compare-product-left-items">';
                            echo '<a href="product_detail.php?id=' . $similar_product["product_id"] . '">';
                            echo '<img src="' . $similar_product["product_img"] . '" width="150px" height="150px" alt="">';
                            echo '<h2>' . $similar_product["product_name"] . '</h2>';
                            echo '<p>' . $similar_product["product_price"] . '₫</p>';
                            echo '</a>';
                            echo '</li>';
                        }
                    }
                    ?>
                </div>
                <div class="view_product">
                    <a href="products.php?items_id=<?php echo $items_id; ?>"><button id="view-more-button">Xem tất cả</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>