<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Login_controller';
$route['Acreditar'] = 'Login_controller/Acreditar';
$route['Salir'] = 'Login_controller/salir';

$route['Bancos'] = 'Bancos_controller/SendFormat';
$route['XLS'] = 'Bancos_controller/toXLS';

$route['Formatos'] = 'Bancos_controller';
$route['Bandeja'] = 'Bancos_controller/Bandeja';
$route['CrearFormato'] = 'Bancos_controller/IngresarInfo';
$route['GuardarFormato'] = 'Bancos_controller/SaveBank';
$route['UpdateFormato'] = 'Bancos_controller/Updatebanco';
$route['AjaxEmpre'] = 'Bancos_controller/IngxEmpre';
//$route['VerF/(:any)'] = 'Bancos_controller/ViewFormato/$1';
$route['Detalles/(:any)/(:any)'] = 'Bancos_controller/View_detalles/$1/$2';
/*DETALLES POR EMPRESA*/
//UMA
$route['DetallesUNI/(:any)/(:any)'] = 'Bancos_controller/View_detallesUNI/$1/$2';

$route['DetallesUma/(:any)/(:any)'] = 'Bancos_controller/View_detallesUMA/$1/$2';
$route['DetallesUmavet/(:any)/(:any)'] = 'Bancos_controller/View_detallesUmaVet/$1/$2';
$route['DetallesInnova/(:any)/(:any)'] = 'Bancos_controller/View_detallesInnova/$1/$2';
$route['DetallesAglosa/(:any)/(:any)'] = 'Bancos_controller/View_detallesAglosa/$1/$2';


//Detalles Por Contador
$route['VerUNI/(:any)'] = 'Bancos_controller/ViewFormatoUNI/$1';
$route['VerUMA/(:any)'] = 'Bancos_controller/ViewFormatoUMA/$1';
$route['VerUMV/(:any)'] = 'Bancos_controller/ViewFormatoUMV/$1';
$route['VerInn/(:any)'] = 'Bancos_controller/ViewFormatoInn/$1';
$route['VerAglosa/(:any)'] = 'Bancos_controller/ViewFormatoAglosa/$1';


/**/
$route['Edit/(:any)'] = 'Bancos_controller/Edit/$1';


$route['Cuentas'] = 'Cuentas_controller/index';
$route['Cargador'] = 'Cuentas_controller/Cargardor';
$route['ProcesarDocumento'] = 'Cuentas_controller/ProcesarCargador';
$route['CtaAdd'] = 'Cuentas_controller/Guardar';
$route['CtaDel'] = 'Cuentas_controller/Eliminar';
$route['CtaUpd'] = 'Cuentas_controller/Update';
$route['DetalleMovimiento/(:any)/(:any)/(:any)'] = 'Cuentas_controller/DetalleMovimiento/$1/$2/$3';


$route['Usuarios'] = 'Usuarios_controller';
$route['Ingreso'] = 'Usuarios_controller/crear';
$route['GuardarUsuario'] = 'Usuarios_controller/Guardar';
$route['Eliminar/(:any)']= "Usuarios_controller/Eliminar/$1";

$route['dashboard'] = 'Menu_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['pdf'] = 'Bancos_controller/pdf';