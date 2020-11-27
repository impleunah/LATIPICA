$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_impuesto.php',
      data:{'peticion':'combobox_impuesto'}
    })
    .done(function(combobox_impuesto){
      $('#v_Impuesto').html(combobox_impuesto)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })