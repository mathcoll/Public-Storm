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

$pos = (strpos($_SERVER['REQUEST_URI'], "?") > 0) ? strpos($_SERVER['REQUEST_URI'], "?") : strlen($_SERVER['REQUEST_URI']);
$request_uri = substr($_SERVER['REQUEST_URI'], 0, $pos);
$uri = explode('/', $request_uri);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

$current_page = $uri[$ind+1] != NULL ? $uri[$ind+1] : 1;
$nb_pages = ceil(public_storm::getNbStorms() / Settings::getVar('storms_per_page'));
$sPlug->AddData("current_page", $current_page);
$sPlug->AddData("nb_pages", $nb_pages);
$sPlug->AddData("nbstorms", public_storm::getNbStorms());

//print public_storm::getNbStorms()." "; 
//print Settings::getVar('storms_per_page')." ";
//print $current_page;

Settings::setVar('title', i18n::_("Liste des Storms, page %s", array($current_page)));
$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => i18n::L("Storms")));
Settings::setVar('breadcrumb', $breadcrumb);

$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
#$sPlug->->AddData("i18n", i18n::getLng());
//print $current_page==1 ? 0 : ((Settings::getVar('storms_per_page')*($current_page-1))+1);
//print Settings::getVar('storms_per_page');
$sPlug->AddData("storms", public_storm::getStormsByDate($current_page==1 ? 0 : ((Settings::getVar('storms_per_page')*($current_page-1))), Settings::getVar('storms_per_page')));
if ( $nb_pages > 1 ) {
	if ( $current_page > 1 ) Settings::setVar('has_prev', array('href' => '/storms/'.($current_page-1).'/', 'title' => i18n::_("Liste des Storms, page %s", array($current_page-1))));
	Settings::setVar('has_start', array('href' => '/storms/', 'title' => i18n::_("list_date")));
	if ( $current_page < $nb_pages ) Settings::setVar('has_next', array('href' => '/storms/'.($current_page+1).'/', 'title' => i18n::_("Liste des Storms, page %s", array($current_page+1))));
}
$content = $sPlug->fetch("storms_list.tpl", "plugins/public_storm");



?>