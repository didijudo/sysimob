<?php

/**
 * Entidade com os dados da tabela tb_empreendimeto
 *
 * @author Anderson Faro
 */
class EntidadeEmpreendimento {
    
    function __construct() {}
    
    private $_idEnmpreendimento;
    private $nmEmpreendimento;
    private $dsEmpreendimento;
    private $dsEndereco;
    private $dsRegiao;
    
    public function setNmEmpreendimento($nmEmpreendimento) {
        $this->nmEmpreendimento = $nmEmpreendimento;
    }
    
    public function setDsEmpreendimento($dsEmpreendimento) {
        $this->dsEmpreendimento = $dsEmpreendimento;
    }
    
    public function setDsEndereco($dsEmpreendimento) {
        $this->dsEndereco = $dsEmpreendimento;
    }
    
    public function setDsRegiao($dsRegiao) {
        $this->dsRegiao = $dsRegiao;
    }

    public function _getIdEmpreendimento() {
        return $this->_idEnmpreendimento;
    }
    
    public function getNmEmpreendimento() {
        return $this->nmEmpreendimento;
    }
    
    public function getDsEmpreendimento() {
        return $this->dsEmpreendimento;
    }
    
    public function getDsEndereco() {
        return $this->dsEndereco;
    }
    
    public function getDsRegiao() {
        return $this->dsRegiao;
    }
    
}

?>
