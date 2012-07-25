<?php

include_once 'gerenciador/controle/GerenciadorUsuario.php';
include_once 'entidade/controle/EntidadeUsuario.php';
class LoginController extends SysimobController {
	
	public $javascript = array ('jquery', 'jquery.validate', 'validar-campos');
	
	public function setMenu(){
		return '<div style="padding-top:54px"></div>';
	}
	
	public function setContent(){
		$html =        
				'<form name="frmLogin" action="#" method="post">
					<div class="offset4 span3 row sysmoblogin" id="content">
						<div>
							<label>CPF</label>
							<input class="span3 input-small" placeholder="digite seu cpf..." type="text" name="cdCpf" />
							<label>Senha</label>
							<input class="span3 input-small" placeholder="digite sua senha..." type="password" name="pwdUsuario" />							
						</div>
						<div class="center row">
						<input class="btn btn-primary btn-small" type="submit" value="ACESSAR" onclick="'.$this->submit().'" />						
						<input class="btn btn-small" type="button" value="CANCEL" onclick="'.$this->cancel().'"" />
						</div>
					</div>
				</form>';
		return $html;
	}
		
	public function setTitle() {
		return '..:: AC Engenharia - Login ::..';
	}
	
	public function submit(){
		echo 'executou submit<br />';
		if (isset($_POST['cdCpf']) && isset($_POST['pwdUsuario'])) {
		  $entUsuario = new EntidadeUsuario;
		  $entUsuario->setCpf($_POST['cdCpf']);
		  echo $_POST['cdCpf'].'<br>';
		  echo $_POST['pwdUsuario'].'<br>';
		  $entUsuario->setPwdUsuario($_POST['pwdUsuario']);
		  echo $entUsuario->getPwdUsuario().'<br>';
		  
		  $gerUsuario = new GerenciadorUsuario();	  
		  
		  if( !$gerUsuario->consultarKey($entUsuario) ) { 		
		  	  echo 'entrou';
			  echo('<script type="text/javascript">
					  alert("Achou CPF!!");
				   </script>');
			  header('Location: home/HomeController.php');
		  } else {
			  echo 'nao entrou';
			  echo('<script type="text/javascript">
					  alert("Cpf ou password incorreto");
				   </script>');
		  }
		}
	}
	
	public function cancel(){
		echo 'executou cancel<br />';
	}
	
  	public function processRequest(){		
		echo 'executou ProcessRequest<br />';
	}
}
