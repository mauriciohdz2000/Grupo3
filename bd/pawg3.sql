-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2021 a las 02:11:56
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pawg6`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `imagen_cate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `imagen_cate`) VALUES
(8, 'SAMSUNG', 'SAMSUNG.jpeg'),
(9, 'LG', 'LG.jpg'),
(10, 'XIAOMI', 'XIAOMI.jpg'),
(11, 'APPLE', 'APPLE.jpg'),
(12, 'SONY', 'SONY.jpg'),
(13, 'HUAWEI', 'HUAWEI.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio_compra` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `imagen_cate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio_compra`, `cantidad`, `precio_venta`, `imagen_cate`) VALUES
(5, 'SAMSUNG', 'samsung j7 prime', 280, 10, 300, 'SAMSUNG.jpg'),
(6, 'XIAOMI', 'xiaomi redmi pocox3 NFC', 320, 10, 365, 'XIAOMI.jpg'),
(7, 'HUAWEI', 'huawei p30 pro', 290, 10, 350, 'HUAWEI.jpeg'),
(8, 'LG', 'lg k40 ', 195, 10, 220, 'LG.jpg'),
(9, 'SONY', 'sony lp', 100, 10, 130, 'SONY.jpeg'),
(10, 'APPLE', 'apple 40pro max', 439, 10, 550, 'APPLE.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
(10, 'LAEDICION SA.SV', 'San Salvador', '7817-2165', 'laedicion@gmail.com'),
(11, 'LACONSTACIA', 'San Juan Nonualco', '7323-3412', 'constancia@gmail.com'),
(12, 'HMNOSJHON', 'Houstin Texas', '+1 (501) ', 'jhon@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `email` text NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `foto` text NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `email`, `clave`, `token`, `tipo`, `foto`, `estado`) VALUES
(1, 'mauricio', 'mauricio@gmail.com', '$2y$10$sLXhfEcX5.1q3k6H2vzz1u0CavuB19t1M288GSJjR1x2wMQtCAo0e', NULL, 1, '', 1),
(19, 'ronald', '', '$2y$10$L./qMm6rnt.alO4oDbl/ROPGxUcbxLMUCaUz6KUklbEMwA7cNFHTq', NULL, 1, 'ronald.jpg', 1),
(20, 'abel', '', '$2y$10$YaEbN97TZUn28KZJ2SBODuuI1xY6mjo/g3ssJSsMIPhhG3SvSyD42', NULL, 2, 'abel.jpeg', 1),
(22, 'admin', 'admin@gmail.com', '$2y$10$6M91.3sanox4NCi3wON9LO6GNhMYm37usdeOozlZfakcZt/OIlxWa', NULL, 1, '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
