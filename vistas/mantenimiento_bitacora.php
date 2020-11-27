
<?php
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <h1 class="box-header with-border">Bitacora </h1>
                    <div class="box-header with-border">

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                          <th>Id Bitacora</th>
                          <th>Fecha</th>
                              <th>Nombre Usuario</th>
                              <th>Objeto</th>
                              <th>Acción</th>
                              <th>Descripción</th>
                              
                              <th>Antes</th>
                              <th>Despues</th>
                              
                          </tfoot>
                        </table>
                        </div> 
                    </div> 
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/tbl_bitacora.js"></script>
<?php 
}require 'permisos/segurida.php';
ob_end_flush();
?>