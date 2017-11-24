-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2015 at 04:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ticket_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `content`, `date_added`) VALUES
(0, '		test\r\n<img src="http://localhost/umbara/assets/img_template_3/1.jpg" />		', '2015-01-24 16:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `data_keberangkatan`
--

CREATE TABLE IF NOT EXISTS `data_keberangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `id_seat` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime DEFAULT '0000-00-00 00:00:00',
  `status` varchar(10) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `url_bukti` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `data_keberangkatan`
--

INSERT INTO `data_keberangkatan` (`id`, `nama`, `ktp`, `id_jadwal`, `seat`, `id_seat`, `harga`, `date_added`, `status`, `date_modified`, `id_user`, `url_bukti`) VALUES
(1, 'ikhlasfirlana', '12345555', 1, 'A', 0, 0, '2015-01-06 13:48:33', 'berangkat', '2015-01-06 09:17:51', 0, '0'),
(2, 'renny', '123123211', 1, 'A', 0, 0, '2015-01-06 13:49:17', 'berangkat', '2015-01-06 09:17:51', 0, '0'),
(3, 'buleee', 'dsdsds', 1, 'B', 0, 0, '2015-01-06 15:29:12', 'berangkat', '2015-01-07 06:42:05', 0, '0'),
(4, 'fi', 'jhsd', 1, 'A', 0, 100000, '2015-01-06 16:21:49', 'berangkat', '2015-01-24 08:18:59', 0, '0'),
(5, 'a', '12', 1, 'B', 0, 25000, '2015-01-11 07:10:59', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(6, 'a', '12', 1, 'B', 0, 25000, '2015-01-11 07:10:59', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(7, 'asd', 'asd', 1, 'C', 0, 25000, '2015-01-11 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(8, 'asd', 'asd', 1, 'C', 0, 25000, '2015-01-11 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(9, 'asd', 'asd', 1, 'A', 0, 100000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(10, 'df', '23', 1, 'A', 0, 100000, '2015-01-07 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(11, 'hello', '123', 1, 'C', 0, 25000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(12, 'sss', '2222221222', 1, 'A', 0, 100000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(13, '', '', 1, 'A', 0, 100000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(14, 'asd', 'asd', 1, 'A', 0, 100000, '2015-01-14 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(15, '', '', 1, 'B', 0, 25000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(16, 'df', '2222221222', 1, 'B', 0, 25000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(17, '', '', 1, 'A', 0, 100000, '2015-01-14 17:54:12', 'pesan', '0000-00-00 00:00:00', 0, '0'),
(18, 'ikhlas', '115656', 1, '', 2, 0, '2015-01-24 00:00:00', 'clear', '2015-01-24 08:46:31', 4, '18.jpg'),
(19, 'asd', 'SD', 1, '', 1, 0, '2015-01-24 00:00:00', 'pesan', '0000-00-00 00:00:00', 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_keberangkatan_armada`
--

CREATE TABLE IF NOT EXISTS `data_keberangkatan_armada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipe_kendaraan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `data_keberangkatan_armada`
--

INSERT INTO `data_keberangkatan_armada` (`id`, `id_tipe_kendaraan`, `id_jadwal`, `status`, `date_added`) VALUES
(1, 0, 0, '', '2015-01-06 09:10:51'),
(2, 1, 1, 'berangkat', '2015-01-06 09:17:51'),
(3, 1, 2, 'ready', '2015-01-06 09:20:44'),
(4, 1, 1, 'ready', '2015-01-06 09:20:50'),
(5, 1, 1, 'ready', '2015-01-06 09:22:40'),
(6, 1, 1, 'berangkat', '2015-01-06 09:23:22'),
(7, 1, 1, 'berangkat', '2015-01-06 09:24:05'),
(8, 1, 1, 'berangkat', '2015-01-07 06:42:04'),
(9, 1, 1, 'berangkat', '2015-01-11 00:09:49'),
(10, 1, 1, 'berangkat', '2015-01-24 08:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE IF NOT EXISTS `destinasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_destinasi` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `nama_destinasi`, `date_added`) VALUES
(1, 'pamulang', '2015-01-18 19:02:57'),
(2, 'bandung', '2015-01-18 19:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipe_kendaraan` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_tujuan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_tipe_kendaraan`, `date_added`, `keterangan`, `status`, `id_tujuan`) VALUES
(1, 1, '2015-01-06 06:30:56', 'bandung - pamulang jam 8.00', 'berangkat', 1),
(2, 1, '2015-01-06 06:30:56', 'bandung - pamulang jam 9.00', 'ready', 1),
(3, 2, '2015-01-06 06:31:38', 'bandung - pamulang jam 8.15', 'cancel', 1),
(4, 2, '2015-01-06 06:31:38', 'bandung - pamulang  jam 9.15', 'berangkat', 1),
(5, 1, '2015-01-10 17:11:20', 'bandung - pamulang jam 10.00', 'berangkat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `nama_seat` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `kode`, `nama_seat`, `harga`) VALUES
(1, 'elf', 'A', 100000),
(2, 'elf', 'B', 100000),
(3, 'elf', 'C', 100000),
(4, 'elf', 'D', 100000),
(5, 'elf', 'E', 100000),
(6, 'elf', 'F', 100000),
(7, 'elf', 'G', 100000),
(9, 'apv', 'A', 150000),
(10, 'apv', 'B', 150000),
(11, 'apv', 'C', 150000),
(12, 'apv', 'D', 150000),
(13, 'apv', 'E', 150000),
(14, 'apv', 'F', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harga` int(11) NOT NULL,
  `id_keberangkatan` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `harga`, `id_keberangkatan`, `date_added`) VALUES
(1, 100000, 2, '2015-01-06 06:50:41'),
(2, 100000, 1, '2015-01-06 08:50:57'),
(3, 100000, 1, '2015-01-06 08:51:31'),
(4, 50000, 3, '2015-01-06 09:24:23'),
(5, 100000, 4, '2015-01-24 07:56:46'),
(6, 100000, 18, '2015-01-24 08:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE IF NOT EXISTS `tipe_kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `nama_kendaraan` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id`, `kode`, `nama_kendaraan`) VALUES
(1, 'elf', 'elf 1'),
(2, 'apv', 'apv 1');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_destinasi_awal` int(11) NOT NULL,
  `id_destinasi_akhir` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id`, `id_destinasi_awal`, `id_destinasi_akhir`, `date_added`) VALUES
(1, 2, 1, '2015-01-18 19:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_privillage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_privillage`) VALUES
(1, 'admin', 'admin', 1),
(2, 'cashier', 'cashier', 2),
(3, 'manager', 'manager', 3),
(4, 'user', 'user', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE IF NOT EXISTS `user_tb` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_privillage` int(11) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`username`, `password`, `id_privillage`) VALUES
('admin', 'admin', 1),
('cashier', 'cashier', 2),
('manager', 'manager', 3),
('user', 'user', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
