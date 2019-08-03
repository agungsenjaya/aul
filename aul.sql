-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 08:57 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsultans`
--

CREATE TABLE `tbl_konsultans` (
  `konsultan_id` int(100) NOT NULL,
  `konsultan_judul` varchar(200) NOT NULL,
  `konsultan_obat` varchar(200) NOT NULL,
  `konsultan_tgl` varchar(200) NOT NULL,
  `pasien_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konsultans`
--

INSERT INTO `tbl_konsultans` (`konsultan_id`, `konsultan_judul`, `konsultan_obat`, `konsultan_tgl`, `pasien_id`) VALUES
(1, 'jarang makan', 'harus banyak makan ya', '2019-08-02 08:32:54', 2),
(2, 'banyak pikirian', 'perbanyak suami', '2019-08-02 10:55:01', 1),
(3, 'masih bandel', 'obatnya banyak bersyukur', '2019-08-01 13:03:21', 2),
(4, 'jarang makan', 'harus bnyak makan', '2019-08-03 13:18:13', 4),
(5, 'jangan sering sakit', 'jangan lemah deh say', '2019-08-03 13:24:23', 2),
(6, 'kurang kepastian', 'harus kasih kepastian kepada pasangannya', '2019-08-03 13:27:04', 8),
(7, 'galau', 'harus banyak bergaul', '2019-08-03 13:32:17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasiens`
--

CREATE TABLE `tbl_pasiens` (
  `pasien_id` int(100) NOT NULL,
  `pasien_nama` varchar(200) NOT NULL,
  `pasien_alamat` text NOT NULL,
  `pasien_kelamin` varchar(200) NOT NULL,
  `pasien_ktp` varchar(200) NOT NULL,
  `pasien_status` int(20) NOT NULL,
  `pasien_reg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasiens`
--

INSERT INTO `tbl_pasiens` (`pasien_id`, `pasien_nama`, `pasien_alamat`, `pasien_kelamin`, `pasien_ktp`, `pasien_status`, `pasien_reg`) VALUES
(1, 'dini margaretha', 'kembang kuta bali', 'P', '12345', 0, '2019-08-02 11:18:27'),
(2, 'Romi Rafela', 'tubagus ismail raya dan sekitarnya', 'L', '4321', 0, '2019-08-03 13:24:51'),
(3, 'dadang kornelo', 'jl raya sindang paray', 'P', '32023020202020', 3, '2019-08-03 13:31:32'),
(4, 'agus hari', 'jl dieng tengah', 'L', '777888', 1, '2019-08-03 13:30:15'),
(5, 'ahmad sanusi', 'jl raya kemenangn', 'L', '029302903', 1, '2019-08-03 08:41:20'),
(6, 'dina abadi', 'jl kebahagiaan yang tak pernah ada ujungnya', 'P', '6523434', 1, '2019-08-02 13:22:35'),
(7, 'junaidi buri', 'tak tahu arah jalan pulang', 'L', '872378723', 0, '2019-08-03 13:23:18'),
(8, 'budidayakan', 'jl rawa bango', 'L', '5544232', 3, '2019-08-03 13:26:41'),
(9, 'mamah cantik', 'tubagus ismail skeloa bandung', 'P', '2323232', 0, '2019-08-03 13:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`) VALUES
(1, 'agung', 'agung@gmail.com', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', '1'),
(2, 'rara', 'rara@gmail.com', '5ab83fa52e5d0f5abc44d2eed4479ff0', '2'),
(3, 'suci', 'suci@gmail.com', 'a7918ffddbdda39e5c6307dd51c94d65', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konsultans`
--
ALTER TABLE `tbl_konsultans`
  ADD PRIMARY KEY (`konsultan_id`);

--
-- Indexes for table `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_konsultans`
--
ALTER TABLE `tbl_konsultans`
  MODIFY `konsultan_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  MODIFY `pasien_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
