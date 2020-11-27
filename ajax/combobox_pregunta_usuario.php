<?php 
require_once '../config/Conexion.php';

function getListasRep(){

  $query = 'SELECT id_usuario,Nombre_Usuario FROM tbl_usuario';
  $result = ejecutarConsulta($query);
  $listas = '<option value="">"Elige una opción"</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_usuario]'>$row[Nombre_Usuario]</option>";
  }
  return $listas;
}

echo getListasRep();