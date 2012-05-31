<?php

/**
 * Classe para controle da transação
 *
 * @author Anderson Faro
 */
class EntidadeTrans {
    private $cdTrans;
    private $dsTrans;
    private $flAtiva;


    public function setCdTrans($cdTrans) {
        $this->cdTrans = $cdTrans;
    }

    public function setDsTrans($dsTrans) {
        $this->dsTrans = $dsTrans;
    }

    public function setFlTrans($flTrans) {
        $this->flTrans = $flTrans;
    }

    public function getCdTrans() {
        return $this->cdTrans;
    }

    public function getDsTrans() {
        return $this->dsTrans;
    }

    public function getFlTrans() {
        return $this->flTrans;
    }
}
?>
