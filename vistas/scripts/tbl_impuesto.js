var tabla;

//Función que se ejecuta a
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
	$("#id_impuesto").val("");
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


//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tbl_impuesto.php?op=guardaryeditar",
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
function mostrar(id_impuesto)
{
	$.post("../ajax/tbl_impuesto.php?op=mostrar",{id_impuesto: id_impuesto}, function(data,status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#id_impuesto").val(data.id_impuesto);
		$("#descripcion").val(data.descripcion*100);
		$("#estado").val(data.estado);
		
		
 	})
}
function desactivar(id_impuesto)
{
	bootbox.confirm("¿Está Seguro de desactivar el impuesto?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_impuesto.php?op=desactivar", {id_impuesto : id_impuesto}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_impuesto)
{
	bootbox.confirm("¿Está Seguro de activar el impuesto?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_impuesto.php?op=activar", {id_impuesto : id_impuesto }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
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
					url: '../ajax/tbl_impuesto.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//numero de tendra la paginacion
	    "order": [[ 1, "DESC" ]]//Ordenar (columna,orden)
	}).DataTable();
}

init();