<?php
class SysimobController extends Controller{
	
	public $javascript = array();
	public $css = array();
	
	/*
	 * Monta todo o layout
	 */
	public function setPagina() {
		$html = 
			'<html>
				<head>
					<title>'.$this->setTitulo().'</title>'.
					$this->setJs().
					$this->setCss().
				'</head>
        <body>'.$this->setBody().'</body>';
		echo $html;		
	}
	
  /*
  * Monta o titulo 
  */
	public function setTitulo() {
	}


  /*
  * Monta o corpo 
  */
  public function setBody() {
  }

	/*
	 * Processa requisicao feita pela url
	 */
	public function processRequest(){
	
	}
	
	/*
	 * Seta um array de javascripts na pagina
	 */
	public function setJs(){
		$html = '';
		if(!empty($this->javascript)){
			foreach ($this->javascript as $js) {
		 	$html .= ('<script type="text/javascript" src="'.$this->url('/htdocs/js/').$js.'.js"> </script>');	
			}
		}
		return $html;
	} 
	
	/*
	 * Seta um array de css na página
	 */
	public function setCss(){
		$html = '';
		if(!empty($this->css)){
			foreach ($this->css as $css) {
				$html .= ('<link rel="stylesheet" type="text/css" 
						href="'.$this->url('/htdocs/css/').$css.'.css"/>');
			}
		}
		return $html;
	}
	
  public function setRodape() {
  }	
	
}
