<?php
session_start();
require_once "../modelos/tbl_permisos_funcion.php";
require '../config/Conexion.php';
$permiso=new Permiso();

$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_permiso = isset($_POST["id_permiso"])? limpiarCadena($_POST["id_permiso"]):"";
$id_rol = isset($_POST["rol_1"])? limpiarCadena($_POST["rol_1"]):"";
$id_objeto = isset($_POST["pantalla"])? limpiarCadena($_POST["pantalla"]):"";
$permiso_insercion = isset($_POST["permiso_insercion"])? limpiarCadena($_POST["permiso_insercion"]):"";
$permiso_consulta = isset($_POST["permiso_consulta"])? limpiarCadena($_POST["permiso_consulta"]):"";
$permiso_actualizacion = isset($_POST["permiso_actualizacion"])? limpiarCadena($_POST["permiso_actualizacion"]):"";
$estado = isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$Mostar_Menu = isset($_POST["Mostar_Menu"])? limpiarCadena($_POST["Mostar_Menu"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario - 23/02/2020//

switch ($_GET["op"]){
	case 'guardaryeditar':
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_roles_objeto WHERE id_rol='$id_rol' and id_objeto='$id_objeto '  ");
		
		
				if (empty($id_permiso)){
					if($sql==0){
					$rspta=$permiso->_insertar($id_rol,$id_objeto,$permiso_insercion ,$permiso_consulta,$permiso_actualizacion ,strtoupper($usu),$estado,$Mostar_Menu);
					echo $rspta ? "Permiso Registrado" : "Permiso no se pudo registrar";
				}else{echo "El ROl y la Pantalla ya existen   ";} }
				else if($_SESSION["se"]==1) {
				 if($_SESSION["se"]==1) {

					if($sql<2){
					$rspta=$permiso->_editar($id_permiso,$id_rol,$id_objeto,$permiso_insercion ,$permiso_consulta,$permiso_actualizacion,strtoupper($usu),$Mostar_Menu);
					echo $rspta ? "El permiso se ha actualizado" : "El permiso no se pudo actualizar";
				}else{echo "El ROl y la Pantalla ya existen";}}}else{echo "No tiene permiso de actulizar ";}
			break;
			

	break;
	case 'desactivar':
		$rspta=$permiso->desactivar($id_permiso);
 		echo $rspta ? "Permiso Desactivado" : " Permiso se puede desactivar";
	break;

	case 'activar':
		$rspta=$permiso->activar($id_permiso);
 		echo $rspta ? "Permiso activado" : "Permiso no se puede activar";
	break;

    case 'mostrar':
		$rspta=$permiso->mostrar($id_permiso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$permiso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_permiso.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_permiso.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_permiso.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_permiso.'), a();"><i class="fa fa-check"></i></button>',
                 "1"=>$reg-> id_permiso,
                 "2"=>$reg-> rol,
                 "3"=>$reg-> objeto,
                 "4"=>$reg-> permiso_insercion?'<span class="label bg-green">SI</span>':
				 '<span class="label bg-red">NO</span>',
                 "5"=>$reg-> permiso_consulta?'<span class="label bg-green">SI</span>':
				 '<span class="label bg-red">NO</span>',
                 "6"=>$reg-> permiso_actualizacion?'<span class="label bg-green">SI</span>':
				 '<span class="label bg-red">NO</span>',
				 "7"=>$reg-> Mostar_Menu?'<span class="label bg-green">SI</span>':
				 '<span class="label bg-red">NO</span>',
				 "8"=>$reg-> fecha_creacion,
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
