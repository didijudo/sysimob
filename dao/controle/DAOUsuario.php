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
            $query = "INSERT INTO sysimob.tb_usu_usuario (usu_cpf, per_codigo, usu_nome,".
                    "usu_password, usu_flativo) VALUES ($1, $2, $3, $4, $5)";
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
            $query = "UPDATE sysimob.tb_usu_usuario SET per_codigo = $2, usu_nome = $3, ".
                    "usu_password = $4, usu_flativo = $5 WHERE usu_cpf = $1";
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
            $query = "DELETE FROM sysimob.tb_usu_usuario WHERE usu_cpf = $1";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "D");
            pg_prepare($conAtiva, "deleteUsuario", $query);
            pg_execute($conAtiva, "deleteUsuario", $param); 
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey(EntidadeUsuario $pEntidade) {
        try {
            $query = "SELECT * FROM sysimob.tb_usu_usuario WHERE usu_cpf = $1 and usu_password = $2";
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $param = $this->parametros($pEntidade, "C");
			var_dump($param);
            $resultado = @pg_query_params($conAtiva, $query, $param); 
            $conexao->fechar();    
            return @pg_fetch_all($resultado);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }

    public function parametros(EntidadeUsuario $entidade, $tipo) {
        $vet = array();
        if ($tipo == "U" || $tipo == "I") {
            $vet['$1'] = $entidade->getUsuCpf();
            $vet['$2'] = $entidade->getPerCodigo();
            $vet['$3'] = $entidade->getUsuNome();
            $vet['$4'] = $entidade->getUsuPassword();
            $vet['$5'] = $entidade->getUsuFlAtivo();
		} else {
            $vet['$1'] = $entidade->getUsuCpf();
			$vet['$2'] = $entidade->getUsuPassword();
        }
        return $vet;
    }
    
}
