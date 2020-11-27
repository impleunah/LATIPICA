var tabla;

// funcion que se ejecuta al inicio 

function init (){
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

// limpiar

function limpiar ()
{
$("#id_usuario").val ("");
$("#id_pregunta").val ("");
$("#respuesta").val ("");
$("#estado").val ("");
}

//mostrar formulario


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
 else{
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
	$("#btnagregar").show();
	$("#boton").show();
 } 

}


// funcion cancelar formulario
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//funcion listar

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
					url: '../ajax/tbl_preguntas_usuario.php?op=listar',
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
	e.preventDefault(); 
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tbl_preguntas_usuario.php?op=guardaryeditar",
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

//Funcion mostrar pregunta
function mostrar(id_pregunta_usuario)
{
	$.post("../ajax/tbl_preguntas_usuario.php?op=mostrar",{id_pregunta_usuario : id_pregunta_usuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#id_pregunta_usuario").val(data.id_pregunta_usuario)
		$("#id_usuario").val(data.id_usuario);

		$("#id_pregunta").val(data.id_pregunta);
		$("#estado").val(data.estado);
		
		 

	 });
}

//Función para desactivar registros
function desactivar(id_pregunta_usuario)
{
	bootbox.confirm("¿Está Seguro de desactivar?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_preguntas_usuario.php?op=desactivar", {id_pregunta_usuario : id_pregunta_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_pregunta_usuario)
{
	bootbox.confirm("¿Está Seguro de activar ?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_preguntas_usuario.php?op=activar", {id_pregunta_usuario:id_pregunta_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init ();