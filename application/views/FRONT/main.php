 <div class="row" >  
  <div class="images_02">

      <?php     
      
      if (!isset($_SESSION['Permiso'])) {          
         } else {
           switch ($_SESSION['Permiso']) {
              case 1:
                echo '
                <div class="images_line">
                    <div class="card small" >
                      <div class="card-image">
                        <a href='.base_url("index.php/Bancos").'>
                            <img src='.base_url("assets/img/banco.png").' class="circle responsive-img">
                        </a>              
                      </div>
                      <div class="card-content">
                        <center><p>DISPONIBILIDAD DE BANCOS</p></center>
                      </div>
                      
                    </div>
                </div>
                <div class="images_line">
                   <div class="card small">
                      <div class="card-image">
                        <a href='.base_url("index.php/Bandeja").'>
                            <img src='.base_url("assets/img/dispobanco.png").' >
                        </a>              
                      </div>
                      <div class="card-content">

                        <center><p>INGRESAR INFORMACIÓN DE BANCOS</p></center>
                      </div>
                      
                    </div>
                </div>
                <div class="images_line">
                  <div class="card small">
                      <div class="card-image">
                        <a href='.base_url("index.php/Usuarios").'>
                            <img src='.base_url("assets/img/usuario.png").' >
                        </a>              
                      </div>
                      <div class="card-content">

                        <center><p> CREACIÓN DE USUARIOS</p></center>
                      </div>
                      
                    </div>
                </div>
                ';
              break;
               case 2:
                echo '
                
              <div class="images_line">
                    <div class="card small" >
                      <div class="card-image">
                        <a href='.base_url("index.php/Bancos").'>
                            <img src='.base_url("assets/img/banco.png").' class="circle responsive-img">
                        </a>              
                      </div>
                      <div class="card-content">
                        <center><p>DISPONIBILIDAD DE BANCOS</p></center>
                      </div>
                      
                    </div>
                </div>
               
                ';
              break;
              case 3:
                echo '
                  <div class="images_line">
                   <div class="card small">
                      <div class="card-image">
                        <a href='.base_url("index.php/Bandeja").'>
                            <img src='.base_url("assets/img/dispobanco.png").' >
                        </a>              
                      </div>
                      <div class="card-content">

                        <center><p>INGRESAR INFORMACIÓN DE BANCOS</p></center>
                      </div>
                      
                    </div>
                </div>
                ';
              break;
        }
         }
            
        
      ?>
      </div>

      
</div><br>

