-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 23-10-2022 a las 22:52:56
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `validar`
--
CREATE DATABASE IF NOT EXISTS `validar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `validar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `usuario`, `password`, `correo`) VALUES
(1, 'yonil', 'Mejia', 'yonilmq@gmail.com'),
(2, 'Juan', '159', 'Juancito@gmail.com'),
(4, 'diego', '456', 'diego@gmail.com'),
(5, 'pedro', '789', 'pedro@gmail.com'),
(6, 'juaquin', '123', 'juaquin@gmail.com'),
(7, 'mathews', 'espada', 'mathews@gmail.com'),
(8, 'marco', '789', 'marco@gmail.com'),
(9, 'diego', '0123', 'diegoQuispe@gmail.com'),
(11, 'lorenzo', '1234', 'lore@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `idUsuario`, `titulo`, `fecha`) VALUES
(2, 2, 'trabajo update', '2022-10-22 19:45:15'),
(3, 2, 'tarea de campo update', '2022-10-23 00:31:24'),
(6, 1, 'actualizacion de fecha correccion(hora Peru)', '2022-10-23 13:13:10'),
(11, 4, 'tarea decoration', '2022-10-23 19:00:30'),
(15, 1, 'Se corriguio la fecha', '2022-10-23 13:25:18'),
(30, 6, 'casa acabo todo list\r\n', '2022-10-23 02:01:33'),
(31, 2, 'llevar al perro a pasear', '2022-10-23 02:27:18'),
(32, 2, 'Comprar croquetas para el perro', '2022-10-23 14:51:08'),
(34, 4, 'enviar tarea final', '2022-10-23 19:00:17'),
(36, 1, 'envio de tarea', '2022-10-23 13:25:27'),
(37, 9, 'Tarea lista para enviar', '2022-10-23 13:49:14'),
(39, 11, 'Primera tarea de lorenzo', '2022-10-23 15:10:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
