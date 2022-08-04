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
CREATE DATABASE IF NOT EXISTS `foro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `foro`;

-- Volcando estructura para tabla foro.hilos
CREATE TABLE IF NOT EXISTS `hilos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Hilos` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tema` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechaCreacionHilo` datetime DEFAULT curdate(),
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `hilos_temas` (`tema`),
  KEY `hilos_usuarios` (`usuario`),
  CONSTRAINT `hilos_temas` FOREIGN KEY (`tema`) REFERENCES `temas` (`ID`),
  CONSTRAINT `hilos_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla foro.hilos: ~29 rows (aproximadamente)
INSERT IGNORE INTO `hilos` (`ID`, `nombre_Hilos`, `descripcion`, `tema`, `usuario`, `fechaCreacionHilo`, `activo`) VALUES
	(2, 'Viva España', 'legion por siempre', 1, 9, '2022-07-27 12:49:42', 1),
	(3, 'Federico Gutierrez', 'x', 2, 9, '0000-00-00 00:00:00', 1),
	(4, 'Que opinas de esto', 'asdfasdf', 2, 9, '0000-00-00 00:00:00', 1),
	(5, 'test', 'test', 2, 9, '2022-07-27 00:00:00', 1),
	(6, 'Que avion es mas rapido', 'Dime cual avion es mas rapido en la historia', 1, 9, '2022-07-27 00:00:00', 1),
	(7, 'Me gusta el vicio', 'Que rico vicio', 2, 14, '2022-07-27 00:00:00', 1),
	(14, 'este es un nuevo hilo', 'esta es la descripcion del nuevo hilo', 2, 17, '2022-07-28 00:00:00', 1),
	(17, 'cual es el mejor juguete', 'descripcion de cual es el mejor juguete', 3, 18, '2022-07-29 10:43:03', 1),
	(18, 'viva chaves', 'tenemos patria', 4, 20, '2022-07-29 00:00:00', 1),
	(19, 'viva maduro', 'slvdññflsv', 4, 20, '2022-07-29 00:00:00', 1),
	(21, 'lmkñlmñl', 'ñlmñlmlñm', 4, 20, '2022-07-29 00:00:00', 1),
	(22, 'mmmmmmm', 'mmm', 3, 20, '2022-07-29 00:00:00', 1),
	(23, 'hiloooo', 'descripciooon', 3, 20, '2023-07-29 00:00:00', 1),
	(24, 'viva chaves otra ves', 'jblkjnlnlk', 5, 20, '2022-07-29 00:00:00', 1),
	(25, 'nnnnnn', 'nnnnnnnnn', 1, 20, '2022-07-29 00:00:00', 1),
	(26, 'bbbbbbbnn', 'n', 1, 20, '2022-07-29 00:00:00', 1),
	(27, 'nuevo hilo de aviones', 'klmkm', 1, 20, '2022-07-29 00:00:00', 1),
	(28, 'nuevo hilo decarros', 'klmkm', 2, 20, '2022-07-29 00:00:00', 1),
	(29, 'nuevo hilo de juguetes', 'klmkm', 3, 20, '2022-07-29 00:00:00', 1),
	(30, 'nuevo hilo de pilitica', 'klmkm', 4, 20, '2022-07-29 00:00:00', 1),
	(31, 'nuevo hilo de mercados', 'klmkm', 5, 20, '2022-07-29 00:00:00', 1),
	(32, 'mmmmmmmmm', 'mmlll', 2, 20, '2022-07-29 00:00:00', 1),
	(33, 'mmmscacsqqqqqqqq', 'qqqqqqqqqqq', 2, 21, '2022-07-29 00:00:00', 1),
	(34, '', '', NULL, 21, '2022-07-29 00:00:00', 1),
	(35, 'knkl', 'kn,lkn', 2, 17, '2022-07-29 00:00:00', 1),
	(37, 'kln klnklnln knlknl kkkkkk kkkkkkkk kkkkkkkk kkkkk', 'kln klnklnln knlknl kkkkkk kkkkkkkk kkkkkkkk kkkkk', 3, 17, '2022-07-29 00:00:00', 1),
	(38, ' n', 'n', 3, 17, '2022-07-29 00:00:00', 1),
	(39, 'nueva disscucion de hoy', 'holaaaaaaaaaa', 1, 17, '2022-07-30 00:00:00', 1),
	(40, 'a ella le gusta la gasolina', 'dale mas gasolina', 1, 18, '2022-07-30 00:00:00', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla foro.mensajes: ~18 rows (aproximadamente)
INSERT IGNORE INTO `mensajes` (`ID`, `texto`, `usuario_ID`, `hilo_ID`, `fecha`) VALUES
	(1, 'viva franco', 9, 2, '0000-00-00 00:00:00'),
	(3, 'este carro no me gusta', 9, 3, '0000-00-00 00:00:00'),
	(4, 'El avion mas rapido es el spit', 9, 6, '0000-00-00 00:00:00'),
	(6, 'este es el texto del nuevo hilo', 17, 14, '2022-07-28 15:11:15'),
	(7, 'este es el texto del segundo comentario en el nuev', 14, 14, '0000-00-00 00:00:00'),
	(8, 'tercer mensaje del hilo nuevo', 9, 14, '0000-00-00 00:00:00'),
	(12, 'el mejor es KIDZOOM VIDEO ESTUDIO', 14, 17, '0000-00-00 00:00:00'),
	(14, 'noooooo el mejor juguete  es BUZZ LIGTHYEAR ok', 16, 17, '0000-00-00 00:00:00'),
	(17, 'lñ,{l,{ñ,ñ,', 11, 18, '2022-07-29 16:03:09'),
	(18, 'jjjjjjjjjjjjjjjjjj', 14, 23, '2022-07-29 16:31:18'),
	(19, 'lñl', 16, 14, '2022-07-29 17:08:36'),
	(20, 'otro comentario', 12, 14, '2022-07-31 19:44:42'),
	(21, '<h2 style="font-style:italic;"><span style="color:', 17, 14, '2022-08-02 10:18:35'),
	(22, '<h2 style="font-style:italic;"><span style="color:#2980b9"><strong><span style="background-color:#dddddd">nuevo comentario<img width="50" height="50" src="http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--66.gif" /></span></strong></span></h2>', 17, 14, '2022-08-01 22:00:00'),
	(23, '<p>kln kl</p>', 17, 14, '2022-08-01 22:00:00'),
	(24, '<p>klnkll<img width="50" height="50" src="http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--1.gif" /></p>', 17, 14, '2022-08-02 10:18:35'),
	(25, '<p><img width="50" height="50" src="http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--18.gif" /></p>', 17, 14, '2022-08-02 10:18:35'),
	(26, '<p><img width="50" height="50" src="http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--21.gif" />T</p>', 17, 14, '2022-08-02 10:18:51'),
	(27, '<p><em><span style="color:#ffffff"><span style="background-color:#e74c3c">&ntilde;m&ntilde;om<img width="50" height="50" src="http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--106.gif" /></span></span></em></p>', 17, 14, '2022-08-02 10:21:51'),
	(28, '<p>Me gustan las arepas&nbsp;<img width="50" height="50" src="http://localhost/Scripts.php/foro_Repositorio/ckeditor/plugins/hkemoji/sticker/onion/Onion--105.gif" /></p>', 10, 2, '2022-08-03 10:50:12');

-- Volcando estructura para tabla foro.temas
CREATE TABLE IF NOT EXISTS `temas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla foro.temas: ~5 rows (aproximadamente)
INSERT IGNORE INTO `temas` (`ID`, `nombre`) VALUES
	(1, 'Aviones'),
	(2, 'Carros'),
	(3, 'Juguetes'),
	(4, 'Politica'),
	(5, 'Mercados');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla foro.usuarios: ~16 rows (aproximadamente)
INSERT IGNORE INTO `usuarios` (`id`, `correo`, `nombreUsuario`, `clave`, `nombreCompleto`, `fechaCreacion`, `image_user`, `telefono`, `link`, `borrar_user`) VALUES
	(9, 'pepitorodriguez@gmail.com', 'pepi', '123456', 'pepi Rodriguez', '0000-00-00 00:00:00', '../image/p1.jpg', NULL, NULL, 1),
	(10, 'tumama@gmail.com', 'Gatubela', '123456', 'Ghassan', '0000-00-00 00:00:00', '../image/p2.jpg', '123456789', 'https://es-es.facebook.com/', 0),
	(11, 'maikolmyers@gmail.com', 'Myers', '78956', 'Maikol', '0000-00-00 00:00:00', '../image/p3.jpg', NULL, NULL, 1),
	(12, 'perroansioso@gmail.com', 'PR', '123456', 'Perro', '0000-00-00 00:00:00', '../image/p4.jpg', NULL, NULL, 1),
	(14, 'gato@gmail.com', 'gato', 'g123456', 'Gato', '2022-07-27 00:00:00', '../image/p5.jpg', NULL, NULL, 1),
	(15, 'gallo@gmail.com', 'El gallo claudio', '48123456', 'Gallo', '2022-07-27 00:00:00', '../image/p6.png', NULL, NULL, 1),
	(16, 'elkhouryghassan@gmail.com', 'GH', '1234', 'Ghassan', '2022-07-27 00:00:00', '../image/p7.png', NULL, NULL, 1),
	(17, 'maikol@gmail.com', 'maikol garrido', '1234', 'maikol garrido', '2022-07-28 00:00:00', '../image/16.jpg', '1234567', 'google.com', 1),
	(18, 'maikol2@gmail.com', 'maikol G', '1234', 'maikol', '2022-07-29 00:00:00', '../image/among-us-en-luces-de-neon_1280x720_xtrafondos.com.jpg', '65789', 'facebook.com', 1),
	(20, 'maikol3@gmail.com', 'pedro perez', '1234', 'maikol', '2022-07-29 00:00:00', '../image/fuego-de-una-fogata_2560x1440_xtrafondos.com.jpg', '12345678', 'instagram.com', 1),
	(21, 'maikol6@gmail.com', 'maikol77', '1234', 'maikol garrido', '2022-07-29 00:00:00', '../image/blue-5457731.jpg', NULL, NULL, 1),
	(22, 'n', 'maikol@gmail.com', '1234', 'n', '2022-07-30 00:00:00', '../image/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background.jpg', NULL, NULL, 1),
	(23, 'maikol7@gmail.com', 'maikol garrido', '1234', 'maikol', '2022-07-30 00:00:00', '../image/men-1777352_1280.jpg', NULL, NULL, 1),
	(24, 'mmmmmm', 'maikol@gmail.com', '1234', 'm', '2022-07-30 00:00:00', '../image/79749-fogata.jpg', NULL, NULL, 1),
	(25, 'ihoihx@ijxsailj.com', 'maikol@gmail.com', '1234', 'maikol', '2022-08-01 00:00:00', '../image/25215-los-simpsons.jpg', NULL, NULL, 1),
	(26, 'usuario@gmail.com', 'UsuarioPrueba', '123456', 'Usuario ', '2022-08-04 00:00:00', '../image/shopping-cart.png', NULL, NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
