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
	$("#id_cliente").val ("");
 $("#nombre").val ("");
$("#correo").val ("");
$("#RTN").val ("");
//$("#telefono").val ("");
//$("#direccion").val ("");
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
					url: '../ajax/clientes.php?op=listar',
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
		url: "../ajax/clientes.php?op=guardaryeditar",
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
function agregartelefono(value){
	var numtel= Number($('#numtel').val());
	numtel+=1;
	if(numtel>5){
		alert('No se pueden agregar mas de 5 Teléfonos');
		return false;
	}else{
		var html='<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 divTemp">';
		html+=' <label>Telefono '+numtel+':</label>';
		html+=' <input type="text" class="form-control" name="telefono_'+numtel+'"  id="telefono_'+numtel+'" maxlength="9" placeholder="Telefono '+numtel+'" required onkeypress="return validaNumericos(event)">';
		html+='</div>';
		$('.divTel').append(html);
		$('#numtel').val(numtel);

	}
	
}

//Funcion mostrar invenatario
function mostrar(id_cliente)
{
	$.post("../ajax/clientes.php?op=mostrar",{id_cliente :id_cliente }, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	 $("#id_cliente ").val (data.id_cliente );
     $("#nombre").val (data.nombre);
     $("#correo").val(data.correo);
     $("#RTN").val(data.RTN);
     //$("#telefono").val(data.telefono);
     //$("#direccion").val(data.direccion);
     $("#estado").val(data.estado);
    })
}
// desactivar 
function desactivar(id_cliente)
{
	bootbox.confirm("¿Está Seguro de desactivar el Cliente??", function(result){
		if(result)
        {
        	$.post("../ajax/clientes.php?op=desactivar", {id_cliente  : id_cliente }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_cliente)
{
	bootbox.confirm("¿Está Seguro de activar el Cliente?", function(result){
		if(result)
        {
        	$.post("../ajax/clientes.php?op=activar", {id_cliente : id_cliente }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
function eliminar (id_cliente)
{
	bootbox.confirm("¿Está Seguro de eliminar  el Cliente??", function(result){
		if(result)
        {
        	$.post("../ajax/clientes.php?op=eliminar", {id_cliente  : id_cliente }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();