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
-- Database: `idrive`
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
-- Table structure for table `hrm_room`
--

CREATE TABLE `hrm_room` (
  `id_room` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_room`
--

INSERT INTO `hrm_room` (`id_room`, `room_name`, `status`) VALUES
(1, 'Meeting Room', 'Active'),
(2, 'try', 'try'),
(3, 'War Room', 'Status'),
(4, 'conference Room', 'Active'),
(5, 'war room 2', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `hrm_vehicle`
--

CREATE TABLE `hrm_vehicle` (
  `id` int(10) NOT NULL,
  `jenama` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `jenis_kenderaan` varchar(20) NOT NULL,
  `plat_number` varchar(20) NOT NULL,
  `statusV` varchar(250) NOT NULL,
  `maintenancedate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_vehicle`
--

INSERT INTO `hrm_vehicle` (`id`, `jenama`, `model`, `jenis_kenderaan`, `plat_number`, `statusV`, `maintenancedate`) VALUES
(1, 'Proton', 'Saga FLX', 'sedan', 'MCK 3404', 'maintenance', '2024-03-28'),
(2, 'Proton', 'Saga FLX', 'sedan', 'MCK 3405', 'Active', ''),
(4, 'TOYOTA', 'HIACE', 'van', 'MCR 5212', 'Active', ''),
(5, 'HONDA', 'ACCORD', 'sedan', 'MCU 656', 'Active', ''),
(6, 'FORD', 'RANGER', '4x4', 'MDK 2089', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `destination` varchar(200) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `model_plat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_date` date NOT NULL,
  `fuel_card` int(11) NOT NULL,
  `tng_card` int(11) NOT NULL,
  `currenttime` varchar(255) NOT NULL,
  `cu_keyreturn` varchar(250) NOT NULL,
  `cu_key` varchar(250) NOT NULL,
  `cu_approve` varchar(250) NOT NULL,
  `remark1` varchar(250) NOT NULL,
  `sebab` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `date`, `user_id`, `user_name`, `purpose`, `destination`, `vehicle_id`, `model_plat`, `status`, `start_date`, `start_time`, `end_date`, `fuel_card`, `tng_card`, `currenttime`, `cu_keyreturn`, `cu_key`, `cu_approve`, `remark1`, `sebab`) VALUES
(1, '2024-06-12', 4725, 'Muhammad Farid', 'try', 'try', 2, 'MCK 3405', 'Pending', '2024-06-12', '9am-1pm(Halfday Morning)', '2024-06-12', 1, 1, '16:17:04', '', '', '', '', ''),
(2, '2024-06-16', 9009, 'Shahrol Nizam', 'try', 'try', 2, 'MCK 3405', 'Reject', '2024-06-16', '9am-5pm(Fullday)', '2024-06-16', 1, 1, '12:42:18', '', '', '', '', 'wedud \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `management_room`
--

CREATE TABLE `management_room` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `sebab_reject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `room_id` varchar(250) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_room`
--

INSERT INTO `management_room` (`id`, `date`, `user_id`, `user_name`, `start_date`, `start_time`, `end_time`, `remark`, `sebab_reject`, `status`, `room_id`, `purpose`) VALUES
(1, '2024-06-17', 1234, 'Abdallah Wedud', '2024-06-17', '20:00', '20:30', '', '', 'Done', '1', 'try'),
(2, '2024-06-17', 9009, 'Shahrol Nizam', '2024-06-17', '20:00', '21:30', '', '', 'Canceled', '1', 'try'),
(3, '2024-06-17', 4725, 'Muhammad Farid', '2024-06-17', '21:00', '09:00', '', '', 'Pending', '4', 'vfvvf');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `user_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `purpose` text NOT NULL,
  `destination` varchar(200) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `model_plat` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id_feedback` int(50) NOT NULL,
  `text_feedback` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `date_feedback` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id_feedback`, `text_feedback`, `user_name`, `user_id`, `date_feedback`) VALUES
(1, 'how to use?', 'razliah', 2, '2023-11-08'),
(2, 'Test and check', 'razliah', 2, '2023-11-29'),
(3, 'try', 'wedud', 0, '2024-05-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed_back`
--
ALTER TABLE `feed_back`
  ADD PRIMARY KEY (`id_fb`);

--
-- Indexes for table `hrm_room`
--
ALTER TABLE `hrm_room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `hrm_vehicle`
--
ALTER TABLE `hrm_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_room`
--
ALTER TABLE `management_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed_back`
--
ALTER TABLE `feed_back`
  MODIFY `id_fb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hrm_room`
--
ALTER TABLE `hrm_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hrm_vehicle`
--
ALTER TABLE `hrm_vehicle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management_room`
--
ALTER TABLE `management_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
