<?php
/**
 * 
 */
class PrincipalPage extends TPage
{

	private static $instance;

	public static function getInstance()
	{
		if (empty(self::$instance))
		{
			self::$instance = new PrincipalPage();
		}
		return self::$instance;
	}

	public function __construct()
	{
		parent::__construct();

		// estrutura da pagina HTML
		$corpo = new TElement('body');
		parent::add($corpo);

		$head = new TElement('head');
		$head->add('<META http-equiv="Content-Type" content="text/html; charset=UTF-8">');
		$head->add('<title>Formulário Anexo II</title>');
		$head->add('<link href="css/bootstrap.min.css" rel="stylesheet">');
		$head->add('<link href="css/estilos.css" rel="stylesheet">');
		$corpo->add($head);


		$centro = new TElement('div');
		$centro->class="container marketing";
		$centro->add('<img src="logo_header.png" title="Página Inicial - Prefeitura Municipal de Santa Cruz do Sul" class="img-responsive">');
		$corpo->add($centro);

		$corpo->add('<hr class="featurette-divider">');

		$rodape = new TElement('div');
		$rodape->class="container marketing";
		$corpo->add($rodape);

		$footer = new TElement('footer');
		$footer->add('<p class="pull-right"><a href="#">Voltar ao Topo</a></p>');
		$footer->add('<p>DTIC - Departamento de Tecnologia da Informação e Comunicação</p>');
		$rodape->add($footer);


		$corpo->add('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>');
		$corpo->add('<script src="js/bootstrap.min.js"></script>');
		$corpo->add('<script src="js/extra-functions.js"></script>');


		$centro->add(new Anexo2Form($this));
	}

}
?>