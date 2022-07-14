-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2022 at 06:29 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_majumundur`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `hapusbarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusbarang` (`a` VARCHAR(5))  BEGIN
DELETE FROM barang WHERE kodeb=a;
END$$

DROP PROCEDURE IF EXISTS `hapusktg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusktg` (`a` VARCHAR(3))  BEGIN
DELETE FROM kategori WHERE kodektg=a;
END$$

DROP PROCEDURE IF EXISTS `procedure1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedure1` ()  BEGIN

END$$

DROP PROCEDURE IF EXISTS `tabelbarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tabelbarang` ()  BEGIN
SELECT * FROM barang;
END$$

DROP PROCEDURE IF EXISTS `tambahbarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambahbarang` (`a` VARCHAR(5), `b` VARCHAR(50), `c` VARCHAR(3))  BEGIN
INSERT INTO barang
VALUES(a,b,c);
END$$

DROP PROCEDURE IF EXISTS `tambah_db_barang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_db_barang` (`a` VARCHAR(10), `b` VARCHAR(5), `c` VARCHAR(10), `d` INT, `e` INT)  BEGIN
INSERT INTO detail_barang
VALUES(a,b,c,d,e);
END$$

DROP PROCEDURE IF EXISTS `tambah_nota`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_nota` (`a` VARCHAR(10), `b` DATE)  BEGIN
INSERT INTO m_jual
VALUES(a,b);
END$$

DROP PROCEDURE IF EXISTS `tampil1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil1` ()  BEGIN
SELECT
d_jual.Djual,m_jual.tgl,barang.namab,barang.harga,d_jual.jml
FROM d_jual,m_jual,barang
WHERE d_jual.Nota = m_jual.Nota
AND
d_jual.kodeb=barang.kodeb;
END$$

DROP PROCEDURE IF EXISTS `tampil2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil2` (`Djual` VARCHAR(10))  BEGIN
SELECT
d_jual.Djual,m_jual.tgl,barang.namab,barang.harga,d_jual.jml
FROM d_jual,m_jual,barang
WHERE d_jual.Nota = m_jual.Nota
AND
d_jual.kodeb=barang.kodeb AND d_jual.DJual=DJual;
END$$

DROP PROCEDURE IF EXISTS `tampilktg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilktg` ()  BEGIN
SELECT * FROM kategori;
END$$

DROP PROCEDURE IF EXISTS `tampil_barang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_barang` ()  BEGIN
SELECT barang.*,kategori.namak
FROM barang INNER JOIN kategori 
ON kategori.kodektg=barang.kodektg;
END$$

DROP PROCEDURE IF EXISTS `tampil_index`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_index` ()  BEGIN
SELECT m_jual.Nota, m_jual.tgl,d_jual.Djual, barang.namab, detail_barang.satuan, detail_barang.harga,
d_jual.jml,(detail_barang.harga * d_jual.jml) as total
FROM d_jual,m_jual,detail_barang,barang
WHERE m_jual.Nota = d_jual.Nota
AND
d_jual.kodedb=detail_barang.kodedb
AND
detail_barang.kodeb=barang.kodeb;
END$$

DROP PROCEDURE IF EXISTS `tbarang_kodeb`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tbarang_kodeb` (`a` VARCHAR(3))  BEGIN
SELECT * FROM barang WHERE kodeb=a;
END$$

DROP PROCEDURE IF EXISTS `updatbarang`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatbarang` (`a` VARCHAR(5), `b` VARCHAR(50), `c` VARCHAR(3))  BEGIN
UPDATE barang
set kodeb=a, namab=b, kodektg=c
WHERE kodeb=a;
END$$

DROP PROCEDURE IF EXISTS `upd_db`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `upd_db` (`kodedb` VARCHAR(10), `kodeb` VARCHAR(5), `satuan` VARCHAR(10), `harga` INT, `stok` INT)  BEGIN
UPDATE detail_barang
set kodedb=kodedb, kodeb=kodeb, satuan=satuan, harga=harga, stok=stok
WHERE kodedb=kodedb;
END$$

--
-- Functions
--
DROP FUNCTION IF EXISTS `banyakbarang`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `banyakbarang` (`a` VARCHAR(3)) RETURNS VARCHAR(3) CHARSET utf8mb4 BEGIN

RETURN (SELECT COUNT(kodektg) AS banyak
FROM barang
WHERE kodektg=a);
END$$

DROP FUNCTION IF EXISTS `jumlah_terjual`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_terjual` (`a` VARCHAR(10)) RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN

RETURN (SELECT SUM(jml)
FROM d_jual
WHERE kodedb=a);
END$$

DROP FUNCTION IF EXISTS `total`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `total` () RETURNS INT BEGIN

RETURN (SELECT (detail_barang.harga * d_jual.jml) as total
from detail_barang,d_jual
WHERE detail_barang.kodedb = d_jual.kodedb);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `kodeb` varchar(5) NOT NULL,
  `namab` varchar(50) DEFAULT NULL,
  `kodektg` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`kodeb`),
  KEY `kodektg` (`kodektg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodeb`, `namab`, `kodektg`) VALUES
('b1', 'surya12', 'kt2'),
('b10', 'indomie ayam bawang', 'kt3'),
('b11', 'indomie rendang', 'kt3'),
('b2', 'promerah16', 'kt2'),
('b3', 'sabun lux', 'kt1'),
('b4', 'djisamsu', 'kt2'),
('b5', 'roekon', 'kt2'),
('b6', 'sampoerna 16', 'kt2'),
('b7', 'life boy', 'kt1'),
('b8', 'mie sedap', 'kt3'),
('b9', 'indomie original', 'kt3');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

DROP TABLE IF EXISTS `detail_barang`;
CREATE TABLE IF NOT EXISTS `detail_barang` (
  `kodedb` varchar(10) NOT NULL,
  `kodeb` varchar(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  PRIMARY KEY (`kodedb`),
  KEY `kodeb` (`kodeb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`kodedb`, `kodeb`, `satuan`, `harga`, `stok`) VALUES
('b1_PCS', 'b1', 'PCS', 21000, 16),
('b1_SLOP', 'b1', 'SLOP', 240000, 8),
('b2_PCS', 'b2', 'PCS', 24000, 4),
('b2_SLOP', 'b2', 'SLOP', 300000, 5),
('b3_PCS', 'b3', 'PCS', 3000, 12),
('b4_PCS', 'b4', 'PCS', 18000, 10),
('b5_PCS', 'b5', 'PCS', 14000, 10),
('b6_PCS', 'b6', 'PCS', 25000, 4),
('b7_PCS', 'b7', 'PCS', 4000, 6),
('b8_PCS', 'b8', 'PCS', 3000, 11),
('b9_PCS', 'b9', 'PCS', 3500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `d_jual`
--

DROP TABLE IF EXISTS `d_jual`;
CREATE TABLE IF NOT EXISTS `d_jual` (
  `Djual` varchar(10) NOT NULL,
  `Nota` varchar(10) DEFAULT NULL,
  `kodedb` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml` int DEFAULT NULL,
  PRIMARY KEY (`Djual`),
  KEY `kodeb` (`kodedb`),
  KEY `Nota` (`Nota`),
  KEY `kodedb` (`kodedb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d_jual`
--

INSERT INTO `d_jual` (`Djual`, `Nota`, `kodedb`, `jml`) VALUES
('1', '1', 'b1_PCS', 2),
('2', '2', 'b1_PCS', 1),
('3', '3', 'b7_PCS', 2),
('4', '4', 'b2_PCS', 2),
('5', '1', 'b6_PCS', 2),
('test', '6', 'b9_PCS', 10),
('test2', '1', 'b3_PCS', 1);

--
-- Triggers `d_jual`
--
DROP TRIGGER IF EXISTS `updatestok`;
DELIMITER $$
CREATE TRIGGER `updatestok` BEFORE INSERT ON `d_jual` FOR EACH ROW BEGIN
 UPDATE detail_barang
 set stok=stok-New.jml
 WHERE kodedb=New.kodedb;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kodektg` varchar(3) NOT NULL,
  `namak` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kodektg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kodektg`, `namak`) VALUES
('kt1', 'sabun'),
('kt2', 'rokok'),
('kt3', 'mie instan'),
('kt4', 'minyak zaitun'),
('kt7', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `m_jual`
--

DROP TABLE IF EXISTS `m_jual`;
CREATE TABLE IF NOT EXISTS `m_jual` (
  `Nota` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`Nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_jual`
--

INSERT INTO `m_jual` (`Nota`, `tgl`) VALUES
('1', '2022-07-14'),
('2', '2022-07-14'),
('3', '2022-07-14'),
('4', '2022-07-14'),
('5', '2022-07-14'),
('6', '2022-07-14');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kodektg`) REFERENCES `kategori` (`kodektg`);

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`kodeb`) REFERENCES `barang` (`kodeb`);

--
-- Constraints for table `d_jual`
--
ALTER TABLE `d_jual`
  ADD CONSTRAINT `d_jual_ibfk_2` FOREIGN KEY (`Nota`) REFERENCES `m_jual` (`Nota`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `d_jual_ibfk_3` FOREIGN KEY (`kodedb`) REFERENCES `detail_barang` (`kodedb`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
