$(document).ready(function(){
    
    $.ajax({
      type: 'POST',
      url: '../ajax/combobox_proveedor.php',
      data:{'peticion':'combobox_proveedor'}
    })
    .done(function(Listaproveedor){
      $('#id_proveedor').html(Listaproveedor)
    })
    .fail(function(){
      alert('Hubo un errror al cargar la lista')
    })
  

    })