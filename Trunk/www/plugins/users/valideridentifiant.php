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

 Project started on 2008-11-22 with help from Serg Podtynnyi
 <shtirlic@users.sourceforge.net>
 */

include_once("./core.php");
$login = $_GET["login"];
if ( $user = User::userExists($login) ) {
	print "Error user exists (".$user['id'].")";
}
exit;
?>