
<?php 
require_once '../config/Conexion.php';

function Listaempresa(){

$query = 'SELECT id_empresa,nombre_comercial FROM tbl_empresa';
$result = ejecutarConsulta($query);
$lista = '<option value="">"Seleccionar Empresa"</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[id_empresa]'>$row[nombre_comercial]</option>";
}
return $lista;
}


echo Listaempresa();