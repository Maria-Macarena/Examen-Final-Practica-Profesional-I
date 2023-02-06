/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.4.25-MariaDB : Database - sga_belgrano
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sga_belgrano` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `sga_belgrano`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `alu_dni` bigint(20) NOT NULL,
  `alu_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alu_apellido` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `alu_carrera` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alu_insc` int(3) unsigned NOT NULL,
  `alu_provincia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alu_coment` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alu_cel` int(15) NOT NULL,
  PRIMARY KEY (`alu_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `alumno` */

insert  into `alumno`(`alu_dni`,`alu_nombre`,`alu_apellido`,`alu_carrera`,`alu_insc`,`alu_provincia`,`alu_coment`,`alu_cel`) values (3059875,'Román ','Wolf','Medicina',14,'Cordoba','Quiero ser cirujano',231568185),(30265845,'Damián ','Martin','Abogacía',33,'Mendoza','Tengo una gran pasión para abogar por las personas',261587463),(31203895,'Julia','Herrero','Diseño',123,'Mendoza','Moda y accesorios ',2147483647),(36985452,'Juan','Barraquero','Ingeniería civil',89,'Neuquen','Quiero construir el edificio más alto y moderno',261578941),(36987542,'Macarena','Cardozo','Desarrollo de Software ',10,'Mendoza','Quiero emprender mi propia empresa de Software y expandirme al exterior',2147483647),(37895625,'Guadalupe','Fernández','Turismo',6,'San Luis','Quiero seguir viajando por el mundo',2147483647);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `mat_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `mat_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mat_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `materia` */

insert  into `materia`(`mat_codigo`,`mat_nombre`) values (28,'Práctica Profesional'),(29,'Lógica Computacional'),(30,'Álgebra'),(31,'Arquitectura de Software y Hardware'),(32,'Sistemas Administrativos Aplicados'),(33,'Comprensión y Producción de Textos'),(34,'Problemático Social y Cultural'),(35,'Programación I'),(36,'Inglés Técnico I'),(37,'Requerimientos de Software');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
