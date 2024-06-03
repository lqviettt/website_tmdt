<?php
include "menu.php";
include "class/product_class.php";
?>

<div class="container-cart-product">
    <div class="wrap-payment">
        <form action="">
            <h3>Thông tin giỏ hàng</h3>
            <div class="wrap-payment-head">
                <div class="wrap-payment-head-left">
                    <img src="" alt="" style="width:150px; padding-bottom: 20px;">

                    <a href="" class="clear-product">XÓA </a>
                </div>
                <div class="wrap-payment-head-right">
                    <div class="" style="height:65px    ">
                        <div class="wrap-payment-head-right-title">
                            <a href="">
                                Trà Sữa Truyền Thống Đài Loan
                            </a>
                        </div>
                        <div class="price" style="float: right;">
                            50.000₫
                        </div>
                    </div>

                    <div class="" style="width:100%;min-height:40px ;">
                        <div class="choose-color">
                            <span>Size </span>
                        </div>
                        <div class="choose-number">
                            <div class="minus">
                                <i class="fa-solid fa-minus"></i>
                            </div>
                            <div class="number" value="1">1</div>
                            <div class="plus">
                                <i class="fa-solid fa-plus"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="Tinhtien">
            <div class="Tong-tien">
                <span>Tổng tiền </span>
                <div class="price" style="float: right;">
                    <p class="tongtien">50.000₫</p>
                </div>
            </div>
            <div class="Can-thanh-toan">
                <span>Cần thanh toán </span>
                <div class="price" style="float: right;">
                    <p class="tongtien">50.000₫</p>
                </div>
            </div>
        </div>
        <div class="back_product">
            <a href="products.php?items_id=25">
                <button class="back">
                    <i class="fa-solid fa-arrow-left"></i>
                    TIẾP TỤC MUA HÀNG
                </button>
            </a>
        </div>

    </div>
    <div class="wrap-payment">
        <h3>Thông tin thanh toán</h3>
        <div class="wrap-payment-body">
            <table style="width:100%; ">
                <tr>
                    <td colspan="2" style="float: left; margin-bottom: 15px;">

                        <input type="checkbox" id="checkbox1" name="checkbox1" checked="checked" value="1">
                        <label for="checkbox1">Anh</label>

                        <input type="checkbox" id="checkbox2" name="checkbox2" value="0">
                        <label for="checkbox2">Chị</label>
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Họ và tên (*)" id="name" style="width:95%;float: left;" class="form-control" onblur="checkName()">
                        <div id="nameError" style="display:none;color:red;">Vui lòng nhập tên !</div>
                    </td>
                    <td>
                        <input type="text" placeholder="Số điện thoại (*)" id="number" style="width:95%;float: right;" class="form-control" onblur="checkNumber()">
                        <div id="numberError" style="display:none;color:red;">Vui lòng nhập số điện
                            thoại !</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Email" style="width: 100%;" id="email" class="form-control" onblur="checkEmail()">
                        <div id="emailError" style="display:none;color:red;">Vui lòng nhập nhập email !
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Địa chỉ" style="width: 100%;" id="address">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Yêu cầu khác (không bắt buộc)" style="width: 100%;">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <div class="" style="margin-top: 15px;">
                            <button class="btn-checkout" onclick="check()" value="submit">
                                TIẾN HÀNH THANH TOÁN
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>