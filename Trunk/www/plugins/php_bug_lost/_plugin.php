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
		
final class php_bug_lost extends Plugins {
 	public static $subdirs = array();
 	public static $name = "php_bug_lost";
	public static $db;
	public static $s;
	public static $isLoaded = false;
 	
	public function __construct() 	{
		require(Settings::getVar('prefix') . 'conf/php_bug_lost.php');

		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").'/plugins/php_bug_lost/classes/PHPBugLost.0.3/source/bl_debug.css', 'admin.css');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").'/plugins/php_bug_lost/classes/PHPBugLost.0.3/source/bl_debug.js', 'all.js');
		require_once('./plugins/'.self::$name.'/classes/PHPBugLost.0.3/phpBugLost.0.3.php');
		self::$isLoaded = true;
	}
	
	public function loadLang() {
		return parent::loadLang(self::$name);
	}	
	
	public function getVersion() {
		return parent::getVersion();
	}
	
	public function getName() {
		return self::$name;
	}
	
	public function getDescription() {
		return parent::getDescription();
	}
	
	public function getAuthor() {
		return parent::getAuthor();
	}
	
	public function getIcon()
	{
		return parent::getIcon(self::$name);
	}
	
	public function getStatus() {
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs() {
		return self::$subdirs;
	}
}


?>
