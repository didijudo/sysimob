<?php

/**
 * Clase com a estrutura de acesso a dados da tabela tb_empreendimento
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/imobiliario/EntidadeEmpreendimento.php';
class DAOEmpreendimento {
    
    function __construct() {}
    
    public function consultarKey(EntidadeEmpreendimento $eEmpreendimento) {
        try {
            $query = "SELECT * FROM imob.tb_empreendimento WHERE idEmpreendimento = $1";
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
    
    public function inserir(EntidadeEmpreendimento $eEmpreendimento) {
         try {   
            $query = "INSERT INTO imob.tb_empreedimento (nmEmpreendimento, dsEmpreendimento, 
                    dsEndereco, dsRegiao) VALUES ($1, $2, $3, $4)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosEmpreendimento($eEmpreendimento, "I");
            pg_prepare($conAtiva, "insertEmpreendimento", $query);
            pg_execute($conAtiva, "insertEmpreendimento", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeEmpreendimento $eEmpreendimento) {
        try {
            $query = "UPDATE imob.tb_empreendimento 
                        SET nmEmprendimento = $2, 
                            dsEmpreendimento = $3,
                            dsEndereco = $4,
                            dsRegai = $5
                      WHERE idEmpreendimento = $1";
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
            $query = "DELETE FROM imob.tb_empreendimento WHERE idEmpreendimento = $1";
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
    
    private function parametrosEmpreendimento(EntidadeEmpreendimento $eEmpreendimento, $tipo) {
        $vet = array();
        switch ($tipo) {
            case "I" :
                $vet['$1'] = $eEmpreendimento->getNmEmpreendimento();
                $vet['$2'] = $eEmpreendimento->getDsEmpreedimento();
                $vet['$3'] = $eEmpreendimento->getDsEndereco();
                $vet['$4'] = $eEmpreendimento->getDsRegiao();
                break;
            case "U" :
                $vet['$1'] = $eEmpreendimento->_getIdEmpreendimento();
                $vet['$2'] = $eEmpreendimento->getNmEmpreendimento();
                $vet['$3'] = $eEmpreendimento->getDsEmpreedimento();
                $vet['$4'] = $eEmpreendimento->getDsEndereco();
                $vet['$5'] = $eEmpreendimento->getDsRegiao();
                break;
            default :
                $vet['$1'] = $eEmpreendimento->_getIdEmpreendimento();
                break;
        }
    }
    
}

?>
