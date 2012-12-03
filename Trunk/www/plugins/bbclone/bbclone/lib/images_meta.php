<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/images_meta.php,v 1.2 2009/06/21 07:33:09 joku Exp $
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

// Check for PHP 4.0.3 or older
if (!function_exists("array_sum")) exit("<hr /><b>Error:</b> PHP ".PHP_VERSION." is too old for BBClone.");
elseif (is_readable("constants.php")) require_once("constants.php");
else return;

foreach (array($BBC_CONFIG_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// filename for additional information on the theme
define("filename", "ext.txt");
$filename = $BBC_IMAGES_PATH.$BBC_EXT_IMAGES.filename;

// read the file
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);

// read the width
eregi("width:([0-9]{1,3})", $contents, $regs);
$ext_width = $regs[1];

eregi("height:([0-9]{1,3})", $contents, $regs);
$ext_height = $regs[1];

?>
