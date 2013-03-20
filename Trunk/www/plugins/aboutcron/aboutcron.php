<?php
/*
    Public-Storm
    Copyright (C) 2008-2012 Mathieu Lory <mathieu@internetcollaboratif.info>
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


if( Settings::getVar('BASE_URL') != "" ) {
	$ind = 2;
} else {
	$ind = 1;
}


if ( DEV ) {
	print i18n::L("DEV mode: on")."<br />\n";
}
if ( $uri[$ind+1] == Settings::getVar("aboutcron token") ) {
	print i18n::L("ok, Token Identifier is valid.")."<br />\n";
	print i18n::L("Get actions list...")."<br />\n";
	$crontab = aboutcron::getActions();
	//print_r($crontab);
	print i18n::L("-> %s action(s) to play.", array(sizeOf($crontab)))."<br />\n";
	foreach( $crontab as $command ) {
		//print_r($command);
		print i18n::L("Executing command: '%s' with params (%s)", array($command["command"], $command["parameters"]))."<br />\n";
		try {
			aboutcron::playAction($command["command"], $command["parameters"], $command["id"]);
		} catch (Exception $e) {
			print i18n::L("Error: '%s' with params (%s)", array($command["command"], $command["parameters"]))."<br />\n";
		}
	}
	//aboutcron::addAction(array("admin::sendMailToAdmin", json_encode(array("var1"=>"1","var2"=>"2")), time()+60));
	exit( i18n::L("End actions.") );
} else {
	exit( i18n::L("You must provide a valid aboutcron token identifier !") );
}
