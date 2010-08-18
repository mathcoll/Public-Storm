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

final class ods_php extends Plugins
{
 	public static $subdirs = array(
 		'odsExport',
 	);
 	public static $name = "ods_php";
 	public static $ods = "ods_php";
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/ods_php.php');
		require_once("./plugins/ods_php/classes/ods.php");
	}
	
	public function odsExport($storm)
	{
		//print_r($storm);
		self::$ods = newOds();
		self::$ods->addCell(0, 0, 0, 'Storm', 'string'); //sheet, row, cell, value, type
		self::$ods->addCell(0, 0, 1, $storm['root'], 'string');
		
		self::$ods->addCell(0, 1, 0, '', 'string');
		self::$ods->addCell(0, 1, 1, 'Url :', 'string');
		self::$ods->addCell(0, 1, 2, $storm['url'], 'string');
		self::$ods->addCell(0, 2, 0, '', 'string');
		self::$ods->addCell(0, 2, 1, 'Création du storm :', 'string');
		self::$ods->addCell(0, 2, 2, date('d/m/Y H:i', $storm['date']), 'string');
		self::$ods->addCell(0, 3, 0, '', 'string');
		self::$ods->addCell(0, 3, 1, 'Auteur du storm :', 'string');
		self::$ods->addCell(0, 3, 2, $storm['author'], 'string');
		
		self::$ods->addCell(0, 6, 0, '', 'string');
		self::$ods->addCell(0, 6, 1, 'Suggestions', 'string');
		self::$ods->addCell(0, 6, 2, 'Qté', 'string');
		self::$ods->addCell(0, 6, 3, '%', 'string');
		self::$ods->addCell(0, 6, 4, 'Url', 'string');
		$n=7;
		$count=0;
		foreach( $storm['suggestions'] as $suggestions )
		{
			self::$ods->addCell(0, $n, 0, '', 'string');
			self::$ods->addCell(0, $n, 1, $suggestions['suggestion'], 'string');
			self::$ods->addCell(0, $n, 2, $suggestions['nb'], 'float');
			self::$ods->addCell(0, $n, 3, '', 'string');
			self::$ods->addCell(0, $n, 4, modifier_url($suggestions['url']), 'string');
			$n++;
			$count+=$suggestions['nb'];
		}
		$o=7;
		foreach( $storm['suggestions'] as $suggestions )
		{
			$percentage = ($suggestions['nb'] / $count);
			self::$ods->addCell(0, $o, 3, $percentage, 'percentage');
			$o++;
		}
		saveOds(self::$ods, Settings::getVar('ROOT').'cache/'.$storm['permaname'].'.ods');
		return Settings::getVar('ROOT').'cache/'.$storm['permaname'].'.ods';
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
