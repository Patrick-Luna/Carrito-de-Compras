-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2022 a las 08:08:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda2022n`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL,
  `usr` varchar(50) NOT NULL,
  `pwd` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `fnacimiento`, `detalle`, `usr`, `pwd`) VALUES
(1, ' Javier', 'Ramirez', '2022-02-14', ' Estudiante', '11', '11'),
(3, 'av', 'ab', '2022-02-15', 'ab', 'ab', 'ab'),
(5, 'Carmen', 'Santos', '2022-02-16', ' estudiantes', '12', '12'),
(7, ' alex', ' adrian', '2022-02-25', ' diriri', ' alex', ' alex'),
(8, ' qewq', ' ewqewq', '2022-02-26', ' asdsa', ' 13', ' 13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `idd` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioventa` decimal(10,0) DEFAULT NULL,
  `importe` decimal(10,0) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idfactura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`idd`, `cantidad`, `precioventa`, `importe`, `idproducto`, `idfactura`) VALUES
(1, 1, '41', '41', 0, 1),
(2, 1, '41', '41', 0, 2),
(3, 1, '41', '41', 0, 3),
(4, 1, '10', '10', 0, 4),
(5, 1, '10', '10', 0, 5),
(6, 1, '10', '10', 0, 6),
(7, 3, '10', '30', 0, 7),
(8, 6, '2', '12', 1, 7),
(9, 2, '15', '30', 2, 7),
(10, 4, '10', '40', 0, 8),
(11, 2, '2', '4', 1, 8),
(12, 1, '15', '15', 2, 8),
(13, 4, '10', '40', 0, 9),
(14, 2, '2', '4', 1, 9),
(15, 1, '15', '15', 2, 9),
(16, 15, '10', '150', 0, 10),
(17, 3, '2', '6', 1, 10),
(18, 2, '15', '30', 2, 10),
(19, 15, '10', '150', 0, 11),
(20, 3, '2', '6', 1, 11),
(21, 2, '15', '30', 2, 11),
(22, 4, '2', '8', 4, 11),
(23, 2, '1', '2', 5, 11),
(24, 15, '10', '150', 0, 12),
(25, 3, '2', '6', 1, 12),
(26, 2, '15', '30', 2, 12),
(27, 4, '2', '8', 4, 12),
(28, 2, '1', '2', 5, 12),
(29, 15, '10', '150', 0, 13),
(30, 3, '2', '6', 1, 13),
(31, 2, '15', '30', 2, 13),
(32, 4, '2', '8', 4, 13),
(33, 2, '1', '2', 5, 13),
(34, 15, '10', '150', 0, 14),
(35, 3, '2', '6', 1, 14),
(36, 2, '15', '30', 2, 14),
(37, 4, '2', '8', 4, 14),
(38, 3, '1', '3', 5, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idf` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `IVA` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idf`, `fecha`, `subtotal`, `IVA`, `total`, `idcliente`) VALUES
(1, '2022-02-16', '41', '5', '46', 3),
(2, '2022-02-16', '41', '5', '46', 3),
(3, '2022-02-16', '41', '5', '46', 3),
(4, '2022-02-20', '10', '1', '11', 1),
(5, '2022-02-20', '10', '1', '11', 1),
(6, '2022-02-24', '10', '1', '11', 1),
(7, '2022-02-24', '72', '9', '81', 1),
(8, '2022-02-24', '59', '7', '66', 3),
(9, '2022-02-24', '59', '7', '66', 5),
(10, '2022-02-24', '186', '22', '208', 1),
(11, '2022-02-24', '196', '24', '220', 1),
(12, '2022-02-24', '196', '24', '220', 5),
(13, '2022-02-24', '196', '24', '220', 5),
(14, '2022-02-24', '197', '24', '221', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `detalle` varchar(50) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `detalle`, `precio`, `stock`, `foto`) VALUES
(0, 'Pan', 'Supan', 'Lo mejor para tu cafe', '10', 21, 'pan.jpg'),
(1, 'salchicha', 'vitaye', 'delishus', '2', 10, 'salchi.jpg'),
(2, 'Pollo', 'Pronac', 'Si lo ve caro no compre', '15', 15, 'pollo.jpg'),
(4, 'Carne', 'intiwi', 'carnico', '2', 10, 'carne.jpg'),
(5, 'Fideos', 'Alpaca', 'churin', '1', 7, 'fideos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `usuario`, `clave`) VALUES
(1, 'javier', 'ramirez', 'javi', '1212'),
(6, '', '', ' 1234', ' 1234'),
(7, ' alexx', ' adrian', ' alex', ' alex'),
(8, ' 213', ' 32132', ' 1231', ' 1321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idfactura` (`idfactura`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idf`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`idf`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
