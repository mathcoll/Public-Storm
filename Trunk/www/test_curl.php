<?php
echo "CURL - function test <br>" ;

function webcheck ($url) {
	echo "url = $url <br>";
   $ch = curl_init ($url);
   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
   $res = curl_exec ($ch);
   curl_close ($ch);
   return ($res);
}


$erg = webcheck("http://www.google.fr");
$zahl = strlen($erg);
echo "length = $zahl ";
?>