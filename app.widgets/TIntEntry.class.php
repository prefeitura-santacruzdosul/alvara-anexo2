<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 */
class TIntEntry extends TField
{

	private $maxlength;
	public function setMaxLength($maxlength)
	{
		$this->maxlength = $maxlength;
	}

	public function __construct($name)
	{
		parent::__construct($name);
		self::setSize(100);
	}

	public function show()
	{
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->type = 'text';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->value = $this->value;
		//$this->tag->style = 'width:100'; // tamanho em pixels
		$this->tag->style = "width:{$this->size};text-align: right;"; // tamanho em pixels

		// 2014-11-04 -> teste com bootstrap
		// 2015-02-26 -> tinha faltado o TIntEdit
		$this->tag->class = 'form-control';

		if ($this->getBigSize()){
			$this->tag->class = 'tbigfield';
		}

		if ($this->getEditable())
		{

			$this->tag->onkeypress = 'return somenteInt(this, event)';

			if ($this->maxlength){
				$this->tag->maxlength = $this->maxlength;
			} else {
				$this->tag->maxlength = 10;
			}
		} else {
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