<?php
/*
    Public-Storm
    Copyright (C) 2008-2010 Mathieu Lory <mathieu@internetcollaboratif.info>
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

final class admin extends Plugins
{
	public static $adminMenu = array();
 	public static $subdirs = array('admin');
 	public static $name = "admin";
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/admin.php');
		if( $_SESSION['isadmin'] == 1 )
		{
			Settings::addCss('screen', Settings::getVar('ROOT').Settings::getVar('theme_dir').'plugins/admin/styles/admin.css', 'admin.css');
		}
	}
	
	public function initAdminMenu()
	{
		return true;
	}
	
	public static function getAllUsers($from=0, $nombre=5)
	{
		return self::$db->getAllUsers($from, $nombre);
	}
	
	public function addAdminMenu($menu)
	{
		array_push(self::$adminMenu, $menu);
		return self::$adminMenu;
	}
	
	public function getAdminMenu()
	{
		return self::$adminMenu;
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
	
	public function activer()
	{
	}
	
	public function desactiver()
	{
	}
}


?>