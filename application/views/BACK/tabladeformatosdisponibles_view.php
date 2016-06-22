<div class="">
    <div class="container"> 
    <div class="row">
        <div class="col s12">
          <div class="card">
            <h5 class="center Texto"><br>FORMATOS INGRESADOS</h5>
            <div class="card-content" >
              <div  class=" center row iconos" >
               
                          <div class="col s2 offset-s3">
                      
                            <a  href="<?php echo base_url('index.php/CrearFormato');?>">
                            <img src="<?php echo base_url();?>assets/img/crear.png" width="50px"></a>
                            <p class="text2">CREAR</p>
                        </div>

                        <div class="col s2">            
                                    <a  href="<?php echo base_url('index.php/Cuentas');?>">
                                    <img src="<?php echo base_url();?>assets/img/cuenta.png" width="55px"></a>
                                    <p class="text2">CUENTAS</p>
                         </div>
                          
                         <div class="col s2">
                                <a  href="<?php echo base_url('index.php/Cargador');?>">
                                <img src="<?php echo base_url();?>assets/img/subir.png" width="50px"></a>
                                <p class="text2">SUBIR</p>
                          </div>
                  
                     
              </div>

                
              </div>
              <div class=" row">
                <div class="col s2">
                    <a id="guardar1" class="btn waves-effect waves-light " href="<?php echo base_url('index.php/dashboard')?>" >
                      ATRAS</a>
                </div>
              </div>

              <div>
                <table id="TblMaster" class="DatosTable" cellspacing="1" cellpadding="2">
                     <thead>
                        <tr >
                           <!-- <th >#</th> -->                           
                            <th id="text1">Fecha</th>    
                            <!-- <th></th>-->                 
                        </tr>
                     </thead>
                     <tbody>
                        <?php  
                        

                         /* if (!($AllM)) {
                                # code...
                              } else {
                                foreach ($AllM as $key) {
                               
                                  echo "
                                    <tr>
                                       
                                        <td><a href='".base_url('index.php/VerF/'.substr($key["FechaM"], 0,10).'')."'>".date('d-m-Y',strtotime(substr($key['FechaM'], 0,10)))."</a></td>";
                                        
                                  echo "</tr>";

                                    

                                    
                                }
                              }  */                               
                              if (!($AllM)) {
                                # code...
                              } else {
                                foreach ($AllM as $key) {
                                  $i=1;

                                    $empresa;
                                    switch ($empresa) {
                                      case '1':
                                          echo "
                                    <tr>
                                        
                                        <td><a  href='".base_url('index.php/VerUNI/'.substr($key["FechaM"], 0,10).'')."'>".substr($key['FechaM'], 0,10)."</a></td>";
                                        
                                  echo "</tr>";

                                    $i++;
                                   
                                
                                        break;
                                      case '2':  echo "
                                    <tr>
                                        
                                        <td><a  href='".base_url('index.php/VerUMA/'.substr($key["FechaM"], 0,10).'')."'>".substr($key['FechaM'], 0,10)."</a></td>";
                                        
                                  echo "</tr>";

                                    $i++;
                                    break;
                                      case '3':echo "
                                    <tr>
                                        
                                        <td><a  href='".base_url('index.php/VerUMV/'.substr($key["FechaM"], 0,10).'')."'>".substr($key['FechaM'], 0,10)."</a></td>";
                                       
                                  echo "</tr>";

                                    $i++;
                                    break;
                                      case '4':echo "
                                    <tr>
                                        
                                        <td><a  href='".base_url('index.php/VerInn/'.substr($key["FechaM"], 0,10).'')."'>".substr($key['FechaM'], 0,10)."</a></td>";
                                        
                                  echo "</tr>";

                                    $i++;
                                    break;
                                      default:
                                      echo "
                                    <tr>
                                        
                                        <td><a  href='".base_url('index.php/VerAglosa/'.substr($key["FechaM"], 0,10).'')."'>".substr($key['FechaM'], 0,10)."</a></td>";
                                       
                                  echo "</tr>";

                                    $i++;
                                    break;
                              }
                                  
                              }
                            }
                             

                        ?>

                     </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
</div>



 