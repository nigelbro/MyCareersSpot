-- MySQL dump 10.13  Distrib 5.5.40, for Linux (x86_64)
--
-- Host: localhost    Database: students
-- ------------------------------------------------------
-- Server version	5.5.40

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
-- Table structure for table `job_seekers`
--

DROP TABLE IF EXISTS `job_seekers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_seekers` (
  `FirstName` varchar(128) DEFAULT NULL,
  `LastName` varchar(128) DEFAULT NULL,
  `Country` varchar(128) DEFAULT NULL,
  `City` varchar(128) DEFAULT NULL,
  `State` varchar(40) DEFAULT NULL,
  `ZipCode` char(20) DEFAULT NULL,
  `Email` varchar(40) NOT NULL DEFAULT '',
  `CollegeUniversity` varchar(128) DEFAULT NULL,
  `EducationLevel` varchar(128) DEFAULT NULL,
  `Degree` varchar(128) DEFAULT NULL,
  `Major` varchar(128) DEFAULT NULL,
  `PhoneNumber` char(20) DEFAULT NULL,
  `LinkedInUrl` varchar(40) DEFAULT NULL,
  `PortfolioLink` varchar(40) DEFAULT NULL,
  `Password` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_seekers`
--

LOCK TABLES `job_seekers` WRITE;
/*!40000 ALTER TABLE `job_seekers` DISABLE KEYS */;
INSERT INTO `job_seekers` VALUES (' nigel ','Brown','united states','buffalo','new york','14213','nigelbro@buffalo.edu','suny college at buffalo','College Junior','High School Diploma','Chemistry','','','','3fb8df6e9d8b5315cae79fce3f32df15'),(' Alyna ','Brown','united states','buffalo','new york','14213','lyna427@hotmail.com','d','College Graduate','Bachelor Degree','Biology','','','','9ba63a14bf2476ae9d1ebdf06a4d4d3b'),(' nigel ','smith','united states','buffalo','new york','14221','amerri27@hotmail.com','university at buffalo','College Senior','Bachelor Degree','Physics','','','','dd5f5ce0dbf7d35f5a58e0cae9622dc8'),('','',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(' nigel ','Brown','united states','syracuse','new york','134212','devante_b2005@yahoo.com','bryant & stratton college-main syracuse','College Junior','Bachelor Degree','Physics','','','','3fb8df6e9d8b5315cae79fce3f32df15');
/*!40000 ALTER TABLE `job_seekers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06  0:53:09
