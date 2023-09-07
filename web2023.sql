# Host: localhost  (Version 5.5.5-10.4.18-MariaDB)
# Date: 2023-06-28 21:15:08
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "estudiantes"
#

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `primerApellido` varchar(255) DEFAULT NULL,
  `segundoApellido` varchar(255) DEFAULT NULL,
  `nota` double DEFAULT NULL,
  `habilitado` int(11) DEFAULT 1,
  `creado` timestamp NULL DEFAULT current_timestamp(),
  `foto` varchar(255) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

#
# Data for table "estudiantes"
#

INSERT INTO `estudiantes` VALUES (1,'SAMUEL','GUZMAN','VARGAS',82,1,'2023-06-16 15:21:13','1.jpg'),(2,'LORENA ','LARREA ','NOSE',100,1,'2023-06-16 15:21:13','2.jpg'),(3,'DANITZA ','MAMANI','MAMANI',42,1,'2023-06-16 15:21:13','3.jpg'),(4,'JUAN PABLO','JIMENEZ','CHOQUE',10,1,'2023-06-16 15:21:13',''),(5,'CHRISTIAN OSCAR','LARA ','QUISPE',69,1,'2023-06-16 15:21:13',''),(6,'PEDRO','LARREA','BRAVO',30,0,'2023-06-16 15:21:13',''),(7,'RENE DAVID','LEON','TORRICO',22,0,'2023-06-16 15:21:13',''),(8,'LINETH ZEIDA','LIMA ','GONZALES',100,0,'2023-06-16 15:21:13',''),(9,'CARLOS SEBASTIAN','LOPEZ','GALINDO',95,0,'2023-06-16 15:21:13',''),(10,'CECILIA','LUIZAGA','HUIRAPUCA',87,0,'2023-06-16 15:21:13',''),(11,'LUIS ALBERTO','MAMANI','MAMANI',63,0,'2023-06-16 15:21:13',''),(12,'FELIX RAUL ','MAMANI','GARCIA',57,0,'2023-06-16 15:21:13',''),(13,'RONALD JAVIER','MELGAREJO','CAERO',12,0,'2023-06-16 15:21:13',''),(14,'KEVIN BRANDON','MELGAREJO','PORTILLO',5,0,'2023-06-16 15:21:13',''),(15,'ALAN JAMIL','MERIDA','ARGOTE',77,1,'2023-06-16 15:21:13',''),(16,'ESTHER DANIELA','MERIDA','LOPEZ ',99,1,'2023-06-16 15:21:13',''),(37,'ADRIAN ','ESCALERA','PEREDO',0,0,'2023-06-16 15:21:13',''),(38,'','','',0,0,'2023-06-16 15:21:13',''),(41,'','','',0,0,'2023-06-16 15:21:13',''),(43,'','','',0,0,'2023-06-16 15:21:13',''),(44,'','','',0,0,'2023-06-16 15:21:13',''),(45,'','','',0,0,'2023-06-16 15:21:13',''),(46,'','','',0,0,'2023-06-16 15:21:13',''),(47,'','','',0,0,'2023-06-16 15:21:13',''),(52,'','','',0,1,'2023-06-16 15:21:13','');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'jaime','c0ecb37749cbe64e5c8ac4d35eec3e54','admin'),(2,'karen','c0ecb37749cbe64e5c8ac4d35eec3e54','invitado');
