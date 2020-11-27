<?php 

require_once "../modelos/tbl_parametros1.php";

$categoria=new parametro();

$id_parametro=isset($_POST["id_parametro"])? limpiarCadena($_POST["id_parametro"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";


switch ($_GET["op"]){


	case 'desactivar':
		$rspta=$categoria->desactivar($id_parametro);
 		echo $rspta ? "Parametro Desactivado" : "Rol no se puede desactivar";
	break;

	case 'activar':
		$rspta=$categoria->activar($id_parametro);
 		echo $rspta ? "Parametro activado" : "Rol no se puede activar";
	break;
}
?>