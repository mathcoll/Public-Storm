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
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

/**
 * @package    Public-Storm
 * @subpackage Database
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

abstract class Database {
	public static $host;
	public static $username;
	public static $password;
	public static $db_name;
	public static $db_prefix;
	public static $db;
	public static $dbUser;
	public static $dbTB;
	public static $Settings;
	public static $db_custom;

	public function __construct(){}
	
	/**
	 * Log a user if its login & password are goods ones
	 * @param string $login
	 * @param string $password_md5
	 * @return boolean
	 */
	public static function userLogin( $login, $password_md5 ){}
	
	/**
	 * Log a user with its cookie Uid
	 * @param string $uid
	 * @return boolean
	 */
	public static function authentificationByUid( $uid ) {}
	
	/**
	 * Add a new user to DataBase
	 * @param array $datas
	 */
	public static function userAdd( $datas ) {}
	
	/**
	 * Update a user session ID
	 * @param string $login
	 * @param string $password_md5
	 * @param boolean $persistent
	 */
	public static function userUpdateSessionId($login, $password_md5, $persistent=false) {}
	
	/**
	 * Update a users informations datas
	 * @param array $user_infos
	 */
	public static function userUpdate($user_infos) {}

	/**
	 * Return the email of one user from its login
	 * @param string $login
	 * @return string
	 */
	public static function getEmailFromLogin($login) {}

	/**
	 * Return the login of one user from its email
	 * @param string $email
	 * @return string
	 */
	public static function getLoginFromEmail($email) {}

	/**
	 * reset a new password for a user
	 * @param string $login loginName of the user who wants to reset its password
	 * @return string
	 */
	public static function userResetPassword($login) {}

	/**
	 * Compute a new random password
	 * @param string $nb_car number of characters for the passwrod
	 * @param string $chaine string of each chars to be used in the passwords
	 * @return string the new password string
	 */
	public static function generatePassword($nb_car, $chaine='azertyuiopqsdfghjklmwxcvbn0123456789') {}
	
	/**
	 * Test if a user exists or not
	 * @param string $login the login to test
	 * @return boolean
	 */
	public static function userExists( $login ) {}
	
	/**
	 * Add a new TrackBack to DataBase
	 * @param string $tb_title Title of the TrackBack
	 * @param string $tb_url Url of the TrackBack
	 * @param string $tb_excerpt summary of the TrackBack
	 * @param string $tb_author Author name of the TrackBack
	 */
	public function addTB($tb_title, $tb_url, $tb_excerpt, $tb_author) {}
	
	/**
	 * Get all TrackBacks from DataBase
	 * @param string $limit the number of max TrackBacks to get from DataBase  
	 * @return array
	 */
	public function getAllTb($limit=5) {}
	
	public static function install() {}
	
	public static function escape_string($str) {
		return mysql_escape_string($str);
	}
}
?>
