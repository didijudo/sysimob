<?php

/**
 * Clase com a estrutura de acesso a dados da tabela tb_emp_empreendimento
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeEmpreendimento.php';
class DAOEmpreendimento {

	function __construct() {
	}

	public function consultarKey(EntidadeEmpreendimento $eEmpreendimento) {
		try {
			$query = "SELECT * FROM sysimob.tb_emp_empreendimento WHERE emp_id = $1 ";
			$conexao = new Conexao();
			$conAtiva   = $conexao->getConexao();
			$param = $this->parametrosEmpreendimento($eEmpreendimento, "C");
			$resultado = pg_query_params($conAtiva, $query, $param);
			$conexao->fechar();
			return pg_fetch_all($resultado);
		} catch (Exception $err) {
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	public function consultarFull() {
		try {
			$query = "SELECT * FROM sysimob.tb_emp_empreendimento";
			$conexao = new Conexao();
			$conAtiva   = $conexao->getConexao();
			$resultado = pg_query($conAtiva, $query);
			$conexao->fechar();
			return pg_fetch_all($resultado);
		} catch (Exception $err) {
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	public function inserir(EntidadeEmpreendimento $eEmpreendimento) {
		try {
			$conexao = new Conexao();
			$conAtiva   = $conexao->getConexao();
			
			pg_query($conAtiva, "BEGIN;"); // Abre transacao
			
			$query = "INSERT INTO sysimob.tb_emp_empreendimento (emp_nome, emp_descricao, emp_localizacao, emp_dtlancamento) 
			VALUES ($1, $2, $3, to_date($4,'DD/MM/YYYY')) RETURNING *";
			$param = array();
			$param['$1'] = $eEmpreendimento->getEmpNome();
			$param['$2'] = $eEmpreendimento->getEmpDescricao();
			$param['$3'] = $eEmpreendimento->getEmpLocalizacao();
			$param['$4'] = $eEmpreendimento->getEmpDtLancamento();
			
			$result = pg_query_params($conAtiva, $query , $param);
			
			pg_query($conAtiva,"COMMIT;");
			
			$conexao->fechar();
			
			return pg_fetch_all($result);
		} catch (Exception $err) {
			pg_query($conAtiva,"ROLLBACK;");
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	public function atualizar(EntidadeEmpreendimento $eEmpreendimento) {
		try {
			$query = "UPDATE sysimob.tb_emp_empreendimento
			SET emp_nome = $2,
			emp_descricao = $3,
			emp_localizacao = $4,
			emp_dtlancamento = $5
			WHERE emp_id = $1";
			$conexao = new Conexao();
			$conAtiva   = $conexao->getConexao();
			$param = $this->parametrosEmpreendimento($eEmpreendimento, "U");
			pg_prepare($conAtiva, "updateEmpreendimento", $query);
			pg_execute($conAtiva, "updateEmpreendimento", $param);
			$conexao->fechar();
		} catch (Exception $err) {
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	public function deletarKey(EntidadeEmpreendimento $eEmpreendimento) {
		try {
			$query = "DELETE FROM sysimob.tb_emp_empreendimento WHERE emp_id = $1";
			$conexao = new Conexao();
			$conAtiva   = $conexao->getConexao();
			$param = $this->parametrosEmpreendimento($eEmpreendimento, "D");
			pg_prepare($conAtiva, "deleteEmpreendimento", $query);
			pg_execute($conAtiva, "deleteEmpreendimento", $param);
			$conexao->fechar();
		} catch (Exception $err) {
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	public function getCurrvalSeq() {
		try {
			$query = "SELECT currval('sysimob.tb_emp_empreendimento_emp_id_seq')";
			$conexao = new Conexao();
			$conAtiva = $conexao->getConexao();
			$param = null;
			pg_prepare($conAtiva, "getNextSeq", $query);
			pg_execute($conAtiva,"getNextSeq", $param);
			$conexao->fechar();
		} catch (Exception $err) {
			throw new Exception("Erro:\n".$err->getMessage());
		}
	}

	private function parametrosEmpreendimento(EntidadeEmpreendimento $eEmpreendimento, $tipo) {
		$vet = array();
		switch ($tipo) {
			case "I" :
				$vet['$1'] = $eEmpreendimento->getEmpNome();
				$vet['$2'] = $eEmpreendimento->getEmpDescricao();
				$vet['$3'] = $eEmpreendimento->getEmpLocalizacao();
				$vet['$4'] = $eEmpreendimento->getEmpDtLancamento();
				break;
			case "U" :
				$vet['$1'] = $eEmpreendimento->getEmpId();
				$vet['$2'] = $eEmpreendimento->getEmpNome();
				$vet['$3'] = $eEmpreendimento->getEmpDescricao();
				$vet['$4'] = $eEmpreendimento->getEmpLocalizacao();
				$vet['$5'] = $eEmpreendimento->getEmpDtLancamento();
				break;
			default :
				$vet['$1'] = $eEmpreendimento->getEmpId();
				break;
		}
	}

}

?>
