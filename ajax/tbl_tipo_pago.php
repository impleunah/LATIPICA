<?php 
require_once "../modelos/tbl_tipo_pago_funcion.php";

$pagos=new Pago();

$id_tipo_pago=isset($_POST["id_tipo_pago"])? limpiarCadena($_POST["id_tipo_pago"]):"";
$tipo_pago=isset($_POST["tipo_pago"])? limpiarCadena($_POST["tipo_pago"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_tipo_pago)){
			$rspta=$pagos->insertar($id_tipo_pago,$tipo_pago,$descripcion);
			echo $rspta ? "parametro registrada" : "parametro no se pudo registrar";
		}
		else {
			$rspta=$pagos->editar($id_tipo_pago,$tipo_pago,$descripcion);
			echo $rspta ? "parametro registrada" : "parametro no se pudo registrar";
		}
	break;



	case 'mostrar':
		$rspta=$pagos->mostrar($id_tipo_pago);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$pagos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(

				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_tipo_pago.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->tipo_pago,
 				"2"=>$reg->descripcion,
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