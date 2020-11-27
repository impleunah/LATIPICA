var tabla;

//Función que se ejecuta al inicio 25 febrero 2020 Karla
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#id_permiso").val("");
	$("#rol_1").val("");
	$("#Mostar_Menu").val("");
	$("#pantalla").val("");
    $("#permiso_insercion").val("");
	$("#permiso_consulta").val("");
    $("#permiso_actualizacion").val("");
	$("#fecha_creacion").val("");
	$("#ingresar").val("");
	$("#estado").val("");
	
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
					url: '../ajax/tbl_permisos_envio.php?op=listar',
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
		url: "../ajax/tbl_permisos_envio.php?op=guardaryeditar",
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

//Función para desactivar registros
function desactivar(id_permiso)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_permisos_envio.php?op=desactivar", {id_permiso : id_permiso}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_permiso)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_permisos_envio.php?op=activar", {id_permiso : id_permiso}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Funcion mostrar , si muestra error fue angelica 23 de febrero 2020
function mostrar(id_permiso )
{
	$.post("../ajax/tbl_permisos_envio.php?op=mostrar",{id_permiso : id_permiso}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#id_permiso").val(data.id_permiso);
		$("#rol_1").val(data.id_rol);

		
		$("#Mostar_Menu").val(data.Mostar_Menu);
		$("#pantalla").val(data.id_objeto);
		$("#permiso_insercion").val(data.permiso_insercion);
        $("#permiso_consulta").val(data.permiso_consulta);
		$("#permiso_actualizacion").val(data.permiso_actualizacion);
		$("#igresar").val(data.pantalla);
		$("#estado").val(data.estado);
		
         
         

 	})
}




init();