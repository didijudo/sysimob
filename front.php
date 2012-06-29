<?php
/*
 * Design Patter of Front Controller
 * http://en.wikipedia.org/wiki/Front_Controller_pattern
 */

session_start();
include 'application_configuration.php';
include 'lib/Controller.php';
include 'lib/SysimobController.php';

$_GET['__key__'] = ($_GET['__key__'] != "") ? $_GET['__key__'] : 'home';
$uri = explode('/',$_GET['__key__']);
$controller_class = null;
$controller = null;
$num = count($uri);
$path = ''; 


if($num == 1) {
	$path = $uri[0];
	$controller_class = $map['/'.$uri[0]];
}else {
	
	for($i=0; $i< $num; $i++){
		if($uri[$i]==''){
		}else{
			$path .= $uri[$i].'/';
		}
	}
	$controller_class = ($uri[$num-1] == '')? $map['/'.$uri[$num-2]] 
    : $map['/'.$uri[$num-1]];
}

if($controller_class != ''){
	require_once ('controller/'.$path.'/'.$controller_class.'.php');
	$controller = new $controller_class();
}

if(!isset($controller)){
	echo 'ERRO 404 - PÁGINA NÃO ENCONTRADA';
	header('Status: 404 Not Found');
}else{
	$controller->processRequest();
	$controller->setPagina();
}


?>
