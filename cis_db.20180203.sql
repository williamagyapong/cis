-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cis_db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `cis_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cis_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cis_db`;

--
-- Table structure for table `baptisms`
--

DROP TABLE IF EXISTS `baptisms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baptisms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `at` varchar(100) NOT NULL,
  `c_person_name` varchar(155) NOT NULL,
  `c_person_phone` varchar(10) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baptisms`
--

LOCK TABLES `baptisms` WRITE;
/*!40000 ALTER TABLE `baptisms` DISABLE KEYS */;
/*!40000 ALTER TABLE `baptisms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `family_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `children`
--

LOCK TABLES `children` WRITE;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
/*!40000 ALTER TABLE `children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `families`
--

DROP TABLE IF EXISTS `families`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `families` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `father_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
/*!40000 ALTER TABLE `families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` varchar(7) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','Foreign','0000-00-00 00:00:00',''),(2,'French','Foreign','0000-00-00 00:00:00',''),(3,'German','Foreign','0000-00-00 00:00:00',''),(4,'Chinese','Foreign','0000-00-00 00:00:00',''),(5,'Twi','Local','0000-00-00 00:00:00',''),(6,'Ga','Local','0000-00-00 00:00:00',''),(7,'Eve','Local','0000-00-00 00:00:00',''),(8,'Nzema','Local','0000-00-00 00:00:00',''),(9,'Mamprusi','Local','0000-00-00 00:00:00',''),(10,'Hausa','Local','0000-00-00 00:00:00',''),(11,'Fante','Local','0000-00-00 00:00:00',''),(12,'Adangbe','Local','0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_languages`
--

DROP TABLE IF EXISTS `member_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `language` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_languages`
--

LOCK TABLES `member_languages` WRITE;
/*!40000 ALTER TABLE `member_languages` DISABLE KEYS */;
INSERT INTO `member_languages` VALUES (1,18,'Ga'),(2,18,'Eglish'),(3,12,'French'),(4,23,'German'),(5,19,'Adangbe'),(6,19,'Twi');
/*!40000 ALTER TABLE `member_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_code` varchar(10) NOT NULL,
  `f_name` varchar(32) NOT NULL,
  `m_name` varchar(64) NOT NULL,
  `l_name` varchar(64) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birth_date` date NOT NULL,
  `died_on` date NOT NULL,
  `residence` varchar(100) NOT NULL,
  `baptismal_status` varchar(16) NOT NULL DEFAULT '0',
  `baptised_on` date NOT NULL,
  `baptised_at` varchar(125) NOT NULL,
  `marital_status` varchar(16) NOT NULL DEFAULT '0',
  `occupation` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `phone_other` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `sickling_status` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kids` varchar(16) NOT NULL,
  `home_town` varchar(64) NOT NULL DEFAULT 'xxxxxxxxxx',
  `region_id` int(11) NOT NULL,
  `education` varchar(32) NOT NULL DEFAULT 'xxxxxxxxxx',
  `languages` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (9,'3112000001','asfcdsasf','','efsergfe','M','1996-02-20','0000-00-00','hgdjhyfjh','not baptised','0000-00-00','','married','fdhgdgdjgg','0501426857','0123432534','willisco413@gmail.com','','','0000-00-00 00:00:00','0','wefregrtgrt',1,'tyfyhgkh','','1515586142_IMG_20161011_113454.jpg',4,1,'1'),(10,'0401000001','Michael','','Addo','M','2007-02-04','0000-00-00','ewrertetger','not baptised','0000-00-00','','widowed','wedfrefe','0501426851','','','AB','AA','0000-00-00 00:00:00','1','EWDFRETGRH',3,'etrtgyry','','1515596594_IMG_20161020_111251.jpg',1,1,'1'),(12,'0101000008','David','Owusu','Ansah','M','2015-01-01','0000-00-00','McCarthy Down','not baptised','0000-00-00','','single','Carpenter','0501426850','323445454','','','','2018-01-10 20:15:23','','dsfgdfgdf',4,'','[1,4,8]','IMG_20161011_113454.jpg',1,1,'1'),(16,'3001000012','Phillip','Owusu','Amoah','M','2006-01-20','0000-00-00','DJaman','baptised','2010-02-24','Gbawe','single','Student','0265854317','0501426834','williamofosuagyapong@gmail.com','AB','AA','2018-01-11 06:35:22','0','James Town',3,'Tertiary','[3]','1515651833_IMG_20161020_111301.jpg',4,1,'1'),(17,'0112000010','Veronica','','Tengey','F','2011-11-22','2017-12-13','asdsfcds','baptised','2018-01-10','Nsawam Road','married','sadfcdsfvds','0501426856','0123432534','','O','AS','2018-01-11 06:45:24','2','asdfsfvd',5,'sdfsdgvdf','[12,10]','1515652964_IMG_20170220_104648.jpg',4,3,'0'),(18,'0201000006','Richmond','Asomani','Danso','M','2012-12-31','0000-00-00','Gbawe','baptised','2018-01-03','Odokor','married','Accountant','0501426834','','','B','SS','2018-01-13 08:42:24','2','Abetifi',5,'O level','','1515832796_IMG_20170220_104648.jpg',4,5,'1'),(19,'1507000007','Sandra','','Amanor','F','1993-12-30','2017-08-07','Akwatia','baptised','2015-02-20','gbawe','single','student','0501426866','','','','','2018-01-13 18:08:26','','Akwatia',5,'University','','1515866313_IMG_20170223_095338.jpg',6,6,'1'),(20,'0901000008','sfgdfghgfhh','sadfgdghtuy','sasedfgtryhju','F','2018-01-09','2016-04-12','etrhyt','baptised','2018-01-15','Accra New Town','married','erfetgr','0501426858','','','B','AS','2018-01-13 18:16:22','2','serrt',2,'tryutujyt','','1515867135_IMG_20161006_094902.jpg',5,5,'0'),(21,'0801000009','asdfsfds','dsfsddg','dsfdsfgd','M','2015-01-01','2016-08-09','asdfd','not baptised','0000-00-00','','separated','asfdsg','0501426851','','','A','','2018-01-13 18:19:43','0','dsgfdsg',10,'sdfg','','1515867505_IMAG0559.jpg',6,6,'0'),(22,'2501000022','Wisdom','dfghgfhjgh','Odame','F','2000-01-28','0000-00-00','efrety','not baptised','0000-00-00','','Divorced','sadfdsgrtfg','0501426850','','','','AS','2018-01-13 18:31:56','0','esgtfdg',8,'ertrthyt','','IMG_20170220_104348.jpg',6,6,'1'),(23,'0201000023','Solomon','Kyei','Boakye','M','2018-02-01','0000-00-00','fffffffff','baptised','2018-01-08','Oblogo','separated','eeeee','0501426851','','','A','AB','2018-01-13 18:35:08','2','ddddd',4,'gggggggg','','1515868437_IMG_20161020_111251.jpg',2,3,'1'),(24,'1901000024','asdfsfgf','dfgdgdfg','dgdf','F','2010-01-19','2017-06-13','rwerewere','not baptised','0000-00-00','','single','qwerr','0501426850','','','','','2018-01-19 16:55:35','0','wertet',4,'wert','','1515470450_IMG_20161011_113457.jpg',5,4,'0'),(25,'3001000025','sadsfds','werte','wererte','M','1999-01-30','0000-00-00','asdd','not baptised','0000-00-00','','married','asdsd','0897866566','0854546534','ben@gmail.com','A','AA','2018-01-30 06:32:09','0','sdfsfdsd',2,'sadsf','[\"1\",\"5\"]','willi.jpg',5,4,'1'),(26,'3001000026','sadsfds','werte','Kofi','M','1999-01-30','0000-00-00','asdd','baptised','2015-01-08','Kwahu Praso','married','asdsd','0897862366','','ben@gmail.com','A','AA','2018-01-30 06:36:53','0','sdfsfdsd',2,'sadsf','[\"1\",\"5\"]','',5,4,'1'),(27,'3001000027','sadsfds','werte','Sampson','M','1999-01-30','0000-00-00','asdd','baptised','2015-01-08','Kwahu Praso','married','asdsd','0547862366','','ben@gmail.com','A','AA','2018-01-30 06:38:32','0','sdfsfdsd',2,'sadsf','[\"1\",\"5\"]','',5,4,'1'),(28,'0602000028','ewdfdfe','efewrfewr','efwerfew','F','2017-02-06','0000-00-00','sdfsas','baptised','2013-04-06','Ablekuma','widowed','sadxasdfsd','098755454','','','B','AB','2018-02-02 12:39:02','0','dsfdsf',9,'sdsfsfss','[\"1\"]','1517574976_IMG_20170223_095405.jpg',5,3,'1'),(29,'0201000029','Maxwell','','Odame','M','2008-01-02','0000-00-00','Gbawe','not baptised','0000-00-00','','married','Mason','0254867969','','','A','AS','2018-02-02 15:15:10','2','sfdsgffd',7,'University','[\"1\"]','1517584313_IMG_20161006_094902.jpg',4,4,'1'),(30,'0103000030','rstrfdythyfcutf','sdfyusdf','dysaf','M','2014-03-01','0000-00-00','edtgdfghfg','not baptised','0000-00-00','','divorced','asdfgfd','0232343255','0234547346','','B','','2018-02-02 15:29:34','0','asxdasdxsa',2,'dfgfhjggt','[\"1\",\"2\",\"6\"]','1517585262_IMG_20161006_094902.jpg',4,2,'1'),(31,'2604000031','Gifty','Monica','Eshun','F','1972-04-26','0000-00-00','Anyaa','baptised','2014-02-13','','single','Petty Trader','0256783423','0454545573','eshun@yahoo.com','A','AA','2018-02-02 18:21:56','0','Adansi',4,'JHS','[\"1\",\"5\"]','1517595372_IMG_20170220_104648.jpg',6,6,'1'),(32,'0201000032','Desmond','','Awuah','M','1977-01-02','0000-00-00','Bulemin','baptised','2018-01-11','','married','Journalist','0578394939','0498583848','','B','','2018-02-02 18:41:23','2','Obuasi',1,'Tertiary','[\"1\"]','1517596652_IMG_20170220_104648.jpg',3,5,'1'),(33,'0202000033','William','Ofosu','dsgfdsg','M','2002-02-02','0000-00-00','dgrfhtrh','not baptised','0000-00-00','','','petty trader','','','','A','AS','2018-02-02 20:30:37','','sdgdfhgf',3,'Tertiary','[\"1\"]','1517603343_IMG_20161020_111248.jpg',1,4,'1'),(34,'0202000034','William','Ofosu','dsgfdsg','M','2002-02-02','0000-00-00','dgrfhtrh','not baptised','0000-00-00','','','petty trader','','','','A','AS','2018-02-02 20:33:21','','sdgdfhgf',3,'Tertiary','[\"1\"]','1517603343_IMG_20161020_111248.jpg',2,4,'1'),(35,'0603000035','William','','Kweku','M','1980-03-06','0000-00-00','mcCarthy','not baptised','0000-00-00','','married','student','0501426856','','','A','','2018-02-03 09:04:37','0','akyem',1,'Tertiary','[\"1\"]','1517648481_20160701_110449.jpg',2,3,'1'),(36,'0502000036','asdfdsfgd','Ofosu','Agyapong','M','1980-02-05','0000-00-00','mallam','baptised','2015-03-05','','divorced','student','0501426850','','','A','SS','2018-02-03 09:22:17','1','Abetifi',5,'Tertiary','[\"1\"]','IMG_20160723_175322-1.jpg',2,4,'1'),(37,'0202000037','Desmond','Amani','Agyapong','M','1992-02-02','0000-00-00','Gbawe','baptised','2016-02-01','','single','petty trader','0501426850','','','A','AS','2018-02-03 09:38:04','0','Abetifi',5,'JHS','[\"5\"]','1517650552_20160415_155808.jpg',5,4,'1'),(38,'0302000038','Prince','Kweku','Frimpong','F','2015-02-03','0000-00-00','DJaman','not baptised','0000-00-00','','','student','0501426834','','willisco413@gmail.com','AB','AA','2018-02-03 09:49:30','','Abetifi',5,'Kingdergarten','[\"1\",\"5\",\"6\"]','1517651152_IMG_20161011_113456.jpg',6,1,'1');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ministries`
--

DROP TABLE IF EXISTS `ministries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ministries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leader` varchar(16) NOT NULL,
  `name` varchar(64) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ministries`
--

LOCK TABLES `ministries` WRITE;
/*!40000 ALTER TABLE `ministries` DISABLE KEYS */;
INSERT INTO `ministries` VALUES (1,'0','Building','2018-01-06 00:00:00'),(2,'23','Finance','2018-01-06 00:00:00'),(3,'32','Benevolence','0000-00-00 00:00:00'),(4,'17','Edification','0000-00-00 00:00:00'),(5,'0','Evangelism','0000-00-00 00:00:00'),(6,'0','None','0000-00-00 00:00:00'),(7,'0','Help','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ministries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occasions`
--

DROP TABLE IF EXISTS `occasions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `occasions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_organised` date NOT NULL,
  `start_time` time NOT NULL,
  `description` text NOT NULL,
  `last_modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occasions`
--

LOCK TABLES `occasions` WRITE;
/*!40000 ALTER TABLE `occasions` DISABLE KEYS */;
/*!40000 ALTER TABLE `occasions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Ashanti','Kumasi','2018-01-13 09:17:56'),(2,'Brong-Ahafo','Sunyani','2018-01-13 09:17:56'),(3,'Greater Accra','Accra','2018-01-13 09:18:48'),(4,'Central','Cape Coast','2018-01-13 09:18:48'),(5,'Eastern','Koforidua','2018-01-13 09:21:19'),(6,'Northern','Tamale','2018-01-13 09:21:19'),(7,'Western','Sekondi - Takoradi','2018-01-13 09:22:10'),(8,'Upper East','Bolgatanga','2018-01-13 09:22:10'),(9,'Upper West','Wa','2018-01-13 09:22:47'),(10,'Volta','Ho','2018-01-13 09:22:47');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `relationship` varchar(32) NOT NULL,
  `member` varchar(10) NOT NULL,
  `deceased` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relations`
--

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` VALUES (1,16,'father','Osei Kwame Brempong','0265854314','','','','2018-01-28 00:00:00','0'),(2,16,'mother','Mary Asantewaa','0345657687','','','','2018-01-28 00:00:00',''),(3,18,'father','William Owusu','','','yes','yes','0000-00-00 00:00:00',''),(4,18,'mother','Sandra Amanor','','','yes','yes','2018-01-28 14:23:06',''),(5,18,'spouse','dsdds sdfssjdjgfgg','','','yes','','2018-01-28 19:20:34',''),(6,27,'father','','','','yes','','2018-01-30 06:38:32',''),(7,27,'mother','ssdfdfgd','0256532567','','','','2018-01-30 06:38:32',''),(8,27,'next_of_kin','rfewrtyt','0856546543','ertryutiu','','','2018-01-30 06:38:32',''),(9,28,'father','','','','','','2018-02-02 12:39:02',''),(10,28,'mother','','','','','','2018-02-02 12:39:02',''),(11,28,'next_of_kin','sdddsa','0967674443','son','','','2018-02-02 12:39:02',''),(12,29,'father','David Owusu','0234647273','','yes','','2018-02-02 15:15:10',''),(13,29,'mother','Asantewaa Margaret','03758482','','','','2018-02-02 15:15:10',''),(14,29,'next_of_kin','Philip Kweku Yeboah','0345652353','Friend','','','2018-02-02 15:15:10',''),(15,30,'father','asdasdfsdfvsd','0987654234','','','','2018-02-02 15:29:34',''),(16,30,'mother','fedsfghfrhfd','0985453241','','','','2018-02-02 15:29:35',''),(17,30,'next_of_kin','Michael Anson','0898989989','Father','','','2018-02-02 15:29:35',''),(18,31,'father','Appiah Desmond','0234557375','','','','2018-02-02 18:21:56',''),(19,31,'mother','Serwaa Afia Kobi','0243425563','','','','2018-02-02 18:21:56',''),(20,31,'next_of_kin','Mavis Adaakwa','0235678888','sister','','','2018-02-02 18:21:56',''),(21,32,'father','Kwesi Agyapong','','','yes','yes','2018-02-02 18:41:23',''),(22,32,'mother','Mensah Veronica','','','yes','yes','2018-02-02 18:41:23',''),(23,32,'next_of_kin','Davis Amoah','0247737838','friend','','','2018-02-02 18:41:23',''),(24,33,'father','Kwesi Agyapong','0234647273','','yes','','2018-02-02 20:30:38',''),(25,34,'mother','Afia Fosua Margaret','03758482','','yes','','2018-02-02 20:30:38',''),(26,33,'next_of_kin','','','','','','2018-02-02 20:30:38',''),(27,34,'father','Kwesi Agyapong','0234647273','','yes','','2018-02-02 20:33:21',''),(28,34,'mother','Afia Fosua Margaret','03758482','','yes','','2018-02-02 20:33:21',''),(29,34,'next_of_kin','','','','','','2018-02-02 20:33:21',''),(30,35,'father','Kwesi Agyapong','0234647273','','','','2018-02-03 09:04:37',''),(31,35,'mother','Afia Fosua Margaret','03758482','','yes','','2018-02-03 09:04:37',''),(32,35,'next_of_kin','Philip Kweku Yeboah','0856546543','Friend','','','2018-02-03 09:04:37',''),(33,36,'spouse','Gifty Okyere','0235473757','','yes','','2018-02-03 09:22:17',''),(34,36,'father','Kwesi Agyapong','0234647273','','yes','','2018-02-03 09:22:17',''),(35,36,'mother','Afia Fosua Margaret','03758482','','yes','','2018-02-03 09:22:17',''),(36,36,'next_of_kin','Philip Kweku Yeboah','0967674443','son','','','2018-02-03 09:22:17',''),(37,37,'spouse','','','','','','2018-02-03 09:38:04',''),(38,37,'father','Kwesi Agyapong','0234647273','','','','2018-02-03 09:38:04',''),(39,37,'mother','Asantewaa Margaret','0256532567','','','','2018-02-03 09:38:04',''),(40,37,'next_of_kin','Mavis Adaakwa','0235678888','daughter','','','2018-02-03 09:38:04',''),(41,38,'spouse','','','','','','2018-02-03 09:49:30',''),(42,38,'father','David Owusu','0234557375','','yes','','2018-02-03 09:49:31',''),(43,38,'mother','Asantewaa Margaret','0256532567','','yes','','2018-02-03 09:49:31',''),(44,38,'next_of_kin','','','','','','2018-02-03 09:49:31','');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(64) NOT NULL,
  `date_registered` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `image` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (29,'william','d383ca25641d58227410a9ae98bd54d5','Administrator\r\n','2018-01-09',1,'willi.jpg'),(30,'sfdsgdfg','05014268382018','ordinary','0000-00-00',5,''),(31,'William','9566352342018','ordinary','0000-00-00',6,''),(32,'','1970','ordinary','0000-00-00',7,''),(33,'','1970','ordinary','0000-00-00',8,''),(34,'asfcdsasf','05014268571970','ordinary','0000-00-00',9,''),(35,'sfdefer','05014268512018','ordinary','0000-00-00',10,''),(36,'sdsfdss','05014268501970','ordinary','0000-00-00',12,''),(37,'Phillip','cce293f0f9840c3d0a872041e75d6129','Ordinary','2018-01-11',16,''),(38,'saddfssds','7ee70ea9211da5b48b35c944bb77aadb','Ordinary','2018-01-11',17,''),(39,'Richmond','a0f94c1c56002978e0e0bdc05a372866','Ordinary','2018-01-13',18,''),(40,'Sandra','ae22935ed32b17ed1e9bc9ab0bb5a5a7','Ordinary','2018-01-13',19,''),(41,'sfgdfghgfhh','030aa7ecca7016cb045c4f0c25164ff7','Ordinary','2018-01-13',20,''),(42,'asdfsfds','7f5a2c8c29f6f9077bfce376eda3b2ba','Ordinary','2018-01-13',21,''),(43,'asfrdfgdghfrg','e59ade89e6f8c8daf0ea5fa84789acf6','Ordinary','2018-01-13',22,''),(44,'aaaaaa','ee6fe675f5af3cbd55db9291099a5b64','Ordinary','2018-01-13',23,''),(45,'asdfsfgf','6e11bc72ac007958e9151b7253e67386','Ordinary','2018-01-19',24,''),(46,'sadsfds','86630361e7d88dddbbf176b444e3256c','Ordinary','2018-01-30',27,''),(47,'ewdfdfe','aec9e00c96c6654a86c60fefac35b2e8','Ordinary','2018-02-02',28,''),(48,'Maxwell','f454fd7b4c1f508fbd19dbb56ad6ac7f','Ordinary','2018-02-02',29,''),(49,'rstrfdythyfcutf','206874e5b8357da22f722c6fb1a4c33e','Ordinary','2018-02-02',30,''),(50,'Gifty','daa981d1c9e89572ce1347ab92ca59a6','Ordinary','2018-02-02',31,''),(51,'Desmond','d2aa0df359812824e22b322c5914630f','Ordinary','2018-02-02',32,''),(52,'William','fb7f26cce68cde1318de506493004014','Ordinary','2018-02-02',33,''),(53,'William','e6e77b21ebc5cf547dcd62105c40bd98','Ordinary','2018-02-02',34,''),(54,'William','a7224924593858a6ab7c6ad18707c067','Ordinary','2018-02-03',35,''),(55,'asdfdsfgd','cb371a6f74ade70b45a0e2fc73e66e18','Ordinary','2018-02-03',36,''),(56,'Desmond','a4484b99cdbf074cab608319d71b82a8','Ordinary','2018-02-03',37,''),(57,'Prince','fa37e227a5ebd03ed9feb6c61b9ccc29','Ordinary','2018-02-03',38,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `inviter` int(11) NOT NULL,
  `occation_id` int(11) NOT NULL,
  `congregation` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `comments` text NOT NULL COMMENT 'something brief about the visiter and possibly the views held',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leader` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'0','Djaman','2018-01-10 00:00:00'),(2,'0','Top - Base','0000-00-00 00:00:00'),(3,'0','McCarthy','0000-00-00 00:00:00'),(4,'0','Mallam','0000-00-00 00:00:00'),(5,'0','Bulemi','0000-00-00 00:00:00'),(6,'0','None','2018-01-13 17:53:01'),(7,'0','New Site','2018-02-03 04:39:29');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-03 12:19:57
