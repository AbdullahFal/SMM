-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 09:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparemymoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `banckaccounts`
--

CREATE TABLE `banckaccounts` (
  `CardNumber` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Balance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `banckaccounts`
--

INSERT INTO `banckaccounts` (`CardNumber`, `Name`, `Balance`) VALUES
(103333, 'Abdulrahman', 0),
(104444, 'Ahmed', 13877);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `snum` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`snum`, `name`, `value`) VALUES
('123', 'jarrier', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `CreditCard` int(250) NOT NULL,
  `points` int(250) NOT NULL,
  `balance` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `CreditCard`, `points`, `balance`) VALUES
(1, 'desadfsafdsfsd', 'ssda@gmail.com', '$2y$10$WSKSUF2B/m7bIJ81ttNNt.lRiAl8mlV2NcuuWAgMR3jKsYiqN.1Xy', 104444, 0, 0),
(2, '3213123', 'dasdasdadsad@gmail.com', '$2y$10$A4eLjGMDnboqDzyoNjst9uFyCCXO80enKkSRpjCagqA9vmOLhnUj6', 104444, 0, 0),
(3, 'hsoon12345', 'hsoon12345@gmail.com', '$2y$10$jGOVAqRyV9I1ThcwiOz05.QllJZNBi/loxdFkmvo.cV6j1/OI7LD.', 104444, 0, 0),
(4, 'mohamad', 'mohamad@gmail.com', '$2y$10$VHs5Obrfi8RtQpBsq28pb.KNr/ngkn0zaYFpQTMmQf.bAZUwqdp.e', 104444, 0, 1000),
(5, 'saad', 'saad@gmail.com', '$2y$10$1mTbbLZZzEL.Ah2XJPTyV.vj4mF6lCn5ODKPrs.3gOyI.1iECU8x2', 2147483647, 0, 0),
(6, 'ali', 'ali@gmail.com', '$2y$10$uvbatK9w1Pk6Ae5me1EO5.roIbmBkgLGJC1qGxm.i5ijCXbQrW4/W', 1234, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersgoals`
--

CREATE TABLE `usersgoals` (
  `id` int(11) NOT NULL,
  `User_Id` int(20) NOT NULL,
  `Start Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Amount to save` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websiteaccounts`
--

CREATE TABLE `websiteaccounts` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `CardNumber` int(20) NOT NULL,
  `balance` int(20) NOT NULL,
  `points` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `websiteaccounts`
--

INSERT INTO `websiteaccounts` (`id`, `Name`, `CardNumber`, `balance`, `points`, `email`, `password`) VALUES
(1, 'Abdulrahman', 103333, 10000, 0, '', ''),
(2, 'Ahmed', 104444, 10623, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banckaccounts`
--
ALTER TABLE `banckaccounts`
  ADD PRIMARY KEY (`CardNumber`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`snum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersgoals`
--
ALTER TABLE `usersgoals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websiteaccounts`
--
ALTER TABLE `websiteaccounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banckaccounts`
--
ALTER TABLE `banckaccounts`
  MODIFY `CardNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104445;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersgoals`
--
ALTER TABLE `usersgoals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7369;

--
-- AUTO_INCREMENT for table `websiteaccounts`
--
ALTER TABLE `websiteaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
