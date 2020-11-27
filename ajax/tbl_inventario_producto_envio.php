<?php
require_once "../modelos/tbl_inventario_produc_funcion";

$invpro=new Inventariop();

$id_inventarioproducto= isset ($_POST["id_inventarioproducto"] )?limpiarCadena($_POST ["id_inventarioproducto"]): "" ;
$id_empresa = isset ($_POST["id_empresa"] )?limpiarCadena($_POST ["id_empresa"]): "" ;
$id_producto= isset ($_POST ["id_producto"] )?limpiarCadena($_POST ["id_producto"]): "" ;
$id_operacion = isset ($_POST ["id_operacion"] )?limpiarCadena($_POST ["id_operacion"]): "" ;
$cantidad = isset ($_POST ["cantidad"] )?limpiarCadena($_POST ["cantidad"]): "" ;


//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
        if (empty($id_inventarioproducto)){
     $rspta=$invpro->insertar($id_empresa,$id_producto,$id_operacion, $cantidad,$costo_unitario_venta,$costo_unitario_compra,$fecha,$mes,$año,$estado);
     echo $rspta ? "Registrado" : "No se pudo registrar";
    }
    else
    {
        $rspta=$invpro->editar($id_inventarioproducto,$id_empresa,$id_producto,$id_operacion,$cantidad,$costo_unitario_venta,$costo_unitario_compra,$fecha,$mes,$año,$estado);
        echo $rspta ? "Actualizado" : "No se pudo actualizar";
    }

    break;
    
    case 'mostrar':
        $rspta=$invpro->mostrar($id_inventarioproducto);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$invpro->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=> '<button class="btn btn-warning" onclick="mostrar('.$reg->id_inventarioproducto.')"><i class="fa fa-pencil"></i></button>',
                "1"=> $reg-> nombre_comercial,
                "2"=> $reg-> producto,
                "3"=> $reg-> tipo_operacion,
                "4"=> $reg-> cantidad,
                "5"=> $reg-> costo_unitario_venta,
                "6"=> $reg-> costo_unitario_compra,
                "7"=> $reg-> fecha,
                "8"=> $reg-> mes,
                "9"=> $reg-> año,
                "10"=> $reg-> estado,
                

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