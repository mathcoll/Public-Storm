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
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

$sPlug = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');


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

if ( $uri[$ind+1] )
{
	switch ( $uri[$ind+1] )
	{
		case "key" :
			header('Content-type: text/plain');
			header('Content-Disposition: attachment; filename="key"');
			print $_SESSION['uid'];
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
			
		default :
			if( $user_id = User::userExists($uri[$ind+1]) )
			{
				$sPlug->AddData("storms", public_storm::getStormsByAuthor(9999, $user_id));
				$author = public_storm::getStormAuthor($user_id);
				$sPlug->AddData("base_url", Settings::getVar('BASE_URL'));
				$sPlug->AddData("username", $author['prenom']." ".$author['nom']);
				$sPlug->AddData("avatar", $avatar = "http://www.gravatar.com/avatar/".md5( strtolower( $author['email'] ) )."?default=".urlencode( Settings::getVar('theme_dir')."/img/weather-storm.png" )."&size=100");
				$content = $sPlug->fetch("user-storms.tpl", "plugins/users");
			}
			break;
	}
}