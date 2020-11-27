<?php
session_start();
require_once "../modelos/tbl_preguntas_funcion.php";

$preguntas= new pregunta();
$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_pregunta = isset ($_POST ["id_pregunta"] )?limpiarCadena($_POST ["id_pregunta"]): "" ;
$pregunta = isset ($_POST ["pregunta"] )?limpiarCadena($_POST ["pregunta"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;

//utilizamos el metodo GET

switch ($_GET["op"])
{
    
    case 'guardaryeditar':
      if (empty($id_pregunta))
    {
        
            $sql=ejecutarConsulta_row("SELECT * FROM tbl_preguntas WHERE pregunta='$pregunta' ");
            if ($sql==0){
    
                 $respuesta=$preguntas->insertar(strtoupper($pregunta),$usu);
         echo $respuesta ? "Pregunta Registrada" : "Pregunta no se pudo registrar";
    
            }else {echo "La pregunta ingresada ya existe" ;} }
    else if($_SESSION["se"]==1) {
    { 
        $sql=ejecutarConsulta_row("SELECT * FROM tbl_preguntas WHERE pregunta='$pregunta'");
        if ($sql==0){
        $respuesta=$preguntas->editar($id_pregunta, strtoupper($pregunta),$usu);
        echo $respuesta ? "Pregunta Actualizada" : "Pregunta no se pudo actualizar";
    }else {echo "La pregunta actualizada ya existe" ;} }   
    }else{echo "No tiene permiso de actulizar ";}

    break;

    
    case 'mostrar':
        $respuesta=$preguntas->mostrar($id_pregunta);
         echo json_encode($respuesta);
    break;
    
    case 'listar':
        $respuesta=$preguntas->listar();
        $data = array();

        while ($reg= $respuesta-> fetch_object()){
            $data [] = Array (
                "0"=>($reg->estado)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_pregunta.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_pregunta.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_pregunta.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_pregunta.'), a();"><i class="fa fa-check"></i></button>',
                "1"=> $reg-> id_pregunta,
                "2"=> $reg-> pregunta,
                "3"=> $reg-> fecha_creacion,
                "4"=> $reg-> modificado_por,
                "5"=> $reg-> fecha_modificacion,
                "6"=>($reg-> estado)?'<span class="label bg-green">Activado</span>':
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
    
    case 'desactivar':
		$respuesta=$preguntas->desactivar($id_pregunta);
 		echo $respuesta ? "Pregunta Desactivada" : "Pregunta no se puede desactivar";
	break;

	case 'activar':
		$respuesta=$preguntas->activar($id_pregunta);
 		echo $respuesta ? "Pregunta activada" : "Pregunta no se puede activar";
	break;
}



?>