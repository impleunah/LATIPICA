<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">

        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped tablas">
      
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Identidad</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Estado</th>
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

    $query = "SELECT * FROM cuentas_clientesbd WHERE Nombre_Cliente NOT LIKE '' ORDER By Cod_Cliente LIMIT 50";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM cuentas_clientesbd WHERE Nombre_Cliente LIKE '%$q%' OR Cod_Cliente LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['Cod_Cliente']."</td>
              <td>".$fila['identidad']."</td>
                        <td>".$fila['Nombre_Cliente']."</td>
                        <td>".$fila['Apellido_Cliente']."</td>
              <td>".$fila['Direccion_Cliente']."</td>
              <td>".$fila['Telefono_Celular']."</td>
              <td>".$fila['Telefono_Casa']."</td>
              <td>".$fila['EMAIL']."</td>
                        <td>".$fila['Estado']."</td>
                      <td>
                   <div class='btn-group'>
                    <button type='submit' class='btn btn-warning'><i class='fa fa-pencil'></i></button>
                    <button type='submit' class='btn btn-default'><a href='facturacion'<i class='fa fa-book'></i><a/>
                    </button>
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