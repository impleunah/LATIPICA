$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_pregunta_usuario.php',
      data:{'peticion':'combobox_pregunta_usuario'}
    })
    .done(function(listas_rep){
      $('#id_usuario').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  

    })