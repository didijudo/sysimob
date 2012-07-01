<?php


/**
 * Classe para gerenciamento das regras de negocios referente a tabela tb_emprendimento
 *
 * @author Anderson Faro
 */
include_once 'dao/imobiliario/DAOEmpreendimento.php';
class GerenciadorEmpreendimento {
    
    function __construct() {}

    public function inserir($entidade) {
        $dao = new DAOEmpreendimento();
        $dao->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $dao = new DAOEmpreendimento();
        $dao->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $dao = new DAOEmpreendimento();
        $dao->deletarKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $dao = new DAOEmpreendimento();
        return $dao->consultarKey($entidade);
    }
    
    public function consultarFull() {
        $dao = new DAOEmpreendimento();
        return $dao->consultarFull();
    }
}

?>
