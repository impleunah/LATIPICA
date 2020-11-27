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
 
$("#idarticulo").val ("");
$("#libra").val ("");
$("#conversion").val ("");
$("#gramos").val ("");
$("#unidades").val ("");
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
	listarArticulos();
		
	listar();
	$("#btnAgregarcli").show();
	$("#btnAgregarArt").show()
	
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
					url: '../ajax/tbl_inventario.php?op=listar',
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
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "ASC" ]]//Ordenar (columna,orden)
	}).DataTable();
}

//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); 
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/tbl_inventario.php?op=guardaryeditar",
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
function mostrar(id_inventario)
{
	$.post("../ajax/tbl_inventario.php?op=mostrar",{id_inventario: id_inventario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#id_inventario").val(data.id_inventario);
		$("#idarticulo").val(data.idarticulo);
        $("#libra").val(data.libr);
        $("#conversion").val(data.conversio);
		$("#gramos").val(data.gramo);
		$("#unidades").val(data.unidades);
	 });
	
}

function agregarprod(idarticulo,nombre)
{
	document.formulario.id_Producto.value =idarticulo;
	document.formulario.idarticulo.value = nombre;
}



function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

//Función para desactivar registros
function desactivar(id_inventario)
{
	bootbox.confirm("¿Está Seguro de desactivar?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_inventario.php?op=desactivar", {id_inventario: id_inventario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_inventario)
{
	bootbox.confirm("¿Está Seguro de activar ?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_inventario.php?op=activar", {id_inventario: id_inventario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init ();