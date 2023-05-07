-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 03:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengepul`
--

CREATE TABLE `pengepul` (
  `id_p` int(11) NOT NULL,
  `nama_p` varchar(50) NOT NULL,
  `kode_produk` varchar(21) NOT NULL,
  `harga_p` int(21) NOT NULL,
  `tanggal_p` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengepul`
--

INSERT INTO `pengepul` (`id_p`, `nama_p`, `kode_produk`, `harga_p`, `tanggal_p`, `status`) VALUES
(37, 'Ahmad', 'J6', 8900, '2023-02-21', 2),
(39, 'Arya', 'K21', 9000, '2023-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama_pengunjung`, `email`, `pesan`) VALUES
(11, 'Muammar', 'ammar21@gmail.com', 'websitenya sangat membantu\r\nuntuk mendistribusikan hasil tani kami'),
(12, 'Iman', 'iman3456@gmail.com', 'kalau boleh, saudara dapat menambahkan\r\nfitur fitur lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `kode_produk` varchar(21) NOT NULL,
  `jenis_produk` varchar(21) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `kode_produk`, `jenis_produk`, `alamat`, `jumlah`, `gambar`, `deskripsi`, `id_user`) VALUES
(48, 'Jagung', 'J6', 'jagung', 'Sanrego', 78, '63dcaed2b9a3e.jpg', 'ini jagung kami puang', 26),
(50, 'Ahmad', 'A61', 'padi', 'Samata', 68, '63ee1316e8eb4.jpg', 'ini adalah padi kami', 26),
(51, 'Ashar', 'A62', 'jagung', 'Barru', 68, '63ee13442119a.jpg', 'ini adalah jagung kami', 26),
(52, 'Minato', 'A63', 'kacang', 'Bone', 45, '63ee138c332e5.jpg', 'ini adalah kacang kami', 26),
(53, 'Ichsan', 'P21', 'padi', 'Pakkatto', 66, '63ee1426139b7.jpeg', 'ini padi berkarung', 27),
(54, 'Mamat', 'K21', 'kacang', 'Gowa', 35, '63ee146034561.jpg', 'ini adalah kacang kami', 27),
(55, 'Abdul', 'A32', 'jagung', 'Makassar', 32, '63ee14a29620e.jpg', 'ini adalah jagung kami', 27),
(56, 'Amrullah', 'A31', 'jagung', 'Barru', 67, '63ee14eab7958.jpg', 'ini adalah jagung kami', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nomor_hp` varchar(21) NOT NULL,
  `role` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `nama_user`, `password`, `nomor_hp`, `role`) VALUES
(26, 'petani', 'petani', '$2y$10$2YNtrgJYD6J2s.rWZIbfXuTbumHsTm0dXV3KNXt/y/X2U7O77g9p2', '90486', 'Petani'),
(27, 'farmer', 'farmer', '$2y$10$Aje6MVknZvbQOE9Rgu9ASO6SCSY.xW/U4QN3cDMD98lHYrxTvdZ/y', '4984', 'Petani'),
(28, 'pengepul', 'pengepul', '$2y$10$5g4ywEHdLvl9IRIvGbK0XOhBz7XHWRpBg8UU.42fodmhH2vbWLc9m', '3294', 'Pengepul'),
(29, 'tengkulak', 'tengkulak', '$2y$10$zUTP083.n2RQNPhlYsH8P.Apo202r3aYZySTFF14ZBEavKl2AJiYG', '9468496', 'Pengepul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengepul`
--
ALTER TABLE `pengepul`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengepul`
--
ALTER TABLE `pengepul`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
