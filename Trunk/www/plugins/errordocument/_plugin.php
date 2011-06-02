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
 */
		
final class errordocument extends Plugins
{
 	public static $subdirs = array("teststatus");
 	public static $name = "errordocument";
	public static $db;
	public static $s;
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/errordocument.php');
		self::$s = new Settings::$VIEWER_TYPE;	
	}
	
	public static function setError($errorCode)
	{
		switch( $errorCode )
		{
			case "500" : 
				$status = "500 Internal Server Error";
				$template = "500.tpl";
				break;
				
			case "501" : 
				$status = "501";
				$template = "501.tpl";
				break;
				
			case "503" : 
				$status = "503 Service Unavailable";
				$template = "503.tpl";
				break;
				
			case "404" : 
			default :
				$status = "404 Not Found";
				$template = "404.tpl";
				break;
				
		}
		header('Status: '.$status, true, $errorCode);
		header('HTTP/1.1 '.$status, true, $errorCode);
		self::$s->AddData("site_name", Settings::getVar('SITE_NAME'));
		self::$s->AddData("site_description", Settings::getVar('SITE_DESCRIPTION'));
		self::$s->AddData("site_baseline", i18n::_("baseline"));
		self::$s->AddData("version", Settings::getVar('SITE_VERSION'));
		self::$s->AddData("prefix", Settings::getVar('prefix'));
		self::$s->AddData("base_url", Settings::getVar('base_url_http'));
		self::$s->AddData("theme_dir", Settings::getVar('theme_dir'));
		print self::$s->fetch($template, "plugins/errordocument");
		exit;
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
		return self::getAuthor();
	}
	
	public function getIcon()
	{
		return parent::getIcon(self::$name);
	}
	
	public function getStatus()
	{
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
}


?>