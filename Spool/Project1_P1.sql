-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: soccer
-- ------------------------------------------------------
-- Server version	5.6.25-log

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `Country_Name` varchar(20) NOT NULL,
  `Population` decimal(10,2) DEFAULT NULL,
  `No_of_Worldcup_won` int(11) DEFAULT NULL,
  `Manager` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Country_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_results`
--

DROP TABLE IF EXISTS `match_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_results` (
  `Match_id` int(11) NOT NULL,
  `Date_of_Match` date DEFAULT NULL,
  `Start_Time_Of_Match` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Team1` varchar(25) DEFAULT NULL,
  `Team2` varchar(25) DEFAULT NULL,
  `Team1_score` int(11) DEFAULT NULL,
  `Team2_score` int(11) DEFAULT NULL,
  `Stadium_Name` varchar(35) DEFAULT NULL,
  `Host_City` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Match_id`),
  KEY `Team1` (`Team1`),
  KEY `Team2` (`Team2`),
  CONSTRAINT `match_results_ibfk_1` FOREIGN KEY (`Team1`) REFERENCES `country` (`Country_Name`),
  CONSTRAINT `match_results_ibfk_2` FOREIGN KEY (`Team2`) REFERENCES `country` (`Country_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_results`
--

LOCK TABLES `match_results` WRITE;
/*!40000 ALTER TABLE `match_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `match_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_assists_goals`
--

DROP TABLE IF EXISTS `player_assists_goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_assists_goals` (
  `Player_id` int(11) DEFAULT NULL,
  `No_of_Matches` int(11) DEFAULT NULL,
  `Goals` int(11) DEFAULT NULL,
  `Assists` int(11) DEFAULT NULL,
  `Minutes_Played` int(11) DEFAULT NULL,
  KEY `Player_id` (`Player_id`),
  CONSTRAINT `player_assists_goals_ibfk_1` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_assists_goals`
--

LOCK TABLES `player_assists_goals` WRITE;
/*!40000 ALTER TABLE `player_assists_goals` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_assists_goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_cards`
--

DROP TABLE IF EXISTS `player_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_cards` (
  `Player_id` int(11) DEFAULT NULL,
  `Yellow_Cards` int(11) DEFAULT NULL,
  `Red_Cards` int(11) DEFAULT NULL,
  KEY `Player_id` (`Player_id`),
  CONSTRAINT `player_cards_ibfk_1` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_cards`
--

LOCK TABLES `player_cards` WRITE;
/*!40000 ALTER TABLE `player_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `Player_id` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(35) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `Club` varchar(30) DEFAULT NULL,
  `Position` varchar(10) DEFAULT NULL,
  `Caps_for_Country` int(11) DEFAULT NULL,
  `Is_captain` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Player_id`),
  KEY `Country` (`Country`),
  CONSTRAINT `players_ibfk_1` FOREIGN KEY (`Country`) REFERENCES `country` (`Country_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'soccer'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-29 19:13:03
