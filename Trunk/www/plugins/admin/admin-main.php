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

$sPlug = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');

Settings::setVar('title', i18n::_("admin"));
#$sPlug->->AddData("i18n", i18n::getLng());
$sPlug->AddData("prefix", Settings::getVar('prefix'));
$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
$sPlug->AddData("theme_dir", Settings::getVar('theme_dir'));

$sPlug->AddData("adminmenu", admin::getAdminMenu());


$sPlug->AddData("tabcontent", $tabContent);


if ( isset($_SESSION["message"]) )
{
	$sPlug->AddData("message", $_SESSION["message"]);
	$_SESSION["message"] = NULL;
}


$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => Settings::getVar('title')));
Settings::setVar('breadcrumb', $breadcrumb);
$content = $sPlug->fetch("admin-main.tpl", "plugins/admin");

?>