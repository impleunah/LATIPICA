<?php require_once('../../config/Conexion.php'); ?>
<?php
$id = $_GET['id'];
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
$deleteSQL = sprintf("UPDATE tbl_cliente, SET estado='0' WHERE nombre=$id ");
  $Result1 = ejecutarConsulta($deleteSQL) or die(mysqli_error($conex));
if($Result1==true)
{
  echo 1;
   }
 else 
 {
  echo 0;
   }
}
?>