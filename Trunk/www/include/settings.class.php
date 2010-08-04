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
 * @subpackage Settings
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die();

final class Settings
{
	public static $VIEWER_TYPE = VIEWER_TYPE;
	public static $DB_TYPE = DB_TYPE;
	public static $subdirsRegistered = array();
	public static $vars = array();
	public static $customizable = array();
	public static $customizableType = array();
	public static $customizableDesc = array();
	
	public function getSubdirsRegistered()
	{
		return self::$subdirsRegistered;
	}
	
	public static function addCss($media="screen", $stylesheet, $file='all.css')
	{
		$styles = self::getVar('styles');
		$styles[] = array('media' => $media, 'stylesheet' => $stylesheet, 'file' => $file);
		return self::setVar('styles', $styles);
	}
	
	public static function addJs($type="text/javascript", $javascript)
	{
		$javascripts = self::getVar('javascripts');
		$javascripts[] = array('type' => $type, 'javascript' => $javascript);
		return self::setVar('javascripts', $javascripts);
	}
	
	public static function removeCss($css)
	{
		$styles = self::getVar('styles');
		//print_r($styles);
		$styles = filter_by_value($styles, 'stylesheet', $css);
		//print_r($styles);
		return self::setVar('styles', $styles);
	}
	
	public static function removeJs($js)
	{
		$javascripts = self::getVar('javascripts');
		//print_r($javascripts);
		$javascripts = filter_by_value($javascripts, 'javascript', $js);
		//print_r($javascripts);
		return self::setVar('javascripts', $javascripts);
	}
	
	public function getVar($varName)
	{
		//print_r(self::$vars);
		return self::$vars[strToLower($varName)];
	}
	
	public function getJss($filter='text/javascript', $isCleanable=true)
	{
		#TODO : return only for filters and cleanable boolean filter
		return self::getVar('javascripts');
	}
	
	public function getCsss($filter='screen', $isCleanable=true)
	{
		#TODO : return only for filters and cleanable boolean filter
		return self::getVar('styles');
	}
	
	public function setVar($varName, $value, $type="general", $desc="")
	{
		self::$vars[strToLower($varName)] = $value;
		if( isset($desc) && $desc != "" )
		{
			self::$customizable[]=$varName;
			self::$customizableType[$varName]=$type;
			self::$customizableDesc[$varName]=$desc;
		}
		return self::$vars[$varName];
	}
	
	public function getCustomizable()
	{
		return self::$customizable;
	}
	
	public function getCustomizableDesc($val)
	{
		return self::$customizableDesc[$val];
	}
	
	public function getCustomizableType($val)
	{
		return self::$customizableType[$val];
	}
	
	public function registerSubdir($dir=NULL, $pluginName=NULL)
	{
		if ( $dir != NULL ) self::$subdirsRegistered[$pluginName][] = $dir;
		//$d = array($pluginName => $dir);
		//if ( $dir != NULL ) array_push(self::$subdirsRegistered, $d);
		return self::$subdirsRegistered;
	}
}
?>