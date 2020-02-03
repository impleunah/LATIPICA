<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro Notificaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Registar Notificaciones</li>
      </ol>
    </section>

<section class="content">

      <div class="box">
        <div class="box-header with-border">   

    <form role="form" method="post" id="frmnoti">

      <div class="form-group">

        <label for="empresanoti" class="col-sm-4">Empresa</label>

        <div class="col-sm-10">
          <select id="empresanoti" name="empresanoti" required>
            <option value="0">Seleccionar Empresa</option>
          </select>
        </div>

      </div>

      
      <div class="form-group">

        <label for="clientenoti" class="col-sm-4">Cliente</label>

        <div class="col-sm-10">
          <select id="clientenoti" name="clientenoti" required>
            <option value="0">Seleccionar Cliente</option>
          </select>
        </div>

      </div>

      <div class="form-group">

        <label for="formaaviso" class="col-sm-4">Forma de Aviso</label>

        <div class="col-sm-10">
          <select id="formaaviso" name="formaaviso">
            <option value="0">Seleccionar Forma</option>
            <option value="Email">Email</option>
            <option value="SMS">SMS</option>
          </select>
        </div>

      </div>


      <div class="form-group">

        <label for="TipoNoti" class="col-sm-4">Tipo de Notificacion</label>

        <div class="col-sm-10">
          <input type="text" name="TipoNoti" class="form-control" id="TipoNoti" placeholder="Tipo de Notificacion" required>
        </div>

      </div>
     
      <div class="form-group">
          
        <label for="descripcion" class="col-sm-4">Descripcion</label>

        <div class="col-sm-10">
          <textarea class="form-control" name="Descripcion" id="descripcion" cols="100" rows="10" placeholder="Asunto de Notificacion" form="frmnoti" required></textarea>
        </div>

       </div>

      <div class="form-group">
                <label for="Estadonoti">Estado :</label>
                <select name="Estadonoti" style="width:250px" required>

                 <option>Activo</option>

                 <option>Inactivo</option>
                </select>
      </div>
      <label for="fechanoti" class="col-sm-4">Fecha Notificacion</label>
      <div class="col-sm-10">
          <input type="text" name="fechanoti" class="form-control" id="fechanoti" value="<?php echo date("y/m/d");?>" readonly>
        </div>


      <div class="form-group">
          <div class="col-sm-10">
          <br>
           <button type="submit" name="guardarnoti" class="btn btn-success">Guardar Registro</button>

            <button type="reset" name="cancelar" class="btn btn-warning">Cancelar</button>
          </div>
      </div>
    </form>
  </div> 
  </div>
  </div>
</section>             