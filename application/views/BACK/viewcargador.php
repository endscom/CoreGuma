<div class="container">
<form action="<?php echo base_url('index.php/ProcesarDocumento')?>" id="frmloadfile" enctype="multipart/form-data" method="POST">
	<div class="section center">
        <h2 id="Texto"class="header Texto">CARGAR DOCUMENTO</h2>
        <p id="text2"class="center text5">Para proceder con la carga es necesario utilizar la siguiente plantilla  <a href="<?php echo base_url('assets/media/CARGADOR.xls');?>">Descargar.</a></p>
    </div>
    <br><br>
     <div class="row">
       <div class="col s3 offset-s3">
      	<span class="flow-text ">
      		<span  class="center Texto1" >FECHA DE LIBRO</span>
          	<input type="text" class="datepicker1" name="FechaLibro" required>          
      	</span>
      </div>

      <div class="col s3">
      	<span class="flow-text ">
      		<span class="center Texto1"  >FECHA DE MOVIMIENTO</span>
          	<input type="text" class="datepicker1" name="FechaM" required>          
      	</span>
      </div>
    </div>
          
	                         
		<div class="row icons center">
	    	<div class=" file-field input-field col s7 offset-s2"> 
		        <input class="right"id="abrir"type="file" name="file" required><img src="<?php echo base_url();?>assets/img/abrir.png" width="35px">
		    	
		      <div class="file-path-wrapper">
		        <input id="doc" disabled class="file-path validate" type="text">
		        <p id="open"class="text2">ABRIR</p>
		      </div>
	    	</div>
	    	<div class="col s3">
	    		 <button id="BSalir"class=" waves-effect waves-light" type="submit" ><img src="<?php echo base_url();?>assets/img/subir.png" width="45px">
				   <p class="text2">SUBIR</p>
				  </button> 
	    	</div>
	   </div>
		
		<div class="row icons">
		   	  <div class="col s1 offset-s5">
  		         <a id="atras" class="btn waves-effect waves-light red" href="<?php echo base_url('index.php/Bandeja')?>" >
  			       CANCELAR</a>
  	          </div>
		   </div>

	    	 
	  </form>
	</div>
