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

if( isset($_POST) && $_POST["update_meta"] == true ) {
	//print_r($_POST);
	foreach($_POST as $name => $value) {
		if ( $name != "update_meta" ) {
			print users::setMetaData($name, $value);
		}
	}
	exit;
}

$sTab = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');


#$sTab$s->AddData("i18n", i18n::getLng());
$sTab->AddData("prefix", Settings::getVar('prefix'));
$sTab->AddData("base_url", Settings::getVar('BASE_URL'));
$sTab->AddData("theme_dir", Settings::getVar('theme_dir'));
$sTab->AddData("meta", users::getMetaData("ask_before_create"));
$sTab->AddData("email", $_SESSION["email"]);
$sTab->AddData("nom", $_SESSION["nom"]);
$sTab->AddData("prenom", $_SESSION["prenom"]);


$tabContent = $sTab->fetch("mes-parametres.tpl", "plugins/users");

?>