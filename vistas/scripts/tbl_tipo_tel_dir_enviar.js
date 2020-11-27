var tabla;

//Función que se ejecuta al inicio
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
    $("#id_telefono_direccion").val("");
	$("#id_cliente").val("");
	$("#Tipo_Telefono_Direccion").val("");
    $("#tipo").val("");
    $("#Descripcion").val("");
    $("#Estado").val("");
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
					url: '../ajax/tbl_tipo_tel_dir_enviar.php?op=listar',
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
		url: "../ajax/tbl_tipo_tel_dir_enviar.php?op=guardaryeditar",
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

function mostrar(id_telefono_direccion)
{
	$.post("../ajax/tbl_tipo_tel_dir_enviar.php?op=mostrar",{id_telefono_direccion : id_telefono_direccion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		    $("#id_telefono_direccion").val(data.id_telefono_direccion);
		    $("#id_cliente").val(data.id_cliente);
             $("#Tipo_Telefono_Direccion").val(data.Tipo_Telefono_Direccion);
             $("#tipo").val(data.tipo);
            $("#Descripcion").val(data.Descripcion);
            $("#Estado").val(data.Estado);
 		

 	})
}

//Función para desactivar registros
function desactivar(id_telefono_direccion)
{
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_tipo_tel_dir_enviar.php?op=desactivar", {id_telefono_direccion: id_telefono_direccion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_telefono_direccion)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_tipo_tel_dir_enviar.php?op=activar", {id_telefono_direccion : id_telefono_direccion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();