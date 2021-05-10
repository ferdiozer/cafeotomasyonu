-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 Ara 2018, 19:15:26
-- Sunucu sürümü: 5.5.62-cll-lve
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bugsoftn_jupiter`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `desk`
--

CREATE TABLE `desk` (
  `id` int(10) UNSIGNED NOT NULL,
  `desk_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `capacity` tinyint(3) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `desk`
--



-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `desk_category`
--

CREATE TABLE `desk_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `desk_category`
--

INSERT INTO `desk_category` (`id`, `title`) VALUES
(5, 'ALT'),
(6, 'ÜST'),
(7, 'BAHÇE'),
(8, 'ŞAHIS');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `expense`
--



-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `addition_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `desk_id` int(10) UNSIGNED NOT NULL,
  `is_ready` tinyint(1) NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `order_product`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `addition_id` int(10) UNSIGNED NOT NULL,
  `payment_type_id` int(10) UNSIGNED NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `payment_type`
--

INSERT INTO `payment_type` (`id`, `title`) VALUES
(1, 'Nakit'),
(2, 'Kredi Kartı');

--
-- Tablo döküm verisi `payment`
--

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `price_default` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `product_category`
--

INSERT INTO `product_category` (`id`, `title`, `detail`, `img`, `is_active`) VALUES
(7, 'SICAK İÇECEK', '', '', 0),
(8, 'SOĞUK İÇECEK', '', '', 0),
(9, 'YEMEK', '', '', 0),
(10, 'BUTİK', '', '', 0),
(11, 'KİTAP', '', '', 0),
(12, 'TATLI', '', '', 0),
(13, 'VELİ', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT 'default_user.jpg',
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `type_id` tinyint(1) NOT NULL DEFAULT '1',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `phone` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `name`, `brand`, `avatar`, `is_admin`, `type_id`, `is_confirmed`, `is_active`, `phone`, `is_deleted`) VALUES
(1, 'admin', 'admin@mail.com', 'oCOCzy/tSWM5kUOOt0QU0SA5NtrWrWMZ0CnUQDOJ0w6RmGgQKZxK4ueMJTg8TW+9GlywLRDivaEXgUAWkaMlgQ==', 'Admin Kullanıcı', 'Jüpiter Kitap Kafe', 'default_user.jpg', 1, 1, 1, 1, '', 0),
(2, 'ferdiozer', 'dev@piyanos.com', 'F/sdQwmuuO6goNyLgp6b+6iyIX5GFxpiKgSCY4fqHmo0gd7y+n4+tb1GhUNSErr5PhTEQ7AiKw6feQ2VSYIvqA==', 'No Found', 'Bugsoft', 'default_user.jpg', 1, 1, 1, 1, '', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `desk`
--
ALTER TABLE `desk`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `desk_category`
--
ALTER TABLE `desk_category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `desk`
--
ALTER TABLE `desk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `desk_category`
--
ALTER TABLE `desk_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15060;

--
-- Tablo için AUTO_INCREMENT değeri `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5152;

--
-- Tablo için AUTO_INCREMENT değeri `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Tablo için AUTO_INCREMENT değeri `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
