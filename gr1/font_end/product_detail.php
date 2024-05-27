<?php
include "menu.php";
include "class/product_class.php";


$product = new product;
$product_detail = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $product_detail = $product->get_product_by_id($product_id);
}
$result = $product_detail->fetch_assoc();
?>

<section>
    <div class="container-product-details">
        <!-- phan dau -->
        <div class="history">
            <?php
            echo '<span class="text1">';
            echo '<a href="products.php?items_id=' . $result['items_id'] . '">' . $result["items_name"] . '<i class="fa-solid fa-angle-right"></i></a>';
            ?>
            <?php
            echo '<span class="text2">' . $result["product_name"] . '</span>';
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
            echo '<div class="Btn-muangay">';
            echo '<a href="./Giohang.html" style="color:#FFF"><b>MUA NGAY</b></a>';
            echo '</div>';
            echo '<div class="Btn-ThemGH">';
            echo '<a href="" style="color: rgb(244, 140, 140);"><b>Thêm vào giỏ hàng</b></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php
include "footer.php";
?>