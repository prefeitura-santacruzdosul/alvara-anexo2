<?php
/**
 * 
 */

class Anexo2Form extends TForm
{

	private $aviso;

	public function setAviso(String $msg)
	{
		// Alerta do Bootstrap
		$div = "<div class=\"alert alert-danger\" role=\"alert\">
				<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
				<span class=\"sr-only\">Erro:</span> {$msg}</div>";
		$this->aviso->add($div);
	}

	public function __construct()
	{
		parent::__construct('Anexo2Form');

		// 
		$acaoPdf = new TAction( [new ExpPdf(), 'gera'] );

		$btOk = new TButton('btOk');
		$btOk->setAction($acaoPdf, '>> Gerar PDF para Impressão <<');



		$modalidade			= new TRadioGroup('modalidade');

		// 1
		$nome				= new TEntry('nome');
		$inscmun			= new TIntEntry('inscmun');

		// 3
		$fantasia			= new TEntry('fantasia');
		$cpfcnpj			= new TIntEntry('cpfcnpj');

		// 5
		$endereco			= new TEntry('endereco');
		$bairro				= new TEntry('bairro');
		$cep				= new TIntEntry('cep');
		//8
		$corresp_endereco	= new TEntry('corresp_endereco');
		$corresp_bairro		= new TEntry('corresp_bairro');
		$corresp_cep		= new TIntEntry('corresp_cep');
		// 11
		$fone				= new TEntry('fone');
		$email				= new TEntry('email');
		$identidade			= new TEntry('identidade');
		// 14
		$ativ_principal		= new TEntry('ativ_principal');
		$ativ_acessoria		= new TEntry('ativ_acessoria');
		//16
		$registro_junta		= new TEntry('registro_junta');
		$data_junta			= new TDateEdit('data_junta');
		$conselho_registro	= new TEntry('conselho_registro');
		$data_inicio		= new TDateEdit('data_inicio');
		//19
		$capital			= new TFloatEdit('capital');
		$inscrest			= new TIntEntry('inscrest');
		$protalvarasanitario= new TIntEntry('protalvarasanitario');
		//22
		$imovelnomeprop		= new TEntry('imovelnomeprop');
		$imovelnumero		= new TEntry('imovelnumero');
		$imovelcadastro		= new TEntry('imovelcadastro');
		//25
		$imoveltamanho		= new TEntry('imoveltamanho');
		$data_encerramento	= new TDateEdit('data_encerramento');
		// 27
		$contab_nome		= new TEntry('contab_nome');
		$contab_inscrmun	= new TEntry('contab_inscrmun');
		$contab_endereco	= new TEntry('contab_endereco');
		$contab_fone		= new TEntry('contab_fone');

		// 
		//$vemrequerer		= new TRadioGroup('vemrequerer');
		$req_inscricao			= new TCheckButton('req_inscricao');
		$req_baixa				= new TCheckButton('req_baixa');
		$req_alteracao			= new TCheckButton('req_alteracao');
		$req_altera_endereco	= new TCheckButton('req_altera_endereco');
		$req_altera_nome		= new TCheckButton('req_altera_nome');
		$req_altera_socio		= new TCheckButton('req_altera_socio');
		$req_altera_atividade	= new TCheckButton('req_altera_atividade');
		$req_altera_outro		= new TCheckButton('req_altera_outro');
		$req_extravionf			= new TCheckButton('req_extravionf');
		$req_cancelanf			= new TCheckButton('req_cancelanf');
		$req_alteraendcorr		= new TCheckButton('req_alteraendcorr');
		$req_alterarespcont		= new TCheckButton('req_alterarespcont');
		$req_cnd				= new TCheckButton('req_cnd');
		$req_outros				= new TCheckButton('req_outros');
		$req_outros_descricao	= new TEntry('req_outros_descricao');

		$justificativa		= new TText('justificativa');




		// configura os campos

		$items = Anexo2Record::getModalidadeItems();
		$modalidade->addItems($items);
		$modalidade->setLayout('HORIZONTAL');
		$modalidade->setValue(1);
		//$modalidade->{'style'} = "font-size:16px";



		$nome->setProperty('maxlength',60);
		$nome->setSize('600px');

		$inscmun->setMaxLength(14);
		$inscmun->setSize('200px');

		$fantasia->setProperty('maxlength',60);
		$fantasia->setSize('600px');

		$cpfcnpj->setMaxLength(14);
		$cpfcnpj->setSize('200px');


		$endereco->setProperty('maxlength',45);
		$endereco->setSize('350px');

		$bairro->setProperty('maxlength',25);
		$bairro->setSize('250px');

		$cep->setMaxLength(8);


		$corresp_endereco->setProperty('maxlength',45);
		$corresp_endereco->setSize('350px');

		$corresp_bairro->setProperty('maxlength',25);
		$corresp_bairro->setSize('250px');

		$corresp_cep->setMaxLength(8);


		$fone->setProperty('maxlength',20);

		$email->setProperty('maxlength',60);
		$email->setSize('250px');

		$identidade->setProperty('maxlength',20);



		$ativ_principal->setProperty('maxlength',100);
		$ativ_principal->setSize('800px');

		$ativ_acessoria->setProperty('maxlength',100);
		$ativ_acessoria->setSize('800px');


		$registro_junta->setProperty('maxlength',20);

		$conselho_registro->setProperty('maxlength',20);


		$inscrest->setMaxLength(20);
		$inscrest->setSize('200px');

		$protalvarasanitario->setMaxLength(20);
		$protalvarasanitario->setSize('200px');


		$imovelnomeprop->setProperty('maxlength',40);
		$imovelnomeprop->setSize('350px');

		$imovelnumero->setProperty('maxlength',20);
		$imovelnumero->setSize('200px');

		$imovelcadastro->setProperty('maxlength',20);
		$imovelcadastro->setSize('200px');


		$imoveltamanho->setProperty('maxlength',20);
		$imoveltamanho->setSize('200px');


		$contab_nome->setProperty('maxlength',60);
		$contab_nome->setSize('500px');

		$contab_endereco->setProperty('maxlength',80);
		$contab_endereco->setSize('480px');

		$contab_inscrmun->setProperty('maxlength',20);
		$contab_inscrmun->setSize('200px');

		$contab_fone->setProperty('maxlength',20);
		$contab_fone->setSize('200px');


		$req_outros_descricao->setProperty('maxlength',80);
		$req_outros_descricao->setSize('800px');

		$justificativa->setSize('1024px','60px');


		$req_inscricao->setValue('S');
		$req_baixa->setValue('S');
		$req_alteracao->setValue('S');
		$req_altera_endereco->setValue('S');
		$req_altera_nome->setValue('S');
		$req_altera_socio->setValue('S');
		$req_altera_atividade->setValue('S');
		$req_altera_outro->setValue('S');
		$req_extravionf->setValue('S');
		$req_cancelanf->setValue('S');
		$req_alteraendcorr->setValue('S');
		$req_alterarespcont->setValue('S');
		$req_cnd->setValue('S');
		$req_outros->setValue('S');



		$tb1 = new TTable();

		$r = $tb1->addRow();
		$c = $r->addCell('<h3>FORMULARIO ANEXO II</h3>');
		$c->align = 'center';

		$r = $tb1->addRow();
		$c = $r->addCell('<h4>Formulário de Cadastro / Requerimento</h4>');
		$c->align = 'center';


		$r = $tb1->addRow();
		$this->aviso = $r->addCell('');
		$this->aviso->align = 'center';
//		$this->aviso->colspan = 2;

		$r = $tb1->addRow();
		$c = $r->addCell($modalidade);
		$c->align = 'center';
//		$c->colspan = 3;


		// tabela que vai organizar os campos do form:
		$tb = new TTable();
		$tb->border=1;

		$r = $tb1->addRow();
		$c = $r->addCell($tb);



		$r = $tb->addRow();
		$c = $r->addCell('1 - Razão Social / Nome<br>');
		$c->add($nome);
		$c->colspan = 2;

		$c = $r->addCell('2 - Inscrição Municipal<br>');
		$c->add($inscmun);

		$r = $tb->addRow();
		$c = $r->addCell('3 - Nome Fantasia (Conforme CNPJ)<br>');
		$c->add($fantasia);
		$c->colspan = 2;

		$c = $r->addCell('4 - CNPJ ou CPF<br>');
		$c->add($cpfcnpj);

		$r = $tb->addRow();
		$c = $r->addCell('5 - Endereço (Rua, Complemento)<br>');
		$c->add($endereco);

		$c = $r->addCell('6 - Bairro<br>');
		$c->add($bairro);

		$c = $r->addCell('7 - CEP<br>');
		$c->add($cep);

		$r = $tb->addRow();
		$c = $r->addCell('8 - Endereço para Correspondência (Rua, Complemento)<br>');
		$c->add($corresp_endereco);

		$c = $r->addCell('9 - Bairro<br>');
		$c->add($corresp_bairro);

		$c = $r->addCell('10 - CEP<br>');
		$c->add($corresp_cep);

		$r = $tb->addRow();
		$c = $r->addCell('11 - Fone / FAX<br>');
		$c->add($fone);

		$c = $r->addCell('12 - E-mail<br>');
		$c->add($email);

		$c = $r->addCell('13 - Doc. Ident./Orgão Exp.<br>Nº');
		$c->add($identidade);


		$r = $tb->addRow();
		$c = $r->addCell('14 - Ramo de Atividade Principal<br>');
		$c->add($ativ_principal);
		$c->colspan = 3;

		$r = $tb->addRow();
		$c = $r->addCell('15 - Ramo de Atividade Acessória<br>');
		$c->add($ativ_acessoria);
		$c->colspan = 3;



		$r = $tb->addRow();
		$c = $r->addCell('16 - Registro da Junta Comercial ou Reg. Cart. Civil<br>Nº');
		$c->add($registro_junta);
		$c->add('De');
		$c->add($data_junta);

		$c = $r->addCell('17 - Conselho de Classe e Registro<br>');
		$c->add($conselho_registro);

		$c = $r->addCell('18 - Início das Atividades<br>Em');
		$c->add($data_inicio);



		$r = $tb->addRow();
		$c = $r->addCell('19-Capital Registrado: R$  <br>');
		$c->add($capital);

		$c = $r->addCell('20 - Inscrição Estadual - CGC/TE:<br>');
		$c->add($inscrest);

		$c = $r->addCell('21 - Protocolo Alvará Sanitário<br>Nº');
		$c->add($protalvarasanitario);



		$r = $tb->addRow();
		$c = $r->addCell('22 - Nome do Proprietário do Imóvel<br>');
		$c->add($imovelnomeprop);

		$c = $r->addCell('23 - Imovel N.º<br>');
		$c->add($imovelnumero);

		$c = $r->addCell('24 - Nº Cadastro IPTU<br>');
		$c->add($imovelcadastro);


		$r = $tb->addRow();
		$c = $r->addCell('25 - Tamanho do Imóvel em m²<br>');
		$c->add($imoveltamanho);
		$c->colspan = 2;

		$c = $r->addCell('26- Data de Encerramento<br>');
		$c->add($data_encerramento);



		$r = $tb->addRow();
		$c = $r->addCell('27 - Responsabilidade de serviços Contábeis<br>');
		$c->add('Nome');
		$c->add($contab_nome);
		$c->colspan = 2;

		$c = $r->addCell('<br>');
		$c->add('Insc. Municipal N.º');
		$c->add($contab_inscrmun);

		$r = $tb->addRow();
		$c = $r->addCell('Endereço');
		$c->add($contab_endereco);
		$c->colspan = 2;

		$c = $r->addCell('Telefone');
		$c->add($contab_fone);



		$r = $tb1->addRow();
		$r->addCell('O contribuinte acima identificado, vem requerer,');


		$r = $tb1->addRow();
		$c = $r->addCell($req_inscricao);
		$c->add('<label for="req_inscricao">Inscrição no Cadastro de Contribuintes Municipais (cadastro inicial)</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_baixa);
		$c->add('<label for="req_baixa">Solicitação de (Baixa) encerramento de atividade</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_alteracao);
		$c->add('<label for="req_alteracao">Comunicação de alteração: </label>.');

			$c->add($req_altera_endereco);
			$c->add('<label for="req_altera_endereco">Endereço;</label> ');

			$c->add($req_altera_nome);
			$c->add('<label for="req_altera_nome">R. Social/ Fantasia;</label> ');

			$c->add($req_altera_socio);
			$c->add('<label for="req_altera_socio">Sócios;</label> ');

			$c->add($req_altera_atividade);
			$c->add('<label for="req_altera_atividade">Atividades;</label> ');

			$c->add($req_altera_outro);
			$c->add('<label for="req_altera_outro">Outros</label>.');


		$r = $tb1->addRow();
		$c = $r->addCell($req_extravionf);
		$c->add('<label for="req_extravionf">Comunicação de Extravio de Doc. Fiscal</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_cancelanf);
		$c->add('<label for="req_cancelanf">Cancelamento de Notas Fiscais</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_alteraendcorr);
		$c->add('<label for="req_alteraendcorr">Solicitação para Alteração de Endereço de Correspondência</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_alterarespcont);
		$c->add('<label for="req_alterarespcont">Solicitação para Alteração de Responsabilidade Contábil</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_cnd);
		$c->add('<label for="req_cnd">Negativa de Débitos</label>.');

		$r = $tb1->addRow();
		$c = $r->addCell($req_outros);
		$c->add('<label for="req_outros">OUTROS:</label>.');
		$c->add($req_outros_descricao);

		$r = $tb1->addRow();
		$c = $r->addCell('Justificativa: <i>(Até 500 caracteres)</i>');
		$r = $tb1->addRow();
		$c = $r->addCell($justificativa);

		$r = $tb1->addRow();
		$c = $r->addCell('<br><br>');
		$c->add($btOk);
		$c->align = 'center';

		parent::add($tb1);
		parent::setFields( [$modalidade,$nome,$fantasia,$inscmun,$cpfcnpj,
			$endereco,$bairro,$cep,$corresp_endereco,$corresp_bairro,$corresp_cep,$email,$fone,$identidade,
			$ativ_principal,$ativ_acessoria,$registro_junta,$data_junta,$conselho_registro,$data_inicio,
			$capital,$inscrest,$protalvarasanitario,$imovelnomeprop,$imovelnumero,$imovelcadastro,
			$imoveltamanho,$data_encerramento,$contab_nome,$contab_inscrmun,$contab_endereco,$contab_fone,
			$req_inscricao,$req_baixa,$req_alteracao,$req_altera_endereco,$req_altera_nome,
			$req_altera_socio,$req_altera_atividade,$req_altera_outro,$req_extravionf,$req_cancelanf,
			$req_alteraendcorr,$req_alterarespcont,$req_cnd,$req_outros,$req_outros_descricao,
			$justificativa,$btOk] );
	}

}
?>