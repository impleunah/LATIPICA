<?php 


if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
$NOMBRE=$_SESSION["Nombre_Usuario"];
 
require_once('../config/Conexion.php');

$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query1 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 1 ";
    $result1 = mysqli_query($conexion, $query1);

while($row1 = mysqli_fetch_array($result1)){

    $permiso_consulta_Producto = $row1['permiso_consulta'];
    $permiso_insercion_Producto =$row1['permiso_insercion'];
    $permiso_actualizacion_Producto =$row1['permiso_actualizacion'];
    $Mostar_Menu_Producto =$row1['Mostar_Menu'];


}
$query2 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result2 = mysqli_query($conexion, $query2);

while($row2 = mysqli_fetch_array($result2)){

    $permiso_consulta_Compras = $row2['permiso_consulta'];
    $permiso_insercion_Compras =$row2['permiso_insercion'];
    $permiso_actualizacion_Compras =$row2['permiso_actualizacion'];
    $Mostar_Menu_Compras =$row2['Mostar_Menu'];


}

$query4 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 4 ";
    $result4 = mysqli_query($conexion, $query4);

while($row4 = mysqli_fetch_array($result4)){

    $permiso_consultaInventario = $row4['permiso_consulta'];
    $permiso_insercionInventario =$row4['permiso_insercion'];
    $permiso_actualizacionInventario =$row4['permiso_actualizacion'];
    $Mostar_MenuInventario =$row4['Mostar_Menu'];


}
$query5 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 5 ";
    $result5 = mysqli_query($conexion, $query5);

while($row5 = mysqli_fetch_array($result5)){

    $permiso_consultaMantenimiento = $row5['permiso_consulta'];
    $permiso_insercionMantenimiento =$row5['permiso_insercion'];
    $permiso_actualizacionMantenimiento =$row5['permiso_actualizacion'];
    $Mostar_MenuMantenimiento =$row5['Mostar_Menu'];

}
$query6= "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 6 ";
    $result6 = mysqli_query($conexion, $query6);

while($row6 = mysqli_fetch_array($result6)){

    $permiso_consultaSeguridad = $row6['permiso_consulta'];
    $permiso_insercionSeguridad =$row6['permiso_insercion'];
    $permiso_actualizacionSeguridad =$row6['permiso_actualizacion'];
    $Mostar_MenuSeguridad =$row6['Mostar_Menu'];
   



}
$query7 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 7 ";
    $result7 = mysqli_query($conexion, $query7);

while($row7 = mysqli_fetch_array($result7)){

    $permiso_consultaventas= $row7['permiso_consulta'];
    $permiso_insercionventas =$row7['permiso_insercion'];
    $permiso_actualizacionventas =$row7['permiso_actualizacion'];
    $Mostar_Menuventas =$row7['Mostar_Menu'];
}


//Prodectos
if(empty($permiso_consulta_Producto) ){ $_SESSION['permiso_consulta_Producto']  = 0;}else{ $_SESSION['permiso_consulta_Producto']  = 1;};
if(empty( $permiso_insercion_Producto)){ $_SESSION['permiso_insercion_Producto']  = 0;} else{ $_SESSION['permiso_insercion_Producto']  = 1;};
if(empty( $permiso_actualizacion_Producto)){ $_SESSION['permiso_actualizacion_Producto']  = 0;}else{ $_SESSION['permiso_actualizacion_Producto']  = 1;} ;
if( empty( $Mostar_Menu_Producto) ){ $_SESSION['Mostar_Menu_Producto']  =0;}else{ $_SESSION['Mostar_Menu_Producto']  =1;};

//compras
if( empty($permiso_consulta_Compras) ){$_SESSION['permiso_consulta_Compras']  =0;}else{$_SESSION['permiso_consulta_Compras']  =1;};
if(empty( $permiso_insercion_Compras)){ $_SESSION['permiso_insercion_Compras']  = 0;}else{ $_SESSION['permiso_insercion_Compras']  = 1;} ;
if(empty( $permiso_actualizacion_Compras)){ $_SESSION['permiso_actualizacion_Compras']  = 0;}else{ $_SESSION['permiso_actualizacion_Compras']  = 1;} ;
if(empty( $Mostar_Menu_Compras) ){ $_SESSION['Mostar_Menu_Compras']  = 0;}else{ $_SESSION['Mostar_Menu_Compras']  = 1;};

 

//inventario 
 if(empty($permiso_consultaInventario)){$_SESSION['permiso_consultaInventario']  =0;}else{$_SESSION['permiso_consultaInventario']  =1;};
if(empty( $permiso_insercionInventario) ){$_SESSION['permiso_insercionInventario']  = 0;}else{$_SESSION['permiso_insercionInventario']  = 1;};
if(empty( $permiso_actualizacionInventario)){$_SESSION['permiso_actualizacionInventario']  = 0;}else{$_SESSION['permiso_actualizacionInventario']  = 1;} ;
if(empty( $Mostar_MenuInventario) ){$_SESSION['Mostar_MenuInventario']  = 0;}else{$_SESSION['Mostar_MenuInventario']  = 1;};

//manteniminetos
if(empty( $permiso_consultaMantenimiento)){$_SESSION['permiso_consultaMantenimiento']  =0;} else{$_SESSION['permiso_consultaMantenimiento']  =1;};
if(empty( $permiso_insercionMantenimiento )){$_SESSION['permiso_insercionMantenimiento']  = 0;}else{$_SESSION['permiso_insercionMantenimiento']  = 1;};
if(empty( $permiso_actualizacionMantenimiento)){$_SESSION['permiso_actualizacionMantenimiento']  = 0;} else{$_SESSION['permiso_actualizacionMantenimiento']  = 1;};
if(empty( $Mostar_MenuMantenimiento)){$_SESSION['Mostar_MenuMantenimiento']  = 0;}else{$_SESSION['Mostar_MenuMantenimiento']  = 1;} ;


//seguridad
 if(empty($permiso_consultaSeguridad )){$_SESSION['permiso_consultaSeguridad']  =0;}else{$_SESSION['permiso_consultaSeguridad']  =1;};
if( empty($permiso_insercionSeguridad)) {$_SESSION['permiso_insercionSeguridad']  = 0;}else{$_SESSION['permiso_insercionSeguridad']  = 1;};
if( empty($permiso_actualizacionSeguridad)){$_SESSION['permiso_actualizacionSeguridad']  = 0;}else{$_SESSION['permiso_actualizacionSeguridad']  = 1;} ;
 if(empty($Mostar_MenuSeguridad )){$_SESSION['Mostar_MenuSeguridad']  = 0;}else{$_SESSION['Mostar_MenuSeguridad']  = 1;};

//ventas
if(empty( $permiso_consultaventas) ){$_SESSION['permiso_consultaventas']  = 0;}else{$_SESSION['permiso_consultaventas']  = 1;};
if( empty($permiso_insercionventas)){$_SESSION['permiso_insercionSeguridad']  = 0;}else{$_SESSION['permiso_insercionSeguridad']  = 1;} ;
  if( empty($permiso_actualizacionventas) ){$_SESSION['permiso_actualizacionventas'] =0;}else{$_SESSION['permiso_actualizacionventas'] =1;};
if(empty($Mostar_Menuventas)){$_SESSION['Mostar_Menuventas'] =0;}else{$_SESSION['Mostar_Menuventas'] =1;} ;


}
?>
