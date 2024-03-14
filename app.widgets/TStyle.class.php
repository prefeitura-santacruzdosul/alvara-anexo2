<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TStyle {
	private $contextual;
	private $classeBase;
	private $name;
	private $media;
	private $properties;
	static private $loaded;
	
	public function __construct($name, $classeBase = ''){
		$this->contextual = FALSE;
		$this->name = $name;
		$this->media = 'screen';
		$this->classeBase = $classeBase;
	}

	public function setMedia($med){
		$this->media = $med;
	}
	
	public function setContextual($bool){
		$this->contextual = $bool;
	}
	
	public function __set($name, $value){
	 	// substitui o "_" por "-" no nome da propriedade
		$name = str_replace('_', '-', $name);
		$this->properties[$name] = $value;
	}
	public function show(){
		if(! isset(self::$loaded[$this->name])){

			// se não especificar, vale tambem pra impressão.
		 	if ($this->media == ''){
				echo "<style type='text/css' >\n";
			} else {
				echo "<style type='text/css' media='{$this->media}'>\n";
			}

			if ($this->contextual){
				//if ($this->classeBase == ''){
					echo "{$this->name}\n";
				//} else {
				//	echo ".{$this->classeBase} .{$this->name}\n";
				//}
			} else {
				if ($this->classeBase == ''){
					echo ".{$this->name}\n";
				} else {
					echo ".{$this->classeBase} .{$this->name}\n";
				}
			}

			echo "{\n";
			if($this->properties){
				foreach($this->properties as $name => $value){
					echo "\t {$name}: {$value};\n";
				}
			}
			echo "}\n";
			echo "</style>\n";
			// marca o estilo como Ja carregado:
			self::$loaded[$this->name] = TRUE;
		}
	}
	
}

?>