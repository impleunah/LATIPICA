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
$("#id_empresa").val ("");
$("#id_producto").val ("");
$("#id_tipo_pago").val ("");
$("#cantidad").val ("");
$("#costo_unitario_venta").val ("");
$("#costo_unitario_compra").val ("");
$("#fecha").val ("");
$("#mes").val ("");
$("#año").val ("");



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
					url: '../ajax/tbl_inventario_producto_envio.php?op=listar',
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
		url: "../ajax/tbl_inventario_producto_envio.php?op=guardaryeditar",
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
function mostrar(id_inventarioproducto)
{
	$.post("../ajax/tbl_inventario_producto_envio.php?op=mostrar",{id_inventarioproducto: id_inventarioproducto}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
        $("#id_empresa").val (data.id_empresa);
        $("#id_producto").val (data.id_producto);
        $("#id_operacion").val (data.id_operacion);
		$("#cantidad").val (data.cantidad);
		$("#costo_unitario_venta").val (data.costo_unitario_venta);
		$("#costo_unitario_compra").val (data.costo_unitario_compra);
		$("#fecha").val (data.fecha);
		$("#mes").val (data.mes);
		$("#año").val (data.año);
		$("#estado").val (data.estado);




      
	 });
	
}

init ();