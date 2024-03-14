<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TFieldSet extends TElement{

	private $tb1;

	private $comEstilo;
	private $style_align;
	private $style_width;
	private $style_height;

	public function __construct($title){
		parent::__construct('fieldset');

		$this->comEstilo = FALSE;
		$this->style_align = 'left';
		$this->style_width = '400';
		$this->style_height = '100';

		$t = new TElement('legend');
		$t->add($title);
		$this->add($t);
	}

	public function setAlign($align){
		$this->style_align = $align;
		$this->comEstilo = TRUE;
	}
	public function setWidth($width){
		$this->style_width = $width;
		$this->comEstilo = TRUE;
	}
	public function setHeight($height){
		$this->style_height = $height;
		$this->comEstilo = TRUE;
	}

	public function show(){

		if ($this->comEstilo){
			$estilo = "text-align:{$this->style_align};";
			$estilo.= "width:{$this->style_width};";
			$estilo.= "height:{$this->style_height};";

			$this->style = $estilo;
		}

		parent::show();
	}

	private function loadTb1(){
		if (! $this->tb1){
			$this->tb1 = new TTable();
			$this->tb1->width = '100%';
	//		$this->tb1->border=1;
	//		$this->tb1->align = 'center';

			$this->add($this->tb1);
		}
	}

	public function setStyle($style){
		$this->loadTb1();
		//$this->style = $style;
		$this->tb1->class = $style;
	}

	public function addField(TField $field, $caption){
		$this->loadTb1();
		$r = $this->tb1->addRow();
		$c = $r->addCell($caption);
		$c->align = 'right';
		return $r->addCell($field);
	}
}
?>