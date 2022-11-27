-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 01:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `shoeArtifact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `gender`, `age`, `cost`, `shoeArtifact`) VALUES
(1, 'Men Sneakers', 'male', 'adult', 100, '/Images/popular1.jpg'),
(2, 'Men Sneakers', 'male', 'adult', 120, '/Images/popular2.jpg'),
(3, 'Dress Shoes', 'male', 'adult', 55, '/Images/popular3.jpg'),
(4, 'Dress Shoes', 'male', 'adult', 50, '/Images/popular4.jpg'),
(5, 'High Heels', 'female', 'adult', 200, '/Images/Female Shoes 1.jpg'),
(6, 'High Heels', 'female', 'adult', 50, '/Images/Female Shoes 2.jpg'),
(7, 'High Heels', 'female', 'adult', 150, '/Images/Female Shoes 3.jpg'),
(8, 'High Heels', 'female', 'adult', 300, '/Images/Female Shoes 4.jpg'),
(9, 'Boy Sneakers', 'male', 'child', 125, '/Images/Child Male 1.jpg'),
(10, 'Female Sneakers', 'female', 'child', 75, '/Images/Child Female 1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `shoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
