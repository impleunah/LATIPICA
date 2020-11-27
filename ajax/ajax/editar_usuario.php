<?php require_once('../../config/Conexion.php'); ?>
<?php

$nombre =($_POST['nombre']);
$estado=$_POST['estado']; 
$correo=$_POST['correo']; 
$RTN = $_POST['RTN'];
$direccion = $_POST['direccion'];
$Telefono1 = $_POST['Telefono1'];
$Telefono2 = $_POST['Telefono2'];
$Telefono3 = $_POST['Telefono3'];
$Telefono4 = $_POST['Telefono4'];
$Telefono5 = $_POST['Telefono5'];
$id = $_POST['id_cliente']; 
$viejo_usuario = $_POST['viejo_usuario']; 




  
    $updateSQL = "UPDATE tbl_cliente SET nombre='".$nombre."', 
    correo='".$correo."', estado='".$estado."',RTN='".$RTN."' WHERE id_cliente='".$id."'";
    ejecutarConsulta("UPDATE tbl_direccion SET direccion='".$direccion."' WHERE id_cliente='".$id."'");
    ejecutarConsulta("UPDATE tbl_tipo_tel_dir SET  Telefono1='".$Telefono1."',Telefono2='".$Telefono2."', 
    Telefono3='".$Telefono3."',Telefono4='".$Telefono4."',Telefono5='".$Telefono5."' WHERE id_cliente='".$id."'");
    $Result1 = ejecutarConsulta($updateSQL) or die(mysqli_error($conexion));
    if($Result1==true){
     echo  1; 
      }
    else 
    {
     echo 0; 
    }
  


?><?php echo '<script language="javascript">alert("Error al crear sugerencia");</script>'; ?>