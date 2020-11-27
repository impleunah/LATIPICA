var tabla;

//Función que se ejecuta al inicio 23 febrero 2020 Raul - Angelica
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	$.post("../ajax/tbl_usuarios_envio.php?op=permisos&id=",function(r){
		$("#permisos").html(r);
	});

}

//Función limpiar
function limpiar()
{
	$("#id_usuario").val("");
	$("#Nombre_Usuario").val("");
	$("#rol_1").val("");
    $("#correo_electronico").val("");
	$("#estado_usuario").val("");
    $("#fecha_creacion_u").val("");
    $("#ultima_conexion").val("");
	$("#Contraseña").val("");
	$("#Repetir_Contraseña").val("");
	
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#boton").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		$("#boton").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		],
		"ajax":
				{
					url: '../ajax/tbl_usuarios_envio.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 1, "DESC" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tbl_usuarios_envio.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

//Funcion mostrar , si muestra error fue angelica 23 de febrero 2020
function mostrar(id_usuario)
{
	$.post("../ajax/tbl_usuarios_envio.php?op=mostrar",{id_usuario : id_usuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#id_usuario").val(data.id_usuario);
		$("#Nombre_Usuario").val(data.Nombre_Usuario);
		$("#rol_1").val(data.id_rol);	
        $("#correo_electronico").val(data.correo_electronico);
		
         
         

	 });
	 $.post("../ajax/tbl_usuarios_envio.php?op=permisos&id="+id_usuario,function(r){
		$("#permisos").html(r);
	});
}
//Función para desactivar registros
function desactivar(id_usuario)
{
	bootbox.confirm("¿Está Seguro de desactivar la  usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_usuarios_envio.php?op=desactivar", {id_usuario : id_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_usuario)
{
	bootbox.confirm("¿Está Seguro de activar la usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_usuarios_envio.php?op=activar", {id_usuario : id_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();