<?php
class HomeController extends SysimobController {

/*Basta colocar dentro do array o nome do js sem 
  a extensao .js Ex.: array('jquery');
 */
 public $javascript = array();
/*
  O mesmo serve para o css, basta colocar o nome
  do css sem a extensao
*/

 public $css = array();


  public function setTitulo() {
    return 'HOME';
  }

  public function setBody() {
   $url = $this->url('/login');
   $html =
      '<form action="'.$url.'" method="post">
        <p>Agora a magica acontece: <input type="submit" value="Enviar">            
      </form>';
      return $html;
  }
	
}
