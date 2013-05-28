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

final class identica_php extends Plugins
{
 	public static $subdirs = array(
 	);
 	public static $name = "identica_php";
	public static $db;
	public static $identica;
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/identica_php.php');
		require_once("./plugins/identica_php/classes/identica.lib.php");
		if ( !isset(self::$identica) ) {
			self::$identica = new Identica(Settings::getVar('username'), Settings::getVar('password'), Settings::getVar('application_source'));
		}
	}
	
	public function updateStatus($string, $cronId=null) {
		$json_decoded = urldecode(stripslashes($string));
		if ( isset($json_decoded->{'string'}) ) {
			$string = $json_decoded->{'string'};
		}
		if ( !$updateStatus = self::$identica->updateStatus(substr($string, 0, 140)) ) {
			if ( Plugins::isActive("aboutcron") && $cronId == null ) {
				aboutcron::addAction(array("identica_php::updateStatus", json_encode(array("string" => $string)), time()+3600));
			}
		} else {
			if ( $cronId != null ) {
				aboutcron::removeAction($cronId);
			}
			return $updateStatus;
		}
	}
	
	public function showUser($format, $id, $email = NULL)
	{
		return self::$identica->showUser($format, $id, $email=NULL);
	}	
	
	public function loadLang()
	{
		return parent::loadLang(self::$name);
	}
	
	public function getVersion()
	{
		return parent::getVersion();
	}
	
	public function getName()
	{
		return self::$name;
	}
	
	public function getDescription()
	{
		return parent::getDescription();
	}
	
	public function getAuthor()
	{
		return parent::getAuthor();
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
}

?>