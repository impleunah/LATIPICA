<?php
require_once "../modelos/tbl_bitacoras_funcion.php";

$bitacoras=new bitacora();

$id_bitacora = isset($_POST["id_bitacora"])? limpiarCadena($_POST["id_bitacora"]):"";
$id_usuario= isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$objeto = isset($_POST["objeto"])? limpiarCadena($_POST["objeto"]):"";
$accion = isset($_POST["accion"])? limpiarCadena($_POST["accion"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$Antes = isset($_POST["Antes"])? limpiarCadena($_POST["Antes"]):"";
$Despues = isset($_POST["Despues"])? limpiarCadena($_POST["Despues"]):"";


//Recibir datos atraves de metodo POST que se envian mediante formulario - 26/02/2020//

switch ($_GET["op"]){

    case 'mostrar1':
		$rspta=$bitacoras->mostrar($id_bitacora);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$bitacoras->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 "0"=>$reg-> id_bitacora,
                 "1"=>$reg-> id_usuario,
                 "2"=>$reg-> objeto,
                 "3"=>$reg-> accion,
                 "4"=>$reg-> descripcion,
                 "5"=>$reg-> fecha,
                 "6"=>$reg-> Antes,
                 "7"=>$reg-> Despues,
				 "8"=>'<button class="btn btn-warning" onclick="mostrar1('.$reg->id_bitacora.')"><i class="fa fa-pencil"></i></button>'
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