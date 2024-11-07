-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 09:04 AM
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
-- Database: `db_out`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed_back`
--

CREATE TABLE `feed_back` (
  `full_name` varchar(250) NOT NULL,
  `emp_num` varchar(250) NOT NULL,
  `feedback_date` varchar(250) NOT NULL,
  `comment_fb` varchar(250) NOT NULL,
  `id_fb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_back`
--

INSERT INTO `feed_back` (`full_name`, `emp_num`, `feedback_date`, `comment_fb`, `id_fb`) VALUES
('Siti Wahida Binti Md Desa', '6', '2023-12-13', 'nice', 5),
('Nurul Fara Nadia Binti Abd Halim', '5', '2023-12-18', 'There is no check in button.', 6),
('Nurul Fara Nadia Binti Abd Halim', '5', '2023-12-18', 'untuk Check In, mohon Auto Update di Dashboard (tanpa tekan refresh button untuk ada button check in)', 7);

-- --------------------------------------------------------

--
-- Table structure for table `outstation`
--

CREATE TABLE `outstation` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(35) NOT NULL,
  `purpose` varchar(350) NOT NULL,
  `dateOut` date NOT NULL,
  `timeOut` time DEFAULT NULL,
  `dateIn` date NOT NULL,
  `timeIn` time NOT NULL,
  `user_id` int(10) NOT NULL,
  `timeCu` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_no` varchar(50) NOT NULL,
  `role_id` int(10) NOT NULL,
  `status` varchar(250) NOT NULL,
  `timeCuIn` varchar(255) NOT NULL,
  `notified` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outstation`
--

INSERT INTO `outstation` (`id`, `name`, `location`, `purpose`, `dateOut`, `timeOut`, `dateIn`, `timeIn`, `user_id`, `timeCu`, `emp_no`, `role_id`, `status`, `timeCuIn`, `notified`) VALUES
(1, 'Abdallah Wedud', 'trrr', 'tr', '2024-06-18', '08:36:00', '2024-06-18', '08:44:00', 0, '2024-06-18 08:40:07', '1234', 10, '8', '2024-06-18 08:44:36', ''),
(2, 'Abdallah Wedud', 'cfcfc', 'fcfcf', '2024-06-18', '08:41:00', '2024-06-18', '08:44:00', 0, '2024-06-18 08:41:29', '1234', 10, '8', '2024-06-18 08:44:36', ''),
(3, 'Abdallah Wedud', 'rfr', 'drdrfr', '2024-06-18', '08:42:00', '2024-06-18', '08:44:00', 0, '2024-06-18 08:42:20', '1234', 10, '8', '2024-06-18 08:44:36', ''),
(4, 'Abdallah Wedud', 'rfr', 'drdrfr', '2024-06-18', '08:42:00', '2024-06-18', '08:44:00', 0, '2024-06-18 08:42:50', '1234', 10, '8', '2024-06-18 08:44:36', ''),
(5, 'Abdallah Wedud', 'rfr', 'drdrfr', '2024-06-18', '08:42:00', '2024-06-18', '08:44:00', 0, '2024-06-18 08:43:01', '1234', 10, '8', '2024-06-18 08:44:36', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD PRIMARY KEY (`id_fb`);

--
-- Indexes for table `outstation`
--
ALTER TABLE `outstation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_hrm_user_id` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed_back`
--
ALTER TABLE `feed_back`
  MODIFY `id_fb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outstation`
--
ALTER TABLE `outstation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
