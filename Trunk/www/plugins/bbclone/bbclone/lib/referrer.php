<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/referrer.php,v 1.42 2009/06/21 07:33:10 joku Exp $
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

// keywords

function bbc_specialchars_decode($str) {
  $trans = array(
    "&amp;" => "&",
    "&nbsp;" => " ",
    "&quot;" => "\"",
    "&#039;" => "'",
    "&lt;" => "<",
    "&gt;" => ">"
  );

  return strtr($str, $trans);
}

function bbc_get_sep($query, $array) {
  // puts the query into an array
  foreach ($array as $match) {
    $has_sep = (strpos($query, $match) !== false) ? true : false;
    $pool = $has_sep ? explode($match, $query) : array($query);

    for ($i = 0, $max = count($pool); $i < $max; $i++) {
      // Characters which usually aren't needed at the beginning or end of a keyword
      $pool[$i] = preg_replace("%^\W*(\b.{2,}\b)\W*$%", "\\1", $pool[$i]);

      if (empty($pool[$i])) {
        unset($pool[$i]);
        continue;
      }
    }
    if ($has_sep) return array_values($pool);
  }
  return array_values($pool);
}

function bbc_get_search($array) {
  // turns variable assignments to an associative array
  $result = false;
  $query = array(
    "^as_(ep|o|e)?q=",
    "^q(_(a(ll|ny)|phrase|not)|s|t|u(ery)?)?=",
    "^s(u|2f|p\-q|earch(_?for)?|tring|zukaj)?=",
    "^k(w|e(reses|y(word)?s?))=",
    "^b(egriff|uscar?)=",
    "^w(d|ords?)?=",
    "^te(rms?|xt)=",
    "^mi?t=",
    "^heureka=",
    "^p=",
    "^r(eq)?=",
    "/search/web/",
    "^userQuery=",
    "^v[aeop]="
  );

  foreach ($array as $string) {
    $string = rawurldecode($string);

    // skip empty GET variables
    if (substr($string, -1) == "=") continue;

    foreach ($query as $key) {
      preg_match("%$key%", $string, $matches);
      if (empty($matches)) continue;

      $par = $matches[0];
      $pos = strpos($string, $par);
      $term = substr($string, ($pos + strlen($par)));

      if ((defined("_BBC_MBSTRING") ? mb_strlen($term) : strlen($term)) < 2) {
        $matches = array();
        continue;
      }
      if (($par[0] == "q") || ($par[0] == "s")) return $term;
    }
    $result = isset($par) ? $term : $result;
  }
  return $result;
}

function bbc_get_keywords($ref, $char) {
  $var_sep =  array("&", "|");
  $word_sep = array( "+", "-", " ", "/");
  $match = array(
    "ara", "busca", "pesquis", "search", "srch", "seek", "zoek", "result", "szuka", "cherch", "such", "find",
    "trouve", "trova", "pursuit", "keres", "katalogus", "alltheinternet.com", "mamma.com", "baidu.com", "heureka.hu",
    "kartoo.com", "ask.com", "aport.ru", "google", "yahoo"
  );

  foreach ($match as $key) {
    $is_search = (strpos(strtolower($ref), $key) !== false) ? true : false;

    if ($is_search) break;
  }

  if (!$is_search) return false;

  $ref = bbc_specialchars_decode(rawurldecode($ref));
  $is_query = strrpos($ref, "?");
  $ref = ($is_query !== false) ? substr($ref, ++$is_query) : substr($ref, (strpos($ref, "://") + 3));
  $get_vars = bbc_get_sep($ref, $var_sep);
  $raw_search = bbc_get_search($get_vars);

  if ($raw_search === false) return false;

  // Conversion of keywords, if applicable
  $from = defined("_BBC_MBSTRING") ? bbc_get_encoding($raw_search) : false;
  $raw_search = (($from !== false) || defined("_BBC_RECODE")) ? bbc_convert_lang($raw_search, $from, $char) :
                $raw_search;
  $raw_search = bbc_get_sep($raw_search, $word_sep);

  if (function_exists('mb_internal_encoding')) {
    if ($char) mb_internal_encoding($char);
  }

  for ($i = 0, $j = count($raw_search); $i < $j; $i++) {
    $tmp = !$char ? strtolower(bbc_clean($raw_search[$i])) : bbc_clean($raw_search[$i]);

    // Filter search engine cache indicator
    if (!preg_match("%^(cache|tbn|link)\:[\w\-]{8,}%", $tmp) &&
      ((defined("_BBC_MBSTRING") ? mb_strlen($tmp) : strlen($tmp)) < 51)) {
      $result[] = $tmp;
    }
  }
  return (!empty($result) ? $result : false);
}

function bbc_update_key_stats($array) {
  global $access;

  for ($i = 0, $j = count($array); $i < $j; $i++) {
    $access['key'][($array[$i])] = !isset($access['key'][($array[$i])]) ? 1 : ++$access['key'][($array[$i])];
  }
}

// referrers

function bbc_sum_ref($array) {
  foreach ($array as $ref => $cnt) {
    if (($ref == "ignored") || ($ref == "not_specified")) continue;

    $new_ref = (($slash = strpos($ref, "/")) !== false) ? substr($ref, 0, ++$slash) : $ref."/";

    if ($new_ref != $ref) {
      $array[$new_ref] = isset($array[$new_ref]) ? $array[$new_ref] : 0;
      $array[$new_ref] += $array[$ref];

      unset($array[$ref]);
    }
  }
  return $array;
}

// returns the referrer in handy pieces for further investigation
function bbc_parse_ref($ref) {
  // do nothing in case some old "ignored" entries survived an update
  if ($ref == "ignored") return -1;

  $ref_array = parse_url($ref);

  if (!isset($ref_array['scheme'])) return false;

  // compare whether we got a "www.*" equivalent recorded (or missing)
  $old_host = $ref_array['host']."/";
  $prefix = substr($old_host, 0, ($tmp = strpos($old_host, ".")));
  $suffix = substr($old_host, ++$tmp);
  $new_host = ($prefix != "www") ? "www.".$old_host : $suffix;
  $path = !isset($ref_array['path']) ? "/" : $ref_array['path'];
  $path = isset($ref_array['query']) ? $path."?".$ref_array['query'] : $path;

  return array($old_host, $new_host, $path);
}

function bbc_update_referer_stat($refhost) {
  global $access;

  // do nothing in case some old "ignored" entries survived an update
  if ($refhost == -1) return;

  // neither recorded with "www." nor without, seems to be our 1st visit ;)
  if (!isset($access['referer'][$refhost[0]]) && !isset($access['referer'][$refhost[1]])) {
    $access['referer'][$refhost[0]] = 1;
  }
  // Now we got both of them, let's continue with the one we got most of
  else {
    $access['referer'][$refhost[0]] = isset($access['referer'][$refhost[0]]) ? $access['referer'][$refhost[0]] : 0;
    $access['referer'][$refhost[1]] = isset($access['referer'][$refhost[1]]) ? $access['referer'][$refhost[1]] : 0;

    if ($access['referer'][$refhost[0]] < $access['referer'][$refhost[1]]) {
      $access['referer'][$refhost[1]] += $access['referer'][$refhost[0]];

      unset($access['referer'][$refhost[0]]);

      ++$access['referer'][$refhost[1]];
    }
    else {
      $access['referer'][$refhost[0]] += $access['referer'][$refhost[1]];

      unset($access['referer'][$refhost[1]]);

      ++$access['referer'][$refhost[0]];
    }
  }
}

// compares two referrers within a visit and updates stats if necessary
function bbc_ref_cmp($old_connect, $new_connect, $char) {
  $old_ref = bbc_parse_ref($old_connect['referer']);
  $old_ref = is_array($old_ref) ? $old_ref[0] : $old_ref;
  $old_src = (empty($old_connect['search']) || ($old_connect['search'] == "-")) ? array() :
              explode(" ", $old_connect['search']);
  $old_cnt = count($old_src);
  $new_ref = ($new_connect['referer'] == "ignored") ? -1 : bbc_parse_ref($new_connect['referer']);

  // update referrer hosts in global stats if they differ
  if ((is_array($new_ref) && (!$old_ref)) || (is_array($new_ref) && ($old_ref != $new_ref[0]) &&
      ($old_ref != $new_ref[1]))) {
    bbc_update_referer_stat($new_ref);
  }

  // if on the same host check whether paths differ
  if (is_array($new_ref) && (!array($old_ref) || ($old_ref[2] != $new_ref[2]))) {
    $old_connect['referer'] = $new_connect['referer'];
    $new_src = bbc_get_keywords($new_connect['referer'], $char);
  }

  if (!empty($new_src)) {
    // Only update keywords which haven't been around during a visit
    for ($i = 0, $new_cnt = count($new_src), $same_words = 1; ($i < $old_cnt) && ($i < $new_cnt); $i++) {
      if (in_array($new_src[$i], $old_src)) unset($new_src[$i]);
    }

    if (!empty($new_src)) {
      // Only add new keywords to the existing collection during a visit
      for ($i = 0, $new_src = array_values($new_src), $j = count($new_src); $i < $j; $i++) $old_src[] = $new_src[$i];

      $old_connect['search'] = implode(" ", $old_src);
      // add new keywords to $access if applicable
      bbc_update_key_stats($new_src);
    }
  }
  return $old_connect;
}
?>