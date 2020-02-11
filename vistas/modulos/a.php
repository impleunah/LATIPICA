<?php $servername = "localhost";
    $username = "root";
  	$password = "";
    $dbname = "latipica1";
    

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }



$userr=("SELECT id_usuario FROM tbl_usuario WHERE Nombre_Usuario='ADMIINSDASD'");
$resultado =mysqli_query($conn,$userr);
$row = mysqli_fetch_assoc($resultado);
echo " $row dsdasdsa"

?>