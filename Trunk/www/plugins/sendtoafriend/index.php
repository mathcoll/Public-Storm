<?php
/*
    Public-Storm
    Copyright (C) 2008-2012 Mathieu Lory <mathieu@internetcollaboratif.info>
    This file is part of Public-Storm.

    Public-Storm is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Public-Storm is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Public-Storm. If not, see <http://www.gnu.org/licenses/>.
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

$sPlug = new Settings::$VIEWER_TYPE;

$uri = explode('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

$title = Settings::getVar('title') != NULL ? Settings::getVar('title') : Settings::getVar('SITE_NAME').", ".i18n::_("baseline");
$description = Settings::getVar('description') != NULL ? Settings::getVar('description') : i18n::_("description");
$meta_keywords = Settings::getVar('meta_keywords') != NULL ? Settings::getVar('meta_keywords') : i18n::_("meta_keywords");
$meta_description = Settings::getVar('meta_description') != NULL ? Settings::getVar('meta_description', i18n::_("description", array($uri[$ind+2]))) : i18n::_("meta_description", i18n::_("description", array($uri[$ind+2])));
$s = new Settings::$VIEWER_TYPE;
$s->AddData("title", $title);
$s->AddData("meta_keywords", i18n::_("Partage, Partagez, connexion, OAuth, yahoo, Google, Facebook, %s", array($uri[$ind+2])));
$s->AddData("meta_description", i18n::_("Partagez le Storm %s via une connexion OAuth", array($uri[$ind+2])));
$s->AddData("description", $description);
$s->AddData("site_name", Settings::getVar('SITE_NAME'));
$s->AddData("site_description", Settings::getVar('SITE_DESCRIPTION'));
$s->AddData("site_baseline", Settings::getVar('SITE_BASELINE'));
$s->AddData("version", Settings::getVar('SITE_VERSION'));
$s->AddData("prefix", Settings::getVar('prefix'));
$s->AddData("base_url", Settings::getVar('base_url'));
$s->AddData("base_url_http", Settings::getVar('base_url_http'));
$s->AddData("theme_dir", Settings::getVar('theme_dir'));

switch ( $uri[$ind+1]) {
	case "yahoo_" : 
		include_once Settings::getVar('ROOT')."plugins/sendtoafriend/classes/oauth-php/library/OAuthStore.php";
		include_once Settings::getVar('ROOT')."plugins/sendtoafriend/classes/oauth-php/library/OAuthRequester.php";
		include_once Settings::getVar('ROOT')."plugins/sendtoafriend/classes/yahoo_OAuth/getreqtok.php";
		break;
		
	case "send" :
		require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");
		
		$s->AddData("base_url", Settings::getVar('base_url_http'));
		$s->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
		$s->AddData("theme_dir", Settings::getVar('theme_dir'));
		$s->AddData("message_perso", strip_tags($_POST["message_perso"]));
		
		$body = $s->fetch("default.tpl", "plugins/sendtoafriend/mails");
		
		$mail    = new PHPMailer();
		$mail->From     = Settings::getVar('From');
		$mail->FromName = Settings::getVar('FromName');
		$mail->Mailer = Settings::getVar('Mailer');
		$mail->Host = Settings::getVar('Host');
		$mail->Subject = i18n::_("Invitation à consulter Public-Storm");
		$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
		$mail->CharSet = 'utf-8';
		$mail->MsgHTML($body);
		$mail->AddBCC("m.lory@free.fr", "Mathieu Lory");
		foreach($_POST["friends"] as $email) {
			$mail->AddBCC($email, "");
		}
		
		if( !$mail->Send() )
		{
			$sPlug->AddData("storm", $uri[$ind+2]);
			$sPlug->AddData("message", i18n::_("Failed to send mail"));
			print $sPlug->fetch("form3.tpl", "plugins/sendtoafriend");
			exit;
		}
		else
		{
			$sPlug->AddData("storm", $uri[$ind+2]);
			$sPlug->AddData("message", i18n::_("Mail sent"));
			print $sPlug->fetch("form3.tpl", "plugins/sendtoafriend");
			exit;
		}
		$mail->ClearAddresses();
		break;
		
	default :
	case "form" : 
		$sPlug->AddData("storm", $uri[$ind+2]);
		print $sPlug->fetch("form.tpl", "plugins/sendtoafriend");
		break;
}
exit;






