<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "latipica1";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
?>
<?php

if(isset($_POST['nombrecliente'])) { 
  
    if (isset($_POST['guardarcliente'])) {


        $Identidad=($_POST['identidad']);
        $Nombre_Cliente=($_POST['nombrecliente']);
        $Apellido=($_POST['apellido']);
        $Direccion =($_POST['direccion']);
        $Telefono=($_POST['telefonocliente']);
        $Celular=($_POST['celularcliente']);
        $Correo=($_POST['correocliente']);
        $Estado=($_POST['estadocliente']);
      
        
       

 $ver="SELECT * FROM cuentas_clientesbd WHERE Nombre_Cliente='$Nombre_Cliente'";
        $existencia=$conn->query($ver);
        $filas=$existencia->num_rows;
        if ($filas>0) {
            echo "<script>
          alert(' El cliente ya se encuentra registrado');
                </script>";
        }else{
             

            
     $datos= array ("identi:"=>$Identidad,"nombre_cli:"=>$Nombre_Cliente,"apelli:"=>$Apellido,"direcc:"=>$Direccion,"tel:"=>$Telefono,"cel:"=>$Celular,"correo"=>$Correo,"estado"=>$Estado);
      

          $sql = " CALL Insert_Cliente (null,5,7,'$Identidad',' $Nombre_Cliente',' $Apellido',' $Direccion',' $Celular',' $Telefono',' $Correo','$Estado') " ;
           $resultadomateria=$conn->query($sql);
  
         
           
             if ($resultadomateria>0) {
              echo "<script>
             alert('Registro Exitoso');
      
              </script>";
              }else{
              echo "<script>
             alert('Error al crear registro');
      
              </script>";
          }
}

       }
          $json_datos=  json_encode ($datos);
     }

    ?>