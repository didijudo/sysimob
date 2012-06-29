<?php

/**
 * Classe para controle de acesso a tabela tb_apartamento
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeApartamento.php';
class DAOApartamento {
    
    function __construct() {}
    
    public function inserir(EntidadeApartamento $eApartamento) {
        try {
            $query = "INSERT INTO imob.tb_apartamento ( idBloco, idEmpreendimento, 
                        nrApartamento, psApartamento, stApartamento ) VALUES ($1, $2, $3, $4, $5)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eApartamento, "I");
            pg_prepare($conAtiva, "insertApartamento", $query);
            pg_execute($conAtiva, "insertApartamento", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeApartamento $eApartamento) {
        try {
            $query = "UPDATE imob.tb_apartamento 
                        SET nrApartamento = $4, 
                            psApartamento = $5, 
                            stApartamento = $6
                      WHERE IdApartamento = $1 and idBloco = $2 and idEmpreendimento = $3";
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
            $query = "DELETE FROM imob.tb_apartamento WHERE idApartamento = $1
                        and idBloco = $2 and idEmpreendimento = $3";
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
            $query = "SELECT * FROM imob.tb_apartamento WHERE idApartamento = $1
                        and idBloco = $2 and idEmpreendimento = $3";
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
                $vet['$1'] = $eApartamento->getIdBloco();
                $vet['$2'] = $eApartamento->getIdEmpreendimento();
                $vet['$3'] = $eApartamento->getNrApartamento();
                $vet['$4'] = $eApartamento->getPsApartamento();
                $vet['$5'] = $eApartamento->getStApartamento();
                break;
            case "U" :
                $vet['$1'] = $eApartamento->_getIdApartamento();
                $vet['$2'] = $eApartamento->getIdBloco();
                $vet['$3'] = $eApartamento->getIdEmpreendimento();
                $vet['$4'] = $eApartamento->getNrApartamento();
                $vet['$5'] = $eApartamento->getPsApartamento();
                $vet['$6'] = $eApartamento->getStApartamento();
                break;
            default :
                $vet['$1'] = $eApartamento->_getIdApartamento();
                $vet['$2'] = $eApartamento->getIdBloco();
                $vet['$3'] = $eApartamento->getIdEmpreendimento();
                break;
        }
    }
}

?>
