<?php
  include "modelos/conexion2.php";
  
  $query = "SELECT Cod_Producto, Nombre FROM productos";
  $resultado=$conn->query($query);
  $queryL = "SELECT Cod_categoria,Nombre FROM  categoria_servicios";
  $resultadoL = $conn->query($queryL);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Servicios
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Empresa</li>
      </ol>
    </section>

 <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Complete el Formulario</h3>

  <form enctype="multipart/form-data" name="formulario" method="post" >
     <section class="content">

      
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre del Servicio:</label>
                <input name="nombre"   id="Nombre" type="text" class="form-control" autofocus  onkeypress="return soloLetras(event);"  required>
               
              </div>
              <!-- /.form-group -->
             

              <div class="form-group">

                <label>Fecha Inicio:</label> <input type="date"  name="fecha_ini" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
              </div>
              <div class="form-group">
                <label>Fecha Cancelacion:</label>
               <input type="date"  name="fecha_ca" class="form-control" requiredA>
              </div>

              
              <div class="form-group">
                <label>Costo:</label>
               <input type="text" pattern="[0-9]+"  name="costo" class="form-control" requiredA>
              </div>
            
            <!-- /.col -->
 
          <!-- /.row -->
        </div>
       <div class="col-md-6">
         <div class="form-group">
              <label>Categoria </label>
     <select name="cbx_categoria" id="cbx_categoria" required>
      <option value="">Seleccionar Categoria</option>
        <?php while($rowM = $resultadoL->fetch_assoc()) { ?>
          <option value="<?php echo $rowM['Cod_categoria']; ?>"><?php echo $rowM['Nombre']; ?></option>
        <?php } ?>
      </select></div>
             <div class="form-group">
                <label>Producto:</label>
                <select name="cbx_producto" id="cbx_producto" required>
        <option value="">Seleccionar producto</option>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['Cod_Producto']; ?>"><?php echo $row['Nombre']; ?></option>
        <?php } ?>
      </select>
    </div>
              <div class="form-group">
                <label>Estado :</label>
                <select name="estado" style="width:250px" requiredA>

                 <option>Activo</option>

                 <option>Inactivo</option>
                </select>
              </div>
            </div>
                <div class ="col-md-4">
              
                  <td>
                    <button name="guardar" type="submit" class="btn btn-block btn-success">Guardar Registro</button>
                                        <button type="reset" class="btn btn-block btn-warning btn-sm">Cancelar</button>
                  </td>
              <!-- /.form-group -->
                </div>
        </div>
      </div> 
    </div>
 
    </section>
     </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
