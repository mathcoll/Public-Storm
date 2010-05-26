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
 * @subpackage Session
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();


final class Session
{
  public static function Start()
  {
    if ( !session_id() ) session_start();
    Server::UnregisterGlobals('_SESSION');
    if (empty($_SESSION["user_id"]))
    {
		return User::GetById(0);
    }
    else
    {
		return User::GetById($_SESSION["user_id"]);
    }
  }

  public static function StartUser($obj)
  {
    if ( !session_id() ) session_start();
    Server::UnregisterGlobals('_SESSION');
    $_SESSION["user_id"]=$obj->user_id;
    
    return $obj;
  }
}
?>