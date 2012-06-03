<?php
/**
 * Gerenciador para as regras de negocio da tabela tb_usuario
 *
 * @author Anderson Faro
 */
class GerenciadorUsuario {
    
    private $daoUsuario = null;
    
    function __construct() {
        $this->daoUsuario = new DAOUsuario();
    }


    public function inserir($entidade) {
        $this->daoUsuario->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $this->daoUsuario->atualizar($entidade);
    }
    
    public function consultarKey($entidade) {
        $this->daoUsuario->consultarKey($entidade);
    }
    
}

?>
