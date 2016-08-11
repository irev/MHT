-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `ikon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id`, `nama_kategori`, `ikon`) VALUES
(1,	'Rumah Sakit',	'hospital-building.png'),
(2,	'Komplek Perumahan',	'townhouse.png'),
(3,	'Cafetaria',	'fastfood.png'),
(4,	'Masjid',	'mosquee.png'),
(5,	'Gereja',	'church-2.png'),
(6,	'Area Pemakaman',	'cemetary.png'),
(7,	'Kantor Pos',	'postal.png'),
(8,	'Kantor Polisi',	'police.png'),
(9,	'Area Militer',	'army.png'),
(10,	'Salon / Pangkas Rambut',	'barber.png'),
(11,	'Terminal Bus',	'bus.png'),
(12,	'Perpustakaan',	'book.png'),
(13,	'Kantor Pemadam Kebakaran',	'firemen.png'),
(14,	'Apotek',	'medicalstore.png'),
(15,	'Sekolah',	'school.png'),
(16,	'Gerbang Tol',	'tollstation.png'),
(17,	'Stasiun Kereta Api',	'train.png'),
(18,	'Universitas',	'university.png');

DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `latittude` text NOT NULL,
  `longitude` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `lokasi` (`id`, `kategori`, `nama`, `alamat`, `latittude`, `longitude`) VALUES
(1,	17,	'Stasiun Kereta Api Purwakarta',	'Jl. Kolonel Kornel Singawinata No. 1, Nagritengah',	'-6.553821679356983',	'107.44699837046812'),
(2,	18,	'Universitas Purwakarta',	'Jl. Let. Jend. Basuki Rahmat No.25',	'-6.560845728960138',	'107.4424922593231'),
(3,	1,	'Rumah Sakit Umum Bayu Asih',	'Jalan Veteran No. 39, Negeri Kaler',	'-6.536373043280273',	'107.44418741542052'),
(4,	4,	'Masjid Agung Purwakarta',	'JL. Doktor Mr Kusumaatmaja',	'-6.555729587294924',	'107.44107337075422');

-- 2014-06-25 09:24:38
