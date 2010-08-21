<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/constants.php,v 1.113 2009/09/17 10:15:22 joku Exp $
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

$vars = array(
  "BBC_ACCESS_FILE", "BBC_CACHE_PATH", "BBC_CONFIG_FILE", "BBC_CONF_PATH", "BBC_COUNTER_COLUMNS", "BBC_COUNTER_FILES",
  "BBC_COUNTER_PREFIX", "BBC_COUNTER_SUFFIX", "BBC_CUSTOM_CHARSET", "BBC_DEBUG", "BBC_DETAILED_STAT_FIELDS",
  "BBC_IGNORE_AGENT", "BBC_IGNORE_BOTS", "BBC_IGNORE_IP", "BBC_IGNORE_REFER", "BBC_IMAGES_PATH", "BBC_IP2EXT_PATH",
  "BBC_KILL_STATS", "BBC_LANGUAGE", "BBC_LANGUAGE_PATH", "BBC_LAST_FILE", "BBC_LIB_PATH", "BBC_LOCK",
  "BBC_LOG_PROCESSOR", "BBC_MAINSITE", "BBC_MAXBROWSER", "BBC_MAXEXTENSION", "BBC_MAXHOST", "BBC_MAXKEY",
  "BBC_MAXORIGIN", "BBC_MAXOS", "BBC_MAXPAGE", "BBC_MAXROBOT", "BBC_MAXTIME", "BBC_MAXVISIBLE", "BBC_NO_DNS",
  "BBC_NO_HITS", "BBC_NUM_SIZE", "BBC_PURGE_SINGLE", "BBC_ROOT_PATH", "BBC_SEP", "BBC_SHOW_CONFIG",
  "BBC_SUBTITLE_SIZE", "BBC_TEXT_SIZE", "BBC_TIMESTAMP", "BBC_TIME_OFFSET", "BBC_TITLEBAR", "BBC_TITLE_SIZE",
  "BBC_USE_LOCK", "BBC_VERSION", "access", "a", "b", "c", "d", "al", "last"
);

// Make sure it's only us who's defining variables
foreach ($vars as $i) if (isset($$i)) unset($$i);

// The version number of BBCLONE
$BBC_VERSION = "0.4.9d";
// BBClone's location relative from where it's been called
$BBC_ROOT_PATH = defined("_BBCLONE_DIR") ? _BBCLONE_DIR : dirname(__FILE__)."/";
// Directory paths
$BBC_CACHE_PATH  = $BBC_ROOT_PATH."var/";
$BBC_CONF_PATH = $BBC_ROOT_PATH."conf/";
$BBC_CSS_PATH = "css/";
$BBC_IMAGES_PATH = "images/";
$BBC_IP2EXT_PATH  = $BBC_ROOT_PATH."ip2ext/";
$BBC_LANGUAGE_PATH = $BBC_ROOT_PATH."language/";
$BBC_LIB_PATH  = $BBC_ROOT_PATH."lib/";
// File paths
$BBC_ACCESS_FILE = $BBC_CACHE_PATH."access.php";
$BBC_CONFIG_FILE = $BBC_CONF_PATH."config.php";
$BBC_LAST_FILE = $BBC_CACHE_PATH."last.php";
$BBC_LOCK = $BBC_CACHE_PATH.".htalock";
$BBC_LOG_PROCESSOR = $BBC_ROOT_PATH."log_processor.php";
// name of the counter files
$BBC_COUNTER_PREFIX = "counter";
$BBC_COUNTER_SUFFIX = ".inc";
// How many columns they contain
$BBC_COUNTER_COLUMNS = 8;
// What titles are assigned to them
$BBC_COUNTER_COLUMN_NAMES = array("time", "prx_ip", "ip", "dns", "agent", "referer", "uri", "page");
// Amount of counter files
$BBC_COUNTER_FILES = 16;
// Global separator
$BBC_SEP = chr(173);
// Timestamp at runtime
$BBC_TIMESTAMP = time();

///////////////////////////////////////////////////////////////////////
// Do not touch the stuff below if you have no clue what it's doing! //
///////////////////////////////////////////////////////////////////////

// PHP version number
define("_BBC_PHP", substr(str_replace(".", "", PHP_VERSION), 0, 3));

// Message handling, needs to be globally available
function bbc_msg($item, $state = "r") {
  global $BBC_VERSION, $BBC_LOCK;

  $begin = "<hr /><b>BBClone ".(!empty($BBC_VERSION) ? $BBC_VERSION : "unknown")." debug mode:</b><br />";
  $end = "<hr /><i>Set &#36;BBC_DEBUG = &quot;&quot;; in config.php to turn off debug mode again.</i>\n";

  switch ($state) {
    case "i":
      $msg = $begin."BBClone is ignoring this hit because it matches up against an entry in your &#36;BBC_IGNORE_IP "
            ."list";
      break;

    case "k":
      $msg = $begin."It seems that BBClone has been successfully reset. If you keep getting this message despite "
            ."access.php and last.php remain untouched, it means the file system is denying access and returning a "
            ."flag PHP doesn't understand. On Windows NT/2k/XP/2k3 the problem will occur with PHP 4.x if the var "
            ."directory only has read permissions.";
      break;

    case "l":
      $msg = $begin."BBClone isn't able to lock files for writing with its current setting. You may ";

      if (extension_loaded("sysvsem")) $msg .= "use &#36;BBC_USE_LOCK = &quot;sem&quot;; in config.php however";
      elseif (extension_loaded("dio")) $msg .= "use &#36;BBC_USE_LOCK = &quot;dio&quot;; in config.php however";
      elseif (function_exists("flock")) {
        $msg .= "use &#36;BBC_USE_LOCK = &quot;flk&quot;; however. If that's your very setting already, it means that "
               ."you cannot use BBClone with your current server settings";
      }
      else $msg .= "not be able to run BBClone with your current server settings.";
      break;

    case "o":
      $msg = $begin."It seems that BBClone has successfully written to file ".$item.". If you keep getting this "
            ."message despite access.php and last.php remain empty, it means the file system is denying access and "
            ."returning a flag PHP doesn't understand. On Windows NT/2k/XP/2k3 the problem will occur with PHP 4.x if "
            ."the var directory only has read permissions.";
      break;

    default:
      $msg = $begin;

      if ((substr($item, (strrpos($item, ".") + 1)) == "php") || (substr($item, (strrpos($item, ".") + 1)) == "inc") ||
          (basename($item) == basename($BBC_LOCK))) {
        $msg .= "File $item is ".(($state == "w") ? "read-only" : "inaccessible").". You may have to check whether it "
               ."has the right permissions or is even missing.";
      }
      elseif (empty($item)) {
        $msg .= "BBClone isn't able to read its configuration data. This is likely because you embedded BBClone's "
               ."code snippet into a function. Please use BBClone as suggested in the documentation.";
      }
      else {
        $msg .= "Directory $item is ".(($state == "w") ? "read-only" : "inaccessible").". You may have to check "
               ."whether it has the right permissions or is missing.";
      }
  }
  return ($msg.$end);
}
?>
