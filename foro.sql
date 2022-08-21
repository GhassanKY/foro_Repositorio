-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2022 a las 20:31:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilos`
--

CREATE TABLE `hilos` (
  `ID` int(11) NOT NULL,
  `nombre_Hilos` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tema` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechaCreacionHilo` datetime DEFAULT current_timestamp(),
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hilos`
--

INSERT INTO `hilos` (`ID`, `nombre_Hilos`, `descripcion`, `tema`, `usuario`, `fechaCreacionHilo`, `activo`) VALUES
(2, 'Viva España', 'legion por siempre', 1, 9, '2022-07-27 12:49:42', 1),
(3, 'Federico Gutierrez', 'x', 2, 9, '0000-00-00 00:00:00', 0),
(4, 'Que opinas de esto', 'asdfasdf', 2, 9, '0000-00-00 00:00:00', 1),
(5, 'test', 'test', 2, 9, '2022-07-27 00:00:00', 1),
(6, 'Que avion es mas rapido', 'Dime cual avion es mas rapido en la historia', 1, 9, '2022-07-27 00:00:00', 1),
(7, 'Me gusta el vicio', 'no', 2, 14, '2022-07-27 00:00:00', 1),
(14, 'este es un nuevo hilo', 'esta es la descripcion del nuevo hilo', 2, 17, '2022-07-28 00:00:00', 1),
(17, 'cual es el mejor juguete', 'descripcion de cual es el mejor juguete', 3, 18, '2022-07-29 10:43:03', 1),
(18, 'viva chaves', 'tenemos patria', 4, 20, '2022-07-29 00:00:00', 1),
(19, 'viva maduro', 'slvdññflsv', 4, 20, '2022-07-29 00:00:00', 1),
(21, 'lmkñlmñl', 'ñlmñlmlñm', 4, 20, '2022-07-29 00:00:00', 1),
(22, 'mmmmmmm', 'mmm', 3, 20, '2022-07-29 00:00:00', 1),
(23, 'hiloooo', 'descripciooon', 3, 20, '2023-07-29 00:00:00', 1),
(24, 'viva chaves otra ves', 'jblkjnlnlk', 5, 20, '2022-07-29 00:00:00', 1),
(25, 'nnnnnn', 'nnnnnnnnn', 1, 20, '2022-07-29 00:00:00', 1),
(26, 'bbbbbbbnn', 'n', 1, 20, '2022-07-29 00:00:00', 0),
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
(40, 'a ella le gusta la gasolina', 'dale mas gasolina', 1, 18, '2022-07-30 00:00:00', 1),
(42, 'adsa', 'asdad', 1, 15, '2022-08-16 00:00:00', 0),
(43, 'pppppp', 'no', 1, 28, '2022-08-16 00:00:00', 0),
(44, 'hola es un hilo nuevo', 'que debería estar resaltado y eso', 3, 14, '2022-08-20 00:00:00', 1),
(45, 'nuevo hilo de otro', 'a  ver', 4, 28, '2022-08-20 00:00:00', 1),
(46, 'la hora mal', 'creo', 1, 14, '2022-08-20 00:00:00', 1),
(47, 'hilo nuevo', 'la hora bienn no?', 1, 14, '2022-08-20 20:30:01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID` int(11) NOT NULL,
  `texto` varchar(1500) DEFAULT NULL,
  `usuario_ID` int(11) DEFAULT NULL,
  `hilo_ID` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `texto`, `usuario_ID`, `hilo_ID`, `fecha`) VALUES
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
(21, '<h2 style=\"font-style:italic;\"><span style=\"color:', 17, 14, '2022-08-02 10:18:35'),
(22, '<h2 style=\"font-style:italic;\"><span style=\"color:#2980b9\"><strong><span style=\"background-color:#dddddd\">nuevo comentario<img width=\"50\" height=\"50\" src=\"http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--66.gif\" /></span></strong></span></h2>', 17, 14, '2022-08-01 22:00:00'),
(23, '<p>kln kl</p>', 17, 14, '2022-08-01 22:00:00'),
(24, '<p>klnkll<img width=\"50\" height=\"50\" src=\"http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--1.gif\" /></p>', 17, 14, '2022-08-02 10:18:35'),
(25, '<p><img width=\"50\" height=\"50\" src=\"http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--18.gif\" /></p>', 17, 14, '2022-08-02 10:18:35'),
(26, '<p><img width=\"50\" height=\"50\" src=\"http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--21.gif\" />T</p>', 17, 14, '2022-08-02 10:18:51'),
(27, '<p><em><span style=\"color:#ffffff\"><span style=\"background-color:#e74c3c\">&ntilde;m&ntilde;om<img width=\"50\" height=\"50\" src=\"http://localhost:8080/foro_Repositorio6/ckeditor/plugins/hkemoji/sticker/onion/Onion--106.gif\" /></span></span></em></p>', 17, 14, '2022-08-02 10:21:51'),
(28, '<p>Me gustan las arepas&nbsp;<img width=\"50\" height=\"50\" src=\"http://localhost/Scripts.php/foro_Repositorio/ckeditor/plugins/hkemoji/sticker/onion/Onion--105.gif\" /></p>', 10, 2, '2022-08-03 10:50:12'),
(30, '<p>pues <strong>no</strong></p>', 10, 33, '2022-08-11 09:02:33'),
(31, '<p>comentario</p>', 14, 39, '2022-08-16 09:35:33'),
(32, '<p>un comentario</p>', 9, 40, '2022-08-16 09:51:56'),
(33, '<p><img width=\"50\" height=\"50\" src=\"http://localhost/scriptsPHP/Foro/foro_Repositorio/FRONTEND/ckeditor/plugins/hkemoji/sticker/onion/Onion--100.gif\" /></p>', 15, 42, '2022-08-16 10:38:28'),
(34, '<p>adad</p>', 15, 42, '2022-08-16 10:38:43'),
(35, '<p>un comentario m&agrave;s largo</p><p>odifsfdsogdsh</p><p>hhhhh<strong>hhhh</strong>hhhh</p><p><img width=\"50\" height=\"50\" src=\"http://localhost/scriptsPHP/Foro/foro_Repositorio/FRONTEND/ckeditor/plugins/hkemoji/sticker/onion/Onion--17.gif\" /></p>', 15, 42, '2022-08-16 10:42:12'),
(37, '<p>com<strong>entario</strong></p>', 28, 43, '2022-08-16 16:11:18'),
(38, '<p><em>Lorem ipsum dolor sit amet consectetur adipisicing elit. At corporis, laborum qui nam earum voluptatum doloremque enim error quae illum magnam voluptatibus placeat neque laudantium dolores velit eligendi maxime rem.</em></p>', 14, 21, '2022-08-16 16:18:36'),
(39, '<p><span style=\"color:#2ecc71\">segundo comentario&nbsp;<img width=\"28\" height=\"28\" src=\"http://localhost/scriptsPHP/Foro/foro_Repositorio/FRONTEND/ckeditor/plugins/hkemoji/sticker/facebook/cat-face-with-wry-smile_1f63c.png\" /></span></p>', 14, 21, '2022-08-16 16:55:40'),
(40, '<p>ethkrjhgkjhgkdfhsgidsh giog&egrave;ro iodhiughpdghpadihgdfiah`perwehghkdjsdfosd whfspdgdskdsfhfdso</p>', 14, 39, '2022-08-16 17:49:12'),
(41, '<p>gsfgfddg&nbsp;<em>fdsgfagsdasd</em></p><ul><li><strong>dslih&nbsp;</strong></li><li><strong>dsgsagf</strong></li></ul>', 14, 17, '2022-08-19 07:15:22'),
(42, '<p>comentario2</p>', 14, 40, '2022-08-19 09:02:53'),
(43, '<p><img width=\"50\" height=\"50\" src=\"http://localhost/scriptsPHP/Foro/foro_Repositorio/FRONTEND/ckeditor/plugins/hkemoji/sticker/onion/Onion--112.gif\" /></p>', 14, 40, '2022-08-19 09:02:58'),
(44, '<p>fdieru&igrave; ew&igrave;ogijdfh ieruhrehg idfhgdfjhgpiudsfh uirh ipudfhpfgkdsfjhgpiduh spuhg dipguih aeipuhdfpuhgdfuihg dfpdgipudfg iudfh pfuigh fuiphgadiuphg ipfdiuuph</p>', 14, 40, '2022-08-19 09:03:09'),
(45, '<p>fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</p>', 14, 40, '2022-08-19 09:03:24'),
(46, '<ul><li>ijooirotoiaewteara</li></ul>', 14, 40, '2022-08-19 09:03:34'),
(47, '<p><img width=\"50\" height=\"50\" src=\"http://localhost/scriptsPHP/Foro/foro_Repositorio/FRONTEND/ckeditor/plugins/hkemoji/sticker/onion/Onion--109.gif\" /></p>', 14, 14, '2022-08-19 09:05:52'),
(48, '<p>no se si este comentario se ver&aacute;&nbsp;<em>distinto</em></p>', 23, 44, '2022-08-20 18:04:55'),
(49, '<p>nuevo</p>', 14, 44, '2022-08-20 18:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID`, `nombre`) VALUES
(1, 'Aviones'),
(2, 'Carros'),
(3, 'Juguetes'),
(4, 'Politica'),
(5, 'Mercados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) NOT NULL,
  `nombreCompleto` varchar(50) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT curdate(),
  `image_user` varchar(120) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `borrar_user` int(1) NOT NULL DEFAULT 1,
  `fecha_sesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombreUsuario`, `clave`, `nombreCompleto`, `fechaCreacion`, `image_user`, `telefono`, `link`, `borrar_user`, `fecha_sesion`) VALUES
(9, 'pepitorodriguez@gmail.com', 'pepi', '123456', 'pepi Rodriguez', '0000-00-00 00:00:00', './image/p1.jpg', NULL, NULL, 0, NULL),
(10, 'tumama@gmail.com', 'Gatubela', '123456', 'Ghassan', '0000-00-00 00:00:00', './image/p2.jpg', '123456789', 'https://es-es.facebook.com/', 0, NULL),
(11, 'maikolmyers@gmail.com', 'Myers', '78956', 'Maikol', '0000-00-00 00:00:00', './image/p3.jpg', NULL, NULL, 1, NULL),
(12, 'perroansioso@gmail.com', 'PR', '123456', 'Perro', '0000-00-00 00:00:00', './image/p4.jpg', NULL, NULL, 1, NULL),
(14, 'gato@gmail.com', 'gato', 'g123456', 'Gato', '2022-07-27 00:00:00', 'image/117e9371c1a30a8de6fe51ac861cf247.jpg', '', '', 1, '2022-08-20 20:30:30'),
(15, 'gallo@gmail.com', 'El gallo claudio', '48123456', 'Gallo', '2022-07-27 00:00:00', './image/p6.png', NULL, NULL, 0, NULL),
(16, 'elkhouryghassan@gmail.com', 'GH', '1234', 'Ghassan', '2022-07-27 00:00:00', './image/p7.png', NULL, NULL, 1, NULL),
(17, 'maikol@gmail.com', 'maikol garrido', '1234', 'maikol garrido', '2022-07-28 00:00:00', 'image/16.jpg', '1234567', 'google.com', 1, NULL),
(18, 'maikol2@gmail.com', 'maikol G', '1234', 'maikol', '2022-07-29 00:00:00', './image/among-us-en-luces-de-neon_1280x720_xtrafondos.com.jpg', '65789', 'facebook.com', 0, NULL),
(20, 'maikol3@gmail.com', 'pedro perez', '1234', 'maikol', '2022-07-29 00:00:00', './image/fuego-de-una-fogata_2560x1440_xtrafondos.com.jpg', '12345678', 'instagram.com', 1, NULL),
(21, 'maikol6@gmail.com', 'maikol77', '1234', 'maikol garrido', '2022-07-29 00:00:00', './image/blue-5457731.jpg', NULL, NULL, 1, NULL),
(22, 'n', 'maikol@gmail.com', '1234', 'n', '2022-07-30 00:00:00', './image/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background.jpg', NULL, NULL, 1, NULL),
(23, 'maikol7@gmail.com', 'maikol garrido', '1234', 'maikol', '2022-07-30 00:00:00', './image/men-1777352_1280.jpg', NULL, NULL, 1, '2022-08-20 20:05:00'),
(24, 'mmmmmm', 'maikol@gmail.com', '1234', 'm', '2022-07-30 00:00:00', './image/79749-fogata.jpg', NULL, NULL, 1, NULL),
(25, 'ihoihx@ijxsailj.com', 'maikol@gmail.com', '1234', 'maikol', '2022-08-01 00:00:00', './image/25215-los-simpsons.jpg', NULL, NULL, 1, NULL),
(26, 'usuario@gmail.com', 'UsuarioPrueba', '123456', 'Usuario ', '2022-08-04 00:00:00', './image/shopping-cart.png', NULL, NULL, 1, NULL),
(27, 'aaaa@aaaa.aaa', 'aaaa', 'aaaa', 'aaaa', '2022-08-09 00:00:00', 'image/err.png', NULL, NULL, 1, NULL),
(28, 'alex@gmail.com', 'alex', 'a123', 'alex', '2022-08-16 00:00:00', 'image/usu.jpg', 'vacio', 'vacio', 1, '2022-08-20 20:08:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hilos`
--
ALTER TABLE `hilos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hilos_temas` (`tema`),
  ADD KEY `hilos_usuarios` (`usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `mensaje_hilos` (`hilo_ID`),
  ADD KEY `mensaje_user` (`usuario_ID`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hilos`
--
ALTER TABLE `hilos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hilos`
--
ALTER TABLE `hilos`
  ADD CONSTRAINT `hilos_temas` FOREIGN KEY (`tema`) REFERENCES `temas` (`ID`),
  ADD CONSTRAINT `hilos_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensaje_hilos` FOREIGN KEY (`hilo_ID`) REFERENCES `hilos` (`ID`),
  ADD CONSTRAINT `mensaje_user` FOREIGN KEY (`usuario_ID`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
