-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 11:50 AM
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
-- Table structure for table `data_keberangkatan`
--

CREATE TABLE IF NOT EXISTS `data_keberangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime DEFAULT '0000-00-00 00:00:00',
  `status` varchar(10) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `data_keberangkatan`
--

INSERT INTO `data_keberangkatan` (`id`, `nama`, `ktp`, `id_jadwal`, `seat`, `harga`, `date_added`, `status`, `date_modified`) VALUES
(1, 'ikhlasfirlana', '12345555', 1, 'A', 0, '2015-01-06 13:48:33', 'berangkat', '2015-01-06 09:17:51'),
(2, 'renny', '123123211', 1, 'A', 0, '2015-01-06 13:49:17', 'berangkat', '2015-01-06 09:17:51'),
(3, 'buleee', 'dsdsds', 1, 'B', 0, '2015-01-06 15:29:12', 'berangkat', '2015-01-07 06:42:05'),
(4, 'fi', 'jhsd', 1, 'A', 100000, '2015-01-06 16:21:49', 'pesan', '0000-00-00 00:00:00'),
(5, 'a', '12', 1, 'B', 25000, '2015-01-11 07:10:59', 'pesan', '0000-00-00 00:00:00'),
(6, 'a', '12', 1, 'B', 25000, '2015-01-11 07:10:59', 'pesan', '0000-00-00 00:00:00'),
(7, 'asd', 'asd', 1, 'C', 25000, '2015-01-11 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(8, 'asd', 'asd', 1, 'C', 25000, '2015-01-11 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(9, 'asd', 'asd', 1, 'A', 100000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(10, 'df', '23', 1, 'A', 100000, '2015-01-07 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(11, 'hello', '123', 1, 'C', 25000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(12, 'sss', '2222221222', 1, 'A', 100000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(13, '', '', 1, 'A', 100000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(14, 'asd', 'asd', 1, 'A', 100000, '2015-01-14 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(15, '', '', 1, 'B', 25000, '2015-01-13 00:00:00', 'pesan', '0000-00-00 00:00:00'),
(16, 'df', '2222221222', 1, 'B', 25000, '2015-01-12 00:00:00', 'pesan', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, 1, 1, 'berangkat', '2015-01-11 00:09:49');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_tipe_kendaraan`, `date_added`, `keterangan`, `status`) VALUES
(1, 1, '2015-01-06 06:30:56', 'jam 8.00', 'berangkat'),
(2, 1, '2015-01-06 06:30:56', 'jam 9.00', 'ready'),
(3, 2, '2015-01-06 06:31:38', 'jam 8.15', 'cancel'),
(4, 2, '2015-01-06 06:31:38', 'jam 9.15', 'berangkat'),
(5, 1, '2015-01-10 17:11:20', 'jam 10.00', 'berangkat');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `harga`, `id_keberangkatan`, `date_added`) VALUES
(1, 100000, 2, '2015-01-06 06:50:41'),
(2, 100000, 1, '2015-01-06 08:50:57'),
(3, 100000, 1, '2015-01-06 08:51:31'),
(4, 50000, 3, '2015-01-06 09:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE IF NOT EXISTS `tipe_kendaraan` (
  `id` int(11) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id`, `seat`, `harga`, `nama_kendaraan`) VALUES
(1, 'A', 100000, 'elf 1'),
(1, 'B', 25000, 'elf 1'),
(1, 'C', 25000, 'elf 1'),
(2, 'A', 30000, 'elf 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_privillage` int(11) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_privillage`) VALUES
('admin', 'admin', 1),
('cashier', 'cashier', 2),
('manager', 'manager', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
