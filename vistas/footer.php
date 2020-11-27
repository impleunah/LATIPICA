<?php
ob_start();


if (!isset($_SESSION["Nombre_Usuario"]))
{
  header("Location: login.html");
}
else
{
  ?>

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1
        </div>
        <strong>Copyright &copy; UNAH 2020<a href="www.incanatoit.com"></a>.</strong> All rights reserved.
    </footer>    
    <!-- jQuery 2.1.4 -->
    <script src="../public/js/jquery.min.js"></script>
   
<script src="../public/js/smoke.min.js"></script>


<script src="../public/js/fileinput.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/js/app.min.js"></script>
     <!-- DATATABLES -->
     <script src="../public/datatables/jquery.dataTables.min.js"></script>    
    <script src="../public/datatables/dataTables.buttons.min.js"></script>
    <script src="../public/datatables/buttons.html5.min.js"></script>
    <script src="../public/datatables/buttons.colVis.min.js"></script>
    <script src="../public/datatables/jszip.min.js"></script>
    <script src="../public/datatables/pdfmake.min.js"></script>
    <script src="../public/datatables/vfs_fonts.js"></script> 
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/bootstrap-select.min.js"></script>
    

    
  </body>
</html>
<?php 
}
ob_end_flush();
?>