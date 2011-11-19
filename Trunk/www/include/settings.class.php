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
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if ( preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)) ) {
			Settings::setVar('is_mobile', true);
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