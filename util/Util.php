<?php
class Util {

	static function convert_ArrayPhpToArrayJS($arrayPhp){
		$string = 'Parametro informado não é array!!!';
	//	print_r($arrayPhp);
		if (is_array($arrayPhp)) {
			$string = '{';
			foreach ($arrayPhp as $key => $value) {
				$string .= $key.':\''.$value.'\',';
			}
			$string = substr($string, 0, strlen($string)-1);
			$string .= '}';
		//	echo(' - '.$string.'<br>');
		}
		return $string;
	}
	
}