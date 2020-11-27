$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_pregunta_usuario_1.php',
      data:{'peticion':'combobox_pregunta_usuario_1'}
    })
    .done(function(listas_rep){
      $('#id_usuario_2').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  

    })