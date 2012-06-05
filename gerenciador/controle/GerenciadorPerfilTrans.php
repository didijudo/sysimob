<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
include '../../dao/controle/DAOPerfilTrans.php';
class GerenciadorPerfilTrans {
    
    //private $daoPerfilTrans = null;
    
    function __construct() {
        //$this->daoPerfilTrans = new DAOPerfilTrans();
    }


    public function inserir($entidade) {
        $daoPerfilTrans = new DAOPerfilTrans();
        $daoPerfilTrans->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $daoPerfilTrans = new DAOPerfilTrans();
        $daoPerfilTrans->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $daoPerfilTrans = new DAOPerfilTrans();
        $daoPerfilTrans->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $daoPerfilTrans = new DAOPerfilTrans();
        return $daoPerfilTrans->consultarKey($entidade);
    }
    
}

?>
