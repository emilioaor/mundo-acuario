/*
SQLyog Ultimate v9.63 
MySQL - 5.1.41 : Database - mundoacuario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mundoacuario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mundoacuario`;

/*Table structure for table `clasificacion` */

DROP TABLE IF EXISTS `clasificacion`;

CREATE TABLE `clasificacion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `clasificacion` */

insert  into `clasificacion`(`codigo`,`clasificacion`) values (1,'peces'),(2,'Alimentos');

/*Table structure for table `codigo_activacion` */

DROP TABLE IF EXISTS `codigo_activacion`;

CREATE TABLE `codigo_activacion` (
  `codigo` varchar(5) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `codigo_activacion_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `codigo_activacion` */

insert  into `codigo_activacion`(`codigo`,`usuario`) values ('22126','usuario');

/*Table structure for table `contacto` */

DROP TABLE IF EXISTS `contacto`;

CREATE TABLE `contacto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(30) NOT NULL,
  `mensaje` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `contacto` */

insert  into `contacto`(`codigo`,`nick`,`mensaje`) values (12,'Cliente','Esta es una prueba'),(13,'Cliente','Prueba exitosa');

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `rif` char(12) NOT NULL,
  `empresa` varbinary(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` char(11) NOT NULL,
  `fecha_inscrip` date NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `empresa` */

insert  into `empresa`(`rif`,`empresa`,`direccion`,`telefono`,`fecha_inscrip`,`cedula`,`nombre`,`apellido`,`correo`) values ('G-01234567-8','Full Licor','Guigue','02418661122','2015-10-01','21145874','Pedro','Perez','pedroperez@gmail.com');

/*Table structure for table `nivel` */

DROP TABLE IF EXISTS `nivel`;

CREATE TABLE `nivel` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `nivel` */

insert  into `nivel`(`codigo`,`nivel`) values (1,'administrador'),(2,'vendedor'),(3,'comprador');

/*Table structure for table `producto_solicitud` */

DROP TABLE IF EXISTS `producto_solicitud`;

CREATE TABLE `producto_solicitud` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_sol` int(11) NOT NULL,
  `cod_prod` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_sol` (`cod_sol`),
  KEY `cod_prod` (`cod_prod`),
  CONSTRAINT `producto_solicitud_ibfk_1` FOREIGN KEY (`cod_sol`) REFERENCES `solicitud` (`codigo`),
  CONSTRAINT `producto_solicitud_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `producto_solicitud` */

insert  into `producto_solicitud`(`codigo`,`cod_sol`,`cod_prod`,`precio`,`cantidad`) values (1,6,1,'500.00',1),(3,8,3,'1500.00',1);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(250) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `unid_med` varchar(25) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ruta` varchar(250) DEFAULT NULL,
  `cod_clasif` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_clasif` (`cod_clasif`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_clasif`) REFERENCES `clasificacion` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

insert  into `productos`(`codigo`,`producto`,`precio`,`unid_med`,`cantidad`,`ruta`,`cod_clasif`) values (1,'pez 1','500.00','pez',7,'fotos_productos/pez1.jpg',2),(2,'pez 2','1000.00','pez',1,'fotos_productos/pez2.jpg',1),(3,'pez 3','1500.00','pez',2,'fotos_productos/pez3.jpg',1),(4,'pez 4','1000.00','pez',7,'fotos_productos/pez4.jpg',2),(5,'pez 5','1200.00','pez',15,'fotos_productos/pez5.jpg',1),(6,'pez 6','1800.00','pez',35,'fotos_productos/pez6.jpg',1),(7,'pez 7','1750.00','pez',18,'fotos_productos/pez7.jpg',1);

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `rif` char(12) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `rif` (`rif`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`rif`) REFERENCES `empresa` (`rif`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `solicitud` */

insert  into `solicitud`(`codigo`,`descripcion`,`rif`,`fecha`,`estatus`) values (6,'Solicitud de Prueba','G-01234567-8','2015-10-07','Despachado'),(7,'Solicitud de Prueba 2','G-01234567-8','2015-10-07','Por Confirmar'),(8,'Solicitud Prueba 3','G-01234567-8','2015-10-08','Despachado');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `usuario` varchar(15) NOT NULL,
  `contra` varchar(15) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `rif` char(12) DEFAULT NULL,
  PRIMARY KEY (`usuario`),
  KEY `cod_nivel` (`cod_nivel`),
  KEY `rif` (`rif`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_nivel`) REFERENCES `nivel` (`codigo`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rif`) REFERENCES `empresa` (`rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`usuario`,`contra`,`cod_nivel`,`rif`) values ('administrador','123456',1,NULL),('usuario','123456',3,'G-01234567-8'),('vendedor','123456',2,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
