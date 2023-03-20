-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 09:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(200) NOT NULL,
  `candidate_description` varchar(200) NOT NULL,
  `candidate_image` varchar(200) NOT NULL,
  `candidate_course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `candidate_description`, `candidate_image`, `candidate_course`) VALUES
(1, 'Muhammad Hazim Bin Saiful Amir', 'I Will make all of can eat sandwich everyday', 'pp1.jfif', 'Science Computer'),
(2, 'Alia Farhana', 'I Will Make Hostel Put Aircond', 'pp2.jfif', 'Accountant'),
(3, 'Aniq', 'Saya akan benarkan high council dijalankan', 'pp3.jfif', ''),
(4, 'Wan', 'Pelajar akan makan free setiap minggu', 'pp4.jfif', ''),
(5, 'Alia', 'Warga perempuan boleh study di mcdonald', 'pp5.jfif', ''),
(6, 'Khairi', 'Kereta mewah mampu parking di garaj', 'pp6.jfif', ''),
(7, 'Samsul', 'Lelaki dan perempuan tidak dibenarkan beckapel', 'pp7.jfif', ''),
(8, 'Najmi', 'lelaki yang memakai spek mata boleh untuk memakai vr ke kelas', 'pp8.jfif', ''),
(9, 'Haziq', 'Pelajar sukan diberi elaun sama dengan gaji pekerja', 'pp9.jfif', ''),
(10, 'Anas', 'Lelaki yang pergi hospital diberi mc 1 bulan', 'pp10.jfif', ''),
(11, 'Hakas', 'esport tounament dijalankan besar besaran', 'niinii_ayatkecil.png', ''),
(12, 'Ajib', 'Bergambar dibenarkan di tandas awam', 'd3.png', ''),
(13, 'Ainun', 'mata dan telinga adalah rahmat Allah', 'x-icon.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `ip_addr` varchar(100) NOT NULL,
  `port` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ip_addr`, `port`) VALUES
('192.168.10.100', '4370');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `course`) VALUES
(8, 'Alia', ''),
(12, 'Muhammad Hazim Bin Muhammad Khairi Sham', ''),
(13, 'Sabariah Binti Ab Wahab', ''),
(14, 'Muhammad Hazim Bin Muhammad Khairi Sham', ''),
(15, 'Muhammad Hazim Bin Muhammad Khairi Sham', ''),
(16, 'sofea', ''),
(17, 'Ali Bin Abu', ''),
(18, 'Ali Bin Abu', ''),
(19, 'Muhammad Hazim Bin Muhammad Khairi Sham', ''),
(20, 'Alia', 'Information Technology'),
(21, 'Hakim', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `candidate_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `user_id`, `candidate_id`) VALUES
(2, '13', '1'),
(3, '13', '2'),
(4, '13', '3'),
(5, '13', '5'),
(6, '13', '6'),
(7, '16', '2'),
(8, '16', '4'),
(9, '16', '5'),
(10, '16', '7'),
(11, '16', '9'),
(12, '16', '10'),
(13, '16', '12'),
(14, '17', '1'),
(15, '17', '2'),
(16, '17', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
