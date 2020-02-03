      
<!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Administrar Usuarios

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Servicios</li>

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
                <th>servicio</th>
                <th>Fecha Inicio</th>
                <th>Fecha Cancelacion</th>
                <th>Costo</th>
                <th>Categoria</th>
                <th>Producto</th>
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

    $query = "SELECT * FROM servicios WHERE Nom_servicio NOT LIKE '' ORDER By Cod_servicio LIMIT 50";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM servicios WHERE Nom_servicio LIKE '%$q%' OR Cod_servicio LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['Cod_servicio']."</td>
              <td>".$fila['Nom_servicio']."</td>
              <td>".$fila['Fecha_adquisicion']."</td>
              <td>".$fila['Fecha_cancelacion']."</td>
              <td>".$fila['Precio']."</td>
              <td>".$fila['Cod_categoria']."</td>
              <td>".$fila['Cod_producto']."</td>
              <td>".$fila['Estado_ser']."</td>
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