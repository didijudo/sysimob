<?php

/**
 * Classe composta pelos campos da tabela tb_apartamento
 *
 * @author Anderson Faro
 */
class EntidadeApartamento {
    
    function __construct() {}
    
    private $_idApartamento;
    private $_idBloco;
    private $_idEmpreendimento;
    private $stApartamento;
    private $nrApartamento;
    private $psApartamento;
    
    public function setIdBloco($idBloco){
        $this->_idBloco = $idBloco;
    }
    
    public function setIdEmpreendimento($idEmpreendimento){
        $this->_idEmpreendimento = $idEmpreendimento;
    }
    
    public function setStApartamento($stApartamento) {
        $this->stApartamento = $stApartamento;
    }
    
    public function setNrApartamento($nrApartamento){
        $this->nrApartamento = $nrApartamento;
    }
    
    public function setpsApartamento($psApartamento){
        $this->psApartamento = $psApartamento;
    }
    
    public function _getIdApartamento(){
        return $this->_idApartamento;
    }
    
    public function getIdBloco(){
        return $this->_idBloco;
    }
    
    public function getIdEmpreendimento(){
        return $this->_idEmpreendimento;
    }
    
    public function getStApartamento(){
        return $this->stApartamento;
    }
    
    public function getNrApartamento(){
        return $this->getNrApartamento();
    }
    
    public function getPsApartamento(){
        return $this->psApartamento;
    }
}

?>
