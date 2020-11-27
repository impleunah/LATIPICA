<?php
session_start();
require_once "../modelos/tbl_ingreso_funcion.php";

$compras = new compras();

$id_compras    =  isset($_POST["id_compras"])?    limpiarCadena($_POST["id_compras"]):"";
$id_proveedor  =  isset($_POST["id_proveedor"])? limpiarCadena($_POST["id_proveedor"]):"";
$nombre    =  isset($_POST["pro"])?   limpiarCadena($_POST["pro"]):"";
$Nombre  =  isset($_POST["id_proveedo"])? limpiarCadena($_POST["id_proveedo"]):"";
$idarticulo    =  isset($_POST["idarticulo"])?   limpiarCadena($_POST["idarticulo"]):"";
$cantidad      =  isset($_POST["Cantidad"])?     limpiarCadena($_POST["Cantidad"]):"";
$id_presentacion =isset($_POST["id_presentacion"])? limpiarCadena($_POST["id_presentacion"]):"";
$presentacion   = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$precio =         isset($_POST["Precio"])? limpiarCadena($_POST["Precio"]):"";
$total =         isset($_POST["total"])? limpiarCadena($_POST["total"]):"";



//Recibir datos atraves de metodo POST que se envian mediante formulario angelica 16 abril 2020

switch ($_GET["op"]){
	case 'guardaryeditar':
		$total=$cantidad*$precio;
		if (empty($id_compras)){
			$rspta=$compras->_insertar($id_proveedor,$idarticulo,$id_presentacion,$cantidad,$precio,$total);
			echo $rspta ? "Compra Registrada" : "Compra no se pudo registrar";
		}
		else if( $_SESSION["tbl_ingreso"]==1  ) {
			$total=$cantidad*$precio;

			
			$rspta=$compras->_editar($id_compras,$id_proveedor,$idarticulo,$id_presentacion,$cantidad,$precio,$total);
			echo $rspta ? "La Compra se ha actualizado" : " La Compra no se pudo actualizar";

		}else{echo "No tiene permiso de actulizar ";}
	break;

	case 'desactivar':
		$rspta=$compras->desactivar($id_compras);
 		echo $rspta ? "Compra Desactivada" : "Compra no se puede desactivar";
	break;

	case 'activar':
		$rspta=$compras->activar($id_compras);
 		echo $rspta ? "Compra activada" : "Compra no se puede activar";
	break;

    case 'mostrar':
		$rspta=$compras->mostrar($id_compras);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':  
		$rspta=$compras->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_compras.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_compras.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_compras.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_compras.'), a();"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_compras,
				 "2"=>$reg-> Nombre,
				 "3"=>$reg-> nombre,
                 "4"=>$reg-> Cantidad,
                 "5"=>$reg-> descripcion,
                 "6"=>$reg-> Precio,
				 "7"=>$reg-> Total_Compra,
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

	break;
	
	case 'proveedores':
		require_once "../modelos/tbl_proveedor.php";

		$tbl_proveedor1    =  new tbl_proveedor();
		$rspta=$tbl_proveedor1->listar_a();
		
		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar_pr('.$reg->id_proveedor.',\''.$reg->Nombre.'\')"><span class="fa fa-plus"></span></button>',
				"1"=>$reg->id_proveedor,
				"2"=>$reg->Nombre,
				

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