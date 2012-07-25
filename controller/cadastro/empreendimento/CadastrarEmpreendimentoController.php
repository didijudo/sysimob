<?php
/**
 * Transação para fazer o cadastro de um novo empreendimento
 *
 * @author Anderson Faro
 */
include_once 'gerenciador/imobiliario/GerenciadorEmpreendimento.php';
include_once 'entidade/imobiliario/EntidadeEmpreendimento.php';
class CadastrarEmpreendimentoController extends SysimobController{
    
    public $javascript = array ('jquery', 'jquery.validate', 'validar-campos');
    public $css = array ('layout');
    
    private $html;
    
    public function processRequest() {
        if (isset($_POST['nmEmpreendimento'])) {
            //var_dump($_POST['nmEmpreendimento']);
            $this->submeter();
        }
    }
    
    public function setContent() {
        return '<form action="#" method="post">'
                .'<div id="CadastrarEmpreendimento">'
                    .'<table>'
                        .'<tr>'
                            .'<td>Nome: </td>
                            <td><input type="text" name="nmEmpreendimento"/></td>'
                        .'</tr><tr>'
                            .'<td>Descrição: </td>
                            <td><textarea rows="3" cols="40" name="dsEmpreendimento"></textarea></td>'
                        .'</tr><tr>'
                        .'<td>Endereco: </td>
                            <td><textarea rows="3" cols="40" name="dsEndereco"></textarea></td>'
                        .'</tr><tr>'
                        .'<td>Região: </td>
                            <td><select name="dsRegiao">
                                <option value="N">Norte</option>
                                <option value="S">Sul</option>
                                <option value="L">Leste</option>
                                <option value="O">Oeste</option>
                            </select></td>'
                        .'</tr><tr>'
                            .'<td></td>'
                            .'<td align="right"><input type="submit" name="btnCadastro" value="Cadastrar"/></td>'
                        .'</tr>'
                    .'</table>'
                .'</div>'
            .'</form>';
    }
    
    private function submeter() {
        return $ent = new EntidadeEmpreendimento();
        $ent->setNmEmpreendimento(isset($_POST["nmEmpreendimento"]) ? $_POST["nmEmpreendimento"] : "");
        $ent->setDsEmpreendimento(isset($_POST["dsEmpreendimento"]) ? $_POST["dsEmpreendimento"] : "");
        $ent->setDsEndereco(isset($_POST["dsEndereco"]) ? $_POST["dsEndereco"] : "");
        $ent->setDsRegiao(isset($_POST["dsRegiao"]) ? $_POST["dsRegiao"] : "");
        
        $ger = new GerenciadorEmpreendimento();
        $ger->inserir($ent);
    }
    
    public function setTitle() {
        return '..:: Cadastrar Empreendimento ::..';
    }
}

?>
