<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_config.php,v 1.64 2009/06/21 07:33:07 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php") as $i) {
  if (is_readable($i)) require_once($i);
  else {
    if (!empty($BBC_DEBUG)) exit(bbc_msg($i));
    else return;
  }
}

// Determine whether we are allowed to display show_config.php
if (empty($BBC_SHOW_CONFIG)) die("<h3>BBClone $BBC_VERSION</h3>\n<hr />\n".$_['error_cannot_see_config']."\n");

// MAIN

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    ."<table align=\"center\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"640\">\n"

    ."<tr>\n"
    ."<td class=\"cntbox\" align=\"center\" valign=\"middle\">\n"
    ."<table class=\"collapse\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"100%\">\n"

// TABLE TITLES
    ."<tr>\n"
    ."<td class=\"head\" width=\"20%\">".$_['config_Variable_name']."</td>\n"
    ."<td class=\"head\" width=\"60%\">".$_['config_Explanations']."</td>\n"
    ."<td class=\"head\" width=\"20%\">".$_['config_Variable_value']."</td>\n"
    ."</tr>\n"
// $BBC_MAINSITE
    .$bbc_html->show_var("mainsite")
// $BBC_SHOW_CONFIG
    .$bbc_html->show_var("show_config", 0)
// $BBC_TITLEBAR
    .$bbc_html->show_var("titlebar")
// $BBC_LANGUAGE
    .$bbc_html->show_var("language")
// $BBC_MAXTIME
    .$bbc_html->show_var("maxtime")
// $BBC_MAXVISIBLE
    .$bbc_html->show_var("maxvisible")
// $BBC_DETAILED_STAT_FIELDS
    .$bbc_html->show_var("detailed_stat_fields")
// $BBC_TIME_OFFSET
    .$bbc_html->show_var("time_offset")
// $BBC_NO_DNS
    .$bbc_html->show_var("no_dns", 0)
// $BBC_NO_HITS
    .$bbc_html->show_var("no_hits", 0)
// $BBC_IGNORE_IP
    .$bbc_html->show_var("ignore_ip")
// $BBC_IGNORE_REFER
    .$bbc_html->show_var("ignore_refer")
// $BBC_IGNORE_BOTS
    .$bbc_html->show_var("ignore_bots")
// $BBC_IGNORE_AGENT
    .$bbc_html->show_var("ignore_agent", 0)
// $BBC_KILL_STATS
    .$bbc_html->show_var("kill_stats", 0)
// $BBC_PURGE_SINGLE
    .$bbc_html->show_var("purge_single", 0)

    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"

    ."</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
?>
