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


if (basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));
require_once('./_global_settings.php');

checkFilePermissions(Settings::getVar('cache_dir'), "0777");
checkFilePermissions(Settings::getVar('prefix') . 'datas/', "0777");
checkFileReadable(Settings::getVar('prefix') . 'themes/');
checkFileReadable(Settings::getVar('prefix') . 'conf/');
checkFileReadable(Settings::getVar('inc_dir'));
checkFileReadable(Settings::getVar('plug_dir'));
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'articles.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'plugins.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'prelaunch.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'public_storms.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'trackbacks.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'users.db');

function __autoload($class_name) {
	try {
		require_once './include/' . strtolower($class_name) . '.class.php';
		if ( @defined(DEBUG) && DEBUG == true ) {
			Debug::Log('Class "'.$class_name. '" loaded !', NOTICE, __LINE__, __FILE__);
		}
	} catch(Exception $e) {
		if ( @defined(DEBUG) && DEBUG == true ) {
			Debug::Log('Class "'.$class_name. '" Error !', ERROR, __LINE__, __FILE__);
		}
	}
}
Settings::setVar("Starting at", microtime(true));

/**
 * Check if a file have some permission, read, write, execute
 * @param string $path The full path to the file to check permission from
 * @param int $permission permission in octal mode ie 0777 or 0644
 */
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

/**
 * Check if a file is readable or not
 * @param string $path The full path to the file to check
 * @return void
 * @todo should return a boolean ! :-)
 */
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

/**
 * Check if a file is writable or not
 * @param string $path The full path to the file to check
 * @return void
 * @todo should return a boolean ! :-)
 */
function checkFileWritable($path) {
	$f = new file($path);
	if( !$f->IsWritable() ) {
		exit(
			vsprintf(
				gettext("Erreur interne, le fichier '%s' n'est pas inscriptible"),
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