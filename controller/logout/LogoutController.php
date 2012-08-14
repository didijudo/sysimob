<?php
class LogoutController extends SysimobController {
	
	public function processRequest(){			
		session_unset();		
		header('Location:'.$this->url('/login'));
	}
}
