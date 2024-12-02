-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 15, 2021 at 05:05 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `em`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_vaccination`
--

DROP TABLE IF EXISTS `employee_vaccination`;
CREATE TABLE IF NOT EXISTS `employee_vaccination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `vaccine_name` varchar(40) NOT NULL,
  `first_dose` datetime DEFAULT NULL,
  `second_dose` datetime DEFAULT NULL,
  `vaccinated_country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_vaccination`
--

INSERT INTO `employee_vaccination` (`id`, `emp_id`, `vaccine_name`, `first_dose`, `second_dose`, `vaccinated_country`) VALUES
(16, 3, 'Oxford/AstraZeneca (Covishield)', '2021-09-12 00:00:00', '2021-09-14 00:00:00', 'Algeria'),
(15, 1, 'Sinopharm', '2021-09-13 00:00:00', '2021-09-14 00:00:00', 'Algeria'),
(17, 235, 'Sputnik V', '2021-08-31 00:00:00', '2021-09-01 00:00:00', 'India'),
(18, 6, 'Moderna', '2021-08-30 00:00:00', '2021-08-31 00:00:00', 'Japan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
