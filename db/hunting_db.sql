-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 05:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hunting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'asad', '$2y$10$PbOET.UBxvQpiJpPLUxGq.GpNdfji2IALgTn.jEcmVwkhkWC/A86y', 'Asad', 'Chaudary', 'profile.jpg', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phooneno` varchar(255) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cnic_no` varchar(255) DEFAULT NULL,
  `c_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `password`, `phooneno`, `create_datetime`, `city`, `address`, `cnic_no`, `c_file`) VALUES
(1, 'asad', 'asad@gmail.com', '3066ae72739e663244a565eebc73612d', '03061234567', '2021-09-03 13:03:13', 'Islamabad', 'pakistan Town', '1234567891011', ''),
(2, 'samee', 'samee@gmail.com', 'bd17f10c9ccb0d8bfc2504c144699769', '21344445566', '2021-09-10 22:21:17', 'Rawalpindi', 'Rawalpindi', '4745732473244', ''),
(3, 'ali', 'ali123', '984d8144fa08bfc637d2825463e184fa', NULL, '2021-09-21 23:27:57', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `huntappointment`
--

CREATE TABLE `huntappointment` (
  `huntapn_id` int(11) NOT NULL,
  `hunt_animall` varchar(255) DEFAULT NULL,
  `hunt_incperson` int(11) DEFAULT NULL,
  `hunt_area` varchar(255) DEFAULT NULL,
  `hunt_province` varchar(255) DEFAULT NULL,
  `hunt_date` date DEFAULT NULL,
  `hunt_time` time DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `huntappointment`
--

INSERT INTO `huntappointment` (`huntapn_id`, `hunt_animall`, `hunt_incperson`, `hunt_area`, `hunt_province`, `hunt_date`, `hunt_time`, `datecreated`, `id`) VALUES
(12, 'deer', 5, 'swat', 'GilgitBaltistan', '2021-09-25', '13:51:00', '2021-09-24 22:51:18', 1),
(14, 'wolf', 4, 'Skardu', 'West punjab', '2021-10-11', '14:04:00', '2021-09-29 23:04:59', 2),
(15, 'rabbit', 0, 'khushab', 'punjab', '2021-10-06', '14:05:00', '2021-09-29 23:05:33', 2);

-- --------------------------------------------------------

--
-- Table structure for table `huntappointment_approved`
--

CREATE TABLE `huntappointment_approved` (
  `aprappoint_id` int(11) NOT NULL,
  `hnt_anml` varchar(255) DEFAULT NULL,
  `hnt_noprsn` int(11) DEFAULT NULL,
  `hnt_area` varchar(255) DEFAULT NULL,
  `hnt_prvnce` varchar(255) DEFAULT NULL,
  `hnt_date` date DEFAULT NULL,
  `hnt_time` time DEFAULT NULL,
  `c_user` varchar(255) DEFAULT NULL,
  `c_eml` varchar(255) DEFAULT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `c_phoneno` varchar(255) DEFAULT NULL,
  `c_city` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `huntapn_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `huntappointment_approved`
--

INSERT INTO `huntappointment_approved` (`aprappoint_id`, `hnt_anml`, `hnt_noprsn`, `hnt_area`, `hnt_prvnce`, `hnt_date`, `hnt_time`, `c_user`, `c_eml`, `c_address`, `c_phoneno`, `c_city`, `date_created`, `id`, `huntapn_id`) VALUES
(3, 'Rino', 3, 'kalash', 'nothern Area', '2021-09-17', '13:21:00', 'asad', 'asad@gmail.com', 'pakistan Town', '03061234567', 'Islamabad', '2021-09-09 22:24:27', 1, 8),
(4, 'deer', 2, 'jhelum', 'punjab', '2021-09-11', '12:06:00', 'asad', 'asad@gmail.com', 'pakistan Town', '03061234567', 'Islamabad', '2021-09-10 21:07:33', 1, 10),
(5, 'deer', 2, 'jhelum', 'Punjab', '2021-10-20', '14:04:00', 'samee', 'samee@gmail.com', 'Rawalpindi', '21344445566', 'Rawalpindi', '2021-09-29 23:06:25', 2, 13),
(6, 'Rino', 4, 'swat', 'GilgitBaltistan', '2021-09-11', '12:36:00', 'asad', 'asad@gmail.com', 'pakistan Town', '03061234567', 'Islamabad', '2021-10-05 20:49:31', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `myhunts`
--

CREATE TABLE `myhunts` (
  `hunt_id` int(11) NOT NULL,
  `hunt_animal` varchar(255) DEFAULT NULL,
  `huntanimal_count` int(11) DEFAULT NULL,
  `hunt_area` varchar(255) DEFAULT NULL,
  `hunt_province` varchar(255) DEFAULT NULL,
  `hunt_date` date DEFAULT NULL,
  `hunt_time` time DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myhunts`
--

INSERT INTO `myhunts` (`hunt_id`, `hunt_animal`, `huntanimal_count`, `hunt_area`, `hunt_province`, `hunt_date`, `hunt_time`, `date_created`, `id`) VALUES
(3, 'Rabbit', 5, 'jhelum', 'GilgitBaltistan', '2021-09-11', '01:54:00', '2021-09-03 19:53:57', 1),
(4, 'wolf', 1, 'skardu', 'Northernarea', '2021-09-02', '17:24:00', '2021-09-09 12:24:58', 1),
(5, 'markhor', 2, 'Chitral', 'WestPunjab', '2021-09-07', '15:03:00', '2021-09-29 23:03:26', 2),
(6, 'rabbit', 5, 'kallar', 'punjab', '2021-10-13', '01:49:00', '2021-10-05 20:47:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `huntappointment`
--
ALTER TABLE `huntappointment`
  ADD PRIMARY KEY (`huntapn_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `huntappointment_approved`
--
ALTER TABLE `huntappointment_approved`
  ADD PRIMARY KEY (`aprappoint_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `myhunts`
--
ALTER TABLE `myhunts`
  ADD PRIMARY KEY (`hunt_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `huntappointment`
--
ALTER TABLE `huntappointment`
  MODIFY `huntapn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `huntappointment_approved`
--
ALTER TABLE `huntappointment_approved`
  MODIFY `aprappoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `myhunts`
--
ALTER TABLE `myhunts`
  MODIFY `hunt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `huntappointment`
--
ALTER TABLE `huntappointment`
  ADD CONSTRAINT `huntappointment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `huntappointment_approved`
--
ALTER TABLE `huntappointment_approved`
  ADD CONSTRAINT `huntappointment_approved_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `myhunts`
--
ALTER TABLE `myhunts`
  ADD CONSTRAINT `myhunts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
