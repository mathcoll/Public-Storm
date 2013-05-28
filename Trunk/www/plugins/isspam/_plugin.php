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

final class isspam extends Plugins
{
 	public static $subdirs = array('isspam');
 	public static $name = "isspam";
 	public static $db;
 	
	public function __construct()
	{
		if ( !class_exists(Settings::$DB_TYPE) )
		{
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR, __LINE__, __FILE__);
		}
		else
		{
			if ( self::$db = new Settings::$DB_TYPE)
			{
				self::$db = new PDO("sqlite:./datas/beerain_spam.db");
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
	
	public function markAsSpam($word_id)
	{
		$q = 'INSERT INTO bee_spam (by_user_id, word_id) VALUES ("%s", "%d");';
		$query = sprintf(
			$q,
			self::escape_string($_SESSION['uid']),
			self::escape_string($word_id)
			
		);
		//print $query."<br />";
		$result = self::$db->query($query);
		if ( !$result ) die ("Erreur 1 ".$query);
		return $result;
	}
	
	public static function escape_string($str)
	{
		return mysql_escape_string($str);
	}
}


?>