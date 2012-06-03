<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_trans
 *
 * @author Anderson Faro
 */
class GerenciadorTrans {
    
    private $daoTrans = null;
    
    function __construct() {
        $this->daoTrans = new DAOTrans();
    }


    public function inserir($entidade) {
        $this->daoTrans->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $this->daoTrans->atualizar($entidade);
    }
    
    public function consultarKey($entidade) {
        $this->daoTrans->consultarKey($entidade);
    }
    
}

?>
