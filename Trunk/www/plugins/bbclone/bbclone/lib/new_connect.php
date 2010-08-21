<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/new_connect.php,v 1.40 2009/06/21 07:33:09 joku Exp $
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

// fallback in case something can't be resolved
function bbc_legacy_ext($ext, $array) {
  if (preg_match(":^[\d]+$:", $ext)) return "numeric";
  elseif (!in_array($ext, $array)) return "unknown";
  else return $ext;
}

function bbc_get_extension($host, $addr) {
  global $BBC_IP2EXT_PATH;

  // generic extensions which need to be looked up first
  $gen_ext = array(
    "ac", "aero", "ag", "arpa", "as", "biz", "cc", "cd", "com", "coop", "cx", "edu", "eu", "gb", "gov", "gs", "info",
    "int", "la", "mil", "ms", "museum", "name", "net", "nu", "org", "pro", "sc", "st", "su", "tc", "tf", "tk", "tm",
    "to", "tv", "vu", "ws"
  );
  // hosts with reliable country extension don't need to be looked up
  $cnt_ext = array(
    "ad", "ae", "af", "ai", "al", "am", "an", "ao", "aq", "ar", "at", "au", "aw", "az", "ba", "bb", "bd", "be", "bf",
    "bg", "bh", "bi", "bj", "bm", "bn", "bo", "br", "bs", "bt", "bv", "bw", "by", "bz", "ca", "cf", "cg", "ch", "ci",
    "ck", "cl", "cm", "cn", "co", "cr", "cs", "cu", "cv", "cy", "cz", "de", "dj", "dk", "dm", "do", "dz", "ec", "ee",
    "eg", "eh", "er", "es", "et", "fi", "fj", "fk", "fm", "fo", "fr", "ga", "gd", "ge", "gf", "gg", "gh", "gi", "gl",
    "gm", "gn", "gp", "gq", "gr", "gt", "gu", "gw", "gy", "hk", "hm", "hn", "hr", "ht", "hu", "id", "ie", "il", "im",
    "in", "io", "iq", "ir", "is", "it", "je", "jm", "jo", "jp", "ke", "kg", "kh", "ki", "km", "kn", "kp", "kr", "kw",
    "ky", "kz", "lb", "lc", "li", "lk", "lr", "ls", "lt", "lu", "lv", "ly", "ma", "mc", "md", "me", "mg", "mh", "mk",
    "ml", "mm", "mn", "mo", "mp", "mq", "mr", "mt", "mu", "mv", "mw", "mx", "my", "mz", "na", "nc", "ne", "nf", "ng",
    "ni", "nl", "no", "np", "nr", "nz", "om", "pa", "pe", "pf", "pg", "ph", "pk", "pl", "pm", "pn", "pr", "ps", "pt",
    "pw", "py", "qa", "re", "ro", "ru", "rs", "rw", "sa", "sb", "sd", "se", "sg", "sh", "si", "sj", "sk", "sl", "sm",
    "sn", "so", "sr", "sv", "sy", "sz", "td", "tg", "th", "tj", "tl", "tn", "tp", "tr", "tt", "tw", "tz", "ua", "ug",
    "uk", "um", "us", "uy", "uz", "va", "vc", "ve", "vg", "vi", "vn", "wf", "ye", "yt", "yu", "za", "zm", "zr", "zw"
  );

  $file = $BBC_IP2EXT_PATH.(substr($addr, 0, strpos($addr, ".")).".inc");
  $ext = strtolower(substr($host, (strrpos($host, ".") + 1)));

  // Don't look up if there's already a country extension
  if (in_array($ext, $cnt_ext)) return $ext;
  if (!is_readable($file)) return bbc_legacy_ext($ext, $gen_ext);

  $long = ip2long($addr);
  $long = sprintf("%u", $long);
  $fp = fopen($file, "rb");

  while (($range = fgetcsv($fp, 32, "|")) !== false) {
    if (($long >= $range[1]) && ($long <= ($range[1] + $range[2] - 1))) {
      // don't hose our stats if the database returns an unexpected extension
      $db_ext = (in_array($range[0], $cnt_ext) || in_array($range[0], $gen_ext)) ? $range[0] :
                bbc_legacy_ext($ext, $gen_ext);
      break;
    }
  }
  fclose($fp);

  return (!empty($db_ext) ? $db_ext : bbc_legacy_ext($ext, $gen_ext));
}

function bbc_update_connect($connect) {
  global $BBC_LIB_PATH;

  $bonus_counter = 0;
  // Sanity check has already been made in mark_page.php
  foreach (array("robot", "browser", "os", "bonus") as $i) {
    require($BBC_LIB_PATH.$i.".php");
    reset($$i);
    $bonus_counter = 0;
    while (list(${$i."_name"}, ${$i."_elem"}) = each($$i)) {
      reset(${$i."_elem"}['rule']);
      while (list($pattern, $note) = each(${$i."_elem"}['rule'])) {
        // eregi() is intentionally used because some php installations don't
        // know the "i" switch of preg_match() and would generate phony compile
        // error messages
        //if (!eregi($pattern, $connect['agent'], $regs)) continue;
	// but we need that syntax, sigh
	if (!preg_match('~'.$pattern.'~i', $connect['agent'], $regs)) continue;

        if ($i == 'bonus') {
          $connect[$i.'_'.$bonus_counter] = ${$i."_name"};
        } else {
          $connect[$i] = ${$i."_name"};
        }

        if (preg_match(":\\\\[\d]{1}:" ,$note)) {
          $str = preg_replace(":\\\\([\d]{1}):", "\$regs[\\1]", $note);

          eval("\$str = \"$str\";");

          $connect[$i."_note".(($i == 'bonus') ? '_'.$bonus_counter : '')] = $str;
        }
        if ($i != 'bonus') break 2;
        $bonus_counter++;
      }
    }
    if (!empty($connect['robot'])) break;
  }
  return $connect;
}

function bbc_update_access($connect) {
  global $access;

  // Assign an identification number to the new connection
  $connect['id'] = isset($access['stat']['totalcount']) ? ($access['stat']['totalcount'] + 1) : 1;

  // Recording the detected extension in the global statistics
  $access['stat']['ext'][$connect['ext']] = !isset($access['stat']['ext'][$connect['ext']]) ? 1 :
                                            ++$access['stat']['ext'][$connect['ext']];

  foreach (array("robot", "browser", "os") as $type) {
    if (($type == "robot") && (empty($connect['robot']))) continue;

    if (isset($access['stat'][$type][$connect[$type]])) $access['stat'][$type][$connect[$type]]++;
    else $access['stat'][$type][$connect[$type]] = 1;

    if (($type == "robot") && (!empty($connect['robot']))) break;
  }
  return $connect;
}

// Checks whether the same software is being used during a visit
function bbc_same_agent($old_connect, $new_connect) {
  $vars = array("browser", "browser_note", "os", "os_note", "robot", "robot_note");
  $max = count($vars);

  for ($i = 0 , $old = "", $new = ""; $i < $max; $i++) {
    $cur = $vars[$i];

    $old .= isset($old_connect[$cur]) && ($old_connect[$cur] != "other") ? $old_connect[$cur] : "";
    $new .= isset($new_connect[$cur]) && ($new_connect[$cur] != "other") ? $new_connect[$cur] : "";

  }

  if  ((empty($old) && empty($new)) ? ($new_connect['agent'] == $old_connect['agent']) : ($old == $new)) return true;

  return false;
}

// Updates the display in detailed stats if necessary
function bbc_update_detect($new, $old, $is_same) {
  $old['agent'] = $new['agent'];

  if (!$is_same) {
    $vars = array("browser", "browser_note", "os", "os_note", "robot", "robot_note");
    $cats = array("browser", "robot");

    foreach ($cats as $old_cat) {
      if (!empty($old[$old_cat])) {
        foreach ($cats as $new_cat) {
          if (!empty($new[$new_cat])) {
            for ($i = 0, $j = count($vars); $i < $j; $i++) {
              $cur_var = $vars[$i];

              if (isset($old[$cur_var])) unset($old[$cur_var]);
              if (isset($new[$cur_var])) $old[$cur_var] = $new[$cur_var];
            }
          }
        }
      }
    }
  }
  return $old;
}
?>
