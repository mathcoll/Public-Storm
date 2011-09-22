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
 */

final class tagcloud extends Plugins
{
 	public static $subdirs = array('tagcloud');
 	public static $name = "tagcloud";
 	public static $cloud;
 	public static $words = array();
 	
	public function __construct()
	{
		//require(Settings::getVar('prefix') . 'conf/tagcloud.php');
		require_once("./plugins/tagcloud/classes/wordcloud.class.php");
		//Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/tagcloud/styles/wordcloud.css');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/tagcloud/styles/wordcloud.css', 'all.css');
		self::$cloud = new wordCloud(self::$words);
		//print "version ".self::$version;
	}
	
	public function showCloud($displaySuggestion=false)
	{
		$myCloud = self::$cloud->showCloud("array");
		$c = "";
		//print_r(self::$cloud);
		//print_r($myCloud);
		foreach ($myCloud as $key => $value) {
			if ( $displaySuggestion == true ) {
				$js = "suggest_too('".addslashes($value['word']) . "', '".Settings::getVar('BASE_URL')."')";
				$s = '<span class="suggest-too" title="'._('Je suggère moi aussi !').'"><input type="button" value="+" onclick="'.$js.'"/></span>';
			} else { $s = ""; }
			$c .= ' <span class="nobr"><a href="'.Settings::getVar('BASE_URL_HTTP').'/storm/'.modifier_url($value['word']).'/" class="word size'.$value['sizeRange'].'" title="'.$value['word'].' : '.$value['sizeRange'].' suggest.">'.$value['word'].'</a>'.$s.'&nbsp;</span>';
		}
		return $c;
	}
	
	public function addWord($word, $value)
	{
		//print_r(self::getWords());
		return self::$cloud->addWord($word, $value);
	}
	
	public function getWords()
	{
		return self::$words;
	}
	
	public function loadLang()
	{
		return parent::loadLang(self::$name);
	}
	
	public function getVersion()
	{
		return parent::getVersion();
	}
	
	public function getName()
	{
		return self::$name;
	}
	
	public function getDescription()
	{
		return parent::getDescription();
	}
	
	public function getAuthor()
	{
		return self::getAuthor();
	}
	
	public function getIcon()
	{
		return parent::getIcon(self::$name);
	}
	
	public function getStatus()
	{
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
}



?>