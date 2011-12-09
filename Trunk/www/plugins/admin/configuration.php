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

$sTab = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');


#$sTab$s->AddData("i18n", i18n::getLng());
$sTab->AddData("prefix", Settings::getVar('prefix'));
$sTab->AddData("base_url", Settings::getVar('BASE_URL'));
$sTab->AddData("theme_dir", Settings::getVar('theme_dir'));


if ( isset($_SESSION["message"]) )
{
	$sTab->AddData("message", $_SESSION["message"]);
	$_SESSION["message"] = NULL;
}

$uri = explode('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!
if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

$customizable = Settings::getCustomizable();
$c = array();
foreach($customizable as $custom)
{
	if ( !$uri[$ind+3]  )
	{
		array_push($c, array($custom, Settings::getVar($custom), Settings::getCustomizableDesc($custom), Settings::getCustomizableType($custom) ));
	}
	elseif( Settings::getCustomizableType($custom) == $uri[$ind+3] || $uri[$ind+3] == "undefined" )
	{
		array_push($c, array($custom, Settings::getVar($custom), Settings::getCustomizableDesc($custom), Settings::getCustomizableType($custom) ));
	}
}

$sTab->AddData("customizable", $c);

//$breadcrumb = Settings::getVar('breadcrumb');
//array_push($breadcrumb, array("name" => Settings::getVar('title')));
//Settings::setVar('breadcrumb', $breadcrumb);
$tabContent = $sTab->fetch("configuration.tpl", "plugins/admin");

?>