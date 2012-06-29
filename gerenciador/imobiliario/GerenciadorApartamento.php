<?php


/**
 * Gerenciador para controle das regras de negocio referente a tabela tb_apartamento
 *
 * @author Anderson Faro
 */
include_once 'dao/imobiliario/DAOApartamento.php';
class GerenciadorApartamento {
    
    function __construct() {}

    public function inserir($entidade) {
        $dao = new DAOApartamento();
        $dao->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $dao = new DAOApartamento();
        $dao->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $dao = new DAOApartamento();
        $dao->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $dao = new DAOApartamento();
        return $dao->consultarKey($entidade);
    }
}

?>
