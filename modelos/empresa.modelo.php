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

if(isset($_POST['nombreempresa'])) { 
  
    if (isset($_POST['guardarempresa'])) {


        $Nombre_empresa=($_POST['nombreempresa']);
        $Sucursal=($_POST['sucursal']);
        $ubicacion = ($_POST['ubica']);
        $descrip=($_POST['descripcion']);
        $telefono=($_POST['telefono']);
        $fecha_regis=($_POST['fecha_re']);
        $correo=($_POST['correo']);
        $Estado=($_POST['estado']);
        $Usuario=($_POST['cbx_usuario']);
       
    
       

 $ver="SELECT * FROM empresa WHERE Nombre_Empresa='$Nombre_empresa'";
        $existencia=$conn->query($ver);
        $filas=$existencia->num_rows;
        if ($filas>0) {
            echo "<script>
          alert('La empresa ya se encuentra registrada');
                </script>";
        }else{
             

            
     $datos= array ("Nombre_empresa:"=>$Nombre_empresa,"descripcion:"=>$descrip,"telefono:"=>$telefono,"Correo:"=>$correo,"Sucursal:"=>$Sucursal,"Ubica:"=>$ubicacion,"Fecha_regis:"=>$fecha_regis,"Estado"=>$Estado,"usuario"=>$Usuario);
      

          $sql = " CALL Insertar_Empresa(null,' $Usuario ','$Nombre_empresa',' $descrip',' $telefono',' $correo', ' $Sucursal',' $ubicacion',' $fecha_regis','$Estado') " ;
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