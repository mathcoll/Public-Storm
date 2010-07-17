<?php
class jsCssCompressor {
	var $block_css,$block_js;

	function makeJs($pathes,$to) {
		if(file_exists($to)) unlink($to);
		$fp=fopen($to,"a+");
		foreach($pathes as $v) {
			$data=file_get_contents($v);
			fwrite($fp, $this->clear_js($data));
		} 
		fclose($fp);
		if(file_exists($to)) {return true;}else{return false;}
	}
	function makeCss($pathes,$to) {
		if(file_exists($to)) unlink($to);
		$fp=fopen($to,"a+");
		foreach($pathes as $v) {
			$data=file_get_contents($v);
			fwrite($fp, $this->clear_css($data));
		} 
		fclose($fp);
		if(file_exists($to)) {return true;}else{return false;}
	}
	function compressJs($data) {
		return $this->clear_js($data);
	}
	function compressCss($data) {
		return $this->clear_css($data);
	}
	function clear_js($data) {
		$data=$this->strip_comments_js($data);
		$data=$this->strip_multipled_spaces($data);
		$data=$this->make_one_line($data);
		$data=$this->strip_spaces_js($data);
                $data=$this->strip_booleans_js($data);
		return $data;
	}
	function clear_css($data) {
		$data=$this->strip_comments_css($data);
		$data=$this->strip_multipled_spaces($data);
		$data=$this->make_one_line($data);
		return $data;
	}
	function strip_comments_js($data) {
		$data=eregi_replace("\/\/[^\n]*",'',$data);	
		$data=preg_replace("|\/\*[\s\S]*\*\/|iU",'',$data);
		return $data;
	}
	function strip_comments_css($data) {
		$data=preg_replace("|\/\*[\s\S]*\*\/|iU",'',$data);
		return $data;
	}
	function strip_multipled_spaces($data) {
		return eregi_replace("[ 	]+",' ',$data);
	}
	function make_one_line($data) {
		return eregi_replace("[\n\r]+",'',$data);
	}
	function strip_spaces_js($data) {
			$find=array(
			"/(([^\n])?function )+/i",
			"/(([^\n])?var )+/i",
			"/(([^\n])?case )+/i",
			"/( typeof )+/i",
			"/(else if)+/i",
			"/(([^\n])?return )+/i"
		);
		$findS=array(
			"/( in )+/i",
			"/(([^\n])?for)+/i",
			"/(([^\n])?while)+/i"
		);
		if(!self::$block_js) {
			function strip_js($m) {
					if(count($m)>2) {
						if(in_array($m[2],array(" ",";","(","=","{",")","}","/")) || !$m[2]) {
							$val=trim($m[1])."{*}";
						} else {
							$val=$m[1];
						}
						return $val;
					} else {
						if($m[1]=="else if") {
							return "else{*}if";
						} else {
							return " ".trim($m[1])."{*}";
						}
					}
			}
			self::$block_js=1;
			function strip_specious($m) {
				if(count($m)>2) {
					$a=eregi_replace("[ 	]",'',$m[2]);
					if($a!=";" && $a!="") {
						return "};".substr(trim($m[1]),1);				
					} else {
						return trim($m[1]);
					} 
				} else {
					return "{*}".trim($m[1])."{*}";
				}
			}
		}
		$data=preg_replace_callback($find,"strip_js",$data);
		$data=preg_replace_callback($findS,"strip_specious",$data);
		$findB=array("/\|\|/","/\&\&/");
		$rep=array("{*}||{*}","{*}&&{*}");
		$data=preg_replace($findB,$rep,$data);
		$data=eregi_replace("[ ]",'',$data);
		$data=eregi_replace("\{\*\}",' ',$data);
		return $data;
	}
	function strip_booleans_js($data) {
		$find=array("/\|\|/","/\&\&/");
		$rep=array(" || "," && ");
		$data=preg_replace($find,$rep,$data);
		return $data;
	}
}