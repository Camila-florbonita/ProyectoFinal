-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2022 a las 08:53:15
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
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprado`
--

CREATE TABLE `comprado` (
  `id_comprar` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `direccion` int(11) NOT NULL,
  `n_ext` int(11) NOT NULL,
  `n_int` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `cp` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `instentrega` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listadedeseos`
--

CREATE TABLE `listadedeseos` (
  `id_listadedeseos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `estilo` varchar(20) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `tipo_prenda` varchar(20) NOT NULL,
  `temporada` varchar(20) NOT NULL,
  `ocasion` varchar(20) NOT NULL,
  `formalidad` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `corte` varchar(20) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio_oferta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `genero`, `estilo`, `edad`, `color`, `tipo_prenda`, `temporada`, `ocasion`, `formalidad`, `material`, `corte`, `precio`, `descripcion`, `precio_oferta`) VALUES
(1, 'sueter negro con cuello blanco', 'femenino', 'urbano', 'joven', 'negro', 'sueter', 'invierno', '', 'casual', 'algodon', '', 328, '', 0),
(2, 'blusa azul con flores de manga corta', 'femenino', 'girly', 'joven', 'azul celeste', 'playera', 'primavera', '', 'casual', 'poliester', '', 220, '', 0),
(3, 'blusa rosa de manga corta con botones', 'femenino', 'sofisticado', 'joven', 'rosa', 'playera', 'verano', '', 'casual', 'algodon', '', 299, '', 0),
(4, 'blusa blanca con flores de manga corta', 'femenino', 'romantico', 'joven', 'blanco', 'playera', 'primavera', '', 'semiformal', 'poliester', '', 239, '', 0),
(5, 'blusa blanca con puntos negros sin mangas', 'femenino', 'sofisticado', 'joven', 'blanco', 'playera', 'verano', '', 'casual', 'seda', '', 399, '', 0),
(6, 'Blusa Amarilla Sin Mangas', 'femenino', 'urbano', 'joven', 'ocre', 'playera', 'verano', '', 'casual', 'poliester', '', 399, '', 0),
(7, 'blusa azul celeste sin mangas', 'femenino', 'urbano', 'joven', 'azul celeste', 'playera', 'verano', '', 'casual', 'algodon', '', 259, '', 0),
(8, 'blusa azul sin mangas', 'femenino', 'urbano', 'joven', 'azul', 'playera', 'verano', '', 'casual', 'poliester', '', 229, '', 0),
(9, 'blusa verde con escote triangular de manga larga', 'femenino', 'clasico', 'joven', 'verde oscuro', 'playera', 'invierno', '', 'semiformal', 'algodon', '', 320, '', 0),
(10, 'blusa amarilla de flores con manga corta', 'femenino', 'creativo', 'joven', 'amarillo', 'playera', 'primavera', '', 'casual', 'algodon', '', 229, '', 0),
(11, 'blusa blanca con puntos negros con manga larga', 'femenino', 'sofisticado', 'joven', 'blanco', 'playera', 'invierno', '', 'semiformal', 'poliester', '', 379, '', 0),
(12, 'blusa rosa sin mangas', 'femenino', 'romantico', 'joven', 'rosa', 'playera', 'verano', '', 'casual', 'algodon', '', 359, '', 0),
(13, 'blusa blanca de hombros anchos con manga larga', 'femenino', 'girly', 'joven', 'blanco', 'playera', 'invierno', '', 'casual', 'algodon', '', 330, '', 0),
(14, 'blusa verde de flores azules con manga corta', 'femenino', 'creativo', 'joven', 'verde lima', 'playera', 'primavera', '', 'casual', 'algodon', '', 299, '', 0),
(15, 'blusa amarilla con bordes negros y manga larga', 'femenino', 'urbano', 'joven', 'mostaza', 'playera', 'otono', '', 'semiformal', 'algodon', '', 329, '', 0),
(16, 'blusa blanca de puntos con manga larga', 'femenino', 'girly', 'joven', 'blanco', 'playera', 'invierno', '', 'casual', 'poliester', '', 349, '', 0),
(17, 'blusa cafe de flores con manga larga', 'femenino', 'romantico', 'joven', 'cafe', 'playera', 'invierno', '', 'casual', 'poliester', '', 399, '', 0),
(18, 'blusa negra con lentejuelas y manga larga', 'femenino', 'urbano', 'joven', 'negro', 'playera', 'invierno', 'fiesta', 'casual', 'poliester', '', 399, '', 0),
(19, 'blusa blanca y naranja con manga larga', 'femenino', 'sofisticado', 'adultos', 'blanco', 'playera', 'invierno', '', 'formal', 'algodon', '', 329, '', 0),
(20, 'blusa rosa con manga corta', 'femenino', 'girly', 'joven', 'rosa', 'playera', 'primavera', '', 'casual', 'poliester', '', 299, '', 0),
(21, 'blusa cafe de olanes con manga corta', 'femenino', 'boho', 'joven', 'cafe', 'playera', 'otono', '', 'casual', 'algodon', '', 229, '', 0),
(22, 'blusa blanca de olanes con manga larga', 'femenino', 'romantico', 'joven', 'blanco', 'playera', 'invierno', '', 'casual', 'poliester', '', 279, '', 0),
(23, 'Vestido Rojo Corto De Manga Corta', 'femenino', 'romantico', 'joven', 'rojo', 'vestido', 'primavera', '', 'casual', 'seda', 'cintura alta', 899, '', 0),
(24, 'vestido negro sin mangas con tul', 'femenino', 'gotico', 'joven', 'negro', 'vestido', 'primavera', 'fiesta', 'semiformal', 'poliester', 'cintura alta', 699, '', 0),
(25, 'vestido rosa de encaje con manga corta', 'femenino', 'girly', 'joven', 'rosa', 'vestido', 'primavera', '', 'casual', 'algodon', 'cintura alta', 599, '', 0),
(26, 'vestido azul largo sin manga', 'femenino', 'sofisticado', 'joven', 'azul', 'vestido', 'otono', 'elegante', 'formal', 'algodon', 'imperio', 800, '', 0),
(27, 'vestido verde oscuro largo sin mangas', 'femenino', 'dramatico', 'adulto', 'verde oscuro', 'vestido', 'otono', 'elegante', 'formal', 'seda', 'asimetrico', 5000, '', 0),
(28, 'vestido plateado corto sin mangas', 'femenino', 'vanguardista', 'joven', 'gris', 'vestido', 'verano', 'fiesta', 'semiformal', 'poliester', 'cintura alta', 729, '', 0),
(29, 'vestido negro corto sin cuello con manga corta', 'femenino', 'gotico', 'joven', 'negro', 'vestido', 'verano', '', 'semiformal', 'algodon', 'asimetrico', 549, '', 0),
(30, 'vestido azul celeste corto sin manga', 'femenino', 'natural', 'joven', 'azul celeste', 'vestido', 'verano', '', 'casual', 'algodon', '', 299, '', 0),
(31, 'vestido rosa sin cuello con capas', 'femenino', 'romantico', 'adulto', 'rosa', 'vestido', 'primavera', 'elegante', 'formal', 'seda', 'asimetrico', 1699, '', 0),
(32, 'vestido blanco de encaje sin mangas', 'femenino', 'sofisticado', 'adulto', 'blanco', 'vestido', 'verano', '', 'casual', 'seda', 'imperio', 999, '', 0),
(33, 'vestido gris claro corto con cuello de tortuga y manga larga', 'femenino', 'natural', 'joven', 'gris', 'vestido', 'invierno', '', 'casual', 'lana', 'recto', 449, '', 0),
(34, 'pantalon de mezclilla roto ', 'femenino', 'hipster', 'joven', 'azul celeste', 'pantalon', '', '', 'casual', 'mezclilla', 'recto', 399, '', 0),
(35, 'pantalon de mezclilla azul claro', 'femenino', 'clasico', 'joven', 'azul celeste', 'pantalon', '', '', 'casual', 'mezclilla', 'recto', 399, '', 0),
(36, 'pantalon cafe claro ', 'femenino', 'boho', 'joven', 'cafe', 'pantalon', '', '', 'casual', 'algodon', 'recto', 500, '', 0),
(37, 'pantalon violeta ancho', 'femenino', 'boho', 'joven', 'violeta', 'pantalon', '', '', 'casual', 'algodon', 'recto', 600, '', 0),
(38, 'pantalon amarillo recto', 'femenino', 'sofisticado', 'adulto', 'amarillo', 'pantalon', '', '', 'semiformal', 'seda', 'recto', 499, '', 0),
(39, 'pantalon rojo recto', 'femenino', 'sofisticado', 'adulto', 'rojo', 'pantalon', '', '', 'semiformal', 'seda', 'recto', 499, '', 0),
(40, 'pantalon beige con cinturon', 'masculino', 'urbano', 'adulto', 'beige', 'pantalon', '', '', 'casual', 'algodon', 'recto', 549, '', 0),
(41, 'pantalon gris con cadena', 'masculino', 'clasico', 'adulto', 'gris', 'pantalon', '', '', 'semiformal', 'seda', 'slim', 349, '', 0),
(42, 'pants grises claro', 'masculino', 'urbano', 'joven', 'gris', 'pantalon', '', '', 'casual', 'algodon', 'pants', 229, '', 0),
(43, 'pantalon rosa acampanado', 'femenino', 'boho', 'adulto', 'rosa', 'pantalon', '', '', 'semiformal', 'seda', 'bota', 699, '', 0),
(44, 'pantalon gris oscuro rayado', 'masculino', 'clasico', 'adulto', 'gris', 'pantalon', '', '', 'formal', 'lana', 'formal', 349, '', 0),
(45, 'Pantalon Corte Tipo Bota Gris', 'femenino', 'vintage', 'joven', 'gris', 'pantalon', 'invierno', '', 'casual', 'lana', 'bota', 350, '', 0),
(46, 'Camisa para mujer de manga larga y botones color negro con estampado ', 'femenino', 'vintage', 'adulto', 'negro', 'playera', 'otono', '', 'semiformal', 'seda', 'manga larga', 389, '', 0),
(47, 'pantalon gris claro recto', 'femenino', 'vintage', 'adulto', 'gris', 'pantalon', '', '', 'casual', 'algodon', 'recto', 499, '', 0),
(48, 'shorts grises comodos', 'femenino', 'natural', 'joven', 'gris', 'short', 'verano', '', 'casual', 'algodon', 'tradicional', 239, '', 0),
(49, 'pantalon de cuadros tinto', 'femenino', 'hipster', 'adulto', 'vino', 'pantalon', '', '', 'casual', 'algodon', 'skinny', 349, '', 0),
(50, 'Playera de hombre color negro manga corta', 'masculino', 'natural', 'joven', 'negro', 'playera', 'verano', '', 'casual', 'algodon', 'camiseta', 199, '', 0),
(51, 'Playera de hombre color rojo manga corta', 'masculino', 'natural', 'adulto', 'rojo', 'playera', 'verano', '', 'casual', 'algodon', 'camiseta', 129, '', 0),
(52, 'Playera de hombre color azul marino', 'masculino', 'natural', 'joven', 'azul marino', 'playera', 'verano', '', '', 'poliester', 'camiseta', 159, '', 0),
(53, 'Shorts de mujer color rojo', 'femenino', 'creativo', 'joven', 'rojo', 'short', 'verano', '', 'casual', 'algodon', 'tradicional', 229, '', 0),
(54, 'Playera de hombre color blanco de manga corta', 'masculino', 'natural', 'joven', 'blanco', 'playera', 'verano', '', 'casual', 'poliester', 'camiseta', 189, '', 0),
(55, 'Playera de hombre sin mangas color azul marino', 'masculino', 'natural', 'adulto', 'azul marino', 'playera', 'verano', '', 'casual', 'poliester', 'tank top', 169, '', 0),
(56, 'Short de mujer de mezclilla', 'femenino', 'natural', 'joven', 'azul celeste', 'short', 'verano', '', 'casual', 'mezclilla', 'tradicional', 299, '', 0),
(57, 'Playera para hombre de rayas color gris y azul', 'masculino', 'grunge', 'joven', 'azul', 'playera', 'invierno', '', 'casual', 'algodon', 'manga larga', 259, '', 0),
(58, 'Playera para hombre color amarillo de manga corta', 'masculino', 'natural', 'joven', 'amarillo', 'playera', 'verano', '', 'casual', 'poliester', 'camiseta', 189, '', 0),
(59, 'Playera para hombre color azul de manga corta', 'masculino', 'natural', 'joven', 'azul', 'playera', 'verano', '', 'casual', 'algodon', 'camiseta', 239, '', 0),
(60, 'Camisa Morada Manga Corta', 'masculino', 'urbano', 'joven', 'morado', 'playera', 'otono', '', 'casual', 'lino', 'camiseta', 299, '', 0),
(61, 'Short para mujer de mezclilla', 'femenino', 'natural', 'joven', 'azul', 'short', 'verano', '', 'casual', 'mezclilla', 'tradicional', 299, '', 0),
(62, 'Short para mujer color negro', 'femenino', 'urbano', 'joven', 'negro', 'short', 'verano', 'deportes', 'casual', 'licra', 'mini short', 179, '', 0),
(63, 'Short para mujer amarillo con cinturon', 'femenino', 'creativo', 'joven', 'amarillo', 'short', 'verano', '', 'casual', 'algodon', 'tradicional', 339, '', 0),
(64, 'Short para mujer color beige con cinturon', 'femenino', 'boho', 'joven', 'beige', 'short', 'primavera', '', 'casual', 'seda', 'tradicional', 359, '', 0),
(65, 'Short para mujer con moño color verde', 'femenino', 'hipster', 'joven', 'verde', 'short', 'primavera', '', 'casual', 'seda', 'tradicional', 239, '', 0),
(66, 'Short para hombre color naranja', 'masculino', 'creativo', 'joven', 'naranja', 'short', 'verano', '', 'casual', 'licra', 'bermuda', 219, '', 0),
(67, 'Short para hombre color negro', 'masculino', 'urbano', 'joven', 'negro', 'short', 'verano', 'deportes', 'casual', 'licra', 'bermuda', 269, '', 0),
(68, 'Short para mujer color blanco', 'femenino', 'hipster', 'joven', 'blanco', 'short', 'primavera', '', 'casual', 'algodon', 'tradicional', 258, '', 0),
(69, 'Short largo para mujer color cafe', 'femenino', 'vanguardista', 'adulto', 'cafe', 'short', 'primavera', '', 'semiformal', 'algodon', 'bermuda', 319, '', 0),
(70, 'Blusa para mujer de manga larga con estampado irregular color anaranjado', 'femenino', 'artsy', 'adulto', 'naranja', 'playera', 'otono', '', 'casual', 'poliester', 'manga larga', 339, '', 0),
(71, 'Falda color rojo circular con moño', 'femenino', 'dramatico', 'joven', 'rojo', 'falda', 'primavera', '', 'casual', 'algodon', 'circular', 499, '', 0),
(72, 'Falda color negro con cadena', 'femenino', 'gotico', 'joven', 'negro', 'falda', 'verano', '', 'casual', 'algodon', 'tipo a', 399, '', 0),
(73, 'Falda color rosa con moños', 'femenino', 'girly', 'joven', 'rosa', 'falda', 'primavera', '', 'casual', 'poliester', 'plisada', 359, '', 0),
(74, 'Falda color gris plisada', 'femenino', 'preppy', 'joven', 'gris', 'falda', 'otono', '', 'semiformal', 'algodon', 'plisada', 299, '', 0),
(75, 'Falda color verde con puntos negros asimetrica', 'femenino', 'vanguardista', 'adulto', 'verde', 'falda', 'primavera', '', 'casual', 'seda', 'entubada', 599, '', 0),
(76, 'Falda color azul marino', 'femenino', 'natural', 'joven', 'azul marino', 'falda', 'verano', '', 'casual', 'licra', 'tipo a', 299, '', 0),
(77, 'Falda color rojo entubada', 'femenino', 'dramatico', 'joven', 'rojo', 'falda', 'primavera', '', 'casual', 'poliester', 'entubada', 539, '', 0),
(78, 'Falda color rojo circular', 'femenino', 'dramatico', 'joven', 'rojo', 'falda', 'primavera', '', 'casual', 'poliester', 'circular', 599, '', 0),
(79, 'Falda Rosada Con Botones', 'femenino', 'urbano', 'joven', 'rosa', 'falda', 'primavera', '', 'casual', 'algodon', 'recta', 300, '', 0),
(80, 'Falda blanca con botones', 'femenino', 'natural', 'joven', 'blanco', 'falda', 'verano', '', 'casual', 'poliester', 'recta', 340, '', 0),
(81, 'Blusa para mujer de botones y manga larga con estampado de circulos negros', 'femenino', 'artsy', 'joven', 'negro', 'playera', 'otono', '', 'casual', 'algodon', 'manga larga', 359, '', 0),
(82, 'Camisa para hombre de manga corta y botones con rayas verticales de diferentes colores', 'masculino', 'artsy', 'adulto', 'amarillo', 'playera', 'verano', '', 'casual', 'poliester', 'camisa', 279, '', 0),
(83, 'Playera para hombre de manga larga color gris y vino', 'masculino', 'grunge', 'joven', 'gris', 'playera', 'invierno', '', 'casual', 'poliester', 'manga larga', 239, '', 0),
(84, 'Playera para hombre de manga larga color blanco y rojo', 'masculino', 'grunge', 'joven', 'rojo', 'playera', 'invierno', '', 'casual', 'algodon', 'manga larga', 229, '', 0),
(85, 'Sueter para hombre con capucha color verde', 'masculino', 'urbano', 'adulto', 'verde oscuro', 'sueter', 'invierno', '', 'casual', 'poliester', 'sudadera', 369, '', 0),
(86, 'Camisa para hombre de manga larga color negro', 'masculino', 'clasico', 'adulto', 'negro', 'playera', '', 'elegante', 'formal', 'algodon', 'camisa', 389, '', 0),
(87, 'Playera para hombre de rayas blanco y negro de manga larga', 'masculino', 'grunge', 'joven', 'negro', 'playera', 'invierno', '', 'casual', 'poliester', 'manga larga', 229, '', 0),
(88, 'Saco para traje de hombre color negro', 'masculino', 'clasico', 'adulto', 'negro', 'sueter', '', 'elegante', 'formal', 'algodon', 'saco', 599, '', 0),
(89, 'Saco para traje de hombre color azul marino', 'masculino', 'clasico', 'adulto', 'azul marino', 'sueter', '', 'elegante', 'formal', 'poliester', 'saco', 649, '', 0),
(90, 'Saco para traje de hombre color tinto', 'masculino', 'clasico', 'adulto', 'vino', 'sueter', '', 'elegante', 'formal', 'algodon', 'saco', 699, '', 0),
(91, 'Pantalon de mezclilla para hombre', 'masculino', 'hipster', 'adulto', 'azul marino', 'pantalon', '', '', 'semiformal', 'mezclilla', 'slim', 449, '', 0),
(92, 'Pantalon para hombre de mezclilla roto', 'masculino', 'urbano', 'joven', 'azul celeste', 'pantalon', '', '', 'casual', 'mezclilla', 'skinny', 449, '', 0),
(93, 'Pantalon de mezclilla holgado para hombre ', 'masculino', 'urbano', 'adulto', 'azul celeste', 'pantalon', '', '', 'casual', 'mezclilla', 'recto', 349, '', 0),
(94, 'Pantalon para hombre color negro', 'masculino', 'grunge', 'joven', 'negro', 'pantalon', '', '', 'casual', 'mezclilla', 'skinny', 499, '', 0),
(95, 'Pantalon de mezclilla para mujer', 'femenino', 'natural', 'joven', 'azul celeste', 'pantalon', '', '', 'casual', 'mezclilla', 'skinny', 299, '', 0),
(96, 'Blusa color naranja de botones con estampado de rombos blancos y grises', 'femenino', 'preppy', 'joven', 'naranja', 'playera', 'otono', '', 'casual', 'lana', '', 329, '', 0),
(97, 'Sueter para mujer color cafe y blanco', 'femenino', 'natural', 'joven', 'cafe', 'sueter', 'invierno', '', 'casual', 'lana', 'tejido', 329, '', 0),
(98, 'Sueter para mujer color gris, blanco y gris oscuro', 'femenino', 'natural', 'joven', 'gris', 'sueter', 'invierno', '', 'casual', 'lana', 'tejido', 320, '', 0),
(99, 'Sueter para hombre con capucha color gris', 'masculino', 'natural', 'adulto', 'gris', 'sueter', 'invierno', 'deportes', 'casual', 'algodon', 'sudadera', 340, '', 0),
(100, 'Sueter para hombre con capucha color negro', 'masculino', 'urbano', 'joven', 'negro', 'sueter', 'invierno', '', 'casual', 'lana', 'tejido', 350, '', 0),
(101, 'Blusa para mujer con manga media de holanes, color blanco con detalles negros y un moño', 'femenino', 'preppy', 'joven', 'blanco', 'playera', 'primavera', '', 'casual', 'poliester', '', 360, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_tallas` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `XS` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `correo_electronico`, `password`) VALUES
(1, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `comprado`
--
ALTER TABLE `comprado`
  ADD PRIMARY KEY (`id_comprar`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `listadedeseos`
--
ALTER TABLE `listadedeseos`
  ADD PRIMARY KEY (`id_listadedeseos`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_tallas`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprado`
--
ALTER TABLE `comprado`
  MODIFY `id_comprar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listadedeseos`
--
ALTER TABLE `listadedeseos`
  MODIFY `id_listadedeseos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_tallas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comprado`
--
ALTER TABLE `comprado`
  ADD CONSTRAINT `comprado_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comprado_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `listadedeseos`
--
ALTER TABLE `listadedeseos`
  ADD CONSTRAINT `listadedeseos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `listadedeseos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD CONSTRAINT `tallas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
