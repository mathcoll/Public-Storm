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

final class public_storm extends Plugins {
 	public static $subdirs = array(
 		'storm',
 		'storms',
 		'stormExport',
 		'random',
 	);
 	public static $name = "public_storm";
	public static $db;
 	private $suggestions = array();
 	
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/public_storm.php');
		Settings::addCss('handheld', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/public_storm/styles/handheld.css', 'handheld.css');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/public_storm/styles/styles.css', 'screen.css');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'styles/styles.css', 'screen.css');
		Settings::addCss('screen', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'styles/widgetWikio.css', 'screen.css');
		Settings::addCss('print', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/public_storm/styles/print.css', 'print.css');
		Settings::addCss('print', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'styles/print.css', 'print.css');
		
		/* Public-Storm scripts */
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/main.js', 'all.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'plugins/public_storm/scripts/public_storm.js', 'all.js');
		
		/* javascripts jQuery */
		//Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/jquery-1.3.2.min.js', 'jquery.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/jquery.scrollTo-min.js', 'jquery.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/jquery.localscroll.js', 'jquery.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/jquery.serialScroll-min.js', 'jquery.js');
		Settings::addJs('text/javascript', rtrim(Settings::getVar('ROOT'), "/").Settings::getVar('theme_dir').'scripts/coda-slider.js', 'jquery.js');

		if ( !class_exists(Settings::$DB_TYPE) ) {
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR, __LINE__, __FILE__);
		} else {
			if ( self::$db = new Settings::$DB_TYPE ) {
				return true;
			} else {
				Debug::Log($err, ERROR, __LINE__, __FILE__);
				return false;
				exit($err);
			}
		}
	}
	
	public function getStormsFromSuggestion($suggestion, $storm_id) {
		return self::$db->q2("SELECT storm_id FROM suggestions WHERE suggestion = :suggestion AND storm_id != :storm_id", "public_storms.db", array($suggestion, $storm_id));
	}
	
	public function getSuggestionPermaname($suggestion) {
		$suggestion    = utf8_encode(
				strtr(
					utf8_decode($suggestion),
					utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ. ?&"),
					"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn----"
				)
			);
		$suggestion    = htmlentities(strtolower($suggestion));
		//$suggestion    = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($suggestion));
		$suggestion    = trim($suggestion, "-");
		$suggestion    = urlencode($suggestion);
		return $suggestion;
	}
	
	public function getUrl($storm_root) {
		return Settings::getVar('BASE_URL_HTTP')."/storm/".strToLower($storm_root)."/";
	}
	
	public function loadLang() {
		return parent::loadLang(self::$name);
	}	
	
	public function getVersion() {
		return parent::getVersion();
	}
	
	public function getName() {
		return self::$name;
	}
	
	public function getDescription() {
		return parent::getDescription();
	}
	
	public function getAuthor() {
		return parent::getAuthor();
	}
	
	public function getIcon() {
		return parent::getIcon(self::$name);
	}
	
	public function getStatus()
	{
		return parent::getStatus(self::$name);
	}
	
	public function getSubDirs()
	{
		return self::$subdirs;
	}
	
	
	public function addStorm($permaname, $date, $root, $user_id) {
		//print "INSERT into storms (permaname, date, root, user_id) VALUES ('".strToLower($permaname)."', '".$date."', '".strToLower($root)."', '%d')";
		// check if storm already exists
		if ( $id = self::getStormIdFromUrl(strToLower($permaname)) )  {
			return array($id); /* so nice.. an array :-) */
		} else {
			return self::$db->u("INSERT into storms (permaname, date, root, user_id) VALUES ('".strToLower($permaname)."', '".$date."', '".strToLower($root)."', '%d')", "public_storms.db", array($user_id));
		}
	}
	
	public function getStorm($id, $nb=20, $returnSuggestionFlag="true", $result_type=PDO::FETCH_BOTH) {
		// I'm sorry about that non boolean default value...
		if( isset($id) && $id > 0 ) {
			$s = self::$db->q("SELECT s.* FROM storms s WHERE s.storm_id=%d", "public_storms.db", array($id), $result_type);
			//$s = self::$db->q2("SELECT s.* FROM storms s WHERE s.storm_id=:id", "public_storms.db", array(":id" => $id));
			if ($returnSuggestionFlag != "false") $s[1]['suggestions'] = self::getSuggestions($id, $nb, $result_type);
			if ($s[1]['user_id'] > 0) $author = self::getStormAuthor($s[1]['user_id']);
			if ( User::isLogged() && users::isFavorites($id) ) {
				$s[1]['stared'] = "1";
			} else {
				$s[1]['stared'] = "0";
			}
			$s[1]['author'] = $author['prenom']." ".$author['nom'];
			$s[1]['author_login'] = $author['login'];
			$s[1]['url'] = self::getUrl($s[1]['permaname']);
			return $s[1];
		} else { return null; }
	}
	
	public function getStormsByAuthor($from=0, $nb=null, $user_id) {
		$q = "SELECT s.* FROM storms s WHERE s.user_id = :user_id ORDER BY s.date DESC";
		if ( isset($nb) )
		{
			$q .= " LIMIT :from, :nb";
			$datas = array(':from' => $from, ':nb' => $nb, ':user_id' => $user_id);
		}
		else
		{
			$datas = array(':user_id' => $user_id);
		}
		//print $q;
		$storms = self::$db->q2($q, "public_storms.db", $datas);
		for($n=0; $n<sizeOf($storms); $n++)
		{
			$author = self::getStormAuthor($storms[$n]['user_id']);
			$storms[$n]['author'] = $author['prenom']." ".$author['nom'];
			$storms[$n]['author_login'] = $author['login'];
			$storms[$n]['url'] = self::getUrl($storms[$n]['permaname']);
			if( User::isLogged() && users::isFavorites($storms[$n]['storm_id']) ) {
				$storms[$n]['hearts'] = "1";
			}
		}
		return $storms;
	}
	
	public function getStormsByFavorites() {
		$liste = array();
		$storms = array();
		foreach( users::getMyFavorites() as $favorite ) {
			array_push($liste, $favorite["storm_id"]);
		}
		//print_r($favorites);
		$q = "SELECT s.* FROM storms s WHERE s.storm_id IN(".implode(",", $liste).") ORDER BY s.date DESC";
		//print $q;
		$storms = self::$db->q2($q, "public_storms.db", array());
		//print_r($storms);
		for($n=0; $n<sizeOf($storms); $n++)
		{
			$author = self::getStormAuthor($storms[$n]['user_id']);
			$storms[$n]['author'] = $author['prenom']." ".$author['nom'];
			$storms[$n]['author_login'] = $author['login'];
			$storms[$n]['url'] = self::getUrl($storms[$n]['permaname']);
			if( User::isLogged() ) {
				$storms[$n]['hearts'] = "1"; // always 1 because getMyFavorites return only the user faforites Storms
			}
		}
		return $storms;
	}
	
	public function getStormsByMostFavorites() {
		$storms = array();
		$tot = 6;
		#TODO 
		$q = "select storm_id, count(storm_id) as cpt from favorites group by storm_id order by cpt DESC limit ".$tot;
		//print $q;
		$storms = self::$db->q2($q, "users.db", array());
		$hearts = array(3,3,2,2,1,1);
		for($n=0; $n<sizeOf($storms); $n++) {
			$s = self::getStorm($storms[$n]['storm_id']);
			$storms[$n]['root'] = $s['root'];
			$storms[$n]['hearts'] = $hearts[$n];
			$storms[$n]['url'] = self::getUrl($s['permaname']);
			$storms[$n]['permaname'] = $s['permaname'];
			$storms[$n]['date'] = $s['date'];
			$storms[$n]['author'] = $s['author'];
			$storms[$n]['author_login'] = $s['author_login'];
		}
		//print_r($storms);
		return $storms;
	}
	
	public function getStormsByDate($from=0, $nb=null) {
		$q = "SELECT s.* FROM storms s ORDER BY s.date DESC";
		if ( isset($nb) )
		{
			$q .= " LIMIT :from, :nb";
			$datas = array(':from' => $from, ':nb' => $nb);
		}
		else
		{
			$datas = array();
		}
		//print $q;
		$storms = self::$db->q2($q, "public_storms.db", $datas);
		//unset($storms[0]);
		//print_r($storms);
		for($n=0; $n<sizeOf($storms); $n++)
		{
			$author = self::getStormAuthor($storms[$n]['user_id']);
			$storms[$n]['author'] = $author['prenom']." ".$author['nom'];
			$storms[$n]['author_login'] = $author['login'];
			$storms[$n]['url'] = self::getUrl($storms[$n]['permaname']);
			if( User::isLogged() && users::isFavorites($storms[$n]['storm_id']) ) {
				$storms[$n]['hearts'] = "1";
			}
		}
		return $storms;
	}
	
	public function getStormsByAlpha($from=0, $nb=null) {
		$q = "SELECT s.* FROM storms s ORDER BY LOWER(s.root) ASC";
		if ( isset($nb) )
		{
			$q .= " LIMIT :from, :nb";
			$datas = array(':from' => $from, ':nb' => $nb);
		}
		else
		{
			$datas = array();
		}
		//print $q;
		$storms = self::$db->q2($q, "public_storms.db", $datas);
		//unset($storms[0]);
		for($n=0; $n<sizeOf($storms); $n++)
		{
			$author = self::getStormAuthor($storms[$n]['user_id']);
			$storms[$n]['author'] = $author['prenom']." ".$author['nom'];
			$storms[$n]['author_login'] = $author['login'];
			if( User::isLogged() && users::isFavorites($storms[$n]['storm_id']) ) {
				$storms[$n]['hearts'] = "1";
			}
		}
		return $storms;
	}
	
	public function getStormsByMostActive($nb) {
		/* récupération des suggestions les plus nombreuses */
		//$suggestions = self::$db->q2("SELECT s.* FROM suggestions s GROUP BY s.storm_id LIMIT 0, :nb", "public_storms.db", array(':nb' => $nb));
		$suggestions = self::$db->q2("SELECT s.* FROM suggestions s WHERE s.date BETWEEN :from AND :to GROUP BY s.storm_id LIMIT 0, :nb", "public_storms.db", array(':nb' => $nb, ':from' => time()-(10*24*60*60), ':to' => time()));
		//print "->".$suggestions[0][2];
		//print_r($suggestions);
		//return self::getStorm($suggestions[0][2]);
		$mostActives = array();
		foreach($suggestions AS $s) {
			array_push($mostActives, self::getStorm($s[2]));		
		}
		//print_r($mostActives);
		return $mostActives;
	}
	
	public function getSuggestions($storm_id, $nb=null, $result_type=null) {
		if( !@isset($self->$suggestions[$storm_id]) ) {
			$u = Settings::getVar('BASE_URL_HTTP')."/storm/";
			//$suggestions = self::$db->q2("SELECT s.*, '".$u."' || s.suggestion || '/' as url, COUNT(s.suggestion) as nb FROM suggestions s WHERE s.storm_id = :storm_id GROUP BY LOWER(s.suggestion) ORDER BY nb DESC, s.date ASC LIMIT :nb", "public_storms.db", array(':nb' => $nb, ':storm_id' => $storm_id));
			$q = "SELECT s.*, '".$u."' || s.suggestion || '/' as url, COUNT(s.suggestion) as nb FROM suggestions s WHERE s.storm_id = %s GROUP BY LOWER(s.suggestion) ORDER BY nb DESC, s.date ASC";
			if( isset($nb) && $nb > 0 ) {
				$q .= " LIMIT ".$nb;
			}
			//$result_type = $result_type?$result_type:PDO::FETCH_BOTH; // defined&defaulted earlier
			//print $q;
			$suggestions[$storm_id] = self::$db->q($q, "public_storms.db", array($storm_id), $result_type);
			for($n=0; $n<sizeOf($suggestions[$storm_id]); $n++) {
				$author = self::getStormAuthor($suggestions[$storm_id][$n]['user_id']);
				$suggestions[$storm_id][$n]['author'] = $author['prenom']." ".$author['nom'];
				$suggestions[$storm_id][$n]['author_login'] = $author['login'];
				$suggestions[$storm_id][$n]['this_storm_id'] = self::getStormIdFromUrl($suggestions[$storm_id][$n]['suggestion']);
				$suggestions[$storm_id][$n]['url'] = $u.self::getSuggestionPermaname($suggestions[$storm_id][$n]['suggestion'])."/".urlencode($suggestions[$storm_id][$n]['suggestion'])."/";
			}
			//print "SELECT s.*, '".$u."' || s.suggestion || '/' as url, COUNT(s.suggestion) as nb FROM suggestions s WHERE s.storm_id = ".$storm_id." GROUP BY LOWER(s.suggestion) ORDER BY nb DESC, s.date ASC LIMIT ".$nb."<br />\n";
			//print_r($suggestions);
			unset($suggestions[$storm_id][0]);
			@$self->$suggestions[$storm_id] = $suggestions[$storm_id];
		}
		return @$self->$suggestions[$storm_id];
	}
	
	public function getStormAuthor($user_id) {
		if( isset($user_id) ) {
			$author = self::$db->q("SELECT u.* FROM users u WHERE u.user_id=%d", "users.db", array($user_id));
			unset($author[0]);
			return @is_array($author[1])?$author[1]:false;
		} else {
			return false;
		}
	}
	
	public function addSuggestion($storm_id, $suggestion, $user_id) {
		return self::$db->u("INSERT into suggestions (storm_id, user_id, suggestion, date) VALUES ('".$storm_id."', '".$user_id."', '".$suggestion."', '".time()."')", "public_storms.db", array());
	}
	
	public function getStormIdFromUrl($storm) {
		$s = self::$db->q("SELECT s.storm_id FROM storms s WHERE s.permaname = '%s'", "public_storms.db", array($storm));
		return @is_array($s[1])?$s[1]['storm_id']:null;
	}
	
	public function getNbStorms($user_id=null) {
		$q = "SELECT count(*) as c FROM storms s";
		if ( isset($user_id) ) {
			$q .= " WHERE s.user_id = :user_id";
			$datas = array(':user_id' => $user_id);
		} else {
			$datas = array();
		}
		$storms = self::$db->q2($q, "public_storms.db", $datas);
		return $storms[0]['c'];
	}
	
	public function getContributors($storm_id=null, $filter_user_id, $result_type=PDO::FETCH_BOTH) {
		//print "-->".$storm_id;
		$suggestions = @isset($self->$suggestions[$storm_id]) ? $self->$suggestions[$storm_id] : self::getSuggestions($storm_id, null, $result_type);
		//print_r($suggestions);
		$contributors = Array();
		foreach($suggestions as $s) {
			$s["author"] = $s["author"] == " " || $s["author"] == "" ? i18n::_("Anonyme") : $s["author"];
			$s["author_login"] = $s["author_login"] == " " || $s["author_login"] == "" ? "-anonymous-" : $s["author_login"];
			//print_r($s);
			if ( !in_multi_array($s["author_login"], $contributors) ) {
				array_push($contributors, array("author_login" => $s["author_login"], "author" => $s["author"]));
			}
		}
		//print_r($contributors);
		return $contributors;
	}
	
	public function getNbSuggestionsFromUserId($storm_id=null, $user_id=null) {
		if ( !isset($user_id) || !isset($storm_id) )
		{
			return 0;
		}
		$datas = array(':user_id' => $user_id, ':storm_id' => $storm_id);
		$q = "SELECT count(*) as c FROM suggestions s WHERE s.user_id = :user_id AND s.storm_id = :storm_id";
		//print $q.$storm_id.$user_id;
		$suggestions = self::$db->q2($q, "public_storms.db", $datas);
		return $suggestions[0]['c'];
	}
	
	public function getRandomStorm($nb=1) {
		$random = self::$db->q2("SELECT s.* FROM storms s ORDER BY RANDOM() LIMIT :nb", "public_storms.db", array(':nb' => $nb));
		return @is_array($random[0])?self::getStorm($random[0]['storm_id']):null;
	}
}


function modifier_url($string) {
	$string    = utf8_encode(
			strtr(
				utf8_decode($string),
				utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ. "),
				"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn--"
			)
		);
	$string    = htmlentities(strtolower($string));
	//$string    = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($string));
	$string    = trim($string, "-");
	return $string;
}

// Function for looking for a value in a multi-dimensional array
function in_multi_array($value, $array) {   
    foreach ($array as $key => $item)
    {       
        // Item is not an array
        if (!is_array($item))
        {
            // Is this item our value?
            if ($item == $value) return true;
        }
      
        // Item is an array
        else
        {
            // See if the array name matches our value
            //if ($key == $value) return true;
          
            // See if this array matches our value
            if (in_array($value, $item)) return true;
          
            // Search this array
            else if (in_multi_array($value, $item)) return true;
        }
    }
  
    // Couldn't find the value in array
    return false;
}
?>
