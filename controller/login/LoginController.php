<?php
class LoginController extends Controller {
	
	public function processRequest(){
		$target = $this->url('/home');
		$nome = $_POST['nome'];
		echo $nome.'<br/>';
		echo $this->getRequest();
		
	}
}