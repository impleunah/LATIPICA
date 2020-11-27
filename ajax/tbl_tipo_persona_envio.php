<?php
require_once "../modelos/tbl_tipo_persona_funcion.php";

$tipo_persona=new tipo_persona();

$id_tipo_persona = isset($_POST["id_tipo_persona"])? limpiarCadena($_POST["id_tipo_persona"]):"";
$tipo_pesona1 = isset($_POST["tipo_person"])? limpiarCadena($_POST["tipo_person"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario - 24/02/2020//

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_tipo_persona)){
			$rspta=$tipo_persona->_insertartipopersona($tipo_pesona1,$estado);
			echo $rspta ? "tipo persona Registrado" : "tipo persona no se pudo registrar";
		}
		else {
			$rspta=$tipo_persona->_editartipopersona($id_tipo_persona,$tipo_pesona1,$estado);
			echo $rspta ? "tipo persona se ha actualizado" : "tipo persona no se pudo actualizar";
		} 
    break;

    case 'mostrar1':
		$rspta=$tipo_persona->mostrar($id_tipo_persona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$tipo_persona->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 
				 "0"=>'<button class="btn btn-warning" onclick="mostrar1('.$reg->id_tipo_persona.')"><i class="fa fa-pencil"></i></button>',
				 "1"=>$reg-> id_tipo_persona,
                 "2"=>$reg-> tipo_persona,
                 "3"=>$reg-> estado,
				
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
