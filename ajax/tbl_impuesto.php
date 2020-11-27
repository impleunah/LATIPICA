<?php
session_start();
require_once "../modelos/impuesto.php";
require '../config/Conexion.php';
$impuesto =new impuesto();

$id_impuesto= isset($_POST["id_impuesto"])? limpiarCadena($_POST["id_impuesto"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario 

switch ($_GET["op"]){
	case 'guardaryeditar':
		$porcentage=$descripcion/100;
		if (empty($id_impuesto)){
		
			
			$sql=ejecutarConsulta_row("SELECT * FROM tbl_impuesto WHERE descripcion='$porcentage'");
			
			if($sql==0){
			
			$rspta=$impuesto->_insertar($porcentage);
			echo $rspta ? "Registrada" : "no se pudo registrar";
			
		}else{echo "Este impuesto ya existe ";} }
		else if(  $_SESSION["man"]==1 ) {
			$sql=ejecutarConsulta_row("SELECT * FROM tbl_impuesto WHERE descripcion='$porcentage'");
			
			if($sql==0){
			$porcentage=$descripcion/100;
			$rspta=$impuesto->_editar($id_impuesto,$porcentage);
			echo $rspta ? " se ha actualizado" : "no se pudo actualizar";
				}else{echo "Este impuesto ya existe ";} 
	}else{echo "No tiene permiso de actulizar ";}
	break;
	case 'desactivar':
		$rspta=$impuesto->desactivar($id_impuesto);
		echo $rspta ? "operacion Desactivada" : "operacion no se puede desactivar";
	break;

	case 'activar':
		$rspta=$impuesto->activar($id_impuesto);
		echo $rspta ? "operacion activada" : "operacion no se puede activar";
	break;


    case 'mostrar':
		$rspta=$impuesto->mostrar($id_impuesto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$impuesto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_impuesto.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger" onclick="desactivar('.$reg->id_impuesto.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->id_impuesto.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary" onclick="activar('.$reg->id_impuesto.')"><i class="fa fa-check"></i></button>',
                 "1"=>$reg->id_impuesto,
                 "2"=>$reg->descripcion*100,
                 "3"=>$reg->estado?'<span class="label bg-green">Activado</span>':
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
