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
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','Foreign','0000-00-00 00:00:00'),(2,'French','Foreign','0000-00-00 00:00:00'),(3,'German','Foreign','0000-00-00 00:00:00'),(4,'Chinese','Foreign','0000-00-00 00:00:00'),(5,'Twi','Local','0000-00-00 00:00:00'),(6,'Ga','Local','0000-00-00 00:00:00'),(7,'Eve','Local','0000-00-00 00:00:00'),(8,'Nzema','Local','0000-00-00 00:00:00'),(9,'Mamprusi','Local','0000-00-00 00:00:00'),(10,'Hausa','Local','0000-00-00 00:00:00'),(11,'Fante','Local','0000-00-00 00:00:00'),(12,'Adangbe','Local','0000-00-00 00:00:00'),(13,'sadsadfs','foreign','0000-00-00 00:00:00'),(14,'afdsfgdg','foreign','0000-00-00 00:00:00'),(15,'afdsfgdg','foreign','0000-00-00 00:00:00'),(16,'asdfesdfger','local','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
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
  `residence` varchar(100) NOT NULL,
  `baptismal_status` varchar(16) NOT NULL DEFAULT '0',
  `baptised_on` date NOT NULL,
  `baptised_at` varchar(125) NOT NULL,
  `marital_status` varchar(16) NOT NULL DEFAULT '0',
  `occupation` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `phone_other` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `languages` text NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `sickling_status` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kids` varchar(16) NOT NULL,
  `home_town` varchar(64) NOT NULL DEFAULT 'xxxxxxxxxx',
  `region` varchar(16) NOT NULL,
  `education` varchar(32) NOT NULL DEFAULT 'xxxxxxxxxx',
  `picture` varchar(100) NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `ministry_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `deleted` varchar(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (9,'3112000001','asfcdsasf','','efsergfe','M','1996-02-20','hgdjhyfjh','not baptised','0000-00-00','','married','fdhgdgdjgg','0501426857','0123432534','willisco413@gmail.com','null','','','0000-00-00 00:00:00','0','wefregrtgrt','','tyfyhgkh','1515586142_IMG_20161011_113454.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',4,1,'0'),(10,'0401000001','sfdefer','','ertretgr','M','2007-01-04','ewrertetger','not baptised','0000-00-00','','widowed','wedfrefe','0501426851','','','[\"English\",\"German\"]','AB','AA','0000-00-00 00:00:00','1','EWDFRETGRH','','etrtgyry','1515596594_IMG_20161020_111251.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',1,1,'0'),(12,'0101000008','sdsfdss','','fsdfgvdfb','M','2015-01-01','McCarthy Down','not baptised','0000-00-00','','single','Carpenter','0501426850','323445454','','[\"English\",\"German\"]','','','2018-01-10 20:15:23','','dsfgdfgdf','','','IMG_20161011_113454.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',1,1,'0'),(16,'3001000012','Phillip','Owusu','Amoah','M','2006-01-20','DJaman','baptised','2010-02-24','Gbawe','single','Student','0265854317','0501426834','williamofosuagyapong@gmail.com','[\"English\"]','AB','AA','2018-01-11 06:35:22','0','James Town','Greater Accra','Tertiary','1515651833_IMG_20161020_111301.jpg','{\"name\":\"Samuel Kwesi Agyapong\",\"congregation\":\"African faith\"}','{\"name\":\"Margaret Afia Fosua\",\"congregation\":\"Victory Bible church\"}',4,1,'0'),(17,'0112000010','saddfssds','','dsfcsd','M','2018-12-01','asdsfcds','baptised','2018-01-10','Nsawam Road','married','sadfcdsfvds','0501426856','0123432534','','[\"French\",\"Twi\",\"Ga\"]','O','AS','2018-01-11 06:45:24','2','asdfsfvd','','sdfsdgvdf','1515652964_IMG_20170220_104648.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',3,3,'0'),(18,'0201000006','Richmond','Asomani','Danso','M','2012-01-24','Gbawe','baptised','2018-01-03','Odokor','married','Accountant','0501426834','','','[\"French\",\"German\"]','B','SS','2018-01-13 08:42:24','2','Abetifi','Eastern','O level','1515832796_IMG_20170220_104648.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',4,5,'0'),(19,'1507000007','Sandra','','Amanor','F','1993-01-21','Akwatia','baptised','2015-02-20','gbawe','single','student','0501426866','','','[\"English\",\"Twi\",\"Ga\"]','','','2018-01-13 18:08:26','','Akwatia','Eastern','University','1515866313_IMG_20170223_095338.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',6,6,'0'),(20,'0901000008','sfgdfghgfhh','sadfgdghtuy','sasedfgtryhju','F','2018-01-09','etrhyt','baptised','2018-01-15','Accra New Town','married','erfetgr','0501426858','','','[\"English\",\"French\",\"German\",\"Chinese\"]','B','AS','2018-01-13 18:16:22','2','serrt','Brong-Ahafo','tryutujyt','1515867135_IMG_20161006_094902.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',5,5,'0'),(21,'0801000009','asdfsfds','dsfsddg','dsfdsfgd','M','2018-01-01','asdfd','not baptised','0000-00-00','','separated','asfdsg','0501426851','','','[\"French\"]','A','','2018-01-13 18:19:43','0','dsgfdsg','Volta','sdfg','1515867505_IMAG0559.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',6,6,'0'),(22,'2501000022','asfrdfgdghfrg','dfghgfhjgh','sdfdgddfdfds','F','2000-01-28','efrety','not baptised','0000-00-00','','Divorced','sadfdsgrtfg','0501426850','','','[\"English\"]','','AS','2018-01-13 18:31:56','0','esgtfdg','Northern','ertrthyt','IMG_20170220_104348.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',6,6,'0'),(23,'0201000023','aaaaaa','bbbbbb','ccccc','M','2018-02-01','fffffffff','baptised','2018-01-08','Oblogo','separated','eeeee','0501426851','','','[\"French\"]','A','AB','2018-01-13 18:35:08','2','ddddd','Central','gggggggg','1515868437_IMG_20161020_111251.jpg','{\"name\":\"\",\"congregation\":\"\"}','{\"name\":\"\",\"congregation\":\"\"}',2,3,'1'),(24,'1901000024','asdfsfgf','dfgdgdfg','dgdf','F','2010-01-19','rwerewere','not baptised','0000-00-00','','single','qwerr','0501426850','','','[\"Fante\",\"Adangbe\"]','','','2018-01-19 16:55:35','0','wertet','Central','wert','1515470450_IMG_20161011_113457.jpg','{\"name\":\"aasfaffsg\",\"contact\":\"0565432134\"}','{\"name\":\"wqrewtr\",\"contact\":\"0234324567\"}',5,4,'0');
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
  `leader` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ministries`
--

LOCK TABLES `ministries` WRITE;
/*!40000 ALTER TABLE `ministries` DISABLE KEYS */;
INSERT INTO `ministries` VALUES (1,9,'Building','2018-01-06 00:00:00'),(2,10,'Finance','2018-01-06 00:00:00'),(3,12,'Benevolence','0000-00-00 00:00:00'),(4,17,'Edification','0000-00-00 00:00:00'),(5,20,'Evangelism','0000-00-00 00:00:00'),(6,19,'None','0000-00-00 00:00:00');
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
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `deceased` varchar(4) NOT NULL,
  `last_modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parents`
--

LOCK TABLES `parents` WRITE;
/*!40000 ALTER TABLE `parents` DISABLE KEYS */;
/*!40000 ALTER TABLE `parents` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (29,'william','d383ca25641d58227410a9ae98bd54d5','Administrator\r\n','2018-01-09',1,'willi.jpg'),(30,'sfdsgdfg','05014268382018','ordinary','0000-00-00',5,''),(31,'William','9566352342018','ordinary','0000-00-00',6,''),(32,'','1970','ordinary','0000-00-00',7,''),(33,'','1970','ordinary','0000-00-00',8,''),(34,'asfcdsasf','05014268571970','ordinary','0000-00-00',9,''),(35,'sfdefer','05014268512018','ordinary','0000-00-00',10,''),(36,'sdsfdss','05014268501970','ordinary','0000-00-00',12,''),(37,'Phillip','cce293f0f9840c3d0a872041e75d6129','Ordinary','2018-01-11',16,''),(38,'saddfssds','7ee70ea9211da5b48b35c944bb77aadb','Ordinary','2018-01-11',17,''),(39,'Richmond','a0f94c1c56002978e0e0bdc05a372866','Ordinary','2018-01-13',18,''),(40,'Sandra','ae22935ed32b17ed1e9bc9ab0bb5a5a7','Ordinary','2018-01-13',19,''),(41,'sfgdfghgfhh','030aa7ecca7016cb045c4f0c25164ff7','Ordinary','2018-01-13',20,''),(42,'asdfsfds','7f5a2c8c29f6f9077bfce376eda3b2ba','Ordinary','2018-01-13',21,''),(43,'asfrdfgdghfrg','e59ade89e6f8c8daf0ea5fa84789acf6','Ordinary','2018-01-13',22,''),(44,'aaaaaa','ee6fe675f5af3cbd55db9291099a5b64','Ordinary','2018-01-13',23,''),(45,'asdfsfgf','6e11bc72ac007958e9151b7253e67386','Ordinary','2018-01-19',24,'');
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
  `leader` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,12,'Djaman','2018-01-10 00:00:00'),(2,20,'Top - Base','0000-00-00 00:00:00'),(3,9,'McCarthy','0000-00-00 00:00:00'),(4,16,'Mallam','0000-00-00 00:00:00'),(5,18,'Bulemi','0000-00-00 00:00:00'),(6,0,'None','2018-01-13 17:53:01');
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

-- Dump completed on 2018-01-26 15:24:55
