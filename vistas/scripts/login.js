$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    logina=$("#Nombre_Usuario").val();
    clavea=$("#Contraseña").val();
    $.post("../ajax/tbl_usuarios_envio.php?op=nuevo",{"Nombre_Usuario":logina},
    function(dar){
        
        if (dar!="null")
        {
            $(location).attr("href","nuevo_usuario.php");     
        } $.post("../ajax/tbl_usuarios_envio.php?op=intetos_1",{"Nombre_Usuario":logina},
        function(dar){
            if(dar!="null"){
                bootbox.alert("Usuario bloqueado");
            }else{
    $.post("../ajax/tbl_usuarios_envio.php?op=verificar",
            {"Nombre_Usuario":logina,"Contraseña":clavea},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","inico.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
            $.post("../ajax/tbl_usuarios_envio.php?op=parametro",{"Nombre_Usuario":logina},
            function(dar){
        
                if (dar!="null")
                {
                    

                }})
        }
        })};}
)})});
