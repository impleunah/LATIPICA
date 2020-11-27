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
      <div class="content-wrapper ">
        
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
                    <h1 class="box-header with-border">Inventario </h1>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <!-- Contenido del Formulario -->
                    <div id='div'>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Operaciones</th>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Cantidad en Libras</th>
                            <th>Resultado de Conversion</th>
                            <th>Cantidad en Gramos del Producto</th>
                            <th>Unidades a Obtener del Producto</th>
                            <th>Estado</th>
                          </thead>
                        </table>
                    </div>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    <form name= "formulario" id= formulario method="POST">
                    <input type="hidden" name="id_inventario" id="id_inventario">
                    
                           

                       


                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <label>Nombre Producto(*):</label>
                       <div style="display: flex;">
                       <input type="hidden" name="id_Producto" id="id_Producto">
                            <input type="text" class="form-control" name="idarticulo" id="idarticulo" maxlength="50"required parent> 
                            <div class="col-3 col-sm-1">
                              <a data-toggle="modal" href="#myModa">           
                                <button  id="btnAgregarArt" type="button"class="btn btn-success"> <span class="fa fa-plus"></span> </button>
                            </a>
                          </div>
                            </div>
                            </div>



                   

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Ingrese Cantidad en Libras:</label>
                            <input type="text" onkeypress='return validaNumericos(event)'  class="form-control" name="libra" id="libra" maxlength="10" placeholder="Ingrese Cantidad en Libras``" required>
                        </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Conversion a  Gramos:</label>
                            <input  type="text" onkeypress='return validaNumericos(event)'  class="form-control" name="conversion" id="conversion" maxlength="10" placeholder="conversion de libras a gramos" required>
                        </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Ingrese Presentacion del Producto en Gramos:</label>
                           <input type="text" onkeypress='return validaNumericos(event)'  class="form-control" name="gramos" id="gramos" maxlength="10" placeholder="gramos" required>
                        </div>

                        <div class = "form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                            <label>Unidades a Obtener del Producto:</label>
                           <input  type="text"  onkeypress='return validaNumericos(event)'  class="form-control" name="unidades" id="unidades" maxlength="10" placeholder="unidades" required>
                        </div>

                        <div class= "form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>

                    </form>

                    </div></div></div></div></section></div>

  <!--Fin-Contenido-->
  <div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width:40% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Artículo</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
              
                <th>Imagen</th>
            </thead>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div> 
  <?php
  require 'footer.php'
  
  ?>
  <script type="text/javascript" src="scripts/tbl_inventario.js"></script>
  <script type="text/javascript" src="scripts/combobox_producto.js"></script>

  

 <!--FUNCION PARA LA CONVERSION -->
  <script type="text/javascript">  

$(document).ready(function()
{
 var gramos_valor = "453.592";

// Libras
  $("#libra").keyup(function(){

    //Consultar input vacio
  var libra_consulta = $('#libra').val(); 

  if(libra_consulta > 0 ){

  var convertir_libras_gramos =  (libra_consulta *  gramos_valor).toFixed(2); 
  $('#conversion').val(convertir_libras_gramos);
   
  }else{
    $('#conversion').val("0.00");

  }


  // gramos 
$("#gramos").keyup(function(){

//Consultar input vacio
var gramos_consulta = $('#gramos').val(); 

if(gramos_consulta > 0 ){

var convertir_gramos_unidad =  (convertir_libras_gramos / gramos_consulta).toFixed(2); 
$('#unidades').val(convertir_gramos_unidad);

}else{
$('#unidades').val("0.00");

}




});

 


  });

 // conversion
 $("#conversion").keyup(function(){

//Consultar input vacio
var conversion_consulta = $('#conversion').val();



if(conversion_consulta > 0 ){

  var gramos_consulta = $('#gramos').val(); 
if(gramos_consulta> 0 ){
  gramos_result = gramos_consulta;
 }else{
  gramos_result = "";
} 

var Operacion =  (conversion_consulta-gramos_result); 
$('#libra').val(Operacion);
}else{
$('#libra').val();
}

// gramos
$("#gramos").keyup(function(){

//Consultar input vacio
var gramos_consulta = $('#gramos').val(); 
var libra =$('#libra').val(); 


if(gramos_consulta > 0 ){

var Operacion =  (conversion_consulta-gramos_consulta); 

$('#libra').val(Operacion);

 
}else{
$('#libra').val();
}


});


});

});
</script>

<?php 
 require 'permisos/inventario.php';
}
ob_end_flush();
?>
