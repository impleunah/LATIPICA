<?php 
require_once "../modelos/tbl_clientes.php";

$tele=new tbl_clientes();

$id_cliente=isset($_POST["id_cliente"])? limpiarCadena($_POST["id_cliente"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$RTN=isset($_POST["RTN"])? limpiarCadena($_POST["RTN"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";


switch ($_GET["op"]){
	
	case 'mostrar':
		$rspta=$tele->mostrar($id_cliente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$tele->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_cliente.')"><i class="fa fa-pencil"></i></button>',
				 "1"=>$reg->nombre,
				 "2"=>$reg->RTN,
				 "3"=>$reg->correo,

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



