-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 09:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latipica1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bitacoras`
--

CREATE TABLE `tbl_bitacoras` (
  `id_bitacora` bigint(20) NOT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `id_objeto` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cai`
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
-- Table structure for table `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` bigint(20) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `Id_telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detallefactura`
--

CREATE TABLE `tbl_detallefactura` (
  `id_detalle` int(11) NOT NULL,
  `Id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `subtotal` float NOT NULL,
  `impuesto` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detalleorden`
--

CREATE TABLE `tbl_detalleorden` (
  `id_detalleorden` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facturas`
--

CREATE TABLE `tbl_facturas` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `no_factura` int(11) NOT NULL,
  `total_venta` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `estado_factura` varchar(10) NOT NULL,
  `id_cai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lote`
--

CREATE TABLE `tbl_lote` (
  `id_lote` int(11) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordendecompra`
--

CREATE TABLE `tbl_ordendecompra` (
  `id_ordencompra` int(11) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `id_detalleorden` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pantallas`
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
-- Table structure for table `tbl_parametros`
--

CREATE TABLE `tbl_parametros` (
  `id_parametro` bigint(20) NOT NULL,
  `id_Usuario` bigint(20) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `parametro` text NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preguntas`
--

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` bigint(20) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `creado_Por` varchar(50) NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `modificado_por` varchar(50) NOT NULL,
  `fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pregunta_x_usuario`
--

CREATE TABLE `tbl_pregunta_x_usuario` (
  `id_pregunta` bigint(20) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `respuesta` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
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

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_rol`, `rol`, `descripcion`, `fecha_creacion`, `creado_por`, `fecha_modificacion`, `modificado_por`) VALUES
(1, 'Admin', 'Administrador de sistema', '2020-02-11 00:13:44', NULL, '2020-02-11 00:13:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles_objeto`
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
-- Table structure for table `tbl_telefono`
--

CREATE TABLE `tbl_telefono` (
  `id_telefono` int(11) NOT NULL,
  `id_tipotelefono` int(11) NOT NULL,
  `telefono` int(10) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipotelefono`
--

CREATE TABLE `tbl_tipotelefono` (
  `id_tipotelefono` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `id_rol` bigint(20) DEFAULT NULL,
  `Nombre_Usuario` varchar(70) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
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
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `id_rol`, `Nombre_Usuario`, `estado_usuario`, `Contraseña`, `intentos`, `token_password`, `password_request`, `ultima_conexion`, `fecha_creacion`, `correo_electronico`, `fecha_modificacion`, `modificado_por`, `dias_expirado`, `fecha_expira`, `fecha_cambio_contrasena`) VALUES
(7, NULL, 'MARVIN', 'ACTIVO', '2891', NULL, NULL, NULL, '2020-02-11 14:06:34', '2020-02-11 13:55:41', NULL, '2020-02-11 14:06:34', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_tbl_bitacoras_tbl_usuarios_idx` (`id_usuario`) USING BTREE,
  ADD KEY `id_objeto` (`id_objeto`);

--
-- Indexes for table `tbl_cai`
--
ALTER TABLE `tbl_cai`
  ADD PRIMARY KEY (`id_cai`),
  ADD KEY `fk_tbl_cai_tbl_facturas_idx` (`nu_factura`,`cai`);

--
-- Indexes for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `Id_telefono` (`Id_telefono`);

--
-- Indexes for table `tbl_detallefactura`
--
ALTER TABLE `tbl_detallefactura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `Id_factura` (`Id_factura`);

--
-- Indexes for table `tbl_detalleorden`
--
ALTER TABLE `tbl_detalleorden`
  ADD PRIMARY KEY (`id_detalleorden`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_tbl_facturas_tbl_clientes_idx` (`id_cliente`) USING BTREE,
  ADD KEY `fk_tbl_facturas_tbl_cai_idx` (`id_cai`);

--
-- Indexes for table `tbl_lote`
--
ALTER TABLE `tbl_lote`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indexes for table `tbl_ordendecompra`
--
ALTER TABLE `tbl_ordendecompra`
  ADD PRIMARY KEY (`id_ordencompra`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_detalle` (`id_detalleorden`);

--
-- Indexes for table `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  ADD PRIMARY KEY (`id_objeto`),
  ADD KEY `fk_tbl_pantallas_tbl_roles_objeto_idx` (`id_objeto`,`objeto`);

--
-- Indexes for table `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `Id_usuario` (`id_parametro`),
  ADD KEY `id_Usuario_2` (`id_Usuario`);

--
-- Indexes for table `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indexes for table `tbl_pregunta_x_usuario`
--
ALTER TABLE `tbl_pregunta_x_usuario`
  ADD KEY `fk_tbl_preg_resp_usu_tbl_preguntas_idx` (`id_pregunta`) USING BTREE,
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `fk_tbl_preg_resp_usu_tbl_usuario_idx` (`id_usuario`) USING BTREE;

--
-- Indexes for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_lote` (`id_lote`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `fk_tbl_roles_tbl_usuario_idx` (`id_rol`,`rol`) USING BTREE,
  ADD KEY `fk_tbl_roles_tbl_roles_objeto_idx` (`id_rol`,`rol`),
  ADD KEY `rol` (`rol`);

--
-- Indexes for table `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_objeto_2` (`id_objeto`),
  ADD KEY `fk_tbl_roles_objeto_tbl_roles_idx` (`id_rol`) USING BTREE,
  ADD KEY `fk_tbl_roles_objeto_tbl_pantallas_idx` (`id_objeto`) USING BTREE;

--
-- Indexes for table `tbl_telefono`
--
ALTER TABLE `tbl_telefono`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `id_tipotelefono` (`id_tipotelefono`);

--
-- Indexes for table `tbl_tipotelefono`
--
ALTER TABLE `tbl_tipotelefono`
  ADD PRIMARY KEY (`id_tipotelefono`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `fk_tbl_usuario_tbl_preg_resp_usu_idx` (`id_usuario`,`id_rol`),
  ADD KEY `fk_tbl_usuario_tbl_roles_idx` (`id_rol`) USING BTREE,
  ADD KEY `fk_tbl_usuario_tbl_empleados_idx` (`id_usuario`) USING BTREE,
  ADD KEY `fk_tbl_usuario_tbl_bitacoras_idx` (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  MODIFY `id_bitacora` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017;

--
-- AUTO_INCREMENT for table `tbl_cai`
--
ALTER TABLE `tbl_cai`
  MODIFY `id_cai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_detallefactura`
--
ALTER TABLE `tbl_detallefactura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_detalleorden`
--
ALTER TABLE `tbl_detalleorden`
  MODIFY `id_detalleorden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lote`
--
ALTER TABLE `tbl_lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ordendecompra`
--
ALTER TABLE `tbl_ordendecompra`
  MODIFY `id_ordencompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pantallas`
--
ALTER TABLE `tbl_pantallas`
  MODIFY `id_objeto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  MODIFY `id_parametro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_preguntas`
--
ALTER TABLE `tbl_preguntas`
  MODIFY `id_pregunta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  MODIFY `id_permiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_telefono`
--
ALTER TABLE `tbl_telefono`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tipotelefono`
--
ALTER TABLE `tbl_tipotelefono`
  MODIFY `id_tipotelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bitacoras`
--
ALTER TABLE `tbl_bitacoras`
  ADD CONSTRAINT `tbl_bitacoras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Constraints for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD CONSTRAINT `tbl_cliente_ibfk_1` FOREIGN KEY (`Id_telefono`) REFERENCES `tbl_telefono` (`id_telefono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detallefactura`
--
ALTER TABLE `tbl_detallefactura`
  ADD CONSTRAINT `tbl_detallefactura_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detallefactura_ibfk_2` FOREIGN KEY (`Id_factura`) REFERENCES `tbl_facturas` (`id_factura`);

--
-- Constraints for table `tbl_detalleorden`
--
ALTER TABLE `tbl_detalleorden`
  ADD CONSTRAINT `tbl_detalleorden_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`);

--
-- Constraints for table `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD CONSTRAINT `tbl_facturas_ibfk_1` FOREIGN KEY (`id_cai`) REFERENCES `tbl_cai` (`id_cai`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_facturas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Constraints for table `tbl_ordendecompra`
--
ALTER TABLE `tbl_ordendecompra`
  ADD CONSTRAINT `tbl_ordendecompra_ibfk_1` FOREIGN KEY (`id_detalleorden`) REFERENCES `tbl_detalleorden` (`id_detalleorden`),
  ADD CONSTRAINT `tbl_ordendecompra_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Constraints for table `tbl_parametros`
--
ALTER TABLE `tbl_parametros`
  ADD CONSTRAINT `tbl_parametros_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Constraints for table `tbl_pregunta_x_usuario`
--
ALTER TABLE `tbl_pregunta_x_usuario`
  ADD CONSTRAINT `tbl_pregunta_x_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`),
  ADD CONSTRAINT `tbl_pregunta_x_usuario_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`id_pregunta`);

--
-- Constraints for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `tbl_lote` (`id_lote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_roles_objeto`
--
ALTER TABLE `tbl_roles_objeto`
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`),
  ADD CONSTRAINT `tbl_roles_objeto_ibfk_2` FOREIGN KEY (`id_objeto`) REFERENCES `tbl_pantallas` (`id_objeto`);

--
-- Constraints for table `tbl_telefono`
--
ALTER TABLE `tbl_telefono`
  ADD CONSTRAINT `tbl_telefono_ibfk_1` FOREIGN KEY (`id_tipotelefono`) REFERENCES `tbl_tipotelefono` (`id_tipotelefono`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
