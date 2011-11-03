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

final class ods_php extends Plugins
{
 	public static $subdirs = array(
 		'odsExport', 'csvExport'
 	);
 	public static $name = "ods_php";
 	public static $ods = "ods_php";
 	public static $export = "";
 	
	public function __construct()
	{
		//require(Settings::getVar('prefix') . 'conf/ods_php.php');
		require_once("./plugins/ods_php/spreadsheetexport-0.1.0/lib/SpreadsheetExport.php");
		self::$export = new SpreadsheetExport();
		return $this;
	}
	
	/**
	 * Write a file to server
	 * @param string $storm
	 * @return ods_php
	 */
	public function generateFile($storm)
	{
		//print_r($storm);

		// Set the target filename. The extension will automatically be added.
		self::$export->filename = $storm['permaname'];
		
		// We add a few columns now using dates, strings and floats. The second
		// parameter specifies the column with in cm when using ODS export.
		self::$export->AddColumn("string", 2);
		self::$export->AddColumn("string", 4);
		self::$export->AddColumn("string", 2);
		self::$export->AddColumn("string", 2);
		self::$export->AddColumn("string", 2);
		
		// Now we add rows
		self::$export->AddRow(array(i18n::_("Storm"), $storm['root'], "", "", ""));
		self::$export->AddRow(array("", i18n::_("Url :"), $storm['url'], "", ""));
		self::$export->AddRow(array("", i18n::_("Création du storm :"), date('d/m/Y H:i', $storm['date']), "", ""));
		self::$export->AddRow(array("", i18n::_("Auteur du storm :"), $storm['author'], "", ""));
		self::$export->AddRow(array("", i18n::_("Suggestions"), i18n::_("Qté"), "%", "Url"));
		
		$count=0;
		foreach( $storm['suggestions'] as $suggestions )
		{
			$count += $suggestions['nb'];
		}
		
		foreach( $storm['suggestions'] as $suggestions )
		{
			$percentage = ($suggestions['nb'] / $count * 100);
			self::$export->AddRow(array("", $suggestions['suggestion'], $suggestions['nb'], $percentage, modifier_url($suggestions['url'])));
		}
		//print_r(self::$export); exit();
		return $this;
	}
	
	public function odsExport()
	{
		try {
			self::$export->DownloadODF();
		} catch(Exeption $e) {
			print $e;
			exit;
		}
		return true;
	}
	
	public function csvExport()
	{
		try {
			self::$export->DownloadCSV();
		} catch(Exeption $e) {
			print $e;
			exit;
		}
		return true;
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
