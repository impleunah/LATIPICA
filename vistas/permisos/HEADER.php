<?php 
session_start();
$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../../config/Conexion.php');

$query1 = "SELECT id_rol,id_usuario FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];
$id_usuario= $row['id_usuario'];



 }

$query = "SELECT * FROM permiso_usuario where id_usuario=  '$id_usuario' ";
    $result = mysqli_query($conexion, $query);

while($per = $result->fetch_object())
    {
        array_push($valores, $per->idpermiso);
    }

//Determinamos los accesos del usuario






?>
                    <script type="text/javascript">
                     
                        


                 
                   
                    var  permiso_actualizacion= <?php echo  $permiso_actualizacion; ?>;
                    
                    if(permiso_actualizacion==0){
                        var visible = document.getElementById("boton");
                        visible.style.display= 'none';

                    }
             
                       
                        
                     
                        
                    
                

                
         

                
              
                    </script>