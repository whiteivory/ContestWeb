-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: contestweb
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow` (
  `followID` int(11) NOT NULL,
  `pageID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `fcontent` text,
  `ftime` datetime DEFAULT NULL,
  PRIMARY KEY (`followID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
INSERT INTO `follow` VALUES (1,NULL,NULL,NULL,NULL),(2,1003,1,'adf',NULL),(3,1003,1,'adf',NULL),(4,1003,1,'adfafdfw',NULL),(5,1003,1,'adfafdfw',NULL),(6,1003,1,'adfafdfw',NULL),(7,1003,1,'grasdfg',NULL),(8,1003,1,'grasdfgasdffe',NULL),(9,1001,1,'asfd',NULL),(10,1001,1,'asfd',NULL);
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `pageID` int(11) NOT NULL,
  `secID` int(11) DEFAULT NULL,
  `schID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `ptitle` varchar(255) DEFAULT NULL,
  `ptime` datetime DEFAULT NULL,
  `pcontent` text,
  `lasttime` datetime DEFAULT NULL,
  `ptype` varchar(255) DEFAULT NULL,
  `pclicknum` int(11) DEFAULT NULL,
  `preplynum` int(11) DEFAULT NULL,
  `pzannum` int(11) DEFAULT NULL,
  `pallow` int(11) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `test` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1001,1,1,1,'阿斯蒂',NULL,'<p>各省地方</p>\r\n','2016-03-11 01:33:17','1',7,0,9,1,'0',NULL),(1002,1,1,1,'shijian',NULL,'<p>asdf</p>\r\n',NULL,'1',0,0,0,1,'0',NULL),(1003,1,1,1,'shijian','2016-02-21 03:05:00','<p>asdfdsaf</p>\r\n','2016-02-21 05:33:00','1',9,1,0,1,'0',NULL),(1004,1,1,1,'阿斯蒂芬','2016-02-21 05:37:23','<p>暗室逢灯</p>\r\n',NULL,'1',0,0,2,1,'0',NULL),(1005,1,1,1,'阿斯蒂芬','2016-02-21 05:38:09','<p>暗室逢灯</p>\r\n\r\n<p><img alt=\"\" src=\"/data/postinlineimg/29_56c93f2ce8f4f.ico\" style=\"height:128px; width:128px\" /></p>\r\n',NULL,'1',7,0,8,1,'0',NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruit`
--

DROP TABLE IF EXISTS `recruit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruit` (
  `recruitID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `rtitle` varchar(255) DEFAULT NULL,
  `rcontent` text,
  `rtime` datetime DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  `rclicknum` int(11) DEFAULT NULL,
  `rreplynum` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `schID` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`recruitID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruit`
--

LOCK TABLES `recruit` WRITE;
/*!40000 ALTER TABLE `recruit` DISABLE KEYS */;
INSERT INTO `recruit` VALUES (1,3,'rrr','<p>rrr</p>\r\n',NULL,NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `recruit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rfollow`
--

DROP TABLE IF EXISTS `rfollow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rfollow` (
  `rfollowID` int(11) NOT NULL,
  `recruitID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `rfcontent` text,
  `rftime` datetime DEFAULT NULL,
  PRIMARY KEY (`rfollowID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rfollow`
--

LOCK TABLES `rfollow` WRITE;
/*!40000 ALTER TABLE `rfollow` DISABLE KEYS */;
/*!40000 ALTER TABLE `rfollow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school` (
  `schoolID` int(11) NOT NULL,
  `schoolname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'山东大学（威海）');
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scsec`
--

DROP TABLE IF EXISTS `scsec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scsec` (
  `scID` int(11) DEFAULT NULL,
  `secID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scsec`
--

LOCK TABLES `scsec` WRITE;
/*!40000 ALTER TABLE `scsec` DISABLE KEYS */;
INSERT INTO `scsec` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `scsec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `secID` int(11) DEFAULT NULL,
  `secname` varchar(255) DEFAULT NULL,
  `postnum` int(11) DEFAULT NULL,
  `clicknum` int(11) DEFAULT NULL,
  `seclevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'科研立项',NULL,NULL,2),(2,'齐鲁软件',NULL,NULL,1),(3,'挑战杯',NULL,NULL,1);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `upassword` varchar(20) DEFAULT NULL,
  `schoolID` int(11) DEFAULT NULL,
  `sregtime` date DEFAULT NULL,
  `teamnum` int(11) DEFAULT NULL,
  `faceimgpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tttt','tttt',1,NULL,NULL,'/data/face/defaultfaceimg.png'),(2,'7777777','7777777',1,NULL,NULL,'/data/face/defaultfaceimg.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zanup`
--

DROP TABLE IF EXISTS `zanup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zanup` (
  `pageID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zanup`
--

LOCK TABLES `zanup` WRITE;
/*!40000 ALTER TABLE `zanup` DISABLE KEYS */;
INSERT INTO `zanup` VALUES (1001,2,3);
/*!40000 ALTER TABLE `zanup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-11 22:55:57
