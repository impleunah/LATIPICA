<?php
//Activamos el almacenamiento en el buffer



//Incluímos el archivo Factura.php
require('Factura.php');

//Establecemos los datos de la empresa
$logo = "latipica1.jpg";
$ext_logo = "jpg";
$empresa = "La Tipica";
$documento = "20477157772";
$direccion = "Chongoyape, José Gálvez 1368";
$telefono = "********";
$email = "La_Tipica@gmail.com";

//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/lista.php";
$venta= new lista();
$rspt = $venta->ventacabecera($_GET["id3"]);
//Recorremos todos los valores obtenidos
$regv = $rsptj->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método addSociete de la clase Factura
$pdf->addSociete(utf8_decode($empresa),
                  $documento."\n" .
                  utf8_decode("Dirección: ").utf8_decode($direccion)."\n".
                  utf8_decode("Teléfono: ").$telefono."\n" .
                  "Email : ".$email,$logo,$ext_logo);

$pdf->temporaire( "" );
$pdf->addDate( $regv->fecha);


//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->nombre));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "CODIGO"=>23,
             "DESCRIPCION"=>78,
             "CANTIDAD"=>22,
             "P.U."=>25,
             "DSCTO"=>20,
             "SUBTOTAL"=>22);
$pdf->addCols( $cols);
$cols=array( "CODIGO"=>"L",
             "DESCRIPCION"=>"L",
             "CANTIDAD"=>"C",
             "P.U."=>"R",
             "DSCTO" =>"R",
             "SUBTOTAL"=>"C");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 89;

//Obtenemos todos los detalles de la venta actual
$rsptad = $venta->listarDetalle($_GET["id"]);

while ($regd = $rsptad->fetch_object()) {
  $line = array( 
                "Aticulo"=> utf8_decode("$regd->articulo"),
                "CANTIDAD"=> "$regd->cantidad",
                "Previo Unitario"=> "$regd->precio_v",
               
                "SUBTOTAL"=> "$regd->subtotal");
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
}

//Convertimos el total en letras
require_once "Letras.php";
$V=new EnLetras(); 
$con_letra=strtoupper($V->ValorEnLetras($regv->total,"Lempiras"));
$pdf->addCadreTVAs("---".$con_letra);

//Mostramos el impuesto
$pdf->addTVAs( $regv->IVA, $regv->total,"L/ ");
$pdf->addCadreEurosFrancs("IGV"." $regv->IVA %");
$pdf->Output('Reporte de Venta','I');






?>