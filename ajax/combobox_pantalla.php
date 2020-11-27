
<?php 
require_once '../config/Conexion.php';

function Listaempresa(){

$query = 'SELECT * FROM tbl_pantallas where estado =1';
$result = ejecutarConsulta($query);
$lista = '<option value="">"Seleccionar Empresa"</option>';
while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $lista.= "<option value='$row[id_objeto]'>$row[objeto]</option>";
}
return $lista;
}


echo Listaempresa();