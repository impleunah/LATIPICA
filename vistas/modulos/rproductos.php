<?php
 include "modelos/conexion2.php";
  $queryk = "SELECT Cod_Empresa, Nombre_Empresa FROM empresa";
  $resultadok=$conn->query($queryk);
  $queryp = "SELECT Cod_Tipo,Nombre FROM tipo_producto";
  $resultadop = $conn->query($queryp);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registrar Productos
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

 <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de Registro</h3>

<form name="frmproductos" method="post" >
 <section class="content">

      
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre</label>
                <input name="nombre" onkeypress="return soloLetras(event);"  id="Identidad" type="text" class="form-control">
               
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Descripcion</label>
               <input name="Descripcion" onkeypress="return soloLetras(event);"  type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Costo</label>
               <input type="text" onkeypress="return soloNumeros(event);"  name="costo" class="form-control">
              </div>

              <div class="form-group">
                <label>Fecha de Adquisicion </label>
               <input type="date"  name="adquisicion" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
              </div>
              <td>
                    <button name="guardarpro" type="submit" class="btn btn-block btn-success">Guardar Registro</button>
                    
                  </td>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
            <label>Estado</label>
               <br> <select style="width:200px"name="estado">
             <option value="activo">Activo</option>
             <option value="inactivo">Inactivo</option> 
                 </select>
              </div>
              <!-- /.form-group -->
             <div class="form-group">
                <label>Empresa</label>
               <br> <select name="cbx_empresa" id="cbx_empresa">
                <option value="0">Seleccionar Empresa</option>
              <?php while($rowk = $resultadok->fetch_assoc()) { ?>
             <option value="<?php echo $rowk['Cod_Empresa']; ?>"><?php echo $rowk['Nombre_Empresa']; ?></option>
             <?php } ?>
            </select>
              </div>

               <div class="form-group">
                <label>Tipo de Producto</label>
              <br><select name="cbx_tipo" id="cbx_tipo">
             <option value="0">Seleccionar tipo</option>
           <?php while($rowp = $resultadop->fetch_assoc()) { ?>
           <option value="<?php echo $rowp['Cod_tipo']; ?>"><?php echo $rowp['Nombre']; ?></option>
            <?php } ?>
             </select>
              </div>
              <br> <div class="form-group">
                <label>Fecha de Vencimiento</label>
               <input type="date"  name="vencimiento" min="2000-01-01"class="form-control">
              </div>
              <td>
                   <br> <button type="reset" class="btn btn-block btn-warning btn-sm">Cancelar</button>
                    
                  </td>
              <!-- /.form-group -->

            </div>
            <!-- /.col -->
 
          <!-- /.row -->
        </div>

        </div>
        <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = ["8-37-39-46"];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }


     function soloNumeros_tel(e)
    {
        // capturamos la tecla pulsada
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
        // capturamos el contenido del input
        var valor=document.getElementById("Telefono").value;
 
        if(valor.length<9)
        {
            // 13 = tecla enter
            // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
            // punto
            if(teclaPulsada==9)
            {
                return true;
            }
 
            // devolvemos true o false dependiendo de si es numerico o no
            return /\d/.test(String.fromCharCode(teclaPulsada));
        }else{
            return false;
        }
    }
</script>
</form>




        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->