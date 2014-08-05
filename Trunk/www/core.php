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
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'errordocument.db');
checkFileWritable(Settings::getVar('prefix') . 'datas/' . 'aboutcron.db');

if( DEBUG == true ) { Settings::setVar("Starting at", microtime(true)); }
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


function modifier_url($string) {
	$string    = utf8_encode(
			strtr(
					utf8_decode($string),
					utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ. "),
					"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn--"
			)
	);
	$string    = htmlentities(strtolower($string));
	//$string    = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($string));
	$string    = trim($string, "-");
	return $string;
}


// Function for looking for a value in a multi-dimensional array
function in_multi_array($value, $array) {
	foreach ($array as $key => $item)
	{
		// Item is not an array
		if (!is_array($item))
		{
			// Is this item our value?
			if ($item == $value) return true;
		}

		// Item is an array
		else
		{
			// See if the array name matches our value
			//if ($key == $value) return true;

			// See if this array matches our value
			if (in_array($value, $item)) return true;

			// Search this array
			else if (in_multi_array($value, $item)) return true;
		}
	}

	// Couldn't find the value in array
	return false;
}

?>