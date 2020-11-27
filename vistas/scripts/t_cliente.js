function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}


function agregartelefono(){
	var numtel= Number($('#numtel').val());
	numtel+=1;
	if(numtel >5){
		bootbox.alert('No se pueden agregar mas de 5 Teléfonos');
		return false;
	}else{
		var html='<div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 divTemp">';
		html+=' <label>Telefono '+numtel+':</label>';
		html+=' <input type="text" class="form-control" name="telefono_'+numtel+'" id="telefono_'+numtel+'" maxlength="8" placeholder="Telefono '+numtel+'" required onkeypress="return validaNumericos(event)">';
		html+='</div>';
		$('.divTel').append(html);
		$('#numtel').val(numtel);

	}
}