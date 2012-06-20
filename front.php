<?php
/*
 * Design Patter of Front Controller
 * http://en.wikipedia.org/wiki/Front_Controller_pattern
 */

session_start();
include 'application.php';

// $uri = explode('/',$_SERVER['REQUEST_URI']);
$uri = explode('/',$_GET['key']);
$controller;
$response = null;
$num = count($uri);
$path = ''; 

if($uri[$num-1]!=''){
	
		for($i = 0 ; $i < $num-1 ; $i++){
			$path = $path.$uri[$i].'/';
		}
		
		$controller = $map['/'.$uri[$num-1]] ;
		require_once ($path.$controller.'.php');
		$response = new $controller();

}else if ( isset($uri[$num-2]) ){
	if ($path == '')
		$path = $uri[$num-2].'/';
	
	$controller = $map['/'.$uri[$num-2]] ;
	require_once ($path.$controller.'.php');
	$response = new $controller();

}else{
	$controller = $map['/home'];
	require_once ('home/HomeController.php');
	$response = new $controller;	
}

if($response==null){
	echo 'ERRO 404 - PÁGINA NÃO ENCONTRADA';
}else{
	$response->restRequest();
	
}


?>