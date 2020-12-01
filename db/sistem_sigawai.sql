-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 10:33 PM
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
  `status_perkiraan` enum('0','1','2') NOT NULL
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
(10, '010', 'Pembulatan', 'Y', '0'),
(11, '101', 'IWP', 'Y', '1'),
(14, '102', 'Iuran BPJS', 'Y', '1'),
(15, '103', 'Potongan PPN', 'Y', '1'),
(16, '104', 'Sewa Rumah', 'Y', '1'),
(17, '105', 'Taperum', 'Y', '1'),
(18, '106', 'Pot. Lain (Persekot Gaji, TGR)', 'Y', '1'),
(19, '201', 'Iuran IKAHI', 'Y', '2'),
(20, '202', 'Iuran YOSH', 'Y', '2'),
(21, '203', 'Simpanan Pokok Koperasi', 'Y', '2'),
(22, '204', 'Simpanan Wajib Koperasi', 'Y', '2'),
(23, '205', 'Simpanan Sukarela Koperasi', 'Y', '2'),
(24, '206', 'Angsuran Pinjaman Koperasi', 'Y', '2'),
(25, '207', 'Iuran Dharma Yukti', 'Y', '2'),
(26, '208', 'Iuran PTWP', 'Y', '2'),
(27, '209', 'Iuran Olah Raga', 'Y', '2'),
(28, '210', 'Donasi Dharmayukti Kartini', 'Y', '2'),
(29, '211', 'Iuran Muslim', 'Y', '2'),
(30, '212', 'Arisan Cabang Dharmayukti', 'Y', '2'),
(31, '213', 'Iuran IPASPI', 'Y', '2'),
(32, '214', 'Potongan Lain/Arisan DYK Daerah', 'Y', '2'),
(33, '215', 'Sumbangan Sosial', 'Y', '2'),
(34, '216', 'Sumbangan Persekutuan Kristiani', 'Y', '2'),
(35, '217', 'Iuran untuk Tenaga Kebersihan', 'Y', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_transaksi_gaji`
--

CREATE TABLE `rincian_transaksi_gaji` (
  `id_rtg` int(11) NOT NULL,
  `transaksi_gaji_id` int(11) NOT NULL,
  `perkiraan_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_transaksi_gaji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `penghasilan_kotor` int(11) NOT NULL,
  `potongan_kppn` int(11) NOT NULL,
  `penghasilan_bersih` int(11) NOT NULL,
  `potongan_internal` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_input_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_gaji`
--

INSERT INTO `transaksi_gaji` (`id_transaksi_gaji`, `user_id`, `tgl_gaji`, `penghasilan_kotor`, `potongan_kppn`, `penghasilan_bersih`, `potongan_internal`, `gaji_bersih`, `waktu_input`, `user_input_id`) VALUES
(2, 1, '0000-00-00', 11920000, 332000, 11588000, 240000, 11348000, '2020-12-01 21:28:04', 1),
(1, 1, '2020-12-01', 1000000, 100000, 900000, 100000, 800000, '2020-12-01 17:58:05', 1),
(3, 1, '2020-12-01', 16150000, 2600000, 13550000, 3420000, 10130000, '2020-12-01 21:28:20', 1),
(4, 3, '2021-01-01', 7225000, 1110000, 6115000, 5475000, 640000, '2020-12-01 21:31:21', 1);

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
(2, 'Entis Sutisna', '$2y$10$dscJEgQmrSq79yzvVvjPpeJKHoSMGf0hbdI0mDcTsBA35sEkZq27y', 2, '1020', 'Laracast', '2001-05-21', '98765432112', '12378234401', '3B', 'admin', 'admin', 2020, 1, 1, 1, 1606838991, 1606839091),
(3, 'Kabayan Surya', '$2y$10$3CdZTNUngWzPljtPLvACqOIkUcU1WSyprbjLafDUE/aRdcKNSsWX6', 3, '1030', 'Pamanukan', '1999-09-19', '123987456234', '231852578273', '3B', 'Kepala Bagian', 'Eselon 1', 2020, 1, 1, 1, 1606839075, 0);

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
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `rincian_transaksi_gaji`
--
ALTER TABLE `rincian_transaksi_gaji`
  MODIFY `id_rtg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  MODIFY `id_transaksi_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
