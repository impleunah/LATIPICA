$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_cliente.php',
      data:{'peticion':'combobox_cliente'}
    })
    .done(function(listas_cliente){
      $('#id_cliente').html(listas_cliente)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })