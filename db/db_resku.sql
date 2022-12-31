-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2022 at 10:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resku`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans`
--

CREATE TABLE `detail_trans` (
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_trans`
--

INSERT INTO `detail_trans` (`id_transaksi`, `id_menu`, `qty`, `total`) VALUES
(140, 4, 1, 10000),
(141, 5, 1, 12000),
(141, 11, 1, 7000);

--
-- Triggers `detail_trans`
--
DELIMITER $$
CREATE TRIGGER `hapus_total` AFTER DELETE ON `detail_trans` FOR EACH ROW UPDATE transaksi SET total = (SELECT SUM(old.total) from detail_trans WHERE detail_trans.id_transaksi = old.id_transaksi)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `qty` BEFORE INSERT ON `detail_trans` FOR EACH ROW set new.total = new.qty * (SELECT harga from menu WHERE id = new.id_menu)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `qty2` BEFORE UPDATE ON `detail_trans` FOR EACH ROW set new.total = new.qty * (SELECT harga from menu WHERE id = new.id_menu)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total` AFTER INSERT ON `detail_trans` FOR EACH ROW UPDATE transaksi set total = (SELECT sum(total) FROM detail_trans WHERE detail_trans.id_transaksi = new.id_transaksi) WHERE transaksi.id = new.id_transaksi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_edit` AFTER UPDATE ON `detail_trans` FOR EACH ROW UPDATE transaksi set total = (SELECT sum(total) FROM detail_trans WHERE detail_trans.id_transaksi = new.id_transaksi) WHERE transaksi.id = new.id_transaksi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_hapus` AFTER DELETE ON `detail_trans` FOR EACH ROW UPDATE transaksi set total = (SELECT sum(total) FROM detail_trans WHERE detail_trans.id_transaksi = old.id_transaksi) WHERE transaksi.id = old.id_transaksi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_transaksi` AFTER INSERT ON `detail_trans` FOR EACH ROW UPDATE transaksi set total = (SELECT sum(total) FROM detail_trans WHERE id_transaksi = new.id_transaksi) WHERE id = new.id_transaksi
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` enum('admin','petugas') NOT NULL,
  `jk` enum('P','L') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gambar` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`, `status`, `jk`, `telp`, `alamat`, `gambar`, `email`) VALUES
(2, 'amel', 'amel', '123', 'admin', 'P', '09112112123', 'jember', '1.jpg', 'amel@gmail.com'),
(4, 'dewi ika', 'dewi', '123', 'admin', 'P', '091232234500', 'Jember', '2.jpg', 'dewi@gmail.com'),
(5, 'masayu ', 'masayu', '123', 'admin', 'P', '091232234543', 'Madiun', '11.jpg', 'masayu@gmail.com'),
(6, 'duwi wirda', 'duwi', '123', 'petugas', 'P', '091232234547', 'surabaya', '4.jpg', 'duwi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `gambar`, `nama`, `harga`) VALUES
(2, 'ayambakar.jpg', 'Ayam Bakar', 15000),
(4, 'ariam.jpg', 'Mariam', 10000),
(5, 'ankcake.jpg', 'Pancake', 12000),
(7, 'bakso.jpeg', 'bakso', 12000),
(8, 'cmlmm.jpg', 'Kue Goreng', 7000),
(9, 'dimsumm.jpg', 'Dimsum', 16000),
(10, 'enakkk.jpg', 'Jus Stroberi', 11000),
(11, 'esjeruk.jpg', 'Es Jeruk', 7000),
(12, 'jusmangga.jpg', 'Jus Mangga', 10000),
(13, 'krim.jpg', 'Es Krim', 8000),
(14, 'mieayam.jpg', 'Mi Ayam', 10000),
(15, 'ochi.jpg', 'Mochi', 6000),
(16, 'supppp.jpg', 'Ramen', 13000),
(17, 'risol.jpg', 'Risol Mayo', 12000),
(18, 'oklat.jpg', 'Coklat Stroberi', 23000),
(19, 'tehobeng.jpg', 'Es Teh', 5000),
(20, 'nasgor.jpg', 'Nasi Goreng', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `checkout` enum('true','false') NOT NULL DEFAULT 'false',
  `valid` enum('true','false') NOT NULL DEFAULT 'false',
  `total` int(6) NOT NULL DEFAULT '0',
  `no_meja` enum('A1','A2','A3','A4','A5','A6','A7') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `nama`, `checkout`, `valid`, `total`, `no_meja`) VALUES
(140, '2022-12-31', 'ana', 'true', 'true', 10000, 'A4'),
(141, '2022-12-31', 'siska', 'true', 'true', 19000, 'A3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_trans`
--
ALTER TABLE `detail_trans`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_menu_2` (`id_menu`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_trans`
--
ALTER TABLE `detail_trans`
  ADD CONSTRAINT `detail_trans_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_trans_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
