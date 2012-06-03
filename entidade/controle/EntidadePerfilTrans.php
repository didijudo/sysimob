<?php

/**
 * Classe para representar o Objeto tb_perfil_trans
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadePerfilTrans {

    private $_cdPerfil;
    private $_cdTrans;
    private $flInserir;
    private $flAlterar;
    private $flExcluir;
    private $flConsultar;
    
    public function setCdTrans($cdTrans) {
        $this->_cdTrans = $cdTrans;
    }

    public function setCdPerfil($cdPerfil) {
        $this->_cdPerfil = $cdPerfil;
    }
    
    public function setFlInserir($flInserir) {
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
    
    public function _getCdTrans() {
        return $this->_cdTrans;
    }

    public function _getCdPerfil() {
        return $this->_cdPerfil;
    }
    
    public function getFlInserir() {
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
