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
 * @subpackage Server
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

 /**  
  * Call Server::Normalize();
  * 
  * after session_start()  
  * Call Server::UnregisterGlobals('_SESSION'); 
  *   
  */
class Server 
{

  /**  
   *  Unregister global variables if server has register_globals on
   * 
   *  UnregisterGlobals('_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
   *  //called after session_start() 
   *  UnregisterGlobals('_SESSION');  
   *  @access public
   *  @static
   */  
  public static function UnregisterGlobals()
  {
    if (!ini_get('register_globals'))
    {
      return false;
    }

    foreach (func_get_args() as $name)
    {
      foreach ($GLOBALS[$name] as $key=>$value)
      {
        if (isset($GLOBALS[$key]))
          unset($GLOBALS[$key]);
      }
    }     
  }
  
  /**  
   *  Undo magic quotes if magic_quotes_gpc enabled
   * 
   *  @access private
   *  @static
   */  
  private static function UndoMagicQuotes()
  {
    if (!ini_get('register_globals')){
      return false;
    }

    foreach (func_get_args() as $name)
    {
      foreach ($GLOBALS[$name] as $key=>$value)
      {
        if (isset($GLOBALS[$key]))
          unset($GLOBALS[$key]);
      }
    }     
  }
  
  
  /**
  * Invokes class functions
  * 
  * @access private
  * @static
  */
  public static function Normalize()
  {
    self::UnregisterGlobals('_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
    self::UndoMagicQuotes();
  }    

}
 
?>