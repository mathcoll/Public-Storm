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


$uri = explode('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!


if( Settings::getVar('BASE_URL') != "" ) {
	$ind = 2;
} else {
	$ind = 1;
}

if ( $uri[$ind+1] ) {
	switch ( $uri[$ind+1] ) {
		case "ByMostActive" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("nb"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storms["storms"] = public_storm::getStormsByMostActive($params["nb"]);
			outputAndExit($storms);
			break;
			
		case "ByName" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("from", "nb"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storms["storms"] = public_storm::getStormsByAlpha($params["from"], $params["nb"]);
			outputAndExit($storms);
			break;
			
		case "ByLove" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array(), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storms["storms"] = public_storm::getStormsByMostFavorites();
			outputAndExit($storms);
			break;
			
		case "ByDate" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("from", "nb"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storms["storms"] = public_storm::getStormsByDate($params["from"], $params["nb"]);
			outputAndExit($storms);
			break;
			
		case "ByAuthor" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("from", "nb", "user_id"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storms["storms"] = public_storm::getStormsByAuthor($params["from"], $params["nb"], $params["user_id"]);
			outputAndExit($storms);
			break;
			
		case "getStorm" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("storm_id", "returnSuggestionFlag", "result_type"), $params);
			switch($params["result_type"]) {
				case "FETCH_ASSOC": $params["result_type"] = PDO::FETCH_ASSOC; break;
				case "FETCH_BOTH":
				default: $params["result_type"] = PDO::FETCH_BOTH; break;
			}
			$storm["storm"][0] = public_storm::getStorm($params["storm_id"], 20, $params["returnSuggestionFlag"], $params["result_type"]);
			
			$contributors = public_storm::getContributors($params["storm_id"], $params["user_id_filtered_out"], $params["result_type"]);
			$storm["storm"][0]["contributors"] = array();
			foreach ( $contributors as $s => $contributor) {
				//print_r($contributor);
				array_push($storm["storm"][0]["contributors"], ${contributor});
			}
	
			$storm["storm"][0]['isLogged'] = User::isLogged();
			
			if( User::isLogged() && User::isFavorites($params["storm_id"]) ) {
				$storm["storm"][0]['stared'] = "1";
			} else {
				$storm["storm"][0]['stared'] = "0";
			}
			
			//print $_POST["returnSuggestionFlag"]."-".$params["returnSuggestionFlag"];
			$temp = $storm["storm"][0]["suggestions"];
			unset($storm["storm"][0]["suggestions"]);
			$storm["storm"][0]["suggestions"] = null;
			if ( $params["returnSuggestionFlag"] == "true" ) {
				$storm["storm"][0]["suggestions"] = array();
				foreach ( $temp as $s => $suggestion) {
					//print_r($suggestion);
					array_push($storm["storm"][0]["suggestions"], ${suggestion});
				}
			}
			outputAndExit($storm);
			break;
			
		case "addStorm" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("storm", "user_id"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			
			$date = time();
			$addStorm = public_storm::addStorm(public_storm::getSuggestionPermaname($params["storm"]), $date, $params["storm"], $params["user_id"]);
			if ( is_array($addStorm) ) {
				$storm["addStorm"][0]["storm"] = $params["storm"];
				$storm["addStorm"][0]["date"] = $date;
				$storm["addStorm"][0]["user_id"] = $params["user_id"];
				$storm["addStorm"][0]["storm_id"] = $addStorm[0];
				$storm["addStorm"][0]["alreadyExists"] = true;
			} else {
				identica_php::updateStatus(i18n::_("Nouveau storm créé : %s %s par %s", array(urldecode($params["storm"]), public_storm::getUrl(public_storm::getSuggestionPermaname($params["storm"])), "API")));
				$storm["addStorm"][0]["storm"] = $params["storm"];
				$storm["addStorm"][0]["date"] = $date;
				$storm["addStorm"][0]["user_id"] = $params["user_id"];
				$storm["addStorm"][0]["storm_id"] = $addStorm;
				$storm["addStorm"][0]["alreadyExists"] = false;
			}
			outputAndExit($storm);
			break;
			
		case "getSuggestions" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("storm_id"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storm["storm"][0] = public_storm::getSuggestions($params["storm_id"], 20);
			outputAndExit($storm);
			break;
			
		case "login" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("login", "password", "persistent"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			if ( User::userLogin($params["login"], md5($params["password"]), $params["persistent"]) ) {
				$user["user"][0]["isLogged"] = User::isLogged()>0?"true":"false";
				$user["user"][0]["user_id"] = User::isLogged();
			} else {
				$user["user"][0]["isLogged"] = "false";
				$user["user"][0]["user_id"] = 0;
			}
			outputAndExit($user);
			break;
			
		case "addSuggestion" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("storm_id", "suggestion", "user_id"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storm["addSuggestion"][0] = public_storm::addSuggestion($params["storm_id"], $params["suggestion"], $params["user_id"]);
			outputAndExit($storm);
			break;
			
		case "getContributors" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("storm_id", "user_id_filtered_out"), $params);
			if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}
			$storm["addSuggestion"][0] = public_storm::getContributors($params["storm_id"], $params["user_id_filtered_out"]);
			outputAndExit($storm);
			break;
			
		case "getMyAccount" :
			$params = getParams($uri, $ind);
			$requireParams = requireParams(array("user_id"), $params);
			/*if ( sizeOf($requireParams) > 0 ) {
				outputAndExit($requireParams);
			}*/
			print "00";
			$storm["getMyAccount"][0] = User::GetDataById($params["user_id"]);
			outputAndExit($storm);
			break;
		
		default : break;
	}
}
function requireParams($array, $params) {
	$out=array();
	foreach($array as $requiredParam) {
		switch($requiredParam) {
			case "storm_id":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 2nd position");
				}
				break;
			case "storm":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			case "suggestion":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			case "user_id":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 2nd position");
				}
				break;
			case "login":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 2nd position");
				}
				break;
			case "password":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			case "persistent":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 4th position");
				}
				break;
			case "returnSuggestionFlag":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 2nd position");
				}
				break;
			case "result_type":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			case "from":
				if ( !in_array($requiredParam, $params) ) {
					rray_push($out, $requiredParam." is required on 2nd position");
				}
				break;
			case "nb":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			case "user_id_filtered_out":
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required on 3rd position");
				}
				break;
			default:
				if ( !in_array($requiredParam, $params) ) {
					array_push($out, $requiredParam." is required");
				}
				break;
		}
	}
	return $out;
}

function getParams($uri, $ind) {
	$params = array();
	$params["from"] = isset($_POST['from'])?$_POST['from']:$uri[$ind+2]>0?$uri[$ind+2]:0;
	$params["nb"] = isset($_POST['nb'])?$_POST['nb']:$uri[$ind+3]>0?$uri[$ind+3]:10;
	if ($params["nb"] > 20 || $params["nb"] < 0 || !isset($params["nb"]) ) $params["nb"] = 30;
	$params["user_id"] = isset($_POST['user_id'])?$_POST['user_id']:$uri[$ind+2];
	$params["user_id_filtered_out"] = isset($_POST['user_id_filtered_out'])?$_POST['user_id_filtered_out']:$uri[$ind+2];
	$params["storm_id"] = isset($_POST['storm_id'])?$_POST['storm_id']:$uri[$ind+2];
	$params["persistent"] = isset($_POST['persistent'])?$_POST['persistent']:false;
	$params["result_type"] = isset($_POST['result_type'])?$_POST['result_type']:$uri[$ind+4];
	$params["suggestion"] = isset($_POST['suggestion'])?utf8_encode($_POST['suggestion']):utf8_encode($uri[$ind+3]);
	$params["storm"] = isset($_POST['storm'])?utf8_encode($_POST['storm']):utf8_encode($uri[$ind+3]);

	$params["login"] = isset($_POST['login'])?$_POST['login']:null;
	$params["password"] = isset($_POST['password'])?$_POST['password']:null;
	$params["returnSuggestionFlag"] = isset($_POST["returnSuggestionFlag"])?$_POST['returnSuggestionFlag']:isset($uri[$ind+3])?"".$uri[$ind+3]:"true";
	$params["returnSuggestionFlag"] = "true"; //bug ?????? 
	/*
	print_r($uri);
	print_r($_POST);
	print_r($params);
	*/
	return $params;
}

function outputAndExit($data) {
	//print "<pre>";print_r($data);print "</pre>";
	header('Content-Type: application/json; charset=utf-8');
	print json_encode($data);
	exit;
}