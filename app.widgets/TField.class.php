<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
abstract class TField
{
 	private $id;
	protected $name;
	protected $size;
	protected $value;
	protected $editable;
	protected $isbig;
	protected $tag;   // objeto da classe TElement que será exibido na tela.
	private $caption; // cria um elemento <label> para o field!

	public function __construct($name)
	{

		//caracteristicas iniciais
		self::setEditable(TRUE);
		self::setBigSize(FALSE);
		self::setName($name);
		self::setSize(200);

		// tive de mover/tirar javascript e css daqui
		// para que o FPDF voltasse a funcionar...
		// vou exportar para 2 arquivos separados
		// js/extra-scripts.js e css/estilos.css
		// e incluir no PrincipalPage

		// cria o elemento <input>
		$this->tag = new TElement('input');
		$this->tag->class = 'tfield';
	}

	public function setProperty($name, $value)
	{
		// define uma propriedade do elemento TAG:
		// obs: usa o valor da variavel $name para acessar a propriedade pelo nome!
		$this->tag->$name = $value;
	}

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function setName($name)
	{
	 	$this->name = $name;
	 	$this->id = $name;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}
	public function setEditable($bool)
	{
		$this->editable = $bool;
	}

	public function setBigSize($bool)
	{
		$this->isbig = $bool;

		//$this->tag->class = 'tbigfield';
	}
	public function getBigSize()
	{
		return $this->isbig;
	}

	public function getName(){ return $this->name; }
	public function getValue(){ return $this->value; }
	public function getEditable(){ return $this->editable; }

	public function setCaption($caption){
	 	$this->caption = $caption;
	 	// pode-se tambem adicionar um "accesskey"...
	}
	public function getCaption(){ return $this->caption; }
	public function getCaptionTag()
	{
		if ($this->caption)
		{
			$tag = new TElement('label');
			$tag->for = $this->id;
			$tag->add($this->caption);
			return $tag;
		}
		else
		{
			return '';
		}
	}

}
?>