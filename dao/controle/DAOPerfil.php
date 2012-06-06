<?php
/**
 * Operacao Base da tabela tb_perfil
 *
 * @author Anderson Faro
 */
//include_once 'dao/ad/OperacaoBase.php';
include_once 'dao/ad/Conexao.php';
include_once 'entidade/controle/EntidadePerfil.php';
class DAOPerfil { //extends OperacaoBase {
    
    public function __construct() {}   
    
    public function inserir(EntidadePerfil $pEntidade) {
        try {
            $query = "INSERT INTO perfil.tb_perfil (dsperfil, flativo) VALUES ($1, $2)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "I");
            pg_prepare($conAtiva, "insertPerfil", $query);
            pg_execute($conAtiva, "insertPerfil", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadePerfil $pEntidade) {
        try {
            $query = "UPDATE perfil.tb_perfil SET dsperfil = $2, flativo = $3 WHERE cdperfil = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "U");
            pg_prepare($conAtiva, "updatePerfil", $query);
            pg_execute($conAtiva, "updatePerfil", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadePerfil $pEntidade) {
        try {
            $query = "DELETE FROM perfil.tb_perfil WHERE cdperfil = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "D");
            pg_prepare($conAtiva, "deletePerfil", $query);
            pg_execute($conAtiva, "deletePerfil", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadePerfil $pEntidade) {
        try {
            $query = "SELECT * FROM perfil.tb_perfil WHERE cdperfil = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade);
            //pg_prepare($conAtiva, "selectPerfil", $query);
            pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();            
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }


    public function parametrosPerfil(EntidadePerfil $entidade, $tipo) {
        $vetPerfil = array();
        switch ($tipo) {
            case "U": 
                $vetPerfil['$1'] = $entidade->getCdPerfil();
                $vetPerfil['$2'] = $entidade->getDsPerfil();
                $vetPerfil['$3'] = $entidade->getFlPerfil();
                break;
            case "I":
                $vetPerfil['$1'] = $entidade->getDsPerfil();
                $vetPerfil['$2'] = $entidade->getFlPerfil();
                break;
            default :
                $vetPerfil['$1'] = $entidade->getCdPerfil();
                break;
          }
        return $vetPerfil;
    }
    
    
}

?>
