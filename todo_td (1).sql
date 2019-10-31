-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2019 a las 22:30:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo_td`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `tarea` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `limite` date NOT NULL,
  `realizada` bit(1) NOT NULL,
  `fecha` date NOT NULL,
  `asignadoA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `todo`
--

INSERT INTO `todo` (`id`, `tarea`, `descripcion`, `limite`, `realizada`, `fecha`, `asignadoA`) VALUES
(1, 'trabajar', 'ir al trabajo', '2019-10-16', b'0', '2019-10-16', 'us1'),
(2, 'cocinar2', 'comprar alimentos', '2019-10-01', b'0', '2019-10-08', 'us2'),
(4, 'tarea', 'hola', '2019-03-01', b'1', '2019-10-31', 'us3'),
(5, 'hacer los deberes', 'h1', '2019-12-12', b'1', '2019-10-24', 'us1'),
(6, 'prueba32', 'hacer la prueba \"prueba33\"', '2019-10-03', b'1', '2019-10-03', 'us1'),
(7, 'prueba33', 'nada', '2019-10-11', b'1', '2019-10-04', 'us1'),
(8, 'programar', 'seguir programando', '2019-03-01', b'1', '2019-10-09', 'us1'),
(9, 'tarea1', 'descripcion de la tarea1', '2019-01-01', b'1', '2019-10-10', 'us1'),
(10, 'tarea2', 'descripcion de la tarea2', '2019-01-01', b'1', '2019-10-11', 'us1'),
(11, 'tarea3', 'descripcion de la tarea3', '2019-01-01', b'1', '2019-10-10', 'us1'),
(12, 'tarea4', 'descripcion de la tarea4', '2019-01-01', b'1', '2019-10-11', 'us1'),
(13, 'tarea5', 'descripcion de la tarea5', '2019-01-01', b'1', '2019-10-08', 'us1'),
(14, 'tarea6', 'descripcion de la tarea6', '2019-01-01', b'1', '2019-10-08', 'us1'),
(15, 'tarea8', 'recordar hacer la tarea 7', '2019-01-01', b'1', '2019-10-11', 'us1'),
(37, 'final1', 'final1', '2019-10-25', b'0', '2019-10-25', 'us1'),
(38, 'final1', 'final1', '2019-10-25', b'0', '2019-10-25', 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `clave` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `nombre`, `fecha`, `clave`) VALUES
(1, 'us1', 'hola@gmail.com', 'brandon orellana roj', '2019-10-08', '111111'),
(2, 'us2', 'hola@gmail.com', 'brandon orellana roj', '2019-10-08', '789'),
(3, 'brandon1', 'hola@gmail.com', 'brandon orellana roj', '2019-10-08', '12345'),
(4, 'brandon2', 'hola@gmail.com', 'brandon orellana roj', '2019-10-08', '123456'),
(5, 'brandon3', 'hola@gmail.com', 'brandon orellana roj', '2019-10-08', '1111111'),
(6, 'brandon4', 'bu@gmail.com', 'brandon orellana roj', '2019-10-18', '22222'),
(7, 'brandon5', 'hola@gmail.com', 'brandon orellana roj', '2019-10-18', '1234567'),
(8, 'nuevoUsuario', 'hola@gmail.com', 'NUEVO_USUARIO', '2019-10-22', '3333'),
(9, 'us3', 'talento-digital-09@gmail.com', 'usuario3', '2019-10-25', '3333');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
