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
 */



if (
	preg_match('/feedburner/i', $_SERVER['HTTP_USER_AGENT'])
)
{
	header("Location: ".Settings::getVar('base_url_http').'/rss/index.php');
}
else
{
	Settings::$rssfeed_url = $plugin_feed_url;
	header("Location: ".Settings::getVar('rssfeed_url'));
}

?>