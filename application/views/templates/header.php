<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> GUMA - Plataforma Financiera</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" >

    <link  rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.min.css"  media="screen,projection"/>
       
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/dataTables.colVis.css" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/dataTables.tableTools.css" />
  
    <script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#tblid_vista_detalles").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});
</script>
    <style type="text/css" media="screen">
            @import "<?php echo base_url(); ?>assets/media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
    </style>
</head>
<body>

