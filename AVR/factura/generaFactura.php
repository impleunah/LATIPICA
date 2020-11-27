<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	
	
	
	
	require_once '../pdf/vendor/autoload.php';
	require_once 'dompdf/autoload.inc.php';
	
	use Dompdf\Dompdf;

	
		
	


			ob_start();
		    include(dirname('__FILE__').'/factura.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('factura_.pdf',array('Attachment'=>0));
		
		
	

?>