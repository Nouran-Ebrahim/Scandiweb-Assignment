-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 03:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `size` float UNSIGNED DEFAULT NULL,
  `weight` float UNSIGNED DEFAULT NULL,
  `height` float UNSIGNED DEFAULT NULL,
  `width` float UNSIGNED DEFAULT NULL,
  `length` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `size`, `weight`, `height`, `width`, `length`) VALUES
(17, 'F-01', 'sofa', 2000, 0, 0, 100, 100, 100),
(19, 'b-02', 'book', 8, 0, 180, 0, 0, 0),
(20, 'd-01', 'dvd', 50, 265, 0, 0, 0, 0),
(21, 'b-01', 'book1', 50, 0, 180, 0, 0, 0),
(22, 'd-03', 'cd', 50, 20, 0, 0, 0, 0),
(25, 'g-7', 'book', 5, 0, 0, 0, 0, 0),
(26, 'b-9', 'nn', 7, 0, 0, 0, 0, 0),
(27, 'nnn', 'hhh', 444, 0, 0, 0, 0, 0),
(28, 'd-04', 'dvd', 5, 10, 0, 0, 0, 0),
(29, 'd-020', 'book4', 10, 10, 0, 0, 0, 0),
(30, 'h-7', 'book', 10, 10, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
