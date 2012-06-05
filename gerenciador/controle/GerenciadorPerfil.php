<?php 
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil
 *
 * @author Anderson Faro
 */
include_once '../../dao/controle/DAOPerfil.php';
//@include_once (__dir);
class GerenciadorPerfil {
    //$daoPerfil = null;
    function __construct() {}

    public function inserir($entidade) { 
        
        $daoPerfil = new DAOPerfil();
        echo "Testando";
        $daoPerfil->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $daoPerfil = new DAOPerfil();
        $daoPerfil->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $daoPerfil = new DAOPerfil();
        $daoPerfil->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $daoPerfil = new DAOPerfil();
        return $daoPerfil->consultarKey($entidade);
    }
}

?>
