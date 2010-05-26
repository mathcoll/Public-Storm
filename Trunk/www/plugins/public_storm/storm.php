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

$sPlug = new Settings::$VIEWER_TYPE;
$sPlug->AddData("theme_dir", Settings::getVar('theme_dir'));


$uri = split('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

$id = public_storm::getStormIdFromUrl(strToLower($storm_permaname));
//print $id."-)".$_SESSION['id'];

if ( isset($id) || isset($_SESSION['id']) )
{
	//print "--".$id."--";
	$storm = public_storm::getStorm($id);
	//print "--".$id."--";
	//print '<pre>';
	//print_r($storm);
	//print '</pre>';
	$root = isset($id) ? $storm['root'] : $storm_permaname;
	//exit;
	if ( !isset($id) )
	{
		/* on créé le storm */
		$storm_root = $uri[$ind+2] != "" ? $uri[$ind+2] : $root;
		
		//print "Root=".$root."<br/>";
		//print "permaname=".$storm_permaname."<br/>";
		//print "storm_root=".$storm_root."<br/>";
		if ( $id = public_storm::addStorm($storm_permaname, time(), urldecode($storm_root), $_SESSION['id']) )
		{
			$_SESSION["message"] = i18n::_("Vous venez de créer le storm %s !", array(urldecode($storm_root)));
			if( Settings::getVar('BASE_URL') != "/public-storm.internetcollaboratif.info" )
			{
				identica_php::updateStatus(i18n::_("Nouveau storm créé : %s %s", array(urldecode($storm_root), public_storm::getUrl($storm_permaname))));
			}
			else
			{
				//print "updateStatus => ".fixEncoding(i18n::_("Nouveau storm créé : %s %s", array(urldecode($storm_root), public_storm::getUrl($storm_permaname))));
			}
		}
		else
		{
			$_SESSION["message"] = i18n::_("Erreur lors de la création du storm %s", array(urldecode($storm_root)));
		}
		$storm = public_storm::getStorm($id);
		$storm["storm_id"] = $id;
	}
	
	
	//print '<pre>';
	//print_r($storm);
	//print '</pre>';
	$cloud = new tagcloud();
	$is_cloud=false;
	foreach ( $storm["suggestions"] AS $suggestion )
	{
		/* on recherche tous les autres storms qui ont la même suggestion */
		$storms_list = public_storm::getStormsFromSuggestion($suggestion['suggestion'], $storm["storm_id"]);
		//print "<pre>";
		//print_r( $storms_list);
		//print "</pre>";
		/* pour chaque storm connexe, on recherche ses suggestions */		
		foreach( $storms_list AS $sugg )
		{
			$st = public_storm::getStorm($sugg['storm_id']);
			//print $suggestion['suggestion'].":".$st['root']." (id=".$sugg['storm_id'].")<br />";
			//print "<pre>";
			//print_r($st);
			//print "</pre>";
			$is_cloud=true;
			$cloud->addWord($st['root'], 1);
		}
	}
	//print_r($cloud->getWords());
	if ( $is_cloud==true ) $sPlug->AddData("cloud", $cloud->showCloud());
	
	$storm = is_array($storm) ? $storm : array();
	$sPlug->AddData("storm", $storm);
	$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
	#$sPlug->->AddData("i18n", i18n::getLng());
	
	//print_r($storm);
	//print $storm['root'];
	
	Settings::setVar('title', "Storm ".$root);
	$breadcrumb = Settings::getVar('breadcrumb');
	array_push($breadcrumb, array("name" => i18n::_("Storms"), "link" => Settings::getVar('BASE_URL')."/storms/"));
	array_push($breadcrumb, array("name" => $root));
	Settings::setVar('breadcrumb', $breadcrumb);
	$content = $sPlug->fetch("storm.tpl", "plugins/public_storm");
}
else
{
	Settings::setVar('title', "Connectez-vous pour créer le storm : ".$storm_permaname);
	$breadcrumb = Settings::getVar('breadcrumb');
	array_push($breadcrumb, array("name" => i18n::_("Storms"), "link" => Settings::getVar('BASE_URL')."/storms/"));
	array_push($breadcrumb, array("name" => $storm_permaname));
	Settings::setVar('breadcrumb', $breadcrumb);
	$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
	#$sPlug->->AddData("i18n", i18n::getLng());
	$sPlug->AddData("storm_permaname", $storm_permaname);
	$content = $sPlug->fetch("add_storm_or_loggin.tpl", "plugins/users");
}

// Fixes the encoding to uf8
function fixEncoding($in_str)
{
  $cur_encoding = mb_detect_encoding($in_str) ;
  if($cur_encoding == "UTF-8" && mb_check_encoding($in_str,"UTF-8"))
    return $in_str;
  else
    return utf8_encode($in_str);
} // fixEncoding 


?>