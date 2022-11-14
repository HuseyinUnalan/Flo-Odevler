-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Kas 2022, 14:09:02
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kisiler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(255) NOT NULL,
  `telefon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `adsoyad`, `telefon`) VALUES
(24, 'Hüseyin Ünalan', '0555 554 44 44'),
(25, 'Ahsen Özcan', '0312 312 12 12'),
(26, 'Ahmet Koçak', '0212 222 22 22'),
(28, 'Merve Demir', '0312 312 12 12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
