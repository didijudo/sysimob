<?php
class HomeController extends SysimobController {

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
				'
				 <h6 class="news">Últimos Empreendimentos...</h6>
				 <div class="sysmobnews"><p>dasdysaduasyg dasyugdsuaygd</p></div>';
		return $html;
	}
	
	public function setInfoContent() {
		$html = '<div class="sysmobcontent"><h1>Bem vindo, Fulano da Silva</h1></div>';
		return $html;
	}
}
