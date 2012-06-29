<?php
class ConsultaController extends Controller {
	private $titulo;
	
	public function processRequest(){
		$this->titulo = $_POST['nome'];	
	}
	
	public function setTitulo(){

	}
}