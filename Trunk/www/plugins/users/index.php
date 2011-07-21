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


switch ( $uri[$ind+1] )
{
	case "key" :
		header('Content-type: text/plain');
		header('Content-Disposition: attachment; filename="key"');
		print $_SESSION['uid'];
		exit;
		break;
		
	case "add-to-favorites" :
		require("add-to-favorites.php");
		exit;
		break;
		
	case "remove-from-favorites" :
		require("remove-from-favorites.php");
		exit;
		break;
		
	case "login" :
		require("login.php");
		//exit;
		break;
		
	case "logout" :
		require("logout.php");
		exit;
		break;
		
	case "mon-compte" :
		if ( $uri[$ind+2] )
		{
			switch ( $uri[$ind+2] )
			{					
					
				case "mes-alertes" :
					require(Settings::getVar('plug_dir')."users/mes-alertes.php");
					break;
						
				case "mes-parametres" :
					require(Settings::getVar('plug_dir')."users/mes-parametres.php");
					break;
				
				case "mes-informations" :	
					require(Settings::getVar('plug_dir')."users/mes-informations.php");
					break;
				
				default : break;
			}
			require(Settings::getVar('plug_dir')."users/mon-compte.php");
			//print $content;
			//exit;
		}
		else
		{
			require(Settings::getVar('plug_dir')."users/mes-informations.php");
			require(Settings::getVar('plug_dir')."users/mon-compte.php");
		}
		break;
		
	case "gettab" :
		$tab = $uri[$ind+2];
		require("gettab.php");
		exit;
		break;
		
	default :/* list storms for a user */
		if( $user_id = User::userExists($uri[$ind+1]) )
		{
			$author = public_storm::getStormAuthor($user_id);
			$username = ucWords($author['prenom']." ".$author['nom']);
			$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
			$sPlug->AddData("nom", $author['nom']);
			$sPlug->AddData("prenom", $author['prenom']);
			$sPlug->AddData("username", $username);
			$sPlug->AddData("login", $author['login']);
			$sPlug->AddData("lang", $author['lang']);
			$sPlug->AddData("member_since", $author['subscription_date']);
			$sPlug->AddData("avatar", $avatar = "http://www.gravatar.com/avatar/".md5( strtolower( $author['email'] ) )."?default=".urlencode( Settings::getVar('theme_dir_http')."img/weather-storm.png" )."&amp;size=100");
			
			$breadcrumb = Settings::getVar('breadcrumb');
			array_push($breadcrumb, array("name" => _("utilisateurs"), "link" => "#"));
			array_push($breadcrumb, array("name" => $username));
			Settings::setVar('breadcrumb', $breadcrumb);

			$current_page = $uri[$ind+2] != NULL ? $uri[$ind+2] : 1;
			$sPlug->AddData("current_page", $current_page);
			Settings::setVar('title', i18n::_("Liste des Storms de %s, page %s", array($username, $current_page)));
			$sPlug->AddData("nb_pages", ceil(public_storm::getNbStorms($user_id) / Settings::getVar('user_storms_per_page')));
			$sPlug->AddData("nbstorms", public_storm::getNbStorms($user_id));
			
			$sPlug->AddData("storms", public_storm::getStormsByAuthor($current_page==1 ? 0 : ((Settings::getVar('user_storms_per_page')*($current_page-1))), Settings::getVar('user_storms_per_page'), $user_id));
			$content = $sPlug->fetch("user-storms.tpl", "plugins/users");
		}
		else
		{
			errordocument::setError(404);
		}
		break;
}
