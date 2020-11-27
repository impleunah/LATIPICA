	<?php 
	session_start(); 
require_once "../modelos/tbl_pantallas_funcion.php";

$pantallas=new Pantalla();

$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_objeto=isset($_POST["id_objeto"])? limpiarCadena($_POST["id_objeto"]):"";
$pan=isset($_POST["pan"])? limpiarCadena($_POST["pan"]):"";

$objeto=isset($_POST["objeto"])? limpiarCadena($_POST["objeto"]):"";
$tipo_objeto=isset($_POST["tipo_objeto"])? limpiarCadena($_POST["tipo_objeto"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fecha_creacion=isset($_POST["fecha_creacion"])? limpiarCadena($_POST["fecha_creacion"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($pan)){
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_pantallas WHERE objeto='$objeto'");


			if($sql==0){
			$rspta=$pantallas->insertar(strtoupper($objeto),$tipo_objeto,$descripcion,$usu);
			echo $rspta ? " Pantalla Registrada" : " Pantalla no se pudo registrar";
		}else{echo "La pantalla que desea ingresar ya existe";}
		}
		else if( $_SESSION["se"]==1 ) {
			$rspta=$pantallas->editar($pan,strtoupper($objeto),$tipo_objeto,$descripcion,$usu);
			echo $rspta ? "Pantalla se ha actualizado" : " Pantalla no se pudo actualizar";
		}else{echo "No tiene permiso de actualizar ";}
	break;

	case 'desactivar':
		$rspta=$pantallas->desactivar($id_objeto);
 		echo $rspta ? "Pantalla Desactivada" : "Pantalla no se puede desactivar";
	break;

	case 'activar':
		$rspta=$pantallas->activar($id_objeto);
 		echo $rspta ? "Pantalla activada" : "Pantalla no se puede activar";
	break;
    case 'mostrar':
		$rspta=$pantallas->mostrar($id_objeto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

	case 'listar':
		$rspta=$pantallas->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_objeto.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_objeto.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_objeto.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_objeto.'), a();"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_objeto,
				 "2"=>$reg-> objeto,
                 "3"=>$reg-> tipo_objeto,
                 "4"=>$reg-> descripcion,
				 "5"=>$reg-> fecha_creacion,
				 "6"=>$reg-> creado_por,
				 "7"=>$reg-> fecha_modificacion,
				 "8"=>$reg-> modificado_por,
				 "9"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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