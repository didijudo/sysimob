<?php
class PerfilCController extends SysimobController {
	
	private $usuario = null; 

	public function setMenu(){
		$html = 
		'<div id="menu">
			<ul class="nav nav-tabs">
				<li><a class="active" href="'.$this->url('/perfilC').'">Home</a></li>
				<li><a  href="'.$this->url('/consulta').'">Consultar</a></li>
				<li class="pull-right"><a class="sair" href="'.$this->url('/logout').'">Sair</a></li>				
			</ul>			
		</div>';
		return $html;				
	}

	public function setInfoContent() {
		$html = '<div class="sysmobcontent"><h1>Bem vindo, '.$this->usuario['nmusuario'].'</h1></div>';
		return $html;
	}
	
	public function processRequest(){		
		$this->usuario = $_SESSION['usuario'];
		
		if ($this->usuario['cdperfil'] != 1) {
			session_unset();
			die('Você não pode acessar essa pagina!');
		} 		
	}
}
