<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TCheckGroup extends TField{

	private $layout = 'vertical';
	private $items;
	
	public function setLayout($dir){
		$this->layout = $dir;
	}
	
	public function addItems($items){
		$this->items = $items;
	}

	public function show(){
	 	if($this->items){
			foreach($this->items as $index => $label){
				$bot = new TCheckButton("{$this->name}[]");
				$bot->setValue($index);
				if(@in_array($index, $this->value)){
					$bot->setProperty('checked', '1');
				}
				$bot->show();

				$obj = new TLabel($label);
				$obj->show();
				
				if($this->layout == 'vertical'){
					//quebra de linha
					$br = new TElement('br');
					$br->show();
					echo "\n";
				}
			}
		}
	}
}
?>