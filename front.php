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
	$path = $uri[0].'/';
	$controller_class = $map['/'.$uri[0]];

	if($controller_class != ''){
		require_once('controller/'.$path.$controller_class.'.php');
		$controller = new $controller_class();
	}
	
}else {
  	for($i=0; $i<= $num-1; $i++){
	  	if($uri[$i]==''){
	  	}else{
		  	$path .= '/'.$uri[$i];
	  	}
  	}
  	$controller_class = $map[$path];

  	if($controller_class != ''){
  		require_once('controller'.$path.'/'.$controller_class.'.php');
  		$controller = new $controller_class();
  	}
  	 
}

if(!isset($controller)){
	echo 'ERRO 404 - P�GINA N�O ENCONTRADA';
	header('Status: 404 Not Found');
}else{
	if ($controller instanceof SysimobController) {
		$controller->processRequest();
		$controller->montarPagina();		
	} else {
		$controller->processRequest();
	}

}


?>
