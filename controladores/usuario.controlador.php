<?php

cLass ControladorUsuarios
{

	static public function ctrIngresoUsuario()
	{

	if(isset($_POST["ingUsuario"]))
		{

		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"]))
			{

				$tabla = "tbl_usuario";

				$item = "Nombre_Usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta["Nombre_Usuario"] == $_POST["ingUsuario"] && $respuesta["Contraseña"] == $_POST["ingPassword"])
				{

					$_SESSION["iniciarSesion"] = "ok";

					echo '<script>
					Swal.fire({
						type: "success",
						title: "!Bienvenido al Sistema!",
						showConfirmButton: "true",
						confirmButtonText: "Entrar",
						closeOnConfirm: "false"
					
					}).then((result)=>{
						
						if (result.value){

							window.location = "inicio";
						}
					});
					</script>';
					}
					else
					{
					echo '<script>
					Swal.fire({
						type: "error",
						title: "!Error al Ingresar!",
						showConfirmButton: "true",
						confirmButtonText: "Intentar de nuevo",
						closeOnConfirm: "false"
					
					}).then((result)=>{
						
						if (result.value){

							window.location = "login";
						}
					});
					</script>';
				}
			}
		}
	}

	static public function ctrCrearUsuario()
	{

	if (isset($_POST['NuevoUsuario'])) 
		{
		if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["NuevoUsuario"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["NuevaContra"]))  
			{ 

				$tabla = "tbl_usuario";

				$datos = array("Nombre_Usuario" => $_POST["NuevoUsuario"],
						"Contraseña" => $_POST["NuevaContra"],
						"Tipo_Usuario" => $_POST["TipodeUsuario"]);  	   	
			   	
				$respuesta = ModeloUsuarios::MdlIngresarUsuarios($tabla, $datos);

				if ($respuesta=="ok") {
					
					'<script>
					Swal.fire({
						type: "success",
						title: "!El Usuario no puede ir vacio o con caracteres especiales!",
						showConfirmButton: "true",
						confirmButtonText: "Cerrar",
						closeOnConfirm: "false"
					
					}).then((result)=>{
						
						if (result.value){

							window.location = "inicio";
						}
					});
					</script>';
				}
				}
				else
				{	
				
				echo '<script>
					swal({
						type: "error",
						title: "!El Usuario no puede ir vacio o con caracteres especiales!",
						showConfirmButton: "true",
						confirmButtonText: "Cerrar",
						closeOnConfirm: "false"
					
					}).then((result)=>{
						
						if (result.value){

							window.location = "inicio";
						}
					});
				</script>';
			}	
		}			
	}
}
		
