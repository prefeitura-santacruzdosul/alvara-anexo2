<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TLabel extends TField{
	/*private $fontSize;
	private $fontFace;
	private $fontColor;*/
	
	public function __construct($value,$_for){
		$this->setValue($value);
		$this->tag = new TElement('label');
		$this->tag->for = $_for;
		/*$this->fontSize = '14';
		$this->fontFace = 'Arial';
		$this->fontColor = 'Black';*/
	}

	public function show(){
		/*$this->tag->style = "font-family:{$this->fontFace}; ".
			"color:{$this->fontColor}; ".
			"font-size:{$this->fontSize}";*/

		$this->tag->add($this->value);
		$this->tag->show();
	}
}
?>
