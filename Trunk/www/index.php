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
ob_start();
require("core.php");
require("prepend.php");
$s = new Settings::$VIEWER_TYPE;

$s->AddData("site_name", Settings::getVar('SITE_NAME'));
$s->AddData("site_description", Settings::getVar('SITE_DESCRIPTION'));
$s->AddData("site_baseline", Settings::getVar('SITE_BASELINE'));
$s->AddData("version", Settings::getVar('SITE_VERSION'));
$s->AddData("prefix", Settings::getVar('prefix'));
$s->AddData("base_url", Settings::getVar('base_url'));
$s->AddData("theme_dir", Settings::getVar('theme_dir'));
$s->AddData("rss", Settings::getVar('base_url').'/backend/rss.php');
$s->AddData("current_lang", $_COOKIE["locale"]);
$s->AddData("s", $_SESSION['s']);
$s->AddData("langs", i18n::langs());





/* styles */
Settings::addCss('screen', Settings::getVar('theme_dir_http').'styles/styles.css', 'all.css');
Settings::addCss('screen', Settings::getVar('theme_dir_http').'plugins/users/styles/users.css', 'all.css');
Settings::addCss('screen', Settings::getVar('theme_dir_http').'plugins/public_storm/styles/styles.css', 'all.css');
Settings::addCss('print', Settings::getVar('theme_dir_http').'styles/print.css');

/* javascripts */
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/jquery-1.3.2.min.js');
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/jquery.scrollTo-min.js');
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/jquery.localscroll.js');
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/jquery.serialScroll-min.js');
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/coda-slider.js');

/* scripts for drag and dropping */
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'plugins/imagepanner/scripts/imagepanner.js');

/* Public-Storm scripts */
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'scripts/main.js');
Settings::addJs('text/javascript', Settings::getVar('theme_dir').'plugins/public_storm/scripts/public_storm.js');

if( $statuses['compressor'] == 1 )
{
	/* compression des Css */
	$csss = array();
	foreach( Settings::getCsss('screen', true) as $file )
	{
		//print_r($file);
		if ( $file['file'] == "all.css" )
		{
			array_push(
				$csss,
				//file_get_contents($file['javascript'])
				$file['stylesheet']
			);
			Settings::removeCss($file['stylesheet']);
		}
	}
	$cssFile = 'all.css';
	if ( Settings::getVar('compressor_use_gzip') == true )
	{
		$cssFile .= ".gz"; 
	}
	$css = compressor::refreshCss($csss, Settings::getVar('cache_dir').$cssFile);
	//compressor::writeToCache($js, Settings::getVar('cache_dir').'all.js');
	Settings::addCss('screen', Settings::getVar('base_url')."/cache/".$cssFile);
/*
	$jss = array();
	foreach( Settings::getJss('text/javascript', true) as $file )
	{
		array_push(
			$jss,
			//file_get_contents($file['javascript'])
			$file['javascript']
		);
		Settings::removeJs($file['javascript']);
	}
	$js = compressor::refreshJs($jss, Settings::getVar('cache_dir').'all.js');
	//compressor::writeToCache($js, Settings::getVar('cache_dir').'all.js');
	Settings::addJs('text/javascript', Settings::getVar('BASE_URL_HTTP').'/cache/'.'all.js');
*/
}
$s->AddData("styles", Settings::getVar('styles'));
$s->AddData("javascripts", Settings::getVar('javascripts'));





/* breadcrumb */
$breadcrumb = Settings::getVar('breadcrumb');
$crumb = array("name" => i18n::_("Title index"), "link" => Settings::getVar('BASE_URL'));
array_unshift($breadcrumb, $crumb);
Settings::setVar('breadcrumb', $breadcrumb);
$s->AddData("breadcrumb", Settings::getVar('breadcrumb'));


$title = Settings::getVar('title') != NULL ? Settings::getVar('title') : Settings::getVar('SITE_NAME').", ".i18n::_("baseline");
$description = Settings::getVar('description') != NULL ? Settings::getVar('description') : i18n::_("description");
$meta_keywords = Settings::getVar('meta_keywords') != NULL ? Settings::getVar('meta_keywords') : i18n::_("meta_keywords");
$meta_description = Settings::getVar('meta_description') != NULL ? Settings::getVar('meta_description') : i18n::_("meta_description");
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

if( $statuses['backend'] == 1 )
{
	
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


/*
 * return an array whose elements are shuffled in random order.
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

   /*
  * filtering an array
  */
 function filter_by_value ($array, $index, $value){
     if(is_array($array) && count($array)>0) 
     {
         foreach(array_keys($array) as $key){
             $temp[$key] = $array[$key][$index];
             
             if ($temp[$key] != $value){
                 $newarray[$key] = $array[$key];
             }
         }
       }
   return $newarray;
 } 
?>
