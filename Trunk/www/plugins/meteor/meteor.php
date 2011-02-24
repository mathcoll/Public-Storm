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
	if( isset($_GET['command']) )
	{
		$command = $_GET['command'];
	}
	else
	{
		if( isset($_POST['command']) )
		{
			$command = $_POST['command'];
		}
		else
		{
			$command = $uri[$ind+3];
		}
	}
	
	if( $_GET['user'] != "" )
	{
		$user = $_GET['user'];
	}
	else if( $_POST['user'] != "" )
	{
		$user = $_POST['user'];
	}
	else if( isset($_SESSION['nom']) )
	{
		$user = $_SESSION['prenom']." ".$_SESSION['nom'];
	}
	else
	{
		$user = Settings::getVar('MeteorDefaultUserName');
	}
	$message = isset($_POST['message']) ? $_POST['message'] : "";
	$ch = isset($_POST['channel']) ? $_POST['channel'] : $uri[$ind+4];
	$time = time();
	
	socket_set_blocking($op, false);
	//exit;

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
				"suggestion" => stripslashes($message),
				"user" => stripslashes($user)
			);
			//$out = "ADDMESSAGE ".$ch." ".json_encode($array)."\n";
			$out = "ADDMESSAGE ".$ch." {call:'newSuggestion',suggestion:'".stripslashes($message)."',user:'".stripslashes($user)."'}\n";
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
	exit;
}

function askMeteor($out, $op)
{
	fwrite($op, $out);
	// Give Meteor time to respond : 10ms
	usleep(10000);
	return fread($op, 4096);
}

?>
