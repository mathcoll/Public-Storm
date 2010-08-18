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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Public-Storm. If not, see <http://www.gnu.org/licenses/>.
*/

final class articles extends Plugins
{
  public static $subdirs = array('articles');
  public static $name = "articles";
  public static $db;
 
public function __construct()
{
if ( !class_exists(Settings::$DB_TYPE) )
{
Debug::Log("Classe introuvable : ".Settings::$DB_TYPE, ERROR);
}
else
{
if ( self::$db = new Settings::$DB_TYPE)
{
self::$db = new PDO("sqlite:./datas/articles.db");
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

public function getSubDirs()
{
return self::$subdirs;
}

public function getIcon()
{
return parent::getIcon(self::$name);
}

public function getStatus()
{
return parent::getStatus(self::$name);
}

public static function escape_string($str)
{
return mysql_escape_string($str);
}

public function getArticlesTitles($lang=NULL)
{
$lang = isset($lang) ? $lang : $_SESSION['LANG'];
$q = 'SELECT title, uid FROM articles a, articles_meta_datas amd WHERE (a.article_id = amd.article_id) AND (amd.meta_name = "lang") AND (amd.meta_value="%s")';
$query = sprintf(
$q,
self::escape_string($lang)
);
//print $query."<br />";
$result = self::$db->query($query);
if ( !$result ) die ("Erreur 1".$query);

$r = array();
$n=0;
while ( $row = $result->fetch() )
{
$r[$n]['title'] = $row['title'];
$r[$n]['uid'] = $row['uid'];
$n++;
}
return $r;
}

public function getDatas($uid=NULL, $lang=NULL)
{
$lang = isset($lang) ? $lang : $_SESSION['LANG'];
$q = 'SELECT title, content FROM articles a, articles_meta_datas amd WHERE (a.uid="%s") AND (a.article_id = amd.article_id) AND (amd.meta_name = "lang") AND (amd.meta_value="%s") LIMIT 1';
$query = sprintf(
$q,
self::escape_string($uid),
self::escape_string($lang)
);
#print $query."<br />";
$result = self::$db->query($query);
if ( !$result ) die ("Erreur 2".$query);

$r = array();
while ( $row = $result->fetch() )
{
$r['title'] = $row['title'];
$r['content'] = $row['content'];
$n++;
}
return $r;
}
}


?>