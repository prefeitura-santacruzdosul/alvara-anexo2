<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 * 
 */
class TForm
{
	private $name;
	private $child; // organiza os fields.
	protected $fields;
	private $editable;
	private $_action;

	public function __construct($name = 'my_form')
	{
		$this->setName($name);
		$this->editable = TRUE;
	}

	protected function setAction($action)
	{
		$this->_action = $action;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}

	public function setFields($fields)
	{
		foreach($fields as $field)
		{
			if($field instanceof TField)
			{
				$name = $field->getName();

				$this->fields[$name] = $field;

				if($field instanceof TButton)
				{
					$field->setFormName($this->name);
				}
			}
		}
	}
	public function getField($name)
	{
		return $this->fields[$name];
	}

	public function add($child)
	{
		$this->child = $child;
	}

	public function show()
	{
		$tag = new TElement('form');
		$tag->name = $this->name;
		$tag->method = 'post';
		$tag->enctype = 'multipart/form-data';

		// 2014-11-04 -> teste com bootstrap...
		$tag->class = 'navbar-form navbar-left';
		//$tag->role = 'search';

		if($this->_action) $tag->action = $this->_action;
		$tag->add($this->child);
		$tag->show();		
	}

	public function setEditable($bool)
	{
		$this->editable = $bool;
		if($this->fields)
		{
			foreach($this->fields as $obj)
			{
				$obj->setEditable($bool);
			}
		}
	}
	public function getEditable()
	{
		return $this->editable;
	}

	public function setBigSize($bool)
	{
		if($this->fields)
		{
			foreach($this->fields as $obj)
			{
				$obj->setBigSize($bool);
			}
		}
	}

	public function setData($obj)
	{
	 	// copia os valores do objeto para o form:
		foreach($this->fields as $name => $field)
		{
			if($name) // labels nao tem nome
			{
				// note que usa o valor da variavel $name
				// para acessar a propriedade no objeto:
				//if(isset($obj->$name))
				//{
					$field->setValue($obj->$name);
				//}
				// else
				// if(! isset($obj->$name))
				// {
				// 	error_log("caiu aqui...name={$name}, valor={$obj->$name}");
				// }
			}
		}
	}
	
	public function getData($class = 'StdClass')
	{
	 	// retorna um objeto cujos atributos contém os
		//	fields do form que foram passados pelo vetor $_POST:
		$obj = new $class;
		foreach($_POST as $key => $value)
		{
			if(! isset($this->fields[$key]))
			{
				error_log("Key '{$key}' not found in fields...");
				foreach($this->fields as $_field)
				{
					error_log(" - field {$_field}");
				}
			}
			if(get_class($this->fields[$key]) == 'TCombo')
			{
				if($value !== '0')
				{
					$obj->$key = $value;
				}
				else
				{
					$obj->$key = null;
				}
			}
			else
			{
				$obj->$key = $value;
			}
		}
		foreach($_FILES as $key => $content)
		{
			$obj->$key = $content['tmp_name'];
		}
		return $obj;
	}
}
?>