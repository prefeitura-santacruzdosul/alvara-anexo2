<?php
// objetos TAction funcionam como eventos: são passados como parametro
// uma referencia ao objeto receptor e o nome do método a ser acionado.
// OBS: esse objeto cuja referencia eh passada pode herdar de TPage
class TAction
{
	private $action;
	private $params;
	public function __construct($action)
	{
	 	// $action pode ser um array contendo a referencia para o objeto
	 	// receptor da ação, e o nome do metodo a ser executado:
		$this->action = $action;
	}
	public function setParameter($param, $value)
	{
		$this->params[$param] = $value;
	}
	public function serialize()
	{
		// Transforma a ação em uma string estilo URL:
		if(is_array($this->action))
		{
			$url['class'] = get_class($this->action[0]);
			$url['method'] = $this->action[1];
		}
		elseif(is_string($this->action))
		{
			$url['method'] = $this->action;
		}
		if($this->params)
		{
			$url = array_merge($url, $this->params);
		}
		//URL final:
		return '?' . http_build_query($url);
	}
}
?>