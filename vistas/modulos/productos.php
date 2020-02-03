<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">

        <div class="box-header with-border">

        </div>

        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped tablas">
      
            
            <thead>
              <tr>
                <th style="width:10px">#</th>
                 <th>Nombre Producto</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th>Fecha Adquisicion</th>
                <th>Fecha Vencimiento</th>
                <th>Empresa</th>
                <th>Tipo Producto</th>
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

    $query = "SELECT * FROM productos WHERE Nombre NOT LIKE '' ORDER By Cod_Producto LIMIT 50";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM productos WHERE Nombre LIKE '%$q%' OR Cod_Producto LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="<tr>
              <td>".$fila['Cod_Producto']."</td>
              <td>".$fila['Nombre']."</td>     
              <td>".$fila['Descripcion']."</td>
              <td>".$fila['Costo']."</td>
              <td>".$fila['Fecha_Adquisicion']."</td>
              <td>".$fila['Fecha_Vencimiento']."</td>
              <td>".$fila['Cod_Empresa']."</td>
              <td>".$fila['Cod_Tipo']."</td>
              <td>".$fila['Estado']."</td>
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

  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->