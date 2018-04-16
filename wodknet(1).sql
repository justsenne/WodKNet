-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 16 apr 2018 om 11:33
-- Serverversie: 5.7.19
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wodknet`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(255) NOT NULL,
  `article_description` text NOT NULL,
  `article_price` varchar(11) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_description`, `article_price`, `article_image`, `created_at`) VALUES
(24, '1060 6gb', 'goede videokaart', '400', '5ad48926049576.97558781.jpg', '2018-04-16 13:29:42'),
(25, 'pcu koeler', 'hele goede koeler', '25', '5ad48945581820.84081074.jpeg', '2018-04-16 13:30:13'),
(26, 'intel core i7', 'hele goede proccesor', '500', '5ad4895fad9a95.88457616.jpg', '2018-04-16 13:30:39'),
(27, 'geforce titan x', 'extreem goede gpu', '1200', '5ad4898e4d79d2.59838677.jpg', '2018-04-16 13:31:26'),
(28, 'gouden case', 'hele mooie case! extreem goed!', '50000', '5ad489b12cc034.16597102.jpg', '2018-04-16 13:32:01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `article_id`, `rating`, `comment`, `created_at`) VALUES
(7, 8, 22, '5', '8 is userid die we nog moeten converten', '2018-04-16 12:08:18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `ordered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `place` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `house_number` int(11) NOT NULL,
  `zip_code` varchar(7) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT '0',
  `newsletter` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `surname`, `phone`, `place`, `adress`, `house_number`, `zip_code`, `rank`, `newsletter`, `created_at`) VALUES
(8, 'senne1320@gmail.com', '$2y$10$DfZF5SfzPDOgMHoC8KCDXe8e5Nx14BQws0UWFMnUNpMVGjtaAM.I.', 'Senne', 'de Valk', 615603076, 'Wilp', 'dijkweideweg', 1, '7384BS', 1, 0, '2018-04-13 22:43:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
