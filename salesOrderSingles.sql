-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2020 at 09:52 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u637876709_firstDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `salesOrderSingles`
--

CREATE TABLE `salesOrderSingles` (
  `id` int(11) NOT NULL,
  `saleDate` date NOT NULL DEFAULT current_timestamp(),
  `customerId` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  `qtySold` int(11) NOT NULL,
  `transactionAmount` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Single Item Sales Transactions';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salesOrderSingles`
--
ALTER TABLE `salesOrderSingles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`,`productCode`),
  ADD KEY `product` (`productCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salesOrderSingles`
--
ALTER TABLE `salesOrderSingles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salesOrderSingles`
--
ALTER TABLE `salesOrderSingles`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
  ADD CONSTRAINT `product` FOREIGN KEY (`productCode`) REFERENCES `itemList` (`productCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
