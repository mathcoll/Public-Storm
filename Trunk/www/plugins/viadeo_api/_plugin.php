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
		
final class viadeo_api extends Plugins
{
 	public static $subdirs = array();
 	public static $name = "viadeo_api";
	public static $db;
	public static $s;
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/'.self::$name.'.php');
		require_once('./plugins/'.self::$name.'/classes/'.self::$name.'.php');
		Settings::addCss('screen', Settings::getVar('ROOT').Settings::getVar('theme_dir').'/plugins/'.self::$name.'/styles/'.self::$name.'.css', 'all.css');
		//Settings::addJs('text/javascript', Settings::getVar('ROOT').Settings::getVar('theme_dir').'/plugins/'.self::$name.'/scripts/'.self::$name.'.js');
	}
	
	public function getJsonGroups($storm_permaname, $limit=10) {
		$client_id     = Settings::getVar('Client Id');
		$client_secret = Settings::getVar('Client Secret');
		$u = "https://api.viadeo.com/search/groups?limit=%s&q=%s";
		$url = vsprintf($u, array($limit, urlencode($storm_permaname)));
		$ch = curl_init ($url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		//print_r(json_decode($res, TRUE));
		curl_close ($ch);
		return !is_null($res)?(json_decode($res, TRUE)):null;
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
