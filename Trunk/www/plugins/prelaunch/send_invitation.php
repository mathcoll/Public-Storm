<?php
/*
    Public-Storm
    Copyright (C) 2008-2011 Mathieu Lory <mathieu@internetcollaboratif.info>
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





require(Settings::getVar('inc_dir') . "phpMailer/class.phpmailer.php");

$mail    = new PHPMailer();
$email = $uri[$ind+2];
$sPlug->AddData("email", $email);
$sPlug->AddData("subject", i18n::_("Vous avez accepté de tester Public-Storm, c'est maintenant!"));
$body = $sPlug->fetch("invitation.tpl", "plugins/prelaunch");

$mail->From     = Settings::getVar('From');
$mail->FromName = Settings::getVar('FromName');
$mail->Mailer = Settings::getVar('Mailer');
$mail->Host = Settings::getVar('Host');
$mail->Subject = i18n::_("Vous avez accepté de tester Public-Storm, c'est maintenant!");
$mail->AltBody = i18n::_("To view the message, please use an HTML compatible email viewer!");
$mail->CharSet = 'utf-8';
$mail->MsgHTML($body);
$mail->AddAddress($email, User::getNameFromEmail($email));

if( !$mail->Send() )
{
	Settings::setVar('message', i18n::_("Failed to send mail", array($datas['email'])));
	$_SESSION["message"] = i18n::_("Failed to send mail", array($datas['email']));
}
else
{
	header("HTTP/1.1 302 Moved temporarily", false, 302);
	header("Location: ".$_SERVER['HTTP_REFERER'], false, 302);
	exit;
}



?>