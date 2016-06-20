<br>
<div class="row">
	<div class="col s12">
	<div class="center"><h5>DISPONIBLES DE BANCOS<span id="SpanEmp"></span> CORTE <span id="Idspn">0000-00-00</span></h5>	</div>
	<div class="right">
		<form action="XLS" method="post" target="_blank" id="FormularioExportacion">
			<p><a href="#" class="botonExcel"> Exportar a Excel </a></p>
			<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />											
		</form>	
	</div>
	<div id="TblCordoba">
		<table id="Test" class="TablaDatos table hover striped display" cellspacing="1" cellpadding="2" >
			<thead>
				<tr>
					<th >No. De CTA </th>
					<th>MONEDA</th>
					<th>TIPO DE CUENTO Cta. Cte</th>
					<th>SALDO EN LIBROS AL 00/00/0000</th>
					<th>MOV. ING. DEP</th>
					<th>MOV. ING. NC</th>
					<th>MOV. EGR. CHKC</th>
					<th>MOV. EGR. ND</th>					
					<th>SALDOS EN LIBROS AL 00/00/0000</th>
					<th>CHEQUES FLOTANTES</th>
					<th>SALDO EN BANCOS AL 00/00/0000</th>
					<th>DESPOSITOS NO DISPONIBLES</th>
					<th>DISPONIBLE REAL AL 00/00/00000</th>
				</tr>
			</thead>
			<tbody>
				 
				<tr>
				 	<td style="text-align: left"colspan="13">CORDOBAS</td>					
				</tr>
				<tr>
				 	<td colspan="13">
				 		
					</td>					
				</tr>
				<tr>
				 	<td style="text-align: left"colspan="13">TOTAL Cordobas</td>
					
				</tr>
				
				<tr>
					<td style="text-align: left" colspan="13">Dolares</td>
				</tr>
				<tr>
				 	<td colspan="13">
				 		
					</td>					
				</tr>
				
				<tr id="TblFood"class="tableizer-lastrow" >
				 	<td colspan="13">TOTAL DOLARES</td>				
				</tr>
			</tbody>
			</table>
	</div>
	<div id="TblDolares"></div>

		
	</div>
</div>

 <br><br>	
 <div class="col s1 center">
 	<div class="chip"><strong>MOV. ING. DEP: Movimiento de Ingresos por Depositos.</strong></div>
 	<div class="chip">MOV. ING. NC: Movimiento de Ingresos por N/C.</div>	
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por Cheque</div>
 	<div class="chip">MOV. EGR. CHKC: Movimiento de Egreso por N/D</div>
 	<div class="right-align"><p >(Ultima Actualizacion: <span id="idlstupt"></span> )</p></div>
 </div>
