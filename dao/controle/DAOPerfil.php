<?php
/**
 * Operacao Base da tabela tb_perfil
 *
 * @author Anderson Faro
 */
class DAOPerfil {
    
    private $operacao = null; 
    
    function __construct() {
        $this->operacao = new OperacaoBase();
    }
    
    public function inserir($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_perfil", $pEntidade, "perfil");
    }
    
    public function atualizar($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_perfil", $pEntidade, "perfil");
    }
    
    public function consultarKey($pEntidade) {
        $opr = $this->operacao;
        return $opr->consultarKey("tb_perfil", $pEntidade, "perfil");
    }
    
}

?>
