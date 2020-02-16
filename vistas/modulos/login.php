<!--imagen<div id="back"></div>-->





<div class="login-box  login-page">

  <div class="login-logo "  >
    <!--imagen-->
    <img   id="back" >
    
  </div>

  <div class="login-box-body " >

    <p class="login-box-msg" Font="Verdana">LOGIN</p>

    <form method="post">
    <label for="NUsuario">Usuario</label><br>
      <div class="form-group has-feedback">

        <input type="text" class="form-control" title="Primera Letra de Nombre,Apellido" placeholder="Usuario" name="ingUsuario" required onkeypress="return soloLetras(event)"onkeyup="aaa(this, event) " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">

        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <script language="javascript">

      function aaa(campo, event) {

CadenaaReemplazar = " ";
CadenaReemplazo = "";
CadenaTexto = campo.value;
CadenaTextoNueva = CadenaTexto.split(CadenaaReemplazar).join(CadenaReemplazo);
campo.value = CadenaTextoNueva;

}

</script>



        <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<label for="NContra">Nueva Contraseña</label><br>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" title="Contraseña" placeholder="Contraseña" name="ingPassword" onkeyup="aaa(this, event)" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>  

      <div class="row">

        <div class center ="col-xs-4">
            

          <button type="submit" id="Ingresar" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
       
        </div>
        <br>
      </div>

      <?php

      $login = new ControladorUsuarios();
      $login -> ctrIngresoUsuario();
      
      ?>

    </form>
   <br>

   </br>
   <a href="vistas/modulos/recuperarcontraseña.php" >Recuperar la Contraseña</a>

  </div>

</div >
