<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TPage extends TElement{
public function __construct(){parent::__construct('html');}
public function show(){
	$this->run();
	parent::show();
}
protected function run(){
	if($_GET){
		$cl = $_GET['class'];
		$mt = $_GET['method'];
		if(class_exists($cl)){
			$o = $cl == get_class($this) ? $this : new $cl;
			if(method_exists($o,$mt)) call_user_func(array($o,$mt),$_GET);
		}else{die("Parametro inválido!");}
	}
}
}
?>