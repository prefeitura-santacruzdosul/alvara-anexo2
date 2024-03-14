<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 * 2016-05-12 - corrigindo tag <label>
 */

class TRadioGroup extends TField
{

	private $layout = 'vertical';
	private $items;

	public function setLayout($dir)
	{
		$this->layout = $dir;
	}

	public function addItems($items)
	{
		$this->items = $items;
	}

	public function show()
	{
	 	if($this->items)
		{
			foreach($this->items as $index => $label)
			{
				$bot = new TRadioButton($this->name);
				$bot->setValue($index);
				// se possui qualquer valor
				if($index == $this->value)
				{
					$bot->setProperty('checked', '1');
				}
				$bot->show();

				$obj = new TLabel($label, $this->name.$index);
				//$obj->for = $this->name.$index; // 2016-05-12!!!! era soh isso q faltava??
				$obj->show();

				if($this->layout == 'vertical')
				{
					//quebra de linha
					$br = new TElement('br');
					$br->show();
				}
				echo "\n";
			}
		}
	}
}
?>