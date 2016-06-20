<br>
<div class="row">
	<div class="col s12">
	 <div class="col s12">
	 <div class="center"><h4>Disponible de Bancos[Editar]</h4>      </div>
        <div class="card">   

          <div class="card-content">
             <form action="<?php echo base_url('index.php/UpdateFormato')?>" method="post" id="commentForm">
	<div class="row right">
        <div class="input-field col s12">
          Fecha:<br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?>
        </div>
      </div>
		<table cellpadding="0" border="0" class="display" id="">
			<thead>
				<tr>
					<th >No. De CTA</th>
					<th >MONEDA</th>
					<th>TIPO DE CUENTO Cta. Cte</th>
					<th>SALDO EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaSLA'], 0,10); ?></th>					
					<th>MOV. ING. DEP</th>
					<th>MOV. ING. NC</th>
					<th>MOv. EGR. CHKC</th>
					<th>MOV. EGR. ND</th>							
					<th>CHEQUES FLOTANTES</th>					
					<th>DEPOSITOS NO DISPONIBLES</th>
				</tr>
			</thead>
			<tbody>
				
				
				<?php
				

					if(!($MTMV)){

					}else{
						foreach ($MTMV as $key) {
						//CONSTRUCCION DE ARREGLO DE LAS CUENTAS A AFECTAR
						$Cts[] = $key["IdIS"];

						if ((substr($key["MTipo"], 0,1))=="C") {
							echo '
							<tr id="'.$key["IdIS"].'">							 	
								<td>'.$key["NCuenta"].'</td>
                                <td>'.$key["MTipo"].'</td>
                                <td>'.$key["Banco"].'</td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-1" value="'.str_replace(",","",number_format($key["SaldoLA"],2)).'"  style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-2" value="'.str_replace(",","",number_format($key["MDIDP"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-3" value="'.str_replace(",","",number_format($key["MDINC"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-4" value="'.str_replace(",","",number_format($key["MDECHK"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-5" value="'.str_replace(",","",number_format($key["MDIEND"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-6" value="'.str_replace(",","",number_format($key["CHKF"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-7" value="'.str_replace(",","",number_format($key["DPD"],2)).'" required style="width:150px;"></td>
							</tr>
						';

						
						}
					}
					
						
					}
				?>

				
				 <?php
				 

				 
				 if (!($MTMV)) {
				 	# code...
				 } else {
				 	foreach ($MTMV as $key) {
						
						if ((substr($key["MTipo"], 0,1))=="D") {
							echo '
							<tr id="'.$key["IdIS"].'">							 	
								<td>'.$key["NCuenta"].'</td>
                                <td>'.$key["MTipo"].'</td>
                                <td>'.$key["Banco"].'</td>
								<td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-1" value="'.str_replace(",","",number_format($key["SaldoLA"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-2" value="'.str_replace(",","",number_format($key["MDIDP"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-3" value="'.str_replace(",","",number_format($key["MDINC"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-4" value="'.str_replace(",","",number_format($key["MDECHK"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-5" value="'.str_replace(",","",number_format($key["MDIEND"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-6" value="'.str_replace(",","",number_format($key["CHKF"],2)).'" required style="width:150px;"></td>
                                <td>C$<input type="text" class="numeric" name="row-'.$key["IdIS"].'-7" value="'.str_replace(",","",number_format($key["DPD"],2)).'" required style="width:150px;"></td>
							</tr>
						';						
						
						}
				 }
				 
					
						
					}
				?>
				
			</tbody>
			</table>
					<input type="text" style="display:none" name="txtCts" value="<?php if (!isset($Cts)) {}else{echo implode(",", $Cts);}?>">
			
	
	</div>
</div>
 <div class="center">
  	<button class="btn waves-effect waves-light green" id="" type="submit" class="numeric" >Guardar
    	<i class="material-icons right">send</i>
  	</button>
  	<a class="btn waves-effect waves-light red" href="<?php echo base_url('index.php/Bandeja')?>" ><i class="material-icons left">close</i>cancelar</a>
  	
  </div>
  </form>


          </div>
          
        </div>
    </div>
<br><br>
<div class="col s1 center">
 	<div class="chip"><strong>MOV. ING. DEP: Movimiento de Ingresos por Depositos.</strong></div>
 	<div class="chip">MOV. ING. NC: Movimiento de Ingresos por N/C.</div>	
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por Cheque</div>
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por N/D</div>
 </div>