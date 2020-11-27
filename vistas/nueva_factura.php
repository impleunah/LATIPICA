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
			<h4>  Nueva Factura </h4>
		</div>
			
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
				<div class="form-group row">
				  <label  class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
          <input type="text" class="form-control input-sm"  placeholder=" Cliente" readonly>
				  </div>
				  <label for="email" class="col-md-1 control-label">RTN</label>
							<div class="col-md-2">
							<input type="text" class="form-control input-sm"  placeholder="RTN" readonly>
							</div>
					<label  class="col-md-1 control-label">Correo</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm"  placeholder="Correo" readonly>
							</div>
				         </div>
						
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label"># Factura</label>
							<div class="col-md-3">
                            <input type="text" class="form-control input-sm"  placeholder="# Factura" >
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
				  <label  class="col-md-1 control-label">Tipo pago</label>
				  <div class="col-md-3">
                <select type="text" class="form-control" name="id_tipo_pag" id="id_tipo_pag" maxlength="50"  required>
                  </select>
				  </div>	
				<br>
                </br>
				<br>
                </br>
				<div class="col-md-12">
					<div class="pull-right">
          <a type="submit"class="btn btn-warning" data-toggle="modal1" data-target="#modalContactForm1"><i class="fa fa-plus-circle"></i>Agregar Cliente</a>
          
            <a type="submit"class="btn btn-primary" data-toggle="modal" data-target="#modalContactForm"><i class="fa fa-plus-circle"></i>Agregar productos</a>
						
					</div>	
				</div>
			</form>	
<br><br>
</br></br>
			<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>	
<tr>
	<td class='text-right' colspan=4>SUBTOTAL $</td>
	<td class='text-right'>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA </td>
	<td class='text-right'>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL </td>
	<td class='text-right'></td>
	<td></td>
</tr>

</table>
<div class="col-md-12">
					<div class="pull-left">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar Factura
					</button>
          <button type="submit" class="btn btn-danger"> Imprimir
						</button>
            </div></div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
	<?php
  require 'footer.php'
  
  ?>
  <!--Fin-Contenido-->

  <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Agregar Producto</h4>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 ">
		<div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Codigo producto</th>
                            <th>Nombre Producto</th>
                            <th>Descripcion Producto</th>
                            <th>Precio Costo</th>
                            <th>Precio Venta</th>
                          </thead>
                        </table>
                    </div>
      </div>
        <button   data-dismiss="modal" aria-label="Close" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Close</button>
      </div>
      </div>
    </div>
  </div>
</div>

 <!--Fin-Contenido-->

<div class="modal fade" id="modalContactForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Agregar Cliente</h4>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 ">
		<div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nombre Cliente</th>
                            <th>RTN</th>
                            <th>Correo</th>
                          </thead>
                        </table>
                    </div>
      </div>
        <button   data-dismiss="modal" aria-label="Close" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Close</button>
      </div>
      </div>
    </div>
  </div>
</div>

<div >
  
  <script type="text/javascript" src="scripts/combobox_pago.js"></script>
  
  <?php 
}
ob_end_flush();
?>