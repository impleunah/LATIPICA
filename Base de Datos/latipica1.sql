-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2020 a las 21:26:49
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
-- Base de datos: `latipica.`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacoras`
--

CREATE TABLE `tbl_bitacoras` (
  `id_usuario` bigint(20) DEFAULT NULL,
  `objeto` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_bitacora` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cai`
--

CREATE TABLE `tbl_cai` (
  `nu_factura` int(11) NOT NULL,
  `cai` int(11) NOT NULL,
  `rango1` int(11) NOT NULL,
  `rango2` int(11) NOT NULL,
  `id_cai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` bigint(20) NOT NULL,
  `identidad` varchar(14) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `ape_cliente` varchar(50) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo_cliente` varchar(50) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_extras`
--

CREATE TABLE `tbl_extras` (
  `id_extra` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `descripcion_extra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas`
--

CREATE TABLE `tbl_facturas` (
  `id_factura` int(11) NOT NULL,
  `no_factura` int(11) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `condiciones` varchar(11) NOT NULL,
  `total_venta` int(11) NOT NULL,
  `estado_factura` varchar(10) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_kardex`
--

CREATE TABLE `tbl_kardex` (
  `id_kerder` bigint(20) NOT NULL,
  `id_servicio` bigint(20) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `tip_producto` varchar(30) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `cantidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pantallas`
--

CREATE TABLE `tbl_pantallas` (
  `id_objeto` bigint(20) NOT NULL,
  `objeto` varchar(60) NOT NULL,
  `tipo_objeto` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parametros`
--

CREATE TABLE `tbl_parametros` (
  `id_parametro` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preguntas`
--

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` bigint(20) NOT NULL,
  `pregunta` varchar(70) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preg_resp_usu`
--

CREATE TABLE `tbl_preg_resp_usu` (
  `id_pregunta` bigint(20) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `respuesta` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_respuestas`
--

CREATE TABLE `tbl_respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_pregunta` bigint(20) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_rol` bigint(20) NOT NULL,
  `rol` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles_objeto`
--

CREATE TABLE `tbl_roles_objeto` (
  `id_permiso` bigint(20) NOT NULL,
  `id_rol` bigint(20) NOT NULL,
  `id_objeto` bigint(20) NOT NULL,
  `permiso_consulta` char(1) NOT NULL,
  `permiso_insercion` varchar(2) NOT NULL,
  `permiso_eliminacion` varchar(2) NOT NULL,
  `permiso_actualizacion` varchar(2) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) DEFAULT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `contador` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `id_rol` bigint(20) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `Nombre_Usuario` varchar(70) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `activacion` int(11) DEFAULT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `intentos` varchar(60) DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `correo_electronico` varchar(80) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `dias_expirado` int(3) DEFAULT NULL,
  `fecha_expira` date DEFAULT NULL,
  `fecha_cambio_contrasena` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_tbl_bitacoras_tbl_usuarios_idx` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tbl_cai`
--
ALTER TABLE `tbl_cai`
  ADD PRIMARY KEY (`id_cai`),
  ADD KEY `fk_tbl_cai_tbl_facturas_idx` (`nu_factura`,`cai`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `fk_tbl_clientes_tbl_ventas_idx` (`id_cliente`,`identidad`),
  ADD UNIQUE KEY `fk_tbl_clientes_tbl_facturas_idx` (`id_cliente`,`identidad`),
  ADD UNIQUE KEY `fk_tbl_clientes_tbl_cotizacion_idx` (`id_cliente`,`identidad`);

--
-- Indices de la tabla `tbl_extras`
--
ALTER TABLE `tbl_extras`
  ADD PRIMARY KEY (`id_extra`),
  ADD KEY `fk_tbl_extras_tbl_vehiculo_idx` (`id_vehiculo`) USING BTREE;

--
-- Indices de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_tbl_facturas_tbl_clientes_idx` (`id_cliente`) USING BTREE,
  ADD KEY `fk_tbl_facturas_tbl_cai_idx` (`id_cai`);

--
-- Indices de la tabla `tbl_kardex`
--
ALTER TABLE `tbl_kardex`
  ADD PRIMARY KEY (`id_kerder`),
  ADD KEY `fk_tbl_kardex_tbl_compras_idx` (`id_compra`) USING BTREE;

--
-- Indices de la tabla `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  ADD PRIMARY KEY (`id_objeto`),
  ADD KEY `fk_tbl_pantallas_tbl_roles_objeto_idx` (`id_objeto`,`objeto`);

--
-- Indices de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `dias_vencimiento_contrasena` (`nombre`);

--
-- Indices de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD UNIQUE KEY `fk_tbl_preguntas_tbl_preg_resp_usu_idx` (`id_pregunta`,`pregunta`),
  ADD UNIQUE KEY `fk_tbl_preguntas_tbl_respuestas_idx` (`id_pregunta`,`pregunta`);

--
-- Indices de la tabla `tbl_preg_resp_usu`
--
ALTER TABLE `tbl_preg_resp_usu`
  ADD KEY `fk_tbl_preg_resp_usu_tbl_preguntas_idx` (`id_pregunta`) USING BTREE,
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `fk_tbl_preg_resp_usu_tbl_usuario_idx` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tbl_respuestas`
--
ALTER TABLE `tbl_respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_tbl_respuestas_tbl_preguntas_idx` (`id_pregunta`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `fk_tbl_roles_tbl_usuario_idx` (`id_rol`,`rol`) USING BTREE,
  ADD KEY `fk_tbl_roles_tbl_roles_objeto_idx` (`id_rol`,`rol`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_objeto_2` (`id_objeto`),
  ADD KEY `fk_tbl_roles_objeto_tbl_roles_idx` (`id_rol`) USING BTREE,
  ADD KEY `fk_tbl_roles_objeto_tbl_pantallas_idx` (`id_objeto`) USING BTREE;

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  MODIFY `id_bitacora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017;

--
-- AUTO_INCREMENT de la tabla `tbl_cai`
--
ALTER TABLE `tbl_cai`
  MODIFY `id_cai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_extras`
--
ALTER TABLE `tbl_extras`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  MODIFY `id_objeto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  MODIFY `id_parametro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_respuestas`
--
ALTER TABLE `tbl_respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  MODIFY `id_permiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`),
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_2` FOREIGN KEY (`id_objeto`) REFERENCES `tbl_pantallas` (`id_objeto`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
