<?php

/**
 * Classe para representar o Objeto tb_per_perfil
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadePerfil {
    
    private $per_codigo;
    private $per_descricao;
    private $per_flativo;
    
    function __construct() {}

	public function getPerCodigo() {
		return $this->per_codigo;
	}
	
	public function setPerDescricao($per_descricao) {
		$this->per_descricao = $per_descricao;
	}
	
	public function getPerDescricao() {
		return $this->per_descricao;
	}
	
	public function setPerFlAtivo($per_flativo) {
		$this->per_flativo = $per_flativo;
	}
	
	public function getPerFlAtivo() {
		return $this->per_flativo;
	}
    
}
