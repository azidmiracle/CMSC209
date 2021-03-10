-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 03:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cust_id` varchar(25) NOT NULL,
  `name` varchar(500) NOT NULL,
  `contact_num` varchar(25) NOT NULL,
  `contact_num2` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cust_id`, `name`, `contact_num`, `contact_num2`, `email`, `address`, `address2`, `city`, `district`, `status`) VALUES
(1, '', 'Tessa Mavel Madjus', '      09999766689', '09999766689', 'm@a', 'Ormoc', 'dd', 'Ormoc', 'a', 'Active'),
(11, '', 'tessa', ' 09999766689', '', 'm@a', 'Ormoc', 'sdsd', 'Ormoc', '', 'Active'),
(12, 'KNJCus#-7', 'Tessa Mavel Madjus', '         0503263837', '09999766689', 'm@a', 'Taif', 'ormoc', 'Taif', 'a12', 'Active'),
(13, 'KNJCus#-4', 'Tessa Mavel Madjus', '  09999766689', '09999766689', 'm@a', 'Ormoc', 'taif', 'Ormoc', 'a', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `id` int(11) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`id`, `product_id`, `product_name`, `product_desc`, `unit`, `quantity`, `reorder`, `price`, `status`) VALUES
(64, 'KNJ-ITM-6', 's', 'gg', 'each', 0, 0, 0, 'Active'),
(69, 'KNJ-ITM-5', 'd', 'd', 'd', 0, 0, 0, 'Active'),
(71, 'KNJ-ITM-4', 'ddddddd', '', 'each', 0, 0, 0, 'Active'),
(72, 'KNJ-ITM-4', 'sfasf', 'asfasf', 'each', 0, 0, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `supplierContact` varchar(255) NOT NULL,
  `contact_num` varchar(25) NOT NULL,
  `contact_num2` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplierName`, `supplierContact`, `contact_num`, `contact_num2`, `email`, `city`, `district`, `address`, `address2`, `status`) VALUES
(1, 'who', 'tessa', '09999766689', '09999766689', 's@e', 'Ormoc', 'ormoc', 'Ormoc', '', 'Active'),
(3, 'Tessa Mavel Madjus', '', '09999766689', '', '', 'Ormoc', '', 'Ormoc', '', 'Active'),
(7, 'dsdasd', 'd', '3', '', 's@e', '', '', 'dsasd', '', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `contact_num` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_email`, `contact_num`, `user_type`, `status`) VALUES
(8, 'admin', 'admin', '123', 'm@a', '09999766689', 'admin', 'Active'),
(15, 'sdsf', 'asdasd', '123', 'm@a', '09999766689', '', 'Inactive'),
(19, 'asdasd', 'me', '123', 'm@a', '4454545', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
