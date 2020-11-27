<?php
 session_start();
require_once "../modelos/tbl_operaciones_funcion.php";

$operacion=new operaciones();

$id_operacion = isset($_POST["id_operacion"])? limpiarCadena($_POST["id_operacion"]):"";
$nombre= isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario - 27/5/2020//

switch ($_GET["op"]){

	case 'guardaryeditar':
		if (empty($id_operacion)){
			$rspta=$operacion->insertar($nombre,$descripcion,$estado);
			echo $rspta ? " Operacion Registrada" : " Operacion no se pudo registrar";
		}
		else if(  $_SESSION["man"]==1 ) {
			$rspta=$operacion->editar($id_operacion,$nombre,$descripcion);
			echo $rspta ? "Operacion se ha actualizado" : " Operacion no se pudo actualizar";
		}else{echo "No tiene permiso de actulizar ";}
	break;
	case 'desactivar':
		$rspta=$operacion->desactivar($id_operacion);
		echo $rspta ? "operacion Desactivada" : "operacion no se puede desactivar";
	break;

	case 'activar':
		$rspta=$operacion->activar($id_operacion);
		echo $rspta ? "operacion activada" : "operacion no se puede activar";
	break;


    case 'mostrar':
		$rspta=$operacion->mostrar($id_operacion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$operacion->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostrar"  onclick="mostrar('.$reg->id_operacion.'), a();"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_operacion.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" id="mostrar" onclick="mostrar('.$reg->id_operacion.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-primary"   onclick="activar('.$reg->id_operacion.'), a();"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_operacion,
                 "2"=>$reg-> id_tipo_operaciones,
                 "3"=>$reg-> descripcion,
				 "4"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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