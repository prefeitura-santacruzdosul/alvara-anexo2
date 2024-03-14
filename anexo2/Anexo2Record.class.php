<?php
/**
 * 
 */

class Anexo2Record extends TRecord
{

	// simula um enumerado... 
	const MODALIDADE_EMPRESA	= 1;
	const MODALIDADE_MEI		= 2;
	const MODALIDADE_EPP		= 3;
	const MODALIDADE_ME			= 4;
	const MODALIDADE_SA			= 5;
	const MODALIDADE_LTDA		= 6;
	const MODALIDADE_AUTONOMO	= 7;

	static public function getModalidadeItems()
	{
		$v = [
			self::MODALIDADE_EMPRESA	=> 'Empresa',
			self::MODALIDADE_MEI		=> 'MEI',
			self::MODALIDADE_EPP		=> 'EPP',
			self::MODALIDADE_ME			=> 'ME',
			self::MODALIDADE_SA			=> 'S.A.',
			self::MODALIDADE_LTDA		=> 'LTDA/Outro',
			self::MODALIDADE_AUTONOMO	=> 'Autônomo',
		];
		return $v;
	}
	public function _getmodalidade_desc()
	{
		$v = self::getModalidadeItems();
		return $v[$this->modalidade];
	}


	public function trataDados()
	{
		//

		//$this->nome = Funcoes::strtoupper_acento($this->nome);

		$this->inscmun = Funcoes::somenteNumeros($this->inscmun);

		//$this->fantasia = Funcoes::strtoupper_acento($this->fantasia);


		// cpf ou cnpj...
		$this->cpfcnpj = Funcoes::somenteNumeros($this->cpfcnpj);
		switch(strlen($this->cpfcnpj))
		{
			case 11: $this->cpfcnpj = Funcoes::maskCPF($this->cpfcnpj);
			break;
			case 14: $this->cpfcnpj = Funcoes::maskCNPJ($this->cpfcnpj);
			break;
		}
	}

	// por fim, nem esta validando nada...passa boi passa boiada...
	public function validaDados()
	{

		if($this->nome == '')
		{
			throw new Exception('Informe o Nome / Razão Social da Empresa!');
		}

		$this->cnpj = Funcoes::somenteNumeros($this->cnpj);
		if(strlen($this->cnpj) != 14)
		{
			throw new Exception('Informe o CNPJ da Empresa!');
		}
		elseif(! Funcoes::validaCNPJ($this->cnpj))
		{
			$this->cnpj = Funcoes::maskCNPJ($this->cnpj);
			throw new Exception('O CNPJ informado é Inválido!');
		}
		$this->cnpj = Funcoes::maskCNPJ($this->cnpj);
	}

}
?>