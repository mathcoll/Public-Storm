<?php
if (basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));
// Site base Url ; no trailing slash
$BASE_URL	= '';
$MAILER		= 'smtp'; // smtp or mail
define('DEV', true);
?>
