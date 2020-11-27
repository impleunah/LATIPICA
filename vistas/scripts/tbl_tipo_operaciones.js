var tabla;

//Función que se ejecuta al inicio 26 febrero 2020 Karla
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
	$("#id_tipo_operaciones").val("");
	$("#tipo_operacion").val("");
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
		$("#boton").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
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
					url: '../ajax/tbl_tipo_operaciones_envio.php?op=listar',
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
		url: "../ajax/tbl_tipo_operaciones_envio.php?op=guardaryeditar",
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

//Funcion mostrar
function mostrar(id_tipo_operaciones)
{
	$.post("../ajax/tbl_tipo_operaciones_envio.php?op=mostrar",{id_tipo_operaciones: id_tipo_operaciones}, function(data,status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#tipo_operacion").val(data.tipo_operacion);
		$("#estado").val(data.estado);
		$("#id_tipo_operaciones").val(data.id_tipo_operaciones);
		
 	})
}
function desactivar(id_tipo_operaciones)
{
	bootbox.confirm("¿Está Seguro de desactivar la operacion?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_tipo_operaciones_envio.php?op=desactivar", {id_tipo_operaciones : id_tipo_operaciones}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_tipo_operaciones)
{
	bootbox.confirm("¿Está Seguro de activar la operacion?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_tipo_operaciones_envio.php?op=activar", {id_tipo_operaciones : id_tipo_operaciones}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();