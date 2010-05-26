<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_language_todo.php,v 1.8 2009/06/21 07:33:08 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_LIB_PATH."html.php") as $i) {
  if (is_readable($i)) require_once($i);
  else {
    if (!empty($BBC_DEBUG)) exit(bbc_msg($i));
    else return;
  }
}

// Determine whether we are allowed to display development features
if (empty($BBC_DEVELOPER_INSTALLATION)) die("<h3>BBClone $BBC_VERSION</h3>\n<hr />\n".$_['error_cannot_see_development']."\n");

// Read the default language and store it's information in $compare_to
define("REFERENCE_LANG", "en");
require($BBC_LANGUAGE_PATH.REFERENCE_LANG.".php");
$compare_to = $_;
reset($_);

// Read all languages
$dp = @opendir($BBC_LANGUAGE_PATH);
if (!$dp) exit("<hr /><b>Error:</b>Could not find directory: ".$BBC_LANGUAGE_PATH.".");

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    ."<tr>\n<td class=\"detbox\" align=\"center\" valign=\"middle\">\n"
    ."<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"white-space: nowrap\" width=\"100%\">\n"
    ."<tr><td class=\"head\">Language</td><td class=\"head\">Missing Items</td></tr>\n";

$problems = array();
while (false !== ($file = readdir($dp))) {
	// drop curdir and updir
	if (($file != ".") && ($file != "..")) {
		// read only php-files
		if ((!is_dir($BBC_LANGUAGE_PATH."/".$file)) && (substr($file, -4, 4) == '.php')) {
			$current_lang = substr($file, 0, -4);
			if ($current_lang == REFERENCE_LANG) continue;
			require($BBC_LANGUAGE_PATH.$current_lang.".php");
			foreach ($compare_to as $i) {
				while (list(${$i."_name"}, ${$i."_elem"}) = each($compare_to)) {
					if (!isset($_[${$i."_name"}])) {
						$problems[$current_lang]['lang'] = $current_lang;
						if (!isset($problems[$current_lang]['count']))
							$problems[$current_lang]['count'] = 1;
						else
							$problems[$current_lang]['count']++;
						if (!isset($problems[$current_lang]['missing']))
							$problems[$current_lang]['missing'] = ${$i."_name"};
						else
							$problems[$current_lang]['missing'] .= ", ".${$i."_name"};
					}
				}
			}
			unset($current_lang);
			unset($_);
		}
	}
}

$overall_count = 0;

// show the problems we just discovered
foreach ($problems as $problem) {
	echo '<tr style="background-color: #e0e5f2" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'"><td class="rows">'.$problem['lang'].' has '.$problem['count'].' missing items:</td><td class="rows">'.substr($problem['missing'], 2)."</td></tr>\n";
	$overall_count += $problem['count'];
}
	echo '<tr style="background-color: #e0e5f2" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'"><td class="rows">Overall missing items:</td><td class="rows">'.$overall_count."</td></tr>\n";

require($BBC_LANGUAGE_PATH.REFERENCE_LANG.".php");
echo "</table>\n"
    ."</td>\n</tr>\n</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();

?>
