<?php
/* This file is part of BBClone (A PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/mark_page.php,v 1.101 2009/06/21 07:33:07 joku Exp $
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

// Only mark an page-access once
if (!defined("_MARK_PAGE")) define("_MARK_PAGE", "1");
else return;

// Read our constants
if ((!defined("_BBCLONE_DIR")) || (!is_readable(_BBCLONE_DIR."constants.php"))) return;
else require_once(_BBCLONE_DIR."constants.php");

// Check for PHP-Version
if ((_BBC_PHP < 404) || !extension_loaded("pcre")) {
  exit("<hr /><b>Error:</b> Your PHP installation doesn't meet the minimum requirements for running BBClone.");
}

// Read utility-files for data-storage
foreach (array($BBC_LIB_PATH."io.php", $BBC_LIB_PATH."marker.php", $BBC_CONFIG_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else {
    if (empty($BBC_DEBUG)) return;
    else exit(bbc_msg($i));
  }
}

// locking features
if (extension_loaded("sysvsem") && stristr("sem", $BBC_USE_LOCK)) define("_BBC_SEM", 1);
if (extension_loaded("dio") && stristr("dio", $BBC_USE_LOCK)) define("_BBC_DIO", 1);
if (!defined("_BBC_SEM") && !defined("_BBC_DIO") || stristr("flk", $BBC_USE_LOCK)) define("_BBC_FLK", 1);
// encoding features
if (extension_loaded("iconv")) define("_BBC_ICONV", 1);
if (extension_loaded("mbstring")) define("_BBC_MBSTRING", 1);
if (extension_loaded("recode")) define("_BBC_RECODE", 1);

if (!function_exists("flock") && (stristr("flk", $BBC_USE_LOCK) !== false)) {
  if (empty($BBC_DEBUG)) return;
  else exit(bbc_msg("", "l"));
}

if (!is_readable($BBC_CACHE_PATH)) {
  if (empty($BBC_DEBUG)) return;
  else exit(bbc_msg($BBC_CACHE_PATH));
}

ignore_user_abort(1);

// Don't write to counter files if we want to reset stats
if (empty($BBC_KILL_STATS)) {
  // needs to be always executed because otherwise our counter wouldn't work
  // any longer by the time $BBC_DEBUG was activated
  $i = bbc_exec_marker();

  // Don't process anything unless we are told to do so
  if (!defined("_OK")) {
    if (empty($BBC_DEBUG)) return ignore_user_abort(0);
    else exit($i);
  }
  else !empty($BBC_DEBUG) ? print($i) : "";
}

foreach (array("ACCESS_FILE", "LAST_FILE", "LOCK") as $i) {
  if (!is_readable(${"BBC_".$i})) {
    if (empty($BBC_DEBUG)) return ignore_user_abort(0);
    else exit(bbc_msg(${"BBC_".$i}));
  }
  if (!is_writable(${"BBC_".$i})) {
    if (empty($BBC_DEBUG)) return ignore_user_abort(0);
    else exit(bbc_msg(${"BBC_".$i}, "w"));
  }
}

// Kill'em all if requested and return
if (!empty($BBC_KILL_STATS)) {
  bbc_kill_stats();

  if (empty($BBC_DEBUG)) return ignore_user_abort(0);
  else exit(bbc_msg("", "k"));
}

if (filesize($BBC_LOCK) !== 0) {
  ($BBC_TIMESTAMP - filemtime($BBC_LOCK) > 30) ? fclose(fopen($BBC_LOCK, "wb")) : "";
  return ignore_user_abort(0);
}

if ($BBC_TIMESTAMP <= filemtime($BBC_ACCESS_FILE)) return ignore_user_abort(0);

foreach (array($BBC_LOG_PROCESSOR, $BBC_LIB_PATH."new_connect.php", $BBC_LIB_PATH."timecalc.php",
               $BBC_LIB_PATH."referrer.php", $BBC_LIB_PATH."charconv.php") as $i) {
  if (!is_readable($i)) {
    if (empty($BBC_DEBUG)) return ignore_user_abort(0);
    else exit(bbc_msg($i));
  }
  else require_once($i);
}

foreach (array("browser", "os", "robot", "bonus") as $i) {
  if (!is_readable($BBC_LIB_PATH.$i.".php")) {
    if (empty($BBC_DEBUG)) return ignore_user_abort(0);
    else exit(bbc_msg($BBC_LIB_PATH.$i.".php"));
  }
}

// write to lockfile
if (($a = bbc_get_lock($BBC_LOCK)) && bbc_write_data($a, "1")) {
  clearstatcache();
  require($BBC_ACCESS_FILE);
  require($BBC_LAST_FILE);

  // cleanup if requested
  if (!empty($BBC_PURGE_SINGLE)) bbc_purge_single();

  // reset ranking if it's set to "0"
  foreach (array("HOST" => "host", "KEY" => "key", "ORIGIN" => "referer", "PAGE" => "page") as $i => $j) {
    if (empty(${"BBC_MAX".$i}) && isset($access)) {
      $access[$j] = array();

      if (isset($last)) unset($last);
    }
  }

  if (isset($access)) {
    // updates
    if (isset($access['time']) && is_array($access['time'])) bbc_time_offset();
    if (!isset($access['bbc048b'])) bbc_update();
  }

  // global and time stats
  if (($b = bbc_get_lock($BBC_ACCESS_FILE)) && ($c = bbc_get_lock($BBC_LAST_FILE)) &&
      ($new_access = bbc_counter_to_array())) {
    bbc_add_new_connections($new_access);
    bbc_update_last();
    bbc_write_data($b, "<?php\n\$access =\n".bbc_array_to_str($access).";\n?>");
    bbc_write_data($c, "<?php\n\$last =\n".bbc_array_to_str($last).";\n?>");

    if (!empty($BBC_DEBUG)) print(bbc_msg(basename($BBC_ACCESS_FILE), "o"));
    if (!empty($BBC_DEBUG)) print(bbc_msg(basename($BBC_LAST_FILE), "o"));
  }
}
else (!empty($BBC_DEBUG) ? print(bbc_msg("", "l")) : "");

// once we've finished we unlock and truncate the lock file
fclose(fopen($BBC_LOCK, "wb"));
ignore_user_abort(0);

// Exit if debug mode is turned on.
if (!empty($BBC_DEBUG)) exit();
?>