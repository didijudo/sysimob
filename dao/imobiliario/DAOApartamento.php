<?php

/**
 * Classe para controle de acesso a tabela tb_apa_apartamento
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeApartamento.php';
class DAOApartamento {
    
    function __construct() {}
    
    public function inserir(EntidadeApartamento $eApartamento) {
        try {
        	$conexao = new Conexao();
        	$conAtiva   = $conexao->getConexao();
        	
        	pg_query($conAtiva, "BEGIN;");
        	
            $query = "INSERT INTO sysimob.tb_apa_apartamento ( apa_numero, blo_id, emp_id, 
                        apa_status, apa_posicao ) VALUES ($1, $2, $3, $4, $5)";
            $param = array();
            $param['$1'] = $eApartamento->getApaNumero();
            $param['$2'] = $eApartamento->getBloId();
            $param['$3'] = $eApartamento->getEmpId();
            $param['$4'] = $eApartamento->getApaStatus();
            $param['$5'] = $eApartamento->getApaPosicao();
//            var_dump($param);
            
            $result = pg_query_params($conAtiva, $query, $param);
            
            pg_query($conAtiva, "COMMIT;");
            
            $conexao->fechar();
        } catch (Exception $err) {
        	pg_query($conAtiva, "ROLLBACK;");
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeApartamento $eApartamento) {
        try {
            $query = "UPDATE sysimob.tb_apa_apartamento 
                        SET apa_posicao = $5, 
                            apa_status = $6
                      WHERE apa_numero = $1 and blo_id = $2 and emp_id = $3";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eApartamento, "U");
            pg_prepare($conAtiva, "updateApartamento", $query);
            pg_execute($conAtiva, "updateApartamento", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadeApartamento $eApartamento) {
        try {
            $query = "DELETE FROM sysimob.tb_apa_apartamento WHERE apa_numero = $1
                        and blo_id = $2 and emp_id = $3";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eApartamento, "D");
            pg_prepare($conAtiva, "deleteApartamento", $query);
            pg_execute($conAtiva, "deleteApartamento", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeApartamento $eApartamento) {
        try {
            $query = "SELECT * FROM sysimob.tb_apa_apartamento WHERE apa_numero = $1
                        and blo_id = $2 and emp_id = $3";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eApartamento, "C");
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    private function parametrosEmpreendimento(EntidadeApartamento $eApartamento, $tipo) {
        $vet = array();
        switch ($tipo) {
            case "I" :
                $vet['$1'] = $eApartamento->getApaNumero();
                $vet['$2'] = $eApartamento->getBloId();
                $vet['$3'] = $eApartamento->getEmpId();
                $vet['$4'] = $eApartamento->getApaStatus();
                $vet['$5'] = $eApartamento->getApaPosicao();
                break;
            case "U" :
                $vet['$1'] = $eApartamento->getApaNumero();
                $vet['$2'] = $eApartamento->getBloId();
                $vet['$3'] = $eApartamento->getEmpId();
                $vet['$4'] = $eApartamento->getApaStatus();
                $vet['$5'] = $eApartamento->getApaPosicao();
                break;
            default :
                $vet['$1'] = $eApartamento->getApaNumero();
                $vet['$2'] = $eApartamento->getBloId();
                $vet['$3'] = $eApartamento->getEmpId();
                break;
        }
    }
}

?>
