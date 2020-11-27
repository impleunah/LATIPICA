<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
} 
if (!isset($_SESSION["id"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{

//Validamos el acceso solo al usuario logueado y autorizado.

require_once "../modelos/Venta.php";



$venta=new Venta();

$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
$id_cliente=isset($_POST["id_cliente"])? limpiarCadena($_POST["id_cliente"]):"";
$id_usuario=$_SESSION["id"];
$num_factura=isset($_POST["num_factura"])? limpiarCadena($_POST["num_factura"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$id_tipo_pago=isset($_POST["id_tipo_pag"])? limpiarCadena($_POST["id_tipo_pag"]):"";
$total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";
$id_reg_facturacion=isset($_POST["id_reg_facturacion"])? limpiarCadena($_POST["id_reg_facturacion"]):"";
$iva=isset($_POST["iva"])? limpiarCadena($_POST["iva"]):"";
$descuento=isset($_POST["descuento1"])? limpiarCadena($_POST["descuento1"]):"";
$total1=isset($_POST["total1"])? limpiarCadena($_POST["total1"]):"";
$vneta1=isset($_POST["vneta1"])? limpiarCadena($_POST["vneta1"]):"";


$descuento2=isset($_POST["descuento2"])? limpiarCadena($_POST["descuento2"]):"";
$iva1=isset($_POST["iva1"])? limpiarCadena($_POST["iva1"]):"";


 // $_POST["idarticulo"],$_POST["cantidad"],$_POST["precio_venta"],$iva;


switch ($_GET["op"]){
	case 'guardaryeditar':
	

	
		
	if (empty($idventa)){
		$rspta=$venta->insertar($id_cliente,$id_usuario,$id_tipo_pago,$id_reg_facturacion,$num_factura,$fecha,$total_venta,$_POST["idarticulo"],$_POST["cantidad"],$_POST["precio_venta"],$iva1,$descuento2,$total1,$vneta1);
		echo $rspta ?  "Venta registrada" : "No se pudieron registrar todos los datos de la venta ";
		
	}
	else {
		echo "No se pudieron registrar todos los datos de la venta";
	
	
	}
	break;


	case 'anular':
		$rspta=$venta->anular($idventa);
 		echo $rspta ? "Venta anulada" : "Venta no se puede anular";
	break;

	case 'mostrar':
		$rspta=$venta->mostrar($idventa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case 'mostrar1':
		$rspta=$venta->mostrar1($idventa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarDetalle':
		//Recibimos el idingreso
		$id=$_GET['id'];

		$rspta = $venta->listarDetalle($id);
		$total=0;
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Opciones</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th></th>
                                    <th>Subtotal</th>
                                </thead>';

		while ($reg = $rspta->fetch_object())
				{
					echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->subtotal.'</td></tr>';
					$total=$total+($reg->precio_venta*$reg->cantidad);
				}
		echo '<tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                                </tfoot>';
	break;


	case 'lista':
		$rspta=$v->lista();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
			$data[]=array(
 				"0"=>(($reg->estado=='1')?'<button class="btn btn-warning" id="mostrar" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>':
					 '<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'),
                     //'<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>',
 				"1"=>$reg->fecha,
 				"2"=>$reg->nombre,
 				"3"=>$reg->Nombre_Usuario,
 				"4"=>$reg->numero,
 				"5"=>$reg->total_venta,
 				"6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>',
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	

	case 'listarArticulosVenta':
		
	require_once "../modelos/PRO.PHP";
	
	$pro=new producto();
  
	$rspta=$pro->listar();
	//Vamos a declarar un array
	
	$data= Array();

	while ($reg=$rspta->fetch_object()){
 		$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\',\''.$reg->precio_venta.'\')"><span class="fa fa-plus"></span></button>',
 				"1"=>$reg->nombre,
 	 			"2"=>$reg->codigo,
 	 			"3"=>$reg->stock,
				 "4"=>$reg->precio_venta,
				 "5"=>$reg->stock,
 				"5"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >"
 				);
 		}
 	$results = array(
 		"sEcho"=>1, //Información para el datatables
 		"iTotalRecords"=>count($data), //enviamos el total registros al datatable
		"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	   "aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'listarclientes':

		require_once "../modelos/tbl_clientes.php";
		$categoria=new Categoria();

		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				 "0"=>'<button class="btn btn-warning" onclick="mostrar_c"('.$reg->id_cliente.',\''.$reg->nombre.'\',\''.$reg->RTN.'\',\''.$reg->correo.'\')"><span class="fa fa-plus"></span>
				 </button>',
				 "1"=>$reg->id_cliente,
				 "2"=>$reg->nombre,
				 "3"=>$reg->RTN,
				 "4"=>$reg->correo,

 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;
	
	case 'mostrar_c':
		$rspta=$Usuario->mostrar_c($id_cliente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	
}
//Fin de las validaciones de acceso

}

ob_end_flush();
?>
