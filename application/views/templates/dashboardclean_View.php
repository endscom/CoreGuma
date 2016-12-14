
<nav>
	<div class="nav-wrapper ColorLogo">
		<a href="<?php echo base_url('index.php/dashboard')?>" class="brand-logo left ">
			<img id="img" src="<?php echo base_url('assets/img/logo-guma.png')?>" width="150px" ></a>
		
		<ul class="right ">
			<li><?php echo $this->session->userdata('SlpName');?></li>
			<li><a href="<?php echo base_url('index.php/Salir')?>">  <i class="material-icons">power_settings_new</i></a></li>  
      	</ul> 
      	
	</div>
</nav>
