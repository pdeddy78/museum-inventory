/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 5.6.15-log : Database - museum_inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`museum_inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `museum_inventory`;

/*Table structure for table `tmasal` */

DROP TABLE IF EXISTS `tmasal`;

CREATE TABLE `tmasal` (
  `id_asal` varchar(10) NOT NULL,
  `nama_asal` varchar(30) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_asal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmbahan` */

DROP TABLE IF EXISTS `tmbahan`;

CREATE TABLE `tmbahan` (
  `id_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmkategori` */

DROP TABLE IF EXISTS `tmkategori`;

CREATE TABLE `tmkategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmkoleksi` */

DROP TABLE IF EXISTS `tmkoleksi`;

CREATE TABLE `tmkoleksi` (
  `id_koleksi` varchar(10) NOT NULL,
  `no_inventaris` varchar(10) NOT NULL,
  `nama_koleksi` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_update` date DEFAULT NULL,
  `tempat_pembuatan` varchar(50) NOT NULL,
  `tahun_pembuatan` varchar(4) NOT NULL,
  `sejarah` text,
  `panjang_koleksi` int(6) NOT NULL COMMENT 'dalam satuan cm',
  `lebar_koleksi` int(6) NOT NULL COMMENT 'dalam satuan cm',
  `tinggi_koleksi` int(6) NOT NULL COMMENT 'dalam satuan cm',
  `gambar_koleksi` varchar(200) NOT NULL,
  `id_kondisi` varchar(10) NOT NULL,
  `id_asal` varchar(10) NOT NULL,
  `id_bahan` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_tempat` varchar(10) NOT NULL,
  `id_lemari` int(3) NOT NULL COMMENT '1-999',
  `id_penyumbang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_koleksi`),
  KEY `id_asal` (`id_asal`),
  KEY `id_bahan` (`id_bahan`),
  KEY `id_tempat` (`id_tempat`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_kondisi` (`id_kondisi`),
  KEY `id_penyumbang` (`id_penyumbang`),
  CONSTRAINT `tmkoleksi_ibfk_6` FOREIGN KEY (`id_penyumbang`) REFERENCES `tmpenyumbang` (`id_penyumbang`),
  CONSTRAINT `tmkoleksi_ibfk_1` FOREIGN KEY (`id_asal`) REFERENCES `tmasal` (`id_asal`),
  CONSTRAINT `tmkoleksi_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `tmbahan` (`id_bahan`),
  CONSTRAINT `tmkoleksi_ibfk_3` FOREIGN KEY (`id_tempat`) REFERENCES `tmtempat` (`id_tempat`),
  CONSTRAINT `tmkoleksi_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `tmkategori` (`id_kategori`),
  CONSTRAINT `tmkoleksi_ibfk_5` FOREIGN KEY (`id_kondisi`) REFERENCES `tmkondisi` (`id_kondisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmkondisi` */

DROP TABLE IF EXISTS `tmkondisi`;

CREATE TABLE `tmkondisi` (
  `id_kondisi` varchar(10) NOT NULL,
  `nama_kondisi` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_kondisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmpenyumbang` */

DROP TABLE IF EXISTS `tmpenyumbang`;

CREATE TABLE `tmpenyumbang` (
  `id_penyumbang` varchar(10) NOT NULL,
  `nama_penyumbang` varchar(50) NOT NULL,
  `kota_penyumbang` varchar(50) NOT NULL,
  `jabatan_pekerjaan` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_penyumbang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmtempat` */

DROP TABLE IF EXISTS `tmtempat`;

CREATE TABLE `tmtempat` (
  `id_tempat` varchar(10) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tmuser` */

DROP TABLE IF EXISTS `tmuser`;

CREATE TABLE `tmuser` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_active` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
