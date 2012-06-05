<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_usuario
 *
 * @author Anderson Faro
 */
include '../../dao/controle/DAOUsuario.php';
class GerenciadorUsuario {
    
    //private $daoUsuario = null;
    
    function __construct() {
        //$this->daoUsuario = new DAOUsuario();
    }


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
