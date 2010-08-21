<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_views.php,v 1.37 2009/09/09 22:30:19 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_LAST_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

function bbc_visit_time($this_time, $next_time, $nr = 0) {
  $diff = ($next_time !== false) ? ($next_time - $this_time) : 0;

  if ($diff <  1) return false;
  elseif ($diff >= 3600) {
    $h = floor($diff / 3600);
    $m = floor((($mod = $diff % 3600) / 60));
    $s = $mod % 60;

    return "$h&nbsp;h&nbsp;".(($m < 10) ? "0".$m : $m)."&nbsp;m&nbsp;".(($s < 10) ? "0".$s : $s)."&nbsp;s&nbsp;";
  }
  elseif (($diff > 60) && ($diff < 3600)) {
    return ((($rnd = floor(($diff / 60))) < 10) ? "0".$rnd : $rnd)."&nbsp;m&nbsp;".((($mod = $diff % 60) < 10) ?
           "0".$mod : $mod)."&nbsp;s";
  }
  else return (($diff < 10) ? "0".$diff : $diff)."&nbsp;s";
}

function bbc_which_whois($addr) {
  // look up whether an address is registerred
  global $BBC_IP2EXT_PATH;

  $long = sprintf("%u", ip2long($addr));
  $file = $BBC_IP2EXT_PATH."whois.inc";

  if (!is_readable($file)) return false;

  $fp = fopen($file, "rb");

  while (($range = fgetcsv($fp, 64, "|")) !== false) {
    if (($long >= $range[1]) && ($long < ($range[1] + $range[2]))) {
      switch($range[0]) {
        case "af":
          $url = "www.afrinic.net/cgi-bin/whois?searchtext=$addr";
          break;

        case "ap":
          $url = "www.apnic.net/apnic-bin/whois.pl?searchtext=$addr";
          break;

        case "la":
          $url = "lacnic.net/cgi-bin/lacnic/whois?query=$addr";
          break;

        case "ri":
          $url = "www.ripe.net/fcgi-bin/whois?searchtext=$addr";
          break;

        // Don't return whois link for private or reserved ranges
        default:
          return false;
      }
    }
  }
  fclose($fp);

  # Use ARIN as catch up for anything left
  return "<script type=\"text/javascript\">\n"
        ."<!--\n"
        ."document.write('&#040;<a href=\"http://"
        .(empty($url) ? "ws.arin.net/cgi-bin/whois.pl?queryinput=$addr" : $url)
        ."\" rel=\"nofollow\" title=\"Whois\">Whois<\/a>&#041;');\n"
        ."-->\n"
        ."</script>\n"
        ."<noscript>&nbsp;</noscript>\n"
        ."&nbsp;\n";
}

function bbc_list_visits() {
  if (_BBC_PHP < 410) global $HTTP_GET_VARS;

  global $bbc_html, $last, $_, $BBC_MAXVISIBLE;

  $is_id = 0;

  if (((_BBC_PHP < 410) ? !isset($HTTP_GET_VARS['id']) : !isset($_GET['id'])) ||
      !preg_match(":^[\d]+$:", ((_BBC_PHP < 410) ? $HTTP_GET_VARS['id'] : $_GET['id'])) ||
      !is_array($last['traffic']) || empty($last['traffic'])) {
    return $_['dstat_no_data'].".";
  }

  reset($last['traffic']);

  while (list(, $connect) = each($last['traffic'])) {
    if ((isset($connect['id'])) && ($connect['id'] == ((_BBC_PHP < 410) ? $HTTP_GET_VARS['id'] : $_GET['id']))) {
      $is_id = 1;
      break;
    }
  }
  if (!$is_id) return $_['dstat_no_data'].".";

  $prx_ip = (($connect['prx_ip'] == "unknown") || ($connect['prx_ip'] == $connect['ip'])) ? $_['global_no'] :
            $connect['prx_ip'];
  $off = $connect['visits'] - ($BBC_MAXVISIBLE + (isset($connect['off']) ? $connect['off'] : 0));
  $ip_whois = bbc_which_whois($connect['ip']);
  $prx_whois = ($prx_ip == $_['global_no']) ? false : bbc_which_whois($prx_ip);

  // hexcolor depending on the age of the selected connection
  $hex = $bbc_html->connect_code_color($connect);

  $str = "<table class=\"collapse\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
        ."<tr>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_id']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_prx']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_ip']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_user_agent']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_nr']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_pages']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_visit_length']."</td>\n"
        ."<td class=\"head\">&nbsp;".$_['dstat_reloads']."</td>\n"
        ."</tr>\n"
        ."<tr style=\"background-color: $hex\">\n";

  for ($i = 0, $k = count($connect['views']); $i < $k; $i++) {
    $page = substr($connect['views'][$i], (strpos($connect['views'][$i], "|") + 1));
    $page = substr($page, 0, strpos($page, "|"));
    $page = ($last['pages'][$page] == "index") ? $_['navbar_Main_Site'] : $last['pages'][$page];
    $cnt = substr($connect['views'][$i], (strrpos($connect['views'][$i], "|") + 1)) - 1;
    $this_time = substr($connect['views'][$i], 0, strpos($connect['views'][$i], "|"));
    $next_time = !isset($connect['views'][($i + 1)]) ? $connect['time'] :
                 substr($connect['views'][($i + 1)], 0, strpos($connect['views'][($i + 1)], "|"));
    $length = bbc_visit_time($this_time, $next_time, $i);
    $length = (($i + 1 !== $k) && ($length === false)) ? "00&nbsp;s" : $length;

    if ($i === 0) {
      $str .= "<td class=\"rows\" align=\"right\" rowspan=\"$k\">".$connect['id']."&nbsp;</td>\n"
             ."<td class=\"rows\" align=\"right\" rowspan=\"$k\">$prx_ip&nbsp;$prx_whois</td>\n"
             ."<td class=\"rows\" align=\"right\" rowspan=\"$k\">".$connect['ip']."&nbsp;$ip_whois</td>\n"
             ."<td class=\"rows\" align=\"left\" rowspan=\"$k\">&nbsp;"
             .(($connect['agent'] == "unknown") ? "&nbsp;" : $connect['agent'])."</td>\n";
    }

    $str .= "<td class=\"rows\" align=\"right\">".($i + (($off > 0) ? ($off + 1) : 1))."&nbsp;</td>\n"
           ."<td class=\"rows\" align=\"left\">&nbsp;$page</td>"
           ."<td class=\"rows\" align=\"right\">".$length."&nbsp;</td>\n"
           ."<td class=\"rows\" align=\"right\">".(($cnt > 0) ? $cnt : "")."&nbsp;</td>"
           ."</tr>\n"
           .(($i + 1 === $k) ? "</table>\n" : "<tr style=\"background-color: $hex\">\n");
  }
  return $str;
}

// Main
echo $bbc_html->html_begin()
    .$bbc_html->topbar(0, 0)
    .$bbc_html->color_explain()
    ."<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">"
    ."<tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">".bbc_list_visits()."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
?>
