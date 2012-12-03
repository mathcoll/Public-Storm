<?php
include_once('js_merge.php');

if($_POST['t']=="css") {
header("Content-Disposition: attachment; filename=compressed.css");
echo jsCssCompressor::compressCss($_POST['s']);
}
if($_POST['t']=="js") {
header("Content-Disposition: attachment; filename=compressed.js");
echo jsCssCompressor::compressJs($_POST['s']);
}