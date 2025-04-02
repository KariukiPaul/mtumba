-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soko`
--
CREATE database `soko`;
USE `soko`;
-- --------------------------------------------------------

--
-- Table structure for table `kibanda`
--

CREATE TABLE `kibanda` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kibanda`
--

INSERT INTO `kibanda` (`id`, `uid`, `name`, `date`, `status`) VALUES
(1, '1', 'bancy nyawira', '2024-02-09', 'active'),
(2, '1', 'bancy', '2024-02-08', 'deleted'),
(3, '', 'wamakumi', '2024-02-20', 'active'),
(4, '1', 'wamakumi', '2024-02-20', 'active'),
(5, '1', 'Faith Ngure', '2024-03-20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `kid` varchar(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `bp` int(30) NOT NULL,
  `sp` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `profit` int(30) NOT NULL,
  `rctno` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `uid`, `kid`, `item`, `quantity`, `bp`, `sp`, `total`, `profit`, `rctno`, `date`, `status`) VALUES
(1, 1, '1', 'mtumba_tshirt', 3, 100, 200, 600, 300, '61', '2024-03-19 10:55:53', 'active'),
(2, 1, '1', 'mtumba_jeans', 2, 50, 150, 300, 200, '80', '2024-03-19 10:43:22', 'deleted'),
(3, 1, '1', 'mtumba_dress', 5, 75, 250, 1250, 875, '87', '2024-03-18 15:47:44', 'active'),
(4, 1, '1', 'mtumba_shoes', 4, 120, 300, 1200, 720, '44', '2024-03-18 15:51:23', 'active'),
(5, 1, '1', 'mtumba_handbag', 2, 80, 200, 400, 240, '87', '2024-03-18 15:59:00', 'active'),
(6, 1, '1', 'mtumba_shirt', 6, 60, 180, 1080, 720, '46', '2024-03-18 16:05:04', 'active'),
(7, 1, '1', 'mtumba_skirt', 10, 40, 100, 1000, 600, '91', '2024-03-19 10:21:10', 'active'),
(8, 1, '1', 'mtumba_jacket', 2, 150, 400, 800, 500, '91', '2024-03-19 10:21:10', 'active'),
(9, 1, '1', 'mtumba_trousers', 3, 90, 250, 750, 480, '38', '2024-03-19 10:22:53', 'active'),
(10, 1, '1', 'mtumba_blouse', 4, 50, 150, 600, 400, '38', '2024-03-19 10:22:53', 'active'),
(11, 1, '1', 'mtumba_sweater', 2, 70, 200, 400, 260, '31', '2024-03-19 10:35:49', 'active'),
(12, 1, '1', 'mtumba_vest', 5, 30, 80, 400, 250, '31', '2024-03-19 10:35:49', 'active'),
(13, 1, '1', 'mtumba_hat', 8, 20, 50, 400, 240, '7', '2024-03-20 11:47:42', 'active'),
(14, 1, '1', 'mtumba_scarf', 6, 15, 40, 240, 150, '7', '2024-03-20 11:47:42', 'active'),
(15, 1, '1', 'mtumba_belt', 3, 25, 60, 180, 105, '29', '2024-03-20 11:52:39', 'active'),
(16, 1, '1', 'mtumba_gloves', 10, 10, 30, 300, 200, '39', '2024-03-20 11:59:21', 'active'),
(17, 1, '1', 'mtumba_tie', 4, 15, 40, 160, 100, '71', '2024-03-20 12:05:04', 'active'),
(18, 1, '1', 'mtumba_socks', 20, 5, 15, 300, 200, '93', '2024-03-20 12:14:11', 'active'),
(19, 1, '1', 'mtumba_purse', 3, 30, 80, 240, 150, '30', '2024-03-20 12:17:04', 'active'),
(20, 1, '1', 'mtumba_wallet', 5, 20, 50, 250, 150, '14', '2024-03-20 12:50:18', 'active'),
(21, 1, '1', 'mtumba_watch', 2, 100, 300, 600, 400, '17', '2024-03-20 12:57:16', 'active'),
(22, 1, '1', 'mtumba_sunglasses', 3, 50, 150, 450, 300, '17', '2024-03-20 12:57:16', 'active'),
(23, 1, '1', 'mtumba_cap', 4, 25, 70, 280, 180, '86', '2024-03-20 12:57:42', 'active'),
(24, 1, '1', 'mtumba_jewelry', 2, 80, 250, 500, 340, '86', '2024-03-20 12:57:42', 'active'),
(25, 1, '1', 'mtumba_book', 6, 30, 80, 480, 300, '70', '2024-03-20 13:57:38', 'active'),
(26, 1, '1', 'mtumba_toy', 3, 40, 120, 360, 240, '70', '2024-03-20 13:57:38', 'active'),
(27, 1, '1', 'mtumba_kitchenware', 2, 60, 200, 400, 280, '70', '2024-03-20 13:57:38', 'active'),
(28, 1, '1', 'mtumba_furniture', 2, 200, 600, 1200, 800, '22', '2024-03-20 13:58:11', 'active'),
(29, 1, '1', 'mtumba_electronics', 3, 150, 500, 1500, 1050, '22', '2024-03-20 13:58:11', 'active');
-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `kid` varchar(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `bp` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `sp` int(30) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
-- stock database

INSERT INTO `stock` (`id`, `uid`, `kid`, `item`, `description`, `bp`, `quantity`, `total`, `sp`, `date`, `status`) VALUES
(1, '1', 'kid', 'mtumba_tshirt', 'Clothing', 100, 78, 7800, 200, '2024-02-20', 'active'),
(2, '1', '1', 'mtumba_jeans', 'Clothing', 50, 3, 150, 150, '2024-02-14', 'deleted'),
(4, '1', '1', 'mtumba_dress', 'Clothing', 75, 10, 750, 250, '2024-03-20', 'active'),
(5, '1', '1', 'mtumba_shoes', 'Footwear', 120, 11, 1320, 300, '2024-02-01', 'active'),
(6, '1', '1', 'mtumba_handbag', 'Accessories', 80, 17, 1360, 200, '2024-03-20', 'active'),
(7, '', '', '', '', 0, 0, 0, 0, '2024-03-20', 'active'),  -- This entry remains as it was.
(8, '1', '1', 'mtumba_belt', 'Accessories', 25, 2, 50, 60, '2024-03-20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `gender`, `phone`, `email`, `pass`, `date`) VALUES
(1, 'Kim', 'Doe', 'Male', '0701548235', 'admin@gmail.com', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kibanda`
--
ALTER TABLE `kibanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `user` 
  MODIFY `pass` int(255);
--
-- AUTO_INCREMENT for table `kibanda`
--
ALTER TABLE `kibanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
