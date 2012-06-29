<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
include 'dao/controle/DAOPerfilTrans.php';
class GerenciadorPerfilTrans {
    
    function __construct() {}

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
