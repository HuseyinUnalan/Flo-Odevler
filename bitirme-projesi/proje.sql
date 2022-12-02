-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Ara 2022, 15:36:02
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
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `ders_id` int(11) NOT NULL,
  `ders_ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `ders_ad`) VALUES
(4, 'Matematik'),
(5, 'Türkçe'),
(6, 'Edebiyat'),
(7, 'İngilizce'),
(8, 'Biyoloji'),
(9, 'Kimya'),
(10, 'Tarih'),
(11, 'Fizik'),
(15, 'Görsel Sanatlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `duyuru_id` int(11) NOT NULL,
  `duyuru_baslik` varchar(255) NOT NULL,
  `duyuru_icerik` text NOT NULL,
  `duyuru_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duyuru_durum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`duyuru_id`, `duyuru_baslik`, `duyuru_icerik`, `duyuru_tarih`, `duyuru_durum`) VALUES
(6, 'Matematik Sınavı Hakkında', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; letter-spacing: normal; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '2022-12-02 12:47:43', 'Aktif'),
(7, 'Türkçe Sınavı Hakkında', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; letter-spacing: normal; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '2022-12-02 12:47:59', 'Aktif'),
(8, 'İngilizce Sınavı Hakkında', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; letter-spacing: normal; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '2022-12-02 12:48:10', 'Aktif'),
(16, 'Fizik - Ders Tekrar', '<p>Fizik - Ders Tekrar Saat 19.00<br></p>', '2022-12-02 14:29:58', 'Aktif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullanici_mail` varchar(255) NOT NULL,
  `kullanici_password` varchar(255) NOT NULL,
  `kullanici_durum` varchar(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `ogretmen_id` int(11) NOT NULL,
  `kullanici_adsoyad` varchar(255) NOT NULL,
  `kullanici_resimyol` text NOT NULL,
  `kullanici_okulnumara` varchar(50) NOT NULL,
  `kullanici_brans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullanici_mail`, `kullanici_password`, `kullanici_durum`, `ogrenci_id`, `ogretmen_id`, `kullanici_adsoyad`, `kullanici_resimyol`, `kullanici_okulnumara`, `kullanici_brans`) VALUES
(9, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, 0, '', '', '', ''),
(50, '54442733170', 'd74a214501c1c40b2c77e995082f3587', '2', 0, 9, 'Gamze Gül', 'images/ogretmenresimler/20207275082217820122avatar-3.png', '', 'Matematik'),
(51, '15359261552', '884ce4bb65d328ecb03c598409e2b168', '2', 0, 10, 'Filiz Can', 'images/ogretmenresimler/25623284882507524486avatar-13.png', '', 'Türkçe'),
(52, '71397046322', '1f6419b1cbe79c71410cb320fc094775', '2', 0, 11, 'Mert Yıldırım', 'images/ogretmenresimler/23462223952354726768avatar-7.png', '', 'İngilizce'),
(54, '13852191314', 'd14388bb836687ff2b16b7bee6bab182', '2', 0, 12, 'Büşra Yılmaz', 'images/ogretmenresimler/28481259433000627181avatar-10.png', '', 'Biyoloji'),
(56, '28102246140', '23712318a400454a2c049f165106d985', '2', 0, 13, 'Ahmet Güneş', 'images/ogretmenresimler/26809300762006927454avatar-16.png', '', 'Kimya'),
(57, '58775833286', '01161aaa0b6d1345dd8fe4e481144d84', '2', 0, 14, 'Samet Gül', 'images/ogretmenresimler/27182272892546020569avatar-18.png', '', 'Tarih'),
(58, '21446720130', 'cf77e1f8490495e9f8dedceaf372f969', '2', 0, 15, 'Kübra Gündoğdu', 'images/ogretmenresimler/24171299932035825360avatar-17.png', '', 'Fizik'),
(64, '20417078188', 'c4819d06b0ca810d38506453cfaae9d8', '3', 27, 0, 'Hüseyin Ünalan', 'images/ogrenciresimler/26649233422081229937avatar-2.png', '27', ''),
(65, '92971092818', '4a11654ad1e1e48352252859ff3032a0', '3', 28, 0, 'Fatma Demir', 'images/ogrenciresimler/20265310962352428165avatar-6.png', '28', ''),
(66, '15633762980', '7866c91c59f8bffc92a79a7cd09f9af9', '3', 29, 0, 'Hülya Yıldırım', 'images/ogrenciresimler/25409274142242021088avatar-5.png', '29', ''),
(67, '90575925440', 'e13748298cfb23c19fdfd134a2221e7b', '3', 30, 0, 'Ahmet Yıldırım', 'images/ogrenciresimler/20408283383143721721avatar-9.png', '30', ''),
(68, '10347615614', '5bf8aaef51c6e0d363cbe554acaf3f20', '3', 31, 0, 'İlayda Çiçek', 'images/ogrenciresimler/24296284882012628643avatar-1.jpg', '31', ''),
(69, '92243312590', '3bf55bbad370a8fcad1d09b005e278c2', '3', 32, 0, 'Yakup Yılmaz', 'images/ogrenciresimler/20620282152499522161avatar-2.jpg', '32', ''),
(70, '80330620888', '7cb36e23529e4de4c41460940cc85e6e', '3', 33, 0, 'Semina Ermiş', 'images/ogrenciresimler/21005267242187027093avatar-4.jpg', '33', ''),
(71, '36201725848', '770c0e7e2af0db73409aa2431aa8f33e', '3', 34, 0, 'Emre Göksoy', 'images/ogrenciresimler/22325253183055431608avatar-7.jpg', '34', ''),
(72, '50144187730', '56dc0997d871e9177069bb472574eb29', '3', 35, 0, 'Meliha İzci', 'images/ogrenciresimler/27078227012077420790avatar-5.jpg', '35', ''),
(73, '84060519924', '9996535e07258a7bbfd8b132435c5962', '3', 36, 0, 'Sedanur Açar', 'images/ogrenciresimler/25256270013115624938avatar-8.jpg', '36', ''),
(74, '53565911588', '943aa0fcda4ee2901a7de9321663b114', '3', 37, 0, 'Giray Öz', 'images/ogrenciresimler/26619264332443125757avatar-6.jpg', '37', ''),
(93, '16616789284', '41c576a3bac4220845f9427b002a2a9d', '3', 54, 0, 'Meltem Gül', 'images/ogrenciresimler/26740206772106121893ogrenci.webp', '54', ''),
(94, '42530015932', 'a0046ad4c1bafc4ef04e41e755f28368', '2', 0, 23, 'Ezgi Deniz', 'images/ogretmenresimler/30743313223010121928ogretmen.webp', '', 'Görsel Sanatlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mesaj_detay` text NOT NULL,
  `kullanici_gel` varchar(255) NOT NULL,
  `kullanici_gon` varchar(255) NOT NULL,
  `mesaj_okuma` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`mesaj_id`, `mesaj_zaman`, `mesaj_detay`, `kullanici_gel`, `kullanici_gon`, `mesaj_okuma`) VALUES
(7, '2022-12-02 07:54:57', 'Merhaba Ben Kimyacı Ahmet Güneş', '34', '28102246140', '1'),
(8, '2022-12-02 08:11:41', 'Merhaba İlayde Ben Kimyacı Ahmet Güneş', '31', '28102246140', '1'),
(9, '2022-12-02 08:11:40', 'Merhaba İlayde Ben Kimyacı Ahmet Güneş Tekrar', '31', '28102246140', '1'),
(10, '2022-12-02 07:54:53', 'Merhaba Emre Ben Biyoloji Hocası Büşra', '34', '13852191314', '1'),
(19, '2022-12-02 07:50:20', 'Merhaba Büşra Hocam Ben Emre', '12', '36201725848', '0'),
(20, '2022-12-02 07:55:02', 'MErhaba Ahmet Hocam BEn Emre', '13', '36201725848', '1'),
(21, '2022-12-02 08:26:18', 'Merhaba Emre Ben Kimyacı Hocası Ahmet Mesaj 2', '34', '28102246140', '1'),
(22, '2022-12-02 08:29:38', 'Merhaba Emre Ben Kimyacı Hocası Ahmet Mesaj 3', '34', '28102246140', '1'),
(23, '2022-12-02 09:13:05', 'Merhaba Ahmet Hocam Ben Emre', '13', '36201725848', '1'),
(24, '2022-12-02 09:13:12', 'Merhaba Emre Ben Kimyacı Hocası Ahmet Mesaj 4', '34', '28102246140', '1'),
(25, '2022-12-02 13:45:38', 'Merhaba Emre Ben Kimyacı Hocası Ahmet Mesaj 5', '34', '28102246140', '1'),
(26, '2022-12-02 09:11:03', 'Merhaba Hocam Ben Emre MEsaj 3', '13', '36201725848', '0'),
(27, '2022-12-02 09:12:58', 'Merhaba Büşra Hocam Ben Emre', '12', '36201725848', '0'),
(28, '2022-12-02 13:25:37', 'Merhaba Hocam Ben Meltem', '16', '16616789284 ', '1'),
(29, '2022-12-02 13:26:17', 'Merhaba Meltem', '43', '42530015932 ', '0'),
(30, '2022-12-02 13:46:04', 'Hocam Merhaba', '13', '36201725848', '1'),
(31, '2022-12-02 13:46:22', 'Merhaba Emre', '34', '28102246140', '1'),
(32, '2022-12-02 13:58:16', 'Hocam Merhaba Ben Ahmet', '13', '36201725848', '1'),
(33, '2022-12-02 14:06:15', 'Hocam Notumu Sonuçlandıra bilir misiniz?', '13', '36201725848', '1'),
(34, '2022-12-02 14:06:53', 'Sonuçlandırdım Emre', '34', '28102246140', '1'),
(35, '2022-12-02 14:14:34', 'Hocam Merhaba Notumu Sonuçlandıra bilir misiniz?', '13', '36201725848', '1'),
(36, '2022-12-02 14:15:28', 'Notunu Sonuçlandırdım Emre', '34', '28102246140', '1'),
(37, '2022-12-02 14:31:09', 'Hocam Merhaba Notumu Sonuçlandıra bilir misiniz?', '13', '36201725848', '1'),
(38, '2022-12-02 14:31:54', 'Notunu Sonuçlandırdım.', '34', '28102246140', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlar`
--

CREATE TABLE `notlar` (
  `not_id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `not_vize1` double NOT NULL,
  `not_vize2` double NOT NULL,
  `not_final` double NOT NULL,
  `not_ort` double NOT NULL,
  `not_ders` varchar(255) NOT NULL,
  `not_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `notlar`
--

INSERT INTO `notlar` (`not_id`, `ogrenci_id`, `not_vize1`, `not_vize2`, `not_final`, `not_ort`, `not_ders`, `not_tarih`) VALUES
(47, 29, 60, 67, 80, 70.1, 'Matematik', '2022-12-01 14:00:17'),
(48, 30, 63, 54, 66, 61.5, 'Matematik', '2022-12-01 14:00:29'),
(49, 31, 90, 54, 72, 72, 'Matematik', '2022-12-01 14:00:42'),
(50, 32, 60, 64, 48, 56.4, 'Matematik', '2022-12-01 14:01:15'),
(51, 33, 87, 45, 69, 67.2, 'Matematik', '2022-12-01 14:01:31'),
(52, 34, 80, 80, 95, 86, 'Matematik', '2022-12-01 14:02:23'),
(53, 35, 80, 80, 65, 74, 'Matematik', '2022-12-01 14:02:57'),
(54, 36, 85, 74, 56, 70.1, 'Matematik', '2022-12-01 14:03:44'),
(55, 37, 80, 75, 45, 64.5, 'Matematik', '2022-12-01 14:03:58'),
(56, 27, 75, 48, 65, 62.9, 'Türkçe', '2022-12-01 14:05:18'),
(57, 28, 65, 80, 73, 72.7, 'Türkçe', '2022-12-01 14:05:23'),
(58, 29, 65, 54, 84, 69.3, 'Türkçe', '2022-12-01 14:05:27'),
(59, 30, 69, 87, 35, 60.8, 'Türkçe', '2022-12-01 14:05:30'),
(60, 31, 78, 54, 65, 65.6, 'Türkçe', '2022-12-01 14:05:35'),
(61, 32, 98, 45, 41, 59.3, 'Türkçe', '2022-12-01 14:05:50'),
(62, 33, 48, 54, 98, 69.8, 'Türkçe', '2022-12-01 14:06:14'),
(63, 34, 74, 54, 63, 63.6, 'Türkçe', '2022-12-01 14:06:54'),
(64, 35, 84, 51, 26, 50.9, 'Türkçe', '2022-12-01 14:07:10'),
(65, 36, 85, 54, 74, 71.3, 'Türkçe', '2022-12-01 14:07:38'),
(66, 37, 65, 67, 53, 60.8, 'Türkçe', '2022-12-01 14:07:42'),
(67, 27, 80, 45, 57, 60.3, 'İngilizce', '2022-12-01 14:11:04'),
(68, 28, 48, 54, 78, 61.8, 'İngilizce', '2022-12-01 14:14:14'),
(69, 29, 80, 80, 80, 80, 'İngilizce', '2022-12-01 14:14:30'),
(70, 30, 70, 75, 78, 74.7, 'İngilizce', '2022-12-01 14:14:58'),
(71, 31, 58, 74, 69, 67.2, 'İngilizce', '2022-12-01 14:15:36'),
(72, 32, 98, 45, 64, 68.5, 'İngilizce', '2022-12-01 14:15:49'),
(73, 33, 78, 87, 56, 71.9, 'İngilizce', '2022-12-01 14:16:06'),
(74, 34, 89, 85, 74, 81.8, 'İngilizce', '2022-12-01 14:16:56'),
(76, 35, 80, 80, 80, 80, 'İngilizce', '2022-12-01 14:19:25'),
(77, 36, 65, 65, 45, 57, 'İngilizce', '2022-12-01 14:19:36'),
(78, 37, 78, 85, 41, 65.3, 'İngilizce', '2022-12-01 14:19:49'),
(79, 27, 80, 50, 41, 55.4, 'Biyoloji', '2022-12-01 14:57:28'),
(80, 28, 65, 85, 47, 63.8, 'Biyoloji', '2022-12-01 14:57:41'),
(81, 29, 56, 85, 41, 58.7, 'Biyoloji', '2022-12-01 14:58:10'),
(82, 30, 85, 41, 65, 63.8, 'Biyoloji', '2022-12-01 14:59:14'),
(83, 31, 95, 41, 56, 63.2, 'Biyoloji', '2022-12-01 14:59:32'),
(84, 32, 56, 45, 72, 59.1, 'Biyoloji', '2022-12-01 15:01:37'),
(85, 33, 84, 45, 61, 63.1, 'Biyoloji', '2022-12-01 15:01:51'),
(86, 34, 56, 87, 42, 59.7, 'Biyoloji', '2022-12-01 15:02:02'),
(87, 35, 87, 45, 69, 67.2, 'Biyoloji', '2022-12-01 15:02:14'),
(88, 36, 48, 75, 62, 61.7, 'Biyoloji', '2022-12-01 15:02:29'),
(89, 37, 74, 58, 62, 64.4, 'Biyoloji', '2022-12-01 15:02:39'),
(91, 27, 60, 60, 80, 0, 'Matematik', '2022-12-01 15:41:54'),
(92, 28, 80, 0, 0, 0, 'Matematik', '2022-12-01 15:55:04'),
(93, 29, 80, 54, 74, 69.8, 'Matematik', '2022-12-02 14:03:31'),
(94, 30, 65, 75, 0, 0, 'Kimya', '2022-12-01 15:35:14'),
(95, 31, 56, 96, 0, 0, 'Kimya', '2022-12-01 15:35:23'),
(96, 32, 58, 47, 74, 61.1, 'Matematik', '2022-12-02 13:55:52'),
(97, 33, 69, 54, 74, 66.5, 'Matematik', '2022-12-02 13:43:27'),
(98, 34, 50, 41, 74, 56.9, 'Matematik', '2022-12-02 13:42:00'),
(99, 35, 78, 54, 74, 69.2, 'Matematik', '2022-12-02 13:32:43'),
(100, 36, 78, 54, 74, 69.2, 'Matematik', '2022-12-02 13:22:47'),
(101, 37, 78, 78, 74, 76.4, 'Matematik', '2022-12-02 13:15:02'),
(102, 27, 78, 54, 45, 57.6, 'Tarih', '2022-12-01 15:58:26'),
(103, 28, 78, 54, 87, 74.4, 'Tarih', '2022-12-01 15:58:19'),
(104, 29, 56, 42, 78, 60.6, 'Tarih', '2022-12-01 15:58:47'),
(105, 30, 74, 12, 54, 47.4, 'Tarih', '2022-12-01 15:58:59'),
(106, 31, 78, 54, 12, 44.4, 'Tarih', '2022-12-01 15:59:09'),
(107, 32, 89, 54, 63, 68.1, 'Tarih', '2022-12-01 15:59:21'),
(108, 33, 85, 41, 25, 47.8, 'Tarih', '2022-12-01 15:59:32'),
(109, 34, 78, 54, 12, 44.4, 'Tarih', '2022-12-01 15:59:54'),
(110, 35, 65, 32, 89, 64.7, 'Tarih', '2022-12-01 16:00:05'),
(111, 36, 78, 95, 35, 65.9, 'Tarih', '2022-12-01 16:00:20'),
(112, 37, 78, 54, 96, 78, 'Tarih', '2022-12-01 16:00:32'),
(113, 27, 78, 85, 0, 0, 'Fizik', '2022-12-01 16:00:58'),
(114, 28, 85, 56, 0, 0, 'Fizik', '2022-12-01 16:01:13'),
(115, 29, 96, 87, 0, 0, 'Fizik', '2022-12-01 16:01:18'),
(116, 30, 56, 45, 0, 0, 'Fizik', '2022-12-01 16:01:24'),
(117, 31, 75, 75, 0, 0, 'Fizik', '2022-12-01 16:01:28'),
(118, 32, 85, 74, 0, 0, 'Fizik', '2022-12-01 16:01:32'),
(119, 33, 46, 83, 0, 0, 'Fizik', '2022-12-01 16:01:36'),
(121, 35, 85, 54, 0, 0, 'Fizik', '2022-12-01 16:02:00'),
(122, 36, 78, 45, 0, 0, 'Fizik', '2022-12-01 16:02:04'),
(123, 37, 65, 56, 74, 65.9, 'Matematik', '2022-12-02 13:20:18'),
(124, 43, 78, 85, 45, 66.9, 'Görsel Sanatlar', '2022-12-02 13:25:57'),
(125, 33, 80, 70, 50, 0, 'Kimya', '2022-12-02 13:46:56'),
(127, 27, 70, 60, 60, 0, 'Kimya', '2022-12-02 13:49:56'),
(128, 28, 80, 74, 52, 0, 'Kimya', '2022-12-02 13:50:11'),
(129, 35, 74, 41, 52, 0, 'Kimya', '2022-12-02 13:50:31'),
(130, 36, 85, 65, 41, 0, 'Kimya', '2022-12-02 13:50:42'),
(131, 37, 80, 74, 41, 0, 'Kimya', '2022-12-02 13:51:01'),
(132, 47, 74, 74, 54, 0, 'Kimya', '2022-12-02 13:55:34'),
(133, 48, 80, 70, 74, 74.6, 'Kimya', '2022-12-02 14:01:20'),
(135, 50, 78, 54, 56, 0, 'Matematik', '2022-12-02 14:11:49'),
(137, 51, 80, 70, 74, 0, 'Edebiyat', '2022-12-02 14:18:50'),
(139, 52, 74, 74, 85, 0, 'Edebiyat', '2022-12-02 14:20:47'),
(140, 34, 74, 54, 75, 68.4, 'Kimya', '2022-12-02 14:31:33'),
(141, 34, 74, 54, 71, 66.8, 'Fizik', '2022-12-02 14:28:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `ogrenci_id` int(11) NOT NULL,
  `ogrenci_adsoyad` varchar(255) NOT NULL,
  `ogrenci_tc` varchar(11) NOT NULL,
  `ogrenci_cinsiyet` varchar(50) NOT NULL,
  `ogrenci_dogum` varchar(50) NOT NULL,
  `ogrenci_adres` varchar(255) NOT NULL,
  `ogrenci_telefon` varchar(20) NOT NULL,
  `ogrenci_resimyol` text NOT NULL,
  `ogrenci_kullanici` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`ogrenci_id`, `ogrenci_adsoyad`, `ogrenci_tc`, `ogrenci_cinsiyet`, `ogrenci_dogum`, `ogrenci_adres`, `ogrenci_telefon`, `ogrenci_resimyol`, `ogrenci_kullanici`) VALUES
(27, 'Hüseyin Ünalan', '20417078188', 'Erkek', '2001-04-05', ' İstanbul ', '5659654488', 'images/ogrenciresimler/26649233422081229937avatar-2.png', ''),
(28, 'Fatma Demir', '92971092818', 'Erkek', '2000-09-08', '   İstanbul  ', '5542563387', 'images/ogrenciresimler/20265310962352428165avatar-6.png', ''),
(29, 'Hülya Yıldırım', '15633762980', 'Erkek', '2000-06-03', ' İstanbul ', '5698958864', 'images/ogrenciresimler/25409274142242021088avatar-5.png', ''),
(30, 'Ahmet Yıldırım', '90575925440', 'Erkek', '2001-07-09', ' İstanbul ', '5566987412', 'images/ogrenciresimler/20408283383143721721avatar-9.png', ''),
(31, 'İlayda Çiçek', '10347615614', 'Kadın', '2000-08-01', 'İstanbul', '5423654125', 'images/ogrenciresimler/24296284882012628643avatar-1.jpg', ''),
(32, 'Yakup Yılmaz', '92243312590', 'Erkek', '2000-05-05', 'İstanbul', '5698741255', 'images/ogrenciresimler/20620282152499522161avatar-2.jpg', ''),
(33, 'Semina Ermiş', '80330620888', 'Kadın', '2000-04-06', 'İstanbul', '5874596321', 'images/ogrenciresimler/21005267242187027093avatar-4.jpg', ''),
(34, 'Emre Göksoy', '36201725848', 'Erkek', '2000-04-08', 'İstanbul', '5522654128', 'images/ogrenciresimler/22325253183055431608avatar-7.jpg', ''),
(35, 'Meliha İzci', '50144187730', 'Kadın', '2000-08-08', 'İstanbul', '6589745412', 'images/ogrenciresimler/27078227012077420790avatar-5.jpg', ''),
(36, 'Sedanur Açar', '84060519924', 'Kadın', '2000-09-18', 'İstanbul', '5698741235', 'images/ogrenciresimler/25256270013115624938avatar-8.jpg', ''),
(37, 'Giray Öz', '53565911588', 'Erkek', '2000-07-12', 'İstanbul', '5487123698', 'images/ogrenciresimler/26619264332443125757avatar-6.jpg', ''),
(54, 'Meltem Gül', '16616789284', 'Kadın', '2001-02-02', 'İstanbul / Kartal', '5695624587', 'images/ogrenciresimler/26740206772106121893ogrenci.webp', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretmen`
--

CREATE TABLE `ogretmen` (
  `ogretmen_id` int(11) NOT NULL,
  `ogretmen_adsoyad` varchar(255) NOT NULL,
  `ogretmen_brans` varchar(50) NOT NULL,
  `ogretmen_resimyol` text NOT NULL,
  `ogretmen_tc` varchar(11) NOT NULL,
  `ogretmen_tel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogretmen`
--

INSERT INTO `ogretmen` (`ogretmen_id`, `ogretmen_adsoyad`, `ogretmen_brans`, `ogretmen_resimyol`, `ogretmen_tc`, `ogretmen_tel`) VALUES
(9, 'Gamze Gül', 'Matematik', 'images/ogretmenresimler/20207275082217820122avatar-3.png', '54442733170', '5596254563'),
(10, 'Filiz Can', 'Türkçe', 'images/ogretmenresimler/25623284882507524486avatar-13.png', '15359261552', '5698741254'),
(11, 'Mert Yıldırım', 'İngilizce', 'images/ogretmenresimler/23462223952354726768avatar-7.png', '71397046322', '5411544545'),
(12, 'Büşra Yılmaz', 'Biyoloji', 'images/ogretmenresimler/28481259433000627181avatar-10.png', '13852191314', '5633254565'),
(13, 'Ahmet Güneş', 'Kimya', 'images/ogretmenresimler/26809300762006927454avatar-16.png', '28102246140', '5896325478'),
(14, 'Samet Gül', 'Tarih', 'images/ogretmenresimler/27182272892546020569avatar-18.png', '58775833286', '569874236'),
(15, 'Kübra Gündoğdu', 'Fizik', 'images/ogretmenresimler/24171299932035825360avatar-17.png', '21446720130', '5641236545'),
(23, 'Ezgi Deniz', 'Görsel Sanatlar', 'images/ogretmenresimler/30743313223010121928ogretmen.webp', '42530015932', '5541257854');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takvim`
--

CREATE TABLE `takvim` (
  `takvim_id` int(11) NOT NULL,
  `takvim_baslik` varchar(255) NOT NULL,
  `takvim_tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `takvim`
--

INSERT INTO `takvim` (`takvim_id`, `takvim_baslik`, `takvim_tarih`) VALUES
(4, 'Matematik - Ders', '2022-12-01 09:00:00'),
(5, 'Matematik - Ders', '2022-12-01 10:00:00'),
(6, 'Türkçe - Ders', '2022-12-01 11:00:00'),
(7, 'Türkçe - Ders', '2022-12-01 12:00:00'),
(8, 'Biyoloji - Ders', '2022-12-02 09:00:00'),
(9, 'Biyoloji - Ders', '2022-12-02 10:00:00'),
(10, 'Kimya - Ders', '2022-12-02 11:00:00'),
(11, 'Kimya - Ders', '2022-12-02 12:00:00'),
(12, 'Fizik - Ders', '2022-12-03 15:00:00'),
(13, 'Fizik - Ders', '2022-12-03 16:00:00'),
(14, 'Tarih - Ders', '2022-12-04 12:00:00'),
(15, 'Tarih - Ders', '2022-12-04 13:00:00'),
(16, 'İngilizce - Ders', '2022-12-04 14:00:00'),
(17, 'İngilizce - Ders', '2022-12-04 15:00:00'),
(32, 'Matematik - Ders', '2022-11-28 12:00:00'),
(33, 'Matematik - Ders', '2022-11-28 13:00:00'),
(35, 'Kimya - Ders', '2022-11-27 18:00:00'),
(36, 'Kimya - Ders', '2022-11-27 17:00:00'),
(37, 'Türkçe - Ders', '2022-11-29 14:30:00'),
(38, 'Türkçe - Ders', '2022-11-29 15:30:00'),
(39, 'Tarih - Ders', '2022-11-30 15:00:00'),
(40, 'Tarih - Ders', '2022-11-30 16:00:00'),
(41, 'Matematik - Ders', '2022-12-05 09:00:00'),
(42, 'Matematik - Ders', '2022-12-05 10:00:00'),
(43, 'Türkçe - Ders', '2022-12-05 11:00:00'),
(44, 'Türkçe - Ders', '2022-12-05 12:00:00'),
(45, 'Biyoloji - Ders', '2022-12-06 09:00:00'),
(46, 'Biyoloji - Ders', '2022-12-06 10:00:00'),
(47, 'Kimya - Ders', '2022-12-06 11:00:00'),
(48, 'Kimya - Ders', '2022-12-06 12:00:00'),
(49, 'Fizik - Ders', '2022-12-07 15:00:00'),
(50, 'Fizik - Ders', '2022-12-07 16:00:00'),
(51, 'Tarih - Ders', '2022-12-08 12:00:00'),
(52, 'Tarih - Ders', '2022-12-08 13:00:00'),
(53, 'İngilizce - Ders', '2022-12-08 14:00:00'),
(54, 'İngilizce - Ders', '2022-12-08 15:00:00'),
(55, 'Matematik - Ders', '2022-12-09 12:00:00'),
(56, 'Matematik - Ders', '2022-12-09 13:00:00'),
(57, 'Kimya - Ders', '2022-12-10 18:00:00'),
(58, 'Kimya - Ders', '2022-12-10 00:00:00'),
(59, 'Türkçe - Ders', '2022-12-11 14:30:00'),
(60, 'Türkçe - Ders', '2022-12-11 15:30:00'),
(61, 'Tarih - Ders', '2022-12-12 15:00:00'),
(62, 'Tarih - Ders', '2022-12-12 16:00:00'),
(63, 'Matematik - Ders', '2022-12-13 09:00:00'),
(64, 'Matematik - Ders', '2022-12-13 10:00:00'),
(65, 'Türkçe - Ders', '2022-12-13 11:00:00'),
(66, 'Türkçe - Ders', '2022-12-13 12:00:00'),
(67, 'Biyoloji - Ders', '2022-12-14 09:00:00'),
(68, 'Biyoloji - Ders', '2022-12-14 10:00:00'),
(69, 'Kimya - Ders', '2022-12-14 11:00:00'),
(70, 'Kimya - Ders', '2022-12-14 12:00:00'),
(71, 'Fizik - Ders', '2022-12-15 15:00:00'),
(72, 'Fizik - Ders', '2022-12-15 16:00:00'),
(73, 'Tarih - Ders', '2022-12-16 12:00:00'),
(74, 'Tarih - Ders', '2022-12-16 13:00:00'),
(75, 'İngilizce - Ders', '2022-12-16 14:00:00'),
(76, 'İngilizce - Ders', '2022-12-16 15:00:00'),
(77, 'Matematik - Ders', '2022-12-17 09:00:00'),
(78, 'Matematik - Ders', '2022-12-17 10:00:00'),
(79, 'Türkçe - Ders', '2022-12-17 11:00:00'),
(80, 'Türkçe - Ders', '2022-12-17 12:00:00'),
(81, 'Biyoloji - Ders', '2022-12-18 09:00:00'),
(82, 'Biyoloji - Ders', '2022-12-18 10:00:00'),
(83, 'Kimya - Ders', '2022-12-18 11:00:00'),
(84, 'Kimya - Ders', '2022-12-18 12:00:00'),
(85, 'Fizik - Ders', '2022-12-19 15:00:00'),
(86, 'Fizik - Ders', '2022-12-19 16:00:00'),
(87, 'Tarih - Ders', '2022-12-20 12:00:00'),
(88, 'Tarih - Ders', '2022-12-20 13:00:00'),
(89, 'İngilizce - Ders', '2022-12-21 14:00:00'),
(90, 'İngilizce - Ders', '2022-12-21 15:00:00'),
(91, 'Matematik - Ders', '2022-12-22 09:00:00'),
(92, 'Matematik - Ders', '2022-12-22 10:00:00'),
(93, 'Türkçe - Ders', '2022-12-23 11:00:00'),
(94, 'Türkçe - Ders', '2022-12-23 12:00:00'),
(95, 'Biyoloji - Ders', '2022-12-24 09:00:00'),
(96, 'Biyoloji - Ders', '2022-12-24 10:00:00'),
(97, 'Kimya - Ders', '2022-12-25 11:00:00'),
(98, 'Kimya - Ders', '2022-12-25 12:00:00'),
(99, 'Fizik - Ders', '2022-12-26 15:00:00'),
(100, 'Fizik - Ders', '2022-12-26 16:00:00'),
(101, 'Tarih - Ders', '2022-12-27 12:00:00'),
(102, 'Tarih - Ders', '2022-12-27 13:00:00'),
(103, 'İngilizce - Ders', '2022-12-28 14:00:00'),
(104, 'İngilizce - Ders', '2022-12-28 15:00:00'),
(105, 'Matematik - Ders', '2022-12-29 09:00:00'),
(106, 'Matematik - Ders', '2022-12-29 10:00:00'),
(107, 'Türkçe - Ders', '2022-12-29 11:00:00'),
(108, 'Türkçe - Ders', '2022-12-29 12:00:00'),
(109, 'Biyoloji - Ders', '2022-12-30 09:00:00'),
(110, 'Biyoloji - Ders', '2022-12-30 10:00:00'),
(113, 'Tatil - Yılbaşı ', '2022-12-31 00:00:00'),
(121, 'Fizik - Ders Tekrar', '2022-12-02 19:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`ders_id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`duyuru_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `notlar`
--
ALTER TABLE `notlar`
  ADD PRIMARY KEY (`not_id`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`ogrenci_id`);

--
-- Tablo için indeksler `ogretmen`
--
ALTER TABLE `ogretmen`
  ADD PRIMARY KEY (`ogretmen_id`);

--
-- Tablo için indeksler `takvim`
--
ALTER TABLE `takvim`
  ADD PRIMARY KEY (`takvim_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `ders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `duyuru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `notlar`
--
ALTER TABLE `notlar`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `ogretmen`
--
ALTER TABLE `ogretmen`
  MODIFY `ogretmen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `takvim`
--
ALTER TABLE `takvim`
  MODIFY `takvim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
