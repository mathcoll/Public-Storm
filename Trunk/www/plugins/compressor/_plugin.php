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
 */
		
final class compressor extends Plugins
{
 	public static $subdirs = array();
 	public static $name = "compressor";
	public static $db;
	public static $compressor;
 	
	public function __construct()
	{
		self::loadLang();
		require(Settings::getVar('prefix') . 'conf/'.self::$name.'.php');
		/*
		require_once('./plugins/'.self::$name.'/classes/JavaScriptCompressor/BaseConvert.class.php');
		require_once('./plugins/'.self::$name.'/classes/JavaScriptCompressor/SourceMap.class.php');
		require_once('./plugins/'.self::$name.'/classes/JavaScriptCompressor/JavaScriptCompressor.class.php');
		self::$compressor = new JavaScriptCompressor();
		*/
		require_once('./plugins/'.self::$name.'/classes/js_css_compressor/js_merge.php');
		self::$compressor = new jsCssCompressor();
	}
	
	public function writeToCache($content, $file)
	{
		$f = new file($file);
		$f->Write($content);
	}
	
	public function refreshCss($array, $file)
	{
		$f = new file($file);
		if( ! $f->Exists() || time() > ($f->filemtime() + Settings::getVar('css_cache_duration')) )
		{
			return self::$compressor->makeCss($array, $file);
		}
	}
	
	public function refreshJs($array, $file)
	{
		$f = new file($file);
		if( $f->IsReadable() && time() > ($f->filemtime() + Settings::getVar('js_cache_duration')) )
		{
			return self::$compressor->makeJs($array, $file);
		}
	}
	
	public function getClean($jsSource)
	{
		return self::$compressor->getClean($jsSource);
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
