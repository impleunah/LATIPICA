<?php
include "modelos/conexion2.php";


function grabarBitacora($id_usuario,$objeto,$accion,$descripcion){
		
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO  tbl_bitacoras(id_usuario,objeto,accion,descripcion) VALUES(?,?,?,?)");
		$stmt->bind_param($id_usuario,$objeto, $accion,$descripcion);
		
		if ($stmt->execute()){
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}
	?>