-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:50 AM
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
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `adminame` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminame`, `username`, `password`, `role`) VALUES
(2, 'สมคิด เรืองศรี', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_mem` varchar(30) NOT NULL,
  `fname_lname` varchar(100) NOT NULL COMMENT 'ชื่อ-สกุล',
  `n_name` varchar(25) NOT NULL COMMENT 'ชื่อเล่น',
  `age` int(10) NOT NULL COMMENT 'อายุ',
  `citizen_id` varchar(50) NOT NULL COMMENT 'รหัสบัตรประจำตัวประชาชน',
  `gender` varchar(15) NOT NULL COMMENT 'เพศ',
  `status` varchar(15) NOT NULL COMMENT 'สถานภาพ',
  `address` varchar(200) NOT NULL COMMENT 'ที่อยู่',
  `weight` int(5) NOT NULL COMMENT 'น้ำหนัก',
  `height` int(5) NOT NULL COMMENT 'ส่วนสูง',
  `tell` varchar(20) NOT NULL COMMENT 'โทรศัพท์',
  `email` varchar(50) NOT NULL COMMENT 'อีเมลล์',
  `bank` varchar(50) NOT NULL COMMENT 'ธนาคาร',
  `position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `img` text NOT NULL COMMENT 'รูปภาพ',
  `date` text NOT NULL COMMENT 'วดป',
  `number_bank` varchar(255) NOT NULL COMMENT 'เลขบัญชี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_mem`, `fname_lname`, `n_name`, `age`, `citizen_id`, `gender`, `status`, `address`, `weight`, `height`, `tell`, `email`, `bank`, `position`, `img`, `date`, `number_bank`) VALUES
(1, '66309012008', 'วิภาภรณ์ บุญที', 'มาย', 21, '1319901014964', 'หญิง', 'โสด', 'เมือง', 50, 156, '0924284786', 'mildwi123@gmail.com', 'KBANK', 'CEO', 'uploads/ae4300079d04d0d7a3cb3fb8aa63dea4.jpg', '2546-03-12', '1331636696'),
(8, '66309012060', 'ดวงพร มนเทียนอาจ', 'มิ้น', 21, '1319901014988', 'หญิง', 'โสด', 'ถ.จิระ ซอย 3 ต.ในเมือง อ.เมืองบุรีรัมย์ จ.บุรีรัมย์ 31000', 60, 160, '0924284786', 'wayushop012@gmail.com', 'KBANK', 'Designer', 'uploads/e77e230dd4b0f2ac81408658c5dac86a.jpg', '2546-10-13', '1334892546'),
(10, '66309012061', 'สมชาย จรรรัมย์', 'ปื๊ด', 24, '1319901014528', 'ชาย', 'สมรส', '6 ต.หนองแสง อ.แคนดง จ.บุรีรัมย์ 31150', 67, 178, '0935903215', 'sscu12@gmail.com', 'KBANK', 'Accounting', 'uploads/5000666ae07ec7168e9ce1ed03c1a632.jpg', '2199-02-11', '1330566710'),
(11, '66309012061', 'สมศรี แจงจิต', 'ฟา', 20, '1319901014999', 'หญิง', 'โสด', '3.ต.แคนดง อ.แคนดง จ.บุรีรัมย์ 31150', 54, 162, '0924284799', 'reggedddry@gmail.com', 'BBL', 'Accounting', 'uploads/6e9d9d2cb00777d9d4a9ea3580d3fd5c.jpg', '2546-12-11', '1235496873'),
(12, '66309012063', 'สมจิต สมใจ', 'แดง', 23, '1319901018665', 'หญิง', 'ระบุสถานภาพ', '85/5 ต.อิสาร อ.ในเมืองบุรีรัมย์ จ.บุรีรัมย์\r\n31000', 69, 162, '0936548936', 'ddmnt@gmail.com', 'TMB', 'Send documents', 'uploads/5c933c9869933830c3f208035203bf48.jpg', '2545-05-01', '1334529687');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
