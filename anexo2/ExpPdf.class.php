<?php
/**
 * Recebe os dados do Anexo2Form e gera o PDF para download.
 */
class ExpPdf
{

	/**
	 * funções Cell e MultiCell que escreve texto no pdf
	 * convretendo de utf-8
	 */
	private function Cell($pdf, $w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		$frase = mb_convert_encoding($txt, 'ISO-8859-1', 'UTF-8');

		$pdf->Cell($w, $h, $frase, 0, 0, $align, $fill, $link);
	}
	// $this->MultiCell($pdf, 140, $cel_altura, $frase, 1, 'L');
	private function MultiCell($pdf, $w, $h, $txt, $border=0, $align='J', $fill=false)
	{
		$frase = mb_convert_encoding($txt, 'ISO-8859-1', 'UTF-8');

		$pdf->MultiCell($w, $h, $frase, $border, $align, $fill);
	}

	private function trataLinha($txt)
	{
		return ($txt != '') ? "\n{$txt}" : "\n\n";
	}

	public function show()
	{

		// recebe os dados vindos do form como um objeto Anexo2Record...
		$form = new Anexo2Form();
		$dados = $form->getData('Anexo2Record');

		$dados->trataDados();


		$pdf = new FPDF('P','mm','A4');

		$pdf->SetAuthor('DTIC - Departamento de Tecnologia de Informação e Comunicação');

		$pdf->AddPage('P','A4');



		//$fonte = 'helvetica';
		//$fonte = 'times';
		$fonte = 'arialn';
		$fonteB = 'arialnb';

		$pdf->AddFont('arialn');
		$pdf->AddFont('arialnb');



		$y = 10;
		$cel_altura = 5;

		$pdf->SetFont($fonteB,'',11);


		$frase = 'FORMULÁRIO ANEXO II';

		$pdf->SetXY(15,$y);
		$this->Cell($pdf, 180,0, $frase, 0, 0, 'C');

		$frase = 'Formulário de Cadastro / Requerimento';

		$y+=$cel_altura;
		$pdf->SetXY(15,$y);
		$this->Cell($pdf, 180,0, $frase, 0, 0, 'C');

		$pdf->Image('brasao-pb.jpg', 21, 11, 24);

		// tira negrito + tamanho 18
		$pdf->SetFont($fonte,'',17);

		$frase = 'Prefeitura Municipal de Santa Cruz do Sul';

		$y+=$cel_altura+3;
		$pdf->SetXY(47,$y);
		$this->Cell($pdf, 100,0, $frase, 0, 0, 'L');


		// tamanho 10
		$pdf->SetFont($fonte,'',10);


		$y+=$cel_altura;
		$y+=$cel_altura;
		$y+=$cel_altura;
		$xMod = 25;
		$yMod = $y;

		$items = Anexo2Record::getModalidadeItems();
		foreach($items as $modkey=>$moddesc)
		{

			$pdf->Rect($xMod, $yMod, 5, 5);

			if($dados->modalidade == $modkey)
			{
				$pdf->SetFont($fonteB,'',12);
				$pdf->SetXY($xMod,$yMod+3);
				$this->Cell($pdf, 10,0, 'X', 0, 0, 'L');
				$pdf->SetFont($fonte,'',10);
			}

			$xMod+= 5;

			$pdf->SetXY($xMod,$yMod+3);
			$this->Cell($pdf, 10,0, $moddesc, 0, 0, 'L');

			$xMod+= 18;
		}


		$y+=$cel_altura;
		$y+=1;


		// BORDA/CAIXA RETANGULAR....
		$pdf->Rect(15, $y, 182, 137, 'D');


		$y+=1;
		$frase = '1 - Razão Social / Nome' . $this->trataLinha($dados->nome);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 140, $cel_altura, $frase, 1, 'L');

		$frase = '2-Inscição Muncipal' . $this->trataLinha($dados->inscmun);
		$pdf->SetXY(156,$y);
		$this->MultiCell($pdf, 40, $cel_altura, $frase, 1, 'L');


		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '3 - Nome Fantasia (Conforme CNPJ)' . $this->trataLinha($dados->fantasia);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 140,$cel_altura, $frase, 1, 'L');

		$frase = '4-CNPJ ou CPF' . $this->trataLinha($dados->cpfcnpj);
		$pdf->SetXY(156,$y);
		$this->MultiCell($pdf, 40,$cel_altura, $frase, 1, 'L');



		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '5 - Endereço (Rua, Complemento)' . $this->trataLinha($dados->endereco);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 100,$cel_altura, $frase, 1, 'L');

		$frase = '6 - Bairro' . $this->trataLinha($dados->bairro);
		$pdf->SetXY(116,$y);
		$this->MultiCell($pdf, 63,$cel_altura, $frase, 1, 'L');

		$frase = '7 - CEP' . $this->trataLinha($dados->cep);
		$pdf->SetXY(179,$y);
		$this->MultiCell($pdf, 17,$cel_altura, $frase, 1, 'L');


		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '8 - Endereço para Correspondência (Rua, Complemento)' . $this->trataLinha($dados->corresp_endereco);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 100,$cel_altura, $frase, 1, 'L');

		$frase = '9 - Bairro' . $this->trataLinha($dados->corresp_bairro);
		$pdf->SetXY(116,$y);
		$this->MultiCell($pdf, 63,$cel_altura, $frase, 1, 'L');

		$frase = '10 - CEP' . $this->trataLinha($dados->corresp_cep);
		$pdf->SetXY(179,$y);
		$this->MultiCell($pdf, 17,$cel_altura, $frase, 1, 'L');




		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '11 - Fone / FAX' . $this->trataLinha($dados->fone);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 35,$cel_altura, $frase, 1, 'L');

		$frase = '12 - E-mail' . $this->trataLinha($dados->email);
		$pdf->SetXY(51,$y);
		$this->MultiCell($pdf, 105,$cel_altura, $frase, 1, 'L');

		$frase = "13 - Doc. Ident./Orgão Exp.\nNº {$dados->identidade}";
		$pdf->SetXY(156,$y);
		$this->MultiCell($pdf, 40,$cel_altura, $frase, 1, 'L');


		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '14 - Ramo de Atividade Principal' . $this->trataLinha($dados->ativ_principal);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 180,$cel_altura, $frase, 1, 'L');

		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '15 - Ramo de Atividade Acessória' . $this->trataLinha($dados->ativ_acessoria);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 180,$cel_altura, $frase, 1, 'L');





		// nova linha.......................
		$y+=($cel_altura*2);
		if($dados->registro_junta==''){
			$registro_junta = '                         ';
		}else{
			$registro_junta = $dados->registro_junta;
		}
		$frase = "16 - Registro da Junta Comercial ou Reg. Cart. Civil\nNº {$registro_junta}";
		if($dados->data_junta == ''){
			$frase.= " de ___/___/_____";
		}else{
			$frase.= " de {$dados->data_junta}";
		}
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 85,$cel_altura, $frase, 1, 'L');

		$frase = "17 - Conselho de Classe e Registro\nNº {$dados->conselho_registro}";
		$pdf->SetXY(101,$y);
		$this->MultiCell($pdf, 50,$cel_altura, $frase, 1, 'L');

		$frase = '18 - Início das Atividades';
		if($dados->data_inicio == ''){
			$frase.= "\nEm ___/___/_____";
		}else{
			$frase.= "\nEm {$dados->data_inicio}";
		}
		$pdf->SetXY(151,$y);
		$this->MultiCell($pdf, 45,$cel_altura, $frase, 1, 'L');




		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = "19 - Capital Registrado\nR\$ {$dados->capital}";
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 45,$cel_altura, $frase, 1, 'L');

		$frase = '20 - Inscrição Estadual - CGC/TE';
		if($dados->inscrest == ''){
			$frase.= "\n\n";
		}else{
			$frase.= "\n{$dados->inscrest}";
		}
		$pdf->SetXY(61,$y);
		$this->MultiCell($pdf, 90,$cel_altura, $frase, 1, 'L');

		$frase = "21 - Protocolo Alvará Sanitário\nNº {$dados->protalvarasanitario}";
		$pdf->SetXY(151,$y);
		$this->MultiCell($pdf, 45,$cel_altura, $frase, 1, 'L');




		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '22 - Nome do Proprietário do Imóvel' . $this->trataLinha($dados->imovelnomeprop);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 85,$cel_altura, $frase, 1, 'L');

		$frase = '23 - Imovel N.º' . $this->trataLinha($dados->imovelnumero);
		$pdf->SetXY(101,$y);
		$this->MultiCell($pdf, 50,$cel_altura, $frase, 1, 'L');

		$frase = '24 - Nº Cadastro IPTU' . $this->trataLinha($dados->imovelcadastro);
		$pdf->SetXY(151,$y);
		$this->MultiCell($pdf, 45, $cel_altura, $frase, 1, 'L');


		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = '25 - Tamanho do Imóvel em m²' . $this->trataLinha($dados->imoveltamanho);
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 125, $cel_altura, $frase, 1, 'L');

		$frase = '26- Data de Encerramento' . $this->trataLinha($dados->data_encerramento);
		$pdf->SetXY(141,$y);
		$this->MultiCell($pdf, 55, $cel_altura, $frase, 1, 'L');




		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = "27 - Responsabilidade de serviços Contábeis\nNome {$dados->contab_nome}";
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 125,$cel_altura, $frase, 1, 'L');

		$frase = "\nInsc. Municipal N.º {$dados->contab_inscrmun}";
		$pdf->SetXY(141,$y);
		$this->MultiCell($pdf, 55,$cel_altura, $frase, 1, 'L');


		// nova linha.......................
		$y+=($cel_altura*2);
		$frase = "Endereço {$dados->contab_endereco}";
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 125,$cel_altura, $frase, 1, 'L');

		$frase = "Telefone {$dados->contab_fone}";
		$pdf->SetXY(141,$y);
		$this->MultiCell($pdf, 55,$cel_altura, $frase, 1, 'L');



		// nova linha.......................
		$y+=$cel_altura;
		$frase = "28 - Para uso da Fiscalização tributária alvará de licença - incidência Lei Mun. N.º\n\n";
		$pdf->SetXY(16,$y);
		$this->MultiCell($pdf, 125,$cel_altura, $frase, 1, 'L');

		$frase = "Visto Fiscal Tributário\n\n";
		$pdf->SetXY(141,$y);
		$this->MultiCell($pdf, 55,$cel_altura, $frase, 1, 'L');


		$y+=$cel_altura;
		$pdf->Rect(20, $y, 4, 4);

		$frase = 'Incidência ISSQN';
		$pdf->SetXY(26,$y);
		$this->Cell($pdf, 40, $cel_altura, $frase, 0, 1, 'L');

		$frase = 'Itens da Lista de Serviços';
		$pdf->SetXY(56,$y);
		$this->Cell($pdf, 40, $cel_altura, $frase, 0, 1, 'L');

		$y+=$cel_altura;
		$frase = 'O Contribuinte acima identificado, vem requerer:';
		$pdf->SetXY(15,$y+1);
		$this->Cell($pdf, 40, $cel_altura, $frase, 0, 1, 'L');




		//..........................


		$items = [
			'req_inscricao' => 'Inscrição no Cadastro de Contribuintes Municipais (cadastro inicial)',
			'req_baixa' => 'Solicitação de (Baixa) encerramento de atividade',
			'req_alteracao' => 'Comunicação de alteração: ',
			'req_extravionf' => 'Comunicação de Extravio de Doc. Fiscal',
			'req_cancelanf' => 'Cancelamento de Notas Fiscais',
			'req_alteraendcorr' => 'Solicitação para Alteração de Endereço de Correspondência',
			'req_alterarespcont' => 'Solicitação para Alteração de Responsabilidade Contábil',
			'req_cnd' => 'Negativa de Débitos',
			'req_outros' => 'OUTROS:',
		];

		$itemsAlt = [
			'req_altera_endereco' => 'Endereço;',
			'req_altera_nome' => 'R. Social/ Fantasia;',
			'req_altera_socio' => 'Sócios;',
			'req_altera_atividade' => 'Atividades;',
			'req_altera_outro' => 'Outros.'
		];

		$itemsAltX = [
			'req_altera_endereco' => 20,
			'req_altera_nome' => 35,
			'req_altera_socio' => 15,
			'req_altera_atividade' => 20,
			'req_altera_outro' => 20,
		];


		$y += $cel_altura+1;

		foreach($items as $reqfield => $reqdesc)
		{

			$xReq = 20;

			$pdf->Rect($xReq, $y, 4, 4);

			//if(isset($dados->$reqfield)){
				if($dados->$reqfield == 'S')
				{
					$pdf->SetFont($fonteB,'',12);
					$pdf->SetXY($xReq,$y+2);
					$this->Cell($pdf, 10,0, 'X', 0, 0, 'L');
					$pdf->SetFont($fonte,'',10);
				}
			//}

			$xReq+= 4;

			$pdf->SetXY($xReq,$y+2);
			$this->Cell($pdf, 10,0, $reqdesc, 0, 0, 'L');

			if($reqfield == 'req_alteracao')
			{
				$xAlt = $xReq + 40;
				foreach($itemsAlt as $altfield => $altdesc)
				{

					$pdf->Rect($xAlt, $y, 4, 4);

					if($dados->$altfield == 'S')
					{
						$pdf->SetFont($fonteB,'',12);
						$pdf->SetXY($xAlt,$y+2);
						$this->Cell($pdf, 10,0, 'X', 0, 0, 'L');
						$pdf->SetFont($fonte,'',10);
					}

					$xAlt+= 4;

					$pdf->SetXY($xAlt,$y+2);
					$this->Cell($pdf, 10,0, $altdesc, 0, 0, 'L');

					$xAlt+= $itemsAltX[$altfield];
				}
			}
			elseif($reqfield == 'req_outros')
			{
				$xReq+= 15;
				$pdf->SetFont($fonteB,'',10);
				$pdf->SetXY($xReq,$y+2);
				$this->Cell($pdf, 10,0, $dados->req_outros_descricao, 0, 0, 'L');
				$pdf->SetFont($fonte,'',10);
			}


			$y += $cel_altura-1;
		}


//		$y+=$cel_altura;
		$y+=2;

		// BORDA/CAIXA RETANGULAR....
		$pdf->Rect(15, $y, 182, 21, 'D');

		//$justificativa = $dados->justificativa;
		//$justificativa = str_replace(chr(13), '', $justificativa);
		//$justificativa = str_replace(chr(10), '; ', $justificativa);
		$contaQ = 0;
		$justificativa = '';
		for($i = 0; $i < strlen($dados->justificativa); $i++)
		{
			$letra = substr($dados->justificativa, $i, 1);
			if($letra == chr(10))
			{
				$contaQ++;
				$justificativa.= '; ';
			}elseif($letra!=chr(13)){
				$justificativa.= $letra;
			}
		}
		/*while ($contaQ < 3){
			$justificativa.= "\n";
			$contaQ++;
		}*/
		while (strpos($justificativa,'  ') > 0)
		{
			$justificativa = str_replace('  ',' ',$justificativa);
		}
		$justificativa = substr($justificativa, 0, 520);
		$justificativa = strtolower($justificativa);

		$frase = "JUSTIFICATIVA: {$justificativa}";
		$y+=1;
		$pdf->SetXY(15,$y);
		$this->MultiCell($pdf, 180, 5, $frase, 0);

		$y+=$cel_altura;
		$y+=$cel_altura;
		$y+=$cel_altura;


		$y+=$cel_altura;
		$y+=$cel_altura;


		// BORDA/CAIXA RETANGULAR....
		//$pdf->Rect(130, $y, 60, 30, 'D');

		//$pdf->SetFont($fonte,'',17);
		//$frase = 'PROTOCOLO';
		//$pdf->SetXY(130,$y+5);
		//$this->Cell($pdf, 60,0, $frase, 0, 0, 'C');

		//$pdf->SetFont($fonte,'',10);

		//$frase = 'REQUERIMENTO Nº__________';
		//$pdf->SetXY(130,$y+10);
		//$this->Cell($pdf, 60,0, $frase, 0, 0, 'C');

		//$frase = 'EM ____/____/______';
		//$pdf->SetXY(130,$y+15);
		//$this->Cell($pdf, 60,0, $frase, 0, 0, 'C');

		//$pdf->Line(140, $y+23, 185, $y+23);

		//$frase = 'Encarregado do Setor';
		//$pdf->SetXY(130,$y+26);
		//$this->Cell($pdf, 60,0, $frase, 0, 0, 'C');


		//$pdf->SetFont($fonte,'',10);


		// 
		$frase = 'As informações e os dados acima são expressão da verdade.';

		$pdf->SetXY(15,$y);
		$this->Cell($pdf, 180,0, $frase, 0, 0, 'L');

		$y+=$cel_altura;

		/// aaaa-mm-dd
		$hoje = Current::DateUS();
		$meses = Constante::getNomesMeses();
		$arr = explode('-',$hoje);
		$_dia = $arr[2];
		$_mes = strtolower($meses[ (int)$arr[1] ]);
		$_ano = $arr[0];

		$frase = "Santa Cruz do Sul, {$_dia} de {$_mes} de {$_ano} ";

		$y+=$cel_altura;
		$pdf->SetXY(15,$y);
		$this->Cell($pdf, 180,0, $frase, 0, 0, 'L');



		// LINHA DA ASSINATURA.....
		$y+=$cel_altura;
		$y+=$cel_altura;

		$y+=2;
		$pdf->Line(15, $y, 105, $y);

		//$y+=$cel_altura;
		$y+=3;

		$frase = 'CONTRIBUINTE (OU RESPONSÁVEL P/PROCURAÇÃO)';

		$pdf->SetXY(15,$y);
		$this->Cell($pdf, 90,0, $frase, 0, 0, 'C');



		$pdf->Output('D', 'Anexo2.pdf', true);
	}

}
?>