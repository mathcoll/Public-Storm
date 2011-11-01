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
 * @subpackage Database
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

final class Database_mysql extends Database {	
	public function __construct() {
		self::$host = Settings::getVar('DB_HOST');
		self::$username = Settings::getVar('DB_USER');
		self::$password = Settings::getVar('DB_PASS');
		self::$db_name = Settings::getVar('DB_NAME');
		self::$db_prefix = Settings::getVar('DB_PREFIX');
		try {
			self::$db = mysql_connect( self::$host, self::$username, self::$password );
			mysql_select_db( self::$db_name, self::$db );
			if ( mysql_error() )
				throw new DatabaseException(mysql_error());
			
			//if( !is_object(self::$db) )
			//{
			//	Debug::Log("\$db not an object : ".self::$db, ERROR, __LINE__, __FILE__);
			//}
		} catch (Exception $e) {
			Debug::Log($e, ERROR, __LINE__, __FILE__);
			return false;
		}
		return self::$db;
	}
	
	public static function userLogin( $login, $password_md5 ) {
		$q = 'SELECT user_id as id, uid, lang, nom, prenom, email FROM %susers WHERE login = "%s" AND password="%s"';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($login),
			mysql_real_escape_string($password_md5)
		);
		$result = mysql_query($query, self::$db);
		if ( DEBUG ) {
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
			#Debug::Log(print_r(mysql_fetch_assoc($result), 1), NOTICE, __LINE__, __FILE__);
		}
		if ( !$result && DEBUG ) {
			Debug::Log("no result for request ".$query, ERROR, __LINE__, __FILE__);
			return false;
		} else {
			return mysql_fetch_assoc($result);
		}
	}
	
	public static function authentificationByUid( $uid ) {
		$q = 'SELECT user_id as id, uid, lang, nom, prenom, email FROM %susers WHERE uid = "%s" AND persistent="1"';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($uid)
		);
		$result = mysql_query($query, self::$db);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
			#Debug::Log(print_r(mysql_fetch_assoc($result), 1), NOTICE, __LINE__, __FILE__);
		}
		if ( !$result && DEBUG )
		{
			Debug::Log("no result for request ".$query, ERROR, __LINE__, __FILE__);
			return false;
		}
		else
		{
			return mysql_fetch_assoc($result);
		}
	}
	
	public static function userAdd( $datas )
	{
		$q = 'INSERT INTO %susers ( user_id, uid, nom, prenom, email, login, password, lang, subscription_date, updated_date, persistent ) VALUES (NULL, "%s", "%s", "%s", "%s", "%s", "%s", "%s", now(), now(), "0")';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			md5(mysql_real_escape_string(time())),
			mysql_real_escape_string($datas['nom']),
			mysql_real_escape_string($datas['prenom']),
			mysql_real_escape_string($datas['email']),
			mysql_real_escape_string($datas['login']),
			md5(mysql_real_escape_string($datas['password'])),
			mysql_real_escape_string($datas['lang'])
		);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		return mysql_query($query, self::$db);
	}
	
	public static function userUpdateSessionId($login, $password_md5, $persistent=false)
	{
		$persistent = $persistent == true ? 1 : 0;
		$q = 'UPDATE %susers SET session_id=md5(now()), persistent="%s" WHERE login = "%s" AND password="%s" LIMIT 1';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($persistent),
			mysql_real_escape_string($login),
			mysql_real_escape_string($password_md5)
		);
		//Debug::Log("no result for request ".$query, ERROR, __LINE__, __FILE__);
		return mysql_query($query, self::$db);
	}
	
	public static function userUpdate($user_infos)
	{
		$q = 'UPDATE %susers SET nom="%s", prenom="%s", email="%s", lang="%s", updated_date=now(), password="%s" WHERE login = "%s" LIMIT 1';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($user_infos['nom']),
			mysql_real_escape_string($user_infos['prenom']),
			mysql_real_escape_string($user_infos['email']),
			mysql_real_escape_string($user_infos['lang']),
			mysql_real_escape_string($user_infos['password_md5']),
			mysql_real_escape_string($user_infos['login'])
		);
		//print $query;
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		return mysql_query($query, self::$db);
	}

	public static function getEmailFromLogin($login)
	{
		$q = 'SELECT email FROM %susers WHERE login = "%s" LIMIT 1';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($login)
		);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		$r = mysql_query($query, self::$db);
		$res = mysql_fetch_array($r);
		return $res['email'];
	}

	public static function getLoginFromEmail($email)
	{
		$q = 'SELECT login FROM %susers WHERE email = "%s" LIMIT 1';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($email)
		);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		$r = mysql_query($query, self::$db);
		$res = mysql_fetch_array($r);
		return $res['login'];
	}

	public static function userResetPassword($login)
	{
		$q = 'UPDATE %susers SET password="%s" WHERE login = "%s" LIMIT 1';
		$password = self::generatePassword(8);
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			md5(mysql_real_escape_string($password)),
			mysql_real_escape_string($login)
		);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		mysql_query($query, self::$db);
		return $password;
	}

	public static function generatePassword($nb_car, $chaine='azertyuiopqsdfghjklmwxcvbn0123456789')
	{
		$nb_lettres = strlen($chaine) - 1;
		$generation = '';
		for($i=0; $i < $nb_car; $i++)
		{
			$pos = mt_rand(0, $nb_lettres);
			$car = $chaine[$pos];
			$generation .= $car;
		}
		return $generation;
	}

	public static function userExists( $login )
	{
		$q = 'SELECT user_id as id FROM %susers WHERE login = "%s"';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($login)
		);
		
		$result = mysql_query($query, self::$db);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		if ( !$result && DEBUG )
		{
			Debug::Log("no result for request ".$query, ERROR, __LINE__, __FILE__);
			return false;
		}
		else
		{
			return mysql_fetch_assoc($result);
		}
	}
	
	public function addTB($tb_title, $tb_url, $tb_excerpt, $tb_author)
	{
		$q = 'INSERT INTO %strackbacks (id, url, title, excerpt, author, datetime ) VALUES (NULL, "%s", "%s", "%s", "%s", now())';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($tb_url),
			mysql_real_escape_string($tb_title),
			mysql_real_escape_string($tb_excerpt),
			mysql_real_escape_string($tb_author)
		);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		return mysql_query($query, self::$db);
	}

	public function getAllTb($limit=5)
	{
		$q = 'SELECT * FROM %strackbacks ORDER BY datetime DESC LIMIT 0, %d';
		$query = sprintf(
			$q,
			mysql_real_escape_string(self::$db_prefix),
			mysql_real_escape_string($limit)
		);
		
		$result = mysql_query($query, self::$db);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE, __LINE__, __FILE__);
		}
		if ( !$result && DEBUG )
		{
			Debug::Log("no result for request ".$query, ERROR, __LINE__, __FILE__);
			return false;
		}
		else
		{
			//print $query;
			$r = array();
			while ($row = mysql_fetch_assoc($result))
			{
				$row['datetime'] = date("l j F Y", strtotime($row['datetime']));
				array_push($r, $row);
			}
			return $r;
		}
	}

	public static function install()
	{
		/* TODO */
		return false;
	}
}
?>
