<?php
session_start();
require_once "../modelos/tbl_preguntas_usuario_funcion.php";

$preguntas=new Pregunta();

$id_pregunta_usuario= isset ($_POST["id_pregunta_usuario"] )?limpiarCadena($_POST ["id_pregunta_usuario"]): "" ;
$id_usuario = isset ($_POST["id_usuario"] )?limpiarCadena($_POST ["id_usuario"]): "" ;
$id_pregunta = isset ($_POST ["id_pregunta"] )?limpiarCadena($_POST ["id_pregunta"]): "" ;
$respuesta = isset ($_POST ["respuesta"] )?limpiarCadena($_POST ["respuesta"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;


//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
        if (empty($id_pregunta_usuario)){
     $rspta=$preguntas->insertar($id_usuario,$id_pregunta,$respuesta);
     echo $rspta ? "Pregunta Registrada" : "Pregunta no se pudo registrar";
    }
    else if($_SESSION["se"]==1) {
    {
        $rspta=$preguntas->editar($id_pregunta_usuario,$id_usuario,$id_pregunta,$respuesta);
        echo $rspta ? "Pregunta Actualizada" : "Pregunta no se pudo actualizar";
    }}else{echo "No tiene permiso de actulizar ";}

    break;

    case 'desactivar':
		$rspta=$preguntas->desactivar($id_pregunta_usuario);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$preguntas->activar($id_pregunta_usuario);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
    break;
    
    
    case 'mostrar':
        $rspta=$preguntas->mostrar($id_pregunta_usuario);
         echo json_encode($rspta);
    break;
    
    case 'listar':
        $rspta=$preguntas->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=>($reg->estado )?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_pregunta_usuario.'), a();"><i class="fa fa-pencil"></i></button>'.
             ' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_pregunta_usuario.')"><i class="fa fa-close"></i></button>':
             '<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_pregunta_usuario.')"><i class="fa fa-pencil"></i></button>'.
             ' <button class="btn btn-primary"   onclick="activar('.$reg->id_pregunta_usuario.'), a();"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_pregunta_usuario,
                "2"=> $reg-> Nombre_Usuario,
                "3"=> $reg-> pregunta,
                "4"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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