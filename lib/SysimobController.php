<?php
class SysimobController extends Controller{
	
	protected $javascript = array();
	protected $css = array('layout');
	
	/*
	 * Monta todo o layout
	 */
	public function setPagina() {
		$html = 
			'<html>
				<head>
					<title>'.self::setTitulo().'</title>'.
					self::setJs().
					self::setCss().
				'</head>
        <body>'.self::setBody().'</body>';
		echo $html;		
	}
	
	public function setTitulo() {
		return 'Vamos';
	}


  public function setBody() {
    $html = 'HTML';
    return $html;
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
		 	$html .= ('<script type="text/javascript" src="'.$this->url('/htdocs/js').'/'.$js.'.js"> </script>');	
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
						href="'.$this->url('/htdocs/css').'/'.$css.'.css"/>');
			}
		}
		return $html;
	}
	
	
	
}
