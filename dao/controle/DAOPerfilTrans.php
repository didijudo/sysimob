<?php
/**
 * Operacao Base da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/controle/EntidadePerfilTrans.php';
class DAOPerfilTrans {
    
    function __construct() {}
    
    public function inserir(EntidadePerfilTrans $pEntidade) {
        try {
            $query = "INSERT INTO perfil.tb_perfil_trans (cdPerfil, cdTrans, flInserir,".
                    "flAlterar, flExcluir, flConsultar) VALUES ($1, $2, $3, $4, $5, $6)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "I");
            pg_prepare($conAtiva, "insertPerfilTrans", $query);
            pg_execute($conAtiva, "insertPerfilTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadePerfilTrans $pEntidade) {
        try {
            $query = "UPDATE perfil.tb_perfil_trans SET flInserir = $3, flAlterar = $4, ".
                    "flExcluir = $5, flConsultar = $6 WHERE cdPerfil = $1 and cdTrans = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "U");
            pg_prepare($conAtiva, "updatePerfilTrans", $query);
            pg_execute($conAtiva, "updatePerfilTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadePerfilTrans $pEntidade) {
        try {
            $query = "DELETE FROM perfil.tb_perfil_trans WHERE cdPerfil = $1 and cdTrans = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "D");
            //var_dump($param);
            pg_prepare($conAtiva, "deletePerfilTrans", $query);
            pg_execute($conAtiva, "deletePerfilTrans", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadePerfilTrans $pEntidade) {
        try {
            $query = "SELECT * FROM perfil.tb_perfil_trans WHERE cdPerfil = $1 and cdTrans = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "C");
            $resultado = pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();   
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }


    public function parametros(EntidadePerfilTrans $entidade, $tipo) {
        $vet = array();
        if ($tipo == "U" || $tipo == "I") {
            $vet['$1'] = $entidade->getCdPerfil();
            $vet['$2'] = $entidade->getCdTrans();
            $vet['$3'] = $entidade->getFlInserir();
            $vet['$4'] = $entidade->getFlAlterar();
            $vet['$5'] = $entidade->getFlExcluir();
            $vet['$6'] = $entidade->getFlConsultar();
        } else {
            $vet['$1'] = $entidade->getCdPerfil();
            $vet['$2'] = $entidade->getCdTrans();
        }
        return $vet;
    }
    
}

?>
