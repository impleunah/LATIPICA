<?php require_once('../../config/Conexion.php'); ?>
<?php
session_start();
$query_usuario= "SELECT *FROM tbl_proveedor";
$usuario= ejecutarConsulta($query_usuario) or die(mysqli_error());
$row_usuario= mysqli_fetch_assoc($usuario);
$totalRows_usuario= mysqli_num_rows($usuario);
?>



<?php

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../../config/Conexion.php');
$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];



}

?>
                    <script type="text/javascript">
                     
                        


                    
                    var  permiso_consulta= <?php echo $permiso_consulta; ?>;
                 
                  
                    
                   
                    if(permiso_consulta==0){
                      document.getElementById("div").style.display= 'none';
                        
                    }

              
                    </script>







<?php if ($totalRows_usuario == 0) { // Show if recordset empty ?>
 <br><br>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      <strong>No existen registros de proveedor</strong> Puede agregar un nuevo proveedor.
    </div>

  <?php } // Show if recordset empty ?>
  <?php if ($totalRows_usuario > 0) { // Show if recordset not empty ?>

<h3 class="box-title">Lista de Proveedores</h3>
</div>
<div id="div">
<div>
  <table id="example1" class="table table-striped table-bordered table-condensed table-hover" >
    <thead>
      <tr>
      
      <th>Operaciones</th>
      <th>#</th>
        <th>Nombre</th>
        <th>RTN</th>
        <th>Correo </th>
        <th>Dirección del Proveedor</th>
        <th>Telefono</th>
        <th>Estado </th>
    </tr>
    </thead>
  <tbody>
    <?php do {       ?> 
      <tr>
      <td>
           
           <a type="button" class="btn btn-warning btn-sm fun fa fa-pencil " data-toggle="modal" data-target="#editar<?php echo $row_usuario['id_proveedor'];?>"></a>
           <?php include("../../vistas/modal/editar_proveedor.php");?>

           <?php    if( $row_usuario['estado']==1)  { ?> 
              <form  method="get" action="javascript:activo('<?php echo  $row_usuario['id_proveedor']; ?>')">
                <button type="submit" class="btn btn-primary"  id='a'><i class="fa fa-check"></i></button>

                
              </form>
            <?php  }   else {?> 

              <form  method="get" action="javascript:inactivo('<?php echo  $row_usuario['id_proveedor']; ?>')"> 
                <button type="submit" class="btn btn-danger" id='b'><i class="fa fa-close"></i></button>
              </form>
            <?php  } ?> 





         
         </td>   
      <td><?php echo $row_usuario['id_proveedor']; ?> </td>
        <td><?php echo $row_usuario['Nombre']; ?> </td>
        <td><?php echo $row_usuario['RTN']; ?> </td>           
          <td><?php echo $row_usuario['correo']; ?> </td>    
          <td><?php echo $row_usuario['direccion']; ?> </td>   
          <td><?php echo $row_usuario['telefono']; ?> </td>         
          <td align="center">
             <?php    if($row_usuario['estado']==1)  { ?> 
              <form  method="get" action="javascript:activo('<?php echo $row_usuario['id_proveedor']; ?>')">
                <button type="submit" class="btn btn-success btn-xs">Activo</button>
              </form>
            <?php  }   else {?> 

              <form  method="get" action="javascript:inactivo('<?php echo $row_usuario['id_proveedor']; ?>')"> 
                <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
              </form>
            <?php  } ?>                         
          </td>
         
                               
        </tr>
 <?php } while ($row_usuario = mysqli_fetch_assoc($usuario)); ?>    
        </tbody>
        
      </table>
      </div>
      </div>

      <?php 

$NOMBRE=$_SESSION["Nombre_Usuario"];

require_once('../../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];



}
?>
      <script type="text/javascript">
        var  permiso_consulta= <?php echo $permiso_consulta; ?>;
        if( permiso_consulta!=" "){
       if(permiso_consulta==0){
                        var visible2 = document.getElementById("example1");
                        visible2.style.display= 'none';
                        
                    }
        }

</script>
<script>


tabla=$('#example1').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		          
            ],
      
			
        
	
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 1, "DESC" ]]//Ordenar (columna,orden)
	}).DataTable();

</script>
 <?php } // Show if recordset not empty ?>

