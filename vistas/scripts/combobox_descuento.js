$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_pago.php',
      data:{'peticion':'combobox_pago'}
    })
    .done(function(listas_pagos){
      $('#id_tipo_pag').html(listas_pagos)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })