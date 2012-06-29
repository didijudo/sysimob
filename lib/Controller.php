<?php
class Controller {
	
	
	protected function url($target){
		$var = explode('/', $_SERVER['REQUEST_URI']);
		
		return '/'.$var[1].$target;
	}
	
	protected function processRequest(){
	}
	
	/*
	 * Retorna o tipo de requisiчуo feita (GET/POST)
	 */
	protected function getRequest(){
		return $_SERVER['REQUEST_METHOD'];
	} 
	
	
}