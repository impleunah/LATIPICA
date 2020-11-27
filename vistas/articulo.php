<?php
//Activamos el almacenamiento en el buffer
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
      <div class="content-wrapper"   >        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                    <button class="btn btn-primary" id="boton" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <h1 class="box-header with-border">Productos </h1>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th> # </th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Presentacion</th>                          
                            <th>Codigo producto </th>
                            <th>Precio de venta </th>
                            <th>Stock </th>
                            <th>Imagen</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>        
                          </tfoot>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idarticulo" id="idarticulo">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion(*):</label>
                            <input type="text" class="form-control" name="descripcion1" id="descripcion1" maxlength="50" placeholder="Descripcion" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio de venta(*):</label>
                            <input type="number" class="form-control" name="precio_venta" id="precio_venta"  step="0.01" min="1" max="1000"required>
                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Presentacion(*):</label>
                            <select type="text" class="form-control" name="id_presentacion" required id="id_presentacion" required>
                          </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Fabricacion(*):</label>
                            <input type="date" class="form-control" name="fecha_fabricacion" id="fecha_fabricacion" maxlength="50" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Expiracion(*):</label>
                            <input type="date" class="form-control" name="fecha_expiracion" id="fecha_expiracion" maxlength="50" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Código:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
                            <br> 
                            <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                            <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
                            <div id="print">
                              <svg id="barcode"></svg>
                            </div>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                            <a type="button" class="btn btn-danger" onclick="eliminar()" name="imagen1" id="imagen1">Eliminar Imagen</a>

                          </div>
                          <br></br>
                          <br></br>
                          <br></br>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

require 'footer.php';
?>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/articulo.js"></script>
<script type="text/javascript" src="scripts/combobox_presentacion.js"></script>
<?php 

}
require 'permisos/articulo.php';
ob_end_flush();
?>
