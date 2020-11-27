<?php require_once('../../config/Conexion.php'); ?>
<?php

$Nombre =($_POST['Nombre']);
$correo=$_POST['correo']; 
$RTN=$_POST['RTN']; 
$estado = $_POST['estado'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$id = $_POST['id_proveedor']; 


    $updateSQL = "UPDATE tbl_proveedor SET nombre='".$Nombre."', correo='".$correo."', estado='".$estado."',RTN='".$RTN."' ,direccion='".$direccion."' ,telefono='".$telefono."' WHERE id_proveedor='".$id."'";
   
    $Result1 = ejecutarConsulta($updateSQL) or die(mysqli_error($conexion));
    if($Result1==true){
     echo  1; 
      }
    else 
    {
     echo 0; 
    }
  

?>

