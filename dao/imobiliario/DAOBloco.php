<?php

/**
 * Classe para acesso de dados da tabela tb_bloco
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeBloco.php';
class DAOBloco {
    
    function __construct() {}
    
    public function inserir(EntidadeBloco $eBloco) {
        try {
            $query = "INSERT INTO imob.tb_bloco (idEmpreendimento, cdBloco, stBloco) 
                        VALUES ($1, $2, $3)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eBloco, "I");
            pg_prepare($conAtiva, "insertBloco", $query);
            pg_execute($conAtiva, "insertBloco", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeBloco $eBloco) {
        try {
            $query = "UPDATE imob.tb_bloco 
                        SET cdBloco = $3, 
                        stBloco = $4 
                      WHERE idBloco = $1 
                        and idEmpreendimento = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eBloco, "U");
            pg_prepare($conAtiva, "updateBloco", $query);
            pg_execute($conAtiva, "updateBloco", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadeBloco $eBloco) {
        try {
            $query = "DELETE FROM imob.tb_bloco WHERE idBloco = $1 
                        and idEMpreendimento = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eBloco, "D");
            pg_prepare($conAtiva, "deleteTrans", $query);
            pg_execute($conAtiva, "deleteTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeBloco $eBloco) {
        try {
            $query = "SELECT * FROM imob.tb_bloco WHERE idBloco = $1 and idEmpreendimento = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eBloco, "C");
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    private function parametrosEmpreendimento(EntidadeBloco $eBloco, $tipo) {
        $vet = array();
        switch ($tipo) {
            case "I" :
                $vet['$1'] = $eBloco->getIdEmpreendimeto();
                $vet['$2'] = $eBloco->getCdBloco();
                $vet['$3'] = $eBloco->getSetBloco();
                break;
            case "U" :
                $vet['$1'] = $eBloco->_getIdBloco();
                $vet['$2'] = $eBloco->getIdEmpreendimeto();
                $vet['$3'] = $eBloco->getCdBloco();
                $vet['$4'] = $eBloco->getStBloco();
                break;
            default :
                $vet['$1'] = $eBloco->_getIdBloco();
                $vet['$2'] = $eBloco->getIdEmpreendimeto();
                break;
        }
    }
    
}

?>
