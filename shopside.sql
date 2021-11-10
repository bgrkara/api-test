-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Kas 2021, 05:33:28
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `shopside`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` varchar(999) DEFAULT NULL,
  `product_price` decimal(5,3) DEFAULT NULL,
  `product_discount` enum('VAR','YOK') DEFAULT 'VAR',
  `sales_status` enum('SATIŞTA','SATIŞTA DEĞİL') DEFAULT 'SATIŞTA',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_discount`, `sales_status`, `date`) VALUES
(1, 'Apple Airpods 3. Nesil Kulaklık', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus ex nemo porro saepe! Consequatur minima officia sunt. Architecto at autem culpa doloremque magni necessitatibus quia repudiandae soluta suscipit voluptates.sadfgdsagsd', '1.501', 'VAR', 'SATIŞTA', '2021-11-08'),
(2, 'Apple Airpods 3. Nesil Kulaklık MME73TU/A ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus ex nemo porro saepe! Consequatur minima officia sunt. Architecto at autem culpa doloremque magni necessitatibus quia repudiandae soluta suscipit voluptates.', '1.990', 'VAR', 'SATIŞTA', '2021-11-08'),
(4, 'product_namedasdasdFGDFGDFH', 'product_descriptionsfdfasfJDGJDGJDG', '99.999', 'VAR', 'SATIŞTA', '2021-11-07'),
(5, 'Ürün Adı', 'Ürün Açıklaması', '1.899', 'YOK', 'SATIŞTA', '2021-11-08'),
(6, 'asgsdhjsdfj', 'jgdjfgklfhlhjlşgjlhfg', '2.300', 'YOK', 'SATIŞTA DEĞİL', '2021-11-08'),
(7, 'Honor 8X', 'LOREM IPSUM', '2.250', 'YOK', 'SATIŞTA', '2021-11-09'),
(8, 'Ürün Adı 02', 'Ürün Açıklaması 02', '1.100', 'YOK', 'SATIŞTA DEĞİL', '2021-11-09'),
(9, 'Yeni Ürün Ekle', 'Yeni Ürün Açıklaması Ekle', '1.300', 'YOK', 'SATIŞTA', '2021-11-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `date`) VALUES
(1, 'Toprak', 'Mercan', 'info@bugrakara.com.tr', '98ba56de2d15a90cd0d25d4539b34106', '2021-11-06'),
(2, 'Bugra', 'Kara', 'info@bugrakara2.com.tr', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-06'),
(9, 'Ürün Adı', 'Ürün Açıklaması', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(10, 'Toprak', 'Mercan', 't@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(11, 'Toprak', 'Mercan', 't2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(12, 'Toprak', 'Mercan', 't3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(13, 'ALİ', 'VELİ', 'ali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(14, 'Mahmut', 'Dogan', 'mdogan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-08'),
(15, 'Torpak', 'Loring', 't4@gmail.com', '6a9edcb7b63821802aa44d35d531c9fc', '2021-11-08'),
(16, 'sdsad', 'gdfjdgj', 't6@gmail.com', '90e65d936a8b9c50bd72d74406075bfe', '2021-11-08'),
(17, 'Brewgorillas', 'fsdfsdf', 'fhhh@gmail.com', '8be2a222b1ba144c3fb0a98eacebeda8', '2021-11-08'),
(18, 'fsdgsdg', 'gjfgjhj', 'dfsd@gmail.comf', '96ab1e741055d6dd6a3f40fe91b2b2be', '2021-11-08'),
(19, 'asgadg', 'gjfgkjdgfj', 'oznmydn@gmail.com', 'dcf72636682dfc85a41471705e20f245', '2021-11-08'),
(20, 'dcghjgfdj', 'dgjkdgk', 'jdgjd@gmail.com', 'd3e8dbcc778087401301068ccd17ae4c', '2021-11-08'),
(21, 'sfsdhdg', 'gjfkfhlkf', 'lgj@gmail.com', 'd03d011779bc6121506643aeb871777b', '2021-11-09'),
(22, 'sghfdjdg', 'jkgjgj', 'dsgfsdhg@gmail.com', '8d6fb501b50b6f76a5d298a700a62e1c', '2021-11-09'),
(23, 'Sunay', 'AKIN', 'akin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-09'),
(24, 'Ali Savaşsss', 'Türkyılmaz', 'turk@gmail.com', 'c2a0518c471b7f56436fc96c94224b24', '2021-11-09');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
