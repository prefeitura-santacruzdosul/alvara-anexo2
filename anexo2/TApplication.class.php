<?php
/**
 * Ricardo Voigt - Programador
 * Prefeitura Municipal de Santa Cruz do Sul - 2016
 * 
 * https://www.santacruz.rs.gov.br/anexo2/
 * Simples formulário para o usuário preencher os dados no computador
 * e gerar o PDF já preenchido para impressão.
 * Anexo 2 é anexado no GRP * 
 */

class TApplication
{

	static public function run()
	{
		if($_GET)
		{
			$class = $_GET['class'];

			if(class_exists($class))
			{
				$pagina = new $class;
				$pagina->show();
			}
			else
			{
				PrincipalPage::getInstance()
					->show();
			}
		}
		else
		{
			PrincipalPage::getInstance()
				->show();
		}
	}
}
?>