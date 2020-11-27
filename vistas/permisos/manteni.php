<?php 

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 5 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];
$permiso_insercion =$row['permiso_insercion'];
$a =$row['permiso_actualizacion'];


}
if(empty($a)){$_SESSION["man"]= 0;}else{$_SESSION["man"]= 1;};
?>
                    <script type="text/javascript">
                     
                        


                    
                    var  permiso_consulta= <?php echo $permiso_consulta; ?>;
                    var  permiso_insercion= <?php echo $permiso_insercion; ?>;
                  
                    
                    if(permiso_insercion==0){
                        var visible = document.getElementById("boton");
                        visible.style.display= 'none';

                    }
                    if(permiso_consulta==0){
                      document.getElementById("div").style.display= 'none';
                        
                    }

              
                    </script>