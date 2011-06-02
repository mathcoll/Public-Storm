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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Public-Storm. If not, see <http://www.gnu.org/licenses/>.
*/

$sPlug = new Settings::$VIEWER_TYPE;


$uri = split('/', $_SERVER['REQUEST_URI']);
#$id = array_pop($uri); # TODO : ca retourne rien ???!!!!

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}


if ( $uid = $uri[$ind+1] )
{
	$articles = articles::getDatas($uid);
	
	Settings::setVar('title', $articles{'title'});
	Settings::setVar('description', '&nbsp;');
	Settings::setVar('template', 'main.tpl');
	$sPlug->AddData("title", Settings::getVar('title'));
	#$sPlug->->AddData("i18n", i18n::getLng());
	//$sPlug->AddData("article", articles::getArticle($id));
	$sPlug->AddData("content", $articles{'content'});
	
	$breadcrumb = Settings::getVar('breadcrumb');
	array_push($breadcrumb, array("name" => "Articles", "link" => Settings::getVar('base_url_http')."/articles/"));
	array_push($breadcrumb, array("name" => Settings::getVar('title')));
	Settings::setVar('breadcrumb', $breadcrumb);
	$content = $sPlug->fetch("article.tpl", "plugins/articles");
}
else
{
	$articles = articles::getArticlesTitles();
	
	Settings::setVar('title', $articles{'title'});
	Settings::setVar('description', '&nbsp;');
	Settings::setVar('template', 'main.tpl');
	$sPlug->AddData("title", Settings::getVar('title'));
	#$sPlug->->AddData("i18n", i18n::getLng());
	//$sPlug->AddData("article", articles::getArticle($id));
	$sPlug->AddData("articles", $articles);
	
	$breadcrumb = Settings::getVar('breadcrumb');
	array_push($breadcrumb, array("name" => "Articles"));
	Settings::setVar('breadcrumb', $breadcrumb);
	$content = $sPlug->fetch("liste_articles.tpl", "plugins/articles");
}



?>