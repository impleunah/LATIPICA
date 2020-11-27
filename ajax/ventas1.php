<?php 

//Validamos el acceso solo al usuario logueado y autorizado.

require_once "../modelos/lista.php";

$venta=new lista();
$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";

switch ($_GET["op"]){
case 'lista':

    $rspta=$venta->lista();
     //Vamos a declarar un array
     $data= array();

     while ($reg=$rspta->fetch_object()){

        $url='../AVR/factura/generaFactura.php?id=';

        $data[]=Array(
            "0"=>(($reg->estado)?
            '<a data-toggle="modal" href="#myModal2">           
            <button id="btnAgregarcli" type="button" class="btn btn-success"  onclick="mostrar_p('.$_SESSION["id_Fac"]=$reg->idventa.')"> <span class="fa fa-eye""></span></button>
            </a> '.'<a target="_blank" href="'.$url.$reg->idventa.'"> <button onclick="Factura('.$reg->idventa.')" class="btn btn-info"><i class="fa fa-file"></i></button></a>'.
 					' <button class="btn btn-danger" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>':
 					
                     '<a data-toggle="modal" href="#myModal2">           
                     <button id="btnAgregarcli" type="button" class="btn btn-success"  onclick="mostrar_p('.$reg->idventa.')"> <span class="fa fa-eye""></span></button>
                     </a>'.

                     
                     '<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info"  onclick="Factura('.$_SESSION["id_Fac"]=$reg->idventa.')"><i class="fa fa-file"></i></button></a>'
                    ),
               "1" =>     $reg->idventa,
             "2"=>$reg->num_factura,
             "3"=>$reg->cai ,
             "4"=>$reg->Nombre_Usuario,
             "5"=>$reg->nombre ,
             "6"=>$reg->total_venta,
             "7"=>$reg->fecha ,
             "8"=>$reg->estado?'<span class="label bg-green">Aceptado</span>':
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


case 'mostrar_p':
    $rspta=$venta->mostrar_p($idventa);
     //Codificar el resultado utilizando json
     echo json_encode($rspta);
break;



case 'listarDetalle':
    //Recibimos el idingreso
    $id=$_GET['id'];

    $rspta = $venta->listarDetalle($id);
    $total=0;
    echo '<thead style="background-color:#A9D0F5">
                                
                                <th>Artículo</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th></th>
                                <th>IMPORTE</th>
                            </thead>';

    while ($reg = $rspta->fetch_object())
            {

                echo '<tr class="filas"><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_v.'</td><td>'.'</td><td>'.$reg->precio_v*$reg->cantidad.'</td>';
                $d=$reg->descu;
                $s=$reg->ventas_netas;
                $i=$reg->IVA;
                $t=$reg->total;
                
                $total=$total+($reg->precio_v*$reg->cantidad);
            }

          
    echo '<tfoot>
                                    <tr>
                                    <th></th>
                                        <th></th>
                                        <th></th>
                                        <TH> Subtotal</TH>
                                        <th><h4 id="total_f">L '.$total.'</h4><input type="hidden" name="total1_f" id="total1_f"></th> 
                                        </tr>
                                    <tr>
                                    <th></th>
                                        <th></th>
                                        <th></th>
                                        <TH> Descuento</TH>
                                        <th><h4 id="descuento_f">L '.$d.'</h4><input type="hidden"  name="descuento2_f" id="descuento2_f"></th> 
                                        </tr>
                                        <tr>
                                    <th></th>
                                        <th></th>
                                        <th></th>
                                        <TH> Venta Neta</TH>
                                        <th><h4 id="vneta_f" >L '.$s.'</h4><input type="hidden"  name="vneta_f" id="vneta_f"></th> 
                                        </tr>
                                        <tr>
                                    <th></th>
                                        <th></th>
                                        <th></th>
                                        <TH> I.S.V</TH>
                                        <th><h4 id="iva_f">L '.$i.'</h4><input type="hidden" name="iva1_f" id="iva1_f"></th>
                                        </tr>
                                        <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>TOTAL</th>
                                        <th><h4 id="total_f">L '.$t.'</h4><input type="hidden" name="total_venta_f" id="total_venta_f"></th>
                                        </tr>
    </tfoot>';
break;
}

?>