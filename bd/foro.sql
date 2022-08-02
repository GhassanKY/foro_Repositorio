-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2022 a las 23:18:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `fechaCreacionHilo` datetime DEFAULT curdate(),
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hilos`
--

INSERT INTO `hilos` (`ID`, `nombre_Hilos`, `descripcion`, `tema`, `usuario`, `fechaCreacionHilo`, `activo`) VALUES
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID` int(11) NOT NULL,
  `texto` varchar(50) DEFAULT NULL,
  `usuario_ID` int(11) DEFAULT NULL,
  `hilo_ID` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `texto`, `usuario_ID`, `hilo_ID`, `fecha`) VALUES
(1, 'viva franco', 9, 2, '0000-00-00 00:00:00'),
(3, 'este carro no me gusta', 9, 3, '0000-00-00 00:00:00'),
(4, 'El avion mas rapido es el spit', 9, 6, '0000-00-00 00:00:00'),
(6, 'este es el texto del nuevo hilo', 17, 14, '2022-07-28 17:11:15'),
(7, 'este es el texto del segundo comentario en el nuev', 14, 14, '0000-00-00 00:00:00'),
(8, 'tercer mensaje del hilo nuevo', 9, 14, '0000-00-00 00:00:00'),
(12, 'el mejor es KIDZOOM VIDEO ESTUDIO', 14, 17, '0000-00-00 00:00:00'),
(14, 'noooooo el mejor juguete  es BUZZ LIGTHYEAR ok', 16, 17, '0000-00-00 00:00:00'),
(17, 'lñ,{l,{ñ,ñ,', 11, 18, '2022-07-29 18:03:09'),
(18, 'jjjjjjjjjjjjjjjjjj', 14, 23, '2022-07-29 18:31:18'),
(19, 'lñl', 16, 14, '2022-07-29 19:08:36');

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
  `image_user` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombreUsuario`, `clave`, `nombreCompleto`, `fechaCreacion`, `image_user`) VALUES
(9, 'pepitorodriguez@gmail.com', 'pepi', '123456', 'pepi Rodriguez', '0000-00-00 00:00:00', '../image/p1.jpg'),
(10, 'tumama@gmail.com', 'GH', '123456', 'Ghassan', '0000-00-00 00:00:00', '../image/p2.jpg'),
(11, 'maikolmyers@gmail.com', 'Myers', '78956', 'Maikol', '0000-00-00 00:00:00', '../image/p3.jpg'),
(12, 'perroansioso@gmail.com', 'PR', '123456', 'Perro', '0000-00-00 00:00:00', '../image/p4.jpg'),
(14, 'gato@gmail.com', 'gato', 'g123456', 'Gato', '2022-07-27 00:00:00', '../image/p5.jpg'),
(15, 'gallo@gmail.com', 'El gallo claudio', '48123456', 'Gallo', '2022-07-27 00:00:00', '../image/p6.png'),
(16, 'elkhouryghassan@gmail.com', 'GH', '1234', 'Ghassan', '2022-07-27 00:00:00', '../image/p7.png'),
(17, 'maikol@gmail.com', 'maikol', '1234', 'maikol garrido', '2022-07-28 00:00:00', '../image/p8.png'),
(18, 'maikol2@gmail.com', 'maikol', '1234', 'maikol', '2022-07-29 00:00:00', '../image/p9.png'),
(20, 'maikol3@gmail.com', 'maikol3', '1234', 'maikol', '2022-07-29 00:00:00', '../image/among-us-en-luces-de-neon_1280x720_xtrafondos.com.jpg'),
(21, 'maikol6@gmail.com', 'maikol77', '1234', 'maikol garrido', '2022-07-29 00:00:00', '../image/blue-5457731.jpg'),
(22, 'n', 'maikol@gmail.com', '1234', 'n', '2022-07-30 00:00:00', '../image/abstract-grunge-decorative-relief-navy-blue-stucco-wall-texture-wide-angle-rough-colored-background.jpg'),
(23, 'maikol7@gmail.com', 'maikol garrido', '1234', 'maikol', '2022-07-30 00:00:00', '../image/men-1777352_1280.jpg'),
(24, 'mmmmmm', 'maikol@gmail.com', '1234', 'm', '2022-07-30 00:00:00', '../image/79749-fogata.jpg');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
