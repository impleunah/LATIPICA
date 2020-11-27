<?php
require_once "../modelos/reg_cai_funcion.php";

$rcai=new CAI();

$id_reg_facturacion= isset ($_POST["id_reg_facturacion"] )?limpiarCadena($_POST ["id_reg_facturacion"]): "" ;
$estado = isset ($_POST ["estado"] )?limpiarCadena($_POST ["estado"]): "" ;
//echo "$cai,$fecha_inicio,$fecha_limite,$rango_desde,$rango_hasta,$punto_emision,$establecimiento,$tipo_doc,$secuencia,$estado";

switch ($_GET["op"])
{


    case 'desactivar':
		$rspta=$rcai->desactivar($id_reg_facturacion);
		echo $rspta ? "CAI desactivado" : "CAI no se puede desactivar";
	break;

	case 'activar':
		$rspta=$rcai->activar($id_reg_facturacion);
		echo $rspta ? "CAI activado" : "CAI no se puede activar";
    break;
}