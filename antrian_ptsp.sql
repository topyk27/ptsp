-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 03:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_ptsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL COMMENT 'kode jenis layanan',
  `no` int(11) NOT NULL COMMENT 'no antrian, nanti display nya digabung dengan kode jenis layanan',
  `ke` varchar(128) NOT NULL COMMENT 'langkah selanjutnya ke jenis layanan apa ya',
  `status` varchar(64) NOT NULL COMMENT 'statusnya menunggu suspend atau kelar',
  `tanggal` date NOT NULL COMMENT 'tanggal ngambil antrian',
  `diperbarui` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'waktu tahapan terakhir, biar enak nanti pengurutannya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `kode`, `no`, `ke`, `status`, `tanggal`, `diperbarui`) VALUES
(1, 'pengaduan', 1, 'bank', 'tunda', '2020-07-14', '2020-07-11 05:21:01'),
(2, 'pendaftaran', 2, 'kasir', 'tunda', '2020-07-14', '2020-07-11 05:17:42'),
(3, 'pengambilan', 3, 'kasir', 'tunda', '2020-07-14', '2020-07-11 05:18:22'),
(4, 'ecourt', 4, 'ecourt', 'tunda', '2020-07-14', '2020-07-11 05:16:59'),
(5, 'kasir', 5, 'kasir', 'tunda', '2020-07-14', '2020-07-11 05:17:21'),
(6, 'posbakum', 6, 'pos', 'tunda', '2020-07-14', '2020-07-11 05:20:16'),
(7, 'pos', 7, 'pos', 'tunda', '2020-07-14', '2020-07-11 05:20:01'),
(8, 'bank', 8, 'bank', 'tunda', '2020-07-14', '2020-07-11 05:20:41'),
(9, 'posbakum', 9, 'pendaftaran', 'tunda', '2020-07-14', '2020-07-11 12:38:54'),
(10, 'posbakum', 10, 'pendaftaran', 'tunda', '2020-07-14', '2020-07-11 12:39:39'),
(11, 'pendaftaran', 11, 'pendaftaran', 'tunda', '2020-07-14', '2020-07-11 12:39:33'),
(13, 'pengambilan', 12, 'pengambilan', 'menunggu', '2020-07-14', '2020-07-14 14:56:48'),
(14, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 07:24:39'),
(15, 'pengaduan', 2, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 13:34:11'),
(16, 'pengaduan', 3, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 13:37:46'),
(17, 'pengaduan', 4, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 13:38:58'),
(18, 'pengaduan', 5, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 13:41:03'),
(19, 'pengaduan', 6, 'pengaduan', 'menunggu', '2020-07-15', '2020-07-15 13:41:33'),
(20, 'pendaftaran', 7, 'pendaftaran', 'menunggu', '2020-07-15', '2020-07-15 13:42:59'),
(21, 'pengambilan', 8, 'pengambilan', 'menunggu', '2020-07-15', '2020-07-15 13:44:37'),
(22, 'posbakum', 9, 'pendaftaran', 'menunggu', '2020-07-15', '2020-07-15 13:50:18'),
(23, 'ecourt', 10, 'ecourt', 'menunggu', '2020-07-15', '2020-07-15 13:47:55'),
(24, 'posbakum', 11, 'posbakum', 'menunggu', '2020-07-15', '2020-07-15 13:48:13'),
(25, 'posbakum', 12, 'posbakum', 'menunggu', '2020-07-15', '2020-07-15 14:02:00'),
(26, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-07-16', '2020-07-16 12:47:54'),
(27, 'pendaftaran', 2, 'pendaftaran', 'menunggu', '2020-07-16', '2020-07-16 12:48:31'),
(28, 'posbakum', 3, 'posbakum', 'menunggu', '2020-07-16', '2020-07-16 12:48:52'),
(29, 'pengaduan', 1, 'posbakum', 'menunggu', '2020-07-17', '2020-07-17 15:34:00'),
(30, 'pengaduan', 2, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:24:59'),
(31, 'pendaftaran', 3, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:25:04'),
(32, 'ecourt', 4, 'ecourt', 'menunggu', '2020-07-17', '2020-07-17 15:25:06'),
(33, 'pengambilan', 5, 'pengambilan', 'menunggu', '2020-07-17', '2020-07-17 15:25:08'),
(34, 'kasir', 6, 'kasir', 'menunggu', '2020-07-17', '2020-07-17 15:25:09'),
(35, 'posbakum', 7, 'posbakum', 'menunggu', '2020-07-17', '2020-07-17 15:25:10'),
(36, 'pos', 8, 'pos', 'menunggu', '2020-07-17', '2020-07-17 15:25:11'),
(37, 'bank', 9, 'bank', 'menunggu', '2020-07-17', '2020-07-17 15:25:13'),
(38, 'pendaftaran', 10, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:28:08'),
(39, 'kasir', 11, 'kasir', 'menunggu', '2020-07-17', '2020-07-17 15:28:17'),
(40, 'posbakum', 12, 'posbakum', 'menunggu', '2020-07-17', '2020-07-17 15:28:20'),
(41, 'ecourt', 13, 'ecourt', 'menunggu', '2020-07-17', '2020-07-17 15:28:23'),
(42, 'pendaftaran', 14, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:28:25'),
(43, 'pengambilan', 15, 'pengambilan', 'menunggu', '2020-07-17', '2020-07-17 15:28:27'),
(44, 'kasir', 16, 'kasir', 'menunggu', '2020-07-17', '2020-07-17 15:28:29'),
(45, 'pengaduan', 17, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:28:31'),
(46, 'pos', 18, 'pos', 'menunggu', '2020-07-17', '2020-07-17 15:28:32'),
(47, 'posbakum', 19, 'posbakum', 'menunggu', '2020-07-17', '2020-07-17 15:28:34'),
(48, 'pengambilan', 20, 'pengambilan', 'menunggu', '2020-07-17', '2020-07-17 15:28:35'),
(49, 'kasir', 21, 'kasir', 'menunggu', '2020-07-17', '2020-07-17 15:28:37'),
(50, 'bank', 22, 'bank', 'menunggu', '2020-07-17', '2020-07-17 15:28:41'),
(51, 'pendaftaran', 23, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:29:16'),
(52, 'kasir', 24, 'kasir', 'menunggu', '2020-07-17', '2020-07-17 15:29:21'),
(53, 'pengambilan', 25, 'pengambilan', 'menunggu', '2020-07-17', '2020-07-17 15:29:24'),
(54, 'pengaduan', 26, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:26'),
(55, 'pendaftaran', 27, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:29:28'),
(56, 'pendaftaran', 28, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:29:30'),
(57, 'pendaftaran', 29, 'pendaftaran', 'menunggu', '2020-07-17', '2020-07-17 15:29:32'),
(58, 'pengaduan', 30, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:34'),
(59, 'pengaduan', 31, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:36'),
(60, 'pengaduan', 32, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:39'),
(61, 'pengaduan', 33, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:43'),
(62, 'pengaduan', 34, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:45'),
(63, 'pengaduan', 35, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:47'),
(64, 'pengaduan', 36, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:49'),
(65, 'pengaduan', 37, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:50'),
(66, 'pengaduan', 38, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:51'),
(67, 'pengaduan', 39, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:53'),
(68, 'pengaduan', 40, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:29:55'),
(69, 'pengaduan', 41, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:30:02'),
(70, 'pengaduan', 42, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:30:05'),
(71, 'pengaduan', 43, 'pengaduan', 'menunggu', '2020-07-17', '2020-07-17 15:30:12'),
(72, 'posbakum', 44, 'posbakum', 'menunggu', '2020-07-17', '2020-07-17 15:32:08'),
(73, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-07-20', '2020-07-20 15:10:46'),
(74, 'pendaftaran', 2, 'pendaftaran', 'menunggu', '2020-07-20', '2020-07-20 15:11:54'),
(75, 'ecourt', 3, 'ecourt', 'menunggu', '2020-07-20', '2020-07-20 15:13:03'),
(76, 'pengaduan', 4, 'pengaduan', 'menunggu', '2020-07-20', '2020-07-20 15:13:43'),
(77, 'kasir', 5, 'kasir', 'menunggu', '2020-07-20', '2020-07-20 15:14:49'),
(78, 'kasir', 6, 'kasir', 'menunggu', '2020-07-20', '2020-07-20 15:15:54'),
(79, 'kasir', 7, 'kasir', 'menunggu', '2020-07-20', '2020-07-20 15:16:16'),
(80, 'posbakum', 8, 'posbakum', 'menunggu', '2020-07-20', '2020-07-20 15:16:53'),
(81, 'kasir', 9, 'kasir', 'menunggu', '2020-07-20', '2020-07-20 15:19:25'),
(82, 'posbakum', 10, 'posbakum', 'menunggu', '2020-07-20', '2020-07-20 15:19:41'),
(83, 'posbakum', 11, 'posbakum', 'menunggu', '2020-07-20', '2020-07-20 15:20:18'),
(84, 'kasir', 12, 'kasir', 'menunggu', '2020-07-20', '2020-07-20 15:21:09'),
(85, 'posbakum', 13, 'posbakum', 'menunggu', '2020-07-20', '2020-07-20 15:21:21'),
(86, 'ecourt', 14, 'ecourt', 'menunggu', '2020-07-20', '2020-07-20 15:21:59'),
(87, 'posbakum', 15, 'posbakum', 'menunggu', '2020-07-20', '2020-07-20 15:23:29'),
(88, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-07-22', '2020-07-22 01:16:22'),
(89, 'pengaduan', 1, 'pengaduan', 'kelar', '2020-07-26', '2020-07-26 02:15:27'),
(90, 'pengambilan', 2, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:14:37'),
(91, 'pengambilan', 3, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:14:56'),
(92, 'pengambilan', 4, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:15:04'),
(93, 'pengambilan', 5, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:15:16'),
(94, 'pengambilan', 6, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:16:07'),
(95, 'pengambilan', 7, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:16:12'),
(96, 'pengambilan', 8, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:16:26'),
(97, 'pengaduan', 9, 'pengaduan', 'kelar', '2020-07-26', '2020-07-26 02:27:21'),
(98, 'pengambilan', 10, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:18:29'),
(99, 'pengambilan', 11, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:18:29'),
(100, 'ecourt', 12, 'ecourt', 'menunggu', '2020-07-26', '2020-07-26 01:18:29'),
(101, 'pengaduan', 13, 'pengaduan', 'kelar', '2020-07-26', '2020-07-26 02:15:56'),
(102, 'pengambilan', 14, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:20:02'),
(103, 'pengaduan', 15, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 01:28:50'),
(104, 'pengaduan', 16, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 01:52:49'),
(105, 'pengaduan', 17, 'pengaduan', 'tunda', '2020-07-26', '2020-07-26 02:29:05'),
(106, 'pengambilan', 18, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 01:57:07'),
(107, 'pengaduan', 19, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 02:04:32'),
(108, 'pengaduan', 20, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 02:20:55'),
(109, 'pengaduan', 21, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 03:14:51'),
(110, 'pengaduan', 22, 'pengaduan', 'menunggu', '2020-07-26', '2020-07-26 03:16:57'),
(111, 'pengambilan', 23, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 07:23:05'),
(112, 'pengambilan', 24, 'pengambilan', 'menunggu', '2020-07-26', '2020-07-26 07:23:49'),
(113, 'ecourt', 25, 'ecourt', 'menunggu', '2020-07-26', '2020-07-26 07:24:26'),
(114, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-07-28', '2020-07-28 13:11:05'),
(115, 'pengambilan', 1, 'Dipanggil Tidak Masuk', 'menunggu', '2020-07-31', '2020-07-31 13:54:31'),
(116, 'pengaduan', 1, 'pengaduan', 'menunggu', '2020-09-11', '2020-09-11 01:27:30'),
(117, 'pengambilan', 1, 'pengambilan', 'menunggu', '2020-09-14', '2020-09-14 13:45:49'),
(118, 'pengambilan', 1, 'pengambilan', 'menunggu', '2020-09-25', '2020-09-25 07:17:34'),
(119, 'pengambilan', 1, 'kasir', 'menunggu', '2020-12-17', '2020-12-17 13:11:01'),
(120, 'pengambilan', 1, 'pengambilan', 'menunggu', '2020-12-24', '2020-12-24 02:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `panggil`
--

CREATE TABLE `panggil` (
  `id` varchar(64) NOT NULL,
  `no` int(3) NOT NULL,
  `layanan` varchar(32) NOT NULL,
  `pengumuman` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `kode` varchar(2) NOT NULL COMMENT 'kode jenis layanan',
  `layanan` varchar(32) NOT NULL COMMENT 'nama layanan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `kode`, `layanan`) VALUES
(1, 'A', 'pengaduan'),
(2, 'B', 'Pendaftaran'),
(3, 'C', 'pengambilan'),
(4, 'D', 'ecourt'),
(5, 'E', 'Kasir'),
(6, 'F', 'POSBAKUM'),
(7, 'G', 'POS'),
(8, 'H', 'BANK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `layanan` varchar(32) NOT NULL,
  `kode` varchar(32) NOT NULL COMMENT 'kode jenis layanan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `layanan`, `kode`) VALUES
(1, 'Pengaduan', 'pengaduan', '827ccb0eea8a706c4c34a16891f84e7b', 'Pengaduan dan Informsi', 'pengaduan'),
(2, 'Pendaftaran', 'pendaftaran', '827ccb0eea8a706c4c34a16891f84e7b', 'Pendaftaran', 'pendaftaran'),
(3, 'Pengambilan Produk', 'pengambilan', '827ccb0eea8a706c4c34a16891f84e7b', 'Pengambilan Produk', 'pengambilan'),
(4, 'Pendaftaran E-Court', 'ecourt', '827ccb0eea8a706c4c34a16891f84e7b', 'Pendaftaran E-Court', 'ecourt'),
(5, 'Kasir', 'kasir', '827ccb0eea8a706c4c34a16891f84e7b', 'Kasir', 'kasir'),
(6, 'POSBAKUM', 'posbakum', '827ccb0eea8a706c4c34a16891f84e7b', 'POSBAKUM', 'POSBAKUM'),
(7, 'POS', 'pos', '827ccb0eea8a706c4c34a16891f84e7b', 'POS', 'POS'),
(8, 'Bank', 'bank', '827ccb0eea8a706c4c34a16891f84e7b', 'Bank', 'bank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panggil`
--
ALTER TABLE `panggil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
