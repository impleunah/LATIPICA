$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_presentacion.php',
      data:{'peticion':'combobox_presentacion'}
    })
    .done(function(listas_presentacion){
      $('#id_presentacion').html(listas_presentacion)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })