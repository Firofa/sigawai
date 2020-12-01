-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 10:56 AM
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
(1, 'Alex Sulaiman', '$2y$10$YT1922R2ohQk5szik2AbXOy0sNLSitVsvjJg3CaTXeyhfM/4A5QNW', 1, '1010', 'Banjarmasin', '2012-12-12', '1010202040', '1020304050', '3B', 'Junior Staff', 'Eselon 1', 2020, 1, 2, 2, 1606792825, 1606811801);

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
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

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
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
