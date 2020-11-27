$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_roles.php',
      data:{'peticion':'combobox_roles'}
    })
    .done(function(listas_rep){
      $('#rol_1').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  

    })