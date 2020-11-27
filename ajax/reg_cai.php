<?php

require_once "../modelos/reg_cai_funcion.php";
session_start();
$rcai=new CAI();

$id_reg_facturacion= isset ($_POST["id_reg_facturacion"] )?limpiarCadena($_POST ["id_reg_facturacion"]): "" ;
$cai = isset ($_POST["cai"] )?limpiarCadena($_POST ["cai"]): "" ;
$fecha_inicio = isset ($_POST ["fecha_inicio"] )?limpiarCadena($_POST ["fecha_inicio"]): "" ;
$fecha_limite = isset ($_POST ["fecha_limite"] )?limpiarCadena($_POST ["fecha_limite"]): "" ;
$rango_desde = isset ($_POST ["rango_desde"] )?limpiarCadena($_POST ["rango_desde"]): "" ;
$rango_hasta = isset ($_POST ["rango_hasta"] )?limpiarCadena($_POST ["rango_hasta"]): "" ;
$establecimiento = isset ($_POST ["establecimiento"] )?limpiarCadena($_POST ["establecimiento"]): "" ;
$punto_emision = isset ($_POST ["punto_emision"] )?limpiarCadena($_POST ["punto_emision"]): "" ;
$secuencia = isset ($_POST ["secuencia"] )?limpiarCadena($_POST ["secuencia"]): "" ;
$tipo_documento = isset ($_POST ["tipo_documento"] )?limpiarCadena($_POST ["tipo_documento"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;
//echo "$cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_doc,$secuencia,$estado";

switch ($_GET["op"])
{
    case 'guardaryeditar':
    if (empty($id_reg_facturacion)){  
     $rspta=$rcai->insertar($cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_documento,$secuencia,$estado);
     echo $rspta ? "CAI agregado" : "CAI  No se pudo agregar";
    }
    else if( $_SESSION["vent"]==1 )  {
        $rspta=$rcai->editar($id_reg_facturacion,$cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_documento,$secuencia,$estado);
        echo $rspta ? "CAI Actualizado" : " CAI no se pudo actualizar";
   } else{echo "No tiene permiso de actulizar ";}
    break;

    case 'desactivar':
		$rspta=$rcai->desactivar($id_reg_facturacion);
		echo $rspta ? "CAI Desactivado" : "CAI no se puede desactivar";
	break;

	case 'activar':
		$rspta=$rcai->activar($id_reg_facturacion);
		echo $rspta ? "CAI activado" : "CAI no se puede activar";
	break;
    
    case 'mostrar':
        $rspta=$rcai->mostrar($id_reg_facturacion);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$rcai->listar();
        $data = Array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" id="mostrar"  onclick="mostrar('.$reg->id_reg_facturacion.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_reg_facturacion.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_reg_facturacion.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_reg_facturacion.'), a();"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_reg_facturacion,
                "2"=> $reg-> cai,
                "3"=> $reg-> fecha_inicio,
                "4"=> $reg-> fecha_limite,
                "5"=> $reg-> rango_desde,
                "6"=> $reg-> rango_hasta,
                "7"=> $reg-> establecimiento,
                "8"=> $reg-> punto_emision,
                "9"=> $reg-> secuencia,
                "10"=> $reg-> tipo_documento,
                "11"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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