-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para foro
CREATE DATABASE IF NOT EXISTS `foro` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `foro`;

-- Volcando estructura para tabla foro.hilos
CREATE TABLE IF NOT EXISTS `hilos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Hilos` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tema` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechaCreacionHilo` datetime DEFAULT current_timestamp(),
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `hilos_temas` (`tema`),
  KEY `hilos_usuarios` (`usuario`),
  CONSTRAINT `hilos_temas` FOREIGN KEY (`tema`) REFERENCES `temas` (`ID`),
  CONSTRAINT `hilos_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla foro.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(1500) DEFAULT NULL,
  `usuario_ID` int(11) DEFAULT NULL,
  `hilo_ID` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `mensaje_hilos` (`hilo_ID`),
  KEY `mensaje_user` (`usuario_ID`),
  CONSTRAINT `mensaje_hilos` FOREIGN KEY (`hilo_ID`) REFERENCES `hilos` (`ID`),
  CONSTRAINT `mensaje_user` FOREIGN KEY (`usuario_ID`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla foro.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla foro.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) NOT NULL,
  `nombreCompleto` varchar(50) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT curdate(),
  `image_user` varchar(120) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `borrar_user` int(1) NOT NULL DEFAULT 1,
  `fecha_sesion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
