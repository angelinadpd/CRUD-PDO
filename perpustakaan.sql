-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 01:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`kode` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahunterbit` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode`, `judul`, `pengarang`, `penerbit`, `tahunterbit`) VALUES
(0, 'Surat Kecil Untuk Tuhan', 'Agnes Danovar', 'Inandra Published', '2003'),
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka Yogyakarta', '2005'),
(2, '5 cm', 'Donny Dhirgantoro', 'PT. Grasindo', '2007'),
(3, 'Sang Pemimpi', 'Andrea Hirata', ' P.T Bentang Pustaka', '2011'),
(4, 'Perahu Kertas', 'Dewi Lestari', 'Bentang Pustaka Yogyakarta', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`) VALUES
(2, 'admin1', '$2y$10$v2uuNnH1H5MvdTs6TvvKWu4iEWDK.58yimOXKYfq.ODNZkZ1gXC0q', 'admin1', 'admin1@gmail.com'),
(3, 'angel', '$2y$10$s743fRHiFlRSaongCrdSp.Gc14CHuQv3HC5p1.bVGtmbQtRUG6ZGe', 'Angel', 'angelinadpd@gmail.com'),
(4, 'angelinadinar', '$2y$10$vVEFJze28qOkUOQa/JXxuecIatKUYQnKXYFXHBNWWPCkAMkkrdiQ.', 'Angelina Dinar', 'angelina.dinar@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
