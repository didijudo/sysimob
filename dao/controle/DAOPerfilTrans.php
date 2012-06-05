<?php
/**
 * Operacao Base da tabela tb_perfil_trans
 *
 * @author Anderson Faro
 */
include '../ad/OperacaoBase.php';
class DAOPerfilTrans {
   
    //private $operacao = null; 
    
    function __construct() {
        //$this->operacao = new OperacaoBase();
    }
    
    public function inserir($pEntidade) {
        $opr = new OperacaoBase();
        $opr->inserir("tb_perfil_trans", $pEntidade, "perfil");
    }
    
    public function atualizar($pEntidade) {
        $opr = new OperacaoBase();
        $opr->inserir("tb_perfil_trans", $pEntidade, "perfil");
    }
    
    public function deleteKey($pEntidade) {
        $opr = new OperacaoBase();
        $opr->deleteKey("tb_perfil_trans", $pEntidade, "perfil");
    }
    
    public function consultarKey($pEntidade) {
        $opr = new OperacaoBase();
        return $opr->consultarKey("tb_perfil_trans", $pEntidade, "perfil");
    }
    
}

?>
