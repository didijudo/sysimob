<?php
class HomeController extends SysimobController {

	public function setInfoContent() {
		$html = '<div class="sysmobcontent"><h1>Bem vindo, Fulano da Silva</h1></div>';
		return $html;
	}
}
