var tabla;

//Función que se ejecuta al inicio 22 febrero 2020 Karla
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
	$("#id_empresa").val("");
	$("#id_operacion").val("");
	$("#RTN").val("");
	$("#razon_social").val("");
	$("#nombre_comercial").val("");	
	$("#domicilio_1").val("");			
	$("#correo_1").val("");	
	$("#telefono_1").val("");
	$('#numDomicilos').val(1);
  	$('#numCorreos').val(1);
  	$('#numtel').val(1);
  	$('.divTemp').remove();
	
}


//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$('divTemp').empty();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#boton").hide();

	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$('divTemp').empty();
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
					url: '../ajax/tbl_empresa_envio.php?op=listar',
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
		url: "../ajax/tbl_empresa_envio.php?op=guardaryeditar",
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

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function agregarDomicilio(value){
	var numDomicilos= Number($('#numDomicilos').val());
	numDomicilos+=1;
	if(numDomicilos>2){
		alert('No se pueden agregar mas de 2 Domicilios');
		return false;
	}else{
		var html='	<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 divTemp">';	
		html+=' <label>Domicilio '+numDomicilos+':</label>';
		html+=' <input type="text" class="form-control " name="domicilio_'+numDomicilos+'" id="domicilio '+numDomicilos+'" maxlength="60" value="'+value+'" placeholder="Domicilio '+numDomicilos+'" required >';
		html+='</div>';	
		$('.divDomicilio').append(html);
		$('#numDomicilos').val(numDomicilos);

	}
	
}
function agregarcorreo(value){
	var numCorreos= Number($('#numCorreos').val());
	numCorreos+=1;
	if(numCorreos>2){
		alert('No se pueden agregar mas de 2 Correos');
		return false;
	}else{
		var html='	<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 divTemp">';
		html+=' <label>Correo '+numCorreos+':</label>';
		html+=' <input type="email" class="form-control" name="correo_'+numCorreos+'" id="Correo '+numCorreos+'" maxlength="50" value="'+value+'" placeholder="Correo '+numCorreos+'" required>';
		html+='</div>';
		$('.divCorreos').append(html);
		$('#numCorreos').val(numCorreos);

	}
	
}

function agregartelefono(value){
	var numtel= Number($('#numtel').val());
	numtel+=1;
	if(numtel>2){
		alert('No se pueden agregar mas de 2 Teléfonos');
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
//Funcion mostrar
function mostrar(id_empresa)
{
	$.post("../ajax/tbl_empresa_envio.php?op=mostrar",{id_empresa: id_empresa}, function(data, status)
	{
		data = JSON.parse(data);	
		console.log(data);	
		mostrarform(true);
		
		$("#id_empresa").val(data.id_empresa);
		$("#id_tipo_operaciones").val(data.id_tipo_operaciones);
		$("#RTN").val(data.RTN);
		$("#razon_social").val(data.razon_social);
		$("#nombre_comercial").val(data.nombre_comercial);
		$("#id_operacion").val(data.id_operacion);
		$('divTemp').empty();
		$('#numDomicilos').val(1);
	  	$('#numCorreos').val(1);
	  	$('#numtel').val(1);
		$("#domicilio_1").val(data.domicilio_1);


		if(data.domicilio_2){
			agregarDomicilio(data.domicilio_2);
		}	
			
		$("#correo_1").val(data.correo_1);	
		if(data.correo_2){
			agregarcorreo(data.correo_2);
		}	
		$("#telefono_1").val(data.telefono_1);
		
		if(data.telefono_2 >1){
			agregartelefono(data.telefono_2);
			$("#telefono_2").val(data.telefono_2);
		}	
		
		
	
 	})
}

function mostrar_p(id_empresa)
{
	$.post("../ajax/tbl_empresa_envio.php?op=mostrar_p",{id_empresa: id_empresa}, function(data, status)
	{
		data = JSON.parse(data);	
		console.log(data);	

		
		$("#id_empresa_p").val(data.id_empresa);
		$("#id_tipo_operaciones_p").val(data.id_tipo_operaciones);
		$("#RTN_P").val(data.RTN);
		$("#razon_social_p").val(data.razon_social);
		$("#nombre_comercial_p").val(data.nombre_comercial);
		$("#id_operacion_p").val(data.descripcion);
		$('divTemp_p').empty();
		$('#numDomicilos_p').val(1);
	  	$('#numCorreos_p').val(1);
	  	$('#numtel_p').val(1);
		$("#domicilio_p_1").val(data.domicilio_1);
		$("#telefono_p_2").val(data.telefono_2);
		$("#domicilio_p_2").val(data.domicilio_2);
	
			
		$("#correo_p_1").val(data.correo_1);	
		$("#correo_p_2").val(data.correo_2);	
		
		$("#telefono_p_1").val(data.telefono_1);
		
		
		
	
 	})
}
function desactivar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de desactivar empresa?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_empresa_envio.php?op=desactivar", {id_empresa : id_empresa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_empresa)
{
	bootbox.confirm("¿Está Seguro de activar empresa?", function(result){
		if(result)
        {
        	$.post("../ajax/tbl_empresa_envio.php?op=activar", {id_empresa : id_empresa }, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();