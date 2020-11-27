<?php 
require_once '../config/Conexion.php';

function getListasRep(){

  $query = 'SELECT id_operacion,descripcion FROM tbl_operaciones';
  $result = ejecutarConsulta($query);
  $listas = '<option value="">Elige una Opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_operacion]'>$row[descripcion]</option>";
  }
  return $listas;
}

echo getListasRep();