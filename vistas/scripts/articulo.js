var tabla;

//Función que se ejecuta al inicio..
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	
	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lArticulos').addClass("active");
}


//Función limpiar
function limpiar()
{
	$("#idarticulo").val("");
	$("#nombre").val("");
	$("#descripcion1").val("");
	$("#id_presentacion").val("");
	$("#descripcion").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
	$("#condicion").val("");
	$("#codigo").val("");
	$("#precio_venta").val("");
	$("#fecha_fabricacion").val("");
	$("#fecha_expiracion").val("");
	
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
					url: '../ajax/articulo_l.php?op=listar',
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
		url: "../ajax/articulo.php?op=guardaryeditar",
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

function mostrar(idarticulo)
{
	$.post("../ajax/articulo.php?op=mostrar",{idarticulo : idarticulo}, function(data, status)
	{
		data = JSON.parse(data);		 
		mostrarform(true);
		$("#idarticulo").val(data.idarticulo);
		$("#nombre").val(data.nombre);
		$("#descripcion1").val(data.descripcion1);
		$("#id_presentacion").val(data.id_presentacion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#codigo").val(data.codigo);
		$("#precio_venta").val(data.precio_venta);
		$("#fecha_fabricacion").val(data.fecha_fabricacion);
	    $("#fecha_expiracion").val(data.fecha_expiracion);
		generarbarcode();
 	})
}

//Función para desactivar registros
function desactivar(idarticulo)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/articulo.php?op=desactivar", {idarticulo : idarticulo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
function eliminar(){
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result==true)
        {
        
			$("#imagenmuestra").attr("src","");
			$("#imagenactual").val("");
			$("#print").hide();
			$("#imagen").val("");
			
	        
		}
	})

}

//Función para activar registros
function activar(idarticulo)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/articulo.php?op=activar", {idarticulo : idarticulo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//función para generar el código de barras
function generarbarcode()
{
	codigo=$("#codigo").val();
	JsBarcode("#barcode", codigo);
	$("#print").show();
}

//Función para imprimir el Código de barras
function imprimir()
{
	$("#print").printArea();
}

init();