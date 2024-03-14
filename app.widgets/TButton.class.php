<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TButton extends TField{
	private $action;
	private $label;
	private $formName;
	public function setAction($action, $label){
		$this->action = $action;
		$this->label = $label;
	}
	public function setFormName($name){
		$this->formName = $name;
	}
	public function show(){
		$this->tag->type = 'button';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->value = $this->label;

		// 2014-11-04 -> teste com bootstrap
		$this->tag->class = 'btn';

		if($this->getBigSize()){
			$this->tag->class = 'tbigfield';
		}
		if(! self::getEditable()){
			$this->tag->disabled = '1';
			if($this->getBigSize()){
				$this->tag->class = 'tbigfield_disabled';
			}else{
				$this->tag->class = 'tfield_disabled';
			}
		}
		// aqui ta a ação do botão:
		if($this->action instanceof TAction){
			$url = $this->action->serialize();
		}else{
			$url = $this->action;
		}
		if($url != ''){
			$this->tag->onclick = "document.{$this->formName}.action='{$url}'; document.{$this->formName}.submit()";
		}
		$this->tag->show();
	}
}
?>