<?php
	$servername = "localhost:8080";
    $username = "root";
  	$password = "";
    $dbname = "latipica1";
    

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
?>
