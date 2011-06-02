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




switch ( $uri[$ind] )
{
		case "storm" :
			switch ( $uri[$ind+1] )
			{
				case "add_suggestion" :
					//print $uri[$ind+1].$_POST['suggestion']; exit;
					if ( $_POST['suggestion'] )
					{
						//$_SESSION["message"] = i18n::_("ok");
						public_storm::addSuggestion($_POST['storm_id'], $_POST['suggestion'], $_SESSION["id"]);
						print "ok";
						exit;
						//header("HTTP/1.1 302 Moved temporarily", false, 302);
						//header("Location: ".$_SERVER['HTTP_REFERER'], false, 302);
					}
					break;
				
				default :
					$storm_permaname = $uri[$ind+1];
					require("storm.php");
					break;
			}
			break;
		
		case "stormExport" :
			public_storm::stormExport($uri[$ind+1]);
			header('Content-Type: text/csv; name="storm_'.$uri[$ind+1].'.csv"');
			header("Expires: 0");
			header("Cache-Control: no-cache, must-revalidate");
			header("Pragma: no-cache");  
			exit;
			break;
		
		case "storms" :
		default :
			switch( $uri[$ind+1] )
			{
				case "alpha" :
					require("storms_list_alpha.php");
					break;
				
				default :
					require("storms_list.php");
					break;
			}
			break;
}






