<?php

require_once "../modelos/tbl_provedores_funcion.php";
session_start();
$proveedor=new proveedor();

$id_proveedor= isset ($_POST["id_proveedor"] )?limpiarCadena($_POST ["id_proveedor"]): "" ;
$nombre = isset ($_POST["nombre"] )?limpiarCadena($_POST ["nombre"]): "" ;
$correo = isset ($_POST ["correo"] )?limpiarCadena($_POST ["correo"]): "" ;
$RTN = isset ($_POST ["RTN"] )?limpiarCadena($_POST ["RTN"]): "" ;
$telefono = isset ($_POST ["telefono"] )?limpiarCadena($_POST ["telefono"]): "" ;
$direccion = isset ($_POST ["direccion"] )?limpiarCadena($_POST ["direccion"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;
//echo "$cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_doc,$secuencia,$estado";

switch ($_GET["op"])
{
    case 'guardaryeditar':
		$sql=ejecutarConsulta_row("SELECT * FROM tbl_proveedor  WHERE nombre='$nombre'");

		if (empty($id_proveedor)){
			if($sql==0){
                $rspta=$proveedor->insertar($nombre,$correo,$RTN, $telefono, $direccion ,$estado);
                echo $rspta ? "Proveedor agregado" : "Proveedor No se pudo agregar";
		}else{echo "La presentacion que desea ingresar ya existe";}
		}
		else if( $_SESSION["tbl_ingreso"]==1 ) {
			$rspta=$proveedor->editar($id_proveedor,$nombre,$correo,$RTN, $telefono, $direccion ,$estado);
        echo $rspta ? "Proveedor Actualizado" : " Proveedor no se pudo actualizar";
		}else{echo "No tiene permiso de actulizar ";}
	break;

    case 'desactivar':
        $rspta=$proveedor->desactivar($id_proveedor);
		echo $rspta ? "Proveedor Desactivado" : "Proveedor no se puede desactivar";
	break;

	case 'activar':
        $rspta=$proveedor->activar($id_proveedor);
		echo $rspta ? "Proveedor activado" : "Proveedor no se puede activar";
	break;
    
    case 'mostrar':
        $rspta=$proveedor->mostrar($id_proveedor);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$proveedor->listar();
        $data = Array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_proveedor.') "><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_proveedor.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning"   onclick="mostrar('.$reg->id_proveedor.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_proveedor.');"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_proveedor,
                "2"=> $reg-> Nombre,
                "3"=> $reg-> correo,
                "4"=> $reg-> RTN,
                "5"=> $reg-> telefono,
                "6"=> $reg-> direccion,
                "7"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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