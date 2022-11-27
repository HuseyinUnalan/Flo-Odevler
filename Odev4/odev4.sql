-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Kas 2022, 10:06:16
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `odev4-yeni`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(255) NOT NULL,
  `tckimlik` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `adsoyad`, `tckimlik`) VALUES
(188, 'Hüseyin Ünalan', '94527241688'),
(189, 'Merve Demir', '05412563987'),
(190, 'Ahmet Koçak', '20122781328'),
(191, 'Ahsen Özcan', '46092682434');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kayitlar`
--
ALTER TABLE `kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kayitlar`
--
ALTER TABLE `kayitlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
