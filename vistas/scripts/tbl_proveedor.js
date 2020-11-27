// Ver tabla usuario
function ver_tabla_proveedor()
{
    $.ajax({
        type:"GET",
        url:"../ajax/ajax/ver_tabla_proveedor.php",
    }).done(function(msg)
    {
        $("#ver_tabla_proveedor").html(msg);
	})
}


$('#btnClear').click(function() {
    $('#formEmpty').smkClear();
  });

    // Agregar usuario
$('#btnEmpty').click(function() {
    if ($('#formEmpty').smkValidate()) {
         if( $.smkEqualPass('#pass1', '#pass2') ){
        var dataString='nombre='+$('#nombre').val()+
        '&apellido='+$('#apellido').val()+
        '&estado='+$('#estado').val()+
        '&fecha='+$('#fecha').val()+
        '&sexo='+$('#sexo').val()+
        '&usuario='+$('#usuario').val()+
        '&pass2='+$('#pass2').val()+
        '&rol='+$('#rol').val()+
        '&agregar=1';
        $.ajax({
            type:"POST",
            url:"../../ajax/ajax/agregar_usuario.php",
            data:dataString
        }).done(function(data){
            if(data==1){
                $.smkAlert({
                    text: 'Excelente',
                    type: 'success'
                });
                $("#myModal").modal('hide');
                ver_tabla_usuario();
                ver_codigo();
                $("#nombre").val('');
                $("#apellido").val('');
                $("#fecha").val('');
                $("#estado").val('');
                $("#sexo").val('');
                $("#usuario").val('');
                 $("#pass1").val('');
                $("#pass2").val('');
                $("#rol").val('');
            }
            else if(data==3){
                $.smkAlert({
                    text: 'Usuario Duplicado',
                    type: 'warning'
                });
            }
            else{
                $.smkAlert({
                    text: 'Error',
                    type: 'danger'
                });
            }
        })
    }
    }
});



// Eliminar usuario
function eliminar(id_cliente) {
    var id=id_cliente;
    $.ajax({
        type:"GET",
        url:"../../ajax/ajax/eliminar_usuario.php?id="+id
    }).done(function(data){
        if(data==1){
            $.smkAlert({
                text: 'Excelente',
                type: 'success'
            });
            ver_tabla_usuario();
            $("#eliminar").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
        else{
            $.smkAlert({
                text: 'Error',
                type: 'danger'
            });
        }
    })
}


// Editar estado activo
function activo(id_proveedor)
{
	var id=id_proveedor;
	$.ajax({
        type:"GET",
		url:"../ajax/ajax/editar_estado_activo_usuario.php?id="+id,
    }).done(function(data){
        ver_tabla_usuario();
    })

}

// Editar estado inactivo
function inactivo(id_proveedor)
{
	var id=id_proveedor;
	$.ajax({
		type:"GET",
		url:"../ajax/ajax/editar_estado_inactivo_usuario.php?id="+id,
    }).done(function(data){
        ver_tabla_usuario();
    })
}

// Editar rol administrador
function admi(id_proveedor)
{
	var id=id_proveedor;
	$.ajax({
			type:"GET",
			url:"../../ajax/ajax/editar_rol_admi.php?id="+id,
    }).done(function(data){
    ver_tabla_usuario();
    })

}

// Editar rol usuario
function usuario(id_proveedor)
{
	var id=id_proveedor;
	$.ajax({
			type:"GET",
			url:"../../ajax/ajax/editar_rol_usuario.php?id="+id,
    }).done(function(data){
    ver_tabla_usuario();
    })
}