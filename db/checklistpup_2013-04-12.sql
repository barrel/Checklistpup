# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.10)
# Database: checklistpup
# Generation Time: 2013-04-12 11:40:37 -0400
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	(X'3931663665316632363464343330336261616231643264636231346164646132',X'3132372E302E302E31',X'4D6F7A696C6C612F352E3020284D6163696E746F73683B20496E74656C204D6163204F5320582031305F365F3829204170706C655765624B69742F3533372E333120284B48544D4C2C206C696B65204765636B6F29204368726F6D652F32362E302E313431302E3433205361666172692F3533372E3331',1365777922,X'613A313A7B733A393A22757365725F64617461223B733A303A22223B7D');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`)
VALUES
	(1,'United States'),
	(2,'Algeria'),
	(3,'Angola'),
	(4,'Anguilla'),
	(5,'Antigua & Barbuda'),
	(6,'Argentina'),
	(7,'Armenia'),
	(8,'Australia'),
	(9,'Austria'),
	(10,'Azerbaijan'),
	(11,'Bahamas'),
	(12,'Bahrain'),
	(13,'Barbados'),
	(14,'Belarus'),
	(15,'Belgium'),
	(16,'Belize'),
	(17,'Bermuda'),
	(18,'Bolivia'),
	(19,'Botswana'),
	(20,'Brazil'),
	(21,'Brunei Darussalam'),
	(22,'Bulgaria'),
	(23,'Canada'),
	(24,'Cayman Islands'),
	(25,'Chile'),
	(26,'China'),
	(27,'Colombia'),
	(28,'Costa Rica'),
	(29,'Croatia'),
	(30,'Cyprus'),
	(31,'Czech Republic'),
	(32,'Denmark'),
	(33,'Dominica'),
	(34,'Dominican Republic'),
	(35,'Ecuador'),
	(36,'Egypt'),
	(37,'El Salvador'),
	(38,'Estonia'),
	(39,'Finland'),
	(40,'France'),
	(41,'Germany'),
	(42,'Ghana'),
	(43,'Greece'),
	(44,'Grenada'),
	(45,'Guatemala'),
	(46,'Guyana'),
	(47,'Honduras'),
	(48,'Hong Kong'),
	(49,'Hungary'),
	(50,'Iceland'),
	(51,'India'),
	(52,'Indonesia'),
	(53,'Ireland'),
	(54,'Israel'),
	(55,'Italy'),
	(56,'Jamaica'),
	(57,'Japan'),
	(58,'Jordan'),
	(59,'Kazakstan'),
	(60,'Kenya'),
	(61,'Korea'),
	(62,'Kuwait'),
	(63,'Latvia'),
	(64,'Lebanon'),
	(65,'Lithuania'),
	(66,'Luxembourg'),
	(67,'Macau'),
	(68,'Macedonia'),
	(69,'Madagascar'),
	(70,'Malaysia'),
	(71,'Mali'),
	(72,'Malta'),
	(73,'Mauritius'),
	(74,'Mexico'),
	(75,'Moldova'),
	(76,'Montserrat'),
	(77,'Netherlands'),
	(78,'New Zealand'),
	(79,'Nicaragua'),
	(80,'Niger'),
	(81,'Nigeria    '),
	(82,'Norway'),
	(83,'Oman'),
	(84,'Pakistan'),
	(85,'Panama'),
	(86,'Paraguay'),
	(87,'Peru'),
	(88,'Philippines'),
	(89,'Poland'),
	(90,'Portugal'),
	(91,'Qatar'),
	(92,'Romania'),
	(93,'Russia'),
	(94,'Saint Kitts & Nevis'),
	(95,'Saint Lucia'),
	(96,'Saint Vincent and The Grenadines'),
	(97,'Saudi Arabia'),
	(98,'Senegal'),
	(99,'Singapore'),
	(100,'Slovakia'),
	(101,'Slovenia'),
	(102,'South Africa'),
	(103,'Spain'),
	(104,'Sri Lanka'),
	(105,'Suriname'),
	(106,'Sweden'),
	(107,'Switzerland'),
	(108,'Taiwan'),
	(109,'Tanzania'),
	(110,'Thailand'),
	(111,'Trinidad & Tobago'),
	(112,'Tunisia'),
	(113,'Turkey'),
	(114,'Turks & Caicos Islands'),
	(115,'Uganda'),
	(116,'United Arab Emirates'),
	(117,'United Kingdom'),
	(119,'Uruguay'),
	(120,'Uzbekistan'),
	(121,'Venezuela'),
	(122,'Vietnam'),
	(123,'Virgin Islands, British'),
	(124,'Yemen'),
	(125,'Afghanistan'),
	(126,'Albania'),
	(127,'Bangladesh'),
	(128,'Andorra'),
	(129,'Bosnia & Herzegovina'),
	(130,'Burkina Faso'),
	(131,'Burundi'),
	(132,'Cambodia'),
	(133,'Cameroon'),
	(134,'Cape Verde'),
	(135,'Central African Republic'),
	(136,'Chad'),
	(137,'Comoros'),
	(138,'Congo'),
	(139,'Côte d\'Ivoire'),
	(140,'Cuba'),
	(141,'Djibouti'),
	(142,'East Timor'),
	(143,'England'),
	(144,'Equatorial Guinea'),
	(145,'Eritrea'),
	(146,'Ethiopia'),
	(147,'Fiji'),
	(148,'Gabon'),
	(149,'Gambia'),
	(150,'Georgia'),
	(151,'Great Britain'),
	(152,'Guinea'),
	(153,'Guinea-Bissau'),
	(154,'Haiti'),
	(155,'Iran'),
	(156,'Iraq'),
	(157,'Kiribati'),
	(158,'North Korea'),
	(159,'South Kosovo'),
	(160,'Kyrgyzstan'),
	(161,'Laos'),
	(162,'Lesotho'),
	(163,'Liberia'),
	(164,'Libya'),
	(165,'Liechtenstein'),
	(166,'Malawi'),
	(167,'Maldives'),
	(168,'Marshall Islands'),
	(169,'Mauritania'),
	(170,'Micronesia'),
	(171,'Monaco'),
	(172,'Mongolia'),
	(173,'Montenegro'),
	(174,'Morocco'),
	(175,'Mozambique'),
	(176,'Myanmar'),
	(177,'Namibia'),
	(178,'Nauru'),
	(179,'Nepal'),
	(180,'Northern Ireland'),
	(181,'Palau'),
	(182,'Papua New Guinea'),
	(183,'Rwanda'),
	(184,'Samoa'),
	(185,'San Marino'),
	(186,'São Tomé & Príncipe'),
	(187,'Scotland'),
	(188,'Serbia'),
	(189,'Seychelles'),
	(190,'Sierra Leone'),
	(191,'Solomon Islands'),
	(192,'Somalia'),
	(193,'Sudan'),
	(194,'South Sudan'),
	(195,'Syria'),
	(196,'Tajikistan'),
	(197,'Togo'),
	(198,'Tonga'),
	(199,'Turkmenistan'),
	(200,'Tuvalu'),
	(201,'Ukraine'),
	(202,'Vanuatu'),
	(203,'Vatican City'),
	(204,'Wales'),
	(205,'Zaire'),
	(206,'Zambia'),
	(207,'Zimbabwe'),
	(208,'Bhutan'),
	(209,'Puerto Rico');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table example_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `example_table`;

CREATE TABLE `example_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(256) NOT NULL DEFAULT '',
  `list_name` varchar(50) NOT NULL,
  `checklist` text NOT NULL,
  `set_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `example_table` WRITE;
/*!40000 ALTER TABLE `example_table` DISABLE KEYS */;

INSERT INTO `example_table` (`id`, `unique_id`, `list_name`, `checklist`, `set_value`)
VALUES
	(1,'12345','English','{\"0\":\"First Item\",\"1\":\"Second Item\"}','{\"0\":\"0\",\"1\":\"0\"}'),
	(2,'67890','Spanish','{\"0\":\"Uno\",\"1\":\"Dos\"}','{\"0\":\"0\",\"1\":\"0\"}'),
	(11,'19837','test4','{\"0\":\"adfsg\",\"1\":\"slnlsj \"}','{\"0\":\"0\",\"1\":\"0\"}'),
	(12,'81552','test4','{\"0\":\"adfsg\",\"1\":\"slnlsj \"}','{\"0\":\"0\",\"1\":\"0\"}'),
	(13,'69469','test5','{\"0\":\"ljbdf \",\"1\":\"kjsndlgfjb\",\"2\":\"bgfd\"}','{\"0\":\"0\",\"1\":\"0\",\"2\":\"0\"}'),
	(16,'c3c60','teset6','{\"0\":\"afsdf\"}','{\"0\":\"0\"}'),
	(21,'e4859','tesdgs','{\"0\":\"\"}','{\"0\":\"0\"}'),
	(22,'63042','fsfgfg','{\"0\":\"sdfsdf\",\"1\":\"sdfsfa\"}','{\"0\":\"0\",\"1\":\"0\"}'),
	(24,'b4256','Daily List','{\"0\":\"Clean\",\"1\":\"Wash\",\"2\":\"Buy\",\"3\":\"Sell\",\"4\":\"Stuff\"}','{\"0\":\"0\",\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\"}'),
	(26,'492c7','Daily List','{\"0\":\"Clean\",\"1\":\"Wash\",\"2\":\"Buy\",\"3\":\"Sell\",\"4\":\"Stuff\"}','{\"0\":\"0\",\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\"}'),
	(27,'0b2cb','testvalues','{\"0\":\"one\",\"1\":\"two\",\"2\":\"gsdjg\",\"3\":\"ksldkf\",\"4\":\"kjsdf\"}','{\"0\":\"0\"}'),
	(28,'a7a92','testvalues2','{\"0\":\"lkshhlkdfg\",\"1\":\"lkaldfgha\",\"2\":\"lkjsdf\",\"3\":\"lhjkaldf\",\"4\":\"lkjadf\"}','{\"0\":\"0\",\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\"}');

/*!40000 ALTER TABLE `example_table` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login_attempts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table user_autologin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_autologin`;

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_ip` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table user_profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_profiles`;

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
