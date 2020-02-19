<?php
	include 'modelos/conexion2.php';

	ModificarUsuario($_POST['Nombre_usuario'], $_POST['id_rol'], $_POST['correo_electronico'],$_POST['estado_usario'], $_POST['id_usuario']);

	function Modificarusuario($nombre, $idrol, $correo,$estado, $id)
	{
		$sentencia="UPDATE tbl_usuario SET nombre='".$nombre."', rol= '".$idrol."', correo_electronico='".$correo."',estado_usuario='".$estado."' WHERE id='".$id."' ";
		mysql_query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("usuario  Modificado exitosamente");
	window.location.href='rusuarios.php';
</script>
