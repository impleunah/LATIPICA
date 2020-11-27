<?php
 session_start();
require_once "../modelos/tbl_usuarios_función.php";
require_once('../config/Conexion.php');

$Usuario=new Usuario();
$usu=isset($_SESSION["Nombre_Usuario"])? limpiarCadena($_SESSION["Nombre_Usuario"]):"";
$id_usuario = isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$Nombre_Usuario = isset($_POST["Nombre_Usuario"])? limpiarCadena($_POST["Nombre_Usuario"]):"";
$Contraseña = isset($_POST["Contraseña"])? limpiarCadena($_POST["Contraseña"]):"";
$Repetir_Contraseña = isset($_POST["Repetir_Contraseña"])? limpiarCadena($_POST["Repetir_Contraseña"]):"";
$correo_electronico = isset($_POST["correo_electronico"])? limpiarCadena($_POST["correo_electronico"]):"";
$estado_usuario = isset($_POST["estado_usuario"])? limpiarCadena($_POST["estado_usuario"]):"";
$intentos = isset($_POST["intentos"])? limpiarCadena($_POST["intentos"]):"";
$id_rol = isset($_POST["rol_1"])? limpiarCadena($_POST["rol_1"]):"";
$modificado_por = isset($_POST["modificado_por"])? limpiarCadena($_POST["modificado_por"]):"";

//Recibir datos atraves de metodo POST que se envian mediante formulario - 23/02/2020//

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($id_usuario)){
			$n=strtoupper($Nombre_Usuario);
			$sql=ejecutarConsulta_row("SELECT * FROM tbl_usuario WHERE Nombre_Usuario='$n'");
			
			if($sql==0){
				$sql1=ejecutarConsulta_row("SELECT * FROM tbl_usuario WHERE correo_electronico='$correo_electronico'");
if($sql1==0){


	if($Repetir_Contraseña==$Contraseña){
			$rspta=$Usuario->_insertarusuario(strtoupper($Nombre_Usuario),$Contraseña,$correo_electronico,$id_rol,$Repetir_Contraseña,strtoupper($usu));
			echo $rspta ? "Usuario Registrado" : "Usuario no se pudo registrar";
}else{echo "Las Contraseñas son distintas ";}

}else{echo "El Correo ya existente ";}
		
		
		}else{echo "El Nombre de Usuario ya existente ";}
	
		
	
	
	
	
	}
		else if($_SESSION["se"]==1) {
			if($Repetir_Contraseña==$Contraseña){
			$rspta=$Usuario->_editarusuario(strtoupper($Nombre_Usuario),$id_rol,$correo_electronico,$id_usuario,$Contraseña,$Repetir_Contraseña);
			echo $rspta ? "El usuario se ha actualizado" : "El usuario no se pudo actualizar";
		}else{echo "Las Contraseñas son distintas ";}
		}else{echo "No tiene permiso de actulizar ";}
    break;

  
		break;
		case 'desactivar':
			$rspta=$Usuario->desactivar($id_usuario);
			echo $rspta ? "usuario Desactivada" : "usuario no se puede desactivar";
		break;

		case 'activar':
			$rspta=$Usuario->activar($id_usuario);
			echo $rspta ? "usuario activada" : "usuario no se puede activar";
		break;

    case 'mostrar':
		$rspta=$Usuario->mostrar($id_usuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    break;

    case 'listar':
		$rspta=$Usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>($reg->estado_usuario)?'<button class="btn btn-warning" id="mostra"  onclick="mostrar('.$reg->id_usuario.'), a();"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-danger"   onclick="desactivar('.$reg->id_usuario.')"><i class="fa fa-close"></i></button>':
				'<button class="btn btn-warning" id="mostra"   onclick="mostrar('.$reg->id_usuario.')"><i class="fa fa-pencil"></i></button>'.
				' <button class="btn btn-primary"   onclick="activar('.$reg->id_usuario.'), a();"><i class="fa fa-check"></i></button>',
				 "1"=>$reg-> id_usuario,
				 "2"=>$reg-> Nombre_Usuario,
                 "3"=>$reg-> correo_electronico,
                 "4"=>$reg-> rol,
                 "5"=>$reg-> fecha_creacion_u,
                 "6"=>$reg-> ultima_conexion,
				 "7"=>$reg-> estado_usuario?'<span class="label bg-green">Activado</span>':
				 '<span class="label bg-red">Desactivado</span>',
				 "8"=>$reg-> id_rol,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	
	case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();
		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $Usuario->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();
		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
		{
			array_push($valores, $per->idpermiso);
		}



		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw = in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
	break;
	case 'verificar':
		$logina=$_POST['Nombre_Usuario'];
	    $clavea=$_POST['Contraseña'];

	  

		$rspta=$Usuario->verificar($logina,$clavea);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['id']=$fetch->id_usuario;
			$_SESSION['Nombre_Usuario']=$fetch->Nombre_Usuario;
	
			
			$marcados = $Usuario->listarmarcados($fetch->id_usuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
    {
        array_push($valores, $per->idpermiso);
    }

//Determinamos los accesos del usuario
			
		in_array(1,$valores)?$_SESSION['Compras']=1:$_SESSION['Compras']=0;
		in_array(2,$valores)?$_SESSION['Ventas']=1:$_SESSION['Ventas']=0;
		in_array(3,$valores)?$_SESSION['Inventario']=1:$_SESSION['Inventario']=0;
		in_array(4,$valores)?$_SESSION['Producto']=1:$_SESSION['Producto']=0;
		in_array(5,$valores)?$_SESSION['Empresa']=1:$_SESSION['Empresa']=0;
		in_array(6,$valores)?$_SESSION['Mantenimientos']=1:$_SESSION['Mantenimientos']=0;
		in_array(7,$valores)?$_SESSION['Seguridad']=1:$_SESSION['Seguridad']=0;

		$marcados1 = $Usuario->rol($fetch->id_usuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores1=array();

			//Almacenamos los permisos marcados en el array
			while ($per1 = $marcados1->fetch_object())
    {
        array_push($valores1, $per1->id_rol);
    }

//Determinamos los accesos del usuario
			$_SESSION['rol']=in_array(1,$valores1);

		in_array(1,$valores1)?$_SESSION['Admin']=true:$_SESSION['Admin']=false;
		

		//******************************** */
		require_once('../config/Conexion.php');
		$NOMBRE=$_SESSION["Nombre_Usuario"];
$query1 = "SELECT id_rol FROM tbl_usuario where  Nombre_Usuario='$NOMBRE'";
$result1 = mysqli_query($conexion, $query1);

while($row = mysqli_fetch_array($result1)){

$id_rol= $row['id_rol'];



 }

$query1 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 1 ";
    $result1 = mysqli_query($conexion, $query1);

while($row1 = mysqli_fetch_array($result1)){

    $permiso_consulta_Producto = $row1['permiso_consulta'];
    $permiso_insercion_Producto =$row1['permiso_insercion'];
    $permiso_actualizacion_Producto =$row1['permiso_actualizacion'];
    $Mostar_Menu_Producto =$row1['Mostar_Menu'];


}
$query2 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 2 ";
    $result2 = mysqli_query($conexion, $query2);

while($row2 = mysqli_fetch_array($result2)){

    $permiso_consulta_Compras = $row2['permiso_consulta'];
    $permiso_insercion_Compras =$row2['permiso_insercion'];
    $permiso_actualizacion_Compras =$row2['permiso_actualizacion'];
    $Mostar_Menu_Compras =$row2['Mostar_Menu'];


}



$query4 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 4 ";
    $result4 = mysqli_query($conexion, $query4);

while($row4 = mysqli_fetch_array($result4)){

    $permiso_consultaInventario = $row4['permiso_consulta'];
    $permiso_insercionInventario =$row4['permiso_insercion'];
    $permiso_actualizacionInventario =$row4['permiso_actualizacion'];
    $Mostar_MenuInventario =$row4['Mostar_Menu'];


}
$query5 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 5 ";
    $result5 = mysqli_query($conexion, $query5);

while($row5 = mysqli_fetch_array($result5)){

    $permiso_consultaMantenimiento = $row5['permiso_consulta'];
    $permiso_insercionMantenimiento =$row5['permiso_insercion'];
    $permiso_actualizacionMantenimiento =$row5['permiso_actualizacion'];
    $Mostar_MenuMantenimiento =$row5['Mostar_Menu'];

}
$query6= "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 6 ";
    $result6 = mysqli_query($conexion, $query6);

while($row6 = mysqli_fetch_array($result6)){

    $permiso_consultaSeguridad = $row6['permiso_consulta'];
    $permiso_insercionSeguridad =$row6['permiso_insercion'];
    $permiso_actualizacionSeguridad =$row6['permiso_actualizacion'];
    $Mostar_MenuSeguridad =$row6['Mostar_Menu'];
   



}
$query7 = "SELECT * FROM tbl_roles_objeto where id_rol=  '$id_rol' and id_objeto = 7 ";
    $result7 = mysqli_query($conexion, $query7);

while($row7 = mysqli_fetch_array($result7)){

    $permiso_consultaventas= $row7['permiso_consulta'];
    $permiso_insercionventas =$row7['permiso_insercion'];
    $permiso_actualizacionventas =$row7['permiso_actualizacion'];
    $Mostar_Menuventas =$row7['Mostar_Menu'];
}


//Prodectos
if(empty($permiso_consulta_Producto) ){ $_SESSION['permiso_consulta_Producto']  = 0;}else{ $_SESSION['permiso_consulta_Producto']  = 1;};
if(empty( $permiso_insercion_Producto)){ $_SESSION['permiso_insercion_Producto']  = 0;} else{ $_SESSION['permiso_insercion_Producto']  = 1;};
if(empty( $permiso_actualizacion_Producto)){ $_SESSION['permiso_actualizacion_Producto']  = 0;}else{ $_SESSION['permiso_actualizacion_Producto']  = 1;} ;
if( empty( $Mostar_Menu_Producto) ){ $_SESSION['Mostar_Menu_Producto']  =0;}else{ $_SESSION['Mostar_Menu_Producto']  =1;};

//compras
if( empty($permiso_consulta_Compras) ){$_SESSION['permiso_consulta_Compras']  =0;}else{$_SESSION['permiso_consulta_Compras']  =1;};
if(empty( $permiso_insercion_Compras)){ $_SESSION['permiso_insercion_Compras']  = 0;}else{ $_SESSION['permiso_insercion_Compras']  = 1;} ;
if(empty( $permiso_actualizacion_Compras)){ $_SESSION['permiso_actualizacion_Compras']  = 0;}else{ $_SESSION['permiso_actualizacion_Compras']  = 1;} ;
if(empty( $Mostar_Menu_Compras) ){ $_SESSION['Mostar_Menu_Compras']  = 0;}else{ $_SESSION['Mostar_Menu_Compras']  = 1;};

 

//inventario 
 if(empty($permiso_consultaInventario)){$_SESSION['permiso_consultaInventario']  =0;}else{$_SESSION['permiso_consultaInventario']  =1;};
if(empty( $permiso_insercionInventario) ){$_SESSION['permiso_insercionInventario']  = 0;}else{$_SESSION['permiso_insercionInventario']  = 1;};
if(empty( $permiso_actualizacionInventario)){$_SESSION['permiso_actualizacionInventario']  = 0;}else{$_SESSION['permiso_actualizacionInventario']  = 1;} ;
if(empty( $Mostar_MenuInventario) ){$_SESSION['Mostar_MenuInventario']  = 0;}else{$_SESSION['Mostar_MenuInventario']  = 1;};

//manteniminetos
if(empty( $permiso_consultaMantenimiento)){$_SESSION['permiso_consultaMantenimiento']  =0;} else{$_SESSION['permiso_consultaMantenimiento']  =1;};
if(empty( $permiso_insercionMantenimiento )){$_SESSION['permiso_insercionMantenimiento']  = 0;}else{$_SESSION['permiso_insercionMantenimiento']  = 1;};
if(empty( $permiso_actualizacionMantenimiento)){$_SESSION['permiso_actualizacionMantenimiento']  = 0;} else{$_SESSION['permiso_actualizacionMantenimiento']  = 1;};
if(empty( $Mostar_MenuMantenimiento)){$_SESSION['Mostar_MenuMantenimiento']  = 0;}else{$_SESSION['Mostar_MenuMantenimiento']  = 1;} ;


//seguridad
 if(empty($permiso_consultaSeguridad )){$_SESSION['permiso_consultaSeguridad']  =0;}else{$_SESSION['permiso_consultaSeguridad']  =1;};
if( empty($permiso_insercionSeguridad)) {$_SESSION['permiso_insercionSeguridad']  = 0;}else{$_SESSION['permiso_insercionSeguridad']  = 1;};
if( empty($permiso_actualizacionSeguridad)){$_SESSION['permiso_actualizacionSeguridad']  = 0;}else{$_SESSION['permiso_actualizacionSeguridad']  = 1;} ;
 if(empty($Mostar_MenuSeguridad )){$_SESSION['Mostar_MenuSeguridad']  = 0;}else{$_SESSION['Mostar_MenuSeguridad']  = 1;};

//ventas
if(empty( $permiso_consultaventas) ){$_SESSION['permiso_consultaventas']  = 0;}else{$_SESSION['permiso_consultaventas']  = 1;};
if( empty($permiso_insercionventas)){$_SESSION['permiso_insercionSeguridad']  = 0;}else{$_SESSION['permiso_insercionSeguridad']  = 1;} ;
  if( empty($permiso_actualizacionventas) ){$_SESSION['permiso_actualizacionventas'] =0;}else{$_SESSION['permiso_actualizacionventas'] =1;};
if(empty($Mostar_Menuventas)){$_SESSION['Mostar_Menuventas'] =0;}else{$_SESSION['Mostar_Menuventas'] =1;} ;

	    }
		echo json_encode($fetch);
	break;
	case 'nuevo':
		$logina=$_POST['Nombre_Usuario'];
	   

	  

		$rspta=$Usuario->nuevo($logina);

		$fetch=$rspta->fetch_object();
		
	
		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	      
	        $_SESSION['Nombre_Usuario']=$fetch->Nombre_Usuario;
	       

	     

	    }
	
		echo json_encode($fetch);
	break;

	

	
	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;
	case 'intetos_1':
		$logina=strtoupper($_POST['Nombre_Usuario']);

		
		$rspta=$Usuario->intentos_1($logina);
		$fetch=$rspta->fetch_object();
		
	
		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	      
	        $_SESSION['Nombre_Usuario']=$fetch->Nombre_Usuario;
	       

	     

	    }
		
		echo json_encode($fetch);
	break;

	case 'parametro':
		$logina=strtoupper($_POST['Nombre_Usuario']);
		$rspta=$Usuario->intentos($logina);
		echo $rspta ? "" : "";
		
		

	break;
	
		

}

?>
