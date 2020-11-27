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
	$("#id_reg_facturacion").val ("");
 $("#cai").val ("");
$("#fecha_inicio").val ("");
$("#fecha_limite").val ("");
$("#rango_desde").val ("");
$("#rango_hasta").val ("");
$("#punto_emision").val ("");
$("#establecimiento").val ("");
$("#tipo_documento").val ("");
$("#secuencia").val ("");
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
					url: '../ajax/reg_cai.php?op=listar',
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
		url: "../ajax/reg_cai.php?op=guardaryeditar",
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
function mostrar(id_reg_facturacion)
{
	$.post("../ajax/reg_cai.php?op=mostrar",{id_reg_facturacion: id_reg_facturacion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#id_reg_facturacion").val (data.id_reg_facturacion)
     $("#cai").val (data.cai);
     $("#fecha_inicio").val(data.fecha_inicio);
     $("#fecha_limite").val(data.fecha_limite);
     $("#rango_desde").val(data.rango_desde);
     $("#rango_hasta").val(data.rango_hasta);
     $("#punto_emision").val(data.punto_emision);
     $("#establecimiento").val(data.establecimiento);
     $("#tipo_documento").val(data.tipo_documento);
     $("#secuencia").val(data.secuencia);
     $("#estado").val(data.estado);
    })
}
// desactivar 
function desactivar(id_reg_facturacion)
{
	bootbox.confirm("¿Está Seguro de desactivar el Cai?", function(result){
		if(result)
        {
        	$.post("../ajax/reg_cai1.php?op=desactivar", {id_reg_facturacion : id_reg_facturacion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_reg_facturacion)
{
	bootbox.confirm("¿Está Seguro de activar el Cai?", function(result){
		if(result)
        {
        	$.post("../ajax/reg_cai1.php?op=activar", {id_reg_facturacion : id_reg_facturacion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();