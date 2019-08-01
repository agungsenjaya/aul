-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table codex.tbl_konsultans: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_konsultans` DISABLE KEYS */;
REPLACE INTO `tbl_konsultans` (`konsultan_id`, `konsultan_judul`, `konsultan_obat`, `konsultan_tgl`, `pasien_id`) VALUES
	(1, 'muntaber', 'obat keras', '2019-08-01 23:00:51', 1),
	(2, 'batuk, ambeyen', 'obat sari wangi', '2019-08-02 00:14:03', 5);
/*!40000 ALTER TABLE `tbl_konsultans` ENABLE KEYS */;

-- Dumping data for table codex.tbl_pasiens: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_pasiens` DISABLE KEYS */;
REPLACE INTO `tbl_pasiens` (`pasien_id`, `pasien_nama`, `pasien_alamat`, `pasien_kelamin`, `pasien_ktp`, `pasien_status`, `pasien_reg`) VALUES
	(1, 'agung senjaya', 'jl raya bandung barat', 'L', '12345', 3, '2019-08-01 20:07:09'),
	(2, 'bagus mulai', 'jl raya lugas', 'L', '4321', 0, '2019-08-01 20:03:23'),
	(3, 'ani senjaya', 'jl tubagus', 'P', '112233', 1, '2019-08-01 20:05:29'),
	(4, 'dira mina', 'jl raya subang', 'P', '554422', 0, '2019-08-01 20:04:19'),
	(5, 'dini rukiah', 'jl raya didin', 'L', '55444', 3, '2019-08-02 00:13:05'),
	(6, 'kokom nurjannah', 'jl kolot dayeuh', 'P', '25424', 1, '2019-08-02 00:12:38');
/*!40000 ALTER TABLE `tbl_pasiens` ENABLE KEYS */;

-- Dumping data for table codex.tbl_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
REPLACE INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`) VALUES
	(1, 'agung', 'agung@gmail.com', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', '1'),
	(2, 'rara', 'rara@gmail.com', '5ab83fa52e5d0f5abc44d2eed4479ff0', '2'),
	(3, 'suci', 'suci@gmail.com', 'a7918ffddbdda39e5c6307dd51c94d65', '3');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
