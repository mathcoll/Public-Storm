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



$sPlug = new Settings::$VIEWER_TYPE;
Settings::setVar('template', 'main.tpl');

if ( $_POST )
{
	if ( $host = $_POST['host'] && $database = $_POST['database'] && $user = $_POST['user'] )
	{
		install::buildDbFile(DB_CONF_FILE, $_POST);
		$content = $sPlug->fetch("install.2.tpl", "plugins/install");
	}
	else
	{
		$content = $sPlug->fetch("install.3.tpl", "plugins/install");
	}
}
else
{
	$content = $sPlug->fetch("install.1.tpl", "plugins/install");
}
?>