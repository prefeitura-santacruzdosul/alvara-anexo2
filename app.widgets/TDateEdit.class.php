<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 */
class TDateEdit extends TField
{

	public function __construct($name)
	{
		parent::__construct($name);
		parent::setSize('150px');
	}

	public function show()
	{
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->type = 'text';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->value = $this->value;
		//$this->tag->style = 'width:100'; // tamanho em pixels
		$this->tag->style = "width:{$this->size}"; // tamanho em pixels

		// 2014-11-04 -> teste com bootstrap
		$this->tag->class = 'form-control';


		if ($this->getBigSize()){
			$this->tag->class = 'tbigfield';
		}

		if ($this->getEditable())
		{

			$this->tag->onkeypress = 'return mascaraData(this, event)';
			//$this->tag->onkeyup = 'return mascaraData(this, event)';
			//$this->tag->onkeypress = 'return mascaraData(this, event)';

			$this->tag->maxlength = 10;
		}
		else
		{
			$this->tag->readonly = '1';

			if ($this->getBigSize())
			{
				$this->tag->class = 'tbigfield_disabled';
			}
			else
			{
				$this->tag->class = 'tfield_disabled form-control';
			}
		}
		
		// exibe:
		$this->tag->show();
	}
}
?>