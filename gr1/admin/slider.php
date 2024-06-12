<section class="admin-content">
    <div class="admin-content-left">
        <ul>
            <li><a href="#" class="toggle" data-target="qlsp">QUẢN LÝ SẢN PHẨM</a>
                <div class="qlsp">
                    <ul>
                        <li><a href="" class="bold-text">Danh mục</a>
                            <ul>
                                <li><a href="categoryadd.php">Thêm danh mục</a></li>
                                <li><a href="categorylist.php">Danh sách danh mục</a></li>
                            </ul>
                        </li>
                        <li><a href="" class="bold-text">Loại sản phẩm</a>
                            <ul>
                                <li><a href="items_add.php">Thêm loại sản phẩm</a></li>
                                <li><a href="items_list.php">Danh sách loại sản phẩm</a></li>
                            </ul>
                        </li>
                        <li><a href="" class="bold-text">Sản phẩm</a>
                            <ul>
                                <li><a href="productadd.php">Thêm sản phẩm</a></li>
                                <li><a href="productlist.php">Danh sách sản phẩm</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>

            <li><a href="" class="toggle" data-target="qldh">QUẢN LÝ ĐƠN HÀNG</a>
                <div class="qldh">
                    <ul>
                        <li><a href="orderlist.php">Danh sách đơn hàng</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="#" class="toggle" data-target="qlkh">QUẢN LÝ KHÁCH HÀNG</a>
                <div class="qlkh">
                    <ul>
                        <li><a href="customerlist.php">Danh sách khách hàng</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <!-- <script>
        document.querySelectorAll('.toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(event) {
                event.preventDefault();
                var targetClass = toggle.getAttribute('data-target');
                var targetElement = document.querySelector('.' + targetClass);
                targetElement.style.display = (targetElement.style.display === 'none' || targetElement.style.display === '') ? 'block' : 'none';
            });
        });
    </script> -->