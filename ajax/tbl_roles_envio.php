<?php
 session_start();
require_once "../modelos/tbl_roles_funcion.php";

$roles=new rol();
$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_rol = isset($_POST["id_rol"])? limpiarCadena($_POST["id_rol"]):"";
$rol = isset($_POST["rol"])? limpiarCadena($_POST["rol"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fecha_creacion = isset($_POST["fecha_creacion"])? limpiarCadena($_POST["fecha_creacion"]):"";
$fecha_mofificacion = isset($_POST["fecha_modificacion"])? limpiarCadena($_POST["fecha_modificacion"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario - 24/02/2020//

switch ($_GET["op"]){
	case 'guardaryeditar':
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_roles WHERE rol='$rol'");

		if (empty($id_rol))
		{
			
			if($sql==0){

			$rspta=$roles->_insertarrol(strtoupper($rol),$descripcion,$usu);
			echo $rspta ? "Rol Registrado" : "Rol no se pudo registrar";
		}else{echo "EL Rol que desea ingresar ya existe";}

	}else if($_SESSION["se"]==1) {
			$rspta=$roles->_editarrol($id_rol,strtoupper($rol),$descripcion,$usu);
			echo $rspta ? "El rol se ha actualizado" : "El rol no se pudo actualizar";
		}else{echo "No tiene permiso de actulizar ";}
	
    break;

    case 'mostrar':
		$rspta=$roles->mostrar($id_rol);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$roles->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				
				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostrar"  onclick="mostrar('.$reg->id_rol.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_rol.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostrar"   onclick="mostrar('.$reg->id_rol.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_rol.'), a();"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_rol,
				 "2"=>$reg-> rol,
                 "3"=>$reg-> descripcion,
				 "4"=>$reg-> fecha_creacion,
				 "5"=>$reg-> creado_por,
				 "6"=>$reg-> fecha_modificacion,
				 "7"=>$reg-> modificado_por,
				 "8"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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

	case 'desactivar':
		$rspta=$roles->desactivar($id_rol);
 		echo $rspta ? "Rol Desactivado" : "Rol no se puede desactivar";
	break;

	case 'activar':
		$rspta=$roles->activar($id_rol);
 		echo $rspta ? "Rol activado" : "Rol no se puede activar";
	break;

}

?>
