<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class Paginacao {
	static private $v;
	static public function getPagina($getParam='page'){
		if(!self::$v[$getParam]){
			$res = $_GET[$getParam];
			$var = filter_var($res,FILTER_VALIDATE_INT);
			if(!$var)$res = 1;
			self::$v[$getParam] = $res;
		}
		return self::$v[$getParam];
	}
}
?>