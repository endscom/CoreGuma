<div class="">
 <div class="row">     
      <?php     
      
      if (!isset($_SESSION['Permiso'])) {          
         } else {
           switch ($_SESSION['Permiso']) {
              case 1:
                echo '
                <div class="col s12 m6 l3">
                    <div class="card">
                      <div class="card-image">
                        <a href='.base_url("index.php/Bancos").'>
                            <img src='.base_url("assets/img/BANK.jpg").' class="circle responsive-img">
                        </a>              
                      </div>
                      <div class="card-content">
                        <p>Disponibilidad de Bancos.</p>
                      </div>
                      
                    </div>
                </div>
                <div class="col s12 m6 l3">
                   <div class="card">
                      <div class="card-image">
                        <a href='.base_url("index.php/Bandeja").'>
                            <img src='.base_url("assets/img/estfi.jpg").' >
                        </a>              
                      </div>
                      <div class="card-content">

                        <p>Ingrego de la informacion de Disponibilidad de banco.</p>
                      </div>
                      
                    </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card">
                      <div class="card-image">
                        <a href='.base_url("index.php/Usuarios").'>
                            <img src='.base_url("assets/img/PC_usuario_hi.jpg").' >
                        </a>              
                      </div>
                      <div class="card-content">

                        <p>Creacion de Usuario.</p>
                      </div>
                      
                    </div>
                </div>
                ';
              break;
               case 2:
                echo '
                
              <div class="col s12 m4 l2">
                  
                      <div class="card center">
                        
                        <a href='.base_url("index.php/Bancos").'>
                              <img src='.base_url("assets/img/BANK.jpg").' style="width:120px;">
                          </a>              
                        <div class="card-content center">
                           <p>Disponibilidad de Bancos.</p>
                        </div>
                        
                      </div>
                  </div>
               
                ';
              break;
              case 3:
                echo '
                  <div class="col s12 m6 l3">
                     <div class="card">
                      <div class="card-image">
                        <a href='.base_url("index.php/Bandeja").'>
                            <img src='.base_url("assets/img/estfi.jpg").' class="circle responsive-img">
                        </a>              
                      </div>
                      <div class="card-content">

                        <p>Ingrego de la informacion de los Disponibles en banco.</p>
                      </div>
                      
                    </div>
                  </div>
                ';
              break;
        }
         }
            
        
      ?>
      <div class="col s3 "></div>      

      
</div>
