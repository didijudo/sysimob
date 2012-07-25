<?php
class SysimobController extends Controller{
	
	public $javascript = array();
	public $css = array();
		
	/*
	 * Monta todo o layout
	 */
	public function montarPagina() {
		$html = '<html>
				 <head>'.$this->setHead().'</head>
       			 <body>'.$this->setBody().'</body>
				 </html>';
		echo $html;		
	}
	
	/*
	* Monta o titulo 
	*/
	public function setTitle() {
		return '..:AC Engenharia:..';
	}


	public function setHead() {
	  $html = 	
	  			 '<title>'.$this->setTitle().'</title>'
				.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
						 .$this->setJs()
						 .$this->setCss();
	  return $html;
	} 

	public function setMenu() {
		$html = 
		'<div id="menu">
			<ul class="nav nav-tabs">
				<li><a class="active" href="#">Home</a></li>
				<li><a  href="#">Cadastrar</a></li>
				<li><a  href="#">Consultar</a></li>
				<li><a  href="#">Contato</a></li>
			</ul>
		</div>';
		return $html;				
	}
	
	
	public function setTop() {
		$html =
				'<div class="sysmobheader" id="header"> 
                	<div class="row">
                		<img src="htdocs/img/logo.jpg" class="span imglogo">
						<h1 class="center textheader">AC Engenharia</h1>
    	            	<h3 class="right textslogan">Arte em construir...</h3>
					</div>
       			 </div>';
		return $html;
	}
	
	public function setContent(){
		$html = '<div class="center row" >
					<div class="span3 row">'
					.$this->setNews().	
					'</div>			
                	 <div class="span9" style="padding-top:17px">'
                		.$this->setInfoContent().
                	'</div>       		
        		 </div>';
		return $html;
	}

		
	public function setNews() {
		$html =
				'<h6 class="news">Últimos Empreendimentos...</h6>
				 <div class="sysmobnews"><p>dasdysaduasyg dasyugdsuaygd</p></div>';
		return $html;
	}
	
	public function setInfoContent() {
		$html = '';
		return $html;
	}
		
	public function setFooter(){
		$html =
				'<div class="sysmobfooter" id="footer">
					<h6 class="footer">Copyright 2012</h6>
				</div>';
		return $html;
	}
		
	/*
	* Monta o corpo 
	*/
	public function setBody() {
		$html= 
			   '<div class="container" id="container">
					<div class="row">'.$this->setMenu().'</div>  
					<div class="row">'.$this->setTop().'</div>
					<div class="row">'.$this->setContent().'</div>
					<div class="row">'.$this->setFooter().'</div>  
				</div>';
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
		 		$html .= ('<script type="text/javascript" src="'.$this->url('/htdocs/js/').$js.'.js"> </script>');	
			}
		}
		
		$html .= '<script src="htdocs/css/bootstrap/js/bootstrap.js"></script>';
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
      	$html .= '<link href="./htdocs/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
				  <link href="./htdocs/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
				  <link href="./htdocs/css/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
				  <link href="./htdocs/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">';
		  		  
	  	return $html;
	}
	
}
