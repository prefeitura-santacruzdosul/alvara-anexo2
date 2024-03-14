<?php

// 2022-03-25 - extraido o código JAVASCRIPT para o arquivo externo 'funcoes_extras.js'
class TFloatEdit extends TField
{

	private $signed; // permite ou n�o aceitar valores negativos (com sinal)
	private $maxlength;
	private $decimals;

	public function __construct($name)
	{
		parent::__construct($name);
		self::setSize(100);
		$this->signed = TRUE;
		$this->maxlength = 9;
		$this->decimals = 2;
	}

	public function setSigned($bool)
	{
		$this->signed = $bool;
	}
	public function setMaxlength($maxlength)
	{
		$this->maxlength = $maxlength;
	}
	public function setDecimals($decimals)
	{
		$this->decimals = $decimals;
	}

	public function show()
	{
		// atribui as caracteristicas do input do tipo 'text':
		$this->tag->type = 'text';
		$this->tag->name = $this->name;
		$this->tag->id = $this->name;
		$this->tag->value = $this->value;
		$this->tag->style = "width:{$this->size};text-align: right;display:inline;"; // tamanho em pixels

		$this->tag->class = 'form-control';

		if ($this->getBigSize()){
			$this->tag->class = 'tbigfield';
		}

		if ($this->getEditable())
		{

			// ver extra.js
			$this->tag->onkeyup = "TFloatEdit_onKeyUp1(this,{$this->decimals},',');";
			$this->tag->maxlength = $this->maxlength;
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