<?php 
require_once "../modelos/tbl_tipo_tel_dir.php";

$tele=new Tipo_Telefono_Direccio();

$id_telefono_direccion=isset($_POST["id_telefono_direccion"])? limpiarCadena($_POST["id_telefono_direccion"]):"";
$Tipo_Telefono_Direccion=isset($_POST["Tipo_Telefono_Direccion"])? limpiarCadena($_POST["Tipo_Telefono_Direccion"]):"";
$id_cliente=isset($_POST["id_cliente"])? limpiarCadena($_POST["id_cliente"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$Descripcion=isset($_POST["Descripcion"])? limpiarCadena($_POST["Descripcion"]):"";
$Estado=isset($_POST["Estado"])? limpiarCadena($_POST["Estado"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_telefono_direccion)){
			$rspta=$tele->insertar($id_cliente,$Tipo_Telefono_Direccion,$tipo,$Descripcion);
			echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";
		}
		else {
			$rspta=$tele->editar($id_telefono_direccion,$Tipo_Telefono_Direccion,$tipo,$Descripcion,$id_cliente);
			echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$tele->desactivar($id_telefono_direccion);
 		echo $rspta ? "Categoría Desactivada" : "Categoría no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$tele->activar($id_telefono_direccion);
 		echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$tele->mostrar($id_telefono_direccion);
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
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_telefono_direccion.')"><i class="fa fa-pencil"></i></button>',
				 "1"=>$reg->id_telefono_direccion,
				 "2"=>$reg->nombre,
                "3"=>$reg->Tipo_Telefono_Direccion,
                "4"=>$reg->tipo,
                "5"=>$reg->Descripcion,
                
 				
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