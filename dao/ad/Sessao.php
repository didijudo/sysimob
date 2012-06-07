<?php
/**
 * Fazer o controle da sessão do usuário logado
 *
 * @author Anderson Faro
 */

//session_start();
//session_register('usuario');
include_once 'gerenciador/controle/GerenciadorSessao.php';
class Sessao {
    
    function __construct() {}
    
    public function criarSessao($usuario, $senha) {
        $ger = new GerenciadorSessao();
        $sessao = $ger->criarSessao($usuario, $senha);
        
        return $sessao;
    }
}

?>
