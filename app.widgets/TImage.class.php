<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TImage extends TElement {
	public function __construct($source){
		parent::__construct('img');
		$this->src = $source;
		$this->border = 0;
	}
}
?>