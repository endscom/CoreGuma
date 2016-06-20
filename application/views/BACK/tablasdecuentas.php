<br>
<div class="">
    <div class="container"> 
    <div class="row">
        <div class="col s12">
          <div class="card">
            <h5 class="center Texto"><br>CUENTAS BANCARIAS</h5>
            <div class="card-content">
              <div class="row">
              
              
               <!--<div>
               <form id="formAddNewRow" action="#" title="Add a new browser" style="width:600px;min-width:600px">                  
                  <input placeholder="Cuenta" name="Cuenta" id="Cuenta" type="text" class="required" rel="0" style="width:260px;">                 
                    <div class="input-field col s12">
                      <select class="browser-default" name="Moneda" id="Moneda" style="width:260px;" rel="1" class="required">
                        <option value="Cordoba">Cordoba</option>
                        <option value="Dolares">Dolares</option>                        
                      </select>          
                    </div>
                       
                    <div class="input-field col s12">
                      <select class="browser-default" name="Banco" id="Banco" style="width:260px;" rel="2" class="required">
                        <option value="BAC">BAC</option>
                        <option value="LAFISE">LAFISE</option>                        
                        <option value="BANPRO">BANPRO</option>
                      </select>          
                    </div>                        
                  
                </form>
                </div>-->
                <a id="BtnSalir" class="right waves-effect waves-light btn " href="<?php echo base_url('index.php/Bandeja');?>">ATRÁS</a>
                <a id="add"class="waves-effect waves-light btn modal-trigger" href="#modal1">Agregar</a>

                      <div id="modal1" class="modal top-sheet">
                          <div class="modal-content">
                              <h4 class="Texto3 center">NUEVA CUENTA</h4>

                                <form form id="formAddNewRow" method="post" action="<?php echo base_url('index.php/CtaAdd');?>" name="frmadd">
                                        <div class="row">
                                          <div class="input-field col s4 ">
                                              <input placeholder="No. CUENTA"  name="Cuenta" id="Cuenta" type="text" class="required">
                                              <label for="Cuenta"></label>
                                          </div>
                                          <div class="input-field col s4 ">
                                                <select class="browser-default" name="Moneda" id="Moneda" class="required " >
                                                  <option value="" disabled selected>TIPO DE CUENTA</option>
                                                  <option  class="text2" value="Cordoba">CÓRDOBA</option>
                                                  <option class="text2" value="Dolares">DOLARES</option>
                                                  
                                                </select>
                                                
                                            </div>
                                             <div class="input-field col s4">
                                                <select class="browser-default" name="Banco" id="Banco" class="required " >
                                                  <option  value="" disabled selected>BANCO</option>
                                                  <option class="text2" value="BAC">BAC</option>
                                                  <option class="text2" value="LAFISE">LAFISE</option>
                                                  <option class="text2" value="BANPRO">BANPRO</option>
                                                </select>
                  
                                                  </div>
                                        </div>
                                </form>
                          </div>

                          <div class="modal-footer">
                              <div id="iconos1" class="row">
                                 
                                  <div class="col s2 offset-s4">
                                      <a href="#!" id="Can"class=" modal-action modal-close waves-effect ">Cancelar</a>
                                  </div>
                                  <div class="col s2">
                                      <a href="#!" id="Yes"class=" modal-action  waves-effect" onclick="cuenta()">Aceptar</a>
                                  </div>
                             
                              </div>
                          </div>
                      </div>
                
                <div>
                <table cellpadding="0" border="0" class="display" id="TblveditCuenta">
                  <thead>
                    <tr >
                      <th>Orden</th>
                      <th >Cuenta</th>
                      <th >Moneda</th>
                      <th>Banco</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                    <?php
                            if (!($MTBN)) {
                              # code...
                            } else {
                              foreach ($MTBN as $key) {
                               echo "
                                <tr id='".$key['IdDB']."'>
                                    <td >".$key['Orden']."</td>
                                    <td style=' font-weight: bold;'>".$key['NCuenta']."</td>
                                    <td style=' font-weight: bold;'>".$key['MTipo']."</td>
                                    <td>".$key['Banco']."</td>
                                    
                                </tr>
                                ";
                            
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
</div>
 