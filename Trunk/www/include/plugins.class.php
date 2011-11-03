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

/**
 * @package    Public-Storm
 * @subpackage Plugins
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

class Plugins
{
	public static $activatedPlugins = array();
	public static $loadedPlugins = array();
	public static $db;
 	public static $version;
 	public static $name;
 	public static $description;
 	public static $author;
 	public static $icon;
	
	public function __construct()
	{
		if ( !class_exists(Settings::$DB_TYPE) )
		{
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR, __LINE__, __FILE__);
		}
		else
		{
			if ( self::$db = new Settings::$DB_TYPE )
			{
				return true;
			}
			else
			{
				Debug::Log($err, ERROR, __LINE__, __FILE__);
				return false;
				exit($err);
			}
		}
	}

	/**
	 * Add items in the admin menu
	 * @return boolean
	 */
	public function initAdminMenu() {
		admin::addAdminMenu(array(i18n::L("Menu link"), "pluginName/file.php", "identifier"));
		return true;
	}
	/**
	 * Retrieve the status information of a plugin
	 * @param string $pluginName The name of the plugin to check
	 * @return boolean
	 */
	public static function isActive($pluginName)
	{
		$res = self::$db->q('SELECT status FROM plugins WHERE name="%s"', 'plugins.db', array($pluginName));
		//print_r($res);
		//print $pluginName." ".$res['status']."<br />";
		self::$activatedPlugins[$pluginName] = $res[1]['status'];
		return self::$activatedPlugins[$pluginName];
	}
	
	/**
	 * Get a list of all available plugins from Database
	 * @return array
	 */
	public static function listPlugins()
	{
		$res = self::$db->q('SELECT name FROM plugins ORDER BY sort ASC', 'plugins.db', array());
		$p = array();
		foreach($res as $plugin)
		{
			if ( isset($plugin['name']) ) {array_push($p, $plugin['name']);}
		}
		//print_r($p);
		return $p;
		//return file::GetDirs(Settings::getVar('plug_dir'));
	}
	
	/**
	 * Retrieve all the available datas from all plugins
	 * @return array
	 */
	public static function listAllDatasPlugins()
	{
		$res = self::$db->q('SELECT * FROM plugins ORDER BY name ASC', 'plugins.db', array());
		$p = array();
		foreach($res as $plugin)
		{
			$pluginName = $plugin['name'];
			self::$activatedPlugins[$pluginName] = $plugin['status'];
			$plugin[] = $plugin['status'];
			
			$icon = self::getIcon($plugin['name']);
			$plugin['icon'] = $icon;
			$plugin[] = $icon;
			
			$author = preg_match("/(.*?) <(.*?)>/", $plugin['author'], $auth);
			$plugin['author_name'] = $auth[1];
			$plugin[] = $plugin['author_name'];
			$plugin['author_email'] = $auth[2];
			$plugin[] = $plugin['author_email'];
			
			array_push($p, $plugin);
		}
		//print_r($p);
		return $p;
	}
	
	/**
	 * Load a plugin into the script memory : play the __construct method and manage the urls of such plugin
	 * @param string $pluginName The name of the plugin to load
	 * @return false|string plugin name
	 */
	public static function LoadPlugin($pluginName)
	{
		array_push(self::$loadedPlugins, $pluginName);
		$f = new File(Settings::getVar('plug_dir') . strtolower($pluginName) . '/_plugin.php');
		if ( $f->Exists() )
		{
			require(Settings::getVar('plug_dir') . strtolower($pluginName) . '/_plugin.php');
			if( DEBUG )
			{
				Debug::Log('Plugin "' . strtolower($pluginName) . '" is activated', NOTICE, __LINE__, __FILE__);
			}
		}
		else
		{
			if( DEBUG )
			{
				Debug::Log(Settings::getVar('plug_dir') . strtolower($pluginName) . '/_plugin.php' . " doesn't exists", NOTICE, __LINE__, __FILE__);
			}
			return false;
		}
		
		if ( $p = new $pluginName )
		{
			/* register subdirs from plugin */
			$subdirs = $p->getSubDirs();
			if ( is_array($subdirs) )
			{
				foreach ( $subdirs as $dir )
				{
					if ( $registred = Settings::registerSubdir($dir, $pluginName) )
					{
						//print_r($registred);
						Debug::Log('Folder "' . $dir . '" is registered by "' . $pluginName . '"' , NOTICE, __LINE__, __FILE__);
					}
				}
			}
			return $p;
		}
	}
	
	/**
	 * Get a list of all the php scripts pages available for a plugin
	 * @param string $pluginName The name of the plugin
	 * @return array
	 */
	public function listPages($pluginName)
	{
		$liste = array();
		foreach ( scandir(Settings::getVar('plug_dir') . '/' . strtolower($pluginName) . '/') as $node )
		{
			if ( ereg('.*\.php$', $node) && $node != strtolower($pluginName).'.php' )
			{
				//$liste .= '<li><a href="'.$node.'">'.$node.'</a></li>';
				array_push($liste, $node);
			}
		}
		return $liste;
	}
	
	/**
	 * Disable a plugin from he entire application (Admin option)
	 * @param string $pluginName The name of the plugin
	 */
	public static function deActivatePlugin($pluginName)
	{
		Debug::Log($pluginName . " is disabled", NOTICE, __LINE__, __FILE__);
		self::$db->u('UPDATE plugins SET status="0" WHERE name="%s"', 'plugins.db', array($pluginName));
		self::$activatedPlugins[$pluginName] = 0;
		//self::$activatedPlugins
	}
	
	/**
	 * Enable a plugin from he entire application (Admin option)
	 * @param string $pluginName The name of the plugin
	 */
	public static function activatePlugin($pluginName)
	{
		Debug::Log($pluginName . " is enabled", NOTICE, __LINE__, __FILE__);
		self::$db->u('UPDATE plugins SET status="1" WHERE name="%s"', 'plugins.db', array($pluginName));
		self::$activatedPlugins[$pluginName] = 1;
		//self::$activatedPlugins
	}
	
	/**
	 * Get informations about a plugin
	 * @param string $pluginName The name of the plugin
	 * @return array
	 */
	public static function pluginGetInfos($pluginName)
	{
		if ( in_array($pluginName, self::$activatedPlugins) )
		{
			$p = new $pluginName;
			return array(
				'name' => $p->getName(),
				'version' => $p->getVersion(),
				'author' => $p->getAuthor(),
				'description' => $p->getDescription(),
				'isActive' => $p->isActive($pluginName),
				'icon' => $p->getIcon($pluginName),
			);
		}
		else
		{
			return 'plugin "' . $pluginName . '" not activated !';
		}
	}
	
	/**
	 * Get the full path of the plugin icon
	 * @param string $pluginName The name of the plugin
	 * @return string
	 */
	public function getIcon($name)
	{
		//$file = Settings::getVar('theme_dir') . 'plugins/' . strtolower($name) . '/img/icon.png';
		$file = Settings::getVar('plug_path') . strtolower($name) . '/img/icon.png';
		//print $file."<br />";
		$icon = new File($file);
		if ( $icon->Exists() )
		{
			self::$icon = Settings::getVar('theme_dir') . 'plugins/' . strtolower($name) . '/img/icon.png';;
			return self::$icon;
		}
	}
	
	/**
	 * Alias of isActive
	 * @param string $pluginName The name of the plugin
	 * @return boolean
	 */
	public function getStatus($pluginName)
	{
		return self::isActive($pluginName);
	}
	
	/**
	 * Return the name of the current plugin
	 * @return string
	 */
	public function getName()
	{
		return self::$name;
	}
	
	/**
	 * Return the version of the current plugin
	 * @return float
	 */
	public function getVersion()
	{
		return self::$version;
	}
	
	
	/**
	 * Return the description of the current plugin
	 * @return string
	 */
	public function getDescription()
	{
		return self::$description;
	}
	
	
	/**
	 * Return the author of the current plugin
	 * @return string
	 */
	public function getAuthor()
	{
		return self::$author;
	}
}

?>