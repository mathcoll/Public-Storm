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

if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}


$storm = $uri[$ind+2];
try{
	users::addToFavorites(public_storm::getStormIdFromUrl($storm));
	$_SESSION["message"] = i18n::_("Le Storm '%s' à été ajouté à vos favoris !", array($storm));
} catch(Exception $e) {
	$_SESSION["message"] = i18n::_("Une erreur est survenue !");
}

if ( isset($_SERVER['HTTP_REFERER']) ) {
	header("HTTP/1.1 302 Moved temporarily", false, 302);
	header("Location: ".$_SERVER['HTTP_REFERER'], false, 302);
} else {
	$_SESSION["message"] = "";
	header("HTTP/1.1 302 Moved temporarily", false, 302);
	header("Location: ".Settings::getVar('BASE_URL_HTTP'), false, 302);
}
exit;
?>