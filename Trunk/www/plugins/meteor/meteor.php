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

$uri = split('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!
//print Settings::getVar('meteorServerIP');

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

$op = false;

// Open a controller channel to Meteor server
//echo "Connecting to Meteor :\n";
if ( $op = fsockopen(Settings::getVar('meteorServerIP'), Settings::getVar('meteorServerPort'), $errno, $errstr, 5) )
{	
	$command = isset($_POST['command']) ? $_POST['command'] : $uri[$ind+3];
	$message = isset($_POST['message']) ? $_POST['message'] : "Message de test";
	$ch = isset($_POST['ch']) ? $_POST['ch'] : $uri[$ind+4];
	$user = isset($_POST['user']) ? $_POST['user'] : Settings::getVar('MeteorDefaultUserName');
	$time = time();
	
	socket_set_blocking($op, false);

	$haswritten = false;
	$buf = "";
	switch( $command )
	{
		case "COUNTSUBSCRIBERS" :
		case "getSubscribers" :
			$out = "COUNTSUBSCRIBERS ".$ch."\n";
			$ans = askMeteor($out, $op);
			preg_match("/OK (\d+)/", $ans, $m);
			$array = array(
				"call" => "setSubscribers",
				"channel" => $ch,
				"nombre" => $m[1]
			);
			print json_encode($array);
			break;
			
		case "SHOWSTATS" :
			$out = "SHOWSTATS\n";
			print nl2br( askMeteor($out, $op) );
			break;
			
		case "LISTCHANNELS" :
			$out = "LISTCHANNELS\n";
			print nl2br( askMeteor($out, $op) );
			break;
			
		case "addSuggestion" :
			$array = array(
				"call" => "newSuggestion",
				"suggestion" => $message,
				"user" => $user
			);
			$out = "ADDMESSAGE ".$ch." ".json_encode($array)."\n";
			$ans = askMeteor($out, $op);
			print $ans;
			break;
			
		case "ADDMESSAGE" :
		default :
			$array = array(
				"call" => "new_suggestion",
				"suggestion" => $message,
				"user" => $user
			);
			$out = "ADDMESSAGE ".$ch." ".json_encode($array)."\n";
			break;
	}
}

function askMeteor($out, $op)
{
	fwrite($op, $out);
	// Give Meteor time to respond : 10ms
	usleep(10000);
	return fread($op, 4096);
}

?>
