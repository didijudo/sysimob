<?php 
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil
 *
 * @author Anderson Faro
 */
class GerenciadorPerfil {
    
    private $daoPerfil = null;
    
    function __construct() {
        $this->daoPerfil = new DAOPerfil();
    }


    public function inserir($entidade) {
        $this->daoPerfil->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $this->daoPerfil->atualizar($entidade);
    }
    
    public function consultarKey($entidade) {
        $this->daoPerfil->consultarKey($entidade);
    }
}

?>
