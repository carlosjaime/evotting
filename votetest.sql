-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2016 at 03:52 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `votetest`
--
CREATE DATABASE IF NOT EXISTS `votetest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `votetest`;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_vote` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `candidates_candidate_id_index` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `num_of_vote`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'olaoluwa olorunda', 5, '3729.png', 1, '2016-05-07 18:22:50', '2016-05-08 10:44:13'),
(12, 'adefila', 22, '1908.png', 1, '2016-05-07 18:29:35', '2016-05-08 10:18:24'),
(13, 'olabi onabanjo', 1, '4520.png', 1, '2016-05-08 03:57:14', '2016-05-08 12:31:10'),
(14, 'Adejare Bello', 1, '2615.png', 3, '2016-05-08 13:37:07', '2016-05-08 13:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Governor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Senator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Chairman', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_07_154125_create_candidates_table', 1),
('2016_05_07_154147_create_categories_table', 1),
('2016_05_07_154228_create_voteds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voteds`
--

CREATE TABLE IF NOT EXISTS `voteds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `voteds_user_id_index` (`user_id`),
  KEY `voteds_category_id_index` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `voteds`
--

INSERT INTO `voteds` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 8, 1, '2016-05-08 10:44:13', '2016-05-08 10:44:13'),
(3, 9, 1, '2016-05-08 12:31:10', '2016-05-08 12:31:10'),
(4, 9, 3, '2016-05-08 13:37:41', '2016-05-08 13:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Adebola Muhammed', 'olorundaolaoluwa@gmail.com', '$2y$10$fvtaVS7XSOvYA8HCbCryD.yo8gHgF9KzWeWZvNYCkSqhF5zG9AP8K', NULL, '2016-05-07 15:38:18', '2016-05-07 15:38:18', 0),
(2, 'i', 'i@i.com', '$2y$10$LQpbyjnhMzoQ9sHly72WYOGwj1mGRf7etdMIe9E.93YRbWzUX2I9a', 'Dv7BTML09UShwih9MdxFE035DXdkRkdJOBo9lAbjVyfMQbKW5sVStOxraRCm', '2016-05-07 15:57:03', '2016-05-08 13:37:29', 1),
(4, 'uyii', 'yy@jj.com', '$2y$10$q62s2ed.bzwHgvyHTT2P6.RJ/3oTwm1doUQoRqHZ27HcD4QS5OKk.', NULL, '2016-05-07 16:39:47', '2016-05-07 16:39:47', 0),
(5, 'errty', 'tgf@hg.com', '$2y$10$CEcnZABcgqMXfIrV9p5F/uaNJ7eYmHXMDneGdnxPNHr7C9XGfaW7a', NULL, '2016-05-07 16:40:41', '2016-05-07 16:40:41', 0),
(6, 'ujnik', 'hjmn@k.vv', '$2y$10$2fS4SViVZeOid9j4d4uH.ONcyFIMfmT5dKgrcPnDlq/3aDN8mODd.', NULL, '2016-05-07 16:59:54', '2016-05-07 16:59:54', 0),
(7, 'olorunda jebutu', 'jebutu@h.com', '$2y$10$FB6ffqXdlRnHuC.5dJTwiuFjANHJxxoYq0/si7FOxIEWqJ.6p6mGS', NULL, '2016-05-07 20:41:32', '2016-05-07 20:41:32', 0),
(8, 'Adelowokan bimbo', 'ade@gmail.com', '$2y$10$XYY67pD6./7S1w.1O7vTUuL04.ADgoPWNEfT7BySmnl75ybrdFeI.', 'QaL6Su8nHb9CJvJFG8rb1hrdmWQg5o2YjvaGqR9uBnGhwTogq50tRKDOQWPX', '2016-05-08 04:25:40', '2016-05-08 10:44:30', 0),
(9, 'olaoluwa aderoju', 'ola@gmail.com', '$2y$10$2fHxBTFASekw.BcoJ4vc9OEv2buoAl2LqlpdW4hXgE8DZRVqs4c8e', 'tL9uDYcbOJl3weD2vVTAmCsEokXqDopSLwYVYTij9UZBhgWpY53SoqA386GO', '2016-05-08 12:26:11', '2016-05-08 13:38:50', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
