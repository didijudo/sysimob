<?php

/**
 * Entidade com os dados da tabela tb_emp_empreendimeto
 *
 * @author Anderson Faro
 */
class EntidadeEmpreendimento {
    
    function __construct() {}
    
    private $emp_id;
    private $emp_nome;
    private $emp_descricao;
    private $emp_localizacao;
    private $emp_dtlancamento;
    
	public function setEmpId($emp_id) {
        $this->emp_id = $emp_id;
    }
	
    public function setEmpNome($emp_nome) {
        $this->emp_nome = $emp_nome;
    }
    
    public function setEmpDescricao($emp_descricao) {
        $this->emp_descricao= $emp_descricao;
    }
    
    public function setEmpLocalizacao($emp_localizacao) {
        $this->emp_localizacao = $emp_localizacao;
    }
    
    public function setEmpDtLancamento($emp_dtlancamento) {
        $this->emp_dtlancamento = $emp_dtlancamento;
    }

    public function getEmpId() {
        return $this->emp_id;
    }
    
    public function getEmpNome() {
        return $this->emp_nome;
    }
    
    public function getEmpDescricao() {
        return $this->emp_descricao;
    }
    
    public function getEmpLocalizacao() {
        return $this->emp_localizacao;
    }
    
    public function getEmpDtLancamento() {
        return $this->emp_dtlancamento;
    }
}

