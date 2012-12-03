<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/log_processor.php,v 1.112 2009/06/21 07:33:07 joku Exp $
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

// Checking where we came from
if (!defined("_MARK_PAGE")) return;

// used by usort()
function bbc_sort_time_sc($row_a, $row_b) {
  if ($row_a['time'] == $row_b['time']) return 0;
  return ($row_a['time'] > $row_b['time'] ) ? 1 : -1;
}

// return the key of a value
function bbc_get_key($array, $str) {
  reset($array);

  while (list($idx, $val) = each($array)) {
    if ($val == $str) return $idx;
  }
  return 0;
}

// purge host and referrer stats at request
function bbc_purge_single() {
  global $access;

  foreach (array("host", "key", "referer") as $cat) {
    reset($access[$cat]);

    while (list($key, $score) = each($access[$cat])) {
      if ($score == 1) unset($access[$cat][$key]);
    }
  }
}

// records the hosts that visited us most. Note, that we only pick up hostnames and strip
// any sort of prefix because else the listing would become rather useless
function bbc_update_host_stat($client) {
  global $access, $BBC_IGNORE_BOTS;

  if ((empty($BBC_IGNORE_BOTS)) || (!isset($client['robot']))) {
    $is_num = ($client['dns'] == $client['ip']) ? 1 : 0;
    $host = (!$is_num) ? explode(".", strtolower($client['dns'])) : trim(substr($client['ip'], 0,
             strrpos($client['ip'], "."))).".&nbsp;-";
    $parts = (!$is_num) ? count($host) : 0;
    // these ones can have less than 3 characters as hostname
    $glob = array("org", "com", "edu", "mil", "net", "gov", "int");

    if ($parts > 2) {
      $host = ((!in_array(trim($host[($parts - 1)]), $glob)) && (((strlen(trim($host[($parts - 2)])) < 3)) ||
              (in_array($host[($parts - 2)], $glob)))) ?
              trim(implode(".", array_splice($host, -3))) : trim(implode(".", array_splice($host, -2)));
    }
    else $host = (!$is_num) ? trim(implode(".", $host)) : $host;
  }

  if ((empty($BBC_IGNORE_BOTS)) || (!isset($client['robot']))) {
    if (!isset($access['host'][$host])) $access['host'][$host] = 0;
    $access['host'][$host]++;
  }

  if (isset($access['host']['not_specified'])) unset($access['host']['not_specified']);
}

// the listing of the visited pages
function bbc_update_visits($time, $page, $nr) {
  global $BBC_MAXVISIBLE, $last;

  if ((empty($last['traffic'][$nr]['views'])) || (!is_array($last['traffic'][$nr]['views']))) return;

  $lv = count($last['traffic'][$nr]['views']) - 1;
  $last['traffic'][$nr]['off'] = !empty($last['traffic'][$nr]['off']) ? $last['traffic'][$nr]['off'] : 0;

  list($last_time, $last_page, $last_cnt) = explode("|", $last['traffic'][$nr]['views'][$lv]);

  if (intval($last_page) === intval($page)) {
    $last['traffic'][$nr]['views'][$lv] = "$last_time|$last_page|".++$last_cnt;
    $last['traffic'][$nr]['off']++;
  }
  else $last['traffic'][$nr]['views'][] = "$time|$page|1";

  sort($last['traffic'][$nr]['views']);

  // number of elements to be removed with array_splice() if necessary
  $lv = count($last['traffic'][$nr]['views']) - 1;
  $del = (($lv + 1) > $BBC_MAXVISIBLE) ? (($lv + 1) - $BBC_MAXVISIBLE) : false;
  $last['traffic'][$nr]['views'] = ($del !== false) ? array_splice($last['traffic'][$nr]['views'], $del) :
                                   $last['traffic'][$nr]['views'];
}

// The most visited pages ranking
function bbc_update_page_stats($connect, $char) {
  global $access, $last;

  $long_page = $connect['page'];
  $char = $char ? $char : (defined("_BBC_MBSTRING") ? bbc_get_encoding($long_page) : false);

  // unfortunately big5 is unsupported as internal charset for mbstring operations
  if (defined("_BBC_MBSTRING") && (stristr("UTF", $char) || stristr("EUC-JP", $char) || stristr("gb2312", $char))) {
    mb_internal_encoding($char);
  }

  $over_60 = ((defined("_BBC_MBSTRING") ? mb_strlen($long_page) : strlen($long_page)) > 60) ? 1 : 0;
  $connect['page'] = $over_60 ? "...".(defined("_BBC_MBSTRING") ? mb_substr($long_page, -57) :
                     substr($long_page, -57)) : $long_page;

  // Fix oversized page titles
  if (($over_60) && (isset($access['page'][$long_page]['count']))) {
    $access['page'][($connect['page'])]['count'] = $access['page'][$long_page]['count'];
    $access['page'][($connect['page'])]['uri'] = $access['page'][$long_page]['uri'];
    unset($access['page'][$long_page]);
  }

  if (!isset($access['page'][($connect['page'])]['count'])) {
    $access['page'][($connect['page'])]['count'] = 0;
  }

  $access['page'][($connect['page'])]['count']++;
  $access['page'][($connect['page'])]['uri'] = $connect['uri'];

  $last['pages'] = ((empty($last['pages'])) || (!is_array($last['pages']))) ? array() : $last['pages'];

  if (($over_60) && (in_array($long_page, $last['pages']))) {
    $last['pages'][bbc_get_key($last['pages'], $long_page)] = $connect['page'];
  }
  if (!in_array($connect['page'], $last['pages'])) $last['pages'][] = $connect['page'];

  $connect['page'] = bbc_get_key($last['pages'], $connect['page']);

  if (isset($connect['uri'])) unset($connect['uri']);

  return $connect;
}

// Transfer the raw data from the main counters of var into $last.
// Any new data (more recent than $BBC_MAXTIME) is used in the global stats
function bbc_add_new_connections($new_access) {
  global $BBC_CUSTOM_CHARSET, $BBC_IGNORE_AGENT, $BBC_IGNORE_BOTS, $BBC_MAXTIME, $BBC_MAXVISIBLE, $BBC_NO_DNS,
         $BBC_NO_HITS, $access, $last;

  if (_BBC_PHP < 410) global $HTTP_COOKIE_VARS;

  $is_same = false;
  $char = !empty($BBC_CUSTOM_CHARSET) ? $BBC_CUSTOM_CHARSET : false;
  $new_cnt = (!empty($new_access) && is_array($new_access)) ? count($new_access) : 0;
  $old_cnt = (!empty($last['traffic']) && is_array($last['traffic'])) ? count($last['traffic']) : 0;

  foreach ($new_access as $connect) {
    $connect = bbc_update_connect($connect);

    // the "last reset on" flag initialisation
    if ((!isset($access['time'])) && (!isset($access['time']['reset']))) {
      $access['time']['reset'] = $connect['time'];
    }

    // Stop processing if bots are completely ignored
    if (!empty($BBC_IGNORE_BOTS) && ($BBC_IGNORE_BOTS == 2) && !empty($connect['robot'])) {
      --$new_cnt;
      continue;
    }

    $connect['visits'] = 1;
    // Omit referrers coming from robots
    $connect['referer'] = !empty($connect['robot']) ? "unknown" : $connect['referer'];

    $this_connect = $connect['time'];
    $last_connect = !empty($access['time']['last']) ? $access['time']['last'] : 0;

    // Hits as base for time stats if desired
    if (empty($BBC_NO_HITS)) bbc_update_time_stat($this_connect, $last_connect);

    // The script viewed
    $connect = isset($connect['page']) ? bbc_update_page_stats($connect, $char) : $connect;
    $prev_recorded = 0;

    // Check if a similar connection has been recorded yet
    for ($l = $old_cnt - 1; ($l >= 0) && (($connect['time'] - $last['traffic'][$l]['time']) < $BBC_MAXTIME); $l--) {
      if (!empty($BBC_IGNORE_AGENT) ? ($connect['ip'] == $last['traffic'][$l]['ip']) :
         ($connect['ip'] == $last['traffic'][$l]['ip']) &&
         ($is_same = bbc_same_agent($connect, $last['traffic'][$l]))) {
        $last['traffic'][$l] = bbc_update_detect($connect, $last['traffic'][$l], $is_same);
        $last['traffic'][$l]['page'] = $connect['page'];
        $last['traffic'][$l]['time'] = $this_connect;
        $last['traffic'][$l]['visits']++;

        // New referrer entry if it differs from the previous one
        if (isset($connect['referer']) && ($connect['referer'] != "unknown")) {
          $last['traffic'][$l] = bbc_ref_cmp($last['traffic'][$l], $connect, $char);
        }

        ($BBC_MAXVISIBLE > 0) ? bbc_update_visits($connect['time'], $connect['page'], $l) : "";
        // permanent data
        $access['stat']['totalvisits']++;
        $prev_recorded = 1;

        // browser page dimensions
        if (!isset($last['traffic'][$l]['screen_res'])) {
          if (_BBC_PHP < 410) {
            if (isset($HTTP_COOKIE_VARS['screen_res'])) {
              $screen_res = $HTTP_COOKIE_VARS['screen_res'];
              $last['traffic'][$l]['screen_res'] = $screen_res;
            }
          } else {
            if (isset($_COOKIE['screen_res'])) {
              $screen_res = $_COOKIE['screen_res'];
              $last['traffic'][$l]['screen_res'] = $screen_res;
            }
          }
		}

        break;
      }
    }

    // Add new connection if it hasn't been recorded yet
    if (!$prev_recorded) {
      if (empty($access['stat']['totalvisits'])) $access['stat']['totalvisits'] = 0;
      if (empty($access['stat']['totalcount'])) $access['stat']['totalcount'] = 0;

      $connect['dns'] = !empty($BBC_NO_DNS) ? $connect['ip'] : bbc_clean(gethostbyaddr($connect['ip']));
      $connect['ext'] = bbc_get_extension($connect['dns'], $connect['ip']);

      $last['traffic'][$old_cnt] = bbc_update_access($connect);
      // Visit stats
      $last['traffic'][$old_cnt]['views'][] = $last['traffic'][$old_cnt]['time']."|"
                                             .$last['traffic'][$old_cnt]['page']."|1";

      // Unique visits as base for time stats if desired
      if (!empty($BBC_NO_HITS)) bbc_update_time_stat($this_connect, $last_connect);

      // Referrers collection will be updated all along with the keywords if available
      if (isset($connect['referer']) && ($connect['referer'] != "unknown")) {
        bbc_update_referer_stat(bbc_parse_ref($connect['referer']));

        // Search engine keywords in detailed stats
        $flt_search = bbc_get_keywords($connect['referer'], $char);
        $last['traffic'][$old_cnt]['search'] = ($flt_search !== false) ? implode(" ", $flt_search) : "-";

        // Search engine keywords in global stats
        if ($flt_search !== false) bbc_update_key_stats($flt_search);
      }

      // The host listing
      if (isset($connect['dns']) && isset($connect['ip'])) bbc_update_host_stat($last['traffic'][$old_cnt]);

      $access['stat']['totalvisits']++;
      $access['stat']['totalcount']++;
      $old_cnt++;
    }
  }
  return true;
}

// Remove unnecessary connections from $last, that either exceed the $BBC_MAXVISIBLE limit or are
// older than time() - $BBC_MAXTIME.
function bbc_update_last() {
  global $last, $BBC_MAXTIME, $BBC_MAXVISIBLE, $BBC_TIMESTAMP, $BBC_TIME_OFFSET;

  if (($BBC_MAXVISIBLE <= 0) || (empty($last['traffic'])) || (!is_array($last['traffic']))) {
    $last['traffic'] = array();
    return;
  }
  else {
    $cnt = count($last['traffic']);
    $ctime = $BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60);

    for ($k = $cnt - 1 - $BBC_MAXVISIBLE; $k >= 0; $k--) {
      if (($ctime - $last['traffic'][$k]['time']) > $BBC_MAXTIME) unset($last['traffic'][$k]);
    }
    usort($last['traffic'],"bbc_sort_time_sc");
  }
}

// Update stats to latest version
function bbc_update() {
  global $access;

  // Upgrade from older versions.
  foreach (array("bbc046c", "bbc048", "bugs", "last", "refclean", "uaclean") as $i) {
    if (isset($access[$i])) unset($access[$i]);
  }

  // referrer cleanup
  if (isset($access['referer'])) {
    if (isset($access['referer']['not_specified'])) unset($access['referer']['not_specified']);

    $access['referer'] = bbc_sum_ref($access['referer']);
  }

  // delete old "ignored" entries. They're no longer needed
  if (isset($access['referer']['ignored'])) unset($access['referer']['ignored']);

  // fixed counting of empty keywords
  if (isset($access['key']) && isset($access['key'][''])) unset($access['key']['']);

  if (isset($access['stat']['browser'])) {
    // fix browsers with capital letters (must be lowercase)
    foreach (array("Elinks", "Epiphany") as $i) {
      if (isset($access['stat']['browser'][$i])) {
        $access['stat']['browser'][strtolower($i)] = $access['stat']['browser'][$i];

        unset($access['stat']['browser'][$i]);
      }
    }

    // fix wrong browser assignments
    foreach (array("java", "wwwc", "libwww") as $i) {
      if (isset($access['stat']['browser'][$i])) {
        $access['stat']['robot'][$i] = $access['stat']['browser'][$i];
        $access['stat']['os']['other'] -= $access['stat']['robot'][$i];

        unset($access['stat']['browser'][$i]);
      }
    }
  }

  if (isset($access['stat']['robot'])) {
    // fix browsers with capital letters (must be lowercase)
    foreach (array("MyRSS", "PhpDig") as $i) {
      if (isset($access['stat']['robot'][$i])) {
        $access['stat']['robot'][strtolower($i)] = $access['stat']['robot'][$i];

        unset($access['stat']['robot'][$i]);
      }
    }
  }
  // no more happy cycling ;-)
  $access['bbc048b'] = 1;
}
?>
