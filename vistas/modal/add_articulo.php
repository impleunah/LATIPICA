<?php
require "../config/Conexion.php";

IF (isset($_POST["btnEmpty3"])){
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion1'];
$id_presentacion=$_POST['id_presentacion'];
$presentacion=$_POST['descripcion'];
$imagen=$_POST['imagen'];
$condicion=$_POST['condicion'];
$codigo=$_POST['codigo'];
$precio_venta=$_POST['precio_venta'];
$fecha_fabricacion=$_POST['fecha_fabricacion'];
$fecha_expiracion=$_POST['fecha_expiracion'];
$stock=$_POST['stock'];


ejecutarConsulta("INSERT INTO tbl_articulo( nombre, descripcion1, codigo, precio_venta, fecha_fabricacion, fecha_expiracion, id_presentacion, stock,imagen,condicion) 
VALUES ('$nombre','$descripcion','$codigo','$precio_venta',$fecha_fabricacion,$fecha_expiracion,'$id_presentacion',0,'$imagen',1)");

}
?>

<div class="modal fade" id="myMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
      </div>
      <div class="modal-body">

<form id="formEmpty3" data-smk-icon="glyphicon-remove" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>">
<div class="row">
  <div class="form-group">
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
                            <input type="number" class="form-control" name="precio_venta" id="precio_venta"  step="0.5" min="1" max="1000"required>
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
                            <label>Fecha Expiracion*):</label>
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
                          </div>
                          <br></br>
                          <br></br>
                          <br></br>

	  	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnEmpty3" name="btnEmpty3">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
