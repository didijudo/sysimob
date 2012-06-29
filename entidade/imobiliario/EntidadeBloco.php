<?php

/**
 * Classe com os campos que compoem a tabela tb_bloco
 *
 * @author Anderson Faro
 */
class EntidadeBloco {
    
    function __construct() {}
    
    private $_idBloco;
    private $_idEmpreendimento;
    private $cdBloco;
    private $stBloco;
    
    public function setIdEmpreendimento($idEmpreendimeto){
        $this->_idEmpreendimento = $idEmpreendimeto;
    }

    public function setCdBloco($cdBloco) {
        $this->cdBloco = $cdBloco;
    }
    
    public function setStBloco($stBloco) {
        $this->stBloco = $stBloco;
    }

    public function _getIdBloco() {
        return $this->_idBloco;
    }
    
    
    public function getIdEmpreendimeto() {
        return $this->_idEmpreendimento;
    }
    
    public function getCdBloco() {
        return $this->cdBloco;
    }
    
    public function  getStBloco() {
        return $this->stBloco;
    }
    
}

?>
