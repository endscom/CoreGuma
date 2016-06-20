<br>
<div class="row" style="margin-bottom:0">
<div class="col s2"  >
	<?php
	$empresa;
	switch ($empresa) {
		case '1':
			echo ' <img src='.base_url("assets/img/logos/unimark.png").' >';
			break;
		case '2':
			echo ' <img src='.base_url("assets/img/logos/umaagro.png").' >';
			break;
		case '3':
			echo ' <img src='.base_url("assets/img/logos/umavet.png").' >';
			break;
		case '4':
			echo ' <img src='.base_url("assets/img/logos/innova.png").' >';
			break;
		default:
			echo ' <img src='.base_url("assets/img/logos/aglosa.png").' >';
			break;
	}
	?>
</div>	</div>
<div class="row">
	<div class="col s12">
			<center><h4 id="TDispo">DISPONIBLE DE BANCO CORTE &nbsp&nbsp <?php echo substr($MTMV[0]['FechaM'], 0,10); ?></h4></center>
			<br>
        <div id="ec_pdf">
                <form id="frmPDF" name="frmPDF" action="<?php echo base_url();?>index.php/pdf" target="_blank" method="post">
					<input name="fecha" type="hidden" value="<?php echo substr($MTMV[0]['FechaM'], 0,10); ?>">
						<input name="empresa" type="hidden" value="<?php echo $empresa['empresa']; ?>">
                </form>
  		</div>
		<div class="row">
		
		</div>
            <div class="row" >
            	
            	<div class="col s2">
			        	<a  id="back" href="<?php echo base_url()?>/index.php/dashboard" class="waves-effect waves-light btn" >REGRESAR</a>
			        </div>
            		<div class="col s2 offset-s7">
			        	 <a onclick="generarPdf();" id="pdf" class="waves-effect waves-light btn" >PDF</a>
			        	 
			        </div>
			        
            	
            </div>
        
        <br>
		<table id="tblid_vista_detalles" class="table bordered hover  display" >
			<thead >
				<tr >
					<th>CUENTA</th>
					<th>MONEDA</th>
					<th>TIPO CUENTA Cte.</th>
					<th>SALDO EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaSLA'], 0,10); ?></th>
					<th>MOV. ING. DEP</th>
					<th>MOV. ING. NC</th>
					<th>MOv. EGR. CHKC</th>
					<th>MOV. EGR. ND</th>					
					<th>SALDOS EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
					<th>CHEQUES FLOTANTES</th>
					<th>SALDO EN BANCOS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
					<th>DEPOSITOS NO DISPONIBLES</th>
					<th>DISPONIBLE REAL AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
				</tr>
			</thead>
			<tbody>
				 
				 <tr>
				 	<td id="Cordoba"colspan="13">C&Oacute;RDOBAS</td>					
				</tr>
				<?php
				if (!($MTMV)) {
					$TSaldoLAC[] 	= "";
					$TMDIDPC[]		= "";
					$TMDINCC[]		= "";
					$TMDECHKC[]		= "";
					$TMDIENDC[]		= "";
					$TSaldoLFC[]	= "";
					$TCHKFC[]		= "";
					$TSaldoBC[]		= "";
					$TDPDC[]		= "";
					$TSaldoRC[]		= "";
				} else {
					foreach ($MTMV as $key ) {

						if ((substr($key["MTipo"], 0,1))=="C") {

							$TSaldoLAC[] 	= $key['SaldoLA'];
							$TMDIDPC[]		= $key['MDIDP'];
							$TMDINCC[]		= $key['MDINC'];
							$TMDECHKC[]		= $key['MDECHK'];
							$TMDIENDC[]		= $key['MDIEND'];
							$TSaldoLFC[]	= $key['SaldoLF'];
							$TCHKFC[]		= $key['CHKF'];
							$TSaldoBC[]		= $key['SaldoB'];
							$TDPDC[]		= $key['DPD'];
							$TSaldoRC[]		= $key['SaldoR'];
							


							echo "
								<tr > 
								 	<td >".$key['NCuenta']."</td>
									<td>".$key['MTipo']."</td>
									<td>".$key['Banco']."</td>
									<td > ".(((number_format($key['SaldoLA'],2)==0.00)) ? '' : "".number_format($key['SaldoLA'],2))."</td>								

									<td > 
										<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"DEP"'.")'>".(((number_format($key['MDIDP'],2)==0.00)) ? '' : "".number_format($key['MDIDP'],2))."</a>
									</td>

									<td > 
										<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"NC"'.")'>".(((number_format($key['MDINC'],2)==0.00)) ? '' : "".number_format($key['MDINC'],2))."</a>
									</td>

									<td> 
										<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CK"'.")'>".(((number_format($key['MDECHK'],2)==0.00)) ? '' : "".number_format($key['MDECHK'],2))."</a>
									</td>

									<td> 
										<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDIEND'],2)==0.00)) ? '' : "".number_format($key['MDIEND'],2))."</a>
									</td>

									<td > ".(((number_format($key['SaldoLF'],2)==0.00)) ? '' : "".number_format($key['SaldoLF'],2))."</td>
									<td>
										<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CKF"'.")'>".(((number_format($key['CHKF'],2)==0.00)) ? '' : "".number_format($key['CHKF'],2))."</a>
									</td>
									<td > ".(((number_format($key['SaldoB'],2)==0.00)) ? '' : "".number_format($key['SaldoB'],2))."</td>								
									<td > ".(((number_format($key['DPD'],2)==0.00)) ? '' : "".number_format($key['DPD'],2))."</td>
									<td > ".(((number_format($key['SaldoR'],2)==0.00)) ? '' : "".number_format($key['SaldoR'],2))."</td>								
								</tr>
							";
						}
					}
				}
				
				
					
				?>
				 
				
				<tr id="TCordoba">
					<td >TOTAL CORDOBAS</td>
					<td></td>
					<td></td>
					<td ><?php echo ((number_format(array_sum($TSaldoLAC),2)==0.00) ? '' : "".number_format(array_sum($TSaldoLAC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TMDIDPC),2)==0.00) ? '' : "".number_format(array_sum($TMDIDPC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TMDINCC),2)==0.00) ? '' : "".number_format(array_sum($TMDINCC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TMDECHKC),2)==0.00) ? '' : "".number_format(array_sum($TMDECHKC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TMDIENDC),2)==0.00) ? '' : "".number_format(array_sum($TMDIENDC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TSaldoLFC),2)==0.00) ? '' : "".number_format(array_sum($TSaldoLFC),2));?></td>					
					<td ><?php echo ((number_format(array_sum($TCHKFC),2)==0.00) ? '' : "".number_format(array_sum($TCHKFC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TSaldoBC),2)==0.00) ? '' : "".number_format(array_sum($TSaldoBC),2));?></td>
					
					<td ><?php echo ((number_format(array_sum($TDPDC),2)==0.00) ? '' : "".number_format(array_sum($TDPDC),2));?></td>
					<td ><?php echo ((number_format(array_sum($TSaldoRC),2)==0.00) ? '' : "".number_format(array_sum($TSaldoRC),2));?></td>					
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					
				</tr>
				<tr>
					<table id="tblid_vista_detalles_dolares"  class="table bordered hover  display" >
						<thead>
							<tr>
								<th>CUENTA</th>
								<th>MONEDA</th>
								<th>TIPO CUENTA Cte.</th>
								<th>SALDO EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaSLA'], 0,10); ?></th>
								<th>MOV. ING. DEP</th>
								<th>MOV. ING. NC</th>
								<th>MOv. EGR. CHKC</th>
								<th>MOV. EGR. ND</th>					
								<th>SALDOS EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
								<th>CHEQUES FLOTANTES</th>
								<th>SALDO EN BANCOS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
								<th>DEPOSITOS NO DISPONIBLES</th>
								<th>DISPONIBLE REAL AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>	
							</tr>
							<tr><td colspan="13" id="Dolar">D&Oacute;LARES </td></tr>
						</thead>
						<tbody>
							
								 <?php
									if (!($MTMV)) {
										$TSaldoLAD[] 	= "";
										$TMDIDPD[]		= "";
										$TMDINCD[]		= "";
										$TMDECHKD[]		= "";
										$TMDIENDD[]		= "";
										$TSaldoLFD[]	= "";
										$TCHKFD[]		= "";
										$TSaldoBD[]		= "";
										$TDPDD[]		= "";
										$TSaldoRD[]		= "";
									} else {
										foreach ($MTMV as $key ) {
											if ((substr($key["MTipo"], 0,1))=="D") {

												$TSaldoLAD[] 	= $key['SaldoLA'];
												$TMDIDPD[]		= $key['MDIDP'];
												$TMDINCD[]		= $key['MDINC'];
												$TMDECHKD[]		= $key['MDECHK'];
												$TMDIENDD[]		= $key['MDIEND'];
												$TSaldoLFD[]	= $key['SaldoLF'];
												$TCHKFD[]		= $key['CHKF'];
												$TSaldoBD[]		= $key['SaldoB'];
												$TDPDD[]		= $key['DPD'];
												$TSaldoRD[]		= $key['SaldoR'];


												echo "
													<tr>
													 	<td >".$key['NCuenta']."</td>
														<td>".$key['MTipo']."</td>
														<td>".$key['Banco']."</td>
														<td > ".(((number_format($key['SaldoLA'],2)==0.00)) ? 'a' : "$ ".number_format($key['SaldoLA'],2))."</td>
														<td > 
															<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"DEP"'.")'> ".(((number_format($key['MDIDP'],2)==0.00)) ? '' : "".number_format($key['MDIDP'],2))."</a>
														</td>

														

														<td  > 
															<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDINC'],2)==0.00)) ? '' : "".number_format($key['MDINC'],2))."</a>
														</td>

														<td >
															<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CK"'.")'>".(((number_format($key['MDECHK'],2)==0.00)) ? '' : "".number_format($key['MDECHK'],2))."</a>
														</td>									
														<td > 
															<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDIEND'],2)==0.00)) ? '' : "".number_format($key['MDIEND'],2))."</a>
														</td>
														<td > ".(((number_format($key['SaldoLF'],2)==0.00)) ? '' : "$ ".number_format($key['SaldoLF'],2))."</td>
														<td >
															<a href='#' onclick='detalles_view(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CKF"'.")'>".(((number_format($key['CHKF'],2)==0.00)) ? '' : "".number_format($key['CHKF'],2))."</a>
														</td>
														<td > ".(((number_format($key['SaldoB'],2)==0.00)) ? '' : "$ ".number_format($key['SaldoB'],2))."</td>									
														<td > ".(((number_format($key['DPD'],2)==0.00)) ? '' : "".number_format($key['DPD'],2))."</td>
														<td > ".(((number_format($key['SaldoR'],2)==0.00)) ? '' : "$ ".number_format($key['SaldoR'],2))."</td>
													</tr>
												";
											}
										}
									}
									
										
									?>
									<tr>
										<td><br></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr id="TblFood">
									 	<td>TOTAL DOLARES</td>
										<td></td>
										<td></td>					
										<td ><?php echo ((number_format(array_sum($TSaldoLAD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoLAD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TMDIDPD),2)==0.00) ? '' : "".number_format(array_sum($TMDIDPD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TMDINCD),2)==0.00) ? '' : "".number_format(array_sum($TMDINCD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TMDECHKD),2)==0.00) ? '' : "".number_format(array_sum($TMDECHKD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TMDIENDD),2)==0.00) ? '' : "".number_format(array_sum($TMDIENDD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TSaldoLFD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoLFD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TCHKFD),2)==0.00) ? '' : "".number_format(array_sum($TCHKFD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TSaldoBD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoBD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TDPDD),2)==0.00) ? '' : "".number_format(array_sum($TDPDD),2));?></td>
										<td ><?php echo ((number_format(array_sum($TSaldoRD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoRD),2));?></td>

									</tr>
						</tbody>
					</table>
				</tr>
			</tbody>
             </form>
			</table>
			<div>
				<p id="actualizar">Última actualización: <?php echo $MTMV[0]['LastUpdate']; ?>
				</p>
			</div>
	</div>
</div>

<br><br>

<div id="ChipT"class="col s1 center "><br><br>
 	<div class="chip" >MOV. ING. DEP: Movimiento de Ingresos por Depositos.</div>
 	<div class="chip chip_text" >MOV. ING. NC: Movimiento de Ingresos por N/C.</div>	
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por Cheque</div>
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por N/D</div>
 </div>
<br><br>
 <script>
        
        function generarPdf(){
            document.getElementById('frmPDF').submit();
        }
    </script>

