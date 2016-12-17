-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.37


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hdm184708692_db
--

CREATE DATABASE IF NOT EXISTS hdm184708692_db;
USE hdm184708692_db;

--
-- Temporary table structure for view `e_hsm_pro_col`
--
DROP TABLE IF EXISTS `e_hsm_pro_col`;
DROP VIEW IF EXISTS `e_hsm_pro_col`;

--
-- Temporary table structure for view `hsm_pro_col`
--
DROP TABLE IF EXISTS `hsm_pro_col`;
DROP VIEW IF EXISTS `hsm_pro_col`;

--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`aid`,`username`,`password`,`time`) VALUES 
 (1,'admin','21232f297a57a5a743894a0e4a801fc3','2016-07-24 08:27:37');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `money` int(10) unsigned NOT NULL,
  `tel` varchar(45) NOT NULL,
  `beizhu` longtext NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `gaozhi` int(10) unsigned NOT NULL DEFAULT '0',
  `tuijianren` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baobeiren` varchar(45) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`cid`,`username`,`money`,`tel`,`beizhu`,`status`,`gaozhi`,`tuijianren`,`date`,`time`,`baobeiren`) VALUES 
 (1,'老蒋',50000,'13412770170','有房',1,0,'13592778181','2016年07月24日','2016-07-24 08:58:27','罗贵怀'),
 (2,'啊辉',10000,'13532416940','无',0,1,'13592778181','2016年07月24日','2016-07-24 09:11:17','罗贵怀'),
 (3,'习近平',1000,'13800138000','急需用钱',1,0,'13480731740','2016年07月24日','2016-07-24 10:20:15','陈小龙'),
 (4,'王小姐',100000,'13790686758','有车',0,1,'13538689969','2016年07月24日','2016-07-24 10:54:08','曾伟化'),
 (5,'张培霞',100000,'13250504719','优良职业',0,1,'13790686758','2016年07月25日','2016-07-25 15:04:54','王慧'),
 (6,'罗先生',100000,'13592778185','做生意的',0,1,'13592778181','2016年07月25日','2016-07-25 18:46:10','罗贵怀'),
 (7,'小雨',50000,'13825794481','',0,0,'13592778181','2016年07月26日','2016-07-26 11:08:07','罗贵怀'),
 (8,'孙生',4,'18925761119','上班，现金发4000',0,0,'18607692838','2016年07月26日','2016-07-26 14:26:00','邓先生'),
 (9,'郭礼伯',5,'13712517520','执照2年，平安保险5年，年缴9000，负债高',0,0,'18607692838','2016年07月26日','2016-07-26 14:29:07','邓先生'),
 (10,'范绍强',5,'13686116816','执照10年，无房，有车，平安保险月缴15期，月缴889，负债高',0,0,'18607692838','2016年07月26日','2016-07-26 14:33:24','邓先生'),
 (11,'杨礼强',20,'13726469042','生意无执照，平安保险3年4次5000，陆金所5万，',0,0,'18607692838','2016年07月26日','2016-07-26 14:37:35','邓先生'),
 (12,'封后平',500000,'13509004951','执照10年，3次保单19000',0,0,'18607692838','2016年07月26日','2016-07-26 14:49:04','邓先生'),
 (13,'肖华',300000,'15920243888','执照3年，保单3年4次6700，2年逾期11次',0,0,'18607692838','2016年07月26日','2016-07-26 14:52:51','邓先生'),
 (14,'孔祥铭',50000,'13688981955','现金8000工资，流水少，社保4年',0,0,'18607692838','2016年07月26日','2016-07-26 14:54:11','邓先生'),
 (15,'麦生',30000,'13798868585','长安辅警，征信查询次数多，做过拍拍贷',0,0,'18607692838','2016年07月26日','2016-07-26 14:56:51','邓先生'),
 (16,'王清华',100000,'15814360788','保单9月3次，年缴11000',0,0,'18607692838','2016年07月26日','2016-07-26 14:58:05','邓先生'),
 (17,'张生',50000,'13790340583','派遣中信员工，代发6000，五险一金',0,0,'18607692838','2016年07月26日','2016-07-26 14:59:23','邓先生'),
 (18,'汪老板',100000,'13559717968','执照10个月，保单2次9600，供车半年',0,0,'18607692838','2016年07月26日','2016-07-26 15:00:36','邓先生'),
 (19,'习近平',80000,'13799996666','',1,0,'18576358883','2016年07月26日','2016-07-26 15:11:02','周园'),
 (20,'罗测试',20000,'13592778186','你好',0,1,'13592778181','2016年07月26日','2016-07-26 23:30:27','罗贵怀'),
 (21,'刘先生',50000,'13310824157','代发1万2，有社保，3年前左右有信用卡连续逾期3个月，金额17元，电话催收过',0,0,'18607692838','2016年07月28日','2016-07-28 10:41:18','邓先生'),
 (22,'吴金侃',50000,'13650052714','',0,0,'13026807772','2016年07月28日','2016-07-28 14:20:48','创业路一车友一李丽霞'),
 (23,'梁小',30000,'13760033334','',0,1,'13760033333','2016年07月28日','2016-07-28 19:24:25','陈'),
 (24,'黄小红',35000,'18819643602','办信用卡为主，贷款为后',0,0,'13377788138','2016年07月29日','2016-07-29 10:42:35','黄满棠'),
 (25,'唐广军',1500000,'13528534688','有车有保单，要先息后本为主',0,0,'13377788138','2016年07月29日','2016-07-29 10:46:37','黄满棠'),
 (26,'黄经让',50000,'13592778189','',0,0,'13592778181','2016年07月30日','2016-07-30 10:15:12','罗贵怀'),
 (27,'刘永彪',30000,'13902619664','代办信用卡',0,1,'18688818626','2016年08月01日','2016-08-01 09:11:54','车友大岭山杨雪卉'),
 (28,'万小惠',30,'18344425505','大额信用卡',0,1,'18688818950','2016年08月01日','2016-08-01 11:27:35','车友驾校东坑黎娟'),
 (29,'李生',40000,'17055566356','',0,1,'13592778181','2016年08月02日','2016-08-02 11:25:10','罗贵怀'),
 (30,'陈小东',500000,'13650117181','',0,0,'13650117182','2016年08月02日','2016-08-02 18:10:28','陈晓波'),
 (31,'李强',37000,'13419979977','',0,1,'13829106316','2016年08月03日','2016-08-03 14:55:04','洪锋华'),
 (32,'薛元伟',100000,'13650395168','消费',0,1,'13026807772','2016年08月05日','2016-08-05 13:43:15','创业路一车友一李丽霞');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


--
-- Definition of table `customer_status`
--

DROP TABLE IF EXISTS `customer_status`;
CREATE TABLE `customer_status` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `m_mid` int(10) unsigned NOT NULL,
  `st_content` varchar(45) NOT NULL,
  `st_date` varchar(45) NOT NULL,
  `st_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `st_status` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `customer_status`
--

/*!40000 ALTER TABLE `customer_status` DISABLE KEYS */;
INSERT INTO `customer_status` (`sid`,`cid`,`m_mid`,`st_content`,`st_date`,`st_time`,`st_status`) VALUES 
 (1,1,1,'报备客户','2016年07月24日','2016-07-24 08:58:27',0),
 (2,2,2,'报备客户','2016年07月24日','2016-07-24 09:11:17',0),
 (3,3,3,'报备客户','2016年07月24日','2016-07-24 10:20:15',0),
 (4,4,4,'报备客户','2016年07月24日','2016-07-24 10:54:08',0),
 (5,5,5,'报备客户','2016年07月25日','2016-07-25 15:04:55',0),
 (6,6,6,'报备客户','2016年07月25日','2016-07-25 18:46:10',0),
 (7,7,7,'报备客户','2016年07月26日','2016-07-26 11:08:08',0),
 (8,8,8,'报备客户','2016年07月26日','2016-07-26 14:26:01',0),
 (9,9,9,'报备客户','2016年07月26日','2016-07-26 14:29:08',0),
 (10,10,10,'报备客户','2016年07月26日','2016-07-26 14:33:24',0),
 (11,11,11,'报备客户','2016年07月26日','2016-07-26 14:37:35',0),
 (12,12,12,'报备客户','2016年07月26日','2016-07-26 14:49:04',0),
 (13,13,13,'报备客户','2016年07月26日','2016-07-26 14:52:52',0),
 (14,14,14,'报备客户','2016年07月26日','2016-07-26 14:54:11',0),
 (15,15,15,'报备客户','2016年07月26日','2016-07-26 14:56:51',0),
 (16,16,16,'报备客户','2016年07月26日','2016-07-26 14:58:06',0),
 (17,17,17,'报备客户','2016年07月26日','2016-07-26 14:59:23',0),
 (18,18,18,'报备客户','2016年07月26日','2016-07-26 15:00:36',0),
 (19,19,19,'报备客户','2016年07月26日','2016-07-26 15:11:03',0),
 (20,20,20,'报备客户','2016年07月26日','2016-07-26 23:30:28',0),
 (21,21,21,'报备客户','2016年07月28日','2016-07-28 10:41:18',0),
 (22,22,22,'报备客户','2016年07月28日','2016-07-28 14:20:48',0),
 (23,23,23,'报备客户','2016年07月28日','2016-07-28 19:24:25',0),
 (24,24,24,'报备客户','2016年07月29日','2016-07-29 10:42:35',0),
 (25,25,25,'报备客户','2016年07月29日','2016-07-29 10:46:37',0),
 (26,26,26,'报备客户','2016年07月30日','2016-07-30 10:15:12',0),
 (27,27,27,'报备客户','2016年08月01日','2016-08-01 09:11:54',0),
 (28,28,28,'报备客户','2016年08月01日','2016-08-01 11:27:35',0),
 (29,29,29,'报备客户','2016年08月02日','2016-08-02 11:25:10',0),
 (30,30,30,'报备客户','2016年08月02日','2016-08-02 18:10:28',0),
 (31,31,31,'报备客户','2016年08月03日','2016-08-03 14:55:04',0),
 (32,32,32,'报备客户','2016年08月05日','2016-08-05 13:43:15',0);
/*!40000 ALTER TABLE `customer_status` ENABLE KEYS */;


--
-- Definition of table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baobeiren` varchar(45) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `member`
--

/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`mid`,`username`,`password`,`status`,`time`,`baobeiren`) VALUES 
 (1,'13480731740','e10adc3949ba59abbe56e057f20f883e',0,'2016-07-24 08:34:43','陈小龙'),
 (2,'13592778181','202cb962ac59075b964b07152d234b70',0,'2016-07-24 08:57:07','罗贵怀'),
 (3,'13538689969','8ed6d955859a773c63e8414acd34c63c',0,'2016-07-24 10:52:19','曾伟化'),
 (5,'13790686758','1f1cc9f5e357bc81744c3c8ded18928c',0,'2016-07-25 14:53:45','王慧'),
 (6,'18688818657','7a2eb41a38a8f4e39c1586649da21e5f',0,'2016-07-26 11:42:00','车友第一国际'),
 (7,'13113121843','695b89d4c763f104e81d6c1e492fe4f2',0,'2016-07-26 13:06:40','黎雯'),
 (8,'15322898922','7cd8d42326e758ab933ab03c7e78d66b',0,'2016-07-26 13:17:38','李金龙'),
 (9,'18660836375','d84e28c3dcdc7025dc33ac709613bd31',0,'2016-07-26 13:23:47','郑亚洲'),
 (10,'18607692838','00fb6adbe8ed5b89539df9483659276b',0,'2016-07-26 14:21:51','邓先生'),
 (11,'13829106316','543f17875c440d8bbc91a294051596aa',0,'2016-07-26 14:33:24','洪锋华'),
 (13,'13026807772','06af94d6dded84b08554d5d49741cb69',0,'2016-07-26 15:07:21','创业路一车友一李丽霞'),
 (15,'18576358883','e10adc3949ba59abbe56e057f20f883e',0,'2016-07-26 15:09:22','周园'),
 (20,'13790205313','ec881e39764f7ed316e5e2e7b38ca3c5',0,'2016-07-26 15:17:46','白海燕'),
 (21,'13580902123','6e5fbf80b81f1c9a2fb085e951e1a31d',0,'2016-07-26 22:01:48','张杰'),
 (22,'13926819843','2f26820155d48b77c48a1b9965b1dc9b',0,'2016-07-26 23:38:46','覃志观'),
 (23,'18688818103','e10adc3949ba59abbe56e057f20f883e',0,'2016-07-27 10:38:16','车友爱迪李妹军'),
 (24,'18688818676','6c5e1faaf7cd8be803964952c642f9ec',0,'2016-07-27 17:12:33','车友红荔熊艳'),
 (25,'13925588878','bd01cdbd31f8e52d9fed1a8548951d8b',0,'2016-07-27 17:12:47','梁沛林'),
 (26,'18688818626','e10adc3949ba59abbe56e057f20f883e',0,'2016-07-27 18:48:21','车友大岭山杨雪卉'),
 (27,'13926845555','96e79218965eb72c92a549dd5a330112',0,'2016-07-27 20:03:31','李小军'),
 (28,'13377788138','a6ae12b7c5280b20b6db3a7bfda7fb2d',0,'2016-07-27 21:34:51','黄满棠'),
 (29,'15118380033','81dc9bdb52d04dc20036dbd8313ed055',0,'2016-07-27 22:33:32','黎章润'),
 (30,'13412653481','e10adc3949ba59abbe56e057f20f883e',0,'2016-07-28 12:04:13','东大姚炳坤'),
 (31,'15362819697','ded8e183b9ff6d54c139cf5c062df58a',0,'2016-07-28 18:32:15','李小卫'),
 (32,'13760033333','25f9e794323b453885f5181f1b624d0b',0,'2016-07-28 19:21:50','陈'),
 (33,'18688818950','b9061c83b7bceeb2b7ca727848a6a42a',0,'2016-07-29 10:50:02','车友驾校东坑黎娟'),
 (34,'15272840112','49062c56479de95281007e39b661119a',0,'2016-07-29 12:27:33','车友横沥周姚华'),
 (35,'18688818985','813879badff6f60b5e95b14c6350eeb8',0,'2016-07-29 13:46:14','车友石排黄春莲'),
 (36,'18664159824','960e6f8864b30f4777d8696ec1e3d001',0,'2016-07-29 15:52:36','马艳艳'),
 (37,'18688818910','95c5eb43c073ac8c7a8df25685e64d99',0,'2016-07-29 17:11:31','车友新世纪—骆霞'),
 (38,'13902619664','e10adc3949ba59abbe56e057f20f883e',0,'2016-08-01 08:57:13','刘永彪'),
 (39,'18688818115','0530e06069c8437ed7fe65597d4bc68e',0,'2016-08-01 11:39:18','陈土轩车友'),
 (40,'18688818961','22db8671a87b80a798639779d079cb69',0,'2016-08-01 12:13:30','车友文化'),
 (41,'18688819993','21218cca77804d2ba1922c33e0151105',0,'2016-08-01 13:37:13','车友三中（袁淑婷）'),
 (42,'13650117182','789ff7a2d96c4ec80adff0f270992ff4',0,'2016-08-02 18:08:41','陈晓波'),
 (43,'18038236299','9d1182f9eafa6672a186a03173cb585d',0,'2016-08-03 15:58:11','德优地产一刘生'),
 (44,'13713339223','10d0044037640bdf3c427dbe7e72b58f',0,'2016-08-03 16:10:04','郝增敬'),
 (45,'18002706266','59e6afac1a897dcbba43e22f0dc70f21',0,'2016-08-03 18:17:28','好旺来汽修      蓝先生'),
 (46,'18688818908','f3894520212e4b50fe5098c53dd9b390',0,'2016-08-05 16:05:30','车友金鹿李静');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;


--
-- Definition of table `money`
--

DROP TABLE IF EXISTS `money`;
CREATE TABLE `money` (
  `m_mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `baobeiren` varchar(45) NOT NULL,
  `tuijianren` varchar(45) NOT NULL,
  `m_yongjin` int(10) unsigned NOT NULL,
  `m_date` varchar(45) NOT NULL,
  `m_notes` varchar(45) NOT NULL,
  `m_status` int(10) unsigned NOT NULL DEFAULT '0',
  `m_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`m_mid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `money`
--

/*!40000 ALTER TABLE `money` DISABLE KEYS */;
INSERT INTO `money` (`m_mid`,`baobeiren`,`tuijianren`,`m_yongjin`,`m_date`,`m_notes`,`m_status`,`m_time`,`cid`) VALUES 
 (1,'罗贵怀','13592778181',250,'2016-07-24','',2,'2016-07-24 08:58:27',1),
 (2,'罗贵怀','13592778181',0,'2016-07-24','',0,'2016-07-24 09:11:17',2),
 (3,'陈小龙','13480731740',100,'2016-07-24','',2,'2016-07-24 10:20:15',3),
 (4,'曾伟化','13538689969',0,'2016-07-24','',0,'2016-07-24 10:54:08',4),
 (5,'王慧','13790686758',0,'2016-07-25','',0,'2016-07-25 15:04:55',5),
 (6,'罗贵怀','13592778181',0,'2016-07-25','',0,'2016-07-25 18:46:10',6),
 (7,'罗贵怀','13592778181',0,'2016-07-26','',0,'2016-07-26 11:08:08',7),
 (8,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:26:00',8),
 (9,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:29:07',9),
 (10,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:33:24',10),
 (11,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:37:35',11),
 (12,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:49:04',12),
 (13,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:52:52',13),
 (14,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:54:11',14),
 (15,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:56:51',15),
 (16,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:58:06',16),
 (17,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 14:59:23',17),
 (18,'邓先生','18607692838',0,'2016-07-26','',0,'2016-07-26 15:00:36',18),
 (19,'周园','18576358883',1600,'2016-07-26','',1,'2016-07-26 15:11:03',19),
 (20,'罗贵怀','13592778181',0,'2016-07-26','',0,'2016-07-26 23:30:27',20),
 (21,'邓先生','18607692838',0,'2016-07-28','',0,'2016-07-28 10:41:18',21),
 (22,'创业路一车友一李丽霞','13026807772',0,'2016-07-28','',0,'2016-07-28 14:20:48',22),
 (23,'陈','13760033333',0,'2016-07-28','',0,'2016-07-28 19:24:25',23),
 (24,'黄满棠','13377788138',0,'2016-07-29','',0,'2016-07-29 10:42:35',24),
 (25,'黄满棠','13377788138',0,'2016-07-29','',0,'2016-07-29 10:46:37',25),
 (26,'罗贵怀','13592778181',0,'2016-07-30','',0,'2016-07-30 10:15:12',26),
 (27,'车友大岭山杨雪卉','18688818626',0,'2016-08-01','',0,'2016-08-01 09:11:54',27),
 (28,'车友驾校东坑黎娟','18688818950',0,'2016-08-01','',0,'2016-08-01 11:27:35',28),
 (29,'罗贵怀','13592778181',0,'2016-08-02','',0,'2016-08-02 11:25:10',29),
 (30,'陈晓波','13650117182',0,'2016-08-02','',0,'2016-08-02 18:10:28',30),
 (31,'洪锋华','13829106316',0,'2016-08-03','',0,'2016-08-03 14:55:04',31),
 (32,'创业路一车友一李丽霞','13026807772',0,'2016-08-05','',0,'2016-08-05 13:43:15',32);
/*!40000 ALTER TABLE `money` ENABLE KEYS */;


--
-- Definition of table `other`
--

DROP TABLE IF EXISTS `other`;
CREATE TABLE `other` (
  `other_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `other_title` longtext NOT NULL,
  `other_content` longtext NOT NULL,
  `other_status` int(10) unsigned NOT NULL DEFAULT '0',
  `other_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`other_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `other`
--

/*!40000 ALTER TABLE `other` DISABLE KEYS */;
INSERT INTO `other` (`other_id`,`other_title`,`other_content`,`other_status`,`other_time`) VALUES 
 (1,'报备的客户，东莞贷款网会怎么跟进？','客户一经报备，东莞贷款网后台则会显示，然后排表客服部联系客户，联系客户后，如果客户完整提交资料，一般1-3个工作日就会放款，放款成功当天系统则会显示客户放款成功，我们也会短信通知报备人，报备人就可以提取佣金了。',0,'2016-07-25 15:31:50'),
 (2,'客户放款成功佣金是多少？','每月前3单按贷款总额的0.3%算佣金，3-5单按0.4%计算佣金，5单以上按0.5%计算佣金，系统会自动显示，以客户成功放款为准。',0,'2016-07-25 15:32:36'),
 (3,'将客户提供给东莞贷款网有什么意义？','东莞贷款网是一家致力于打造品牌服务机构的公司，我们会坚持专业、诚信、透明收费的标准去服务客户，所以将客户推荐给东莞贷款网实际上是为减少了时间和费用成本。',0,'2016-07-25 15:32:57'),
 (4,'是否会告诉客户，是谁将他需要贷款的信息报备的？','不会。',0,'2016-07-25 15:34:10'),
 (5,'我报备的客户继续再贷款，我是否还有佣金？','有的，佣金方案和第一次报备一样的。',0,'2016-07-25 15:34:31');
/*!40000 ALTER TABLE `other` ENABLE KEYS */;


--
-- Definition of table `scheme`
--

DROP TABLE IF EXISTS `scheme`;
CREATE TABLE `scheme` (
  `sc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sc_title` longtext NOT NULL,
  `sc_renqun` longtext NOT NULL,
  `sc_tedian` varchar(225) NOT NULL,
  `sc_content` longtext NOT NULL,
  `sc_status` int(10) unsigned NOT NULL DEFAULT '0',
  `sc_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `scheme`
--

/*!40000 ALTER TABLE `scheme` DISABLE KEYS */;
INSERT INTO `scheme` (`sc_id`,`sc_title`,`sc_renqun`,`sc_tedian`,`sc_content`,`sc_status`,`sc_time`) VALUES 
 (1,'上班族方案-上班族','上班族、公司是发现金的','要求低','<img src=\"http://adbb.dai12345.com./plugins/editor/attached/image/20160725/20160725214547_18286.png\" alt=\"\" />gg',0,'2016-07-25 21:45:32'),
 (2,'有车族方案-押证不押车不装GPS贷','有车族','不装GPS','暂无信息',0,'2016-07-25 10:06:04'),
 (3,'银行方案-二次装修贷','有房族','利息贷','暂无信息',0,'2016-07-25 10:07:38'),
 (4,'有房族方案-有房族信用贷','有房族','纯信用','暂无信息',0,'2016-07-25 10:09:03');
/*!40000 ALTER TABLE `scheme` ENABLE KEYS */;


--
-- Definition of table `status_notes`
--

DROP TABLE IF EXISTS `status_notes`;
CREATE TABLE `status_notes` (
  `sn_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `sn_content` longtext NOT NULL,
  `sn_date` varchar(45) NOT NULL,
  `sn_status` int(10) unsigned NOT NULL DEFAULT '0',
  `sn_sf` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

--
-- Dumping data for table `status_notes`
--

/*!40000 ALTER TABLE `status_notes` DISABLE KEYS */;
INSERT INTO `status_notes` (`sn_id`,`cid`,`sn_content`,`sn_date`,`sn_status`,`sn_sf`) VALUES 
 (1,1,'您好！您报备的客户已放款50000','2016年07月25日',1,1),
 (2,3,'资料已经收到','2016年07月27日',1,0),
 (3,3,'资料审核成功','2016年07月27日',1,0),
 (4,3,'客户佣金已经发放','2016年07月27日',1,1),
 (5,22,'已电话客户，客户准备资料中','2016年07月29日',0,0);
/*!40000 ALTER TABLE `status_notes` ENABLE KEYS */;


--
-- Definition of view `e_hsm_pro_col`
--

DROP TABLE IF EXISTS `e_hsm_pro_col`;
DROP VIEW IF EXISTS `e_hsm_pro_col`;
CREATE ALGORITHM=UNDEFINED DEFINER=`hdm184708692`@`%` SQL SECURITY DEFINER VIEW `e_hsm_pro_col` AS select `hdm184708692_db`.`hsm_col_two`.`two_id` AS `two_id`,`hdm184708692_db`.`hsm_col_two`.`two_col` AS `two_col`,`hdm184708692_db`.`hsm_col_two`.`two_sort` AS `two_sort`,`hdm184708692_db`.`hsm_col_two`.`one_two` AS `one_two`,`hdm184708692_db`.`hsm_col_one`.`one_id` AS `one_id`,`hdm184708692_db`.`hsm_col_one`.`one_col` AS `one_col`,`hdm184708692_db`.`hsm_col_one`.`one_sort` AS `one_sort`,`hdm184708692_db`.`hsm_product`.`pro_id` AS `pro_id`,`hdm184708692_db`.`hsm_product`.`pro_name` AS `pro_name`,`hdm184708692_db`.`hsm_product`.`pro_pic` AS `pro_pic`,`hdm184708692_db`.`hsm_product`.`pro_desc` AS `pro_desc`,`hdm184708692_db`.`hsm_product`.`pro_time` AS `pro_time`,`hdm184708692_db`.`hsm_product`.`pro_sort` AS `pro_sort`,`hdm184708692_db`.`hsm_product`.`two_pro` AS `two_pro` from ((`hsm_col_two` join `hsm_col_one`) join `hsm_product`) where ((`hdm184708692_db`.`hsm_col_one`.`one_id` = `hdm184708692_db`.`hsm_col_two`.`one_two`) and (`hdm184708692_db`.`hsm_col_two`.`two_id` = `hdm184708692_db`.`hsm_product`.`two_pro`));

--
-- Definition of view `hsm_pro_col`
--

DROP TABLE IF EXISTS `hsm_pro_col`;
DROP VIEW IF EXISTS `hsm_pro_col`;
CREATE ALGORITHM=UNDEFINED DEFINER=`hdm184708692`@`%` SQL SECURITY DEFINER VIEW `hsm_pro_col` AS select `hdm184708692_db`.`hsm_col_two`.`two_id` AS `two_id`,`hdm184708692_db`.`hsm_col_two`.`two_col` AS `two_col`,`hdm184708692_db`.`hsm_col_two`.`two_sort` AS `two_sort`,`hdm184708692_db`.`hsm_col_two`.`one_two` AS `one_two`,`hdm184708692_db`.`hsm_col_one`.`one_id` AS `one_id`,`hdm184708692_db`.`hsm_col_one`.`one_col` AS `one_col`,`hdm184708692_db`.`hsm_col_one`.`one_sort` AS `one_sort`,`hdm184708692_db`.`hsm_product`.`pro_id` AS `pro_id`,`hdm184708692_db`.`hsm_product`.`pro_name` AS `pro_name`,`hdm184708692_db`.`hsm_product`.`pro_pic` AS `pro_pic`,`hdm184708692_db`.`hsm_product`.`pro_desc` AS `pro_desc`,`hdm184708692_db`.`hsm_product`.`pro_time` AS `pro_time`,`hdm184708692_db`.`hsm_product`.`pro_sort` AS `pro_sort`,`hdm184708692_db`.`hsm_product`.`two_pro` AS `two_pro` from ((`hsm_col_two` join `hsm_col_one`) join `hsm_product`) where ((`hdm184708692_db`.`hsm_col_one`.`one_id` = `hdm184708692_db`.`hsm_col_two`.`one_two`) and (`hdm184708692_db`.`hsm_col_two`.`two_id` = `hdm184708692_db`.`hsm_product`.`two_pro`));



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
