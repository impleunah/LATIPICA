-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2020 a las 04:48:57
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_tipica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Total_Compra` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `id_proveedor`, `idarticulo`, `id_presentacion`, `Cantidad`, `Precio`, `Total_Compra`, `estado`) VALUES
(9, 54, 22, 3, 90, '100.00', '999.99', 1),
(10, 41, 23, 2, 2, '1.00', '2.00', 1),
(11, 41, 22, 3, 3, '2.00', '6.00', 1),
(12, 41, 22, 2, 5, '4.00', '20.00', 1),
(13, 54, 22, 3, 11, '100.00', '999.99', 1),
(14, 41, 32, 3, 2, '2.00', '4.00', 1),
(15, 41, 29, 11, 1, '11.00', '999.99', 1),
(16, 41, 30, 3, 7, '29.00', '144.00', 1),
(17, 63, 32, 4, 4, '44.00', '176.00', 1),
(18, 41, 31, 3, 3, '222.00', '666.00', 1),
(19, 54, 31, 1, 3, '1.51', '4.53', 1),
(20, 41, 30, 4, 3, '2.04', '6.12', 1),
(21, 41, 27, 1, 100, '100.00', '10000.00', 1),
(22, 41, 27, 1, 100, '100.10', '10010.00', 1),
(23, 41, 27, 1, 2000, '100.00', '200000.00', 1);

--
-- Disparadores `compras`
--
DELIMITER $$
CREATE TRIGGER `compra` AFTER INSERT ON `compras` FOR EACH ROW BEGIN
 UPDATE tbl_articulo SET stock = stock + NEW.Cantidad 
 WHERE tbl_articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cod_factura` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(5,2) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `IVA` float(10,2) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `ventas_netas` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
 UPDATE tbl_articulo SET stock = stock - NEW.cantidad 
 WHERE tbl_articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta_1`
--

CREATE TABLE `detalle_venta_1` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_v` varchar(100) NOT NULL,
  `IVA` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `descu` varchar(100) NOT NULL,
  `cod_factura` bigint(20) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `ventas_netas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta_1`
--

INSERT INTO `detalle_venta_1` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_v`, `IVA`, `total`, `descu`, `cod_factura`, `subtotal`, `ventas_netas`) VALUES
(52, 6, 22, 1, '2', '5', '4', '1', 1, '3', '2'),
(54, 7, 22, 1, '555.99', '83.3985', '639.3885', '0', 6, '555.99', '555.99'),
(55, 8, 22, 1, '555.99', '79.172976', '574.004075', '61.1589', 7, '555.99', '494.8311'),
(56, 9, 22, 2, '555.99', '166.797', '1278.777', '0', 8, '1111.98', '1111.98'),
(57, 10, 22, 1, '555.99', '83.3985', '639.3885', '0', 9, '555.99', '555.99'),
(58, 11, 22, 1, '555.99', '1084.1805', '8312.0505', '0', 10, '7227.87', '7227.87'),
(59, 11, 22, 12, '555.99', '1084.1805', '8312.0505', '0', 10, '7227.87', '7227.87'),
(60, 12, 22, 5, '555.99', '416.992499', '3196.94249', '0', 11, '2779.95', '2779.95'),
(61, 13, 22, 1, '555.99', '83.3985', '639.3885', '0', 12, '555.99', '555.99'),
(62, 14, 22, 1, '555.99', '83.3985', '639.3885', '0', 13, '555.99', '555.99'),
(63, 15, 22, 1, '555.99', '83.3985', '639.3885', '0', 14, '555.99', '555.99'),
(64, 16, 22, 1, '555.99', '83.3985', '639.3885', '0', 15, '555.99', '555.99'),
(65, 17, 22, 1, '555.99', '83.3985', '639.3885', '0', 16, '555.99', '555.99'),
(66, 18, 22, 1, '555.99', '74.224665', '569.055765', '61.1589', 17, '555.99', '494.8311'),
(67, 19, 22, 1, '555.99', '83.3985', '639.3885', '0', 18, '555.99', '555.99'),
(68, 20, 22, 1, '555.99', '83.3985', '639.3885', '0', 19, '555.99', '555.99'),
(69, 21, 22, 1, '555.99', '83.3985', '639.3885', '0', 20, '555.99', '555.99'),
(70, 22, 22, 1, '555.99', '83.3985', '639.3885', '0', 21, '555.99', '555.99'),
(71, 23, 22, 1, '555.99', '83.3985', '639.3885', '0', 22, '555.99', '555.99'),
(72, 24, 22, 1, '555.99', '83.3985', '639.3885', '0', 23, '555.99', '555.99'),
(73, 25, 22, 1, '555.99', '83.3985', '639.3885', '0', 24, '555.99', '555.99'),
(74, 26, 22, 1, '555.99', '83.3985', '639.3885', '0', 25, '555.99', '555.99'),
(75, 27, 22, 1, '555.99', '83.3985', '639.3885', '0', 26, '555.99', '555.99'),
(76, 28, 22, 1, '555.99', '83.3985', '639.3885', '0', 27, '555.99', '555.99'),
(77, 29, 22, 1, '555.99', '83.3985', '639.3885', '0', 28, '555.99', '555.99'),
(78, 30, 22, 4, '555.99', '333.594', '2557.554', '0', 29, '2223.96', '2223.96'),
(79, 31, 22, 1, '555.99', '83.3985', '639.3885', '0', 30, '555.99', '555.99'),
(80, 32, 22, 1, '555.99', '83.3985', '639.3885', '0', 31, '555.99', '555.99'),
(81, 33, 22, 1, '555.99', '83.3985', '639.3885', '0', 32, '555.99', '555.99'),
(82, 34, 22, 1, '555.99', '83.3985', '639.3885', '0', 33, '555.99', '555.99'),
(83, 35, 22, 1, '555.99', '83.3985', '639.3885', '0', 34, '555.99', '555.99'),
(84, 36, 22, 1, '555.99', '83.3985', '639.3885', '0', 35, '555.99', '555.99'),
(85, 37, 22, 1, '555.99', '83.3985', '639.3885', '0', 36, '555.99', '555.99'),
(86, 38, 22, 1, '555.99', '83.3985', '639.3885', '0', 37, '555.99', '555.99'),
(87, 39, 22, 1, '555.99', '83.3985', '639.3885', '0', 38, '555.99', '555.99'),
(88, 40, 22, 1, '555.99', '266.8752', '1934.8452', '0', 39, '1667.97', '1667.97'),
(89, 40, 22, 1, '555.99', '266.8752', '1934.8452', '0', 39, '1667.97', '1667.97'),
(90, 40, 22, 1, '555.99', '266.8752', '1934.8452', '0', 39, '1667.97', '1667.97'),
(91, 41, 22, 2, '555.99', '2168.361', '16624.101', '0', 40, '14455.74', '14455.74'),
(92, 41, 22, 23, '555.99', '2168.361', '16624.101', '0', 40, '14455.74', '14455.74'),
(93, 41, 22, 1, '555.99', '2168.361', '16624.101', '0', 40, '14455.74', '14455.74'),
(94, 42, 29, 20, '2.00', '6', '46', '0', 41, '40', '40'),
(95, 43, 22, 1, '555.99', '110.785776', '803.196876', '85.5789', 42, '777.99', '692.4111'),
(96, 43, 23, 1, '222.00', '110.785776', '803.196876', '85.5789', 42, '777.99', '692.4111'),
(97, 3, 22, 1, '555.99', '83.3985', '639.3885', '0', 2, '555.99', '555.99'),
(98, 4, 22, 1, '555.99', '83.3985', '639.3885', '0', 3, '555.99', '555.99'),
(99, 5, 22, 1, '555.99', '83.3985', '639.3885', '0', 4, '555.99', '555.99'),
(100, 6, 22, 1, '555.99', '83.3985', '639.3885', '0', 5, '555.99', '555.99'),
(101, 7, 22, 1, '555.99', '83.3985', '639.3885', '0', 6, '555.99', '555.99'),
(102, 8, 22, 1, '555.99', '74.224665', '569.055765', '61.1589', 7, '555.99', '494.8311'),
(103, 9, 27, 199, '200.25', '5977.4625', '45827.2125', '0', 8, '39849.75', '39849.75'),
(104, 10, 27, 1, '200.25', '93.375', '715.875', '0', 9, '622.5', '622.5'),
(105, 10, 23, 1, '222.00', '93.375', '715.875', '0', 9, '622.5', '622.5'),
(106, 10, 27, 1, '200.25', '93.375', '715.875', '0', 9, '622.5', '622.5'),
(107, 11, 32, 100, '2.00', '26.7', '204.7', '22', 10, '200', '178'),
(108, 12, 27, 200, '200.25', '5346.675', '40991.175', '4405.5', 11, '40050', '35644.5'),
(109, 13, 27, 20, '200.25', '600.75', '4605.75', '0', 12, '4005', '4005'),
(110, 14, 27, 1, '200.25', '30.0374999', '230.2875', '0', 13, '200.25', '200.25'),
(111, 15, 27, 1, '200.25', '30.0374999', '230.2875', '0', 14, '200.25', '200.25'),
(112, 16, 27, 5, '200.25', '150.1875', '1151.4375', '0', 15, '1001.25', '1001.25');

--
-- Disparadores `detalle_venta_1`
--
DELIMITER $$
CREATE TRIGGER `StockVenta` AFTER INSERT ON `detalle_venta_1` FOR EACH ROW BEGIN
 UPDATE tbl_articulo SET stock = stock - NEW.cantidad 
 WHERE tbl_articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `id_permiso_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--

CREATE TABLE `tbl_articulo` (
  `idarticulo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion1` varchar(256) DEFAULT NULL,
  `codigo` varchar(15) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `excento` enum('si','no','','') NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`idarticulo`, `nombre`, `descripcion1`, `codigo`, `precio_venta`, `fecha_fabricacion`, `fecha_expiracion`, `excento`, `id_presentacion`, `imagen`, `condicion`, `stock`) VALUES
(22, 'dsad', 'dsadsad', '32132', '555.99', '2020-05-18', '2020-05-11', 'si', 3, NULL, 0, 45),
(23, 'dsadsad', 'dsadas', '2220', '222.00', '2021-06-30', '2021-06-30', 'si', 2, '', 1, 0),
(24, 'dsadsad', 'aaaa', '22222', '3.00', '2020-05-23', '2020-05-24', 'si', 2, '', 1, 0),
(25, 'dsad', '222', '2222', '11.00', '2020-05-21', '2020-05-23', 'si', 1, '', 1, 0),
(26, 'qqqq', '22', '2222', '222.00', '0000-00-00', '0000-00-00', 'si', 2, '', 1, 0),
(27, 'kevin', 'manco', '11111', '200.25', '2020-06-12', '2019-06-19', 'si', 1, '', 1, 1772),
(28, 'qwe', 'qwe', '21', '2.00', '2020-05-30', '2020-05-31', 'si', 4, '', 1, 0),
(29, 'w', 'q', '2222', '2.00', '0000-00-00', '0000-00-00', 'si', 2, '', 1, 30),
(30, 'sss', '22', '222', '22.00', '0000-00-00', '0000-00-00', 'si', 3, '', 1, 15),
(31, 'wwww', 'eee', '222', '2.00', '0000-00-00', '0000-00-00', 'si', 3, '', 1, 5),
(32, 'asd', 'asd', '2222', '2.00', '2020-05-30', '2020-05-31', 'si', 4, '', 1, 2),
(33, 'sdfsdf', 'sdgsdf', 'asda21', '140.00', '2020-05-30', '2020-12-30', 'si', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacoras`
--

CREATE TABLE `tbl_bitacoras` (
  `id_bitacora` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `objeto` varchar(200) NOT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Antes` varchar(200) NOT NULL,
  `Despues` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_bitacoras`
--

INSERT INTO `tbl_bitacoras` (`id_bitacora`, `id_usuario`, `objeto`, `accion`, `descripcion`, `fecha`, `Antes`, `Despues`) VALUES
(29, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 03:25:45', '', ''),
(30, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 03:25:53', '', ''),
(32, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 11:51:48', '', ''),
(33, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 11:51:55', '', ''),
(34, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 11:52:02', '', ''),
(35, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 11:52:08', '', ''),
(36, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:08:18', '', ''),
(37, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:08:27', '', ''),
(38, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:34:23', '', ''),
(39, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:34:28', '', ''),
(40, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:34:37', '', ''),
(41, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:37:52', '', ''),
(42, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:38:37', '', ''),
(43, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:41:38', '', ''),
(44, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:41:49', '', ''),
(45, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:42:50', '', ''),
(46, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:43:32', '', ''),
(47, 1, 'Se a editado un  rol ', 'editado ', 'Sea modificado uno de los rol ', '2020-05-27 15:43:41', '', ''),
(48, 1, 'Se creo un nuevo Rol', 'creado', 'Se creo un nuevo Rol para los usuarios', '2020-05-27 15:43:57', '', ''),
(49, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:50:16', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(50, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:17', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(51, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:33', 'MARVIN', 'MARVINEEEE'),
(52, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:33', '1', '11'),
(53, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:33', 'marvinmn32@gmil.com', 'marvinmn32@gmil.comv'),
(54, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:33', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(55, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:48', 'MARVINEEEE', 'MARVIN'),
(56, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 15:55:48', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(57, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-27 16:05:14', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(58, 12, 'Se creo un nuevo permiso ', 'creado ', 'Se creo un nuevo Permiso', '2020-05-28 01:57:56', '', ''),
(59, 12, 'Se creo un nuevo permiso ', 'creado ', 'Se creo un nuevo Permiso', '2020-05-28 02:09:49', '', ''),
(60, 12, 'Se creo un nuevo permiso ', 'creado ', 'Se creo un nuevo Permiso', '2020-05-28 02:19:55', '', ''),
(61, 12, 'Se creo un nuevo permiso ', 'creado ', 'Se creo un nuevo Permiso', '2020-05-28 02:20:13', '', ''),
(62, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 02:24:03', '', ''),
(63, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 02:33:37', '', ''),
(64, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 02:33:43', '', ''),
(65, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 03:56:04', '', ''),
(66, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 03:58:33', '', ''),
(67, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:00:22', '', ''),
(68, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:00:49', '', ''),
(69, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 04:06:11', '1', '2'),
(70, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 04:06:11', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(71, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:22:30', '', ''),
(72, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:26:44', '', ''),
(73, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:26:59', '', ''),
(74, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 04:27:41', '', ''),
(75, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 12:21:14', '', ''),
(76, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 12:29:22', '', ''),
(77, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 12:29:27', '', ''),
(78, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 12:29:33', '', ''),
(79, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:27:26', '', ''),
(80, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:28:08', '', ''),
(81, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:32:15', '', ''),
(82, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:32:21', '', ''),
(83, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:32:26', '', ''),
(84, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:32:31', '', ''),
(85, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:34:44', '', ''),
(86, 12, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-28 13:35:04', '', ''),
(87, 12, 'Se creo un nuevo permiso ', 'creado ', 'Se creo un nuevo Permiso', '2020-05-28 14:26:19', '', ''),
(88, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:12:30', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(89, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:13:35', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', '12345'),
(90, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:13:49', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '12345'),
(91, 11, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:14:22', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'ssss'),
(92, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:14:36', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'aaaa'),
(93, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:15:21', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '12345'),
(94, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:15:32', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '12345'),
(95, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:21:43', '61be55a8e2f6b4e172338bddf184d6dbee29c98853e0a0485ecee7f27b9af0b4', 'qweas'),
(96, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:23:52', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'qweas'),
(97, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:25:10', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(98, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:28:48', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(99, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:29:43', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(100, 1, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 16:31:35', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(101, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-28 18:51:55', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweas'),
(102, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:26:53', 'a', 'Se edito un campo de operaciones '),
(103, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:26:58', 's', 'sq'),
(104, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:26:58', 'a', 'Se edito un campo de operaciones '),
(105, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:27:04', 's', 'sw'),
(106, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:27:05', 'a', 'Se edito un campo de operaciones '),
(107, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:27:21', 's', 's2'),
(108, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-29 21:27:21', 'a', 'Se edito un campo de operaciones '),
(109, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-29 21:37:08', '', ''),
(110, 12, 'empresa ', 'EDITADO', 'Se edito un campo de empresa ', '2020-05-29 21:37:20', '0', '222222222'),
(111, 12, 'presentacion', 'CREADO', 'se creo una presentacion', '2020-05-30 00:12:34', '', ''),
(112, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:26:03', '', ''),
(113, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:30:07', '', ''),
(114, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:32:16', '', ''),
(115, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:33:41', '', ''),
(116, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:35:45', '', ''),
(117, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 00:37:13', '', ''),
(118, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-30 00:52:41', 's2', 's25'),
(119, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:11:01', '5', '1'),
(120, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:11:02', '1', '0'),
(121, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:12:19', '1', '2'),
(122, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:17:50', '1', '0'),
(123, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:26:35', '0', '1'),
(124, 1, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 16:26:47', '0', '1'),
(125, 12, 'parametros ', 'EDITADO', 'valor mínimo que tiene la contraseña', '2020-05-30 17:31:32', '4', '5'),
(126, 12, 'parametros ', 'EDITADO', 'Numero de preguntas para recuperar contraseña', '2020-05-30 17:37:24', '1', '4'),
(127, 12, 'parametros ', 'EDITADO', 'Numero de preguntas para recuperar contraseña', '2020-05-30 17:39:05', '4', '3'),
(128, 12, 'parametros ', 'EDITADO', 'valor mínimo que tiene la contraseña', '2020-05-30 17:45:23', '5', '7'),
(129, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 17:46:32', '1', '0'),
(130, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:27:27', 'KARLA', 'KEV'),
(131, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:27:27', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', 'qweasdzx'),
(132, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:28:33', 'fcd20dc1d9b6bec351ff4ec79c956dd59697b022fc2cdd34c034f621a96e6960', 'qweasdzx'),
(133, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:30:39', 'KEV', 'KARLA'),
(134, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:30:39', 'fcd20dc1d9b6bec351ff4ec79c956dd59697b022fc2cdd34c034f621a96e6960', 'qweasdzx'),
(135, 12, 'parametros ', 'EDITADO', 'valor mínimo que tiene la contraseña', '2020-05-30 18:34:46', '7', '5'),
(136, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:35:13', 'KARLA', 'KEV'),
(137, 12, 'Editar Usuario', 'Modifico', 'Modifico campos de usuario ', '2020-05-30 18:35:13', 'fcd20dc1d9b6bec351ff4ec79c956dd59697b022fc2cdd34c034f621a96e6960', 'qweas'),
(138, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 18:50:46', '0', '1'),
(139, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 18:50:46', '0', '1'),
(140, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-05-30 19:39:48', '', ''),
(141, 12, 'empresa ', 'EDITADO', 'Se edito un campo de empresa ', '2020-05-30 19:40:02', 'nose', 'nosex9'),
(142, 12, 'empresa ', 'EDITADO', 'Se edito un campo de empresa ', '2020-05-30 19:40:02', '0', ''),
(143, 12, 'presentacion', 'CREADO', 'se creo una presentacion', '2020-05-30 19:40:20', '', ''),
(144, 12, 'presentacion ', 'EDITADO', 'Se edito un campo de Presentaciones ', '2020-05-30 19:40:26', 'dfggfh', 'Se edito un campo de Presentaciones '),
(145, 12, 'descuento', 'CREADO', 'se creo un descuento', '2020-05-30 19:40:56', '', ''),
(146, 12, 'DESCUENTO ', 'EDITADO', 'Se edito un campo de descuento ', '2020-05-30 19:41:28', '1', '0.12'),
(147, 12, 'impuesto', 'CREADO', 'se creo un impuesto', '2020-05-30 19:43:10', '', ''),
(148, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:43:24', '0.07', 'Se edito un campo de impuesto '),
(149, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:43:29', '0.1', 'Se edito un campo de impuesto '),
(150, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:43:35', '0.07', 'Se edito un campo de impuesto '),
(151, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:43:45', '0.08', 'Se edito un campo de impuesto '),
(152, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:43:52', '0.03', 'Se edito un campo de impuesto '),
(153, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:44:06', '0.77', 'Se edito un campo de impuesto '),
(154, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:44:19', '0.14', 'Se edito un campo de impuesto '),
(155, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:44:42', '0.21', 'Se edito un campo de impuesto '),
(156, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:44:54', '0.28', 'Se edito un campo de impuesto '),
(157, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:45:13', '0.56', 'Se edito un campo de impuesto '),
(158, 12, 'impuesto ', 'EDITADO', 'Se edito un campo de impuesto ', '2020-05-30 19:45:21', '0.07', 'Se edito un campo de impuesto '),
(159, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-05-30 19:45:40', 'trtujr', 'trtujr45'),
(160, 12, 'Usuarios', 'CREADO', 'se creo un usuario', '2020-05-30 19:46:46', '', ''),
(161, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:48:09', '1', '0'),
(162, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:49:02', '0', '1'),
(163, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:49:02', '1', '0'),
(164, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:49:48', '1', '0'),
(165, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:17', '1', '0'),
(166, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:17', '1', '0'),
(167, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:17', '1', '0'),
(168, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:17', '1', '0'),
(169, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:36', '0', '1'),
(170, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:36', '0', '1'),
(171, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:37', '0', '1'),
(172, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:50:37', '0', '1'),
(173, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:52:04', '1', '0'),
(174, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:52:04', '0', '1'),
(175, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:52:40', '0', '1'),
(176, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:52:41', '1', '0'),
(177, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:53:25', '1', '0'),
(178, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:32', '1', '0'),
(179, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:32', '1', '0'),
(180, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:32', '1', '0'),
(181, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:32', '1', '0'),
(182, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:51', '0', '1'),
(183, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:51', '0', '1'),
(184, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:51', '0', '1'),
(185, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:51', '0', '1'),
(186, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:58', '1', '0'),
(187, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:54:58', '0', '1'),
(188, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:15', '0', '1'),
(189, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:15', '1', '0'),
(190, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:33', '1', '0'),
(191, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:43', '1', '0'),
(192, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:43', '1', '0'),
(193, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:43', '1', '0'),
(194, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:43', '1', '0'),
(195, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:54', '0', '1'),
(196, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:55:54', '0', '1'),
(197, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:20', '1', '0'),
(198, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:32', '1', '0'),
(199, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:42', '1', '0'),
(200, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:42', '1', '0'),
(201, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:55', '0', '1'),
(202, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:55', '0', '1'),
(203, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:56:55', '0', '1'),
(204, 1, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-05-30 19:58:19', '', ''),
(205, 1, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-05-30 19:58:29', '', ''),
(206, 1, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-05-30 19:58:37', '', ''),
(207, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:59:24', '1', '0'),
(208, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 19:59:55', '1', '0'),
(209, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:01:18', '1', '0'),
(210, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:01:18', '1', '0'),
(211, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:01:37', '0', '1'),
(212, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:01:37', '0', '1'),
(213, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:01:37', '0', '1'),
(214, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:02:10', '1', '0'),
(215, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:02:23', '1', '0'),
(216, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:02:48', '1', '0'),
(217, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:03:00', '1', '0'),
(218, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:03:00', '1', '0'),
(219, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:03:15', '0', '1'),
(220, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:03:15', '0', '1'),
(221, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:03:15', '0', '1'),
(222, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:40:35', '1', '0'),
(223, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:45:01', '0', '1'),
(224, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-05-30 20:45:01', '0', '1'),
(225, 1, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-05-30 20:45:18', '', ''),
(226, 1, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-05-30 20:45:28', '', ''),
(227, 12, 'impuesto', 'CREADO', 'se creo un impuesto', '2020-06-04 11:51:26', ' ', 'se creo un impuesto'),
(228, 12, 'impuesto', 'CREADO', 'se creo un impuesto', '2020-06-04 11:51:56', ' ', '0.34'),
(229, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-06-04 11:57:17', ' ', 'sss'),
(230, 12, 'roles ', 'EDITADO', 'Se edito un campo de Roles ', '2020-06-05 21:32:56', 'MARVIN', 'KEV'),
(231, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 21:34:22', '1', '0'),
(232, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 21:34:22', '1', '0'),
(233, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 21:34:57', '1', '0'),
(234, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 21:35:04', '0', '1'),
(235, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 21:49:39', '0', '1'),
(236, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 23:01:10', '0', '1'),
(237, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-05 23:01:10', '0', '1'),
(238, 12, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-06-05 23:19:51', '', ''),
(239, 12, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-06-05 23:19:58', '', ''),
(240, 12, 'pantallas', 'CREADO', 'se creo una pantalla', '2020-06-05 23:20:22', '', ''),
(241, 12, 'impuesto', 'CREADO', 'se creo un impuesto', '2020-06-06 01:12:03', ' ', '0.18'),
(242, 12, 'impuesto', 'CREADO', 'se creo un impuesto', '2020-06-06 01:12:12', ' ', '0.18'),
(243, 12, 'parametros ', 'EDITADO', 'Numero de preguntas para recuperar contraseña', '2020-06-06 07:28:43', '1', '2'),
(244, 12, 'empresa', 'CREADO', 'se creo una empresa', '2020-06-06 08:04:34', '', ''),
(245, 12, 'operaciones ', 'EDITADO', 'Se edito un campo de operaciones ', '2020-06-06 08:09:23', 'lic', 'imple'),
(246, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-06 08:14:48', '1', '0'),
(247, 12, 'roles_objeto ', 'EDITADO', 'Se edito un campo de Permisos de Usuario ', '2020-06-06 08:14:48', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `RTN` varchar(14) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nombre`, `correo`, `RTN`, `estado`) VALUES
(1, 'jaime Raul', 'jaime@yahoo.com', '12345', 0),
(2, 'Walmark', 'walmak@yahoo.com', '124558787 ', 1),
(3, 'especia<s', 'wnajera02@yahoo.com', '55 ', 0),
(4, 'Walter Alexander Najera M', 'wnajera02@yahoo.com', '55 ', 0),
(5, 'especia<s', 'wnajera02@yahoo.com', '55 ', 1),
(6, 'especia<s', 'wnajera02@yahoo.com', '22366276 ', 0),
(7, 'especia<s', 'wnajera02@yahoo.com', '22366276 ', 0),
(8, 'dasdasdas', 'rau_SS@ss.com', '31231232131232', 1),
(9, 'teeemo', 'dasdasd@s.ces', '22321321312321', 1),
(10, 'teeemo', 'dasdasd@s.ces', '22321321312321', 0),
(11, 'YASUO2', 'SDF@H.NB', '12342315123421', 1),
(12, 'TEMMO23', 'jaimewww@yahoo.com', ' ', 1),
(13, 'TEMMO23', 'TEMMO23@dasdsa.com', ' ', 1),
(14, 'karla garcia', 'karla.garcia@davivienda.com.hn', ' ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_descuento`
--

CREATE TABLE `tbl_descuento` (
  `id_descuento` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_descuento`
--

INSERT INTO `tbl_descuento` (`id_descuento`, `descripcion`, `estado`) VALUES
(3, '0.11', 1),
(4, '0.33', 0),
(5, '0.1', 0),
(6, '0.12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_direccion`
--

CREATE TABLE `tbl_direccion` (
  `tbl_direccion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_direccion`
--

INSERT INTO `tbl_direccion` (`tbl_direccion`, `id_cliente`, `direccion`) VALUES
(2, 1, 'la colonia'),
(3, 2, 'col.nueva santa rosa calle san antonio'),
(4, 3, '{ñp'),
(5, 4, '6yg'),
(6, 5, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(7, 6, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(8, 7, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(9, 8, 'dsadsadasdas'),
(10, 9, 'dsadsada'),
(11, 10, 'dsadsada'),
(12, 11, 'wef'),
(13, 12, 'asdasdasd'),
(14, 13, 'ewqewqe'),
(15, 14, 'xxxxxxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id_empresa` int(11) NOT NULL,
  `id_operacion` int(11) NOT NULL,
  `RTN` int(30) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `nombre_comercial` varchar(100) NOT NULL,
  `domicilio_1` varchar(100) NOT NULL,
  `domicilio_2` varchar(100) NOT NULL,
  `correo_1` varchar(50) NOT NULL,
  `correo_2` varchar(50) NOT NULL,
  `telefono_1` int(10) DEFAULT NULL,
  `telefono_2` int(10) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id_empresa`, `id_operacion`, `RTN`, `razon_social`, `nombre_comercial`, `domicilio_1`, `domicilio_2`, `correo_1`, `correo_2`, `telefono_1`, `telefono_2`, `estado`) VALUES
(5, 2, 2147483647, 'q', 'a', '1', '2', 'a@c.vo', '', 888888888, 222222222, 1),
(6, 1, 223221321, '22', 'as', 'dddd', '', 's@c.c', '', 333333333, 1111111, 1),
(7, 1, 2147483647, 'd@c.c', 'eqwe', 'ewqewqe', '', 'd@c.c', '', 333333333, 0, 1),
(8, 1, 2147483647, 'a@c.c', 'dsads', 'www', '', 'a@c.c', '', 111111111, 0, 1),
(9, 1, 222222, 'asdasdsa', 'dsadas', '', '', '', '', 0, 222222222, 1),
(10, 2, 2147483647, 'dddddddd', 'teemoo1', 'ewqewq', '', 'a@x.c', '', 222222222, 22222222, 1),
(11, 1, 2147483647, 'dasdas', 'temmo', 'a@x.c', '', 'a@x.c', '', 333333333, 0, 1),
(12, 1, 2147483647, 'nosex9', 'fjkghjfj', 'sdfdsf', 'fdgsd', 'afdgsdf@as.as', '', 124321232, 0, 0),
(13, 1, 2147483647, '22', 'sss', '222222222', '', 'a@d.com', '', 333333333, 0, 1),
(14, 2, 2147483647, '2ewqewqewq', 'dsadasd', '111111111', '', 'a2@d.com', '', 222222222, 0, 1),
(15, 1, 2147483647, 'sasv', 'comercia karla', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'karla@yahoo.com', 'karla2@yahoo.com', 888888888, 777777777, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas_serie`
--

CREATE TABLE `tbl_facturas_serie` (
  `cod_factura` bigint(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `idventa` int(11) NOT NULL,
  `id_reg_facturacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_facturas_serie`
--

INSERT INTO `tbl_facturas_serie` (`cod_factura`, `numero`, `idventa`, `id_reg_facturacion`) VALUES
(1, '000-001-01-000000001', 2, 1),
(6, '000-001-01 000000002', 7, 5),
(7, '000-001-01 000000007', 8, 1),
(8, '000-001-01 000000008', 9, 8),
(9, '000-001-01 000000009', 10, 8),
(10, '000-001-01 000000010', 11, 8),
(11, '000-001-01 000000011', 12, 8),
(12, '000-001-01 000000012', 13, 8),
(13, '000-001-01 000000013', 14, 8),
(14, '000-001-01 000000014', 15, 8),
(15, '000-001-01 000000015', 16, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_impuesto`
--

CREATE TABLE `tbl_impuesto` (
  `id_impuesto` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_impuesto`
--

INSERT INTO `tbl_impuesto` (`id_impuesto`, `descripcion`, `estado`) VALUES
(12, '0.15', 1),
(13, '0.16', 0),
(14, '0.17', 0),
(15, '0.22', 0),
(16, '0.05', 0),
(17, '0.36', 0),
(18, '0.34', 0),
(19, '0.18', 0),
(20, '0.18', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventario`
--

CREATE TABLE `tbl_inventario` (
  `id_inventario` int(11) NOT NULL,
  `idarticulo` int(10) NOT NULL,
  `libr` varchar(100) NOT NULL,
  `conversio` varchar(100) NOT NULL,
  `gramo` varchar(100) NOT NULL,
  `unidades` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_inventario`
--

INSERT INTO `tbl_inventario` (`id_inventario`, `idarticulo`, `libr`, `conversio`, `gramo`, `unidades`, `estado`) VALUES
(18, 22, '22', '33.00', '22', '33.00', 1),
(19, 22, '2', '907.18', '3', '302.39', 1),
(20, 22, '5', '2267.96', '4', '566.99', 1),
(21, 22, '4', '1814.37', '3', '604.79', 1),
(22, 22, '2', '907.18', '3', '302.39', 1),
(23, 22, '3', '1360.78', '2', '680.39', 1),
(24, 22, '20', '9071.84', '112', '48.60', 0),
(25, 27, '100', '45359.20', '15', '3023.95', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_operaciones`
--

CREATE TABLE `tbl_operaciones` (
  `id_operacion` int(11) NOT NULL,
  `id_tipo_operaciones` varchar(100) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_operaciones`
--

INSERT INTO `tbl_operaciones` (`id_operacion`, `id_tipo_operaciones`, `descripcion`, `estado`) VALUES
(1, 'a', 'a', 1),
(2, 's', 'a', 1),
(3, 's25', 'a', 0),
(4, 'trtujr45', 'ryjrytj', 0),
(5, 'karla', 'imple', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pantallas`
--

CREATE TABLE `tbl_pantallas` (
  `id_objeto` int(11) NOT NULL,
  `objeto` varchar(60) NOT NULL,
  `tipo_objeto` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_pantallas`
--

INSERT INTO `tbl_pantallas` (`id_objeto`, `objeto`, `tipo_objeto`, `descripcion`, `fecha_creacion`, `creado_por`, `fecha_modificacion`, `modificado_por`, `estado`) VALUES
(1, 'Producto', 'a', 's', '2020-05-05 17:28:42', NULL, '2020-05-26 15:28:19', NULL, 1),
(2, 'Compras', 'a', 's', '2020-05-10 18:55:07', NULL, '2020-05-26 11:47:29', NULL, 1),
(4, 'Inventario', 'a', 's', '2020-05-10 18:57:25', NULL, '2020-05-28 01:34:17', NULL, 1),
(5, 'Mantenimiento', 'a', 's', '2020-05-28 02:47:42', 'KARLA', '2020-05-28 02:47:42', 'KARLA', 1),
(6, 'Seguridad', 'a', 's', '2020-05-28 02:47:42', 'KARLA', '2020-05-28 02:47:42', 'KARLA', 1),
(7, 'VENTAS', 'a', 's', '2020-05-28 03:06:41', 'KARLA', '2020-06-06 08:25:43', 'KEV', 1),
(8, 'VENTAS', 'a', 'sas', '2020-05-30 19:58:19', 'MARVIN', '2020-05-30 19:58:19', 'MARVIN', 0),
(9, 'VENTAS', 'a', 'sas12', '2020-05-30 19:58:29', 'MARVIN', '2020-05-30 19:58:29', 'MARVIN', 0),
(10, 'VENTAS', 'a', 'sas1212', '2020-05-30 19:58:37', 'MARVIN', '2020-05-30 19:58:37', 'MARVIN', 0),
(11, 'VENTAS', 'a', 'sas121277', '2020-05-30 20:45:18', 'MARVIN', '2020-05-30 20:45:18', 'MARVIN', 0),
(12, 'VENTASD', 'a', 'sas121277', '2020-05-30 20:45:28', 'MARVIN', '2020-06-05 23:27:00', 'KEV', 0),
(13, 'VENTASSSSSS', 'a', 'sas121277', '2020-06-05 23:19:51', 'KEV', '2020-06-05 23:26:47', 'KEV', 0),
(14, 'VENTAS222', 'a', 'sas121277', '2020-06-05 23:19:58', 'KEV', '2020-06-05 23:19:58', 'KEV', 0),
(15, 'VENTAS222DDD22', 'a333366', 'sas121277dd1111', '2020-06-05 23:20:22', 'KEV', '2020-06-06 02:55:29', 'KEV', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parametros`
--

CREATE TABLE `tbl_parametros` (
  `id_parametro` int(11) NOT NULL,
  `Parametro` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_parametros`
--

INSERT INTO `tbl_parametros` (`id_parametro`, `Parametro`, `descripcion`, `valor`, `fecha_creacion`, `estado`) VALUES
(1, 'preguntas', 'Numero de preguntas para recuperar contraseña', 2, '2020-03-03 14:05:15', 1),
(2, 'máximo Contraseña', 'valor máximo de la contraseña', 8, '2020-03-03 14:09:33', 1),
(3, 'Valor mínimo de la Contraseña', 'valor mínimo que tiene la contraseña', 5, '2020-03-03 14:10:17', 1),
(9, 'Intentos', 'Numero de intentos de inicio de sección', 4, '2020-05-12 12:48:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `modificado_por` varchar(50) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_preguntas`
--

INSERT INTO `tbl_preguntas` (`id_pregunta`, `pregunta`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`, `estado`) VALUES
(1, '¿Actor Favorito  12?', '2020-02-27 00:00:00', 'root@localhost', '2020-05-28 17:10:40', 1),
(2, '¿Serie Favorita?', NULL, '', NULL, 1),
(3, '¿Cual es tu Color Favorito?', NULL, '', NULL, 0),
(4, '¿Cual es tu comida Favorita?', NULL, '', NULL, 1),
(5, '¿Nombre de tu primer mascota?', NULL, '', NULL, 1),
(6, '¿Nombre de tu primer mascota?', '2020-05-28 22:16:19', '', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas_x_usuario`
--

CREATE TABLE `tbl_preguntas_x_usuario` (
  `id_pregunta_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `nun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_preguntas_x_usuario`
--

INSERT INTO `tbl_preguntas_x_usuario` (`id_pregunta_usuario`, `id_usuario`, `id_pregunta`, `respuesta`, `estado`, `nun`) VALUES
(21, 12, 1, 'a', 1, 1),
(22, 12, 2, 's', 1, 2),
(23, 12, 3, 'e', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_presentacion`
--

CREATE TABLE `tbl_presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_presentacion`
--

INSERT INTO `tbl_presentacion` (`id_presentacion`, `descripcion`, `estado`) VALUES
(1, '43kg', 1),
(2, '86kg', 1),
(3, '45kg', 1),
(4, '10 kg', 1),
(5, '48 kg', 1),
(6, '44kg', 1),
(7, '43kg', 0),
(8, '56kg', 1),
(9, '43kg5', 1),
(10, '43kg5', 0),
(11, '43kg5', 0),
(12, 'dfggfh235', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `RTN` int(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`id_proveedor`, `Nombre`, `correo`, `RTN`, `telefono`, `direccion`, `estado`) VALUES
(41, 'test incognito', 'anajera@agrega', 8, 22366276, 'LA SOSA', 1),
(54, 'Angelica Najera', 'anajera@agrega', 2147483647, 22366276, 'LA SOSA', 1),
(59, 'Walter Alexander Najera M', 'anajera@agrega', 22366276, 22366276, 'LA SOSA', 1),
(61, 'karla', 'anajera@agrega', 53, 22366276, 'colonia la esperanza calle principal casa amarilla', 0),
(63, 'carlos alberto', 'comedorchinda@', 2147483647, 2250, 'col.nueva santa rosa calle san antonio', 1),
(64, 'canela', 'walmak@yahoo.c', 2147483647, 0, 'col.nueva santa rosa calle san antonio', 1),
(65, 'karla garcia', 'q@c.vom4', 2147483647, 99999999, 'dasdasdasdadasdasdadasd', 0),
(66, 'temmo', 'dfg@a.com', 2147483647, 12344565, 'asdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reg_facturacion`
--

CREATE TABLE `tbl_reg_facturacion` (
  `id_reg_facturacion` int(11) NOT NULL,
  `cai` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `rango_desde` varchar(50) NOT NULL,
  `rango_hasta` varchar(50) NOT NULL,
  `punto_emision` varchar(50) NOT NULL,
  `establecimiento` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `secuencia` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reg_facturacion`
--

INSERT INTO `tbl_reg_facturacion` (`id_reg_facturacion`, `cai`, `fecha_inicio`, `fecha_limite`, `rango_desde`, `rango_hasta`, `punto_emision`, `establecimiento`, `tipo_documento`, `secuencia`, `estado`) VALUES
(1, '124587-124578-785451', '2020-05-30', '2020-05-31', '000-001-01 000000001', '00000-0100', 'AAGC-13', 'trapichee', 'factura', '00000000000', 1),
(6, '2222222222222222', '2020-06-19', '2020-06-28', '2222', '111111', 'dsadsa', 'ddsadas', 'factura', '33333', 1),
(7, '3333333333333333', '2020-06-17', '2020-06-18', '222222222222', '2222222222222222', 'dsadsadas', 'dsadasd', 'factura', '2222', 1),
(8, '8888888888888888', '2020-06-26', '2019-07-02', '2222', '1', 'ewewqeqw', 'comercial', 'Nota credito', '500', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_rol`, `rol`, `descripcion`, `fecha_creacion`, `creado_por`, `fecha_modificacion`, `modificado_por`, `estado`) VALUES
(1, 'ADMINNN2D', 'Administrador de sisteman', '2020-02-11 00:13:44', 'karla', '2020-05-27 15:43:32', 'MARVIN', 1),
(2, 'USUARIOO', 'Permisos limitados por el administrador', '2020-02-18 05:18:12', NULL, '2020-05-27 15:43:41', 'MARVIN', 1),
(11, 'a', '', '2020-02-26 02:17:46', NULL, '2020-06-06 08:17:18', NULL, 0),
(12, 'as', 'sadasdasdas', '2020-05-13 16:03:11', NULL, '2020-06-06 08:17:25', NULL, 0),
(13, 'asmin', 'administrador 2', '2020-05-27 15:19:59', 'karla', '2020-05-27 15:19:59', 'karla', 1),
(14, 'ADMINNN2D3', 'Permisos limitados por el administrador', '2020-05-27 15:43:57', 'MARVIN', '2020-06-05 21:32:56', 'KEV', 0),
(15, 'AS', 'dddd', '2020-06-05 23:09:09', 'KEV', '2020-06-06 08:16:48', 'KEV', 0),
(16, 'KARLA', 'dddd', '2020-06-05 23:09:14', 'KEV', '2020-06-06 08:18:25', 'KEV', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles_objeto`
--

CREATE TABLE `tbl_roles_objeto` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL,
  `permiso_consulta` char(1) NOT NULL,
  `permiso_insercion` varchar(2) NOT NULL,
  `permiso_actualizacion` varchar(2) NOT NULL,
  `Mostar_Menu` varchar(2) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `contador` bigint(20) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_roles_objeto`
--

INSERT INTO `tbl_roles_objeto` (`id_permiso`, `id_rol`, `id_objeto`, `permiso_consulta`, `permiso_insercion`, `permiso_actualizacion`, `Mostar_Menu`, `fecha_creacion`, `creado_por`, `fecha_modificacion`, `modificado_por`, `contador`, `estado`) VALUES
(17, 1, 1, '1', '1', '1', '1', '2020-05-28 02:09:49', NULL, '2020-05-28 18:02:38', NULL, NULL, 1),
(18, 1, 2, '1', '1', '1', '1', '2020-05-28 02:19:55', NULL, '2020-05-28 13:46:46', NULL, NULL, 1),
(20, 1, 4, '1', '1', '1', '1', '2020-05-28 03:19:59', NULL, '2020-06-05 23:01:10', NULL, NULL, 1),
(21, 1, 5, '1', '1', '1', '1', '2020-05-28 03:20:11', NULL, '2020-05-28 15:53:30', NULL, NULL, 1),
(22, 1, 6, '1', '1', '1', '1', '2020-05-28 03:20:26', NULL, '2020-05-28 16:31:17', NULL, NULL, 1),
(24, 1, 7, '1', '1', '1', '1', '2020-05-28 03:52:38', NULL, '2020-05-28 18:03:22', NULL, NULL, 1),
(25, 2, 2, '1', '1', '1', '1', '2020-05-28 04:02:43', NULL, '2020-06-05 21:49:39', NULL, NULL, 1),
(26, 2, 6, '1', '1', '1', '1', '2020-05-28 14:26:19', NULL, '2020-05-30 20:45:01', NULL, NULL, 1),
(27, 2, 1, '1', '1', '0', '1', '2020-05-28 15:36:24', NULL, '2020-05-30 19:56:55', NULL, NULL, 1),
(28, 2, 4, '1', '0', '0', '1', '2020-05-30 16:16:25', NULL, '2020-05-30 19:55:54', NULL, NULL, 1),
(29, 2, 5, '1', '1', '1', '1', '2020-05-30 16:16:50', NULL, '2020-05-30 19:54:51', NULL, NULL, 1),
(30, 2, 7, '0', '1', '0', '1', '2020-05-30 16:17:42', NULL, '2020-06-06 08:14:48', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_operaciones`
--

CREATE TABLE `tbl_tipo_operaciones` (
  `id_tipo_operaciones` int(11) NOT NULL,
  `tipo_operacion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pago`
--

CREATE TABLE `tbl_tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_pago`
--

INSERT INTO `tbl_tipo_pago` (`id_tipo_pago`, `tipo_pago`, `descripcion`, `estado`) VALUES
(1, 'Credito', 'Pagos cada 30 dias', 1),
(2, 'Contado', 'Pago inmediato', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_tel_dir`
--

CREATE TABLE `tbl_tipo_tel_dir` (
  `id_telefono` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `Telefono1` int(8) NOT NULL,
  `Telefono2` int(8) NOT NULL,
  `Telefono3` int(8) NOT NULL,
  `Telefono4` int(8) NOT NULL,
  `Telefono5` int(8) NOT NULL,
  `Estado` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_tel_dir`
--

INSERT INTO `tbl_tipo_tel_dir` (`id_telefono`, `id_cliente`, `Telefono1`, `Telefono2`, `Telefono3`, `Telefono4`, `Telefono5`, `Estado`) VALUES
(1, 1, 95637899, 95637896, 95637896, 95637890, 95637896, '0'),
(2, 2, 98785478, 0, 0, 0, 0, '0'),
(3, 3, 4444, 888, 55, 0, 0, '0'),
(4, 4, 89888, 222, 0, 0, 0, '0'),
(5, 5, 22366276, 0, 0, 0, 0, '0'),
(6, 6, 89888, 0, 0, 0, 0, '0'),
(7, 7, 89888, 0, 0, 0, 0, '0'),
(8, 8, 32132132, 0, 0, 0, 0, '0'),
(9, 9, 22321321, 0, 0, 0, 0, '0'),
(10, 10, 22321321, 88888888, 0, 0, 0, '0'),
(11, 11, 23123123, 0, 0, 0, 0, '0'),
(12, 12, 222222, 0, 0, 0, 0, '0'),
(13, 13, 22221212, 0, 0, 0, 0, '0'),
(14, 14, 88888888, 99999999, 77777777, 0, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `Nombre_Usuario` varchar(70) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL DEFAULT 1,
  `nuevo` varchar(10) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `intentos` varchar(60) DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `fecha_creacion_u` datetime DEFAULT current_timestamp(),
  `correo_electronico` varchar(80) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `dias_expirado` int(3) DEFAULT NULL,
  `fecha_expira` date DEFAULT NULL,
  `fecha_cambio_contrasena` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `id_rol`, `Nombre_Usuario`, `estado_usuario`, `nuevo`, `Contraseña`, `intentos`, `token_password`, `password_request`, `ultima_conexion`, `fecha_creacion_u`, `correo_electronico`, `fecha_modificacion`, `modificado_por`, `dias_expirado`, `fecha_expira`, `fecha_cambio_contrasena`) VALUES
(1, 2, 'MARVIN', 1, '1', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', '0', NULL, NULL, '2020-05-30 19:47:41', '2020-05-24 18:41:38', 'marvinmn32@gmil.comv', '2020-05-30 19:47:41', NULL, NULL, NULL, NULL),
(11, 1, 'HHH', 1, '0', '28e51044f4a9cbae2bbd3d8a9d8c902ad1455d42208277ac4a913b003038a3dc', '0', NULL, NULL, '2020-05-28 16:14:22', '2020-05-27 10:14:01', 'hhh@d.con', '2020-05-28 16:14:22', NULL, NULL, NULL, NULL),
(12, 1, 'KEV', 1, '1', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', '0', NULL, NULL, '2020-06-06 03:08:09', '2020-05-27 15:56:12', 'rau_amador@yahoo.com', '2020-06-06 03:08:09', NULL, NULL, NULL, NULL),
(13, 11, 'RAUL', 0, '0', '7ae3f3a10e650783a34f84d5ec0f8af914ace0dd16e863ce5a26fa5de0263b4f', '0', NULL, NULL, '2020-06-06 08:57:54', '2020-05-30 19:46:46', 'raul@sq.com', '2020-06-06 08:57:54', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(96, 1, 1),
(97, 1, 2),
(98, 1, 3),
(99, 1, 4),
(100, 1, 5),
(101, 1, 6),
(102, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_pago` int(11) NOT NULL,
  `id_reg_facturacion` int(11) NOT NULL,
  `num_factura` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `id_cliente`, `id_usuario`, `id_tipo_pago`, `id_reg_facturacion`, `num_factura`, `fecha`, `total_venta`, `estado`) VALUES
(2, 8, 11, 2, 1, '000-001-01-000000001', '2020-05-30 19:18:37', '1000.00', '1'),
(3, 2, 12, 1, 1, '000-001-01-000000000', '2020-05-30 19:19:40', '639.39', '1'),
(4, 2, 12, 1, 1, '000-001-01-000000000', '2020-05-30 19:19:56', '639.39', '1'),
(5, 2, 12, 1, 1, '000-001-01-000000003', '2020-05-30 19:20:56', '639.39', '1'),
(6, 2, 12, 1, 1, '000-001-01-000000001', '2020-05-30 19:21:43', '639.39', '1'),
(7, 2, 12, 1, 5, '000-001-01 000000002', '2020-05-30 19:31:37', '639.39', '1'),
(8, 12, 12, 1, 1, '000-001-01 000000007', '2020-06-04 23:03:15', '569.06', '1'),
(9, 2, 12, 1, 8, '000-001-01 000000008', '2020-06-06 08:44:54', '45827.21', '1'),
(10, 2, 12, 1, 8, '000-001-01 000000009', '2020-06-06 08:47:34', '715.88', '1'),
(11, 2, 12, 1, 8, '000-001-01 000000010', '2020-06-06 08:50:40', '204.70', '1'),
(12, 2, 12, 1, 8, '000-001-01 000000011', '2020-06-06 16:27:18', '40991.18', '1'),
(13, 2, 12, 1, 8, '000-001-01 000000012', '2020-06-06 16:27:59', '4605.75', '1'),
(14, 2, 12, 1, 8, '000-001-01 000000013', '2020-06-06 16:29:17', '230.29', '1'),
(15, 2, 12, 1, 8, '000-001-01 000000014', '2020-06-06 16:30:39', '230.29', '1'),
(16, 2, 12, 1, 8, '000-001-01 000000015', '2020-06-06 16:32:10', '1151.44', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `id_presentacion` (`id_presentacion`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_venta_idx` (`idventa`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`),
  ADD KEY `cod_factura` (`cod_factura`),
  ADD KEY `cod_factura_2` (`cod_factura`);

--
-- Indices de la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idarticulo` (`idarticulo`),
  ADD KEY `cod_factura` (`cod_factura`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`id_permiso_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `idpermiso` (`idpermiso`);

--
-- Indices de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_tbl_bitacoras_tbl_usuarios_idx` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_descuento`
--
ALTER TABLE `tbl_descuento`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `tbl_direccion`
--
ALTER TABLE `tbl_direccion`
  ADD PRIMARY KEY (`tbl_direccion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_operacion` (`id_operacion`);

--
-- Indices de la tabla `tbl_facturas_serie`
--
ALTER TABLE `tbl_facturas_serie`
  ADD PRIMARY KEY (`cod_factura`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `id_reg_factura` (`id_reg_facturacion`);

--
-- Indices de la tabla `tbl_impuesto`
--
ALTER TABLE `tbl_impuesto`
  ADD PRIMARY KEY (`id_impuesto`);

--
-- Indices de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `idarticulo` (`idarticulo`);

--
-- Indices de la tabla `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  ADD PRIMARY KEY (`id_operacion`);

--
-- Indices de la tabla `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  ADD PRIMARY KEY (`id_objeto`);

--
-- Indices de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `Id_usuario` (`id_parametro`);

--
-- Indices de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `tbl_preguntas_x_usuario`
--
ALTER TABLE `tbl_preguntas_x_usuario`
  ADD PRIMARY KEY (`id_pregunta_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `tbl_preguntas_x_usuario_ibfk_2` (`id_pregunta`);

--
-- Indices de la tabla `tbl_presentacion`
--
ALTER TABLE `tbl_presentacion`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`id_proveedor`) USING BTREE;

--
-- Indices de la tabla `tbl_reg_facturacion`
--
ALTER TABLE `tbl_reg_facturacion`
  ADD PRIMARY KEY (`id_reg_facturacion`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_objeto` (`id_objeto`);

--
-- Indices de la tabla `tbl_tipo_operaciones`
--
ALTER TABLE `tbl_tipo_operaciones`
  ADD PRIMARY KEY (`id_tipo_operaciones`);

--
-- Indices de la tabla `tbl_tipo_pago`
--
ALTER TABLE `tbl_tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pago`);

--
-- Indices de la tabla `tbl_tipo_tel_dir`
--
ALTER TABLE `tbl_tipo_tel_dir`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `fk_tbl_usuario_tbl_preg_resp_usu_idx` (`id_usuario`,`id_rol`),
  ADD KEY `fk_tbl_usuario_tbl_roles_idx` (`id_rol`) USING BTREE,
  ADD KEY `fk_tbl_usuario_tbl_empleados_idx` (`id_usuario`) USING BTREE,
  ADD KEY `fk_tbl_usuario_tbl_bitacoras_idx` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona_idx` (`id_cliente`),
  ADD KEY `fk_venta_usuario_idx` (`id_usuario`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`),
  ADD KEY `id_reg_factura` (`id_reg_facturacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `id_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_descuento`
--
ALTER TABLE `tbl_descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_direccion`
--
ALTER TABLE `tbl_direccion`
  MODIFY `tbl_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_facturas_serie`
--
ALTER TABLE `tbl_facturas_serie`
  MODIFY `cod_factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_impuesto`
--
ALTER TABLE `tbl_impuesto`
  MODIFY `id_impuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  MODIFY `id_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas_x_usuario`
--
ALTER TABLE `tbl_preguntas_x_usuario`
  MODIFY `id_pregunta_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_presentacion`
--
ALTER TABLE `tbl_presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tbl_reg_facturacion`
--
ALTER TABLE `tbl_reg_facturacion`
  MODIFY `id_reg_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_tel_dir`
--
ALTER TABLE `tbl_tipo_tel_dir`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `tbl_presentacion` (`id_presentacion`),
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`),
  ADD CONSTRAINT `compras_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `tbl_proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`cod_factura`) REFERENCES `tbl_facturas_serie` (`cod_factura`),
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  ADD CONSTRAINT `detalle_venta_1_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`),
  ADD CONSTRAINT `detalle_venta_1_ibfk_2` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `detalle_venta_1_ibfk_3` FOREIGN KEY (`cod_factura`) REFERENCES `tbl_facturas_serie` (`cod_factura`);

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `permiso_usuario_ibfk_1` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`),
  ADD CONSTRAINT `permiso_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD CONSTRAINT `tbl_articulo_ibfk_1` FOREIGN KEY (`id_presentacion`) REFERENCES `tbl_presentacion` (`id_presentacion`);

--
-- Filtros para la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  ADD CONSTRAINT `tbl_bitacoras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_direccion`
--
ALTER TABLE `tbl_direccion`
  ADD CONSTRAINT `tbl_direccion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Filtros para la tabla `tbl_facturas_serie`
--
ALTER TABLE `tbl_facturas_serie`
  ADD CONSTRAINT `tbl_facturas_serie_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `tbl_facturas_serie_ibfk_2` FOREIGN KEY (`id_reg_facturacion`) REFERENCES `tbl_reg_facturacion` (`id_reg_facturacion`);

--
-- Filtros para la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD CONSTRAINT `tbl_inventario_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`);

--
-- Filtros para la tabla `tbl_preguntas_x_usuario`
--
ALTER TABLE `tbl_preguntas_x_usuario`
  ADD CONSTRAINT `tbl_preguntas_x_usuario_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`),
  ADD CONSTRAINT `tbl_preguntas_x_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `tbl_pantallas` (`id_objeto`),
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`);

--
-- Filtros para la tabla `tbl_tipo_tel_dir`
--
ALTER TABLE `tbl_tipo_tel_dir`
  ADD CONSTRAINT `tbl_tipo_tel_dir_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`);

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `usuario_permiso_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  ADD CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tbl_tipo_pago` (`id_tipo_pago`),
  ADD CONSTRAINT `venta_ibfk_7` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`),
  ADD CONSTRAINT `venta_ibfk_8` FOREIGN KEY (`id_reg_facturacion`) REFERENCES `tbl_reg_facturacion` (`id_reg_facturacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
