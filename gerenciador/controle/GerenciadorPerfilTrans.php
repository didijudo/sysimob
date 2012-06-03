<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
class GerenciadorPerfilTrans {
    
    private $daoPerfilTrans = null;
    
    function __construct() {
        $this->daoPerfilTrans = new DAOPerfilTrans();
    }


    public function inserir($entidade) {
        $this->daoPerfilTrans->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $this->daoPerfilTrans->atualizar($entidade);
    }
    
    public function consultarKey($entidade) {
        $this->daoPerfilTrans->consultarKey($entidade);
    }
    
}

?>
