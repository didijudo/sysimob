<?php

/**
 * Classe para representar o Objeto tb_perfil_trans
 *
 * @author Anderson Faro
 */
class EntidadePerfilTrans {

    private $cdPerfil;
    private $cdTrans;
    private $flInserir;
    private $flAlterar;
    private $flExcluir;
    private $flConsultar;

    public function setCdPerfil($cdPerfil) {
        $this->cdPerfil = $cdPerfil;
    }

    public function setCdTrans($cdTrans) {
        $this->cdTrans = $cdTrans;
    }

    public function setCdPerfil($flInserir) {
        $this->flInserir = $flInserir;
    }

    public function setFlAlterar($flAlterar) {
        $this->flAlterar = $flAlterar;
    }

    public function setFlExcluir($flExcluir) {
        $this->flExcluir = $flExcluir;
    }

    public function setFlConsultar($flConsultar) {
        $this->flConsultar = $flConsultar;
    }

    public function getCdPerfil() {
        return $this->cdPerfil;
    }

    public function getCdTrans() {
        return $this->cdTrans;
    }

    public function getCdPerfil() {
        return $this->flInserir;
    }

    public function getFlAlterar() {
        return $this->flAlterar;
    }

    public function getFlExcluir() {
        return $this->flExcluir;
    }

    public function getFlConsultar() {
        return $this->flConsultar;
    }
}
?>
