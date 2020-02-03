 <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Administrar Notificaciones

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Notificaciones</li>

      </ol>

        <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalEnviarNoti">
          Enviar Notificacion

        </button>

        </div>

    </section>


    <section class="content">

      <div class="box">

        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped tablas ">
      
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Tipo Notificacion</th>
                <th>Descripcion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mayrek_nueva";

  $conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM tipo_notificaciones WHERE Tipo_Notificacion NOT LIKE '' ORDER By Cod_Tiponoti LIMIT 50";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM tipo_notificaciones WHERE Tipo_Notificacion LIKE '%$q%' OR Cod_Tiponoti LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['Cod_Tiponoti']."</td>
              <td>".$fila['Tipo_Notificacion']."</td>
                        <td>".$fila['Descripcion']."</td>
 
                      <td>
                   <div class='btn-group'>
                    <button type='submit' class='btn btn-warning'><i class='fa fa-pencil'></i></button>
                    <button type='submit' class='btn btn-danger'><i class='fa fa-times'></i></button>
                  </div>
                </td>     
                       ";

      }
    }else{
      $salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>

              </tr>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div id="modalEnviarNoti" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

    <form role="form" method="post">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seleccionar Metodo de Envio</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="box-header with-border">

        <button class="btn btn-block btn-success" data-toggle="modal" data-target="#modalEnviarEmail">
          Enviar Email

        </button>

        </div>

        <div class="box-header with-border">

        <button class="btn btn-block btn-warning" data-toggle="modal" data-target="#modalEnviarSMS">
          Enviar SMS

        </button>

        </div>

      
    </form>
    </div>
  </div>
</div>
 </div>

</div

<div id="modalEnviarEmail" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

    <form role="form" method="post">
      <div class="modal-header" style="background:#001F3F; color:white" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Envio de Email</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">
          
          <div class="form-group">

        <label for="clientenoti" class="col-sm-4">Cliente</label>

        <div class="col-sm-10">
          <select id="clientenoti" name="clientenoti" required>
            <option value="0">Seleccionar Cliente</option>
          </select>
        </div>

      </div>

      <div class="form-group">

        <label for="clientenoti" class="col-sm-4">Correo Cliente</label>

        <div class="col-sm-10">
          <input type="text" name="TipoNoti" class="form-control" id="TipoNoti" placeholder="Correo Cliente" required>
        </div>

      </div>

      <div class="form-group">

        <label for="TipoNoti" class="col-sm-4">Asunto de Notificacion</label>

        <div class="col-sm-10">
          <input type="text" name="TipoNoti" class="form-control" id="TipoNoti" placeholder="Tipo de Notificacion" required>
        </div>

      </div>
     
      <div class="form-group">
          
        <label for="descripcion" class="col-sm-4">Descripcion</label>

        <div class="col-sm-10">
          <textarea class="form-control" name="Descripcion" id="descripcion" cols="100" rows="10" placeholder="Asunto de Notificacion" form="frmnoti" required></textarea>
        </div>

       </div>

      <label for="fechanoti" class="col-sm-4">Fecha Notificacion</label>
      <div class="col-sm-10">
          <input type="text" name="fechanoti" class="form-control" id="fechanoti" value="<?php echo date("y/m/d");?>" readonly>
        </div>

          

        </div>

      
   
    </div>
     </form>
  </div>
</div>
</div>
