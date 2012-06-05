<?php
/**
 * Operacao Base da tabela tb_perfil
 *
 * @author Anderson Faro
 */
include_once '../ad/OperacaoBase.php';
class DAOPerfil {
    
    public function __construct() {
        echo 'Testando DAOPerfil';
    }
    
    public function inserir($pEntidade) {
        $opr = new OperacaoBase();
        $opr->inserir("tb_perfil", $pEntidade, "perfil");
    }
    
    public function atualizar($pEntidade) {
        $opr = new OperacaoBase();
        $opr->inserir("tb_perfil", $pEntidade, "perfil");
    }
    
    public function deleteKey($pEntidade) {
        $opr = new OperacaoBase();
        $opr->deleteKey("tb_perfil", $pEntidade, "perfil");
    }
    
    public function consultarKey($pEntidade) {
        $opr = new OperacaoBase();
        return $opr->consultarKey("tb_perfil", $pEntidade, "perfil");
    }
    
}

?>
