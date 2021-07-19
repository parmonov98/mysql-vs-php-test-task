-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+focal1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2021 at 10:00 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `php_users`
--

CREATE TABLE `php_users` (
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `checkbox` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php_users`
--

INSERT INTO `php_users` (`tel`, `email`, `name`, `text`, `checkbox`) VALUES
('+7-916-0000000', 'prost@ta.ru', 'Иван', 'большой или маленький текст', 1),
('+7-916-000-0000', 'prost@ta2.ru', 'Иван2', 'большой или маленький текст', 1),
('+7-916-000-00-00', 'prost@ta3.ru', 'Иван3', 'большой или маленький текст', 1),
('3432423', 'prost@ta4.ru', 'Иван4', 'большой или маленький текст', 1),
('21651561', 'test5@test.ru', 'test5', 'askj asj ajelfsefse sefse', NULL),
('2342342', 'test@test.ru', 'sldk fskf', 'd; kdfl ld kfsdkf s;ldkf;sl', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
