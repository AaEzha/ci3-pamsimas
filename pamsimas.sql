-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2021 at 03:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pamsimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas_harian`
--

CREATE TABLE `kas_harian` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ket` varchar(128) NOT NULL,
  `debet` varchar(128) NOT NULL,
  `kredit` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_harian`
--

INSERT INTO `kas_harian` (`id`, `date`, `ket`, `debet`, `kredit`, `jumlah`) VALUES
(6, '2021-05-01', 'Diiterima iuran bulan mei', '1000000', '0', '1000000'),
(11, '2021-05-07', 'Bayar piutang', '0', '200000', '800000'),
(17, '2021-05-08', 'Beli Perlengkapan ', '0', '800000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `bulan` tinyint(2) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `date` date NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `denda` varchar(128) NOT NULL,
  `tagihan` varchar(128) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `name`, `alamat`, `bulan`, `tahun`, `date`, `biaya`, `denda`, `tagihan`, `bukti`, `status`) VALUES
(5, 28, 'Yolla Azura Sasmita', 'Pandam', 2, 2021, '2021-05-24', '15000', '2000', '17000', 'payments/octocat.png', 0),
(6, 28, 'Yolla Azura Sasmita, S.Kom.', 'Pandam A', 3, 2021, '2021-05-31', '123', '123', '123', 'payments/octocat.png', 0),
(7, NULL, 'Ega Melgia Sasmita', 'Kp. Ambacang', 6, 2021, '2021-06-17', '15000', '20000', '35000', 'payments/1d90d61eb35eef6ad50f8abba74cdef0.png', 3),
(8, 28, 'Ega Melgia Sasmita', 'Kp. Ambacang', 6, 2021, '2021-06-17', '15000', '20000', '35000', 'payments/224b3fd47128a98fceecfe42f9cc82c6.png', 0),
(9, 28, 'Ega Melgia Sasmita', 'Kp. Ambacang', 6, 2021, '2021-06-10', '15000', '6000', '21000', 'payments/cf4b1d0a1b080e338e501e4fafb31ef0.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `email`, `name`, `nik`, `alamat`, `pekerjaan`) VALUES
(13, 'yollaazura@gmail.com', 'Yolla Azura Sasmita', '0800987678900011', 'Pandam A', 'Pengusaha'),
(14, 'member@gmail.com', 'Ega Melgia Sasmita', '0800987678900010', 'Kp. Ambacang', 'Pegawai Negeri'),
(15, 'admin@gmail.com', 'Yolla Azura Sasmita', '0800987678900011', 'Pandam A', 'Pengusaha');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(27, 'Yolla Azura Sasmita, S.Kom.', 'yollaazura@gmail.com', 'rsz_1img_8037_mr1617100388892-min.jpg', '$2y$10$TdUOJTmnXStTjVx4LX9GkOZkaBdCBwPF3KFtczDsXi8n390u.DlZ2', 1, 1, 1619961876),
(28, 'Ega Melgia Sasmita', 'member@gmail.com', '6edefd6c41bc308fbdbf662abe9164f8.png', '$2y$10$d7IkeGlBq6RCENz0r/1a..DoWygJvmQDgQDfG9pkAaoSvuNxqJJS6', 2, 1, 1619962931),
(29, 'Ferdi Febriansah', 'koor@gmail.com', 'default.jpg', '$2y$10$KVUMmqwFIRHwaKUruxoniOimMQV2BMz8utAoPsZSF3ST9/ufA2DLK', 3, 1, 1620314884),
(30, 'Yolla Azura Sasmita, S.Kom.', 'admin@gmail.com', 'rsz_1img_8037_mr1617100388892-min.jpg', '$2y$10$TdUOJTmnXStTjVx4LX9GkOZkaBdCBwPF3KFtczDsXi8n390u.DlZ2', 1, 1, 1619961876);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 3, 4),
(8, 1, 2),
(9, 1, 4),
(10, 4, 2),
(11, 4, 3),
(12, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'menu'),
(4, 'Koordinator');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'koordinator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'far fa-fw fa-circle', 1),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(12, 1, 'Kas Harian', 'admin/kasharian', 'fas fa-fw fa-wallet', 1),
(17, 5, 'Isi Data Pelanggan', 'user/isipelanggan', 'fas fa-fw fa-user-plus', 1),
(18, 2, 'Pembayaran', 'user/list', 'fas fa-fw fa-cash-register', 1),
(25, 1, 'Pelanggan', 'admin/pelanggan', 'fas fa-fw fa-users', 1),
(26, 1, 'Payment', 'admin/payment', 'far fa-fw fa-credit-card', 1),
(27, 4, 'Dashboard', 'koordinator', 'fas fa-fw fa-tachometer-alt', 1),
(28, 4, 'Report', 'koordinator/report', 'fas  fa-fw fa-chart-line', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas_harian`
--
ALTER TABLE `kas_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas_harian`
--
ALTER TABLE `kas_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
