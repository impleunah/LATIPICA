var tabla;


//Función que se ejecuta al inicio 24 febrero 2020  Angelic
//Función que se ejecuta al inicio 24 febrero 2020 Angelica

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar, para cada dato o variable del formulario 24 febrero
function limpiar()
{
    $("#id_objeto").val("");
    $("#objeto").val("");
	$("#tipo_objeto").val("");
    $("#descripcion").val("");
    $("#fecha_creacion").val("");
	$("#creado_por").val("");
    $("#fecha_modificacion").val("");
	$("#modificado_por").val("");
	$("#estado").val("");
	
	
}
//Función mostrar resgistros formulario

//Función limpiar
function limpiar()
{
	$("#id_objeto").val("");
	$("#objeto").val("");
    $("#tipo_objeto").val("");
    $("#descripcion").val("");
	$("#fecha_creacion").val("");
    $("#creado_por").val("");
    $("#fecha_modificacion").val("");
	$("#modificado_por").val("");
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
					url: '../ajax/tbl_pantallas_envio.php?op=listar',
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
	console.log(formData);

	$.ajax({
		url: "../ajax/tbl_pantallas_envio.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

		success: function(datos)
	    {          
		console.log(datos);

	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

//Funcion mostrar datos
function mostrar(id_objeto)
{
	$.post("../ajax/tbl_pantallas_envio.php?op=mostrar",{id_objeto: id_objeto}, function(data, status)

	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#pan").val(data.id_objeto);
		$("#id_objeto").val(data.id_objeto);
		$("#objeto").val(data.objeto);
        $("#tipo_objeto").val(data.tipo_objeto);	
        $("#descripcion").val(data.descripcion);
        $("#fecha_creacion").val(data.fecha_creacion);
        $("#creado_por").val(data.creado_por);
        $("#fecha_modificacion").val(data.fecha_modificacion);
		$("#modificado_por").val(data.modificado_por);
		$("#estado").val(data.estado);
         
	

 	})
}

//Función para desactivar registros
function desactivar(id_objeto)
{
	bootbox.confirm("¿Está Seguro de desactivar la Pantalla?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_pantallas_envio.php?op=desactivar", {id_objeto : id_objeto}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_objeto)
{
	bootbox.confirm("¿Está Seguro de activar la Pantalla?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_pantallas_envio.php?op=activar", {id_objeto : id_objeto}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();