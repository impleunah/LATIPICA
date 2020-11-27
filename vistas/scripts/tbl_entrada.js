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
$("#id_entrada").val("");
$("#idarticulo").val (""); 
$("#entrada").val ("");
$("#motivo").val ("");

}

//mostrar formulario
function limpiar ()
{
	$("#id_entrada").val("");
    $("#idarticulo").val (""); 
    $("#entrada").val ("");
    $("#motivo").val ("");
}


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
					url: '../ajax/entrada.php?op=listar',
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
		url: "../ajax/entrada.php?op=guardaryeditar",
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
function mostrar(id_entrada)
{
	$.post("../ajax/entrada.php?op=mostrar",{id_entrada : id_entrada}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

        $("#id_entrada").val(data.id_entrada);
        $("#idarticulo").val(data.idarticulo);
        $("#entrada").val(data.entrada);
        $("#motivo").val(data.motivo);
		 

	});
}
init ();