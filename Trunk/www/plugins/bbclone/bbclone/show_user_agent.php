<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_user_agent.php,v 1.5 2009/06/21 07:33:08 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_LIB_PATH."new_connect.php") as $i) {
  if (is_readable($i)) require_once($i);
  else {
    if (!empty($BBC_DEBUG)) exit(bbc_msg($i));
    else return;
  }
}

// Determine whether we are allowed to display development features
if (empty($BBC_DEVELOPER_INSTALLATION)) die("<h3>BBClone $BBC_VERSION</h3>\n<hr />\n".$_['error_cannot_see_development']."\n");

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

      $retval = "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."browser_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['browser_note']) ? "" : "&nbsp;".$connect['browser_note'])."</div>";

      if ((isset($match['uri'])) && ($match['uri'] != "")) {
        return "<a href=\"".$match['uri']."\" target=\"_blank\">".$retval."</a>";
      } else {
        return $retval;
      }

    case "os":
      if (!empty($connect['robot'])) return bbc_show_connect_field($connect,"robot", $lng);
      elseif (is_readable($BBC_LIB_PATH."os.php")) require($BBC_LIB_PATH."os.php");
      else return bbc_msg($BBC_LIB_PATH."os.php");

      if (!$match = (!isset($os[$connect[$field]]) ? false : $os[$connect[$field]])) return "&nbsp;";

      $title = str_replace("other", $_['misc_other'], $match['title']);

      $retval = "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."os_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['os_note']) ? "" : "&nbsp;".$connect['os_note'])."</div>";

      if ((isset($match['uri'])) && ($match['uri'] != "")) {
        return "<a href=\"".$match['uri']."\" target=\"_blank\">".$retval."</a>";
      } else {
        return $retval;
      }

    case "robot":
      if (is_readable($BBC_LIB_PATH."robot.php")) require($BBC_LIB_PATH."robot.php");
      else return bbc_msg($BBC_LIB_PATH."robot.php");

      if (!$match = (!isset($robot[$connect[$field]]) ? false : $robot[$connect[$field]])) return "&nbsp;";

      $title = str_replace("other", $_['misc_other'], $match['title']);

      $retval = "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."robot_".$match['icon'].".png\" height=\"14\" "
            ."width=\"14\" alt=\"$title\" title=\"$title\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
            .(empty($connect['robot_note']) ? "" : "&nbsp;".$connect['robot_note'])."</div>";

      if ((isset($match['uri'])) && ($match['uri'] != "")) {
        return "<a href=\"".$match['uri']."\" target=\"_blank\">".$retval."</a>";
      } else {
        return $retval;
      }

    case "page":
      if (!isset($connect[$field])) return "&nbsp;";

      $last_page = $titles[($connect[$field])];
      $last_page = ($last_page == "index") ? $_["navbar_Main_Site"] : $last_page;

      return "<div align=\"left\">&nbsp;$last_page</div>";

    case "bonus":
      if (is_readable($BBC_LIB_PATH."bonus.php")) require($BBC_LIB_PATH."bonus.php");
      else return bbc_msg($BBC_LIB_PATH."bonus.php");

      $str = "";

      // Max. 10 additional informations
      for ($i = 0; $i < 10; $i++) {
        if (!$match = (!isset($bonus[$connect[$field.'_'.$i]]) ? false : $bonus[$connect[$field.'_'.$i]])) break;

        $title = str_replace("other", $_['misc_other'], $match['title']);

        if ((isset($match['uri'])) && ($match['uri'] != "")) {
          $str .= "<a href=\"".$match['uri']."\" target=\"_blank\">";
        }
        $str .= "<div align=\"left\">&nbsp;<img src=\"".$BBC_IMAGES_PATH."bonus/".$match['icon'].".png\" height=\"14\" "
             ."width=\"14\" alt=\"".$match['description']."\" title=\"".$match['description']."\" />&nbsp;&nbsp;".str_replace(" ", "&nbsp;", $title)
             .(empty($connect['bonus_note'.'_'.$i]) ? "" : "&nbsp;".$connect['bonus_note'.'_'.$i])."</div>";
        if (isset($match['uri'])) {
          $str .= "</a>";
        }
      }
      return $str;

    default:
      if (!isset($connect[$field]) || ($connect[$field] == "-")) return "&nbsp;";
      return "<div align=\"left\">&nbsp;".$connect[$field]."</div>";
  }
}

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    ."<tr>\n<td class=\"detbox\" align=\"center\" colspan=\"2\" valign=\"middle\">\n";

$post = (_BBC_PHP < 410) ? $HTTP_POST_VARS : $_POST;
if (isset($post['agent'])) {
  $agent_check = $post['agent'];
} else {
  $agent_check = (_BBC_PHP < 410) ? $HTTP_SERVER_VARS['HTTP_USER_AGENT'] : $_SERVER['HTTP_USER_AGENT'];
}

echo "<form action=\"".((_BBC_PHP < 410) ? $_PHP_SELF : $_SERVER['PHP_SELF'])."\" method=\"post\">\n<input name=\"agent\" value=\"".$agent_check."\" style=\"width:600px\" />\n<input type=\"button\" value=\"Test it!\" onclick=\"submit()\" /></form>\n";

$test['agent'] = $agent_check;
$test = bbc_update_connect($test);

echo "<td>\n</tr>\n"
    ."<tr>\n"
    ."</tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\" colspan=\"2\">&nbsp;</td>\n"
    ."<tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">Robot:</td>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">".bbc_show_connect_field($test, 'robot', 'en')."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">Browser:</td>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">".bbc_show_connect_field($test, 'browser', 'en')."</td>\n</tr>\n"
    ."<tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">OS:</td>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">".bbc_show_connect_field($test, 'os', 'en')."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">Additional information:</td>\n"
    ."<td class=\"detbox\" align=\"center\" valign=\"middle\">".bbc_show_connect_field($test, 'bonus', 'en')."</td>\n"
    ."</tr>\n";

echo "</table>"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
?>
