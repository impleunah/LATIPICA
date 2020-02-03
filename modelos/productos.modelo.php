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
  
    if (isset($_POST['guardarpro'])) {


        $Nombre=($_POST['nombre']);
        $des=($_POST['Descripcion']);
        $costo=($_POST['costo']);
        $fecha_ini=($_POST['adquisicion']);
        $fecha_can=($_POST['vencimiento']);
        $empresa=($_POST['cbx_empresa']);
        $tipopro=($_POST['cbx_tipo']);
        $Estado=($_POST['estado']);
    
       

 $ver="SELECT * FROM productos WHERE Nombre='$Nombre'";
        $existencia=$conn->query($ver);
        $filas=$existencia->num_rows;
        if ($filas>0) {
            echo "<script>
          alert(' EL servicio ya se encuentra en la BD');
                </script>";
        }else{
             

            
     $datos= array ("Nombre:"=>$Nombre,"Descrip:"=>$des,"Costo:"=>$costo,"Fecha_ini:"=>$fecha_ini,"Fecha_Can:"=>$fecha_can,"Estado"=>$Estado,"Empresa:"=>$empresa,"Tipo"=>$tipopro);
      

          $sql = " CALL insertar_productos(null,'$empresa',' $tipopro ',' $Nombre ',' $des ',' $costo', ' $Estado',' $fecha_ini','$fecha_can') " ;
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