<nav>
	<div class="nav-wrapper orange accent-4">
		<ul id="nav-mobile" class="right ">        
        	
      	</ul>
		<!--<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>-->
		<ul class="left hide-on-med-and-down " id="IdMenu">
			

        	<li style="width:200px;">
        		<a href="<?php echo base_url('index.php/Bancos')?>" class="brand-logo right"><img src="<?php echo base_url('assets/img/LGW.png')?>" width="200px"></a>
        	</li>        		
        	
        	<li style="width:170px;" class="active " id="UMK"><img src="<?php echo base_url('assets/img/logo-UMK.png')?>" width="150px"></li>        	
			<li id="UMA"><img src="<?php echo base_url('assets/img/Logo-UMAAGRO.png')?>" width="200px"></li>
			<li id="UMV"><img src="<?php echo base_url('assets/img/Logo-UMAVET.png')?>" width="200px"></li>
			<li style="width:120px;"id="INN"><img src="<?php echo base_url('assets/img/logo-INNOVA.png')?>" width="100px"></li>			
			<li  id="AGL"><img src="<?php echo base_url('assets/img/Logo-Aglosa.png')?>" width="130px"></li>
			<li style="width:250px;">Fecha de Corte:<input type="date" style="width:120px;" id="idFlaPre" value="<?php echo date('Y-m-d');?>"></li>
      	</ul> 
      	<ul class="side-nav orange accent-4" id="mobile-demo">
	       	<li style="width:170px;" class="active " id="UMK"><img src="<?php echo base_url('assets/img/logo-UMK.png')?>" width="150px"></li>        	
			<li id="UMA"><img src="<?php echo base_url('assets/img/Logo-UMAAGRO.png')?>" width="200px"></li>
			<li id="UMV"><img src="<?php echo base_url('assets/img/Logo-UMAVET.png')?>" width="200px"></li>
			<li style="width:120px;"id="INN"><img src="<?php echo base_url('assets/img/logo-INNOVA.png')?>" width="100px"></li>			
			<li  id="AGL"><img src="<?php echo base_url('assets/img/Logo-Aglosa.png')?>" width="130px"></li>
			<li style="width:320px;">Fecha de Corte: <input type="date" style="width:200px;" id="idFlaPre" value="<?php echo date('Y-m-d');?>"></li>
      	</ul>
	</div>
</nav>
