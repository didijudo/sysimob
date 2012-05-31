<?php

/**
 * Classe para representar o Objeto tb_perfil
 *
 * @author Anderson Faro
 */
class EntidadePerfil {
    
    private $cdPerfil;
    private $dsPerfil;
    private $flAtivo;

    public function setCdPerfil($cdPerfil) {
        $this->cdPerfil = $cdPerfil;
    }

    public function setDsPerfil($dsPerfil) {
        $this->dsPerfil = $dsPerfil;
    }

    public function setFlPerfil($flAtivo) {
        $this->flAtivo = $flAtivo;
    }

    public function getCdPerfil() {
        return $this->cdPerfil;
    }

    public function getDsPerfil() {
        return $this->dsPerfil;
    }

    public function getFlPerfil() {
        return $this->flAtivo;
    }

}
?>
