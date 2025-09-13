-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ali Naqi', 'alinaqi1102@gmail.com', 'Good ui', 'Good ui');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Product ID` varchar(20) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Product Name` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Fresh',
  `remarks` varchar(150) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Product ID`, `Category`, `Product Name`, `details`, `status`, `remarks`, `Date`) VALUES
(1, '1267197788', 'Electric', 'Electric Bulb', '18 watt bult ', 'Approved', NULL, '2025-07-10 12:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'Producer',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Id`, `Username`, `Email`, `Password`, `role`, `date`) VALUES
(3, 'ali', 'ali@gmail.com', '123', 'admin', '2025-07-03 11:37:51'),
(4, 'shanawar', 'shanawar@gmail.com', '123', 'Producer', '2025-07-02 10:20:31'),
(5, 'huraira', 'huraira@gmail.com', '123', 'tester', '2025-07-03 10:54:41'),
(6, 'ammar', 'ammar@gmail.com', '123', 'Producer', '2025-07-03 19:23:36'),
(7, 'Ali Naqi', 'alinaqi@mail.com', '123', 'Producer', '2025-06-21 05:15:00'),
(8, 'Sarah Ahmed', 'sarah.ahmed@mail.com', '123', 'Tester', '2025-06-22 07:00:00'),
(9, 'Usman Raza', 'usman.raza@mail.com', '123', 'Admin', '2025-06-23 04:45:00'),
(10, 'Fatima Khan', 'fatima.khan@mail.com', '123', 'Producer', '2025-06-23 09:20:00'),
(11, 'Hassan Malik', 'hassan.malik@mail.com', '123', 'Tester', '2025-06-24 03:10:00'),
(12, 'Ayesha Siddiqui', 'ayesha.sid@mail.com', '123', 'Admin', '2025-06-24 11:30:00'),
(13, 'Zainab Noor', 'zainab.noor@mail.com', '123', 'Producer', '2025-06-25 06:05:00'),
(14, 'Bilal Sheikh', 'bilal.sheikh@mail.com', '123', 'Tester', '2025-06-26 08:40:00'),
(15, 'Hamza Tariq', 'hamza.tariq@mail.com', '123', 'Admin', '2025-06-26 12:55:00'),
(16, 'Maria Yousaf', 'maria.yousaf@mail.com', '123', 'Tester', '2025-06-27 02:30:00'),
(17, 'ammar', 'ammar@gmail.com', '123', 'Producer', '2025-07-08 09:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
