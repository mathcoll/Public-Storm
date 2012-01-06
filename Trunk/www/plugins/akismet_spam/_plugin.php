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
 */

final class akismet_spam extends Plugins 
{
 	public static $subdirs = array('akismet');
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/akismet_spam.php');
	}
	
	public function isSpam($tb_id, $tb_url, $tb_title, $tb_excerpt, $tb_name)
	{
		//print "->".Settings::$akismetAPIKey;
		include_once("./plugins/akismet_spam/classes/Akismet.class.php");
		$akismet = new Akismet(Settings::getVar('BASE_URL_HTTP'), Settings::getVar('akismetAPIKey'));
		$akismet->setCommentAuthor($tb_name);
		$akismet->setCommentAuthorURL($tb_url);
		$akismet->setCommentContent($tb_title);
		$akismet->setPermalink(Settings::getVar('BASE_URL_HTTP'));
		#$akismet->setCommentAuthorEmail($email);
		return $akismet->isCommentSpam();
	}
	
	public function loadLang()
	{
		return parent::loadLang(parent::getName());
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
		return parent::getAuthor();
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