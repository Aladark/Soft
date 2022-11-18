-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: banco_pi
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amizade`
--

DROP TABLE IF EXISTS `amizade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amizade` (
  `fk_idusuario` int NOT NULL,
  `fk_idamigo` int NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  `data_confirmacao` datetime DEFAULT NULL,
  `confirmacao` int NOT NULL,
  KEY `fk_amizade_usuario1_idx` (`fk_idusuario`),
  KEY `fk_amizade_usuario2_idx` (`fk_idamigo`),
  CONSTRAINT `fk_amizade_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_amizade_usuario2` FOREIGN KEY (`fk_idamigo`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amizade`
--

LOCK TABLES `amizade` WRITE;
/*!40000 ALTER TABLE `amizade` DISABLE KEYS */;
INSERT INTO `amizade` VALUES (2,1,'2022-05-10 20:00:27',NULL,1),(2,1,'2022-05-10 21:05:09',NULL,1),(2,1,'2022-05-10 21:07:07',NULL,1),(1,1,'2022-05-10 21:09:08',NULL,1),(1,2,'2022-05-10 21:30:20',NULL,1),(2,1,'2022-05-11 20:30:20',NULL,1);
/*!40000 ALTER TABLE `amizade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_jogo`
--

DROP TABLE IF EXISTS `avaliacao_jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacao_jogo` (
  `fk_idjogo` int NOT NULL,
  `fk_idusuario` int NOT NULL,
  `avaliacao` int NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `data_avaliacao` date NOT NULL,
  KEY `fk_grupos_has_jogo_jogo1_idx` (`fk_idjogo`),
  KEY `fk_avaliacao_jogo_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `fk_avaliacao_jogo_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_grupos_has_jogo_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_jogo`
--

LOCK TABLES `avaliacao_jogo` WRITE;
/*!40000 ALTER TABLE `avaliacao_jogo` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliativo_usuario`
--

DROP TABLE IF EXISTS `avaliativo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliativo_usuario` (
  `fk_idusuario` int NOT NULL,
  `fk_idgrupos` int NOT NULL,
  `avaliacao` int NOT NULL,
  `comenatario` varchar(200) DEFAULT NULL,
  `denuncia` varchar(150) DEFAULT NULL,
  `revisasdo` int NOT NULL,
  `data_avaliacao` date NOT NULL,
  `fk_idmoderador` int NOT NULL,
  KEY `fk_usuario_has_grupos_grupos2_idx` (`fk_idgrupos`),
  KEY `fk_usuario_has_grupos_usuario2_idx` (`fk_idusuario`),
  KEY `fk_avaliativo_usuario_usuario1_idx` (`fk_idmoderador`),
  CONSTRAINT `fk_avaliativo_usuario_usuario1` FOREIGN KEY (`fk_idmoderador`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_usuario_has_grupos_grupos2` FOREIGN KEY (`fk_idgrupos`) REFERENCES `grupos` (`idgrupos`),
  CONSTRAINT `fk_usuario_has_grupos_usuario2` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliativo_usuario`
--

LOCK TABLES `avaliativo_usuario` WRITE;
/*!40000 ALTER TABLE `avaliativo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliativo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf_grupo`
--

DROP TABLE IF EXISTS `conf_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conf_grupo` (
  `fk_idusuario` int NOT NULL,
  `tipo` int NOT NULL,
  `fk_idgrupos` int NOT NULL,
  `data` date NOT NULL,
  KEY `fk_usuario_has_grupos_grupos1_idx` (`fk_idgrupos`),
  KEY `fk_usuario_has_grupos_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `fk_usuario_has_grupos_grupos1` FOREIGN KEY (`fk_idgrupos`) REFERENCES `grupos` (`idgrupos`),
  CONSTRAINT `fk_usuario_has_grupos_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf_grupo`
--

LOCK TABLES `conf_grupo` WRITE;
/*!40000 ALTER TABLE `conf_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `conf_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conta_receber`
--

DROP TABLE IF EXISTS `conta_receber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conta_receber` (
  `idconta_receber` int NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `data_recebimento` date NOT NULL,
  `fk_venda_usuario` int DEFAULT NULL,
  `fk_idvenda` int DEFAULT NULL,
  PRIMARY KEY (`idconta_receber`),
  KEY `fk_conta_receber_venda_usuario1_idx` (`fk_venda_usuario`),
  KEY `fk_conta_receber_venda1_idx` (`fk_idvenda`),
  CONSTRAINT `fk_conta_receber_venda1` FOREIGN KEY (`fk_idvenda`) REFERENCES `venda` (`idvenda`),
  CONSTRAINT `fk_conta_receber_venda_usuario1` FOREIGN KEY (`fk_venda_usuario`) REFERENCES `venda_usuario` (`venda_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta_receber`
--

LOCK TABLES `conta_receber` WRITE;
/*!40000 ALTER TABLE `conta_receber` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta_receber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forma_pagamento` (
  `idforma_pagamento` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idforma_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagamento`
--

LOCK TABLES `forma_pagamento` WRITE;
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `idgenero` int NOT NULL AUTO_INCREMENT,
  `desc_genero` varchar(45) NOT NULL,
  PRIMARY KEY (`idgenero`),
  UNIQUE KEY `desc_jogo_UNIQUE` (`desc_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'teste');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos_jgo`
--

DROP TABLE IF EXISTS `generos_jgo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generos_jgo` (
  `fk_idjogo` int NOT NULL,
  `fk_idgenero` int NOT NULL,
  KEY `fk_jogo_has_genero_jogo_genero_jogo1_idx` (`fk_idgenero`),
  KEY `fk_jogo_has_genero_jogo_jogo1_idx` (`fk_idjogo`),
  CONSTRAINT `fk_jogo_has_genero_jogo_genero_jogo1` FOREIGN KEY (`fk_idgenero`) REFERENCES `genero` (`idgenero`),
  CONSTRAINT `fk_jogo_has_genero_jogo_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos_jgo`
--

LOCK TABLES `generos_jgo` WRITE;
/*!40000 ALTER TABLE `generos_jgo` DISABLE KEYS */;
INSERT INTO `generos_jgo` VALUES (13,1),(14,1),(15,1);
/*!40000 ALTER TABLE `generos_jgo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `idgrupos` int NOT NULL AUTO_INCREMENT,
  `nome_grupo` varchar(80) NOT NULL,
  `descricao_grupo` varchar(80) NOT NULL,
  `quantidademax` int DEFAULT NULL,
  `fk_idjogo` int NOT NULL,
  `data_grupo` date NOT NULL,
  PRIMARY KEY (`idgrupos`),
  KEY `fk_grupos_jogo1_idx` (`fk_idjogo`),
  CONSTRAINT `fk_grupos_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `idItem` int NOT NULL AUTO_INCREMENT,
  `fk_idtipo_item` int NOT NULL,
  `desc_item` varchar(60) NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`idItem`),
  KEY `fk_Inten_Marcas1_idx` (`fk_idtipo_item`),
  CONSTRAINT `fk_Inten_Marcas1` FOREIGN KEY (`fk_idtipo_item`) REFERENCES `tipo_item` (`id_tipo_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_usuario`
--

DROP TABLE IF EXISTS `item_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_usuario` (
  `iditem_usuario` int NOT NULL AUTO_INCREMENT,
  `desc_item` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `data_venda` date NOT NULL,
  `fk_idjogo` int NOT NULL,
  `fk_usuario_vendedor` int NOT NULL,
  PRIMARY KEY (`iditem_usuario`),
  KEY `fk_item_usuario_jogo1_idx` (`fk_idjogo`),
  KEY `fk_item_usuario_usuario1_idx` (`fk_usuario_vendedor`),
  CONSTRAINT `fk_item_usuario_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`),
  CONSTRAINT `fk_item_usuario_usuario1` FOREIGN KEY (`fk_usuario_vendedor`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_usuario`
--

LOCK TABLES `item_usuario` WRITE;
/*!40000 ALTER TABLE `item_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogo`
--

DROP TABLE IF EXISTS `jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jogo` (
  `idjogo` int NOT NULL AUTO_INCREMENT,
  `nome_jogo` varchar(45) NOT NULL,
  `desc_jogo` varchar(45) NOT NULL,
  `faixa_etaria` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`idjogo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogo`
--

LOCK TABLES `jogo` WRITE;
/*!40000 ALTER TABLE `jogo` DISABLE KEYS */;
INSERT INTO `jogo` VALUES (13,'teste5','teste5','18',''),(14,'teste','teste','18',''),(15,'teste','teste','18','');
/*!40000 ALTER TABLE `jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensagem` (
  `fk_idusuario` int NOT NULL,
  `mensagem` varchar(100) NOT NULL,
  `data_mensagem` datetime NOT NULL,
  `fk_idusuarioreceptor` int NOT NULL,
  `fk_idgrupos` int DEFAULT NULL,
  KEY `fk_table1_usuario1_idx` (`fk_idusuario`),
  KEY `fk_mensagem_grupos1_idx` (`fk_idgrupos`),
  KEY `fk_mensagem_usuario1` (`fk_idusuarioreceptor`),
  CONSTRAINT `fk_mensagem_grupos1` FOREIGN KEY (`fk_idgrupos`) REFERENCES `grupos` (`idgrupos`),
  CONSTRAINT `fk_mensagem_usuario1` FOREIGN KEY (`fk_idusuarioreceptor`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_table1_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
INSERT INTO `mensagem` VALUES (1,'BOM DIA, CALOTEIRO','2022-05-09 19:41:44',2,NULL),(1,'ACORDOU PUTA????','2022-05-09 21:56:43',2,NULL),(1,'scvsdv','2022-05-10 19:28:44',2,NULL),(1,'asd','2022-05-10 19:35:15',2,NULL);
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem_topico`
--

DROP TABLE IF EXISTS `mensagem_topico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensagem_topico` (
  `idmensagem_topico` int NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(100) NOT NULL,
  `fk_idtopico` int NOT NULL,
  `fk_idusuario` int NOT NULL,
  `data_mensagem` date NOT NULL,
  PRIMARY KEY (`idmensagem_topico`),
  KEY `fk_mensagem_topico_topico1_idx` (`fk_idtopico`),
  KEY `fk_mensagem_topico_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `fk_mensagem_topico_topico1` FOREIGN KEY (`fk_idtopico`) REFERENCES `topico` (`idtopico`),
  CONSTRAINT `fk_mensagem_topico_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem_topico`
--

LOCK TABLES `mensagem_topico` WRITE;
/*!40000 ALTER TABLE `mensagem_topico` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem_topico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meus_jogos`
--

DROP TABLE IF EXISTS `meus_jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meus_jogos` (
  `fk_idjogo` int NOT NULL,
  `fk_idusuario` int NOT NULL,
  `nick_jogo` varchar(45) DEFAULT NULL,
  KEY `fk_jogo_has_usuario_usuario1_idx` (`fk_idusuario`),
  KEY `fk_jogo_has_usuario_jogo1_idx` (`fk_idjogo`),
  CONSTRAINT `fk_jogo_has_usuario_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`),
  CONSTRAINT `fk_jogo_has_usuario_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meus_jogos`
--

LOCK TABLES `meus_jogos` WRITE;
/*!40000 ALTER TABLE `meus_jogos` DISABLE KEYS */;
INSERT INTO `meus_jogos` VALUES (15,1,NULL),(15,1,NULL),(14,1,NULL),(15,1,NULL),(14,1,NULL),(14,1,NULL);
/*!40000 ALTER TABLE `meus_jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma`
--

DROP TABLE IF EXISTS `plataforma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma` (
  `idplataforma` int NOT NULL AUTO_INCREMENT,
  `desc_platafoma` varchar(45) NOT NULL,
  PRIMARY KEY (`idplataforma`),
  UNIQUE KEY `desc_platafoma_UNIQUE` (`desc_platafoma`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma`
--

LOCK TABLES `plataforma` WRITE;
/*!40000 ALTER TABLE `plataforma` DISABLE KEYS */;
INSERT INTO `plataforma` VALUES (77,''),(79,'AAA'),(81,'BBB'),(74,'ffff'),(75,'ffffff'),(76,'kk');
/*!40000 ALTER TABLE `plataforma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma_jogo`
--

DROP TABLE IF EXISTS `plataforma_jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_jogo` (
  `fk_idjogo` int NOT NULL,
  `fk_idplataforma` int NOT NULL,
  KEY `fk_jogo_has_plataforma_plataforma1_idx` (`fk_idplataforma`),
  KEY `fk_jogo_has_plataforma_jogo1_idx` (`fk_idjogo`),
  CONSTRAINT `fk_jogo_has_plataforma_jogo1` FOREIGN KEY (`fk_idjogo`) REFERENCES `jogo` (`idjogo`),
  CONSTRAINT `fk_jogo_has_plataforma_plataforma1` FOREIGN KEY (`fk_idplataforma`) REFERENCES `plataforma` (`idplataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_jogo`
--

LOCK TABLES `plataforma_jogo` WRITE;
/*!40000 ALTER TABLE `plataforma_jogo` DISABLE KEYS */;
INSERT INTO `plataforma_jogo` VALUES (13,76),(14,74),(15,77);
/*!40000 ALTER TABLE `plataforma_jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_conta`
--

DROP TABLE IF EXISTS `tipo_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_conta` (
  `idtipo_conta` int NOT NULL AUTO_INCREMENT,
  `desc_tipo` varchar(45) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`idtipo_conta`),
  UNIQUE KEY `desc_tipo_UNIQUE` (`desc_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_conta`
--

LOCK TABLES `tipo_conta` WRITE;
/*!40000 ALTER TABLE `tipo_conta` DISABLE KEYS */;
INSERT INTO `tipo_conta` VALUES (1,'usuario',1);
/*!40000 ALTER TABLE `tipo_conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_item`
--

DROP TABLE IF EXISTS `tipo_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_item` (
  `id_tipo_item` int NOT NULL AUTO_INCREMENT,
  `desc_tipo_item` varchar(60) NOT NULL,
  PRIMARY KEY (`id_tipo_item`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_item`
--

LOCK TABLES `tipo_item` WRITE;
/*!40000 ALTER TABLE `tipo_item` DISABLE KEYS */;
INSERT INTO `tipo_item` VALUES (19,'mapa');
/*!40000 ALTER TABLE `tipo_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topico`
--

DROP TABLE IF EXISTS `topico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topico` (
  `idtopico` int NOT NULL AUTO_INCREMENT,
  `descrição` varchar(80) NOT NULL,
  `data_topico` date NOT NULL,
  `fk_idusuario` int NOT NULL,
  PRIMARY KEY (`idtopico`),
  KEY `fk_topico_usuario1_idx` (`fk_idusuario`),
  CONSTRAINT `fk_topico_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topico`
--

LOCK TABLES `topico` WRITE;
/*!40000 ALTER TABLE `topico` DISABLE KEYS */;
/*!40000 ALTER TABLE `topico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `level` int NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fk_idtipo_conta` int NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `moeda` int NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_tipo_conta_idx` (`fk_idtipo_conta`),
  CONSTRAINT `fk_usuario_tipo_conta` FOREIGN KEY (`fk_idtipo_conta`) REFERENCES `tipo_conta` (`idtipo_conta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'XpMax','12345','mateus','mateus3007araujo@gmail.com','2003-07-30',1,'masculino',1,'null',400),(2,'Kreobio','123','Gustavo','rexgame470@gmail.com','2003-12-01',1,'masculino',1,'null',400);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venda` (
  `idvenda` int NOT NULL,
  `data_venda` date NOT NULL,
  `fk_idusuario` int NOT NULL,
  `fk_idforma_pagamento` int NOT NULL,
  `fk_Item` int NOT NULL,
  PRIMARY KEY (`idvenda`),
  KEY `fk_vanda_usuario1_idx` (`fk_idusuario`),
  KEY `fk_vanda_forma_pagamento1_idx` (`fk_idforma_pagamento`),
  KEY `fk_venda_Iten1_idx` (`fk_Item`),
  CONSTRAINT `fk_vanda_forma_pagamento1` FOREIGN KEY (`fk_idforma_pagamento`) REFERENCES `forma_pagamento` (`idforma_pagamento`),
  CONSTRAINT `fk_vanda_usuario1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_venda_Iten1` FOREIGN KEY (`fk_Item`) REFERENCES `item` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda_usuario`
--

DROP TABLE IF EXISTS `venda_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venda_usuario` (
  `venda_usuario` int NOT NULL AUTO_INCREMENT,
  `fk_usuario_comprador` int NOT NULL,
  `fk_idforma_pagamento` int NOT NULL,
  `fk_iditem_usuario` int NOT NULL,
  `data_compra` date NOT NULL,
  PRIMARY KEY (`venda_usuario`),
  KEY `fk_loja_usuario_usuario2_idx` (`fk_usuario_comprador`),
  KEY `fk_loja_usuario_forma_pagamento1_idx` (`fk_idforma_pagamento`),
  KEY `fk_loja_usuario_item_usuario1_idx` (`fk_iditem_usuario`),
  CONSTRAINT `fk_loja_usuario_forma_pagamento1` FOREIGN KEY (`fk_idforma_pagamento`) REFERENCES `forma_pagamento` (`idforma_pagamento`),
  CONSTRAINT `fk_loja_usuario_item_usuario1` FOREIGN KEY (`fk_iditem_usuario`) REFERENCES `item_usuario` (`iditem_usuario`),
  CONSTRAINT `fk_loja_usuario_usuario2` FOREIGN KEY (`fk_usuario_comprador`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda_usuario`
--

LOCK TABLES `venda_usuario` WRITE;
/*!40000 ALTER TABLE `venda_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'banco_pi'
--

--
-- Dumping routines for database 'banco_pi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-23 18:33:15
