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
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

/**
 * @package    Public-Storm
 * @subpackage Database
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();

class Database_sqlite extends Database
{	
	public function __construct()
	{
		self::$host = Settings::getVar('DB_HOST');
		self::$username = Settings::getVar('DB_USER');
		self::$password = Settings::getVar('DB_PASS');
		self::$db_name = Settings::getVar('DB_NAME');
		self::$db_prefix = Settings::getVar('DB_PREFIX');
		try
		{
			self::$dbUser = new PDO("sqlite:./datas/users.db");
			if ( !self::$dbUser ) throw new DatabaseException("error");
			self::$dbTB = new PDO("sqlite:./datas/trackbacks.db");
			if ( !self::$dbTB ) throw new DatabaseException("error");
		}
		catch (Exception $e)
		{
			Debug::Log($e, ERROR);
			return false;
		}
		return self::$db;
	}
	
	public static function userLogin( $login, $password_md5 )
	{
		$q = 'SELECT r.role_id as role_id, u.user_id as id, u.uid, u.lang, u.nom, u.prenom, u.email FROM users u, roles r WHERE (u.login = "%s") AND (password="%s") AND (u.role_id = r.role_id)';
		$query = sprintf(
			$q,
			self::escape_string($login),
			self::escape_string($password_md5)
		);
		//print $query;
		$result = self::$dbUser->query($query);
		if ( !$result && DEBUG )
		{
			Debug::Log("Erreur 1".$query, NOTICE);
		}
		else
		{
			while ( $row = $result->fetch() )
			{
				
				$datas['id'] = $row['id'];
				$datas['uid'] = $row['uid'];
				$datas['sessionId'] = $row['sessionId'];
				$datas['prenom'] = $row['prenom'];
				$datas['nom'] = $row['nom'];
				$datas['lang'] = $row['lang'];
				$datas['email'] = $row['email'];
				$datas['isadmin'] = $row['role_id'] == 1 ? 1 : 0;
				$datas['subscription_date'] = $row['subscription_date'];
				return $datas;
			}
		}
	}
	
	public static function authentificationByUid( $uid )
	{
		$q = 'SELECT r.role_id as role_id, u.user_id as id, u.uid, u.lang, u.nom, u.prenom, u.email, u.login FROM users u, roles r WHERE (uid = "%s" AND persistent="1") AND (u.role_id = r.role_id)';
		$query = sprintf(
			$q,
			self::escape_string($uid)
		);
		$result = self::$dbUser->query($query);
		if ( DEBUG )
		{
			Debug::Log("Erreur 2".$query, NOTICE);
			#Debug::Log(print_r(mysql_fetch_assoc($result), 1), NOTICE);
		}
		if ( !$result && DEBUG )
		{
			Debug::Log("Erreur 12".$query, ERROR);
			return false;
		}
		else
		{
			while ( $row = $result->fetch() )
			{
				$datas['id'] = $row['id'];
				$datas['uid'] = $row['uid'];
				$datas['prenom'] = $row['prenom'];
				$datas['login'] = $row['login'];
				$datas['nom'] = $row['nom'];
				$datas['lang'] = $row['lang'];
				$datas['email'] = $row['email'];
				$datas['isadmin'] = $row['role_id'] == 1 ? 1 : 0;
				return $datas;
			}
		}
	}
	
	public static function userAdd( $datas )
	{
		$q = 'INSERT INTO users ( role_id, uid, nom, prenom, email, login, password, lang, subscription_date, updated_date, persistent ) VALUES ("2", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "0")';
		$query = sprintf(
			$q,
			md5(self::escape_string(time())),
			self::escape_string($datas['nom']),
			self::escape_string($datas['prenom']),
			self::escape_string($datas['email']),
			self::escape_string($datas['login']),
			md5(self::escape_string($datas['password'])),
			self::escape_string($datas['lang']),
			self::escape_string(time()),
			self::escape_string(time())
		);
		//print $query;
		if ( DEBUG )
		{
			Debug::Log("Erreur 3".$query, NOTICE);
		}
		return self::$dbUser->query($query);
	}
	
	public static function userUpdateSessionId($login, $password_md5, $persistent=false)
	{
		$persistent = $persistent == true ? 1 : 0;
		$q = 'UPDATE users SET session_id=md5(now()), persistent="%s" WHERE login = "%s" AND password="%s"';
		$query = sprintf(
			$q,
			self::escape_string($persistent),
			self::escape_string($login),
			self::escape_string($password_md5)
		);
		//Debug::Log("no result for request ".$query, ERROR);
		return self::$dbUser->query($query);
	}
	
	public static function setLang($lang, $user_id)
	{
		$q = 'UPDATE users SET lang="%s" WHERE user_id="%s"';
		$query = sprintf(
			$q,
			self::escape_string($lang),
			self::escape_string($user_id)
		);
		//Debug::Log("no result for request ".$query, ERROR);
		return self::$dbUser->query($query);
	}
	
	public static function userUpdate($user_infos)
	{
		$q = 'UPDATE users SET nom="%s", prenom="%s", email="%s", lang="%s", updated_date=%d, password="%s" WHERE login = "%s"';
		$query = sprintf(
			$q,
			self::escape_string($user_infos['nom']),
			self::escape_string($user_infos['prenom']),
			self::escape_string($user_infos['email']),
			self::escape_string($user_infos['lang']),
			self::escape_string(time()),
			self::escape_string($user_infos['password_md5']),
			self::escape_string($user_infos['login'])
		);
		if ( DEBUG )
		{
			Debug::Log("Erreur 4".$query, NOTICE);
		}
		return self::$dbUser->query($query);
	}


	public static function getEmailFromLogin($login)
	{
		$q = 'SELECT email FROM users WHERE login = "%s" LIMIT 1';
		$query = sprintf(
			$q,
			self::escape_string($login)
		);
		if ( $result = self::$dbUser->query($query) )
		{
			while ( $row = $result->fetch() )
			{
				return $row['email'];
			}
		}
		else
		{
			Debug::Log("Erreur 12".$query, ERROR);
		}
	}


	public static function getLoginFromEmail($email)
	{
		$q = 'SELECT login FROM users WHERE email = "%s" LIMIT 1';
		$query = sprintf(
			$q,
			self::escape_string($email)
		);
		if ( $result = self::$dbUser->query($query) )
		{
			while ( $row = $result->fetch() )
			{
				return $row['login'];
			}
		}
		else
		{
			Debug::Log("Erreur 5".$query, ERROR);
		}
	}


	public static function userResetPassword($login)
	{
		$q = 'UPDATE users SET password="%s" WHERE login = "%s"';
		$password = self::generatePassword(8);
		$query = sprintf(
			$q,
			md5(self::escape_string($password)),
			self::escape_string($login)
		);
		if ( DEBUG )
		{
			Debug::Log("Erreur 6".$query, NOTICE);
		}
		self::$dbUser->query($query);
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
		$q = 'SELECT user_id as id FROM users WHERE login = "%s"';
		$query = sprintf(
			$q,
			self::escape_string($login)
		);
		if ( $result = self::$dbUser->query($query) )
		{
			while ( $row = $result->fetch() )
			{
				return $row['id'];
			}
		}
		else
		{
			Debug::Log("Erreur userExists ".$query, ERROR);
		}
	}
	
	public static function getNbUsers()
	{
		$query = 'SELECT count(*) as nb FROM users';
		if ( $result = self::$dbUser->query($query) )
		{
			$row = $result->fetch();
			return $row[0]['nb'];
		}
		else
		{
			Debug::Log("Erreur getNbUsers ".$query, ERROR);
		}
	}
	
	public static function getAllUsers($from=0, $nombre=5)
	{
		$q = 'SELECT u.*, r.role_id as role_id, r.name as role_name FROM users u, roles r WHERE (r.role_id = u.role_id) ORDER BY u.role_id ASC, u.subscription_date DESC LIMIT %d, %d';
		$query = sprintf(
			$q,
			$from,
			$nombre
		);
		//print $query;
		if ( $result = self::$dbUser->query($query) )
		{
			$r = array();
			while ( $row = $result->fetch() )
			{
				array_push($r, $row);
			}
			return $r;
		}
		else
		{
			Debug::Log("Erreur getAllUsers ".$query, ERROR);
		}
	}
	
	public function addTB($tb_title, $tb_url, $tb_excerpt, $tb_author)
	{
		$q = 'INSERT INTO trackbacks (id, url, title, excerpt, author, datetime ) VALUES (NULL, "%s", "%s", "%s", "%s", "%d")';
		$query = sprintf(
			$q,
			self::escape_string($tb_url),
			self::escape_string($tb_title),
			self::escape_string($tb_excerpt),
			self::escape_string($tb_author),
			time()
		);
		//print $query;
		if ( DEBUG )
		{
			Debug::Log("Erreur addTB ".$query, NOTICE);
		}
		if ( self::$dbTB->query($query) )
		{
			return 1;
		}
		else
		{
			return self::$dbTB->errorInfo();
		}
	}
	
	public function getAllTb($limit=5)
	{
		$q = 'SELECT * FROM trackbacks ORDER BY datetime DESC LIMIT 0, %d';
		$query = sprintf(
			$q,
			self::escape_string($limit)
		);
		$result = self::$dbTB->query($query);
		if ( DEBUG )
		{
			Debug::Log($query, NOTICE);
		}
		if ( !$result )
		{
			if ( DEBUG )
			{
				Debug::Log("Erreur getAllTb ".$query, ERROR);
			}
			return false;
		}
		else
		{
			//print $query;
			$r = array();
			while ( $row = $result->fetch() )
			{
				array_push($r, $row);
			}
			return $r;
		}
	}
	
	public static function q( $q, $database, $datas )
	{
		try
		{
			self::$db_custom = new PDO("sqlite:./datas/".$database);
			if ( !self::$db_custom ) throw new DatabaseException("error");
		}
		catch (Exception $e)
		{
			Debug::Log($e, ERROR);
			return false;
		}
		$query = sprintf(
			$q,
			self::escape_string($datas[0])
		);
		//print $query."<br />";
		$result = self::$db_custom->query($query);
		if ( !$result && DEBUG )
		{
			Debug::Log("Erreur q ".$query, NOTICE);
		}
		else
		{
			while ( $row = $result->fetch() )
			{
				$datas[] = $row;
			}
			//print_r($datas);
			return $datas;
		}
	}
	
	public static function q2( $q, $database, $datas )
	{
		try
		{
			self::$db_custom = new PDO("sqlite:./datas/".$database);
			if ( !self::$db_custom ) throw new DatabaseException("error");
		}
		catch (Exception $e)
		{
			Debug::Log($e, ERROR);
			return false;
		}
		//print $q."<br />";
		//print_r($datas);
		$sth = self::$db_custom->prepare($q, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->execute($datas);
		return $sth->fetchAll();		
	}
	
	public static function u( $q, $database, $datas )
	{
		try
		{
			self::$db_custom = new PDO("sqlite:./datas/".$database);
			if ( !self::$db_custom ) throw new DatabaseException("error");
		}
		catch (Exception $e)
		{
			Debug::Log($e, ERROR);
			return false;
		}
		$query = sprintf(
			$q,
			self::escape_string($datas[0])
		);
		//print $query;
		if ( self::$db_custom->query($query) )
		{
			return self::$db_custom->lastInsertId();
		}
		else
		{
			return self::$db_custom->errorInfo();
		}
	}
	
	public static function escape_string($str)
	{
		return mysql_escape_string($str);
	}

	public static function install()
	{
		/* TODO */
		return false;
	}
}
?>
