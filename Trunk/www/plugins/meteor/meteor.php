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

$ind = 2;

$op = false;

// Open a controller channel to Meteor server
//echo "Connecting to Meteor :\n";
if (!($op = fsockopen(Settings::getVar('meteorServerIP'), Settings::getVar('meteorServerPort'), $errno, $errstr, 5)))
{
	//echo "Meteor not responding";
}
else
{	
	$command = isset($_POST['command']) ? $_POST['command'] : $uri[$ind+2];
	$user = isset($_POST['user']) ? $_POST['user'] : Settings::getVar('MeteorDefaultUserName');
	$message = isset($_POST['message']) ? $_POST['message'] : "message de test";
	$ch = isset($_POST['ch']) ? $_POST['ch'] : $uri[$ind+3];
	$time = time();
	
	socket_set_blocking($op, false);
	//echo "Connected";
	$haswritten = false;
	$buf = "";
	if ( !$command )
	{
		$out = "ADDMESSAGE ".$ch." <strong>".$user." ".$time."</strong> ".$message."\n";
		//print $out;
	}
	else
	{
		switch( $command )
		{
			case "COUNTSUBSCRIBERS" :
				$out = "COUNTSUBSCRIBERS ".$ch."\n";
				break;
				
			case "SHOWSTATS" :
				$out = "SHOWSTATS\n";
				break;
				
			case "LISTCHANNELS" :
				$out = "LISTCHANNELS\n";
				break;
		}
		//print $out;
	}
	$haswritten = true;
	fwrite($op, $out);
	// Give Meteor time to respond - 10ms
	usleep(10000);
	// Read response
	if ($haswritten)
	{
		$buf = fread($op, 4096);
	}
	
	if ( $command == "COUNTSUBSCRIBERS" || $command == "SHOWSTATS" || $command == "LISTCHANNELS" )
	{
		print nl2br($out."\n".$buf);
	}
	else
	{
		print $buf;
	}
}



?>
