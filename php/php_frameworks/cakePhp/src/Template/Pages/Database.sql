-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 09:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_database`
--
CREATE DATABASE IF NOT EXISTS `new_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `new_database`;

-- --------------------------------------------------------

--
-- Table structure for table `angular_data`
--

CREATE TABLE `angular_data` (
  `id` int(7) NOT NULL,
  `minvalue` varchar(50) NOT NULL,
  `maxvalue` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angular_data`
--

INSERT INTO `angular_data` (`id`, `minvalue`, `maxvalue`, `code`, `value`) VALUES
(1, '0', '50', '#00ff00', '67'),
(2, '50', '75', '#f00000', '67'),
(3, '75', '100', '#6baa01', '67');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angular_data`
--
ALTER TABLE `angular_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angular_data`
--
ALTER TABLE `angular_data`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
