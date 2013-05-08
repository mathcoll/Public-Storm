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
 */

$uri = explode('/', $_SERVER['REQUEST_URI']);
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
	$print = isset($uri[$ind+5]) ? $uri[$ind+5] : "";
	$format = isset($uri[$ind+4]) ? $uri[$ind+4] : "";
	$ch = isset($_POST['channel']) ? $_POST['channel'] : $uri[$ind+4];
	$time = time();

	socket_set_blocking($op, false);
	//exit;

	$haswritten = false;
	$buf = "";
	switch( $command ) {
		case "COUNTSUBSCRIBERS" :
		case "getSubscribers" :
			if( $ch=="" ) {
				print "<script>var foo=prompt('Channel ?');tab('meteor/COUNTSUBSCRIBERS', 'meteor3', 'admin', foo+'/print/');</script>";
			} else {
				print "<h3>".i18n::L("Meteor COUNTSUBSCRIBERS %s", array($ch))."</h3><br />";
				$ans = askMeteor($out, $op);
				preg_match("/OK (\d+)/", $ans, $m);
				$array = array(
					"call" => "setSubscribers",
					"channel" => $ch,
					"nombre" => $m[1]
				);
				print json_encode($array);
				if ( $print ) {
					print "<p>".$array["channel"]." : ".$array["nombre"]." users.</p>";
				}
				//print "<pre>";
				//var_dump($array);
				//print "</pre>";
			}
			break;
			
		case "SHOWSTATS" :
			$out = "SHOWSTATS\n";
			print "<h3>".i18n::L("Meteor SHOWSTATS")."</h3><br />";
			print nl2br( askMeteor($out, $op) );
			break;
			
		case "LISTCHANNELS" :
			$out = "LISTCHANNELS\n";
			//print nl2br( askMeteor($out, $op) );
			$array = explode("\n", askMeteor($out, $op));
			switch ($format) {
				case "rss":
					header("Content-type: application/rss+xml", true, 200);
					$sPlug = new Settings::$VIEWER_TYPE;
					
					$sPlug->AddData("base_url_http", Settings::getVar('base_url_http'));
					$sPlug->AddData("site_baseline", Settings::getVar('SITE_BASELINE'));
					$sPlug->AddData("site_description", strip_tags(i18n::_('description', array(""))));
					$sPlug->AddData("title", Settings::getVar('SITE_NAME'));
					$sPlug->AddData("site_theme", Settings::getVar('theme_dir'));
					$sPlug->AddData("theme_dir_http", Settings::getVar('theme_dir_http'));
					$sPlug->AddData("rss_generator", Settings::getVar('RSS_GENERATOR'));
					$sPlug->AddData("rss_webmaster", Settings::getVar('RSS_WEBMASTER'));
					$sPlug->AddData("rss_managingeditor", Settings::getVar('RSS_MANAGINGEDITOR'));
					$sPlug->AddData("version", Settings::getVar('SITE_VERSION'));
					$sPlug->AddData("date", date('r'));
					$channels = array();
					if( rtrim($array[0]) == "OK" ) {
						$n=0;
						while( rtrim($array[$n]) != "--EOT--" ) {
							list($storm, $suggestion, $users) = preg_split("/[\(\/\)]+/", rtrim($array[$n]));
							if( rtrim($array[$n]) != "OK" ) {
								array_push($channels, array("users" => $users, "suggestion" => $suggestion, "storm" => $storm));
							}
							$n++;
						}
					}
					$sPlug->AddData("channels", $channels);
					$content = $sPlug->fetch("rss.tpl", "plugins/meteor");
					
					print $content;
					break;
				case "html":
				default:
					print "<h3>".i18n::L("Meteor LISTCHANNELS")."</h3><br />";
					print "<a href=\"/admin/gettab/meteor/LISTCHANNELS/rss/\">".i18n::L("version rss")."</a>";
					if( rtrim($array[0]) == "OK" ) {
						$n=0;
						while( rtrim($array[$n]) != "--EOT--" ) {
							list($storm, $suggestion, $users) = preg_split("/[\(\/\)]+/", rtrim($array[$n]));
							if( rtrim($array[$n]) != "OK" ) {
								printf("<li>%s users ; %s suggestions <a href=\"/storm/%s/\">%s</a></li>\n\r", $users, $suggestion, $storm, $storm);
							}
							$n++;
						}
					}
					break;
			}
			break;
			
		case "addSuggestion" :
			/*
			$array = array(
				"call" => "newSuggestion",
				"suggestion" => stripslashes($message),
				"user" => stripslashes($user)
			);
			*/
			//$out = "ADDMESSAGE ".$ch." ".json_encode($array)."\n";
			//foreach( split("[,;:|\/]", stripslashes($message)) as $m ) {
				//print $m."<-----";
				$out = "ADDMESSAGE ".$ch." {call:'newSuggestion',suggestion:'".stripslashes($message)."',user:'".stripslashes($user)."'}\n";
				$ans = askMeteor($out, $op);
				print $ans;
			//}
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
