<?php
  include "modelos/conexion2.php";
  
  $query= "SELECT Nombre_Usuario,Cod_Usuario FROM usuarios";
  $resultado=$conn->query($query);
?>

<!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro Empresa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Empresa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
         

        <!-- /.col -->
        <div class="col-md-6">
              <!-- /.content -->
              <!-- /.tab-pane -->
                <form class="form-horizontal" method="POST" id="frmEmpresa">
                  <div class="form-group">
                    <label>Nombre de la Empresa</label>

                      <input type="name" class="form-control" id="inputName" autofocus class="form-control" placeholder="Nombre de la Empresa"
                       onkeypress="return soloLetras(event);" title="Solo Debe Ingresar Letras" name="nombreempresa" minlength="2" maxlength="40" required pattern="[A-Za-z0-9]+" title="Letras. Tamaño mínimo: 2. Tamaño máximo: 40" title="Solo Debe Ingresar Letras" onkeyup="mayus(this);  sinespacio(this);" onblur="quitarespacios(this);" required>
                  </div>
                 
                 <label>Tiene Sucursal?</label>
                <div class="row">
                 <div class="col-lg-1">
                  <div class="input-group">
                     <input type="radio" name="rb-si" value="SI" required> SI
                      </span>
                </div>
               </div>

               <div class="col-lg-1">
                <div class="input-group">
                  <input type="radio"  name="rb-no" value="NO"> NO
                </div>
                </div>
              </div>
                
                  <div class="form-group">
                    <label>Sucursal</label>

                      <input type="text" name="sucursal" class="form-control" id="inputLocation" placeholder="Sucursal" oncopy="return false" onpaste="return false"   minlength="5" maxlength="90" pattern="[A-Za-z0-9]+" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 90"required>
                  </div>
           
                  <div class="form-group">
                    <label>Ubicación</label>

                      <input type="text" name="ubica" class="form-control" id="ubica" placeholder="Ubicación" oncopy="return false" onpaste="return false"   minlength="5" maxlength="90" pattern="[A-Za-z0-9]+" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 90"required>
                  </div>

                  <div class="form-group">
                    <label>Descripción de la Empresa</label>

                      <textarea class="form-control" id="inputExperience" placeholder="Descripción" form="frmEmpresa" onkeypress="return soloLetras(event);"  oncopy="return false" onpaste="return false" form="frmEmpresa" minlength="5" maxlength="90" required pattern="[A-Za-z0-9]+" title="Letras y números. Tamaño mínimo: 5. Tamaño máximo: 90" required name="descripcion"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Correo Electrónico</label>

                      <input type="email" name="correo" class="form-control" id="inputForo" name="correo" oncopy="return false" onpaste="return false"  pattern="[a-zA-Z0-9.@-]{1,22}[.es]{3}|[a-zA-Z0-9.@-]{1,21}[.com]{4}" maxlength="25" placeholder="Ej.: nombre@dominio.com / .es" required>
                  </div>
         <div class="form-group">
              <label>Usuario </label>
     <select name="cbx_usuario" id="cbx_usuario" required>
      <option value="">Seleccionar Usuario</option>
        <?php while($rowM = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $rowM['Cod_Usuario']; ?>"><?php echo $rowM['Nombre_Usuario']; ?></option>
        <?php } ?>
      </select></div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Teléfono</label>

                    <div class="col-sm-4">
                      <input type="name" class="form-control" id="inputName" placeholder="Teléfono"
                       onkeypress="return soloNumeros_tel(event);" title="Solo Debe Ingresar Numeros" required name="telefono">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputFechaR" class="col-sm-2 control-label">Fecha de Registro</label>

                    <div class="col-sm-4">
                      <input type="text" name="fecha_re" value="<?php echo date("Y-m-d");?>" class="form-control" id="inputFechaR" placeholder="Fecha de Registro" readonly="" required >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEstado" class="col-sm-2 control-label">Estado</label>

                    <select class="col-sm-4" name="estado">
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="guardarempresa">Registrar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

 <script type="text/javascript">

      function quitardobleespacio(e) {

          var cadena =  e.value;
          var limpia = "";
          var parts = cadena.split(" ");
          var length = parts.length;
          var numeroini = cadena.split(" ").length-1;
          var charend = cadena.charAt(cadena.length-1);

          for (var i = 0; i < length; i++) {
              nuevacadena = parts[i];
              subcadena = nuevacadena.trim();

              if(subcadena != "") {
                  limpia += subcadena + " ";
              }
          }

          limpia = limpia.trim();
          var numerofin = limpia.split(" ").length-1;

          if (numeroini > (numerofin)) {

              if (charend == ' ') {
                limpia = limpia + ' ';
                e.value = limpia;
              }
              else {
                limpia = limpia;
                e.value = limpia;
              }
          }
      };

  </script>

  <script type="text/javascript">

        function quitarespacios(e) {

            var cadena =  e.value;
            cadena = cadena.trim();

            e.value = cadena;

        };

  </script>

  <script type="text/javascript">

      function sinespacio(e) {

          var cadena =  e.value;
          var limpia = "";
          var parts = cadena.split(" ");
          var length = parts.length;

          for (var i = 0; i < length; i++) {
              nuevacadena = parts[i];
              subcadena = nuevacadena.trim();

              if(subcadena != "") {
                  limpia += subcadena + " ";
              }
          }

          limpia = limpia.trim();
          e.value = limpia;

      };

  </script>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->