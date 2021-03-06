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
		
final class sendtoafriend extends Plugins {
 	public static $subdirs = array("sendtoafriend", "yahoo_callback");
 	public static $name = "sendtoafriend";
	public static $db;
	public static $s;
 	
	public function __construct() {
		require(Settings::getVar('prefix') . 'conf/'.self::$name.'.php');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/scripts/'.self::$name.'.js', 'all.js');
		//Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/styles/'.self::$name.'.css', 'screen.css');
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
