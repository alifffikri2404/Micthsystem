-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 03:36 AM
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
  `function_hr1` varchar(10) NOT NULL,
  `function_delete` varchar(10) NOT NULL,
  `function_Print_own` varchar(10) NOT NULL,
  `function_edit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empmaininfo`
--

INSERT INTO `empmaininfo` (`Internal_Id`, `First_Name`, `Last_Name`, `Preferred_Name`, `Email`, `Mobile_phone`, `Job_Title`, `Employment_Type`, `Manager`, `Department`, `Joining_Date`, `Employment_End_Date`, `Active_Inactive`, `user_password`, `user_name`, `function_hr1`, `function_delete`, `function_Print_own`, `function_edit`) VALUES
(3, 'Nor Ezatty As Shuhadah', 'Binti Rohaizad', '', 'ezattyrohaizad@micth.com.my', '012-7382197', 'Officer', 'Full Time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/4/2020', '', 'Active', '8118186fbec33a50240530df41adcb3d', 'ezatty', '0', '', '', ''),
(5, 'Nurul Fara Nadia', 'Binti Abd Halim', '', 'faranadia@micth.com.my', '014-9838975', 'Officer', 'Full time', '?', 'Corporate', '1/4/2020', '', 'Active', '020869e2cc373b90d1e6e8d6af8492bc', 'Fara Nadia', '0', '', '', ''),
(6, 'Siti Wahida', 'Binti Md Desa', '', 'wahida@micth.com', '017-4503937', 'Officer', 'Full Time', 'Muhammad Farid Bin Ariffin', 'Human Resources', '1/4/2020', '', 'Active', '4bf30fbf037727fafe4a1a60bfca8ba0', 'wahida', '1', '', '', ''),
(10, 'Mohd Jailani', 'Bin Deraman', '', 'jailani@micth.com', '016-6874345/012-5655177', 'Chief Operating Officer', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Telecommunication Infrastructure', '8/3/2021', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'jailani', '0', '', '', ''),
(11, 'Iylia Hamizah', 'Binti Mohd Hapiz', '', 'iyliahamizah@micth.com.my', '019-6663929', 'Officer', 'Full time', 'Norwajunizam Bin Abd Wahab', 'Commercial', '1/4/2022', '', 'Active', 'dfd788dc7b238eb9e8e1c65880185f1b', 'iylia', '0', '', '', ''),
(12, 'Noordiana', 'Binti Mohd Lazim', '', 'noordiana@micth.com', '011-31745312', 'Assistant Officer', 'Full time', 'Norwajunizam Bin Abd Wahab', 'Commercial', '1/4/2022', '', 'Active', 'd54d7732a0547c45f9518e096adb6323', 'diana', '0', '', '', ''),
(13, 'Nor Fitriah', 'Binti Abdullah', '', 'norfitriah@micth.com', '017-6756524', 'Officer', 'Full time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'fitriah', '0', '', '', ''),
(14, 'Nurul Atiqah', 'Binti Abdullah', '', 'nurulatiqah@micth.com', '010-2152767', 'Officer', 'Full Time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'nurulatiqah', '1', '0', '1', '1'),
(1124, 'Nur Zayanah', 'Binti Hussin', '', 'nurzayanah@micth.com', '012-6881746', 'Assistant Officer', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '1/12/2020', '', 'Active', '2b36c5578fbfacc1e31d9f0c42b02fc4', 'zayanah', '0', '', '', ''),
(1145, 'Norsyahira', 'Binti Ahmad Sauffi', '', 'norsyahira@micth.com', '013-2195338', 'Officer', 'Full Time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '1/7/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'syahira', '0', '', '', ''),
(1234, 'Abdallah wedud', 'Bin Hisamudin', '', 'wedud123@gmail.com', '01121970269', 'Officer', 'Full Time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'wedud', '0', '', '', ''),
(2006, 'Mohamad Hamdan', 'Bin Dzulkarnain', '', 'hamdan@micth.com', '016-7173951/017-6249729', 'Technician', 'Full time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '3/5/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'hamdan', '0', '0', '1', '1'),
(2013, 'Wan Mohd Neezam', 'Bin Wan Nasir', '', 'neezam@micth.com', '016-7172643/017-6094263', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '24/2/2014', '', 'Active', '33418747977b825591b3d08c6d6fdfba', 'neezam', '0', '', '', ''),
(2014, 'Juriani ', 'Binti Jalani', '', 'juriani@micth.com', '012-3915847', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '24/2/2014', '', 'Active', 'c6d90d04f5ac8fe5ede8354eabc55f2a', 'juriani', '0', '', '', ''),
(3001, 'Norasiyah', 'Binti Abd Majid', '', 'norasiyah@micth.com', '016-7173951', 'Executive', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '18/3/2013', '', 'Active', '568894f10fedf79d78788ec71b46a5ed', 'norasiyah', '0', '', '', ''),
(3007, 'Norwajunizam', 'Bin Abd Wahab', '', 'junizam@micth.com', '019-2790000', 'Manager', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Commercial', '15/6/2016', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'norwajunizam', '0', '', '', ''),
(3012, 'Mohamad Hod', 'Bin Rabu', '', 'mohamadhod@micth.com', '010-7731639', 'Manager', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Account', '14/8/2019', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Hod', '0', '', '', ''),
(3013, 'Ahmadee', 'Bin Abdullah', '', 'ahmadee@micth.com', '011-10024752', 'Executive', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '14/8/2019', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'ahmadee', '0', '', '', ''),
(3014, 'Rizawani', 'Binti Mohd Sumbuti', '', 'rizawani@micth.com', '016-6140491', 'Executive', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '14/8/2019', '', 'Active', '56cce7e3e260d08c6d785f89272888af', 'RIZAWANI', '0', '', '', ''),
(3015, 'Nur Farhana', 'Binti Noordin', '', 'farhana@micth.com.my', '011-56682779', 'Executive', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '11/11/2019', '', 'Active', 'cc47639bec7f2fc3cdd7c04b9207aed9', 'farhana', '0', '', '', ''),
(3016, 'Noorfaiezah', 'Binti Idris', '', 'noorfaiezah@micth.com', '019-6496457', 'Officer', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '1/4/2021', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'noorfaiezah', '0', '', '', ''),
(4683, 'Azimah', 'Binti Ibrahim', '', 'azimah@micth.com', '016-6407288', 'Assistant Manager', 'Full time', '?', 'Corporate', '3/10/2011', '', 'Active', 'ed27d87697daa31a75e02fd00086983f', 'azimah', '0', '', '', ''),
(4684, 'Alwani', 'Binti Naziri', '', 'alwani@micth.com', '012-6984684', 'Senior Executive', 'Full time', 'Zulliana Binti Muhammad', 'Legal & Integrity', '3/10/2011', '', 'Active', '81dc9bdb52d04dc20036dbd8313ed055', 'alwani', '0', '', '', ''),
(4689, 'Siti Nor Amieza', 'Binti Zohhani', '', 'amieza@micth.com', '014-9853926', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '13/1/2014', '', 'Active', '0ee7fff0ad2ddfea5da4dedd38b46ca9', 'amieza', '0', '', '', ''),
(4703, 'AINUR HAWA', 'BINTI SULAIMAN', '', '', '', 'Officer', 'Full Time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'ainurhawa93', '0', '', '', ''),
(4704, 'Nur Amira', 'Binti Amra', '', 'amira@micth.com', '019-6595317', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '22/9/2014', '', 'Active', '3991e8f3f662901fd9524656e9e9046a', 'amira', '0', '', '', ''),
(4707, 'Aidisham', 'Bin Abdul Manap', '', 'aidisham@micth.com', '013-4427192', 'Driver', 'Full time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '26/8/2015', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'aidisham', '0', '1', '1', '1'),
(4710, 'Ridzuan', 'Bin Mohd Lazim', '', 'ridzuan@micth.com', '017-6034846', 'Admin Assistant', 'Full time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '8/2/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Ridzuan', '0', '1', '1', '1'),
(4713, 'Noor Ashikin', 'Binti Said Ali', '', 'noorashikin@micth.com', '011-59258896', 'Officer', 'Full time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '1/11/2018', '', 'Active', '91a8a1c0b4d70c33ae03f65ec0566983', 'ASHIKIN', '0', '1', '1', '1'),
(4714, 'Zulliana', 'Binti Muhammad', '', 'zulliana@micth.com', '012-6394116', 'Head', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Legal & Integrity', '1/11/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'zulliana', '0', '', '', ''),
(4715, 'Farah Nur Azreen Fatehah', 'Binti Azme', '', 'f.azreen@micth.com', '019-7921841', 'Executive', 'Full time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '3/12/2018', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'farah', '0', '', '', ''),
(4724, 'Dr Nazdiana', 'Binti Ab.Wahab', '', 'nazdiana@micth.com', '019-6208622', 'Chief Executive Officer', 'Full time', 'Datuk Seri Utama Ab Rauf Bin Yusoh', 'CEO', '20/7/2020', '', 'Active', 'ea0149b57459f52170396affcd890e45', 'nazdiana', '0', '', '', ''),
(4725, 'Muhammad Farid', 'Bin Ariffin', '', 'farid@micth.com', '013-3122779', 'Manager', 'Full time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '1/2/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'farid', '1', '1', '1', '1'),
(5001, 'Ahmad Safwan', 'Bin Yusof', '', 'safwan@micth.com', '012-3623430', 'Senior Manager', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Telecommunication Infrastructure', '20/3/2006', '', 'Active', 'f45f72afb756cb8b91fd41720613b49a', 'safwan', '0', '', '', ''),
(5002, 'Muhammad Fadhil', 'Bin Abd Manap', '', 'fadhil@micth.com', '017-6677174', 'Assistant Manager', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/7/2008', '', 'Active', '6e84d099be69de5a8d0b1d5f1385cf00', 'fadhil', '0', '', '', ''),
(6002, 'Nur Amalina', 'Binti Abd Rahman', '', 'nuramalina@micth.com', '011-23353575', 'Senior Manager', 'Full time', 'Dr Nazdiana Binti Ab.Wahab', 'Digital & Information Technology', '15/8/2006', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'amalina', '0', '', '', ''),
(6003, 'Zainurriah', 'Binti Md Nor', '', 'zainurriah@micth.com', '011-32154530', 'Senior Executive', 'Full time', 'Norwajunizam Bin Abd Wahab', 'Commercial', '12/2/2009', '', 'Active', '5a5cc47a933aeb6a5d40e165391fc0df', 'zainurriah', '0', '', '', ''),
(6004, 'Razliah', 'Binti Rahmat', '', 'razliah@micth.com', '016-7173067', 'Executive', 'Full time', 'Raihana Binti Abdullah', 'Internal Audit', '4/7/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'razliah', '0', '', '', ''),
(6005, 'Mohamad Rosidi', 'Bin Roslan', '', 'rosidi@micth.com', '011-59924700/014-9681484', 'Officer', 'Full time', '?', 'Corporate', '25/7/2011', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'rosidi', '0', '', '', ''),
(6007, 'Mohamad Firdaus', 'Bin Abu', '', 'firdaus@micth.com', '016-7174023', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '3/12/2012', '', 'Active', '768907101dce3b6791bc4deec5e1905e', 'firdaus', '0', '', '', ''),
(7001, 'Muhammad Nazreeq', 'Bin Mohd  Nizam', '', 'nazreeq@micth.com', '010-4079700', 'Senior Executive', 'Full time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '1/8/2011', '', 'Active', '478973601bfe086ffccf8649b2893f34', 'nazreeq', '0', '', '', ''),
(7002, 'Raihana', 'Binti Abdullah', '', 'raihana@micth.com', '016-7172916', 'Assistant Manager', 'Full time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '26/8/2010', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'raihana', '0', '', '', ''),
(7004, 'Chempaka', 'Binti Mohd Din', '', 'chempaka@micth.com', '010-2311031', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/11/2018', '', 'Active', 'b55b88b2345f40220d5564697b8eaf29', 'chempakamohddin', '0', '', '', ''),
(8005, 'Sharifah Atiqah', 'Binti Wan Idrus', '', 'atiqah@micth.com', '016-3937154', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/10/2010', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'atiqah', '0', '', '', ''),
(9003, 'Aziz', 'Bin Abas @ Mohamed', '', 'aziz@micth.com', '176742917', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '15/8/2014', '', 'Active', '221bf122a646cd272b3f6145f9fe1f65', 'aziz@micth.com', '0', '', '', ''),
(9004, 'Arzmein', 'Bin Shaharudin', '', 'arzmein@micth.com', '014-2327800', 'Senior Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/4/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'arzmein', '0', '', '', ''),
(9005, 'Azmeera', 'Binti Hashim', '', 'azmeera@micth.com', '017-8772120', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/4/2022', '', 'Active', 'dd6cb4a2dfffb8b87c7e070c644dae3a', 'azmeera', '0', '', '', ''),
(9006, 'Nur Ainna', 'Binti Abdul Rahim', '', 'nurainna@micth.com', '017-3330645', 'Executive', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/4/2022', '', 'Active', '27a2816d73cf9456c56068cd0c990c36', 'ainna', '0', '', '', ''),
(9007, 'Intan Amelia', 'Binti Mohd Sidek', '', 'intanamelia@micth.com', '018-2379529', 'Executive', 'Full time', 'Zulliana Binti Muhammad', 'Legal & Integrity', '1/8/2022', '', 'Active', 'e400369b1e61140b07d192b8d7606e80', 'intan', '0', '', '', ''),
(9008, 'Muhammad Firdaus Naim', 'Bin Ramlan', '', 'firdausnaim@micth.com.my', '017-3907840', 'Technician', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/12/2022', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'naim', '0', '', '', ''),
(9009, 'Shahrol Nizam', 'Bin Masran', '', 'shahrol.nizam@micth.com', '011-31891180', 'PSH', 'Part time', 'Muhammad Farid Bin Ariffin', 'Human Resources & Admin', '9/1/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'shahrol', '0', '1', '1', '1'),
(9010, 'Nor Diyana', 'Binti Osman', '', 'nordiyana@micth.com', '017-6612671', 'Assistant Officer', 'Full time', 'Mohamad Hod Bin Rabu', 'Account', '1/2/2023', '', 'Active', 'c3f66e3dfbd3c657d434eb02627c3dc5', 'Nordiyana', '0', '', '', ''),
(9011, 'Siti Sara', 'Binti Rahim', '', 'sitisara@micth.com', '013-4831023', 'Officer', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'sara', '0', '', '', ''),
(9012, 'Farah Nur Azlin Yasmine', 'Binti Azme', '', 'yasmine@micth.com', '011-23062133', 'Officer', 'Full time', 'Norwajunizam Bin Abd Wahab', 'Commercial', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'yasmine', '0', '', '', ''),
(9013, 'Ahmad Muzhaffar', 'Bin Jeffri', '', 'muzhaffar@micth.com', '014-6360130', 'Officer', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '1/2/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'muzhaffar', '0', '', '', ''),
(9014, 'Muhammad Amir Luqman', 'Bin Mohmad Sujana', '', 'amirluqman@micth.com', '013-6793948', 'Officer', 'Full time', 'Ahmad Safwan Bin Yusof', 'Telecommunication Infrastructure', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'amirluqman', '0', '', '', ''),
(9015, 'Aszineezam', 'Bin Aziz', '', 'neezamaziz77@gmail.com', '010-2944974', 'Pegawai Perhubungan', 'Full time', 'Nur Amalina Binti Abd Rahman', 'Corporate & Admin', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'aszineezam', '0', '', '', ''),
(9016, 'Mohammad Amirul Haqimi', 'Bin Ahmad Zulizham', '', 'amirulhaqimi@micth.com', '010-5777132', 'Officer', 'Full Time', 'Nur Amalina Binti Abd Rahman', 'Digital & Information Technology', '3/4/2023', '', 'Active', 'e10adc3949ba59abbe56e057f20f883e', 'Haqimi', '0', '', '', '');

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
  `purpose` varchar(35) NOT NULL,
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
(2, 'shahrol', 'try', 'try', '2024-04-03', '15:31:00', '2024-04-15', '09:24:00', 0, '2024-04-03 15:31:41', '9009', 0, 'Human Resources & Admin', '2024-04-15 09:24:19', '1'),
(4, 'wedud', 'try', 'try', '2024-04-03', '16:29:00', '2024-04-16', '16:54:00', 0, '2024-04-03 16:29:49', '1234', 0, 'Digital & Information Technology', '2024-04-16 16:54:46', '1'),
(5, 'ahmadee', 'try', 'try', '2024-04-04', '10:27:00', '2024-04-05', '08:58:00', 0, '2024-04-04 10:28:07', '3013', 0, 'Account', '2024-04-05 08:58:24', '1'),
(8, 'wedud', '123456', '123456', '2024-04-05', '08:47:00', '2024-04-16', '16:54:00', 0, '2024-04-05 08:47:46', '1234', 0, 'Digital & Information Technology', '2024-04-16 16:54:46', '1'),
(14, 'shahrol', 'try', 'try', '2024-04-15', '09:24:00', '2024-04-15', '09:47:00', 0, '2024-04-15 09:24:31', '9009', 0, 'Human Resources & Admin', '2024-04-15 09:47:33', '1'),
(15, 'farid', 'try', 'try', '2024-04-16', '11:45:00', '2024-04-16', '11:57:00', 0, '2024-04-16 11:45:13', '4725', 0, 'Human Resources & Admin', '2024-04-16 11:57:22', '1'),
(17, 'nurulatiqah', 'try', 'try', '2024-04-16', '12:49:00', '2024-04-16', '12:50:00', 0, '2024-04-16 12:49:53', '14', 0, 'Human Resources & Admin', '2024-04-16 12:50:50', ''),
(18, 'shahrol', 'ret', 'try', '2024-04-16', '14:34:00', '0000-00-00', '00:00:00', 0, '2024-04-16 14:34:48', '9009', 0, 'Human Resources & Admin', '', '1'),
(19, 'farid', 'try', 'try', '2024-04-16', '16:38:00', '2024-04-17', '12:24:00', 0, '2024-04-16 16:39:13', '4725', 0, 'Human Resources & Admin', '2024-04-17 12:24:46', '1'),
(20, 'syahira', 'mhakahamah ,mhakahamah,mhakahamahmh', '0ncc', '2024-04-16', '16:55:00', '2024-04-17', '12:02:00', 0, '2024-04-16 16:56:31', '1145', 0, 'Digital & Information Technology', '2024-04-17 12:02:45', ''),
(21, 'Norsyahira', 'try', 'try', '2024-04-17', '11:36:00', '2024-04-17', '16:55:00', 0, '2024-04-17 11:36:23', '1145', 0, 'Digital & Information Technology', '2024-04-17 16:55:36', '1'),
(22, 'Norsyahira', 'try2', 'try2', '2024-04-17', '12:08:00', '2024-04-17', '16:55:00', 0, '2024-04-17 12:08:15', '1145', 0, 'Digital & Information Technology', '2024-04-17 16:55:36', '1'),
(23, 'Norsyahira', 'try', 'try', '2024-04-17', '12:23:00', '2024-04-17', '16:55:00', 0, '2024-04-17 12:23:53', '1145', 0, 'Digital & Information Technology', '2024-04-17 16:55:36', '1'),
(26, 'Muhammad Farid', 'try', 'try', '2024-04-17', '14:37:00', '2024-04-17', '14:38:00', 0, '2024-04-17 14:37:14', '4725', 0, 'Human Resources & Admin', '2024-04-17 14:38:28', ''),
(30, 'Norsyahira', 'rtrt', 'rtr', '2024-04-17', '14:45:00', '2024-04-17', '16:55:00', 0, '2024-04-17 14:45:07', '1145', 0, 'Digital & Information Technology', '2024-04-17 16:55:36', '1'),
(31, 'Norsyahira', 'try', 'try', '2024-04-17', '14:48:00', '2024-04-17', '16:55:00', 0, '2024-04-17 14:49:03', '1145', 0, 'Digital & Information Technology', '2024-04-17 16:55:36', '1'),
(32, 'Norsyahira', 'vfvf', 'cdfccvf', '2024-04-17', '16:58:00', '0000-00-00', '00:00:00', 0, '2024-04-17 16:58:47', '1145', 0, 'Digital & Information Technology', '', '1'),
(33, 'Abdallah wedud', 'try', 'try', '2024-04-18', '10:54:00', '2024-04-18', '10:55:00', 0, '2024-04-18 10:54:25', '1234', 0, 'Digital & Information Technology', '2024-04-18 10:55:38', '1'),
(34, 'Abdallah wedud', 'trtrt', 'trry', '2024-04-18', '10:55:00', '2024-04-18', '11:04:00', 0, '2024-04-18 10:55:47', '1234', 0, 'Digital & Information Technology', '2024-04-18 11:04:17', '1'),
(35, 'Abdallah wedud', 'try', 'try', '2024-04-18', '11:04:00', '2024-04-18', '11:11:00', 0, '2024-04-18 11:04:26', '1234', 0, 'Digital & Information Technology', '2024-04-18 11:11:16', '1'),
(36, 'Abdallah wedud', '4r4r4', 'r4r4r', '2024-04-18', '11:11:00', '0000-00-00', '00:00:00', 0, '2024-04-18 11:11:25', '1234', 0, 'Digital & Information Technology', '', '1'),
(37, 'Ahmadee', 'rf', 'rfr', '2024-04-18', '11:12:00', '0000-00-00', '00:00:00', 0, '2024-04-18 11:12:13', '3013', 0, 'Account', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empmaininfo`
--
ALTER TABLE `empmaininfo`
  ADD PRIMARY KEY (`Internal_Id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
