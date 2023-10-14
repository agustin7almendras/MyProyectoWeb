# Host: localhost:3307  (Version 5.5.5-10.4.25-MariaDB)
# Date: 2023-09-22 12:56:49
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "conductortbl"
#

DROP TABLE IF EXISTS `conductortbl`;
CREATE TABLE `conductortbl` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `primerApellido` varchar(255) DEFAULT NULL,
  `segundoApellido` varchar(255) DEFAULT NULL,
  `nota` varchar(10) DEFAULT NULL,
  `habilitado` int(11) DEFAULT 1,
  `creado` timestamp NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

#
# Data for table "conductortbl"
#

INSERT INTO `conductortbl` VALUES (1,'jere','mamani','choque','127',0,'2023-08-17 19:41:16',NULL),(2,'Pardo','pepe','lacato','1278GFHJ',1,'2023-08-17 19:44:50',NULL),(4,'marco ','fransiscano','meñecas','2343ZZDV',0,'2023-08-23 01:12:02',NULL),(5,'Elian','mamani','Almendras','234fgjfht',1,'2023-08-26 10:47:04',NULL),(6,'Agustin','Llanos','Villa','3486HGGJ',1,'2023-08-26 22:05:42',NULL),(7,'Marcelo ','Vargas','Lopez','8234GFP',1,'2023-08-27 23:10:16',NULL),(8,'FAVIO','Caracas ','Pardo','2436FHDH',1,'2023-08-27 23:16:54',NULL),(10,'Gustavo ','Mamani','Silva','9023FTHY',1,'2023-09-06 10:33:40',NULL),(11,'Matias','henrry','Peredo','591GJJ',1,'2023-09-09 00:59:05',NULL),(12,'Marco','Flores','Veizaga','1278GFHJ',1,'2023-09-09 18:51:01',NULL),(13,'Marcelo','Velazques','Pardo','8234GFP',1,'2023-09-09 19:10:03',NULL),(15,'Juancho','Peredo','pardo','1278GFHJ',1,'2023-09-11 09:39:13',NULL),(17,'Patricios','Fuentes ','Peredo','3256265374',0,'2023-09-14 11:29:35',NULL),(18,'Matias','Peredo','Marañon','2436363',1,'2023-09-14 14:01:29',NULL),(23,'Anna','Salinas','Peredo','357584856',1,'2023-09-22 11:11:07',NULL);

#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'agus7','b374772a435122d6f03f0978d0d94473','admin'),(2,'sacarias','c328fbe57a3a63f096118366dc46e7cf','invitado');
