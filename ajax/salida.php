<?php
require_once "../modelos/salida.php";

$sal=new Salida();

$id_salida= isset ($_POST["id_salida"] )?limpiarCadena($_POST ["id_salida"]): "" ;
$idarticulo = isset ($_POST["idarticulo"] )?limpiarCadena($_POST ["idarticulo"]): "" ;
$salida = isset ($_POST ["salida"] )?limpiarCadena($_POST ["salida"]): "" ;
$motivo = isset ($_POST ["motivo"] )?limpiarCadena($_POST ["motivo"]): "" ;


//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
        if (empty($id_salida)){
     $rspta=$sal->insertar($idarticulo,$salida,$motivo);
     echo $rspta ? "Salida Registrado" : "No se pudo registrar";
    }
    else
    {
        $rspta=$sal->editar($id_salida,$idarticulo,$salida,$motivo);
        echo $rspta ? "Salida Actualizada" : "No se pudo actualizar";
    }

    break;
    
    case 'mostrar':
        $rspta=$sal->mostrar($id_salida);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$sal->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->id_salida.')"><i class="fa fa-pencil"></i></button>',
                "1"=> $reg-> id_salida,
                "2"=> $reg-> nombre,
                "3"=> $reg-> salida,
                "4"=> $reg-> motivo,
                "5"=> $reg-> fecha,

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