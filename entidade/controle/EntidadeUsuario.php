<?php

/**
 * Description of EntidadeUsuario
 * Os metodos com o "_" são os campos chaves da tabela
 * @author Anderson Faro
 */
class EntidadeUsuario {
    private $_cdCpf;
    private $cdPerfil;
    private $nmUsuario;
    private $pwdUsuario;
    private $flAtivo;
    
    function __construct() {}
    
    public function setCpf($cdCpf) {
        $this->_cdCpf = $cdCpf;
    }
    
    public function setCdPerfil($cdPerfil) {
        $this->cdPerfil = $cdPerfil;
    }
    
    public function setNmUsuario($nmUsuario) {
        $this->nmUsuario = $nmUsuario;
    }
    
    public function setPwdUsuario($pwdUsuario) {
        $this->pwdUsuario = md5($pwdUsuario);
    }
    
    public function setFlAtivo($flAtivo) {
        $this->flAtivo = $flAtivo;
    }
    
    public function getCpf() {
        return $this->cdCpf;
    }
    
    public function _getCpf() {
        return $this->_cdCpf;
    }
    
    public function getCdPerfil() {
        return $this->cdPerfil;
    }    
    
    public function getNmUsuario() {
        return $this->nmUsuario;
    }
    
    public function getPwdUsuario() {
        return $this->pwdUsuario;
    }
    
    public function getFlAtivo() {
        return $this->flAtivo;
    }    
}

?>
