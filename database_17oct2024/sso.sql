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
-- Database: `sso`
--

-- --------------------------------------------------------

--
-- Table structure for table `empdept`
--

CREATE TABLE `empdept` (
  `dept_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nickname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empdept`
--

INSERT INTO `empdept` (`dept_id`, `name`, `nickname`) VALUES
(1, 'Chief Executive Officer', 'CEO'),
(2, 'Chief Operating Officer', 'COO'),
(3, 'Finance & Account', 'FiAD'),
(4, 'Telecommunication Infrastructure', 'BIT'),
(5, 'Human Resources & Admin', 'HRAD'),
(6, 'Corporate, Legal & Integrity', 'DCLI'),
(7, 'Digital & Information Technology', 'DTM'),
(8, 'Commercial Unit', 'BCOM'),
(9, 'Internal Audit', 'BAD'),
(10, 'Developer', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `empjobtitle`
--

CREATE TABLE `empjobtitle` (
  `job_id` int(50) NOT NULL,
  `job_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empjobtitle`
--

INSERT INTO `empjobtitle` (`job_id`, `job_title`) VALUES
(1, 'Admin Assistant'),
(2, 'Assistant Manager'),
(3, 'Assistant Officer'),
(4, 'Chief Executive Officer'),
(5, 'Chief Operating Officer'),
(6, 'Driver'),
(7, 'Executive'),
(8, 'Head'),
(9, 'Manager'),
(10, 'Officer'),
(11, 'Liaison Officer'),
(12, 'PSH'),
(13, 'Senior Executive'),
(14, 'Senior Manager'),
(15, 'Technician'),
(16, 'Protégé');

-- --------------------------------------------------------

--
-- Table structure for table `empmaininfo`
--

CREATE TABLE `empmaininfo` (
  `Internal_Id` int(250) NOT NULL,
  `First_Name` varchar(250) NOT NULL,
  `Last_Name` varchar(250) NOT NULL,
  `Preferred_Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile_phone` varchar(250) NOT NULL,
  `Job_Title` varchar(250) NOT NULL,
  `Employment_Type` varchar(250) NOT NULL,
  `Manager` varchar(250) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Joining_Date` varchar(250) NOT NULL,
  `Employment_End_Date` varchar(250) NOT NULL,
  `Active_Inactive` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `func_admin` tinyint(1) DEFAULT 0,
  `access_isurat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `access_aset` int(255) NOT NULL,
  `access_imobile` int(255) NOT NULL,
  `access_eoutstation` int(255) NOT NULL,
  `access_tower` int(255) NOT NULL,
  `admin_booking` int(255) NOT NULL,
  `admin_outstation` int(255) NOT NULL,
  `admin_asset` int(255) NOT NULL,
  `admin_surat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empmaininfo`
--

INSERT INTO `empmaininfo` (`Internal_Id`, `First_Name`, `Last_Name`, `Preferred_Name`, `Email`, `Mobile_phone`, `Job_Title`, `Employment_Type`, `Manager`, `Department`, `Joining_Date`, `Employment_End_Date`, `Active_Inactive`, `user_password`, `user_name`, `func_admin`, `access_isurat`, `access_aset`, `access_imobile`, `access_eoutstation`, `access_tower`, `admin_booking`, `admin_outstation`, `admin_asset`, `admin_surat`) VALUES
(0, 'Developer', 'Sem', '', 'developer@dud.com', '', '', '', '', '11', '', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Developer', 1, '1', 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'Nor Ezatty As Shuhadah', 'Binti Rohaizad', '', 'ezattyrohaizad@micth.com', '012-7382197', '10', 'Full Time', '3', '4', '1/4/2020', '', 'Active', '8118186fbec33a50240530df41adcb3d', 'ezatty', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(5, 'Nurul Fara Nadia', 'Binti Abd Halim', '', 'faranadia@micth.com', '014-9838975', '10', 'Full time', '8', '6', '1/4/2020', '', 'Active', '020869e2cc373b90d1e6e8d6af8492bc', 'Fara Nadia', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6, 'Siti Wahida', 'Binti Md Desa', '', 'wahida@micth.com', '017-4503937', '10', 'Full Time', '5', '5', '1/4/2020', '', 'Active', '4bf30fbf037727fafe4a1a60bfca8ba0', 'wahida', 1, '1', 0, 1, 1, 0, 0, 1, 0, 0),
(10, 'Mohd Jailani', 'Bin Deraman', '', 'jailani@micth.com', '016-6874345', '5', 'Full time', '2', '2', '8/3/2021', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'jailani', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(11, 'Iylia Hamizah', 'Binti Mohd Hapiz', '', 'iyliahamizah@micth.com', '019-6663929', '10', 'Full time', '6', '8', '1/4/2022', '', 'Active', 'dfd788dc7b238eb9e8e1c65880185f1b', 'iylia', 0, '1', 0, 1, 1, 1, 0, 0, 0, 0),
(12, 'Noordiana', 'Binti Mohd Lazim', '', 'noordiana@micth.com', '011-31745312', '3', 'Full time', '6', '8', '1/4/2022', '', 'Active', 'd54d7732a0547c45f9518e096adb6323', 'diana', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(13, 'Nor Fitriah', 'Binti Abdullah', '', 'norfitriah@micth.com', '017-6756524', '10', 'Full time', '7', '7', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'fitriah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(14, 'Nurul Atiqah', 'Binti Abdullah', '', 'nurulatiqah@micth.com', '010-2152767', '10', 'Full Time', '5', '5', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'nurulatiqah', 1, '1', 0, 1, 1, 0, 1, 1, 0, 0),
(1124, 'Nur Zayanah', 'Binti Hussin', '', 'nurzayanah@micth.com', '012-6881746', '3', 'Full time', '4', '3', '1/12/2020', '', 'Active', '2b36c5578fbfacc1e31d9f0c42b02fc4', 'zayanah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(1145, 'Norsyahira', 'Binti Ahmad Sauffi', '', 'norsyahira@micth.com', '013-2195338', '10', 'Full Time', '7', '7', '1/7/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'syahira', 1, '1', 1, 1, 1, 1, 1, 1, 1, 1),
(2006, 'Mohamad Hamdan', 'Bin Dzulkarnain', '', 'hamdan@micth.com', '017-6249729', '15', 'Full time', '5', '5', '3/5/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'hamdan', 0, '1', 0, 1, 1, 0, 1, 0, 0, 0),
(2013, 'Wan Mohd Neezam', 'Bin Wan Nasir', '', 'neezam@micth.com', '016-7172643', '7', 'Full time', '3', '4', '24/2/2014', '', 'Active', '33418747977b825591b3d08c6d6fdfba', 'neezam', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(2014, 'Juriani ', 'Binti Jalani', '', 'juriani@micth.com', '012-3915847', '7', 'Full time', '3', '4', '24/2/2014', '', 'Active', 'c6d90d04f5ac8fe5ede8354eabc55f2a', 'juriani', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3001, 'Norasiyah', 'Binti Abd Majid', '', 'norasiyah@micth.com', '016-7173951', '7', 'Full time', '4', '3', '18/3/2013', '', 'Active', '568894f10fedf79d78788ec71b46a5ed', 'norasiyah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3007, 'Norwajunizam', 'Bin Abd Wahab', '', 'junizam@micth.com', '019-2790000', '9', 'Full time', '2', '8', '15/6/2016', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'norwajunizam', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3012, 'Mohamad Hod', 'Bin Rabu', '', 'mohamadhod@micth.com', '010-7731639', '9', 'Full time', '2', '3', '14/8/2019', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Hod', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3013, 'Ahmadee', 'Bin Abdullah', '', 'ahmadee@micth.com', '011-10024752', '7', 'Full time', '4', '3', '14/8/2019', '', 'Active', '2f904b016429fb8de3b64d5d2bc40b81', 'ahmadee', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3014, 'Rizawani', 'Binti Mohd Sumbuti', '', 'rizawani@micth.com', '016-6140491', '7', 'Full time', '4', '3', '14/8/2019', '', 'Active', '56cce7e3e260d08c6d785f89272888af', 'RIZAWANI', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(3015, 'Nur Farhana', 'Binti Noordin', '', 'farhana@micth.com', '011-56682779', '7', 'Full time', '4', '3', '11/11/2019', '', 'Active', 'cc47639bec7f2fc3cdd7c04b9207aed9', 'farhana', 0, '1', 0, 1, 1, 1, 0, 0, 0, 0),
(3016, 'Noorfaiezah', 'Binti Idris', '', 'noorfaiezah@micth.com', '019-6496457', '10', 'Full time', '4', '3', '1/4/2021', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'noorfaiezah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4683, 'Azimah', 'Binti Ibrahim', '', 'azimah@micth.com', '016-6407288', '2', 'Full time', '5', '5', '3/10/2011', '', 'Active', 'ed27d87697daa31a75e02fd00086983f', 'azimah', 0, '1', 1, 1, 1, 0, 0, 0, 0, 0),
(4684, 'Alwani', 'Binti Naziri', '', 'alwani@micth.com', '012-6984684', '13', 'Full time', '8', '6', '3/10/2011', '', 'Active', '42201ce4dcbb9cae16773fcc7bf58a7a', 'alwani', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4689, 'Siti Nor Amieza', 'Binti Zohhani', '', 'amieza@micth.com', '014-9853926', '7', 'Full time', '3', '4', '13/1/2014', '', 'Active', '0ee7fff0ad2ddfea5da4dedd38b46ca9', 'amieza', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4703, 'Ainur Hawa', 'Binti Sulaiman', '', 'ainur.hawa@micth.com', '017-3442141', '7', 'Full time', '3', '4', '4/8/2014', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'ainurhawa93', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4704, 'Nur Amira', 'Binti Amra', '', 'amira@micth.com', '019-6595317', '7', 'Full time', '3', '4', '22/9/2014', '', 'Active', '3991e8f3f662901fd9524656e9e9046a', 'amira', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4707, 'Aidisham', 'Bin Abdul Manap', '', 'aidisham@micth.com', '013-4427192', '6', 'Full time', '5', '5', '26/8/2015', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'aidisham', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4710, 'Ridzuan', 'Bin Mohd Lazim', '', 'ridzuan@micth.com', '017-6034846', '1', 'Full time', '5', '5', '8/2/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Ridzuan', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4713, 'Noor Ashikin', 'Binti Said Ali', '', 'noorashikin@micth.com', '011-59258896', '10', 'Full time', '5', '5', '1/11/2018', '', 'Active', '14d65aaad94958b34e6c436e9f2dfed6', 'ASHIKIN', 0, '1', 0, 1, 1, 0, 1, 0, 1, 0),
(4714, 'Zulliana', 'Binti Muhammad', '', 'zulliana@micth.com', '012-6394116', '8', 'Full time', '2', '6', '1/11/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'zulliana', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(4715, 'Farah NurAzreen Fatehah', 'Binti Azme', '', 'f.azreen@micth.com', '019-7921841', '7', 'Full time', '7', '7', '3/12/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'farah', 0, '1', 0, 1, 1, 0, 1, 0, 0, 1),
(4724, 'Dr Nazdiana', 'Binti Ab.Wahab', '', 'nazdiana@micth.com', '019-6208622', '4', 'Full time', '1', '1', '20/7/2020', '', 'Active', 'ea0149b57459f52170396affcd890e45', 'nazdiana', 0, '1', 0, 1, 1, 0, 0, 1, 0, 1),
(4725, 'Muhammad Farid', 'Bin Ariffin', '', 'farid@micth.com', '013-3122779', '9', 'Full time', '2', '5', '1/2/2022', '', 'Active', 'ab28f4687278327babf562444c89850b', 'farid', 1, '1', 1, 1, 1, 1, 1, 1, 1, 1),
(5001, 'Ahmad Safwan', 'Bin Yusof', '', 'safwan@micth.com', '012-3623430', '14', 'Full time', '2', '4', '20/3/2006', '', 'Active', 'f45f72afb756cb8b91fd41720613b49a', 'safwan', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(5002, 'Muhammad Fadhil', 'Bin Abd Manap', '', 'fadhil@micth.com', '017-6677174', '2', 'Full time', '3', '4', '1/7/2008', '', 'Active', '6e84d099be69de5a8d0b1d5f1385cf00', 'fadhil', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6002, 'Nur Amalina', 'Binti Abd Rahman', '', 'nuramalina@micth.com', '011-23353575', '14', 'Full time', '2', '7', '15/8/2006', '', 'Active', '01356a60f2b64881e80c8d267edc47fd', 'amalina', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6003, 'Zainurriah', 'Binti Md Nor', '', 'zainurriah@micth.com', '011-32154530', '13', 'Full time', '6', '8', '12/2/2009', '', 'Active', '5a5cc47a933aeb6a5d40e165391fc0df', 'zainurriah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6004, 'Razliah', 'Binti Rahmat', '', 'razliah@micth.com', '016-7173067', '7', 'Full time', '2', '9', '4/7/2011', '', 'Active', 'ec57f52d26b20c22f7d929a520b5096e', 'razliah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6005, 'Mohamad Rosidi', 'Bin Roslan', '', 'rosidi@micth.com', '011-59924700', '10', 'Full time', '8', '6', '25/7/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'rosidi', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(6007, 'Mohamad Firdaus', 'Bin Abu', '', 'firdaus@micth.com', '016-7174023', '7', 'Full time', '3', '4', '3/12/2012', '', 'Active', '768907101dce3b6791bc4deec5e1905e', 'firdaus', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(7001, 'Muhammad Nazreeq', 'Bin Mohd  Nizam', '', 'nazreeq@micth.com', '010-4079700', '13', 'Full time', '7', '7', '1/8/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'nazreeq', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(7002, 'Raihana', 'Binti Abdullah', '', 'raihana@micth.com', '016-7172916', '2', 'Full time', '7', '7', '26/8/2010', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'raihana', 0, '1', 1, 1, 1, 0, 0, 0, 0, 0),
(7004, 'Chempaka', 'Mohd Din', '', 'chempaka@micth.com', '010-2311031', '7', 'Full time', '3', '4', '1/11/2018', '', 'Active', 'b55b88b2345f40220d5564697b8eaf29', 'chempakamohddin', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(8005, 'Sharifah Atiqah', 'Binti Wan Idrus', '', 'atiqah@micth.com', '016-3937154', '7', 'Full time', '3', '4', '1/10/2010', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'atiqah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9003, 'Aziz', 'Bin Abas @ Mohamed', '', 'aziz@micth.com', '017-6742917', '7', 'Full time', '3', '4', '15/8/2014', '', 'Active', '221bf122a646cd272b3f6145f9fe1f65', 'aziz@micth.com', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9004, 'Arzmein', 'Bin Shaharudin', '', 'arzmein@micth.com', '014-2327800', '13', 'Full time', '3', '4', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'arzmein', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9005, 'Azmeera', 'Binti Hashim', '', 'azmeera@micth.com', '017-8772120', '7', 'Full time', '3', '4', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'azmeera', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9006, 'Nur Ainna', 'Binti Abdul Rahim', '', 'nurainna@micth.com', '017-3330645', '7', 'Full time', '3', '4', '1/4/2022', '', 'Active', '27a2816d73cf9456c56068cd0c990c36', 'ainna', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9008, 'Muhammad Firdaus Naim', 'Bin Ramlan', '', 'firdausnaim@micth.com', '017-3907840', '15', 'Full time', '3', '4', '1/12/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'naim', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9009, 'Shahrol Nizam', 'Bin Masran', '', 'shahrol.nizam@micth.com', '011-31891180', '3', 'Full time', '5', '5', '9/1/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'shahrol', 0, '1', 1, 1, 1, 0, 1, 0, 1, 0),
(9010, 'Nor Diyana', 'Binti Osman', '', 'nordiyana@micth.com', '017-6612671', '3', 'Full time', '4', '3', '1/2/2023', '', 'Active', 'c3f66e3dfbd3c657d434eb02627c3dc5', 'Nordiyana', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9011, 'Siti Sara', 'Binti Rahim', '', 'sitisara@micth.com', '013-4831023', '10', 'Full time', '3', '4', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'sara', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9012, 'Farah NurAzlin Yasmine', 'Binti Azme', '', 'yasmine@micth.com', '011-23062133', '10', 'Full time', '6', '8', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'yasmine', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9013, 'Ahmad Muzhaffar', 'Bin Jeffri', '', 'muzhaffar@micth.com', '014-6360130', '10', 'Full time', '3', '4', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'muzhaffar', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9014, 'Muhammad Amir Luqman', 'Bin Mohmad Sujana', '', 'amirluqman@micth.com', '013-6793948', '10', 'Full time', '3', '4', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'amirluqman', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9015, 'Aszineezam', 'Bin Aziz', '', 'neezamaziz77@gmail.com', '010-2944974', '11', 'Full time', '8', '6', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'aszineezam', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9016, 'Mohammad Amirul Haqimi', 'Bin Ahmad Zulizham', '', 'amirulhaqimi@micth.com', '010-5777132', '3', 'Full time', '7', '7', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Haqimi', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9022, 'Abdallah Wedud', 'Bin Hisamudin', '', 'wedud123zz@gmail.com', '011-21970269', '3', 'Part Time', '7', '7', '15/1/2024', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'wedud', 0, '1', 1, 1, 1, 0, 1, 1, 1, 1),
(9023, 'Fatin Aisyah Maslan', 'Binti Abdul Hafiz', '', 'fatin.aisyah@micth.com', '011-61236811', '16', 'Part time', '4', '3', '1/4/2024', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'fatin', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9024, 'Nurnabilah Yasmin', 'Binti Abdul Razak', '', 'nurnabilah.yasmin@micth.com', '017-2565578', '16', 'Part time', '6', '8', '1/4/2024', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'nurnabilah', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0),
(9026, 'Muhammad Syahid', 'Bin Hasenan', '', 'syahidhasenan@gmail.com', '', '', '', '', '7', '', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'syahidhasenan@gmail.com', 0, '1', 1, 1, 1, 0, 0, 0, 0, 1),
(9027, 'Muhammad Aliff Fikri', 'Bin Anuar Hidayat', '', 'alifffikri2404@gmail.com', '', '', '', '', '7', '', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'alifffikri2404@gmail.com', 0, '1', 1, 1, 1, 1, 0, 0, 0, 1),
(9029, 'Nur Suhadah', 'Binti Ruziad', '', 'nur.suhadah@micth.com', '0168955531', '7', 'Full Time', '3', '4', '16/10/2024', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'nur.suhadah@micth.com', 0, '1', 0, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `empmanager`
--

CREATE TABLE `empmanager` (
  `manager_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empmanager`
--

INSERT INTO `empmanager` (`manager_id`, `name`) VALUES
(1, 'Datuk Seri Utama Ab Rauf Bin Yusoh'),
(2, 'Dr Nazdiana Binti Ab.Wahab'),
(3, 'Ahmad Safwan Bin Yusof'),
(4, 'Mohamad Hod Bin Rabu'),
(5, 'Muhammad Farid Bin Ariffin'),
(6, 'Norwajunizam Bin Abd Wahab'),
(7, 'Nur Amalina Binti Abd Rahman'),
(8, 'Zulliana Binti Muhammad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empdept`
--
ALTER TABLE `empdept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `empjobtitle`
--
ALTER TABLE `empjobtitle`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `empmaininfo`
--
ALTER TABLE `empmaininfo`
  ADD PRIMARY KEY (`Internal_Id`);

--
-- Indexes for table `empmanager`
--
ALTER TABLE `empmanager`
  ADD PRIMARY KEY (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empdept`
--
ALTER TABLE `empdept`
  MODIFY `dept_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `empjobtitle`
--
ALTER TABLE `empjobtitle`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `empmanager`
--
ALTER TABLE `empmanager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
