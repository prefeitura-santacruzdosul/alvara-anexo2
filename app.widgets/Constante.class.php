<?php
/**
 * 
 */
class Constante
{
	static public function getSimNaoArray()
	{
		return ['S'=>'Sim','N'=>'Não'];
	}
	static public function getNomesMeses()
	{
		$m = [];
		$m[1] = 'Janeiro';
		$m[2] = 'Fevereiro';
		$m[3] = 'Março';
		$m[4] = 'Abril';
		$m[5] = 'Maio';
		$m[6] = 'Junho';
		$m[7] = 'Julho';
		$m[8] = 'Agosto';
		$m[9] = 'Setembro';
		$m[10] = 'Outubro';
		$m[11] = 'Novembro';
		$m[12] = 'Dezembro';
		return $m;
	}
	static public function getAbrevMeses()
	{
		$m = [];
		$m[1] = 'Jan';
		$m[2] = 'Fev';
		$m[3] = 'Mar';
		$m[4] = 'Abr';
		$m[5] = 'Mai';
		$m[6] = 'Jun';
		$m[7] = 'Jul';
		$m[8] = 'Ago';
		$m[9] = 'Set';
		$m[10] = 'Out';
		$m[11] = 'Nov';
		$m[12] = 'Dez';
		return $m;
	}
	static public function getUltimoDiaMes($ano=0)
	{
		$m = [];
		$m[1] = 31;
		if ($ano % 4 == 0){
			$m[2] = 29;
		}else{
			$m[2] = 28;
		}
		$m[3] = 31;
		$m[4] = 30;
		$m[5] = 31;
		$m[6] = 30;
		$m[7] = 31;
		$m[8] = 31;
		$m[9] = 30;
		$m[10] = 31;
		$m[11] = 30;
		$m[12] = 31;
		return $m;
	}
	static public function getAbrevDiaSemana()
	{
		// usar em conjunto com date('w')
		$v = [];
		$v[0] = 'dom';
		$v[1] = 'seg';
		$v[2] = 'ter';
		$v[3] = 'qua';
		$v[4] = 'qui';
		$v[5] = 'sex';
		$v[6] = 'sab';
		return $v;
	}
	static public function getNomeDiaSemana()
	{
		// usar em conjunto com date('w')
		$v = [];
		$v[0] = 'Domingo';
		$v[1] = 'Segunda-feira';
		$v[2] = 'Terça-feira';
		$v[3] = 'Quarta-feira';
		$v[4] = 'Quinta-feira';
		$v[5] = 'Sexta-feira';
		$v[6] = 'Sábado';
		return $v;
	}

	static public function getListaUF()
	{
		return ['AC'=>'AC','AL'=>'AL','AM'=>'AM','AP'=>'AP','BA'=>'BA','CE'=>'CE','DF'=>'DF','ES'=>'ES','GO'=>'GO','MA'=>'MA','MG'=>'MG','MS'=>'MS','MT'=>'MT','PA'=>'PA','PB'=>'PB','PE'=>'PE','PI'=>'PI','PR'=>'PR','RJ'=>'RJ','RN'=>'RN','RO'=>'RO','RR'=>'RR','RS'=>'RS','SC'=>'SC','SE'=>'SE','SP'=>'SP','TO'=>'TO'];
	}
}
?>