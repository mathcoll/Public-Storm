<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_icon_todo.php,v 1.3 2009/06/21 07:33:08 joku Exp $
 *
 * Copyright (C) 2001-2009, the BBClone Team (see file doc/authors.txt
 * distributed with this library)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * See doc/copying.txt for details
 */

if (is_readable("constants.php")) require_once("constants.php");
else die("Could not read constants");

if (is_readable($BBC_LANGUAGE_PATH."en.php")) require_once($BBC_LANGUAGE_PATH."en.php");
else die("Could not read english language");

$_keys = array_keys($_);

$not_readable_ext_ = 0;
$not_readable_ext2 = 0;

echo '<table>'.chr(13);
for ($i = 8; $i < 274; $i++) {
	echo '<tr>
<td>'.$_keys[$i].'</td><td><a href="http://en.wikipedia.org/wiki/'.$_[$_keys[$i]].'">'.$_[$_keys[$i]].'</a></td>
<td><img src="images/ext_'.$_keys[$i].'.png" /></td>
<td><img src="images/ext2/'.$_keys[$i].'.png" /></td>
</tr>'.chr(13);

	if (!is_readable('images/ext2/'.$_keys[$i].'.png')) {
		$not_readable_ext2++;
	}

	if (!is_readable('images/ext_'.$_keys[$i].'.png')) {
		$not_readable_ext_++;
	}
}

if ($not_readable_ext_ > 0) {
	echo 'Failed on '.$not_readable_ext_.' of '.(274-8).' files on ext_.<br/>';
} else {
	echo 'All is fine with ext_.<br/>';
}

if ($not_readable_ext2 > 0) {
	echo 'Failed on '.$not_readable_ext2.' of '.(274-8).' files on ext2.('.number_format($not_readable_ext2/((266)/100), 2).'%)<br/>';
} else {
	echo 'All is fine with ext2.<br/>';
}

?>
