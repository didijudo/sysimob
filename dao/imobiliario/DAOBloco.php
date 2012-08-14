<?php

/**
 * Classe para acesso de dados da tabela tb_blo_bloco
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeBloco.php';
class DAOBloco {
    
    function __construct() {}
    
    public function inserir(EntidadeBloco $eBloco) {
        try {
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            
            pg_query($conAtiva, "BEGIN;");
            
            $query = "INSERT INTO sysimob.tb_blo_bloco (blo_id, emp_id, blo_status) VALUES ($1, $2, $3)";            
			$param = array();
			$param['$1'] = $eBloco->getBloId();
			$param['$2'] = $eBloco->getEmpId();
			$param['$3'] = $eBloco->getBloStatus();
			//var_dump($param);
            
            $result = pg_query_params($conAtiva, $query, $param);
                        
            pg_query($conAtiva, "COMMIT;");
            
            $conexao->fechar();
        } catch (Exception $err) {
        	pg_query($conAtiva, "ROLLBACK;");
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeBloco $eBloco) {
        try {
            $query = "UPDATE sysimob.tb_blo_bloco 
                        SET blo_status = $3 
                      WHERE blo_id = $1 
                        and emp_id = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosBloco($eBloco, "U");
            pg_prepare($conAtiva, "updateBloco", $query);
            pg_execute($conAtiva, "updateBloco", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadeBloco $eBloco) {
        try {
            $query = "DELETE FROM sysimob.tb_blo_bloco WHERE blo_id = $1 
                        and emp_id = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosBloco($eBloco, "D");
            pg_prepare($conAtiva, "deleteTrans", $query);
            pg_execute($conAtiva, "deleteTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeBloco $eBloco) {
        try {
            $query = "SELECT * FROM sysimob.tb_blo_bloco WHERE blo_id = $1 and emp_id = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosBloco($eBloco, "C");
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarEmpreendimento(EntidadeBloco $eBloco) {
        try {
            $query = "SELECT * FROM sysimob.tb_blo_bloco WHERE emp_id = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = array('$1' => $eBloco->getIdEmp());
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    private function parametrosBloco(EntidadeBloco $eBloco, $tipo) {
        $vet = array();
        switch ($tipo) {
            case "I" :            	
                $vet['$1'] = $eBloco->getBloId();
                $vet['$2'] = $eBloco->getEmpId();
                $vet['$3'] = $eBloco->getBloStatus();
                break;
            case "U" :
                $vet['$1'] = $eBloco->getBloId();
                $vet['$2'] = $eBloco->getEmpId();
                break;
            default :
                $vet['$1'] = $eBloco->getBloId();
                $vet['$2'] = $eBloco->getEmpId();
                break;
        }
    }
    
}