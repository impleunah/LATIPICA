$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_pantalla.php',
      data:{'peticion':'combobox_categoria'}
    })
    .done(function(listas_categoria){
      $('#pantalla').html(listas_categoria)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })