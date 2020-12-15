-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 10:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_sigawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `level_access`
--

CREATE TABLE `level_access` (
  `id_level_access` int(11) NOT NULL,
  `level_access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_access`
--

INSERT INTO `level_access` (`id_level_access`, `level_access`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan`
--

CREATE TABLE `perkiraan` (
  `id_perkiraan` int(11) NOT NULL,
  `kode_perkiraan` varchar(5) NOT NULL,
  `nama_perkiraan` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status_perkiraan` enum('0','1','2','3','4') NOT NULL COMMENT '0 = penghasilan, 1 - potongan kppn, 2 = potongan internal, 3 = uang makan, 4 = remunerasi'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkiraan`
--

INSERT INTO `perkiraan` (`id_perkiraan`, `kode_perkiraan`, `nama_perkiraan`, `aktif`, `status_perkiraan`) VALUES
(1, '001', 'Gaji Pokok', 'Y', '0'),
(2, '002', 'Tunjangan Istri/Suami', 'Y', '0'),
(3, '003', 'Tunjangan Anak', 'Y', '0'),
(4, '004', 'Tunjangan Umum', 'Y', '0'),
(5, '005', 'Tunjangan Kemahalan Hakim', 'Y', '0'),
(6, '006', 'Tunjangan Struktural', 'Y', '0'),
(7, '007', 'Tunjangan Fungsional', 'Y', '0'),
(8, '008', 'Tunjangan Beras', 'Y', '0'),
(9, '009', 'Tunjangan Khusus Pajak', 'Y', '0'),
(11, '301', 'Uang Lauk Pauk', 'Y', '3'),
(12, '401', 'Tunjangan Kinerja', 'Y', '4'),
(13, '402', 'Honor Lainnya', 'Y', '4'),
(14, '101', 'IWP', 'Y', '1'),
(15, '102', 'Iuran BPJS', 'Y', '1'),
(16, '103', 'Potongan PPH', 'Y', '1'),
(17, '104', 'Sewa Rumah', 'Y', '1'),
(18, '105', 'Taperum', 'Y', '1'),
(19, '106', 'Pot. Lain (Persekot Gaji, TGR)', 'Y', '1'),
(20, '201', 'Iuran IKAHI', 'Y', '2'),
(21, '202', 'Iuran YDSH', 'Y', '2'),
(22, '203', 'Simpanan Pokok Koperasi', 'Y', '2'),
(23, '204', 'Simpanan Wajib Koperasi', 'Y', '2'),
(24, '205', 'Simpanan Sukarela Koperasi', 'Y', '2'),
(25, '206', 'Angsuran Pinjaman Koperasi', 'Y', '2'),
(26, '207', 'Iuran Dharma Yukti', 'Y', '2'),
(27, '208', 'Iuran PTWP', 'Y', '2'),
(28, '209', 'Iuran Olah Raga', 'Y', '2'),
(29, '210', 'Donasi Dharmayukti Kartini', 'Y', '2'),
(30, '211', 'Iuran Muslim', 'Y', '2'),
(31, '212', 'Arisan Cabang Dharmayukti', 'Y', '2'),
(32, '213', 'Iuran IPASPI', 'Y', '2'),
(33, '214', 'Potongan Lain/Arisan DYK Daerah', 'Y', '2'),
(34, '215', 'Sumbangan Sosial', 'Y', '2'),
(35, '216', 'Sumbangan Persekutuan Kristiani', 'Y', '2'),
(36, '217', 'Iuran untuk Tenaga Kebersihan', 'Y', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_transaksi_gaji`
--

CREATE TABLE `rincian_transaksi_gaji` (
  `id_rtg` int(11) NOT NULL,
  `transaksi_gaji_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `perkiraan_id` int(11) NOT NULL,
  `jumlah` int(128) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_transaksi_gaji`
--

INSERT INTO `rincian_transaksi_gaji` (`id_rtg`, `transaksi_gaji_id`, `user_id`, `tgl_gaji`, `perkiraan_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'itg5fd487f540cfd', 1, '2020-02-20', 1, 14000, 1607763957, 1607764825),
(2, 'itg5fd487f540cfd', 1, '2020-02-20', 2, 30000, 1607763957, 1607763957),
(3, 'itg5fd487f540cfd', 1, '2020-02-20', 3, 15000, 1607763957, 1607763957),
(17, 'itg5fd48d2265269', 1, '2020-05-01', 7, 30000, 1607765282, 1607765282),
(5, 'itg5fd487f540cfd', 1, '2020-02-20', 5, 9000, 1607763957, 1607763957),
(6, 'itg5fd487f540cfd', 1, '2020-02-20', 6, 8000, 1607763957, 1607763957),
(7, 'itg5fd487f540cfd', 1, '2020-02-20', 8, 5500, 1607763957, 1607763957),
(8, 'itg5fd487f540cfd', 1, '2020-02-20', 11, 50000, 1607764001, 1607764001),
(16, 'itg5fd48d0a9a133', 1, '2020-03-01', 1, 50000, 1607765258, 1607765258),
(10, 'itg5fd487f540cfd', 1, '2020-02-01', 15, 10000, 1607764280, 1607764280),
(11, 'itg5fd487f540cfd', 1, '2020-02-01', 16, 2500, 1607764280, 1607764280),
(12, 'itg5fd487f540cfd', 1, '2020-02-01', 17, 2500, 1607764280, 1607764280),
(13, 'itg5fd487f540cfd', 1, '2020-02-01', 18, 1500, 1607764280, 1607764280),
(14, 'itg5fd487f540cfd', 1, '2020-02-01', 19, 3000, 1607764280, 1607764280),
(15, 'itg5fd487f540cfd', 1, '2020-02-01', 20, 54000, 1607764296, 1607764296),
(18, 'itg5fd48d612f4a6', 1, '2019-02-01', 1, 3000, 1607765345, 1607765345),
(19, 'itg5fd48d612f4a6', 1, '2019-02-01', 3, 2000, 1607765345, 1607765345),
(20, 'itg5fd48d612f4a6', 1, '2019-02-01', 9, 5000, 1607765345, 1607765345),
(21, 'itg5fd48d7296f8b', 1, '2019-01-01', 4, 40000, 1607765362, 1607765362),
(22, 'itg5fd48d9835b15', 3, '2020-02-02', 1, 1000, 1607765400, 1607765400),
(23, 'itg5fd48d9835b15', 3, '2020-02-02', 2, 2000, 1607765400, 1607765400),
(24, 'itg5fd48db15b17f', 3, '2019-01-01', 3, 60000, 1607765425, 1607765425),
(25, 'itg5fd48dc83a723', 4, '2020-05-01', 1, 15000, 1607765448, 1607765448),
(26, 'itg5fd48dc83a723', 4, '2020-05-01', 2, 40000, 1607765448, 1607765448),
(27, 'itg5fd48de63ef58', 4, '2020-12-12', 3, 20000, 1607765478, 1607765478),
(28, 'itg5fd48de63ef58', 4, '2020-12-12', 2, 30000, 1607765478, 1607765478),
(29, 'itg5fd48dfe2eb80', 1, '2020-12-12', 1, 10000, 1607765502, 1607765502),
(30, 'itg5fd48e15c9d31', 3, '2018-05-02', 2, 3000, 1607765525, 1607765525),
(31, 'itg5fd48e15c9d31', 3, '2018-05-02', 1, 2000, 1607765525, 1607765525);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `ruangan`) VALUES
(1, 'Ruangan A'),
(2, 'Ruangan B'),
(3, 'Ruangan C');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gaji`
--

CREATE TABLE `transaksi_gaji` (
  `id_transaksi_gaji` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_gajian` date NOT NULL,
  `penghasilan_kotor` int(50) NOT NULL DEFAULT 0,
  `potongan_kppn` int(50) NOT NULL DEFAULT 0,
  `penghasilan_bersih` int(50) NOT NULL DEFAULT 0,
  `potongan_internal` int(50) NOT NULL DEFAULT 0,
  `gaji_bersih` int(50) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_gaji`
--

INSERT INTO `transaksi_gaji` (`id_transaksi_gaji`, `user_id`, `tgl_gajian`, `penghasilan_kotor`, `potongan_kppn`, `penghasilan_bersih`, `potongan_internal`, `gaji_bersih`, `created_at`, `updated_at`) VALUES
('itg5fd487f540cfd', 1, '2020-02-01', 131500, 19500, 112000, 54000, 58000, 1607763957, 1607764862),
('itg5fd48d0a9a133', 1, '2020-03-01', 50000, 0, 50000, 0, 50000, 1607765258, 1607765258),
('itg5fd48d2265269', 1, '2020-05-01', 30000, 0, 30000, 0, 30000, 1607765282, 1607765282),
('itg5fd48d612f4a6', 1, '2019-02-01', 10000, 0, 10000, 0, 10000, 1607765345, 1607765345),
('itg5fd48d7296f8b', 1, '2019-01-01', 40000, 0, 40000, 0, 40000, 1607765362, 1607765362),
('itg5fd48d9835b15', 3, '2020-02-02', 3000, 0, 3000, 0, 3000, 1607765400, 1607765400),
('itg5fd48db15b17f', 3, '2019-01-01', 60000, 0, 60000, 0, 60000, 1607765425, 1607765425),
('itg5fd48dc83a723', 4, '2020-05-01', 55000, 0, 55000, 0, 55000, 1607765448, 1607765448),
('itg5fd48de63ef58', 4, '2020-12-12', 50000, 0, 50000, 0, 50000, 1607765478, 1607765478),
('itg5fd48dfe2eb80', 1, '2020-12-12', 10000, 0, 10000, 0, 10000, 1607765502, 1607765502),
('itg5fd48e15c9d31', 3, '2018-05-02', 5000, 0, 5000, 0, 5000, 1607765525, 1607765525);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_access_id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `golongan` varchar(25) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `work_unit_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `level_access_id`, `nip`, `tempat_lahir`, `tanggal_lahir`, `no_rek`, `npwp`, `golongan`, `jabatan`, `pangkat`, `tahun`, `is_active`, `ruangan_id`, `work_unit_id`, `created_at`, `updated_at`) VALUES
(1, 'Alex Sulaiman', '$2y$10$YT1922R2ohQk5szik2AbXOy0sNLSitVsvjJg3CaTXeyhfM/4A5QNW', 1, '1010', 'Banjarmasin', '2012-12-12', '1010202040', '1020304050', '3B', 'Junior Staff', 'Eselon 1', 2020, 1, 2, 2, 1606792825, 1606811801),
(3, 'Kabayan Surya', '$2y$10$3CdZTNUngWzPljtPLvACqOIkUcU1WSyprbjLafDUE/aRdcKNSsWX6', 3, '1030', 'Pamanukan', '1999-09-19', '123987456234', '231852578273', '3B', 'Kepala Bagian', 'Eselon 1', 2020, 1, 1, 1, 1606839075, 0),
(4, 'Makmur Subur', '$2y$10$KplDhQgEE8p2T.FmviTRleFn9AUqRjJWue.cDbAlFmd/W.oD.m02e', 2, '1020', 'Sabang', '2012-12-12', '98765432112', '12378234401', '3B', 'Kepala Bagian', 'admin', 2020, 1, 2, 2, 1606976770, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_unit`
--

CREATE TABLE `work_unit` (
  `id_work_unit` int(11) NOT NULL,
  `work_unit` varchar(255) NOT NULL,
  `kode_satker` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `wakil_ketua` varchar(255) NOT NULL,
  `sekretaris` varchar(255) NOT NULL,
  `pj_barang_persediaan` varchar(255) NOT NULL,
  `logo_kantor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_unit`
--

INSERT INTO `work_unit` (`id_work_unit`, `work_unit`, `kode_satker`, `alamat`, `no_telp`, `ketua`, `wakil_ketua`, `sekretaris`, `pj_barang_persediaan`, `logo_kantor`) VALUES
(1, 'Unit A', 'K-001', 'Jalan Sudirman ', '08123456789', 'Asep', 'Udin', 'Bambang', 'Saliman', 'logo.jpg'),
(2, 'Unit B', 'K-002', 'Jalan Kampung Durian Runtuh', '08987654321', 'Kumalasari', 'Enung', 'Adi Kopeah', 'Cici Permana', 'logo.jpg'),
(3, 'Unit C', '003', 'Baker Street 211B', '087654321123', 'Popaye', 'Spongebob', 'Patrick', 'Squidword', 'brain-4514868_1280.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level_access`
--
ALTER TABLE `level_access`
  ADD PRIMARY KEY (`id_level_access`);

--
-- Indexes for table `perkiraan`
--
ALTER TABLE `perkiraan`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- Indexes for table `rincian_transaksi_gaji`
--
ALTER TABLE `rincian_transaksi_gaji`
  ADD PRIMARY KEY (`id_rtg`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  ADD PRIMARY KEY (`id_transaksi_gaji`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ruangan_id` (`ruangan_id`),
  ADD KEY `work_unit_id` (`work_unit_id`),
  ADD KEY `level_access_id` (`level_access_id`);

--
-- Indexes for table `work_unit`
--
ALTER TABLE `work_unit`
  ADD PRIMARY KEY (`id_work_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level_access`
--
ALTER TABLE `level_access`
  MODIFY `id_level_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perkiraan`
--
ALTER TABLE `perkiraan`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rincian_transaksi_gaji`
--
ALTER TABLE `rincian_transaksi_gaji`
  MODIFY `id_rtg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_unit`
--
ALTER TABLE `work_unit`
  MODIFY `id_work_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`work_unit_id`) REFERENCES `work_unit` (`id_work_unit`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`level_access_id`) REFERENCES `level_access` (`id_level_access`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
