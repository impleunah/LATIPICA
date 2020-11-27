<?php

require_once "../modelos/tbl_clientes.php";
session_start();
$cliente =new cliente();

$id_cliente= isset ($_POST["id_cliente"] )?limpiarCadena($_POST ["id_cliente"]): "" ;
$nombre = isset ($_POST["nombre"] )?limpiarCadena($_POST ["nombre"]): "" ;
$correo = isset ($_POST ["correo"] )?limpiarCadena($_POST ["correo"]): "" ;
$RTN = isset ($_POST ["RTN"] )?limpiarCadena($_POST ["RTN"]): "" ;
//$telefono = isset ($_POST ["telefono"] )?limpiarCadena($_POST ["telefono"]): "" ;
//$direccion = isset ($_POST ["direccion"] )?limpiarCadena($_POST ["direccion"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;


switch ($_GET["op"])
{
    case 'guardaryeditar':
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_cliente   WHERE nombre='$nombre'");

		if (empty($id_cliente)){
			if($sql==0){
                $rspta=$cliente->insertar($nombre,$correo,$RTN,$estado);
                echo $rspta ? "Cliente agregado" : "Cliente  No se pudo agregar";
		}else{echo "La presentacion que desea ingresar ya existe";}
		}
		else if( $_SESSION["vent"]==1 ) {
			$rspta=$cliente->editar($id_cliente,$nombre,$correo,$RTN,$estado);
        echo $rspta ? "Cliente Actualizado" : " Cliente  no se pudo actualizar";
		}else{echo "No tiene permiso de actulizar ";}
	break;

    case 'desactivar':
        $rspta=$cliente->desactivar($id_cliente);
		echo $rspta ? "Cliente Desactivado" : "Cliente no se puede desactivar";
	break;

	case 'activar':
        $rspta=$cliente->activar($id_cliente);
		echo $rspta ? "Cliente  activado" : "Cliente no se puede activar";
    break;

    case 'eliminar':
        $rspta=$cliente->eliminar($id_cliente);
		echo $rspta ? "Cliente  eliminado " : "Cliente no se puede eliminar ";
	break;
    
    case 'mostrar':
        $rspta=$cliente->mostrar($id_cliente);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$cliente->listar();
        $data = Array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="eliminar('.$reg->id_cliente.') "><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_cliente.')"><i class="fa fa-close"></i></button>'.
                '<button class="btn btn-warning"   onclick="mostrar('.$reg->id_cliente.')"><i class="fa fa-pencil"></i></button>':
                ' <button class="btn btn-danger"   onclick="eliminar('.$reg->id_cliente.');"><i class="fa fa-trash"></i></button>'.
                ' <button class="btn btn-primary"   onclick="activar('.$reg->id_cliente.');"><i class="fa fa-check"></i></button>'.
                '<button class="btn btn-warning"   onclick="mostrar('.$reg->id_cliente.')"><i class="fa fa-pencil"></i></button>',
                "1"=> $reg-> id_cliente,
                "2"=> $reg-> nombre,
                "3"=> $reg-> correo,
                "4"=> $reg-> RTN,
                "5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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