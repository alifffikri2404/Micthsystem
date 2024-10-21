-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2024 at 01:27 PM
-- Server version: 10.3.39-MariaDB-0+deb10u2
-- PHP Version: 8.1.27

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
  `status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_room`
--

INSERT INTO `hrm_room` (`id_room`, `room_name`, `status`, `position`) VALUES
(2, 'The Engine Chamber (TEC) - Conference Room', 'Active', '1'),
(3, 'The Strategy Nexus (TSN) - Meeting Room 1', 'Active', '0'),
(4, 'The Brainstorm Bay (TBB) - Meeting Room 2', 'Active', '0');

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
  `maintenancedate` varchar(250) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hrm_vehicle`
--

INSERT INTO `hrm_vehicle` (`id`, `jenama`, `model`, `jenis_kenderaan`, `plat_number`, `statusV`, `maintenancedate`, `position`) VALUES
(5, 'TOYOTA', 'HIACE', 'van', 'MCR 5212', 'Active', '', '0'),
(6, 'PROTON', 'X70', 'SUV', 'MDT 1578', 'Active', '', '1'),
(7, 'FORD', 'FORD RANGER', '4x4', 'MDK 2089', 'Active', '', '0'),
(8, 'ISUZU', 'DMAX', '4x4', 'MDT 1475', 'Active', '', '0'),
(9, 'PERODUA', 'BEZZA 9516', 'sedan', 'MDT 9516', 'Active', '', '0'),
(10, 'PERODUA', 'BEZZA 9518', 'sedan', 'MDT 9518', 'Active', '', '0');

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
  `sebab` varchar(250) NOT NULL,
  `Approver` varchar(255) NOT NULL,
  `Receiver` varchar(255) NOT NULL,
  `rejected` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `date`, `user_id`, `user_name`, `purpose`, `destination`, `vehicle_id`, `model_plat`, `status`, `start_date`, `start_time`, `end_date`, `fuel_card`, `tng_card`, `currenttime`, `cu_keyreturn`, `cu_key`, `cu_approve`, `remark1`, `sebab`, `Approver`, `Receiver`, `rejected`) VALUES
(1, '2024-07-31', 4725, 'Muhammad Farid', 'purchase pizzahut', 'pizzahut Ayer Keroh', 1, 'MBW 5824', 'Done', '2024-07-31', '9am-5pm(Fullday)', '2024-07-31', 1, 1, '16:44:10', '17:08:01', '17:07:47', '17:07:07', 'ok', '', '', '', ''),
(2, '2024-08-06', 7002, 'Raihana', 'Ambil IPAD di KL', 'Pavillion Bukit Bintang', 1, 'MBW 5824', 'Done', '2024-08-07', '9am-5pm(Fullday)', '2024-08-07', 1, 1, '11:10:09', '10:25:39', '11:12:28', '11:12:19', 'KERETA TAK DPT ', '', '', '', ''),
(3, '2024-08-09', 9022, 'Abdallah Wedud', 'Hantar Dokumen ', 'Seri Negeri ', 4, 'MDT 9516', 'Done', '2024-08-09', '2pm-5pm(Halfday Evening)', '2024-08-09', 1, 1, '10:38:18', '10:46:37', '10:45:38', '10:45:02', '', '', '', '', ''),
(4, '2024-08-09', 9022, 'Abdallah Wedud', 'ONCC', 'MAIM MELAKA', 4, 'MDT 9516', 'Reject', '2024-08-13', '9am-5pm(Fullday)', '2024-08-22', 1, 1, '10:43:05', '', '', '', '', 'SEBAB TAK BOLEH BOOKING SEMINGGU', '', '', ''),
(5, '2024-08-09', 1145, 'Norsyahira', 'Site Visit', 'UNIMEL', 4, 'MDT 9516', 'Reject', '2024-08-09', '9am-1pm(Halfday Morning)', '2024-08-11', 1, 1, '15:51:08', '', '', '', '', 'Lambat kete dh jual ', '', '', ''),
(6, '2024-08-09', 9022, 'Abdallah Wedud', 'frfr', 'frf', 4, 'MDT 9516', 'Reject', '2024-08-09', '2pm-5pm(Halfday Evening)', '2024-08-09', 1, 1, '22:47:53', '', '', '22:48:22', '', 'entah', '', '', ''),
(7, '2024-08-12', 9022, 'Abdallah Wedud', 'rgtgt', 'gtgt', 4, 'MDT 9516', 'Done', '2024-08-12', '9am-5pm(Fullday)', '2024-08-12', 1, 1, '15:58:20', '2024-08-12 15:59:01', '2024-08-12 15:58:54', '2024-08-12 15:58:37', 'tgtgt', '', 'Abdallah Wedud', '', ''),
(8, '2024-08-12', 9022, 'Abdallah Wedud', 'nhnhnh', 'hnhn', 4, 'MDT 9516', 'Reject', '2024-08-12', '9am-5pm(Fullday)', '2024-08-12', 1, 1, '16:00:55', '', '', '', '', 'cuba lagi', '', '', ''),
(9, '2024-08-13', 2006, 'Mohamad Hamdan', 'HANTAR BARANG', 'SELURUH MELAKA', 5, 'MCR 5212', 'Reject', '2024-08-13', '9am-5pm(Fullday)', '2024-08-13', 1, 0, '08:36:12', '', '', '2024-08-13 08:39:18', '', 'TESTING', 'Mohamad Hamdan', '', ''),
(10, '2024-08-13', 4713, 'Noor Ashikin', 'HANTAR GOODIES', 'SEKITAR MELAKA', 5, 'MCR 5212', 'Done', '2024-08-13', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '09:04:04', '2024-08-13 09:08:02', '2024-08-13 09:06:50', '2024-08-13 09:05:31', '', '', 'Noor Ashikin', '', ''),
(11, '2024-08-13', 4713, 'Noor Ashikin', 'HANTAR GOODIES', 'SEKITAR MELAKA', 5, 'MCR 5212', 'Done', '2024-08-13', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '09:10:06', '2024-08-13 09:15:53', '2024-08-13 09:11:10', '2024-08-13 09:10:45', '', '', 'Noor Ashikin', '', ''),
(12, '2024-08-13', 9006, 'Nur Ainna', 'testing lawatan tapak', 'kampung 8 tengkera, bandar hilir', 5, 'MCR 5212', 'Done', '2024-08-13', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 1, '09:13:15', '2024-08-13 09:58:19', '2024-08-13 09:15:56', '2024-08-13 09:15:15', '', '', 'Noor Ashikin', '', ''),
(13, '2024-08-13', 2014, 'Juriani ', 'Technical Site Survey', 'Rejimen 21 Komando dan KPM Ayer Molek', 7, 'MDK 2089', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '13:03:49', '2024-08-19 15:21:26', '2024-08-19 08:38:42', '2024-08-13 15:38:18', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(14, '2024-08-13', 2014, 'Juriani ', 'Site Visit (SLP) with MPHTJ & SAQ', 'Malim Jaya, Bukit Rambai, Tanjong Minyak, ', 10, 'MDT 9518', 'Done', '2024-08-14', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '14:05:53', '2024-08-14 17:31:28', '2024-08-14 08:39:15', '2024-08-13 15:10:04', '', '', 'Mohamad Hamdan', '', ''),
(15, '2024-08-13', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-08-14', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '14:59:33', '2024-08-14 17:32:23', '2024-08-14 08:39:37', '2024-08-13 15:10:44', '', '', 'Mohamad Hamdan', '', ''),
(16, '2024-08-13', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-08-16', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:00:46', '2024-08-16 17:05:10', '2024-08-16 09:09:01', '2024-08-13 15:37:55', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(17, '2024-08-13', 4704, 'Nur Amira', 'SAQ', 'Jasin, Alor Gajah', 9, 'MDT 9516', 'Reject', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:09:01', '', '', '2024-08-13 15:38:39', '', 'Cancel', 'Mohamad Hamdan', '', ''),
(18, '2024-08-13', 9022, 'Abdallah Wedud', 'Site visit', 'Sekitar melaka', 9, 'MDT 9516', 'Done', '2024-08-14', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '15:48:08', '2024-08-14 16:01:24', '2024-08-14 08:37:35', '2024-08-13 16:12:54', '', '', 'Mohamad Hamdan', '', ''),
(19, '2024-08-13', 4710, 'Ridzuan', 'servis center', 'TOYOTA CENTER', 5, 'MCR 5212', 'Done', '2024-08-15', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:11:58', '2024-08-15 16:16:13', '2024-08-15 08:20:27', '2024-08-13 16:13:22', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(20, '2024-08-13', 9011, 'Siti Sara', 'SAQ & MEET LANDLORD', 'BATU GAJAH - SUNGAI RAMBAI ', 7, 'MDK 2089', 'Done', '2024-08-15', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:51:23', '2024-08-15 18:35:19', '2024-08-15 09:56:45', '2024-08-13 16:54:03', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(21, '2024-08-13', 4689, 'Siti Nor Amieza', 'Site Securing with Landlord', 'BUKIT MELAKA, PANGLIMA PAK , KG BATU GAJAH', 10, 'MDT 9518', 'Done', '2024-08-16', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:01:58', '2024-08-16 17:30:01', '2024-08-16 08:57:23', '2024-08-14 08:36:54', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(22, '2024-08-14', 2014, 'Juriani ', 'Site Visit', 'KPM Ayer Molek', 7, 'MDK 2089', 'Done', '2024-08-20', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '13:10:26', '2024-08-20 17:33:21', '2024-08-20 08:30:17', '2024-08-14 13:22:57', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(23, '2024-08-14', 2014, 'Juriani ', 'Submit Surat Permohonan Dokumen Sokongan', 'MARA HQ', 10, 'MDT 9518', 'Done', '2024-08-15', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '13:11:50', '2024-08-16 08:56:47', '2024-08-15 09:55:35', '2024-08-14 13:21:08', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(24, '2024-08-15', 2006, 'Mohamad Hamdan', 'ke pusat servis', 'cheng dan alor gajah', 9, 'MDT 9516', 'Done', '2024-08-15', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:25:21', '2024-08-15 16:15:57', '2024-08-15 08:25:51', '2024-08-15 08:25:37', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(25, '2024-08-15', 4704, 'Nur Amira', 'SAQ', 'Jasin, Alor Gajah, melaka tengah', 9, 'MDT 9516', 'Reject', '2024-08-16', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '17:34:17', '', '', '2024-08-15 18:35:56', '', 'Cancel ', 'Mohamad Hamdan', '', ''),
(27, '2024-08-16', 9013, 'Ahmad Muzhaffar', 'Buy TMP goods', 'Kuala Lumpur', 5, 'MCR 5212', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '09:52:19', '2024-08-20 08:41:36', '2024-08-19 08:33:10', '2024-08-16 09:55:44', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(28, '2024-08-16', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-16', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:55:51', '2024-08-19 09:01:00', '2024-08-16 09:57:54', '2024-08-16 09:56:47', '', '', 'Shahrol Nizam', 'Noor Ashikin', ''),
(29, '2024-08-16', 9004, 'Arzmein', 'Collect permit plate and permit bki', 'Mphtj, bki', 9, 'MDT 9516', 'Done', '2024-08-16', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '15:32:47', '2024-08-16 15:52:22', '2024-08-16 15:34:31', '2024-08-16 15:33:43', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(30, '2024-08-16', 2006, 'Mohamad Hamdan', 'wedud try ', 'wedud try ', 5, 'MCR 5212', 'Reject', '2024-08-17', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '17:12:51', '', '', '', '', 'wedud try', '', '', ''),
(31, '2024-08-16', 10, 'Mohd Jailani', 'meeting', 'sekitar melaka', 6, 'MDT 1578', 'Done', '2024-08-19', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 1, '17:18:17', '2024-08-19 15:08:13', '2024-08-19 08:38:26', '2024-08-16 18:20:16', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(33, '2024-08-16', 9011, 'Siti Sara', 'SAQ & MEET LANDLORD', 'SUNGAI RAMBAI & BUKIT MELAKA', 10, 'MDT 9518', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:34:35', '2024-08-19 15:54:03', '2024-08-19 08:38:51', '2024-08-16 18:20:03', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(34, '2024-08-16', 4689, 'Siti Nor Amieza', 'SAQ & Site Securing', 'Kg Sebatu, Jln Datuk Nawar, Panglima Pak ', 10, 'MDT 9518', 'Done', '2024-08-20', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:36:48', '2024-08-20 16:38:34', '2024-08-20 08:24:53', '2024-08-16 18:19:47', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(35, '2024-08-19', 9005, 'Azmeera', 'SAQ, TSS', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:35:00', '2024-08-22 09:10:11', '2024-08-21 08:58:57', '2024-08-19 08:39:21', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(36, '2024-08-19', 2006, 'Mohamad Hamdan', 'hantar dokument', 'Jasin,Melaka Tengah dan Alor Gajah', 9, 'MDT 9516', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:41:32', '2024-08-19 09:23:37', '2024-08-19 08:58:51', '2024-08-19 08:41:51', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(37, '2024-08-19', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:56:09', '2024-08-20 08:21:55', '2024-08-19 09:01:11', '2024-08-19 08:59:59', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(38, '2024-08-19', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Reject', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:17:18', '', '', '2024-08-19 09:23:45', '', 'KAKITANGAN TIDAK MENGUNAKAN KENDERAAN ', 'Mohamad Hamdan', '', ''),
(39, '2024-08-19', 4704, 'Nur Amira', 'saq', 'melaka tengah, alor gajah. jasin', 9, 'MDT 9516', 'Done', '2024-08-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:26:20', '2024-08-20 08:19:35', '2024-08-19 09:29:28', '2024-08-19 09:28:01', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(40, '2024-08-19', 9022, 'Abdallah Wedud', 'try', 'try', 7, 'MDK 2089', 'Reject', '2024-09-01', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '09:39:57', '', '', '2024-08-19 09:42:52', '', 'kereta meletop\r\n', 'Abdallah Wedud', '', ''),
(41, '2024-08-19', 1145, 'Norsyahira', 'try', 'try', 9, 'MDT 9516', 'Reject', '2024-09-01', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '09:41:26', '', '', '', '', 'cuba lagi ', '', '', ''),
(42, '2024-08-19', 10, 'Mohd Jailani', 'Mesyuarat Post Exco Sains, Teknologi, Komunikasi DIgital', 'MMU, Bukit Beruang', 6, 'MDT 1578', 'Done', '2024-08-28', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '15:17:27', '2024-08-28 16:42:47', '2024-08-28 16:42:38', '2024-08-19 15:21:44', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(43, '2024-08-19', 3007, 'Norwajunizam', 'Site visit Kolej Professional Ayer Molek ', 'Ayer Molek', 6, 'MDT 1578', 'Done', '2024-08-20', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '16:01:37', '2024-08-20 16:02:58', '2024-08-20 08:18:48', '2024-08-19 16:05:47', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(44, '2024-08-19', 3007, 'Norwajunizam', 'Meeting with Maxis for Weekly Progress Update & Commercial', 'Maxis Tower KLCC Kuala Lumpur', 6, 'MDT 1578', 'Done', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '19:11:25', '2024-08-23 08:33:20', '2024-08-22 08:34:28', '2024-08-20 08:14:50', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(45, '2024-08-20', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-08-20', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:22:58', '2024-08-21 08:57:41', '2024-08-20 08:26:20', '2024-08-20 08:23:37', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(46, '2024-08-20', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Jasin', 8, 'MDT 1475', 'Done', '2024-08-20', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:24:50', '2024-08-21 09:37:35', '2024-08-21 08:59:18', '2024-08-20 08:25:13', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(47, '2024-08-20', 2006, 'Mohamad Hamdan', 'hantar dokument', 'Jasin,Melaka Tengah dan Alor Gajah', 5, 'MCR 5212', 'Done', '2024-08-20', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:40:59', '2024-08-20 16:03:06', '2024-08-20 08:41:29', '2024-08-20 08:41:15', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(48, '2024-08-20', 6002, 'Nur Amalina', 'MESYUARAT DI MOSTI, PUTRAJAYA', 'PUTRAJAYA', 6, 'MDT 1578', 'Done', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:53:19', '2024-08-22 08:34:15', '2024-08-21 09:49:31', '2024-08-20 08:53:45', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(49, '2024-08-20', 9011, 'Siti Sara', 'SAQ & MEET LANDLORD', 'TAMAN PANGLIMA PAK & SAMB (SIGN DRAWING)', 10, 'MDT 9518', 'Done', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:49:51', '2024-08-22 09:12:01', '2024-08-21 08:38:45', '2024-08-21 08:36:51', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(50, '2024-08-20', 9011, 'Siti Sara', 'SAQ & TECHNICAL SITE SURVEY', 'SIMPANG KEMENDORE & BUKIT BATU LEBAH', 7, 'MDK 2089', 'Done', '2024-08-23', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:51:12', '2024-08-23 17:21:37', '2024-08-23 08:38:12', '2024-08-21 08:32:25', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(51, '2024-08-21', 2006, 'Mohamad Hamdan', 'Beli barang pantry dan hantar dokument di kemterendak', 'Jasin,Melaka Tengah dan Alor Gajah', 5, 'MCR 5212', 'Done', '2024-08-21', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:37:52', '2024-08-21 09:48:07', '2024-08-21 08:38:24', '2024-08-21 08:38:14', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(52, '2024-08-21', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:12:32', '2024-08-21 17:00:23', '2024-08-21 09:49:43', '2024-08-21 09:37:47', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(53, '2024-08-21', 9022, 'Abdallah Wedud', 'ambil goodies', 'melaka', 5, 'MCR 5212', 'Reject', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:59:18', '', '', '2024-08-21 10:00:58', '', 'wedud test', 'Mohamad Hamdan', '', ''),
(58, '2024-08-21', 4689, 'Siti Nor Amieza', 'site Visit with SAMB, Sign LOI with Landlord, SAQ Panglima Pak ', 'Desa Bertam, Taman Pasir Emas , Sempang Merlimau', 10, 'MDT 9518', 'Done', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:33:01', '2024-08-23 08:37:58', '2024-08-22 09:16:30', '2024-08-21 10:38:11', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(59, '2024-08-21', 6005, 'Mohamad Rosidi', 'Amik goodies', 'Ayer Keroh', 5, 'MCR 5212', 'Done', '2024-08-21', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:36:55', '2024-08-21 12:19:15', '2024-08-21 10:38:49', '2024-08-21 10:38:38', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(60, '2024-08-21', 9013, 'Ahmad Muzhaffar', 'Buy TMP goods', 'Ayer Keroh', 5, 'MCR 5212', 'Done', '2024-08-21', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '14:27:22', '2024-08-21 15:49:11', '2024-08-21 14:39:37', '2024-08-21 14:39:19', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(61, '2024-08-21', 2014, 'Juriani ', 'SAQ', 'Encore & Tanjong Minyak', 9, 'MDT 9516', 'Reject', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:27:09', '', '', '2024-08-21 15:27:33', '', 'KAKITANGAN TIDAK MENGGUNAKAN KENDERAAN', 'Mohamad Hamdan', '', ''),
(62, '2024-08-21', 2006, 'Mohamad Hamdan', 'Beli barang pantry dan hantar dokument di kemterendak', 'Jasin,Melaka Tengah dan Alor Gajah', 5, 'MCR 5212', 'Reject', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '15:27:13', '', '', '2024-08-21 15:27:40', '', 'Tidak Menggunakan Kenderaaan ', 'Mohamad Hamdan', '', ''),
(63, '2024-08-21', 2014, 'Juriani ', 'Belian CR Pejabat Tanah', 'PDTMT PDTAG PDTJ', 10, 'MDT 9518', 'Done', '2024-08-27', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:36:33', '2024-08-28 08:28:53', '2024-08-27 09:54:58', '2024-08-21 15:49:18', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(64, '2024-08-22', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:30:05', '2024-08-23 08:35:23', '2024-08-22 08:34:42', '2024-08-22 08:33:09', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(65, '2024-08-22', 2014, 'Juriani ', 'SAQ - KSYB (encore)', 'Encore', 7, 'MDK 2089', 'Done', '2024-08-22', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:13:59', '2024-08-22 17:34:25', '2024-08-22 09:16:50', '2024-08-22 09:16:35', '', '', 'Noor Ashikin', 'Noor Ashikin', ''),
(66, '2024-08-23', 6002, 'Nur Amalina', 'SITE VISIT ', 'DOUBLE TREE HOTEL', 6, 'MDT 1578', 'Done', '2024-08-23', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:26:45', '2024-08-23 17:22:58', '2024-08-23 08:38:23', '2024-08-23 08:33:31', '', '', 'Shahrol Nizam', 'Noor Ashikin', ''),
(67, '2024-08-23', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-23', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:34:31', '2024-08-23 17:40:56', '2024-08-23 17:40:47', '2024-08-23 08:35:38', '', '', 'Shahrol Nizam', 'Noor Ashikin', ''),
(68, '2024-08-23', 4703, 'Ainur Hawa', 'SAQ', 'Melaka', 10, 'MDT 9518', 'Done', '2024-08-23', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:47:58', '2024-08-23 17:21:47', '2024-08-23 09:04:49', '2024-08-23 09:02:29', '', '', 'Noor Ashikin', 'Noor Ashikin', ''),
(69, '2024-08-23', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-08-23', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:48:06', '2024-08-23 17:23:51', '2024-08-23 09:05:01', '2024-08-23 09:02:21', '', '', 'Noor Ashikin', 'Noor Ashikin', ''),
(70, '2024-08-23', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-08-27', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:48:33', '2024-08-28 08:19:38', '2024-08-27 09:44:04', '2024-08-23 16:58:19', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(71, '2024-08-23', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-08-28', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:48:51', '2024-08-29 13:04:00', '2024-08-28 08:19:49', '2024-08-23 16:58:26', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(72, '2024-08-23', 4689, 'Siti Nor Amieza', 'Submission PTP, Collect Preconsult,Meeting with Landlord ', 'PDTMT,PTJ,JKR JASIN,KLEBANG,MPJ', 7, 'MDK 2089', 'Done', '2024-08-27', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:28:16', '2024-08-28 08:22:36', '2024-08-27 09:44:22', '2024-08-27 09:06:52', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(75, '2024-08-27', 2014, 'Juriani ', 'TSS TBBH, SAQ', 'Pekan Bemban, Tangga Batu', 10, 'MDT 9518', 'Reject', '2024-08-28', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '08:58:03', '', '', '2024-08-27 09:07:28', '', 'KAKITANGAN SALAH CLICK MASA UNTUK BOOKING', 'Shahrol Nizam', '', ''),
(76, '2024-08-27', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-27', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '09:34:58', '2024-08-28 08:23:00', '2024-08-27 09:43:57', '2024-08-27 09:43:29', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(77, '2024-08-27', 2014, 'Juriani ', 'Technical Site Survey TBBH, & SAQ', 'Pekan Bemban & Tangga Batu', 10, 'MDT 9518', 'Done', '2024-08-28', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:58:16', '2024-08-29 13:03:31', '2024-08-28 08:29:05', '2024-08-27 10:46:19', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(78, '2024-08-27', 2006, 'Mohamad Hamdan', 'hantar dokument', 'Jasin,Melaka Tengah dan Alor Gajah', 5, 'MCR 5212', 'Done', '2024-08-27', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '10:47:01', '2024-08-27 15:12:31', '2024-08-27 10:53:58', '2024-08-27 10:53:48', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(79, '2024-08-27', 10, 'Mohd Jailani', 'Mesyuarat Post Exco Sains, Teknologi, Komunikasi DIgital', 'MMU Bukit Beruang', 6, 'MDT 1578', 'Reject', '2024-08-29', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '15:57:04', '', '', '2024-08-28 08:23:34', '', 'CANCEL', 'Mohamad Hamdan', '', ''),
(80, '2024-08-27', 10, 'Mohd Jailani', 'Mesyuarat Post Exco Sains, Teknologi, Komunikasi DIgital', 'MMU Bukit Beruang', 6, 'MDT 1578', 'Reject', '2024-08-29', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '15:57:07', '', '', '', '', 'CANCEL', '', '', ''),
(81, '2024-08-27', 10, 'Mohd Jailani', 'Mesyuarat Post Exco Sains, Teknologi, Komunikasi DIgital', 'MMU Bukit Beruang', 6, 'MDT 1578', 'Reject', '2024-08-29', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '15:57:10', '', '', '2024-08-27 16:55:30', '', 'CANCEL', 'Shahrol Nizam', '', ''),
(82, '2024-08-28', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-28', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:20:11', '2024-08-29 13:03:17', '2024-08-28 08:29:21', '2024-08-28 08:23:10', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(83, '2024-08-28', 9011, 'Siti Sara', 'MEET LANDLORD AND SUBMIT PTP', 'TAMAN PERINDUSTRIAN CHENG & PEJABAT TANAH MELAKA TENGAH', 7, 'MDK 2089', 'Done', '2024-08-28', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '10:20:35', '2024-08-29 08:22:41', '2024-08-28 16:43:02', '2024-08-28 10:24:51', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(84, '2024-08-28', 2006, 'Mohamad Hamdan', 'HANTAR BARANG & Dokument', 'Seri Negeri', 5, 'MCR 5212', 'Done', '2024-08-28', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '10:42:15', '2024-08-28 16:42:28', '2024-08-28 10:42:39', '2024-08-28 10:42:32', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(85, '2024-08-28', 2014, 'Juriani ', 'Berjumpa YB Durian Tunggal', 'Japerun Durian Tunggal', 10, 'MDT 9518', 'Done', '2024-08-29', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:29:12', '2024-08-30 10:17:53', '2024-08-29 13:03:37', '2024-08-29 08:22:03', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(86, '2024-08-28', 4704, 'Nur Amira', 'SAQ', 'melaka', 9, 'MDT 9516', 'Done', '2024-08-29', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:35:49', '2024-08-30 10:45:45', '2024-08-29 13:04:07', '2024-08-29 08:22:10', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(87, '2024-08-28', 4704, 'Nur Amira', 'SAQ', 'Jasin, Alor Gajah', 9, 'MDT 9516', 'Done', '2024-08-30', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:36:40', '2024-08-30 17:37:49', '2024-08-30 10:46:07', '2024-08-29 08:22:15', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(88, '2024-08-29', 2006, 'Mohamad Hamdan', 'Beli barang pejabat', 'tong hup hang tuah mall', 5, 'MCR 5212', 'Done', '2024-08-29', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:24:58', '2024-08-30 10:45:16', '2024-08-30 10:44:55', '2024-08-29 08:25:18', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(89, '2024-08-29', 9011, 'Siti Sara', 'Submit PTP', 'Pejabat Tanah Jasin & Pejabat Tanah Melaka Tengah', 7, 'MDK 2089', 'Done', '2024-08-29', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:25:11', '2024-08-30 10:45:52', '2024-08-29 08:25:46', '2024-08-29 08:25:37', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(90, '2024-08-29', 6002, 'Nur Amalina', 'SITE VISIT ', 'MPJASIN', 6, 'MDT 1578', 'Done', '2024-08-29', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '08:26:36', '2024-08-29 13:03:00', '2024-08-29 08:27:17', '2024-08-29 08:27:00', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(91, '2024-08-29', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-08-29', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:25:39', '2024-08-30 10:45:24', '2024-08-29 10:14:54', '2024-08-29 10:14:44', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(92, '2024-08-29', 10, 'Mohd Jailani', 'Mesyuarat Program Rakyat Digital', 'Seri Negeri', 6, 'MDT 1578', 'Done', '2024-09-03', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '12:10:28', '2024-09-04 09:30:51', '2024-09-04 09:29:50', '2024-08-29 13:02:46', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(93, '2024-08-30', 2006, 'Mohamad Hamdan', 'HANTAR BARANG & Dokument', 'Duyung Ayer Molek', 5, 'MCR 5212', 'Done', '2024-08-30', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '10:54:36', '2024-08-30 16:20:48', '2024-08-30 10:54:56', '2024-08-30 10:54:51', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(94, '2024-08-30', 6002, 'Nur Amalina', 'PROGRAM MDEC', 'HOTEL IMPIANA, KUALA LUMPUR', 6, 'MDT 1578', 'Done', '2024-09-12', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '14:05:39', '2024-09-18 08:27:41', '2024-09-12 14:02:53', '2024-08-30 15:10:12', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(95, '2024-09-01', 2014, 'Juriani ', 'SAQ & Follow up pre consult form', 'Japerun Rim', 10, 'MDT 9518', 'Done', '2024-09-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '20:30:49', '2024-09-03 17:41:56', '2024-09-02 08:39:20', '2024-09-02 08:26:11', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(96, '2024-09-02', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-09-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:36:25', '2024-09-04 09:29:22', '2024-09-02 08:40:20', '2024-09-02 08:39:10', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(97, '2024-09-02', 2006, 'Mohamad Hamdan', 'Beli barang pejabat', 'Tong hup dan Maybank', 5, 'MCR 5212', 'Done', '2024-09-02', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:38:28', '2024-09-02 16:01:11', '2024-09-02 08:38:55', '2024-09-02 08:38:46', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(98, '2024-09-02', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-09-03', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:38:33', '2024-09-04 09:31:29', '2024-09-04 09:31:07', '2024-09-02 08:40:29', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(99, '2024-09-02', 9005, 'Azmeera', 'SAQ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-09-04', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:38:54', '2024-09-06 08:50:47', '2024-09-04 09:31:34', '2024-09-02 08:40:33', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(100, '2024-09-02', 6007, 'Mohamad Firdaus', 'SITE pm', 'ALL', 8, 'MDT 1475', 'Done', '2024-09-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:37:10', '2024-09-04 09:29:28', '2024-09-02 14:53:34', '2024-09-02 14:53:24', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(101, '2024-09-02', 6005, 'Mohamad Rosidi', 'AMBIL GAMBAR SITE TOWER 3 ZON', 'ALOR GAJAH, JASIN & MELAKA TENGAH', 10, 'MDT 9518', 'Done', '2024-09-04', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '17:02:11', '2024-09-05 08:11:43', '2024-09-04 09:33:42', '2024-09-03 08:04:27', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(102, '2024-09-02', 6005, 'Mohamad Rosidi', 'AMBIL GAMBAR SITE TOWER 3 ZON', 'ALOR GAJAH, JASIN & MELAKA TENGAH', 10, 'MDT 9518', 'Done', '2024-09-05', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '17:02:45', '2024-09-06 16:47:13', '2024-09-05 08:11:50', '2024-09-03 08:04:38', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(103, '2024-09-02', 4703, 'Ainur Hawa', 'SAQ', 'Entire Melaka', 10, 'MDT 9518', 'Done', '2024-09-03', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:23:10', '2024-09-03 17:41:43', '2024-09-03 16:23:45', '2024-09-03 08:04:12', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(104, '2024-09-03', 9011, 'Siti Sara', 'Send drawing to LL, Collect ulasan Teknikal ', 'SAMB dan seri negeri', 7, 'MDK 2089', 'Done', '2024-09-03', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:34:25', '2024-09-04 09:30:09', '2024-09-03 12:31:39', '2024-09-03 08:43:28', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(105, '2024-09-03', 6007, 'Mohamad Firdaus', 'SITE pm/tender briefing', 'mrke ', 8, 'MDT 1475', 'Done', '2024-09-03', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '09:18:14', '2024-09-05 08:12:50', '2024-09-05 08:12:42', '2024-09-03 10:38:58', '', '', 'Noor Ashikin', 'Mohamad Hamdan', ''),
(106, '2024-09-03', 10, 'Mohd Jailani', 'Meeting WIth YDP MPAG', 'MPAG, ALor Gajah', 6, 'MDT 1578', 'Done', '2024-09-05', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '11:29:32', '2024-09-06 08:52:08', '2024-09-06 08:52:04', '2024-09-03 12:31:22', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(107, '2024-09-03', 10, 'Mohd Jailani', 'Meeting With Pengarah MARA HQ Bahagian Aset', 'Ibu Pejabat MARA HQ @ KL', 6, 'MDT 1578', 'Reject', '2024-09-06', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '11:30:43', '', '', '2024-09-03 15:20:01', '', 'TAK JADI', 'Mohamad Hamdan', '', ''),
(108, '2024-09-03', 2014, 'Juriani ', 'SAQ', 'Bemban JPS', 9, 'MDT 9516', 'Done', '2024-09-05', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:38:26', '2024-09-06 08:51:18', '2024-09-06 08:51:12', '2024-09-04 09:29:15', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(109, '2024-09-04', 10, 'Mohd Jailani', 'Meeting with YAB CM Portfolio', 'Seri Negeri', 6, 'MDT 1578', 'Done', '2024-09-04', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '08:58:37', '2024-09-05 08:12:05', '2024-09-04 12:23:10', '2024-09-04 09:29:07', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(110, '2024-09-04', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Reject', '2024-09-05', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:34:07', '', '', '2024-09-04 12:24:02', '', 'cancel', 'Mohamad Hamdan', '', ''),
(111, '2024-09-04', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-09-06', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:34:25', '2024-09-09 09:17:30', '2024-09-06 08:50:57', '2024-09-04 12:24:08', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(112, '2024-09-04', 2014, 'Juriani ', 'SAQ', 'PDTAG & MPHTJ', 7, 'MDK 2089', 'Done', '2024-09-04', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:35:50', '2024-09-06 08:50:28', '2024-09-05 08:12:35', '2024-09-04 12:23:48', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(113, '2024-09-05', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-09-05', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:03:10', '2024-09-06 08:50:14', '2024-09-05 08:19:25', '2024-09-05 08:11:27', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(114, '2024-09-05', 10, 'Mohd Jailani', 'Meeting With Pengarah MARA HQ Bahagian Aset', 'Ibu Pejabat MARA Kuala Lumpur', 6, 'MDT 1578', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '09:02:19', '2024-09-11 08:31:53', '2024-09-10 16:54:11', '2024-09-05 09:12:11', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(115, '2024-09-05', 9011, 'Siti Sara', 'technical site survey', 'taman bertam setia', 7, 'MDK 2089', 'Done', '2024-09-05', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:05:57', '2024-09-06 08:50:09', '2024-09-05 09:11:44', '2024-09-05 09:10:40', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(116, '2024-09-06', 2014, 'Juriani ', 'Collect Pelan LPS', 'Jurukur Saharudin', 9, 'MDT 9516', 'Done', '2024-09-06', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:49:13', '2024-09-06 16:47:18', '2024-09-06 08:51:22', '2024-09-06 08:49:59', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(117, '2024-09-06', 6005, 'Mohamad Rosidi', 'AMBIL GAMBAR SITE TOWER 3 ZON', 'ALOR GAJAH, JASIN & MELAKA TENGAH', 10, 'MDT 9518', 'Done', '2024-09-06', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:53:35', '2024-09-06 16:46:57', '2024-09-06 08:54:00', '2024-09-06 08:53:55', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(118, '2024-09-06', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-09-06', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:48:49', '2024-09-06 16:47:05', '2024-09-06 10:08:02', '2024-09-06 10:07:50', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(119, '2024-09-06', 9022, 'Abdallah Wedud', 'Test printer ', 'Kl', 10, 'MDT 9518', 'Reject', '2024-09-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:56:26', '', '', '2024-09-06 11:36:38', '', 'Tukar Kenderaan', 'Mohamad Hamdan', '', ''),
(120, '2024-09-06', 2014, 'Juriani ', 'PERBINCANGAN BERKAITAN PEMBINAAN STRUKTUR TELEKOMUNIKASI DI KPM AYER MOLEK', 'Ibu Pejabat MARA, KL', 9, 'MDT 9516', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:21:31', '2024-09-11 08:32:04', '2024-09-10 08:28:04', '2024-09-06 11:37:10', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(121, '2024-09-06', 4703, 'Ainur Hawa', 'Site Visit and SAQ', 'Entire Melaka', 9, 'MDT 9516', 'Done', '2024-09-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:44:46', '2024-09-10 08:27:49', '2024-09-09 09:25:29', '2024-09-06 16:46:49', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(122, '2024-09-09', 9022, 'Abdallah Wedud', 'test barang', 'kl', 7, 'MDK 2089', 'Done', '2024-09-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:23:59', '2024-09-10 16:48:58', '2024-09-09 09:25:21', '2024-09-09 08:24:21', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(123, '2024-09-09', 9011, 'Siti Sara', 'SAQ', 'Batu Gajah & Taman Panglima Pak', 10, 'MDT 9518', 'Done', '2024-09-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:25:07', '2024-09-10 08:18:47', '2024-09-09 09:25:50', '2024-09-09 08:32:22', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(124, '2024-09-09', 7004, 'Chempaka', 'Training Fiber Optik', 'Bangi Resort Hotel', 9, 'MDT 9516', 'Reject', '2024-10-09', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:31:04', '', '', '', '', 'KEKURANGAN KENDERAAN SYARIKAT', '', '', ''),
(125, '2024-09-09', 7004, 'Chempaka', 'Training Fiber Optic', 'Bangi Resort Hotel', 9, 'MDT 9516', 'Reject', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:32:27', '', '', '', '', 'KEKURANGAN KENDERAAN SYARIKAT', '', '', ''),
(126, '2024-09-09', 7004, 'Chempaka', 'Training Fiber Optic', 'Bangi Resort Hotel', 9, 'MDT 9516', 'Reject', '2024-10-08', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 1, '08:33:47', '', '', '', '', 'KEKURANGAN KENDERAAN SYARIKAT', '', '', ''),
(127, '2024-09-09', 4707, 'Aidisham', 'Hantar Dokumen', 'Melaka', 5, 'MCR 5212', 'Done', '2024-09-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:00:31', '2024-09-09 14:53:51', '2024-09-09 09:01:33', '2024-09-09 09:01:27', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(128, '2024-09-09', 9011, 'Siti Sara', 'MEET YB KAWASAN', 'JAPERUN KOTA LAKSAMANA', 10, 'MDT 9518', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:54:22', '2024-09-10 16:52:03', '2024-09-10 16:51:17', '2024-09-10 08:18:53', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(129, '2024-09-09', 4704, 'Nur Amira', 'saq', 'melaka tengah dan alor gajah', 7, 'MDK 2089', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '23:04:36', '2024-09-10 16:52:54', '2024-09-10 08:20:57', '2024-09-10 08:20:42', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(130, '2024-09-09', 4704, 'Nur Amira', 'saq', 'jasin dan melaka tengah', 9, 'MDT 9516', 'Done', '2024-09-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '23:05:38', '2024-09-12 09:17:14', '2024-09-11 08:36:45', '2024-09-10 08:20:50', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(131, '2024-09-10', 2006, 'Mohamad Hamdan', 'BAYAR SAMAN', 'JPJ BUKIT KATIL', 5, 'MCR 5212', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:31:50', '2024-09-10 16:49:29', '2024-09-10 08:32:12', '2024-09-10 08:32:06', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(132, '2024-09-10', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-09-10', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:51:04', '2024-09-11 08:43:58', '2024-09-10 16:54:27', '2024-09-10 09:11:30', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(133, '2024-09-10', 9022, 'Abdallah Wedud', 'try', 'try', 6, 'MDT 1578', 'Reject', '2024-09-30', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:01:54', '', '', '', '', 'test 21', '', '', 'Abdallah Wedud'),
(134, '2024-09-10', 2014, 'Juriani ', 'Sign Pelan LPS', 'Selandar', 10, 'MDT 9518', 'Done', '2024-09-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '12:46:12', '2024-09-12 09:17:04', '2024-09-11 08:40:03', '2024-09-10 16:49:36', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(135, '2024-09-10', 2014, 'Juriani ', 'TSS Tmn Seri Rambai', 'Kg Solok Daeng', 9, 'MDT 9516', 'Done', '2024-09-12', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '12:47:12', '2024-09-12 16:34:56', '2024-09-12 09:16:54', '2024-09-10 16:49:40', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(136, '2024-09-11', 7001, 'Muhammad Nazreeq', 'smartpole', 'melaka', 7, 'MDK 2089', 'Done', '2024-09-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:22:35', '2024-09-12 09:16:34', '2024-09-12 09:16:18', '2024-09-11 10:28:02', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(137, '2024-09-11', 3001, 'Norasiyah', 'Hantar dokumen bayaran', 'Maybank, politeknik merlimau, yayasan melaka', 10, 'MDT 9518', 'Done', '2024-09-12', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:11:33', '2024-09-12 16:34:47', '2024-09-12 14:02:43', '2024-09-11 17:13:57', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(138, '2024-09-12', 7001, 'Muhammad Nazreeq', 'Wifi melaka', 'Melaka - Jasin', 7, 'MDK 2089', 'Done', '2024-09-12', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:14:51', '2024-09-17 10:05:16', '2024-09-12 09:16:44', '2024-09-12 09:16:02', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(139, '2024-09-12', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-09-12', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:18:59', '2024-09-17 10:14:24', '2024-09-12 14:02:28', '2024-09-12 14:02:17', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(140, '2024-09-12', 9009, 'Shahrol Nizam', 'Hantar En. Arzmein ke KLIA', 'KLIA Kuala Lumpur', 9, 'MDT 9516', 'Done', '2024-09-17', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '15:52:33', '2024-09-18 08:23:56', '2024-09-17 10:14:47', '2024-09-12 16:34:27', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(141, '2024-09-12', 9009, 'Shahrol Nizam', 'Menjemput En Arzmein di KLIA', 'KLIA Kuala Lumpur', 9, 'MDT 9516', 'Done', '2024-09-20', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '15:56:02', '2024-09-23 14:54:36', '2024-09-17 10:14:29', '2024-09-12 16:34:36', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(142, '2024-09-17', 9005, 'Azmeera', 'SAQ', 'MELAKA', 10, 'MDT 9518', 'Done', '2024-09-17', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:25:44', '2024-09-19 08:33:05', '2024-09-17 08:32:47', '2024-09-17 08:29:07', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(143, '2024-09-17', 9005, 'Azmeera', 'SAQ', 'MELAKA', 10, 'MDT 9518', 'Done', '2024-09-18', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:26:11', '2024-09-19 08:33:32', '2024-09-19 08:33:18', '2024-09-17 08:30:01', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(144, '2024-09-17', 9005, 'Azmeera', 'SAQ', 'MELAKA', 10, 'MDT 9518', 'Done', '2024-09-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:26:40', '2024-09-20 10:46:33', '2024-09-19 08:33:25', '2024-09-17 08:30:59', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(145, '2024-09-17', 9013, 'Ahmad Muzhaffar', 'Site visit', 'Sungai Petai', 7, 'MDK 2089', 'Done', '2024-09-17', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '08:28:47', '2024-09-18 08:27:16', '2024-09-17 08:32:20', '2024-09-17 08:29:40', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(146, '2024-09-17', 4703, 'Ainur Hawa', 'Site Visit and SAQ', 'Melaka', 9, 'MDT 9516', 'Done', '2024-09-18', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:36:04', '2024-09-20 10:46:19', '2024-09-18 10:46:49', '2024-09-17 10:08:52', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(147, '2024-09-17', 2014, 'Juriani ', 'Submit TA & Collect Supporting Doc', 'MARA HQ', 10, 'MDT 9518', 'Done', '2024-09-20', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:37:48', '2024-09-21 09:25:20', '2024-09-20 10:46:43', '2024-09-17 10:10:08', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(148, '2024-09-17', 2014, 'Juriani ', 'Submit Permohonan LPS & Dapatkan ulasan agensi teknikal', 'SAMB, PDTMT, JPS', 9, 'MDT 9516', 'Done', '2024-09-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:39:34', '2024-09-20 10:47:04', '2024-09-20 10:46:52', '2024-09-17 10:14:00', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(149, '2024-09-17', 9011, 'Siti Sara', 'OSC Meeting', 'Majlis Bandaraya Melaka Bersejarah (MBMB)', 7, 'MDK 2089', 'Done', '2024-09-18', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:46:28', '2024-09-19 17:00:06', '2024-09-18 08:27:04', '2024-09-17 10:05:49', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(150, '2024-09-18', 7001, 'Muhammad Nazreeq', 'Stor', 'Melaka', 5, 'MCR 5212', 'Done', '2024-09-18', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:58:32', '2024-09-19 08:33:55', '2024-09-18 10:46:34', '2024-09-18 10:46:25', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(151, '2024-09-18', 6005, 'Mohamad Rosidi', 'AMBIL HADIAH KETUA MENTERI ', 'Dancom Petaling Jaya, Selangor', 5, 'MCR 5212', 'Done', '2024-09-19', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '11:38:50', '2024-09-20 10:47:18', '2024-09-20 10:47:13', '2024-09-19 08:32:28', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(152, '2024-09-19', 3015, 'Nur Farhana', 'AWARENESS AND RETURN OF NET REVENUE (\"RONR\") ENGAGEMENT PROGRAM MELAKA 2024', 'MCMC MELAKA STATE OFFICE AYER KEROH', 9, 'MDT 9516', 'Done', '2024-09-24', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '08:31:06', '2024-09-24 12:34:59', '2024-09-24 10:56:28', '2024-09-19 08:32:41', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(153, '2024-09-19', 9008, 'Muhammad Firdaus Naim', 'Site Visit', 'Masjid Tanah', 8, 'MDT 1475', 'Done', '2024-09-19', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:37:36', '2024-09-21 09:25:14', '2024-09-21 09:25:06', '2024-09-19 08:39:45', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(154, '2024-09-19', 9011, 'Siti Sara', 'Pre-consult', 'Jabatan teknikal melaka', 7, 'MDK 2089', 'Done', '2024-09-19', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:17:18', '2024-09-19 17:00:11', '2024-09-19 16:59:58', '2024-09-19 16:59:50', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(155, '2024-09-19', 7001, 'Muhammad Nazreeq', 'Stor', 'Melaka', 7, 'MDK 2089', 'Reject', '2024-09-20', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '18:35:08', '', '', '', '', 'Tidak Jadi Digunakan', '', '', 'Shahrol Nizam'),
(156, '2024-09-20', 6005, 'Mohamad Rosidi', 'HANTAR HADIAH OFFICE PUU DAN AMBIL GOODIES SMIX2024', 'SERI NEGERI ', 5, 'MCR 5212', 'Done', '2024-09-20', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '11:20:25', '2024-09-20 16:09:10', '2024-09-20 12:09:31', '2024-09-20 11:20:50', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(157, '2024-09-20', 9011, 'Siti Sara', 'MEETING OSC', 'Majlis Bandaraya Melaka Bersejarah (MBMB)', 10, 'MDT 9518', 'Done', '2024-09-25', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '12:17:47', '2024-09-25 16:41:31', '2024-09-25 09:13:55', '2024-09-20 16:09:26', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(158, '2024-09-23', 2006, 'Mohamad Hamdan', 'hantar barangan ofis ke stor', 'jasin, krubong dan stor micth', 5, 'MCR 5212', 'Done', '2024-09-23', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:14:18', '2024-09-25 08:19:48', '2024-09-25 08:19:45', '2024-09-23 08:14:31', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(159, '2024-09-23', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-09-23', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:38:28', '2024-09-25 08:19:38', '2024-09-25 08:19:33', '2024-09-23 09:54:09', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(160, '2024-09-23', 9011, 'Siti Sara', 'Collect Drawing at SAMB', 'Syarikat Air Melaka Berhad (SAMB)', 10, 'MDT 9518', 'Reject', '2024-09-23', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '11:46:39', '', '', '', '', 'REQUEST BY STAFF', '', '', 'Noor Ashikin'),
(161, '2024-09-23', 9011, 'Siti Sara', 'Collect Drawing ', 'Syarikat Air Melaka Berhad (SAMB)', 10, 'MDT 9518', 'Done', '2024-09-23', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '11:50:23', '2024-09-24 12:37:02', '2024-09-24 12:36:53', '2024-09-23 11:50:45', '', '', 'Noor Ashikin', 'Mohamad Hamdan', ''),
(162, '2024-09-23', 5001, 'Ahmad Safwan', 'Maxis Mobile, Fiber and OSP Agreement Meeting', 'Maxis KLCC, Kuala Lumpur', 6, 'MDT 1578', 'Done', '2024-10-01', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '12:11:39', '2024-10-02 14:01:12', '2024-09-27 09:56:16', '2024-09-23 12:31:54', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(163, '2024-09-23', 5001, 'Ahmad Safwan', 'Mesyuarat dan Lawatan Kilang PMW Industries Sdn Bhd', 'Ipoh, Perak', 6, 'MDT 1578', 'Done', '2024-10-14', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '15:25:12', '2024-10-15 09:47:30', '2024-10-14 08:32:09', '2024-09-24 08:27:21', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(164, '2024-09-23', 5001, 'Ahmad Safwan', 'Mesyuarat dan Lawatan Kilang PMW Industries Sdn Bhd', 'Ipoh, Perak', 6, 'MDT 1578', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '15:25:43', '2024-10-17 11:32:44', '2024-10-14 08:32:12', '2024-09-24 08:27:43', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(165, '2024-09-23', 2014, 'Juriani ', 'Discussion JKPTG - Rejimen 21 Komando', 'JKPTG Melaka', 10, 'MDT 9518', 'Done', '2024-09-24', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:42:07', '2024-09-25 08:19:10', '2024-09-24 12:35:49', '2024-09-24 07:36:49', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(166, '2024-09-23', 2014, 'Juriani ', 'Submit Insurans MPAG', 'MPAG', 9, 'MDT 9516', 'Done', '2024-09-25', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:42:52', '2024-09-25 09:14:36', '2024-09-25 09:14:27', '2024-09-24 08:28:09', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(167, '2024-09-23', 2014, 'Juriani ', 'Submit PreConsult', 'Seri Negeri, Agensi Teknikal', 9, 'MDT 9516', 'Done', '2024-09-26', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:44:47', '2024-09-26 16:49:11', '2024-09-26 08:44:58', '2024-09-24 08:28:33', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(168, '2024-09-24', 9009, 'Shahrol Nizam', 'Ukuran Baju BOD', 'Seri Negeri', 7, 'MDK 2089', 'Done', '2024-09-24', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '07:49:25', '2024-09-24 07:52:54', '2024-09-24 07:50:47', '2024-09-24 07:50:37', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(169, '2024-09-24', 9009, 'Shahrol Nizam', 'Ukuran Baju BOD', 'Seri Negeri', 7, 'MDK 2089', 'Done', '2024-09-24', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '07:49:30', '2024-09-24 07:52:59', '2024-09-24 07:52:48', '2024-09-24 07:50:06', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(170, '2024-09-24', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-09-24', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:26:42', '2024-09-25 08:19:25', '2024-09-24 12:35:19', '2024-09-24 08:27:53', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(171, '2024-09-24', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-09-25', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:27:55', '2024-09-26 08:42:55', '2024-09-25 08:20:07', '2024-09-24 08:28:21', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(172, '2024-09-24', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-09-24', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:36:51', '2024-09-25 08:19:03', '2024-09-24 12:35:59', '2024-09-24 08:58:41', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(173, '2024-09-24', 4707, 'Aidisham', 'Hantar dokument', 'Jasin, Melaka dan Alor Gajah', 5, 'MCR 5212', 'Done', '2024-09-24', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:00:49', '2024-09-25 08:18:47', '2024-09-24 12:35:12', '2024-09-24 09:01:22', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(175, '2024-09-24', 9022, 'Abdallah Wedud', 'ONCC', 'SERI NEGERI', 9, 'MDT 9516', 'Done', '2024-09-24', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '16:30:02', '2024-09-25 08:18:42', '2024-09-24 16:34:07', '2024-09-24 16:33:53', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(176, '2024-09-25', 2006, 'Mohamad Hamdan', 'pergi stor micth', 'pergi stor micth', 5, 'MCR 5212', 'Done', '2024-09-25', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:21:12', '2024-09-25 15:40:04', '2024-09-25 09:12:58', '2024-09-25 09:12:52', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(177, '2024-09-25', 3007, 'Norwajunizam', 'Meeting at Mutakhir Meeting Room with Maxis & BTMK', 'Seri Negeri', 6, 'MDT 1578', 'Done', '2024-09-26', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '14:26:28', '2024-09-27 08:23:05', '2024-09-26 13:52:11', '2024-09-25 15:39:39', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(178, '2024-09-25', 2006, 'Mohamad Hamdan', 'Menghantar dokument ke stor baharu', 'melaka', 5, 'MCR 5212', 'Done', '2024-09-30', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '15:41:27', '2024-10-02 08:38:52', '2024-10-02 08:38:48', '2024-09-25 15:44:25', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(179, '2024-09-25', 2006, 'Mohamad Hamdan', 'membuat bayaran di mphtj', 'MPHTJ', 5, 'MCR 5212', 'Reject', '2024-09-25', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '15:42:10', '', '', '', '', 'cancel\r\n', '', '', 'Shahrol Nizam'),
(180, '2024-09-25', 2006, 'Mohamad Hamdan', 'membuat bayaran di mphtj', 'MPHTJ', 5, 'MCR 5212', 'Done', '2024-09-26', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '15:42:53', '2024-09-26 14:19:52', '2024-09-26 08:45:17', '2024-09-25 15:44:11', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(181, '2024-09-25', 2006, 'Mohamad Hamdan', 'Beli barang pantry dan hantar dokument', 'Alor Gajah dan Melaka', 5, 'MCR 5212', 'Done', '2024-09-27', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '15:43:41', '2024-09-27 16:06:19', '2024-09-27 10:06:31', '2024-09-25 15:44:20', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(182, '2024-09-26', 4689, 'Siti Nor Amieza', 'EXTERNAL AUDIT - SITE VISIT ', 'TEBONG, ULSB, TAMAN BERTAM SETIA, KOA MACHAP', 7, 'MDK 2089', 'Done', '2024-09-26', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:47:08', '2024-09-26 16:57:02', '2024-09-26 08:47:46', '2024-09-26 08:47:38', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(183, '2024-09-26', 9016, 'Mohammad Amirul Haqimi', 'ONCC ', 'PDT Jasin', 10, 'MDT 9518', 'Done', '2024-09-26', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '09:05:19', '2024-09-27 08:22:49', '2024-09-27 08:22:43', '2024-09-26 10:00:13', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(184, '2024-09-26', 9014, 'Muhammad Amir Luqman', 'MAXIS NCR TRAINING', 'MENARA MAXIS KUALA LUMPUR', 9, 'MDT 9516', 'Reject', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '12:55:08', '', '', '2024-09-26 14:20:00', '', 'pertukaran kenderaan', 'Mohamad Hamdan', '', 'Mohamad Hamdan');
INSERT INTO `management` (`id`, `date`, `user_id`, `user_name`, `purpose`, `destination`, `vehicle_id`, `model_plat`, `status`, `start_date`, `start_time`, `end_date`, `fuel_card`, `tng_card`, `currenttime`, `cu_keyreturn`, `cu_key`, `cu_approve`, `remark1`, `sebab`, `Approver`, `Receiver`, `rejected`) VALUES
(185, '2024-09-26', 2014, 'Juriani ', 'Submit Pelan Pindaan', 'PDTMT', 9, 'MDT 9516', 'Done', '2024-09-27', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '17:06:11', '2024-09-27 16:09:23', '2024-09-27 08:53:20', '2024-09-26 17:07:45', '', '', 'Noor Ashikin', 'Mohamad Hamdan', ''),
(187, '2024-09-26', 9008, 'Muhammad Firdaus Naim', 'Taklimat TNB', 'TNB PUTRAJAYA ', 10, 'MDT 9518', 'Done', '2024-10-01', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '17:27:45', '2024-10-02 08:37:40', '2024-09-27 16:06:03', '2024-09-27 08:21:46', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(188, '2024-09-27', 9014, 'Muhammad Amir Luqman', 'MEETING', 'MPAG', 10, 'MDT 9518', 'Done', '2024-09-27', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '07:57:16', '2024-09-27 12:21:21', '2024-09-27 08:24:35', '2024-09-27 08:21:31', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(189, '2024-09-27', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-09-27', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:38:45', '2024-09-27 16:53:00', '2024-09-27 08:40:15', '2024-09-27 08:39:28', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(190, '2024-09-27', 9014, 'Muhammad Amir Luqman', 'SITE INSPECTION', 'PULAU SEBANG', 8, 'MDT 1475', 'Done', '2024-10-01', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:06:56', '2024-10-02 08:39:15', '2024-10-02 08:39:01', '2024-09-27 16:20:58', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(191, '2024-09-27', 9011, 'Siti Sara', 'MEET LANDLORD', 'TAMAN DESA CHENG PERDANA', 9, 'MDT 9516', 'Done', '2024-10-01', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '16:38:23', '2024-10-01 17:25:12', '2024-10-01 09:58:11', '2024-09-27 16:53:20', '', '', 'Mohamad Hamdan', 'Noor Ashikin', ''),
(192, '2024-10-01', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-10-01', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:20:01', '2024-10-02 08:38:31', '2024-10-02 08:38:26', '2024-10-01 09:57:45', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(193, '2024-10-01', 9005, 'Azmeera', 'SAQ', 'MELAKA', 7, 'MDK 2089', 'Done', '2024-10-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:20:16', '2024-10-03 08:35:08', '2024-10-02 08:38:38', '2024-10-01 09:57:51', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(194, '2024-10-01', 9016, 'Mohammad Amirul Haqimi', 'Projek Server MPJ', 'Majlis Perbandaran Jasin', 10, 'MDT 9518', 'Reject', '2024-10-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:55:07', '', '', '2024-10-01 09:57:58', '', 'CANCEL', 'Shahrol Nizam', '', 'Shahrol Nizam'),
(195, '2024-10-01', 9022, 'Abdallah Wedud', 'try', 'try', 6, 'MDT 1578', 'Reject', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '15:35:24', '', '', '', '', 'DTM TRY', '', '', 'Noor Ashikin'),
(196, '2024-10-01', 4714, 'Zulliana', 'Meeting with sunway hotel', 'Sunway Lagoon', 6, 'MDT 1578', 'Done', '2024-10-02', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '21:34:07', '2024-10-03 16:42:05', '2024-10-02 14:01:23', '2024-10-02 08:27:11', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(197, '2024-10-02', 9014, 'Muhammad Amir Luqman', 'JSV ', 'AYER LIMAU', 9, 'MDT 9516', 'Done', '2024-10-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:25:45', '2024-10-02 12:55:41', '2024-10-02 10:34:56', '2024-10-02 08:27:04', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(198, '2024-10-02', 4703, 'Ainur Hawa', 'SAQ', 'Melaka', 10, 'MDT 9518', 'Done', '2024-10-02', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:41:35', '2024-10-03 08:35:26', '2024-10-02 10:33:45', '2024-10-02 10:33:37', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(199, '2024-10-02', 2014, 'Juriani ', 'Submit LOI', 'Banting', 10, 'MDT 9518', 'Done', '2024-10-03', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:45:23', '2024-10-04 08:27:30', '2024-10-03 08:35:33', '2024-10-02 10:33:53', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(200, '2024-10-02', 6005, 'Mohamad Rosidi', 'AMBIL CRYSTAL DAN BANTING SMIX', 'KILANG SUPPLIER', 5, 'MCR 5212', 'Done', '2024-10-02', '2pm-5pm(Halfday Evening)', '0000-00-00', 1, 0, '12:03:41', '2024-10-03 08:47:23', '2024-10-02 12:26:34', '2024-10-02 12:11:50', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(201, '2024-10-02', 9009, 'Shahrol Nizam', 'Pickup Baju Korporat Hitam (Datuk SUK & Datuk Salhah)', 'PWTC, Kuala Lumpur', 9, 'MDT 9516', 'Done', '2024-10-04', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '12:17:09', '2024-10-07 08:35:05', '2024-10-04 08:10:58', '2024-10-02 12:49:04', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(202, '2024-10-02', 9014, 'Muhammad Amir Luqman', 'JSV', 'TMN PAYA RUMPUT', 9, 'MDT 9516', 'Done', '2024-10-02', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '12:59:13', '2024-10-03 08:46:06', '2024-10-02 13:00:29', '2024-10-02 12:59:55', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(203, '2024-10-02', 9014, 'Muhammad Amir Luqman', 'JSV', 'TMN PAYA RUMPUT', 9, 'MDT 9516', 'Reject', '2024-10-02', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '12:59:17', '', '', '', '', '', '', '', 'Mohamad Hamdan'),
(204, '2024-10-02', 9016, 'Mohammad Amirul Haqimi', 'Preventive Maintanence Wifi', 'Kediaman SUK', 9, 'MDT 9516', 'Done', '2024-10-03', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '18:00:46', '2024-10-04 08:11:22', '2024-10-03 08:48:08', '2024-10-03 08:34:48', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(205, '2024-10-03', 9011, 'Siti Sara', 'SAQ', 'KAMPUNG BATU GAJAH / PANGLIMA PAK', 7, 'MDK 2089', 'Done', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:37:54', '2024-10-08 13:08:32', '2024-10-07 08:36:21', '2024-10-03 08:46:12', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(206, '2024-10-03', 9011, 'Siti Sara', 'SAQ', 'KAMPUNG BATU GAJAH / PANGLIMA PAK', 7, 'MDK 2089', 'Reject', '2024-10-09', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:38:42', '', '', '2024-10-03 08:46:16', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(207, '2024-10-03', 9011, 'Siti Sara', 'SAQ & MEET LANDLORD', 'KAMPUNG BATU GAJAH / PANGLIMA PAK', 9, 'MDT 9516', 'Reject', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:39:17', '', '', '2024-10-03 08:46:21', '', 'cancel', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(208, '2024-10-03', 9011, 'Siti Sara', 'MEET LANDLORD', 'TAMAN PAYA RUMPUT PERDANA', 7, 'MDK 2089', 'Done', '2024-10-03', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:50:01', '2024-10-04 08:27:10', '2024-10-03 09:24:37', '2024-10-03 09:23:49', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(210, '2024-10-04', 2014, 'Juriani ', 'Preconsult', 'Agensi teknikal', 10, 'MDT 9518', 'Done', '2024-10-04', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '06:45:25', '2024-10-04 16:40:39', '2024-10-04 08:27:38', '2024-10-04 08:11:29', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(211, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'Ambil Goodies', 'Alain De Louis', 5, 'MCR 5212', 'Reject', '2024-10-04', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:21:52', '', '', '', '', 'testing\r\n', '', '', 'Mohamad Hamdan'),
(212, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 10, 'MDT 9518', 'Done', '2024-10-09', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:23:11', '2024-10-10 16:40:18', '2024-10-08 13:37:07', '2024-10-04 08:25:41', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(213, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 10, 'MDT 9518', 'Done', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:23:34', '2024-10-14 08:29:22', '2024-10-08 13:37:14', '2024-10-04 08:25:44', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(214, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 10, 'MDT 9518', 'Done', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:23:58', '2024-10-14 08:29:26', '2024-10-08 13:37:20', '2024-10-04 08:25:48', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(215, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 5, 'MCR 5212', 'Done', '2024-10-09', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:24:43', '2024-10-10 16:40:27', '2024-10-08 13:34:33', '2024-10-04 08:25:51', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(216, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 5, 'MCR 5212', 'Done', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:25:04', '2024-10-14 08:29:32', '2024-10-08 13:34:43', '2024-10-04 08:25:54', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(217, '2024-10-04', 2006, 'Mohamad Hamdan', 'mengambil goodies koporat', 'tasik utama', 5, 'MCR 5212', 'Done', '2024-10-04', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:25:12', '2024-10-04 16:39:38', '2024-10-04 08:26:22', '2024-10-04 08:25:36', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(218, '2024-10-04', 9016, 'Mohammad Amirul Haqimi', 'SMIX', 'DoubleTree', 5, 'MCR 5212', 'Done', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:25:24', '2024-10-14 08:29:36', '2024-10-08 13:34:49', '2024-10-04 08:25:58', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(219, '2024-10-04', 4689, 'Siti Nor Amieza', 'site visit RKLE - TSS, SAQ - Clawback ', 'Kg Sebatu, Jln Datuk Nawar, Panglima Pak , Kota Laksamana', 7, 'MDK 2089', 'Done', '2024-10-04', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '09:33:52', '2024-10-04 15:57:18', '2024-10-04 15:00:53', '2024-10-04 09:34:23', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(220, '2024-10-04', 9014, 'Muhammad Amir Luqman', 'MAXIS NCR TRAINING', 'MENARA MAXIS KUALA LUMPUR', 10, 'MDT 9518', 'Done', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '14:54:53', '2024-10-08 13:07:32', '2024-10-04 16:41:06', '2024-10-04 14:57:06', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(221, '2024-10-04', 4710, 'Ridzuan', 'HANTAR DOKUMEN BOD ', 'MELAKA', 9, 'MDT 9516', 'Done', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:46:26', '2024-10-07 15:26:15', '2024-10-07 08:35:32', '2024-10-07 08:21:34', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(222, '2024-10-07', 2006, 'Mohamad Hamdan', 'HANTAR BARANG', 'stor micth', 5, 'MCR 5212', 'Done', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:22:40', '2024-10-07 16:53:44', '2024-10-07 11:32:44', '2024-10-07 08:22:53', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(223, '2024-10-07', 9008, 'Muhammad Firdaus Naim', 'Site Visit', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-10-07', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:54:13', '2024-10-08 13:07:39', '2024-10-07 15:50:25', '2024-10-07 12:36:46', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(224, '2024-10-07', 4703, 'Ainur Hawa', 'Site Visit ', 'Melaka', 9, 'MDT 9516', 'Done', '2024-10-08', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:57:27', '2024-10-10 16:40:11', '2024-10-08 13:07:15', '2024-10-07 12:36:55', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(225, '2024-10-07', 9004, 'Arzmein', 'CIMS DI MCMC CYBERJAYA', 'MCMC CYBER JAYA', 8, 'MDT 1475', 'Reject', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '14:48:11', '', '', '2024-10-07 15:26:24', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(226, '2024-10-07', 10, 'Mohd Jailani', 'Meeting with ADO Mlk Tengah & OSC MPHTJ', 'PDTMT & MPHTJ', 6, 'MDT 1578', 'Done', '2024-10-08', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '16:24:31', '2024-10-08 13:07:25', '2024-10-08 09:08:49', '2024-10-07 16:52:40', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(227, '2024-10-08', 2014, 'Juriani ', 'Site visit', 'Tg minyak', 9, 'MDT 9516', 'Done', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '13:56:31', '2024-10-10 16:41:55', '2024-10-10 16:41:43', '2024-10-08 14:09:41', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(228, '2024-10-08', 2014, 'Juriani ', 'Site visit', 'Tg minyak', 9, 'MDT 9516', 'Reject', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '13:56:34', '', '', '', '', '', '', '', 'Mohamad Hamdan'),
(229, '2024-10-08', 2014, 'Juriani ', 'Site visit', 'Tg minyak', 9, 'MDT 9516', 'Reject', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '13:56:37', '', '', '', '', '', '', '', 'Mohamad Hamdan'),
(230, '2024-10-08', 2014, 'Juriani ', 'Site visit', 'Tg minyak', 9, 'MDT 9516', 'Reject', '2024-10-10', '9am-5pm(Fullday)', '0000-00-00', 0, 1, '13:56:39', '', '', '', '', '', '', '', 'Mohamad Hamdan'),
(231, '2024-10-08', 2014, 'Juriani ', 'SMIX2024', 'Double Tree', 9, 'MDT 9516', 'Reject', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '13:57:39', '', '', '2024-10-08 14:09:50', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(232, '2024-10-10', 9004, 'Arzmein', 'Workshop MCMC', 'Cyberjaya', 9, 'MDT 9516', 'Done', '2024-10-11', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '16:53:10', '2024-10-14 08:28:45', '2024-10-10 16:55:42', '2024-10-10 16:55:28', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(233, '2024-10-13', 4704, 'Nur Amira', 'sign documents with landlord', 'perak', 10, 'MDT 9518', 'Reject', '2024-10-14', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '22:24:27', '', '', '2024-10-14 08:29:44', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(234, '2024-10-13', 4704, 'Nur Amira', 'sent documents', 'melaka tengah and jasin', 10, 'MDT 9518', 'Done', '2024-10-15', '2pm-5pm(Halfday Evening)', '0000-00-00', 0, 0, '22:25:50', '2024-10-15 08:30:19', '2024-10-15 08:28:32', '2024-10-14 08:23:27', '', '', 'Shahrol Nizam', 'Shahrol Nizam', ''),
(235, '2024-10-14', 2014, 'Juriani ', 'Pra runding Tanah', 'JPS, PDTMT, SAMB', 9, 'MDT 9516', 'Done', '2024-10-14', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '06:39:18', '2024-10-15 09:47:12', '2024-10-14 08:30:04', '2024-10-14 08:23:37', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(236, '2024-10-14', 9005, 'Azmeera', 'SIGN LOI', 'IPOH PERAK', 7, 'MDK 2089', 'Done', '2024-10-14', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:18:53', '2024-10-15 09:47:56', '2024-10-14 08:22:43', '2024-10-14 08:19:47', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(237, '2024-10-14', 9011, 'Siti Sara', 'SUBMIT & COLLECT DOCUMENT', 'Pejabat Tanah Melaka Tengah', 9, 'MDT 9516', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:45:31', '2024-10-16 08:08:23', '2024-10-15 09:47:39', '2024-10-14 13:00:50', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(238, '2024-10-14', 9011, 'Siti Sara', 'SAQ', 'BATU GAJAH', 9, 'MDT 9516', 'Done', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:52:10', '2024-10-17 08:58:02', '2024-10-17 08:57:54', '2024-10-14 13:00:54', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(239, '2024-10-15', 4710, 'Ridzuan', 'hantar dokumen', 'melaka', 10, 'MDT 9518', 'Done', '2024-10-15', '9am-1pm(Halfday Morning)', '0000-00-00', 0, 0, '08:16:21', '2024-10-15 10:06:03', '2024-10-15 09:47:22', '2024-10-15 08:16:31', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(240, '2024-10-15', 4704, 'Nur Amira', 'collect and send documents', 'Jasin, Alor Gajah, melaka tengah', 7, 'MDK 2089', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:37:10', '2024-10-16 15:45:27', '2024-10-15 08:40:09', '2024-10-15 08:40:01', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(241, '2024-10-15', 2014, 'Juriani ', 'PDTMT', 'Melaka tengah', 10, 'MDT 9518', 'Reject', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '08:39:57', '', '', '2024-10-15 09:47:04', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(242, '2024-10-15', 2006, 'Mohamad Hamdan', 'HANTAR BARANG', 'SELURUH MELAKA', 5, 'MCR 5212', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '10:02:15', '2024-10-15 14:34:44', '2024-10-15 10:02:39', '2024-10-15 10:02:31', '', '', 'Mohamad Hamdan', 'Mohamad Hamdan', ''),
(243, '2024-10-15', 9008, 'Muhammad Firdaus Naim', 'PREVENTIVE MAINTENANCE ', 'Alor Gajah', 8, 'MDT 1475', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '10:28:51', '2024-10-16 08:08:37', '2024-10-15 11:23:20', '2024-10-15 11:23:11', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(244, '2024-10-15', 5, 'Nurul Fara Nadia', 'family day', 'sunway lagoon', 10, 'MDT 9518', 'Done', '2024-10-15', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '11:38:30', '2024-10-15 14:35:06', '2024-10-15 11:40:36', '2024-10-15 11:40:29', '', '', 'Shahrol Nizam', 'Mohamad Hamdan', ''),
(246, '2024-10-15', 4714, 'Zulliana', 'Site Visit at Sunway Lagoon', 'Sunway Lagoon', 6, 'MDT 1578', 'Done', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '18:01:40', '2024-10-17 08:59:48', '2024-10-16 15:44:51', '2024-10-16 08:07:59', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(247, '2024-10-16', 6005, 'Mohamad Rosidi', 'Site visit Family Day Micth 2024', 'Sunway Lagoon ', 7, 'MDK 2089', 'Reject', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '07:55:30', '', '', '2024-10-16 08:08:07', '', '', 'Mohamad Hamdan', '', 'Mohamad Hamdan'),
(248, '2024-10-16', 2014, 'Juriani ', 'PDTMT', 'MELAKA TENGAH', 10, 'MDT 9518', 'Done', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 0, 0, '08:35:38', '2024-10-17 08:59:25', '2024-10-16 08:39:06', '2024-10-16 08:36:44', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(249, '2024-10-16', 6005, 'Mohamad Rosidi', 'Site visit Family Day Micth 2024', 'Sunway Lagoon ', 7, 'MDK 2089', 'Done', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:36:16', '2024-10-17 08:57:40', '2024-10-16 08:43:37', '2024-10-16 08:36:47', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(250, '2024-10-16', 4710, 'Ridzuan', 'Hantar dokumen bod', 'MELAKA', 5, 'MCR 5212', 'Done', '2024-10-16', '9am-5pm(Fullday)', '0000-00-00', 1, 1, '08:36:50', '2024-10-17 08:58:41', '2024-10-16 08:37:00', '2024-10-16 08:36:55', '', '', 'Mohamad Hamdan', 'Shahrol Nizam', ''),
(251, '2024-10-16', 2014, 'Juriani ', 'Site Visit', 'MELAKA TENGAH', 10, 'MDT 9518', 'Return', '2024-10-17', '9am-1pm(Halfday Morning)', '0000-00-00', 1, 0, '09:54:52', '', '2024-10-17 08:59:18', '2024-10-16 15:41:45', '', '', 'Shahrol Nizam', '', ''),
(252, '2024-10-16', 4704, 'Nur Amira', 'saq', 'melaka tengah, alor gajah. jasin', 9, 'MDT 9516', 'Return', '2024-10-17', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:12:04', '', '2024-10-17 08:57:22', '2024-10-16 15:41:56', '', '', 'Shahrol Nizam', '', ''),
(253, '2024-10-16', 4704, 'Nur Amira', 'SAQ', 'melaka tengah, alor gajah. jasin', 9, 'MDT 9516', 'Approved', '2024-10-18', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '11:12:57', '', '', '2024-10-16 15:41:51', '', '', 'Shahrol Nizam', '', ''),
(254, '2024-10-16', 9011, 'Siti Sara', 'Pembayaran Permit IWK Pekan Sg. Udang', 'MBMB', 7, 'MDK 2089', 'Return', '2024-10-17', '9am-5pm(Fullday)', '0000-00-00', 1, 0, '15:51:00', '', '2024-10-17 08:57:29', '2024-10-17 08:25:45', '', '', 'Shahrol Nizam', '', '');

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
  `purpose` varchar(255) NOT NULL,
  `Approver` varchar(255) NOT NULL,
  `rejected` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_room`
--

INSERT INTO `management_room` (`id`, `date`, `user_id`, `user_name`, `start_date`, `start_time`, `end_time`, `remark`, `sebab_reject`, `status`, `room_id`, `purpose`, `Approver`, `rejected`) VALUES
(1, '2024-07-24', 9022, 'Abdallah Wedud', '2024-07-24', '08:00', '21:30', 'ok', '', 'Done', '2', 'test', '', ''),
(2, '2024-07-24', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-25', '09:00', '10:00', '', 'your application is not justifiable, hence rejected. thank you ', 'Reject', '3', 'test', '', ''),
(5, '2024-07-25', 4725, 'Muhammad Farid', '2024-07-27', '08:00', '10:00', '', 'rejected. please reapply', 'Reject', '2', 'online meeting with supplier', '', ''),
(6, '2024-07-25', 1145, 'Norsyahira', '2024-07-26', '07:00', '12:00', 'dfhjhj', '', 'Done', '2', 'TEST', '', ''),
(7, '2024-07-25', 1145, 'Norsyahira', '2024-07-26', '07:00', '12:00', '', '', 'Canceled', '2', 'TEST', '', ''),
(8, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-29', '10:00', '11:00', '', '', 'Reserved', '3', 'DTM-POC Smartpole', '', ''),
(9, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-29', '09:00', '10:00', '', '', 'Reserved', '4', 'BIT-Meeting With Landlord ', '', ''),
(10, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-30', '10:00', '11:00', '', '', 'Pending', '3', 'BCOM-SAMB Landbank ', '', ''),
(11, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-31', '10:00', '11:00', '', '', 'Pending', '3', 'BCOM-Meeting With YTL (Rate For New Site)', '', ''),
(12, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-31', '14:30', '15:30', '', '', 'Pending', '4', 'BIT-CDB Huawei ', '', ''),
(13, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '10:30', '11:30', '', 'change time', 'Reject', '4', 'BCOM-Online Meeting With Maxis ', '', ''),
(14, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-05', '10:30', '11:30', '', '', 'Reserved', '4', 'BCOM- Celcom Post 20th (Online)', '', ''),
(15, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '10:00', '11:00', '', '', 'Reserved', '3', 'BIT, BCOM, DCLI - SMSB & Price Standardization', '', ''),
(17, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '14:00', '15:00', '', '', 'Reserved', '3', 'FIAD - Meeting Datuk Ariff (MICTH-Tax Agent)', '', ''),
(18, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '14:00', '15:00', '', '', 'Canceled', '3', 'FIAD-Meeting Datuk Ariff (MICTH-Tax Agent)', '', ''),
(19, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-29', '15:00', '16:00', '', '', 'Pending', '3', 'DTM-Meeting With MHI ', '', ''),
(20, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '15:00', '16:00', '', '', 'Reserved', '4', 'DTM-Final LI Visit Aliff ', '', ''),
(21, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '15:00', '16:00', '', '', 'Canceled', '4', 'DTM-Final LI Visit Aliff ', '', ''),
(22, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-30', '15:00', '16:00', '', '', 'Pending', '3', 'DCLI-Discussion With CEO (Skyline)', '', ''),
(23, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-31', '12:00', '13:00', '', '', 'Reserved', '3', 'test', '', ''),
(24, '2024-07-26', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-31', '11:00', '12:00', '', '', 'Pending', '4', 'DTM- Final LI Visit', '', ''),
(25, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '11:30', '13:00', '', '', 'Reserved', '3', 'BIT-Meeting With Celcom Digi ', '', ''),
(26, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '11:30', '13:00', '', '', 'Canceled', '3', 'BIT-Meeting With Celcom Digi ', '', ''),
(27, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-31', '11:00', '12:00', '', '', 'Pending', '4', 'BIT-Fiber ', '', ''),
(28, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '11:00', '12:00', '', '', 'Reserved', '4', 'BIT-Fiber', '', ''),
(29, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '11:00', '12:00', '', '', 'Canceled', '4', 'BIT-Fiber', '', ''),
(30, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-01', '14:30', '16:30', '', '', 'Reserved', '4', 'BIT-Meeting With CelcomDigi', '', ''),
(31, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-30', '15:00', '16:00', '', '', 'Pending', '4', 'DTM - Meeting With Upen (SMIX2024)', '', ''),
(32, '2024-07-29', 4715, 'Farah Nur\'Azreen Fatehah', '2024-07-30', '15:00', '16:00', '', '', 'Pending', '4', 'DTM - Meeting With Upen (SMIX2024)', '', ''),
(33, '2024-07-30', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '10:00', '12:00', '', '', 'Canceled', '4', 'BIT-Meeting With CelcomDigi', '', ''),
(34, '2024-07-31', 4725, 'Muhammad Farid', '2024-07-31', '18:00', '19:00', '', 'test', 'Reject', '2', 'Meeting', '', ''),
(35, '2024-08-01', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '15:30', '16:30', '', '', 'Reserved', '3', 'BCOM-Online Meeting With Maxis ', '', ''),
(36, '2024-08-01', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-02', '15:30', '16:30', '', '', 'Canceled', '3', 'BCOM-Online Meeting With Maxis ', '', ''),
(37, '2024-08-01', 4725, 'Muhammad Farid', '2024-08-03', '10:00', '11:00', '', '', 'Reserved', '4', 'test', '', ''),
(38, '2024-08-01', 4725, 'Muhammad Farid', '2024-08-03', '11:00', '12:00', '', '', 'Canceled', '4', 'test', '', ''),
(39, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-05', '14:30', '15:30', '', '', 'Reserved', '3', 'Meeting With Dancom ', '', ''),
(40, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-05', '14:30', '16:30', '', '', 'Reserved', '4', 'BCOM- Monthly Progress Update ', '', ''),
(41, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-05', '14:30', '16:30', '', '', 'Canceled', '4', 'BCOM- Monthly Progress Update ', '', ''),
(42, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '10:30', '11:30', '', '', 'Reserved', '3', 'CEO-WPU 5/2024- SMIX2024', '', ''),
(43, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '11:30', '12:30', '', '', 'Reserved', '3', 'DTM - POC Smartpole ', '', ''),
(44, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '11:30', '12:30', '', '', 'Canceled', '3', 'DTM - POC Smartpole ', '', ''),
(45, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-07', '10:00', '11:00', '', '', 'Reserved', '3', 'BCOM - Internal Meeting W/ SAQ ', '', ''),
(46, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-09', '09:30', '10:30', '', '', 'Reserved', '3', 'CEO-WPU7/2024 - Fiber ', '', ''),
(47, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-09', '10:30', '11:30', '', '', 'Reserved', '3', 'CEO-WPU 7/2024 - 5G ', '', ''),
(48, '2024-08-02', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-09', '15:00', '16:00', '', '', 'Reserved', '4', 'BCOM-Samb Landbank ', '', ''),
(49, '2024-08-05', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '10:00', '11:00', '', '', 'Reserved', '4', 'BCOM', '', ''),
(50, '2024-08-05', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-07', '15:00', '16:00', '', '', 'Reserved', '4', 'DTM-Meeting With Supplier (Lion Roar Innovations Sdn Bhd) ', '', ''),
(51, '2024-08-06', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '15:30', '16:30', '', '', 'Pending', '4', 'FIAD - Internal Meeting ', '', ''),
(52, '2024-08-06', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-06', '15:30', '16:30', '', '', 'Pending', '4', 'FIAD - Internal Meeting ', '', ''),
(53, '2024-08-06', 7002, 'Raihana', '2024-08-08', '10:30', '12:00', '', '', 'Release', '4', 'DTM Staff Meeting', '', ''),
(54, '2024-08-06', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-09', '15:00', '16:00', '', '', 'Reserved', '3', 'SMIC2024-Meeting With PLAN Malaysia', '', ''),
(55, '2024-08-06', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-09', '15:00', '16:00', '', '', 'Canceled', '3', 'SMIC2024-Meeting With PLAN Malaysia', '', ''),
(56, '2024-08-06', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-07', '15:30', '16:30', '', '', 'Pending', '3', 'BIT- Unit SAQ & Legal (LOI) ', '', ''),
(57, '2024-08-07', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-08', '14:30', '15:30', '', '', 'Reserved', '4', 'BIT - Meeting ', '', ''),
(58, '2024-08-07', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-08', '10:30', '11:30', '', '', 'Reject', '3', 'BCOM & LEGAL', '', ''),
(59, '2024-08-07', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-08', '10:30', '11:30', '', '', 'Reserved', '4', 'BCOM-LEGAL ', '', ''),
(60, '2024-08-07', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-08', '09:30', '11:30', '', '', 'Reserved', '3', 'FIAD - Meeting With CelcomDigi', '', ''),
(61, '2024-08-08', 9022, 'Abdallah Wedud', '2024-08-09', '10:00', '11:00', '', '', 'Reserved', '4', 'BRIEFING SYSTEM ADMIN/DTM', '', ''),
(62, '2024-08-09', 4725, 'Muhammad Farid', '2024-08-09', '10:30', '11:30', 'MEETING HABIS PUKUL 11AM ', '', 'Release', '2', 'Meeting System', '', ''),
(63, '2024-08-09', 1145, 'Norsyahira', '2024-08-10', '16:00', '17:00', '', '', 'Release', '3', 'Meeting with supplier', '', ''),
(64, '2024-08-09', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-13', '11:00', '12:00', '', '', 'Release', '4', 'BIT-FIBER ', '', ''),
(65, '2024-08-09', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-12', '15:00', '16:00', '', 'Rescheduled', 'Reject', '3', 'DTM-SMIX2024 WITH UPEN ', '', ''),
(66, '2024-08-09', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-13', '15:00', '16:00', '', '', 'Release', '3', 'DCLI /BIT-Skyline Issue ', '', ''),
(67, '2024-08-09', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-14', '10:00', '11:00', '', '', 'Release', '4', 'DTM- Meeting With Kontraktor ', '', ''),
(68, '2024-08-09', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-16', '10:00', '11:00', '', '', 'Release', '3', 'DTM- WPUSMIX2024', '', ''),
(69, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-12', '15:00', '16:30', '', '', 'Release', '4', 'FIAD - Meeting With Axicom ', '', ''),
(70, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-12', '15:00', '16:30', '', '', 'Canceled', '4', 'FIAD - Meeting With Axicom ', '', ''),
(71, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-14', '15:00', '16:00', '', 'CHANGE MEETING ROOM ', 'Reject', '4', 'DTM- Meeting With Contractor ', '', ''),
(72, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-16', '10:00', '11:00', '', '', 'Reserved', '3', 'DTM -WPU SMIX2024 ', 'Abdallah Wedud', ''),
(73, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-12', '15:00', '16:30', '', '', 'Reserved', '4', 'FIAD - Meeting With Axicom ', '', ''),
(74, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-13', '14:30', '15:30', '', '', 'Reserved', '3', 'BIT/DCLI- Meeting With CEO ', '', ''),
(75, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-13', '11:00', '12:00', '', '', 'Reserved', '4', 'BIT - Fiber ', '', ''),
(76, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-13', '15:00', '16:00', '', '', 'Reserved', '4', 'DTM -Meeting w  UPEN ', 'Abdallah Wedud', ''),
(77, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-14', '15:00', '16:00', '', '', 'Reserved', '3', 'DTM - Meeting W Contractor ', 'Abdallah Wedud', ''),
(78, '2024-08-12', 4715, 'Farah Nur\'Azreen Fatehah', '2024-08-15', '14:30', '15:30', '', '', 'Reserved', '3', 'DTM/DCLI-Isu MHI ', 'Mohamad Hamdan', ''),
(79, '2024-08-14', 4715, 'Farah NurAzreen Fatehah', '2024-08-15', '11:30', '12:30', '', '', 'Reserved', '3', 'DTM -Sewaan Komputer Yayasan ', 'Mohamad Hamdan', ''),
(80, '2024-08-15', 6007, 'Mohamad Firdaus', '2024-08-20', '14:30', '17:00', '', '', 'Release', '4', 'MICTH-HUAWER CDB UPGRADE PROGRESS MEETING', 'Mohamad Hamdan', ''),
(82, '2024-08-16', 2013, 'Wan Mohd Neezam', '2024-08-16', '10:00', '16:00', '', '', 'Reserved', '4', 'NCR BIS', 'Mohamad Hamdan', ''),
(83, '2024-08-16', 9012, 'Farah NurAzlin Yasmine', '2024-08-19', '16:00', '17:00', '', '', 'Release', '4', 'Tower Profit Adjustment Proposal MOCN Site (OCK)', 'Mohamad Hamdan', ''),
(84, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-20', '10:00', '11:00', '', '', 'Reserved', '3', 'Meeting With UPEN ', 'Noor Ashikin', ''),
(85, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-20', '10:00', '11:00', '', '', 'Canceled', '3', 'Meeting With UPEN ', '', ''),
(86, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-20', '14:30', '15:30', '', '', 'Reserved', '3', 'Perjumpaan Berkenaan ISO ', 'Shahrol Nizam', ''),
(87, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-23', '10:00', '11:00', '', '', 'Reserved', '3', 'DTM-WPU7/2024 - SMIX2024 ', 'Shahrol Nizam', ''),
(88, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-27', '15:00', '16:00', '', '', 'Reserved', '3', 'Meeting With CNO Maxis ', 'Noor Ashikin', ''),
(89, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-22', '11:00', '12:00', '', '', 'Reserved', '3', 'ACES Award 2024 (Nominee Interview) ', 'Noor Ashikin', ''),
(90, '2024-08-16', 4715, 'Farah NurAzreen Fatehah', '2024-08-22', '11:00', '12:00', '', '', 'Canceled', '3', 'ACES Award 2024 (Nominee Interview) ', '', ''),
(91, '2024-08-19', 3001, 'Norasiyah', '2024-08-20', '09:00', '17:00', '', '', 'Canceled', '3', 'AUDIT INTERIM', '', ''),
(92, '2024-08-19', 3001, 'Norasiyah', '2024-08-21', '09:00', '17:00', '', '', 'Reserved', '4', 'AUDIT INTERIM', 'Noor Ashikin', ''),
(93, '2024-08-19', 3001, 'Norasiyah', '2024-08-22', '09:00', '17:00', '', '', 'Reserved', '4', 'AUDIT INTERIM', 'Shahrol Nizam', ''),
(94, '2024-08-19', 3001, 'Norasiyah', '2024-08-23', '09:00', '17:00', '', '', 'Reserved', '4', 'AUDIT INTERIM', 'Shahrol Nizam', ''),
(96, '2024-08-19', 3001, 'Norasiyah', '2024-08-20', '09:00', '17:00', '', '', 'Canceled', '4', 'AUDIT INTERIM', '', ''),
(97, '2024-08-19', 6007, 'Mohamad Firdaus', '2024-08-20', '14:30', '17:00', '', '', 'Reserved', '4', 'Micth huawei digi upgrade status meeting', 'Shahrol Nizam', ''),
(98, '2024-08-19', 9012, 'Farah NurAzlin Yasmine', '2024-08-19', '16:00', '17:00', '', '', 'Reserved', '4', 'OCK - TOWER PROFIT ADJUSMENT PROPOSAL MOCN SITES', 'Shahrol Nizam', ''),
(99, '2024-08-19', 11, 'Iylia Hamizah', '2024-08-19', '11:00', '11:30', '', '', 'Reserved', '4', 'Discussion', 'Mohamad Hamdan', ''),
(100, '2024-08-19', 9022, 'Abdallah Wedud', '2024-08-19', '16:30', '17:30', '', 'cuba lgi', 'Reject', '2', 'try', 'Abdallah Wedud', ''),
(101, '2024-08-20', 5002, 'Muhammad Fadhil', '2024-08-23', '15:00', '16:00', '', '', 'Reserved', '3', 'Site Satria Mara : The direction of the SMSB site considers the Financing and Maintenance Agreement along with the operational costs of the tower', 'Shahrol Nizam', ''),
(102, '2024-08-20', 9014, 'Muhammad Amir Luqman', '2024-08-21', '14:00', '16:30', '', '', 'Reserved', '3', 'ONLINE MEETING MAXIS', 'Shahrol Nizam', ''),
(105, '2024-08-21', 11, 'Iylia Hamizah', '2024-08-21', '10:00', '12:00', '', '', 'Reserved', '3', 'Paperwork discussion', 'Nurul Atiqah', ''),
(106, '2024-08-21', 4714, 'Zulliana', '2024-08-22', '09:30', '11:00', '', '', 'Reserved', '2', 'Aces Award 2024 nominee interview', 'Mohamad Hamdan', ''),
(107, '2024-08-21', 4725, 'Muhammad Farid', '2024-08-23', '15:00', '18:00', '', '', 'Reserved', '2', 'Meeting Datuk Salhah', 'Shahrol Nizam', ''),
(108, '2024-08-22', 6, 'Siti Wahida', '2024-08-28', '10:00', '12:00', '', 'Pinda masa', 'Reject', '3', 'interview', 'Shahrol Nizam', ''),
(109, '2024-08-22', 6, 'Siti Wahida', '2024-08-28', '14:30', '16:30', '', 'The meeting room is booked for Dr. Naz\'s meeting', 'Reject', '3', 'INTERVIEW', 'Nurul Atiqah', ''),
(110, '2024-08-23', 4715, 'Farah NurAzreen Fatehah', '2024-08-28', '14:30', '15:30', '', '', 'Reject', '4', 'HRAD - INTERVIEW', 'Shahrol Nizam', ''),
(111, '2024-08-23', 4715, 'Farah NurAzreen Fatehah', '2024-08-28', '15:00', '16:00', '', '', 'Reserved', '3', 'DTM - SMIX2024', 'Shahrol Nizam', ''),
(112, '2024-08-27', 4715, 'Farah NurAzreen Fatehah', '2024-08-28', '14:30', '16:30', '', '', 'Reserved', '4', 'HRAD - INTERVIEW ', 'Shahrol Nizam', ''),
(113, '2024-08-28', 10, 'Mohd Jailani', '2024-08-30', '10:00', '11:00', '', '', 'Reserved', '4', 'Meeting With TM (5G @ PPMSB)', 'Shahrol Nizam', ''),
(114, '2024-08-28', 9014, 'Muhammad Amir Luqman', '2024-08-29', '15:00', '16:30', '', '', 'Reserved', '4', 'ONLINE MEETING CB FTTH WITH TNB', 'Shahrol Nizam', ''),
(115, '2024-08-28', 3012, 'Mohamad Hod', '2024-08-29', '15:00', '17:00', '', 'Cancel ', 'Reject', '2', 'Meeting Record Asset MICTH (FiAD-HRAD)', 'Mohamad Hamdan', ''),
(116, '2024-08-29', 4725, 'Muhammad Farid', '2024-08-29', '15:00', '16:30', '', '', 'Reserved', '3', 'Meeting with FiAD regarding assets', 'Shahrol Nizam', ''),
(117, '2024-08-29', 6007, 'Mohamad Firdaus', '2024-08-29', '09:00', '10:00', '', '', 'Pending', '4', 'unit discussion', '', ''),
(118, '2024-08-29', 6003, 'Zainurriah', '2024-09-02', '11:00', '12:00', '', '', 'Reserved', '4', 'Commercial Internal Meeting (MPU)', 'Mohamad Hamdan', ''),
(119, '2024-08-29', 2014, 'Juriani ', '2024-08-29', '12:00', '13:00', '', '', 'Reserved', '4', 'Discuss with Fourmate planner for KM', 'Shahrol Nizam', ''),
(120, '2024-08-29', 2014, 'Juriani ', '2024-08-29', '12:00', '13:00', '', '', 'Canceled', '4', 'Discuss with Fourmate planner for KM', '', ''),
(121, '2024-08-29', 4725, 'Muhammad Farid', '2024-08-29', '14:00', '15:00', '', '', 'Reserved', '3', 'Meeting with PosDigicert', 'Shahrol Nizam', ''),
(122, '2024-08-29', 1145, 'Norsyahira', '2024-08-30', '10:00', '11:00', '', '-', 'Reject', '3', 'Meeting with MHI ', 'Muhammad Farid', ''),
(123, '2024-08-29', 2014, 'Juriani ', '2024-08-30', '11:00', '12:00', '', '', 'Reserved', '4', 'Perbincangan Permohonan KM DI Melaka Raya', 'Muhammad Farid', ''),
(124, '2024-08-29', 4715, 'Farah NurAzreen Fatehah', '2024-08-30', '10:30', '11:30', '', '', 'Reserved', '3', 'BIT, BCOM - Number Of Sites By DP', 'Muhammad Farid', ''),
(125, '2024-08-30', 1145, 'Norsyahira', '2024-09-03', '10:00', '11:30', '', 'Meeting Dr Naz ', 'Reject', '3', 'Meeting with MHI ', 'Muhammad Farid', ''),
(126, '2024-08-30', 4725, 'Muhammad Farid', '2024-09-05', '11:00', '13:00', '', '', 'Release', '3', 'Meeting with MSCTrustgate', 'Muhammad Farid', ''),
(127, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-03', '15:00', '16:00', '', '', 'Reserved', '3', 'BIT-POC ARVDIA SDN BHD ', 'Shahrol Nizam', ''),
(128, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-04', '15:00', '16:00', '', '', 'Reserved', '3', 'DTM-WPU SMIX2024', 'Shahrol Nizam', ''),
(129, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-05', '15:00', '16:00', '', '', 'Reserved', '3', 'FIAD/BIT-DISCUSSION INCOME ROW SITE DCL ', 'Shahrol Nizam', ''),
(130, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-06', '09:00', '12:00', '', '', 'Reserved', '3', 'BIT-MPU8/2024 BIT ', 'Shahrol Nizam', ''),
(131, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-06', '09:00', '12:00', '', '', 'Canceled', '3', 'BIT-MPU8/2024 BIT ', '', ''),
(132, '2024-08-30', 4715, 'Farah NurAzreen Fatehah', '2024-09-03', '10:00', '11:00', '', '', 'Reserved', '3', 'BCOM, BIT, DCLI- REVIEW OF OCK MOCN PROFIT SHARING ', 'Mohamad Hamdan', ''),
(133, '2024-08-30', 1145, 'Norsyahira', '2024-09-03', '10:00', '11:00', '', '', 'Reserved', '4', 'Pembentangan MHI ', 'Mohamad Hamdan', ''),
(134, '2024-09-02', 7004, 'Chempaka', '2024-09-03', '10:30', '00:00', '', 'Please check the time when booking', 'Reject', '4', 'SEMAKAN STATUS PMC 2023/2024', '', ''),
(135, '2024-09-02', 7004, 'Chempaka', '2024-09-03', '11:00', '13:00', '', '', 'Reserved', '4', 'SEMAKAN STATUS PMC 2023/2024', 'Shahrol Nizam', ''),
(136, '2024-09-03', 11, 'Iylia Hamizah', '2024-09-03', '12:00', '13:00', '', '', 'Reserved', '3', 'BCOM internal discussion', 'Shahrol Nizam', ''),
(137, '2024-09-04', 4725, 'Muhammad Farid', '2024-09-13', '11:00', '13:00', '', '', 'Reserved', '4', 'Meeting With MSCTrusgate', 'Shahrol Nizam', ''),
(138, '2024-09-04', 9012, 'Farah NurAzlin Yasmine', '2024-09-11', '10:00', '12:00', '', '', 'Reserved', '3', 'Networking Architecture (Maxis Fiber Collaboration)', 'Shahrol Nizam', ''),
(139, '2024-09-04', 5002, 'Muhammad Fadhil', '2024-09-05', '11:00', '13:00', '', '', 'Reserved', '4', 'Meeting with celcomdigi\r\n1. NBS progress update\r\n2. Commercial issues\r\n3. NIC Sites', 'Shahrol Nizam', ''),
(140, '2024-09-04', 4715, 'Farah NurAzreen Fatehah', '2024-09-18', '10:00', '11:00', '', 'cancel', 'Reject', '3', 'FIAD- Interim Audit With Auditor & CEO', '', ''),
(141, '2024-09-04', 4715, 'Farah NurAzreen Fatehah', '2024-09-18', '10:00', '11:00', '', '', 'Reject', '3', 'FIAD- Interim Audit With Auditor & CEO', '', ''),
(142, '2024-09-04', 4715, 'Farah NurAzreen Fatehah', '2024-09-18', '10:30', '11:30', '', '', 'Canceled', '3', 'FIAD - Interim Audit', '', ''),
(143, '2024-09-04', 4715, 'Farah NurAzreen Fatehah', '2024-09-18', '10:30', '11:30', '', '', 'Reserved', '3', 'FIAD - Interim Audit', 'Farah NurAzreen Fatehah', ''),
(145, '2024-09-05', 9012, 'Farah NurAzlin Yasmine', '2024-09-05', '11:00', '12:00', '', '', 'Reserved', '3', 'Maxis Fiber - Discussion ', 'Shahrol Nizam', ''),
(146, '2024-09-05', 4714, 'Zulliana', '2024-09-05', '15:00', '16:00', '', '', 'Pending', '4', 'PPIT- UM: Consolidated AA.', '', ''),
(147, '2024-09-09', 6, 'Siti Wahida', '2024-09-09', '14:30', '16:30', '', '', 'Reserved', '3', 'Interview', 'Shahrol Nizam', ''),
(148, '2024-09-10', 3001, 'Norasiyah', '2024-09-11', '11:00', '12:00', '', 'Cancel', 'Reject', '4', 'MEETING BERSAMA PIHAK ARENO', 'Noor Ashikin', 'Mohamad Hamdan'),
(149, '2024-09-10', 9024, 'Nurnabilah Yasmin', '2024-09-10', '10:30', '11:30', '', '', 'Reserved', '3', 'Internal Meeting BCOM', 'Noor Ashikin', ''),
(150, '2024-09-10', 1124, 'Nur Zayanah', '2024-09-10', '10:00', '13:00', '', '', 'Reserved', '4', 'INTERNAL MEEING CREDIT CONTROL', 'Noor Ashikin', ''),
(151, '2024-09-10', 9022, 'Abdallah Wedud', '2024-09-10', '11:00', '13:00', '', 'try', 'Reject', '2', 'try', 'Abdallah Wedud', 'Abdallah Wedud'),
(152, '2024-09-10', 9024, 'Nurnabilah Yasmin', '2024-09-10', '11:30', '12:30', '', '', 'Pending', '3', 'BCOM MEETING - PRICE STANDARDIZATION OF LICENSE FEES', '', ''),
(153, '2024-09-11', 3013, 'Ahmadee', '2024-09-11', '10:30', '13:00', '', '', 'Reserved', '4', 'INTERNAL DISCUSSION CREDIT CONTROL FOR DRAFT CALCULATION FOR ESTIMATION TAX CP204A-2024 ', 'Shahrol Nizam', ''),
(154, '2024-09-11', 5, 'Nurul Fara Nadia', '2024-09-11', '14:30', '16:00', '', '', 'Reserved', '4', 'Discuss on business retreat Bangkok', 'Shahrol Nizam', ''),
(156, '2024-09-11', 6004, 'Razliah', '2024-09-12', '09:00', '09:30', '', '', 'Reserved', '4', 'Sesi Penerangan & Penyerahan Prosedur Aduan Pelanggan', 'Shahrol Nizam', ''),
(157, '2024-09-12', 4725, 'Muhammad Farid', '2024-09-12', '14:00', '16:00', '', '', 'Reserved', '3', 'Meeting with Microsoft', 'Shahrol Nizam', ''),
(158, '2024-09-12', 1145, 'Norsyahira', '2024-09-13', '11:00', '13:00', '', '', 'Reserved', '3', 'Meeting with lecturer Idham ', 'Shahrol Nizam', ''),
(159, '2024-09-12', 4715, 'Farah NurAzreen Fatehah', '2024-09-19', '10:30', '11:30', '', '', 'Reserved', '3', 'WPU SMIX 2024', 'Shahrol Nizam', ''),
(160, '2024-09-12', 4715, 'Farah NurAzreen Fatehah', '2024-09-19', '15:00', '16:00', '', '', 'Reserved', '3', 'MEETING WITH INDUSTRIA SDN BHD- AI POWERED MELAKA TOURISM ', 'Shahrol Nizam', ''),
(161, '2024-09-12', 4715, 'Farah NurAzreen Fatehah', '2024-09-24', '10:00', '11:00', '', '', 'Reserved', '3', 'Perjumpaan Bersama  Nik Safia ', 'Shahrol Nizam', ''),
(162, '2024-09-17', 4715, 'Farah NurAzreen Fatehah', '2024-09-17', '15:00', '16:00', '', '', 'Release', '3', 'SITE KOLEJ PROFESIONAL MARA', 'Shahrol Nizam', ''),
(163, '2024-09-17', 4725, 'Muhammad Farid', '2024-09-18', '09:00', '10:00', '', '', 'Reserved', '3', 'Meeting Site KPM', 'Shahrol Nizam', ''),
(164, '2024-09-18', 1124, 'Nur Zayanah', '2024-09-19', '10:00', '11:30', '', 'PERMINTAAN DARIPADA KAKITANGAN', 'Reject', '4', 'INTERNAL MEETING CREDIT CONTROL', 'Shahrol Nizam', 'Noor Ashikin'),
(165, '2024-09-18', 4715, 'Farah NurAzreen Fatehah', '2024-09-19', '11:30', '12:30', '', '', 'Canceled', '3', 'HRAD & DCLI ', '', ''),
(166, '2024-09-18', 4715, 'Farah NurAzreen Fatehah', '2024-09-19', '11:30', '12:30', '', '', 'Reserved', '3', 'HRAD & DCLI ', 'Noor Ashikin', ''),
(167, '2024-09-18', 1124, 'Nur Zayanah', '2024-09-19', '10:00', '12:00', '', '', 'Reserved', '4', 'Meeting Department Account', 'Noor Ashikin', ''),
(168, '2024-09-18', 1124, 'Nur Zayanah', '2024-09-19', '09:00', '10:00', '', '', 'Reserved', '4', 'Meeting department account', 'Noor Ashikin', ''),
(169, '2024-09-18', 4715, 'Farah NurAzreen Fatehah', '2024-09-20', '09:00', '11:00', '', '', 'Reserved', '3', 'Meeting With UPEN ', 'Shahrol Nizam', ''),
(170, '2024-09-18', 1145, 'Norsyahira', '2024-09-20', '15:00', '16:30', '', '', 'Reserved', '3', 'Meeting with MHI - Video Montage SMIC 2024', 'Shahrol Nizam', ''),
(171, '2024-09-19', 4715, 'Farah NurAzreen Fatehah', '2024-09-23', '15:00', '16:00', '', '', 'Reserved', '3', 'ISU SEWAAN TAMAN REDHUAN ', 'Shahrol Nizam', ''),
(172, '2024-09-19', 4725, 'Muhammad Farid', '2024-09-26', '09:00', '17:00', '', '', 'Reserved', '2', 'Recert ISO - Azimah', 'Shahrol Nizam', ''),
(173, '2024-09-19', 4725, 'Muhammad Farid', '2024-09-19', '16:00', '17:30', '', '', 'Pending', '4', 'Meeting with Microsoft', '', ''),
(174, '2024-09-20', 4715, 'Farah NurAzreen Fatehah', '2024-09-24', '11:30', '12:30', '', '', 'Reserved', '3', 'DCLI, BCOM, BIT - SITE KPM ', 'Shahrol Nizam', ''),
(175, '2024-09-20', 4715, 'Farah NurAzreen Fatehah', '2024-09-24', '15:00', '16:00', '', '', 'Reserved', '3', 'BCOM - Penyeragaman Fi Standard Telco ', 'Shahrol Nizam', ''),
(176, '2024-09-20', 4715, 'Farah NurAzreen Fatehah', '2024-09-25', '10:00', '11:00', '', '', 'Reserved', '3', 'FIAD /BIT - Discussion Income ROW Site DCL ', 'Shahrol Nizam', ''),
(177, '2024-09-20', 4715, 'Farah NurAzreen Fatehah', '2024-09-26', '10:00', '11:00', '', '', 'Reserved', '3', 'WPU 9/2024- SMIX 2024 ', 'Shahrol Nizam', ''),
(178, '2024-09-20', 4715, 'Farah NurAzreen Fatehah', '2024-09-27', '10:00', '11:00', '', '', 'Reserved', '3', 'AUSTRAL TECHSMITH BRIEF SMART CCTV ', 'Shahrol Nizam', ''),
(179, '2024-09-20', 4689, 'Siti Nor Amieza', '2024-09-23', '10:30', '12:00', '', '', 'Reserved', '4', 'SAQ & Permitting Unit Meeting', 'Shahrol Nizam', ''),
(180, '2024-09-20', 4689, 'Siti Nor Amieza', '2024-09-23', '10:30', '12:00', '', '', 'Canceled', '4', 'SAQ & Permitting Unit Meeting', '', ''),
(181, '2024-09-23', 5001, 'Ahmad Safwan', '2024-09-24', '11:00', '13:00', '', '', 'Reserved', '2', 'Mesyuarat Penyelarasan Siap Bina Projek CB17 FTTH Maxis bersama Binasat dan Dancom', 'Shahrol Nizam', ''),
(182, '2024-09-23', 11, 'Iylia Hamizah', '2024-09-24', '10:00', '11:00', '', '', 'Reserved', '4', 'External meeting with CD', 'Shahrol Nizam', ''),
(183, '2024-09-24', 4715, 'Farah NurAzreen Fatehah', '2024-10-08', '14:00', '16:00', '', '', 'Release', '2', 'BIT -MEETING WITH DATUK FAIRUL ', 'Shahrol Nizam', ''),
(184, '2024-09-24', 4715, 'Farah NurAzreen Fatehah', '2024-10-02', '10:30', '12:30', '', '', 'Release', '2', 'MESYUARAT PENYELARASAN PROGRAM SMIX2024', 'Noor Ashikin', ''),
(185, '2024-09-24', 1124, 'Nur Zayanah', '2024-09-24', '14:30', '16:00', '', '', 'Reserved', '4', 'MEETING INTERNAL CREDIT CONTROL', 'Noor Ashikin', ''),
(186, '2024-09-25', 4715, 'Farah NurAzreen Fatehah', '2024-09-25', '15:00', '16:00', '', '', 'Reserved', '3', 'Meeting With UPEN ', 'Noor Ashikin', ''),
(189, '2024-09-25', 3013, 'Ahmadee', '2024-09-25', '11:00', '13:00', '', '', 'Reserved', '4', 'INTERNAL MEETING CREDIT CONTROL TO DISCUSS REVISED BUDGET AND COLLECTION MICTH', 'Noor Ashikin', ''),
(190, '2024-09-25', 5001, 'Ahmad Safwan', '2024-10-15', '14:00', '17:30', '', '', 'Reserved', '2', 'Mesyuarat USP SWG MCMC chaired by YB Exco', 'Shahrol Nizam', ''),
(191, '2024-09-26', 5, 'Nurul Fara Nadia', '2024-09-26', '15:00', '04:30', '', '', 'Pending', '4', 'HOD RETREAT - meeting up travel agent', '', ''),
(192, '2024-09-26', 5, 'Nurul Fara Nadia', '2024-09-26', '15:00', '16:00', '', 'cancel guna', 'Reject', '4', 'HOD Retreat - Travel Agent', 'Noor Ashikin', 'Shahrol Nizam'),
(193, '2024-09-26', 5, 'Nurul Fara Nadia', '2024-09-26', '15:00', '16:00', '', '', 'Release', '3', 'hod retreat', 'Shahrol Nizam', ''),
(194, '2024-09-26', 5, 'Nurul Fara Nadia', '2024-09-26', '15:00', '16:00', '', '', 'Canceled', '3', 'hod retreat', '', ''),
(195, '2024-09-26', 4715, 'Farah NurAzreen Fatehah', '2024-10-07', '09:00', '11:00', '', '', 'Reserved', '2', 'BIT- MEETING DATUK FAIRUL ', 'Farah NurAzreen Fatehah', ''),
(196, '2024-09-26', 4715, 'Farah NurAzreen Fatehah', '2024-10-01', '15:30', '16:30', '', '', 'Reserved', '2', 'Mesyuarat Penyelarasan Jawatankuasa Pameran Reruai & Rakan Strategik Sempena Smart Melaka International Conference & Exhibition 2024 Bil.1/2024', 'Shahrol Nizam', ''),
(197, '2024-09-26', 4715, 'Farah NurAzreen Fatehah', '2024-10-01', '14:00', '15:00', '', '', 'Reserved', '2', 'Mesyuarat Penyelarasan Program Microsoft AI Teach ', 'Shahrol Nizam', ''),
(198, '2024-09-27', 4715, 'Farah NurAzreen Fatehah', '2024-10-02', '10:30', '11:30', '', '', 'Reserved', '2', 'Mesyuarat Jawatankuasa Kecil Peringkat MICTH Bagi Penyelarasan Program Smart Melaka International Conference & Exhibition (SMIX2024)', 'Shahrol Nizam', ''),
(199, '2024-09-27', 4715, 'Farah NurAzreen Fatehah', '2024-10-02', '10:30', '11:30', '', '', 'Canceled', '2', 'Mesyuarat Jawatankuasa Kecil Peringkat MICTH Bagi Penyelarasan Program Smart Melaka International Conference & Exhibition (SMIX2024)', '', ''),
(200, '2024-09-27', 1124, 'Nur Zayanah', '2024-09-27', '09:30', '12:00', '', '', 'Reserved', '4', 'INTERNAL CREDIT CONTROL', 'Shahrol Nizam', ''),
(201, '2024-09-27', 4715, 'Farah NurAzreen Fatehah', '2024-10-01', '09:30', '11:30', '', '', 'Reserved', '3', 'MHI', 'Shahrol Nizam', ''),
(202, '2024-10-01', 4715, 'Farah NurAzreen Fatehah', '2024-10-02', '15:00', '16:00', '', '', 'Reserved', '3', 'DTM - SMIX2024 Participant ', 'Shahrol Nizam', ''),
(203, '2024-10-01', 5, 'Nurul Fara Nadia', '2024-10-03', '10:30', '11:00', '', '', 'Reserved', '4', 'HOD Retreat - PMH', 'Noor Ashikin', ''),
(204, '2024-10-02', 2014, 'Juriani ', '2024-10-02', '11:00', '12:00', '', '', 'Reserved', '4', 'Discussion KM', 'Shahrol Nizam', ''),
(205, '2024-10-02', 9006, 'Nur Ainna', '2024-10-02', '14:30', '17:30', '', '', 'Reserved', '4', 'TNB Meeting - BIT ', 'Shahrol Nizam', ''),
(206, '2024-10-02', 5001, 'Ahmad Safwan', '2024-10-04', '10:00', '00:00', '', '', 'Reserved', '4', 'BIT Internal Team Leader Meeting', 'Mohamad Hamdan', ''),
(207, '2024-10-02', 6007, 'Mohamad Firdaus', '2024-10-04', '10:00', '11:00', '', '', 'Reserved', '3', 'TNB meeting -New Supply application - BIT', 'Mohamad Hamdan', ''),
(208, '2024-10-02', 6007, 'Mohamad Firdaus', '2024-10-04', '10:00', '11:00', '', '', 'Canceled', '3', 'TNB meeting -New Supply application - BIT', '', ''),
(209, '2024-10-03', 4715, 'Farah NurAzreen Fatehah', '2024-10-03', '15:00', '16:00', '', '', 'Pending', '3', 'DCLI/HRAD-PREP BOD', '', ''),
(210, '2024-10-04', 11, 'Iylia Hamizah', '2024-10-04', '15:00', '16:00', '', '', 'Reserved', '4', 'SMIX Conference Meeting', 'Mohamad Hamdan', ''),
(211, '2024-10-04', 11, 'Iylia Hamizah', '2024-10-04', '11:00', '12:00', '', '', 'Pending', '3', 'Internal Discussion - Paper BOD', '', ''),
(212, '2024-10-07', 1124, 'Nur Zayanah', '2024-10-07', '12:00', '13:00', '', '', 'Reserved', '4', 'Discussion - Dcl', 'Noor Ashikin', ''),
(213, '2024-10-07', 6007, 'Mohamad Firdaus', '2024-10-09', '09:00', '11:00', '', '', 'Reserved', '3', 'Courtesy Visit to Melaka ICT Holdings Sdn Bhd Headquarter (HQ) - 9 October 2024', 'Shahrol Nizam', ''),
(214, '2024-10-08', 4715, 'Farah NurAzreen Fatehah', '2024-10-08', '15:00', '17:00', '', '', 'Reserved', '3', 'BRIEF DATUK SALHAH AND DATUK FAIRUL', 'Shahrol Nizam', ''),
(215, '2024-10-08', 3012, 'Mohamad Hod', '2024-10-08', '12:00', '01:00', '', '', 'Pending', '4', 'TMMSB Reconcile', '', ''),
(216, '2024-10-09', 3012, 'Mohamad Hod', '2024-10-09', '09:30', '10:30', '', '', 'Pending', '4', 'Discussion Reconcile TMMSB-MICTH New Agreement site', '', ''),
(217, '2024-10-09', 9024, 'Nurnabilah Yasmin', '2024-10-15', '10:00', '11:30', '', '', 'Reject', '3', 'Meeting for The Standardization of License Fees for Lampole and Smart Lampole', 'Shahrol Nizam', 'Nurul Atiqah'),
(218, '2024-10-14', 5, 'Nurul Fara Nadia', '2024-10-15', '10:00', '11:00', '', '', 'Reserved', '4', 'MICTH Family Day', 'Shahrol Nizam', ''),
(220, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-17', '11:00', '12:00', '', '', 'Reserved', '3', 'BIT - PERJUMPAAN BERSAMA BINASAT ', 'Farah NurAzreen Fatehah', ''),
(221, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-17', '14:30', '15:00', '', '', 'Reserved', '3', 'BCOM- MAXIS FIBRE', 'Shahrol Nizam', ''),
(222, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-18', '09:00', '10:00', '', '', 'Canceled', '3', 'MPU- FIBER ', '', ''),
(223, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-18', '09:00', '10:00', '', '', 'Canceled', '3', 'MPU- FIBER ', '', ''),
(224, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-18', '09:00', '10:00', '', '', 'Reserved', '3', 'MPU- FIBER ', 'Farah NurAzreen Fatehah', ''),
(225, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-18', '10:00', '11:30', '', '', 'Reserved', '3', 'MPU-BIT ', 'Farah NurAzreen Fatehah', ''),
(226, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-15', '14:30', '15:30', '', '', 'Reserved', '3', 'Kunjungan Hormat MBOT ', 'Farah NurAzreen Fatehah', ''),
(227, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-16', '10:00', '11:00', '', '', 'Reserved', '3', 'FIAD/HRAD- ASSET MANAGEMENT ', 'Farah NurAzreen Fatehah', ''),
(228, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-17', '12:00', '13:00', '', '', 'Reserved', '3', 'M&A DCL Sites', 'Farah NurAzreen Fatehah', ''),
(229, '2024-10-14', 9024, 'Nurnabilah Yasmin', '2024-10-16', '10:00', '11:00', '', '', 'Canceled', '3', 'Meeting for The Standardization of License Fees for Lampole and Smart Lampole', '', ''),
(230, '2024-10-14', 4715, 'Farah NurAzreen Fatehah', '2024-10-15', '10:30', '11:30', '', '', 'Reserved', '3', 'POST MORTEM - SMIX2024', 'Shahrol Nizam', ''),
(231, '2024-10-14', 9024, 'Nurnabilah Yasmin', '2024-10-16', '11:00', '12:00', '', '', 'Reserved', '3', 'Meeting for The Standardization of License Fees for Lampole and Smart Lampole', 'Shahrol Nizam', ''),
(232, '2024-10-15', 6004, 'Razliah', '2024-10-23', '08:30', '16:30', '', '', 'Reserved', '4', 'KURSUS KOMUNIKASI DAN KONFLIK : KEMAHIRAN PENYELESAIAN UNTUK AUDIT DALAM', 'Shahrol Nizam', ''),
(233, '2024-10-15', 6004, 'Razliah', '2024-10-24', '08:30', '12:30', '', '', 'Reserved', '4', 'KURSUS KOMUNIKASI DAN KONFLIK : KEMAHIRAN PENYELESAIAN UNTUK AUDIT DALAM', 'Shahrol Nizam', ''),
(235, '2024-10-16', 9024, 'Nurnabilah Yasmin', '2024-10-17', '10:00', '', '', '', 'Reserved', '3', 'The Standardization of License Fees for Lampole and Smart Lampole', 'Shahrol Nizam', ''),
(236, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-16', '10:30', '11:30', '', '', 'Pending', '4', 'INTERNAL MEETING DTM ', '', ''),
(237, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-16', '15:00', '16:00', '', '', 'Canceled', '3', 'COORDINATION MEETING KPM AYER MOLEK ', '', ''),
(238, '2024-10-16', 10, 'Mohd Jailani', '2024-10-21', '02:00', '05:00', '', '', 'Reserved', '2', 'Mesyuarat Penyelarasan Pembinaan Struktur Telekomunilasi (KPM, Ayer Molek)', 'Shahrol Nizam', ''),
(239, '2024-10-16', 5002, 'Muhammad Fadhil', '2024-10-16', '15:00', '16:00', '', '', 'Reserved', '3', 'Mesyuarat Penyelarasan Pemohonan Struktur Telekomunikasi di KPM Ayer Molek', 'Shahrol Nizam', ''),
(240, '2024-10-16', 4704, 'Nur Amira', '2024-10-17', '15:00', '16:00', '', '', 'Reserved', '4', 'Discussion site progress saq', 'Shahrol Nizam', ''),
(241, '2024-10-16', 1124, 'Nur Zayanah', '2024-10-16', '15:00', '17:00', '', '', 'Reserved', '4', 'DISCUSSION RECONCILE\r\n', 'Muhammad Farid', ''),
(242, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-21', '10:00', '11:00', '', '', 'Reserved', '3', 'WPU 2/24- Asset Management ', 'Shahrol Nizam', ''),
(243, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-22', '09:30', '10:30', '', '', 'Reserved', '3', 'Meeting With Datuk Ariff- Asset Management ', 'Shahrol Nizam', ''),
(244, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-22', '11:30', '12:30', '', '', 'Reserved', '3', 'BCOM/BIT-MAXIS FIBER INTERNAL ', 'Shahrol Nizam', ''),
(246, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-23', '15:00', '16:00', '', '', 'Reserved', '3', 'Meeting With Maxis ', 'Shahrol Nizam', ''),
(247, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-23', '10:00', '11:00', '', '', 'Reserved', '2', 'Meeting With Aexis Technology ', 'Shahrol Nizam', ''),
(248, '2024-10-16', 4715, 'Farah NurAzreen Fatehah', '2024-10-23', '12:00', '14:00', '', '', 'Reserved', '3', 'HOD MEETING - KPI REVIEW & BUSINESS PLAN PREP', 'Shahrol Nizam', ''),
(249, '2024-10-17', 1145, 'Norsyahira', '2024-10-17', '11:00', '12:00', '', '', 'Reserved', '4', 'Discussion Team System ', 'Shahrol Nizam', ''),
(250, '2024-10-17', 7004, 'Chempaka', '2024-10-23', '10:30', '12:00', '', '', 'Reserved', '3', 'MEETING POP2 KKOM WITH APEX', 'Shahrol Nizam', ''),
(251, '2024-10-17', 4715, 'Farah NurAzreen Fatehah', '2024-10-18', '10:00', '12:00', '', '', 'Pending', '4', 'MEETING DEPT DTM ', '', '');

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
(3, 'try', 'wedud', 0, '2024-05-28'),
(4, 'Please add \"collect the key & petrol card\" ', 'sara', 0, '2024-08-13');

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
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hrm_vehicle`
--
ALTER TABLE `hrm_vehicle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `management_room`
--
ALTER TABLE `management_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
