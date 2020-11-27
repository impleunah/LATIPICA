<?php
session_start();
require_once "../modelos/tbl_inventario_funcion.php";

$inventario=new Inventario();

$id_inventario= isset ($_POST["id_inventario"] )?limpiarCadena($_POST ["id_inventario"]): "" ;
$idarticulo = isset ($_POST["idarticulo"] )?limpiarCadena($_POST ["idarticulo"]): "" ;
$libra = isset ($_POST ["libra"] )?limpiarCadena($_POST ["libra"]): "" ;
$conversion = isset ($_POST ["conversion"] )?limpiarCadena($_POST ["conversion"]): "" ;
$gramos = isset ($_POST ["gramos"] )?limpiarCadena($_POST ["gramos"]): "" ;
$unidades = isset ($_POST ["unidades"] )?limpiarCadena($_POST ["unidades"]): "" ;
$id_Producto = isset ($_POST ["id_Producto"] )?limpiarCadena($_POST ["id_Producto"]): "" ;

//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
      
        if (empty($id_inventario)){
     $rspta=$inventario->insertar($id_Producto ,$libra,$conversion,$gramos,$unidades);
     echo $rspta ? "Inventario Registrado" : "No se pudo registrar";
    }
    else if( $_SESSION["permiso_actualizacionInventario"]==1 ) {
    
        $rspta=$inventario->editar($id_inventario,$idarticulo,$libra,$conversion,$gramos,$unidades);
        echo $rspta ? "Inventario Actualizado" : "No se pudo actualizar";
    } else{echo "No tiene permiso de actulizar ";}

    break;

    case 'desactivar':
		$rspta=$inventario->desactivar($id_inventario);
 		echo $rspta ? "Producto Desactivado" : "Producto no se puede Desactivar";
	break;

	case 'activar':
		$rspta=$inventario->activar($id_inventario);
 		echo $rspta ? "Producto Activado" : "Producto no se puede Activar";
	break;
    
    case 'mostrar':
        $rspta=$inventario->mostrar($id_inventario);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$inventario->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_inventario.') "><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_inventario.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning"   onclick="mostrar('.$reg->id_inventario.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_inventario.');"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_inventario,
                "2"=> $reg-> idarticulo,
                "3"=> $reg-> libr,
                "4"=> $reg-> conversio,
                "5"=> $reg-> gramo,
                "6"=> $reg-> unidades,
                "7"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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