var tabla;

//Función que se ejecuta al inicio 26 febrero 2020 Karla
function init(){
	listar();
	mostrarform(false);


	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#id_compras").val("");
	$("#id_proveedo").val("");
	$("#pro").val("");
	$("#Cantidad").val(""); 
	$("#id_presentacion").val("");
	$("#descripcion").val("");	
	$("#Precio").val("");
	$("#id_proveedor").val("");
	$("#idarticulo").val("");
	$("#total").val("");
	
	
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
		listarArticulos();
		
		listarClientes();
		$("#btnAgregarcli").show();
		$("#btnAgregarArt").show();
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
//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tblarticulos').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url:  '../ajax/prove.php?op=listar_pro',
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

function listarArticulo()
{
	tabla=$('#tblartidsaculo').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url:  '../ajax/prove.php?op=listar',
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
//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [ ],
		"ajax":
				{
					url: '../ajax/ingresos.php?op=listar',
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
		url: "../ajax/ingresos.php?op=guardaryeditar",
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
	listar()
}

//Funcion mostrar
function mostrar(id_compras)
{
	$.post("../ajax/ingresos.php?op=mostrar",{id_compras : id_compras}, function(data,status)
	{
		data = JSON.parse(data);		
		mostrarform(true);


		$("#id_compras").val(data.id_compras);
		$("#id_proveedo").val(data.Nombre);
		$("#pro").val(data.nombre);
		$("#idarticulo").val(data.idarticulo);
		$("#id_proveedor").val(data.id_proveedor);
		$("#Cantidad").val(data.Cantidad); 
		$("#id_presentacion").val(data.id_presentacion);
		$("#descripcion").val(data.presentacion);
		$("#Precio").val(data.Precio);


		
 	})
}


function listarClientes()
{
	tabla=$('#tblclientes').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/ingresos.php?op=proveedores',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
function mostrar_pr(id_proveedor,Nombre)
{
	
	
	$("#id_proveed").val(Nombre);
	$("#id_proveedor").val(id_proveedor);
	document.formulario.id_proveedo.value = Nombre;
	document.formulario.id_proveedor.value = id_proveedor;

}

function agregarprod(idarticulo,nombre)
{
  $("#pro").val(nombre)
  $("#idarticulo").val(idarticulo)

}
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}



function desactivar(id_compras)
{
	bootbox.confirm("¿Está Seguro de desactivar el compra?", function(result){
		if(result)
        {
        	$.post("../ajax/ingresos.php?op=desactivar", {id_compras : id_compras}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_compras)
{
	bootbox.confirm("¿Está Seguro de activar compra?", function(result){
		if(result)
        {
        	$.post("../ajax/ingresos.php?op=activar", {id_compras : id_compras}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();