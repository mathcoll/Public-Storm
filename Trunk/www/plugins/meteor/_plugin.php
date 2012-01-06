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
		
final class meteor extends Plugins
{
 	public static $subdirs = array('meteor');
 	public static $name = "meteor";
	public static $s;
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/'.self::$name.'.php');
		//require_once('./plugins/'.self::$name.'/classes/'.self::$name.'.php');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/styles/'.self::$name.'.css', 'screen.css');
		if( @$_SESSION['isadmin'] == 1 )
		{
			Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/styles/admin.css', 'admin.css');
		}
		//Settings::addJs('text/javascript', 'http://meteor.internetcollaboratif.info/meteor.js', 'none.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/'.self::$name.'/scripts/'.self::$name.'.js', 'all.js');
	}
	
	public function initAdminMenu()
	{
		admin::addAdminMenu(array(i18n::L("Meteor LISTCHANNELS"), self::$name."/LISTCHANNELS", "meteor1"));
		admin::addAdminMenu(array(i18n::L("Meteor SHOWSTATS"), self::$name."/SHOWSTATS", "meteor2"));
		admin::addAdminMenu(array(i18n::L("Meteor COUNTSUBSCRIBERS"), self::$name."/COUNTSUBSCRIBERS", "meteor3", ""));
		return true;
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
