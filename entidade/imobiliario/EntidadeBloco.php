<?php

/**
 * Classe com os campos que compoem a tabela tb_blo_bloco
 *
 * @author Anderson Faro
 */
class EntidadeBloco {
    
    function __construct() {}
    
    private $blo_id;
    private $emp_id;
    private $blo_status;
    

    public function setBloId($blo_id) {
    	$this->blo_id = $blo_id;
    }
    
    public function setEmpId($emp_id){
        $this->emp_id = $emp_id;
    }

    public function setBloStatus($blo_status) {
        $this->blo_status = $blo_status;
    }

    public function getBloId() {
        return $this->blo_id;
    }
    
    
    public function getEmpId() {
        return $this->emp_id;
    }
    
    public function  getBloStatus() {
        return $this->blo_status;
    }
    
}
