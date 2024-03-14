<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 */

class TText extends TField
{
 
 	private $width;
 	private $height;
 	
 	public function __construct($name)
	{
		parent::__construct($name);
		
		$this->tag = new TElement('textarea');
		$this->tag->class = 'tfield';
		
		// altura padrao da caixa de texto:
		$this->height = 100;
	}
	
	public function setSize($width, $height=0)
	{
		$this->size = $width;
		if($height > 0)
		{
			$this->height = $height;
		}
	}
 
	public function show()
	{
	 	$this->tag->name = $this->name;
	 	$this->tag->id = $this->name;
	 	$this->tag->style = "width:{$this->size};height:{$this->height}";

		// 2014-11-04 -> teste com bootstrap
		$this->tag->class = 'form-control';

	 	$this->tag->add(htmlspecialchars( (string) $this->value));

		if(! $this->getEditable())
		{
			$this->tag->readonly = '1';
			$this->tag->class = 'tfield_disabled';
		}

		// exibe:
		$this->tag->show();
	}
}
?>