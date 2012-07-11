<?php
class LoginController extends SysimobController {
	
	public function setMenu(){
		return '<div style="padding-top:54px"></div>';
	}
	
	public function setContent(){
		$html =        
				'<form name="frmLogin">
					<div class="offset4 span3 row sysmoblogin" id="content">
						<div>
							<label>Usuário</label>
							<input class="span3" type="text" name="Usuário" />
							<label>Senha</label>
							<input class="span3" type="password" name="Senha" />							
						</div>
						<div class="center row">
						<input class="btn btn-primary btn-small" type="button" value="ACESSAR" />						
						<input class="btn btn-small" type="button" value="CANCEL" />
						</div>
					</div>
				</form>';
		return $html;
	}
		
  	public function processRequest(){			
	}
}
