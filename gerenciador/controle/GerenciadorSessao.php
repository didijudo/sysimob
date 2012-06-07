<?php

/**
 * Gerenciador para o controle de Sessão
 *
 * @author Anderson Faro
 */
include_once 'dao/controle/DAOSessao.php';
class GerenciadorSessao {
    
    function __construct() {}
    
    public function criarSessao($usuario, $senha) {
        if (!$this->getUsuarioValido($usuario, $senha)) {
            throw new Exception("Usuario invalido!");
        }
        
        $daoSessao = new DAOSessao();
        $param = array( '$1' => $usuario);         
        return $daoSessao->getPermissoes($param);
    }
    
    private function getUsuarioValido($user, $pwd) {
        $daoSessao = new DAOSessao();
        $resultado = $daoSessao->getUsuarioValido($user, $pwd);
        if ($resultado != FALSE)
            return TRUE;
        else
            return FALSE;
    }
}

?>
