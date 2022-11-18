-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 12:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `shoeArtifact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `gender`, `age`, `cost`, `shoeArtifact`) VALUES
(1, 'Men Sneakers', 'male', 'adult', 100, '/Images/Male Shoes 1.jpg'),
(2, 'Men Sneakers', 'male', 'adult', 120, '/Images/Male Shoes 2.jpg'),
(3, 'Dress Shoes', 'male', 'adult', 55, '/Images/Male Shoes 3.jpg'),
(4, 'Dress Shoes', 'male', 'adult', 50, '/Images/Male Shoes 4.jpg'),
(5, 'High Heels', 'female', 'adult', 200, '/Images/Female Shoes 1.jpg'),
(6, 'High Heels', 'female', 'adult', 50, '/Images/Female Shoes 2.jpg'),
(7, 'High Heels', 'female', 'adult', 150, '/Images/Female Shoes 3.jpg'),
(8, 'High Heels', 'female', 'adult', 300, '/Images/Female Shoes 4.jpg'),
(9, 'Boy Sneakers', 'male', 'child', 125, '/Images/Child Male 1.jpg'),
(10, 'Female Sneakers', 'female', 'child', 75, '/Images/Child Feale 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
