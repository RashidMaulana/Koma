-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 04:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koma`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID` int(32) NOT NULL,
  `kode_produk` char(3) NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `jenis_barang` varchar(64) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `id_pemilik` int(32) NOT NULL,
  `gambar_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `kode_produk`, `nama_barang`, `stok_barang`, `jenis_barang`, `harga_barang`, `id_pemilik`, `gambar_barang`) VALUES
(0, 'B01', 'Semen Tiga Roda', 50, 'Bahan Bangunan', 50000, 1, 'semen.jpg'),
(1, 'B02', 'Avitex', 60, 'Cat', 60000, 1, 'cat.jpg'),
(2, 'B03', 'Kuas 2.5\"', 30, 'Alat Bangunan', 10000, 1, 'kuas.jpg'),
(3, 'B04', 'Asbes', 25, 'Bahan Bangunan', 20000, 1, 'asbes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_order` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `ID` int(32) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `batal_transaksi` AFTER DELETE ON `detail_transaksi` FOR EACH ROW BEGIN
 
UPDATE masakan SET stok_barang = stok_barang + OLD.qty
 
WHERE ID = OLD.ID;
 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
 
UPDATE masakan SET stok_barang = stok_barang - NEW.qty
 
WHERE ID = NEW.ID;
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `ID` int(32) NOT NULL,
  `nama_pemilik` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`ID`, `nama_pemilik`) VALUES
(1, 'Bambang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `id_barang` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `jumlah_barang` int(64) NOT NULL,
  `total_harga` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(32) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` varchar(320) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `namalengkap`, `username`, `password`, `email`, `telepon`, `alamat`, `gambar`) VALUES
(23, 'asdasd', 'asdasd', '$2y$10$qwR1zMzwEIgFrfRPuM6LJe6Q9/dkM5Ul/GFEJUW1HOt.M2d1zDK1W', 'as@asd.com', '123123', 'asdljf', '61bc6f24d5026.png'),
(24, 'pandan', 'qwe', '$2y$10$j0oDl2M3WCDhBrrEfL8BtuBYOCQCBMOyfua3xO5rZ.jciVMPCxOT.', 'pandan@gmail.com', '123123123', 'solo', '61bcf3a7b75c7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `index_id_pemilik` (`id_pemilik`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `index_user` (`id_user`) USING BTREE,
  ADD KEY `index_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
