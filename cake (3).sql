-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 29, 2021 at 12:35 PM
-- Server version: 8.0.18
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cake`
--

DROP TABLE IF EXISTS `tbl_cake`;
CREATE TABLE IF NOT EXISTS `tbl_cake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_name` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `cake_price` decimal(10,0) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `caker_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cake`
--

INSERT INTO `tbl_cake` (`id`, `cake_name`, `category_name`, `cake_price`, `photo`, `caker_id`) VALUES
(13, 'Red Velvet', 'Cream Cream', '450', 'img/shop/product-4.jpg', 0),
(15, 'Black Velvet', 'Cream Cream', '450', 'img/shop/product-10.jpg', 0),
(16, 'Yellow Velvet', 'Vanila', '2300', 'img/shop/product-1.jpg', 0),
(18, 'White Velvet', 'Vanila', '3200', 'img/shop/product-4.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caker`
--

DROP TABLE IF EXISTS `tbl_caker`;
CREATE TABLE IF NOT EXISTS `tbl_caker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_caker`
--

INSERT INTO `tbl_caker` (`id`, `firstname`, `location`, `username`, `password`) VALUES
(2, 'CAKER 1', 'PONNANI', 'C1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`) VALUES
(1, 'Cream Cream'),
(3, 'Vanila');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customised_cake`
--

DROP TABLE IF EXISTS `tbl_customised_cake`;
CREATE TABLE IF NOT EXISTS `tbl_customised_cake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `requirements` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Ordered',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_customised_cake`
--

INSERT INTO `tbl_customised_cake` (`id`, `firstname`, `phone`, `email`, `requirements`, `status`) VALUES
(3, 'sabujith t', '', 'sabujitht@gmail.com', '', 'Pending'),
(4, 'sas', '998877', 'sdsds', '', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cancel_time`
--

DROP TABLE IF EXISTS `tbl_order_cancel_time`;
CREATE TABLE IF NOT EXISTS `tbl_order_cancel_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cancelling_time` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_cancel_time`
--

INSERT INTO `tbl_order_cancel_time` (`id`, `cancelling_time`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_limit`
--

DROP TABLE IF EXISTS `tbl_order_limit`;
CREATE TABLE IF NOT EXISTS `tbl_order_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_limit` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_limit`
--

INSERT INTO `tbl_order_limit` (`id`, `order_limit`) VALUES
(1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `mobile`, `gender`, `address`) VALUES
(3, 'Rahul', 'u', 'u', 9999111111, 'male', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal\r\nMalappuram 679576'),
(4, 'asas', '', 'qwqwq', 12121212, '', '  '),
(5, 'sa', 'asa', 'asas', 3232323, 'male', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal\r\nMalappuram 679576'),
(6, 'Customer 1', 'customer1@gmail.com', 'Aptech@12345', 9999111111, 'male', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal\r\nMalappuram 679576'),
(7, 'Customer 2', 'c2@gmail.com', 'Customer@123', 9999111111, 'male', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal\r\nMalappuram 679576'),
(8, 'dssd', 'admin', 'Aptech@12345', 2323, 'male', '  '),
(9, 'sas', 'admin@gmail.com', 'Aptech@12345', 12121212, 'male', 'asasas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_order`
--

DROP TABLE IF EXISTS `tbl_user_order`;
CREATE TABLE IF NOT EXISTS `tbl_user_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_info` varchar(50) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Ordered',
  `caker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user_order`
--

INSERT INTO `tbl_user_order` (`id`, `cake_info`, `weight`, `quantity`, `delivery_date`, `delivery_time`, `price`, `total`, `user_id`, `status`, `caker_id`) VALUES
(12, 'Yellow Velvet', '1', 1, '2021-12-02', '04.00 PM', '2300', '2300', 3, 'Ordered', 0),
(2, 'Red Velvet', '1', 1, '2021-11-30', '10.00 AM', '450', '900', 3, 'Cancelled', 0),
(3, 'White Velvet', '1', 1, '2021-11-27', '10.00 AM TO 12.00 PM', '3200', '12', 3, 'Cancelled', 2),
(4, 'Black Velvet', '2', 2, '2021-11-27', '02.00 PM', '450', '1800', 3, 'Delivered', 2),
(5, 'Red Velvet', '2', 2, '2021-11-30', '08.00 PM', '450', '1800', 3, 'Received', 0),
(6, 'Yellow Velvet', '2', 3, '2021-12-01', '12.00 PM', '2300', '10350', 3, 'Pending', 0),
(13, 'White Velvet', '1', 1, '2021-12-02', '02.00 PM', '3200', '3200', 3, 'Ordered', 2),
(8, 'Yellow Velvet', '2', 1, '2021-11-30', '10.00 AM', '2300', '4600', 3, 'Ordered', 0),
(14, 'Red Velvet', '1', 2, '2021-12-01', '10.00 AM', '450', '900', 3, 'Ordered', 0),
(10, 'Yellow Velvet', '2', 1, '2021-11-16', '04.00 PM', '2300', '4600', 3, 'Ordered', 0),
(11, 'White Velvet', '2', 1, '2021-11-29', '12.00 PM', '3200', '6400', 3, 'Delivered', 2),
(15, 'White Velvet', '1', 1, '2021-12-02', '12.00 PM', '3200', '4100', 3, 'Cancelled', 2),
(16, 'Black Velvet', '1', 1, '2021-12-01', '04.00 PM', '450', '4550', 3, 'Ordered', 0),
(17, 'Red Velvet', '1', 1, '2021-11-30', '12.00 PM', '450', '450', 3, 'Ordered', 0),
(18, 'Black Velvet', '1', 2, '2021-12-11', '12.00 PM', '450', '900', 3, 'Ordered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `name`, `email`, `type`, `message`) VALUES
(1, 'sabujith t', 'sabujitht@gamil.com', 'feedback', 'good'),
(2, 'ashik', 'sabujitht@gamil.com', 'complaint', 'good');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
