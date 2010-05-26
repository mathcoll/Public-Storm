<?php

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