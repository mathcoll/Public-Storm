<?php
include('js_merge.php');
//include('js_merge_php4.php'); //for php4


$arr=array("someJS1.js","js/someJS2.js");
$a=new jsCssCompressor();
$a->makeJs($arr,"js/a.js");

// or if CSS $a->makeCss($arr,"js/a.js");

/* or
jsCssCompressor::makeJs($arr,"js/a.js");

or if CSS

jsCssCompressor::makeCss($arr,"js/a.js");
   
*/

/*
for compressing from data and output as a file for save.

$data="some string";
header("Content-Disposition: attachment; filename=compressed.js");
echo jsCssCompressor::compressJs($data);

or if CSS

$data="some string";
header("Content-Disposition: attachment; filename=compressed.css");
echo jsCssCompressor::compressCss($data);
*/
