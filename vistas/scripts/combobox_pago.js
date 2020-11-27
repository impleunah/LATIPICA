$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_descuento.php',
      data:{'peticion':'combobox_descuento'}
    })
    .done(function(combobox_descuento){
      $('#descuento1').html(combobox_descuento)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })