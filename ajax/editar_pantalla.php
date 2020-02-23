<?php

require "../modelos/conexion2.php";

	
	if (empty($_POST['nombres'])) {
           $errors[] = "Nombre vacio";
        }else if (empty($_POST['descripcions'])) {
           $errors[] = "Descripcion Vacia";
        } 
         else if (
			!empty($_POST['descriptions']) &&


			
			!empty($_POST['descripcions'])
		){
		
		$id_pantalla=intval($_POST['mod_id']);
		$nombre=mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombres"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($mysqli,(strip_tags($_POST["descripcions"],ENT_QUOTES)));
		
			 
			    $nombre= strtoupper($nombre);
				$descripcion= strtoupper($descripcion);
		 
			      $objeto="tbl_pantalla";
                     $us="probando";
                    $accion="UPDATE";
         
            
		$sql="UPDATE tbl_pantallas SET objeto='".$nombre."', descripcion='".$descripcion."' WHERE id_objeto='".$id_pantalla."'";
		$query_update = mysqli_query($mysqli,$sql);
		 $id= 1;
                      
			if ($query_update){
			 
				$messages[] = "La pantalla ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($mysqli,$sql);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
									echo "<script >document.getElementById('@message').value='';</script>";
									
								}
							?>
				</div>
				<?php
			}

?>