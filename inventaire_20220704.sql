-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 172.20.0.2    Database: inventaire
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adresse_mail`
--

DROP TABLE IF EXISTS `adresse_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresse_mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serveur_id` int NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_A1207B9EB8F06499` (`serveur_id`),
  CONSTRAINT `FK_A1207B9EB8F06499` FOREIGN KEY (`serveur_id`) REFERENCES `courrier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse_mail`
--

LOCK TABLES `adresse_mail` WRITE;
/*!40000 ALTER TABLE `adresse_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `adresse_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'GIHP'),(3,'IES'),(4,'MK-DENT');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courrier`
--

DROP TABLE IF EXISTS `courrier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courrier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `securite_reception` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serveur_reception` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_reception` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serveur_emission` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_emission` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_serveur_reception_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `domaine` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `securite_emission` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BEF47CAA2792AEA4` (`type_serveur_reception_id`),
  KEY `IDX_BEF47CAA19EB6921` (`client_id`),
  CONSTRAINT `FK_BEF47CAA19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_BEF47CAA2792AEA4` FOREIGN KEY (`type_serveur_reception_id`) REFERENCES `type_courrier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courrier`
--

LOCK TABLES `courrier` WRITE;
/*!40000 ALTER TABLE `courrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `courrier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210413130507','2021-04-13 13:05:19',124795),('DoctrineMigrations\\Version20210413150610','2021-04-13 15:06:22',18519),('DoctrineMigrations\\Version20210416085327','2021-04-16 08:53:37',17999);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emplacement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_id` int DEFAULT NULL,
  `emplacement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C0CF65F6F6BD1646` (`site_id`),
  CONSTRAINT `FK_C0CF65F6F6BD1646` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplacement`
--

LOCK TABLES `emplacement` WRITE;
/*!40000 ALTER TABLE `emplacement` DISABLE KEYS */;
INSERT INTO `emplacement` VALUES (1,1,'CODIR-HEILLECOURT'),(2,1,'COMPTA-HEILLECOURT'),(3,1,'PAIE-HEILLECOURT'),(4,1,'EXPLOIT NANCY-HEILLECOURT'),(5,1,'RESA-HEILLECOURT'),(6,1,'GESTION PARC-HEILLECOURT'),(7,1,'NR-HEILLECOURT'),(8,2,'NR-METZ'),(9,3,'NR-BELFORT'),(10,4,'NR-COLMAR'),(11,5,'NR-PFASTATT'),(12,6,'NR-BOOS'),(13,7,'NR-TROYES'),(16,1,'SS');
/*!40000 ALTER TABLE `emplacement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fonction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonction`
--

LOCK TABLES `fonction` WRITE;
/*!40000 ALTER TABLE `fonction` DISABLE KEYS */;
/*!40000 ALTER TABLE `fonction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fournisseur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fournisseur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'JCD54/SIS','3 all√©e de Chantilly','54500','VANDOEUVRE LES NANCY','0383614477','support@sisfrance.eu'),(2,'ACF Gestion','NR',NULL,NULL,NULL,NULL),(3,'ISATAD','NR',NULL,NULL,NULL,NULL),(4,'SIS','3 all√©e de Chantilly','54500','VANDOEUVRE LES NANCY','+33383614477','support@sisfrance.eu'),(5,'/','NR',NULL,NULL,NULL,NULL),(6,'TIRESIAS ???','NR',NULL,NULL,NULL,NULL),(7,'Comunic Colmar','NR',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_support` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_support` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (1,'HP',NULL,NULL),(2,'TOSHIBA',NULL,NULL),(3,'ANTEC',NULL,NULL),(4,'DELL',NULL,NULL),(5,'CHIEFTEC',NULL,NULL),(6,'/',NULL,NULL),(7,'FUJITSU',NULL,NULL),(8,'TACENS',NULL,NULL),(9,'ASUS',NULL,NULL),(10,'LENOVO',NULL,NULL),(11,'Compaq',NULL,NULL),(12,'GIGABYTE',NULL,NULL),(13,'LOGITECH',NULL,NULL),(14,'MICROSOFT',NULL,NULL),(15,'LOGI',NULL,NULL),(16,'BOULANGER',NULL,NULL),(17,'RAPPO',NULL,NULL),(18,'',NULL,NULL),(19,'ASUS, TOUCHE √âFFAC√â',NULL,NULL),(20,'MICROSOFT TOUCHE √âFFAC√â',NULL,NULL),(21,'CSL',NULL,NULL),(22,'PAS DE SOURIS',NULL,NULL),(23,'RED MOUSE',NULL,NULL),(24,'CHERRY',NULL,NULL),(25,'NGS',NULL,NULL),(26,'PHILIPS',NULL,NULL),(27,'V7',NULL,NULL),(28,'IIYAMA',NULL,NULL),(29,'YNDAI',NULL,NULL),(30,'AOC',NULL,NULL),(31,'LG',NULL,NULL),(32,'SAMSUNG',NULL,NULL),(33,'ACER',NULL,NULL),(34,'JVC',NULL,NULL),(35,'IYAMA',NULL,NULL),(36,'HANNS.G',NULL,NULL),(37,'SAMSUNG INCURV√â',NULL,NULL),(38,'ACER',NULL,NULL);
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modele` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque_id` int DEFAULT NULL,
  `modele` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_100285584827B9B2` (`marque_id`),
  CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` VALUES (1,1,'ELITEBOOK X360'),(2,1,'PROBOOK-650-G5'),(3,1,'PROBOOK-650-G5'),(4,2,'PORTEGE Z30'),(5,1,'HP ProDesk 400 G2'),(6,2,'Satellite Pro C√©l√©ron'),(7,2,'TECRA A50'),(8,2,'Tecra A50-C-1ZV'),(9,1,'WORKSTATION Z220'),(10,3,'Transfert ISATAD'),(11,1,'PRODESK 400 (Mehmet)'),(12,1,'PRO DESK'),(13,4,'poste personnalis√©'),(14,1,'PRO 3400 MT'),(15,2,'PORTEGE R30-A-19P'),(16,1,'PRODESK 490 G1'),(17,1,'Elite 7200'),(18,2,'Satellite Pro R50-C-121'),(19,1,'PROBOOk-4510-S'),(20,5,'CHIEFTEC'),(21,6,'/'),(22,2,'Tecra A50-C-1QG'),(23,4,'OptiPlex 5040'),(24,1,'PRO DESK 600'),(25,4,'Latitude E5540'),(26,4,'Vostro 230'),(27,4,'Dimension 3100/E310'),(28,7,'ESPRIMO P420'),(29,8,'signum2'),(30,9,'zenbook'),(31,10,'only one'),(32,9,'DESKTOP'),(33,11,'Compaq'),(34,12,'GIGABYTE'),(35,1,'ENVY 17'),(36,9,'ASUStek computer'),(37,1,'Clavier G√©n√©rique 105 touches'),(38,13,'Clavier G√©n√©rique 105 touches'),(39,1,'Clavier G√©n√©rique 105 touches-HP'),(40,13,'Clavier G√©n√©rique 105 touches-LOGITECH'),(41,14,'Clavier G√©n√©rique 105 touches-MICROSOFT'),(42,15,'Clavier G√©n√©rique 105 touches-LOGI'),(43,6,'Clavier G√©n√©rique 105 touches-/'),(44,16,'Clavier G√©n√©rique 105 touches-BOULANGER'),(45,17,'Clavier G√©n√©rique 105 touches-RAPPO'),(47,4,'Clavier G√©n√©rique 105 touches-DELL'),(48,18,'Clavier G√©n√©rique 105 touches-'),(49,10,'Clavier G√©n√©rique 105 touches-LENOVO'),(50,11,'Clavier G√©n√©rique 105 touches-COMPAQ'),(51,19,'Clavier G√©n√©rique 105 touches-ASUS, TOUCHE √âFFAC√â'),(55,9,'Clavier G√©n√©rique 105 touches-ASUS'),(56,13,'Souris 3 boutons-LOGITECH'),(57,14,'Souris 3 boutons-MICROSOFT'),(58,6,'Souris 3 boutons-/'),(59,16,'Souris 3 boutons-BOULANGER'),(60,1,'Souris 3 boutons-HP'),(61,21,'Souris 3 boutons-CSL'),(62,22,'Souris 3 boutons-PAS DE SOURIS'),(63,9,'Souris 3 boutons-ASUS'),(64,23,'Souris ergonomique-RED MOUSE'),(65,24,'Souris 3 boutons-CHERRY'),(66,25,'Souris 3 boutons-NGS'),(67,10,'Souris 3 boutons-LENOVO'),(68,11,'Souris 3 boutons-COMPAQ'),(69,26,'Brilliance 231B (full HD)-PHILIPS'),(70,1,'E27327 ( Full HD)-HP'),(71,27,'\"24\" 2465M (Full HD)-V7'),(72,26,'243S (Full HD)-PHILIPS'),(73,6,'/-/'),(74,28,'24 prolite XB2483HSU (Full HD)-IIYAMA'),(75,1,'LE2201W-HP'),(76,26,'\"24\" 247ELHA (Full HD)-PHILIPS'),(77,1,'HP2311X-HP'),(78,26,'\"27\" 2710-PHILIPS'),(79,29,'\"27\"-YNDAI'),(80,4,'\"27\"-DELL'),(81,30,'F22S+ (Full HD)-AOC'),(82,31,'FLATRON E2281 (Full HD)-LG'),(83,32,'T28C570 (Full HD)-SAMSUNG'),(84,32,'/-SAMSUNG'),(85,26,'349X7 (WQHD)-PHILIPS'),(86,9,'G4LMTF033944-ASUS'),(87,30,'LCD monitor 19 pouce-AOC'),(88,26,'243V (Full HD)-PHILIPS'),(89,33,'G246HL (Full HD)-ACER'),(90,4,'/-DELL'),(91,1,'2311X -HP'),(92,32,'27\"-SAMSUNG'),(93,7,'/-FUJITSU'),(94,34,'/-JVC'),(95,26,'273E3LHSB/00 (Full HD)-PHILIPS'),(96,9,'VW22OTE (1680x1050)-ASUS'),(97,35,'prolite b2282 HS-IYAMA'),(98,31,'IPSLED27A33 (Full HD)-LG'),(99,36,'hl274-HANNS.G'),(100,4,'\"4:3\"-DELL'),(101,4,'Feb2006-DELL'),(102,32,'SYNCMASTER933 (1366 x 768)-SAMSUNG'),(103,10,'IDACENTRE-LENOVO'),(104,31,'IPSLED-LG'),(105,37,'-SAMSUNG INCURV√â'),(106,11,'q2022A-COMPAQ'),(107,1,'-HP'),(108,33,'R241Y (Full HD)-ACER'),(109,28,'XB2483HSOU (Full HD)-IIYAMA'),(110,33,'P225HQ  (Full HD)-ACER'),(111,13,'/-LOGITECH'),(112,33,'P236H ( Full HD)-ACER'),(113,2,'/-Toshiba'),(114,1,'/-HP'),(115,1,'PROBOOK-430-G7'),(116,1,'PROBOOK-455-G8'),(117,1,'PRODESK-405-G6'),(118,1,'Z 24f G3'),(119,1,'PROBOOK-450-G8'),(120,1,'USB-C/A Universal Dock G2'),(121,14,'Surface pro'),(122,1,'PRODESK 400 G6');
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office` (
  `id` int NOT NULL AUTO_INCREMENT,
  `version` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cl√©` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compte_office` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office`
--

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordinateur`
--

DROP TABLE IF EXISTS `ordinateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordinateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modele_id` int DEFAULT NULL,
  `type_ordinateur_id` int DEFAULT NULL,
  `processeur_id` int DEFAULT NULL,
  `fournisseur_id` int DEFAULT NULL,
  `systeme_id` int DEFAULT NULL,
  `reference` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memoire` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `adresse_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emplacement_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8712E8DBAC14B70A` (`modele_id`),
  KEY `IDX_8712E8DBF26EA0FF` (`type_ordinateur_id`),
  KEY `IDX_8712E8DB5C9BE5AD` (`processeur_id`),
  KEY `IDX_8712E8DB670C757F` (`fournisseur_id`),
  KEY `IDX_8712E8DB346F772E` (`systeme_id`),
  KEY `IDX_8712E8DBC4598A51` (`emplacement_id`),
  CONSTRAINT `FK_8712E8DB346F772E` FOREIGN KEY (`systeme_id`) REFERENCES `systeme` (`id`),
  CONSTRAINT `FK_8712E8DB5C9BE5AD` FOREIGN KEY (`processeur_id`) REFERENCES `processeur` (`id`),
  CONSTRAINT `FK_8712E8DB670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  CONSTRAINT `FK_8712E8DBAC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`),
  CONSTRAINT `FK_8712E8DBC4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`),
  CONSTRAINT `FK_8712E8DBF26EA0FF` FOREIGN KEY (`type_ordinateur_id`) REFERENCES `type_ordinateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordinateur`
--

LOCK TABLES `ordinateur` WRITE;
/*!40000 ALTER TABLE `ordinateur` DISABLE KEYS */;
INSERT INTO `ordinateur` VALUES (1,1,1,1,1,1,'541-PCP-011','5CG92568FD','8 Go','2019-10-28',NULL,NULL,'541-PCP-011',1),(2,2,1,1,1,2,'541-PCP-031','5CG0384938','8 Go','2020-11-16',NULL,NULL,'541-PCP-031',1),(3,2,1,1,1,2,'541-PCP-028','5CG012BFNM','8 Go','2020-11-16',NULL,NULL,'541-PCP-028',1),(4,2,1,1,1,2,'541-PCP-029','5CG012BFPC','8 Go','2020-11-16',NULL,NULL,'541-PCP-029',1),(5,3,1,1,1,1,'541-PCP-005','5CG9392328','8 Go','2019-10-28',NULL,NULL,'541-PCP-005',1),(6,4,1,2,1,1,'541-PCP-006','/','8Go','2015-09-22',NULL,NULL,'ADMIN13',1),(7,5,2,3,1,3,'541-PCF-010','CZC6157XK4','8 Go','2017-04-05',NULL,NULL,'JTORLOTIN',2),(8,6,1,4,1,4,'541-PCP-012','YF023552H','4 Go','2016-09-12',NULL,NULL,'TOSHIBA-FRENZEL',2),(9,7,1,1,1,5,'541-PCP-003','6G029167H','8 Go','2016-07-26',NULL,NULL,'PORT02',2),(11,2,1,1,1,2,'541-PCP-030','5CG012BH59','8 Go','2020-11-16',NULL,NULL,'541-PCP-030',3),(13,9,2,6,2,6,'541-PCF-019','CZC2463BF3','24 Go','2012-11-30',NULL,NULL,'EDDY',4),(14,10,2,1,3,7,'541-PCF-020','Poste personnalis√©','8 Go','2016-04-21',NULL,NULL,'PCREGUL4',4),(16,12,2,3,1,1,'541-PCF-022','CZC6157XMS','8 Go','2017-02-28',NULL,NULL,'FIXETRANSP08',5),(17,12,2,4,1,8,'541-PCF-023','CZC6157XJB','8 Go','2017-05-15',NULL,NULL,'TRANSP1',5),(18,12,2,7,4,2,'541-PCF-026','8CC03807BC','8 Go','2020-09-24',NULL,NULL,'ACCUEIL',5),(19,12,2,4,1,2,'541-PCF-025','CZC61557XML','8 Go','2019-02-27',NULL,NULL,'ACCUEIL04',5),(20,2,1,1,1,2,'541-PCP-040','5CG03848TM','8 Go','2020-11-16',NULL,NULL,'541-PCP-040',4),(22,2,1,1,5,3,'541-PCP-027','5CG03848V1','8 Go','1970-01-01',NULL,NULL,'541-PCP-027',7),(23,13,2,8,6,5,'541-PCF-024','BXDB4J','8 Go','1970-01-01',NULL,NULL,'ACCUEIL',7),(24,14,2,1,2,5,'541-PCF-013','CZC2020433','4 Go','2012-01-26',NULL,NULL,'Admin07',7),(25,7,1,1,1,5,'541-PCP-004','8G143357H','8 Go','2017-02-08',NULL,NULL,'SDONADINI',7),(26,6,1,4,1,5,'541-PCP-015','YF023521H','4 Go','2016-09-12',NULL,NULL,'REFTRANSP006',7),(27,7,1,1,1,5,'541-PCP-002','6G029190H','8 Go','2016-07-26',NULL,NULL,'PORT03',7),(28,15,1,9,5,3,'/','6F042087H','4 Go','1970-01-01',NULL,NULL,'/',7),(29,8,1,5,1,2,'681-PCP-03','4J154436H','8 Go','2018-06-13',NULL,NULL,'CFRENZEL',7),(30,10,2,1,3,7,'541-PCF-001','8A19AG08','8 Go','2016-04-21',NULL,NULL,'pc-compta01',7),(31,16,2,1,2,9,'541-PCF-014','CZC40752TG','8 Go','2014-03-12',NULL,NULL,'HP PRO490',7),(32,17,2,1,2,5,'541-PCF-016','CZC1128P9M','4 Go','2011-07-15',NULL,NULL,'ADMIN14',7),(33,6,1,4,1,5,'541-PCP-017','4G079771H','4 Go','2016-09-12',NULL,NULL,'REFTRANSP05',7),(34,6,1,4,1,5,'541-PCP-018','4G079797H','4 Go','2016-09-12',NULL,NULL,'PORT54_RH_02',7),(35,18,1,10,5,5,'570-PCP-001','YF023527H','4 Go','1970-01-01',NULL,NULL,'PORT57_REF01',8),(36,19,1,11,5,5,'570-PCP-002','CNU011445M','4 Go','1970-01-01',NULL,NULL,'GIHPMETZ-PC',8),(37,20,1,12,5,5,'570-PCP-003','MD0212100833','4 Go','1970-01-01',NULL,NULL,'POSTE1',8),(38,21,1,2,5,3,'570-PCP-004','/','8 Go','1970-01-01',NULL,NULL,'PC PERSO',8),(39,22,1,13,1,3,'570-PCP-005','76123180H','8Go','2017-02-08',NULL,NULL,'570-PCP-005',8),(40,18,1,4,5,5,'904-PCP-001','YF023481H','4 Go','1970-01-01',NULL,NULL,'RESPTRANSP01',9),(41,23,2,14,5,10,'904-PCF-002','9JKLSM2','8 Go','1970-01-01',NULL,NULL,'DESKTOP-R7FTVBG',9),(42,24,2,15,5,11,'680-PCF-001','8CG937397X','8 Go','2019-11-26',NULL,NULL,'GIHPCOLM-01',10),(43,24,2,15,5,11,'680-PCF-002','8CG937397P','8 Go','2019-11-26',NULL,NULL,'GIHPCOLM-02',10),(44,25,2,16,7,5,'680-PCF-003','51XJK12','8 Go','2015-08-01',NULL,NULL,'dell-bleurene',10),(45,26,2,17,5,5,'680-PCF-004','J4PNZ4J','3 Go','1970-01-01',NULL,NULL,'PLANNING',10),(46,21,2,18,5,9,'680-PCF-005','PC config personnalis√©','8 Go','1970-01-01',NULL,NULL,'PC-RESA2',10),(47,27,2,19,5,12,'681-PCF-01','J2KRX1J','1 Go','1970-01-01',NULL,NULL,'Plan3',11),(48,28,2,20,5,1,'681-PCF-02','YLTH456565','4 Go','1970-01-01',NULL,NULL,'GIHP-3',11),(49,29,2,1,5,5,'6811-PCF-01','PC personnalis√©','4 Go','1970-01-01',NULL,NULL,'USER-PC',12),(50,30,1,21,5,13,'6811-PCP-02','KAN0CV16520244F','8 Go','2019-12-01',NULL,NULL,'LAPTOP-ENO0VJSB',12),(51,31,2,22,5,14,'6811-PCF-03','MP1FA7GS','4 Go','1970-01-01',NULL,NULL,'DESKTOP-F5PPIEI',12),(52,32,2,23,5,15,'6811-PCF-04','E1PDCG0010YZ','4 Go','1970-01-01',NULL,NULL,'PC-BB',12),(53,33,2,24,5,16,'6811-PCF-05','CZC0330NM0','2 Go','1970-01-01',NULL,NULL,'SOSBOOS',12),(54,33,2,24,5,15,'6811-PCF-06','CZC101GR08','2 Go','1970-01-01',NULL,NULL,'CLUBMED1',12),(55,21,2,25,5,2,'100-PCF-01','Poste personnalis√©','8Go','1970-01-01',NULL,NULL,'DESKTOP-4NF8IKM',13),(56,34,2,25,5,1,'100-PCF-02','Poste personnalis√©','8Go','1970-01-01',NULL,NULL,'DESKTOP-2K2DR51',13),(57,35,1,26,5,1,'100-PCP-03','5CG3291HBB','8Go','1970-01-01',NULL,NULL,'DESKTOP-QTDNP06',13),(58,36,2,27,5,2,'100-PCF-04','B7PEAS001049','4Go','1970-01-01',NULL,NULL,'ATS-PC',13),(59,115,1,1,1,3,'541-PCP-033','5CD1087NGY',NULL,'2021-05-01',NULL,NULL,'541-PCP-033',1),(60,116,NULL,NULL,NULL,3,'681-PCP-01','5CD110Q1N2','8 Go','2021-04-13',NULL,NULL,'681-PCP-01',11),(61,116,NULL,NULL,NULL,3,'904-PCP-002','5CD110Q1SV','8 Go','2021-04-13',NULL,NULL,'904-PCP-002',9),(62,117,NULL,NULL,NULL,3,'681-PCF-03','8CC1123N9Y','8 Go','2021-04-13',NULL,NULL,'681-PCF-03',11),(63,117,NULL,NULL,NULL,17,'904-PCF-003','8CC1123N8J','8 Go','2021-04-13',NULL,NULL,'904-PCF-003',9),(64,116,NULL,NULL,NULL,3,'570-PCP-006','5CD110Q1LY','8 Go','2021-04-13',NULL,NULL,'570-PCP-006',8),(65,116,NULL,NULL,NULL,17,'570-PCP-007','5CD110Q1LV','8 Go','2021-04-13',NULL,NULL,'570-PCP-007',8),(66,117,NULL,NULL,NULL,17,'570-PCF-001','8CC1123NCJ','8 Go','2021-04-12',NULL,NULL,'570-PCF-001',8),(67,117,NULL,NULL,NULL,17,'570-PCF-002','8CC1123N5L','8 Go','2021-04-12',NULL,NULL,'570-PCF-002',8),(68,117,NULL,NULL,NULL,17,'570-PCF-003','8CC1123NB7','8 Go','2021-04-12',NULL,NULL,'570-PCF-003',8),(69,117,2,28,1,17,'680-PCF-006','8CC1123N9F','8 Go','2021-07-10',NULL,NULL,'680-PCF-006',10),(70,119,NULL,NULL,NULL,3,'541-PCP-034','5CD125FJHP','8 Go',NULL,NULL,NULL,'HP-PCP-034',4),(71,119,NULL,NULL,NULL,3,'541-PCP-035','5CD125FJKJ','8Go',NULL,NULL,NULL,'HP-PCP-035',4),(72,119,1,NULL,NULL,3,'541-PCP-036','5CD142K2BL','8Go',NULL,NULL,NULL,'541-PCP-036',5),(73,119,NULL,NULL,NULL,3,'541-PCP-037','5CD142K2F5','8Go',NULL,NULL,NULL,'HP-PCP-037',4),(74,119,NULL,NULL,NULL,3,'681-PCP-02','5CD142MZNZ','8Go',NULL,NULL,NULL,'681-PCP-02',11),(75,119,1,NULL,NULL,NULL,'541-PCP-037','5CD142K2F5','8Go','2022-01-01',NULL,NULL,'541-PCP-037',6),(78,119,NULL,NULL,NULL,3,'541-PCP-038','5CD1386XJH','8 Go','2022-03-02',NULL,NULL,'541-PCP-038',7),(79,119,NULL,NULL,NULL,3,'681-PCP-05','5CD1386V17','8 Go','2022-03-02',NULL,NULL,'681-PCP-05',11),(80,119,NULL,NULL,NULL,3,'541-PCP-041','5CD2051SB5','8Go','2022-05-31',NULL,NULL,'541-PCP-041',6),(81,119,NULL,NULL,NULL,3,'541-PCP-042','5CD2051RZR','8Go','2022-05-31',NULL,NULL,'541-PCP-042',NULL),(82,119,NULL,NULL,NULL,3,'541-PCP-043','5CD2051S9S','8Go','2022-05-31',NULL,NULL,'541-PCP-043',NULL),(83,121,NULL,NULL,NULL,3,'100-PCP-001','0F015Z3220701J','8 Go','2022-05-30',NULL,NULL,'100-PCP-001',13),(84,122,NULL,NULL,NULL,18,'6811-PCF-07','8CC2160NG9',NULL,NULL,NULL,NULL,'6811-PCF-07',12);
/*!40000 ALTER TABLE `ordinateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordinateur_peripherique`
--

DROP TABLE IF EXISTS `ordinateur_peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordinateur_peripherique` (
  `ordinateur_id` int NOT NULL,
  `peripherique_id` int NOT NULL,
  PRIMARY KEY (`ordinateur_id`,`peripherique_id`),
  KEY `IDX_6767D66D828317CA` (`ordinateur_id`),
  KEY `IDX_6767D66D8AB40D6` (`peripherique_id`),
  CONSTRAINT `FK_6767D66D828317CA` FOREIGN KEY (`ordinateur_id`) REFERENCES `ordinateur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_6767D66D8AB40D6` FOREIGN KEY (`peripherique_id`) REFERENCES `peripherique` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordinateur_peripherique`
--

LOCK TABLES `ordinateur_peripherique` WRITE;
/*!40000 ALTER TABLE `ordinateur_peripherique` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordinateur_peripherique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordinateur_utilisateur`
--

DROP TABLE IF EXISTS `ordinateur_utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordinateur_utilisateur` (
  `ordinateur_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`ordinateur_id`,`utilisateur_id`),
  KEY `IDX_D2163E1E828317CA` (`ordinateur_id`),
  KEY `IDX_D2163E1EFB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_D2163E1E828317CA` FOREIGN KEY (`ordinateur_id`) REFERENCES `ordinateur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D2163E1EFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordinateur_utilisateur`
--

LOCK TABLES `ordinateur_utilisateur` WRITE;
/*!40000 ALTER TABLE `ordinateur_utilisateur` DISABLE KEYS */;
INSERT INTO `ordinateur_utilisateur` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(7,7),(8,22),(9,9),(11,11),(13,13),(14,14),(16,16),(17,17),(18,18),(19,19),(20,20),(23,23),(25,12),(29,10),(39,24),(59,6),(60,36),(62,35),(70,15),(71,21),(72,47),(74,36),(75,47),(75,48),(78,7),(80,49);
/*!40000 ALTER TABLE `ordinateur_utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ordinateur_view`
--

DROP TABLE IF EXISTS `ordinateur_view`;
/*!50001 DROP VIEW IF EXISTS `ordinateur_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ordinateur_view` (
  `id` tinyint NOT NULL,
  `modele` tinyint NOT NULL,
  `reference` tinyint NOT NULL,
  `serial_number` tinyint NOT NULL,
  `site` tinyint NOT NULL,
  `utilisateur` tinyint NOT NULL,
  `emplacement` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `peripherique`
--

DROP TABLE IF EXISTS `peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peripherique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_peripherique_id` int DEFAULT NULL,
  `modele_id` int DEFAULT NULL,
  `emplacement_id` int DEFAULT NULL,
  `reference` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `adresse_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFCF0365FF9FD4A2` (`type_peripherique_id`),
  KEY `IDX_CFCF0365AC14B70A` (`modele_id`),
  KEY `IDX_CFCF0365C4598A51` (`emplacement_id`),
  CONSTRAINT `FK_CFCF0365AC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`),
  CONSTRAINT `FK_CFCF0365C4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`),
  CONSTRAINT `FK_CFCF0365FF9FD4A2` FOREIGN KEY (`type_peripherique_id`) REFERENCES `type_peripherique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peripherique`
--

LOCK TABLES `peripherique` WRITE;
/*!40000 ALTER TABLE `peripherique` DISABLE KEYS */;
INSERT INTO `peripherique` VALUES (157,1,39,1,'541-CLA-011','/',NULL,NULL),(158,1,40,1,'541-CLA-002','/',NULL,NULL),(159,1,41,1,'541-CLA-004','/',NULL,NULL),(160,1,42,1,'541-CLA-005','/',NULL,NULL),(161,1,43,1,'541-CLA-006','/',NULL,NULL),(162,1,39,2,'541-CLA-010','/',NULL,NULL),(163,1,41,2,'541-CLA-001','/',NULL,NULL),(164,1,43,2,'541-CLA-012','/',NULL,NULL),(165,1,41,2,'541-CLA-013','/',NULL,NULL),(166,1,39,2,'541-CLA-014','/',NULL,NULL),(167,1,43,2,'541-CLA-015','/',NULL,NULL),(168,1,44,3,'541-CLA-016','/',NULL,NULL),(169,1,43,3,'541-CLA-017','/',NULL,NULL),(170,1,39,3,'541-CLA-018','/',NULL,NULL),(171,1,39,4,'541-CLA-019','/',NULL,NULL),(172,1,39,4,'541-CLA-020','/',NULL,NULL),(173,1,39,4,'541-CLA-021','/',NULL,NULL),(174,1,44,5,'541-CLA-022','/',NULL,NULL),(175,1,39,5,'541-CLA-023','/',NULL,NULL),(176,1,40,5,'541-CLA-024','/',NULL,NULL),(177,1,39,5,'541-CLA-025','/',NULL,NULL),(178,1,43,14,'541-CLA-026','/',NULL,NULL),(179,1,40,7,'681-CLA-003','/',NULL,NULL),(180,1,43,8,'570-CLA-001','/',NULL,NULL),(181,1,44,8,'570-CLA-002','/',NULL,NULL),(182,1,40,8,'570-CLA-003','/',NULL,NULL),(183,1,40,8,'570-CLA-004','/',NULL,NULL),(184,1,45,8,'570-CLA-005','/',NULL,NULL),(185,1,55,9,'904-CLA-001','/',NULL,NULL),(186,1,40,9,'904-CLA-002','/',NULL,NULL),(187,1,39,10,'680-CLA-002','/',NULL,NULL),(188,1,39,10,'680-CLA-003','/',NULL,NULL),(189,1,47,10,'680-CLA-004','/',NULL,NULL),(190,1,40,10,'680-CLA-005','/',NULL,NULL),(191,1,40,11,'681-CLA-001','/',NULL,NULL),(192,1,40,11,'681-CLA-002','/',NULL,NULL),(193,1,48,12,'6811-CLA-001','/',NULL,NULL),(194,1,48,12,'6811-CLA-002','/',NULL,NULL),(195,1,55,12,'6811-CLA-003','/',NULL,NULL),(196,1,41,12,'6811-CLA-004','/',NULL,NULL),(197,1,49,12,'6811-CLA-005','/',NULL,NULL),(198,1,50,12,'6811-CLA-006','/',NULL,NULL),(199,1,55,13,'100-CLA-001','/',NULL,NULL),(200,1,41,13,'100-CLA-002','/',NULL,NULL),(201,1,43,13,'100-CLA-003','/',NULL,NULL),(202,1,39,13,'100-CLA-004','/',NULL,NULL),(203,2,56,1,'541-SOU-011','/',NULL,NULL),(204,2,56,1,'541-SOU-002','/',NULL,NULL),(205,2,57,1,'541-SOU-004','/',NULL,NULL),(206,2,56,1,'541-SOU-005','/',NULL,NULL),(207,2,58,1,'541-SOU-006','/',NULL,NULL),(208,2,59,2,'541-SOU-010','/',NULL,NULL),(209,2,60,2,'541-SOU-001','/',NULL,NULL),(210,2,58,2,'541-SOU-012','/',NULL,NULL),(211,2,59,2,'541-SOU-013','/',NULL,NULL),(212,2,59,2,'541-SOU-014','/',NULL,NULL),(213,2,58,2,'541-SOU-015','/',NULL,NULL),(214,2,60,3,'541-SOU-016','/',NULL,NULL),(215,2,58,3,'541-SOU-017','/',NULL,NULL),(216,2,60,3,'541-SOU-018','/',NULL,NULL),(217,2,56,4,'541-SOU-019','/',NULL,NULL),(218,2,56,4,'541-SOU-020','/',NULL,NULL),(219,2,60,4,'541-SOU-021','/',NULL,NULL),(220,2,61,5,'541-SOU-022','/',NULL,NULL),(221,2,60,5,'541-SOU-023','/',NULL,NULL),(222,2,60,5,'541-SOU-024','/',NULL,NULL),(223,2,60,5,'541-SOU-025','/',NULL,NULL),(224,2,58,14,'541-SOU-026','/',NULL,NULL),(225,2,56,7,'681-SOU-003','/',NULL,NULL),(226,2,60,8,'570-SOU-001','/',NULL,NULL),(227,2,59,8,'570-SOU-002','/',NULL,NULL),(228,2,56,8,'570-SOU-003','/',NULL,NULL),(229,2,62,8,'570-SOU-004','/',NULL,NULL),(230,2,56,8,'570-SOU-005','/',NULL,NULL),(231,2,63,9,'904-SOU-001','/',NULL,NULL),(232,2,58,9,'904-SOU-002','/',NULL,NULL),(233,2,60,10,'680-SOU-002','/',NULL,NULL),(234,2,64,10,'680-SOU-003','/',NULL,NULL),(235,2,56,10,'680-SOU-004','/',NULL,NULL),(236,2,65,10,'680-SOU-005','/',NULL,NULL),(237,2,58,10,'680-SOU-001','/',NULL,NULL),(238,2,66,11,'681-SOU-001','/',NULL,NULL),(239,2,56,11,'681-SOU-002','/',NULL,NULL),(240,2,58,12,'6811-SOU-001','/',NULL,NULL),(241,2,58,12,'6811-SOU-002','/',NULL,NULL),(242,2,63,12,'6811-SOU-003','/',NULL,NULL),(243,2,56,12,'6811-SOU-004','/',NULL,NULL),(244,2,67,12,'6811-SOU-005','/',NULL,NULL),(245,2,68,12,'6811-SOU-006','/',NULL,NULL),(246,2,58,13,'100-SOU-001','/',NULL,NULL),(247,2,57,13,'100-SOU-002','/',NULL,NULL),(248,2,58,13,'100-SOU-003','/',NULL,NULL),(249,2,59,13,'100-SOU-004','/',NULL,NULL),(250,3,69,1,'541-ECR-011','/',NULL,NULL),(251,3,70,1,'541-ECR-027','/',NULL,NULL),(252,3,71,1,'541-ECR-004','/',NULL,NULL),(253,3,72,1,'541-ECR-005','/',NULL,NULL),(254,3,73,1,'541-ECR-006','/',NULL,NULL),(255,3,71,2,'541-ECR-010','/',NULL,NULL),(256,3,74,2,'541-ECR-001','/',NULL,NULL),(257,3,75,2,'541-ECR-013','/',NULL,NULL),(258,3,76,2,'541-ECR-014','/',NULL,NULL),(259,3,73,2,'541-ECR-015','/',NULL,NULL),(260,3,77,3,'541-ECR-016','/',NULL,NULL),(261,3,73,3,'541-ECR-017','/',NULL,NULL),(262,3,71,3,'541-ECR-018','/',NULL,NULL),(263,3,78,4,'541-ECR-019','/',NULL,NULL),(264,3,79,4,'541-ECR-002','/',NULL,NULL),(265,3,80,4,'541-ECR-046','/',NULL,NULL),(266,3,81,4,'541-ECR-021','/',NULL,NULL),(267,3,82,4,'541-ECR-047','/',NULL,NULL),(268,3,83,5,'541-ECR-022','/',NULL,NULL),(269,3,84,5,'541-ECR-048','/',NULL,NULL),(270,3,71,5,'541-ECR-023','/',NULL,NULL),(271,3,85,5,'541-ECR-024','/',NULL,NULL),(272,3,85,5,'541-ECR-025','/',NULL,NULL),(273,3,86,14,'541-ECR-026','/',NULL,NULL),(274,3,87,7,'681-ECR-003','/',NULL,NULL),(275,3,88,8,'570-ECR-001','/',NULL,NULL),(276,3,89,8,'570-ECR-003','/',NULL,NULL),(277,3,90,8,'570-ECR-004','/',NULL,NULL),(278,3,91,8,'570-ECR-005','/',NULL,NULL),(279,3,92,8,'570-ECR-025','/',NULL,NULL),(280,3,93,9,'904-ECR-001','/',NULL,NULL),(281,3,94,9,'904-ECR-002','/',NULL,NULL),(282,3,73,9,'904-ECR-003','/',NULL,NULL),(283,3,95,10,'680-ECR-001','/',NULL,NULL),(284,3,96,10,'680-ECR-021','/',NULL,NULL),(285,3,95,10,'680-ECR-002','/',NULL,NULL),(286,3,97,10,'680-ECR-022','/',NULL,NULL),(287,3,98,10,'680-ECR-003','/',NULL,NULL),(288,3,99,10,'680-ECR-023','/',NULL,NULL),(289,3,100,10,'680-ECR-004','/',NULL,NULL),(290,3,101,11,'681-ECR-001','/',NULL,NULL),(291,3,101,11,'681-ECR-002','/',NULL,NULL),(292,3,102,12,'6811-ECR-001','/',NULL,NULL),(293,3,73,12,'6811-ECR-002','/',NULL,NULL),(294,3,103,12,'6811-ECR-003','/',NULL,NULL),(295,3,104,12,'6811-ECR-023','/',NULL,NULL),(296,3,105,12,'6811-ECR-004','/',NULL,NULL),(297,3,106,12,'6811-ECR-024','/',NULL,NULL),(298,3,107,12,'6811-ECR-005','/',NULL,NULL),(299,3,108,12,'6811-ECR-006','/',NULL,NULL),(300,3,109,13,'100-ECR-001','/',NULL,NULL),(301,3,110,13,'100-ECR-002','/',NULL,NULL),(302,1,111,7,'541-CLA-027','/',NULL,NULL),(303,1,111,7,'541-CLA-028','/',NULL,NULL),(304,1,111,7,'541-CLA-029','/',NULL,NULL),(305,1,111,7,'541-CLA-030','/',NULL,NULL),(306,1,111,7,'541-CLA-031','/',NULL,NULL),(307,1,111,7,'541-CLA-032','/',NULL,NULL),(308,2,111,7,'541-SOU-027','/',NULL,NULL),(309,2,111,7,'541-SOU-028','/',NULL,NULL),(310,2,111,7,'541-SOU-029','/',NULL,NULL),(311,2,111,7,'541-SOU-030','/',NULL,NULL),(312,2,111,7,'541-SOU-031','/',NULL,NULL),(313,2,111,7,'541-SOU-032','/',NULL,NULL),(314,3,112,7,'541-ECR-020','/',NULL,NULL),(315,4,113,8,'','7G123180H',NULL,NULL),(316,4,90,10,'680-STA-004','31088565151H0198',NULL,NULL),(317,4,114,1,'541-STA-011','/',NULL,NULL),(318,4,113,1,'541-STA-002','6G029190H',NULL,NULL),(319,4,113,1,'541-STA-004','3G035419H',NULL,NULL),(320,4,114,1,'541-STA-005','5CG916ZWJ8',NULL,NULL),(321,3,118,11,'681-ECR-004','CN404722TJ',NULL,NULL),(322,3,118,11,'681-ECR-005','CN404722TK',NULL,NULL),(323,NULL,118,9,'904-ECR-004','CN404723F3',NULL,NULL),(324,3,118,9,'904-ECR-005','CN404722T7',NULL,NULL),(325,3,118,8,'570-ECR-006','CN404722S7',NULL,NULL),(326,3,118,8,'570-ECR-007','CN404722SP',NULL,NULL),(327,3,118,8,'570-ECR-008','CN404722TD',NULL,NULL),(328,3,118,8,'570-ECR-009','CN404722T5',NULL,NULL),(329,3,118,8,'570-ECR-010','CN404722ST',NULL,NULL),(330,3,74,5,'541-ECR-049','1184JMA00481','<div>T√©l√©travail R√©sa</div>',NULL),(331,3,74,5,'541-ECR-050','11845JMA00399','<div>Ecran t√©l√©travail</div>',NULL),(332,4,120,9,'910-STA-001','5CG150WTFM',NULL,NULL),(333,4,120,7,'541-STA-012','5CG150WTBD',NULL,NULL);
/*!40000 ALTER TABLE `peripherique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processeur`
--

DROP TABLE IF EXISTS `processeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `processeur` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processeur`
--

LOCK TABLES `processeur` WRITE;
/*!40000 ALTER TABLE `processeur` DISABLE KEYS */;
INSERT INTO `processeur` VALUES (1,'I5'),(2,'/'),(3,'CELERON G3900T'),(4,'INTEL CELERON'),(5,'I5-6200'),(6,'XEON E3 1225'),(7,'I3-9100'),(8,'INTEL XEON'),(9,'I5-4210M'),(10,'CELERON'),(11,'INTEL CORE 2 DUO'),(12,'Pentium dual core'),(13,'I5 6200'),(14,'I5-6500'),(15,'I5 7500'),(16,'I5 431'),(17,'Pentium'),(18,'I5 6400'),(19,'Intel Pentium'),(20,'I3-4160'),(21,'I5-10210U'),(22,'AMD A6 9500E RADEON R5'),(23,'I3-3240'),(24,'AMD Athlon II'),(25,'I5-6400'),(26,'I7-4700'),(27,'I3-2100'),(28,'AMD RYZEN 5 PRO 4650GE');
/*!40000 ALTER TABLE `processeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emplacement_id` int DEFAULT NULL,
  `service` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E19D9AD2C4598A51` (`emplacement_id`),
  CONSTRAINT `FK_E19D9AD2C4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,1,'CODIR-HEILLECOURT'),(2,2,'COMPTA-HEILLECOURT'),(3,3,'PAIE-HEILLECOURT'),(4,4,'EXPLOIT NANCY-HEILLECOURT'),(5,5,'RESA-HEILLECOURT'),(6,6,'GESTION PARC-HEILLECOURT'),(7,7,'NR-HEILLECOURT'),(8,8,'NR-METZ'),(9,9,'NR-BELFORT'),(10,10,'NR-COLMAR'),(11,11,'NR-PFASTATT'),(12,12,'NR-BOOS'),(13,13,'NR-TROYES');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `type_session` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varbinary(256) DEFAULT NULL,
  `type_compte_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D044D5D4FB88E14F` (`utilisateur_id`),
  KEY `IDX_D044D5D446032730` (`type_compte_id`),
  CONSTRAINT `FK_D044D5D446032730` FOREIGN KEY (`type_compte_id`) REFERENCES `type_session` (`id`),
  CONSTRAINT `FK_D044D5D4FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (1,NULL,NULL,'/','/',NULL),(2,3,NULL,'admin','Sis1ywGIP!',NULL),(3,3,NULL,'admin','/',NULL),(4,7,NULL,'jtorlotin@gihpadmin.local','GIHP@JT',NULL),(5,8,NULL,'compta','GIHP@compta',NULL),(6,10,NULL,'Christian','/',NULL),(7,12,NULL,'RH01','/',NULL),(8,13,NULL,'admin','2LiAd2TT',NULL),(9,14,NULL,'salem','2LiAd2TT',NULL),(10,15,NULL,'/','Mamon',NULL),(11,1,NULL,'hp','m»Î(*‘r4à˙Ê9(p}\nˇå\nßXŒ’”=m\nÄ∏´\ZòB™(f;Gt3Áß∂ÅI¡Òß-Œø\n¢)é„òπ…k¯å¬Ç—Ω&w:\\x	/@ﬁ˜ERÚ–\rƒ„≠Œ≥Ä`‹≠(Çk|æèÜ| ﬂò.√3‡V òÍz∆±ïÿ&cˆÅÃ9œ\n?±í∞µuéç3ù√]˚ÓÛ“f∏ı2Œ{§1·õho–1èΩ#óò∞ÄÒéıßÍiRÛÛ´¯gR·ò∑<ïLË+\Z$àò /cã°]‹{.hjYnö9}áã•±:#*¯Itã±…Nﬁ‚U\'õ◊Ÿ1S',NULL),(12,NULL,NULL,'transp4','/',NULL),(13,NULL,NULL,'user','/',NULL),(14,NULL,NULL,'/','GIHP@lm',NULL),(15,NULL,NULL,'compta01','GIHP@gpt01',NULL),(16,12,NULL,'mparisot','PARIS@mp',NULL),(17,NULL,NULL,'rh03','GIHP@rh03',NULL),(18,NULL,NULL,'assistant rh','GISP@assistantrh',NULL),(19,NULL,NULL,'Gihp3','/',NULL),(20,NULL,NULL,'ORDI1','/',NULL),(21,NULL,NULL,'Lenovo','/',NULL),(22,NULL,NULL,'Brigitte','/',NULL),(23,NULL,NULL,'SOS BOOS','/',NULL),(24,NULL,NULL,'ALAIN','/',NULL),(25,NULL,NULL,'Yudi','/',NULL),(26,NULL,NULL,'test','/',NULL),(27,NULL,NULL,'yadicuba','/',NULL),(28,NULL,NULL,'ATS','/',NULL);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `site` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_694309E419EB6921` (`client_id`),
  CONSTRAINT `FK_694309E419EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (1,1,'HEILLECOURT','NR',NULL,NULL),(2,1,'METZ','NR',NULL,NULL),(3,1,'BELFORT','NR',NULL,NULL),(4,1,'COLMAR','NR',NULL,NULL),(5,1,'PFASTATT','NR',NULL,NULL),(6,1,'BOOS','NR',NULL,NULL),(7,1,'TROYES','NR',NULL,NULL);
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systeme`
--

DROP TABLE IF EXISTS `systeme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systeme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `systeme` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systeme`
--

LOCK TABLES `systeme` WRITE;
/*!40000 ALTER TABLE `systeme` DISABLE KEYS */;
INSERT INTO `systeme` VALUES (1,'WINDOWS 10 1909'),(2,'WINDOWS 10 2004'),(3,'WINDOWS 10'),(4,'WINDOWS 7'),(5,'WINDOWS 7 6.1 SP1'),(6,'WINDOWS 7 SP1'),(7,'WINDOWS 8 6.3 (9600)'),(8,'WINDOWS 10 1703'),(9,'WINDOWS 8 6.3'),(10,'WINDOWS 10 2019'),(11,'WINDOWS 10 1903'),(12,'WINDOWS XP SP3'),(13,'Windows 10 famille'),(14,'Windows 10 famille 1809'),(15,'Windows 10 famille 1903'),(16,'Windows 10 famille 2004'),(17,'WINDOWS 10 PRO'),(18,'WINDOWS 11 PRO');
/*!40000 ALTER TABLE `systeme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_courrier`
--

DROP TABLE IF EXISTS `type_courrier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_courrier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_serveur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_courrier`
--

LOCK TABLES `type_courrier` WRITE;
/*!40000 ALTER TABLE `type_courrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_courrier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_ordinateur`
--

DROP TABLE IF EXISTS `type_ordinateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_ordinateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_ordinateur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abr` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_ordinateur`
--

LOCK TABLES `type_ordinateur` WRITE;
/*!40000 ALTER TABLE `type_ordinateur` DISABLE KEYS */;
INSERT INTO `type_ordinateur` VALUES (1,'PORTABLE','PCP'),(2,'FIXE','PCF'),(3,'SERVEUR','SRV');
/*!40000 ALTER TABLE `type_ordinateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_peripherique`
--

DROP TABLE IF EXISTS `type_peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_peripherique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_peripherique` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_peripherique`
--

LOCK TABLES `type_peripherique` WRITE;
/*!40000 ALTER TABLE `type_peripherique` DISABLE KEYS */;
INSERT INTO `type_peripherique` VALUES (1,'CLAVIER'),(2,'SOURIS'),(3,'ECRAN'),(4,'STATION_ACCUEIL'),(5,'CASQUE');
/*!40000 ALTER TABLE `type_peripherique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_session`
--

DROP TABLE IF EXISTS `type_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_session`
--

LOCK TABLES `type_session` WRITE;
/*!40000 ALTER TABLE `type_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fonction_id` int DEFAULT NULL,
  `emplacement_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portable` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B357889920` (`fonction_id`),
  KEY `IDX_1D1C63B3C4598A51` (`emplacement_id`),
  KEY `IDX_1D1C63B3ED5CA9E6` (`service_id`),
  CONSTRAINT `FK_1D1C63B357889920` FOREIGN KEY (`fonction_id`) REFERENCES `fonction` (`id`),
  CONSTRAINT `FK_1D1C63B3C4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`),
  CONSTRAINT `FK_1D1C63B3ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,NULL,1,1,'HUREAU','Philippe',NULL,NULL),(2,NULL,1,1,'MECHE','Laurence',NULL,NULL),(3,NULL,1,1,'CHAFFAUT','J√©r√¥me','03.83.51.10.20',NULL),(4,NULL,1,1,'WAUTHIER','Alexandra',NULL,NULL),(5,NULL,1,1,'MUR','Philippe',NULL,NULL),(6,NULL,1,1,'DAUB','Olivier',NULL,'06.87.80.20.17'),(7,NULL,2,2,'TORLOTIN','Joris',NULL,NULL),(8,NULL,2,2,'COLIN','Anne',NULL,NULL),(9,NULL,2,2,'CHABOD','Sandrine',NULL,NULL),(10,NULL,7,3,'CHAILLOU','Christophe',NULL,NULL),(11,NULL,2,3,'MARLY','Laurence',NULL,NULL),(12,NULL,3,3,'PARISOT','Maryl√®ne',NULL,NULL),(13,NULL,4,4,'GRANVILLE','Eddy',NULL,NULL),(14,NULL,4,4,'MASSON','David',NULL,NULL),(15,NULL,4,4,'LAM','Manon',NULL,NULL),(16,NULL,5,5,'GILBERT','G√©rald',NULL,NULL),(17,NULL,5,5,'LAM','Mathias',NULL,NULL),(18,NULL,5,5,'MATHIEU','Jean Philippe',NULL,NULL),(19,NULL,5,5,'RUCKERT','Michel',NULL,NULL),(20,NULL,4,4,'NEBIGH','Nadia','03.83.51.10.20',NULL),(21,NULL,6,6,'BELKESSA','Salem',NULL,NULL),(22,NULL,11,7,'FRENZEL','Christian',NULL,NULL),(23,NULL,7,7,'NON-ATTRIBUE','NA',NULL,NULL),(24,NULL,8,8,'MORDACCI','Patrice',NULL,NULL),(25,NULL,7,8,'MAYOUI','Laura',NULL,NULL),(26,NULL,8,8,'CAROLE','Salen',NULL,NULL),(27,NULL,8,8,'GRATZ','Isabelle',NULL,NULL),(28,NULL,8,8,'CONTAL','Mickael',NULL,NULL),(29,NULL,9,9,'FERRAZ','Laura',NULL,NULL),(30,NULL,9,9,'MICHAUD','St√©phane',NULL,NULL),(31,NULL,10,10,'LUDWIG','Johanna',NULL,NULL),(32,NULL,10,10,'SCHNEIDER','Catherine',NULL,NULL),(33,NULL,10,10,'BLEU','Ren√©',NULL,NULL),(34,NULL,7,10,'NON-ATTRIBUE','NA',NULL,NULL),(35,NULL,11,11,'GEBHARDT','Tiphanie',NULL,NULL),(36,NULL,11,11,'RIETH','Gabrielle',NULL,NULL),(37,NULL,12,12,'Kioske','/',NULL,NULL),(38,NULL,12,12,'BOOS','David',NULL,NULL),(39,NULL,12,12,'IRE','Alain Didier',NULL,NULL),(40,NULL,12,12,'BOUKERNE','FARIS',NULL,NULL),(41,NULL,12,12,'BIEHLER','Nicole',NULL,NULL),(42,NULL,12,12,'MARK','Gwenaelle',NULL,NULL),(43,NULL,13,13,'CLEMENTE','Yudel',NULL,NULL),(44,NULL,13,13,'CHAUFFEUR','/',NULL,NULL),(45,NULL,13,13,'RODRIGUEZ','Patricia',NULL,NULL),(47,NULL,3,NULL,'RENFORT','PAIE',NULL,NULL),(48,NULL,7,NULL,'RENFORT','RH',NULL,NULL),(49,NULL,6,NULL,'BELKESSA','Abdelkader',NULL,NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `utilisateur_view`
--

DROP TABLE IF EXISTS `utilisateur_view`;
/*!50001 DROP VIEW IF EXISTS `utilisateur_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `utilisateur_view` (
  `id` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `prenom` tinyint NOT NULL,
  `site` tinyint NOT NULL,
  `emplacement` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `vpn`
--

DROP TABLE IF EXISTS `vpn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vpn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `identifiant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varbinary(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2A08F859FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_2A08F859FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vpn`
--

LOCK TABLES `vpn` WRITE;
/*!40000 ALTER TABLE `vpn` DISABLE KEYS */;
/*!40000 ALTER TABLE `vpn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `ordinateur_view`
--

/*!50001 DROP TABLE IF EXISTS `ordinateur_view`*/;
/*!50001 DROP VIEW IF EXISTS `ordinateur_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ordinateur_view` AS select `ordinateur`.`id` AS `id`,`ordinateur`.`modele_id` AS `modele`,`ordinateur`.`reference` AS `reference`,`ordinateur`.`serial_number` AS `serial_number`,`emplacement`.`site_id` AS `site`,`ordinateur_utilisateur`.`utilisateur_id` AS `utilisateur`,`ordinateur`.`emplacement_id` AS `emplacement` from ((`ordinateur` join `emplacement` on((`ordinateur`.`emplacement_id` = `emplacement`.`id`))) left join `ordinateur_utilisateur` on((`ordinateur`.`id` = `ordinateur_utilisateur`.`ordinateur_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `utilisateur_view`
--

/*!50001 DROP TABLE IF EXISTS `utilisateur_view`*/;
/*!50001 DROP VIEW IF EXISTS `utilisateur_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `utilisateur_view` AS select `utilisateur`.`id` AS `id`,`utilisateur`.`nom` AS `nom`,`utilisateur`.`prenom` AS `prenom`,`emplacement`.`site_id` AS `site`,`emplacement`.`id` AS `emplacement` from (`utilisateur` join `emplacement` on((`utilisateur`.`emplacement_id` = `emplacement`.`id`))) */;
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

-- Dump completed on 2022-07-04 11:10:34
