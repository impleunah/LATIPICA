var tabla;

//Función que se ejecuta al inicio
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
    $("#id_parametro").val("");
    $("#id_usuario").val("");
	$("#valor").val("");
	$("#descripcion").val("");
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
					url: '../ajax/tbl_parametros.php?op=listar',
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
		url: "../ajax/tbl_parametros.php?op=guardaryeditar",
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
function mostrar(id_parametro)
{
	$.post("../ajax/tbl_parametros.php?op=mostrar",{id_parametro : id_parametro}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#id_parametro").val(data.id_parametro);
        $("#id_usuario").val(data.Parametro);
        $("#valor").val(data.valor);
		$("#descripcion").val(data.descripcion);
		$("#estado").val(data.estado);

 	})
}
//Función para desactivar registros
function desactivar(id_parametro)
{
	bootbox.confirm("¿Está Seguro de desactivar el parametro?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_parametros.php.php?op=desactivar", {id_parametro : id_parametro}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_parametro)
{
	bootbox.confirm("¿Está Seguro de activar el parametro?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_parametros.php?op=activar", {id_parametro : id_parametro}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();