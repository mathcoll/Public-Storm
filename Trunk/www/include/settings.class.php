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
 * @subpackage Settings
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */

if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

final class Settings
{
	public static $VIEWER_TYPE = "";
	public static $DB_TYPE = "";
	public static $subdirsRegistered = array();
	public static $vars = array();
	public static $customizable = array();
	public static $customizableType = array();
	public static $customizableDesc = array();

	public function __construct() {
		self::$VIEWER_TYPE = VIEWER_TYPE;
		self::$DB_TYPE = DB_TYPE;
	}
	
	public function getSubdirsRegistered() {
		return self::$subdirsRegistered;
	}
	
	/**
	 * Add one Css file to the stack
	 * @param string $media
	 * @param string $stylesheet path to the css file
	 * @param string $groupe
	 * @return array
	 */
	public static function addCss($media="screen", $stylesheet, $groupe='screen.css') {
		$styles = self::getVar('styles');
		if ( preg_match('/\b(\/MIDP|Mobile|IEMobile|Fennec|Opera Mini|Opera Mobi)\b/i', $_SERVER['HTTP_USER_AGENT']) ) {
			Settings::setVar('listeCss-handheld', true);
			if ( $media == "handheld" || $media == "screenToForce" ) {
				if ( $media == "screenToForce" ) {
					$media = "screen";
				}
				self::setVar('listeCss-handheld', true);
				Debug::Log($media." stylesheet enabled:".$stylesheet, NOTICE, __LINE__, __FILE__);
				array_push($styles, array('media' => $media, 'stylesheet' => $stylesheet, 'file' => $groupe));
			}
		} else {
			Settings::setVar('listeCss-handheld', false);
			if ( $media != "handheld" ) {
				self::setVar('listeCss-'.$media, true);
				Debug::Log($media." stylesheet enabled:".$stylesheet, NOTICE, __LINE__, __FILE__);
				array_push($styles, array('media' => $media, 'stylesheet' => $stylesheet, 'file' => $groupe));
			}
		}
		//print $stylesheet."<br />";
		//print_r($styles);
		return self::setVar('styles', $styles);
	}
	
	public static function addJs($type="text/javascript", $javascript, $file='all.js') {
		$javascripts = self::getVar('javascripts');
		$javascripts[] = array('type' => $type, 'javascript' => $javascript, 'file' => $file);
		//print "ADDING (".$type." = ".$file.") ".$javascript."\n";
		return self::setVar('javascripts', $javascripts);
	}
	
	public static function removeCss($css) {
		$styles = self::getVar('styles');
		//print_r($styles);
		$styles = filter_by_value($styles, 'stylesheet', $css);
		return self::setVar('styles', $styles);
	}
	
	public static function removeJs($js) {
		$javascripts = self::getVar('javascripts');
		//print_r($javascripts);
		$javascripts = filter_by_value($javascripts, 'javascript', $js);
		//print_r($javascripts);
		return self::setVar('javascripts', $javascripts);
	}
	
	public function getVar($varName) {
		//print_r(self::$vars);
		if ( $varName && isset(self::$vars[strToLower($varName)]) ) {
			//print $varName." -> ".strToLower($varName)." -> ".self::$vars[strToLower($varName)]."<br />";
			try {
				return isset(self::$vars[strToLower($varName)])?self::$vars[strToLower($varName)]:null;
			} catch(Exception $exception) {
				Debug::Log("Variable non définie : ".strToLower($varName), "WARNING", __LINE__, __FILE__);
			}
		} else {
			Debug::Log("Variable non définie : ".strToLower($varName), "WARNING", __LINE__, __FILE__);
			return false;
		}
	}
	
	public function getJss($filter='text/javascript', $isCleanable=true) {
		#TODO : return only for filters and cleanable boolean filter
		return self::getVar('javascripts');
	}
	
	public function getCsss($filter='screen', $isCleanable=true) {
		$return = array();
		foreach ( self::getVar('styles') as $style) {
			if ( $style['media'] == $filter ) {
				//print "-->".$style['media']."==".$filter."<br />\n\r";
				array_push($return, $style);
			}
		}
		return $return;
	}
	
	/**
	 * Define a new variable for the script
	 * @param string $varName the name of the variable
	 * @param multitype $value the value of the variable
	 * @param string $type the group containing the variable
	 * @param string $desc the text that describe the new variable
	 * @return multitype
	 */
	public function setVar($varName, $value, $type="general", $desc="")
	{
		if ( @isset($varName) && @isset($value) ) {
			self::$vars[strToLower($varName)] = $value;
			if( @isset($desc) && $desc != "" )
			{
				self::$customizable[]=$varName;
				self::$customizableType[$varName]=$type;
				self::$customizableDesc[$varName]=$desc;
			}
			return self::$vars[strToLower($varName)];
		}
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