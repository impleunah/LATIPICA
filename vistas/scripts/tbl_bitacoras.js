var tabla;

//Función que se ejecuta al inicio 24 febrero 2020 Angelica
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{

	})
}

//Función limpiar
function limpiar()
{
	$("#id_bitacora").val("");
	$("#id_usuario").val("");
    $("#objeto").val("");
    $("#accion").val("");
	$("#descripcion").val("");
	$("#fecha").val("");
	$("#Antes").val("");
	$("#Despues").val("");
   
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
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
					url: '../ajax/tbl_bitacoras_envio.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "DESC" ]]//Ordenar (columna,orden)
	}).DataTable();
}

//Funcion mostrar datos
function mostrar(id_bitacora)
{
	$.post("../ajax/tbl_bitacoras_envio.php?op=mostrar",{id_bitacora: id_bitacora}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#id_bitacora").val(data.id_bitacora);
		$("#id_usuario").val(data.id_usuario);
        $("#objeto").val(data.objeto);
        $("#accion").val(data.accion);
		$("#descripcion").val(data.descripcion);
		$("#fecha").val(data.fecha);
		$("#Antes").val(data.Antes);
	    $("#Despues").val(data.Despues);
 	})
}


init();