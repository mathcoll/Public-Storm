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
 */

$sPlug = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');

require_once(Settings::getVar('inc_dir') . "securimage/securimage.php");
$securimage = new Securimage();

$user_infos = array();
$user_infos['prenom'] = isset($_POST['prenom'])?$_POST['prenom']:"";
$user_infos['nom'] = isset($_POST['nom'])?$_POST['nom']:"";
$user_infos['email'] = isset($_POST['email'])?$_POST['email']:"";
$user_infos['login'] = isset($_POST['login'])?$_POST['login']:"";
$user_infos['password'] = isset($_POST['password'])?$_POST['password']:"";

$sPlug->AddData("user_infos", $user_infos);
$sPlug->AddData("base_url_http", Settings::getVar('base_url_http'));
$sPlug->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
$sPlug->AddData("theme_dir", Settings::getVar('theme_dir'));
$sPlug->AddData("current_lang", $_SESSION['LANG']);
Settings::setVar('title', i18n::_("creer_un_compte"));
$sPlug->AddData("title", Settings::getVar('title'));
Settings::setVar('description', i18n::_("description", array("")));
Settings::setVar('meta_description', i18n::_("description", array("")));

$useradd="false";
if ( $_POST ) {
	if ( $securimage->check($_POST['captcha_code']) == false ) {
		$_SESSION["message"] = i18n::_("The code you entered was incorrect. Go back and try again.");
		Settings::setVar('pageview', '/creer-un-compte-captcha-error');
	} else {
		if ( $_POST['email'] == null ) {
			$_SESSION["message"] = i18n::_("Veuillez spécifier un email !");
			Settings::setVar('pageview', '/creer-un-compte-error');
		} else {
			if ( $_POST['login'] == null ) {
				$_SESSION["message"] = i18n::_("Veuillez spécifier un identifiant !");
				Settings::setVar('pageview', '/creer-un-compte-error');
			} else {
				$_POST['lang'] = $_POST['lang'] != "" ? $_POST['lang'] : $_SESSION['LANG'];
				if ( User::userAdd($_POST) ) {
					User::sendWelcomeMail($_POST, $sPlug);
					aboutcron::addAction(array("users::plusTwoWeeks", json_encode(array("login" => $_POST['login'])), time()+2*604800)); //+ 2 weeks
					$useradd="true";
					Settings::setVar('pageview', '/creer-un-compte-ok');
					$_SESSION["message"] = i18n::_("Vérifier voter boite de réception email !");
				} else {
					$_SESSION["message"] = i18n::_("Erreur lors de la création du compte !");
					Settings::setVar('pageview', '/creer-un-compte-error');
				}
			}
		}
	}
}
$sPlug->AddData("useradd", $useradd);
$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => Settings::getVar('title')));
Settings::setVar('breadcrumb', $breadcrumb);
$content = $sPlug->fetch("creer-un-compte.tpl", "plugins/users");
?>