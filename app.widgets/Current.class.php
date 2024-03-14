<?php
class Current{
	static public function DateBR(){
		return date('d/m/Y');
	}
	static public function NowBR(){
		return date('d/m/Y H:i:s');
	}
	static public function DateUS(){
		return date('Y-m-d');
	}
	static public function NowUS(){
		return date('Y-m-d H:i:s');
	}
	static public function Time($s=TRUE){
		if($s) return date('H:i:s');//com segundos
		else  return date('H:i');
	}
}
?>