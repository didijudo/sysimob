<?php
/**
 * Operacao Base da tabela tb_perfil
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/controle/EntidadePerfil.php';
class DAOPerfil {
    
    public function __construct() {}   
    
    public function inserir(EntidadePerfil $pEntidade) {
        try {
            $query = "INSERT INTO sysimob.tb_per_perfil (per_descricao, per_flativo) VALUES ($1, $2)";
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
            $query = "UPDATE sysimob.tb_per_perfil SET per_descricao = $2, per_flativo = $3 WHERE per_codigo = $1";
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
            $query = "DELETE FROM sysimob.tb_per_perfil WHERE per_codigo = $1";
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
            $query = "SELECT * FROM sysimob.tb_per_perfil WHERE per_codigo = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametrosPerfil($pEntidade, "C");
            //pg_prepare($conAtiva, "selectPerfil", $query);
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();  
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }


    public function parametrosPerfil(EntidadePerfil $entidade, $tipo) {
        $vetPerfil = array();
        switch ($tipo) {
            case "U": 
                $vetPerfil['$1'] = $entidade->getPerCodigo();
                $vetPerfil['$2'] = $entidade->getPerDescricao();
                $vetPerfil['$3'] = $entidade->getPerFlAtivo();
                break;
            case "I":
                $vetPerfil['$1'] = $entidade->getPerDescricao();
                $vetPerfil['$2'] = $entidade->getPerFlAtivo();
                break;
            default :
                $vetPerfil['$1'] = $entidade->getPerCodigo();
                break;
          }
        return $vetPerfil;
    }
    
    
}

?>
