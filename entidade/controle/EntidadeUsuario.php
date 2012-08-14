<?php

/**
 * Description of EntidadeUsuario
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadeUsuario {
    private $usu_cpf;
    private $per_codigo;
    private $usu_nome;
    private $usu_password;
    private $usu_flativo;
    
    function __construct() {}
    
	public function setUsuCpf($usu_cpf){
		$this->usu_cpf = $usu_cpf;		
	}
	
	public function getUsuCpf(){
		return $this->usu_cpf;		
	}
	
	public function setPerCodigo($per_codigo){
		$this->per_codigo = $per_codigo;		
	}
	
	public function getPerCodigo(){
		return $this->per_codigo;		
	}
	
	public function setUsuNome($usu_nome){
		$this->usu_nome = $usu_nome;		
	}
	
	public function getUsuNome(){
		return $this->usu_nome;		
	}

	public function setUsuPassword($usu_password){
		$this->usu_password = md5($usu_password);		
	}
	
	public function getUsuPassword(){
		return $this->usu_password;		
	}

	public function setUsuFlAtivo($usu_flativo){
		$this->usu_flativo = $usu_flativo;		
	}
	
	public function getUsuFlAtivo(){
		return $this->usu_flativo;		
	}
}

?>