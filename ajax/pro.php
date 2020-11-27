<?php 
require_once "../modelos/PRO.PHP";

$pro=new producto();
;

switch ($_GET["op"]){
	

	case 'listar_p':
       
		$rspta=$pro->listar();
         //Vamos a declarar un array
         
 		$data= Array();
         
 		while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\',\''.$reg->precio_venta.'\' ,\''.$reg->stock.'\'   )"><span class="fa fa-plus"></span></button>',
                    "1"=>$reg->nombre,
                 
                    "2"=>$reg->codigo,
                    "3"=>$reg->precio_venta,
                    
                    "4"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >",
                    "5"=>$reg->descripcion1,
                    "6"=>$reg->stock,
                    
                    
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