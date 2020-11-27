<?php require_once('../../config/Conexion.php'); ?>
<?php
session_start();
$query_usuario= "SELECT *FROM tbl_cliente c join tbl_tipo_tel_dir t  on t.id_cliente = c.id_cliente  join tbl_direccion d  on  d.id_cliente = c.id_cliente   ORDER BY Nombre  ";
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

$query = "SELECT * FROM tbl_roles_objeto where id_rol='$id_rol' and id_objeto = 7 ";
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
      <strong>No existen registros de clientes.</strong> Si desea puede agregar un cliente nuevo.
    </div>

  <?php } // Show if recordset empty ?>
  <?php if ($totalRows_usuario > 0) { // Show if recordset not empty ?>

<h3 class="box-title">Lista de Clientes</h3>

<div id="div">
<div id="example">
<table id="example" type="hidden"></table>
  <table id="example1" class="table table-striped table-bordered table-condensed table-hover" >
    <thead>
      <tr>
      
      <th>Operaciones</th>
      <th>#</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Direccion de Cliente</th>
        <th>RTN</th>
        <th>Estado </th>
       
        
    </tr>
    </thead>
  <tbody>
    <?php do {       ?> 
      <tr>
      <td>  
           <a type="button"  id="a" class="btn btn-warning " data-toggle="modal" data-target="#editar<?php echo $row_usuario['id_cliente'];?>"><i class="fa fa-pencil"></i></a>
           <?php include("../../vistas/modal/editar_usuario.php");?>


           <?php    if($row_usuario['estado']==1)  { ?> 
              <form  method="get" action="javascript:activo('<?php echo $row_usuario['id_cliente']; ?>')">
                <button type="submit" class="btn btn-primary"  id='a'><i class="fa fa-check"></i></button>

                
              </form>
            <?php  }   else {?> 

              <form  method="get" action="javascript:inactivo('<?php echo $row_usuario['id_cliente']; ?>')"> 
                <button type="submit" class="btn btn-danger" id='b'><i class="fa fa-close"></i></button>
              </form>
            <?php  } ?> 

           
         
            
          

          
          </td>  


      <td id="cliente"><?php echo $row_usuario['id_cliente']; ?> </td>
        <td><?php echo $row_usuario['nombre']; ?> </td>
        <td><?php echo $row_usuario['correo']; ?> </td>  
        <td><?php echo $row_usuario['direccion']; ?> </td>  
        <td><?php echo $row_usuario['RTN']; ?> </td> 

        <td align="center">
             <?php    if($row_usuario['estado']==1)  { ?> 
              <form  method="get" action="javascript:activo('<?php echo $row_usuario['id_cliente']; ?>')">
                <button type="submit" class="btn btn-success btn-xs">Activo</button>
              </form>
            <?php  }   else {?> 

              <form  method="get" action="javascript:inactivo('<?php echo $row_usuario['id_cliente']; ?>')"> 
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

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 7 ";
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
	    "order": [[ 1, "DECS" ]]//Ordenar (columna,orden)
	}).DataTable();

</script>
 <?php } // Show if recordset not empty ?>