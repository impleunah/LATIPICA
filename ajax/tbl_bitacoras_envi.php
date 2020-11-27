<?php
require_once "../modelos/tbl_bitacora_funcion.php";

$bitacoras=new bitacoras();





//Recibir datos atraves de metodo POST que se envian mediante formulario - 26/02/2020//

switch ($_GET["op"]){

    

    case 'listar':
		$rspta=$bitacoras->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 "0"=>$reg->id_bitacora,
				 "1"=>$reg->fecha,
                 "2"=>$reg->Nombre_Usuario,
                 "3"=>$reg->objeto,
                 "4"=>$reg->accion,
                 "5"=>$reg->descripcion,
                 "6"=>$reg->Antes,
				 "7"=>$reg->Despues,
		
				 
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