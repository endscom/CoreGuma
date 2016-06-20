<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Administrador de plataforma Financiera</title>
    <link link rel="shortcut icon" href="<?php echo baseurl();?>assets/img/dweb.png" type="image/png">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"  media="screen,projection"/>
   
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.tableTools.css" />
   
</head>
<body>
<div id="container" class="oculto">
    <nav class="col s12">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="mdi-navigation-menu"></i></a>
                <a href="menu" class="brand-logo"><img src="<?php echo base_url(); ?>assets/img/Untitled-1-01.png" /></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><?php echo $this->session->userdata('username'); ?></li>
                    <li> <?php echo - $this->session->userdata('idCliente'); ?></li>
                    <li><a href="<?php echo base_url();?>index.php/salir" class="out"><i class="material-icons left">power_settings_new</i>SALIR</a></li>
                </ul>
            </div>
        </nav>
    </nav>
  
</div>
 
