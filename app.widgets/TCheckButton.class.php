<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TCheckButton extends TField{

	private $valChecked;

	public function setValueChecked($val){
		$this->valChecked = $val;
	}

	public function show(){
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->type = 'checkbox';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->value = $this->value;

		if($this->value == $this->valChecked){
			$this->tag->checked = '1';
		}

		if(! $this->getEditable()){
			$this->tag->readonly = '1';
			$this->tag->class = 'tfield_disabled';
		}

		// exibe:
		$this->tag->show();
	}
}
?>