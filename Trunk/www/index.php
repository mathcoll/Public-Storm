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
ob_start();
require("core.php");
require("prepend.php");
$s = new Settings::$VIEWER_TYPE;

$s->AddData("locale", LANG);
$s->AddData("site_name", Settings::getVar('SITE_NAME'));
$s->AddData("site_description", Settings::getVar('SITE_DESCRIPTION'));
$s->AddData("site_baseline", Settings::getVar('SITE_BASELINE'));
$s->AddData("version", Settings::getVar('SITE_VERSION'));
$s->AddData("prefix", Settings::getVar('prefix'));
$s->AddData("base_url", Settings::getVar('base_url'));
$s->AddData("base_url_http", Settings::getVar('base_url_http'));
$s->AddData("theme_dir", Settings::getVar('theme_dir'));
$s->AddData("current_lang", @$_COOKIE["locale"]);
$s->AddData("s", @$_SESSION['s']);
$s->AddData("langs", i18n::langs());
$s->AddData("is_mobile", Settings::getVar('is_mobile'));
$s->AddData("has_prev", Settings::getVar('has_prev')); #TODO
$s->AddData("has_next", Settings::getVar('has_next')); #TODO
$s->AddData("has_start", Settings::getVar('has_start')); #TODO
$s->AddData("fb_app_id", Settings::getVar('fb_app_id'));

if( $statuses['compressor'] == 1 ) {
	$listeCss = explode(",", Settings::getVar('listeCss'));
	foreach( $listeCss as $css ) {
		foreach( Settings::getCsss($css, true) as $file ) {
			if ( $file['media'] == $css ) {
				Settings::removeCss($file['stylesheet']);
			}
		}
	}
	
	$debug = DEBUG == true ? "debug/" : "";
	if ( Settings::getVar('listeCss-handheld') == true ) {
		//print "listeCss-handheld";
		Settings::setVar('listeCss-screen', true);
	}
	foreach( $listeCss as $css ) {
		$media=$css=="admin"?"screenToForce":$css;#TODO !!!! grrrr !!!!
		$media=$css=="handheld"?"screenToForce":$css;#TODO !!!! grrrr !!!!
		//print $css."=>".$media."<br />\n";
		if ( Settings::getVar('listeCss-'.$css) == true ) {
			//print $media." - media<br />";
			//print $css." - css<br />";
			//print Settings::getVar('base_url')."/css/groups/".$css.".css/"." - stylesheet<br />";
			Settings::addCss($media, Settings::getVar('base_url')."/css/groups/".$css.".css/".$debug, $css.".css");
		} else {
			//print $css." - disabled<br />";
		}
	}
	
	$listeJs = explode(",", Settings::getVar('listeJs'));
	foreach( $listeJs as $js ) {
		/* compression des Js */
		$jss = array();
		foreach( Settings::getJss('text/javascript', true) as $file )
		{
			//print_r(Settings::getJss('text/javascript', true))."\n";
			if ( $file['file'] == $js )
			{
				//print $js." = ".$file['javascript']."<br />";
				array_push(
					$jss,
					//file_get_contents($file['javascript'])
					$file['javascript']
				);
				Settings::removeJs($file['javascript']);
			}
		}
		//print "addJs :".Settings::getVar('base_url')."/js/groups/".$js."/"."<br />";
		$debug = DEBUG == true ? "debug/" : "";
		Settings::addJs('text/javascript', Settings::getVar('base_url')."/js/groups/".$js."/".$debug, $js);
	}
}
//print_r(Settings::getVar('styles'));
//exit;
$s->AddData("styles", Settings::getVar('styles'));
$s->AddData("javascripts", Settings::getVar('javascripts'));





/* breadcrumb */
$breadcrumb = Settings::getVar('breadcrumb');
$BASE_URL = Settings::getVar('BASE_URL');
$crumb = array("name" => i18n::_("Title index"), "link" => empty($BASE_URL) ? "/" : $BASE_URL);
array_unshift($breadcrumb, $crumb);
Settings::setVar('breadcrumb', $breadcrumb);
$s->AddData("breadcrumb", Settings::getVar('breadcrumb'));


$title = Settings::getVar('title') != NULL ? Settings::getVar('title') : Settings::getVar('SITE_NAME').", ".i18n::_("baseline");
$description = Settings::getVar('description') != NULL ? Settings::getVar('description') : i18n::_("description");
$meta_keywords = Settings::getVar('meta_keywords') != NULL ? Settings::getVar('meta_keywords') : i18n::_("meta_keywords");
$meta_description = Settings::getVar('meta_description') != NULL ? Settings::getVar('meta_description') : i18n::_("meta_description", array(""));
$s->AddData("title", $title);
$s->AddData("meta_keywords", $meta_keywords);
$s->AddData("meta_description", $meta_description);
$s->AddData("description", $description);

//print_r($_SESSION);
#$s->AddData("i18n", i18n::getLng());
if ( isset($_SESSION["message"]) || Settings::getVar('message') )
{
	$s->AddData("message", isset($_SESSION["message"]) ? $_SESSION["message"] : Settings::getVar('message'));
	$_SESSION["message"] = NULL;
}

if ( isset($_SESSION['status']) )
{
	$s->AddData("status", $_SESSION["status"]);
	$_SESSION['status'] = NULL;
}

if( $statuses['backend'] == 1 ) {
	$rssfeeds = backend::getRssfeeds() != NULL ? backend::getRssfeeds() : array();
	$s->AddData("rssfeeds", $rssfeeds);
}

if( $statuses['users'] == 1 )
{
	$isLogged = User::isLogged() != NULL ? 1 : 0;
	$user = Array(
		'logged'	=> $isLogged,
		'id'		=> $_SESSION['user_id'],
		'prenom'	=> $_SESSION['prenom'],
		'nom'		=> $_SESSION['nom'],
		'email'	=> $_SESSION['email'],
		'avatar'	=> $_SESSION['avatar'],
		'isadmin'=> $_SESSION['isadmin']
	);
	$s->AddData("user", $user);
}

if( $statuses['articles'] == 1 )
{
	$s->AddData("articles", articles::getArticlesTitles());
}
if( $statuses['trackbacks'] == 1 )
{
	$s->AddData("trackbacks", trackbacks::getAllTb(5));
}
if( $statuses['public_storm'] == 1 )
{
	$storms = public_storm::getStormsByMostActive(6);
	$s->AddData("storms", $storms);
	$s->AddData("storms_note", public_storm::getStormsByMostFavorites());
}
if( $statuses['analytics'] == 1 )
{
	$plugins_vars['analytics']['code'] = analytics::getCode();
	$plugins_vars['analytics']['pageview'] = Settings::getVar('pageview') != NULL ? Settings::getVar('pageview') : '';
}
if( $statuses['bbclone'] == 1 )
{
	define("_BBC_PAGE_NAME", $title);
	define("_BBCLONE_DIR", Settings::getVar('plug_dir') . 'bbclone/bbclone/');
	define("COUNTER", 'mark_page.php');
	if (is_readable(_BBCLONE_DIR . COUNTER)) include_once(_BBCLONE_DIR . COUNTER);
	else print "not readable = " . _BBCLONE_DIR . COUNTER;
}
if ( isset($content) ) { $s->AddData("contenu", $content); }

//$s->UseTemplate("index.tpl");

//print_r($statuses);
// Plugins statuses (activated or not)
$s->AddData("statuses", $statuses);

$s->AddData("plugins", $plugins_vars);

$template = Settings::getVar('template') != NULL ? Settings::getVar('template') : 'index.tpl';
$s->Show($template, "");

ob_end_flush();


/**
 * return an array whose elements are shuffled in random order.
 * @param array $my_array
 * @return array
 */
function custom_shuffle($my_array = array()) {
  $copy = array();
  while (count($my_array)) {
    // takes a rand array elements by its key
    $element = array_rand($my_array);
    // assign the array and its value to an another array
    $copy[$element] = $my_array[$element];
    //delete the element from source array
    unset($my_array[$element]);
  }
  return $copy;
}

/**
 * Sort an array
 * @param array $array
 * @param string $subkey
 * @param boolean $sort_descending
 * @param boolean $keep_keys_in_sub
 * @return array
 */
function sksort(&$array, $subkey="id", $sort_descending=false, $keep_keys_in_sub = false) {
    $temp_array = $array;

    foreach ($temp_array as $key => &$value) {
     
      $sort = array();
      foreach ($value as $index => $val) {
          $sort[$index] = $val[$subkey];
      }
     
      asort($sort);
     
      $keys = array_keys($sort);
      $newValue = array();
      foreach ($keys as $index) {
        if($keep_keys_in_sub)
            $newValue[$index] = $value[$index];
          else
            $newValue[] = $value[$index];
      }
     
      if($sort_descending)
        $value = array_reverse($newValue, $keep_keys_in_sub);
      else
        $value = $newValue;
    }
   
    return $temp_array;
  }

/**
 * filter an array to keep only some $index => $values items
 * @param array $array
 * @param string $index
 * @param string $value
 * @return array
 */
function filter_by_value($array, $index, $value) {
	//print "filtering ".$index."->".$value."<br />\n";
	if( is_array($array) && count($array)>0 ) {
		$temp = array();
		$newarray = array();
		foreach(array_keys($array) as $key) {
			$temp[$key] = $array[$key][$index];
			if ( $temp[$key] != $value ) {
				$newarray[$key] = $array[$key];
			} else {
				$newarray[$key] = "";
				unset($newarray[$key]);
			}
		}
	}
	//print_r($newarray);
	return @isset($newarray)?$newarray:$array;
}

Debug::Log("Strarting at ".date("c", Settings::getVar("Starting at")), NOTICE, __LINE__, __FILE__);
Debug::Log("Ending at ".date("c", microtime(true)), NOTICE, __LINE__, __FILE__);
Debug::Log("Execution time ".round(microtime(true) - Settings::getVar("Starting at"), 4), NOTICE, __LINE__, __FILE__);
?>
