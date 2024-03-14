<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TJavaScript extends TElement{
	// opção de identificar o script de forma unica,
	// a fim de não deixar repetir o mesmo código,
	// assim como eh feito com o TStyle:
	private $idScript;
	static private $loaded;
	public function __construct($id=''){
		parent::__construct('script');
		$this->language = 'javascript';
		$this->type = 'text/javascript';
		$this->idScript = $id;
	}
	public function show(){
		// sem 'id' carrega sempre
	 	if ($this->idScript == ''){
			parent::show();
		}else if(empty(self::$loaded[$this->idScript])){
			parent::show();
			// marca o script como Ja carregado:
			self::$loaded[$this->idScript] = TRUE;
		}
	}
}
?>