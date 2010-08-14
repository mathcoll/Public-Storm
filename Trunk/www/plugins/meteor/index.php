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
print $uri."<----";
exit;

if( $_SESSION['isadmin'] != 1 )
{
	require(Settings::getVar('plug_dir')."admin/forbidden.php");
	//exit;
}
else
{	
	if ( $uri[$ind+1] )
	{
		switch ( $uri[$ind+1] )
		{
			case "gettab" :
				$tab = $uri[$ind+2];
				require("gettab.php");
				exit;
				break;
			
			default : break;
		}
	}
}