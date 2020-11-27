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
	$("#id_presentacion").val("");
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
					url: '../ajax/presen.php?op=listar',
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
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tbl_presentacion.php?op=guardaryeditar",
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
function mostrar(id_presentacion)
{
	$.post("../ajax/tbl_presentacion.php?op=mostrar",{id_presentacion: id_presentacion}, function(data,status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#descripcion").val(data.descripcion);
		$("#estado").val(data.estado);
		$("#id_presentacion").val(data.id_presentacion);
		
 	})
}
function desactivar(id_presentacion)
{
	bootbox.confirm("¿Está Seguro de desactivar la presentacion?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_presentacion.php?op=desactivar", {id_presentacion : id_presentacion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_presentacion)
{
	bootbox.confirm("¿Está Seguro de activar la presentacion?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_presentacion.php?op=activar", {id_presentacion : id_presentacion }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();