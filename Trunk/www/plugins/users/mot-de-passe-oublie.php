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
 */


$sPlug = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');

Settings::setVar('title', i18n::_("mot_de_passe_oublie"));
$sPlug->AddData("title", Settings::getVar('title'));
#$sPlug->->AddData("i18n", i18n::getLng());
$sPlug->AddData("site_name", Settings::getVar('SITE_NAME'));
Settings::setVar('description', i18n::_("description", array("")));
Settings::setVar('meta_description', i18n::_("description", array("")));
$sPlug->AddData("site_baseline", Settings::getVar('SITE_BASELINE'));
$sPlug->AddData("version", Settings::getVar('SITE_VERSION'));
$sPlug->AddData("prefix", Settings::getVar('prefix'));
$sPlug->AddData("base_url", Settings::getVar('base_url_http'));
$sPlug->AddData("theme_dir", Settings::getVar('theme_dir'));
$sPlug->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
$sPlug->AddData("user_infos", $user_infos);
$sPlug->AddData("current_lang", $_SESSION['LANG']);
$sPlug->AddData("rssfeed_url", Settings::getVar('rssfeed_url'));


if ( $_POST && ( $_POST["email"] || $_POST["login"] ) )
{
	$email = $_POST["email"] != "" ? $_POST["email"] : User::getEmailFromLogin($_POST["login"]);
	$login = $_POST["login"] != "" ? $_POST["login"] : User::getLoginFromEmail($_POST["email"]);
	$user = users::getUserInfos($login);
	$nom = $user["nom"];
	$prenom = $user["prenom"];
	
	
	if ( isset($login) )
	{
		if ( $password = User::userResetPassword($login) )
		{
			if ( !$_SESSION["message"] = User::userResendPassword(array('prenom' => $prenom, 'nom' => $nom, 'email' => $email, 'login' => $login, 'password' => $password), $sPlug) )
			{
				$_SESSION["message"] = i18n::_("Erreur lors de l'envoi de votre nouveau password !");
			}
		}
		else
		{
			$_SESSION["message"] = i18n::_("Erreur : impossible de corriger le mot de passe !");
		}
	}
	else
	{
		$_SESSION["message"] = i18n::_("Erreur : Identifiant/login inconnu !");
	}
}

if ( isset($_SESSION["message"]) )
{
	$sPlug->AddData("message", $_SESSION["message"]);
	$_SESSION["message"] = NULL;
}


$user = Array(
	'logged'	=> User::isLogged(),
	'id'		=> $_SESSION['user_id'],
	'prenom'	=> $_SESSION['prenom'],
	'nom'		=> $_SESSION['nom'],
	'email'	=> $_SESSION['email']
);
$sPlug->AddData("user", $user);

$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => Settings::getVar('title')));
Settings::setVar('breadcrumb', $breadcrumb);
$content = $sPlug->fetch("mot-de-passe-oublie.tpl", "plugins/users");

?>