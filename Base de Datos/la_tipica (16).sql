-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 03:44:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

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
  `id_proveedor` varchar(100) NOT NULL,
  `idarticulo` varchar(100) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(5,2) NOT NULL,
  `Total_Compra` decimal(5,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `id_proveedor`, `idarticulo`, `id_presentacion`, `Cantidad`, `Precio`, `Total_Compra`, `estado`) VALUES
(6, 'karla', 'Especias', 7, 5, '10.00', '500.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta_1`
--

CREATE TABLE `detalle_venta_1` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cod_factura` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_v` varchar(100) NOT NULL,
  `IVA` varchar(100) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `descu` varchar(100) NOT NULL,
  `codigo_factura` bigint(20) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  `ventas_netas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `detalle_venta_1`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta_1` FOR EACH ROW BEGIN
 UPDATE articulo SET stock = stock - NEW.cantidad 
 WHERE articulo.idarticulo = NEW.idarticulo;
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

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Compras'),
(2, 'Ventas'),
(3, 'Inventario'),
(4, 'Producto'),
(5, 'Empresa');

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
  `precio_venta` decimal(4,2) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`idarticulo`, `nombre`, `descripcion1`, `codigo`, `precio_venta`, `fecha_fabricacion`, `fecha_expiracion`, `id_presentacion`, `stock`, `imagen`, `condicion`) VALUES
(21, 'Especias', 'comino', '0001', '15.50', '2020-05-01', '2020-08-31', 1, '', '1585099921.jpg', 1),
(22, 'paprica', 'pieminta roja', '002', '15.00', '2020-05-01', '2020-05-30', 7, '', 'paprica.jpg', 1);

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
(29, 1, 'Se a editado un  permiso ', 'editado ', 'Sea modificado uno de los permisos ', '2020-05-27 11:16:55', '', '');

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
(8, 'la colonia', 'rau_SS@ss.com', '31231232131232', 1),
(9, 'teeemo', 'dasdasd@s.ces', '22321321312321', 1),
(10, 'teeemo', 'dasdasd@s.ces', '22321321312321', 1),
(11, 'Walmark', 'walmak@yahoo.com', '0145877123484 ', 1),
(12, 'aaa', 'walmak@yahoo.com', ' ', 1);

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
(1, '10', 0),
(2, '5', 0);

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
(4, 3, 'fffff'),
(5, 4, '6yg'),
(6, 5, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(7, 6, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(8, 7, 'colonia la esperanza calle principal casa amarilla fdrente a hotel la vega de dos plantas pulperia tre hermanos '),
(9, 8, 'kkakakaka'),
(10, 9, 'dsadsada'),
(11, 10, 'dsadsada'),
(12, 11, 'col.nueva santa rosa calle san antonio'),
(13, 12, 'col.nueva santa rosa calle san antonio');

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
  `telefono_1` int(10) NOT NULL,
  `telefono_2` int(10) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id_empresa`, `id_operacion`, `RTN`, `razon_social`, `nombre_comercial`, `domicilio_1`, `domicilio_2`, `correo_1`, `correo_2`, `telefono_1`, `telefono_2`, `estado`) VALUES
(3, 0, 2147483647, 's.a', 'Condimentos la tipica', 'la nueva santa rosa res', '1111', 'latipiaca@yahoo.com', 'jaaaa@yahoo.com', 22228888, 123, 0),
(4, 0, 2147483647, 's.a', 'Condimentos la tipica 2', 'altos del trapiche', '', 'latipiaca@yahoo.com', '', 2221012, 0, 0);

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
(1, '10', 1),
(2, '5', 1),
(3, '15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventario`
--

CREATE TABLE `tbl_inventario` (
  `id_inventario` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `libr` int(11) NOT NULL,
  `conversio` decimal(11,2) NOT NULL,
  `gramo` int(11) NOT NULL,
  `unidades` decimal(11,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_operaciones`
--

CREATE TABLE `tbl_operaciones` (
  `id_operacion` int(11) NOT NULL,
  `id_tipo_operaciones` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_operaciones`
--

INSERT INTO `tbl_operaciones` (`id_operacion`, `id_tipo_operaciones`, `descripcion`, `estado`) VALUES
(0, 0, 'mypyme', 1);

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
(3, 'Inventario', 'a', 's', '2020-05-10 18:56:43', NULL, '2020-05-28 19:35:03', NULL, 1),
(4, 'Inventario', 'a', 's', '2020-05-10 18:57:00', NULL, '2020-05-28 19:37:01', NULL, 1),
(5, 'Mantenimientos', 'a', 's', '2020-05-10 18:57:08', NULL, '2020-05-28 19:36:38', NULL, 1),
(6, 'Seguridad', 'a', 's', '2020-05-10 18:57:14', NULL, '2020-05-28 19:36:08', NULL, 0),
(7, 'ventas', 'a', 's', '2020-05-10 18:57:25', NULL, '2020-05-28 19:35:50', NULL, 0),
(8, 'Empresa', 'a', 's', '2020-05-10 18:58:11', NULL, '2020-05-13 21:35:47', NULL, 0);

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
(1, 'preguntas', 'Numero de preguntas para recuperar contraseña', 1, '2020-03-03 14:05:15', 1),
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
(1, '¿Actor Favorito?', '2020-02-27 00:00:00', 'root@localhost', NULL, 1),
(2, '¿Serie Favorita?', NULL, '', NULL, 1),
(3, '¿Cual es tu Color Favorito?', NULL, '', NULL, 0),
(4, '¿Cual es tu comida Favorita?', NULL, '', NULL, 1),
(5, '¿Nombre de tu primer mascota?', NULL, '', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas_x_usuario`
--

CREATE TABLE `tbl_preguntas_x_usuario` (
  `id_pregunta_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_preguntas_x_usuario`
--

INSERT INTO `tbl_preguntas_x_usuario` (`id_pregunta_usuario`, `id_usuario`, `id_pregunta`, `respuesta`, `estado`) VALUES
(12, 11, 1, 'cris', 1),
(13, 1, 2, 'dark', 1);

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
(1, '43kg', 0),
(2, '86kg', 1),
(3, '45kg', 1),
(4, '10 kg', 1),
(5, '48 kg', 1),
(6, '44kg', 1),
(7, '43kg', 0);

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
(64, 'canela', 'walmak@yahoo.c', 2147483647, 2250, 'col.nueva santa rosa calle san antonio', 1),
(65, 'aaa', 'jaime@yahoo.com', 2147483647, 2250, 'col.nueva santa rosa ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reg_facturacion`
--

CREATE TABLE `tbl_reg_facturacion` (
  `id_reg_facturacion` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
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

INSERT INTO `tbl_reg_facturacion` (`id_reg_facturacion`, `id_empresa`, `cai`, `fecha_inicio`, `fecha_limite`, `rango_desde`, `rango_hasta`, `punto_emision`, `establecimiento`, `tipo_documento`, `secuencia`, `estado`) VALUES
(1, 1, '124587-124578-785451', '2020-04-10', '2020-05-10', '000-001-01 000000001', '00000-0100', 'AAGC-13', 'trapichee', 'factura', '00000000000', 1);

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
(1, 'Admin', 'Administrador de sistema', '2020-02-11 00:13:44', NULL, '2020-05-26 18:25:53', NULL, 1),
(2, 'Usuario', 'Permisos limitados por el administrador', '2020-02-18 05:18:12', NULL, '2020-05-26 17:56:09', NULL, 1),
(11, 'a', '', '2020-02-26 02:17:46', NULL, '2020-05-26 12:50:33', NULL, 1),
(12, 'as', 'sadasdasdas', '2020-05-13 16:03:11', NULL, '2020-05-26 12:50:30', NULL, 1);

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
  `Mostrar_Menu` varchar(2) NOT NULL,
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

INSERT INTO `tbl_roles_objeto` (`id_permiso`, `id_rol`, `id_objeto`, `permiso_consulta`, `permiso_insercion`, `permiso_actualizacion`, `Mostrar_Menu`, `fecha_creacion`, `creado_por`, `fecha_modificacion`, `modificado_por`, `contador`, `estado`) VALUES
(4, 2, 1, '0', '1', '0', '0', '2020-05-10 17:30:20', NULL, '2020-05-26 18:25:10', NULL, NULL, 1),
(6, 2, 2, '0', '1', '0', '0', '2020-05-11 02:15:02', NULL, '2020-05-26 18:25:14', NULL, NULL, 1),
(7, 1, 2, '1', '1', '1', '0', '2020-05-11 02:25:43', NULL, '2020-05-28 01:20:33', NULL, NULL, 1),
(11, 2, 6, '0', '1', '1', '0', '2020-05-13 15:00:25', NULL, '2020-05-26 18:25:19', NULL, NULL, 1),
(12, 2, 4, '1', '0', '0', '0', '2020-05-13 15:08:55', NULL, '2020-05-27 11:16:55', NULL, NULL, 1),
(13, 11, 7, '1', '0', '1', '0', '2020-05-13 15:11:37', NULL, '2020-05-26 18:25:06', NULL, NULL, 1),
(14, 2, 5, '0', '1', '0', '0', '2020-05-24 03:08:51', NULL, '2020-05-26 23:03:25', NULL, NULL, 1),
(15, 2, 3, '0', '0', '0', '0', '2020-05-24 03:09:05', NULL, '2020-05-24 03:09:05', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_operaciones`
--

CREATE TABLE `tbl_tipo_operaciones` (
  `id_tipo_operaciones` int(11) NOT NULL,
  `tipo_operacion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_operaciones`
--

INSERT INTO `tbl_tipo_operaciones` (`id_tipo_operaciones`, `tipo_operacion`, `estado`) VALUES
(0, 'industrial', 1);

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
(10, 10, 22321321, 0, 0, 0, 0, '0'),
(11, 11, 22228888, 0, 0, 0, 0, '0'),
(12, 12, 77777777, 0, 0, 0, 0, '0');

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
(1, 1, 'MARVIN', 1, '1', '1ef62013f28e97f69579402dfd1c1b01fa5a9344987edf0ba14a8c717931a274', '0', NULL, NULL, '2020-05-27 09:51:28', '2020-05-24 18:41:38', 'marvinmn32@gmil.com', '2020-05-27 09:51:28', NULL, NULL, NULL, NULL),
(11, 1, 'KARLA', 1, '1', '1ef62013f28e97f69579402dfd1c1b01fa5a9344987edf0ba14a8c717931a274', '0', NULL, NULL, '2020-05-27 11:58:42', '2020-05-27 09:34:59', NULL, '2020-05-27 11:58:42', NULL, NULL, NULL, NULL);

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
(102, 1, 7),
(103, 11, 1);

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_venta_idx` (`idventa`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`),
  ADD KEY `cod_factura` (`cod_factura`),
  ADD KEY `cod_factura_2` (`cod_factura`),
  ADD KEY `codigo_factura` (`codigo_factura`);

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
  ADD KEY `fk_producto` (`idarticulo`);

--
-- Indices de la tabla `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  ADD PRIMARY KEY (`id_operacion`),
  ADD KEY `id_tipo_operaciones` (`id_tipo_operaciones`);

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
  ADD PRIMARY KEY (`id_reg_facturacion`),
  ADD KEY `id_empresa` (`id_empresa`);

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
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `id_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_descuento`
--
ALTER TABLE `tbl_descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_direccion`
--
ALTER TABLE `tbl_direccion`
  MODIFY `tbl_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_facturas_serie`
--
ALTER TABLE `tbl_facturas_serie`
  MODIFY `cod_factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_impuesto`
--
ALTER TABLE `tbl_impuesto`
  MODIFY `id_impuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas_x_usuario`
--
ALTER TABLE `tbl_preguntas_x_usuario`
  MODIFY `id_pregunta_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_presentacion`
--
ALTER TABLE `tbl_presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_tel_dir`
--
ALTER TABLE `tbl_tipo_tel_dir`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `tbl_presentacion` (`id_presentacion`);

--
-- Filtros para la tabla `detalle_venta_1`
--
ALTER TABLE `detalle_venta_1`
  ADD CONSTRAINT `detalle_venta_1_ibfk_1` FOREIGN KEY (`cod_factura`) REFERENCES `tbl_facturas_serie` (`cod_factura`),
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `tbl_empresa_ibfk_1` FOREIGN KEY (`id_operacion`) REFERENCES `tbl_operaciones` (`id_operacion`);

--
-- Filtros para la tabla `tbl_facturas_serie`
--
ALTER TABLE `tbl_facturas_serie`
  ADD CONSTRAINT `tbl_facturas_serie_ibfk_1` FOREIGN KEY (`id_reg_facturacion`) REFERENCES `tbl_reg_facturacion` (`id_reg_facturacion`),
  ADD CONSTRAINT `tbl_facturas_serie_ibfk_2` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD CONSTRAINT `tbl_inventario_ibfk_1` FOREIGN KEY (`idarticulo`) REFERENCES `tbl_articulo` (`idarticulo`);

--
-- Filtros para la tabla `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  ADD CONSTRAINT `tbl_operaciones_ibfk_1` FOREIGN KEY (`id_tipo_operaciones`) REFERENCES `tbl_tipo_operaciones` (`id_tipo_operaciones`);

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
  ADD CONSTRAINT `venta_ibfk_6` FOREIGN KEY (`id_reg_facturacion`) REFERENCES `tbl_reg_facturacion` (`id_reg_facturacion`),
  ADD CONSTRAINT `venta_ibfk_7` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
