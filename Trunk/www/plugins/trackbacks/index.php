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

include_once("./core.php");

header("Content-Type: text/xml", true, 200);
include_once("./plugins/trackbacks/classes/trackback_cls.php");
$trackback = new Trackback(Settings::getVar('SITE_NAME'), Settings::getVar('RSS_WEBMASTER'), "UTF-8");



$d = !$_POST ? $_GET : $_POST;

$trackback->post_id = $d['post_id'];
$trackback->url = $d['url'];
$trackback->title = $d['title'];
$trackback->excerpt = $d['excerpt'];
$trackback->blog_name = $d['blog_name'];


/*
trackbacks::addTB($d['title'], $d['url'], $d['expert'], $d['author']);
$fp = fopen("./datas/tb.txt", "w+");
fwrite($fp, "-------->".$d['url']."\n");
fclose($fp);
exit;
*/




if( false /*akismet_spam::isSpam($d['post_id'], $d['url'], $d['title'], $d['excerpt'], $d['blog_name'])*/ )
{
	print $trackback->recieve(false, i18n::_("Erreur, SPAM détecté"));
}
else
{
	if ( $d['title'] != NULL && $d['url'] != NULL )
	{
		if ( trackbacks::addTB($d['title'], $d['url'], $d['excerpt'], $d['blog_name']) == 1 )
		{
			print $trackback->recieve(true);
		}
		else
		{
			print $trackback->recieve(false, i18n::_("Erreur interne"));
		}
	}
	else
	{
		print $trackback->recieve(false, i18n::_("Erreur, vous devez au moins fournir le titre et l'url !"));
	}
}

exit;

?>