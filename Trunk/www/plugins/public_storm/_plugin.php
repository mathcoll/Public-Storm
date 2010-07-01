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

final class public_storm extends Plugins
{
 	public static $subdirs = array(
 		'storm',
 		'storms',
 		'stormExport',
 	);
 	public static $name = "public_storm";
	public static $db;
	public function __construct()
	{
		require(Settings::getVar('prefix') . 'conf/public_storm.php');
		self::loadLang();
		if ( !class_exists(Settings::$DB_TYPE) )
		{
			Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR);
		}
		else
		{
			if ( self::$db = new Settings::$DB_TYPE )
			{
				return true;
			}
			else
			{
				Debug::Log($err, ERROR);
				return false;
				exit($err);
			}
		}
	}
	
	public function getStormsFromSuggestion($suggestion, $storm_id)
	{
		return self::$db->q2("SELECT storm_id FROM suggestions WHERE suggestion = :suggestion AND storm_id != :storm_id", "public_storms.db", array($suggestion, $storm_id));
	}
	
	
	public function getUrl($storm_root)
	{
		return Settings::getVar('BASE_URL_HTTP')."/storm/".strToLower($storm_root)."/";
	}
	
	public function loadLang()
	{
		return parent::loadLang(self::$name);
	}	
	
	public function getVersion()
	{
		return parent::getVersion();
	}
	
	public function getName()
	{
		return self::$name;
	}
	
	public function getDescription()
	{
		return parent::getDescription();
	}
	
	public function getAuthor()
	{
		return self::getAuthor();
	}
	
	public function getIcon()
	{
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
	
	
	public function addStorm($permaname, $date, $root, $user_id)
	{
		//print "INSERT into storms (permaname, date, root, user_id) VALUES ('".strToLower($permaname)."', '".$date."', '".strToLower($root)."', '%d')";
		return self::$db->u("INSERT into storms (permaname, date, root, user_id) VALUES ('".strToLower($permaname)."', '".$date."', '".strToLower($root)."', '%d')", "public_storms.db", array($user_id));
	}
	
	public function getStorm($id, $nb=20)
	{
		if( isset($id) && $id != 0 ) {
			$s = self::$db->q("SELECT s.* FROM storms s WHERE s.storm_id=%d", "public_storms.db", array($id));
			//$s = self::$db->q2("SELECT s.* FROM storms s WHERE s.storm_id=:id", "public_storms.db", array(":id" => $id));
			$s[1]['suggestions'] = self::getSuggestions($id, $nb);
			$author = self::getStormAuthor($s[1]['user_id']);
			$s[1]['author'] = $author['prenom']." ".$author['nom'];
			$s[1]['author_login'] = $author['login'];
			$s[1]['url'] = self::getUrl($s[1]['permaname']);
			return $s[1];
		} else { return null; }
	}
	
	public function getStormsByAuthor($from=0, $nb=null, $user_id)
	{
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
		}
		return $storms;
	}
	
	public function getStormsByDate($from=0, $nb=null)
	{
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
		}
		return $storms;
	}
	
	public function getStormsByAlpha($nb=null)
	{
		$q = "SELECT s.* FROM storms s ORDER BY LOWER(s.root) ASC";
		if ( isset($nb) )
		{
			$q .= " LIMIT 0, :nb";
			$datas = array(':nb' => $nb);
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
		}
		return $storms;
	}
	
	public function getStormsByMostActive($nb)
	{
		/* récupération des suggestions les plus nombreuses */
		//$suggestions = self::$db->q2("SELECT s.* FROM suggestions s GROUP BY s.storm_id LIMIT 0, :nb", "public_storms.db", array(':nb' => $nb));
		$suggestions = self::$db->q2("SELECT s.* FROM suggestions s WHERE s.date BETWEEN :from AND :to GROUP BY s.storm_id LIMIT 0, :nb", "public_storms.db", array(':nb' => $nb, ':from' => time()-(30*24*60*60), ':to' => time()));
		//print "->".$suggestions[0][2];
		//print_r($suggestions);
		//return self::getStorm($suggestions[0][2]);
		$mostActives = array();
		foreach($suggestions AS $s)
		{
			array_push($mostActives, self::getStorm($s[2]));		
		}
		//print_r($mostActives);
		return $mostActives;
	}
	
	public function getSuggestions($storm_id, $nb)
	{
		$u = Settings::getVar('BASE_URL_HTTP')."/storm/";
		//$suggestions = self::$db->q2("SELECT s.*, '".$u."' || s.suggestion || '/' as url, COUNT(s.suggestion) as nb FROM suggestions s WHERE s.storm_id = :storm_id GROUP BY LOWER(s.suggestion) ORDER BY nb DESC, s.date ASC LIMIT :nb", "public_storms.db", array(':nb' => $nb, ':storm_id' => $storm_id));
		$suggestions = self::$db->q("SELECT s.*, '".$u."' || s.suggestion || '/' as url, COUNT(s.suggestion) as nb FROM suggestions s WHERE s.storm_id = %s GROUP BY LOWER(s.suggestion) ORDER BY nb DESC, s.date ASC LIMIT ".$nb, "public_storms.db", array($storm_id));
		for($n=0; $n<sizeOf($suggestions); $n++)
		{
			$author = self::getStormAuthor($suggestions[$n]['user_id']);
			$suggestions[$n]['author'] = $author['prenom']." ".$author['nom'];
			$suggestions[$n]['author_login'] = $author['login'];
		}
		//print_r($suggestions);
		unset($suggestions[0]);
		return $suggestions;
	}
	
	public function getStormAuthor($user_id)
	{
		$author = self::$db->q("SELECT u.* FROM users u WHERE u.user_id=%d", "users.db", array($user_id));
		unset($author[0]);
		return $author[1];
	}
	
	public function addSuggestion($storm_id, $suggestion, $user_id)
	{
		return self::$db->u("INSERT into suggestions (storm_id, user_id, suggestion, date) VALUES ('".$storm_id."', '".$user_id."', '".$suggestion."', '".time()."')", "public_storms.db", array());
	}
	
	public function getStormIdFromUrl($storm)
	{
		$s = self::$db->q("SELECT s.storm_id FROM storms s WHERE s.permaname = '%s'", "public_storms.db", array($storm));
		return $s[1]['storm_id'];
	}
	
	public function getNbStorms($user_id=null)
	{
		$q = "SELECT count(*) as c FROM storms s";
		if ( isset($user_id) )
		{
			$q .= " WHERE s.user_id = :user_id";
			$datas = array(':user_id' => $user_id);
		}
		else
		{
			$datas = array();
		}
		$storms = self::$db->q2($q, "public_storms.db", $datas);
		return $storms[0]['c'];
	}
}


function modifier_url($string)
{
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

?>
