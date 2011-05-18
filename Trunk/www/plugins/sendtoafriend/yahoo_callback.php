<?php
if ( !session_id() ) session_start();


if( isset($_GET["oauth_token"]) ) {
	$oauth_token = $_GET["oauth_token"];
	$oauth_verifier = $_GET["oauth_verifier"];
	//print "->".$_SESSION["oauth_token_secret"];
	include_once Settings::getVar('ROOT')."plugins/sendtoafriend/classes/yahoo_OAuth/getacctok.php";
}

$sPlug = new Settings::$VIEWER_TYPE;
$sPlug->AddData("storm", $uri[$ind+1]);
$sPlug->AddData("json", $_SESSION["json"]);
$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
$sPlug->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
$sPlug->AddData("default_template", $sPlug->fetch("default.tpl", "plugins/sendtoafriend/mails"));
print $sPlug->fetch("form2.tpl", "plugins/sendtoafriend");
/*
Array
(
    [oauth_token] => h3h4vhz
    [oauth_verifier] => mkck6g
)
*/

exit;
?>