<?php 
session_start();
require_once "../modelos/tbl_parametros.php";

$categoria=new parametro();

$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_parametro=isset($_POST["id_parametro"])? limpiarCadena($_POST["id_parametro"]):"";
$id_usuario=isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$valor=isset($_POST["valor"])? limpiarCadena($_POST["valor"]):"";
$Parametro=isset($_POST["Parametro"])? limpiarCadena($_POST["Parametro"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		require_once('../config/Conexion.php');
		$query1 = "SELECT * FROM tbl_parametros where id_parametro=1";$result1 = mysqli_query($conexion, $query1);
		while($row = mysqli_fetch_array($result1)){
		$valor1= $row['id_parametro'];
		 }

		 $query1 = "SELECT * FROM tbl_parametros where id_parametro	=2";$result1 = mysqli_query($conexion, $query1);
		 while($row = mysqli_fetch_array($result1)){
		 $valor2= $row['id_parametro'];
		 $valor_m= $row['valor'];
		  }
		  $query1 = "SELECT * FROM tbl_parametros where id_parametro=3";$result1 = mysqli_query($conexion, $query1);
		  while($row = mysqli_fetch_array($result1)){
		  $valor3= $row['id_parametro'];
		   }
		   if($_SESSION["se"]==1) {
			   
		  if($id_parametro==$valor1){
			if($valor<=3){
				$rspta=$categoria->editar($id_usuario,$descripcion,$valor,$id_parametro,$usu,$estado);
			echo $rspta ? "Parametro Actualizado" : "Parametro no se pudo Editar";
			}else{ echo 'valor de preguntas no puede ser mayor que 3';}
		  }
		  if($id_parametro==$valor3){
			if($valor<= $valor_m){
				$rspta=$categoria->editar($id_usuario,$descripcion,$valor,$id_parametro,$usu,$estado);
			echo $rspta ? "Parametro Actualizado" : "Parametro no se pudo Editar";
			}else{ echo 'valor minimo de la contraseña es mayor al maximo ';}
		  }
		  



		
		}else{echo "No tiene permiso de actulizar ";}
	break;



	case 'mostrar':
		$rspta=$categoria->mostrar($id_parametro);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(

				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_parametro.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_parametro.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_parametro.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_parametro.'), a();"><i class="fa fa-check"></i></button>',
 				 "1"=>$reg-> Parametro,
 				 "2"=>$reg-> descripcion,
				 "3"=>$reg-> valor,
				 "4"=>($reg-> estado )?'<span class="label bg-green">Activado</span>':
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
		$rspta=$roles->desactivar($id_parametro);
 		echo $rspta ? "Parametro Desactivado" : "Rol no se puede desactivar";
	break;

	case 'activar':
		$rspta=$roles->activar($id_parametro);
 		echo $rspta ? "Parametro activado" : "Rol no se puede activar";
	break;
}
?>