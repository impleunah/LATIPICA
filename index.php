<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/cliente.controlador.php";
require_once "controladores/empresa.controlador.php";
require_once "controladores/inventario.controlador.php";
require_once "controladores/notificaciones.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/reportes.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/usuario.controlador.php";

require_once "modelos/plantilla.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/cliente.modelo.php";
require_once "modelos/empresa.modelo.php";
require_once "modelos/inventario.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/reportes.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();