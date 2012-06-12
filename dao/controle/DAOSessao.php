<?php
/**
 * Acesso aos dados para Sessao do Usuario
 *
 * @author Anderson Faro
 */
include_once 'dao/ad/Conexao.php';
class DAOSessao {
    
    function __construct() {}
    
    function getPermissoes($param) {
        $query = "select u.cpfUsuario, pt.*
                    from perfil.tb_usuario u
                        join perfil.tb_perfil p on (p.cdPerfil = u.cdPerfil)
                        join perfil.tb_perfil_trans pt on (pt.cdPerfil = p.cdPerfil)
                        join perfil.tb_trans ts on (ts.cdTrans = pt.cdTrans)
                    where u.cpfUsuario = $1 and u.FlAtivo = '1' and ts.flAtiva = '1' ";
        $con = new Conexao();
        $conAtiva = $con->getConexao();
        $resultado = pg_query_params($conAtiva, $query, $param);
        $con->fechar();
        return pg_fetch_all($resultado);
    }


    function getUsuarioValido($user, $pwd) {
        $conexao = new Conexao();
        $conAtiva = $conexao->getConexao();
        $query = "SELECT 1 as valido FROM perfil.tb_usuario u where u.CpfUsuario = $1 and ".
                "u.pwdUsuario = $2";
        $param = $this->parametros($user, $pwd);
        $resultado = pg_query_params($conAtiva, $query, $param);
        $conexao->fechar();
        return pg_fetch_all($resultado);
    }
    
    private function parametros($user, $pwd) {
        $vet = array();
        $vet['$1'] = $user;
        $vet['$2'] = $pwd;
        
        return $vet;
    }    
    
}

?>
