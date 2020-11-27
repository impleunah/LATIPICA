<?php require_once('../../config/Conexion.php'); ?>
<?php
session_start();
$query_usuario= "SELECT v.idventa, fecha,nombre,Nombre_Usuario,r.cai,  num_factura, total_venta, v.estado from venta v  
join tbl_cliente c on c.id_cliente = v.id_cliente 
join tbl_usuario u  on u.id_usuario = v.id_usuario 
join tbl_reg_facturacion r on r.id_reg_facturacion=v.id_reg_facturacion
 ORDER by fecha DESC ";
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

$query = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 3 ";
    $result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_array($result)){

$permiso_consulta = $row['permiso_consulta'];



}

?>

<?php if ($totalRows_usuario == 0) { // Show if recordset empty ?>
 <br><br>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      <strong>No existen registros de venta.</strong> Si desea puede agregar uno nuevo.
    </div>

  <?php } // Show if recordset empty ?>
  <?php if ($totalRows_usuario > 0) { // Show if recordset not empty ?>

<h3 class="box-title">Lista ventas</h3>

<div id="div">
<div id="example">
<table id="example" type="hidden"></table>
  <table id="example1" class="table table-striped table-bordered table-condensed table-hover" >
    <thead>
      <tr>
      <th >Opciones</th>
                            <th>#</th>
      <th>Número Factura</th>
      <th>CAI</th>
      <th >Fecha</th>
      <th>Usuario</th>
      <th >Cliente</th>
     <th>Total Venta</th>
     <th>Estado</th>
    </tr>
    </thead>
  <tbody>
    <?php do {       ?> 
      <tr>
      <td>
           
           <a type="button"  id="a" class="btn btn-warning btn-sm fun fa fa-pencil " data-toggle="modal" data-target="#editar<?php echo $row_usuario['idventa'];?>"></a>
  
           <?php include("../../vistas/modal/ver_factura.php");?>

         
         </td>   
      <td id="idventa"><?php echo $row_usuario['idventa']; ?> </td>
      <td><?php echo $row_usuario['num_factura']; ?> </td> 
      
      <td><?php echo $row_usuario['cai']; ?> </td>
      <td><?php echo $row_usuario['fecha']; ?> </td>
      <td><?php echo $row_usuario['Nombre_Usuario']; ?> </td>  
        <td><?php echo $row_usuario['nombre']; ?> </td> 
        <td><?php echo $row_usuario['total_venta']; ?> </td>
        
        

        <td align="center">
             <?php    if($row_usuario['estado']==1 or  $row_usuario['estado']=='Aceptado')  { ?> 
              <form  method="get" action="javascript:activo('<?php echo $row_usuario['idventa']; ?>')">
                <button type="submit" class="btn btn-success btn-xs">Aceptado</button>
              </form>
            <?php  }  
            else {?> 

              <form  method="get" action="javascript:inactivo('<?php echo $row_usuario['idventa']; ?>')"> 
                <button type="submit" class="btn btn-danger btn-xs">Anulado</button>
              </form>
            <?php  } ?>                         
          </td>
        
         

        
                               
        </tr>
        
 <?php } while ($row_usuario = mysqli_fetch_assoc($usuario)); ?>    
        </tbody>
        
      </table>
      </div>
</div>



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