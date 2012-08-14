<?php

/**
 * Classe composta pelos campos da tabela tb_apa_apartamento
 *
 * @author Anderson Faro
 */
class EntidadeApartamento {
    
    function __construct() {}
	
	private $apa_numero;    
    private $blo_id;
    private $emp_id;
	private $apa_status;
	private $apa_posicao;

	public function setApaNumero($apa_numero) {
		$this->apa_numero = $apa_numero;
	}
	
	public function getApaNumero() {
		return $this->apa_numero;
	}

	public function setBloId($blo_id) {
		$this->blo_id = $blo_id;
	}
    
    public function getBloId() {
        return $this->blo_id;
    }
    
    public function setEmpId($emp_id) {
		$this->emp_id = $emp_id;	
	}		
	
    public function getEmpId() {
        return $this->emp_id;
    }
	
	public function setApaStatus($apa_status) {
		$this->apa_status = $apa_status;
	}
	
	public function getApaStatus() {
		return $this->apa_status;
	}
	
	public function setApaPosicao($apa_posicao) {
		$this->apa_posicao = $apa_posicao;
	}
	
	public function getApaPosicao() {
		return $this->apa_posicao;
	}

}
