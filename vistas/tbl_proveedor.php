<?php

ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
<!--inicio formulario principal-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                     
               <body class="hold-transition skin-blue sidebar-mini" onLoad="ver_tabla_proveedor()">
                 
                  <div class="wrapper">
                  
                  </div>
                        <?php include('modal/add_proveedor.php')?>
                  <div class="container-fluid">
                    <br>
                  <div class="row">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" id="bo" data-toggle="modal" data-target="#myModal"> 
                      <i class="fa fa-plus" aria-hidden="true" ></i> Agregar
                        </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        
                        <div id="ver_tabla_proveedor"></div>
                        
                      </div>
                    </div>
                  </div>
                  </body>
                    <div class="box-header with-border">
               
                            </div>
                          </div>
                        
                          
                        <div class="box-tools pull-right">
                        </div>
                    </div>

             
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  
<?php
require 'footer.php';

?>

<script type="text/javascript" src="scripts/tbl_proveedor.js"></script>

<?php 

}
ob_end_flush();
?>
<?php 

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];
$permiso_insercion =$row['permiso_insercion'];
$permiso_actualizacion =$row['permiso_actualizacion'];


}

?>
                    <script type="text/javascript">
                     
                        


                    
                  
                    var  permiso_insercion= <?php echo  $permiso_insercion; ?>;
                    
                    if(permiso_insercion==0){
                        var visible = document.getElementById("bo");
                        visible.style.display= 'none';

                    }
                   
             
                      
              
                    </script>











