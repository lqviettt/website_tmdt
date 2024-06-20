-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2024 lúc 01:44 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_gr1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `cart_items_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(27, 'TRANG CHỦ'),
(28, 'GIỚI THIỆU'),
(29, 'SẢN PHẨM'),
(30, 'ƯU ĐÃI'),
(31, 'TUYỂN DỤNG'),
(41, 'LIÊN HỆ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `gender`) VALUES
(1, 'Nggiang', '0981777888', 'vnggiang@gmail.com', 'Hai Ba Trung- Ha Noi', 0),
(2, 'Quoc Viet', '0869122203', 'viet.lq215166@sis.hust.edu.vn', 'Hai Ba Trung- Ha Noi', 1),
(3, 'trang', '0966456786', 'trang@gmail.com', 'Hung Yen', 0),
(4, 'giang', '0981564222', 'v@gmail.com', 'Ha Noi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_itemss`
--

CREATE TABLE `tbl_itemss` (
  `items_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `items_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_itemss`
--

INSERT INTO `tbl_itemss` (`items_id`, `category_id`, `items_name`) VALUES
(25, 29, 'Coffe'),
(28, 29, 'Trà Sữa'),
(31, 29, 'Trà Hoa Quả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `order_others` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `order_others`) VALUES
(44, 1, '2024-06-16', 100, 'Xin thêm 1 cốc nữa điiii :(('),
(45, 2, '2024-06-16', 40, 'Cho t thêm cái túi :))'),
(46, 3, '2024-06-18', 35, 'khuyen mai iii'),
(47, 4, '2024-06-20', 150, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_product`
--

CREATE TABLE `tbl_order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_product`
--

INSERT INTO `tbl_order_product` (`order_product_id`, `order_id`, `product_id`, `product_name`, `quantity`, `product_price`) VALUES
(31, 44, 44, 'Cà phê Espresso', 2, 50),
(32, 45, 42, 'Cà Phê Bạc Sỉu', 1, 40),
(33, 46, 40, 'Cà Phê Sữa', 1, 35),
(34, 47, 45, 'Cà phê Espresso Panda', 3, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `items_id`, `product_price`, `product_img`) VALUES
(20, 'Trà Sữa Mãng Cầu', 29, 28, '45.000', '../assets/uploads_img/trasuamangcau.png'),
(21, 'Trà Sữa Truyền Thống', 29, 28, '45.000', '../assets/uploads_img/tra-sua-tran-chau-dai-loan.png'),
(23, 'Trà sữa MatCha Đậu đỏ', 29, 28, '50.000', '../assets/uploads_img/Trà-sữa-Matcha-đậu-đỏ-2.png'),
(24, 'Trà sữa Cherry Choco', 29, 28, '50.000', '../assets/uploads_img/chery-choco-e1699592921653-300x395.png'),
(25, 'Trà Sữa Crème Yin Yang', 29, 28, '45.000', '../assets/uploads_img/caramen-e1699593566549-300x349.png'),
(26, 'Trà Sữa Gạo Rang Genmaicha', 29, 28, '45.000', '../assets/uploads_img/sua-gạo-rang-gen1699592969484-300x398.png'),
(27, 'Trà Sữa TC Đường Đen', 29, 28, '40.000', '../assets/uploads_img/dd.png'),
(28, 'Trà Sữa Olong Thạch Thảo Mộc', 29, 28, '45.000', '../assets/uploads_img/olong.png'),
(29, 'Trà sữa Gạo rang Hojicha Satoen', 29, 28, '40.000', '../assets/uploads_img/tra_sua_hojicha_1eb569144b53425f93765694a40a381c_1024x1024.webp'),
(30, 'Trà Sữa Socola Trân Châu', 29, 28, '45.000', '../assets/uploads_img/socola-e1634875773577-300x293.png'),
(37, 'Trà Sữa Vị Đào', 29, 28, '40.000', '../assets/uploads_img/trà sữa đào.png'),
(38, 'Trà sữa MatCha', 29, 28, '45.000', '../uploads_img/tr matcha.jfif'),
(40, 'Cà Phê Sữa', 29, 25, '35.000', '../uploads_img/cf sữa.webp'),
(41, 'Cà Phê Đen', 29, 25, '35.000', '../uploads_img/cf đen.webp'),
(42, 'Cà Phê Bạc Sỉu', 29, 25, '40.000', '../uploads_img/3.webp'),
(43, 'Cà phê Americano', 29, 25, '45.000', '../assets/uploads_img/4.webp'),
(44, 'Cà phê Espresso', 29, 25, '50.000', '../uploads_img/5.webp'),
(45, 'Cà phê Espresso Panda', 29, 25, '50.000', '../uploads_img/6.webp'),
(46, 'Cà Phê Latte', 29, 25, '50.000', '../uploads_img/10.webp'),
(47, 'Cà Phê Đen', 29, 25, '35.000', '../uploads_img/cf đen.webp'),
(48, 'Cà phê Caramel', 29, 25, '45.000', '../uploads_img/cl latte.webp'),
(49, 'Cà phê Mojto', 29, 25, '40.000', '../uploads_img/mojto.webp'),
(50, 'Cà Phê Nâu Sữaaa', 29, 25, '45.000', '../uploads_img/7.webp'),
(51, 'Cà Phê Caipirinha', 29, 25, '50.000', '../uploads_img/13.webp'),
(52, 'Trà Bưởi Hồng Đào', 29, 31, '40.000', '../uploads_img/tra-buoi-web-300x361.png'),
(53, 'Trà Ổi Sunny Love', 29, 31, '45.000', '../uploads_img/oi-300x361.png'),
(54, 'Trà Cúc Nhãn ', 29, 31, '40.000', '../uploads_img/trà-cúc-nhãn-2-e1666418988490-300x346.png'),
(55, 'Trà Dứa', 29, 31, '40.000', '../uploads_img/tra-dua-300x361.png'),
(56, 'Trà Đào Lá Dứa', 29, 31, '30.000', '../uploads_img/tra-dao-la-01.png'),
(57, 'Trà Vải Hạt Sen', 29, 31, '35.000', '../uploads_img/Tra-vai-hai-sennn.png'),
(59, 'Trà Đào', 29, 31, '30.000', '../uploads_img/tra-dao-1681362687.png'),
(60, 'Trà Táo', 29, 31, '40.000', '../assets/uploads_img/tra-tao-1681362733.png'),
(61, 'Trà Dâu Vải Thanh Mát', 29, 31, '40.000', '../uploads_img/tra-vai-300x361.png'),
(62, 'Trà Dứa Golden Joy', 29, 31, '35.000', '../uploads_img/tra-dua-300x361.png'),
(63, 'Trà Chanh Nha Đam', 29, 31, '40.000', '../uploads_img/tra-chanh-1681362708.png'),
(64, 'Trà Chanh Vải ', 29, 31, '30.000', '../uploads_img/tra-vai-300x361.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `email`, `password`, `is_admin`) VALUES
(14, 'admin', 'admin@gmail.com', '$2y$10$mTuGtKApSYoNI2FIBgUpiOOGFN22n6bS0KyGmz2QwBV1i8z.jgz5K', 1),
(15, 'viet', 'quocviet3004@gmail.com', '$2y$10$pPYc2aWV.rkpoXEhWmHphe7izfJ4TEH7XqD3fDnuNSV3bD.PB1AsK', 0),
(16, 'minh', 'minhnh26@gmail.com', '$2y$10$wjcJevZJ913eU.jCePRkuuKIXUHfl5oL/u2ejk9zKgmtKgi5llTwa', 0),
(31, 'nktrang', 'trang122@gmail.com', '$2y$10$2fJT23Ib4O2R/46/v5u82uGIdNA/yNFETqY4XTRzqGaRhbrp2SCqu', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`cart_items_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_itemss`
--
ALTER TABLE `tbl_itemss`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `primarykey3` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `KhoaNgoai` (`order_id`) USING BTREE,
  ADD KEY `pk2` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `primarykey` (`items_id`),
  ADD KEY `primarykey2` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `cart_items_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_itemss`
--
ALTER TABLE `tbl_itemss`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD CONSTRAINT `cart_id` FOREIGN KEY (`cart_id`) REFERENCES `tbl_cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_itemss`
--
ALTER TABLE `tbl_itemss`
  ADD CONSTRAINT `primarykey3` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  ADD CONSTRAINT `pk` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `primarykey` FOREIGN KEY (`items_id`) REFERENCES `tbl_itemss` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `primarykey2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
