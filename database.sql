-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2026 at 02:27 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_task2`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `notes` text,
  `follow_up` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `source`, `status`, `notes`, `follow_up`, `created_at`) VALUES
(10, 'Tanni', 'Tanni@gmail.com', 'Facebook', 'Contacted', 'Heyy', 'Remainder', '2026-02-25 14:04:04'),
(4, 'mom', 'mom@gmail.com', 'Insta', 'Contacted', 'Best experience ', 'Next call', '2026-02-19 18:26:44'),
(9, 'varsha', 'varsha@gmail.com', 'LinkedIn', 'New', 'Hello', 'Calls', '2026-02-25 14:01:26'),
(6, 'dad', 'dad@gmail.com', 'whatsapp', 'Converted', 'superr', 'remainder', '2026-02-21 16:36:09'),
(7, 'viddu', 'viddu@gmail.com', 'twitter', 'Converted', 'Best', 'send sms', '2026-02-24 14:42:37'),
(11, 'Bhoomi', 'Bhoomi@gmail.com', 'Insta', 'New', 'I am bhoomi', 'SMS', '2026-02-25 14:12:40'),
(12, 'Choudi', 'Choudi@gmail.com', 'Website', 'Contacted', 'Hiii', 'Call', '2026-02-25 14:14:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
