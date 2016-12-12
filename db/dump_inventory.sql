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

/*USE `museum_inventory`;

/*Table structure for table `TMAsal` */

DROP TABLE IF EXISTS `TMAsal`;

CREATE TABLE `TMAsal` (
  `id_asal` varchar(10) NOT NULL,
  `nama_asal` varchar(30) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_asal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMAsal` */

insert  into `TMAsal`(`id_asal`,`nama_asal`,`created`) values ('DM-AK-0001','HIBAH','2015-10-31'),('DM-AK-0002','PEMBELIAN','2015-10-31'),('DM-AK-0003','PINJAMAN MAS','2015-10-31');

/*Table structure for table `TMBahan` */

DROP TABLE IF EXISTS `TMBahan`;

CREATE TABLE `TMBahan` (
  `id_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMBahan` */

insert  into `TMBahan`(`id_bahan`,`nama_bahan`,`created`) values ('DM-BK-0001','BATU AKIK','2015-10-31'),('DM-BK-0002','BESI','2015-10-31'),('DM-BK-0003','PERUNGGU','2015-10-31'),('DM-BK-0004','KULIT BUAYA','2015-10-31'),('DM-BK-0005','KAYU PUTIH','2015-10-31');

/*Table structure for table `TMKategori` */

DROP TABLE IF EXISTS `TMKategori`;

CREATE TABLE `TMKategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMKategori` */

insert  into `TMKategori`(`id_kategori`,`nama_kategori`,`created`) values ('DM-CK-0001','ARKEOLOGI','2015-10-31'),('DM-CK-0002','ETNOGRAFIKA','2015-10-31'),('DM-CK-0003','SENJATA','2015-10-31'),('DM-CK-0004','SAMPLE YA','2015-11-14'),('DM-CK-0005','NUMINASTIK','2015-11-14'),('DM-CK-0006','KERAMIK','2015-11-14');

/*Table structure for table `TMKoleksi` */

DROP TABLE IF EXISTS `TMKoleksi`;

CREATE TABLE `TMKoleksi` (
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
  CONSTRAINT `TMKoleksi_ibfk_6` FOREIGN KEY (`id_penyumbang`) REFERENCES `TMPenyumbang` (`id_penyumbang`),
  CONSTRAINT `TMKoleksi_ibfk_1` FOREIGN KEY (`id_asal`) REFERENCES `TMAsal` (`id_asal`),
  CONSTRAINT `TMKoleksi_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `TMBahan` (`id_bahan`),
  CONSTRAINT `TMKoleksi_ibfk_3` FOREIGN KEY (`id_tempat`) REFERENCES `TMTempat` (`id_tempat`),
  CONSTRAINT `TMKoleksi_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `TMKategori` (`id_kategori`),
  CONSTRAINT `TMKoleksi_ibfk_5` FOREIGN KEY (`id_kondisi`) REFERENCES `TMKondisi` (`id_kondisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMKoleksi` */

insert  into `TMKoleksi`(`id_koleksi`,`no_inventaris`,`nama_koleksi`,`tanggal_masuk`,`tanggal_update`,`tempat_pembuatan`,`tahun_pembuatan`,`sejarah`,`panjang_koleksi`,`lebar_koleksi`,`tinggi_koleksi`,`gambar_koleksi`,`id_kondisi`,`id_asal`,`id_bahan`,`id_kategori`,`id_tempat`,`id_lemari`,`id_penyumbang`) values ('KRP-000001','SS','SAMPLE','2015-11-06',NULL,'TANGERANG','1800','',19,22,102,'KRP-000001.png','DM-KK-0002','DM-AK-0002','DM-BK-0001','DM-CK-0002','DM-TK-0002',0,'DM-PK-0001'),('KRP-000002','SS1','SAMPLE','2015-11-06',NULL,'KUTABARU','1690','sejarah',100,12,50,'KRP-000002.jpg','DM-KK-0001','DM-AK-0002','DM-BK-0001','DM-CK-0002','DM-TK-0001',0,'DM-PK-0001'),('KRP-000003','SD','SAMPLE 3','2015-12-28',NULL,'YOGYAKARTA','1900','sejarah',199,205,300,'KRP-000003.jpg','DM-KK-0002','DM-AK-0003','DM-BK-0003','DM-CK-0005','DM-TK-0005',0,'DM-PK-0003'),('KRP-000004','SA','SAMPLE 399','2015-12-28',NULL,'SUMATRA','2001','',100,200,150,'KRP-000004.jpg','DM-KK-0002','DM-AK-0002','DM-BK-0002','DM-CK-0002','DM-TK-0002',2,'DM-PK-0003'),('KRP-000005','AW','SAMPLE 599','2015-12-28',NULL,'ACEH','1200','',122,150,200,'KRP-000005.png','DM-KK-0002','DM-AK-0001','DM-BK-0002','DM-CK-0006','DM-TK-0004',0,'DM-PK-0002'),('KRP-000006','SW','SAMPLE 4','2015-12-02',NULL,'SEMARANG','1870','Sejarah',200,240,150,'KRP-000006.JPG','DM-KK-0002','DM-AK-0002','DM-BK-0001','DM-CK-0003','DM-TK-0001',3,'DM-PK-0001'),('KRP-000007','TM1','SAMPLE 5','2015-12-28',NULL,'SURAKARTA','1990','',100,150,120,'KRP-000007.jpg','DM-KK-0001','DM-AK-0001','DM-BK-0001','DM-CK-0006','DM-TK-0004',3,'DM-PK-0004'),('KRP-000008','AWS','SAMPLE 5','2015-12-28',NULL,'CIKARANG','1891','',120,200,180,'KRP-000008.jpg','DM-KK-0001','DM-AK-0002','DM-BK-0004','DM-CK-0003','DM-TK-0003',2,'DM-PK-0003'),('KRP-000009','XYZ','SAMPLE 212','2016-01-02','2016-01-02','SURAKARTA','1880','Sejarah',190,180,200,'KRP-000009.jpg','DM-KK-0001','DM-AK-0001','DM-BK-0003','DM-CK-0003','DM-TK-0003',21,'DM-PK-0003');

/*Table structure for table `TMKondisi` */

DROP TABLE IF EXISTS `TMKondisi`;

CREATE TABLE `TMKondisi` (
  `id_kondisi` varchar(10) NOT NULL,
  `nama_kondisi` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_kondisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMKondisi` */

insert  into `TMKondisi`(`id_kondisi`,`nama_kondisi`,`created`) values ('DM-KK-0001','BAIK BANGET YA','2015-10-28'),('DM-KK-0002','RUSAK BANGET','2015-10-31'),('DM-KK-0003','RUSAK PARAH DEH','2015-10-31');

/*Table structure for table `TMPenyumbang` */

DROP TABLE IF EXISTS `TMPenyumbang`;

CREATE TABLE `TMPenyumbang` (
  `id_penyumbang` varchar(10) NOT NULL,
  `nama_penyumbang` varchar(50) NOT NULL,
  `kota_penyumbang` varchar(50) NOT NULL,
  `jabatan_pekerjaan` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_penyumbang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMPenyumbang` */

insert  into `TMPenyumbang`(`id_penyumbang`,`nama_penyumbang`,`kota_penyumbang`,`jabatan_pekerjaan`,`created`) values ('DM-PK-0001','RACHEL','TANGERANG','DIREKTUR','2015-10-31'),('DM-PK-0002','DEDDY PRATAMA','YOGYAKARTA','MANAGER','2015-10-31'),('DM-PK-0003','FIRDAH','SURAKARTA','MANAGER','2015-11-27'),('DM-PK-0004','SAMUEL','CIKARANG','DOSEN','2015-12-28');

/*Table structure for table `TMTempat` */

DROP TABLE IF EXISTS `TMTempat`;

CREATE TABLE `TMTempat` (
  `id_tempat` varchar(10) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `TMTempat` */

insert  into `TMTempat`(`id_tempat`,`nama_tempat`,`created`) values ('DM-TK-0000','RUANG PENYIMPANAN','2015-11-08'),('DM-TK-0001','RUANG ARKEOLOGI','2015-10-31'),('DM-TK-0002','RUANG ETNOGRAFIKA','2015-10-31'),('DM-TK-0003','RUANG SENJATA','2015-10-31'),('DM-TK-0004','RUANG KERAMIK','2015-10-31'),('DM-TK-0005','RUANG NUMIMASTIK','2015-10-31');

/*Table structure for table `TMUser` */

DROP TABLE IF EXISTS `TMUser`;

CREATE TABLE `TMUser` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_active` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `TMUser` */

insert  into `TMUser`(`id_user`,`username`,`password`,`last_active`) values (1,'root','d40c4acc66585a678066872a6be5685badd6aad1','2015-12-09 07:12:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
