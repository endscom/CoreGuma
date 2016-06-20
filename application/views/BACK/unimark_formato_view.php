<br><br>
<div class="row" style="margin-bottom:0">
	
<div class="col l2" style="margin-left:25%;" >
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
	</div>	

</div>
<br>
 <div id="ec_pdf">
                <form id="frmPDF" name="frmPDF" action="<?php echo base_url();?>index.php/pdf" target="_blank" method="post"></form>
  </div>
 
<div class="row">
	<div class="col s12">
		<div class="col s6" style="text-align: center;">
			<h4 style="color:#00658F; font-weight:bold; font-size:25px; ">DISPONIBLE DE BANCO CORTE  <?php echo substr($MTMV[0]['FechaM'], 0,10); ?></h4>
			
		</div>
			    
        
        <br>
		<table id="tblid_vista_detalles" class="datos table bordered hover  display" cellspacing="1" cellpadding="2">
			<thead >
				<tr style=" background-color: #00658F; font-weight:bold; color:#ffffff; text-aling:center">
					<th style="color:white; font-size:15px;">CUENTA</th>
					<th style="color:white; font-size:15px;">MONEDA</th>
					<th style="color:white; font-size:15px;">TIPO DE CUENTA Cte.</th>
					<th style="color:white; font-size:15px;">SALDO EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaSLA'], 0,10); ?></th>
					<th style="color:white; font-size:15px;">MOV. ING. DEP</th>
					<th style="color:white; font-size:15px;">MOV. ING. NC</th>
					<th style="color:white; font-size:15px;">MOv. EGR. CHKC</th>
					<th style="color:white; font-size:15px;">MOV. EGR. ND</th>					
					<th style="color:white; font-size:15px;">SALDOS EN LIBROS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
					<th style="color:white; font-size:15px;">CHEQUES FLOTANTES</th>
					<th style="color:white; font-size:15px;">SALDO EN BANCOS AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
					<th style="color:white; font-size:15px;">DEPOSITOS NO DISPONIBLES</th>
					<th style="color:white; font-size:15px;">DISPONIBLE REAL AL <br><?php echo substr($MTMV[0]['FechaM'], 0,10); ?></th>
				</tr>
			</thead>
			<tbody>
				 
				 <tr>
				 	<td colspan="13" style="font-weight:bold; font-size:15px; text-align: center; ">CÓRDOBAS</td>					
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
									<td > ".(((number_format($key['SaldoLA'],2)==0.00)) ? '' : "C$ ".number_format($key['SaldoLA'],2))."</td>								

									<td style='font-weight:bold; font-size:15px;' > 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"DEP"'.")'>".(((number_format($key['MDIDP'],2)==0.00)) ? '' : "".number_format($key['MDIDP'],2))."</a>
									</td>

									<td style='font-weight:bold; font-size:15px;' > 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"NC"'.")'>".(((number_format($key['MDINC'],2)==0.00)) ? '' : "".number_format($key['MDINC'],2))."</a>
									</td>

									<td style='font-weight:bold; font-size:15px;'> 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CK"'.")'>".(((number_format($key['MDECHK'],2)==0.00)) ? '' : "".number_format($key['MDECHK'],2))."</a>
									</td>

									<td style='font-weight:bold; font-size:15px;'> 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDIEND'],2)==0.00)) ? '' : "".number_format($key['MDIEND'],2))."</a>
									</td>

									<td > ".(((number_format($key['SaldoLF'],2)==0.00)) ? '' : "C$ ".number_format($key['SaldoLF'],2))."</td>
									<td style='font-weight:bold; font-size:15px;'>
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CKF"'.")'>".(((number_format($key['CHKF'],2)==0.00)) ? '' : "".number_format($key['CHKF'],2))."</a>
									</td>
									<td > ".(((number_format($key['SaldoB'],2)==0.00)) ? '' : "C$ ".number_format($key['SaldoB'],2))."</td>								
									<td > ".(((number_format($key['DPD'],2)==0.00)) ? '' : "".number_format($key['DPD'],2))."</td>
									<td > ".(((number_format($key['SaldoR'],2)==0.00)) ? '' : "C$ ".number_format($key['SaldoR'],2))."</td>								
								</tr>
							";
						}
					}
				}
				
				
					
				?>
				 
				
				<tr style=" background-color: #00658F; font-weight:bold; color:#fff; text-aling:center;">
					<td style="color:white;">TOTAL CORDOBAS</td>
					<td></td>
					<td></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoLAC),2)==0.00) ? '' : "C$ ".number_format(array_sum($TSaldoLAC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDIDPC),2)==0.00) ? '' : "".number_format(array_sum($TMDIDPC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDINCC),2)==0.00) ? '' : "".number_format(array_sum($TMDINCC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDECHKC),2)==0.00) ? '' : "".number_format(array_sum($TMDECHKC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDIENDC),2)==0.00) ? '' : "".number_format(array_sum($TMDIENDC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoLFC),2)==0.00) ? '' : "C$ ".number_format(array_sum($TSaldoLFC),2));?></td>					
					<td style="color:white;"><?php echo ((number_format(array_sum($TCHKFC),2)==0.00) ? '' : "".number_format(array_sum($TCHKFC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoBC),2)==0.00) ? '' : "C$ ".number_format(array_sum($TSaldoBC),2));?></td>
					
					<td style="color:white;"><?php echo ((number_format(array_sum($TDPDC),2)==0.00) ? '' : "".number_format(array_sum($TDPDC),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoRC),2)==0.00) ? '' : "C$ ".number_format(array_sum($TSaldoRC),2));?></td>					
				</tr>
				<tr>
					<td colspan="13" style="font-weight:bold; font-size:15px; text-align: center;">DÓLARES </td>
				</tr>
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
									<td style='font-weight:bold; font-size:15px;'> 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"DEP"'.")'> ".(((number_format($key['MDIDP'],2)==0.00)) ? '' : "".number_format($key['MDIDP'],2))."</a>
									</td>

									

									<td style='font-weight:bold; font-size:15px;' > 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDINC'],2)==0.00)) ? '' : "".number_format($key['MDINC'],2))."</a>
									</td>

									<td style='font-weight:bold; font-size:15px;'>
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CK"'.")'>".(((number_format($key['MDECHK'],2)==0.00)) ? '' : "".number_format($key['MDECHK'],2))."</a>
									</td>									
									<td style='font-weight:bold; font-size:15px;'> 
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"ND"'.")'>".(((number_format($key['MDIEND'],2)==0.00)) ? '' : "".number_format($key['MDIEND'],2))."</a>
									</td>
									<td > ".(((number_format($key['SaldoLF'],2)==0.00)) ? '' : "$ ".number_format($key['SaldoLF'],2))."</td>
									<td style='font-weight:bold; font-size:15px;'>
										<a href='#' onclick='MovDetalleCnt(".$key['IdDB'].",".'"'.substr($MTMV[0]['FechaM'], 0,10).'"'.",".'"CKF"'.")'>".(((number_format($key['CHKF'],2)==0.00)) ? '' : "".number_format($key['CHKF'],2))."</a>
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
				<tr id="TblFood" style=" background-color: #00658F; font-weight:bold; color:#fff; text-aling:center">
				 	<td style="color:white;">TOTAL DOLARES</td>
					<td ></td>
					<td></td>					
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoLAD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoLAD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDIDPD),2)==0.00) ? '' : "".number_format(array_sum($TMDIDPD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDINCD),2)==0.00) ? '' : "".number_format(array_sum($TMDINCD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDECHKD),2)==0.00) ? '' : "".number_format(array_sum($TMDECHKD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TMDIENDD),2)==0.00) ? '' : "".number_format(array_sum($TMDIENDD),2));?></td>
					<td style="color:white;" ><?php echo ((number_format(array_sum($TSaldoLFD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoLFD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TCHKFD),2)==0.00) ? '' : "".number_format(array_sum($TCHKFD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoBD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoBD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TDPDD),2)==0.00) ? '' : "".number_format(array_sum($TDPDD),2));?></td>
					<td style="color:white;"><?php echo ((number_format(array_sum($TSaldoRD),2)==0.00) ? '' : "$ ".number_format(array_sum($TSaldoRD),2));?></td>

				</tr>
			</tbody>
		
			</table>
			<div>
				<p style=" color:#00658F; font-weight:bold; text-align: right; font-style: italic; ">Última actualización: <?php echo $MTMV[0]['LastUpdate']; ?>
				</p>
			</div>
	</div>
</div>

<br><br>
<div class="col s1 "style="text-align: right;font-weight:bold;"><br><br>
 	<div class="chip" >MOV. ING. DEP: Movimiento de Ingresos por Depositos.</div>
 	<div class="chip chip_text" >MOV. ING. NC: Movimiento de Ingresos por N/C.</div>	
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por Cheque</div>
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por N/D</div>
 </div>
  <script>
        
        function generarPdf(){
            document.getElementById('frmPDF').submit();
        }/*
     function generarExcel(){
          document.getElementById('frmExcel').submit();
     }*/
    </script>