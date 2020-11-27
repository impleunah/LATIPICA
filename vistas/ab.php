                        <?php 
                        require_once('../config/Conexion.php');
                        $query = "SELECT * FROM tbl_facturas_serie ";
                            $result = mysqli_query($conexion, $query);
                      
                        while($row = mysqli_fetch_array($result)){
                       
                        $a = $row['cod_factura'];
                        $b =$row['numero'];
                     
                   
                        
                    }
                   
                        ?>
                    <script type="text/javascript">
                          var  i=0;
                     var  b= <?php echo $a; ?>;
                     var   a="000-001-01";
                     
                    
                              function padLeft(nr, n, str){
                              return Array(n-String(nr).length+1).join(str||'0')+nr;
                          }
                          window.onload = function () {
                             
                              const botones=document.querySelectorAll(".boton");
                              botones.forEach(el => {
                                  el.addEventListener("click", contar);
                              });
                          
                              function contar()
                              {       
                                
                                  b++;
                                 
                                  document.getElementById("num_factura").value= a+" "+padLeft(b,9);
                                 
                                
                                }
                              
                          }; 
                          </script>

                        <?php 
                        require_once('../config/Conexion.php');
                        
                        $query = "SELECT  id_reg_facturacion,cai from tbl_reg_facturacion order by id_reg_facturacion desc limit 1";
                            $result = mysqli_query($conexion, $query);
                      
                        while($row = mysqli_fetch_array($result)){
                       
                        $c = $row['cai'];
                        $k = $row['id_reg_facturacion'];
                     
                   
                        
                    }
                   
                        ?>