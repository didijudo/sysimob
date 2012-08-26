<?php
include_once 'gerenciador/controle/GerenciadorPerfil.php';
include_once 'entidade/controle/EntidadePerfil.php';
class AcaoManterPerfilController extends controller {

	private function inserir($param) {
		$entidade = new EntidadePerfil();
		$entidade->setPerDescricao($param['per_descricao']);
		$entidade->setPerFlAtivo($param['per_flativo']);
			
		$gerPerfil = new GerenciadorPerfil();
		if ($gerPerfil->inserir($entidade)){
			return json_encode(array('mensagem' => 'Registro inserido com sucesso!!!'));
		} else {
			return json_encode(array('mensagem' => 'Erro na inclusão!!!'));
		}
	}

	private function alterar($param){
		$entidade = new EntidadePerfil();
		$entidade->setPerCodigo($param['per_codigo']);
		$entidade->setPerDescricao($param['per_descricao']);
		$entidade->setPerFlAtivo($param['per_flativo']);

		$gerPerfil = new GerenciadorPerfil();
		if ($gerPerfil->atualizar($entidade)) {
			return json_encode(array('mensagem' => 'Registro atualizado com sucesso!!!'));
		} else {
			return json_encode(array('mensagem' => 'Erro na atualização!!!'));
		}

	}

	private function deletar($param){
		$entidade = new EntidadePerfil();
		$entidade->setPerCodigo($param['per_codigo']);

		$gerPerfil = new GerenciadorPerfil();

		if ($gerPerfil->deletar($entidade)){
			return json_encode(array('mensagem' => 'Registro excluido com sucesso!!!'));
		} else {
			return json_encode(array('mensagem' => 'Erro na exclusão!!!'));
		}
	}

	public function processRequest(){
		if (isset($_POST['acao']) && isset($_POST['param'])) {
			/* 			echo($_POST['acao'].'<br>');
			 foreach ($_POST['param'] as $key => $value) {
			echo($key.'=> '.$value.'<br>');
			} */

			if (isset($_POST['acao']) && $_POST['acao'] == '1') {
			 	if(isset($_POST['param']) && is_array($_POST['param'])) {
			 		echo $this->inserir($_POST['param']);
			 	}
			} elseif (isset($_POST['acao']) && $_POST['acao'] == '2') {
				if(isset($_POST['param']) && is_array($_POST['param'])) {
					echo $this->alterar($_POST['param']);
			 	}
			} elseif (isset($_POST['acao']) && $_POST['acao'] == '3') {
				if(isset($_POST['param']) && is_array($_POST['param'])) {
					echo $this->deletar($_POST['param']);
				}
			}
		} else {
			echo 'ENTROU NA PAGINA MAS $_POST ESTA VAZIO';
		}
	}
}