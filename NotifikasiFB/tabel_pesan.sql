-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2010 at 06:29 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesan`
--

CREATE TABLE `tabel_pesan` (
  `nomor` int(10) NOT NULL auto_increment,
  `waktu` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `sudahbaca` varchar(1) NOT NULL,
  PRIMARY KEY  (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tabel_pesan`
--

INSERT INTO `tabel_pesan` (`nomor`, `waktu`, `dari`, `kepada`, `pesan`, `sudahbaca`) VALUES
(1, '12:30 21 Oct 2010', 'Desrizal', 'budi', 'Halo apakabar?', 'N'),
(2, '14:50 22 Oct 2010', 'Nurmi', 'budi', 'Hai...', 'N');
