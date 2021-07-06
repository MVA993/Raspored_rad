DROP TABLE IF EXISTS `zaposleni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zaposleni` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `srednje_ime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zaposleni`
--

LOCK TABLES `zaposleni` WRITE;
/*!40000 ALTER TABLE `zaposleni` DISABLE KEYS */;
INSERT INTO `zaposleni` VALUES (5,'MARJAN','STOJANOVIC','BOZIDARA','marjan_stojanovi'),(9,'DRAGANA','STOJANOVIC','DRAGANA','dragana_stojanov'),(18,'JELENA','STOJILJKOVIC','SAVA','jelena_stojiljko'),(22,'MARINA','ANTIC','SLOBODAN','marina_antic'),(25,'ALEKSANDRA','MLADENOVIC','DRAGOSLAV','aleksandra_mlad'),(29,'SASA','MLADENOVIC','MOMCILO','sasa_mladenovic'),(37,'JOVANA','SENTIC','TOMISLAV','jovana_sentic'),(38,'JELENA ','STOJMENOVIC','DRAGAN','jelena_stojm'),(40,'MARIJA','JANCIC','SRECKO','marija_jancic'),(41,'VIKTORIJA','POPOVIC','ZORAN','viktorija_popov'),(44,'MILJANA','STOSIC','DRAGAN','miljana_stosic'),(46,'JELENA','MITIC','BRANISLAV','jelena_mitic'),(47,'MILICA','DINCEV','SAÅ A','milica_dincev'),(49,'DRAGANA','MITIC','SRÄAN','dragana_mitic'),(50,'ALEKSANDAR','MLADENOVIC ','ZORAN','aleksandar_mlad'),(53,'SVETLANA','MISIC','MILORAD','svetlana_misic');
/*!40000 ALTER TABLE `zaposleni` ENABLE KEYS */;
UNLOCK TABLES;

