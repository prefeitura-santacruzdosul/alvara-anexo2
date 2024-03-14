<?php
// ATENÇÃO PARA ESTA IDÉIA NAS FUNÇÕES DE DATA/HORA:
// nome da function em ingles => formato ingles (yyyy-mm-dd)nas datas!!!

class Funcoes
{
	static public function conv_data_to_us($dt)
	{
		if($dt == ''){	return null; // atenção
		}else{
			//'dd/mm/aaaa' -> 'aaaa-mm-dd':
			$d=substr($dt,0,2);
			$m=substr($dt,3,2);
			$a=substr($dt,6,4);
			return "{$a}-{$m}-{$d}";
		}
	}
	static public function conv_datahora_to_us($dt){
		if($dt == ''){	return null; // atenção
		}else{
			// 'dd/mm/aaaa hh:nn' -> 'aaaa-mm-dd hh:nn':
			$d=substr($dt,0,10);
			$d=self::conv_data_to_us($d);
			$hr=substr($dt,11,5);
			return "{$d} {$hr}";
		}
	}
	static public function conv_data_to_br($dt){
		if($dt == ''){	return '';
		}else{
			// 'aaaa-mm-dd' -> 'dd/mm/aaaa':
			$a=substr($dt,0,4);
			$m=substr($dt,5,2);
			$d=substr($dt,8,2);
			return "{$d}/{$m}/{$a}";
		}
	}
	static public function conv_datahora_to_br($dt){
		if($dt == ''){	return '';
		}else{
			// 'aaaa-mm-dd hh:nn' -> 'dd/mm/aaaa hh:nn':
			$d=substr($dt,0,10);
			$d=self::conv_data_to_br($d);
			$hr = substr($dt,11,5);
			return "{$d} {$hr}";
		}
	}

	static public function formata_valor($vl,$dec){
		return number_format($vl,$dec,',','.');
	}

	static public function conv_valor_to_us($vl){
		// entra valor separado com ',' e sai separado por '.':
		if(strpos($vl,',') == 0){	return $vl;
		}else{
			$r = $vl;
			$r = str_replace('.','',$r);
			$r = str_replace(',','.',$r);
			return $r;
		}
	}

	static public function conv_valor_to_br($vl){
		// entra valor separado com '.' e sai separado por ',':
		if(strpos($vl,'.') == 0){	return $vl;
		}else{
			$r = $vl;
			$r = str_replace(',','',$r);
			$r = str_replace('.',',',$r);
			return $r;
		}
	}

	static public function removeAcentos($msg){
		$a = array(
			"/[ÂÀÁÄÃ]/"=>"A",
			"/[âãàáä]/"=>"a",
			"/[ÊÈÉË]/"=>"E",
			"/[êèéë]/"=>"e",
			"/[ÎÍÌÏ]/"=>"I",
			"/[îíìï]/"=>"i",
			"/[ÔÕÒÓÖ]/"=>"O",
			"/[ôõòóö]/"=>"o",
			"/[ÛÙÚÜ]/"=>"U",
			"/[ûúùü]/"=>"u",
			"/ç/"=>"c",
			"/Ç/"=> "C");
		// Tira o acento pela chave do array
		return preg_replace(array_keys($a),array_values($a),$msg);
	}

	static public function somenteNumeros($str){
		// verifica se o parametro '$str' possui apenas caracteres numericos
		$i = 0;
		$s = '';
		while($i < strlen($str)){ // && ($vok == true)) {
			$vok = true;
			$letra = substr($str,$i,1);
			if($letra != '0'){$vok = filter_var($letra,FILTER_VALIDATE_INT);}
			if($vok){$s.= $letra;}
			$i++;
		}
		return $s;
	}

	static public function strtoupper_acento($msg){
		$a = array();
		$a['/â/'] = 'Â';
		$a['/ã/'] = 'Ã';
		$a['/à/'] = 'À';
		$a['/á/'] = 'Á';
		$a['/ä/'] = 'Ä';

		$a['/ê/'] = 'Ê';
		$a['/è/'] = 'È';
		$a['/é/'] = 'É';
		$a['/ë/'] = 'Ë';

		$a['/î/'] = 'Î';
		$a['/í/'] = 'Í';
		$a['/ì/'] = 'Ì';
		$a['/ï/'] = 'Ï';

		$a['/ô/'] = 'Ô';
		$a['/õ/'] = 'Õ';
		$a['/ò/'] = 'Ò';
		$a['/ó/'] = 'Ó';
		$a['/ö/'] = 'Ö';

		$a['/û/'] = 'Û';
		$a['/ú/'] = 'Ú';
		$a['/ù/'] = 'Ù';
		$a['/ü/'] = 'Ü';

		$a['/ç/'] = 'Ç';

		// troca os caracteres pela chave do array
		$s = preg_replace(array_keys($a),array_values($a),$msg);
		return strtoupper($s);
	}

	static public function strtolower_acento($msg){
		$a = array();
		$a['/Â/'] = 'â';
		$a['/Ã/'] = 'ã';
		$a['/À/'] = 'à';
		$a['/Á/'] = 'á';
		$a['/Ä/'] = 'ä';
		$a['/Ê/'] = 'ê';
		$a['/È/'] = 'è';
		$a['/É/'] = 'é';
		$a['/Ë/'] = 'ë';
		$a['/Î/'] = 'î';
		$a['/Í/'] = 'í';
		$a['/Ì/'] = 'ì';
		$a['/Ï/'] = 'ï';
		$a['/Ô/'] = 'ô';
		$a['/Õ/'] = 'õ';
		$a['/Ò/'] = 'ò';
		$a['/Ó/'] = 'ó';
		$a['/Ö/'] = 'ö';
		$a['/Û/'] = 'û';
		$a['/Ú/'] = 'ú';
		$a['/Ù/'] = 'ù';
		$a['/Ü/'] = 'ü';
		$a['/Ç/'] = 'ç';

		// troca os caracteres pela chave do array
		$s = preg_replace(array_keys($a),array_values($a),$msg);
		return strtolower($s);
	}

	static public function validaCNPJ( $cnpj ) {
		$cnpj = preg_replace( '@[./-]@', '', $cnpj );
		if( strlen( $cnpj ) <> 14 or !is_numeric( $cnpj ) )	{
			return false;
		}
		$k = 6;
		$soma1 = 0;
		$soma2 = 0;
		for( $i = 0; $i < 13; $i++ ){
			$k = $k == 1 ? 9 : $k;
			$soma2 += ( $cnpj[$i] * $k );
			$k--;
			if($i < 12)	{
				if($k == 1)	{
					$k = 9;
					$soma1 += ( $cnpj[$i] * $k );
					$k = 1;
				} else {
					$soma1 += ( $cnpj[$i] * $k );
				}
			}
		}
		$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
		$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
		return ( $cnpj[12] == $digito1 and $cnpj[13] == $digito2 );
	}

	static public function maskCNPJ($cnpj){
		// vamos converter de '11111111111111' para '11.111.111/1111-11'
		// vamos converter de '01234567890123' para '01.234.567/8901-23'
		$s = $cnpj;

		// vamos converter de '01234567890123' para '012345678901-23'
		$s = substr($s,0,12).'-'.substr($s,12,2);
		// vamos converter de '012345678901-23' para '01234567/8901-23'
		$s = substr($s,0,8).'/'.substr($s,8,7);
		// vamos converter de '01234567/8901-23' para '01234.567/8901-23'
		$s = substr($s,0,5).'.'.substr($s,5,11);
		// vamos converter de '01234.567/8901-23' para '01.234.567/8901-23'
		$s = substr($s,0,2).'.'.substr($s,2,15);

		return $s;
	}

	static public function validaCPF($cpf) {
		$nulos = array("12345678909","11111111111","22222222222","33333333333",
			"44444444444","55555555555","66666666666","77777777777",
			"88888888888","99999999999","00000000000");
		/* Retira todos os caracteres que nao sejam 0-9 */
		$cpf = ereg_replace("[^0-9]", "", $cpf);

		/*Retorna falso se houver letras no cpf */
		if (!(ereg("[0-9]",$cpf)))
		    return FALSE;

		/* Retorna falso se o cpf for nulo */
		if( in_array($cpf, $nulos) )
		    return FALSE;

		/*Calcula o penúltimo dígito verificador*/
		$acum = 0;
		for($i=0; $i<9; $i++) {
		  $acum+= $cpf[$i]*(10-$i);
		}

		$x = $acum % 11;
		$acum = ($x>1) ? (11 - $x) : 0;
		/* Retorna falso se o digito calculado eh diferente do passado na string */
		if ($acum != $cpf[9]){
		  return FALSE;
		}

		/*Calcula o último dígito verificador*/
		$acum = 0;
		for ($i=0; $i<10; $i++){
		  $acum+= $cpf[$i]*(11-$i);
		}   

		$x=$acum % 11;
		$acum = ($x > 1) ? (11-$x) : 0;
		/* Retorna falso se o digito calculado eh diferente do passado na string */
		if ( $acum != $cpf[10]){
		  return FALSE;
		}   
		/* Retorna verdadeiro se o cpf eh valido */
		return TRUE;
	}
	static public function maskCPF($cpf){
		// vamos converter de '11111111111' para '111.111.111-11'
		// vamos converter de '01234567890' para '012.345.678-90'
		$s = $cpf;

		// vamos converter de '012345678901' para '012345678-90'
		$s = substr($s,0,9).'-'.substr($s,9,2);
		// vamos converter de '012345678-90' para '012345.678-90'
		$s = substr($s,0,6).'.'.substr($s,6,7);
		// vamos converter de '012345.678-90' para '012.345.678-90'
		$s = substr($s,0,3).'.'.substr($s,3,11);

		return $s;
	}

	function validaPIS($pis){
		//remove todos os caracteres deixando apenas valores numéricos
		$pis = preg_replace('/[^0-9]+/', '', $pis);

		//se a quantidade de caracteres numéricos  for diferente de 11 é inválido
		if(strlen($pis) <> 11) return false;

		//inicia uma variável que será responsável por armazenar o cálculo da somatória dos números individuais
		$digito = 0;
		/**
		* Criamos o for
		* $i = 0 será o índice para retorna os números individuais
		* $x =3 será o valor multiplicador dos números
		* $i<10 a condição do loop
		* $i++ incrementa , e $x-- decrementa
		*/
		for($i = 0, $x=3; $i<10; $i++, $x--){
		//Verifica se $x for menor que 2, seu valor será 9, senão será $x
		$x = ($x < 2) ? 9 : $x;
		//Realiza a soma dos números individuais vezes o fator multiplicador
		$digito += $pis[$i]*$x;
		}

		/**
		* Verificamos se o módulo do resultado por 11 é menor que 2, se for o valor será 0
		* Caso não for, pegar o valor 11 e diminuir com o módulo do resultado da somatória.
		*/

		$calculo = (($digito%11) < 2) ? 0 : 11-($digito%11);
		//Se o valor da variavel cálculo for diferente do último digito, ele será inválido, senão verdadeiro
		return ($calculo <> $pis[10]) ? false :true;
	}

	static public function validaDataBR($dt){
		// valida se $data esta no formato DD/MM/AAAA
		$result = TRUE;
		if($dt != ''){
			if((substr($dt,2,1)!='/')
			 or(substr($dt,5,1)!='/')
			 or(strlen($dt)!=10)){
				$result = FALSE;
			}else{
				$v = explode('/',$dt);
				$d = Funcoes::somenteNumeros($v[0]);
				$m = Funcoes::somenteNumeros($v[1]);
				$a = Funcoes::somenteNumeros($v[2]);
				$chk = checkdate($m,$d,$a);

				if(($d != $v[0])
				 or($m != $v[1])
				 or($a != $v[2])
				 or(! $chk)){
					$result = FALSE;
				}
			}
		}
		return $result;
	}

	static public function validaDataUS($dt){
		// valida se $dt esta no formato AAAA-MM-DD
		$result = TRUE;
		if($dt != ''){
			if((substr($dt,4,1) != '-')
			 or(substr($dt,7,1) != '-')
			 or(strlen($dt) != 10)){
				$result = FALSE;
			}else{
				$v = explode('-',$dt);
				$d = Funcoes::somenteNumeros($v[2]);
				$m = Funcoes::somenteNumeros($v[1]);
				$a = Funcoes::somenteNumeros($v[0]);
				$chk = checkdate($m,$d,$a);
				if(($d != $v[2])
				 or($m != $v[1])
				 or($a != $v[0])
				 or(! $chk)){
					$result = FALSE;
				}
			}
		}
		return $result;
	}

	static public function validaHora($hora){
		$result = FALSE;
		// deve estar no formato "HH:MM" (hora:minutos)
		if(strlen($hora) == 5){
			$h = substr($hora,0,2);
			$h = self::somenteNumeros($h);
			$m = substr($hora,3,2);
			$m = self::somenteNumeros($m);
			if(substr($hora,2,1) == ':'){
				if(($h >= 0)and($h <= 23)){
					if(($m >= 0)and($m <= 59)){
						$result = TRUE;
					}
				}
			}
		}
		return $result;
	}

	static public function inc_data($data,$dias){
		// incrementa tantos dias em uma data
		// nome da function em portugues => formato brasileiro nas datas!!!
		// formato 'dd/mm/aaaa hh:nn'
		$data_e = explode('/',$data);

		$data_final = date('d/m/Y', mktime(0,0,0,$data_e[1],$data_e[0] + $dias,$data_e[2]));

		return $data_final;
	}

	static public function inc_date($data,$dias){
		// incrementa tantos dias em uma data
		// nome da function em ingles => formato ingles nas datas!!!
		// formato: YYYY-MM-DD
		$data_e = explode('-',$data);

		$data_final = date('Y-m-d', mktime(0,0,0,$data_e[1],$data_e[2] + $dias,$data_e[0]));

		return $data_final;
	}

	static public function inc_hora($datahora,$horas){
		// incrementa tantas horas em uma data/hora
		// nome da function em portugues => formato brasileiro nas datas!!!
		// formato 'dd/mm/aaaa hh:nn'
		$data = substr($datahora,0,10);
		$hora = substr($datahora,11,5);

		$data_e = explode('/',$data);
		$hora_e = explode(':',$hora);

		$nova = mktime($hora_e[0] + $horas,$hora_e[1],0,$data_e[1],$data_e[0],$data_e[2]);

		return date('d/m/Y H:i',$nova);
	}

	static public function inc_time($datahora,$horas){
		// incrementa tantas horas em uma data/hora
		// nome da function em ingles => formato ingles nas datas!!!
		// formato: YYYY-MM-DD
		$data = substr($datahora,0,10);
		$hora = substr($datahora,11,5);

		$data_e = explode('-',$data);
		$hora_e = explode(':',$hora);

		$nova = mktime($hora_e[0] + $horas,$hora_e[1],0,$data_e[1],$data_e[2],$data_e[0]);

		return date('Y-m-d H:i',$nova);
	}

	static public function years_between($dt1,$dt2){
		$r = self::days_between($dt1,$dt2);
		$r = ($r/365);
		return $r;
	}

	static public function days_between($dt1,$dt2){
		// Fonte:
		// http://clares.wordpress.com/2008/02/10/calculando-a-diferenca-entre-2-datas/
		// nome da function em ingles => formato ingles nas datas!!!
		// formato: YYYY-MM-DD
		$v1 = explode('-',$dt1);
		$v2 = explode('-',$dt2);

		$nova1 = mktime(0, 0, 0, $v1[1], $v1[2], $v1[0]);
		$nova2 = mktime(0, 0, 0, $v2[1], $v2[2], $v2[0]);

		// data2 DEVE SER MAIOR QUE data1... melhorar depois
		$res = $nova2 - $nova1;

		//converter o tempo em dias
		$res = round(($res/60/60/24));

		return $res;
	}

	static public function months_between($dt1,$dt2){
		// Fonte:
		// http://clares.wordpress.com/2008/02/10/calculando-a-diferenca-entre-2-datas/
		// nome da function em ingles => formato ingles nas datas!!!
		// formato: YYYY-MM-DD
		$v1 = explode('-',$dt1);
		$v2 = explode('-',$dt2);

		$nova1 = mktime(0,0,0,$v1[1],$v1[2],$v1[0]);
		$nova2 = mktime(0,0,0,$v2[1],$v2[2],$v2[0]);

		// data2 DEVE SER MAIOR QUE data1... melhorar depois
		$res = $nova2 - $nova1;

		//converter o tempo em dias
		$res = round(($res/60/60/24/30));

		return $res;
	}

	static public function time_between($hr1,$hr2){
		// Fonte:
		// http://clares.wordpress.com/2008/02/10/calculando-a-diferenca-entre-2-datas/
		// nome da function em ingles => formato ingles nas datas!!!
		// formato: HH::NN
		$v1 = explode(':',$hr1);
		$v2 = explode(':',$hr2);

		$nova1 = mktime($v1[0], $v1[1], 0, 0, 0, 0);
		$nova2 = mktime($v2[0], $v2[1], 0, 0, 0, 0);

		if ($nova2 > $nova1){

			// data2 DEVE SER MAIOR QUE data1... melhorar depois
			$diff = $nova2 - $nova1;

		}elseif(($nova1 > $nova2)and($v1[0] >= 12)){
			// "Virada de turno"
			// no caso do ponto, considera que o funcionário saiu no dia seguinte.

			$nova1 = mktime($v1[0]-12, $v1[1], 0, 0, 0, 0);
			$nova2 = mktime($v2[0]+12, $v2[1], 0, 0, 0, 0);

			$diff = $nova2 - $nova1;
		}


		$res = $diff;// /3600;

/*		if( $h = intval((floor($diff/3600))) )
			$diff = $diff % 3600;
		if( $m = intval((floor($diff/60))) )
			$diff = $diff % 60;

		$res = array();
		$res['h'] = str_pad($h, 2, '0', STR_PAD_LEFT);
		$res['m'] = str_pad($m, 2, '0', STR_PAD_LEFT);*/

		return $res;
	}

	static public function convQtdeParaHHMM($q){
		if( $h = intval((floor($q/3600))) )
			$q = $q % 3600;
		if( $m = intval((floor($q/60))) )
			$q = $q % 60;

		$h = str_pad($h,2,'0',STR_PAD_LEFT);
		$m = str_pad($m,2,'0',STR_PAD_LEFT);

		return "{$h}:{$m}";
	}


	static public function getSaudacao(){
		$dia = date('d');
		$mes = date('m');
		$ano = date('Y');
		$semana = date('w');
		$hora= date('H');
		$saudacao = "";
		if($hora >=18 and $hora <24){
			$saudacao = "Boa noite!";}
		elseif($hora >=0 and $hora <12){
			$saudacao = "Bom dia!";}
		elseif($hora >=12 and $hora <18){
			$saudacao = "Boa tarde!";
		}
		//configuraÃ§Ã£o do mÃªs:
		switch($mes){
		case 1: $mes = "janeiro";
			break;
		case 2: $mes = "fevereiro";
			break;
		case 3: $mes = "marco";
			break;
		case 4: $mes = "abril"; 
			break;
		case 5: $mes = "maio";
			break;
		case 6: $mes = "junho";
			break;
		case 7: $mes = "julho";
			break;
		case 8: $mes = "agosto";
			break;
		case 9: $mes = "setembro";
			break;
		case 10: $mes = "outubro";
			break;
		case 11: $mes = "novembro";
			break;
		case 12: $mes = "dezembro";
			break;
		}
		//configura dia da semana!
		switch ($semana){
		case 0: $semana = "Domingo";
			break;
		case 1: $semana = "Segunda-feira";
			break;
		case 2: $semana = "Terça-feira";
			break;
		case 3: $semana = "Quarta-feira";
			break;
		case 4: $semana = "Quinta-feira";
			break;
		case 5: $semana = "Sexta-feira";
			break;
		case 6: $semana = "Sábado";
			break; 
		}
		return "{$saudacao}<br>{$dia} de {$mes} de {$ano} - {$semana}";
	}

	static public function format_date_br($data){
		// funcção q garante q os campos de uma data tenham zeros a esquerda,
		// para o formato DD/MM/AAAA

		if($data == ''){
			return null; // atenção
		}else{
			$data_e = explode("/",$data);

			$data_e[0] = str_pad( self::somenteNumeros($data_e[0]), 2, '0', STR_PAD_LEFT);
			$data_e[1] = str_pad( self::somenteNumeros($data_e[1]), 2, '0', STR_PAD_LEFT);
			$data_e[2] = str_pad( self::somenteNumeros($data_e[2]), 4, '0', STR_PAD_LEFT);

			$data_final = date("d/m/Y", mktime(0,0,0, $data_e[1], $data_e[0], $data_e[2]));

			return $data_final;
		}
	}

	static public function validaEmail($email){
		// $r = ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $email );
		$r = preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$/", $email );
		return $r;
	}

	static public function removeBarras($texto){
		$aux = $texto;
		if($aux == ''){
			return null;
		} else {
			while( strpos($aux, '\\') > 0){
				$aux = stripslashes($aux);
			}
			$aux = stripslashes($aux);
			return stripslashes($aux);
		}
	}

	static public function getDiaSemana($data){
		// No formato DD/MM/AAAA
		$v = explode('/',$data);
		$d = date('w', mktime(0,0,0,$v[1],$v[0],$v[2]));
		// date('w') retorna de 0 (dom) a 6 (sab)
		return $d;
	}

	static function geraThumb($photo,$output,$new_width,$new_height=null){
		list($width, $height) = getimagesize($photo);
		if($width>$new_width){
			if(!$new_height){$new_height = ($new_width/$width) * $height;}
			$thumb = imagecreatetruecolor($new_width, $new_height);
			$source = imagecreatefromstring(file_get_contents($photo));
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($thumb, $output, 100);
		}else{
			copy($photo, $output);
		}
	}

	static function redimensionaImg($photo,$output,$new_width,$new_height){
		/// baseada na geraThumb, mas sempre cria uma imagem no output nova com o tamanho informado
		list($width, $height) = getimagesize($photo);
		$thumb = imagecreatetruecolor($new_width, $new_height);
		$source = imagecreatefromstring(file_get_contents($photo));
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		imagejpeg($thumb, $output, 100);
	}

//achei essa function aqui:
//http://www.scriptbrasil.com.br/forum/lofiversion/index.php/t8149.html
	static function unzip($fln,$path){
	 $zip = zip_open($fln);
	 if($zip){
	   while($zip_entry = zip_read($zip)){
	     if(zip_entry_filesize($zip_entry) > 0){
	       // str_replace must be used under windows to convert "/" into "\"
	       $complete_path = $path.str_replace('/','\\',dirname(zip_entry_name($zip_entry)));
	       $complete_name = $path.str_replace ('/','\\',zip_entry_name($zip_entry));
	       if(!file_exists($complete_path)){ 
	         $tmp = '';
	         foreach(explode('\\',$complete_path) AS $k){
	           $tmp .= $k.'\\';
	           if(!file_exists($tmp)){mkdir($tmp, 0777);}
	         }
	       }
	       if(zip_entry_open($zip, $zip_entry, "r")){
	         $fd = fopen($complete_name, 'w');
	         fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
	         fclose($fd);
	         zip_entry_close($zip_entry);
	       }
	     }
	   }
	   zip_close($zip);
	 }
	}


	static public function porExtenso($valor=0,$maiusculas=FALSE,$dinheiro=TRUE){

		if($dinheiro){
			$singular = array("centavo","real","mil","milhão","bilhão","trilhão","quatrilhão");
			$plural = array("centavos","reais","mil","milhões","bilhões","trilhões","quatrilhões");
		}else{
			$singular = array("","","mil","milhão","bilhão","trilhão","quatrilhão");
			$plural = array("","","mil","milhões","bilhões","trilhões","quatrilhões");
		}
		$c = array("","cem","duzentos","trezentos","quatrocentos","quinhentos","seiscentos","setecentos","oitocentos","novecentos");
		$d = array("","dez","vinte","trinta","quarenta","cinquenta","sessenta","setenta","oitenta","noventa");
		$d10 = array("dez","onze","doze","treze","quatorze","quinze","dezesseis","dezesete","dezoito","dezenove");
		$u = array("","um","dois","três","quatro","cinco","seis","sete","oito","nove");

		$z = 0; 
		$rt = '';

		$valor = number_format($valor, 2,'.','.');
		$inteiro = explode('.',$valor);
		for($i=0;$i<count($inteiro);$i++)
			for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
				$inteiro[$i] = '0'.$inteiro[$i];

		$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
		for ($i=0;$i<count($inteiro);$i++){
			$valor = $inteiro[$i];
			$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
			$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
			$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

			$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
			$t = count($inteiro)-1-$i; 
			$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : ""; 
			if ($valor == "000")$z++; elseif ($z > 0) $z--; 
			if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
			if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
			($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
		}

		if(!$maiusculas){ 
			return($rt ? $rt : "zero"); 
		}else{ 
			if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt));
			return (($rt) ? ($rt) : "Zero");
		}
	}

}
?>