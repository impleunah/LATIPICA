<?php 
require_once '../config/Conexion.php';

function Listaoperaciones(){

$query = 'SELECT id_tipo_operaciones,tipo_operacion FROM tbl_tipo_operaciones';
$result = ejecutarConsulta($query);
$lista = '<option value="">"Seleccionar Operacion"</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[id_tipo_operacione]'>$row[tipo_operacion]</option>";
}
return $lista;
}


echo Listaoperaciones();