<div class="nav-wrapper  teal darken-3 AnchoLineaTitulo"><br></div><br><br>
 <div class="container ">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1 center">
        <h5>Plataforma DWEB, Bienvenido.</h5>
			    <p>Información financiera</p>
        	<div class="col s12">
		      	<img src="<?php echo base_url();?>/assets/img/avatar-001.jpg" alt="" class="circle responsive-img">
		   </div>
		<div class="col s12">
			 <form class="col s12" method="post" action="<?php echo base_url('index.php/Acreditar')?>">		      
		      <div class="row">
		        <div class="input-field col s12">
		        <p>Usuario</p>
		          <input name="txtUsuario" id="Usuario" type="text" class="validate" value="<?php echo set_value('Usuario'); ?>">
		          
		          <?php echo form_error('txtUsuario'); ?>
		        </div>
		      </div>
		      <div class="row">
		      
		        <div class="input-field col s12">
		        <p>Contraseña</p>
		          <input name="txtpassword" type="password" class="validate">		          
		          <?php echo form_error('txtpassword'); ?>
		        </div>
		      </div>
		      
            		    
		      	<div class="card-action">
             		<button class="btn waves-effect waves-light" type="submit" name="action">Acceder
			    		<i class="material-icons right">send</i>
			  		</button>
            	</div>
		    </form>
		</div>
        </div>
      </div>
 </div>
    
            
