-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2019 a las 10:36:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mayrek nueva`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Empresa` (IN `@cod_empresa` BIGINT, IN `@cod_usuario` BIGINT, IN `nombre` VARCHAR(50), IN `descripcion` VARCHAR(50), IN `telefonos` INT(11), IN `correos` VARCHAR(30), IN `sucursal` VARCHAR(50), IN `Ubicacion` VARCHAR(100), IN `Fecha` DATE, IN `Estado` ENUM('Activo','Inactivo'))  INSERT INTO empresa
(Cod_Empresa,Cod_Usuario,Nombre_Empresa,Descripcion_Empresa,Telefonos,Correos,Sucursal_Empresa,Ubicacion_Empresa,Fecha_Registro,Estado_Empresa )
VALUES
(@cod_empresa,@cod_usuario,nombre,descripcion,telefonos,correos, sucursal,Ubicacion ,Fecha,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Inventario` (IN `@Cod_Inventario` INT(16), IN `@Cod_cliente` INT(16), IN `@Cod_Noti` INT(16), IN `Monto` FLOAT, IN `Fecha_Adqui` DATE, IN `Fecha_Venci` DATE, IN `Estado_pa` ENUM('Pago','No Pago'), IN `Estado_Clien` ENUM('Vencido','No vencido'), IN `Fecha_Trans` DATE)  Insert into inventario(Cod_Inventario,Cod_cliente,Cod_Notificacion,Monto_Facturado,Fecha_Adquisicion,Fecha_Vencimiento,Estado_pago,Estado_Cliente,Fecha_Transcurrida)
values (@Cod_Inventario,@Cod_cliente,@Codi_Noti,Monto,Fecha_Adqui,Fecha_Venci,Estado_pa,Estado_Clien,Fecha_Trans)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Motivo` (IN `@Cod_Motivo` BIGINT, IN `id` BIGINT, IN `seguimiento` VARCHAR(50), IN `Proximo_Venci` VARCHAR(50))  NO SQL
insert into motivo(Cod_Motivo,Cod_id,Seguimiento,Proximo_Vencimiento)
values (@Cod_Mtivo,id,Seguimiento,Proximo_Venci)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Noti` (IN `@Cod_Noti` BIGINT, IN `@codigo` BIGINT, IN `forma` VARCHAR(50), IN `fecha` DATE, IN `Estado` ENUM('activo','inactivo'))  insert into notificaciones(Codigo_Noti,Cod_Tiponoti,Forma_Aviso,Fecha,Estado)
values(@Cod_Noti,@Codigo,forma,fecha ,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Personas` (IN `@Cod_per` INT(16), IN `Nombre` VARCHAR(100), IN `sexo` ENUM('Masculino','Femenino'), IN `Fecha_Re` DATE, IN `Fecha_Naci` DATE, IN `Usr_regis` VARCHAR(15), IN `Estado` ENUM('Activo','Inactivo'), IN `movil` INT(15), IN `fijo` INT(15), IN `correo` VARCHAR(30))  INSERT INTO personas (Nombre_Completo,Sexo,Fecha_Nacimiento,Telefono_Movil,Telefono_fijo,Correo,Fecha_Registro,USR_Registro,Estado_Persona)
VALUES (Nombre,Sexo,Fecha_Naci,movil,fijo,correo, Fecha_Re,Usr_regis,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_productos` (`cod_pro` BIGINT, IN `cod_em` BIGINT, IN `cod_tipo` BIGINT, IN `nom` VARCHAR(55), IN `des` VARCHAR(55), IN `cos` FLOAT, IN `estado` ENUM('Activo','Inactivo'), IN `fe_a` DATE, IN `fe_v` DATE)  insert into productos (  Cod_Producto,Cod_Empresa ,Cod_Tipo,nombre,descripcion,costo,estado,fecha_adquisicion,fecha_vencimiento)
values (cod_pro,cod_em,cod_tipo,nom,des,cos,estado,fe_a,fe_v)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tipo` (IN `@codigo` BIGINT, IN `nombre` VARCHAR(50), IN `descripcion` VARCHAR(50), IN `Estado` ENUM('activo','inactivo'))  insert into tipo_notificaciones(Cod_Tiponoti,Nombre,Descripcion,Estado)
values(@Codigo,nombre,descripcion,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tipo_producto` (IN `@codigo` BIGINT, IN `nombre` VARCHAR(50), IN `descr` VARCHAR(50))  insert into tipo_producto(Cod_Tipo,Nombre,Descripcion)                        
values(@Codigo,nombre,descr)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Usuarios` (IN `cod_persona` INT(16), IN `Nombre` VARCHAR(50), IN `Pass` VARCHAR(50), IN `tipo_usuario` VARCHAR(50), IN `Primera_vez` ENUM('si','no'), IN `USR` INT, IN `ip` VARCHAR(50), IN `Mac` VARCHAR(50), IN `Fecha_re` DATE, IN `Estado` ENUM('Activo','Inactivo'), IN `cod_usuario` INT)  Insert  into usuarios(Cod_Usuario,Cod_Persona,Nombre_Usuario,Contraseña,Tipo_Usuario,Primera_Vez,USR_Registro,IP_UltimaConexion,Mac_UltimaConexion,Fecha_Registro,Estado_Usuario)
values (cod_usuario,cod_persona,Nombre,Pass,tipo_usuario,Primera_vez,USR,ip,Mac,Fecha_re,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Cliente` (IN `cod_Cli` BIGINT, IN `cod_empre` BIGINT, IN `cod_usuario` BIGINT, IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `direccion` VARCHAR(50), IN `celular` VARCHAR(10), IN `casa` VARCHAR(10), IN `email` VARCHAR(30))  INSERT INTO cuentas_clientesbd
(Cod_Cliente,Cod_Empresa,Cod_Usuario,Nombre_Cliente,Apellido_Cliente,Direccion_Cliente,Telefono_Celular,Telefono_Casa,EMAIL)
VALUES(cod_Cli,cod_empre,cod_usuario,nombre,apellido,direccion,celular,casa,email)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Codigo` (IN `id` BIGINT, IN `Cod_Inventario` BIGINT, IN `Nombre` VARCHAR(50), IN `Descrip` VARCHAR(200))  INSERT INTO codigo (Cod_id,Cod_Inventario,Nombre,Descripcion)
VALUES (id,Cod_Inventario,Nombre,Descrip)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INS_cate_Servicios` (IN `cod_cate` BIGINT, IN `no_cat` VARCHAR(20), IN `estado_cat` ENUM('Activo','Inactivo '))  NO SQL
insert into categoria_servicios(Cod_categoria,Nombre,Estado_categoria)
values (cod_cate,no_cat,estado_cat)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INS_Servicios` (IN `cod_cate` BIGINT, IN `cod_pro` BIGINT, IN `no_ser` VARCHAR(55), IN `precio_ser` FLOAT, IN `estado_ser` ENUM('Activo','Inactivo '), IN `fecha_a` DATE, IN `fecha_c` DATE, IN `cod_ser` INT)  NO SQL
insert into servicios(Cod_servicio,Cod_categoria,Cod_producto,Nom_servicio,Precio,estado_ser,fecha_adquisicion,fecha_cancelacion)
values (cod_ser,cod_cate,cod_pro,no_ser,precio_ser,estado_ser,fecha_a,fecha_c)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Seleccionar_Personas` (IN `Cod_Empresa` INT(16))  NO SQL
SELECT  tc.Correo,tc.Telefono
FROM inventario as i INNER JOIN cuentas_clientesbd as cc
on i.Cod_Inventario=cc.Cod_Cliente inner JOIN contacto as c
on cc.Cod_Cliente=c.Cod_Contacto INNER JOIN tipo_contacto as tc
on  c.Cod_Contacto=tc.Cod_Tipo_Contacto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_cate_Servicios` (IN `cod_cate` BIGINT, IN `no_cat` VARCHAR(20), IN `estado_cat` ENUM('Activo','Inactivo '))  NO SQL
UPDATE categoria_servicios
set 
Nombre=no_cat,
Estado_categoria=estado_cat
where Cod_categoria= cod_cate$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Cliente` (IN `cod_Cli` BIGINT, IN `cod_empre` BIGINT, IN `cod_usuario` BIGINT, IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `direccion` VARCHAR(50), IN `casa` VARCHAR(10), IN `celular` VARCHAR(10), IN `email` VARCHAR(30))  UPDATE cuentas_clientesbd
SET Cod_Empresa=cod_empre, Cod_Usuario=cod_usuario,Nombre_Cliente=nombre,Apellido_Cliente=apellido,Direccion_Cliente=direccion,Telefono_Celular=celular,Telefono_casa=casa ,EMAIL=email
WHERE Cod_Cliente=cod_cli$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Codigo` (IN `id` BIGINT, IN `Cod_Inventario` BIGINT, IN `Nombre` VARCHAR(50), IN `Descrip` VARCHAR(200))  Update codigo
    SET
    Cod_Inventario=Cod_Inventario,
    Nombre=Nombre,
    Descripcion=Descrip
    where Cod_id=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Empresa` (IN `@cod_empresa` BIGINT, IN `@cod_usuario` BIGINT, IN `nombre` VARCHAR(50), IN `descripcion` VARCHAR(50), IN `telefonos` INT(11), IN `correos` VARCHAR(30), IN `sucursal` VARCHAR(50), IN `Ubicacion` VARCHAR(100), IN `Fecha` DATE, IN `Estado` ENUM('Activo','Inactivo'))  update empresa
 set 
 Cod_Usuario=@cod_usuario,
 Nombre_Empresa=nombre,
 Descripcion_Empresa=descripcion,
Telefonos=telefonos,
Correos=correos,
Sucursal_Empresa=sucursal,
Ubicacion_Empresa=Ubicacion,
Fecha_Registro=Fecha,
Estado_Empresa=Estado 
where  Cod_Empresa= @cod_empresa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Inventario` (IN `@Cod_inventario` INT, IN `@Cod_Cliente` INT, IN `@Cod_Noti` INT, IN `Monto` FLOAT, IN `Fecha_Adqui` DATE, IN `Fecha_Venci` DATE, IN `Estado_pa` ENUM('Pago','No pago',''), IN `Estado_Clien` ENUM('Vencido','No Vencido'), IN `Fecha_Trans` DATE)  Update inventario
set Cod_Cliente=@Cod_Cliente ,Cod_Notificacion=@Cod_Noti,Monto_Facturado=Monto,
Fecha_Adquisicion=Fecha_Adqui,Fecha_Vencimiento=Fecha_Venci,
Estado_pago=Estado_pa,Estado_Cliente=Estado_Clien,
Fecha_Transcurrida=Fecha_Trans
where Cod_Inventario=@Cod_inventario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Motivo` (IN `@Cod_Motivo` BIGINT, IN `id` BIGINT, IN `seguimiento` VARCHAR(50), IN `Proximo_Venci` VARCHAR(50))  NO SQL
update motivo
set 
Cod_id=id,
Seguimiento=seguimiento,Proximo_Vencimiento=Proximo_Venci
where Cod_Motivo=@Cod_Motivo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Personas` (IN `@Cod_persona` INT(16), IN `Nombre` VARCHAR(50), IN `Sexo` ENUM('Masculino','Femenino'), IN `Fecha_Naci` DATE, IN `Fecha_Re` DATE, IN `Usr_regis` INT, IN `Estado` ENUM('Activo','Inactivo'), IN `movil` INT, IN `fijo` INT, IN `correo` INT)  Update personas
set Nombre_Completo=Nombre,
Sexo=Sexo,
Fecha_Nacimiento=Fecha_Naci,
Telefono_Movil=movil,
Telefono_fijo=fijo,
Correo=correo,
Fecha_Registro=Fecha_Re,
USR_Registro=Usr_regis,
Estado_Persona=Estado
where Cod_persona=@Cod_persona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_productos` (`cod_pro` BIGINT, IN `cod_em` BIGINT, IN `cod_tipo` BIGINT, IN `nom` VARCHAR(55), IN `des` VARCHAR(55), IN `cos` FLOAT, IN `estado` ENUM('Activo','Inactivo'), IN `fe_a` DATE, IN `fe_v` DATE)  update  productos
set  
Cod_Empresa=cod_emp ,
Cod_Tipo=cod_tipo,
nombre=nom,
descripcion=des,
costo=cos,
estado=estado,
fecha_adquisicion=fe_a,
fecha_vencimiento=fe_v
where  Cod_Producto=cod_pro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tipo_producto` (IN `@codigo` BIGINT, IN `nombre` VARCHAR(50), IN `descr` VARCHAR(50))  update tipo_producto
set 
Nombre=nombre,
Descripcion=descr                        
where  Cod_Tipo=@Codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Usuario` (IN `@Cod_Usuario` INT(16), IN `cod_persona` INT(16), IN `Nombre` VARCHAR(50), IN `Pass` VARCHAR(50), IN `tipo_usuario` VARCHAR(50), IN `Primero_vez` ENUM('si','no'), IN `USR` INT, IN `ip` VARCHAR(50), IN `Mac` VARCHAR(50), IN `Fecha_registro` DATE, IN `Estado` ENUM('Activo','Inactivo'))  Update usuarios
set Cod_persona=cod_persona,Nombre_Usuario=Nombre,Contraseña=Pass,Tipo_Usuario=tipo_usuario,Primera_Vez=Primera_vez,USR_Registro=USR,IP_UltimaConexion=ip,Mac_UltimaConexion=Mac,Fecha_Registro=Fecha_registo,Estado_Usuario=Estado
where Cod_Usuario=@Cod_Usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upd_servicio` (IN `cod_serv` INT(16), IN `nom_ser` VARCHAR(55), IN `precio_ser` FLOAT, IN `estado_se` ENUM('Activo','Inactivo'), IN `fecha_adqui` DATE, IN `fecha_cance` DATE, IN `cod_pro` INT(16), IN `cod_cate` INT(16))  NO SQL
update servicios 
set Cod_servicio=cod_serv,Cod_producto=cod_pro,Cod_categoria=cod_cate,Nom_servicio=nom_ser,Precio=precio_ser,Estado_ser=estado_se,Fecha_adquisicion=fecha_adqui,Fecha_cancelacion=fecha_cance
where Cod_servicio=Cod_ser$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_servicios`
--

CREATE TABLE `categoria_servicios` (
  `Cod_categoria` int(16) NOT NULL,
  `Nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='tabla de categoria de servicio';

--
-- Volcado de datos para la tabla `categoria_servicios`
--

INSERT INTO `categoria_servicios` (`Cod_categoria`, `Nombre`) VALUES
(1, 'prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE `codigo` (
  `Cod_id` int(16) NOT NULL,
  `Cod_Inventario` int(16) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_clientesbd`
--

CREATE TABLE `cuentas_clientesbd` (
  `Cod_Cliente` int(16) NOT NULL,
  `Cod_Empresa` int(16) NOT NULL,
  `Cod_Producto` int(16) NOT NULL,
  `Cod_servicio` int(16) NOT NULL,
  `Nombre_Cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `Apellido_Cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `Direccion_Cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `Telefono_Celular` varchar(10) COLLATE utf8_bin NOT NULL,
  `Telefono_Casa` varchar(10) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Cod_Empresa` int(16) NOT NULL,
  `Cod_Usuario` int(16) DEFAULT NULL,
  `Nombre_Empresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `Descripcion_Empresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `Telefonos` int(11) NOT NULL,
  `Correos` varchar(30) COLLATE utf8_bin NOT NULL,
  `Sucursal_Empresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `Ubicacion_Empresa` varchar(100) COLLATE utf8_bin NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Estado_Empresa` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `cod_factura` int(16) NOT NULL,
  `Cod_Cliente` int(16) NOT NULL,
  `Numero_Factura` varchar(20) COLLATE utf8_bin NOT NULL,
  `Total` float NOT NULL,
  `Precio Unitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Cod_Inventario` int(16) NOT NULL,
  `Cod_Cliente` int(16) NOT NULL,
  `Codigo_Noti` int(16) NOT NULL,
  `Monto_Facturado` float NOT NULL,
  `Fecha_Adquisicion` date NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Estado_Pago` varchar(20) COLLATE utf8_bin NOT NULL,
  `Estado_Cliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `Fecha_Transcurrida` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `Cod_Motivo` int(16) NOT NULL,
  `Cod_id` int(16) NOT NULL,
  `Seguimiento` enum('Localizado','Inlocalizado','Demanda') COLLATE utf8_bin NOT NULL,
  `Proximo_Vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `Codigo_Noti` int(16) NOT NULL,
  `Cod_Tiponoti` int(16) NOT NULL,
  `Forma_Aviso` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `Cod_Persona` int(16) NOT NULL,
  `Nombres` varchar(100) COLLATE utf8_bin NOT NULL,
  `Apellidos` int(11) NOT NULL,
  `Sexo` varchar(20) COLLATE utf8_bin NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Telefono_Movil` int(15) NOT NULL,
  `Telefono_fijo` int(11) NOT NULL,
  `Correo` varchar(30) COLLATE utf8_bin NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Estado_Persona` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`Cod_Persona`, `Nombres`, `Apellidos`, `Sexo`, `Fecha_Nacimiento`, `Telefono_Movil`, `Telefono_fijo`, `Correo`, `Fecha_Registro`, `Estado_Persona`) VALUES
(3, 'Karla', 0, 'Femenino', '0000-00-00', 97730973, 22205938, 'karlaalvarenga15@live.com', '0000-00-00', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Cod_Producto` int(16) NOT NULL,
  `Cod_Empresa` int(16) NOT NULL,
  `Cod_Tipo` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(20) COLLATE utf8_bin NOT NULL,
  `Costo` float NOT NULL,
  `Fecha_Adquisicion` date NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Cod_Producto`, `Cod_Empresa`, `Cod_Tipo`, `Nombre`, `Descripcion`, `Costo`, `Fecha_Adquisicion`, `Fecha_Vencimiento`, `Estado`) VALUES
(2, 1, 1, 'Visa', 'Mas beneficios', 1000, '2019-03-23', '2019-06-27', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `Cod_reporte` int(16) NOT NULL,
  `Cod_inventario` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Cod_servicio` int(16) NOT NULL,
  `Cod_producto` int(16) NOT NULL,
  `Cod_categoria` int(16) NOT NULL,
  `Nom_servicio` varchar(55) COLLATE utf8_bin NOT NULL,
  `Precio` float NOT NULL,
  `Fecha_adquisicion` date NOT NULL,
  `Fecha_cancelacion` date NOT NULL,
  `Estado_ser` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla servicios de la empresa';

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`Cod_servicio`, `Cod_producto`, `Cod_categoria`, `Nom_servicio`, `Precio`, `Fecha_adquisicion`, `Fecha_cancelacion`, `Estado_ser`) VALUES
(2, 2, 1, 'ilove', 1000000, '2019-03-27', '2019-03-28', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_notificaciones`
--

CREATE TABLE `tipo_notificaciones` (
  `Cod_Tiponoti` int(16) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_bin NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_notificaciones`
--

INSERT INTO `tipo_notificaciones` (`Cod_Tiponoti`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'hello', 'hola', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `Cod_Tipo` int(16) NOT NULL,
  `Nombre` varchar(15) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`Cod_Tipo`, `Nombre`, `Descripcion`) VALUES
(1, 'Premiun', 'Dorada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cod_Usuario` int(16) NOT NULL,
  `Cod_Persona` int(16) NOT NULL,
  `Nombre_Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8_bin NOT NULL,
  `Tipo_Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `USR_Registro` int(11) NOT NULL,
  `IP_UltimaConexion` varchar(50) COLLATE utf8_bin NOT NULL,
  `Mac_UltimaConexion` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Estado_Usuario` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cod_Usuario`, `Cod_Persona`, `Nombre_Usuario`, `Contraseña`, `Tipo_Usuario`, `USR_Registro`, `IP_UltimaConexion`, `Mac_UltimaConexion`, `Fecha_Registro`, `Estado_Usuario`) VALUES
(5, 3, 'karla15', '1234', 'admin', 1245, '101.10.10', '255255', '0000-00-12', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  ADD PRIMARY KEY (`Cod_categoria`);

--
-- Indices de la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`Cod_id`),
  ADD KEY `Cod_Inventario` (`Cod_Inventario`);

--
-- Indices de la tabla `cuentas_clientesbd`
--
ALTER TABLE `cuentas_clientesbd`
  ADD PRIMARY KEY (`Cod_Cliente`),
  ADD KEY `Cod_Empresa` (`Cod_Empresa`),
  ADD KEY `Cod_Usuario` (`Cod_Producto`),
  ADD KEY `Cod_servicio` (`Cod_servicio`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Cod_Empresa`),
  ADD KEY `Cod_Contacto` (`Cod_Usuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`cod_factura`),
  ADD KEY `Cod_Cliente` (`Cod_Cliente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Cod_Inventario`),
  ADD KEY `Cod_Clientes` (`Cod_Cliente`),
  ADD KEY `Cod_Notificacion` (`Codigo_Noti`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`Cod_Motivo`),
  ADD KEY `Cod_id` (`Cod_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`Codigo_Noti`),
  ADD KEY `Cod_Tiponoti` (`Cod_Tiponoti`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`Cod_Persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Cod_Producto`),
  ADD KEY `Cod_Cliente` (`Cod_Empresa`),
  ADD KEY `Cod_Tipo` (`Cod_Tipo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`Cod_reporte`),
  ADD KEY `Cod_inventario` (`Cod_inventario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Cod_servicio`),
  ADD KEY `Cod_categoria` (`Cod_categoria`),
  ADD KEY `Cod_producto` (`Cod_producto`);

--
-- Indices de la tabla `tipo_notificaciones`
--
ALTER TABLE `tipo_notificaciones`
  ADD PRIMARY KEY (`Cod_Tiponoti`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`Cod_Tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cod_Usuario`),
  ADD KEY `Cod_Empresa` (`Cod_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  MODIFY `Cod_categoria` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `codigo`
--
ALTER TABLE `codigo`
  MODIFY `Cod_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas_clientesbd`
--
ALTER TABLE `cuentas_clientesbd`
  MODIFY `Cod_Cliente` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Cod_Empresa` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Cod_Inventario` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `Cod_Motivo` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `Codigo_Noti` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `Cod_Persona` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Cod_Producto` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `Cod_reporte` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `Cod_servicio` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_notificaciones`
--
ALTER TABLE `tipo_notificaciones`
  MODIFY `Cod_Tiponoti` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `Cod_Tipo` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Cod_Usuario` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD CONSTRAINT `codigo_ibfk_1` FOREIGN KEY (`Cod_Inventario`) REFERENCES `inventario` (`Cod_Inventario`);

--
-- Filtros para la tabla `cuentas_clientesbd`
--
ALTER TABLE `cuentas_clientesbd`
  ADD CONSTRAINT `cuentas_clientesbd_ibfk_1` FOREIGN KEY (`Cod_Empresa`) REFERENCES `empresa` (`Cod_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_clientesbd_ibfk_2` FOREIGN KEY (`Cod_Producto`) REFERENCES `productos` (`Cod_Producto`),
  ADD CONSTRAINT `cuentas_clientesbd_ibfk_3` FOREIGN KEY (`Cod_servicio`) REFERENCES `servicios` (`Cod_servicio`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`Cod_Usuario`) REFERENCES `usuarios` (`Cod_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cuentas_clientesbd` (`Cod_Cliente`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cuentas_clientesbd` (`Cod_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`Codigo_Noti`) REFERENCES `notificaciones` (`Codigo_Noti`);

--
-- Filtros para la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD CONSTRAINT `motivo_ibfk_1` FOREIGN KEY (`Cod_id`) REFERENCES `codigo` (`Cod_id`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`Cod_inventario`) REFERENCES `inventario` (`Cod_Inventario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`Cod_categoria`) REFERENCES `categoria_servicios` (`Cod_categoria`);

--
-- Filtros para la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD CONSTRAINT `tipo_producto_ibfk_1` FOREIGN KEY (`Cod_Tipo`) REFERENCES `productos` (`Cod_Tipo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Cod_Persona`) REFERENCES `personas` (`Cod_Persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
