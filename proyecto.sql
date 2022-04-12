-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2022 a las 04:31:10
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `estilo` varchar(20) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `tipo_prenda` varchar(20) NOT NULL,
  `temporada` varchar(20) NOT NULL,
  `ocasion` varchar(20) NOT NULL,
  `formalidad` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `corte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `genero`, `estilo`, `edad`, `color`, `tipo_prenda`, `temporada`, `ocasion`, `formalidad`, `material`, `corte`) VALUES
(6, 'Blusa Amarilla Sin Mangas', 'femenino', 'urbano', 'joven', 'ocre', 'blusa', 'verano', '', 'casual', 'poliester', ''),
(23, 'Vestido Rojo Corto De Manga Corta', 'femenino', 'romatico', 'joven', 'rojo', 'vestido', 'primavera', '', 'casual', 'seda', 'cintura alta'),
(45, 'Pantalon Corte Tipo Bota Gris', 'femenino', 'urbano', 'joven', 'gris', 'pantalon', 'invierno', '', 'casual', 'lana', 'bota'),
(60, 'Camisa Morada Manga Corta', 'masculino', 'urbano', 'joven', 'morado', 'camisa', 'otono', '', 'casual', 'lino', 'tipo polo'),
(79, 'Falda Rosada Con Botones', 'femenino', 'urbano', 'joven', 'rosa', 'falda', 'primavera', '', 'casual', 'algodon', 'recta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
