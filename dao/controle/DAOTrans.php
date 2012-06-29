<?php
/**
 * Operacao Base da tabela tb_trans
 *
 * @author Anderson Faro
 */
//include 'ad/OperacaoBase.php';
include_once 'dao/ad/Conexao.php';
include_once 'entidade/controle/EntidadeTrans.php';
class DAOTrans {
    
    function __construct() {}
    
    public function inserir(EntidadeTrans $pEntidade) {
        try {
            $query = "INSERT INTO perfil.tb_trans (dstrans, flativa) VALUES ($1, $2)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "I");
            pg_prepare($conAtiva, "insertTrans", $query);
            pg_execute($conAtiva, "insertTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeTrans $pEntidade) {
        try {
            $query = "UPDATE perfil.tb_trans SET dsTrans = $2, flAtiva = $3 WHERE cdTrans = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "U");
            pg_prepare($conAtiva, "updateTrans", $query);
            pg_execute($conAtiva, "updateTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadeTrans $pEntidade) {
        try {
            $query = "DELETE FROM perfil.tb_trans WHERE cdTrans = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "D");
            pg_prepare($conAtiva, "deleteTrans", $query);
            pg_execute($conAtiva, "deleteTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeTrans $pEntidade) {
        try {
            $query = "SELECT * FROM perfil.tb_trans WHERE cdTrans = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "C");
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }


    public function parametrosPerfil(EntidadeTrans $entidade, $tipo) {
        $vet = array();
        switch ($tipo) {
            case "U":
                echo "Testandoooo ...";
                $vet['$1'] = $entidade->getCdTrans();
                $vet['$2'] = $entidade->getDsTrans();
                $vet['$3'] = $entidade->getFlTrans();
                break;
            case "I":
                $vet['$1'] = $entidade->getDsTrans();
                $vet['$2'] = $entidade->getFlTrans();
                break;
            default :
                $vet['$1'] = $entidade->getCdTrans();
                break;
          }
        return $vet;
    }
    
}

?>
