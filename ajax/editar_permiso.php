<!-- 
Copyright & copy; 2018-2019 All rights reserved.
IA-220 Evaluacion de Sistemas
Licda. Karla Garcia
Elabora por:
Carolin Varela
Angel Zambrano
Roger Carrillo 
Cristian Carrasco
Allan Matamoros
 -->

 <?php

session_start();
require "../../modelos/conexion2.php";

if(($_SESSION['id_usuario'])){
	require '../funcs/conexion.php';
require '../funcs/funcs.php';
	$idUsuario = $_SESSION['id_usuario'];
$sql = "Select id_usuario, nombre_usuario from tbl_usuario WHERE id_usuario = '$idUsuario'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
	 
}else{
	  header ("Location: index.php");
}

?>
<?php
	//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['df'])) {
           $errors[] = "id vacio";
       
        } 
         else if (
			!empty($_POST['df']) 
		){
		/* Connect To Database*/
		//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_parametro=intval($_POST['df']);
		$parametro=$_POST["inser"];
		$valor=$_POST["edi"];
				$valor=$_POST["edi"];
		$eli=$_POST["eliminar"];
             $con=$_POST["con"];
		
			 
			   
			  $objeto="tbl_parametros";
                     $us="probando";
                    $accion="UPDATE";
         
            
		$sql="UPDATE tbl_roles_objeto set permiso_consulta='".$con."', permiso_insercion='".$parametro."' , permiso_actualizacion='".$valor."', permiso_eliminacion='".$eli."' WHERE id_permiso='".$id_parametro."'";
		$query_update = mysqli_query($mysqli,$sql);
		 $id= 1;
                      
			if ($query_update){
				  $bita=grabarBitacora($idUsuario,$objeto,$accion,$sql);
			 
				$messages[] = "El registro ha sido actualizado con exito.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($mysqli);
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