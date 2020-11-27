<?php
require_once "../modelos/Entrada.php";

$ent=new Entrada();

$id_entrada= isset ($_POST["id_entrada"] )?limpiarCadena($_POST ["id_entrada"]): "" ;
$idarticulo = isset ($_POST["idarticulo"] )?limpiarCadena($_POST ["idarticulo"]): "" ;
$entrada = isset ($_POST ["entrada"] )?limpiarCadena($_POST ["entrada"]): "" ;
$motivo = isset ($_POST ["motivo"] )?limpiarCadena($_POST ["motivo"]): "" ;


//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
        if (empty($id_entrada)){
     $rspta=$ent->insertar($idarticulo,$entrada,$motivo);
     echo $rspta ? "Entrada Registrado" : "No se pudo registrar";
    }
    else
    {
        $rspta=$ent->editar($id_entrada,$idarticulo,$entrada,$motivo);
        echo $rspta ? "Entrada Actualizado" : "No se pudo actualizar";
    }

    break;
    
    case 'mostrar':
        $rspta=$ent->mostrar($id_entrada);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$ent->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->id_entrada.')"><i class="fa fa-pencil"></i></button>',
                "1"=> $reg-> id_entrada,
                "2"=> $reg-> nombre,
                "3"=> $reg-> entrada,
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