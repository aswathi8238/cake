-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 29, 2021 at 05:37 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_email`) VALUES
(1, 'sabujitht@gmail.com'),
(2, 'sabujitht@gmail.com'),
(3, 'sabujitht@gmail.com'),
(4, 'sabujitht@gmail.com'),
(5, 'sa@gmail.com'),
(6, 'sa1@gmail.com'),
(7, 'ashik@gmail.com'),
(8, 'ashik3k@gmail.com'),
(9, 'sa1111@gmail.com');

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
  `discount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cake`
--

INSERT INTO `tbl_cake` (`id`, `cake_name`, `category_name`, `cake_price`, `photo`, `caker_id`, `discount`) VALUES
(13, 'Red Velvet', 'Cream Cream', '450', 'img/shop/product-4.jpg', 0, 15),
(15, 'Black Velvet', 'Cream Cream', '450', 'img/shop/product-10.jpg', 0, 0),
(16, 'Yellow Velvet', 'Vanila', '2300', 'img/shop/product-1.jpg', 0, 0),
(18, 'White Velvet', 'Vanila Cake', '3200', 'img/shop/product-9.jpg', 2, 10),
(19, 'Kit Kat Cake', 'Chocolate Cake', '620', 'img/shop/kit-kat-cake-1kg_1.jpg', 2, 0),
(20, 'Design Cake', 'Strawberry Cake', '800', 'img/shop/hg_designcake17.jpg', 2, 0),
(21, 'Cartoon Design Cake', 'Strawberry Cake', '750', 'img/shop/des.jpg', 2, 0),
(22, 'Cartoon Cake', 'Fruit Cake', '500', 'img/shop/des.jpg', 2, 0),
(23, 'Black Velvet', 'Blueberry Cake', '3200', 'img/shop/chocolate-truffle-1-kg-500x500.png', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caker`
--

DROP TABLE IF EXISTS `tbl_caker`;
CREATE TABLE IF NOT EXISTS `tbl_caker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 ,
  `email` varchar(100) CHARACTER SET utf8mb4 ,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Deactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_caker`
--

INSERT INTO `tbl_caker` (`id`, `firstname`, `address`, `email`, `password`, `gender`, `mobile`, `status`) VALUES
(2, 'CAKER 1', 'PONNANI', 'C1', '123', '', '', 'Active'),
(3, 'caker 1', 'edappal', 'c1@gmail.com', 'Aptech@123', 'male', '9995258565', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`) VALUES
(1, 'Cream Cake'),
(3, 'Vanila Cake'),
(5, 'Chocolate Cake'),
(6, 'Fruit Cake'),
(7, 'Cheese Cake'),
(8, 'Blueberry Cake'),
(9, 'Butterscotch Cake'),
(10, 'Pineapple Cake'),
(11, 'Strawberry Cake');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_customised_cake`
--

INSERT INTO `tbl_customised_cake` (`id`, `firstname`, `phone`, `email`, `requirements`, `status`) VALUES
(3, 'shibin', '', 's@gmail.com', '', 'Pending'),
(4, 'sas', '998877', 'sdsds', '', 'Ordered'),
(5, 'sds', '', '', 'sdsadsa', 'Ordered'),
(6, 'sds', '', '', 'sdsadsa', 'Ordered'),
(7, 'sa', 'wewe', 'wewe@gmail.com', 'sdsds', 'Ordered'),
(8, 'asa', '9633006306', 'sas@gmail.com', 'asas', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cancel_time`
--

DROP TABLE IF EXISTS `tbl_order_cancel_time`;
CREATE TABLE IF NOT EXISTS `tbl_order_cancel_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cancelling_time` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;

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
(9, 'sas', 'admin@gmail.com', 'Aptech@12345', 12121212, 'male', 'asasas'),
(10, 'syam', 'admin@gmail.com', 'Aptech@12345', 9995258565, 'male', 'asasa');

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
  `status` varchar(20) CHARACTER SET utf8mb4 DEFAULT 'Ordered',
  `caker_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_order`
--

INSERT INTO `tbl_user_order` (`id`, `cake_info`, `weight`, `quantity`, `delivery_date`, `delivery_time`, `price`, `total`, `user_id`, `status`, `caker_id`, `firstname`, `email`, `address`, `city`, `state`, `zip`, `modeOfPayment`, `mobile`) VALUES
(12, 'Yellow Velvet', '1', 1, '2021-12-02', '04.00 PM', '2300', '2300', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(2, 'Red Velvet', '1', 1, '2021-11-30', '10.00 AM', '450', '900', 3, 'Cancelled', 0, '', '', '', '', '', 0, '', ''),
(3, 'White Velvet', '1', 1, '2021-11-27', '10.00 AM TO 12.00 PM', '3200', '12', 3, 'Cancelled', 2, '', '', '', '', '', 0, '', ''),
(4, 'Black Velvet', '2', 2, '2021-11-27', '02.00 PM', '450', '1800', 3, 'Delivered', 2, '', '', '', '', '', 0, '', ''),
(5, 'Red Velvet', '2', 2, '2021-11-30', '08.00 PM', '450', '1800', 3, 'Received', 0, '', '', '', '', '', 0, '', ''),
(6, 'Yellow Velvet', '2', 3, '2021-12-01', '12.00 PM', '2300', '10350', 3, 'Pending', 0, '', '', '', '', '', 0, '', ''),
(13, 'White Velvet', '1', 1, '2021-12-02', '02.00 PM', '3200', '3200', 3, 'Ordered', 2, '', '', '', '', '', 0, '', ''),
(8, 'Yellow Velvet', '2', 1, '2021-11-30', '10.00 AM', '2300', '4600', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(14, 'Red Velvet', '1', 2, '2021-12-01', '10.00 AM', '450', '900', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(10, 'Yellow Velvet', '2', 1, '2021-11-16', '04.00 PM', '2300', '4600', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(11, 'White Velvet', '2', 1, '2021-11-29', '12.00 PM', '3200', '6400', 3, 'Delivered', 2, '', '', '', '', '', 0, '', ''),
(15, 'White Velvet', '1', 1, '2021-12-02', '12.00 PM', '3200', '4100', 3, 'Cancelled', 2, '', '', '', '', '', 0, '', ''),
(16, 'Black Velvet', '1', 1, '2021-12-01', '04.00 PM', '450', '4550', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(17, 'Red Velvet', '1', 1, '2021-11-30', '12.00 PM', '450', '450', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(18, 'Black Velvet', '1', 2, '2021-12-11', '12.00 PM', '450', '900', 3, 'Ordered', 0, '', '', '', '', '', 0, '', ''),
(19, 'White Velvet', '1', 1, '2021-12-24', '12.00 PM', '3200', '3200', 3, 'Cancelled', 2, 'sabujith t', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(20, 'Red Velvet', '1', 1, '2021-12-22', '02.00 PM', '450', '450', 3, 'Cancelled', 0, 'sabujith ttt', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(21, 'White Velvet', '1', 2, '2021-12-29', '02.00 PM', '3200', '6400', 3, 'Cancelled', 2, 'sabujith ttt', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(22, 'Red Velvet', '1', 1, '2021-12-13', '12.00 PM', '450', '450', 3, 'Ordered', 0, 'sabujith t', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(23, 'White Velvet', '1', 2, '2021-12-13', '02.00 PM', '3200', '6400', 3, 'Ordered', 2, 'sabujith t', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(24, 'White Velvet', '1', 1, '2021-12-14', '06 PM', '3200', '2880', 3, 'Ordered', 2, 'sabujith t', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal, Malappuram 679576', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', ''),
(25, 'Yellow Velvet', '1', 1, '2021-12-28', '10.00 AM', '2300', '2300', 3, 'Ordered', 0, 'sabujith t', 'sabujitht@gmail.com', 'Aptech compter education ,2nd floor Cresent plaza building  Calicut road Edappal', 'Edappal', 'Kerala', 679576, 'Cash On Delivery', '9999111111');

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
  `place` varchar(100) NOT NULL,
  `display` varchar(10) NOT NULL DEFAULT 'No',
  `status` varchar(10) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `name`, `email`, `type`, `message`, `place`, `display`, `status`) VALUES
(1, 'Kerry D.Silva', 'sabujitht@gamil.com', 'Feedback', 'Absolutely love it....thank you so much for making this birthday so special', 'Kottayam', 'Yes', 'No'),
(2, 'Kevin', 'sabujitht@gamil.com', 'Feedback', 'Thank you for the delicious cake and that too before the promised time which isn\'t so common. You guys are doing great', 'Alappuzha', 'Yes', 'No'),
(4, 'Jose', 'sabujitht@gmail.com', 'Feedback', 'Thank you so much for the delicious cake. Cake was rich in flavour and the taste was just perfect. Everyone loved it. I\'m seriously counting down till next event to order again.', 'Cochin', 'Yes', 'No'),
(5, 'Shain', 'sabujitht@gmail.com', 'Feedback', 'Thank you so much for doing such a great job with the cake. My husband absolutely loved it.Tasted great too.', 'Kozhikode', 'Yes', 'No'),
(6, 'Praveen', 'p@gmail.com', 'Feedback', 'Thank you so much for the fabulous cake, my kids did love the cake...', 'Thrissur', 'Yes', 'No'),
(7, 'sabujith t', 'sabujitht@gmail.com', 'Complaint', 'asa', '', 'Yes', 'No');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
