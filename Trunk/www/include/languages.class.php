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
 * @subpackage Languages
 * @author     Mathieu Lory <mathieu@internetcollaboratif.info>
 */


if (basename($_SERVER["SCRIPT_NAME"])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));

#TODO : remove this deprecated class
final class Languages_OLD extends i18n
{
	public static function getLanguages()
	{
		foreach(file::GetFiles(Settings::getVar('inc_dir') . 'langs/', '^([a-z]+)\.php$') as $l)
		{			
			$i18n = new i18n;
			$i18n->load($l);
			self::$listLanguages[$l]["title"] = $i18n->getName();
			self::$listLanguages[$l]["code"] = $i18n->getCode();
		}
		return self::$listLanguages;
	}

}
?>
