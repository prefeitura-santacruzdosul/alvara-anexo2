<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
// 2016-05-12 - acrescentando tag <label>
class TRadioButton extends TField{
	public function show(){
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->type = 'radio';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name.$this->value;
		$this->tag->value = $this->value;
		
		if(! $this->getEditable()){
			$this->tag->readonly = '1';
			$this->tag->class = 'tfield_disabled';
		}
		
		// exibe:
		$this->tag->show();

		//<label for="req_inscricao">Inscrição no Cadastro de Contribuintes Municipais (cadastro inicial)</label>
		//$label = new TElement('label'); // ??
		
	}
}
?>