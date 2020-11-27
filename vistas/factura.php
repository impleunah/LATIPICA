<?php
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php'


?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper ">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
		    <div class="btn-group pull-right">
				<a  href="nueva_factura.php"  class="btn btn-success" ><i class="fa fa-plus-circle"></i> Agregar Factura</a>
			</div>
			<h4> Buscar Facturas</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de factura</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de factura" onkeyup='load(1);'>
							</div>
							
							<div class="col-md-3">
                            <div class="btn-group">
				          <a  href="#"  class="btn btn-success"> Buscar</a>
			                 </div>
							</div>
							
						</div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    
            <div class="panel-body table-responsive" id="listadoregistros"> >
                <table  class="table table-striped table-bordered table-condensed table-hover " id="tbllistado2">
                    <thead>
					<th>#</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th># Factura</th>
					<th>Estado</th>
					<th class='text-right'>Total</th>
          <th class='text-right'>Acciones</th>
        
					</thead>
                </table>
			</div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/tbl_roles.js"></script>
  <script type="text/javascript" src="scripts/factura.js"></script>
  <?php 
}
ob_end_flush();
?>