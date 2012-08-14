<?php
class PerfilAController extends SysimobController {
	
	private $usuario = null;
	
	public function setMenu(){
		$html = 
		'<div id="menu">
			<ul class="nav nav-tabs">
				<li><a class="active" href="'.$this->url('/perfilA').'">Home</a></li>
				<li><a  href="'.$this->url('/cadastro').'">Cadastrar</a></li>
				<li class="pull-right"><a class="sair" href="'.$this->url('/logout').'">Sair</a></li>				
			</ul>
		</div>';
		return $html;				
	}

	public function setInfoContent() {
		$html = '<div class="sysmobcontent"><h1>Bem vindo, '.$this->usuario['usu_nome'].'</h1></div>';
		return $html;
	}
	
	public function processRequest(){		
		$this->usuario = $_SESSION['usuario'];
		
		if ($this->usuario['per_codigo'] != 2) {
			session_unset();
			die('Você nao pode acessar essa pagina!');
		} 
	}
}
