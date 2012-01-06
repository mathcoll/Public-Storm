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
		
final class prelaunch extends Plugins
{
 	public static $subdirs = array(
 		'prelaunch',
 	);
 	public static $name = "prelaunch";
	public static $db;
 	
	public function __construct()
	{
		$s = new Settings::$VIEWER_TYPE;
		require(Settings::getVar('prefix') . 'conf/prelaunch.php');
		Settings::addCss('screen', Settings::getVar('theme_dir').'plugins/prelaunch/styles/prelaunch.css', 'screen.css');
		$s->AddData("storm", $storm);
		#$s->AddData("i18n", i18n::getLng());
		$s->AddData("site_name", Settings::getVar('SITE_NAME'));
		$s->AddData("site_description", Settings::getVar('SITE_DESCRIPTION'));
		$s->AddData("site_baseline", i18n::_("baseline"));
		$s->AddData("version", Settings::getVar('SITE_VERSION'));
		$s->AddData("prefix", Settings::getVar('prefix'));
		$s->AddData("base_url", Settings::getVar('base_url_http'));
		$s->AddData("theme_dir", Settings::getVar('theme_dir'));
		
		if ( !class_exists(Settings::$DB_TYPE) )
		{
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR, __LINE__, __FILE__);
		}
		else
		{
			if ( !self::$db = new Settings::$DB_TYPE )
			{
				Debug::Log($err, ERROR, __LINE__, __FILE__);
				return false;
				exit($err);
			}
		}
		
		if( isset($_COOKIE["betaUserName"]) || isset($_SESSION["betaUserName"]) ) return true; //exit prelaunch plugin
		else
		{
			if( $_GET["utm_campaign"] == "beta" )
			{
				if ( !session_id() ) session_start();
				$betaUserName = $_GET["utm_term"];
				$_COOKIE["betaUserName"] = isset($betaUserName) ? $betaUserName : "";
				if( isset($_COOKIE["betaUserName"]) )
				{
					$end = time() + 3600 * 24 * 15;/* expire dans 15 jours */
					setcookie("betaUserName", $betaUserName, $end );
					$_SESSION["betaUserName"] = $_COOKIE["betaUserName"];
					//print "setcookie ok : ".$_COOKIE["beta"];
				}
				
				print $s->fetch("waiting.tpl", "plugins/prelaunch");
				exit;
			}
		}
		
		/*  */
		if ( $_POST['email'] && self::$db )
		{
			self::$db->u("INSERT into prelaunch (email, date, referrer) VALUES ('%s', '".time()."', '".$_SERVER['HTTP_REFERER']."')", "prelaunch.db", array($_POST['email']));
			$s->AddData("message", i18n::_("Votre email à été correctement ajouté. Nous vous remercions."));
		}
		
		print $s->fetch("prelaunch.tpl", "plugins/prelaunch");
		exit;
	}
	
	public static function getNbPrelaunchUsers()
	{
		$count = self::$db->q("SELECT count(*) as nb FROM prelaunch", "prelaunch.db", array());
		return $count[0]['nb'];
	}
	
	public static function getAllPrelaunchUsers($from=0, $nombre=5)
	{
		return self::$db->q2("SELECT email, date, referrer FROM prelaunch ORDER BY date DESC LIMIT :from, :nombre", "prelaunch.db", array(':from' => $from, ':nombre' => $nombre));
	}
	
	public function initAdminMenu()
	{
		admin::addAdminMenu(array(i18n::L("prelaunch_beta_users"), "prelaunch-list-users/", "prelaunch_users"));
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
	
	public function activer()
	{
	}
	
	public function desactiver()
	{
	}
}


?>