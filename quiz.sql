# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.27)
# Datenbank: quiz
# Erstellungsdauer: 2013-09-08 09:15:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question` tinytext,
  `answer1` tinytext,
  `answer2` tinytext,
  `answer3` tinytext,
  `multipleChoice` tinyint(1) DEFAULT NULL,
  `rightAnswer` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `multipleChoice`, `rightAnswer`)
VALUES
	(1,'Wieviele Bundesländer hat Deutschland?','14','16','18',1,2),
	(2,'Wieviele Bezirke hat Berlin?','12','14','8',1,1),
	(3,'Wann wurde die Mauer gebaut?','1951','1961','1971',1,2),
	(4,'Wie viele Einwohner hatte Berlin am 31. Dezember 2012?','3345237','4103731','3375222',1,3),
	(5,'Wieviele Einwohner hatte Deutschland am 31. Dezember 2012?','81437591','84722983','80523746',1,3),
	(6,'Zu welchem Bundesland gehört Darmstadt?','Hessen','Sachsen','Nordrhein-Westfalen',1,1),
	(7,'Wie heißt die Hauptstadt von Nordrhein-Westfalen?','Köln','Düsseldorf','Bonn',1,2);

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
