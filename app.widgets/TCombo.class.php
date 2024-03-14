<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TCombo extends TField{
 
 	private $items;

	public function __construct($name){
		parent::__construct($name);
		$this->tag = new TElement('select');
		$this->tag->class = 'tfield';
	}

	public function addItems($items){
		$this->items = $items;
	}

	public function show(){
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->style = "width:{$this->size}"; // tamanho em pixels

		// 2014-11-04 -> teste com bootstrap
		$this->tag->class = 'form-control';

		$this->tag->onkeypress = 'return submitEnter(this, event)';

		// cria as tags <option> para cada item
		$opt = new TElement('option');
		$opt->value = '0';
		$opt->add(''); // valor padrão
		$this->tag->add($opt);

		if($this->items){
			foreach($this->items as $chave => $item){
				$opt = new TElement('option');
				$opt->value = $chave;
				$opt->add($item);
				
				if($chave == $this->value){
					$opt->selected = 1;
				}
				$this->tag->add($opt);
			}
		}

		if ($this->getBigSize()){
			$this->tag->class = 'tbigfield';
		}

		if(! $this->getEditable()){
			$this->tag->readonly = '1';

			if ($this->getBigSize()){
				$this->tag->class = 'tbigfield_disabled';
			} else {
				$this->tag->class = 'tfield_disabled form-control';
			}
		}
		
		// exibe:
		$this->tag->show();
	}
}
?>