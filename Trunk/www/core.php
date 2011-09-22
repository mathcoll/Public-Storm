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



require_once('./_global_settings.php');

checkFilePermissions(Settings::getVar('cache_dir'), "0777");
checkFilePermissions(Settings::getVar('prefix') . 'datas/', "0777");
checkFileReadable(Settings::getVar('prefix') . 'themes/');
checkFileReadable(Settings::getVar('prefix') . 'conf/');
checkFileReadable(Settings::getVar('inc_dir'));
checkFileReadable(Settings::getVar('plug_dir'));

function __autoload($class_name) {
	try {
		require_once './include/' . strtolower($class_name) . '.class.php';
		if ( @defined(DEBUG) && DEBUG == true ) {
			Debug::Log('Class "'.$class_name. '" loaded !', NOTICE);
		}
	} catch(Exception $e) {
		if ( @defined(DEBUG) && DEBUG == true ) {
			Debug::Log('Class "'.$class_name. '" Error !', ERROR);
		}
	}
}

function checkFilePermissions($path, $permission) {
	$f = new file($path);
	if( !$f->HasPermissions($permission) ) {
		exit(
			vsprintf(
				gettext("Erreur interne, le fichier '%s' n'a pas les permissions : %s"),
				array($path, $permission)
			)
		);
	}
}

function checkFileReadable($path) {
	$f = new file($path);
	if( !$f->IsReadable() ) {
		exit(
			vsprintf(
				gettext("Erreur interne, le fichier '%s' n'est pas lisible"),
				array($path)
			)
		);
	}
}

date_default_timezone_set(Settings::getVar('timezone'));

Server::Normalize();

User::$current = Session::Start();

header('Content-Type: text/html; charset=utf-8');
/*
$expires = 3600;
header("Pragma: public", true);
header("Cache-Control: maxage=".$expires.", must-revalidate");
header("Expires: " . gmdate("D, d M Y H:i:s", time()+$expires) . " GMT");
*/
if( DEBUG == true ) {
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
} else {
	error_reporting(0);
	ini_set('error_reporting', '');
	ini_set('display_errors', 0);
}


?>