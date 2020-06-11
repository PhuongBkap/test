-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2020 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ph1911ij`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`) VALUES
(3, 'Áo sơ mi', 'ao-so-mi', 0),
(6, 'Áo dạ hội', 'ao-da-hoi', 1),
(7, 'Quần kaki', 'quan-kaki', 1),
(9, 'Áo dạ hội 2', 'ao-da-hoi-2', 1),
(10, 'Áo sơ mi 2', 'ao-so-mi-2', 1),
(11, 'Áo dạ hội 3', 'ao-da-hoi-3', 1),
(12, 'Áo dạ hội 4', 'ao-da-hoi-4', 1),
(13, 'Áo dạ hội 5', 'ao-da-hoi-5', 1),
(14, 'Áo dạ hội 6', 'ao-da-hoi-6', 1),
(15, 'Áo dạ hội 7', 'ao-da-hoi-7', 1),
(16, 'Áo sơ mi 11', 'ao-so-mi-11', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `sale_price` float NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dess` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `cat_id`, `price`, `sale_price`, `image`, `status`, `dess`) VALUES
(2, 'Quần Kaki giả rẻ', 'quan-kaki-gia-re', 7, 100000, 80000, 'fly_0503-2.jpg', 1, '<p><img alt=\"\" src=\"https://cdn.xipi.vn/media/catalog/product/cache/1/small_image/1000x/040ec09b1e35df139433887a97daa66f/f/l/fly_0503-2.jpg\" />&nbsp;<img alt=\"\" src=\"https://cdn.xipi.vn/media/catalog/product/cache/1/small_image/1000x/040ec09b1e35df139433887a97daa66f/f/l/fly_0546-2.jpg\" />&nbsp;<img alt=\"\" src=\"https://cdn.xipi.vn/media/catalog/product/cache/1/small_image/1000x/040ec09b1e35df139433887a97daa66f/f/l/fly_0544-2.jpg\" /></p>\r\n'),
(3, 'Quần Kaki giả rẻ bèo', 'quan-kaki-gia-re-beo', 7, 100000, 0, '931e9c5cc51823f3e6dc467ec67d6038.jpg_340x340q80.jpg_.webp', 1, '<p><strong>Danh s&aacute;ch c&aacute;c chi nh&aacute;nh c&ograve;n h&agrave;ng:</strong><br />\r\n<strong>Hồ Ch&iacute; Minh:</strong>&nbsp;284 Huỳnh Văn B&aacute;nh, P.11, Ph&uacute; Nhuận - Hotline: 0909 50 52 64<br />\r\n- Size: M, S<br />\r\n<strong>Hồ Ch&iacute; Minh:</strong>&nbsp;7/5 Nguyễn Tr&atilde;i, Phường Bến Th&agrave;nh, Quận 1 - Hotline: 0909 50 52 60<br />\r\n- Size: S, M, L<br />\r\n<strong>Đ&agrave; Nẵng:</strong>&nbsp;356/3 Ho&agrave;ng Diệu, Quận Hải Ch&acirc;u - Hotline: 0909 50 52 40<br />\r\n- Size: S, M<br />\r\n<strong>Bi&ecirc;n H&ograve;a:</strong>&nbsp;982 Phạm Văn Thuận, T&acirc;n Mai, Bi&ecirc;n H&ograve;a - Hotline: 0909 50 50 06<br />\r\n- Size: S, M</p>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro_cate` (`cat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
