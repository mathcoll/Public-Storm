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

final class i18n extends Plugins
{
 	public static $subdirs = array();
 	public static $name = "i18n";
 	
	public function __construct()
	{
		//print "version ".self::$version;
		require(Settings::getVar('prefix') . 'conf/i18n.php');
		self::$subdirs = split(";", Settings::getVar('languages'));
	}
	
	public function langs()
	{
		$ls = split(";", Settings::getVar('languages'));
		$l = array();
		for($i=0; $i<sizeOf($ls); $i++)
		{
			array_push(
				$l,
				array(
					"code" => $ls[$i],
					"name" => gettext($ls[$i])
				)
			);
		}
		return $l;
	}	
	
	public function _($index, $datas=null)
	{
		//print dgettext("*", $index)."<br />";
		//return dgettext("*", $index);
		if ( !isset($datas) ) {
			return gettext($index);
		}
		else {
			return vsprintf(gettext($index), $datas);
		}
	}
	
	public function l($index)
	{
		return self::_($index);
	}
	
	public function setLocale($locale)
	{
		$_SESSION["LANG"] = $locale;
		putenv("LANGUAGE=$locale");
		setlocale(LC_ALL, $locale);
		//print Settings::getVar('ROOT') . 'i18n/';
		bindtextdomain('all', Settings::getVar('ROOT') . 'i18n/');
		textdomain('all');
		
		//print $_COOKIE["locale"]." (i18n/_plugin.php, 56)";
		//print dgettext("admin", "liste_plugins")."<br />";
		//print dgettext("public_storm", "intro_accroche")."<br />";
		return $locale;
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