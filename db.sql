-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 10:45 AM
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
-- Database: `brainprofiler`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_session`
--

CREATE TABLE `class_session` (
  `sesid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `score` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_used` tinyint(1) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_session`
--

CREATE TABLE `interview_session` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `antrian` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tempat` text NOT NULL,
  `persyaratan` text NOT NULL,
  `statusInterview` varchar(100) NOT NULL,
  `domisili` text NOT NULL,
  `tanggal_ujian` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobv`
--

CREATE TABLE `jobv` (
  `jobv_id` int(10) NOT NULL,
  `jobv_title` varchar(255) NOT NULL,
  `jobv_desc` text NOT NULL,
  `jobv_requirement` text NOT NULL,
  `jobv_major` varchar(255) NOT NULL,
  `jobv_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobv`
--

INSERT INTO `jobv` (`jobv_id`, `jobv_title`, `jobv_desc`, `jobv_requirement`, `jobv_major`, `jobv_status`) VALUES
(1, 'IT Support', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed libero consectetur, placerat orci eget, luctus nisl. Suspendisse metus dui, aliquet at dui sit amet, pharetra pretium massa. Fusce et dapibus risus. Cras condimentum et libero in pretium. Curabitur maximus augue et justo consectetur bibendum. Donec in faucibus eros. Mauris vitae imperdiet enim. Curabitur tristique rutrum erat, ut fermentum ipsum dictum sit amet. Nulla sodales leo at tempus dapibus.', 'Networking, Addressing, Management Cabble, Mikrotik, Cisco', 'Informatics, Network Engineering', 1),
(2, 'IT Programmer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed libero consectetur, placerat orci eget, luctus nisl. Suspendisse metus dui, aliquet at dui sit amet, pharetra pretium massa. Fusce et dapibus risus. Cras condimentum et libero in pretium. Curabitur maximus augue et justo consectetur bibendum. Donec in faucibus eros. Mauris vitae imperdiet enim. Curabitur tristique rutrum erat, ut fermentum ipsum dictum sit amet. Nulla sodales leo at tempus dapibus.						', 'PHP, Golang, Laravel, Flutter', 'Informatics, Network Engineering', 0),
(3, 'Teknisi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed libero consectetur, placerat orci eget, luctus nisl. Suspendisse metus dui, aliquet at dui sit amet, pharetra pretium massa. Fusce et dapibus risus. Cras condimentum et libero in pretium. Curabitur maximus augue et justo consectetur bibendum. Donec in faucibus eros. Mauris vitae imperdiet enim. Curabitur tristique rutrum erat, ut fermentum ipsum dictum sit amet. Nulla sodales leo at tempus dapibus. ', 'Mengerti pemasangan kabel, Rajin, Teliti, Jujur', 'SMA / SMK, S1, Fresh Graduated', 1);

-- --------------------------------------------------------

--
-- Table structure for table `process_history`
--

CREATE TABLE `process_history` (
  `idHistory` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `historyTitle` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `historyDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lhr` varchar(100) NOT NULL,
  `ktp_provinsi` varchar(100) NOT NULL,
  `ktp_kota` varchar(100) NOT NULL,
  `ktp_kecamatan` varchar(1000) NOT NULL,
  `ktp_kelurahan` varchar(100) NOT NULL,
  `ktp_alamat_jalan` varchar(100) NOT NULL,
  `dom_provinsi` varchar(100) NOT NULL,
  `dom_kota` varchar(100) NOT NULL,
  `dom_kecamatan` varchar(100) NOT NULL,
  `dom_kelurahan` varchar(100) NOT NULL,
  `dom_alamat_jalan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `s_marital` varchar(100) NOT NULL,
  `last_major` varchar(100) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `last_ipk` varchar(100) NOT NULL,
  `tahun_lulus` varchar(100) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `last_job` varchar(100) NOT NULL,
  `inst_name` varchar(100) NOT NULL,
  `last_pos` varchar(100) NOT NULL,
  `from_year` varchar(100) NOT NULL,
  `to_year` varchar(100) NOT NULL,
  `gaji` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role` int(10) NOT NULL,
  `is_verified` int(5) NOT NULL,
  `is_interview` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `job_title`, `nik`, `nama`, `gender`, `tlp`, `email`, `tgl_lhr`, `ktp_provinsi`, `ktp_kota`, `ktp_kecamatan`, `ktp_kelurahan`, `ktp_alamat_jalan`, `dom_provinsi`, `dom_kota`, `dom_kecamatan`, `dom_kelurahan`, `dom_alamat_jalan`, `agama`, `s_marital`, `last_major`, `institusi`, `last_ipk`, `tahun_lulus`, `keahlian`, `last_job`, `inst_name`, `last_pos`, `from_year`, `to_year`, `gaji`, `password`, `foto`, `role`, `is_verified`, `is_interview`) VALUES
(1, '', '0', 'Administrator', '', '', 'admin@email.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '123', '', 2, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_session`
--
ALTER TABLE `class_session`
  ADD PRIMARY KEY (`sesid`);

--
-- Indexes for table `interview_session`
--
ALTER TABLE `interview_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobv`
--
ALTER TABLE `jobv`
  ADD PRIMARY KEY (`jobv_id`);

--
-- Indexes for table `process_history`
--
ALTER TABLE `process_history`
  ADD PRIMARY KEY (`idHistory`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_session`
--
ALTER TABLE `class_session`
  MODIFY `sesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `interview_session`
--
ALTER TABLE `interview_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobv`
--
ALTER TABLE `jobv`
  MODIFY `jobv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `process_history`
--
ALTER TABLE `process_history`
  MODIFY `idHistory` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
