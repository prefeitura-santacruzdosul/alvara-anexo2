<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class THidden extends TField{
	public function show(){
	 	$this->tag->name = $this->name;
	 	$this->tag->id = $this->name;
	 	$this->tag->value = $this->value;
	 	$this->tag->type = 'hidden';
		// exibe:
		$this->tag->show();
	}
}
?>