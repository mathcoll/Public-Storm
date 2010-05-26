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
 */




if ( $_POST['login'] && $_POST['password'] )
{
	if ( User::userLogin($_POST['login'], md5($_POST['password']), $_POST['persistent']) )
	{
		$_SESSION["message"] = i18n::_("vous êtes connecté %s", array($_SESSION['prenom']." ".$_SESSION['nom']));
		$persistent = $_POST['persistent'] == "true" ? "1" : "0";
		
		if ( $persistent == "1" )
		{
			$end = time() + 3600 * 24 * 15;/* expire dans 15 jours */
			setcookie("persistentConnection", $persistent, $end, Settings::getVar("BASE_URL")."/");
			setcookie("uid", User::$uid, $end, Settings::getVar("BASE_URL")."/");
			
			//header("Set-Cookie: persistentConnection=".$persistent, false);
			//header("Set-Cookie: uid=".User::$uid, false);
		}
		
		header("HTTP/1.1 302 Moved temporarily", false, 302);
		header("Location: ".$_SERVER['HTTP_REFERER'], false, 302);
		exit;
	}
	else
	{
		$_SESSION["message"] = i18n::_("Erreur d'identification !");		header("HTTP/1.1 302 Moved temporarily", false, 302);
		header("Location: ".$_SERVER['HTTP_REFERER'], false, 302);
		exit;
	}
}
?>