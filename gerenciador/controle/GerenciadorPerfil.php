<?php 
/**
 * Gerenciador para as regras de negocio da tabela tb_perfil
 *
 * @author Anderson Faro
 */
//include_once '/var/www/html/sysimob/dao/controle/DAOPerfil.php';
include_once 'dao/controle/DAOPerfil.php';
//@include_once (__dir);
class GerenciadorPerfil {
    //$daoPerfil = null;
    function __construct() {
        //echo "Testando constructor";
        //echo __DIR__;
        //ini_set('include_path', '.:/var/www/html/sysimob/');
    }

    public function inserir($entidade) { 
        
        $daoPerfil = new DAOPerfil();
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
