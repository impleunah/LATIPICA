<?php 

require_once "../modelos/Articulo1.php";


$articulo=new Articulo();

switch ($_GET["op"]){
	

case 'listar':
    $rspta=$articulo->listar();
    $data = Array();

    while ($reg=$rspta->fetch_object()){

        $data[]=array(
            "0"=>($reg->condicion)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->idarticulo.'), a();"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger"   onclick="desactivar('.$reg->idarticulo.')"><i class="fa fa-close"></i></button>':
             '<button class="btn btn-warning" id="mostra" onclick="mostrar('.$reg->idarticulo.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-primary"   onclick="activar('.$reg->idarticulo.'), a();"><i class="fa fa-check"></i></button>',
              "1"=>$reg-> idarticulo,
              "2"=>$reg-> nombre,
              "3"=>$reg-> descripcion1,
              "4"=>$reg-> descripcion,
              "5"=>$reg-> codigo,
              "6"=>$reg-> precio_venta,
              "7"=>$reg-> stock,
              "8"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px' >",
              "9"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                                     '<span class="label bg-red">Desactivado</span>',
            );
    }
    $results = array(
        "sEcho"=>1, //Información para el datatables.
        "iTotalRecords"=>count($data), //enviamos el total registros al datatable
        "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
        "aaData"=>$data);
    echo json_encode($results);

break;

}