<?php
/**
 * Operacao Base da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
class DAOPerfilTrans {
   
    private $operacao = null; 
    
    function __construct() {
        $this->operacao = new OperacaoBase();
    }
    
    public function inserir($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_perfil_trans", $pEntidade, "perfil");
    }
    
    public function atualizar($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_perfil_trans", $pEntidade, "perfil");
    }
    
    public function consultarKey($pEntidade) {
        $opr = $this->operacao;
        return $opr->consultarKey("tb_perfil_trans", $pEntidade, "perfil");
    }
    
}

?>
