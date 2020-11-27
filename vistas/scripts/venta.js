
var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
}

//Función limpiar
function limpiar()
{
	$("#id_cliente").val("");
	$("#cliente").val("");
	$("#RTN").val("");
	$("#correo").val("");
	
	$("#sub_total").html("0");
	$("#total1").val("0");
	$("#descuento").html("0");
	$("#descuento2").val("0");
	$("#vneta").html("0");
	$("#vneta1").val("0");
	$("#iva").html("0");
	$("#iva1").val("0");
	$("#total").val("0");
	$("#total_venta").val("0");
	$("#rau").hide()

	$("#total_venta").val("0");
	$(".filas").remove();
	$("#total").html("0");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);

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
		listarArticulos();
		listarClientes();
		$("#boton").hide();
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		$("#btnAgregarcli").show();
		detalles=0;
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
	tabla=$('#tbllistados').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		         
		            
		        ],
		"ajax":
				{
					url: '../ajax/ventas1.php?op=lista',
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
					url:  '../ajax/pro.php?op=listar_p',
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
					url: '../ajax/clientes.php?op=listar_v',
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
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/venta_1.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}

function mostrar(idventa)
{
	$.post("../ajax/venta_1.php?op=mostrar",{idventa : idventa}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#id_cliente").val(data.id_cliente);
		$("#cliente").val(data.cliente);
		$("#RTN").val(data.RTN);
		$("#correo").val(data.correo);
		$("#iva").val(data.iva);
		$("#id_tipo_pag").val(data.id_tipo_pago);
		$("#num_factura").val(data.num_factura);
		$("#id_reg_facturacion").val(data.id_reg_facturacion);
		$("#cai").val(data.cai);
		$("#fecha").val(data.fecha);
		$("#descuento1").val(data.descuento);
		$("#idventa").val(data.idventa);
		

		//Ocultar y mostrar los botones
		//$("#btnGuardar").hide();
		//$("#btnCancelar").show();

		$("#btnAgregarArt").hide();
		$("#btnAgregarcli").hide();
 	});

 	$.post("../ajax/venta_1.php?op=listarDetalle&id="+idventa,function(r){
	        $("#detalles").html(r);
	});	
}

//Función para anular registros
function anular(idventa)
{
	bootbox.confirm("¿Está Seguro de anular la venta?", function(result){
		if(result)
        {
        	$.post("../ajax/venta_1.php?op=anular", {idventa : idventa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
//agregar al detalle de la factura
document.getElementById("rau").style.display= 'none';
function agregarDetalle(idarticulo,articulo,precio_venta,stock)
  {
	  var cantidad=1;
	  var cont=0;
	 

    if (idarticulo!="")
    {
		
		var subtotal=cantidad*precio_venta;
		//var IVA=0;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')"><i class="fa fa-trash"></i></button></td>'+
    	'<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
		'<td><input type="number" name="cantidad[]" align="right" id="cantidad[]" min="1" max="'+stock+'" value="'+cantidad+'"></td>'+
		'<td><input type="hidden" name="stock" value="'+stock+'">'+stock+'</td>'+
		'<td align="right"><input type="hidden"  name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td>'+
    	'<td align="right"><span name="subtotal[]" align="right" id="subtotal[]'+cont+'">'+subtotal+'</span></td>'+
		'<td></td>'+
		'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
		modificarSubototales();
		document.getElementById("rau").style.display= 'block';
		
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
	}
	
  }
// Calculos 
  function modificarSubototales()
  {
	  
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_venta[]");
   // var iva = document.getElementsByName("IVA[]");
	var sub = document.getElementsByName("subtotal[]");

	if(cant!=""){
    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	//var inpD=iva[i];
    	var inpS=sub[i];

    	inpS.value=(inpC.value * inpP.value);//-//inpD.value ;
    	document.getElementsByName("subtotal[]")[i].innerHTML = inpS.value;
	}
	
    calcularTotales();
			}
  				}
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal[]");
	  var total1 = 0.0;
	 

  	for (var i = 0; i <sub.length; i++) {
		

		var isv = document.getElementById('v_Impuesto'),
    		isv1= isv.value;
	
		total1 += document.getElementsByName("subtotal[]")[i].value;

		var select = document.getElementById("descuento1"), //El <select>
        value = select.value

		var desc=total1*value;
		var vneta=total1-desc;
		var iva=vneta*isv1;
		var total=vneta+iva;
	}



	$("#total1").val(total1);
	$("#descuento2").val(desc);
	$("#vneta1").val(vneta);
	$("#iva1").val(iva);
	
	$("#total_venta").val(total);
	

	

	
	
	

	$("#sub_total").html("L" +total1);
	$("#descuento").html( "L" +desc);
	$("#vneta").html("L" +vneta);
	$("#iva").html( "L" +iva);
	$("#total").html("L"+  total);

	
    evaluar();
  }

  function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide(); 
      cont=0;
    }
  }

  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar()
  }
  function agregarclientescab(id_cliente,nombre,RTN,correo)
  {
	document.getElementById("id_cliente").innerHTML = nombre;
  	
    if (id_cliente!="")
    {
		document.formulario.id_cliente.value = id_cliente;
		document.formulario.cliente.value = nombre;
		document.formulario.RTN.value = RTN;
		document.formulario.correo.value = correo;
    	
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del CLIENTE");
    }
  }






  function mostrar_p(idventa)
{
	$.post("../ajax/ventas1.php?op=mostrar_p",{idventa: idventa}, function(data, status)
	{
		data = JSON.parse(data);	
		console.log(data);	

		
		$("#fecha_f").html(data.fecha);
		$("#nun_f").html(data.num_factura);
		$("#cai_f").html(data.cai);
		$("#cliente_f").html(data.nombre);
		
		$("#usuario_f").html(data.Nombre_Usuario);

		
		$.post("../ajax/ventas1.php?op=listarDetalle&id="+idventa,function(r){
	        $("#tbllistados_f").html(r);
	});	
		
		
	
 	})




	
  	
   
}

function Factura(idventa){
	var ancho =1000;
	var alto =800;
	var x= parseInt((window.screen.width/2) - (ancho/2));
	var y= parseInt((window.screen.height/2) - (alto/2));
	$.post('../AVR/factura/factura.php?id='+idventa,{})

	$url = '../AVR/factura/generaFactura.php?id='+idventa;
	window.open($url,"Factura","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no")
}

init();