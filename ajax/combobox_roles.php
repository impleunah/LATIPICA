<?php 
require_once '../config/Conexion.php';
function combobox_roles(){

  $query = 'SELECT id_rol,rol FROM tbl_roles where estado =1 ';
  $result = ejecutarConsulta($query);
  $listas = '<option value="">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_rol]'>$row[rol]</option>";
  }
  return $listas;
  }
  
  echo combobox_roles();










