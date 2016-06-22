
/**
 * Created by marangelo on 30/01/2016.
 */
 //INICIALIZARDORES
 $(document).ready(function() {
    $('#TblMaster').DataTable(
    	{
        	"aaSorting": [[ 1, "desc" ]]
    	}
      
     );


         $('.modal-trigger').leanModal();

 	 	 $('select').material_select();
 	 	 	
 	 	

 	$('#tbl_detalles').DataTable();
 	$('#TblveditCuenta').DataTable();
 	$('#TblMasterMov').DataTable(
			"language": {
		 "emptyTable": "No hay datos disponibles en la tabla",
				 "lengthMenu": '_MENU_ ',
				 "emptyTable": "NO HAY DATOS EN LA TABLA",
				 "search": '<i class=" material-icons">search</i>',
				 "loadingRecords": "CARGANDO...",
				 "paginate": {
			 "first": "Primera",
					 "last": "Última ",
					 "next":       "Siguiente",
					 "previous":   "Anterior"
		 }

	 );
 	$('#tblid_vista_detalles').DataTable();
 	$('#tblid_vista_detalles_dolares').DataTable();
 	/******************/
 	
 	

 	
 	//MENU PRINCIPAL
	$(".button-collapse").sideNav(); 
	
	$(".botonExcel").click(function(event) {
			$("#datos_a_enviar").val( $("<div>").append( $("#tblfinal").eq(0).clone()).html());
			$("#FormularioExportacion").submit();
		});




} );
 

function eliminar(id)
{	alert("jaksjdsakdjsa");
	//document.getElementById("del").value=id;
	$('#modal2').openModal();
} 
 
function toTimestamp(strDate){
   var datum = Date.parse(strDate);
   return datum/1000;
}
function cuenta()
{
	document.frmadd.submit() 
}

function MovDetalle(idCuenta,Fecha,TIPO){	
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no";	
	window.open("../DetalleMovimiento/"+idCuenta+"/"+Fecha+"/"+TIPO,"",opciones);

}
function MovDetalleCnt(idCuenta,Fecha,TIPO){	

	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no";	
	window.open("../DetalleMovimiento/"+idCuenta+"/"+Fecha+"/"+TIPO,"",opciones); 	
}
function detalles_view(idCuenta,Fecha,TIPO){	
	
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no";	
	window.open("../../DetalleMovimiento/"+idCuenta+"/"+Fecha+"/"+TIPO,"",opciones); 	
}
 $("#IdMenu,#mobile-demo").find('li').click(function(){

 	var ClassRemover = $('#test').attr('class');
 	var ClassRemoverFooter = $('#TblFood').attr('class');
 	$(".active").removeClass();
 	$("#"+this.id).addClass('active');
 	var Fecha = $("#idFlaPre").val()
 	FechaPrint = date('d/m/Y',toTimestamp(Fecha+' 00:00:00'))
 	
	$("#Idspn").html(FechaPrint);
 	if (Fecha=="") {
 		alert("Seleccione la fecha que desea revisar.")

 	} else{
 		switch (this.id){
		    case 'UMK':	    	    	
		    	/*$(".tableizer-table th,.tableizer-lastrow td").removeClass();
		    	$( "."+ClassRemover+ " th,."+ClassRemoverFooter+" td").removeClass( ClassRemover ).addClass( ClassRemover+" light-blue lighten-1" );*/
		    	$("#SpanEmp").html("UNIMARK")
		    	$.ajax({					
					url: "AjaxEmpre?Fe="+Fecha+"&Empr="+1,				
					}).done(function( msg ) {
						Filas='';						
						
						if (msg=="") {
							Filas +='<tr><td  colspan="13">NO existe informacion para esta fecha: '+FechaPrint+'</td></tr><tr><td colspan="13"></td></tr>'
						} else{
							var dataJson = JSON.parse(msg);  	
							Filas +='<tr><td  colspan="13">CORDOBAS</td></tr><tr><td colspan="13"></td></tr>'	
							var CT1=0,CT2=0,CT3=0,CT4=0,CT5=0,CT6=0,CT7=0,CT8=0,CT9=0,CT10=0;
							Filas += '<thead>'+
								'<tr >'+
									'<th >No. De CTA</th>'+
									'<th >MONEDA</th>'+
									'<th >TIPO DE CUENTO Cta. Cte</th>'+
									'<th >SALDO EN LIBROS AL '+(dataJson.data[0].FechaSLA).substr(0,10)+'</th>'+									
									'<th >MOV. ING. DEP</th>'+
									'<th >MOV. ING. NC</th>'+
									'<th >MOv. EGR. CHKC</th>'+
									'<th >MOV. EGR. ND</th>'+
									'<th ">SALDOS EN LIBROS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+									
									'<th ">CHEQUES FLOTANTES</th>'+
									'<th ">SALDO EN BANCOS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+
									'<th ">DESPOSITOS NO DISPONIBLES</th>'+
									'<th ">DISPONIBLE REAL AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+

								'</tr>'+
							'</thead>'
							$("#idlstupt").html(dataJson.data[0].LastUpdate)
							for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="C") {
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+										
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
	
									
									
									CT1 += parseFloat(dataJson.data[i].SaldoLA);
									CT2 += parseFloat(dataJson.data[i].MDIDP);
									CT3 += parseFloat(dataJson.data[i].MDINC);
									CT4 += parseFloat(dataJson.data[i].MDECHK);
									CT5 += parseFloat(dataJson.data[i].MDIEND);
									CT6 += parseFloat(dataJson.data[i].SaldoLF);
									CT7 += parseFloat(dataJson.data[i].CHKF);
									CT8 += parseFloat(dataJson.data[i].SaldoB);
									CT9 += parseFloat(dataJson.data[i].DPD);
									CT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
							
						};	
							Filas +='<tr id="TblFood">'+
								 	'<td>TOTAL CORDOBAS</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>C$ '+number_format(CT1,2)+'</td>'+
									'<td> '+number_format(CT2,2)+'</td>'+
									'<td>C$ '+number_format(CT3,2)+'</td>'+
									'<td> '+number_format(CT4,2)+'</td>'+
									'<td> '+number_format(CT5,2)+'</td>'+
									'<td>C$ '+number_format(CT6,2)+'</td>'+
									'<td> '+number_format(CT7,2)+'</td>'+
									'<td>C$ '+number_format(CT8,2)+'</td>'+
									'<td> '+number_format(CT9,2)+'</td>'+
									'<td>C$ '+number_format(CT10,2)+'</td>'+
								'</tr>'
						Filas +='<tr><td colspan="13">DOLARES</td></tr><tr><td colspan="13"></td></tr>';
						var DT1=0,DT2=0,DT3=0,DT4=0,DT5=0,DT6=0,DT7=0,DT8=0,DT9=0,DT10=0;
						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="D") {
								
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+										
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'			
									
									DT1 += parseFloat(dataJson.data[i].SaldoLA);
									DT2 += parseFloat(dataJson.data[i].MDIDP);
									DT3 += parseFloat(dataJson.data[i].MDINC);
									DT4 += parseFloat(dataJson.data[i].MDECHK);
									DT5 += parseFloat(dataJson.data[i].MDIEND);
									DT6 += parseFloat(dataJson.data[i].SaldoLF);
									DT7 += parseFloat(dataJson.data[i].CHKF);
									DT8 += parseFloat(dataJson.data[i].SaldoB);
									DT9 += parseFloat(dataJson.data[i].DPD);
									DT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
						};	
						Filas +='<tr >'+
								 	'<td>TOTAL DOLARES</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>$ '+number_format(DT1,2)+'</td>'+
									'<td> '+number_format(DT2,2)+'</td>'+
									'<td>$ '+number_format(DT3,2)+'</td>'+
									'<td> '+number_format(DT4,2)+'</td>'+
									'<td> '+number_format(DT5,2)+'</td>'+
									'<td>$ '+number_format(DT6,2)+'</td>'+
									'<td> '+number_format(DT7,2)+'</td>'+
									'<td>$ '+number_format(DT8,2)+'</td>'+
									'<td> '+number_format(DT9,2)+'</td>'+
									'<td>$ '+number_format(DT10,2)+'</td>'+
								'</tr>';							
						};
						
						$("#TblCordoba").html('<table  id="tblfinal"  >'+ Filas +'</table>')
						//$("#TblDolares").html('<table>'+ FilasD +'</table>')
					});

		    break;
		    case 'UMA':	    	
		    	/*$(".tableizer-table th,.tableizer-lastrow td").removeClass();
		    	$( "."+ClassRemover+ " th,."+ClassRemoverFooter+" td").removeClass( ClassRemover ).addClass( ClassRemover+" green darken-4" );*/
		    	$("#SpanEmp").html("UMAAGRO");
		    	$.ajax({					
					url: "AjaxEmpre?Fe="+Fecha+"&Empr="+2,
					}).done(function( msg ) {
						Filas='';						
						
						if (msg=="") {
							Filas +='<tr><td  colspan="13">NO existe informacion para esta fecha: '+FechaPrint+'</td></tr><tr><td colspan="13"></td></tr>'
						} else{
							var dataJson = JSON.parse(msg);
							Filas +='<tr><td colspan="13">CORDOBAS</td></tr><tr><td colspan="13"></td></tr>'												
							var CT1=0,CT2=0,CT3=0,CT4=0,CT5=0,CT6=0,CT7=0,CT8=0,CT9=0,CT10=0;

							Filas += '<thead>'+
								'<tr >'+
									'<th>No. De CTA</th>'+
									'<th >MONEDA</th>'+
									'<th >TIPO DE CUENTO Cta. Cte</th>'+
									'<th >SALDO EN LIBROS AL '+(dataJson.data[0].FechaSLA).substr(0,10)+'</th>'+									
									'<th >MOV. ING. DEP</th>'+
									'<th >MOV. ING. NC</th>'+
									'<th >MOv. EGR. CHKC</th>'+
									'<th >MOV. EGR. ND</th>'+
									'<th>SALDOS EN LIBROS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+									
									'<th>CHEQUES FLOTANTES</th>'+
									'<th>SALDO EN BANCOS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+
									'<th>DESPOSITOS NO DISPONIBLES</th>'+
									'<th>DISPONIBLE REAL AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+

								'</tr>'+
							'</thead>'
							$("#idlstupt").html(dataJson.data[0].LastUpdate)


						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="C") {
								Filas += '<tr>'+			
										'<td>'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
									
									
									CT1 += parseFloat(dataJson.data[i].SaldoLA);
									CT2 += parseFloat(dataJson.data[i].MDIDP);
									CT3 += parseFloat(dataJson.data[i].MDINC);
									CT4 += parseFloat(dataJson.data[i].MDECHK);
									CT5 += parseFloat(dataJson.data[i].MDIEND);
									CT6 += parseFloat(dataJson.data[i].SaldoLF);
									CT7 += parseFloat(dataJson.data[i].CHKF);
									CT8 += parseFloat(dataJson.data[i].SaldoB);
									CT9 += parseFloat(dataJson.data[i].DPD);
									CT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
							
						};
						
							Filas +='<tr id="TblFood" >'+
								 	'<td>TOTAL CORDOBAS</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>C$ '+number_format(CT1,2)+'</td>'+
									'<td> '+number_format(CT2,2)+'</td>'+
									'<td>C$ '+number_format(CT3,2)+'</td>'+
									'<td> '+number_format(CT4,2)+'</td>'+
									'<td> '+number_format(CT5,2)+'</td>'+
									'<td>C$ '+number_format(CT6,2)+'</td>'+
									'<td> '+number_format(CT7,2)+'</td>'+
									'<td>C$ '+number_format(CT8,2)+'</td>'+
									'<td> '+number_format(CT9,2)+'</td>'+
									'<td>C$ '+number_format(CT10,2)+'</td>'+
								'</tr>'
						Filas +='<tr><td  colspan="13">DOLARES</td></tr><tr><td colspan="13"></td></tr>'
						var DT1=0,DT2=0,DT3=0,DT4=0,DT5=0,DT6=0,DT7=0,DT8=0,DT9=0,DT10=0;
						for (var i = 0; i < dataJson.data.length; i++) { 

							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="D") {
								
							Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'										
									
									DT1 += parseFloat(dataJson.data[i].SaldoLA);
									DT2 += parseFloat(dataJson.data[i].MDIDP);
									DT3 += parseFloat(dataJson.data[i].MDINC);
									DT4 += parseFloat(dataJson.data[i].MDECHK);
									DT5 += parseFloat(dataJson.data[i].MDIEND);
									DT6 += parseFloat(dataJson.data[i].SaldoLF);
									DT7 += parseFloat(dataJson.data[i].CHKF);
									DT8 += parseFloat(dataJson.data[i].SaldoB);
									DT9 += parseFloat(dataJson.data[i].DPD);
									DT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
						};
						Filas +='<tr id="TblFood">'+
								 	'<td>TOTAL DOLARES</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>$ '+number_format(DT1,2)+'</td>'+
									'<td> '+number_format(DT2,2)+'</td>'+
									'<td>$ '+number_format(DT3,2)+'</td>'+
									'<td> '+number_format(DT4,2)+'</td>'+
									'<td> '+number_format(DT5,2)+'</td>'+
									'<td>$ '+number_format(DT6,2)+'</td>'+
									'<td> '+number_format(DT7,2)+'</td>'+
									'<td>$ '+number_format(DT8,2)+'</td>'+
									'<td> '+number_format(DT9,2)+'</td>'+
									'<td>$ '+number_format(DT10,2)+'</td>'+
								'</tr>'
						};						
						
						
						
						$("#TblCordoba").html('<table  id="tblfinal"  >'+ Filas +'</table>')
						//$("#TblDolares").html('<table>'+ FilasD +'</table>')
					});

					
		    	
		    break;
		    case 'UMV':	    	
		    	/*$(".tableizer-table th,.tableizer-lastrow td").removeClass();
		    	$( "."+ClassRemover+ " th,."+ClassRemoverFooter+" td").removeClass( ClassRemover ).addClass( ClassRemover+" green darken-4" );*/
		    	$("#SpanEmp").html("UMAVET");
		    	$.ajax({					
					url: "AjaxEmpre?Fe="+Fecha+"&Empr="+3,
					}).done(function( msg ) {
						Filas='';						
						
						if (msg=="") {
							Filas +='<tr><td  colspan="13">NO existe informacion para esta fecha: '+FechaPrint+'</td></tr><tr><td colspan="13"></td></tr>'
						} else{
							var dataJson = JSON.parse(msg);
							Filas +='<tr><td style="text-align: left" colspan="13">CORDOBAS</td></tr><tr><td colspan="13"></td></tr>'												
							var CT1=0,CT2=0,CT3=0,CT4=0,CT5=0,CT6=0,CT7=0,CT8=0,CT9=0,CT10=0;
							Filas += '<thead>'+
								'<tr class="tableizer-firstrow ">'+
									'<th >No. De CTA</th>'+
									'<th>MONEDA</th>'+
									'<th >TIPO DE CUENTO Cta. Cte</th>'+
									'<th>SALDO EN LIBROS AL '+(dataJson.data[0].FechaSLA).substr(0,10)+'</th>'+									
									'<th >MOV. ING. DEP</th>'+
									'<th >MOV. ING. NC</th>'+
									'<th >MOv. EGR. CHKC</th>'+
									'<th >MOV. EGR. ND</th>'+
									'<th>SALDOS EN LIBROS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+									
									'<th>CHEQUES FLOTANTES</th>'+
									'<th>SALDO EN BANCOS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+
									'<th>DESPOSITOS NO DISPONIBLES</th>'+
									'<th>DISPONIBLE REAL AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+

								'</tr>'+
							'</thead>'
							$("#idlstupt").html(dataJson.data[0].LastUpdate)
						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="C") {
							Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
									
									
									CT1 += parseFloat(dataJson.data[i].SaldoLA);
									CT2 += parseFloat(dataJson.data[i].MDIDP);
									CT3 += parseFloat(dataJson.data[i].MDINC);
									CT4 += parseFloat(dataJson.data[i].MDECHK);
									CT5 += parseFloat(dataJson.data[i].MDIEND);
									CT6 += parseFloat(dataJson.data[i].SaldoLF);
									CT7 += parseFloat(dataJson.data[i].CHKF);
									CT8 += parseFloat(dataJson.data[i].SaldoB);
									CT9 += parseFloat(dataJson.data[i].DPD);
									CT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
							
						};
						
							Filas +='<tr id="TblFood1" >'+
								 	'<td>TOTAL CORDOBAS</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>C$ '+number_format(CT1,2)+'</td>'+
									'<td> '+number_format(CT2,2)+'</td>'+
									'<td>C$ '+number_format(CT3,2)+'</td>'+
									'<td> '+number_format(CT4,2)+'</td>'+
									'<td> '+number_format(CT5,2)+'</td>'+
									'<td>C$ '+number_format(CT6,2)+'</td>'+
									'<td> '+number_format(CT7,2)+'</td>'+
									'<td>C$ '+number_format(CT8,2)+'</td>'+
									'<td> '+number_format(CT9,2)+'</td>'+
									'<td>C$ '+number_format(CT10,2)+'</td>'+
								'</tr>'
						Filas +='<tr><td  colspan="13">DOLARES</td></tr><tr><td colspan="13"></td></tr>'
						var DT1=0,DT2=0,DT3=0,DT4=0,DT5=0,DT6=0,DT7=0,DT8=0,DT9=0,DT10=0;
						for (var i = 0; i < dataJson.data.length; i++) { 

							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="D") {
								
								
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
									
									DT1 += parseFloat(dataJson.data[i].SaldoLA);
									DT2 += parseFloat(dataJson.data[i].MDIDP);
									DT3 += parseFloat(dataJson.data[i].MDINC);
									DT4 += parseFloat(dataJson.data[i].MDECHK);
									DT5 += parseFloat(dataJson.data[i].MDIEND);
									DT6 += parseFloat(dataJson.data[i].SaldoLF);
									DT7 += parseFloat(dataJson.data[i].CHKF);
									DT8 += parseFloat(dataJson.data[i].SaldoB);
									DT9 += parseFloat(dataJson.data[i].DPD);
									DT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
						};
						Filas +='<tr id="TblFood">'+
								 	'<td>TOTAL DOLARES</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>$ '+number_format(DT1,2)+'</td>'+
									'<td> '+number_format(DT2,2)+'</td>'+
									'<td>$ '+number_format(DT3,2)+'</td>'+
									'<td> '+number_format(DT4,2)+'</td>'+
									'<td> '+number_format(DT5,2)+'</td>'+
									'<td>$ '+number_format(DT6,2)+'</td>'+
									'<td> '+number_format(DT7,2)+'</td>'+
									'<td>$ '+number_format(DT8,2)+'</td>'+
									'<td> '+number_format(DT9,2)+'</td>'+
									'<td>$ '+number_format(DT10,2)+'</td>'+
								'</tr>'
						};
						
						
						
						
						$("#TblCordoba").html('<table  id="tblfinal"  >'+ Filas +'</table>')
						//$("#TblDolares").html('<table>'+ FilasD +'</table>')
					});

					
		    	
		    break;
		    case 'INN':	    	
		    	/*$(".tableizer-table th,.tableizer-lastrow td").removeClass();	    		    	
		    	$( "."+ClassRemover+ " th,."+ClassRemoverFooter+" td").removeClass( ClassRemover ).addClass( ClassRemover+" orange accent-4" );*/
		    	$("#SpanEmp").html("INNOVA");
		    	$.ajax({					
					url: "AjaxEmpre?Fe="+Fecha+"&Empr="+4,
					}).done(function( msg ) {
						Filas='';						
						
						if (msg=="") {
							Filas +='<tr><td  colspan="13">NO existe informacion para esta fecha: '+FechaPrint+'</td></tr><tr><td colspan="13"></td></tr>'
						} else{
						var dataJson = JSON.parse(msg);
						var CT1=0,CT2=0,CT3=0,CT4=0,CT5=0,CT6=0,CT7=0,CT8=0,CT9=0,CT10=0;
						Filas += '<thead>'+
								'<tr >'+
									'<th >No. De CTA</th>'+
									'<th >MONEDA</th>'+
									'<th >TIPO DE CUENTO Cta. Cte</th>'+
									'<th >SALDO EN LIBROS AL '+(dataJson.data[0].FechaSLA).substr(0,10)+'</th>'+									
									'<th >MOV. ING. DEP</th>'+
									'<th >MOV. ING. NC</th>'+
									'<th >MOv. EGR. CHKC</th>'+
									'<th >MOV. EGR. ND</th>'+
									'<th >SALDOS EN LIBROS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+									
									'<th >CHEQUES FLOTANTES</th>'+
									'<th >SALDO EN BANCOS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+
									'<th >DESPOSITOS NO DISPONIBLES</th>'+
									'<th >DISPONIBLE REAL AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+

								'</tr>'+
							'</thead>'
						$("#idlstupt").html(dataJson.data[0].LastUpdate)
						Filas +='<tr><td colspan="13">CORDOBAS</td></tr><tr><td colspan="13"></td></tr>'												
						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="C") {
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
									
									CT1 += parseFloat(dataJson.data[i].SaldoLA);
									CT2 += parseFloat(dataJson.data[i].MDIDP);
									CT3 += parseFloat(dataJson.data[i].MDINC);
									CT4 += parseFloat(dataJson.data[i].MDECHK);
									CT5 += parseFloat(dataJson.data[i].MDIEND);
									CT6 += parseFloat(dataJson.data[i].SaldoLF);
									CT7 += parseFloat(dataJson.data[i].CHKF);
									CT8 += parseFloat(dataJson.data[i].SaldoB);
									CT9 += parseFloat(dataJson.data[i].DPD);
									CT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
							
						};
						
							Filas +='<tr id="TblFood2" >'+
								 	'<td>TOTAL CORDOBAS</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>C$ '+number_format(CT1,2)+'</td>'+
									'<td> '+number_format(CT2,2)+'</td>'+
									'<td>C$ '+number_format(CT3,2)+'</td>'+
									'<td> '+number_format(CT4,2)+'</td>'+
									'<td> '+number_format(CT5,2)+'</td>'+
									'<td>C$ '+number_format(CT6,2)+'</td>'+
									'<td> '+number_format(CT7,2)+'</td>'+
									'<td>C$ '+number_format(CT8,2)+'</td>'+
									'<td> '+number_format(CT9,2)+'</td>'+
									'<td>C$ '+number_format(CT10,2)+'</td>'+
								'</tr>'
						Filas +='<tr><td  colspan="13">DOLARES</td></tr><tr><td colspan="13"></td></tr>'
						var DT1=0,DT2=0,DT3=0,DT4=0,DT5=0,DT6=0,DT7=0,DT8=0,DT9=0,DT10=0;
						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="D") {
								
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'											
									
									DT1 += parseFloat(dataJson.data[i].SaldoLA);
									DT2 += parseFloat(dataJson.data[i].MDIDP);
									DT3 += parseFloat(dataJson.data[i].MDINC);
									DT4 += parseFloat(dataJson.data[i].MDECHK);
									DT5 += parseFloat(dataJson.data[i].MDIEND);
									DT6 += parseFloat(dataJson.data[i].SaldoLF);
									DT7 += parseFloat(dataJson.data[i].CHKF);
									DT8 += parseFloat(dataJson.data[i].SaldoB);
									DT9 += parseFloat(dataJson.data[i].DPD);
									DT10 += parseFloat(dataJson.data[i].SaldoR);
							};
							
						};
							Filas +='<tr id="TblFood" >'+
								 	'<td>TOTAL DOLARES</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>$ '+number_format(DT1,2)+'</td>'+
									'<td> '+number_format(DT2,2)+'</td>'+
									'<td>$ '+number_format(DT3,2)+'</td>'+
									'<td> '+number_format(DT4,2)+'</td>'+
									'<td> '+number_format(DT5,2)+'</td>'+
									'<td>$ '+number_format(DT6,2)+'</td>'+
									'<td> '+number_format(DT7,2)+'</td>'+
									'<td>$ '+number_format(DT8,2)+'</td>'+
									'<td> '+number_format(DT9,2)+'</td>'+
									'<td>$ '+number_format(DT10,2)+'</td>'+
								'</tr>'

						};
						
						
						$("#TblCordoba").html('<table  id="tblfinal"  >'+ Filas +'</table>')
						//$("#TblDolares").html('<table>'+ FilasD +'</table>')
					});
		    break;
		    case 'AGL':	    	
		    	/*$(".tableizer-table th,.tableizer-lastrow td").removeClass();	    		    	
		    	$( "."+ClassRemover+ " th,."+ClassRemoverFooter+" td").removeClass( ClassRemover ).addClass( ClassRemover+" indigo darken-4" );*/
		    	$("#SpanEmp").html("AGLOSA");
		    	$.ajax({					
					url: "AjaxEmpre?Fe="+Fecha+"&Empr=5",
					}).done(function( msg ) {
						Filas='';						
					
						if (msg=="") {
							Filas +='<tr><td style="text-align: center" colspan="13">NO existe informacion para esta fecha: '+FechaPrint+'</td></tr><tr><td colspan="13"></td></tr>'
						} else{
						var dataJson = JSON.parse(msg);  	
						var CT1=0,CT2=0,CT3=0,CT4=0,CT5=0,CT6=0,CT7=0,CT8=0,CT9=0,CT10=0;					
						Filas += '<thead>'+
								'<tr >'+
									'<th>No. De CTA</th>'+
									'<th >MONEDA</th>'+
									'<th >TIPO DE CUENTO Cta. Cte</th>'+
									'<th >SALDO EN LIBROS AL '+(dataJson.data[0].FechaSLA).substr(0,10)+'</th>'+									
									'<th >MOV. ING. DEP</th>'+
									'<th >MOV. ING. NC</th>'+
									'<th >MOV. EGR. CHKC</th>'+
									'<th >MOV. EGR. ND</th>'+
									'<th >SALDOS EN LIBROS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+									
									'<th >CHEQUES FLOTANTES</th>'+
									'<th >SALDO EN BANCOS AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+
									'<th >DEPOSITOS NO DISPONIBLES</th>'+
									'<th >DISPONIBLE REAL AL '+(dataJson.data[0].FechaM).substr(0,10)+'</th>'+

								'</tr>'+
							'</thead>'
							$("#idlstupt").html(dataJson.data[0].LastUpdate)
						Filas +='<tbody>'
						Filas +='<tr><td  colspan="13">CORDOBAS</td></tr><tr><td colspan="13"></td></tr>'												
						for (var i = 0; i < dataJson.data.length; i++) { 

							var tipoC = dataJson.data[i].MTipo.substring(0, 1); 
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="C") {
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>C$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'	
									
									
									CT1 += parseFloat(dataJson.data[i].SaldoLA);
									CT2 += parseFloat(dataJson.data[i].MDIDP);
									CT3 += parseFloat(dataJson.data[i].MDINC);
									CT4 += parseFloat(dataJson.data[i].MDECHK);
									CT5 += parseFloat(dataJson.data[i].MDIEND);
									CT6 += parseFloat(dataJson.data[i].SaldoLF);
									CT7 += parseFloat(dataJson.data[i].CHKF);
									CT8 += parseFloat(dataJson.data[i].SaldoB);
									CT9 += parseFloat(dataJson.data[i].DPD);
									CT10 += parseFloat(dataJson.data[i].SaldoR);
									
							};							
						};
      
        

						
						
						Filas +='<tr >'+
								 	'<td>TOTAL Cordobas</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>C$ '+number_format(CT1,2)+'</td>'+
									'<td> '+number_format(CT2,2)+'</td>'+
									'<td> '+number_format(CT3,2)+'</td>'+
									'<td> '+number_format(CT4,2)+'</td>'+
									'<td> '+number_format(CT5,2)+'</td>'+
									'<td>C$ '+number_format(CT6,2)+'</td>'+
									'<td> '+number_format(CT7,2)+'</td>'+
									'<td>C$ '+number_format(CT8,2)+'</td>'+
									'<td> '+number_format(CT9,2)+'</td>'+
									'<td>C$ '+number_format(CT10,2)+'</td>'+
								'</tr>'
								

						Filas +='<tr><td  colspan="13">DOLARES</td></tr><tr><td colspan="13"></td></tr>'
						var DT1=0,DT2=0,DT3=0,DT4=0,DT5=0,DT6=0,DT7=0,DT8=0,DT9=0,DT10=0;
						for (var i = 0; i < dataJson.data.length; i++) { 
							var tipoC = dataJson.data[i].MTipo.substring(0, 1);
							var IDCuenta = dataJson.data[i].IdDB;
							if (tipoC=="D") {
								
								Filas += '<tr>'+			
										'<td >'+dataJson.data[i].NCuenta +'</td>'+
										'<td>'+dataJson.data[i].MTipo +'</td>'+
										'<td>'+dataJson.data[i].Banco +'</td>'+																													
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLA)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLA,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'DEP'"+')">'+(((parseFloat(dataJson.data[i].MDIDP)) == 0) ? '-':(number_format(dataJson.data[i].MDIDP,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'NC'"+')">'+(((parseFloat(dataJson.data[i].MDINC)) == 0) ? '-':(number_format(dataJson.data[i].MDINC,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CK'"+')">'+(((parseFloat(dataJson.data[i].MDECHK)) == 0) ? '-':(number_format(dataJson.data[i].MDECHK,2))) +'</a></td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'ND'"+')">'+(((parseFloat(dataJson.data[i].MDIEND)) == 0) ? '-':(number_format(dataJson.data[i].MDIEND,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoLF)) == 0) ? '-':(number_format(dataJson.data[i].SaldoLF,2))) +'</td>'+
										'<td><a href="#" onclick="MovDetalle('+IDCuenta+','+"'"+Fecha+"'"+','+"'CKF'"+')">'+(((parseFloat(dataJson.data[i].CHKF)) == 0) ? '-':(number_format(dataJson.data[i].CHKF,2))) +'</a></td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoB)) == 0) ? '-':(number_format(dataJson.data[i].SaldoB,2))) +'</td>'+
										'<td>'+(((parseFloat(dataJson.data[i].DPD)) == 0) ? '-':(number_format(dataJson.data[i].DPD,2))) +'</td>'+
										'<td>$ '+(((parseFloat(dataJson.data[i].SaldoR)) == 0) ? '-':(number_format(dataJson.data[i].SaldoR,2))) +'</td>'+										
									'</tr>'		
									
									DT1 += parseFloat(dataJson.data[i].SaldoLA);
									DT2 += parseFloat(dataJson.data[i].MDIDP);
									DT3 += parseFloat(dataJson.data[i].MDINC);
									DT4 += parseFloat(dataJson.data[i].MDECHK);
									DT5 += parseFloat(dataJson.data[i].MDIEND);
									DT6 += parseFloat(dataJson.data[i].SaldoLF);
									DT7 += parseFloat(dataJson.data[i].CHKF);
									DT8 += parseFloat(dataJson.data[i].SaldoB);
									DT9 += parseFloat(dataJson.data[i].DPD);
									DT10 += parseFloat(dataJson.data[i].SaldoR);
							};

							
						};
						
						
						Filas +='<tr id="TblFood3">'+
								 	'<td>TOTAL DOLARES</td>'+
									'<td></td>'+
									'<td></td>'+
									'<td>$ '+number_format(DT1,2)+'</td>'+
									'<td> '+number_format(DT2,2)+'</td>'+
									'<td> '+number_format(DT3,2)+'</td>'+
									'<td> '+number_format(DT4,2)+'</td>'+
									'<td> '+number_format(DT5,2)+'</td>'+
									'<td>$ '+number_format(DT6,2)+'</td>'+
									'<td> '+number_format(DT7,2)+'</td>'+
									'<td>$ '+number_format(DT8,2)+'</td>'+
									'<td> '+number_format(DT9,2)+'</td>'+
									'<td>$ '+number_format(DT10,2)+'</td>'+
								'</tr>'
						
						
						};
						Filas +='</tbody>'
						$("#TblCordoba").html('<table  id="tblfinal"   >'+ Filas +'</table>')

						
						
						
					});
		    break;
    	}

 	};
 	

 	
 });
$("#idFLA").change(function(){
	console.log("Recupera la informacion de registro")
});
$("#commentForm").validate();
$("#frmloadfile").validate();
$(".numeric").numeric({ 
	decimalPlaces : 2 
});
function number_format(number, decimals, dec_point, thousands_sep){
	 number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

function date(format, timestamp){
	 var that = this;
  var jsdate, f;
  // Keep this here (works, but for code commented-out below for file size reasons)
  // var tal= [];
  var txt_words = [
    'Sun', 'Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur',
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
  ];
  // trailing backslash -> (dropped)
  // a backslash followed by any character (including backslash) -> the character
  // empty string -> empty string
  var formatChr = /\\?(.?)/gi;
  var formatChrCb = function(t, s) {
    return f[t] ? f[t]() : s;
  };
  var _pad = function(n, c) {
    n = String(n);
    while (n.length < c) {
      n = '0' + n;
    }
    return n;
  };
  f = {
    // Day
    d: function() { // Day of month w/leading 0; 01..31
      return _pad(f.j(), 2);
    },
    D: function() { // Shorthand day name; Mon...Sun
      return f.l()
        .slice(0, 3);
    },
    j: function() { // Day of month; 1..31
      return jsdate.getDate();
    },
    l: function() { // Full day name; Monday...Sunday
      return txt_words[f.w()] + 'day';
    },
    N: function() { // ISO-8601 day of week; 1[Mon]..7[Sun]
      return f.w() || 7;
    },
    S: function() { // Ordinal suffix for day of month; st, nd, rd, th
      var j = f.j();
      var i = j % 10;
      if (i <= 3 && parseInt((j % 100) / 10, 10) == 1) {
        i = 0;
      }
      return ['st', 'nd', 'rd'][i - 1] || 'th';
    },
    w: function() { // Day of week; 0[Sun]..6[Sat]
      return jsdate.getDay();
    },
    z: function() { // Day of year; 0..365
      var a = new Date(f.Y(), f.n() - 1, f.j());
      var b = new Date(f.Y(), 0, 1);
      return Math.round((a - b) / 864e5);
    },

    // Week
    W: function() { // ISO-8601 week number
      var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3);
      var b = new Date(a.getFullYear(), 0, 4);
      return _pad(1 + Math.round((a - b) / 864e5 / 7), 2);
    },

    // Month
    F: function() { // Full month name; January...December
      return txt_words[6 + f.n()];
    },
    m: function() { // Month w/leading 0; 01...12
      return _pad(f.n(), 2);
    },
    M: function() { // Shorthand month name; Jan...Dec
      return f.F()
        .slice(0, 3);
    },
    n: function() { // Month; 1...12
      return jsdate.getMonth() + 1;
    },
    t: function() { // Days in month; 28...31
      return (new Date(f.Y(), f.n(), 0))
        .getDate();
    },

    // Year
    L: function() { // Is leap year?; 0 or 1
      var j = f.Y();
      return j % 4 === 0 & j % 100 !== 0 | j % 400 === 0;
    },
    o: function() { // ISO-8601 year
      var n = f.n();
      var W = f.W();
      var Y = f.Y();
      return Y + (n === 12 && W < 9 ? 1 : n === 1 && W > 9 ? -1 : 0);
    },
    Y: function() { // Full year; e.g. 1980...2010
      return jsdate.getFullYear();
    },
    y: function() { // Last two digits of year; 00...99
      return f.Y()
        .toString()
        .slice(-2);
    },

    // Time
    a: function() { // am or pm
      return jsdate.getHours() > 11 ? 'pm' : 'am';
    },
    A: function() { // AM or PM
      return f.a()
        .toUpperCase();
    },
    B: function() { // Swatch Internet time; 000..999
      var H = jsdate.getUTCHours() * 36e2;
      // Hours
      var i = jsdate.getUTCMinutes() * 60;
      // Minutes
      var s = jsdate.getUTCSeconds(); // Seconds
      return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3);
    },
    g: function() { // 12-Hours; 1..12
      return f.G() % 12 || 12;
    },
    G: function() { // 24-Hours; 0..23
      return jsdate.getHours();
    },
    h: function() { // 12-Hours w/leading 0; 01..12
      return _pad(f.g(), 2);
    },
    H: function() { // 24-Hours w/leading 0; 00..23
      return _pad(f.G(), 2);
    },
    i: function() { // Minutes w/leading 0; 00..59
      return _pad(jsdate.getMinutes(), 2);
    },
    s: function() { // Seconds w/leading 0; 00..59
      return _pad(jsdate.getSeconds(), 2);
    },
    u: function() { // Microseconds; 000000-999000
      return _pad(jsdate.getMilliseconds() * 1000, 6);
    },

    // Timezone
    e: function() { // Timezone identifier; e.g. Atlantic/Azores, ...
      // The following works, but requires inclusion of the very large
      // timezone_abbreviations_list() function.
      /*              return that.date_default_timezone_get();
       */
      throw 'Not supported (see source code of date() for timezone on how to add support)';
    },
    I: function() { // DST observed?; 0 or 1
      // Compares Jan 1 minus Jan 1 UTC to Jul 1 minus Jul 1 UTC.
      // If they are not equal, then DST is observed.
      var a = new Date(f.Y(), 0);
      // Jan 1
      var c = Date.UTC(f.Y(), 0);
      // Jan 1 UTC
      var b = new Date(f.Y(), 6);
      // Jul 1
      var d = Date.UTC(f.Y(), 6); // Jul 1 UTC
      return ((a - c) !== (b - d)) ? 1 : 0;
    },
    O: function() { // Difference to GMT in hour format; e.g. +0200
      var tzo = jsdate.getTimezoneOffset();
      var a = Math.abs(tzo);
      return (tzo > 0 ? '-' : '+') + _pad(Math.floor(a / 60) * 100 + a % 60, 4);
    },
    P: function() { // Difference to GMT w/colon; e.g. +02:00
      var O = f.O();
      return (O.substr(0, 3) + ':' + O.substr(3, 2));
    },
    T: function() { // Timezone abbreviation; e.g. EST, MDT, ...
      // The following works, but requires inclusion of the very
      // large timezone_abbreviations_list() function.
      /*              var abbr, i, os, _default;
      if (!tal.length) {
        tal = that.timezone_abbreviations_list();
      }
      if (that.php_js && that.php_js.default_timezone) {
        _default = that.php_js.default_timezone;
        for (abbr in tal) {
          for (i = 0; i < tal[abbr].length; i++) {
            if (tal[abbr][i].timezone_id === _default) {
              return abbr.toUpperCase();
            }
          }
        }
      }
      for (abbr in tal) {
        for (i = 0; i < tal[abbr].length; i++) {
          os = -jsdate.getTimezoneOffset() * 60;
          if (tal[abbr][i].offset === os) {
            return abbr.toUpperCase();
          }
        }
      }
      */
      return 'UTC';
    },
    Z: function() { // Timezone offset in seconds (-43200...50400)
      return -jsdate.getTimezoneOffset() * 60;
    },

    // Full Date/Time
    c: function() { // ISO-8601 date.
      return 'Y-m-d\\TH:i:sP'.replace(formatChr, formatChrCb);
    },
    r: function() { // RFC 2822
      return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb);
    },
    U: function() { // Seconds since UNIX epoch
      return jsdate / 1000 | 0;
    }
  };
  this.date = function(format, timestamp) {
    that = this;
    jsdate = (timestamp === undefined ? new Date() : // Not provided
      (timestamp instanceof Date) ? new Date(timestamp) : // JS Date()
      new Date(timestamp * 1000) // UNIX timestamp (auto-convert to int)
    );
    return format.replace(formatChr, formatChrCb);
  };
  return this.date(format, timestamp);

}