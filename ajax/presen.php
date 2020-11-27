<?php 

require_once "../modelos/presentacion.php";

$presentacion=new presentacion();


switch ($_GET["op"]){
	
	case 'listar':
        $respuesta=$presentacion->listar();
        $data = array();

        while ($reg= $respuesta-> fetch_object()){
            $data [] = Array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" id="mostrar"  onclick="mostrar('.$reg->id_presentacion.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_presentacion.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostrar"   onclick="mostrar('.$reg->id_presentacion.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_presentacion.'), a();"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_presentacion,
                "2"=> $reg-> descripcion,
                "3"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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