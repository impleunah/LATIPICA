<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mostrar Empresa
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Empresa</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">

        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped tablas">
      
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Nombre Empresa</th>
                <th>Descripcion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Sucursal</th>
                <th>Ubicacion</th>
                <th>Fecha Registro</th>
                <th>Usuario</th>
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

    $query = "SELECT * FROM empresa WHERE Nombre_Empresa NOT LIKE '' ORDER By Cod_Empresa LIMIT 50";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM empresa WHERE Nombre_Empresa LIKE '%$q%' OR Cod_Empresa LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['Cod_Empresa']."</td>
              <td>".$fila['Nombre_Empresa']."</td>
              <td>".$fila['Descripcion_Empresa']."</td>
              <td>".$fila['Telefonos']."</td>
              <td>".$fila['Correos']."</td>
              <td>".$fila['Sucursal_Empresa']."</td>
              <td>".$fila['Ubicacion_Empresa']."</td>
              <td>".$fila['Fecha_Registro']."</td>
              <td>".$fila['Cod_Usuario']."</td>
              <td>".$fila['Estado_Empresa']."</td>
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