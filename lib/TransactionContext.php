<?php

include_once 'dao/ad/Conexao.php';
class TransactionContext {

	private $conexao = null;
	private $conAtiva = null;
	
	function __construct() {
		$this->conexao = new Conexao();
		$this->conAtiva = $this->conexao->getConexao();
	}
	
	public function begin(){
		pg_query($this->conAtiva,"BEGIN;");
	}
	
	public function commit(){
		pg_query($this->conAtiva,"COMMIT;");
		$this->conexao->fechar();
	}
	
	public function rollback(){
		pg_query($this->conAtiva,"ROLLBACK;");
		$this->conexao->fechar();
	}	
	
	public function getConAtiva(){
		return $this->conAtiva;
	}
	
}
