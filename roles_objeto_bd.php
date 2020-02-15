<!-- 
Copyright & copy; 2018-2019 All rights reserved.
IA-220 Evaluacion de Sistemas
Licda. Karla Garcia
Elabora por:
Carolin Varela
Angel Zambrano
Roger Carrillo 
Cristian Carrasco
Allan Matamoros
 -->

 <?php require("config/conexion2.php");  











/*BOTON GUARDAR */
if (isset($_POST['btn_guardar'])) {

if ( (empty($_POST['combo_roles'])) OR (empty($_POST['combo_objeto']))  ) {

if (isset($_POST['combo_roles'])) {
$id_rol = $_POST['combo_roles'];
}else{
$id_rol = null;    
}

if (isset($_POST['combo_objeto'])) {
$id_objeto = $_POST['combo_objeto'];
}else{
$id_objeto = null;    
}
 ?>
<script>
        function(isConfirm) {
            if (isConfirm) {
                var v = document.getElementById("combo_roles");  
                var g = document.getElementById("combo_objeto");
            v.style.borderColor = 'red';
            g.style.borderColor = 'red';
            var roles = "<?php echo $id_rol; ?>";
            var objeto = "<?php echo $id_objeto; ?>";
    document.getElementById('combo_roles').value = roles;
    document.getElementById('combo_objeto').value = objeto;
            } 
        };
</script>
<?php 

}
 
else{
    if (1== true) {

$id_rol = $_POST['combo_roles'];
$id_objeto = $_POST['combo_objeto'];
//$id_usuario_sesion = $_SESSION['id_usuario_sesion'];

if (isset($_POST['ck_consultar' ])) {
 $permiso_consulta = 'S';
 }else{
$permiso_consulta = 'N';
}
if (isset($_POST['ck_eliminar' ])) {
 $permiso_eliminar = 'S';
 }else{
$permiso_eliminar = 'N';
}
if (isset($_POST['ck_actualizar' ])) {
 $permiso_actualizar = 'S';
}else{
$permiso_actualizar = 'N';
}
if (isset($_POST['ck_insertar' ])) {
 $permiso_insertar ='S';
}else{
$permiso_insertar = 'N';
}

$comparar_rol = "SELECT * FROM tbl_roles_objeto WHERE  id_objeto = '$id_objeto'   and id_rol= $id_rol ";
      
$result = $conn->query($comparar_rol);

if ($result->num_rows > 0) {

    ?>
<script type="text/javascript">
    sweetAlert("Ya Existe Este Registro de Permiso en Esta Pantalla en Este Rol "); 
</script>
<?php 


}
else{

$sql = "INSERT INTO tbl_roles_objeto (id_rol,id_objeto,permiso_consulta,permiso_insercion,permiso_actualizacion,permiso_eliminacion, creado_por)
VALUES ('$id_rol','$id_objeto','$permiso_consulta','$permiso_insertar','$permiso_actualizar','$permiso_eliminar', 'CRISTIAN')";

if ($conn->query($sql) == TRUE) {
        ?>
<script>
swal({
            title: 'Datos Guardados Con Exito!',
            text: '',
            type: 'info',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
              
            } 
        });
</script>
<?php 

} 
}
}
}
}
/*TERMINA BOTON GUARDAR PERMISO*/


/*BOTON ELIMINAR*/
if (isset($_POST['btn_eliminar'])) {
    
    
$eli=$_POST['moda'];

                        $sql = "DELETE  FROM tbl_roles_objeto WHERE id_permiso = $eli";
    
    $conn->query($sql);

        ?>
    
        <script>
            
swal({
            title: 'Eliminado con Exito !',
            text: '',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
               
            } 
        });
</script>
        <?php
}

/*TERMINA BOTON ELIMINAR*/


/*BOTON IMPRIMIR*/
if (isset($_POST['btn_imprimir'])) {

        ?>
        <script>
swal({
            title: 'Este Botón se Encuentra Inhabilitado  !',
            text: '',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
               
            } 
        });
</script>
        <?php
}
/*TERMINA BOTON IMPRIMIR*/

?>

