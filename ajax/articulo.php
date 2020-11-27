<?php 
session_start();
require_once "../modelos/Articulo.php";
require_once('../config/Conexion.php');


$articulo=new Articulo();

$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion1"])? limpiarCadena($_POST["descripcion1"]):"";
$id_presentacion=isset($_POST["id_presentacion"])? limpiarCadena($_POST["id_presentacion"]):"";
$presentacion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$condicion=isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$precio_venta=isset($_POST["precio_venta"])? limpiarCadena($_POST["precio_venta"]):"";
$fecha_fabricacion=isset($_POST["fecha_fabricacion"])? limpiarCadena($_POST["fecha_fabricacion"]):"";
$fecha_expiracion=isset($_POST["fecha_expiracion"])? limpiarCadena($_POST["fecha_expiracion"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':


		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
			}
		}
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_articulo		WHERE nombre='$nombre'");
		
		   
		if (empty($idarticulo) )
		{

			if($sql==0){




			$rspta=$articulo->insertar($nombre,$descripcion,$codigo,$precio_venta,$fecha_fabricacion,$fecha_expiracion,$id_presentacion,$stock,$imagen,$condicion);
			echo $rspta ? "Artículo no se pudo registrar" :"Articulo Registrado" ;
			}else{echo "EL articulo que desea ingresar ya existe";}
		}
		else if ($_SESSION["articulo"]== 1) {
			$rspta=$articulo->editar($idarticulo,$nombre,$descripcion,$codigo,$precio_venta,$id_presentacion,$fecha_fabricacion,$fecha_expiracion,$imagen);
			echo $rspta ? "Articulo  actualizado exitosamente ":"Artículo no se pudo actualizar" ;

		}else{echo "No tiene permiso de actulizar ";}
	
	break;
	

	case 'desactivar':
		$rspta=$articulo->desactivar($idarticulo);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$articulo->activar($idarticulo);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$articulo->mostrar($idarticulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
//Fin de las validaciones de acceso ..

ob_end_flush();
?>

