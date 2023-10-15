-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 03:10 AM
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
-- Database: `volunteer_management_system`
--
CREATE DATABASE IF NOT EXISTS `volunteer_management_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `volunteer_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `last_name` varchar(64) NOT NULL DEFAULT 'No Last Name',
  `first_name` varchar(64) NOT NULL DEFAULT 'No First Name',
  `username` varchar(32) NOT NULL DEFAULT 'No Username',
  `password` varchar(32) NOT NULL,
  `role` enum('Super Admin','Regular Admin') NOT NULL DEFAULT 'Regular Admin',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `last_name`, `first_name`, `username`, `password`, `role`, `date_created`, `date_updated`) VALUES
(1, 'Sagara', 'Makoto Aizen', 'sagara.ma', 'be7ae849b480b15e05a8c14eec9e0723', 'Super Admin', '2023-08-18 09:33:25', '2023-08-18 09:33:25'),
(2, 'Sample Last Name', 'Sample First Name', 'default_user', '4656fd365a7b2a27efb7530bca9b9cf1', 'Regular Admin', '2023-08-29 03:52:14', '2023-08-29 03:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `auth_cookies`
--

CREATE TABLE `auth_cookies` (
  `id` int(11) NOT NULL,
  `cookie_value` varchar(8) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `label` varchar(32) NOT NULL DEFAULT 'No Emergency Label',
  `description` varchar(128) DEFAULT NULL,
  `barangay` varchar(32) NOT NULL DEFAULT 'No Barangay',
  `city` varchar(32) NOT NULL DEFAULT 'No City',
  `message` varchar(128) NOT NULL DEFAULT 'Emergency Alert',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `label`, `description`, `barangay`, `city`, `message`, `date_created`, `date_updated`) VALUES
(1, 'No Emergency Label', NULL, 'No Barangay', 'No City', 'Emergency Alert', '2023-09-20 07:27:09', '2023-09-20 07:27:09'),
(2, 'No Emergency Label', NULL, 'No Barangay', 'No City', 'Emergency Alert', '2023-09-20 07:29:06', '2023-09-20 07:29:06'),
(3, 'No Emergency Label', NULL, 'No Barangay', 'No City', 'Emergency Alert', '2023-09-20 07:29:27', '2023-09-20 07:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_volunteers`
--

CREATE TABLE `emergency_volunteers` (
  `id` int(11) NOT NULL,
  `emergency_id` int(11) NOT NULL DEFAULT 0,
  `volunteer_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emergency_volunteers`
--

INSERT INTO `emergency_volunteers` (`id`, `emergency_id`, `volunteer_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `last_name` varchar(32) NOT NULL DEFAULT 'No Last Name',
  `first_name` varchar(32) NOT NULL DEFAULT 'No First Name',
  `barangay` varchar(32) NOT NULL DEFAULT 'No Barangay',
  `city` varchar(32) NOT NULL DEFAULT 'No City',
  `mobile_number` varchar(11) NOT NULL DEFAULT '0',
  `mobile_number_alt` varchar(11) NOT NULL DEFAULT '0',
  `email_address` varchar(32) NOT NULL DEFAULT 'No Email Address',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `last_name`, `first_name`, `barangay`, `city`, `mobile_number`, `mobile_number_alt`, `email_address`, `date_created`, `date_updated`) VALUES
(1, 'Sagara', 'Makoto Aizen', 'Shibuya Ku', 'Tokyo Shi', '09123456789', '09123456789', 'aizen.no.testing.server@gmail.co', '2023-09-20 04:04:22', '2023-09-20 04:04:22'),
(2, 'No Last Name', 'No First Name', 'No Barangay', 'No City', '0', '0', 'No Email Address', '2023-09-20 12:02:33', '2023-09-20 12:02:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_cookies`
--
ALTER TABLE `auth_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_volunteers`
--
ALTER TABLE `emergency_volunteers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_cookies`
--
ALTER TABLE `auth_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emergency_volunteers`
--
ALTER TABLE `emergency_volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
