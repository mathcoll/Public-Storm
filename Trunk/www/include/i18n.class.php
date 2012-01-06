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
 * @subpackage i18n
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

#TODO : remove this deprecated class
class I18n_OLD
{
	private static $language;
	private static $name;
	private static $code;
	public static $listLanguages;

 
  
  public function getLng()
  {
	$i18n = Array();
	foreach( self::$language as $k => $v )
	{
		$i18n[$k] = self::L($k);
	}
  	return $i18n;
  }
  
  public function getLang()
  {
  	return self::getLng;
  }
  
  public function setLng($l)
  {
	  self::$language = $l;
  	return self::$language;
  }
	
	public function _($key, $array=NULL)
	{
		return self::L($key, $array);
	}
	/**
	 * get the language string $key
	 * return string
	 */
	public function L($key, $array=NULL)
	{
		//print_r(self::$language);
		if (empty($key))
		{
			if(DEBUG)
			{
				Debug::Log("Key undefined", WARNING, __LINE__, __FILE__);
			}
			return "[[$key]]";
		}
		
		//print $numargs;
		if (isset(self::$language[$key]) && !is_array($array))
		{
			return self::$language[$key];
		}
		else if (isset(self::$language[$key]) && is_array($array))
		{
			return vsprintf(self::$language[$key], $array);
		}
		else
		{
			if(DEBUG)
			{
				Debug::Log("Key '".$key."' need to be translated into ".$_SESSION["LANG"], WARNING, __LINE__, __FILE__);
			}
			return "[[$key]]";
		}
	}

	public static function getName()
	{
		return self::$name;
	}

	public static function getCode()
	{
		return self::$code;
	}

	public static function load($lang=NULL)
	{
		$_SESSION["LANG"] = isset($_SESSION["LANG"]) ? $_SESSION["LANG"] : 'fr';
		$ln = $lang ? $lang : $_SESSION["LANG"];
		$file = Settings::getVar('inc_dir') . "langs/".$ln.".php";
		//print $file;
		if (is_readable($file)) {
			require($file);
			Debug::Log("Language '".$ln."' is loaded, file : '".$file."'", NOTICE, __LINE__, __FILE__);
		}
		elseif (is_readable(substr($file, 1))) /* TODO ! c'est pas propre ! */
		{
			require(substr($file, 1));
		}
		elseif (is_readable(".".$file)) /* TODO ! c'est pas propre ! */
		{
			require(".".$file);
		}
		else
		{
			require(Settings::getVar('inc_dir') . "langs/fr.php"); /* default system language */
		}
		#print_r($lang);
		self::$language = $lang;
		self::$name = $name;
		self::$code = $code;
		if( DEBUG )
		{
			Debug::Log("Language '".$ln."' is loaded, file : '".$file."'", NOTICE, __LINE__, __FILE__);
			Debug::Log("'Login' in ".$ln." = ".self::L('Login'), NOTICE, __LINE__, __FILE__);
		}
	}
	
	public static function setLang($lang)
	{
		self::load($lang);
		$_SESSION["LANG"] = $lang;
		return $lang;
	}
}
?>
