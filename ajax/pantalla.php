<?php 
require_once '../config/Conexion.php';

function getListasRep(){

  $query = 'SELECT id_objeto,objeto FROM tbl_pantallas';
  $result = ejecutarConsulta($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_objeto]'>$row[objeto]</option>";
  }
  return $listas;
}

echo getListasRep();
