<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/index.php,v 1.10 2009/06/21 07:33:07 joku Exp $
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

// Default output.
if (is_readable(dirname(__FILE__)."/show_global.php")) include_once(dirname(__FILE__)."/show_global.php");
else{print "error reading: ".dirname(__FILE__)."/show_global.php";}
?>
