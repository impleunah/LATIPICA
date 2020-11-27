<?php 
require_once "../modelos/PROV.php";

$pro=new producto();
;

switch ($_GET["op"]){
	

	case 'listar_pro':
       
		$rspta=$pro->listar();
         //Vamos a declarar un array
         
 		$data= Array();
         
 		while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "0"=>'<button class="btn btn-warning" onclick="agregarprod('.$reg->idarticulo.',\''.$reg->nombre.'\')"><span class="fa fa-plus"></span></button>',
                    "1"=>$reg->idarticulo,
                    "2"=>$reg->nombre,
                    "3"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >"
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