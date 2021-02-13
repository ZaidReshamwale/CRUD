-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2021 at 08:43 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `empid` int(100) NOT NULL AUTO_INCREMENT,
  `ename` varchar(200) NOT NULL,
  `eemail` varchar(200) NOT NULL,
  `ephone` varchar(50) NOT NULL,
  `eimage` longtext NOT NULL,
  `egender` varchar(10) NOT NULL,
  `eaddress` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`empid`),
  UNIQUE KEY `eemail` (`eemail`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empid`, `ename`, `eemail`, `ephone`, `eimage`, `egender`, `eaddress`, `city`, `district`, `state`, `country`, `status`) VALUES
(36, 'Zeeeba R', 'zeeba@outlook.com', '9035486846', 'http://localhost/CRUD/images/162816883.jpg', '2', 'NG Platinum City Flat 124', 'Malabar Hill', 'Mumbai', 'Maharashtra', 'India', 1),
(33, 'MohammedZaid ', 'zaidreshamwale@yahoo.com', '9035486843', 'http://localhost/CRUD/images/1542220775.jpg', '1', 'H/NO 192-C Hashmi Manzil 7th Cross Shantineketan Bhiredverkoppa.', 'Amragol', 'Dharwad', 'Karnataka', 'India', 1),
(34, 'Zainab', 'zainab@gmail.com', '9448486842', 'http://localhost/CRUD/images/1744863606.jpg', '2', 'International Tech Park ADA Apartment . ', 'EPIP', 'Bangalore', 'Karnataka', 'India', 1),
(35, 'Someone', 'someon@anybody.com', '7894561238', 'http://localhost/CRUD/images/profile.jpg', '3', 'Risland Sky Mansion Apartment.', 'Chand Pur', 'North West Delhi', 'Delhi', 'India', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
