<?php

$servername = "localhost";
    $username = "root";
  	$password = "";
    $dbname = "latipica1";
    

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

cLass ControladorUsuarios
{

	static public function ctrIngresoUsuario()
	{

	if(isset($_POST["ingUsuario"]))
		{session_start();

		if (preg_match('/^[a-zA-Z0-9]+$/', strtoupper($_POST["ingUsuario"])) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"]))
			

				$tabla = "tbl_usuario";

				$item = "Nombre_Usuario";
				$valor = strtoupper($_POST["ingUsuario"]);

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				
				$var=$_POST["ingUsuario"];
				$_SESSION['u']=$_POST["ingUsuario"];
				if ($respuesta["Nombre_Usuario"] == strtoupper($_POST["ingUsuario"]) && $respuesta["Contraseña"] == $_POST["ingPassword"])
				{
				
                    require "modelos/conexion2.php";
  						IF (isset($_POST["ing"])){

									$sqluser1 = "SELECT  estado_usuario from tbl_usuario WHERE estado_usuario = 'Nuevo' && Nombre_Usuario= '$var'  ";
									$resultado1 = $conn -> query($sqluser1);
									$filas3 = $resultado1 -> num_rows;
									if($filas3 > 0){
											echo"<script>
											alert('exito ');
											window.location = 'vistas/modulos/a.php';
											</script>";
										}
										else{
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
  								}
												
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


		
