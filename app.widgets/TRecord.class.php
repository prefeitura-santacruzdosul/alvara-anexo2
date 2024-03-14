<?php
/**
 * Prefeitura Municipal de Santa Cruz do Sul
 * Ricardo Voigt - 2007/2024
 * ricardo@santacruz.rs.gov.br
 */

abstract class TRecord
{
	private $Fdata; // array com dados do objeto!

	public function __construct($id = NULL)
	{
		$vok = filter_var($id,FILTER_VALIDATE_INT);
		//if($id){
		if($vok>0)
		{
			$row = $this->load($id);
			if($row)
			{
				$this->fromArray($row);
			}
		}
	}

	public function __set($prop,$value)
	{
		if(method_exists($this,'_set'.$prop)){
			// executa o metodo set da propriedade
			call_user_func(array($this,'_set'.$prop),$value);
		}else{
			$this->Fdata[$prop] = $value;
		}
	}

	public function __get($prop)
	{
		if(method_exists($this,'_get'.$prop)){
			return call_user_func(array($this,'_get'.$prop));
		}elseif( isset($this->Fdata[$prop]) ){
			return $this->Fdata[$prop];
		}
	}

	public function getEntity()
	{
		$c = strtolower(get_class($this));
		// retorna o nome da classe sem a palavra "Record",
		//	para usar como nome da tabela no banco de dados:
		return substr($c,0,-6);
	}

	public function fromArray($data)
	{
		$this->Fdata = $data;
	}
	public function toArray()
	{
		return $this->Fdata;
	}
	
	public function show()
	{
		// teste... apenas para exibir o conteudo (atributos e valores) do objeto!
		echo "classe do objeto: ".$this->getEntity()."<br> propriedades:<br>";
		if($this->Fdata){
			foreach($this->Fdata as $k=>$v)	echo "{$k} = {$v}<br>";
		}else{
			echo "objeto VAZIO!<BR>";
		}
		echo "fim do objeto!<br>";
	}

	// le objeto do banco de dados e carrega as propriedades:
	protected function load($id)
	{
		if($con = TTransaction::get())
		{
			$sql = new TSqlSelect;
			$sql->setEntity($this->getEntity());
			$sql->addColumn('*');

			$w = new TCriteria;
			$w->add(new TFilter('id','=',$id));
			$sql->setCriteria($w);

			$qry = $con->query($sql->getInstruction());
			if($qry)
			{
			 	// pega a primeira posição do vetor $qry
				$row = $qry[0];
				//$this->fromArray($row);
				return $row;
			}
		}
	}

	// salva objeto no banco de dados:
	protected function store()
	{
		if($con = TTransaction::get())
		{
		 	// verifica se eh inclusao ou uma alteracao:
	 		if(empty($this->Fdata['id']) or ( ! $this->load($this->id)))
			{
				// incrementa o ID (ou usa uma sequence/generator)
				$this->id = $con->getNextId( $this->getEntity() );

				// monta o sql de inclusão
				$sql = new TSqlInsert;
				$sql->setEntity($this->getEntity());
				foreach($this->Fdata as $key=>$value)
				{
					$sql->setRowData($key,$this->$key);
				}
			}
			else
			{
				// monta o sql de edição
				$sql = new TSqlUpdate;
				$sql->setEntity($this->getEntity());
				foreach($this->Fdata as $key=>$value)
				{
					if($key != 'id')
					{
				 		// o ID não vai no UPDATE, apenas no where
						$sql->setRowData($key,$this->$key);
					}
				}
				// cria o criterio para o update:
				$w = new TCriteria;
				$w->add(new TFilter('id','=',$this->id));
				$sql->setCriteria($w);
			}

			$con->exec($sql->getInstruction());
		}
	}

	public function delete()
	{

		$sql = new TSqlDelete();
		$sql->setEntity($this->getEntity());

		$where = new TCriteria();
		$where->add(new TFilter('id','=',$this->id));
		$sql->setCriteria($where);

		if($con = TTransaction::get())
		{
			return $con->exec($sql->getInstruction());
		}
		else
		{
			die('Não há transação ativa ao excluir registro!');
		}
	}
}
?>