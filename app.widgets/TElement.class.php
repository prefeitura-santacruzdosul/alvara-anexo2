<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 */
class TElement
{
	private $name;
	private $properties;
	protected $children;
	public function __construct($name){$this->name = $name;}
	public function __set($name, $value){$this->properties[$name] = $value;}
	public function add($child){$this->children[] = $child;}
	private function open()
	{
		$props = '';
		if($this->properties)
		{
			foreach($this->properties as $n=>$v)
			{
				$props.= " {$n}=\"{$v}\"";
			}
		}
		echo "<{$this->name}{$props}>";
	}
	public function show()
	{
		$this->open();
		if($this->children)
		{
			foreach($this->children as $child)
			{
				if(is_object($child))
				{
					$child->show();
				}
				elseif((is_string($child))or(is_numeric($child)))
				{
					echo $child;
				}
			}
		}
		$this->close();
	}
	private function close()
	{
		echo "</{$this->name}>\n";
	}
}
?>