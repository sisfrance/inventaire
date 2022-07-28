-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: inventaire
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'GIHP');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courrier`
--

DROP TABLE IF EXISTS `courrier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courrier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serveur_entrant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `securite` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_sortant` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courrier`
--

LOCK TABLES `courrier` WRITE;
/*!40000 ALTER TABLE `courrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `courrier` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emplacement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_id` int DEFAULT NULL,
  `emplacement` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C0CF65F6F6BD1646` (`site_id`),
  CONSTRAINT `FK_C0CF65F6F6BD1646` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplacement`
--

LOCK TABLES `emplacement` WRITE;
/*!40000 ALTER TABLE `emplacement` DISABLE KEYS */;
INSERT INTO `emplacement` VALUES (1,1,'CODIR-HEILLECOURT'),(2,1,'COMPTA-HEILLECOURT'),(3,1,'PAIE-HEILLECOURT'),(4,1,'EXPLOIT NANCY-HEILLECOURT'),(5,1,'RESA-HEILLECOURT'),(6,1,'GESTION PARC-HEILLECOURT'),(7,1,'NR-HEILLECOURT'),(8,2,'NR-METZ'),(9,3,'NR-BELFORT'),(10,4,'NR-COLMAR'),(11,5,'NR-PFASTATT'),(12,6,'NR-BOOS'),(13,7,'NR-TROYES');
/*!40000 ALTER TABLE `emplacement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fonction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fonction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fournisseur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fournisseur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'JCD54/SIS','NR',NULL,NULL,NULL,NULL),(2,'ACF Gestion','NR',NULL,NULL,NULL,NULL),(3,'ISATAD','NR',NULL,NULL,NULL,NULL),(4,'SIS','NR',NULL,NULL,NULL,NULL),(5,'/','NR',NULL,NULL,NULL,NULL),(6,'TIRESIAS ???','NR',NULL,NULL,NULL,NULL),(7,'Comunic Colmar','NR',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_support` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_support` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (1,'HP',NULL,NULL),(2,'TOSHIBA',NULL,NULL),(3,'ANTEC',NULL,NULL),(4,'DELL',NULL,NULL),(5,'CHIEFTEC',NULL,NULL),(6,'/',NULL,NULL),(7,'Fujitsu',NULL,NULL),(8,'TACENS',NULL,NULL),(9,'ASUS',NULL,NULL),(10,'Lenovo',NULL,NULL),(11,'Compaq',NULL,NULL),(12,'GIGABYTE',NULL,NULL);
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque_id` int DEFAULT NULL,
  `modele` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_100285584827B9B2` (`marque_id`),
  CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` VALUES (1,1,'ELITEBOOK X360'),(2,1,'ProBOOK 650 G5'),(3,1,'650 G5'),(4,2,'PORTEGE Z30'),(5,1,'HP ProDesk 400 G2'),(6,2,'Satellite Pro Céléron'),(7,2,'TECRA A50'),(8,2,'Tecra A50-C-1ZV'),(9,1,'WORKSTATION Z220'),(10,3,'Transfert ISATAD'),(11,1,'PRODESK 400 (Mehmet)'),(12,1,'PRO DESK'),(13,4,'poste personnalisé'),(14,1,'PRO 3400 MT'),(15,2,'PORTEGE R30-A-19P'),(16,1,'PRODESK 490 G1'),(17,1,'Elite 7200'),(18,2,'Satellite Pro R50-C-121'),(19,1,'ProBook 4510s'),(20,5,'CHIEFTEC'),(21,6,'/'),(22,2,'Tecra A50-C-1QG'),(23,4,'OptiPlex 5040'),(24,1,'PRO DESK 600'),(25,4,'Latitude E5540'),(26,4,'Vostro 230'),(27,4,'Dimension 3100/E310'),(28,7,'ESPRIMO P420'),(29,8,'signum2'),(30,9,'zenbook'),(31,10,'only one'),(32,9,'DESKTOP'),(33,11,'Compaq'),(34,12,'GIGABYTE'),(35,1,'ENVY 17'),(36,9,'ASUStek computer');
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `office` (
  `id` int NOT NULL AUTO_INCREMENT,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clé` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compte_office` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordinateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modele_id` int DEFAULT NULL,
  `type_ordinateur_id` int DEFAULT NULL,
  `processeur_id` int DEFAULT NULL,
  `fournisseur_id` int DEFAULT NULL,
  `systeme_id` int DEFAULT NULL,
  `reference` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memoire` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `adresse_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordinateur`
--

LOCK TABLES `ordinateur` WRITE;
/*!40000 ALTER TABLE `ordinateur` DISABLE KEYS */;
INSERT INTO `ordinateur` VALUES (1,1,1,1,1,1,'541-PCP-011','5CG92568FD','8 Go','2019-10-28',NULL,NULL,'HP-GIHP-03',1),(2,2,1,1,1,2,'541-PCP-031','5CG0384938','8 Go','2020-11-16',NULL,NULL,'HP-GIHP-07',1),(3,2,1,1,1,2,'541-PCP-028','5CG012BFNM','8 Go','2020-11-16',NULL,NULL,'HP-GIHP04',1),(4,2,1,1,1,2,'541-PCP-029','5CG012BFPC','8 Go','2020-11-16',NULL,NULL,'HP-GIHP-06',1),(5,3,1,1,1,1,'541-PCP-005','5CG9392328','8 Go','2019-10-28',NULL,NULL,'HP-GIHP-02',1),(6,4,1,2,1,1,'541-PCP-006','/','/','2015-09-22',NULL,NULL,'/',1),(7,5,2,3,1,3,'541-PCF-010','CZC6157XK4','8 Go','2017-04-05',NULL,NULL,'JTORLOTIN',2),(8,6,1,4,1,4,'541-PCP-012','YF023552H','4 Go','2016-09-12',NULL,NULL,'TOSHIBA-FRENZEL',2),(9,7,1,1,1,5,'541-PCP-003','6G029167H','8 Go','2016-07-26',NULL,NULL,'PORT02',2),(10,8,1,5,1,3,'681-PCP-03','4J154436H','8 Go','2018-06-13',NULL,NULL,'CFRENZEL',3),(11,2,1,1,1,2,'541-PCP-030','5CG012BH59','8 Go','2020-11-16',NULL,NULL,'HP-GIHP05',3),(12,7,1,1,1,5,'541-PCP-004','8G143357H','8 Go','2017-02-08',NULL,NULL,'SDONADINI',3),(13,9,2,6,2,6,'541-PCF-019','CZC2463BF3','24 Go','2012-11-30',NULL,NULL,'EDDY',4),(14,10,2,1,3,7,'541-PCF-020','Poste personnalisé','8 Go','2016-04-21',NULL,NULL,'PCREGUL4',4),(15,11,2,1,1,5,'541-PCF-021','CZC525OKVH','8 Go','2015-09-04',NULL,NULL,'FIXETRANSP01',4),(16,12,2,3,1,1,'541-PCF-022','CZC6157XMS','8 Go','2017-02-28',NULL,NULL,'FIXETRANSP08',5),(17,12,2,4,1,8,'541-PCF-023','CZC6157XJB','8 Go','2017-05-15',NULL,NULL,'TRANSP1',5),(18,12,2,7,4,2,'541-PCF-026','8CC03807BC','8 Go','2020-09-24',NULL,NULL,'ACCUEIL',5),(19,12,2,4,1,2,'541-PCF-025','CZC61557XML','8 Go','2019-02-27',NULL,NULL,'ACCUEIL04',5),(20,2,1,1,1,2,'541-PCP-028','5CG03448TM','8 Go','2020-11-16',NULL,NULL,'/',4),(21,9,2,8,2,5,'541-PCF-026','CZC2463BDX','4 Go','2012-11-30',NULL,NULL,'GPARC',6),(22,2,1,1,5,3,'541-PCP-027','5CG03848V1','8 Go','1970-01-01',NULL,NULL,'541-PCP-027',7),(23,13,2,8,6,5,'541-PCF-024','BXDB4J','8 Go','1970-01-01',NULL,NULL,'ACCUEIL',7),(24,14,2,1,2,5,'541-PCF-013','CZC2020433','4 Go','2012-01-26',NULL,NULL,'Admin07',7),(25,7,1,1,1,5,'541-PCP-004','8G143357H','8 Go','2017-02-08',NULL,NULL,'SDONADINI',7),(26,6,1,4,1,5,'541-PCP-015','YF023521H','4 Go','2016-09-12',NULL,NULL,'REFTRANSP006',7),(27,7,1,1,1,5,'541-PCP-002','6G029190H','8 Go','2016-07-26',NULL,NULL,'PORT03',7),(28,15,1,9,5,3,'/','6F042087H','4 Go','1970-01-01',NULL,NULL,'/',7),(29,8,1,5,1,2,'681-PCP-03','4J154436H','8 Go','2018-06-13',NULL,NULL,'CFRENZEL',7),(30,10,2,1,3,7,'541-PCF-001','8A19AG08','8 Go','2016-04-21',NULL,NULL,'pc-compta01',7),(31,16,2,1,2,9,'541-PCF-014','CZC40752TG','8 Go','2014-03-12',NULL,NULL,'HP PRO490',7),(32,17,2,1,2,5,'541-PCF-016','CZC1128P9M','4 Go','2011-07-15',NULL,NULL,'ADMIN14',7),(33,6,1,4,1,5,'541-PCP-017','4G079771H','4 Go','2016-09-12',NULL,NULL,'REFTRANSP05',7),(34,6,1,4,1,5,'541-PCP-018','4G079797H','4 Go','2016-09-12',NULL,NULL,'PORT54_RH_02',7),(35,18,1,10,5,5,'570-PCP-001','YF023527H','4 Go','1970-01-01',NULL,NULL,'PORT57_REF01',8),(36,19,1,11,5,5,'570-PCP-002','CNU011445M','4 Go','1970-01-01',NULL,NULL,'GIHPMETZ-PC',8),(37,20,1,12,5,5,'570-PCP-003','MD0212100833','4 Go','1970-01-01',NULL,NULL,'POSTE1',8),(38,21,1,2,5,3,'570-PCP-004','/','8 Go','1970-01-01',NULL,NULL,'PC PERSO',8),(39,22,1,13,1,5,'570-PCP-005','7G123180H','8 Go','2017-02-08',NULL,NULL,'PORT-METZ-01',8),(40,18,1,4,5,5,'904-PCP-001','YF023481H','4 Go','1970-01-01',NULL,NULL,'RESPTRANSP01',9),(41,23,2,14,5,10,'904-PCF-002','9JKLSM2','8 Go','1970-01-01',NULL,NULL,'DESKTOP-R7FTVBG',9),(42,24,2,15,5,11,'680-PCF-001','8CG937397X','8 Go','2019-11-26',NULL,NULL,'GIHPCOLM-01',10),(43,24,2,15,5,11,'680-PCF-002','8CG937397P','8 Go','2019-11-26',NULL,NULL,'GIHPCOLM-02',10),(44,25,2,16,7,5,'680-PCF-003','51XJK12','8 Go','2015-08-01',NULL,NULL,'dell-bleurene',10),(45,26,2,17,5,5,'680-PCF-004','J4PNZ4J','3 Go','1970-01-01',NULL,NULL,'PLANNING',10),(46,21,2,18,5,9,'680-PCF-005','PC config personnalisé','8 Go','1970-01-01',NULL,NULL,'PC-RESA2',10),(47,27,2,19,5,12,'681-PCF-01','J2KRX1J','1 Go','1970-01-01',NULL,NULL,'Plan3',11),(48,28,2,20,5,1,'681-PCF-02','YLTH456565','4 Go','1970-01-01',NULL,NULL,'GIHP-3',11),(49,29,2,1,5,5,'6811-PCF-01','PC personnalisé','4 Go','1970-01-01',NULL,NULL,'USER-PC',12),(50,30,1,21,5,13,'6811-PCP-02','KAN0CV16520244F','8 Go','2019-12-01',NULL,NULL,'LAPTOP-ENO0VJSB',12),(51,31,2,22,5,14,'6811-PCF-03','MP1FA7GS','4 Go','1970-01-01',NULL,NULL,'DESKTOP-F5PPIEI',12),(52,32,2,23,5,15,'6811-PCF-04','E1PDCG0010YZ','4 Go','1970-01-01',NULL,NULL,'PC-BB',12),(53,33,2,24,5,16,'6811-PCF-05','CZC0330NM0','2 Go','1970-01-01',NULL,NULL,'SOSBOOS',12),(54,33,2,24,5,15,'6811-PCF-06','CZC101GR08','2 Go','1970-01-01',NULL,NULL,'CLUBMED1',12),(55,21,2,25,5,2,'100-PCF-01','Poste personnalisé','8Go','1970-01-01',NULL,NULL,'DESKTOP-4NF8IKM',13),(56,34,2,25,5,1,'100-PCF-02','Poste personnalisé','8Go','1970-01-01',NULL,NULL,'DESKTOP-2K2DR51',13),(57,35,1,26,5,1,'100-PCP-03','5CG3291HBB','8Go','1970-01-01',NULL,NULL,'DESKTOP-QTDNP06',13),(58,36,2,27,5,2,'100-PCF-04','B7PEAS001049','4Go','1970-01-01',NULL,NULL,'ATS-PC',13);
/*!40000 ALTER TABLE `ordinateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordinateur_peripherique`
--

DROP TABLE IF EXISTS `ordinateur_peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40000 ALTER TABLE `ordinateur_utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peripherique`
--

DROP TABLE IF EXISTS `peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peripherique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_peripherique_id` int DEFAULT NULL,
  `modele_id` int DEFAULT NULL,
  `emplacement_id` int DEFAULT NULL,
  `reference` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `adresse_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFCF0365FF9FD4A2` (`type_peripherique_id`),
  KEY `IDX_CFCF0365AC14B70A` (`modele_id`),
  KEY `IDX_CFCF0365C4598A51` (`emplacement_id`),
  CONSTRAINT `FK_CFCF0365AC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`),
  CONSTRAINT `FK_CFCF0365C4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`),
  CONSTRAINT `FK_CFCF0365FF9FD4A2` FOREIGN KEY (`type_peripherique_id`) REFERENCES `type_peripherique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peripherique`
--

LOCK TABLES `peripherique` WRITE;
/*!40000 ALTER TABLE `peripherique` DISABLE KEYS */;
/*!40000 ALTER TABLE `peripherique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processeur`
--

DROP TABLE IF EXISTS `processeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `processeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `processeur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processeur`
--

LOCK TABLES `processeur` WRITE;
/*!40000 ALTER TABLE `processeur` DISABLE KEYS */;
INSERT INTO `processeur` VALUES (1,'I5'),(2,'/'),(3,'CELERON G3900T'),(4,'INTEL CELERON'),(5,'I5-6200'),(6,'XEON E3 1225'),(7,'I3-9100'),(8,'INTEL XEON'),(9,'I5-4210M'),(10,'CELERON'),(11,'INTEL CORE 2 DUO'),(12,'Pentium dual core'),(13,'I5 6200'),(14,'I5-6500'),(15,'I5 7500'),(16,'I5 431'),(17,'Pentium'),(18,'I5 6400'),(19,'Intel Pentium'),(20,'I3-4160'),(21,'I5-10210U'),(22,'AMD A6 9500E RADEON R5'),(23,'I3-3240'),(24,'AMD Athlon II'),(25,'I5-6400'),(26,'I7-4700'),(27,'I3-2100');
/*!40000 ALTER TABLE `processeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emplacement_id` int DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `type_session` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D044D5D4FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_D044D5D4FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (1,NULL,NULL,'/','/'),(2,NULL,NULL,'admin','Sis1ywGIP!'),(3,NULL,NULL,'admin','/'),(4,NULL,NULL,'/','GIHP@JT'),(5,NULL,NULL,'compta','GIHP@compta'),(6,NULL,NULL,'Christian','/'),(7,NULL,NULL,'RH01','/'),(8,NULL,NULL,'admin','2LiAd2TT'),(9,NULL,NULL,'salem','2LiAd2TT'),(10,NULL,NULL,'/','Mamon'),(11,NULL,NULL,'hp','hp'),(12,NULL,NULL,'transp4','/'),(13,NULL,NULL,'user','/'),(14,NULL,NULL,'/','GIHP@lm'),(15,NULL,NULL,'compta01','GIHP@gpt01'),(16,NULL,NULL,'mparisot','PARIS@mp'),(17,NULL,NULL,'rh03','GIHP@rh03'),(18,NULL,NULL,'assistant rh','GISP@assistantrh'),(19,NULL,NULL,'Gihp3','/'),(20,NULL,NULL,'ORDI1','/'),(21,NULL,NULL,'Lenovo','/'),(22,NULL,NULL,'Brigitte','/'),(23,NULL,NULL,'SOS BOOS','/'),(24,NULL,NULL,'ALAIN','/'),(25,NULL,NULL,'Yudi','/'),(26,NULL,NULL,'test','/'),(27,NULL,NULL,'yadicuba','/'),(28,NULL,NULL,'ATS','/');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `site` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_694309E419EB6921` (`client_id`),
  CONSTRAINT `FK_694309E419EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `systeme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `systeme` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systeme`
--

LOCK TABLES `systeme` WRITE;
/*!40000 ALTER TABLE `systeme` DISABLE KEYS */;
INSERT INTO `systeme` VALUES (1,'WINDOWS 10 1909'),(2,'WINDOWS 10 2004'),(3,'WINDOWS 10'),(4,'WINDOWS 7'),(5,'WINDOWS 7 6.1 SP1'),(6,'WINDOWS 7 SP1'),(7,'WINDOWS 8 6.3 (9600)'),(8,'WINDOWS 10 1703'),(9,'WINDOWS 8 6.3'),(10,'WINDOWS 10 2019'),(11,'WINDOWS 10 1903'),(12,'WINDOWS XP SP3'),(13,'Windows 10 famille'),(14,'Windows 10 famille 1809'),(15,'Windows 10 famille 1903'),(16,'Windows 10 famille 2004');
/*!40000 ALTER TABLE `systeme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_ordinateur`
--

DROP TABLE IF EXISTS `type_ordinateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_ordinateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_ordinateur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abr` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_ordinateur`
--

LOCK TABLES `type_ordinateur` WRITE;
/*!40000 ALTER TABLE `type_ordinateur` DISABLE KEYS */;
INSERT INTO `type_ordinateur` VALUES (1,'PORTABLE',NULL),(2,'FIXE',NULL);
/*!40000 ALTER TABLE `type_ordinateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_peripherique`
--

DROP TABLE IF EXISTS `type_peripherique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_peripherique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_peripherique` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_peripherique`
--

LOCK TABLES `type_peripherique` WRITE;
/*!40000 ALTER TABLE `type_peripherique` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_peripherique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fonction_id` int DEFAULT NULL,
  `emplacement_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1D1C63B357889920` (`fonction_id`),
  KEY `IDX_1D1C63B3C4598A51` (`emplacement_id`),
  KEY `IDX_1D1C63B3ED5CA9E6` (`service_id`),
  CONSTRAINT `FK_1D1C63B357889920` FOREIGN KEY (`fonction_id`) REFERENCES `fonction` (`id`),
  CONSTRAINT `FK_1D1C63B3C4598A51` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacement` (`id`),
  CONSTRAINT `FK_1D1C63B3ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,NULL,NULL,1,'HUREAU','Philippe'),(2,NULL,NULL,1,'MECHE','Laurence'),(3,NULL,NULL,1,'CHAFFAUT','Jérôme'),(4,NULL,NULL,1,'WAUTHIER','Alexandra'),(5,NULL,NULL,1,'MUR','Philippe'),(6,NULL,NULL,1,'DAUB','Olivier'),(7,NULL,NULL,2,'TORLOTIN','Joris'),(8,NULL,NULL,2,'COLIN','Anne'),(9,NULL,NULL,2,'CHABOD','Sandrine'),(10,NULL,NULL,3,'CHAILLOU','Christophe'),(11,NULL,NULL,3,'MARLY','Laurence'),(12,NULL,NULL,3,'PARISOT','Marylène'),(13,NULL,NULL,4,'GRANVILLE','Eddy'),(14,NULL,NULL,4,'MASSON','David'),(15,NULL,NULL,4,'LAM','Manon'),(16,NULL,NULL,5,'GILBERT','Gérald'),(17,NULL,NULL,5,'LAM','Mathias'),(18,NULL,NULL,5,'MATHIEU','Jean Philippe'),(19,NULL,NULL,5,'RUCKERT','Michel'),(20,NULL,NULL,4,'NEBIGH','Nadia'),(21,NULL,NULL,6,'BELKESSA','Salem'),(22,NULL,NULL,7,'FRENZEL','Christian'),(23,NULL,NULL,7,'NON-ATTRIBUE','NA'),(24,NULL,NULL,8,'MORDACCI','Patrice'),(25,NULL,NULL,8,'MAYOUI','Laura'),(26,NULL,NULL,8,'CAROLE','Salen'),(27,NULL,NULL,8,'GRATZ','Isabelle'),(28,NULL,NULL,8,'CONTAL','Mickael'),(29,NULL,NULL,9,'FERRAZ','Laura'),(30,NULL,NULL,9,'MICHAUD','Stéphane'),(31,NULL,NULL,10,'LUDWIG','Johanna'),(32,NULL,NULL,10,'SCHNEIDER','Catherine'),(33,NULL,NULL,10,'BLEU','René'),(34,NULL,NULL,10,'NON-ATTRIBUE','NA'),(35,NULL,NULL,11,'GEBHARDT','Tiphanie'),(36,NULL,NULL,11,'RIETH','Gabrielle'),(37,NULL,NULL,12,'Kioske','/'),(38,NULL,NULL,12,'BOOS','David'),(39,NULL,NULL,12,'IRE','Alain Didier'),(40,NULL,NULL,12,'BOUKERNE','FARIS'),(41,NULL,NULL,12,'BIEHLER','Nicole'),(42,NULL,NULL,12,'MARK','Gwenaelle'),(43,NULL,NULL,13,'CLEMENTE','Yudel'),(44,NULL,NULL,13,'CHAUFFEUR','/'),(45,NULL,NULL,13,'RODRIGUEZ','Patricia');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vpn`
--

DROP TABLE IF EXISTS `vpn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vpn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `identifiant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-14 10:52:12
