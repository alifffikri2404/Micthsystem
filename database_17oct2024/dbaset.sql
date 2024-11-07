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
-- Database: `dbaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_management_vba`
--

CREATE TABLE `asset_management_vba` (
  `Category` varchar(250) NOT NULL,
  `Category_ID` int(50) NOT NULL,
  `Sub_Category` varchar(250) NOT NULL,
  `Sub_Category_ID` varchar(255) NOT NULL,
  `Model` varchar(250) NOT NULL,
  `Model_ID` varchar(250) NOT NULL,
  `Running_No` varchar(250) NOT NULL,
  `Full_ID (Concatenated ID)` varchar(250) NOT NULL,
  `Barcode` varchar(250) NOT NULL,
  `SERIAL_NO` varchar(250) NOT NULL,
  `DATE_OF_PURCHASE` varchar(255) NOT NULL,
  `SUPPLIER` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_management_vba`
--

INSERT INTO `asset_management_vba` (`Category`, `Category_ID`, `Sub_Category`, `Sub_Category_ID`, `Model`, `Model_ID`, `Running_No`, `Full_ID (Concatenated ID)`, `Barcode`, `SERIAL_NO`, `DATE_OF_PURCHASE`, `SUPPLIER`, `status`) VALUES
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '001', 'MICTH/Asset/01/01/01/001', '(MICTH/Asset/01/01/01/001)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '002', 'MICTH/Asset/01/01/01/002', '(MICTH/Asset/01/01/01/002)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '003', 'MICTH/Asset/01/01/01/003', '(MICTH/Asset/01/01/01/003)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '004', 'MICTH/Asset/01/01/01/004', '(MICTH/Asset/01/01/01/004)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '005', 'MICTH/Asset/01/01/01/005', '(MICTH/Asset/01/01/01/005)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '006', 'MICTH/Asset/01/01/01/006', '(MICTH/Asset/01/01/01/006)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '007', 'MICTH/Asset/01/01/01/007', '(MICTH/Asset/01/01/01/007)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '008', 'MICTH/Asset/01/01/01/008', '(MICTH/Asset/01/01/01/008)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '009', 'MICTH/Asset/01/01/01/009', '(MICTH/Asset/01/01/01/009)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '010', 'MICTH/Asset/01/01/01/010', '(MICTH/Asset/01/01/01/010)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '011', 'MICTH/Asset/01/01/01/011', '(MICTH/Asset/01/01/01/011)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '012', 'MICTH/Asset/01/01/01/012', '(MICTH/Asset/01/01/01/012)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '013', 'MICTH/Asset/01/01/01/013', '(MICTH/Asset/01/01/01/013)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '014', 'MICTH/Asset/01/01/01/014', '(MICTH/Asset/01/01/01/014)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '015', 'MICTH/Asset/01/01/01/015', '(MICTH/Asset/01/01/01/015)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '016', 'MICTH/Asset/01/01/01/016', '(MICTH/Asset/01/01/01/016)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '017', 'MICTH/Asset/01/01/01/017', '(MICTH/Asset/01/01/01/017)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '018', 'MICTH/Asset/01/01/01/018', '(MICTH/Asset/01/01/01/018)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '019', 'MICTH/Asset/01/01/01/019', '(MICTH/Asset/01/01/01/019)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '020', 'MICTH/Asset/01/01/01/020', '(MICTH/Asset/01/01/01/020)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '021', 'MICTH/Asset/01/01/01/021', '(MICTH/Asset/01/01/01/021)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '022', 'MICTH/Asset/01/01/01/022', '(MICTH/Asset/01/01/01/022)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '023', 'MICTH/Asset/01/01/01/023', '(MICTH/Asset/01/01/01/023)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '024', 'MICTH/Asset/01/01/01/024', '(MICTH/Asset/01/01/01/024)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '025', 'MICTH/Asset/01/01/01/025', '(MICTH/Asset/01/01/01/025)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '026', 'MICTH/Asset/01/01/01/026', '(MICTH/Asset/01/01/01/026)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '027', 'MICTH/Asset/01/01/01/027', '(MICTH/Asset/01/01/01/027)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '028', 'MICTH/Asset/01/01/01/028', '(MICTH/Asset/01/01/01/028)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '029', 'MICTH/Asset/01/01/01/029', '(MICTH/Asset/01/01/01/029)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '030', 'MICTH/Asset/01/01/01/030', '(MICTH/Asset/01/01/01/030)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '031', 'MICTH/Asset/01/01/01/031', '(MICTH/Asset/01/01/01/031)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '032', 'MICTH/Asset/01/01/01/032', '(MICTH/Asset/01/01/01/032)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '033', 'MICTH/Asset/01/01/01/033', '(MICTH/Asset/01/01/01/033)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '034', 'MICTH/Asset/01/01/01/034', '(MICTH/Asset/01/01/01/034)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '035', 'MICTH/Asset/01/01/01/035', '(MICTH/Asset/01/01/01/035)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '036', 'MICTH/Asset/01/01/01/036', '(MICTH/Asset/01/01/01/036)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '037', 'MICTH/Asset/01/01/01/037', '(MICTH/Asset/01/01/01/037)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '038', 'MICTH/Asset/01/01/01/038', '(MICTH/Asset/01/01/01/038)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '039', 'MICTH/Asset/01/01/01/039', '(MICTH/Asset/01/01/01/039)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '040', 'MICTH/Asset/01/01/01/040', '(MICTH/Asset/01/01/01/040)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '041', 'MICTH/Asset/01/01/01/041', '(MICTH/Asset/01/01/01/041)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '042', 'MICTH/Asset/01/01/01/042', '(MICTH/Asset/01/01/01/042)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '043', 'MICTH/Asset/01/01/01/043', '(MICTH/Asset/01/01/01/043)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '044', 'MICTH/Asset/01/01/01/044', '(MICTH/Asset/01/01/01/044)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '045', 'MICTH/Asset/01/01/01/045', '(MICTH/Asset/01/01/01/045)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '046', 'MICTH/Asset/01/01/01/046', '(MICTH/Asset/01/01/01/046)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '047', 'MICTH/Asset/01/01/01/047', '(MICTH/Asset/01/01/01/047)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '048', 'MICTH/Asset/01/01/01/048', '(MICTH/Asset/01/01/01/048)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '049', 'MICTH/Asset/01/01/01/049', '(MICTH/Asset/01/01/01/049)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '050', 'MICTH/Asset/01/01/01/050', '(MICTH/Asset/01/01/01/050)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '051', 'MICTH/Asset/01/01/01/051', '(MICTH/Asset/01/01/01/051)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '052', 'MICTH/Asset/01/01/01/052', '(MICTH/Asset/01/01/01/052)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '053', 'MICTH/Asset/01/01/01/053', '(MICTH/Asset/01/01/01/053)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '054', 'MICTH/Asset/01/01/01/054', '(MICTH/Asset/01/01/01/054)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '055', 'MICTH/Asset/01/01/01/055', '(MICTH/Asset/01/01/01/055)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '056', 'MICTH/Asset/01/01/01/056', '(MICTH/Asset/01/01/01/056)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '057', 'MICTH/Asset/01/01/01/057', '(MICTH/Asset/01/01/01/057)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '058', 'MICTH/Asset/01/01/01/058', '(MICTH/Asset/01/01/01/058)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '059', 'MICTH/Asset/01/01/01/059', '(MICTH/Asset/01/01/01/059)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '060', 'MICTH/Asset/01/01/01/060', '(MICTH/Asset/01/01/01/060)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '061', 'MICTH/Asset/01/01/01/061', '(MICTH/Asset/01/01/01/061)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '062', 'MICTH/Asset/01/01/01/062', '(MICTH/Asset/01/01/01/062)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '063', 'MICTH/Asset/01/01/01/063', '(MICTH/Asset/01/01/01/063)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '064', 'MICTH/Asset/01/01/01/064', '(MICTH/Asset/01/01/01/064)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '065', 'MICTH/Asset/01/01/01/065', '(MICTH/Asset/01/01/01/065)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '066', 'MICTH/Asset/01/01/01/066', '(MICTH/Asset/01/01/01/066)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '067', 'MICTH/Asset/01/01/01/067', '(MICTH/Asset/01/01/01/067)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '068', 'MICTH/Asset/01/01/01/068', '(MICTH/Asset/01/01/01/068)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '069', 'MICTH/Asset/01/01/01/069', '(MICTH/Asset/01/01/01/069)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '070', 'MICTH/Asset/01/01/01/070', '(MICTH/Asset/01/01/01/070)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '071', 'MICTH/Asset/01/01/01/071', '(MICTH/Asset/01/01/01/071)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '072', 'MICTH/Asset/01/01/01/072', '(MICTH/Asset/01/01/01/072)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '073', 'MICTH/Asset/01/01/01/073', '(MICTH/Asset/01/01/01/073)', '', '', '', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '074', 'MICTH/Asset/01/01/01/074', '(MICTH/Asset/01/01/01/074)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '001', 'MICTH/Asset/01/02/01/001', '(MICTH/Asset/01/02/01/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '002', 'MICTH/Asset/01/02/01/002', '(MICTH/Asset/01/02/01/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '003', 'MICTH/Asset/01/02/01/003', '(MICTH/Asset/01/02/01/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '004', 'MICTH/Asset/01/02/01/004', '(MICTH/Asset/01/02/01/004)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '005', 'MICTH/Asset/01/02/01/005', '(MICTH/Asset/01/02/01/005)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '006', 'MICTH/Asset/01/02/01/006', '(MICTH/Asset/01/02/01/006)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '007', 'MICTH/Asset/01/02/01/007', '(MICTH/Asset/01/02/01/007)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '008', 'MICTH/Asset/01/02/01/008', '(MICTH/Asset/01/02/01/008)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '009', 'MICTH/Asset/01/02/01/009', '(MICTH/Asset/01/02/01/009)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '010', 'MICTH/Asset/01/02/01/010', '(MICTH/Asset/01/02/01/010)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '011', 'MICTH/Asset/01/02/01/011', '(MICTH/Asset/01/02/01/011)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '012', 'MICTH/Asset/01/02/01/012', '(MICTH/Asset/01/02/01/012)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '013', 'MICTH/Asset/01/02/01/013', '(MICTH/Asset/01/02/01/013)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '014', 'MICTH/Asset/01/02/01/014', '(MICTH/Asset/01/02/01/014)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '015', 'MICTH/Asset/01/02/01/015', '(MICTH/Asset/01/02/01/015)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '016', 'MICTH/Asset/01/02/01/016', '(MICTH/Asset/01/02/01/016)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '017', 'MICTH/Asset/01/02/01/017', '(MICTH/Asset/01/02/01/017)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '018', 'MICTH/Asset/01/02/01/018', '(MICTH/Asset/01/02/01/018)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '019', 'MICTH/Asset/01/02/01/019', '(MICTH/Asset/01/02/01/019)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '020', 'MICTH/Asset/01/02/01/020', '(MICTH/Asset/01/02/01/020)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '021', 'MICTH/Asset/01/02/01/021', '(MICTH/Asset/01/02/01/021)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '022', 'MICTH/Asset/01/02/01/022', '(MICTH/Asset/01/02/01/022)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '023', 'MICTH/Asset/01/02/01/023', '(MICTH/Asset/01/02/01/023)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '024', 'MICTH/Asset/01/02/01/024', '(MICTH/Asset/01/02/01/024)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '025', 'MICTH/Asset/01/02/01/025', '(MICTH/Asset/01/02/01/025)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '026', 'MICTH/Asset/01/02/01/026', '(MICTH/Asset/01/02/01/026)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '027', 'MICTH/Asset/01/02/01/027', '(MICTH/Asset/01/02/01/027)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '028', 'MICTH/Asset/01/02/01/028', '(MICTH/Asset/01/02/01/028)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '029', 'MICTH/Asset/01/02/01/029', '(MICTH/Asset/01/02/01/029)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '030', 'MICTH/Asset/01/02/01/030', '(MICTH/Asset/01/02/01/030)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '031', 'MICTH/Asset/01/02/01/031', '(MICTH/Asset/01/02/01/031)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '032', 'MICTH/Asset/01/02/01/032', '(MICTH/Asset/01/02/01/032)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '033', 'MICTH/Asset/01/02/01/033', '(MICTH/Asset/01/02/01/033)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '034', 'MICTH/Asset/01/02/01/034', '(MICTH/Asset/01/02/01/034)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '035', 'MICTH/Asset/01/02/01/035', '(MICTH/Asset/01/02/01/035)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '036', 'MICTH/Asset/01/02/01/036', '(MICTH/Asset/01/02/01/036)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '037', 'MICTH/Asset/01/02/01/037', '(MICTH/Asset/01/02/01/037)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '038', 'MICTH/Asset/01/02/01/038', '(MICTH/Asset/01/02/01/038)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '039', 'MICTH/Asset/01/02/01/039', '(MICTH/Asset/01/02/01/039)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '040', 'MICTH/Asset/01/02/01/040', '(MICTH/Asset/01/02/01/040)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '041', 'MICTH/Asset/01/02/01/041', '(MICTH/Asset/01/02/01/041)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '042', 'MICTH/Asset/01/02/01/042', '(MICTH/Asset/01/02/01/042)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '043', 'MICTH/Asset/01/02/01/043', '(MICTH/Asset/01/02/01/043)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '044', 'MICTH/Asset/01/02/01/044', '(MICTH/Asset/01/02/01/044)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '045', 'MICTH/Asset/01/02/01/045', '(MICTH/Asset/01/02/01/045)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '046', 'MICTH/Asset/01/02/01/046', '(MICTH/Asset/01/02/01/046)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '047', 'MICTH/Asset/01/02/01/047', '(MICTH/Asset/01/02/01/047)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '048', 'MICTH/Asset/01/02/01/048', '(MICTH/Asset/01/02/01/048)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '049', 'MICTH/Asset/01/02/01/049', '(MICTH/Asset/01/02/01/049)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '050', 'MICTH/Asset/01/02/01/050', '(MICTH/Asset/01/02/01/050)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '051', 'MICTH/Asset/01/02/01/051', '(MICTH/Asset/01/02/01/051)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '052', 'MICTH/Asset/01/02/01/052', '(MICTH/Asset/01/02/01/052)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '053', 'MICTH/Asset/01/02/01/053', '(MICTH/Asset/01/02/01/053)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '054', 'MICTH/Asset/01/02/01/054', '(MICTH/Asset/01/02/01/054)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '055', 'MICTH/Asset/01/02/01/055', '(MICTH/Asset/01/02/01/055)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '056', 'MICTH/Asset/01/02/01/056', '(MICTH/Asset/01/02/01/056)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '057', 'MICTH/Asset/01/02/01/057', '(MICTH/Asset/01/02/01/057)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '058', 'MICTH/Asset/01/02/01/058', '(MICTH/Asset/01/02/01/058)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '059', 'MICTH/Asset/01/02/01/059', '(MICTH/Asset/01/02/01/059)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '060', 'MICTH/Asset/01/02/01/060', '(MICTH/Asset/01/02/01/060)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '061', 'MICTH/Asset/01/02/01/061', '(MICTH/Asset/01/02/01/061)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '062', 'MICTH/Asset/01/02/01/062', '(MICTH/Asset/01/02/01/062)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '063', 'MICTH/Asset/01/02/01/063', '(MICTH/Asset/01/02/01/063)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '064', 'MICTH/Asset/01/02/01/064', '(MICTH/Asset/01/02/01/064)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '065', 'MICTH/Asset/01/02/01/065', '(MICTH/Asset/01/02/01/065)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '066', 'MICTH/Asset/01/02/01/066', '(MICTH/Asset/01/02/01/066)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '067', 'MICTH/Asset/01/02/01/067', '(MICTH/Asset/01/02/01/067)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '068', 'MICTH/Asset/01/02/01/068', '(MICTH/Asset/01/02/01/068)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '069', 'MICTH/Asset/01/02/01/069', '(MICTH/Asset/01/02/01/069)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '070', 'MICTH/Asset/01/02/01/070', '(MICTH/Asset/01/02/01/070)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '071', 'MICTH/Asset/01/02/01/071', '(MICTH/Asset/01/02/01/071)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '072', 'MICTH/Asset/01/02/01/072', '(MICTH/Asset/01/02/01/072)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '073', 'MICTH/Asset/01/02/01/073', '(MICTH/Asset/01/02/01/073)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '074', 'MICTH/Asset/01/02/01/074', '(MICTH/Asset/01/02/01/074)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Bean Bag', '02', '001', 'MICTH/Asset/01/02/02/001', '(MICTH/Asset/01/02/02/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Bean Bag', '02', '002', 'MICTH/Asset/01/02/02/002', '(MICTH/Asset/01/02/02/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '001', 'MICTH/Asset/01/02/03/001', '(MICTH/Asset/01/02/03/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '002', 'MICTH/Asset/01/02/03/002', '(MICTH/Asset/01/02/03/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '003', 'MICTH/Asset/01/02/03/003', '(MICTH/Asset/01/02/03/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '004', 'MICTH/Asset/01/02/03/004', '(MICTH/Asset/01/02/03/004)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '005', 'MICTH/Asset/01/02/03/005', '(MICTH/Asset/01/02/03/005)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '006', 'MICTH/Asset/01/02/03/006', '(MICTH/Asset/01/02/03/006)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '007', 'MICTH/Asset/01/02/03/007', '(MICTH/Asset/01/02/03/007)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '008', 'MICTH/Asset/01/02/03/008', '(MICTH/Asset/01/02/03/008)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Boss Highback PU Chair', '04', '001', 'MICTH/Asset/01/02/04/001', '(MICTH/Asset/01/02/04/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Boss Visitor PU Chair', '05', '001', 'MICTH/Asset/01/02/05/001', '(MICTH/Asset/01/02/05/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Boss Visitor PU Chair', '05', '002', 'MICTH/Asset/01/02/05/002', '(MICTH/Asset/01/02/05/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Filo Highback PU Chair', '06', '001', 'MICTH/Asset/01/02/06/001', '(MICTH/Asset/01/02/06/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Filo Visitor PU Chair c/w Cantiliver Leg', '07', '001', 'MICTH/Asset/01/02/07/001', '(MICTH/Asset/01/02/07/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Filo Visitor PU Chair c/w Cantiliver Leg', '07', '002', 'MICTH/Asset/01/02/07/002', '(MICTH/Asset/01/02/07/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Highback Mesh Chair', '08', '001', 'MICTH/Asset/01/02/08/001', '(MICTH/Asset/01/02/08/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '001', 'MICTH/Asset/01/02/09/001', '(MICTH/Asset/01/02/09/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '002', 'MICTH/Asset/01/02/09/002', '(MICTH/Asset/01/02/09/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '003', 'MICTH/Asset/01/02/09/003', '(MICTH/Asset/01/02/09/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '004', 'MICTH/Asset/01/02/09/004', '(MICTH/Asset/01/02/09/004)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '005', 'MICTH/Asset/01/02/09/005', '(MICTH/Asset/01/02/09/005)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '006', 'MICTH/Asset/01/02/09/006', '(MICTH/Asset/01/02/09/006)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '007', 'MICTH/Asset/01/02/09/007', '(MICTH/Asset/01/02/09/007)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '008', 'MICTH/Asset/01/02/09/008', '(MICTH/Asset/01/02/09/008)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '001', 'MICTH/Asset/01/02/10/001', '(MICTH/Asset/01/02/10/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '002', 'MICTH/Asset/01/02/10/002', '(MICTH/Asset/01/02/10/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '003', 'MICTH/Asset/01/02/10/003', '(MICTH/Asset/01/02/10/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '004', 'MICTH/Asset/01/02/10/004', '(MICTH/Asset/01/02/10/004)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '005', 'MICTH/Asset/01/02/10/005', '(MICTH/Asset/01/02/10/005)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '006', 'MICTH/Asset/01/02/10/006', '(MICTH/Asset/01/02/10/006)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '007', 'MICTH/Asset/01/02/10/007', '(MICTH/Asset/01/02/10/007)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '008', 'MICTH/Asset/01/02/10/008', '(MICTH/Asset/01/02/10/008)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '009', 'MICTH/Asset/01/02/10/009', '(MICTH/Asset/01/02/10/009)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '010', 'MICTH/Asset/01/02/10/010', '(MICTH/Asset/01/02/10/010)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '011', 'MICTH/Asset/01/02/10/011', '(MICTH/Asset/01/02/10/011)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '012', 'MICTH/Asset/01/02/10/012', '(MICTH/Asset/01/02/10/012)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '013', 'MICTH/Asset/01/02/10/013', '(MICTH/Asset/01/02/10/013)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '014', 'MICTH/Asset/01/02/10/014', '(MICTH/Asset/01/02/10/014)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '015', 'MICTH/Asset/01/02/10/015', '(MICTH/Asset/01/02/10/015)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '016', 'MICTH/Asset/01/02/10/016', '(MICTH/Asset/01/02/10/016)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '017', 'MICTH/Asset/01/02/10/017', '(MICTH/Asset/01/02/10/017)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '018', 'MICTH/Asset/01/02/10/018', '(MICTH/Asset/01/02/10/018)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '019', 'MICTH/Asset/01/02/10/019', '(MICTH/Asset/01/02/10/019)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '020', 'MICTH/Asset/01/02/10/020', '(MICTH/Asset/01/02/10/020)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '021', 'MICTH/Asset/01/02/10/021', '(MICTH/Asset/01/02/10/021)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '022', 'MICTH/Asset/01/02/10/022', '(MICTH/Asset/01/02/10/022)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '023', 'MICTH/Asset/01/02/10/023', '(MICTH/Asset/01/02/10/023)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '024', 'MICTH/Asset/01/02/10/024', '(MICTH/Asset/01/02/10/024)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '025', 'MICTH/Asset/01/02/10/025', '(MICTH/Asset/01/02/10/025)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Dang Highback Mesh Chair', '11', '001', 'MICTH/Asset/01/02/11/001', '(MICTH/Asset/01/02/11/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Dang Highback Mesh Chair', '11', '002', 'MICTH/Asset/01/02/11/002', '(MICTH/Asset/01/02/11/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Highback Chair', '12', '001', 'MICTH/Asset/01/02/12/001', '(MICTH/Asset/01/02/12/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '001', 'MICTH/Asset/01/02/13/001', '(MICTH/Asset/01/02/13/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '002', 'MICTH/Asset/01/02/13/002', '(MICTH/Asset/01/02/13/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '003', 'MICTH/Asset/01/02/13/003', '(MICTH/Asset/01/02/13/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '004', 'MICTH/Asset/01/02/13/004', '(MICTH/Asset/01/02/13/004)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '005', 'MICTH/Asset/01/02/13/005', '(MICTH/Asset/01/02/13/005)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '006', 'MICTH/Asset/01/02/13/006', '(MICTH/Asset/01/02/13/006)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '007', 'MICTH/Asset/01/02/13/007', '(MICTH/Asset/01/02/13/007)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '008', 'MICTH/Asset/01/02/13/008', '(MICTH/Asset/01/02/13/008)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '009', 'MICTH/Asset/01/02/13/009', '(MICTH/Asset/01/02/13/009)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '010', 'MICTH/Asset/01/02/13/010', '(MICTH/Asset/01/02/13/010)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '011', 'MICTH/Asset/01/02/13/011', '(MICTH/Asset/01/02/13/011)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '012', 'MICTH/Asset/01/02/13/012', '(MICTH/Asset/01/02/13/012)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '013', 'MICTH/Asset/01/02/13/013', '(MICTH/Asset/01/02/13/013)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '014', 'MICTH/Asset/01/02/13/014', '(MICTH/Asset/01/02/13/014)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '015', 'MICTH/Asset/01/02/13/015', '(MICTH/Asset/01/02/13/015)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '016', 'MICTH/Asset/01/02/13/016', '(MICTH/Asset/01/02/13/016)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '017', 'MICTH/Asset/01/02/13/017', '(MICTH/Asset/01/02/13/017)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '018', 'MICTH/Asset/01/02/13/018', '(MICTH/Asset/01/02/13/018)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '019', 'MICTH/Asset/01/02/13/019', '(MICTH/Asset/01/02/13/019)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '020', 'MICTH/Asset/01/02/13/020', '(MICTH/Asset/01/02/13/020)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '021', 'MICTH/Asset/01/02/13/021', '(MICTH/Asset/01/02/13/021)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '022', 'MICTH/Asset/01/02/13/022', '(MICTH/Asset/01/02/13/022)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Cambridge Island Bench', '14', '001', 'MICTH/Asset/01/02/14/001', '(MICTH/Asset/01/02/14/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '001', 'MICTH/Asset/01/02/15/001', '(MICTH/Asset/01/02/15/001)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '002', 'MICTH/Asset/01/02/15/002', '(MICTH/Asset/01/02/15/002)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '003', 'MICTH/Asset/01/02/15/003', '(MICTH/Asset/01/02/15/003)', '', '', '', ''),
('Furniture', 1, 'Chair', '02', 'Amit Island Chair', '16', '001', 'MICTH/Asset/01/02/16/001', '(MICTH/Asset/01/02/16/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Next Executive Table c/w Side Cabinet, Flipper Casing and Modesty Panel', '01', '001', 'MICTH/Asset/01/03/01/001', '(MICTH/Asset/01/03/01/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Homag Main Table - COO', '02', '001', 'MICTH/Asset/01/03/02/001', '(MICTH/Asset/01/03/02/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Noa Main Table c/w Flipper Casing', '03', '001', 'MICTH/Asset/01/03/03/001', '(MICTH/Asset/01/03/03/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '4 Seater L-Shape Table c/w Flipper Casing Spider Leg & Wire Terminal ', '04', '001', 'MICTH/Asset/01/03/04/001', '(MICTH/Asset/01/03/04/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '4 Seater L-Shape Table c/w Flipper Casing Spider Leg & Wire Terminal ', '04', '002', 'MICTH/Asset/01/03/04/002', '(MICTH/Asset/01/03/04/002)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '4 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '05', '001', 'MICTH/Asset/01/03/05/001', '(MICTH/Asset/01/03/05/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '001', 'MICTH/Asset/01/03/06/001', '(MICTH/Asset/01/03/06/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '002', 'MICTH/Asset/01/03/06/002', '(MICTH/Asset/01/03/06/002)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '003', 'MICTH/Asset/01/03/06/003', '(MICTH/Asset/01/03/06/003)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '004', 'MICTH/Asset/01/03/06/004', '(MICTH/Asset/01/03/06/004)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '005', 'MICTH/Asset/01/03/06/005', '(MICTH/Asset/01/03/06/005)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '006', 'MICTH/Asset/01/03/06/006', '(MICTH/Asset/01/03/06/006)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '8 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '07', '001', 'MICTH/Asset/01/03/07/001', '(MICTH/Asset/01/03/07/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '8 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '07', '002', 'MICTH/Asset/01/03/07/002', '(MICTH/Asset/01/03/07/002)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '10 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '08', '001', 'MICTH/Asset/01/03/08/001', '(MICTH/Asset/01/03/08/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Coffee Table c/w Apple Shape Table Top (A)', '09', '001', 'MICTH/Asset/01/03/09/001', '(MICTH/Asset/01/03/09/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Bar Table c/w Round Shape Table Top', '10', '001', 'MICTH/Asset/01/03/10/001', '(MICTH/Asset/01/03/10/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '8\' Meeting Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '11', '001', 'MICTH/Asset/01/03/11/001', '(MICTH/Asset/01/03/11/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', '10\' Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '12', '001', 'MICTH/Asset/01/03/12/001', '(MICTH/Asset/01/03/12/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Custom Made Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '13', '001', 'MICTH/Asset/01/03/13/001', '(MICTH/Asset/01/03/13/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Rest Table', '14', '001', 'MICTH/Asset/01/03/14/001', '(MICTH/Asset/01/03/14/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Cambridge Island Table', '15', '001', 'MICTH/Asset/01/03/15/001', '(MICTH/Asset/01/03/15/001)', '', '', '', ''),
('Furniture', 1, 'Table', '03', 'Josie Tea Table Set', '16', '001', 'MICTH/Asset/01/03/16/001', '(MICTH/Asset/01/03/16/001)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'High Cabinet - COO', '01', '001', 'MICTH/Asset/01/04/01/001', '(MICTH/Asset/01/04/01/001)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '001', 'MICTH/Asset/01/04/02/001', '(MICTH/Asset/01/04/02/001)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '002', 'MICTH/Asset/01/04/02/002', '(MICTH/Asset/01/04/02/002)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '003', 'MICTH/Asset/01/04/02/003', '(MICTH/Asset/01/04/02/003)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '004', 'MICTH/Asset/01/04/02/004', '(MICTH/Asset/01/04/02/004)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '005', 'MICTH/Asset/01/04/02/005', '(MICTH/Asset/01/04/02/005)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '006', 'MICTH/Asset/01/04/02/006', '(MICTH/Asset/01/04/02/006)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '007', 'MICTH/Asset/01/04/02/007', '(MICTH/Asset/01/04/02/007)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '008', 'MICTH/Asset/01/04/02/008', '(MICTH/Asset/01/04/02/008)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '009', 'MICTH/Asset/01/04/02/009', '(MICTH/Asset/01/04/02/009)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '010', 'MICTH/Asset/01/04/02/010', '(MICTH/Asset/01/04/02/010)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '011', 'MICTH/Asset/01/04/02/011', '(MICTH/Asset/01/04/02/011)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '012', 'MICTH/Asset/01/04/02/012', '(MICTH/Asset/01/04/02/012)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '013', 'MICTH/Asset/01/04/02/013', '(MICTH/Asset/01/04/02/013)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '014', 'MICTH/Asset/01/04/02/014', '(MICTH/Asset/01/04/02/014)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '015', 'MICTH/Asset/01/04/02/015', '(MICTH/Asset/01/04/02/015)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '016', 'MICTH/Asset/01/04/02/016', '(MICTH/Asset/01/04/02/016)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '017', 'MICTH/Asset/01/04/02/017', '(MICTH/Asset/01/04/02/017)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '018', 'MICTH/Asset/01/04/02/018', '(MICTH/Asset/01/04/02/018)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '019', 'MICTH/Asset/01/04/02/019', '(MICTH/Asset/01/04/02/019)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '020', 'MICTH/Asset/01/04/02/020', '(MICTH/Asset/01/04/02/020)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '021', 'MICTH/Asset/01/04/02/021', '(MICTH/Asset/01/04/02/021)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '022', 'MICTH/Asset/01/04/02/022', '(MICTH/Asset/01/04/02/022)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '023', 'MICTH/Asset/01/04/02/023', '(MICTH/Asset/01/04/02/023)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '024', 'MICTH/Asset/01/04/02/024', '(MICTH/Asset/01/04/02/024)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '025', 'MICTH/Asset/01/04/02/025', '(MICTH/Asset/01/04/02/025)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '026', 'MICTH/Asset/01/04/02/026', '(MICTH/Asset/01/04/02/026)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '027', 'MICTH/Asset/01/04/02/027', '(MICTH/Asset/01/04/02/027)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '028', 'MICTH/Asset/01/04/02/028', '(MICTH/Asset/01/04/02/028)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '029', 'MICTH/Asset/01/04/02/029', '(MICTH/Asset/01/04/02/029)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '001', 'MICTH/Asset/01/04/03/001', '(MICTH/Asset/01/04/03/001)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '002', 'MICTH/Asset/01/04/03/002', '(MICTH/Asset/01/04/03/002)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '003', 'MICTH/Asset/01/04/03/003', '(MICTH/Asset/01/04/03/003)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '004', 'MICTH/Asset/01/04/03/004', '(MICTH/Asset/01/04/03/004)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '005', 'MICTH/Asset/01/04/03/005', '(MICTH/Asset/01/04/03/005)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '006', 'MICTH/Asset/01/04/03/006', '(MICTH/Asset/01/04/03/006)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '007', 'MICTH/Asset/01/04/03/007', '(MICTH/Asset/01/04/03/007)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '008', 'MICTH/Asset/01/04/03/008', '(MICTH/Asset/01/04/03/008)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '009', 'MICTH/Asset/01/04/03/009', '(MICTH/Asset/01/04/03/009)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '010', 'MICTH/Asset/01/04/03/010', '(MICTH/Asset/01/04/03/010)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '011', 'MICTH/Asset/01/04/03/011', '(MICTH/Asset/01/04/03/011)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '012', 'MICTH/Asset/01/04/03/012', '(MICTH/Asset/01/04/03/012)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '013', 'MICTH/Asset/01/04/03/013', '(MICTH/Asset/01/04/03/013)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '014', 'MICTH/Asset/01/04/03/014', '(MICTH/Asset/01/04/03/014)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '015', 'MICTH/Asset/01/04/03/015', '(MICTH/Asset/01/04/03/015)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '016', 'MICTH/Asset/01/04/03/016', '(MICTH/Asset/01/04/03/016)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '017', 'MICTH/Asset/01/04/03/017', '(MICTH/Asset/01/04/03/017)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '018', 'MICTH/Asset/01/04/03/018', '(MICTH/Asset/01/04/03/018)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '019', 'MICTH/Asset/01/04/03/019', '(MICTH/Asset/01/04/03/019)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '020', 'MICTH/Asset/01/04/03/020', '(MICTH/Asset/01/04/03/020)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '021', 'MICTH/Asset/01/04/03/021', '(MICTH/Asset/01/04/03/021)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '022', 'MICTH/Asset/01/04/03/022', '(MICTH/Asset/01/04/03/022)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '023', 'MICTH/Asset/01/04/03/023', '(MICTH/Asset/01/04/03/023)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '024', 'MICTH/Asset/01/04/03/024', '(MICTH/Asset/01/04/03/024)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '025', 'MICTH/Asset/01/04/03/025', '(MICTH/Asset/01/04/03/025)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '026', 'MICTH/Asset/01/04/03/026', '(MICTH/Asset/01/04/03/026)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '027', 'MICTH/Asset/01/04/03/027', '(MICTH/Asset/01/04/03/027)', '', '', '', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '028', 'MICTH/Asset/01/04/03/028', '(MICTH/Asset/01/04/03/028)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '001', 'MICTH/Asset/01/05/01/001', '(MICTH/Asset/01/05/01/001)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '002', 'MICTH/Asset/01/05/01/002', '(MICTH/Asset/01/05/01/002)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '003', 'MICTH/Asset/01/05/01/003', '(MICTH/Asset/01/05/01/003)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '004', 'MICTH/Asset/01/05/01/004', '(MICTH/Asset/01/05/01/004)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '005', 'MICTH/Asset/01/05/01/005', '(MICTH/Asset/01/05/01/005)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '006', 'MICTH/Asset/01/05/01/006', '(MICTH/Asset/01/05/01/006)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '007', 'MICTH/Asset/01/05/01/007', '(MICTH/Asset/01/05/01/007)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '008', 'MICTH/Asset/01/05/01/008', '(MICTH/Asset/01/05/01/008)', '', '', '', ''),
('Furniture', 1, 'Compactor', '05', '6 Bay Mobile Compactor', '02', '001', 'MICTH/Asset/01/05/02/001', '(MICTH/Asset/01/05/02/001)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '001', 'MICTH/Asset/01/06/01/001', '(MICTH/Asset/01/06/01/001)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '002', 'MICTH/Asset/01/06/01/002', '(MICTH/Asset/01/06/01/002)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '003', 'MICTH/Asset/01/06/01/003', '(MICTH/Asset/01/06/01/003)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '004', 'MICTH/Asset/01/06/01/004', '(MICTH/Asset/01/06/01/004)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '005', 'MICTH/Asset/01/06/01/005', '(MICTH/Asset/01/06/01/005)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '006', 'MICTH/Asset/01/06/01/006', '(MICTH/Asset/01/06/01/006)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '007', 'MICTH/Asset/01/06/01/007', '(MICTH/Asset/01/06/01/007)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '008', 'MICTH/Asset/01/06/01/008', '(MICTH/Asset/01/06/01/008)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '009', 'MICTH/Asset/01/06/01/009', '(MICTH/Asset/01/06/01/009)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '010', 'MICTH/Asset/01/06/01/010', '(MICTH/Asset/01/06/01/010)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '011', 'MICTH/Asset/01/06/01/011', '(MICTH/Asset/01/06/01/011)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '012', 'MICTH/Asset/01/06/01/012', '(MICTH/Asset/01/06/01/012)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '013', 'MICTH/Asset/01/06/01/013', '(MICTH/Asset/01/06/01/013)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '014', 'MICTH/Asset/01/06/01/014', '(MICTH/Asset/01/06/01/014)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '015', 'MICTH/Asset/01/06/01/015', '(MICTH/Asset/01/06/01/015)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '016', 'MICTH/Asset/01/06/01/016', '(MICTH/Asset/01/06/01/016)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '017', 'MICTH/Asset/01/06/01/017', '(MICTH/Asset/01/06/01/017)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '018', 'MICTH/Asset/01/06/01/018', '(MICTH/Asset/01/06/01/018)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '019', 'MICTH/Asset/01/06/01/019', '(MICTH/Asset/01/06/01/019)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '020', 'MICTH/Asset/01/06/01/020', '(MICTH/Asset/01/06/01/020)', '', '', '', '');
INSERT INTO `asset_management_vba` (`Category`, `Category_ID`, `Sub_Category`, `Sub_Category_ID`, `Model`, `Model_ID`, `Running_No`, `Full_ID (Concatenated ID)`, `Barcode`, `SERIAL_NO`, `DATE_OF_PURCHASE`, `SUPPLIER`, `status`) VALUES
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '021', 'MICTH/Asset/01/06/01/021', '(MICTH/Asset/01/06/01/021)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '022', 'MICTH/Asset/01/06/01/022', '(MICTH/Asset/01/06/01/022)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '023', 'MICTH/Asset/01/06/01/023', '(MICTH/Asset/01/06/01/023)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '024', 'MICTH/Asset/01/06/01/024', '(MICTH/Asset/01/06/01/024)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '025', 'MICTH/Asset/01/06/01/025', '(MICTH/Asset/01/06/01/025)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '026', 'MICTH/Asset/01/06/01/026', '(MICTH/Asset/01/06/01/026)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '027', 'MICTH/Asset/01/06/01/027', '(MICTH/Asset/01/06/01/027)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '028', 'MICTH/Asset/01/06/01/028', '(MICTH/Asset/01/06/01/028)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '029', 'MICTH/Asset/01/06/01/029', '(MICTH/Asset/01/06/01/029)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '030', 'MICTH/Asset/01/06/01/030', '(MICTH/Asset/01/06/01/030)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '031', 'MICTH/Asset/01/06/01/031', '(MICTH/Asset/01/06/01/031)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '032', 'MICTH/Asset/01/06/01/032', '(MICTH/Asset/01/06/01/032)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '033', 'MICTH/Asset/01/06/01/033', '(MICTH/Asset/01/06/01/033)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '034', 'MICTH/Asset/01/06/01/034', '(MICTH/Asset/01/06/01/034)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '035', 'MICTH/Asset/01/06/01/035', '(MICTH/Asset/01/06/01/035)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '036', 'MICTH/Asset/01/06/01/036', '(MICTH/Asset/01/06/01/036)', '', '', '', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '037', 'MICTH/Asset/01/06/01/037', '(MICTH/Asset/01/06/01/037)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '001', 'MICTH/Asset/01/07/01/001', '(MICTH/Asset/01/07/01/001)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '002', 'MICTH/Asset/01/07/01/002', '(MICTH/Asset/01/07/01/002)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '003', 'MICTH/Asset/01/07/01/003', '(MICTH/Asset/01/07/01/003)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '004', 'MICTH/Asset/01/07/01/004', '(MICTH/Asset/01/07/01/004)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '005', 'MICTH/Asset/01/07/01/005', '(MICTH/Asset/01/07/01/005)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '006', 'MICTH/Asset/01/07/01/006', '(MICTH/Asset/01/07/01/006)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '007', 'MICTH/Asset/01/07/01/007', '(MICTH/Asset/01/07/01/007)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '008', 'MICTH/Asset/01/07/01/008', '(MICTH/Asset/01/07/01/008)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '009', 'MICTH/Asset/01/07/01/009', '(MICTH/Asset/01/07/01/009)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '010', 'MICTH/Asset/01/07/01/010', '(MICTH/Asset/01/07/01/010)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '011', 'MICTH/Asset/01/07/01/011', '(MICTH/Asset/01/07/01/011)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '012', 'MICTH/Asset/01/07/01/012', '(MICTH/Asset/01/07/01/012)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '013', 'MICTH/Asset/01/07/01/013', '(MICTH/Asset/01/07/01/013)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '014', 'MICTH/Asset/01/07/01/014', '(MICTH/Asset/01/07/01/014)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '015', 'MICTH/Asset/01/07/01/015', '(MICTH/Asset/01/07/01/015)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '016', 'MICTH/Asset/01/07/01/016', '(MICTH/Asset/01/07/01/016)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '017', 'MICTH/Asset/01/07/01/017', '(MICTH/Asset/01/07/01/017)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '018', 'MICTH/Asset/01/07/01/018', '(MICTH/Asset/01/07/01/018)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '019', 'MICTH/Asset/01/07/01/019', '(MICTH/Asset/01/07/01/019)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '020', 'MICTH/Asset/01/07/01/020', '(MICTH/Asset/01/07/01/020)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '021', 'MICTH/Asset/01/07/01/021', '(MICTH/Asset/01/07/01/021)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '022', 'MICTH/Asset/01/07/01/022', '(MICTH/Asset/01/07/01/022)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '023', 'MICTH/Asset/01/07/01/023', '(MICTH/Asset/01/07/01/023)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '024', 'MICTH/Asset/01/07/01/024', '(MICTH/Asset/01/07/01/024)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '025', 'MICTH/Asset/01/07/01/025', '(MICTH/Asset/01/07/01/025)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '026', 'MICTH/Asset/01/07/01/026', '(MICTH/Asset/01/07/01/026)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '027', 'MICTH/Asset/01/07/01/027', '(MICTH/Asset/01/07/01/027)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '028', 'MICTH/Asset/01/07/01/028', '(MICTH/Asset/01/07/01/028)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '029', 'MICTH/Asset/01/07/01/029', '(MICTH/Asset/01/07/01/029)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '030', 'MICTH/Asset/01/07/01/030', '(MICTH/Asset/01/07/01/030)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '031', 'MICTH/Asset/01/07/01/031', '(MICTH/Asset/01/07/01/031)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '032', 'MICTH/Asset/01/07/01/032', '(MICTH/Asset/01/07/01/032)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '033', 'MICTH/Asset/01/07/01/033', '(MICTH/Asset/01/07/01/033)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '034', 'MICTH/Asset/01/07/01/034', '(MICTH/Asset/01/07/01/034)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '035', 'MICTH/Asset/01/07/01/035', '(MICTH/Asset/01/07/01/035)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '036', 'MICTH/Asset/01/07/01/036', '(MICTH/Asset/01/07/01/036)', '', '', '', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '037', 'MICTH/Asset/01/07/01/037', '(MICTH/Asset/01/07/01/037)', '', '', '', ''),
('ICT Equipment', 2, 'Router', '01', 'Router - Mikrotik CCR2004-16G-2S+', '01', '001', 'MICTH/Asset/02/01/01/001', '(MICTH/Asset/02/01/01/001)', 'HGE09MX6MX6B8A/r2', '', '', ''),
('ICT Equipment', 2, 'Distribution Switch', '02', 'Distribution Switch - Mikrotik CRS354-48G- 4S+2Q+RM', '01', '001', 'MICTH/Asset/02/02/01/001', '(MICTH/Asset/02/02/01/001)', 'HQ909P4VEDB/409/r3', '', '', ''),
('ICT Equipment', 2, 'Distribution Switch', '02', 'Distribution Switch - Mikrotik CRS354-48G- 4S+2Q+RM', '01', '002', 'MICTH/Asset/02/02/01/002', '(MICTH/Asset/02/02/01/002)', '', '', '', ''),
('ICT Equipment', 2, 'Distribution Switch', '02', 'Distribution Switch - Mikrotik CRS354-48G- 4S+2Q+RM', '01', '003', 'MICTH/Asset/02/02/01/003', '(MICTH/Asset/02/02/01/003)', '', '', '', ''),
('ICT Equipment', 2, 'POE Switch', '03', 'POE Switch - Mikrotik CSS610-8P-2S+IN', '01', '001', 'MICTH/Asset/02/03/01/001', '(MICTH/Asset/02/03/01/001)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '001', 'MICTH/Asset/02/04/01/001', '(MICTH/Asset/02/04/01/001)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '002', 'MICTH/Asset/02/04/01/002', '(MICTH/Asset/02/04/01/002)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '003', 'MICTH/Asset/02/04/01/003', '(MICTH/Asset/02/04/01/003)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '004', 'MICTH/Asset/02/04/01/004', '(MICTH/Asset/02/04/01/004)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '005', 'MICTH/Asset/02/04/01/005', '(MICTH/Asset/02/04/01/005)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '006', 'MICTH/Asset/02/04/01/006', '(MICTH/Asset/02/04/01/006)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '007', 'MICTH/Asset/02/04/01/007', '(MICTH/Asset/02/04/01/007)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '008', 'MICTH/Asset/02/04/01/008', '(MICTH/Asset/02/04/01/008)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '009', 'MICTH/Asset/02/04/01/009', '(MICTH/Asset/02/04/01/009)', '', '', '', ''),
('ICT Equipment', 2, 'Access Point', '04', 'AP - Mikrotik cAPGi-5HaxD2HaxD', '01', '010', 'MICTH/Asset/02/04/01/010', '(MICTH/Asset/02/04/01/010)', '', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Logitech Rally Bar', '01', '001', 'MICTH/Asset/02/05/01/001', '(MICTH/Asset/02/05/01/001)', '2420FD1LPJ3M', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Logitech Sight', '02', '001', 'MICTH/Asset/02/05/02/001', '(MICTH/Asset/02/05/02/001)', '2418LZ5137B9', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Logitech Rally Mic Pod', '03', '001', 'MICTH/Asset/02/05/03/001', '(MICTH/Asset/02/05/03/001)', '2418LZ50F3G9', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Logitech Rally Mic Pod', '03', '002', 'MICTH/Asset/02/05/03/002', '(MICTH/Asset/02/05/03/002)', '2419LZ51B259', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'TP-Link POE Injector Adapter', '04', '001', 'MICTH/Asset/02/05/04/001', '(MICTH/Asset/02/05/04/001)', '4243101001667', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', '10M Strong USB Cable', '05', '001', 'MICTH/Asset/02/05/05/001', '(MICTH/Asset/02/05/05/001)', '2411WD02EF19', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-CML)', '06', '001', 'MICTH/Asset/02/05/06/001', '(MICTH/Asset/02/05/06/001)', '095015043703420017', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '001', 'MICTH/Asset/02/05/07/001', '(MICTH/Asset/02/05/07/001)', '095014843936200047', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '002', 'MICTH/Asset/02/05/07/002', '(MICTH/Asset/02/05/07/002)', '095014843936200061', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '003', 'MICTH/Asset/02/05/07/003', '(MICTH/Asset/02/05/07/003)', '095014843936200048', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '004', 'MICTH/Asset/02/05/07/004', '(MICTH/Asset/02/05/07/004)', '095014843936200088', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '005', 'MICTH/Asset/02/05/07/005', '(MICTH/Asset/02/05/07/005)', '095014843936200087', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '006', 'MICTH/Asset/02/05/07/006', '(MICTH/Asset/02/05/07/006)', '095014843936200062', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '007', 'MICTH/Asset/02/05/07/007', '(MICTH/Asset/02/05/07/007)', '095014843948650033', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '008', 'MICTH/Asset/02/05/07/008', '(MICTH/Asset/02/05/07/008)', '095014843936200055', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '009', 'MICTH/Asset/02/05/07/009', '(MICTH/Asset/02/05/07/009)', '095014843936200056', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '010', 'MICTH/Asset/02/05/07/010', '(MICTH/Asset/02/05/07/010)', '095014843936200078', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '011', 'MICTH/Asset/02/05/07/011', '(MICTH/Asset/02/05/07/011)', '095014843948650055', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '012', 'MICTH/Asset/02/05/07/012', '(MICTH/Asset/02/05/07/012)', '\'095014843948650060', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '013', 'MICTH/Asset/02/05/07/013', '(MICTH/Asset/02/05/07/013)', '095014843948650034', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '014', 'MICTH/Asset/02/05/07/014', '(MICTH/Asset/02/05/07/014)', '095014843936200058', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '015', 'MICTH/Asset/02/05/07/015', '(MICTH/Asset/02/05/07/015)', '095014843936200057', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '016', 'MICTH/Asset/02/05/07/016', '(MICTH/Asset/02/05/07/016)', '095014843948650045', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '017', 'MICTH/Asset/02/05/07/017', '(MICTH/Asset/02/05/07/017)', '095014843936200077', '', '', ''),
('ICT Equipment', 2, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '018', 'MICTH/Asset/02/05/07/018', '(MICTH/Asset/02/05/07/018)', '095014843936200081', '', '', ''),
('ICT Equipment', 3, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '019', 'MICTH/Asset/03/05/07/019', '(MICTH/Asset/03/05/07/019)', '095014843948650031', '', '', ''),
('ICT Equipment', 4, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '020', 'MICTH/Asset/04/05/07/020', '(MICTH/Asset/04/05/07/020)', '095014843948650046', '', '', ''),
('ICT Equipment', 5, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '021', 'MICTH/Asset/05/05/07/021', '(MICTH/Asset/05/05/07/021)', '095014843952820070', '', '', ''),
('ICT Equipment', 6, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '022', 'MICTH/Asset/06/05/07/022', '(MICTH/Asset/06/05/07/022)', '095014843952820069', '', '', ''),
('ICT Equipment', 7, 'Conference System', '05', 'Bosch CCS 900 Ultro (CCS-DL)', '07', '023', 'MICTH/Asset/07/05/07/023', '(MICTH/Asset/07/05/07/023)', '095014827583380092', '', '', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 85\" QLED Q70D 4K Smart TV (2024)', '01', '001', 'MICTH/Asset/03/01/01/001', '(MICTH/Asset/03/01/01/001)', '0TE93NIX500024', '10/6/2024', 'Elitetrax Marketing Sdn. Bhd. (HARVEY NORMAN)', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 65\" QLED 4K AI TV Q80D (2024)', '02', '001', 'MICTH/Asset/03/01/02/001', '(MICTH/Asset/03/01/02/001)', '0TYQ3NEX500031', '10/6/2024', 'Elitetrax Marketing Sdn. Bhd. (HARVEY NORMAN)', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 55\" Business TV BE55D', '03', '001', 'MICTH/Asset/03/01/03/001', '(MICTH/Asset/03/01/03/001)', '0W08HNHX600028L', '4/7/2024', 'VSTECS ASTAR SDN BHD', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 55\" Business TV BE55D', '03', '002', 'MICTH/Asset/03/01/03/002', '(MICTH/Asset/03/01/03/002)', '0W08HNHX600140', '4/7/2024', 'VSTECS ASTAR SDN BHD', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 55\" Business TV BE55D', '03', '005', 'MICTH/Asset/03/01/03/005', '(MICTH/Asset/03/01/03/005)', '0W08HNHX600139', '4/7/2024', 'VSTECS ASTAR SDN BHD', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 55\" Business TV BE55D', '03', '004', 'MICTH/Asset/03/01/03/004', '(MICTH/Asset/03/01/03/004)', '0W08HNHX600027', '4/7/2024', 'VSTECS ASTAR SDN BHD', ''),
('Office Equipment', 3, 'Smart TV', '01', 'Samsung 55\" Business TV BE55D', '03', '005', 'MICTH/Asset/03/01/03/005', '(MICTH/Asset/03/01/03/005)', '0W08HNHX600029', '4/7/2024', 'VSTECS ASTAR SDN BHD', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '001', 'MICTH/Asset/01/01/01/001', '(MICTH/Asset/01/01/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '002', 'MICTH/Asset/01/01/01/002', '(MICTH/Asset/01/01/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '003', 'MICTH/Asset/01/01/01/003', '(MICTH/Asset/01/01/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '004', 'MICTH/Asset/01/01/01/004', '(MICTH/Asset/01/01/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '005', 'MICTH/Asset/01/01/01/005', '(MICTH/Asset/01/01/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '006', 'MICTH/Asset/01/01/01/006', '(MICTH/Asset/01/01/01/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '007', 'MICTH/Asset/01/01/01/007', '(MICTH/Asset/01/01/01/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '008', 'MICTH/Asset/01/01/01/008', '(MICTH/Asset/01/01/01/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '009', 'MICTH/Asset/01/01/01/009', '(MICTH/Asset/01/01/01/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '010', 'MICTH/Asset/01/01/01/010', '(MICTH/Asset/01/01/01/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '011', 'MICTH/Asset/01/01/01/011', '(MICTH/Asset/01/01/01/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '012', 'MICTH/Asset/01/01/01/012', '(MICTH/Asset/01/01/01/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '013', 'MICTH/Asset/01/01/01/013', '(MICTH/Asset/01/01/01/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '014', 'MICTH/Asset/01/01/01/014', '(MICTH/Asset/01/01/01/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '015', 'MICTH/Asset/01/01/01/015', '(MICTH/Asset/01/01/01/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '016', 'MICTH/Asset/01/01/01/016', '(MICTH/Asset/01/01/01/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '017', 'MICTH/Asset/01/01/01/017', '(MICTH/Asset/01/01/01/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '018', 'MICTH/Asset/01/01/01/018', '(MICTH/Asset/01/01/01/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '019', 'MICTH/Asset/01/01/01/019', '(MICTH/Asset/01/01/01/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '020', 'MICTH/Asset/01/01/01/020', '(MICTH/Asset/01/01/01/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '021', 'MICTH/Asset/01/01/01/021', '(MICTH/Asset/01/01/01/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '022', 'MICTH/Asset/01/01/01/022', '(MICTH/Asset/01/01/01/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '023', 'MICTH/Asset/01/01/01/023', '(MICTH/Asset/01/01/01/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '024', 'MICTH/Asset/01/01/01/024', '(MICTH/Asset/01/01/01/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '025', 'MICTH/Asset/01/01/01/025', '(MICTH/Asset/01/01/01/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '026', 'MICTH/Asset/01/01/01/026', '(MICTH/Asset/01/01/01/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '027', 'MICTH/Asset/01/01/01/027', '(MICTH/Asset/01/01/01/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '028', 'MICTH/Asset/01/01/01/028', '(MICTH/Asset/01/01/01/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '029', 'MICTH/Asset/01/01/01/029', '(MICTH/Asset/01/01/01/029)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '030', 'MICTH/Asset/01/01/01/030', '(MICTH/Asset/01/01/01/030)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '031', 'MICTH/Asset/01/01/01/031', '(MICTH/Asset/01/01/01/031)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '032', 'MICTH/Asset/01/01/01/032', '(MICTH/Asset/01/01/01/032)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '033', 'MICTH/Asset/01/01/01/033', '(MICTH/Asset/01/01/01/033)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '034', 'MICTH/Asset/01/01/01/034', '(MICTH/Asset/01/01/01/034)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '035', 'MICTH/Asset/01/01/01/035', '(MICTH/Asset/01/01/01/035)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '036', 'MICTH/Asset/01/01/01/036', '(MICTH/Asset/01/01/01/036)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '037', 'MICTH/Asset/01/01/01/037', '(MICTH/Asset/01/01/01/037)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '038', 'MICTH/Asset/01/01/01/038', '(MICTH/Asset/01/01/01/038)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '039', 'MICTH/Asset/01/01/01/039', '(MICTH/Asset/01/01/01/039)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '040', 'MICTH/Asset/01/01/01/040', '(MICTH/Asset/01/01/01/040)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '041', 'MICTH/Asset/01/01/01/041', '(MICTH/Asset/01/01/01/041)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '042', 'MICTH/Asset/01/01/01/042', '(MICTH/Asset/01/01/01/042)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '043', 'MICTH/Asset/01/01/01/043', '(MICTH/Asset/01/01/01/043)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '044', 'MICTH/Asset/01/01/01/044', '(MICTH/Asset/01/01/01/044)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '045', 'MICTH/Asset/01/01/01/045', '(MICTH/Asset/01/01/01/045)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '046', 'MICTH/Asset/01/01/01/046', '(MICTH/Asset/01/01/01/046)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '047', 'MICTH/Asset/01/01/01/047', '(MICTH/Asset/01/01/01/047)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '048', 'MICTH/Asset/01/01/01/048', '(MICTH/Asset/01/01/01/048)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '049', 'MICTH/Asset/01/01/01/049', '(MICTH/Asset/01/01/01/049)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '050', 'MICTH/Asset/01/01/01/050', '(MICTH/Asset/01/01/01/050)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '051', 'MICTH/Asset/01/01/01/051', '(MICTH/Asset/01/01/01/051)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '052', 'MICTH/Asset/01/01/01/052', '(MICTH/Asset/01/01/01/052)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '053', 'MICTH/Asset/01/01/01/053', '(MICTH/Asset/01/01/01/053)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '054', 'MICTH/Asset/01/01/01/054', '(MICTH/Asset/01/01/01/054)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '055', 'MICTH/Asset/01/01/01/055', '(MICTH/Asset/01/01/01/055)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '056', 'MICTH/Asset/01/01/01/056', '(MICTH/Asset/01/01/01/056)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '057', 'MICTH/Asset/01/01/01/057', '(MICTH/Asset/01/01/01/057)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '058', 'MICTH/Asset/01/01/01/058', '(MICTH/Asset/01/01/01/058)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '059', 'MICTH/Asset/01/01/01/059', '(MICTH/Asset/01/01/01/059)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '060', 'MICTH/Asset/01/01/01/060', '(MICTH/Asset/01/01/01/060)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '061', 'MICTH/Asset/01/01/01/061', '(MICTH/Asset/01/01/01/061)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '062', 'MICTH/Asset/01/01/01/062', '(MICTH/Asset/01/01/01/062)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '063', 'MICTH/Asset/01/01/01/063', '(MICTH/Asset/01/01/01/063)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '064', 'MICTH/Asset/01/01/01/064', '(MICTH/Asset/01/01/01/064)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '065', 'MICTH/Asset/01/01/01/065', '(MICTH/Asset/01/01/01/065)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '066', 'MICTH/Asset/01/01/01/066', '(MICTH/Asset/01/01/01/066)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '067', 'MICTH/Asset/01/01/01/067', '(MICTH/Asset/01/01/01/067)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '068', 'MICTH/Asset/01/01/01/068', '(MICTH/Asset/01/01/01/068)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '069', 'MICTH/Asset/01/01/01/069', '(MICTH/Asset/01/01/01/069)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '070', 'MICTH/Asset/01/01/01/070', '(MICTH/Asset/01/01/01/070)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '071', 'MICTH/Asset/01/01/01/071', '(MICTH/Asset/01/01/01/071)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '072', 'MICTH/Asset/01/01/01/072', '(MICTH/Asset/01/01/01/072)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '073', 'MICTH/Asset/01/01/01/073', '(MICTH/Asset/01/01/01/073)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Drawer', '01', 'Mobile 3 Drawer', '01', '074', 'MICTH/Asset/01/01/01/074', '(MICTH/Asset/01/01/01/074)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '001', 'MICTH/Asset/01/02/01/001', '(MICTH/Asset/01/02/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '002', 'MICTH/Asset/01/02/01/002', '(MICTH/Asset/01/02/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '003', 'MICTH/Asset/01/02/01/003', '(MICTH/Asset/01/02/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '004', 'MICTH/Asset/01/02/01/004', '(MICTH/Asset/01/02/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '005', 'MICTH/Asset/01/02/01/005', '(MICTH/Asset/01/02/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '006', 'MICTH/Asset/01/02/01/006', '(MICTH/Asset/01/02/01/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '007', 'MICTH/Asset/01/02/01/007', '(MICTH/Asset/01/02/01/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '008', 'MICTH/Asset/01/02/01/008', '(MICTH/Asset/01/02/01/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '009', 'MICTH/Asset/01/02/01/009', '(MICTH/Asset/01/02/01/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '010', 'MICTH/Asset/01/02/01/010', '(MICTH/Asset/01/02/01/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '011', 'MICTH/Asset/01/02/01/011', '(MICTH/Asset/01/02/01/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '012', 'MICTH/Asset/01/02/01/012', '(MICTH/Asset/01/02/01/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '013', 'MICTH/Asset/01/02/01/013', '(MICTH/Asset/01/02/01/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '014', 'MICTH/Asset/01/02/01/014', '(MICTH/Asset/01/02/01/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '015', 'MICTH/Asset/01/02/01/015', '(MICTH/Asset/01/02/01/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '016', 'MICTH/Asset/01/02/01/016', '(MICTH/Asset/01/02/01/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '017', 'MICTH/Asset/01/02/01/017', '(MICTH/Asset/01/02/01/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '018', 'MICTH/Asset/01/02/01/018', '(MICTH/Asset/01/02/01/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '019', 'MICTH/Asset/01/02/01/019', '(MICTH/Asset/01/02/01/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '020', 'MICTH/Asset/01/02/01/020', '(MICTH/Asset/01/02/01/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '021', 'MICTH/Asset/01/02/01/021', '(MICTH/Asset/01/02/01/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '022', 'MICTH/Asset/01/02/01/022', '(MICTH/Asset/01/02/01/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '023', 'MICTH/Asset/01/02/01/023', '(MICTH/Asset/01/02/01/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '024', 'MICTH/Asset/01/02/01/024', '(MICTH/Asset/01/02/01/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '025', 'MICTH/Asset/01/02/01/025', '(MICTH/Asset/01/02/01/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '026', 'MICTH/Asset/01/02/01/026', '(MICTH/Asset/01/02/01/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '027', 'MICTH/Asset/01/02/01/027', '(MICTH/Asset/01/02/01/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '028', 'MICTH/Asset/01/02/01/028', '(MICTH/Asset/01/02/01/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '029', 'MICTH/Asset/01/02/01/029', '(MICTH/Asset/01/02/01/029)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '030', 'MICTH/Asset/01/02/01/030', '(MICTH/Asset/01/02/01/030)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '031', 'MICTH/Asset/01/02/01/031', '(MICTH/Asset/01/02/01/031)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '032', 'MICTH/Asset/01/02/01/032', '(MICTH/Asset/01/02/01/032)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '033', 'MICTH/Asset/01/02/01/033', '(MICTH/Asset/01/02/01/033)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '034', 'MICTH/Asset/01/02/01/034', '(MICTH/Asset/01/02/01/034)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '035', 'MICTH/Asset/01/02/01/035', '(MICTH/Asset/01/02/01/035)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '036', 'MICTH/Asset/01/02/01/036', '(MICTH/Asset/01/02/01/036)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '037', 'MICTH/Asset/01/02/01/037', '(MICTH/Asset/01/02/01/037)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '038', 'MICTH/Asset/01/02/01/038', '(MICTH/Asset/01/02/01/038)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '039', 'MICTH/Asset/01/02/01/039', '(MICTH/Asset/01/02/01/039)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '040', 'MICTH/Asset/01/02/01/040', '(MICTH/Asset/01/02/01/040)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '041', 'MICTH/Asset/01/02/01/041', '(MICTH/Asset/01/02/01/041)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '042', 'MICTH/Asset/01/02/01/042', '(MICTH/Asset/01/02/01/042)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '043', 'MICTH/Asset/01/02/01/043', '(MICTH/Asset/01/02/01/043)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '044', 'MICTH/Asset/01/02/01/044', '(MICTH/Asset/01/02/01/044)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '045', 'MICTH/Asset/01/02/01/045', '(MICTH/Asset/01/02/01/045)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '046', 'MICTH/Asset/01/02/01/046', '(MICTH/Asset/01/02/01/046)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '047', 'MICTH/Asset/01/02/01/047', '(MICTH/Asset/01/02/01/047)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '048', 'MICTH/Asset/01/02/01/048', '(MICTH/Asset/01/02/01/048)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '049', 'MICTH/Asset/01/02/01/049', '(MICTH/Asset/01/02/01/049)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '050', 'MICTH/Asset/01/02/01/050', '(MICTH/Asset/01/02/01/050)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '051', 'MICTH/Asset/01/02/01/051', '(MICTH/Asset/01/02/01/051)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '052', 'MICTH/Asset/01/02/01/052', '(MICTH/Asset/01/02/01/052)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '053', 'MICTH/Asset/01/02/01/053', '(MICTH/Asset/01/02/01/053)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '054', 'MICTH/Asset/01/02/01/054', '(MICTH/Asset/01/02/01/054)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '055', 'MICTH/Asset/01/02/01/055', '(MICTH/Asset/01/02/01/055)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '056', 'MICTH/Asset/01/02/01/056', '(MICTH/Asset/01/02/01/056)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '057', 'MICTH/Asset/01/02/01/057', '(MICTH/Asset/01/02/01/057)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '058', 'MICTH/Asset/01/02/01/058', '(MICTH/Asset/01/02/01/058)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '059', 'MICTH/Asset/01/02/01/059', '(MICTH/Asset/01/02/01/059)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '060', 'MICTH/Asset/01/02/01/060', '(MICTH/Asset/01/02/01/060)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '061', 'MICTH/Asset/01/02/01/061', '(MICTH/Asset/01/02/01/061)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '062', 'MICTH/Asset/01/02/01/062', '(MICTH/Asset/01/02/01/062)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '063', 'MICTH/Asset/01/02/01/063', '(MICTH/Asset/01/02/01/063)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '064', 'MICTH/Asset/01/02/01/064', '(MICTH/Asset/01/02/01/064)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '065', 'MICTH/Asset/01/02/01/065', '(MICTH/Asset/01/02/01/065)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '066', 'MICTH/Asset/01/02/01/066', '(MICTH/Asset/01/02/01/066)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '067', 'MICTH/Asset/01/02/01/067', '(MICTH/Asset/01/02/01/067)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '068', 'MICTH/Asset/01/02/01/068', '(MICTH/Asset/01/02/01/068)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '069', 'MICTH/Asset/01/02/01/069', '(MICTH/Asset/01/02/01/069)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '070', 'MICTH/Asset/01/02/01/070', '(MICTH/Asset/01/02/01/070)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '071', 'MICTH/Asset/01/02/01/071', '(MICTH/Asset/01/02/01/071)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '072', 'MICTH/Asset/01/02/01/072', '(MICTH/Asset/01/02/01/072)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '073', 'MICTH/Asset/01/02/01/073', '(MICTH/Asset/01/02/01/073)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Lowbak Mesh Chair', '01', '074', 'MICTH/Asset/01/02/01/074', '(MICTH/Asset/01/02/01/074)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Bean Bag', '02', '001', 'MICTH/Asset/01/02/02/001', '(MICTH/Asset/01/02/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Bean Bag', '02', '002', 'MICTH/Asset/01/02/02/002', '(MICTH/Asset/01/02/02/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '001', 'MICTH/Asset/01/02/03/001', '(MICTH/Asset/01/02/03/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '002', 'MICTH/Asset/01/02/03/002', '(MICTH/Asset/01/02/03/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '003', 'MICTH/Asset/01/02/03/003', '(MICTH/Asset/01/02/03/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '004', 'MICTH/Asset/01/02/03/004', '(MICTH/Asset/01/02/03/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '005', 'MICTH/Asset/01/02/03/005', '(MICTH/Asset/01/02/03/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '006', 'MICTH/Asset/01/02/03/006', '(MICTH/Asset/01/02/03/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '007', 'MICTH/Asset/01/02/03/007', '(MICTH/Asset/01/02/03/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Highbar Stool', '03', '008', 'MICTH/Asset/01/02/03/008', '(MICTH/Asset/01/02/03/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Boss Highback PU Chair', '04', '001', 'MICTH/Asset/01/02/04/001', '(MICTH/Asset/01/02/04/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Boss Visitor PU Chair', '05', '001', 'MICTH/Asset/01/02/05/001', '(MICTH/Asset/01/02/05/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Boss Visitor PU Chair', '05', '002', 'MICTH/Asset/01/02/05/002', '(MICTH/Asset/01/02/05/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Filo Highback PU Chair', '06', '001', 'MICTH/Asset/01/02/06/001', '(MICTH/Asset/01/02/06/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Filo Visitor PU Chair c/w Cantiliver Leg', '07', '001', 'MICTH/Asset/01/02/07/001', '(MICTH/Asset/01/02/07/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Filo Visitor PU Chair c/w Cantiliver Leg', '07', '002', 'MICTH/Asset/01/02/07/002', '(MICTH/Asset/01/02/07/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Nuk Highback Mesh Chair', '08', '001', 'MICTH/Asset/01/02/08/001', '(MICTH/Asset/01/02/08/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '001', 'MICTH/Asset/01/02/09/001', '(MICTH/Asset/01/02/09/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '002', 'MICTH/Asset/01/02/09/002', '(MICTH/Asset/01/02/09/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '003', 'MICTH/Asset/01/02/09/003', '(MICTH/Asset/01/02/09/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '004', 'MICTH/Asset/01/02/09/004', '(MICTH/Asset/01/02/09/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '005', 'MICTH/Asset/01/02/09/005', '(MICTH/Asset/01/02/09/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '006', 'MICTH/Asset/01/02/09/006', '(MICTH/Asset/01/02/09/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '007', 'MICTH/Asset/01/02/09/007', '(MICTH/Asset/01/02/09/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Chloe Highback Mesh Chair', '09', '008', 'MICTH/Asset/01/02/09/008', '(MICTH/Asset/01/02/09/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '001', 'MICTH/Asset/01/02/10/001', '(MICTH/Asset/01/02/10/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '002', 'MICTH/Asset/01/02/10/002', '(MICTH/Asset/01/02/10/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '003', 'MICTH/Asset/01/02/10/003', '(MICTH/Asset/01/02/10/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '004', 'MICTH/Asset/01/02/10/004', '(MICTH/Asset/01/02/10/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '005', 'MICTH/Asset/01/02/10/005', '(MICTH/Asset/01/02/10/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '006', 'MICTH/Asset/01/02/10/006', '(MICTH/Asset/01/02/10/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '007', 'MICTH/Asset/01/02/10/007', '(MICTH/Asset/01/02/10/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '008', 'MICTH/Asset/01/02/10/008', '(MICTH/Asset/01/02/10/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '009', 'MICTH/Asset/01/02/10/009', '(MICTH/Asset/01/02/10/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '010', 'MICTH/Asset/01/02/10/010', '(MICTH/Asset/01/02/10/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '011', 'MICTH/Asset/01/02/10/011', '(MICTH/Asset/01/02/10/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '012', 'MICTH/Asset/01/02/10/012', '(MICTH/Asset/01/02/10/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '013', 'MICTH/Asset/01/02/10/013', '(MICTH/Asset/01/02/10/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '014', 'MICTH/Asset/01/02/10/014', '(MICTH/Asset/01/02/10/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '015', 'MICTH/Asset/01/02/10/015', '(MICTH/Asset/01/02/10/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '016', 'MICTH/Asset/01/02/10/016', '(MICTH/Asset/01/02/10/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '017', 'MICTH/Asset/01/02/10/017', '(MICTH/Asset/01/02/10/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '018', 'MICTH/Asset/01/02/10/018', '(MICTH/Asset/01/02/10/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '019', 'MICTH/Asset/01/02/10/019', '(MICTH/Asset/01/02/10/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '020', 'MICTH/Asset/01/02/10/020', '(MICTH/Asset/01/02/10/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '021', 'MICTH/Asset/01/02/10/021', '(MICTH/Asset/01/02/10/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '022', 'MICTH/Asset/01/02/10/022', '(MICTH/Asset/01/02/10/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '023', 'MICTH/Asset/01/02/10/023', '(MICTH/Asset/01/02/10/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '024', 'MICTH/Asset/01/02/10/024', '(MICTH/Asset/01/02/10/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Visitor Mesh Chair', '10', '025', 'MICTH/Asset/01/02/10/025', '(MICTH/Asset/01/02/10/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Dang Highback Mesh Chair', '11', '001', 'MICTH/Asset/01/02/11/001', '(MICTH/Asset/01/02/11/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Dang Highback Mesh Chair', '11', '002', 'MICTH/Asset/01/02/11/002', '(MICTH/Asset/01/02/11/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Highback Chair', '12', '001', 'MICTH/Asset/01/02/12/001', '(MICTH/Asset/01/02/12/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '001', 'MICTH/Asset/01/02/13/001', '(MICTH/Asset/01/02/13/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '002', 'MICTH/Asset/01/02/13/002', '(MICTH/Asset/01/02/13/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '003', 'MICTH/Asset/01/02/13/003', '(MICTH/Asset/01/02/13/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '004', 'MICTH/Asset/01/02/13/004', '(MICTH/Asset/01/02/13/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '005', 'MICTH/Asset/01/02/13/005', '(MICTH/Asset/01/02/13/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '006', 'MICTH/Asset/01/02/13/006', '(MICTH/Asset/01/02/13/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '007', 'MICTH/Asset/01/02/13/007', '(MICTH/Asset/01/02/13/007)', 'Picture', '', '2024', '');
INSERT INTO `asset_management_vba` (`Category`, `Category_ID`, `Sub_Category`, `Sub_Category_ID`, `Model`, `Model_ID`, `Running_No`, `Full_ID (Concatenated ID)`, `Barcode`, `SERIAL_NO`, `DATE_OF_PURCHASE`, `SUPPLIER`, `status`) VALUES
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '008', 'MICTH/Asset/01/02/13/008', '(MICTH/Asset/01/02/13/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '009', 'MICTH/Asset/01/02/13/009', '(MICTH/Asset/01/02/13/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '010', 'MICTH/Asset/01/02/13/010', '(MICTH/Asset/01/02/13/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '011', 'MICTH/Asset/01/02/13/011', '(MICTH/Asset/01/02/13/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '012', 'MICTH/Asset/01/02/13/012', '(MICTH/Asset/01/02/13/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '013', 'MICTH/Asset/01/02/13/013', '(MICTH/Asset/01/02/13/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '014', 'MICTH/Asset/01/02/13/014', '(MICTH/Asset/01/02/13/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '015', 'MICTH/Asset/01/02/13/015', '(MICTH/Asset/01/02/13/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '016', 'MICTH/Asset/01/02/13/016', '(MICTH/Asset/01/02/13/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '017', 'MICTH/Asset/01/02/13/017', '(MICTH/Asset/01/02/13/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '018', 'MICTH/Asset/01/02/13/018', '(MICTH/Asset/01/02/13/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '019', 'MICTH/Asset/01/02/13/019', '(MICTH/Asset/01/02/13/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '020', 'MICTH/Asset/01/02/13/020', '(MICTH/Asset/01/02/13/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '021', 'MICTH/Asset/01/02/13/021', '(MICTH/Asset/01/02/13/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Hugo Visitor Chair', '13', '022', 'MICTH/Asset/01/02/13/022', '(MICTH/Asset/01/02/13/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Cambridge Island Bench', '14', '001', 'MICTH/Asset/01/02/14/001', '(MICTH/Asset/01/02/14/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '001', 'MICTH/Asset/01/02/15/001', '(MICTH/Asset/01/02/15/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '002', 'MICTH/Asset/01/02/15/002', '(MICTH/Asset/01/02/15/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Charlie Bar Chair', '15', '003', 'MICTH/Asset/01/02/15/003', '(MICTH/Asset/01/02/15/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Amit Island Chair', '16', '001', 'MICTH/Asset/01/02/16/001', '(MICTH/Asset/01/02/16/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Next Executive Table c/w Side Cabinet, Flipper Casing and Modesty Panel', '01', '001', 'MICTH/Asset/01/03/01/001', '(MICTH/Asset/01/03/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Homag Main Table - COO', '02', '001', 'MICTH/Asset/01/03/02/001', '(MICTH/Asset/01/03/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Noa Main Table c/w Flipper Casing', '03', '001', 'MICTH/Asset/01/03/03/001', '(MICTH/Asset/01/03/03/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '4 Seater L-Shape Table c/w Flipper Casing Spider Leg & Wire Terminal ', '04', '001', 'MICTH/Asset/01/03/04/001', '(MICTH/Asset/01/03/04/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '4 Seater L-Shape Table c/w Flipper Casing Spider Leg & Wire Terminal ', '04', '002', 'MICTH/Asset/01/03/04/002', '(MICTH/Asset/01/03/04/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '4 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '05', '001', 'MICTH/Asset/01/03/05/001', '(MICTH/Asset/01/03/05/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '001', 'MICTH/Asset/01/03/06/001', '(MICTH/Asset/01/03/06/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '002', 'MICTH/Asset/01/03/06/002', '(MICTH/Asset/01/03/06/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '003', 'MICTH/Asset/01/03/06/003', '(MICTH/Asset/01/03/06/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '004', 'MICTH/Asset/01/03/06/004', '(MICTH/Asset/01/03/06/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '005', 'MICTH/Asset/01/03/06/005', '(MICTH/Asset/01/03/06/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '6 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '06', '006', 'MICTH/Asset/01/03/06/006', '(MICTH/Asset/01/03/06/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '8 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '07', '001', 'MICTH/Asset/01/03/07/001', '(MICTH/Asset/01/03/07/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '8 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '07', '002', 'MICTH/Asset/01/03/07/002', '(MICTH/Asset/01/03/07/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '10 Seater Double Table c/w Flipper Casing, Spider Leg and Wire Terminal', '08', '001', 'MICTH/Asset/01/03/08/001', '(MICTH/Asset/01/03/08/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Coffee Table c/w Apple Shape Table Top (A)', '09', '001', 'MICTH/Asset/01/03/09/001', '(MICTH/Asset/01/03/09/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Bar Table c/w Round Shape Table Top', '10', '001', 'MICTH/Asset/01/03/10/001', '(MICTH/Asset/01/03/10/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '8\' Meeting Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '11', '001', 'MICTH/Asset/01/03/11/001', '(MICTH/Asset/01/03/11/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', '10\' Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '12', '001', 'MICTH/Asset/01/03/12/001', '(MICTH/Asset/01/03/12/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Custom Made Meeting Table c/w Flipper Casing, Wire Terminal and Spider Leg', '13', '001', 'MICTH/Asset/01/03/13/001', '(MICTH/Asset/01/03/13/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Rest Table', '14', '001', 'MICTH/Asset/01/03/14/001', '(MICTH/Asset/01/03/14/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Cambridge Island Table', '15', '001', 'MICTH/Asset/01/03/15/001', '(MICTH/Asset/01/03/15/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Josie Tea Table Set', '16', '001', 'MICTH/Asset/01/03/16/001', '(MICTH/Asset/01/03/16/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'High Cabinet - COO', '01', '001', 'MICTH/Asset/01/04/01/001', '(MICTH/Asset/01/04/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '001', 'MICTH/Asset/01/04/02/001', '(MICTH/Asset/01/04/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '002', 'MICTH/Asset/01/04/02/002', '(MICTH/Asset/01/04/02/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '003', 'MICTH/Asset/01/04/02/003', '(MICTH/Asset/01/04/02/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '004', 'MICTH/Asset/01/04/02/004', '(MICTH/Asset/01/04/02/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '005', 'MICTH/Asset/01/04/02/005', '(MICTH/Asset/01/04/02/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '006', 'MICTH/Asset/01/04/02/006', '(MICTH/Asset/01/04/02/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '007', 'MICTH/Asset/01/04/02/007', '(MICTH/Asset/01/04/02/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '008', 'MICTH/Asset/01/04/02/008', '(MICTH/Asset/01/04/02/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '009', 'MICTH/Asset/01/04/02/009', '(MICTH/Asset/01/04/02/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '010', 'MICTH/Asset/01/04/02/010', '(MICTH/Asset/01/04/02/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '011', 'MICTH/Asset/01/04/02/011', '(MICTH/Asset/01/04/02/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '012', 'MICTH/Asset/01/04/02/012', '(MICTH/Asset/01/04/02/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '013', 'MICTH/Asset/01/04/02/013', '(MICTH/Asset/01/04/02/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '014', 'MICTH/Asset/01/04/02/014', '(MICTH/Asset/01/04/02/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '015', 'MICTH/Asset/01/04/02/015', '(MICTH/Asset/01/04/02/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '016', 'MICTH/Asset/01/04/02/016', '(MICTH/Asset/01/04/02/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '017', 'MICTH/Asset/01/04/02/017', '(MICTH/Asset/01/04/02/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '018', 'MICTH/Asset/01/04/02/018', '(MICTH/Asset/01/04/02/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '019', 'MICTH/Asset/01/04/02/019', '(MICTH/Asset/01/04/02/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '020', 'MICTH/Asset/01/04/02/020', '(MICTH/Asset/01/04/02/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '021', 'MICTH/Asset/01/04/02/021', '(MICTH/Asset/01/04/02/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '022', 'MICTH/Asset/01/04/02/022', '(MICTH/Asset/01/04/02/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '023', 'MICTH/Asset/01/04/02/023', '(MICTH/Asset/01/04/02/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '024', 'MICTH/Asset/01/04/02/024', '(MICTH/Asset/01/04/02/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '025', 'MICTH/Asset/01/04/02/025', '(MICTH/Asset/01/04/02/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '026', 'MICTH/Asset/01/04/02/026', '(MICTH/Asset/01/04/02/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '027', 'MICTH/Asset/01/04/02/027', '(MICTH/Asset/01/04/02/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '028', 'MICTH/Asset/01/04/02/028', '(MICTH/Asset/01/04/02/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Semi Swinging Door Medium Cabinet ', '02', '029', 'MICTH/Asset/01/04/02/029', '(MICTH/Asset/01/04/02/029)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '001', 'MICTH/Asset/01/04/03/001', '(MICTH/Asset/01/04/03/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '002', 'MICTH/Asset/01/04/03/002', '(MICTH/Asset/01/04/03/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '003', 'MICTH/Asset/01/04/03/003', '(MICTH/Asset/01/04/03/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '004', 'MICTH/Asset/01/04/03/004', '(MICTH/Asset/01/04/03/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '005', 'MICTH/Asset/01/04/03/005', '(MICTH/Asset/01/04/03/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '006', 'MICTH/Asset/01/04/03/006', '(MICTH/Asset/01/04/03/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '007', 'MICTH/Asset/01/04/03/007', '(MICTH/Asset/01/04/03/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '008', 'MICTH/Asset/01/04/03/008', '(MICTH/Asset/01/04/03/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '009', 'MICTH/Asset/01/04/03/009', '(MICTH/Asset/01/04/03/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '010', 'MICTH/Asset/01/04/03/010', '(MICTH/Asset/01/04/03/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '011', 'MICTH/Asset/01/04/03/011', '(MICTH/Asset/01/04/03/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '012', 'MICTH/Asset/01/04/03/012', '(MICTH/Asset/01/04/03/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '013', 'MICTH/Asset/01/04/03/013', '(MICTH/Asset/01/04/03/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '014', 'MICTH/Asset/01/04/03/014', '(MICTH/Asset/01/04/03/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '015', 'MICTH/Asset/01/04/03/015', '(MICTH/Asset/01/04/03/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '016', 'MICTH/Asset/01/04/03/016', '(MICTH/Asset/01/04/03/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '017', 'MICTH/Asset/01/04/03/017', '(MICTH/Asset/01/04/03/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '018', 'MICTH/Asset/01/04/03/018', '(MICTH/Asset/01/04/03/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '019', 'MICTH/Asset/01/04/03/019', '(MICTH/Asset/01/04/03/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '020', 'MICTH/Asset/01/04/03/020', '(MICTH/Asset/01/04/03/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '021', 'MICTH/Asset/01/04/03/021', '(MICTH/Asset/01/04/03/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '022', 'MICTH/Asset/01/04/03/022', '(MICTH/Asset/01/04/03/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '023', 'MICTH/Asset/01/04/03/023', '(MICTH/Asset/01/04/03/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '024', 'MICTH/Asset/01/04/03/024', '(MICTH/Asset/01/04/03/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '025', 'MICTH/Asset/01/04/03/025', '(MICTH/Asset/01/04/03/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '026', 'MICTH/Asset/01/04/03/026', '(MICTH/Asset/01/04/03/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '027', 'MICTH/Asset/01/04/03/027', '(MICTH/Asset/01/04/03/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Swing Half height Cabinet', '03', '028', 'MICTH/Asset/01/04/03/028', '(MICTH/Asset/01/04/03/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '001', 'MICTH/Asset/01/05/01/001', '(MICTH/Asset/01/05/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '002', 'MICTH/Asset/01/05/01/002', '(MICTH/Asset/01/05/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '003', 'MICTH/Asset/01/05/01/003', '(MICTH/Asset/01/05/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '004', 'MICTH/Asset/01/05/01/004', '(MICTH/Asset/01/05/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '005', 'MICTH/Asset/01/05/01/005', '(MICTH/Asset/01/05/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '006', 'MICTH/Asset/01/05/01/006', '(MICTH/Asset/01/05/01/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '007', 'MICTH/Asset/01/05/01/007', '(MICTH/Asset/01/05/01/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '4 Bay Mobile Compactor', '01', '008', 'MICTH/Asset/01/05/01/008', '(MICTH/Asset/01/05/01/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Compactor', '05', '6 Bay Mobile Compactor', '02', '001', 'MICTH/Asset/01/05/02/001', '(MICTH/Asset/01/05/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '001', 'MICTH/Asset/01/06/01/001', '(MICTH/Asset/01/06/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '002', 'MICTH/Asset/01/06/01/002', '(MICTH/Asset/01/06/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '003', 'MICTH/Asset/01/06/01/003', '(MICTH/Asset/01/06/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '004', 'MICTH/Asset/01/06/01/004', '(MICTH/Asset/01/06/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '005', 'MICTH/Asset/01/06/01/005', '(MICTH/Asset/01/06/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '006', 'MICTH/Asset/01/06/01/006', '(MICTH/Asset/01/06/01/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '007', 'MICTH/Asset/01/06/01/007', '(MICTH/Asset/01/06/01/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '008', 'MICTH/Asset/01/06/01/008', '(MICTH/Asset/01/06/01/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '009', 'MICTH/Asset/01/06/01/009', '(MICTH/Asset/01/06/01/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '010', 'MICTH/Asset/01/06/01/010', '(MICTH/Asset/01/06/01/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '011', 'MICTH/Asset/01/06/01/011', '(MICTH/Asset/01/06/01/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '012', 'MICTH/Asset/01/06/01/012', '(MICTH/Asset/01/06/01/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '013', 'MICTH/Asset/01/06/01/013', '(MICTH/Asset/01/06/01/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '014', 'MICTH/Asset/01/06/01/014', '(MICTH/Asset/01/06/01/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '015', 'MICTH/Asset/01/06/01/015', '(MICTH/Asset/01/06/01/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '016', 'MICTH/Asset/01/06/01/016', '(MICTH/Asset/01/06/01/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '017', 'MICTH/Asset/01/06/01/017', '(MICTH/Asset/01/06/01/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '018', 'MICTH/Asset/01/06/01/018', '(MICTH/Asset/01/06/01/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '019', 'MICTH/Asset/01/06/01/019', '(MICTH/Asset/01/06/01/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '020', 'MICTH/Asset/01/06/01/020', '(MICTH/Asset/01/06/01/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '021', 'MICTH/Asset/01/06/01/021', '(MICTH/Asset/01/06/01/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '022', 'MICTH/Asset/01/06/01/022', '(MICTH/Asset/01/06/01/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '023', 'MICTH/Asset/01/06/01/023', '(MICTH/Asset/01/06/01/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '024', 'MICTH/Asset/01/06/01/024', '(MICTH/Asset/01/06/01/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '025', 'MICTH/Asset/01/06/01/025', '(MICTH/Asset/01/06/01/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '026', 'MICTH/Asset/01/06/01/026', '(MICTH/Asset/01/06/01/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '027', 'MICTH/Asset/01/06/01/027', '(MICTH/Asset/01/06/01/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '028', 'MICTH/Asset/01/06/01/028', '(MICTH/Asset/01/06/01/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '029', 'MICTH/Asset/01/06/01/029', '(MICTH/Asset/01/06/01/029)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '030', 'MICTH/Asset/01/06/01/030', '(MICTH/Asset/01/06/01/030)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '031', 'MICTH/Asset/01/06/01/031', '(MICTH/Asset/01/06/01/031)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '032', 'MICTH/Asset/01/06/01/032', '(MICTH/Asset/01/06/01/032)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '033', 'MICTH/Asset/01/06/01/033', '(MICTH/Asset/01/06/01/033)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '034', 'MICTH/Asset/01/06/01/034', '(MICTH/Asset/01/06/01/034)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '035', 'MICTH/Asset/01/06/01/035', '(MICTH/Asset/01/06/01/035)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '036', 'MICTH/Asset/01/06/01/036', '(MICTH/Asset/01/06/01/036)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Modesty Panel', '06', 'Rectangular Modesty Panel c/w Bracket', '01', '037', 'MICTH/Asset/01/06/01/037', '(MICTH/Asset/01/06/01/037)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '001', 'MICTH/Asset/01/07/01/001', '(MICTH/Asset/01/07/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '002', 'MICTH/Asset/01/07/01/002', '(MICTH/Asset/01/07/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '003', 'MICTH/Asset/01/07/01/003', '(MICTH/Asset/01/07/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '004', 'MICTH/Asset/01/07/01/004', '(MICTH/Asset/01/07/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '005', 'MICTH/Asset/01/07/01/005', '(MICTH/Asset/01/07/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '006', 'MICTH/Asset/01/07/01/006', '(MICTH/Asset/01/07/01/006)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '007', 'MICTH/Asset/01/07/01/007', '(MICTH/Asset/01/07/01/007)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '008', 'MICTH/Asset/01/07/01/008', '(MICTH/Asset/01/07/01/008)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '009', 'MICTH/Asset/01/07/01/009', '(MICTH/Asset/01/07/01/009)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '010', 'MICTH/Asset/01/07/01/010', '(MICTH/Asset/01/07/01/010)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '011', 'MICTH/Asset/01/07/01/011', '(MICTH/Asset/01/07/01/011)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '012', 'MICTH/Asset/01/07/01/012', '(MICTH/Asset/01/07/01/012)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '013', 'MICTH/Asset/01/07/01/013', '(MICTH/Asset/01/07/01/013)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '014', 'MICTH/Asset/01/07/01/014', '(MICTH/Asset/01/07/01/014)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '015', 'MICTH/Asset/01/07/01/015', '(MICTH/Asset/01/07/01/015)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '016', 'MICTH/Asset/01/07/01/016', '(MICTH/Asset/01/07/01/016)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '017', 'MICTH/Asset/01/07/01/017', '(MICTH/Asset/01/07/01/017)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '018', 'MICTH/Asset/01/07/01/018', '(MICTH/Asset/01/07/01/018)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '019', 'MICTH/Asset/01/07/01/019', '(MICTH/Asset/01/07/01/019)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '020', 'MICTH/Asset/01/07/01/020', '(MICTH/Asset/01/07/01/020)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '021', 'MICTH/Asset/01/07/01/021', '(MICTH/Asset/01/07/01/021)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '022', 'MICTH/Asset/01/07/01/022', '(MICTH/Asset/01/07/01/022)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '023', 'MICTH/Asset/01/07/01/023', '(MICTH/Asset/01/07/01/023)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '024', 'MICTH/Asset/01/07/01/024', '(MICTH/Asset/01/07/01/024)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '025', 'MICTH/Asset/01/07/01/025', '(MICTH/Asset/01/07/01/025)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '026', 'MICTH/Asset/01/07/01/026', '(MICTH/Asset/01/07/01/026)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '027', 'MICTH/Asset/01/07/01/027', '(MICTH/Asset/01/07/01/027)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '028', 'MICTH/Asset/01/07/01/028', '(MICTH/Asset/01/07/01/028)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '029', 'MICTH/Asset/01/07/01/029', '(MICTH/Asset/01/07/01/029)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '030', 'MICTH/Asset/01/07/01/030', '(MICTH/Asset/01/07/01/030)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '031', 'MICTH/Asset/01/07/01/031', '(MICTH/Asset/01/07/01/031)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '032', 'MICTH/Asset/01/07/01/032', '(MICTH/Asset/01/07/01/032)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '033', 'MICTH/Asset/01/07/01/033', '(MICTH/Asset/01/07/01/033)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '034', 'MICTH/Asset/01/07/01/034', '(MICTH/Asset/01/07/01/034)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '035', 'MICTH/Asset/01/07/01/035', '(MICTH/Asset/01/07/01/035)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '036', 'MICTH/Asset/01/07/01/036', '(MICTH/Asset/01/07/01/036)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '037', 'MICTH/Asset/01/07/01/037', '(MICTH/Asset/01/07/01/037)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Tempered Glass', '07', 'Tempered Glass Partition', '01', '038', 'MICTH/Asset/01/07/01/038', '(MICTH/Asset/01/07/01/038)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Framed Wall Art', '01', '005', 'MICTH/Asset/01/08/01/005', '(MICTH/Asset/01/08/01/005)', '', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Framed Wall Art', '01', '002', 'MICTH/Asset/01/08/01/002', '(MICTH/Asset/01/08/01/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Framed Wall Art', '01', '003', 'MICTH/Asset/01/08/01/003', '(MICTH/Asset/01/08/01/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Framed Wall Art', '01', '004', 'MICTH/Asset/01/08/01/004', '(MICTH/Asset/01/08/01/004)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Framed Wall Art', '01', '005', 'MICTH/Asset/01/08/01/005', '(MICTH/Asset/01/08/01/005)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Table Lamp', '02', '001', 'MICTH/Asset/01/08/02/001', '(MICTH/Asset/01/08/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Table Lamp', '02', '002', 'MICTH/Asset/01/08/02/002', '(MICTH/Asset/01/08/02/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Table Lamp', '02', '003', 'MICTH/Asset/01/08/02/003', '(MICTH/Asset/01/08/02/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Standing Lamp', '03', '001', 'MICTH/Asset/01/08/03/001', '(MICTH/Asset/01/08/03/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Sofa', '09', 'Manhattan Mid-Century L Shaped Sofa', '01', '001', 'MICTH/Asset/01/09/01/001', '(MICTH/Asset/01/09/01/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Letitia Chair', '17', '001', 'MICTH/Asset/01/02/17/001', '(MICTH/Asset/01/02/17/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Letitia Chair', '17', '002', 'MICTH/Asset/01/02/17/002', '(MICTH/Asset/01/02/17/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Bruno Coffee Table', '17', '001', 'MICTH/Asset/01/03/17/001', '(MICTH/Asset/01/03/17/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Bruno Coffee Table', '17', '002', 'MICTH/Asset/01/03/17/002', '(MICTH/Asset/01/03/17/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Hattie Coffee Table (S)', '18', '001', 'MICTH/Asset/01/03/18/001', '(MICTH/Asset/01/03/18/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Hattie Coffee Table (M)', '19', '001', 'MICTH/Asset/01/03/19/001', '(MICTH/Asset/01/03/19/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Sofa', '09', 'Manhattan Mid-Century 3 Seater Sofa', '02', '001', 'MICTH/Asset/01/09/02/001', '(MICTH/Asset/01/09/02/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Breuer Armchair', '18', '001', 'MICTH/Asset/01/02/18/001', '(MICTH/Asset/01/02/18/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Becker Dining Chair', '19', '001', 'MICTH/Asset/01/02/19/001', '(MICTH/Asset/01/02/19/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Chair', '02', 'Becker Dining Chair', '19', '002', 'MICTH/Asset/01/02/19/002', '(MICTH/Asset/01/02/19/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Wall Clock', '04', '001', 'MICTH/Asset/01/08/04/001', '(MICTH/Asset/01/08/04/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Decoration', '08', 'Wall Clock', '04', '002', 'MICTH/Asset/01/08/04/002', '(MICTH/Asset/01/08/04/002)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Sofa', '09', '2 Seater Modern Sofa', '03', '001', 'MICTH/Asset/01/09/03/001', '(MICTH/Asset/01/09/03/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Abdullah Coffee Table ', '20', '001', 'MICTH/Asset/01/03/20/001', '(MICTH/Asset/01/03/20/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'Bruno Coffee Table', '17', '003', 'MICTH/Asset/01/03/17/003', '(MICTH/Asset/01/03/17/003)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Sofa', '09', 'Alson Eco Fabric 3 Seater Sofa', '04', '001', 'MICTH/Asset/01/09/04/001', '(MICTH/Asset/01/09/04/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Cabinet', '04', 'Mabelle TV Cabinet', '04', '001', 'MICTH/Asset/01/04/04/001', '(MICTH/Asset/01/04/04/001)', 'Picture', '', '2024', ''),
('Furniture', 1, 'Table', '03', 'TAJA Rectangle Glass Console Table', '21', '001', 'MICTH/Asset/01/03/21/001', '(MICTH/Asset/01/03/21/001)', 'Picture', '', '2024', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', ''),
('Furniture', 1, '', '', '', '', '', '', '()', '#CONNECT!', '', '', '');

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
(1, 1, 'LAPTOP '),
(2, 2, 'hp'),
(4, 4, 'Drawer'),
(5, 4, 'CHAIR'),
(6, 4, 'CABINET'),
(7, 4, 'TABLE'),
(8, 4, 'COMPACTOR'),
(9, 4, 'MODESTY PANEL'),
(10, 4, 'Tempered Glass'),
(11, 4, 'SOFA');

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
(4, 'FURNITURE', '01'),
(5, 'ICT EQUIPMENT', '02'),
(6, 'OFFICE EQUIPMENT', '03');

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
(5, 'Furniture', 'Drawer', '', 'Mobile 3 Drawer', '', '', '001', '', '', '1/1/1970', '0000-00-00', '', 'Muhammad Farid Bin Ariffin', 'MICTH/Asset/01/01/01/001', '', '', '', '5', 'HOD Room', 'Active');

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
(3, '', 'Mudahan Berjaya Engineering Sdn Bhd', 'NO. 3941, 1, Jalan Angsa Mas 1, Taman Angsa Mas, Gangsa 76100 Durian Tunggal, Melaka', '065533066'),
(4, 'CustomerFirst.My@harveynorman.com.my', 'Elitetrax Marketing Sdn. Bhd. (HARVEY NORMAN)', 'Menara Harvey Norman, Level 5, 13A, Jalan 51A/219\r\nSeksyen 51A 46100 Petaling Jaya, Selangor.', '03-7931 8439'),
(5, 'louistay@vstecs.com.my', 'VSTECS ASTAR SDN BHD', 'Lot 3, Jalan Teknologi 3/5,\r\nTaman Sains Selangor,\r\nKota Damansara,\r\n47810 Petaling Jaya, Selangor', '03­6286 8222'),
(6, 'shahrolhensem@gmail.com', 'Shahrol Enterprise', 'Johor', '012-3456789');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposal_reason`
--
ALTER TABLE `disposal_reason`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategoritps`
--
ALTER TABLE `kategoritps`
  MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_aset`
--
ALTER TABLE `log_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req_aset`
--
ALTER TABLE `req_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req_reason`
--
ALTER TABLE `req_reason`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_daftar_aset`
--
ALTER TABLE `tbl_daftar_aset`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pembekal`
--
ALTER TABLE `tbl_pembekal`
  MODIFY `id_pembekal` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
