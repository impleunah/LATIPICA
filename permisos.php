<?php 
require_once '../config/Conexion.php';

function getListasRep(){

  $query = 'SELECT id_rol,rol FROM tbl_roles';
  $result = ejecutarConsulta($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_rol]'>$row[rol]</option>";
  }
  return $listas;
}

echo getListasRep();