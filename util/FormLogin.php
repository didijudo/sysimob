<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormLogin
 *
 * @author DiegoNote
 */
include_once 'Componente.php';
class FormLogin implements Componente{

    public function getComponente($nome) {
       echo("</form>");
    }

    public function getFormLogin($nome,$resposta,$metodo){
        echo (" <form action='.$resposta.' method='.$metodo.' name='.$nome.' id='.$nome.'>
                Login: <input type='text' name='login' size='15' /> <br/>
                Senha: <input type='password' name='senha' size='15' /> <br/>
                        <input type='submit' name='enviar' value='Enviar' /> <br/>");
         $this->getComponente($nome);
    }

}
?>
