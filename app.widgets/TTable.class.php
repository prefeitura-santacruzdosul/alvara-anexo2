<?php
// Ricardo Voigt - Programador
// Prefeitura Municipal de Santa Cruz do Sul - 2016
class TTableCell extends TElement{
	public function __construct($value){
		parent::__construct('td');
		parent::add($value);
	}
}

class TTableRow extends TElement{
	public function __construct(){
		parent::__construct('tr');
	}
	public function addCell($value){
		$cell = new TTableCell($value);
		parent::add($cell);
		return $cell;
	}
}

class TTable extends TElement{
	public function __construct(){
		parent::__construct('table');
	}
	public function addRow(){
		$r = new TTableRow();
		parent::add($r);
		return $r;
	}
}
?>