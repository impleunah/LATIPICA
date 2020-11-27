<?php 
require_once '../config/Conexion.php';

function getListasRep(){

  $query = 'SELECT * FROM tbl_preguntas';
  $result = ejecutarConsulta($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_pregunta]'>$row[pregunta]</option>";
  }
  return $listas;
}

echo getListasRep();