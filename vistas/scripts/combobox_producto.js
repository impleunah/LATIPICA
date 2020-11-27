$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_producto.php',
      data:{'peticion':'combobox_producto'}
    })
    .done(function(Listaproducto){
      $('#idarticulo').html(Listaproducto)
    })
    .fail(function(){
      alert('Hubo un errror al cargar la lista')
    })
  

    })