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
 * @subpackage viewerSmarty
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();
final class viewer_smarty extends Viewer
{
	private static $template;
	public static $smarty;
  
	public function __construct()
	{
		require_once( Settings::getVar('SMARTY_DIR') . 'Smarty.class.php' );
		require_once( Settings::getVar('SMARTY_DIR') . 'Smarty-gettext.php' );
		self::$smarty = new Smarty;
		self::$smarty->register_block('t', 'smarty_translate');
		if ( Settings::getVar('compress html output') )
		{
			self::$smarty->load_filter('output','trimwhitespace');
			self::$smarty->load_filter('output','compressor');
		}
		self::$smarty->compile_check = true;
		self::$smarty->debugging = false;
	}

	public static function AddData($data_name, $data)
	{
		$data_name = strtolower($data_name);
		//self::$data_items[$data_name] = $data;
		self::$smarty->assign($data_name, $data);
	}
	
	public static function UseTemplate($filename, $subdir="")
	{
      $path = Settings::getVar('page_templates_path');
      if ( isset($subdir) )
      {
      	$path .= $subdir;
      }
      $path_c = Settings::getVar('page_templates_path_c');
		self::$smarty->template_dir = $path;
		self::$smarty->compile_dir = $path_c;
		self::$template = $filename; 
	}
	
	public static function fetch($template="", $subdir="")
	{
      $path = Settings::getVar('page_templates_path');
      if ( isset($subdir) )
      {
      	$path .= $subdir;
      }
      $path_c = Settings::getVar('page_templates_path_c');
  		//print $path.$filename;
		self::$smarty->template_dir = $path;
		self::$smarty->compile_dir = $path_c;
		return self::$smarty->fetch($template);
	}
	
	public static function Show($template="", $subdir="")
	{
      $path = Settings::getVar('page_templates_path');
      //print $path;
      if ( isset($subdir) )
      {
      	$path .= $subdir;
      }
      $path_c = Settings::getVar('page_templates_path_c');
  		//print $path.$filename;
		self::$smarty->template_dir = $path;
		self::$smarty->compile_dir = $path_c;
		self::$smarty->display($template);
	}
	
  public static function RequestError()
  {
    Viewer::AddData("title","Error");
    Viewer::AddData("errorDescription","Error.......");
    Viewer::UsePublic-Storm("request_error.tpl");
  }
  
  public static function Restricted()
  {
    Viewer::AddData("title","Restricted");
    Viewer::UsePublic-Storm("unregistered.tpl");
  }
}
?>