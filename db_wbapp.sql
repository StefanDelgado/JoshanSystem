-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:34 AM
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
(25, 'Test_Lastname', 'Test_Firstname', 'Test_purpose', '2024-03-06', '08:00:00', 'Approve'),
(26, 'Delgado', 'Stefan Jhonn', 'Test_purpose', '2024-03-04', '08:00:00', 'Approve'),
(27, 'LN', 'FN', 'Purpose', '2024-03-04', '08:00:00', 'Approve'),
(28, 'Retard', 'Joshie', 'Himu Ka Front-end', '2024-03-05', '08:00:00', 'Approve'),
(29, 'Test_Lastname', 'Test_Firstname', 'Test_purpose', '2024-03-04', '08:00:00', 'Approve'),
(30, 'Test_Lastname', 'Test_Firstname', 'Test_purpose', '2024-03-06', '08:00:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_nickname` varchar(180) NOT NULL,
  `user_gender` varchar(30) NOT NULL,
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_address` varchar(300) NOT NULL,
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_nickname`, `user_gender`, `user_email`, `user_address`, `user_password`, `user_access`) VALUES
(1, 'Admin', 'Admin', 'Admin', '', 'Admin', '', 'password_test', 'Admin'),
(6, 'Delgado', 'Stefan', 'Gwapo', '', 'gwapo@email.com', '', '123', 'Staff'),
(9, 'Manager Admin', 'Admin', 'Capitan', '', 'admin@gmail.com', '', '123', 'Supervisor'),
(13, 'Test_LastName', 'Test_FirstName', 'Test_nickname', 'Male', 'test@email.com', 'Test_Address', '123', 'Manager');

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
  MODIFY `appointment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
