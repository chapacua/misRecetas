-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2018 a las 15:31:42
-- Versión del servidor: 5.6.37
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misRecetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE IF NOT EXISTS `Categorias` (
  `Cat_Id` int(11) NOT NULL,
  `Cat_Nombre` varchar(20) DEFAULT NULL,
  `Cat_Fecha_Creacion` datetime NOT NULL,
  `Cat_Fecha_Actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`Cat_Id`, `Cat_Nombre`, `Cat_Fecha_Creacion`, `Cat_Fecha_Actualizacion`) VALUES
(6, 'Granos', '2018-05-18 09:32:48', NULL),
(7, 'Verduras', '2018-05-18 09:32:48', NULL),
(10, 'Tuberculos', '2018-05-18 14:50:29', NULL),
(17, 'Hortalizas', '2018-05-18 15:37:57', NULL),
(0, 'Lacteos', '2018-06-15 09:34:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ingredientes`
--

CREATE TABLE IF NOT EXISTS `Ingredientes` (
  `Ing_Id` int(11) NOT NULL,
  `Ing_Nombre` varchar(45) NOT NULL,
  `Usu_Id` int(11) NOT NULL,
  `Ing_Imagen` varchar(45) NOT NULL,
  `Cat_Id` int(11) NOT NULL,
  `Ing_Fecha_Creacion` datetime NOT NULL,
  `Ing_Fecha_Actualizacion` datetime DEFAULT NULL,
  `Ing_Comentario` longtext,
  `Ing_Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ingredientes`
--

INSERT INTO `Ingredientes` (`Ing_Id`, `Ing_Nombre`, `Usu_Id`, `Ing_Imagen`, `Cat_Id`, `Ing_Fecha_Creacion`, `Ing_Fecha_Actualizacion`, `Ing_Comentario`, `Ing_Estado`) VALUES
(5, 'Harina', 23, 'Harina.jpg', 6, '2018-06-04 16:48:39', NULL, 'Harina Fina', 0),
(6, 'Frijoles', 23, 'Frijoles.png', 6, '2018-05-31 18:12:10', NULL, 'Frijolachos\r\n', 0),
(30, 'Zanahorias', 23, 'Zanahorias.jpg', 6, '2018-06-04 16:49:05', NULL, 'papas', 0),
(32, 'Papas', 23, 'Papas.jpg', 10, '2018-06-04 16:53:50', NULL, 'Papas deliciosas', 0),
(33, 'Yuca', 23, 'Yuca.jpg', 10, '2018-06-04 16:55:41', NULL, 'Yuca Fresca', 0),
(0, 'Crema de Leche', 0, 'Crema_de_Leche.jpg', 0, '2018-06-15 09:35:50', NULL, 'Rica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Receta`
--

CREATE TABLE IF NOT EXISTS `Receta` (
  `Rec_Id` int(11) NOT NULL,
  `Rec_Nombre` varchar(45) NOT NULL,
  `Usu_Id` int(11) NOT NULL,
  `Rec_Fecha_Actualizacion` datetime DEFAULT NULL,
  `Rec_Fecha_Creacion` datetime NOT NULL,
  `Rec_Imagen` varchar(45) NOT NULL,
  `Rec_Comentario` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Receta`
--

INSERT INTO `Receta` (`Rec_Id`, `Rec_Nombre`, `Usu_Id`, `Rec_Fecha_Actualizacion`, `Rec_Fecha_Creacion`, `Rec_Imagen`, `Rec_Comentario`) VALUES
(1, 'Arróz', 25, '2018-06-14 15:31:24', '0000-00-00 00:00:00', 'Arroz.jpg', 'Yuca Fresca'),
(2, 'Frijoles', 25, '2018-06-04 17:37:01', '0000-00-00 00:00:00', 'Frijoles.jpg', 'Comentario 2\r\n'),
(3, 'Sancoho', 24, '2018-06-15 06:35:11', '0000-00-00 00:00:00', 'Sancoho.jpg', 'Sancocho de Res'),
(4, 'Bandeja Paisa', 25, '2018-06-14 20:00:12', '0000-00-00 00:00:00', 'Bandeja_Paisa.jpg', 'rica Bandeja Paisa'),
(5, 'Pure de Papa', 25, '2018-06-15 09:37:50', '0000-00-00 00:00:00', 'Pure_de_Papa.jpg', 'Muy rico alejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Receta_Ingredientes`
--

CREATE TABLE IF NOT EXISTS `Receta_Ingredientes` (
  `RIng_Id` int(11) NOT NULL,
  `Rec_Id` int(11) NOT NULL,
  `Ing_Id` int(11) NOT NULL,
  `RIng_Fecha_Creacion` datetime NOT NULL,
  `RIng_Fecha_Actualizacion` datetime DEFAULT NULL,
  `Comentarios` longtext,
  `RIng_Cantidad` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Receta_Ingredientes`
--

INSERT INTO `Receta_Ingredientes` (`RIng_Id`, `Rec_Id`, `Ing_Id`, `RIng_Fecha_Creacion`, `RIng_Fecha_Actualizacion`, `Comentarios`, `RIng_Cantidad`) VALUES
(3, 2, 32, '2018-06-04 17:38:54', NULL, NULL, 1),
(4, 2, 33, '2018-06-04 17:38:56', NULL, NULL, 1),
(32, 1, 32, '2018-06-14 15:31:24', NULL, NULL, 1),
(33, 1, 33, '2018-06-14 15:31:24', NULL, NULL, 6),
(38, 4, 6, '2018-06-14 20:00:12', NULL, NULL, 4),
(39, 4, 5, '2018-06-14 20:00:12', NULL, NULL, 2),
(40, 3, 30, '2018-06-15 06:35:11', NULL, NULL, 4),
(41, 3, 32, '2018-06-15 06:35:11', NULL, NULL, 2),
(42, 5, 32, '2018-06-15 09:37:50', NULL, NULL, 6),
(43, 5, 0, '2018-06-15 09:37:50', NULL, NULL, 1),
(44, 5, 30, '2018-06-15 09:37:50', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `Usu_Id` int(11) NOT NULL,
  `Usu_Usuario` varchar(45) NOT NULL,
  `Usu_Nombre` varchar(45) NOT NULL,
  `Usu_Rol` varchar(45) NOT NULL,
  `Usu_Fecha_Creacion` datetime NOT NULL,
  `Usu_Fecha_Modificacion` datetime DEFAULT NULL,
  `Usu_Correo` varchar(45) NOT NULL,
  `Usu_Password` varchar(100) NOT NULL,
  `Usu_Cedula` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Usu_Id`, `Usu_Usuario`, `Usu_Nombre`, `Usu_Rol`, `Usu_Fecha_Creacion`, `Usu_Fecha_Modificacion`, `Usu_Correo`, `Usu_Password`, `Usu_Cedula`) VALUES
(23, 'admin', 'Administrador', '1', '2018-05-17 09:04:26', NULL, 'alejok.024@gmail.com', 'ce98774a72fa6c17956a1a5c999c153ee5980873', '1040749855'),
(24, 'root', 'Super Administrador', '2', '2018-05-17 09:04:26', NULL, 'alejok.024@gmail.com', 'ce98774a72fa6c17956a1a5c999c153ee5980873', '1040749855'),
(25, 'usuario', 'Usuario', '3', '2018-05-17 09:04:26', NULL, 'alejok.024@gmail.com', 'ce98774a72fa6c17956a1a5c999c153ee5980873', '1040749855'),
(0, 'hmaya', 'Hector', '1', '2018-06-15 09:33:21', NULL, 'h@g.com', 'a069b28de67398d777405e708c7a4a8d7fd00b0e', '1067890482');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Receta`
--
ALTER TABLE `Receta`
  ADD PRIMARY KEY (`Rec_Id`);

--
-- Indices de la tabla `Receta_Ingredientes`
--
ALTER TABLE `Receta_Ingredientes`
  ADD PRIMARY KEY (`RIng_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Receta`
--
ALTER TABLE `Receta`
  MODIFY `Rec_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Receta_Ingredientes`
--
ALTER TABLE `Receta_Ingredientes`
  MODIFY `RIng_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
