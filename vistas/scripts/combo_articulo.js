$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combo_articulo.php',
      data:{'peticion':'combo_articulo'}
    })
    .done(function(listas_articulos){
      $('#id_articulo').html(listas_articulos)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })