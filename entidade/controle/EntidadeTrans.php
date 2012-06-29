<?php

/**
 * Classe para controle da transação
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadeTrans {
    private $_cdTrans;
    private $dsTrans;
    private $flAtiva;

    function __construct() {}

    public function setCdTrans($cdTrans) {
        $this->_cdTrans = $cdTrans;
    }

    public function setDsTrans($dsTrans) {
        $this->dsTrans = $dsTrans;
    }

    public function setFlTrans($flAtiva) {
        $this->flAtiva = $flAtiva;
    }

    public function getCdTrans() {
        return $this->_cdTrans;
    }
    
    public function _getCdTrans() {
        return $this->_cdTrans;
    }

    public function getDsTrans() {
        return $this->dsTrans;
    }

    public function getFlTrans() {
        return $this->flAtiva;
    }
}
?>
