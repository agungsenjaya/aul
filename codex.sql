-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jul 2019 pada 10.21
-- Versi server: 5.7.19
-- Versi PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codex`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsultans`
--

CREATE TABLE `tbl_konsultans` (
  `konsultan_id` int(100) NOT NULL,
  `konsultan_judul` varchar(200) NOT NULL,
  `konsultan_obat` varchar(200) NOT NULL,
  `konsultan_tgl` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasiens`
--

CREATE TABLE `tbl_pasiens` (
  `pasien_id` int(100) NOT NULL,
  `pasien_nama` varchar(200) NOT NULL,
  `pasien_alamat` text NOT NULL,
  `pasien_kelamin` varchar(200) NOT NULL,
  `pasien_ktp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasiens`
--

INSERT INTO `tbl_pasiens` (`pasien_id`, `pasien_nama`, `pasien_alamat`, `pasien_kelamin`, `pasien_ktp`) VALUES
(1, 'andri senjaya', 'jl raya lampung', 'P', '320000'),
(2, 'didin senjaya', 'jl raya subang jawa', 'P', '3232323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`) VALUES
(1, 'agung', 'agung@gmail.com', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', '1'),
(2, 'rara', 'rara@gmail.com', '5ab83fa52e5d0f5abc44d2eed4479ff0', '2'),
(3, 'suci', 'suci@gmail.com', 'a7918ffddbdda39e5c6307dd51c94d65', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_konsultans`
--
ALTER TABLE `tbl_konsultans`
  ADD PRIMARY KEY (`konsultan_id`);

--
-- Indeks untuk tabel `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_konsultans`
--
ALTER TABLE `tbl_konsultans`
  MODIFY `konsultan_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  MODIFY `pasien_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
