<div class="">
	<div class="container">	
    <div class="row">
        <div class="col s12">
          <div class="card">
            <h5 class="center Texto"><br>CREACIÓN DE USUARIOS</h5>
            <br>
            <div class="card-content">
              <div class="row">
              	<form class="col s12" method="post" action="<?php echo base_url('index.php/GuardarUsuario');?>">              	 			      
              	  <div class="row">
				        <div class="input-field col s3 offset-s3">
				          
					          <input id="nuser" type="text" name="txtNombreUsuario" class="validate">
					          <label class="Texto1" for="nuser">NOMBRE DE USUARIO</label>
					        
				        </div> <?php echo form_error('txtNombreUsuario'); ?>
				        <div class="input-field col s3 ">
				         <?php echo form_error('txtpassword'); ?>
				        	<input id="pass" type="password" name="txtpassword" class="validate">
				        	<label class="Texto1" for="pass">CONTRASEÑA</label>
				         
				        </div>       
			        		        
			        </div>
			        
					
			      
				      <div class="row">
				        <div class="input-field col s3 offset-s3 ">
				          <select class="browser-default " name="Empresa">
				          	<option  class="selec" value="" disabled selected>EMPRESA</option>
					          <?php
					          	foreach ($EMP as $key ) {
					          		echo '<option class="text2" value="'.$key['IdEM'].'">'.$key['Nombre'].'</option>';
					          	}
					          ?>
						  </select>          
				        </div>
				        <div class="input-field col s3 ">
				          <select class="browser-default " name="P1">
				          	<option class="selec" value="" disabled selected>TIPO DE USUARIO</option>
						    <option class="text2" value="1">ADMINISTRADOR</option>
						    <option class="text2" value="2">PRESIDENCOA</option>
						    <option class="text2" value="3">USUARIO</option>
						    
						  </select>          
				        </div>		

				      </div>
			      		<br><br>	      
				      <div class="row">
				      	<div class="col s3 offset-s3">
				      		<button id="btng" class="btn waves-effect waves-light " type="submit" name="action">GUARDAR</button>
				      	</div>
				      	<div class="col s3">
				      		<a id="btns" class="btn waves-effect waves-light red" href="<?php echo base_url('index.php/Usuarios')?>" >CANCELAR</a>
				      	</div>
				      
				      </div>
			    </form>

              </div>
            </div>
           
          </div>
        </div>
      </div>	
	</div>
</div>

