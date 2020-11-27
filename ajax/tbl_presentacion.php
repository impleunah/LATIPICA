<?php
require_once "../modelos/presentacion.php";

$presentacion =new presentacion();

$id_presentacion = isset($_POST["id_presentacion"])? limpiarCadena($_POST["id_presentacion"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
//Recibir datos atraves de metodo POST que se envian mediante formulario - 26/02/2020//

switch ($_GET["op"]){
	
	case 'guardaryeditar':
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_presentacion WHERE descripcion='$descripcion'");

		if (empty($id_presentacion)){
			if($sql==0){
			$rspta=$presentacion->_insertar($descripcion,$estado);
			echo $rspta ? "Presentación Resgistrada " : "Presentacion no se pudo registrar";
		}else{echo "La presentacion que desea ingresar ya existe";}
		}
		else if( $_SESSION["man"]==1 ) {
			$rspta=$presentacion->_editar($id_presentacion,$descripcion,$estado);
			echo $rspta ? "Presentacion se ha actualizado" : "Presentacion no se pudo actualizar";
		}else{echo "No tiene permiso de actulizar ";}
	break;

	case 'desactivar':
		$rspta=$presentacion->desactivar($id_presentacion);
		echo $rspta ? "Presentacion desactivada" : "Presentacion no se puede desactivar";
	break;

	case 'activar':
		$rspta=$presentacion->activar($id_presentacion);
		echo $rspta ? "Presentacion activada" : "Presentacion no se puede activar";
	break;


    case 'mostrar':
		$rspta=$presentacion->mostrar($id_presentacion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

   

}

?>
