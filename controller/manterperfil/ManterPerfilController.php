<?php

include_once 'gerenciador/controle/GerenciadorPerfil.php';
include_once 'controller/PerfilA/PerfilAController.php';
include_once 'util/Util.php';
class ManterPerfilController extends PerfilAController {

	public $javascript = array ('jquery', 'jquery.validate', 'sysimob-manter-perfil');
	
	public function setInfoContent() {
		$html = '
				<div class="sysmobcontent">			
					<input type="hidden" id="url" value="'.$this->url('/manterperfil/acao').'">		
					<label class="center label">PERFIL</label>						
						<fieldset class="well">
							<div class="left">
								<input type="button" class="btn btn-large" value="Novo" id="btnNovo" />
								<br>
								<div class="tela form-horizontal" id="formulario">
								</div>
							</div>
							<br>
							<div class="left">'
								.$this->montarGrid().'								
							</div>
						</fieldset>					
				</div>
				';

		return $html;
	}	

	private function montarGrid() {
		$html = '
				<table class="table table-bordered table-striped">
					<thead class="table-head">
						<tr>
							<th><center>Código</center></th>
							<th><center>Descrição Perfil</center></th>
							<th><center>Status</center></th>	
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody class="table-body" id="tbody">';
		
		$gerPerfil = new GerenciadorPerfil();
		$coll = $gerPerfil->listarPerfil();
		
		foreach ($coll as $pos => $iter) {
			$html .= '
						<tr id="linha_'.$pos.'">';
			
			foreach ($iter as $key => $value) {
				if ($key == 'per_flativo') {
					$html .= '
								<td><center>'.($value=='1'?'ATIVO':'INATIVO').'</center></td>';					
				} else {
					$html .= '
								<td><center>'.$value.'</center></td>';
				}
			} 		
				//\''.$this->url('/perfil/acao').'\',
			$html .= '
							<td><a class="cursor-pointer" onclick="excluir(\'linha_'.$pos.'\','.Util::convert_ArrayPhpToArrayJS($iter).')"><center><i class="icon-trash"></i></center></a></td>
					  		<td><a class="cursor-pointer" onclick="showTelaAlterar(\'Alterar\',\'Cancelar\','.Util::convert_ArrayPhpToArrayJS($iter).')"><center><i class="icon-list-alt"></i></center></a></td>
			 			</tr>';	
		}
		
		$html .= '
					</tbody>
				</table>';
		
		return $html;
	}
	
	

	public function processRequest() {
		if (!is_null($this->usuario) && $this->usuario['per_codigo'] != 2) {
			session_unset();
			die('Você não pode acessar essa pagina!');
		}
	}

	public function setTitle() {
		return '..:: AC Engenharia - Manter Perfil ::..';
	}
}