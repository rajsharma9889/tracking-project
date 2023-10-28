-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2023 at 11:11 AM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `develop5_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$c5fWltCGIev4VGHBbHRL.uZeolosDcfghvCobYfdT3hM9OwNaOlqG');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `in_latitude` varchar(50) NOT NULL,
  `in_longitude` varchar(50) NOT NULL,
  `out_latitude` varchar(50) NOT NULL,
  `out_longitude` varchar(50) NOT NULL,
  `punch_in_address` varchar(100) NOT NULL,
  `punch_out_address` varchar(100) DEFAULT NULL,
  `punch_in_image` varchar(255) NOT NULL,
  `punch_out_image` varchar(255) NOT NULL,
  `in_date` varchar(50) NOT NULL,
  `in_time` varchar(50) NOT NULL,
  `out_date` varchar(100) NOT NULL,
  `out_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `name`, `mobile`, `in_latitude`, `in_longitude`, `out_latitude`, `out_longitude`, `punch_in_address`, `punch_out_address`, `punch_in_image`, `punch_out_image`, `in_date`, `in_time`, `out_date`, `out_time`) VALUES
(33, 1, 'SalesPerson', '7777788888', '26.4312316', '80.3333323', '', '', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', NULL, 'assets/images/dfada315e81ec81d40975003e6a3f5c1.jpeg', '', '2023-09-01', '05:07 pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `status`) VALUES
(19, 'Superman', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '6b37884f9ed708f1bc34b55ddcd4c514f316eaa6', 0, 0, 0, NULL, '2022-08-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `lattitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `user_id`, `name`, `mobile`, `lattitude`, `longitude`, `address`, `date`, `time`) VALUES
(1, 1, 'SalesPerson', '7777788888', '26.4312291', '80.3333289', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:03:52'),
(2, 1, 'SalesPerson', '7777788888', '26.4312342', '80.3333235', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:04:37'),
(3, 1, 'SalesPerson', '7777788888', '26.4312358', '80.3333261', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:06:47'),
(4, 1, 'SalesPerson', '7777788888', '26.4312316', '80.3333323', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:07:27'),
(5, 1, 'SalesPerson', '7777788888', '26.4312316', '80.3333323', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:07:33'),
(6, 1, 'SalesPerson', '7777788888', '26.4312362', '80.3333235', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:09:10'),
(7, 1, 'SalesPerson', '7777788888', '26.4312386', '80.3333214', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:10:50'),
(8, 1, 'SalesPerson', '7777788888', '26.4311483', '80.3334383', '86, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:15:31'),
(9, 1, 'SalesPerson', '7777788888', '26.4312365', '80.3333259', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:18:30'),
(10, 1, 'SalesPerson', '7777788888', '26.4312362', '80.3333236', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:18:31'),
(11, 1, 'SalesPerson', '7777788888', '26.4312301', '80.3333279', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:32:05'),
(12, 1, 'SalesPerson', '7777788888', '26.4312381', '80.3333209', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:32:05'),
(13, 1, 'SalesPerson', '7777788888', '26.4312339', '80.3333238', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:33:21'),
(14, 1, 'SalesPerson', '7777788888', '26.4311483', '80.3334383', '86, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:38:50'),
(15, 1, 'SalesPerson', '7777788888', '26.4312341', '80.3333213', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '17:39:28'),
(16, 1, 'SalesPerson', '7777788888', '26.431235', '80.3333251', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:01:47'),
(17, 1, 'SalesPerson', '7777788888', '26.4312331', '80.3333235', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:03:34'),
(18, 1, 'SalesPerson', '7777788888', '26.4312351', '80.3333238', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:04:42'),
(19, 1, 'SalesPerson', '7777788888', '26.4312369', '80.3333259', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:08:02'),
(20, 1, 'SalesPerson', '7777788888', '26.4312359', '80.3333209', '85, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:09:27'),
(21, 1, 'SalesPerson', '7777788888', '26.4311483', '80.3334383', '86, Kidwai Nagar, Kanpur, Uttar Pradesh 208011, India', '2023-09-01', '18:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_person`
--

CREATE TABLE `sales_person` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_person`
--

INSERT INTO `sales_person` (`id`, `name`, `mobile`, `email`, `password`, `designation_id`, `user_id`, `image`, `status`) VALUES
(1, 'SalesPerson', '7777788888', 'sp@gmail.com', '123456', 19, 1, 'assets/images/44701fc95b934087d1b50ab350130c6a.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `compony_name` varchar(110) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `compony_name`, `image`, `status`, `datetime`) VALUES
(1, 'Subne', '8888999965', 'sabne@gmail.com', '$2y$10$yE5Kmr2kH7yYim2aurPlb.mJjton4UhT1Wz2fb5Z0jkHzbNWF8LOi', 'company', 'assets/images/9873ffb38581876b9c3d42d7c067157f.jpg', 0, '01-09-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_person`
--
ALTER TABLE `sales_person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_person`
--
ALTER TABLE `sales_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
