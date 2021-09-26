-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 02:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `persondemand`
--

CREATE TABLE `persondemand` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `trxid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persondemand`
--

INSERT INTO `persondemand` (`id`, `email`, `amount`, `duration`, `platform`, `trxid`) VALUES
(0, '', '', '', '', ''),
(0, '', '8787878', '20 Years', '898989', '848454544545'),
(0, 'aaaaarc12@gmail.com', '8787878', '20 Years', '898989', '4544554545454'),
(0, 'demo@gmail.com', '8787878', '20 Years', 'bkash', '848454544545');

-- --------------------------------------------------------

--
-- Table structure for table `persondetails`
--

CREATE TABLE `persondetails` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `employer` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `mincome` varchar(200) NOT NULL,
  `rent` varchar(200) NOT NULL,
  `dpayment` varchar(200) NOT NULL,
  `ccn` varchar(200) NOT NULL,
  `card_expiry` varchar(200) NOT NULL,
  `cvv` varchar(200) NOT NULL,
  `limitt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persondetails`
--

INSERT INTO `persondetails` (`id`, `email`, `address`, `duration`, `employer`, `occupation`, `experience`, `mincome`, `rent`, `dpayment`, `ccn`, `card_expiry`, `cvv`, `limitt`) VALUES
(0, '', 'Masterpara, Uttarkhan', '20 Years', 'CodeSaucer', 'Owner', '2', '15000', '10000', '5000', '98746546576', '784555', '8896', '50000'),
(0, '', 'guihu', '89', 'fasfasfe', 'ewgzedg', 'gfsdzgzsdg', '15000', '543', '54485524', '854485844848', '855645456', '8484', '45444'),
(0, '', 'Masterpara, Uttarkhan', '5245', 'CodeSaucer', 'Owner', '2', 'SGSRY', 'y4way', '5000', '6546456456', '4564', '645', '6456'),
(0, '', 'Pata Chala', '56', 'reyt', 'yreyery', '50', '9000000000000000000000000000000000000000000', '90000000000000000000000000000000000000000009000000000000000000000000000000000000000000', '900000000000000000000000000000000000000000090000000000000000000000000000000000000000009000000000000000000000000000000000000000000', '9000000000000000000000000000000000000000000', '9000000000000000000000000000000000000000000', '9000000000000000000000000000000000000000000', '9000000000000000000000000000000000000000000'),
(0, 'aaaaarc12@gmail.com', 'aaaaarc12@gmail.com', 'aaaaarc12@gmail.com', 'CodeSaucer', 'Owner', '2', '15000', '465', '5000', '54564156154', '54541541', '78945', '564546574'),
(0, 'demo@gmail.com', 'Masterpara, Uttarkhan', '12', 'CodeSaucer', 'Owner', '2', '15000', '10000', '5000', '5645616546', '8/2026', '544', '9850');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Amitav Roy Chowdhury', 'codesaucer@gmail.com', 'amitav.rchy@gmail.com', '$2y$10$FZSlOPuL5PgCMicdNDn5teAe/cQKu5bcvldP52vmsAc'),
(2, 'Amitav Roy Chowdhury', 'codesaucer@gmail.com', 'csr', '$2y$10$K2kntl3TQ8.US399EBUIZuX01lxTY.36ntBs0xgh/WB'),
(3, 'Amitav Roy Chowdhury', 'codesaucer@gmail.com', 'csrr', '$2y$10$llBHh7Ht7LPKt8X2vxvIp.dFSlpRzaVgk7LN0QOxrM9'),
(4, 'Amitav Roy Chowdhury', 'aaaaarc12@gmail.com', 'aaaaarc12@gmail.com', '$2y$10$oQaGmwhY/uuUlCm18r8/aur7c9fUy5G6BCy7UIz1zPJ'),
(5, 'Amitav Roy Chowdhury', 'demo@gmail.com', 'demo', '$2y$10$OGv0eM4/juLJz6DpU.Qeq.e.4v8DEPLbuQ.baasr29R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
