<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_trans
 *
 * @author Anderson Faro
 */
include 'dao/controle/DAOTrans.php';
class GerenciadorTrans {
    
    function __construct() {}

    public function inserir($entidade) {
        $daoTrans = new DAOTrans();
        $daoTrans->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $daoTrans = new DAOTrans();
        $daoTrans->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $daoTrans = new DAOTrans();
        $daoTrans->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $daoTrans = new DAOTrans();
        return $daoTrans->consultarKey($entidade);
    }
    
}

?>
