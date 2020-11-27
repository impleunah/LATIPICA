<?php
require_once "../modelos/tbl_tipo_operaciones_funcion.php";

$operaciones =new operaciones();

$id_tipo_operaciones = isset($_POST["id_tipo_operaciones"])? limpiarCadena($_POST["id_tipo_operaciones"]):"";
$tipo_operacion = isset($_POST["tipo_operacion"])? limpiarCadena($_POST["tipo_operacion"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
//Recibir datos atraves de metodo POST que se envian mediante formulario - 26/02/2020//

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_tipo_operaciones)){
			$rspta=$operaciones->_insertar($tipo_operacion,$estado);
			echo $rspta ? "Tipo Operacion Registrada" : "Tipo Operacion no se pudo registrar";
		}
		else {
			$rspta=$operaciones->_editar($id_tipo_operaciones,$tipo_operacion,$estado);
			echo $rspta ? "El Tipo Operacion se ha actualizado" : "El Tipo Operacion no se pudo actualizar";
		}
	break;
	case 'desactivar':
		$rspta=$operaciones->desactivar($id_tipo_operaciones);
		echo $rspta ? "operacion Desactivada" : "operacion no se puede desactivar";
	break;

	case 'activar':
		$rspta=$operaciones->activar($id_tipo_operaciones);
		echo $rspta ? "operacion activada" : "operacion no se puede activar";
	break;


    case 'mostrar':
		$rspta=$operaciones->mostrar($id_tipo_operaciones);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$operaciones->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_tipo_operaciones.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger" onclick="desactivar('.$reg->id_tipo_operaciones.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->id_tipo_operaciones.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary" onclick="activar('.$reg->id_tipo_operaciones.')"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_tipo_operaciones,
				 "2"=>$reg-> tipo_operacion,
                 "3"=>$reg-> estado?'<span class="label bg-green">Activado</span>':
				 '<span class="label bg-red">Desactivado</span>', 
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

}

?>
