<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_usuario
 *
 * @author Anderson Faro
 */
include_once 'dao/controle/DAOUsuario.php';
class GerenciadorUsuario {
    
    function __construct() {}


    public function inserir($entidade) {
        $daoUsuario = new DAOUsuario();
        $daoUsuario->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $daoUsuario = new DAOUsuario();
        $daoUsuario->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $daoUsuario = new DAOUsuario();
        $daoUsuario->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $daoUsuario = new DAOUsuario();
        return $daoUsuario->consultarKey($entidade);
    }
    
}

?>
