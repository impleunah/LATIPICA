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

if(isset($_POST['nombre'])) { 
  
    if (isset($_POST['guardar'])) {


        $Nombre=($_POST['nombre']);
        $fecha_ini=($_POST['fecha_ini']);
        $fecha_can=($_POST['fecha_ca']);
        $costo=($_POST['costo']);
        $categoria=($_POST['cbx_categoria']);
        $producto=($_POST['cbx_producto']);
        $Estado=($_POST['estado']);
    
       

 $ver="SELECT * FROM servicios WHERE nom_servicio='$Nombre'";
        $existencia=$conn->query($ver);
        $filas=$existencia->num_rows;
        if ($filas>0) {
            echo "<script>
          alert(' EL servicio ya se encuentra registrado');
                </script>";
        }else{
             

            
     $datos= array ("Categoria"=>$categoria,"Producto"=>$producto,"Nombre:"=>$Nombre,"fecha_inicio:"=>$fecha_ini,"fecha_can:"=>$fecha_can,"costo:"=>$costo,"Estado:"=>$Estado);
      

          $sql = " CALL INS_Servicios('$categoria ',' $producto ',' $Nombre ',' $costo ',' $Estado', ' $fecha_ini ',' $fecha_can ','null') " ;
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