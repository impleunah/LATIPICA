$(document).ready(function(){
  
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_categoria.php',
      data:{'peticion':'combobox_categoria'}
    })
    .done(function(listas_categoria){
      $('#idcategoria').html(listas_categoria)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas') 
    })
  

    })