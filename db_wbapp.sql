-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 12:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(8) NOT NULL,
  `appointment_lastname` varchar(180) NOT NULL,
  `appointment_firstname` varchar(180) NOT NULL,
  `appointment_purpose` text NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `appointment_lastname`, `appointment_firstname`, `appointment_purpose`, `appointment_date`, `appointment_time`, `appointment_status`) VALUES
(25, 'Test_Lastname', 'Test_Firstname', 'Test_purpose', '2024-03-04', '08:00:00', 'Approve'),
(26, 'Delgado', 'Stefan Jhonn', 'Test_purpose', '2024-03-04', '08:00:00', 'Approve'),
(27, 'LN', 'FN', 'Purpose', '2024-03-04', '08:00:00', 'Approve'),
(28, 'Retard', 'Joshie', 'Himu Ka Front-end', '2024-03-05', '08:00:00', 'Approve'),
(29, 'Test_Lastname', 'Test_Firstname', 'Test_purpose', '2024-03-04', '08:00:00', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_nickname` varchar(180) NOT NULL,
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_nickname`, `user_email`, `user_password`, `user_status`, `user_token`, `user_access`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin', 'password_test', 0, 'token_test', 'Admin'),
(4, 'Delgado', 'Stefan', 'gwapo@email.com', 'Gwapo', '123', 1, '', 'Staff'),
(5, 'Stefan', 'Gwapo', '123', 'gwapo@email.com', 'Delgado', 1, '', 'Staff'),
(6, 'Delgado', 'Stefan', 'Gwapo', 'gwapo@email.com', '123', 1, '', 'Staff'),
(7, 'Ret', 'Joshua', 'Aion', 'youapple@icloud.com', '69', 1, '', 'Manager'),
(8, 'Morga', 'Jan', 'Tan', 'tan@email.com', '123', 1, '', 'Supervisor'),
(9, 'Manager Admin', 'Admin', 'Capitan', 'admin@gmail.com', '123', 1, '', 'Supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
