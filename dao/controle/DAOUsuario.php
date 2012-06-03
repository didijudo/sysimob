<?php
/**
 * Operacao Base da tabela tb_usuario
 *
 * @author Anderson Faro
 */
class DAOUsuario {
    
    private $operacao = null; 
    
    function __construct() {
        $this->operacao = new OperacaoBase();
    }
    
    public function inserir($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_usuario", $pEntidade, "perfil");
    }
    
    public function atualizar($pEntidade) {
        $opr = $this->operacao;
        $opr->inserir("tb_usuario", $pEntidade, "perfil");
    }
    
    public function consultarKey($pEntidade) {
        $opr = $this->operacao;
        return $opr->consultarKey("tb_usuario", $pEntidade, "perfil");
    }
    
}

?>
