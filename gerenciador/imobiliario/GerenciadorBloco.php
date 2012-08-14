<?php

/**
 * Gerenciador para controle da regra de negocio referente a tabela tb_bloco
 *
 * @author Anderson Faro
 */
include_once 'dao/imobiliario/DAOBloco.php';
class GerenciadorBloco {
    
    function __construct() {}

    public function inserir($entidade) {
        $dao = new DAOBloco();
        $dao->inserir($entidade);
    }
    
    public  function atualizar($entidade) {
        $dao = new DAOBloco();
        $dao->atualizar($entidade);
    }
    
    public function deleteKey($entidade) {
        $dao = new DAOBloco();
        $dao->deleteKey($entidade);
    }
    
    public function consultarKey($entidade) {
        $dao = new DAOBloco();
        return $dao->consultarKey($entidade);
    }
    
    public function consultarEmpreendimento($entidade) {
        $dao = new DAOBloco();
        return $dao->consultarEmpreendimento($entidade);
    }
}