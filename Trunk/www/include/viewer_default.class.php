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
 * @subpackage Viewer
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();


final class Viewer_default extends Viewer
{

  private static $data_items=array();
  private static $template;


  public static function AddData($data_name,$data)
  {
    self::$data_items[strtolower($data_name)] = $data;
  }

  /**
   * 
   * @static
   * @return mixed|false
   */
  public static function Value($data_name)
  {
    try
    {
      if (!array_key_exists(strtolower($data_name),self::$data_items))
         throw new ViewerException("value of data element is empty or not exist");
    }
    catch (Exception $e)
    {
      Debug::Log($e,WARNING);
      return false;
    }
    return self::$data_items[strtolower($data_name)];
  }

  /**
   * 
   * @static
   * 
   */
  public static function UseTemplate($filename)
  {
    self::$template = $filename; 
  }

  /**
   * 
   * @static
   * @return bool
   * @todo Changed by Pedro Alves
   */
   public static function CheckTemplate($filename="")
   {                     
      try
      {
         if (empty($filename))
         {
            $objTemplate   =  new file(Settings::getVar('page_templates_path').self::$template);
            return $objTemplate->Exists();
         }
         else
         {
            $objTemplate   =  new file(Settings::getVar('page_templates_path').$filename);
            return $objTemplate->Exists();

         }
      }
      catch (Exception $e)
      {
         Debug::Log($e,ERROR);
         return false;
      }
      return true;
   }

  /**
   * 
   * @static
   * @return bool
   */
  public static function Show($method=1)
  {
    try
    {
      if (!self::CheckTemplate())
         throw new ViewerException("can't parse template") ;
      
      $path = Settings::getVar('page_templates_path').self::$template;
      
      if ( $method == 1 ) include ($path);
      else
      {
      	return "include('$path');";
      	//$f = new file($path);
      	//return $f->Read();
      }
    }
    catch (Exception $e)
    {
      Debug::Log($e,ERROR);
      return false;
    }
    return true;
  }


  /**
   * 
   * @static
   */
  public static function RequestError()
  {
    Viewer::AddData("title","Error");
    Viewer::AddData("errorDescription","Error.......");
    Viewer::UseTemplate("request_error.tpl");
  }



  /**
   * 
   * @static
   */
  public static function Restricted()
  {
    Viewer::AddData("title","Restricted");
    Viewer::UseTemplate("unregistered.tpl");
  }
}
?>