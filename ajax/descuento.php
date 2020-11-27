<?php
 session_start();
require_once "../modelos/descuento_funcion.php";
require "../config/Conexion.php";

$descuento= new descuento();

$id_descuento = isset ($_POST ["id_descuento"] )?limpiarCadena($_POST ["id_descuento"]): "" ;
$descripcion = isset ($_POST ["descripcion"] )?limpiarCadena($_POST ["descripcion"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;

//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
      
        $porcentage=$descripcion/100;
		if (empty($id_descuento))
    {
		
			
			$sql=ejecutarConsulta_row("SELECT * FROM tbl_descuento WHERE descripcion='$porcentage'");
			
			if($sql==0){
      
     $respuesta=$descuento->insertar($porcentage);
     echo $respuesta ? "Descuento Registrado" : "Descuento no se pudo registrar";
    }else{echo "Descuento existente ";} }
   
    
    else if(  $_SESSION["man"]==1 ) {
    {$sql=ejecutarConsulta_row("SELECT * FROM tbl_descuento WHERE descripcion='$porcentage'");
			
        if($sql==0){
            $porcentage=$descripcion/100;
        $respuesta=$descuento->editar($id_descuento,$porcentage);
        echo $respuesta  ? " Se ha actualizado" : "No se pudo actualizar";
    }	}
}else{echo "No posee permiso de actualización ";}
    break;
    case 'desactivar':
		$respuesta=$descuento->desactivar($id_descuento);
		echo $respuesta ? "Operacion desactivada" : "Operacion no se puede desactivar";
	break;

	case 'activar':
		$respuesta=$descuento->activar($id_descuento);
		echo $respuesta ? "Operacion activada" : "Operacion no se puede activar";
	break;

    case 'mostrar':
        $respuesta=$descuento->mostrar($id_descuento);
         echo json_encode($respuesta);
    break;
    
    case 'listar':
        $respuesta=$descuento->listar();
        $data = array();

        while ($reg= $respuesta-> fetch_object()){
            $data [] = Array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_descuento.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_descuento.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_descuento.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_descuento.'), a();"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_descuento,
                "2"=> $reg-> descripcion*100,
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