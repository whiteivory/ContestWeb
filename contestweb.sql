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
INSERT INTO `follow` VALUES (1,NULL,NULL,NULL,NULL);
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
INSERT INTO `page` VALUES (1000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recfris`
--

DROP TABLE IF EXISTS `recfris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recfris` (
  `userId` int(11) NOT NULL,
  `friendId` int(11) NOT NULL,
  `simi` double DEFAULT NULL,
  PRIMARY KEY (`userId`,`friendId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recfris`
--

LOCK TABLES `recfris` WRITE;
/*!40000 ALTER TABLE `recfris` DISABLE KEYS */;
/*!40000 ALTER TABLE `recfris` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `recruit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recs`
--

DROP TABLE IF EXISTS `recs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recs` (
  `userId` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `predictRating` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`,`pageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recs`
--

LOCK TABLES `recs` WRITE;
/*!40000 ALTER TABLE `recs` DISABLE KEYS */;
/*!40000 ALTER TABLE `recs` ENABLE KEYS */;
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
-- Table structure for table `simipages`
--

DROP TABLE IF EXISTS `simipages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `simipages` (
  `itemId` int(11) NOT NULL,
  `simiId` int(11) NOT NULL,
  `similarity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemId`,`simiId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simipages`
--

LOCK TABLES `simipages` WRITE;
/*!40000 ALTER TABLE `simipages` DISABLE KEYS */;
/*!40000 ALTER TABLE `simipages` ENABLE KEYS */;
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
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'7777777','7777777',1,NULL,NULL,'/data/face/defaultfaceimg.png',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `userrat`
--

DROP TABLE IF EXISTS `userrat`;
/*!50001 DROP VIEW IF EXISTS `userrat`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `userrat` (
  `userID` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `pageID` tinyint NOT NULL,
  `star` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `zanup`
--

DROP TABLE IF EXISTS `zanup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zanup` (
  `pageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  PRIMARY KEY (`pageID`,`userID`,`star`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zanup`
--

LOCK TABLES `zanup` WRITE;
/*!40000 ALTER TABLE `zanup` DISABLE KEYS */;
/*!40000 ALTER TABLE `zanup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'contestweb'
--
/*!50003 DROP PROCEDURE IF EXISTS `deletePage` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePage`(in pid int)
begin delete from follow where pageID = pid;
    delete from recs where pageId = pid;
    delete from simipages where itemId = pid;
    delete from zanup where pageID = pid;
    delete from page where pageID = pid;
 
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deleteUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUser`(in pid int)
begin

delete from zanup where userId = pid;

delete from follow where userID = pid;

delete from recruit where userID = pid;

delete from recs where userId = pid;

delete from rfollow where userID = pid;
 
delete from user where userID = pid;
 
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `userrat`
--

/*!50001 DROP TABLE IF EXISTS `userrat`*/;
/*!50001 DROP VIEW IF EXISTS `userrat`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `userrat` AS select `user`.`userID` AS `userID`,`user`.`username` AS `username`,`zanup`.`pageID` AS `pageID`,`zanup`.`star` AS `star` from (`user` join `zanup` on((`user`.`userID` = `zanup`.`userID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-06 13:16:11
