-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 05 Haz 2023, 06:35:38
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `cat_subtitle` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_subtitle`) VALUES
(1, 'Deneme', 'deneme'),
(2, 'Deneme2', ''),
(3, 'Deneme3', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `writer_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `article` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `post`
--

INSERT INTO `post` (`id`, `cat_id`, `writer_id`, `title`, `article`, `date`) VALUES
(1, 1, 1, 'Deneme1', 'deneme1', '2023-06-04 15:05:02'),
(2, 2, 2, 'Deneme2', 'deneme2', '2023-06-04 15:08:23'),
(3, 3, 3, 'Deneme3', 'deneme3', '2023-06-04 15:09:42'),
(4, 1, 4, 'Deneme4', 'deneme4', '2023-06-04 15:24:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

DROP TABLE IF EXISTS `writers`;
CREATE TABLE IF NOT EXISTS `writers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `writer_name` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `writer_name`) VALUES
(1, 'Asd'),
(2, 'Deneme2'),
(3, 'Deneme3'),
(4, 'Deneme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
