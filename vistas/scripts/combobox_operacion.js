$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_operacion.php',
      data:{'peticion':'combobox_operacion'}
    })
    .done(function(Listaproducto){
      $('#id_operacion').html(Listaproducto)
    })
    .fail(function(){
      alert('Hubo un errror al cargar la lista')
    })
  

    })