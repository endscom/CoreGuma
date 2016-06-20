<br>
<div class="row">
	<div class="col s12">
	 <div class="col s12">
        <div class="card">          
          <div class="card-content">
             <form action="<?php echo base_url('index.php/GuardarFormato')?>" method="post" id="commentForm">
             	<div class="row">
             		
             			<div class=" col s3">
				          <h4 class="Texto">LIBRO</h4>			          
				        </div>
             			
             			<div class=" fecha input-field col s3 offset-s5">
				          <input type="text" name="FechaM" id="fecha"class="datepicker1 center fecha" value="<?php echo date('Y / m / d'); ?>">
				          <label for="fecha">FECHA:</label>			          
				        </div>
             	</div>
	
        
      	<div class="row left">

      	</div>
      	<div class="row">
      		<div class="col s2 offset-s5">
      			<h5 class="cuentas">CÓRDOBAS</h5>
      		</div>
      	</div>
      	<table id="ingresoCordoba" class="display">
      		<thead>
      			<tr>
      				<th>NO. CUENTA</th>
      				<th>MONEDA</th>
      				<th>TIPO DE CUENTA Cta./Cte </th>
      				<th>SALDO LIBRO AL <input type="date" name="FechaSLA" id="idFLA" required></th>
      				<th colspan="4"> MOVIMIENTOS DEL DÍA
      					<table>
      						<tr>
      							<th class="center" colspan="2">INGRESOS</th>
      							<th class="center" colspan="2">EGRESOS</th>
      						</tr>
      						<tr>
      							<th>DEPOSITOS</th>
      							<th>N/C</th>
      							<th>CHEQUES</th>
      							<th>N/D</th>
      						</tr>
      					</table>
      				</th>

      				<th>CHEQUES FLOTANTES</th>
      				<th>DEPOSITOS NO DISPONIBLES</th>
      			</tr>
      		</thead>
      	
			<tbody>
				
				 
				<?php
				$x=1;

					if(!($MTBN)){

					}else{
						foreach ($MTBN as $key) {
						//CONSTRUCCION DE ARREGLO DE LAS CUENTAS A AFECTAR
						$Cts[] = $key["IdDB"];

						if ((substr($key["MTipo"], 0,1))=="C") {
							echo '
							<tr>							 	
								<td>'.$key["NCuenta"].'</td>
                                <td>'.$key["MTipo"].'</td>
                                <td>'.$key["Banco"].'</td>
								<td>C$<input type="text" placeholder="0.00" class="numeric signo" name="row-'.$key["IdDB"].'-1" required style="width:150px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric signo" name="row-'.$key["IdDB"].'-2" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-3" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-4" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-5" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-6" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-7" required style="width:100px;"></td>
							</tr>
						';

						$x++;
						}
					}
					
						
					}
				?>
		</table>
			<div class="row">
				<div class="col s2 offset-s5">
					<h5 class="cuentas">DOLARES</h5>
				</div>
			</div>

		<table id="ingresoDolar"class="display">
			<thead>
      			<tr>
      				<th>NO. CUENTA</th>
      				<th>MONEDA</th>
      				<th>TIPO DE CUENTA Cta./Cte </th>
      				<th>SALDO LIBRO AL <input type="date" name="FechaSLA" id="idFLA" required></th>
      				<th colspan="4"> MOVIMIENTOS DEL DÍA
      					<table>
      						<tr>
      							<th class="center" colspan="2">INGRESOS</th>
      							<th class="center" colspan="2">EGRESOS</th>
      						</tr>
      						<tr>
      							<th>DEPOSITOS</th>
      							<th>N/C</th>
      							<th>CHEQUES</th>
      							<th>N/D</th>
      						</tr>
      					</table>
      				</th>

      				<th>CHEQUES FLOTANTES</th>
      				<th>DEPOSITOS NO DISPONIBLES</th>
      			</tr>
      		</thead>

      		<tbody>
      		<tr>
					<td colspan="13">
						
						<!--LLENADO DE ENVIO DE CUENTAS AFECTADAS-->
						<input type="text" style="display:none" name="txtCts" value="<?php if (!isset($Cts)) {}else{echo implode(",", $Cts);}?>">
					</td>
				</tr>
				 <?php
				 $i=1;

				 
				 if (!($MTBN)) {
				 	# code...
				 } else {
				 	foreach ($MTBN as $key) {
						
						if ((substr($key["MTipo"], 0,1))=="D") {
							echo '
							<tr>							 	
								<td>'.$key["NCuenta"].'</td>
                                <td>'.$key["MTipo"].'</td>
                                <td>'.$key["Banco"].'</td>
								<td>$<input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-1" required style="width:150px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-2" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-3" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-4" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-5" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-6" required style="width:100px;"></td>
								<td><input type="text" placeholder="0.00" class="numeric" name="row-'.$key["IdDB"].'-7" required style="width:100px;"></td>
							</tr>
						';						
						$i++;
						}
				 }
				 
					
						
					}
				?>
				<tr>
					<td colspan="13"><br></td>					
				</tr>
			</tbody>
		</table>
				
			
			
			
	
	</div>
</div>
 <div class="btns row">
 	<div class="col s2">
 		<button id="guardar"class="btn waves-effect waves-light  " id="" type="submit" class="numeric" >GUARDAR</button>
 	</div>
 	<div class="col s1">
  		<a id="guardar" class="btn waves-effect waves-light red" href="<?php echo base_url('index.php/Bandeja')?>" >
  			CANCELAR</a>
  	</div>
  	
  </div>

  </form>
          </div>
          
        </div>
    </div>
	