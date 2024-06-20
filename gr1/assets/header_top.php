<?php require_once "session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

    <title>Sản phẩm</title>
</head>
<body>
    <header>
        <div class="h_top">
            <div class="chao">
                <h3>Capyy Coffe&Tea</h3>
            </div>
            <div class="logo">
                <img height="60px" width="60px" src="./uploads_img/Screenshot 2024-05-29 195433.png">
            </div>
            <div class="search">
                <input type="text" class="search_input" placeholder="Bạn cần tìm sản phẩm gì? "><i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="others">
                <?php
                // Kiểm tra xem đã đăng nhập hay chưa
                Session::init();
                if (Session::get("login")) {
                    // Nếu đã đăng nhập, hiển thị icon profile và nút đăng xuất
                    echo '<li><a href="profile.php" class="profile"><i class="fa-solid fa-user icon-cart"></i>Profile</a></li>';
                    echo '<li><a href="logout.php" class="logout"><i class="fa-solid fa-sign-out icon-cart"></i>Đăng xuất</a></li>';
                } else {
                    // Nếu chưa đăng nhập, hiển thị nút Đăng nhập
                    echo '<li><a href="login.php" class="cart"><i class="fa-solid fa-user icon-cart"></i>Đăng Nhập</a></li>';
                }
                ?>
                <li>
                    <a href="cart.php" class="cart">
                        <i class="fa-solid fa-cart-shopping icon-cart"></i>
                        Giỏ Hàng
                    </a>
                </li>
            </div>
        </div>
    </header>
</body>
</html>
