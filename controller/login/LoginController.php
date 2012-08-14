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
				'<form name="frmLogin" action="" method="post">
					<div class="offset4 span3 row sysmoblogin" id="content">
						<div>
							<label>CPF</label>
							<input class="span3 input-small" placeholder="digite seu cpf..." type="text" name="usu_cpf" />
							<label>Senha</label>
							<input class="span3 input-small" placeholder="digite sua senha..." type="password" name="usu_password" />							
						</div>
						<div class="right row">
						<input class="btn btn-primary btn-small" type="submit" name="btnAcessar" value="Acessar" />						
						</div>
					</div>
				</form>';
		return $html;
	}
		
	public function setTitle() {
		return '..:: AC Engenharia - Login ::..';
	}
	
	public function acessar(){
		var_dump($_POST);
		if (isset($_POST['usu_cpf']) && isset($_POST['usu_password'])) {
		  $entUsuario = new EntidadeUsuario();
		  $entUsuario->setUsuCpf($_POST['usu_cpf']);
		  $entUsuario->setUsuPassword($_POST['usu_password']);
		  
		  $gerUsuario = new GerenciadorUsuario();	  
		  
		  $usuario = $gerUsuario->consultarKey($entUsuario);
          var_dump($usuario);		    
		  if( !$usuario ) { 		
			echo('<script type="text/javascript">
			     	  alert("CPF ou Password incorreto!!!");
				  </script>');
		  } else {			
			$usuario = $usuario[0];	
			session_unset();
  			$_SESSION['usuario'] = $usuario;

	        if ($usuario['per_codigo'] == 1) {
			  header('Location:'.$this->url('/perfilC'));
			} elseif ($usuario['per_codigo'] == 2) {
			  header('Location:'.$this->url('/perfilA'));
			} elseif ($usuario['per_codigo'] == 3) {
			  header('Location:'.$this->url('/perfilCC'));				
			} else {
			  unset($_SESSION['usuario']);
			  //header('Location:'.$this->url('/erro'));
			}
		  }
		}
	}
	
  	public function processRequest(){		
		if (isset($_POST['btnAcessar']) && $_POST['btnAcessar'] == 'Acessar'  ) {
			$this->acessar();
		}
	}
}
