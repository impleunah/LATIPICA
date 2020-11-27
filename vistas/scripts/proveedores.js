var tabla;

// funcion que se ejecuta al inicio 

function init(){
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
	$("#id_proveedor").val ("");
 $("#nombre").val ("");
$("#correo").val ("");
$("#RTN").val ("");
$("#telefono").val ("");
$("#direccion").val ("");
$("#estado").val ("");
}

//mostrar formulario


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
					url: '../ajax/tbl_proveedores.php?op=listar',
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
		url: "../ajax/tbl_proveedores.php?op=guardaryeditar",
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

//Funcion mostrar invenatario
function mostrar(id_proveedor)
{
	$.post("../ajax/tbl_proveedores.php?op=mostrar",{id_proveedor: id_proveedor}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	 $("#id_proveedor").val (data.id_proveedor);
     $("#nombre").val (data.Nombre);
     $("#correo").val(data.correo);
     $("#RTN").val(data.RTN);
     $("#telefono").val(data.telefono);
     $("#direccion").val(data.direccion);
     $("#estado").val(data.estado);
    })
}
// desactivar 
function desactivar(id_proveedor)
{
	bootbox.confirm("¿Está Seguro de desactivar el Proveedor ?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_proveedores.php?op=desactivar", {id_proveedor : id_proveedor}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_proveedor)
{
	bootbox.confirm("¿Está Seguro de activar el Proveedor?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_proveedores.php?op=activar", {id_proveedor : id_proveedor}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();