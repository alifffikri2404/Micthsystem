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
-- Database: `dbaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposal_aset`
--

CREATE TABLE `disposal_aset` (
  `id` int(11) NOT NULL,
  `aset_id` varchar(50) NOT NULL,
  `kategori_aset` varchar(50) NOT NULL,
  `jenis_aset` varchar(50) NOT NULL,
  `no_aset` varchar(50) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `nama_kakitangan` varchar(50) NOT NULL,
  `lokasi_jabatan` varchar(50) NOT NULL,
  `tarikh_lupus` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `nilai_lupus` varchar(50) NOT NULL,
  `pihak_lupus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disposal_aset`
--

INSERT INTO `disposal_aset` (`id`, `aset_id`, `kategori_aset`, `jenis_aset`, `no_aset`, `nama_aset`, `nama_kakitangan`, `lokasi_jabatan`, `tarikh_lupus`, `reason`, `nilai_lupus`, `pihak_lupus`) VALUES
(6, '756', 'KOMPUTER', 'lcd monitor', 'MICTH/ADMIN/00/12/08', 'HP GAMING V3', 'Mohamad Hamdan Bin Dzulkarnain', '6', '2024-04-19', '3', '6,700.00', 'Encik Ahmad'),
(7, '758', 'KOMPUTER', 'LAPTOP', 'MICTH/ADMIN/00/00/02', 'HP GAMING', 'Ahmadee Bin Abdullah', '3', '2024-04-19', '3', '1,500.00', 'Ahmadee Wedud'),
(8, '762', 'KOMPUTER', 'PENDRIVE', 'MICTH/ADMIN/00/00/00', 'DATATRAVELER SWIRL 3.0 8GB', 'Nor Fitriah Binti Abdullah', '8', '2024-04-22', '2', '430.00', 'Ahmad 234'),
(10, '763', 'KENDERAAN', 'kereta', 'MICTH/ADMIN/00/00/81', 'M3 GTR A', 'Farah Nur Azreen Fatehah Binti Azme', '8', '2024-04-29', '3', '2,500,000.00', 'Wedud'),
(11, '766', 'PERABOT', 'MEJA', '123456', 'RGE', 'Ahmadee Bin Abdullah', '3', '2024-06-14', '1', '50.00', 'Encik Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `disposal_reason`
--

CREATE TABLE `disposal_reason` (
  `id` int(50) NOT NULL,
  `id_reason` int(50) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disposal_reason`
--

INSERT INTO `disposal_reason` (`id`, `id_reason`, `reason`) VALUES
(1, 1, 'For Sale'),
(2, 2, 'Damaged Asset'),
(3, 3, 'For Donation');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

CREATE TABLE `jenis_aset` (
  `id` int(50) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `jenis_aset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_aset`
--

INSERT INTO `jenis_aset` (`id`, `id_kategori`, `jenis_aset`) VALUES
(35, 32, 'SERVER'),
(36, 32, 'PENDRIVE'),
(39, 33, 'SOFA'),
(40, 33, 'CERMIN'),
(41, 35, 'CAMERA DIGITAL '),
(42, 35, 'WALKIE TALKIE'),
(44, 35, 'TOOLBOX'),
(45, 39, 'CONTOH11'),
(46, 37, 'PROTON SAGA'),
(47, 32, 'CPU'),
(48, 32, 'MOUSE'),
(49, 33, 'LACI BESAR '),
(50, 35, 'Handphone'),
(51, 36, 'KIPAS BERDIRI'),
(52, 32, 'printer'),
(53, 36, 'SHELL CARD'),
(54, 36, 'SMART TAG'),
(55, 36, 'BAJU HUJAN DESPATCH'),
(56, 36, 'GELOMBANG KETUHAR MIKRO'),
(57, 32, 'VGA CONNECTOR'),
(59, 35, 'tangga'),
(60, 32, 'WIRELESS PACK (DONGLE)'),
(61, 34, 'VACUUM'),
(62, 35, 'CORDLESS DRILL'),
(63, 35, 'PLIER'),
(64, 32, 'Keyboard'),
(65, 35, 'HAMMER'),
(66, 35, 'TOOL BAG'),
(67, 35, 'SKRU DRIVER'),
(68, 32, 'lcd monitor'),
(69, 36, 'SAFETY BOOT (SHOES)'),
(70, 35, 'HD CAR SURVEILLANCE CAMERA'),
(71, 32, 'external hardisk'),
(72, 36, 'TV'),
(73, 32, 'SCANNER'),
(74, 32, 'CCTV'),
(75, 32, 'WIRELESS PRESENTATION POINTER'),
(76, 32, 'TABLET'),
(77, 32, 'MESIN CETAK KAD'),
(78, 32, 'PROJECTOR'),
(79, 34, 'SAFETY BOX'),
(80, 33, 'KErusi'),
(81, 33, 'MEJA'),
(82, 34, 'PUNCHER PAPER'),
(83, 33, 'meja DRAWER'),
(84, 34, 'STAPLER BESAR'),
(85, 33, 'CABINET FILE'),
(86, 34, 'KEY BOX'),
(87, 33, 'WORKSTATION TABLE'),
(88, 33, 'ALMARI FILE RENDAH'),
(89, 33, 'PASU BUNGA'),
(90, 33, 'PENYAKUT SEJADAH DINDING'),
(91, 33, 'KARPET KECIL'),
(92, 33, 'MEJA STAND TV'),
(93, 33, 'LAMPU ARC'),
(94, 36, 'KAD KORPORAT VISA MAYBANK'),
(95, 33, 'FRAME GAMBAR'),
(96, 36, 'TOUCH N GO KAD'),
(97, 33, 'KERUSI PLASTIK'),
(98, 36, 'PORTABLE AIR COND'),
(99, 34, 'PAPAN PUTIH ARCYCLIC'),
(100, 32, 'SET PC'),
(101, 34, 'SHREDDER MACHINE'),
(102, 33, 'RAK FILE KECIL'),
(103, 34, 'DISPENSER MACHINE'),
(104, 37, 'VAN'),
(105, 37, 'kereta'),
(106, 34, 'THUMBPRINT ATTENDANCE'),
(107, 36, 'PETI SEJUK'),
(109, 36, 'COFFEE MAKER'),
(110, 35, 'POLYCOM'),
(111, 35, 'EXTENSION PLUG'),
(112, 35, 'VOICE RECORDER'),
(113, 35, 'ACCESS DOOR CARD'),
(114, 36, 'zING KAD MAYBANK'),
(115, 36, 'PETRONAS SMARTPAY'),
(116, 37, 'MOTOSIKAL'),
(117, 32, 'LAPTOP'),
(118, 35, 'spaner'),
(119, 33, 'side table '),
(120, 32, 'MICROSOFT surface'),
(121, 35, 'DJI MAVIC 2 ZOOM STANDARD SET (DRONE)'),
(122, 35, 'DJI MAVIC FLYMORE KIT '),
(123, 35, 'SANDISK EXTREME PRO 128GB '),
(124, 32, 'TYPE C- ETHERNET ADAPTER'),
(125, 33, 'MEJA BANQUET'),
(126, 32, 'ADAPTER  USB TYPE C'),
(127, 32, 'LAN  ADAPTER  USB'),
(129, 36, 'toaster'),
(130, 35, 'BROCHURE RACK'),
(132, 35, 'ARCYLIC STAND');

-- --------------------------------------------------------

--
-- Table structure for table `kategoritps`
--

CREATE TABLE `kategoritps` (
  `id_kategori` int(50) NOT NULL,
  `nama_kategori` varchar(500) NOT NULL,
  `kod` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategoritps`
--

INSERT INTO `kategoritps` (`id_kategori`, `nama_kategori`, `kod`) VALUES
(32, 'KOMPUTER', ''),
(33, 'PERABOT', ''),
(34, 'KELENGKAPAN PEJABAT', '8'),
(35, 'PERALATAN', ''),
(36, 'KEMUDAHAN', '4'),
(37, 'KENDERAAN', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_aset`
--

CREATE TABLE `log_aset` (
  `id` int(11) NOT NULL,
  `aset_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tarikh_daftar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tarikh_serahan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_aset` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_aset` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kakitangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi_jabatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aset`
--

INSERT INTO `log_aset` (`id`, `aset_id`, `tarikh_daftar`, `tarikh_serahan`, `no_aset`, `nama_aset`, `nama_kakitangan`, `lokasi_jabatan`) VALUES
(1, '756', '2024-03-28', '2024-03-28', 'MICTH/ADMIN/00/00/03', 'HP GAMING', 'Ahmadee Bin Abdullah', '3'),
(2, '756', '2024-03-28', '2024-03-28', 'MICTH/ADMIN/00/24/03', 'HP GAMING V2', 'Abdallah Wedud Bin Hisamudin', '8'),
(3, '756', '2024-03-28', '2024-03-28', 'MICTH/ADMIN/00/12/08', 'HP GAMING V3', 'Mohamad Hamdan Bin Dzulkarnain', '6'),
(4, '743', '2024-03-12', '0000-00-00', 'MICTH/ADMIN/00/33/55', 'Saga FLX', 'Shahrol Nizam Bin Masran', '6'),
(5, '743', '2024-03-12', '0000-00-00', 'MICTH/ADMIN/00/33/55', 'Saga FLX', 'Shahrol Nizam Bin Masran', '6'),
(6, '759', '2024-04-02', '2024-04-02', 'MICTH/ADMIN/03/00/99', 'COWAY Home Ice', 'Ahmadee Bin Abdullah', '3'),
(7, '761', '2024-04-02', '2024-04-02', 'MICTH/ACC/00/00/00', 'Hisense', 'Mohamad Hod Bin Rabu', '3'),
(8, '761', '2024-04-02', '2024-04-02', 'MICTH/ACC/00/00/00', 'Hisense', 'Ahmadee Bin Abdullah', '3'),
(9, '763', '2024-04-29', '2024-04-29', 'MICTH/ADMIN/00/00/81', 'BMW', 'Abdallah Wedud Bin Hisamudin', '8'),
(10, '763', '2024-04-29', '2024-04-29', 'MICTH/ADMIN/00/00/81', 'M3 GTR', 'Abdallah Wedud Bin Hisamudin', '8'),
(11, '763', '2024-04-29', '2024-04-29', 'MICTH/ADMIN/00/00/81', 'M3 GTR A', 'Abdallah Wedud Bin Hisamudin', '8'),
(12, '763', '2024-04-29', '2024-04-29', 'MICTH/ADMIN/00/00/81', 'M3 GTR A', 'Farah Nur Azreen Fatehah Binti Azme', '8'),
(13, '757', '2024-03-29', '2024-03-29', 'MICTH/ADMIN/00/00/01', 'GAMING TABLE V5', 'Norwajunizam Bin Abd Wahab', '9'),
(14, '757', '2024-03-29', '2024-03-29', 'MICTH/ADMIN/00/00/01', 'GAMING TABLE V5', 'Nur Amalina Binti Abd Rahman', '6'),
(15, '757', '2024-03-29', '2024-03-29', 'MICTH/ADMIN/00/00/01', 'GAMING TABLE V5', 'Siti Wahida Binti Md Desa', '5'),
(16, '757', '2024-03-29', '2024-03-29', 'MICTH/ADMIN/00/00/01', 'GAMING TABLE V5', 'Mohamad Firdaus Bin Abu', '4'),
(17, '764', '2024-05-10', '2024-05-10', 'MICTH/ADMIN/01/05/05', 'IDEAPAD', 'Ahmadee Bin Abdullah', '3');

-- --------------------------------------------------------

--
-- Table structure for table `req_aset`
--

CREATE TABLE `req_aset` (
  `id` int(11) NOT NULL,
  `kategori_aset` varchar(50) NOT NULL,
  `jenis_aset` varchar(50) NOT NULL,
  `nama_kakitangan` varchar(50) NOT NULL,
  `lokasi_jabatan` varchar(50) NOT NULL,
  `tarikh_request` varchar(50) NOT NULL,
  `reason_request` varchar(255) NOT NULL,
  `status_req` varchar(50) NOT NULL,
  `tarikh_check` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_aset`
--

INSERT INTO `req_aset` (`id`, `kategori_aset`, `jenis_aset`, `nama_kakitangan`, `lokasi_jabatan`, `tarikh_request`, `reason_request`, `status_req`, `tarikh_check`) VALUES
(1, 'KOMPUTER', 'Keyboard', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-14', '1', 'Rejected', '2024-05-20'),
(3, 'KOMPUTER', 'PENDRIVE', 'Ahmadee Bin Abdullah', 'Account & Finance', '2024-05-12', '2', 'Processing', ''),
(4, 'PERABOT', 'SOFA', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-09', '1', 'Approved', '2024-05-21'),
(5, 'KELENGKAPAN PEJABAT', 'DISPENSER MACHINE', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-14', '2', 'Approved', '2024-05-16'),
(6, 'KEMUDAHAN', 'PETI SEJUK', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-14', '3', 'Rejected', '2024-05-17'),
(7, 'KENDERAAN', 'kereta', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-02', '2', 'Approved', '2024-06-14'),
(8, 'KOMPUTER', 'MOUSE', 'Norsyahira Binti Ahmad Sauffi', 'Digital & Information Technology', '2024-05-15', '3', 'Rejected', '2024-05-21'),
(9, 'KEMUDAHAN', 'KIPAS BERDIRI', 'Muhammad Farid Bin Ariffin', 'Human Resources', '2024-05-21', '3', 'Rejected', '2024-05-21'),
(10, 'KEMUDAHAN', 'PETI SEJUK', 'Muhammad Farid Bin Ariffin', 'Human Resources', '2024-05-21', '3', 'Approved', '2024-05-21'),
(11, 'KELENGKAPAN PEJABAT', 'PUNCHER PAPER', 'Muhammad Farid Bin Ariffin', 'Human Resources', '2024-06-14', '2', 'Approved', '2024-06-14'),
(12, 'PERABOT', '-', 'Muhammad Farid Bin Ariffin', 'Human Resources', '2024-06-14', '3', 'Processing', '');

-- --------------------------------------------------------

--
-- Table structure for table `req_reason`
--

CREATE TABLE `req_reason` (
  `id` int(50) NOT NULL,
  `id_reason` int(50) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_reason`
--

INSERT INTO `req_reason` (`id`, `id_reason`, `reason`) VALUES
(1, 1, 'Asset Replacement'),
(2, 2, 'Event Requirement'),
(3, 3, 'Departmental Use');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar_aset`
--

CREATE TABLE `tbl_daftar_aset` (
  `id` int(50) NOT NULL,
  `kategori_aset` varchar(500) NOT NULL,
  `jenis_aset` varchar(500) NOT NULL,
  `no_siri` varchar(500) DEFAULT NULL,
  `nama_aset` varchar(500) NOT NULL,
  `tahun_beli` varchar(500) NOT NULL,
  `harga_beli` varchar(500) NOT NULL,
  `warna` varchar(500) NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  `pemilik_aset` varchar(200) NOT NULL,
  `tarikh_daftar` varchar(500) NOT NULL,
  `tarikh_serahan` date NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `nama_kakitangan` varchar(100) NOT NULL,
  `no_aset` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `emel_pembekal` varchar(100) NOT NULL,
  `id_pembekal` varchar(250) NOT NULL,
  `pemilik_jabatan` varchar(255) DEFAULT NULL,
  `lokasi_jabatan` varchar(255) NOT NULL,
  `status_aset` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_daftar_aset`
--

INSERT INTO `tbl_daftar_aset` (`id`, `kategori_aset`, `jenis_aset`, `no_siri`, `nama_aset`, `tahun_beli`, `harga_beli`, `warna`, `lokasi`, `pemilik_aset`, `tarikh_daftar`, `tarikh_serahan`, `warranty`, `nama_kakitangan`, `no_aset`, `model`, `emel_pembekal`, `id_pembekal`, `pemilik_jabatan`, `lokasi_jabatan`, `status_aset`) VALUES
(17, '32', 'MOUSE', NULL, 'HP', '', '', '', '', '', '2021-04-18', '0000-00-00', '', 'SENENG BIN MANTI', 'MICTH/BD/01/09/90', '- ', '', '0', '', '', 'Active'),
(18, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'SENENG BIN MANTI', 'MICTH/BD/01/09/91	', '-', '', '0', '', '', 'Active'),
(346, '32', 'CPU', 'SGH751RPS3', ' CPU', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ACC/01/02/28	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(3, '34', 'WALKIE TALKIE', 'MICTH/AD/01/01/3', 'Walkie Talkie', '2017', '300', 'Hitam', 'HR', '', '2019-11-19', '2017-11-08', '-', 'Nurin Jazlina', 'LPM/AD/SEWA/WT/2017', 'WT01', 'SafieEnterprise@gmail.com', '0', '', '', 'Active'),
(4, '35', 'TOOLBOX', 'MICTH/ICT/03/08/4', 'Toolbox ', '2017', '100', 'Hitam', 'ICT', '', '2019-10-14', '2019-07-01', '5 Bulan', 'Suhaila binti Zainal', 'LPM/IT/SEWA/TB/2017', 'TB01', 'hamiduntoolbox@gmail.com', '0', '', '', 'Active'),
(5, '35', 'PENDRIVE', 'MICTH/ICT/03/06/5', 'Pendrive', '2016', '100', 'Merah ', 'ICT', '', '2019-11-08', '0000-00-00', '6 Bulan', 'Hazirah binti Hazali', 'LPM/IT/SEWA/PD/2016', 'Kingston', 'ahmad_hardware@gmail.com', '0', '', '', 'Active'),
(13, '32', 'CPU', 'SGH751RPS3', 'HP', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'Alwani Binti Naziri', 'MICTH/ACC/01/02/28', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(14, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'MOHD HAMDAN BIN DZULKARNAIN', 'MICTH/BD/01/09/87', '- ', '', '0', '', '', 'Active'),
(15, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BD/01/09/88', 'HP ', '', '0', '', '', 'Active'),
(16, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'SITI HAFIZA BINTI ABU BAKAR', 'MICTH/BD/01/09/89	', '- ', '', '0', '', '', 'Active'),
(19, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'RAZLIAH BINTI RAHMAT', 'MICTH/BD/01/09/95	', '-', '', '0', '', '', 'Active'),
(20, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'RAIHANA BINTI ABDULLAH', 'MICTH/BD/01/09/96', '- ', '', '0', '', '', 'Active'),
(21, '32', 'PENDRIVE', '', 'TOSHIBA (8GB) ', '', '', 'KUNING', '', '', '2015-10-2', '0000-00-00', '', 'KHAIRUDDIN BIN HAMZAH', 'MICTH/BD/01/10/12	', '-', '', '0', '', '', 'Active'),
(22, '32', 'WIRELESS PACK (DONGLE)', '', 'YES XS 0114487', '', '', '', '', '', '2015-10-2', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/BD/01/13/01', '-', '', '0', '', '', 'Active'),
(23, '33', 'LACI BESAR', '', 'PUTIH (3 LAYER)', '', '', 'PUTIH', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRUDDIN BIN HAMZAH', 'MICTH/BD/02/16/01	', '-', '', '0', '', '', 'Active'),
(24, '33', 'RAK FILE KECIL', '', 'HITAM (3 LAYER)', '', '', 'HITAM', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRUDDIN BIN HAMZAH', 'MICTH/BD/02/17/01	', '-', '', '0', '', '', 'Active'),
(25, '35', 'Handphone', 'ESN: 356713050944881', 'NOKIA 1280 ', '', '', 'BLUE', '', '', '2015-10-02', '0000-00-00', '', 'SITI HAFIZA BINTI ABU BAKAR', 'MICTH/BD/04/06/01', 'Nokia', '', '0', '', '', 'Active'),
(26, '36', 'KIPAS BERDIRI', 'B40208486', 'PENSONIC', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRUDDIN BIN HAMZAH', 'MICTH/BD/05/13/03	', 'PENSONIC', '', '0', '', '', 'Active'),
(27, '32', 'PENDRIVE', 'NA9CXZ12', 'SEAGATE', '', '', '', '', '', '2018-03-21', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BD/HARDISK/18/01', 'SRD00F1', '', '0', '', '', 'Active'),
(28, '32', 'CPU', 'SGH751RPV6', 'HP', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/02/44	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(29, '32', 'CPU', 'SGH751RPV7', 'HP', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/02/45	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(30, '32', 'Keyboard', '', 'HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/03/50	', '-', '', '0', '', '', 'Active'),
(31, '32', 'Keyboard', '', 'HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/03/51	', '-', '', '0', '', '', 'Active'),
(32, '32', 'LAPTOP', 'SCD 339824F', 'LAPTOP HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/05/07', 'HP', '', '0', '', '', 'Active'),
(33, '32', 'LAPTOP', 'CND 4405WMC', 'LAPTOP HP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/01/05/15	', 'HP', '', '0', '', '', 'Active'),
(34, '32', 'LAPTOP', '5CG8100HC5', 'LAPTOP HP ENVY 13-AD112TX', '', '5088', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINAL ABIDIN ISMAIL', 'MICTH/CEO/01/05/48	', 'HP', '', '0', '', '', 'Active'),
(35, '32', 'TABLET', '', 'HUAWEI TABLET', '', '2898', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/01/08/02	', 'HUAWEI MATEPAD PRO', '', '0', '', '', 'Active'),
(36, '32', 'MOUSE', '7CH7462L4Y', 'HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINAL ABIDIN ISMAIL', 'MICTH/CEO/01/09/63	', 'HP', '', '0', '', '', 'Active'),
(37, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/09/92	', 'HP', '', '0', '', '', 'Active'),
(38, '32', 'MOUSE', '', 'HP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/CEO/01/09/93	', 'HP', '', '0', '', '', 'Active'),
(39, '32', 'PENDRIVE', '', 'TOSHIBA (8GB) ', '', '', 'KUNING', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/01/10/07', 'Toshiba', '', '0', '', '', 'Active'),
(40, '32', 'PENDRIVE', '', 'PENDRIVE-16GB', '', '69', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/01/10/26	', '-', '', '0', '', '', 'Active'),
(41, '32', 'PENDRIVE', '', 'KINGSTON DTI G4 128GB USB FLASH DRIVE', '', '80', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/01/10/27	', 'KINGSTON', '', '0', '', '', 'Active'),
(42, '32', 'WIRELESS PACK (DONGLE)', 'YESXS0114557', 'YES', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/01/13/02', 'YES', '', '0', '', '', 'Active'),
(43, '32', 'LAPTOP', 'SCIMQ6KT0G940', 'MACBOOK', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/CEO/01/18/01', 'MACBOOK AIR 13.3\" 12GB', '', '0', '', '', 'Active'),
(44, '33', 'PASU BUNGA', '', 'PASU BUNGA', '', '', '', '', '', '2015-10-02', '0000-00-00', '', '', 'MICTH/CEO/02/12/01', '- ', '', '0', '', '', 'Active'),
(45, '33', 'PASU BUNGA', '', 'PASU BUNGA', '', '', '', '', '', '2015-10-02', '0000-00-00', '', '', 'MICTH/CEO/02/12/02	', '-', '', '0', '', '', 'Active'),
(46, '35', 'external hardisk', 'WX31AA97XDR9', 'WD 1TB MY PASSPORT', '', '', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/04/04/20', '-', '', '0', '', '', 'Active'),
(47, '35', 'external hardisk', '', 'HK DESIGN HP-069 MINI 1000MAH CHAI SERIES POWER BA', '', '48', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/04/04/21	', '-', '', '0', '', '', 'Active'),
(48, '35', 'Handphone', '', 'HUAWEI Y9S', '', '999', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/04/06/02', 'HUAWEI', '', '0', '', '', 'Active'),
(49, '35', 'Handphone', '', 'HUAWEI GT WATCH 2', '', '799', '', '', '', '2020-05-13', '0000-00-00', '', '', 'MICTH/CEO/04/06/03	', 'HUAWEI', '', '0', '', '', 'Active'),
(50, '36', 'SMART TAG', '030028E7E12D', 'EFKON AG, IS OBU530', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/05/02/01	', '-', '', '0', '', '', 'Active'),
(51, '36', 'SMART TAG', '', 'SMART TAG', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/CEO/05/02/02', '- ', '', '0', '', '', 'Active'),
(52, '36', 'SMART TAG', '', 'SMART TAG', '', '142.5', '', '', '', '2020-05-22', '0000-00-00', '', '', 'MICTH/CEO/05/02/03	', '-', '', '0', '', '', 'Active'),
(53, '36', 'TOUCH N GO KAD', '', 'TNG', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/05/03/01	', '-', '', '0', '', '', 'Active'),
(54, '36', 'KAD KORPORAT VISA MAYBANK', '', 'MAYBANK CORPORATE CARD (VISA)', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/05/09/02	', '-', '', '0', '', '', 'Active'),
(57, '36', 'KIPAS BERDIRI', 'B40208532', 'KIPAS BERDIRI PENSONIC', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/05/13/01	', 'PENSONIC', '', '0', '', '', 'Active'),
(56, '36', 'KIPAS BERDIRI', '', 'KIPAS BERDIRI DELL', '', '', '', '', '', '2015-12-01', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/CEO/05/13/97	', 'DELL', '', '0', '', '', 'Active'),
(58, '36', 'kereta', 'MCU 656', 'HONDA ACCORD 2.0VTIL', '', '153312.5', '', '', '', '2016-06-28', '0000-00-00', '', '', 'MICTH/CEO/06/03/03', 'HONDA', '', '0', '', '', 'Active'),
(59, '32', 'LAPTOP', 'SN: 7FNIB 11/11', 'LENOVO THINKPAD (X120E)', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/HR/01/05/03', 'LENOVO', '', '0', '', '', 'Active'),
(60, '34', 'ACCESS DOOR CARD', '', '-', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/HR/03(10)/01	', '-', '', '0', '', '', 'Active'),
(61, '34', 'ACCESS DOOR CARD', '', '-', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/HR/03(9)/01', '-', '', '0', '', '', 'Active'),
(62, '35', 'CAMERA DIGITAL', 'SN: 72527829 ', 'COOLPIX S3300 (NIKON)', '', '', 'PINK', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/HR/04/05/01	', 'NIKON', '', '0', '', '', 'Active'),
(63, '36', 'BAJU HUJAN DESPATCH', '', 'BAJU HUJAN DESPATCH ', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'SUDIN BIN MD YUSSOF', 'MICTH/HR/05/04/01', '- ', '', '0', '', '', 'Active'),
(64, '36', 'GELOMBANG KETUHAR MIKRO', 'SN: ME 711K', 'GELOMBANG KETUHAR MIKRO', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'SUDIN BIN MD YUSSOF', 'MICTH/HR/05/05/01	', 'SAMSUNG', '', '0', '', '', 'Active'),
(65, '35', 'tangga', '', 'TANGGA', '', '420', '', '', '', '2019-05-23', '0000-00-00', '', 'MUHAMMAD NAZREEQ MOHD NIZAM', 'MICTH/ICT/04/08/02	', '-', '', '0', '', '', 'Active'),
(66, '32', 'printer', 'SN: CNC 7G6D6QR', 'PRINTER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BOD/01/04/04', 'HP COLOR LASER JETPRO MFPM176N', '', '0', '', '', 'Active'),
(67, '32', 'SET PC', 'SN: SC02MC5NIF8J3', 'PC APPLE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BOD/01/15/01', 'APPLE Imac 21.5\" 2.9ghz', '', '0', '', '', 'Active'),
(68, '36', 'KAD KORPORAT VISA MAYBANK', '', 'MAYBANK CORPORATE CARD (VISA)', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BOD/05/09/02	', '-', '', '0', '', '', 'Active'),
(69, '36', 'zING KAD MAYBANK', '', 'MAYBANK', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BOD/05/10/01	', '-', '', '0', '', '', 'Active'),
(70, '36', 'PORTABLE AIR COND', 'MEC IPORTG9000PRIC`', 'PORTABLE AIRCOND', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/BOD/05/12/01	', '-', '', '0', '', '', 'Active'),
(71, '36', 'SHELL CARD', '7002841610670000000', 'SHELL CARD', '', '', '', '', '', '2016-04-22', '0000-00-00', '', 'DATUK WIZAN ABD GHANI', 'MICTH/BOD/05/14/02	', '-', '', '0', '', '', 'Active'),
(72, '32', 'LAPTOP', 'SN: 7FMTY 11/11', 'LAPTOP ', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/ID/01/05/01	', 'LENOVO', '', '0', '', '', 'Active'),
(73, '32', 'SERVER', 'CN-OY86CI-71070-2C2-1244-400', 'SERVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/ID/01/06/08	', 'DELL', '', '0', '', '', 'Active'),
(74, '32', 'SERVER', 'DP/N03 WXFP 6YC 9HZICN-03WWFP-47985-3BB-0435-A03', 'SERVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MAS PARWIN BIN MAHAMOOTH', 'MICTH/ID/01/06/10	', 'DELL', '', '0', '', '', 'Active'),
(77, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD NAZREEQ MOHD NIZAM', 'MICTH/ID/01/10/01	', 'SONY 8GB', '', '0', '', '', 'Active'),
(78, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAMDAN BIN DZULKARNAIN', 'MICTH/ID/01/10/02	', 'SONY 8GB', '', '0', '', '', 'Active'),
(79, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/01/10/03	', 'SONY 8GB', '', '0', '', '', 'Active'),
(80, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'SENENG BIN MANTI', 'MICTH/ID/01/10/04', 'SONY 8GB', '', '0', '', '', 'Active'),
(81, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'AZLAN BIN ABDULLAH', 'MICTH/ID/01/10/05	', 'SONY 8GB', '', '0', '', '', 'Active'),
(82, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD FAIZUL BIN AHMAD', 'MICTH/ID/01/10/06	', 'SONY 8GB', '', '0', '', '', 'Active'),
(83, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', 'KUNING', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/01/10/14	', 'TOSHIBA 8GB', '', '0', '', '', 'Active'),
(84, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/01/10/15	', '-', '', '0', '', '', 'Active'),
(85, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'RAIHANA BINTI ABDULLAH', 'MICTH/ID/01/10/16	', '- ', '', '0', '', '', 'Active'),
(86, '32', 'VGA CONNECTOR', '', 'HDMI SPLITTER', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/05	', '-', '', '0', '', '', 'Active'),
(87, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/06	', '-', '', '0', '', '', 'Active'),
(88, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/07	', '-', '', '0', '', '', 'Active'),
(92, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/08	', 'CB-VGA/HDMI', '', '0', '', '', 'Active'),
(91, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/09	', '-', '', '0', '', '', 'Active'),
(93, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2017-04-04', '0000-00-00', '', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ID/01/11/10	', 'CABLE HIGH QUALITY', '', '0', '', '', 'Active'),
(94, '33', 'RAK FILE KECIL', '', 'RAK FILE KECIL', '', '', 'HITAM 3 LAYER', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/02/17/02	', '-', '', '0', '', '', 'Active'),
(95, '34', 'VACUUM', '', 'VACUUM', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/03/08/03	', 'DELL', '', '0', '', '', 'Active'),
(96, '34', 'VACUUM', 'CLEANER 332756', 'VACUUM', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/03/08/04	', 'DELL', '', '0', '', '', 'Active'),
(97, '35', 'WALKIE TALKIE', 'TK3107', 'WALKIE TALKIE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/02/01	', 'KENWOOD', '', '0', '', '', 'Active'),
(98, '35', 'WALKIE TALKIE', 'TK3107', 'WALKIE TALKIE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/02/02	', 'KENWOOD', '', '0', '', '', 'Active'),
(99, '35', 'WALKIE TALKIE', 'TK3107', 'WALKIE TALKIE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/02/03	', 'KENWOOD', '', '0', '', '', 'Active'),
(100, '35', 'external hardisk', 'BH904991-20140226', 'EXTERNAL HARDISK', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/04/05	', 'IMATION', '', '0', '', '', 'Active'),
(101, '35', 'external hardisk', 'BH904991-20140226', 'EXTERNAL HARDISK', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/04/06	', 'IMATION', '', '0', '', '', 'Active'),
(102, '35', 'external hardisk', 'BH904991-20140226', 'EXTERNAL HARDISK', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/04/07	', 'IMATION', '', '0', '', '', 'Active'),
(103, '35', 'HD CAR SURVEILLANCE CAMERA', 'SN: 452627', 'HD CAR SURVEILLANCE CAMERA', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/07/01	', '-', '', '0', '', '', 'Active'),
(104, '35', 'tangga', '', 'TANGGA', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/08/01	', '-', '', '0', '', '', 'Active'),
(105, '35', 'CORDLESS DRILL', 'BOSCH GSR 1800 LI', 'CORDLESS DRILL', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/ID/04/09/01	', 'BOSCH GSR 1800 LI', '', '0', '', '', 'Active'),
(106, '35', 'spaner', '', 'SPANER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/10/01	', '-', '', '0', '', '', 'Active'),
(107, '35', 'spaner', '', 'SPANER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/10/02	', '- ', '', '0', '', '', 'Active'),
(108, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/11/01	', '-', '', '0', '', '', 'Active'),
(109, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2021-07-14', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/11/02	', '-', '', '0', '', '', 'Active'),
(110, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/11/03	', '-', '', '0', '', '', 'Active'),
(111, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/11/04	', '-', '', '0', '', '', 'Active'),
(112, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/11/05	', '-', '', '0', '', '', 'Active'),
(113, '35', 'PLIER', '', 'PLIER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/11/06	', '-', '', '0', '', '', 'Active'),
(115, '35', 'HAMMER', '', 'HAMMER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/12/01	', '-', '', '0', '', '', 'Active'),
(116, '35', 'HAMMER', '', 'HAMMER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/12/02	', '-', '', '0', '', '', 'Active'),
(117, '35', 'TOOL BAG', '', 'TOOL BAG', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/14/01	', '-', '', '0', '', '', 'Active'),
(118, '35', 'TOOL BAG', '', 'TOOL BAG', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/14/02	', '-', '', '0', '', '', 'Active'),
(119, '35', 'SKRU DRIVER', '38MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/01	', '-', '', '0', '', '', 'Active'),
(120, '35', 'SKRU DRIVER', '38MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/02	', '-', '', '0', '', '', 'Active'),
(121, '35', 'SKRU DRIVER', '38MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/03	', '-', '', '0', '', '', 'Active'),
(122, '35', 'SKRU DRIVER', '38MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/04	', '-', '', '0', '', '', 'Active'),
(123, '35', 'SKRU DRIVER', '150MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/05	', '-', '', '0', '', '', 'Active'),
(124, '35', 'SKRU DRIVER', '150MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/06	', '-', '', '0', '', '', 'Active'),
(125, '35', 'SKRU DRIVER', '150MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/07	', '-', '', '0', '', '', 'Active'),
(126, '35', 'SKRU DRIVER', '150MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/08	', '-', '', '0', '', '', 'Active'),
(127, '35', 'SKRU DRIVER', '150MM X 6 MM (HAVEY DUTY)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/09	', '-', '', '0', '', '', 'Active'),
(128, '35', 'SKRU DRIVER', '150MM X 6 MM (HAVEY DUTY)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/10	', '-', '', '0', '', '', 'Active'),
(129, '35', 'SKRU DRIVER', '100 MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/11	', '-', '', '0', '', '', 'Active'),
(130, '35', 'SKRU DRIVER', '100 MM X 6 MM (-)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/12	', '-', '', '0', '', '', 'Active'),
(131, '35', 'SKRU DRIVER', '100 MM X 6 MM (+)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/13	', '-', '', '0', '', '', 'Active'),
(132, '35', 'SKRU DRIVER', '100 MM X 6 MM (+)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/04/15/13	', '-', '', '0', '', '', 'Active'),
(133, '35', 'SKRU DRIVER', '100 MM X 6 MM (+)', 'SKRU DRIVER', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/04/15/14	', '-', '', '0', '', '', 'Active'),
(134, '36', 'SAFETY BOOT (SHOES)', '', 'SAFETY BOOTS', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/ID/05/07/01	', 'MR.MARK PROTECTOR SAFETY SHOES', '', '0', '', '', 'Active'),
(135, '36', 'SAFETY BOOT (SHOES)', '', 'SAFETY BOOTS', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD FAIZUL BIN AHMAD', 'MICTH/ID/05/07/02	', 'MR.MARK PROTECTOR SAFETY SHOES', '', '0', '', '', 'Active'),
(136, '36', 'SAFETY BOOT (SHOES)', '', 'SAFETY BOOTS', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'AZLAN BIN ABDULLAH', 'MICTH/ID/05/07/03	', 'MR.MARK PROTECTOR SAFETY SHOES', '', '0', '', '', 'Active'),
(137, '36', 'SAFETY BOOT (SHOES)', '', 'SAFETY BOOTS', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ID/05/07/04	', 'MR.MARK PROTECTOR SAFETY SHOES', '', '0', '', '', 'Active'),
(138, '36', 'SAFETY BOOT (SHOES)', '', 'SAFETY BOOTS', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAMDAN BIN DZULKARNAIN', 'MICTH/ID/05/07/05	', 'MR.MARK PROTECTOR SAFETY SHOES', '', '0', '', '', 'Active'),
(139, '36', 'KIPAS BERDIRI', 'B40208473', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/04	', 'PENSONIC', '', '0', '', '', 'Active'),
(140, '36', 'KIPAS BERDIRI', 'B40208466', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/05	', 'PENSONIC', '', '0', '', '', 'Active'),
(141, '36', 'KIPAS BERDIRI', 'B40208463', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/08	', 'PENSONIC', '', '0', '', '', 'Active'),
(142, '36', 'KIPAS BERDIRI', 'B40208465', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/09	', 'PENSONIC', '', '0', '', '', 'Active'),
(143, '36', 'KIPAS BERDIRI', 'B40208468', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/10	', 'PENSONIC', '', '0', '', '', 'Active'),
(144, '36', 'KIPAS BERDIRI', 'B40208457', 'KIPAS BERDIRI', '', '', '', '', '', '2015-04-06', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/ID/05/13/11	', 'PENSONIC', '', '0', '', '', 'Active'),
(145, '32', 'PENDRIVE', '', 'PENDRIVE', '', '79', '', '', '', '2018-04-30', '0000-00-00', '', 'MUHAMMAD NAZREEQ MOHD NIZAM', 'MICTH/MRC/01/10/18	', 'KINGSTON', '', '0', '', '', 'Active'),
(146, '32', 'PENDRIVE', '', 'PENDRIVE', '', '79', '', '', '', '2018-04-30', '0000-00-00', '', '', 'MICTH/MRC/01/10/19	', 'KINGSTON', '', '0', '', '', 'Active'),
(147, '32', 'PENDRIVE', '', 'PENDRIVE', '', '79', '', '', '', '2018-04-30', '0000-00-00', '', '', 'MICTH/MRC/01/10/20	', 'KINGSTON', '', '0', '', '', 'Active'),
(159, '32', 'CPU', 'SGH701SD565', 'CPU ', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/13	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(149, '35', 'HD CAR SURVEILLANCE CAMERA', '', 'HD CAR SURVEILLANCE CAMERA', '', '4128.7', '', '', '', '2018-04-12', '0000-00-00', '', '', 'MICTH/MRC/04/19/01	', 'CEL-FI GO', '', '0', '', '', 'Active'),
(150, '35', 'CAMERA DIGITAL', '', 'CAMERA DIGITAL DIGIEYE', '', '', '', '', '', '2018-04-30', '0000-00-00', '', '', 'MICTH/MRC/04/20/01	', 'TR-65', '', '0', '', '', 'Active'),
(151, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/OKNM/01/03/14	', 'HP', '', '0', '', '', 'Active'),
(152, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/01/09/44	', 'HP', '', '0', '', '', 'Active'),
(153, '32', 'CPU', 'SGH701SD5Z', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/07	', 'HP ELITEDESK 800 TWR', '', '0', '', '', 'Active'),
(154, '32', 'CPU', 'SGH701SD60', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/08	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(155, '32', 'CPU', 'SGH701SD561', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/09	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(156, '32', 'CPU', 'SGH701SD562', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/10	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(157, '32', 'CPU', 'SGH701SD563', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/11	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(158, '32', 'CPU', 'SGH701SD564', 'CPU ', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/12	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(160, '32', 'CPU', 'SGH701SD566', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/14	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(161, '32', 'CPU', 'SGH701SD567', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/15	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(162, '32', 'CPU', 'SGH701SD568', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/16	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(163, '32', 'CPU', 'SGH701SD5P', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/17	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(164, '32', 'CPU', 'SGH701SD5Q', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/18	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(165, '32', 'CPU', 'SGH701SD5R', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/19	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(166, '32', 'CPU', 'SGH701SD5S', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/20	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(167, '32', 'CPU', 'SGH701SD5T', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/21	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(168, '32', 'CPU', 'SGH701SD5V', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/22	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(169, '32', 'CPU', 'SGH701SD5W', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/23	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(170, '32', 'CPU', 'SGH701SD5X', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/24	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(171, '32', 'CPU', 'SGH701SD5Y', 'CPU', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/02/25	', 'HP ELITEDESK 800 TWR PLANTINUM G2', '', '0', '', '', 'Active'),
(172, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/15	', 'HP ', '', '0', '', '', 'Active'),
(173, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2021-07-15', '0000-00-00', '', '', 'MICTH/PKNM/01/03/16	', 'HP', '', '0', '', '', 'Active'),
(174, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/17	', 'HP', '', '0', '', '', 'Active'),
(175, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/18	', 'HP', '', '0', '', '', 'Active'),
(176, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/19', 'HP', '', '0', '', '', 'Active'),
(177, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/20	', 'HP', '', '0', '', '', 'Active'),
(178, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/21	', 'HP', '', '0', '', '', 'Active'),
(180, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/23	', 'HP ', '', '0', '', '', 'Active'),
(181, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/24	', 'HP', '', '0', '', '', 'Active'),
(182, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/25	', 'HP', '', '0', '', '', 'Active'),
(183, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/26	', 'HP', '', '0', '', '', 'Active'),
(184, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/27	', 'HP', '', '0', '', '', 'Active'),
(185, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/28	', 'HP ', '', '0', '', '', 'Active'),
(186, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/29	', 'HP', '', '0', '', '', 'Active'),
(187, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/30	', 'HP', '', '0', '', '', 'Active'),
(188, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/31	', 'HP', '', '0', '', '', 'Active'),
(189, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/03/32	', 'HP ', '', '0', '', '', 'Active'),
(190, '32', 'LAPTOP', '5CG7010ZZ2', 'LAPTOP HP', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/05/47	', 'HP IDS UMA I5-6200U 348 G3', '', '0', '', '', 'Active'),
(191, '32', 'lcd monitor', 'CNC645P58G', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/11	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(192, '32', 'lcd monitor', 'CNC649PH01', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/12	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(193, '32', 'lcd monitor', 'CNC647NX6N', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/13	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(194, '32', 'lcd monitor', 'CNC647NX6T', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/14	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(195, '32', 'lcd monitor', 'CNC647NX6Z', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/15', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(196, '32', 'lcd monitor', 'CNC647NX6R', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/16	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(197, '32', 'lcd monitor', 'CNC649PGZX', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/17	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(198, '32', 'lcd monitor', 'CNC649PGZT', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/18	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(199, '32', 'lcd monitor', 'CNC649PGZM', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/19	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(200, '32', 'lcd monitor', 'CNC647NX6V', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/20	', '\" HP LV2011 20 IN\"', '', '0', '', '', 'Active'),
(201, '32', 'lcd monitor', 'CNC647NX6S', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/21	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(202, '32', 'lcd monitor', 'CNC647NX6Q', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/22	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(203, '32', 'lcd monitor', 'CNC645P58N', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/23	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(205, '32', 'lcd monitor', 'CNC645P58R', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/24	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(206, '32', 'lcd monitor', 'CNC647NX70', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/25	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(207, '32', 'lcd monitor', 'CNC647NX72', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/26	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(208, '32', 'lcd monitor', 'CNC645P4MP', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/27	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(209, '32', 'lcd monitor', 'CNC645P4M9', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/28	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(210, '32', 'lcd monitor', 'CNC645P58L', 'LCD MONITOR', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/07/29	', 'HP LV2011 20 IN', '', '0', '', '', 'Active'),
(211, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/45	', 'HP', '', '0', '', '', 'Active'),
(212, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/46	', 'HP', '', '0', '', '', 'Active'),
(213, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/47	', 'HP', '', '0', '', '', 'Active'),
(214, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/48	', 'HP', '', '0', '', '', 'Active'),
(215, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/49	', 'HP', '', '0', '', '', 'Active'),
(216, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/50	', 'HP', '', '0', '', '', 'Active'),
(217, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/51	', 'HP', '', '0', '', '', 'Active'),
(218, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/52	', 'HP', '', '0', '', '', 'Active'),
(219, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/53	', 'HP', '', '0', '', '', 'Active'),
(220, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/54	', 'HP', '', '0', '', '', 'Active'),
(221, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/55	', 'HP', '', '0', '', '', 'Active'),
(222, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/56	', 'HP', '', '0', '', '', 'Active'),
(223, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/57	', 'HP', '', '0', '', '', 'Active'),
(224, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/58	', 'HP', '', '0', '', '', 'Active'),
(225, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/59	', 'HP', '', '0', '', '', 'Active'),
(226, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/60', 'HP', '', '0', '', '', 'Active'),
(227, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/61	', 'HP', '', '0', '', '', 'Active'),
(228, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/09/62	', 'HP', '', '0', '', '', 'Active'),
(229, '32', 'SCANNER', 'KJKS31001', 'SCANNER ', '', '536.79', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/19/01	', 'CANON LIDE 220', '', '0', '', '', 'Active'),
(230, '32', 'SCANNER', 'KJKS31012', 'SCANNER ', '', '536.79', '', '', '', '2017-01-17', '0000-00-00', '', '', 'MICTH/PKNM/01/19/02	', 'CANON LIDE 220', '', '0', '', '', 'Active'),
(231, '32', 'LAPTOP', 'SCD 3390KN', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/PO/01/05/11	', 'HP', '', '0', '', '', 'Active'),
(232, '32', 'CPU', 'SQH346S5YD', 'CPU', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/SD/01/02/01	', 'HP COMPAQ PRO 4300', '', '0', '', '', 'Active'),
(233, '32', 'CPU', 'SGH346S5YF', 'CPU ', '', '', '', '', '', '2017-01-17', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/SD/01/02/02	', 'HP COMPAQ PRO 4300', '', '0', '', '', 'Active'),
(234, '32', 'CPU', 'SGH34S5YC', 'CPU', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NURELMEY BIN ROSLI', 'MICTH/SD/01/02/03	', 'HP COMPAQ PRO 4300', '', '0', '', '', 'Active'),
(235, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/SD/01/03/01	', 'NEC', '', '0', '', '', 'Active'),
(236, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'RAZLIAH BINTI RAHMAT', 'MICTH/SD/01/03/02	', 'NEC', '', '0', '', '', 'Active'),
(237, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHD FIKRI RAMLAN', 'MICTH/SD/01/03/03	', 'NEC', '', '0', '', '', 'Active'),
(238, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/03/04	', 'NEC', '', '0', '', '', 'Active'),
(239, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AHMAD SAFWAN BIN YUSOF', 'MICTH/SD/01/03/05	', 'NEC', '', '0', '', '', 'Active'),
(240, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ROSIDI BIN ROSLAN', 'MICTH/SD/01/03/06	', 'NEC', '', '0', '', '', 'Active'),
(241, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/03/07	', 'NEC', '', '0', '', '', 'Active'),
(242, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/03/08	', 'HP-KU-0316', '', '0', '', '', 'Active'),
(243, '32', 'Keyboard', 'BDAMBON5Y5J2F4', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/03/09	', 'HP-KU-0317', '', '0', '', '', 'Active'),
(244, '32', 'Keyboard', 'PN: 434821377', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/03/08	', 'HP MODEL SK-28885', '', '0', '', '', 'Active'),
(245, '32', 'Keyboard', 'BDAMBON5Y5J2F6', 'KEYBOARD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/03/10	', 'HP-KU-0318', '', '0', '', '', 'Active'),
(246, '32', 'printer', 'SN: RADK040314', 'PRINTER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/04/01	', 'EPSON L210-C462H', '', '0', '', '', 'Active'),
(247, '32', 'printer', 'SN: RADK040283', 'PRINTER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/04/02	', 'EPSON L210-C462H', '', '0', '', '', 'Active'),
(248, '32', 'printer', 'SN: RADK040284', 'PRINTER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/04/03	', 'EPSON L210-C462H', '', '0', '', '', 'Active'),
(249, '32', 'LAPTOP', 'SN: 7FNOV 11/11', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/02	', 'LENOVO THINKPAD X120E', '', '0', '', '', 'Active'),
(250, '32', 'LAPTOP', 'SN: LR7FNIW', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/04	', 'LENOVO THINKPAD X IZOE', '', '0', '', '', 'Active'),
(251, '32', 'LAPTOP', 'SN: LR7FN4N', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/05	', 'LENOVO THINKPAD X IZOE', '', '0', '', '', 'Active'),
(252, '32', 'LAPTOP', 'SN: LR7FN2B', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/06	', 'LENOVO THINKPAD X IZOE', '', '0', '', '', 'Active'),
(253, '32', 'LAPTOP', 'SCD 3390KS', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/08	', 'HP', '', '0', '', '', 'Active'),
(254, '32', 'LAPTOP', 'SN: CB29291386', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/05/14	', 'LENOVO', '', '0', '', '', 'Active'),
(255, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/SD/01/06/01	', 'NEC EXPRESS 5800', '', '0', '', '', 'Active'),
(256, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'RAZLIAH BINTI RAHMAT', 'MICTH/SD/01/06/02	', 'NEC EXPRESS 5801', '', '0', '', '', 'Active'),
(257, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHD FIKRI RAMLAN', 'MICTH/SD/01/06/03	', 'NEC EXPRESS 5802', '', '0', '', '', 'Active'),
(258, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/06/04	', 'NEC EXPRESS 5803', '', '0', '', '', 'Active'),
(259, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AHMAD SAFWAN BIN YUSOF', 'MICTH/SD/01/06/05	', 'NEC EXPRESS 5804', '', '0', '', '', 'Active'),
(260, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ROSIDI BIN ROSLAN', 'MICTH/SD/01/06/06	', 'NEC EXPRESS 5805', '', '0', '', '', 'Active'),
(261, '32', 'SERVER', '', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/06/07	', 'NEC EXPRESS 5806', '', '0', '', '', 'Active'),
(262, '32', 'SERVER', 'SN: SGH307SYJ3', 'SERVER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/06/09	', 'HP COMPAQ ELITE 8300', '', '0', '', '', 'Active'),
(263, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/SD/01/07/01	', 'NEC', '', '0', '', '', 'Active'),
(264, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'RAZLIAH BINTI RAHMAT', 'MICTH/SD/01/07/02	', 'NEC', '', '0', '', '', 'Active'),
(265, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHD FIKRI RAMLAN', 'MICTH/SD/01/07/03	', 'NEC', '', '0', '', '', 'Active'),
(266, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/07/04	', 'NEC', '', '0', '', '', 'Active'),
(267, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AHMAD SAFWAN BIN YUSOF', 'MICTH/SD/01/07/05	', 'NEC', '', '0', '', '', 'Active'),
(268, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ROSIDI BIN ROSLAN', 'MICTH/SD/01/07/06	', 'NEC', '', '0', '', '', 'Active'),
(269, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/07/07	', 'NEC', '', '0', '', '', 'Active'),
(270, '32', 'lcd monitor', '6CM3372067', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/07/08	', 'HP P191', '', '0', '', '', 'Active'),
(271, '32', 'lcd monitor', '6CM337204B', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/07/09	', 'HP P192', '', '0', '', '', 'Active'),
(272, '32', 'lcd monitor', 'SN: 3CQ30100W5', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/07/08	', 'HP COMPAQ', '', '0', '', '', 'Active'),
(273, '32', 'lcd monitor', '6CM337204D', 'LCD MONITOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/SD/01/07/10	', 'HP P193', '', '0', '', '', 'Active'),
(274, '32', 'TABLET', '', 'TABLET', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/08/01	', '-', '', '0', '', '', 'Active'),
(275, '32', 'MOUSE', 'PN: 590509-002', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/09/01	', 'HP', '', '0', '', '', 'Active'),
(276, '32', 'MOUSE', 'PN: 590509-002', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/09/02	', 'HP', '', '0', '', '', 'Active'),
(277, '32', 'MOUSE', 'PN: 537749-001', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/09/03	', 'HP', '', '0', '', '', 'Active'),
(278, '32', 'MOUSE', 'PN:265986-001', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/SD/01/09/08	', 'HP', '', '0', '', '', 'Active'),
(279, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', 'KUNING', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/10/13	', 'TOSHIBA 8GB ', '', '0', '', '', 'Active'),
(280, '32', 'MESIN CETAK KAD', 'SN: B0450182', ' MESIN CETAK KAD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/17/01	', 'FARGO HDP 5000', '', '0', '', '', 'Active'),
(281, '32', 'MESIN CETAK KAD', 'SN: B4420046', 'MESIN CETAK KAD', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/01/17/02	', '-', '', '0', '', '', 'Active'),
(282, '34', 'SAFETY BOX', 'S30D', 'SAFETY BOX', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/03/10/01	', '-', '', '0', '', '', 'Active'),
(283, '35', 'external hardisk', 'SN: HH911731-83D', 'EXTERNAL HARDISK', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/04/04/05	', 'IMATION 2.5', '', '0', '', '', 'Active'),
(284, '35', 'Handphone', '', 'HANDPHONE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/04/06/01	', 'SONY XPERIA', '', '0', '', '', 'Active'),
(285, '36', 'TV', 'SN: D506B3J00342LI', 'TV', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/SD/05/06/01	', 'TOSHIBA', '', '0', '', '', 'Active'),
(286, '32', 'CPU', 'SGH751RPS5', 'CPU HP', '', '2850', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/TOWER/01/02/30	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(287, '32', 'CPU', 'SGH751RPS6', 'CPU HP', '', '2850', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/02/31	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(288, '32', 'CPU', 'SGH751RPSF', 'CPU HP', '', '2850', '', '', '', '2015-10-02', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/02/32	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(289, '32', 'CPU', 'SGH751RPSG', 'CPU HP', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/TOWER/01/02/33	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(290, '32', 'CPU', '', 'CPU', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/TOWER/01/03/36	', 'HP', '', '0', '', '', 'Active');
INSERT INTO `tbl_daftar_aset` (`id`, `kategori_aset`, `jenis_aset`, `no_siri`, `nama_aset`, `tahun_beli`, `harga_beli`, `warna`, `lokasi`, `pemilik_aset`, `tarikh_daftar`, `tarikh_serahan`, `warranty`, `nama_kakitangan`, `no_aset`, `model`, `emel_pembekal`, `id_pembekal`, `pemilik_jabatan`, `lokasi_jabatan`, `status_aset`) VALUES
(291, '32', 'Keyboard', '', 'KEYBOARD', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/03/37	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(292, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/03/38	', 'HP', '', '0', '', '', 'Active'),
(293, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/TOWER/01/03/39	', 'HP', '', '0', '', '', 'Active'),
(294, '32', 'LAPTOP', 'CND 4415KX1', 'LAPTOP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/TOWER/01/05/17	', 'HP', '', '0', '', '', 'Active'),
(295, '32', 'LAPTOP', '5CD 44700KB', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'SITI HAFIZA BINTI ABU BAKAR', 'MICTH/TOWER/01/05/25	', 'HP', '', '0', '', '', 'Active'),
(297, '32', 'LAPTOP', '5CD 44700KY', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'JURIANI BINTI JALANI', 'MICTH/TOWER/01/05/26	', 'HP', '', '0', '', '', 'Active'),
(298, '32', 'LAPTOP', '5CD 44700LC', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/05/27	', 'HP', '', '0', '', '', 'Active'),
(299, '32', 'LAPTOP', '5CD 44700Q6', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/TOWER/01/05/28	', 'HP', '', '0', '', '', 'Active'),
(300, '32', 'LAPTOP', '5CD 44700Q5', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/TOWER/01/05/29	', 'HP', '', '0', '', '', 'Active'),
(301, '32', 'LAPTOP', '5CD 44700QS', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHD FAIZUL BIN AHMAD', 'MICTH/TOWER/01/05/30	', 'HP', '', '0', '', '', 'Active'),
(302, '32', 'LAPTOP', '5CD 44700Q3', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/TOWER/01/05/31	', 'HP', '', '0', '', '', 'Active'),
(303, '32', 'LAPTOP', '5CD 44700QG', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR RAIMI BINTI IBRAHIM', 'MICTH/TOWER/01/05/32	', 'HP', '', '0', '', '', 'Active'),
(304, '32', 'LAPTOP', '5CD 44700QS', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/TOWER/01/05/33	', 'HP', '', '0', '', '', 'Active'),
(305, '32', 'LAPTOP', '5CD 44700MC', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/05/35	', 'HP', '', '0', '', '', 'Active'),
(306, '32', 'LAPTOP', '5CG8100HB9', 'LAPTOP', '', '5088', '', '', '', '2015-10-02', '0000-00-00', '', 'MOHD HAFIZULLAH BIN ABDULLAH', 'MICTH/TOWER/01/05/50	', 'LAPTOP HP ENVY 13-AD112TX', '', '0', '', '', 'Active'),
(307, '32', 'LAPTOP', '5CD75262HM', 'LAPTOP', '', '2880', '', '', '', '2018-04-04', '0000-00-00', '', 'JURIANI BINTI JALANI', 'MICTH/TOWER/01/05/57	', 'LAPTOP HP PROBOOK 440 G5', '', '0', '', '', 'Active'),
(309, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/TOWER/01/07/33	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(310, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/07/34	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(311, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/07/35	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(312, '32', 'lcd monitor', '', 'LAPTOP', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', ' MICTH/TOWER/01/07/36	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(313, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'NOR AIZZAT BINTI SHARARUDDIN', 'MICTH/TOWER/01/07/37	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(314, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/TOWER/01/07/38	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(315, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MARZILA BINTI MUHAMMAD', 'MICTH/TOWER/01/07/39	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(316, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/TOWER/01/07/40', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(317, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MUHAMMAD NAZREEQ MOHD NIZAM', 'MICTH/TOWER/01/07/41	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(318, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHD HAMDAN BIN DZULKARNAIN', 'MICTH/TOWER/01/07/42	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(319, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/TOWER/01/07/43	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(320, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI HAFIZA BINTI ABU BAKAR', 'MICTH/TOWER/01/07/44	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(321, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'SENENG BIN MANTI', 'MICTH/TOWER/01/07/45	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(322, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/TOWER/01/07/46	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(323, '32', 'lcd monitor', '', 'LCD MONITOR', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/TOWER/01/07/47	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(324, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/TOWER/01/07/48	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(325, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/TOWER/01/07/49	', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(326, '32', 'MOUSE', '7CF4360C1Z', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI HAFIZA BINTI ABU BAKAR', 'MICTH/TOWER/01/09/19	', 'HP', '', '0', '', '', 'Active'),
(327, '32', 'MOUSE', '7CF4360C0N', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'JURIANI BINTI JALANI', 'MICTH/TOWER/01/09/20	', 'HP', '', '0', '', '', 'Active'),
(328, '32', 'MOUSE', '7CF4360C0S', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/09/21	', 'HP', '', '0', '', '', 'Active'),
(329, '32', 'MOUSE', '7CF4360CO7', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD FIRDAUS ABU', 'MICTH/TOWER/01/09/22	', 'HP', '', '0', '', '', 'Active'),
(330, '32', 'MOUSE', '7CF4360C26', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'KHAIRIL ADZHAR BIN SELAMAT', 'MICTH/TOWER/01/09/23	', 'HP', '', '0', '', '', 'Active'),
(331, '32', 'MOUSE', '7CF4360C1Y', 'MOUSE', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'MOHD FAIZUL BIN AHMAD', 'MICTH/TOWER/01/09/24	', 'HP', '', '0', '', '', 'Active'),
(332, '32', 'MOUSE', '7CF4360C27', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/TOWER/01/09/25	', 'HP', '', '0', '', '', 'Active'),
(333, '32', 'MOUSE', '7CF4360C24', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'NUR RAIMI BINTI IBRAHIM', 'MICTH/TOWER/01/09/26	', 'HP', '', '0', '', '', 'Active'),
(334, '32', 'MOUSE', '7CF436OC21', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', '\"MICTH/TOWER/01/09/27	\"', 'HP', '', '0', '', '', 'Active'),
(335, '32', 'MOUSE', '7CF4360C18', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/09/29	', 'HP', '', '0', '', '', 'Active'),
(336, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/TOWER/01/09/65	', 'HP', '', '0', '', '', 'Active'),
(337, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/TOWER/01/09/78	', 'HP', '', '0', '', '', 'Active'),
(338, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/TOWER/01/09/79	', 'HP', '', '0', '', '', 'Active'),
(339, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/TOWER/01/09/80	', 'HP', '', '0', '', '', 'Active'),
(340, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'ZAINURRIAH BINTI MD NOR', 'MICTH/TOWER/01/09/81	', 'HP', '', '0', '', '', 'Active'),
(341, '34', 'PUNCHER PAPER', '', 'PUNCHER PAPER', '', '', 'GRAY', '', '', '2015-04-06', '0000-00-00', '', '', 'MICTH/TOWER/03/11/01	', 'KRIM (GRAY) DP-F2DN (69KG)', '', '0', '', '', 'Active'),
(342, '34', 'STAPLER BESAR', '', 'STAPLER BESAR', '', '', 'GRAY', '', '', '2015-04-06', '0000-00-00', '', '', 'MICTH/TOWER/03/12/01	', 'NO. 3 GRAY', '', '0', '', '', 'Active'),
(343, '34', 'KEY BOX', '', 'KEY BOX', '', '', '', '', '', '2015-10-02', '0000-00-00', '', '', 'MICTH/TOWER/03/13/01	', '270MM X 55MM X 475MM', '', '0', '', '', 'Active'),
(345, '37', 'kereta', '', 'PROTON  (MCK 3404) ', '', '38503.02', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/TOWER/06/03/02	', 'SAGA FL 1.3 AUTO ', '', '0', '', '', 'Active'),
(347, '32', 'CPU', 'SGH751RPTC', 'CPU', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'MARZILA BINTI MUHAMMAD', 'MICTH/ACC/01/02/36	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(348, '32', 'CPU', 'SGH751RPV8', 'CPU', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ACC/01/02/46	', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(351, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ACC/01/03/34	', 'HP', '', '0', '', '', 'Active'),
(350, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MARZILA BINTI MUHAMMAD', 'MICTH/ACC/01/03/42	', 'HP', '', '0', '', '', 'Active'),
(352, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ACC/01/03/52	', 'HP', '', '0', '', '', 'Active'),
(353, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-16', '0000-00-00', '', '', 'MICTH/ACC/01/03/55	', 'HP', '', '0', '', '', 'Active'),
(354, '32', 'LAPTOP', '5CD 44700MG', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', '', 'MICTH/ACC/01/05/22	', 'HP', '', '0', '', '', 'Active'),
(355, '32', 'MOUSE', '7CF4360C0F', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', '', 'MICTH/ACC/01/05/22', 'HP', '', '0', '', '', 'Active'),
(356, '32', 'LAPTOP', '5CD 44700PB', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NOR AIZZAT BINTI SHARARUDDIN', 'MICTH/ACC/01/05/23	', 'HP', '', '0', '', '', 'Active'),
(357, '32', 'MOUSE', '7CF4360C02', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NOR AIZZAT BINTI SHARARUDDIN', 'MICTH/ACC/01/05/23	', 'HP', '', '0', '', '', 'Active'),
(358, '32', 'LAPTOP', '5CD 44700L2', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ACC/01/05/24', 'HP', '', '0', '', '', 'Active'),
(359, '32', 'MOUSE', '7CF4360C01', 'MOUSE', '', '', '', '', '', '2021-07-27', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ACC/01/05/24', 'HP', '', '0', '', '', 'Active'),
(360, '32', 'LAPTOP', 'CND62128PL', 'LAPTOP', '', '1439', '', '', '', '2016-11-02', '0000-00-00', '', '', 'MICTH/ACC/01/05/45', 'HP SLIMLINE 260-P026D I3', '', '0', '', '', 'Active'),
(361, '32', 'LAPTOP', '5CG635015R', 'LAPTOP', '', '1499', '', '', '', '2016-11-02', '0000-00-00', '', '', 'MICTH/ACC/01/05/46', 'HP14-AM035TX(SLIVER)', '', '0', '', '', 'Active'),
(362, '32', 'LAPTOP', '5CG8081NK4', 'LAPTOP', '', '5088', '', '', '', '2018-04-04', '0000-00-00', '', 'NORWAJUNIZAM BIN ABDUL WAHAB', 'MICTH/ACC/01/05/51', 'LAPTOP HP ENVY 13-AD112TX', '', '0', '', '', 'Active'),
(363, '32', 'SERVER', 'SGH814V8L7', 'SERVER', '', '3920', '', '', '', '2018-04-16', '0000-00-00', '', '', 'MICTH/ACC/01/06/13', 'HPE PROLIANT ML30 GEN9 V6', '', '0', '', '', 'Active'),
(364, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ACC/01/07/31', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(365, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ACC/01/09/66', 'HP', '', '0', '', '', 'Active'),
(366, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-16', '0000-00-00', '', 'SENENG BIN MANTI', 'MICTH/ACC/01/09/69', 'HP', '', '0', '', '', 'Active'),
(367, '32', 'MOUSE', '', 'MOUSE', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ACC/01/09/76', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(368, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MARZILA BINTI MUHAMMAD', 'MICTH/ACC/01/09/84', 'HP', '', '0', '', '', 'Active'),
(369, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ACC/01/09/94', 'HP', '', '0', '', '', 'Active'),
(370, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', 'HITAM', '', '', '2015-10-02', '0000-00-00', '', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ACC/01/10/17', 'KINGSTON (16GB) ', '', '0', '', '', 'Active'),
(371, '35', 'external hardisk', 'NA9EP7XF', 'EXTERNAL HARDISK', '', '', '', '', '', '2018-04-16', '0000-00-00', '', 'NURHAJAR BINTI MOHD ISA', 'MICTH/ACC/04/04/10', 'SEAGATE SRD00F1', '', '0', '', '', 'Active'),
(372, '32', 'CPU', '4CE5530076', 'CPU', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/02/04', 'HP SLIMLINE 450-134D', '', '0', '', '', 'Active'),
(373, '32', 'CPU', '4CE5530076', 'CPU', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/02/05', 'HP SLIMLINE 450-134D', '', '0', '', '', 'Active'),
(374, '32', 'CPU', 'CNV6360ZXM', 'CPU', '', '1979', '', '', '', '2016-11-02', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/02/06', 'HP 15-AY021TX I5-6200U/4GB', '', '0', '', '', 'Active'),
(375, '32', 'CPU', 'SGH751RPS4', 'CPU', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ADMIN/01/02/29', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(376, '32', 'CPU', 'SGH751RPTB', 'CPU', '', '2850', '', '', '', '2018-04-04', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/02/35', 'HP PRODESK 400 G4 MICROTOWER PC', '', '0', '', '', 'Active'),
(377, '32', 'Keyboard', '697737-L31', 'KEYBOARD', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/03/11', 'HP', '', '0', '', '', 'Active'),
(378, '32', 'Keyboard', '697737-L31', 'KEYBOARD', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/03/12', 'HP', '', '0', '', '', 'Active'),
(379, '32', 'Keyboard', '801526-001', 'KEYBOARD', '', '', '', '', '', '2016-04-22', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/03/13', 'HP', '', '0', '', '', 'Active'),
(380, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ADMIN/01/03/35', 'HP', '', '0', '', '', 'Active'),
(381, '32', 'Keyboard', '', 'KEYBOARD', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/03/41', 'HP', '', '0', '', '', 'Active'),
(382, '32', 'LAPTOP', 'CND 4415KWM', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/05/16', 'HP', '', '0', '', '', 'Active'),
(383, '32', 'LAPTOP', '5CD 44700Q4', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/ADMIN/01/05/19', 'HP', '', '0', '', '', 'Active'),
(384, '32', 'MOUSE', '7CF4360C03', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'AZIMAH BINTI IBRAHIM', 'MICTH/ADMIN/01/05/19', 'HP', '', '0', '', '', 'Active'),
(385, '32', 'LAPTOP', '5CD 44700QF', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/05/20', 'HP', '', '0', '', '', 'Active'),
(386, '32', 'MOUSE', '7CF4360C06', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/05/20', 'HP', '', '0', '', '', 'Active'),
(387, '32', 'LAPTOP', '5CD 44700MP', 'LAPTOP', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/05/21', 'HP', '', '0', '', '', 'Active'),
(388, '32', 'MOUSE', '7CF4360C1V', 'MOUSE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/05/21', 'HP', '', '0', '', '', 'Active'),
(389, '32', 'LAPTOP', '1S81G200A6MJPF1NRWNG', 'LAPTOP', '', '2139', '', '', '', '2020-03-06', '0000-00-00', '', '', 'MICTH/ADMIN/01/05/61', 'LENOVO 330-141KB', '', '0', '', '', 'Active'),
(390, '32', 'LAPTOP', '1S81G200A6MJPF1NRYSX', 'LAPTOP', '', '2139', '', '', '', '2020-03-06', '0000-00-00', '', 'AHMAD SAFWAN BIN YUSOF', 'MICTH/ADMIN/01/05/62', 'LENOVO 330-141KB', '', '0', '', '', 'Active'),
(391, '32', 'LAPTOP', '1S81G200A5MJPF1NS9TZ', 'LAPTOP', '', '2139', '', '', '', '2020-03-06', '0000-00-00', '', '', 'MICTH/ADMIN/01/05/63', 'LENOVO 330-141KB', '', '0', '', '', 'Active'),
(392, '32', 'LAPTOP', '1S81G200A5MJPF1NS9CY', 'LAPTOP', '', '2139', '', '', '', '2020-03-06', '0000-00-00', '', 'MOHAMAD AMIN BIN NORDIN', 'MICTH/ADMIN/01/05/64', 'LENOVO 330-141KB', '', '0', '', '', 'Active'),
(393, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ADMIN/01/07/32', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(394, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/52', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(395, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/53', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(396, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/54', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(397, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/55', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(398, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/56', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(399, '32', 'lcd monitor', '', 'LCD MONITOR', '', '330', '', '', '', '2018-04-04', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/57', 'HP V194 18.5-INCH MONITOR', '', '0', '', '', 'Active'),
(400, '32', 'lcd monitor', '', 'LCD MONITOR', '', '', '', '', '', '2018-11-20', '0000-00-00', '', '', 'MICTH/ADMIN/01/07/58', 'HP', '', '0', '', '', 'Active'),
(401, '32', 'MOUSE', '697738-001', 'MOUSE', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/09/41', 'HP', '', '0', '', '', 'Active'),
(402, '32', 'MOUSE', '697738-001', 'MOUSE', '', '', '', '', '', '2016-04-22', '0000-00-00', '', '', 'MICTH/ADMIN/01/09/42', 'HP', '', '0', '', '', 'Active'),
(403, '32', 'MOUSE', '801527-001', 'MOUSE', '', '', '', '', '', '2016-11-02', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/09/43', 'HP', '', '0', '', '', 'Active'),
(404, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-18', '0000-00-00', '', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ADMIN/01/09/77', 'HP', '', '0', '', '', 'Active'),
(405, '32', 'MOUSE', '', 'MOUSE', '', '', '', '', '', '2018-04-04', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/09/83', 'HP', '', '0', '', '', 'Active'),
(406, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', 'KUNING', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/10/08', 'TOSHIBA 8GB ', '', '0', '', '', 'Active'),
(407, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/10/10', 'HP', '', '0', '', '', 'Active'),
(408, '32', 'PENDRIVE', '', 'PENDRIVE', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'UMMI LILIYANI BINTI MOKHRIS', 'MICTH/ADMIN/01/10/11', '-', '', '0', '', '', 'Active'),
(409, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/11/01', '-', '', '0', '', '', 'Active'),
(410, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', 'PUTIH', '', '', '2016-06-28', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/11/03', 'ACER', '', '0', '', '', 'Active'),
(411, '32', 'VGA CONNECTOR', '', 'VGA CONNECTOR', '', '', '', '', '', '2016-06-28', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/11/04', 'ACER', '', '0', '', '', 'Active'),
(412, '32', 'WIRELESS PRESENTATION POINTER', 'SN: 611108134601394', 'WIRELESS PRESENTATION POINTER', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/12/01', 'PROLINK', '', '0', '', '', 'Active'),
(413, '32', 'WIRELESS PACK (DONGLE)', 'YESXS0114557', 'WIRELESS PACK (DONGLE) ', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/13/03', '-', '', '0', '', '', 'Active'),
(414, '32', 'CCTV', '', 'CCTV', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/14/01', '-', '', '0', '', '', 'Active'),
(415, '32', 'CCTV', '', 'CCTV', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/14/02', '-', '', '0', '', '', 'Active'),
(416, '32', 'CCTV', '', 'CCTV', '', '', '', '', '', '2015-10-02', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/14/03', '-', '', '0', '', '', 'Active'),
(417, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/58	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(420, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/59	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(419, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/60	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(421, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/61	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(422, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/62	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(423, '33', 'KErusi', '', 'KERUSI ', '', '190', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/63	', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(424, '33', 'KErusi', '', 'DANG HIGHBACK CHAIR', '', '390', '', '', '', '2019-10-29', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/69	', 'CH-DNG-HB-A85-HLB1', '', '0', '', '', 'Active'),
(425, '33', 'KErusi', '', 'MESH LOWBACK CHAIR', '', '185', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/70	', '35P', '', '0', '', '', 'Active'),
(426, '33', 'KErusi', '', 'MESH LOWBACK CHAIR', '', '185', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/71	', '35P', '', '0', '', '', 'Active'),
(427, '33', 'KErusi', '', 'MESH LOWBACK CHAIR', '', '185', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/72	', '35P', '', '0', '', '', 'Active'),
(428, '33', 'KErusi', '', 'MESH LOWBACK CHAIR', '', '185', '', '', '', '2019-10-29', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/73	', '35P', '', '0', '', '', 'Active'),
(429, '33', 'KErusi', '', 'KERUSI ', '', '185', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/74	', 'MESH LOWBACK CHAIR', '', '0', '', '', 'Active'),
(430, '33', 'KErusi', '', 'KERUSI', '', '', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/75	', 'MESH LOWBACK CHAIR', '', '0', '', '', 'Active'),
(431, '33', 'KErusi', '', 'KERUSI ', '', '185', '', '', '', '2019-10-28', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/76	', 'MESH LOWBACK CHAIR', '', '0', '', '', 'Active'),
(432, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '190', 'WHITE', '', '', '2019-10-29', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/40	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(433, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '', 'WHITE', '', '', '2019-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/41	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(434, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '190', 'WHITE', '', '', '2018-11-30', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/02/03/42	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(435, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '190', 'WHITE', '', '', '2018-11-30', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/02/03/43	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(437, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '', 'WHITE', '', '', '2018-11-30', '0000-00-00', '', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/02/03/44	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(438, '33', 'meja DRAWER', '', 'MEJA DRAWER', '', '190', 'WHITE', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/45	', 'MOBILE PEDESTAL 3 DRAWER', '', '0', '', '', 'Active'),
(439, '33', 'side table', '', 'SIDE TABLE', '', '', '', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/04/01	', '-', '', '0', '', '', 'Active'),
(440, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '2450', 'LIGHT GREY ', '', '', '2018-11-30', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/01	', '4-BAY MOBILE COMPACTOR', '', '0', '', '', 'Active'),
(441, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '2450', 'LIGHT GREY ', '', '', '2018-11-20', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/02	', '4-BAY MOBILE COMPACTOR', '', '0', '', '', 'Active'),
(442, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2020-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/03	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(443, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2020-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/04	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(444, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2018-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/05	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(445, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2020-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/06	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(446, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2020-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/07	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(447, '33', 'CABINET FILE', '', 'CABINET FILE ', '', '840', '', '', '', '2020-08-07', '0000-00-00', '', '', 'MICTH/ADMIN/02/05/08	', 'CUSTOM MADE SWING DOOR HIGH CABINET C/W 6 SHELVES', '', '0', '', '', 'Active'),
(448, '32', 'external hardisk', '515DT1F2TLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/22', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(449, '32', 'external hardisk', '513HT17JTLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/23', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(450, '32', 'external hardisk', '5143TOIGTLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/24', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(451, '32', 'external hardisk', '514HTOMWTLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/25', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(452, '32', 'external hardisk', '513HT17GTLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/26', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(453, '32', 'external hardisk', '515DT1F4TLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/27', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(454, '32', 'external hardisk', '514HTOI2TLTH', 'EXTERNAL HARDISK', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/04/04/28', 'TOSHIBA CANVIO READY ', '', '0', '', '', 'Active'),
(455, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/03', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(456, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/04', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(457, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/05', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(458, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/06', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(459, '32', 'ACCESS DOOR CARD', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/07', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(460, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/08', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(461, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/09', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(462, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/10', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(463, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/11', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(464, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/12', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(465, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/13', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(466, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/14', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(467, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/15', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(468, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/16', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(469, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/17', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(470, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/18', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(471, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/19', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(472, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/20', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(473, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/21', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(474, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/22', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(475, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/23', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(476, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/24', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(477, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/25', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(478, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/26', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(479, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/27', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(481, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/28', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(482, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/29', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(483, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/30', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(484, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/31', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(485, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', '', '', '', '', '2021-11-18', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/32', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(486, '32', 'LAPTOP', '2LNZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-04-10', '0000-00-00', '3 TAHUN', 'DR NAZDIANA BINTI AB WAHAB', 'MICTH/ADMIN/01/05/65', 'INSPIRON 15 TGL 3000, 3511', '', '0', '', '', 'Active'),
(487, '32', 'MOUSE', '', 'DELL', '', '', '', '', '', '2021-04-10', '0000-00-00', '', 'DR NAZDIANA BINTI AB WAHAB', 'MICTH/ADMIN/01/09/73', 'MS3320W(MY)-BLACK', '', '0', '', '', 'Active'),
(488, '32', 'CPU', 'GKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-04-10', '0000-00-00', '3 TAHUN', 'ADMIN-POOL', 'MICTH/ADMIN/01/02/48', 'OPTIPLEX 5090 TOWER XCTO', '', '0', '', '', 'Active'),
(489, '32', 'lcd monitor', '', 'DELL', '', '', '', '', '', '2021-04-10', '0000-00-00', '3 TAHUN', 'ADMIN-POOL', 'MICTH/ADMIN/01/07/64', 'DELL 24 MONITOR-E2420H', '', '0', '', '', 'Active'),
(490, '32', 'MOUSE', '', 'DELL', '', '', '', '', '', '2021-04-10', '0000-00-00', '', 'ADMIN-POOL', 'MICTH/ADMIN/01/09/103', 'DELL USB OPTICAL MOUSE-MS116', '', '0', '', '', 'Active'),
(491, '32', 'Keyboard', '', 'DELL', '', '', '', '', '', '2022-06-17', '0000-00-00', '', 'ADMIN-POOL', 'MICTH/ADMIN/01/03/56', 'KEYBOARD DELL', '', '0', '', '', 'Active'),
(492, '37', 'kereta', 'MDK 2089', 'FORD RANGER', '27/5/2021', '136615.64', 'BLACK', '', '', '2022-06-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/06/03/04', '2.0L XLT + 4WD AT', '', '0', '', '', 'Active'),
(493, '32', 'LAPTOP', '5KNZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZIMAH BINTI IBRAHIM', 'MICTH/ADMIN/01/05/67', 'INSPIRON 15 TGL 3000, 3513', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(496, '32', 'LAPTOP', '11RZZG3', 'DELL', '13/8/2021', '', '', '', '', '2022-10-04', '0000-00-00', '3 TAHUN', 'NUR AMIRA BINTI AMRA', 'MICTH/ADMIN/01/05/68', 'INSPIRON 15 TGL 3000, 3514', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(495, '32', 'LAPTOP', 'HFKZZG3', 'DELL', '13/8/2021', '', '', '', '', '2022-10-04', '0000-00-00', '3 TAHUN', 'CHEMPAKA BINTI MOHD DIN', 'MICTH/ADMIN/01/05/70', 'INSPIRON 15 TGL 3000, 3516', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(497, '32', 'LAPTOP', 'FSNZZG3', 'DELL', '13/8/2021', '', '', '', '', '2022-10-04', '0000-00-00', '3 TAHUN', 'ZULLIANA BINTI MUHAMMAD', 'MICTH/ADMIN/01/05/72', 'INSPIRON 15 TGL 3000, 3518', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(498, '32', 'LAPTOP', 'CMSZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HOD BIN RABU', 'MICTH/ADMIN/01/05/73', 'INSPIRON 15 TGL 3000, 3519', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(499, '32', 'LAPTOP', 'BDKZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AHMAD SAFWAN BIN YUSOF', 'MICTH/ADMIN/01/05/75', 'INSPIRON 15 TGL 3000, 3521', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(500, '32', 'LAPTOP', 'HCKZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ADMIN/01/05/77', 'INSPIRON 15 TGL 3000, 3523', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(501, '32', 'LAPTOP', '33RZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'JURIANI BINTI JALANI', 'MICTH/ADMIN/01/05/78', 'INSPIRON 15 TGL 3000, 3524', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(502, '32', 'LAPTOP', 'DYQZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/ADMIN/01/05/79', 'INSPIRON 15 TGL 3000, 3525', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(503, '32', 'LAPTOP', 'C0RZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZLAN BIN ABDULLAH', 'MICTH/ADMIN/01/05/80', 'INSPIRON 15 TGL 3000, 3526', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(504, '32', 'LAPTOP', 'JRNZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHD JAILANI BIN DERAMAN', 'MICTH/ADMIN/01/05/82', 'INSPIRON 15 TGL 3000, 3528', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(505, '32', 'LAPTOP', '79600H3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR ZAYANAH BINTI HUSSIN', 'MICTH/ADMIN/01/05/83', 'INSPIRON 15 TGL 3000, 3529', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(506, '32', 'LAPTOP', '62KXZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL ATIQAH BINTI ABDULLAH', 'MICTH/ADMIN/01/05/84', 'INSPIRON 15 TGL 3000, 3530', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(507, '32', 'LAPTOP', 'GRNZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORDIANA BINTI MOHD LAZIM', 'MICTH/ADMIN/01/05/85', 'INSPIRON 15 TGL 3000, 3531', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(508, '32', 'LAPTOP', 'CWSZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR IYLIA HAMIZAH BINTI MOHD HAFIZ', 'MICTH/ADMIN/01/05/86', 'INSPIRON 15 TGL 3000, 3532', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(509, '32', 'LAPTOP', '10RZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR FITRIAH BINTI ABDULLAH', 'MICTH/ADMIN/01/05/87', 'INSPIRON 15 TGL 3000, 3533', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(510, '32', 'LAPTOP', '1WSZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/05/88', 'INSPIRON 15 TGL 3000, 3534', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(511, '32', 'LAPTOP', 'CQSZZG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ADMIN/01/05/90', 'INSPIRON 15 TGL 3000, 3536', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(512, '32', 'LAPTOP', '1H43GG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD ROSIDI BIN ROSLAN', 'MICTH/ADMIN/01/05/91', 'DELL LATITUDE 3420, CTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(513, '32', 'LAPTOP', 'HG43GG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD FIRDAUS BIN ABU', 'MICTH/ADMIN/01/05/92', 'DELL LATITUDE 3420, CTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(514, '32', 'LAPTOP', '2H43GG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RAZLIAH BINTI RAHMAT', 'MICTH/ADMIN/01/05/93', 'DELL LATITUDE 3420, CTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(515, '32', 'LAPTOP', 'JG43GG3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RAIHANA BINTI ABDULLAH', 'MICTH/ADMIN/01/05/94', 'DELL LATITUDE 3420, CTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(516, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MUHAMMAD FARID BIN ARIFFIN', 'MICTH/ADMIN/01/09/74', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(517, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZIMAH BINTI IBRAHIM', 'MICTH/ADMIN/01/09/75', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(518, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR AMIRA BINTI AMRA', 'MICTH/ADMIN/01/09/76', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(519, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'CHEMPAKA BINTI MOHD DIN', 'MICTH/ADMIN/01/09/78', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(520, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/09/79', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(521, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ZULLIANA BINTI MUHAMMAD', 'MICTH/ADMIN/01/09/80', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(522, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HOD BIN RABU', 'MICTH/ADMIN/01/09/81', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(523, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NORWAJUNIZAM BIN ABD WAHAB', 'MICTH/ADMIN/01/09/82', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(524, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MUHAMMAD FADHIL BIN ABD MANAP', 'MICTH/ADMIN/01/09/84', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(525, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'WAN MOHD NEEZAM BIN WAN NASIR', 'MICTH/ADMIN/01/09/85', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(526, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'JURIANI BINTI JALANI', 'MICTH/ADMIN/01/09/86', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(527, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZIZ BIN ABAS @ MOHAMED', 'MICTH/ADMIN/01/09/87', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(528, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AZLAN BIN ABDULLAH', 'MICTH/ADMIN/01/09/88', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(529, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ARZMEIN BIN SHAHARUDIN', 'MICTH/ADMIN/01/09/89', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(530, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHD JAILANI BIN DERAMAN', 'MICTH/ADMIN/01/09/90', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(531, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR ZAYANAH BINTI HUSSIN', 'MICTH/ADMIN/01/09/91', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(532, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL ATIQAH BINTI ABDULLAH', 'MICTH/ADMIN/01/09/92', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(533, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORDIANA BINTI MOHD LAZIM', 'MICTH/ADMIN/01/09/93', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(534, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR IYLIA HAMIZAH BINTI MOHD HAFIZ', 'MICTH/ADMIN/01/09/94', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(535, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR FITRIAH BINTI ABDULLAH', 'MICTH/ADMIN/01/09/95', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(536, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/09/96', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(537, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI NOR AMIEZA BINTI ZOHHANI', 'MICTH/ADMIN/01/09/98', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(538, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD ROSIDI BIN ROSLAN', 'MICTH/ADMIN/01/09/99', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(539, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD FIRDAUS BIN ABU', 'MICTH/ADMIN/01/09/100', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(540, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RAZLIAH BINTI RAHMAT', 'MICTH/ADMIN/01/09/101', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(541, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RAIHANA BINTI ABDULLAH', 'MICTH/ADMIN/01/09/102', 'MS3320W(MY)-BLACK', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(542, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AINUR HAWA BINTI SULAIMAN', 'MICTH/ADMIN/01/07/66', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(543, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/07/67', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(544, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOOR ASHIKIN BINTI SAID ALI', 'MICTH/ADMIN/01/07/69', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(545, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIDZUAN BIN MOHD LAZIM', 'MICTH/ADMIN/01/07/70', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(546, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AIDISHAM BIN ABD MANAP', 'MICTH/ADMIN/01/07/71', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(547, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/07/72', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(548, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AHMADEE BIN ABDULLAH', 'MICTH/ADMIN/01/07/73', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active');
INSERT INTO `tbl_daftar_aset` (`id`, `kategori_aset`, `jenis_aset`, `no_siri`, `nama_aset`, `tahun_beli`, `harga_beli`, `warna`, `lokasi`, `pemilik_aset`, `tarikh_daftar`, `tarikh_serahan`, `warranty`, `nama_kakitangan`, `no_aset`, `model`, `emel_pembekal`, `id_pembekal`, `pemilik_jabatan`, `lokasi_jabatan`, `status_aset`) VALUES
(549, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIZAWANI BINTI SAMBUTI', 'MICTH/ADMIN/01/07/74', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(550, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR FARHANA BINTI NOORDIN', 'MICTH/ADMIN/01/07/75', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(551, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL FARA NADIA BINTI ABDUL HALIM', 'MICTH/ADMIN/01/07/76', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(552, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI WAHIDA BINTI MD DESA', 'MICTH/ADMIN/01/07/77', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(553, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SENENG BIN MANTI', 'MICTH/ADMIN/01/07/78', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(554, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/ADMIN/01/07/79', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(555, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ZAINURRIAH BINTI MD NOR', 'MICTH/ADMIN/01/07/80', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(556, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HAMDAN BIN DZULKARNAIN', 'MICTH/ADMIN/01/07/81', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(557, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR EZATTY AS-SHUHADAH BINTI ROHAIZAD', 'MICTH/ADMIN/01/07/82', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(558, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORFAIEZAH BINTI IDRIS', 'MICTH/ADMIN/01/07/83', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(560, '32', 'CPU', '5LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AINUR HAWA BINTI SULAIMAN', 'MICTH/ADMIN/01/02/50', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(561, '32', 'CPU', '4LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/02/51', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(562, '32', 'CPU', '6KDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIDZUAN BIN MOHD LAZIM', 'MICTH/ADMIN/01/02/54', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(563, '32', 'CPU', '9KDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AIDISHAM BIN ABD MANAP', 'MICTH/ADMIN/01/02/55', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(564, '32', 'CPU', '7LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/02/56', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(565, '32', 'CPU', '7KDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AHMADEE BIN ABDULLAH', 'MICTH/ADMIN/01/02/57', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(566, '32', 'CPU', 'FKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIZAWANI BINTI SAMBUTI', 'MICTH/ADMIN/01/02/58', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(567, '32', 'CPU', '3LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR FARHANA BINTI NOORDIN', 'MICTH/ADMIN/01/02/59', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(568, '32', 'CPU', 'JKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL FARA NADIA BINTI ABDUL HALIM', 'MICTH/ADMIN/01/02/60', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(569, '32', 'CPU', '5KDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI WAHIDA BINTI MD DESA', 'MICTH/ADMIN/01/02/61', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(570, '32', 'CPU', 'CKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SENENG BIN MANTI', 'MICTH/ADMIN/01/02/62', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(571, '32', 'CPU', 'DKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/ADMIN/01/02/63', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(572, '32', 'CPU', '2LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ZAINURRIAH BINTI MD NOR', 'MICTH/ADMIN/01/02/64', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(573, '32', 'CPU', '8KDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HAMDAN BIN DZULKARNAIN', 'MICTH/ADMIN/01/02/65', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(574, '32', 'CPU', '8LDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR EZATTY AS-SHUHADAH BINTI ROHAIZAD', 'MICTH/ADMIN/01/02/66', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(575, '32', 'CPU', 'BKDH4G3', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORFAIEZAH BINTI IDRIS', 'MICTH/ADMIN/01/02/67', 'OPTIPLEX 5090 TOWER XCTO', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(576, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AINUR HAWA BINTI SULAIMAN', 'MICTH/ADMIN/01/09/105', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(577, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/09/106', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(578, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOOR ASHIKIN BINTI SAID ALI', 'MICTH/ADMIN/01/09/108', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(579, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIDZUAN BIN MOHD LAZIM', 'MICTH/ADMIN/01/09/109', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(580, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AIDISHAM BIN ABD MANAP', 'MICTH/ADMIN/01/09/110', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(581, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/09/111', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(582, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AHMADEE BIN ABDULLAH', 'MICTH/ADMIN/01/09/112', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(583, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIZAWANI BINTI SAMBUTI', 'MICTH/ADMIN/01/09/113', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(584, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR FARHANA BINTI NOORDIN', 'MICTH/ADMIN/01/09/114', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(585, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL FARA NADIA BINTI ABDUL HALIM', 'MICTH/ADMIN/01/09/115', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(586, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI WAHIDA BINTI MD DESA', 'MICTH/ADMIN/01/09/116', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(587, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SENENG BIN MANTI', 'MICTH/ADMIN/01/09/117', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(588, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/ADMIN/01/09/118', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(589, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ZAINURRIAH BINTI MD NOR', 'MICTH/ADMIN/01/09/119', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(590, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HAMDAN BIN DZULKARNAIN', 'MICTH/ADMIN/01/09/120', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(591, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR EZATTY AS-SHUHADAH BINTI ROHAIZAD', 'MICTH/ADMIN/01/09/121', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(592, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORFAIEZAH BINTI IDRIS', 'MICTH/ADMIN/01/09/122', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(593, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AINUR HAWA BINTI SULAIMAN', 'MICTH/ADMIN/01/03/58', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(594, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NORASIYAH BINTI ABD MAJID', 'MICTH/ADMIN/01/03/59', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(595, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOOR ASHIKIN BINTI SAID ALI', 'MICTH/ADMIN/01/03/61', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(596, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIDZUAN BIN MOHD LAZIM', 'MICTH/ADMIN/01/03/62', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(597, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AIDISHAM BIN ABD MANAP', 'MICTH/ADMIN/01/03/63', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(598, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ALWANI BINTI NAZIRI', 'MICTH/ADMIN/01/03/64', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(599, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'AHMADEE BIN ABDULLAH', 'MICTH/ADMIN/01/03/65', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(600, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'RIZAWANI BINTI SAMBUTI', 'MICTH/ADMIN/01/03/66', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(601, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NUR FARHANA BINTI NOORDIN', 'MICTH/ADMIN/01/03/67', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(602, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NURUL FARA NADIA BINTI ABDUL HALIM', 'MICTH/ADMIN/01/03/68', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(603, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SITI WAHIDA BINTI MD DESA', 'MICTH/ADMIN/01/03/69', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(604, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SENENG BIN MANTI', 'MICTH/ADMIN/01/03/70', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(605, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'SHARIFAH ATIQAH BINTI WAN IDRUS', 'MICTH/ADMIN/01/03/71', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(606, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'ZAINURRIAH BINTI MD NOR', 'MICTH/ADMIN/01/03/72', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(607, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'MOHAMAD HAMDAN BIN DZULKARNAIN', 'MICTH/ADMIN/01/03/73', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(608, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOR EZATTY AS-SHUHADAH BINTI ROHAIZAD', 'MICTH/ADMIN/01/03/74', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(609, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'NOORFAIEZAH BINTI IDRIS', 'MICTH/ADMIN/01/03/75', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(610, '32', 'lcd monitor', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'POOL', 'MICTH/ADMIN/01/07/68', 'DELL 24 MONITOR - E2420H', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(611, '32', 'MOUSE', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'POOL', 'MICTH/ADMIN/01/09/107', 'DELL USB OPTICAL MOUSE-MS116', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(612, '32', 'Keyboard', '', 'DELL', '13/8/2021', '', '', '', '', '2021-10-04', '0000-00-00', '3 TAHUN', 'POOL', 'MICTH/ADMIN/01/03/60', 'DELL WIRED KEYBOARD KB216 (BLACK)', 'info@orixrentec.com.my', '0', '', '', 'Active'),
(613, '32', 'LAPTOP', 'C3RZZG3', 'DELL', '', '', '', '', '', '2022-07-01', '2021-08-13', '', 'NUR AMALINA BINTI ABD RAHMAN', 'MICTH/ADMIN/01/05/71', 'INSPIRON 15 TGL 3000,3517', '', '0', '', '', 'Active'),
(614, '32', 'LAPTOP', '24RZZG3', 'DELL', '', '', '', '', '', '2022-07-01', '2021-08-13', '', 'MOHD HANIF BIN RUSLAI', 'MICTH/ADMIN/01/05/81', 'INSPIRON 15 TGL 3000,3517', '', '0', '', '', 'Active'),
(615, '32', 'LAPTOP', '4VSZZG3', 'DELL', '', '', '', '', '', '2022-07-01', '2021-08-13', '', 'NORWAJUNIZAM BIN ABD WAHAB', 'MICTH/ADMIN/01/05/74', 'INSPIRON 15 TGL 3000,3520', '', '0', '', '', 'Active'),
(616, '32', 'LAPTOP', '24900H3', 'DELL', '13/8/2021', '', '', '', '', '2022-07-01', '0000-00-00', '', 'NORAZLINA BINTI SHAFIE', 'MICTH/ADMIN/01/05/66', 'INSPIRON 15 TGL 3000,3512', '', '0', '', '', 'Active'),
(617, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/22', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(618, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/23', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(619, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '2021-11-19', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/24', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(620, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/24', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(621, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/25', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(622, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/26', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(623, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/26', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(624, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/27', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(625, '35', 'external hardisk', '', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '17/11/2021', '183', '', '', '', '1970-01-01', '0000-00-00', '3 YEARS', 'ADMIN', 'MICTH/ADMIN/04/04/28', 'TOSHIBA CANVIO READY 1TB (BLACK) 3YW', '', '0', '', '', 'Active'),
(626, '35', 'CAMERA DIGITAL', '438029001682', 'CAMERA CANON', '10/8/2022', 'RM 5,699.00', 'HITAM', '', '', '2022-08-11', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/05/02', 'EOS RP (BODY)', '', '0', '', '', 'Active'),
(627, '37', 'kereta', 'MDN 8177', 'TOYOTA  ALPHARD 2.5 SC', '27-07-2022', '328000', 'HITAM', '', '', '2022-08-04', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/06/03/05', 'TOYOTA', '', '0', '', '', 'Active'),
(628, '36', 'GELOMBANG KETUHAR MIKRO', '5D42150445', 'PANASONIC MICROWAVE OVEN', '10-08-2022', '459', 'HITAM ', '', '', '2022-08-11', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/05/05/02', 'NN-GT35HBMPQ', '', '0', '', '', 'Active'),
(629, '35', 'CAMERA DIGITAL', '', 'TR-650 TRIPOD RED BUFFALO', '10/8/2022', '100', '', '', '', '2022-08-30', '0000-00-00', '', '', 'MICTH/ADMIN/04/20/04', 'TR-650', '', '0', '', '', 'Active'),
(630, '32', 'TABLET', 'S/N: R52T908CLYV', 'SAMSUNG', '17/10/2022', '3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/13', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(631, '32', 'TABLET', 'S/N: R52T908CLOM', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/14', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(632, '32', 'TABLET', 'S/N: R52T908CK88', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/O1/08/15', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(633, '32', 'TABLET', 'S/N: R52T908CKJN', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/16', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(634, '32', 'TABLET', 'S/N: R52T908CM7Z', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/17', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(635, '32', 'TABLET', 'S/N: R52T908CKM9W', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/18', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(636, '32', 'TABLET', 'S/N: R52T908CGYT', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/19', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(637, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/01/03/76', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(638, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', 'RM 3,599.00', 'HITAM', '', '', '2022-10-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/01/03/77', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(639, '32', 'Keyboard', '', 'SAMSUNG', '', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/03/78', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(640, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/03/79', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(641, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/01/03/80', 'GALAXY TAB S8', '', '0', '', '', 'Active'),
(643, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/01/03/81', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(644, '32', 'Keyboard', '', 'SAMSUNG', '17/10/2022', '', 'HITAM', '', '', '2022-10-17', '0000-00-00', '', 'ADMIN', 'MICTH/ADMIN/01/03/82', 'KEYBORD TABLET GALAXY TAB S8', '', '0', '', '', 'Active'),
(646, '32', 'MOUSE', 'AS-2808', 'AQAS MOUSE', '11/11/2022', 'RM 16.10', 'HITAM', '', '', '2022-11-14', '0000-00-00', '', 'NAZDIANA BINTI AB. WAHAB', 'MICTH/ADMIN/01/09/123', 'WIRELESS MOUSE ', '', '0', '', '', 'Active'),
(647, '37', 'kereta', 'MDN 656', 'TOYOTA', '22/11/2022', 'RM 30,767.63', 'HITAM', '', '', '2022-11-28', '0000-00-00', '', 'NAZDIANA BINTI AB. WAHAB', 'MICTH/ADMIN/06/03/06', 'HARRIER 2.0 LUXURY', '', '0', '', '', 'Active'),
(648, '32', 'LAPTOP', 'NXAHASM001234E16F7600', 'ACER', '26/10/2022', 'RM 3,859.00', 'SILVER', '', '', '2022-10-26', '0000-00-00', '', 'NAZDIANA BINTI AB. WAHAB', 'MICTH/ADMIN/01/05/95', 'CHROMEBOOK SPIN 713 CP719-3W-503Z', '', '0', '', '', 'Active'),
(649, '32', 'TABLET', 'SN: 023598110351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/03', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(650, '32', 'TABLET', 'SN: 022786302151', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/04', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(651, '32', 'TABLET', 'SN: 023709710351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/08/05', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(652, '32', 'STAPLER BESAR', 'SN: 023699610351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/08/06', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(656, '32', 'TABLET', 'SN: 054117305351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/08/07', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(654, '32', 'TABLET', 'SN: 022723502151', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/08/09', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(655, '32', 'TABLET', 'SN: 054052505351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/04/08/10', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(658, '32', 'TABLET', 'SN: 018407102151', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/11', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(659, '32', 'TABLET', 'SN: 023730610351', 'MICROSOFT SURFACE GO 2', '9/4/2021', 'RM 2,705.00', 'SILVER', '', '', '1970-01-01', '0000-00-00', '1 TAHUN', 'ADMIN', 'MICTH/ADMIN/01/08/12', 'TABLET MICROSOFT SURFACE GO 2', '', '0', '', '', 'Active'),
(660, '32', 'CCTV', '010345', 'asma', '20200', '18888', 'hijau', '', '', '2024-01-30', '0000-00-00', '1 tahun', 'asma123', '', 'hp', '', '0', '12', '14', 'Active'),
(661, '33', 'KErusi', '', 'KERUSI', '30/1/2023', 'RM 199.00', 'HITAM', '', '', '2023-02-06', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/77', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(662, '33', 'KErusi', '', 'KERUSI', '30/1/2023', 'RM 199.00', 'HITAM', '', '', '2023-02-06', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/78', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(663, '33', 'KErusi', '', 'KERUSI', '30/1/2023', 'RM 199.00', 'HITAM', '', '', '2023-02-06', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/79', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(664, '33', 'MEJA BANQUET', '', 'MEJA BANQUET', '30/1/2023', 'RM 190.00', '', '', '', '2023-02-06', '0000-00-00', '', '', 'MICTH/ADMIN/02/01/12', 'MEJA', '', '0', '', '', 'Active'),
(667, '33', 'KERUSI PLASTIK', '', 'KERUSI', '', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/01', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(666, '32', 'KErusi', '', 'KERUSI', '16/3/2023', 'RM 199.00', 'HITAM', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/02/80', 'MESH LOWBACK CHAIR-BLACK', '', '0', '', '', 'Active'),
(668, '33', 'KERUSI PLASTIK', '', 'KERUSI', '', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/02', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(669, '33', 'KERUSI PLASTIK', '', 'KERUSI', '', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/03', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(670, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/04', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(671, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/05', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(672, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/06', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(673, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/07', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(675, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/08', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(676, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/09', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(677, '33', 'KERUSI PLASTIK', '', 'KERUSI', '16/3/2023', 'RM 19.00', '', '', '', '2023-03-22', '0000-00-00', '', '', 'MICTH/ADMIN/02/03/10', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(678, '32', 'LAPTOP', 'NXKDDESM001242116A23400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/96', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(679, '32', 'LAPTOP', 'NXKDDESM0012421180D3400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/97', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(680, '32', 'LAPTOP', 'NXKDDESM00124303204E3400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', 'nORSYAHIRAH BINTI AHMAD SAUFFI', 'MICTH/ADMIN/01/05/98', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(681, '32', 'LAPTOP', 'NXKDDESM001243032263400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/99', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(682, '32', 'LAPTOP', 'NXKDDESM0012430329F3400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/100', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(683, '32', 'LAPTOP', 'NXKDDESM001243033153400', 'LAPTOP ACER', '9/2/2023', 'RM  2,950.00', '', '', '', '2023-02-15', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/101', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(684, '32', 'LAPTOP', 'NXKDDESM001243028483400', 'LAPTOP ACER', '13/3/2023', 'RM  2,950.00', '', '', '', '2023-03-27', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/105', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(686, '32', 'LAPTOP', 'NXKDDESM001243042843400', 'LAPTOP ACER', '13/3/2023', 'RM  2,950.00', '', '', '', '2023-03-27', '0000-00-00', '3 TAHUN (RM 250.00)', 'MUHAMMAD AMIR LUQMAN BIN MOHAMAD SUJANA', 'MICTH/ADMIN/01/05/102', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(688, '32', 'LAPTOP', 'NXKDDESM001243042843400', 'LAPTOP ACER', '13/3/2023', 'RM  2,950.00', '', '', '', '2023-03-27', '0000-00-00', '3 TAHUN (RM 250.00)', 'SHAHROL NIZAM BIN MASRAN', 'MICTH/ADMIN/01/05/104', 'ASPIRE A315X-24PR6GK-SIL', '', '0', '', '', 'Active'),
(689, '32', 'LAPTOP', '', 'LAPTOP ACER', '13/3/2023', 'RM  2,950.00', '', '', '', '2023-11-10', '0000-00-00', '3 TAHUN (RM 250.00)', '', 'MICTH/ADMIN/01/05/103', 'KERUSI PLASTIK', '', '0', '', '', 'Active'),
(690, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/01', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(691, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/02', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(692, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/03', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(693, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/04', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(694, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/05', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(695, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/06', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(696, '32', 'ADAPTER USB TYPE C', '', 'SAMSUNG ADAPTER', '26/3/2023', 'RM 39.90', '', '', '', '2023-03-28', '0000-00-00', '', 'UNTUK KEGUNAAN LEMBAGA PENGARAH', 'MICTH/ADMIN/01/14/07', 'SAMSUNG 25W', '', '0', '', '', 'Active'),
(697, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', 'RM ', '', '', '', '2023-03-28', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/33', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(699, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', 'RM 38.00', '', '', '', '2023-04-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/34', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(700, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', 'RM 38.00', '', '', '', '2023-04-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/35', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(701, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', 'RM 38.00', '', '', '', '2023-04-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/36', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(702, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '', 'RM 38.00', '', '', '', '2023-04-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/37', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(703, '32', 'LAPTOP', '', 'HP ', '15/6/2023', 'RM 5,439.00', '', '', '', '2023-06-16', '0000-00-00', '2 TAHUN', 'LAPTOP POOL', 'MICTH/ADMIN/01/05/106', 'HP PAVILION 14-EH0003TX', '', '0', '', '', 'Active'),
(704, '36', 'toaster', '', 'RUSSEL TAYLORS RETRO TOASTER', '22/5/2023', 'RM 98.20', 'CREAM', '', '', '2023-05-25', '0000-00-00', '', 'PANTRI PEJABAT', 'MICTH/ADMIN/05/17/01', 'TOASTER', '', '0', '', '', 'Active'),
(705, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '31/5/2023', 'RM 38.00', '', '', '', '2023-06-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/38', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(706, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '31/5/2023', 'RM 38.00', '', '', '', '2023-06-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/39', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(707, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '31/5/2023', 'RM 38.00', '', '', '', '2023-06-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/40', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(708, '32', 'TYPE C- ETHERNET ADAPTER', '', 'ETHERNET ADAPTER', '31/5/2023', 'RM 38.00', '', '', '', '2023-06-03', '0000-00-00', '', '', 'MICTH/ADMIN/01/13/41', 'TYPE C MULTI-FUNCTION LAN ADAPTER 3 PORT', '', '0', '', '', 'Active'),
(709, '36', 'TV', '', 'SAMSUNG FLIP TV', '9/8/2023', 'RM 10,775.00', '', '', '', '2023-08-14', '0000-00-00', '', 'BILIK MESYUARAT MICTH', 'MICTH/ADMIN/05/06/02', 'SAMSUNG FLIP TV PRO', '', '0', '', '', 'Active'),
(711, '37', 'kereta', 'MDJ 200', 'PROTON X70 2WD', '28/8/2023', 'RM 94,681.00', 'PUTIH', '', '', '2023-08-30', '0000-00-00', '', '', 'MICTH/ADMIN/06/03/07', '1.5 TGDI STANDART 2WD', '', '0', '', '', 'Active'),
(712, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/01', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(713, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/02', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(714, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/03', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(715, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/04', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(716, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/05', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(717, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/06', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(718, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/07', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(719, '35', 'BROCHURE RACK', '', 'BROCHURE RACKS', '27/9/2023', 'RM 175.00', 'HITAM', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/24/08', 'RAK BROCHURE', '', '0', '', '', 'Active'),
(720, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', '', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/01', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(721, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/02', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(722, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/03', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(723, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/04', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(724, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/05', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(725, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/06', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(726, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/07', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(727, '35', 'ARCYLIC STAND', '', 'ARCYLIC STAND', '27/9/2023', 'RM 15.00', 'PUTIH', '', '', '2023-10-09', '0000-00-00', '', '', 'MICTH/ADMIN/04/25/08', 'ARCYLIC STAND', '', '0', '', '', 'Active'),
(728, '37', 'kereta', 'MDT 1578', 'PROTON X70 2WD', '25/10/2023', 'RM  130,873.70', 'HITAM', '', '', '2023-10-30', '0000-00-00', '', '', 'MICTH/ADMIN/06/03/08', '1.5 TGDI STANDART 2WD', '', '0', '', '', 'Active'),
(729, '37', 'kereta', 'MDT 1475', 'ISUZU DMAX 4WD', '24/10/2023', 'RM 133,307.30', 'HITAM', '', '', '2023-10-30', '0000-00-00', '', '', 'MICTH/ADMIN/06/03/09', 'PREMIUM 1.9L 4WD', '', '0', NULL, '', 'Active'),
(741, '42', 'CPU', '6531', 'wedudss', '2023', '5000', 'hijau', '', '', '2024-01-30', '0000-00-00', '9 tahun', 'kimi123', '53134', 'hp wedud', '', '656', '1', '14', 'Active'),
(740, '42', 'CCTV', '12345678', 'wedud', '2023', '1000', 'putih', '', '', '2024-01-30', '0000-00-00', '1 tahun', 'kimi', '2024-01-30', 'wedud hp', '', '656', '12', '12', 'Active'),
(743, '37', 'kereta', 'WWW 1', 'Saga FLX', '2024', 'RM 150000.00', 'Putih', '', '', '2024-03-12', '0000-00-00', '', 'Shahrol Nizam Bin Masran', 'MICTH/ADMIN/00/33/55', 'Proton', '', '656', '4', '6', 'Active'),
(748, '', 'MOUSE', 'ABCD12345', 'MOUSE OFFICE', '2024', 'RM30', 'BLACK', '', '', '2024-03-27', '0000-00-00', '1 YEAR', 'Digital & Information Technology', 'MICTH/ADMIN/00/00/0000', 'HP', '', '49', '6', 'Digital & Information Technology', 'Active'),
(749, '', 'lcd monitor', 'ABCXE1234', '23 FHD MONITOR', '2024', 'RM 300.00', 'BLACK', '', '', '2024-03-27', '2024-03-27', '6 MONTHS', '', 'MICTH/ADMIN/00/00/00', 'HP', '', '51', '6', 'Digital & Information Technology', 'Active'),
(750, '', 'LAPTOP', 'ABEX1209', 'HP', '2024', 'RM 2500.00', 'SILVER', '', '', '2024-03-27', '2024-03-27', '1 YEAR', '', 'MICTH/ADMIN/00/00/0000', 'HP PAVILION', '', '656', '6', 'Digital & Information Technology', 'Active'),
(751, '', 'DISPENSER MACHINE', 'COWAY1234', 'WATER PURIFIER', '2024', 'RM 4000.00', 'WHITE', '', '', '2024-03-27', '2024-03-27', '', 'Account & Finance', 'MICTH/ADMIN/00/00/0000', 'COWAY', '', '51', '6', 'Account & Finance', 'Active'),
(752, '', 'MOTOSIKAL', 'WWW 1', 'SUPERBIKE', '2024', 'RM 400,000', 'RED', '', '', '2024-03-27', '2024-03-27', '', '3013', 'MICTH/ADMIN/00/00/00', 'DUCATTI', '', '51', '6', 'Account & Finance', 'Active'),
(753, '', 'Handphone', 'IMEI1234', 'IPHONE 15 PRO MAX PLUS', '2024', 'RM 10000.00', 'GRAPHITE', '', '', '2024-03-28', '2024-03-28', '3 YEARS', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/00/00/00', 'APPLE', '', '49', '6', 'Account & Finance', 'Active'),
(754, '', 'PENDRIVE', 'KGDATA', 'DATATRAVELER SWIRL 3.0 8GB', '2024', 'RM 40.00', 'MAROON', '', '', '2024-03-28', '2024-03-28', '1 MONTH', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/00/00/00', 'KINGSTON', '', '49', '6', '', 'Active'),
(755, '', 'PENDRIVE', 'KGDATA', 'DATATRAVELER SWIRL 3.0 8GB', '2024', 'RM 40.00', 'MAROON', '', '', '2024-03-28', '2024-03-28', '1 MONTH', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/00/00/00', 'KINGSTON', '', '51', '6', '3', 'Active'),
(756, '32', 'lcd monitor', 'HP1234', 'HP GAMING V3', '2024', 'RM 150.00', 'GREEN BLACK', '', '', '2024-03-28', '2024-03-28', '1 YEAR', 'Mohamad Hamdan Bin Dzulkarnain', 'MICTH/ADMIN/00/12/08', 'HP', '', '49', '6', '6', 'Inactive'),
(757, '33', 'MEJA', '', 'GAMING TABLE V5', '2024', '5,000.00', 'BLACK', '', '', '2024-03-29', '2024-03-29', '', 'Mohamad Firdaus Bin Abu', 'MICTH/ADMIN/00/00/01', 'IKEA', '', '51', '6', '4', 'Active'),
(758, '32', 'LAPTOP', 'HP1234', 'HP GAMING', '2024', 'RM 150.00', 'GREEN BLACK', '', '', '2024-03-28', '2024-03-28', '1 YEAR', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/00/00/02', 'HP', '', '49', '6', '3', 'Inactive'),
(759, '34', 'DISPENSER MACHINE', 'COWAY0912', 'COWAY Home Ice', '2024', 'RM 4300.00', 'White', '', '', '2024-04-02', '2024-04-02', '', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/03/00/99', 'COWAY NEO PLUS', '', '656', '3', '3', 'Active'),
(760, '35', 'CAMERA DIGITAL', 'CANONMVX450', 'CANON', '2022', 'RM 3000.00', 'Black', '', '', '2024-04-02', '2024-04-02', '2 Year', 'Siti Wahida Binti Md Desa', 'MICTH/ADMIN/00/04/01', 'DSLR 4000G', '', '48', '6', '5', 'Active'),
(761, '36', 'PETI SEJUK', 'HIS560A', 'Hisense', '2024', 'RM 7000.00', 'Silver Gold', '', '', '2024-04-02', '2024-04-02', '1 Year', 'Ahmadee Bin Abdullah', 'MICTH/ACC/00/00/00', 'HISENSE A5', '', '656', '3', '3', 'Active'),
(762, '32', 'PENDRIVE', 'KGDATA', 'DATATRAVELER SWIRL 3.0 8GB', '2024', 'RM 90.00', 'WHITE', '', '', '2024-04-22', '2024-04-22', '6 MONTHS', 'Nor Fitriah Binti Abdullah', 'MICTH/ADMIN/00/00/00', 'KINGSTON', '', '656', '5', '8', 'Inactive'),
(763, '37', 'kereta', 'G9', 'M3 GTR A', '2022', '1,250,000.00', 'BLACK', '', '', '2024-04-29', '2024-04-29', '', 'Farah Nur Azreen Fatehah Binti Azme', 'MICTH/ADMIN/00/00/81', 'BMW', '', '49', '6', '8', 'Inactive'),
(764, '32', 'LAPTOP', 'ABC123', 'IDEAPAD', '2023', '800,000.00', 'BLACK', '', '', '2024-05-10', '2024-05-10', '1 YEAR', 'Ahmadee Bin Abdullah', 'MICTH/ADMIN/01/05/05', 'LENOVO', '', '49', '6', '3', 'Active'),
(765, '32', 'LAPTOP', 'ACER12345', 'SWIFT 3', '2024', '2,500.00', 'SILVER', '', '', '2024-03-14', '2024-04-04', '1 YEAR', 'Norsyahira Binti Ahmad Sauffi', 'MICTH/ADMIN/00/01/19', 'ACER', '', '48', '6', '8', 'Active'),
(766, '33', 'MEJA', '', 'RGE', '2024', '10,000.00', 'BLACK', '', '', '2024-06-14', '2024-06-14', '', 'Ahmadee Bin Abdullah', '123456', 'IKEA', '', '49', '6', '3', 'Inactive'),
(767, '33', 'MEJA', '', 'RGE', '2024', '12,345.00', 'BLACK', '', '', '2024-06-14', '2024-06-14', '', 'Ahmadee Bin Abdullah', '123', 'IKEA', '', '51', '6', '3', 'Active'),
(768, '33', 'PASU BUNGA', '', 'PASU', '2024', '30.00', 'BROWN', '', '', '2024-06-14', '2024-06-14', '', 'Abdallah Wedud Bin Hisamudin', '345', 'BRIN', '', '656', '6', '8', 'Active'),
(769, '34', 'SAFETY BOX', 'V123', 'SAFETY', '2024', '50,000.00', 'SILVER', '', '', '2024-06-14', '2024-06-14', '', 'Dr Nazdiana Binti Ab.Wahab', 'BOX', 'B123', '', '48', '1', '1', 'Active'),
(770, '35', 'tangga', 'A1234', 'DETS', '2023', '1,234.56', 'SILVER', '', '', '2024-06-14', '2024-06-14', '3 YEARS', 'Mohd Jailani Bin Deraman', 'T1234', 'ART', '', '48', '2', '2', 'Active'),
(771, '32', '-', '12345', 'iphone', '1 tahun', '10.00', 'hitam', '', '', '2024-06-14', '2024-06-14', '1 tahun', 'Dr Nazdiana Binti Ab.Wahab', '543', 'apple', '', '49', '-', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembekal`
--

CREATE TABLE `tbl_pembekal` (
  `id_pembekal` int(50) NOT NULL,
  `emel_pembekal` varchar(100) NOT NULL,
  `nama_pembekal` varchar(100) NOT NULL,
  `alamat_pembekal` varchar(200) NOT NULL,
  `notel_pembekal` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pembekal`
--

INSERT INTO `tbl_pembekal` (`id_pembekal`, `emel_pembekal`, `nama_pembekal`, `alamat_pembekal`, `notel_pembekal`) VALUES
(48, 'SafieEnterprise@gmail.com', 'Safie bin Sazali', 'Safie Enterprise Sdn Bhd, Jalan Merdeka Batu Berendam', '0126788765'),
(49, 'hamiduntoolbox@gmail.com', 'Hamidun bin Hamid', 'Hamidun Toolbox Sdn Bhd, Melaka Raya', '0196788765'),
(51, 'ahmad_hardware@gmail.com', 'Ahmad bin Abu', '', '0134567345'),
(656, 'info@orixrentec.com.my', 'ORIX RENTEC (MALAYSIA) SDN BHD', 'SUITE 19-1, LEVEL 19, VERTICAL CORPORATE TOWER B, AVENUE 10, THE VERTICAL, BANGSAR SOUTH CITY, NO. 8, JALAN KERINCHI, 59200 KUALA LUMPUR, MALAYSIA', '0326327000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposal_aset`
--
ALTER TABLE `disposal_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposal_reason`
--
ALTER TABLE `disposal_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategoritps`
--
ALTER TABLE `kategoritps`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_aset`
--
ALTER TABLE `log_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_aset`
--
ALTER TABLE `req_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_reason`
--
ALTER TABLE `req_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daftar_aset`
--
ALTER TABLE `tbl_daftar_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembekal`
--
ALTER TABLE `tbl_pembekal`
  ADD PRIMARY KEY (`id_pembekal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposal_aset`
--
ALTER TABLE `disposal_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `disposal_reason`
--
ALTER TABLE `disposal_reason`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `kategoritps`
--
ALTER TABLE `kategoritps`
  MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `log_aset`
--
ALTER TABLE `log_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `req_aset`
--
ALTER TABLE `req_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `req_reason`
--
ALTER TABLE `req_reason`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_daftar_aset`
--
ALTER TABLE `tbl_daftar_aset`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;

--
-- AUTO_INCREMENT for table `tbl_pembekal`
--
ALTER TABLE `tbl_pembekal`
  MODIFY `id_pembekal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=792;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
