<?php
session_start();
require_once "../modelos/tbl_empresa_funcion.php";

$empresa=new Empresa();

$id_empresa = isset($_POST["id_empresa"])? limpiarCadena($_POST["id_empresa"]):"";
$id_operacion = isset($_POST["id_operacion"])? limpiarCadena($_POST["id_operacion"]):"";
$RTN = isset($_POST["RTN"])? limpiarCadena($_POST["RTN"]):"";
$razon_social = isset($_POST["razon_social"])? limpiarCadena($_POST["razon_social"]):"";
$nombre_comercial = isset($_POST["nombre_comercial"])? limpiarCadena($_POST["nombre_comercial"]):"";
$domicilio_1 = isset($_POST["domicilio_1"])? limpiarCadena($_POST["domicilio_1"]):"";
$domicilio_2 = isset($_POST["domicilio_2"])? limpiarCadena($_POST["domicilio_2"]):"";
$correo_1 = isset($_POST["correo_1"])? limpiarCadena($_POST["correo_1"]):"";
$correo_2 = isset($_POST["correo_2"])? limpiarCadena($_POST["correo_2"]):"";
$telefono_1 = isset($_POST["telefono_1"])? limpiarCadena($_POST["telefono_1"]):"";
$telefono_2 = isset($_POST["telefono_2"])? limpiarCadena($_POST["telefono_2"]):"";
$estado= isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";


//utilizamos el metodo GET

switch ($_GET["op"])
{
    case 'guardaryeditar':
        $sql=ejecutarConsulta_row("SELECT * FROM tbl_empresa WHERE nombre_comercial='$nombre_comercial'");
       

        if (empty($id_empresa)){
            
            if($sql==0){
     $rspta=$empresa->insertar($id_operacion,$RTN,$razon_social,$nombre_comercial,$domicilio_1,$domicilio_2,$correo_1,$correo_2,$telefono_1,$telefono_2);
     echo $rspta ? "Empresa Registrado" : "No se pudo registrar";
    }else{echo "La Empresa que desea ingresar ya existe";}
    
    }
    else if( $_SESSION["man"]==1 ) {
        $rspta=$empresa->editar($id_empresa,$id_operacion,$RTN,$razon_social,$nombre_comercial,$domicilio_1,$domicilio_2,$correo_1,$correo_2,$telefono_1, $telefono_2);
        echo $rspta ? "Empresa Actualizado" : "No se pudo actualizar";
    }else{echo "No tiene permiso de actulizar ";}

    break;
    
    case 'mostrar':
        $rspta=$empresa->mostrar($id_empresa);
         echo json_encode($rspta);
    break;
    case 'mostrar_p':
        $rspta=$empresa->mostrar_p($id_empresa);
         echo json_encode($rspta);
    break;
    case 'desactivar':
		$rspta=$empresa->desactivar($id_empresa);
		echo $rspta ? "Empresa Desactivada" : "Empresa no se puede desactivar";
	break;

	case 'activar':
		$rspta=$empresa->activar($id_empresa);
		echo $rspta ? "Empresa activada" : "Empresa no se puede activar";
	break;
    
    case 'listar':
        $rspta=$empresa->listar();
        $data = array();

        while ($reg= $rspta-> fetch_object()){
            $data [] = Array (
                "0"=>(($reg->estado)?
                '<a data-toggle="modal" href="#myModa1"
                <button id="btnAgregarcli" type="button" class="btn btn-success"  onclick="mostrar_p('.$reg->id_empresa.')"> 
                <span class="fa fa-eye""></span></button> </a> '.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_empresa.')"><i class="fa fa-close"></i></button>'.
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_empresa.')"><i class="fa fa-pencil"></i></button>' :
                '<a data-toggle="modal" href="#myModa1"
                <button id="btnAgregarcli" type="button" class="btn btn-success"  onclick="mostrar_p('.$reg->id_empresa.')"> 
                <span class="fa fa-eye""></span></button> </a> '.
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_empresa.')"><i class="fa fa-pencil"></i></button>' .
                ' <button class="btn btn-primary"   onclick="activar('.$reg->id_empresa.'), a();"><i class="fa fa-check"></i></button>' ),
                "1"=> $reg-> id_empresa,
                "2"=> $reg-> nombre_comercial,
                "3"=> $reg-> descripcion,
                "4"=> $reg-> RTN,
                "5"=> $reg-> razon_social,
                "6"=> $reg-> domicilio_1,
				"7"=> $reg-> correo_1,
                "8"=> $reg-> telefono_1,
                "9"=>$reg-> estado?'<span class="label bg-green">Activado</span>':
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