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
Settings::setVar('template', 'main.tpl');


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
$s = urldecode($uri[$ind+1]);
$_SESSION['s'] = $s;

/* Gestion de la pagination */
$page = $uri[$ind+2] != NULL ? $uri[$ind+2] : '1';
$from = $page==1 ? 0 : (($page - 1)*Settings::getVar('ELEMENT_BY_PAGE'));




$items = array();
if( preg_match("/\"(.*?)\"/", $s, $match) )
{
	$request = bee::getWords($match[1], $from, Settings::getVar('ELEMENT_BY_PAGE'));
}
else
{
	$request = bee::getWords('%'.$s, $from, Settings::getVar('ELEMENT_BY_PAGE'));
}

foreach ( $request as $name )
{
	$i = sizeOf($items);
	$items[$i] = $name;
	switch( $items[$i]['type_id'] )
	{
		case 1 :
			$folder = strToLower(i18n::_("entreprise"));
			$items[$i]['type'] = i18n::_("entreprise");
			break;
		case 2 :
			$folder = strToLower(i18n::_("marque"));
			$items[$i]['type'] = i18n::_("marque");
			break;
		case 3 :
			$folder = strToLower(i18n::_("personnalite"));
			$items[$i]['type'] = i18n::_("personnalite");
			break;
	}
	$items[$i]['url'] = Settings::getVar('BASE_URL').'/'.bee::unaccent($folder).'/'.$name['permaname'].'/';
}
//print_r($items);
$nb = bee::getNbWords('%'.$s);
$sPlug->AddData("items", $items);
Settings::setVar('title', i18n::L('rechercher'));
$sPlug->AddData("title", Settings::getVar('rechercher'));
Settings::setVar('description', '&nbsp;');
#$sPlug->->AddData("i18n", i18n::getLng());
$sPlug->AddData("nb", $nb);
$sPlug->AddData("nb_pages", ceil($nb/Settings::getVar('ELEMENT_BY_PAGE')));
$sPlug->AddData("current_page", $page);
$sPlug->AddData("start", $from + 1);
$sPlug->AddData("base_url_rech", Settings::getVar('BASE_URL').'/rechercher/'.$s.'/');
$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
$sPlug->AddData("s", $s);


if ( sizeOf($items) == 1 )
{	header("HTTP/1.1 301 moved Permanently", false, 301);
	$folder = $items[0]['iscorp'] == 1 ? i18n::_("entreprise") : i18n::_("marque");
	header("Location: ".Settings::getVar('BASE_URL').'/'.bee::unaccent($folder).'/'.$items[0]['name'].'/', false, 301);
	exit();
}


$breadcrumb = Settings::getVar('breadcrumb');
array_push($breadcrumb, array("name" => Settings::getVar('title')));
Settings::setVar('breadcrumb', $breadcrumb);
Settings::addCss('screen', Settings::getVar('theme_dir').'plugins/rechercher/styles/rechercher.css');
$content = $sPlug->fetch("resultat_de_recherche.tpl", "plugins/rechercher");


?>