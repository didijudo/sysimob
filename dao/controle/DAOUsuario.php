<?php
/**
 * Operacao Base da tabela tb_usuario
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
include_once 'entidade/controle/EntidadeUsuario.php';
class DAOUsuario {
    
    function __construct() {}
    
    public function inserir(EntidadeUsuario $pEntidade) {
        try {
            $query = "INSERT INTO perfil.tb_usuario (cpfUsuario, cdPerfil, nmUsuario,".
                    "pwdUsuario, flAtivo) VALUES ($1, $2, $3, $4, $5)";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "I");
            pg_prepare($conAtiva, "insertUsuario", $query);
            pg_execute($conAtiva, "insertUsuario", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizar(EntidadeUsuario $pEntidade) {
        try {
            $query = "UPDATE perfil.tb_usuario SET cdPerfil = $2, nmUsuario = $3, ".
                    "pwdUsuario = $4, flAtivo = $5 WHERE cpfUsuario = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "U");
            pg_prepare($conAtiva, "updateUsuario", $query);
            pg_execute($conAtiva, "updateUsuario", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey(EntidadeUsuario $pEntidade) {
        try {
            $query = "DELETE FROM perfil.tb_usuario WHERE cpfUsuario = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "D");
            //var_dump($param);
            pg_prepare($conAtiva, "deleteUsuario", $query);
            pg_execute($conAtiva, "deleteUsuario", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeUsuario $pEntidade) {
        try {
			echo 'DAOconsultarKey'.'<br>';
            $query = "SELECT * FROM perfil.tb_usuario WHERE cpfUsuario = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "C");
			echo 'a<br>';
            $resultado = pg_query_params($conAtiva, $query, $param); 
			echo 'b<br>';
            $conexao->fechar();    
            return pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }


    public function parametros(EntidadeUsuario $entidade, $tipo) {
        $vet = array();
        if ($tipo == "U" || $tipo == "I") {
            $vet['$1'] = $entidade->getCpf();
            $vet['$2'] = $entidade->getCdPerfil();
            $vet['$3'] = $entidade->getNmUsuario();
            $vet['$4'] = $entidade->getPwdUsuario();
            $vet['$5'] = $entidade->getFlAtivo();
        } else {
            $vet['$1'] = $entidade->getCpf();
        }
        return $vet;
    }
    
}

?>
