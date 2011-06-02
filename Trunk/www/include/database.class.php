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


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();

abstract class Database
{
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

	public function __construct()
	{
	}
	public static function userLogin( $login, $password_md5 )
	{
	}
	public static function userUpdateSessionId($login, $password_md5)
	{
	}
	public static function userUpdate($user_infos)
	{
	}
	public static function q( $query, $database, $datas )
	{
	}
	public static function install()
	{
	}
}
?>
