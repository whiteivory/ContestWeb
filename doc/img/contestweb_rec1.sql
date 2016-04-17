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
INSERT INTO `follow` VALUES (1,NULL,NULL,NULL,NULL),(2,1001,2,'测试',NULL),(3,1002,2,'刷新界面后评分消失，可以从后台获取评分的分数',NULL),(4,1002,2,'分页功能后台还没有完成',NULL),(5,1002,2,'本页面图片显示在小聘雇的显示问题',NULL),(6,1002,2,'本页面推荐的后台还没有做，还有recruit界面的推荐（在user推荐的基础上选择在页面发帖的人）没有做',NULL),(7,1002,2,'论文：关于ZF2框架数据库处理以及orm hytrator源代码分析；ZF2的依赖注入处理及其特有的service manager处理方式；基于协同过滤的优点和不足；大型网站处理百万条数据时进行实时热门信息获取与处理的想法。',NULL),(8,1002,2,'首页的静态编辑，可以放入介绍本网站的文章',NULL),(9,1002,2,'上传图片bug，招募节目不登陆看不了',NULL);
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
INSERT INTO `page` VALUES (1000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1001,1,1,2,'1','2016-04-06 06:50:36','<p>123<img alt=\"\" src=\"/data/postinlineimg/39457_5704b19cc862b.jpg\" style=\"height:450px; width:800px\" /></p>\r\n','2016-04-06 06:51:23','1',24,1,2,1,'0',NULL),(1002,1,1,2,'TODO','2016-04-06 06:53:16','<p>list</p>\r\n','2016-04-09 11:55:15','1',51,7,2,1,'0',NULL),(1003,1,1,2,'410','2016-04-10 12:10:56','<p>410410</p>\r\n',NULL,'1',4,0,0,0,'0',NULL),(1004,2,1,2,'齐鲁历届获奖作品','2016-04-12 12:28:19','<p>此文档主要展示了理解齐鲁软件的优秀获奖作品</p>\r\n',NULL,'2',11,0,0,1,'/data/post/1004/2014年第十二届齐鲁软件大赛作品获奖一览表(最终)_570c41230249d.xls',NULL),(1005,3,1,2,'acm试题','2016-04-12 12:32:02','<p>acm试题册</p>\r\n',NULL,'4',15,0,3,1,'/data/post/1005/acm试题册_570c42021ee3a.docx',NULL),(1006,1,1,3,'图片测试','2016-04-12 02:26:48','<p><img alt=\"\" src=\"/data/postinlineimg/39457_570c5cc312318.jpg\" style=\"height:450px; width:800px\" />12333333333333333333333333333333333333333333333333333333333333444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444455</p>\r\n\r\n<p>666666666666666666666666666666666666666666</p>\r\n\r\n<p><img alt=\"\" src=\"/data/postinlineimg/39457_570c5cddce29e.jpg\" style=\"height:225px; width:400px\" /></p>\r\n',NULL,'1',20,0,1,1,'0',NULL),(1007,4,NULL,NULL,'acm试题册','2016-04-13 01:04:49','<p>acm经典试题</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1007/acm试题册_570d9b3111157.docx',NULL),(1008,5,1,2,'BP算法论文神经网络论文','2016-04-13 01:07:47','<p>BP算法，神经网络算法解析</p>\r\n',NULL,'4',4,0,0,1,'/data/post/1008/BP算法论文神经网络论文_570d9be3dcab5.doc',NULL),(1009,5,1,2,'Java','2016-04-13 01:09:16','<p>Java_switch-case语句用法总结</p>\r\n',NULL,'4',1,0,0,1,'/data/post/1009/Java_switch-case语句用法总结_570d9c3c362e0.doc',NULL),(1010,5,1,2,'Java','2016-04-13 01:10:14','<p>Java面试宝典</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1010/Java面试宝典2014版_570d9c767d01a.pdf',NULL),(1011,5,1,2,'kmp算法','2016-04-13 01:11:36','<p>kmp算法毕业论文</p>\r\n',NULL,'3',3,0,0,1,'/data/post/1011/kmp算法毕业论文__-_副本_570d9cc83d2aa.doc',NULL),(1012,1,1,2,'科研工作基本流程','2016-04-13 09:55:49','<p>科研工作基本流程</p>\r\n',NULL,'4',4,0,2,1,'/data/post/1012/_570e17a5431db.doc',NULL),(1013,2,1,2,'齐鲁软件','2016-04-13 09:57:09','<p>齐鲁软件大赛具体流程</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1013/_570e17f5c78b9.doc',NULL),(1014,2,1,2,'往届作品','2016-04-13 09:58:25','<p>2014年第十二届齐鲁软件大赛作品获奖一览表(最终)</p>\r\n',NULL,'2',0,0,0,1,'/data/post/1014/2014年第十二届齐鲁软件大赛作品获奖一览表(最终)_570e1841d4f37.xls',NULL),(1015,2,1,2,'2009齐鲁软件设计大赛题目.','2016-04-13 10:04:00','<p>2009齐鲁软件设计大赛题目.doc</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1015/2009齐鲁软件设计大赛题目_570e199072b21.doc',NULL),(1016,2,1,2,'2011齐鲁软件大赛题目.docx','2016-04-13 10:04:25','<p>2011齐鲁软件大赛题目.docx</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1016/2011齐鲁软件大赛题目_570e19a9d583f.docx',NULL),(1017,2,1,2,'2012齐鲁软件设计大赛命题汇总.doc','2016-04-13 10:04:44','<p>2012齐鲁软件设计大赛命题汇总.doc</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1017/2012齐鲁软件设计大赛命题汇总_570e19bcd3a3a.doc',NULL),(1018,2,1,2,'第十二届齐鲁大学生软件设计大赛命题15_百度开放云平台的应用开发.docx','2016-04-13 10:05:31','<p>第十二届齐鲁大学生软件设计大赛命题15_百度开放云平台的应用开发.docx</p>\r\n',NULL,'1',1,0,0,1,'/data/post/1018/15_百度开放云平台的应用开发_570e19eb3a01e.docx',NULL),(1019,2,1,2,'第十二届齐鲁大学生软件设计大赛命题16_基于物联网的智慧校园系统的设计与实现.doc','2016-04-13 10:05:49','<p>第十二届齐鲁大学生软件设计大赛命题16_基于物联网的智慧校园系统的设计与实现.doc</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1019/16_基于物联网的智慧校园系统的设计与实现_570e19fd9c3c6.doc',NULL),(1020,2,1,2,'齐鲁大学生软件设计及外语大赛方案.docx','2016-04-13 10:06:13','<p>齐鲁大学生软件设计及外语大赛方案.docx</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1020/_570e1a1519324.docx',NULL),(1021,2,1,2,'齐鲁软件官网比赛建议.docx','2016-04-13 10:06:32','<p>齐鲁软件官网比赛建议.docx</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1021/_570e1a287d05e.docx',NULL),(1022,2,1,2,'山东省第十一届齐鲁软件设计大赛命题详解.doc','2016-04-13 10:07:06','<p>山东省第十一届齐鲁软件设计大赛命题详解.doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1022/_570e1a4a49f0f.doc',NULL),(1023,4,1,2,'acm_竞赛题知识点总结.docx','2016-04-13 10:10:51','<p>acm_竞赛题知识点总结.docx</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1023/acm_竞赛题知识点总结_570e1b2bf11d1.docx',NULL),(1024,4,1,2,'acm','2016-04-13 10:11:42','<p>acm经典例题详解</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1024/ _570e1b5e0df06.doc',NULL),(1025,4,1,2,'acm编程比赛入门题目集.doc','2016-04-13 10:12:12','<p>acm编程比赛入门题目集.doc</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1025/acm编程比赛入门题目集_570e1b7cb9f23.doc',NULL),(1026,4,1,2,'acm网上比赛流程','2016-04-13 10:12:48','<p>acm网上比赛流程</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1026/acm网上比赛流程_570e1ba0bf709.doc',NULL),(1027,4,1,2,'参加ACM大赛所需的基础知识_(2).doc','2016-04-13 10:13:12','<p>参加ACM大赛所需的基础知识_(2).doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1027/ACM大赛所需的基础知识_(2)_570e1bb87060f.doc',NULL),(1028,4,1,2,'国际大学生程序设计大赛(ACM-icpc)输入输出介绍.ppt','2016-04-13 10:13:44','<p>国际大学生程序设计大赛(ACM-icpc)输入输出介绍.ppt</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1028/(ACM-icpc)输入输出介绍_570e1bd811f74.ppt',NULL),(1029,4,1,2,'清华大学吴翼学长的经验','2016-04-13 10:14:14','<p>清华大学吴翼学长的经验【我的ACM参赛故事】.pdf</p>\r\n',NULL,'3',0,0,0,1,'0',NULL),(1030,4,1,2,'acm赛程简介','2016-04-13 10:14:56','<p>acm赛程简介</p>\r\n',NULL,'2',0,0,0,1,'/data/post/1030/acm网上比赛流程_570e1c20b9d4a.doc',NULL),(1031,4,1,2,'acm前辈比赛经验','2016-04-13 10:15:29','<p>acm前辈比赛经验</p>\r\n',NULL,'3',0,0,0,1,'0',NULL),(1032,4,1,2,'国际大学生程序设计大赛输入输出介绍','2016-04-13 10:16:04','<p>国际大学生程序设计大赛输入输出介绍.ppt</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1032/(ACM-icpc)输入输出介绍_570e1c641ef86.ppt',NULL),(1033,3,1,2,'“挑战杯”大学生创业大赛获奖作品.doc','2016-04-13 10:20:07','<p>&ldquo;挑战杯&rdquo;大学生创业大赛获奖作品.doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1033/_570e1d5744382.doc',NULL),(1034,3,1,2,'大学生挑战杯.doc','2016-04-13 10:20:25','<p>大学生挑战杯.doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1034/_570e1d692e280.doc',NULL),(1035,3,1,2,'大学生挑战杯策划.doc','2016-04-13 10:20:42','<p>大学生挑战杯策划.doc</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1035/_570e1d7a61ca8.doc',NULL),(1036,3,1,2,'大学生挑战杯优秀获奖作品范文.docx','2016-04-13 10:20:58','<p>大学生挑战杯优秀获奖作品范文.docx</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1036/_570e1d8a24a44.docx',NULL),(1037,3,1,2,'第八届“挑战杯”创业计划书编排规范要求.doc','2016-04-13 10:21:12','<p>第八届&ldquo;挑战杯&rdquo;创业计划书编排规范要求.doc</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1037/_570e1d986e642.doc',NULL),(1038,3,1,2,'挑战杯-创业计划书样本(银奖).doc','2016-04-13 10:21:30','<p>挑战杯-创业计划书样本(银奖).doc</p>\r\n',NULL,'2',0,0,0,1,'/data/post/1038/-创业计划书样本(银奖)_570e1daaca305.doc',NULL),(1039,3,1,2,'挑战杯简介及历年情况.doc','2016-04-13 10:21:51','<p>挑战杯简介及历年情况.doc</p>\r\n',NULL,'2',0,0,0,1,'/data/post/1039/_570e1dbf3ae80.doc',NULL),(1040,3,1,2,'挑战杯作品要求.doc','2016-04-13 10:22:11','<p>挑战杯作品要求.doc</p>\r\n',NULL,'2',0,0,0,1,'/data/post/1040/_570e1dd3e1c80.doc',NULL),(1041,3,1,2,'大学生挑战杯范文.docx','2016-04-13 10:22:54','<p>大学生挑战杯范文.docx</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1041/_570e1dfe6a83f.docx',NULL),(1042,5,1,2,'国创项目报销.doc','2016-04-13 10:24:44','<p>国创项目报销.doc</p>\r\n',NULL,'3',0,0,0,0,'/data/post/1042/_570e1e6ce96f9.doc',NULL),(1043,5,1,2,'科研论文格式与范文.doc','2016-04-13 10:25:06','<p>科研论文格式与范文.doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1043/_570e1e82dcf3e.doc',NULL),(1044,5,1,2,'飞思卡尔智能车新手入门解决方案.pdf','2016-04-13 10:25:27','<p>飞思卡尔智能车新手入门解决方案.pdf</p>\r\n',NULL,'1',0,0,0,1,'/data/post/1044/_570e1e973729b.pdf',NULL),(1045,5,1,2,'嵌入式论文.doc','2016-04-13 10:25:43','<p>嵌入式论文.doc</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1045/_570e1ea767cb6.doc',NULL),(1046,5,1,2,'分享8年软件开发经验.doc','2016-04-13 10:26:07','<p>分享8年软件开发经验.doc</p>\r\n',NULL,'3',0,0,0,1,'/data/post/1046/8年软件开发经验_570e1ebf748b0.doc',NULL),(1047,5,1,2,'科研论文格式与范文.doc','2016-04-13 10:26:29','<p>科研论文格式与范文.doc</p>\r\n',NULL,'4',0,0,0,1,'/data/post/1047/_570e1ed5d2367.doc',NULL),(1048,1,1,2,'大学生科研立项课题选择指导.doc','2016-04-13 10:30:49','<p>大学生科研立项课题选择指导.doc</p>\r\n',NULL,'1',3,0,3,0,'/data/post/1048/_570e1fd95b2e5.doc',NULL),(1049,1,1,2,'科研立项课题参考.wps','2016-04-13 10:31:09','<p>科研立项课题参考.wps</p>\r\n',NULL,'4',3,0,2,1,'/data/post/1049/_570e1fedeb4d2.wps',NULL),(1050,1,1,2,'科研立项课题名称.docx','2016-04-13 10:31:31','<p>科研立项课题名称.docx</p>\r\n',NULL,'4',4,0,4,0,'/data/post/1050/_570e2003ee774.docx',NULL),(1051,1,1,2,'科研立项内容要求.doc','2016-04-13 10:31:49','<p>科研立项内容要求.doc</p>\r\n',NULL,'1',1,0,1,0,'/data/post/1051/_570e201587ea2.doc',NULL),(1052,1,1,2,'科研立项要求.doc','2016-04-13 10:32:10','<p>科研立项要求.doc</p>\r\n',NULL,'1',4,0,4,1,'/data/post/1052/_570e202a9c2a7.doc',NULL),(1053,1,1,2,'科研项目立项建议书模板.doc','2016-04-13 10:32:29','<p>科研项目立项建议书模板.doc</p>\r\n',NULL,'4',1,0,1,1,'/data/post/1053/_570e203d97a93.doc',NULL),(1054,1,1,2,'科研项目选题与立项的方法研究.docx','2016-04-13 10:32:46','<p>科研项目选题与立项的方法研究.docx</p>\r\n',NULL,'3',5,0,3,0,'/data/post/1054/_570e204e8e530.docx',NULL),(1055,1,1,3,'科研立项比赛通知1','2016-04-14 05:43:36','<p>for test</p>\r\n',NULL,'1',4,0,3,1,'0',NULL),(1056,1,1,3,'科研立项通知2','2016-04-14 05:43:54','<p>for test</p>\r\n',NULL,'1',2,0,2,1,'0',NULL),(1057,1,1,3,'科研立项论文模板','2016-04-14 05:44:28','<p>for test</p>\r\n',NULL,'4',0,0,0,1,'0',NULL);
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
INSERT INTO `recfris` VALUES (4,5,1),(4,6,0.625),(4,7,0.6666666666666666),(5,4,1),(5,6,0),(5,7,0),(6,4,0.625),(6,5,0),(6,7,0.875),(7,4,0.6666666666666666),(7,5,0),(7,6,0.875);
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
INSERT INTO `recruit` VALUES (1,2,'567','<p>56858</p>\r\n',NULL,NULL,NULL,NULL,'234,hyuj',1,1),(2,2,'233','<p>chhv</p>\r\n',NULL,NULL,NULL,NULL,'456',1,2),(3,2,'222','<p>123</p>\r\n',NULL,NULL,NULL,NULL,'2,7',1,2),(4,4,'test','<p>123</p>\r\n',NULL,NULL,NULL,NULL,'php,c',1,1),(5,5,'php项目组队','<p>擅长php及web项目，希望加入校内科研立项。</p>\r\n',NULL,NULL,NULL,NULL,'php,c++,web',1,1),(6,6,'java求组队','<p>java web</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,NULL,NULL,NULL,'java,web,科研立项',1,1),(7,7,'web项目？','<p>科研立项web项目</p>\r\n',NULL,NULL,NULL,NULL,'web,科研',1,1);
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
INSERT INTO `recs` VALUES (4,1049,5),(4,1053,5),(4,1054,4),(5,1051,5),(5,1055,4),(5,1056,4),(6,1012,5),(6,1051,5),(6,1053,5),(7,1012,5),(7,1051,5),(7,1054,5);
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
INSERT INTO `simipages` VALUES (1012,1049,'1'),(1012,1051,'1'),(1012,1054,'0'),(1012,1055,'0'),(1012,1056,'0'),(1048,1049,'1'),(1048,1053,'0'),(1048,1054,'0'),(1048,1055,'0.83333333333333337'),(1048,1056,'0.75'),(1049,1012,'1'),(1049,1048,'1'),(1049,1054,'0'),(1049,1055,'1'),(1049,1056,'0'),(1050,1052,'0'),(1050,1053,'1'),(1050,1054,'1'),(1050,1055,'0.66666666666666663'),(1050,1056,'0'),(1051,1012,'1'),(1051,1053,'0'),(1051,1054,'0'),(1051,1055,'0'),(1051,1056,'0'),(1052,1051,'0'),(1052,1053,'0'),(1052,1054,'0'),(1052,1055,'0'),(1052,1056,'0'),(1053,1050,'1'),(1053,1052,'0'),(1053,1054,'0'),(1053,1055,'0'),(1053,1056,'0'),(1054,1050,'1'),(1054,1052,'0'),(1054,1053,'0'),(1054,1055,'0'),(1054,1056,'0'),(1055,1048,'0.83333333333333337'),(1055,1049,'1'),(1055,1050,'0.66666666666666663'),(1055,1054,'0'),(1055,1056,'0.75'),(1056,1048,'0.75'),(1056,1052,'0'),(1056,1053,'0'),(1056,1054,'0'),(1056,1055,'0.75');
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
INSERT INTO `user` VALUES (2,'7777777','7777777',1,NULL,NULL,'/data/face/defaultfaceimg.png',2),(3,'wangyu','7777777',1,NULL,NULL,'/data/face/defaultfaceimg.png',NULL),(4,'user1_1','1111111',1,NULL,NULL,'/data/face/defaultfaceimg.png',NULL),(5,'user1_2','1111111',1,NULL,NULL,'/data/face/defaultfaceimg.png',NULL),(6,'user1_3','1111111',1,NULL,NULL,'/data/face/defaultfaceimg.png',NULL),(7,'user1_4','1111111',1,NULL,NULL,'/data/face/defaultfaceimg.png',NULL);
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
INSERT INTO `zanup` VALUES (1012,4,5),(1012,5,5),(1048,4,3),(1048,6,4),(1048,7,4),(1049,5,5),(1049,7,4),(1050,4,4),(1050,5,4),(1050,6,5),(1050,7,5),(1051,4,5),(1052,4,2),(1052,5,2),(1052,6,3),(1053,7,5),(1054,5,4),(1054,6,5),(1055,4,4),(1055,6,4),(1055,7,4),(1056,6,4),(1056,7,3);
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
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
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
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
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

-- Dump completed on 2016-04-14 21:15:17
