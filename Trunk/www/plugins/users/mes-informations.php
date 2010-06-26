<?php
/*
    Public-Storm
    Copyright (C) 2008-2010 Mathieu Lory <mathieu@internetcollaboratif.info>
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

$sTab = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');


#$sTab$s->AddData("i18n", i18n::getLng());
$sTab->AddData("prefix", Settings::getVar('prefix'));
$sTab->AddData("base_url", Settings::getVar('BASE_URL'));
$sTab->AddData("theme_dir", Settings::getVar('theme_dir'));

if ( $_POST )
{
	$user_infos = array();
	$user_infos['prenom'] = $_POST['prenom'];
	$user_infos['nom'] = $_POST['nom'];
	$user_infos['email'] = $_POST['email'];
	$user_infos['login'] = $_SESSION['login'];
	$user_infos['lang'] = $_SESSION['LANG'];
	$user_infos['password'] = $_POST['password'];
	$user_infos['password2'] = $_POST['password2'];
	$user_infos['password_md5'] = md5($user_infos['password']);
	
	if( $user_infos['password'] == $user_infos['password2'] )
	{
		if ( User::userUpdate($user_infos) )
		{
			$_SESSION['prenom'] = $user_infos['prenom'];
			$_SESSION['nom'] = $user_infos['nom'];
			$_SESSION['email'] = $user_infos['email'];
			$_SESSION['login'] = $user_infos['login'];
			$sTab->AddData("message", i18n::_("modifications effectuées"));
		}
		else
		{
			$sTab->AddData("message", i18n::_("unknown_error"));
		}
	}
	else
	{
		$sTab->AddData("message", i18n::_("password_error"));
	}
}
else
{
	$user_infos = array();
	$user_infos['prenom'] = $_SESSION['prenom'];
	$user_infos['nom']	 = $_SESSION['nom'];
	$user_infos['key']	= $_SESSION['uid'];
	$user_infos['email'] = $_SESSION['email'];
	$user_infos['login'] = $_SESSION['login'];
	$user_infos['password'] = "";
	$user_infos['password2'] = "";
}
$sTab->AddData("user_infos", $user_infos);

if ( isset($_SESSION["message"]) )
{
	$sTab->AddData("message", $_SESSION["message"]);
	$_SESSION["message"] = NULL;
}

$user = Array(
	'logged'	=> User::isLogged(),
	'key'		=> $_SESSION['uid'],
	'id'		=> $_SESSION['user_id'],
	'prenom'	=> $_SESSION['prenom'],
	'nom'		=> $_SESSION['nom'],
	'email'	=> $_SESSION['email']
);
$sTab->AddData("user", $user);

$author = public_storm::getStormAuthor($_SESSION['user_id']);
$sTab->AddData("username", $_SESSION['prenom']." ".$_SESSION['nom']);
$sTab->AddData("avatar", "http://www.gravatar.com/avatar/".md5( strtolower( $_SESSION['email'] ) )."?default=".urlencode( Settings::getVar('theme_dir')."/img/weather-storm.png" )."&size=150");

//$breadcrumb = Settings::getVar('breadcrumb');
//array_push($breadcrumb, array("name" => Settings::getVar('title')));
//Settings::setVar('breadcrumb', $breadcrumb);
$tabContent = $sTab->fetch("mes-informations.tpl", "plugins/users");

?>