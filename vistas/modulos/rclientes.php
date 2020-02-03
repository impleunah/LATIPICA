<?php
  include "modelos/conexion2.php";
  
  $queryk = "SELECT Cod_Empresa, Nombre_Empresa FROM empresa";
  $resultadok=$conn->query($queryk);
  $query = "SELECT Cod_Producto, Nombre FROM productos";
  $resultado=$conn->query($query);
  $querys= "SELECT Cod_Servicio, Nom_servicio FROM servicios";
  $resultados=$conn->query($querys);
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario de Registro</h3>

<form enctype="multipart/form-data" name="formulario" method="post" >
 <section class="content">

      
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Identidad</label>
                <input name="identidad" onkeypress="return soloNumeros(event);"  id="Identidad" type="text" class="form-control">
               
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nombre</label>
               <input name="nombrecliente" onkeypress="return soloLetras(event);"  type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Apellido</label>
               <input type="text" onkeypress="return soloLetras(event);"  name="apellido" class="form-control">
              </div>

              <div class="form-group">
                <label>Telefono</label>
               <input type="text" onkeypress="return soloNumeros(event);"  name="telefonocliente" class="form-control">
              </div>

              <div class="form-group">
                <label>Correo</label>
               <input name="correocliente" type="email" class="form-control" required>
              </div>

             <div class="form-group">
                <label>Dirección</label>
               <input type="text" onkeypress="return soloLetras(event);"  name="direccion" class="form-control" required>
              </div>
              <td>

                 <div class="form-group">
                <label>Celular</label>
               <input type="text" onkeypress="return soloNumeros(event);"  name="celularcliente" class="form-control">
              </div>
              <td>
                    <button name="guardarcliente" type="submit" class="btn btn-block btn-success">Guardar Registro</button>              

                    
                  </td>

</div>

              <!-- /.form-group -->
    <!-- /.columna2 -->


               

            <div class="col-md-6">


              <div class="form-group">
                <label>Dirección</label>
               <input type="text" onkeypress="return soloLetras(event);"  name="direccion" class="form-control" required>
              </div>
              <td>

                 <div class="form-group">
                <label>Celular</label>
               <input type="text" onkeypress="return soloNumeros(event);"  name="celularcliente" class="form-control">
              </div>
<br>

               <div class="form-group">
                <label>Estado :</label>
                <select name="estadocliente" style="width:200px" required>

                 <option>Activo</option>

                 <option>Inactivo</option>
                </select>
              </div>


<br>  
                
          <!-- /.col -->
    <div class="form-group">
                <label>Empresa</label>
                <select name="cbx_empresa" id="cbx_empresa" style="width:200px" required>
                <option value="">Seleccionar Empresa</option>
              <?php while($rowk = $resultadok->fetch_assoc()) { ?>
             <option value="<?php echo $rowk['Cod_Empresa']; ?>"><?php echo $rowk['Nombre_Empresa']; ?></option>
             <?php } ?>
            </select>
              </div>

<!--probandooo-->
<br>  
               

         <div class="form-group">
                <label>Producto:</label>
                <select name="cbx_producto" id="cbx_producto" style="width:200px" required>
                 <option value="">Seleccionar producto</option>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['Cod_Producto']; ?>"><?php echo $row['Nombre']; ?></option>
        <?php } ?>
      </select>
    </div>

 <!--probandooo-->
<br>  
                
  <div class="form-group">
                <label>Servicio:</label>
                <select name="cbx_servicio" id="cbx_servicio" style="width:200px" required>
        <option value="">Seleccionar Servicio</option>
        <?php while($rows = $resultados->fetch_assoc()) { ?>
          <option value="<?php echo $rows['Cod_servicio']; ?>"><?php echo $rows['Nom_servicio']; ?></option>
        <?php } ?>
      </select>
    </div>
  <td>


 <br>  
               
                 
     <button type="reset" class="btn btn-block btn-warning btn-sm">Cancelar</button>
                    
                  </td>
              <!-- /.form-group -->

            </div>
            <!-- /.col -->
 
          <!-- /.row -->
        </div>

        </div>
       
</form>




        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      <!-- /.box -->

    </section>
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



    
    <script>
    /**
     * Función que solo permite la entrada de numeros, un signo negativo y
     * un punto para separar los decimales
     */
    function soloNumeros(e)
    {
        // capturamos la tecla pulsada
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
        // capturamos el contenido del input
        var valor=document.getElementById("Identidad").value;
 
        if(valor.length<13)
        {
            // 13 = tecla enter
            // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
            // punto
            if(teclaPulsada==13)
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->