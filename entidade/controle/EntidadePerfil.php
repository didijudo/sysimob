<?php

/**
 * Classe para representar o Objeto tb_perfil
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadePerfil {
    
    private $_cdPerfil;
    private $dsPerfil;
    private $flAtivo;
    
    function __construct() {}


    public function setCdPerfil($cdPerfil) {
        $this->_cdPerfil = $cdPerfil;
    }

    public function setDsPerfil($dsPerfil) {
        $this->dsPerfil = $dsPerfil;
    }

    public function setFlPerfil($flAtivo) {
        $this->flAtivo = $flAtivo;
    }

    public function _getCdPerfil() {
        return $this->_cdPerfil;
    }
    
    public function getCdPerfil() {
        return $this->_cdPerfil;
    }

    public function getDsPerfil() {
        return $this->dsPerfil;
    }

    public function getFlPerfil() {
        return $this->flAtivo;
    }
    
}
?>
