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

$sPlug = new Settings::$VIEWER_TYPE;


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

$current_page = $uri[$ind+2] != NULL ? $uri[$ind+2] : 1;
$sPlug->AddData("current_page", $current_page);
$sPlug->AddData("nb_pages", ceil(public_storm::getNbStorms() / Settings::getVar('storms_per_page')));
$sPlug->AddData("nbstorms", public_storm::getNbStorms());

Settings::setVar('title', i18n::L("Storms"));
$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => i18n::L("Storms")));
Settings::setVar('breadcrumb', $breadcrumb);

//print_r(public_storm::getStormsByAlpha());

$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
#$sPlug->->AddData("i18n", i18n::getLng());
$sPlug->AddData("storms", public_storm::getStormsByAlpha($current_page==1 ? 0 : ((Settings::getVar('storms_per_page')*($current_page-1))), Settings::getVar('storms_per_page')));
$content = $sPlug->fetch("storms_list_alpha.tpl", "plugins/public_storm");



?>