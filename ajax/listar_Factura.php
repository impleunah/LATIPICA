<?php 
require_once "../modelos/factura.php";

$categoria=new Categori();


switch ($_GET["op"]){
	

	case 'listar':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                "0"=>$reg->id_factura_compra,
 				"1"=>$reg->fecha,
 				"2"=>$reg->nombre,
 				"3"=>$reg->id_factura_compra,
                "4"=>$reg->estado,
                "5"=>$reg->total,
                "6"=>$reg->descripcion,
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

