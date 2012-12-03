<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_detailed.php,v 1.100 2009/06/21 07:33:07 joku Exp $
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
elseif (is_readable(dirname(__FILE__)."/constants.php")) require_once(dirname(__FILE__)."/constants.php");
else return;

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_LAST_FILE, $BBC_LIB_PATH."images_meta.php") as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// Functions

// generates the contents of each field in the detailed stats
function bbc_show_connect_field($connect, $field, $lng, $titles = false) {
  global $BBC_IMAGES_PATH, $BBC_LIB_PATH, $_, $BBC_EXT_IMAGES, $ext_height, $ext_width;

  $id = empty($connect['id']) ? 0 : $connect['id'];

  switch ($field) {
    case "id":
      return "<div align=\"right\">".$connect[$field]."&nbsp;</div>\n";

    case "time":
      return "<div align=\"right\">".str_replace(" ", "&nbsp;", date("j M, H:i:s", $connect[$field]))."&nbsp;</div>\n";

    case "visits":
      return "<div align=\"right\"><a href=\"show_views.php?id=$id&amp;lng=$lng\" target=\"_blank\">".$connect[$field]
            ."</a>&nbsp;</div>\n";

    case "ext":
      return "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH.$BBC_EXT_IMAGES.$connect[$field].".png\" height=\"".$ext_height."\" "
            ."width=\"".$ext_width."\" alt=\"".$_[$connect['ext']]."\" title=\"".$_[($connect[$field])]."\" />&nbsp;&nbsp;"
            .$_[($connect[$field])]."</div>";

    case "dns":
      if (strlen($connect[$field]) > 50) $connect[$field] = "...".substr($connect[$field], -47);
      return "<div align=\"left\">&nbsp;".$connect[$field]."</div>";

    case "referer":
      if (strpos($connect[$field], "://") === false) return "&nbsp;";

      $url = substr(strstr($connect[$field], "://"), 3);
      $str = (($slash = strpos($url, "/")) !== false) ? substr($url, 0, $slash) : $url;
      $str = (strlen($str) > 50) ? "...".substr($str, -47) : $str;

      return "<div align=\"left\">&nbsp;\n"
            ."<script type=\"text/javascript\">\n"
            ."<!--\n"
            ."document.write('<a href=\"http://$url\" rel=\"nofollow\" title=\"$str\">$str<\/a>');\n"
            ."-->\n"
            ."</script>\n"
            ."<noscript><span title=\"$str\">$str</span></noscript>\n"
            ."</div>\n";

    case "browser":
      if (!empty($connect['robot'])) return bbc_show_connect_field($connect, "robot", $lng);
      elseif (is_readable($BBC_LIB_PATH."browser.php")) require($BBC_LIB_PATH."browser.php");
      else return bbc_msg($BBC_LIB_PATH."browser.php");

      if (!$match = (!isset($browser[$connect[$field]]) ? false : $browser[$connect[$field]])) return "&nbsp;";

      $title = str_replace("other", $_['misc_other'], $match['title']);

      return "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."browser_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['browser_note']) ? "" : "&nbsp;".$connect['browser_note'])."</div>";

    case "os":
      if (!empty($connect['robot'])) return bbc_show_connect_field($connect,"robot", $lng);
      elseif (is_readable($BBC_LIB_PATH."os.php")) require($BBC_LIB_PATH."os.php");
      else return bbc_msg($BBC_LIB_PATH."os.php");

      if (!$match = (!isset($os[$connect[$field]]) ? false : $os[$connect[$field]])) return "&nbsp;";

      $title = str_replace("other", $_['misc_other'], $match['title']);
      if (isset($connect['screen_res'])) $res_str = "(".$connect['screen_res'].")";

      return "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."os_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['os_note']) ? "" : "&nbsp;".$connect['os_note']).(isset($res_str) ? "&nbsp;".$res_str : "")."</div>";

    case "robot":
      if (is_readable($BBC_LIB_PATH."robot.php")) require($BBC_LIB_PATH."robot.php");
      else return bbc_msg($BBC_LIB_PATH."robot.php");

      if (!$match = (!isset($robot[$connect[$field]]) ? false : $robot[$connect[$field]])) return "&nbsp;";

      $title = str_replace("other", $_['misc_other'], $match['title']);

      return "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."robot_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['robot_note']) ? "" : "&nbsp;".$connect['robot_note'])."</div>";

    case "page":
      if (!isset($connect[$field])) return "&nbsp;";

      $last_page = $titles[($connect[$field])];
      $last_page = ($last_page == "index") ? $_["navbar_Main_Site"] : $last_page;

      return "<div align=\"left\">&nbsp;$last_page</div>";

    default:
      if (!isset($connect[$field]) || ($connect[$field] == "-")) return "&nbsp;";
      return "<div align=\"left\">&nbsp;".$connect[$field]."</div>";
  }
}

// generates each row of the detailed stats
function bbc_rows_gen() {
  global $_, $BBC_DETAILED_STAT_FIELDS, $BBC_MAXVISIBLE, $bbc_html, $last;

  $fields_title = array(
    "browser" => $_['dstat_browser'],
    "dns" => $_['dstat_dns'],
    "ext" => $_['dstat_extension'],
    "id" => $_['dstat_id'],
    "ip" => $_['dstat_ip'],
    "os" => $_['dstat_os'],
    "page" => $_['dstat_last_page'],
    "prx_ip" => $_['dstat_prx'],
    "referer" => $_['dstat_from'],
    "search" => $_['dstat_search'],
    "time" => $_['dstat_time'],
    "visits" => $_['dstat_visits'],
  );

  // print the header
  $fields = explode(",", str_replace(" ", "", $BBC_DETAILED_STAT_FIELDS));
  $nb_access = isset($last['traffic']) ? count($last['traffic']) : 0;
  $str = "<tr>\n";

  foreach ($fields as $val) $str .= "<td class=\"head\">".$fields_title[$val]."</td>\n";

  $str .= "</tr>\n";

  for ($k = $nb_access - 1; $k >= max(0, $nb_access - $BBC_MAXVISIBLE); $k--) {
    $hex = $bbc_html->connect_code_color($last['traffic'][$k]);

    $str .= "<tr style=\"background-color: $hex\" onmouseover=\"this.style.backgroundColor='#ffffff'\" "
           ."onmouseout=\"this.style.backgroundColor='$hex'\">\n";

    reset($fields);

    while (list(, $val) = each($fields)) {
      $cell = bbc_show_connect_field($last['traffic'][$k], $val, $bbc_html->lng, $last['pages']);
      $str .= "<td class=\"rows\">".(empty($cell) ? "&nbsp;" : $cell)."</td>\n";
    }
    $str .= "</tr>\n";
  }
  return $str;
}

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    .$bbc_html->color_explain()
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    ."<tr>\n<td class=\"detbox\" align=\"center\" valign=\"middle\">\n"
    ."<table class=\"collapse\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    .bbc_rows_gen()
    ."</table>\n"
    ."</td>\n</tr>\n</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
?>
