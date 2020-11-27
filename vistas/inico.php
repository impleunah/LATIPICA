<?php
ob_start();
session_start();

if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php'


?>
 <div class="content-wrapper ">

</div>

<?php
  require 'footer.php'
  
?>
<?php 
}

ob_end_flush();
?>