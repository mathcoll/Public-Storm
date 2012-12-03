<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/html.php,v 1.137 2009/09/17 10:10:28 joku Exp $
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

if ($BBC_PROTOCOL_USAGE == 1) {
  define("_BBC_PAGE_NAME", (_BBC_PHP < 410) ? $PHP_SELF : $_SERVER['PHP_SELF']);
  define("_BBCLONE_DIR", "./");
  define("COUNTER", _BBCLONE_DIR."mark_page.php");
  if (is_readable(COUNTER)) include_once(COUNTER);
}

class bbc_html {
  var $lang_tab, $lng, $server;

  function get_lng() {
    if (_BBC_PHP < 410) global $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_SERVER_VARS;

    global $BBC_LANGUAGE;

    $get = ((_BBC_PHP < 410) ? !empty($HTTP_GET_VARS['lng']) : !empty($_GET['lng'])) ?
           ((_BBC_PHP < 410) ? $HTTP_GET_VARS['lng'] : $_GET['lng']) : "";
    $post = ((_BBC_PHP < 410) ? !empty($HTTP_POST_VARS['lng']) : !empty($_POST['lng'])) ?
            ((_BBC_PHP < 410) ? $HTTP_POST_VARS['lng'] : $_POST['lng']) : "";
    $aclng = ((_BBC_PHP < 410) ? !empty($HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE']) :
             !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? ((_BBC_PHP < 410) ?
             $HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'] : $_SERVER['HTTP_ACCEPT_LANGUAGE']) : "";

    if ($get && preg_match(":^[\w\-]{1,5}:", $get)) $this->lng = $get;
    elseif ($post && (preg_match(":^[\w\-]{1,5}:", $post))) $this->lng = $post;
    elseif ($aclng && (preg_match(":^[\w\-]{1,5}:", $aclng))) {
      $sep = strpos(str_replace(";", ",", $aclng), ",");

      $this->lng = ($sep === false) ? $aclng : substr($aclng, 0, $sep);
      $this->lng = ((($dash = strpos($this->lng, "-")) !== false) && (!isset($this->lang_tab[$this->lng]))) ?
                   substr($this->lng, 0, $dash) : $this->lng;
    }
    else $this->lng = $BBC_LANGUAGE;

    return (isset($this->lang_tab[$this->lng]) ? $this->lng : $BBC_LANGUAGE);
  }

  // Date format depending on the detected language
  function set_title() {
    global $_, $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $BBC_TITLEBAR;

    $conv = array(
      "%DATE" => date($_['global_date_format'], ($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60))),
      "%SERVER" => $this->server
    );

    return strtr($BBC_TITLEBAR, $conv);
  }

  // Begin of all bbclone files
  function html_begin() {
    global $BBC_VERSION, $BBC_IMAGES_PATH, $BBC_CSS_PATH, $BBC_NUM_SIZE, $BBC_TEXT_SIZE, $BBC_TITLE_SIZE, $BBC_SUBTITLE_SIZE, $_, $BBC_CSS_PATH;

    // Work around default charset in Apache 2 (Thanks Martin Halachev!)
    if (!headers_sent()) header("Content-type: text/html; charset=".$_['global_charset']);

$hostname = ucwords(str_replace('www.', '', $_SERVER['SERVER_NAME'])); 

    return "<?xml version=\"1.0\" encoding=\"".$_['global_charset']."\"?>\n"
          ."<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" "
          ."\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n"
          ."<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
          ."<head>\n"
          ."<title>".$hostname." Web Statistics by BBClone $BBC_VERSION</title>\n"
          ."<link rel=\"shortcut icon\" href=\"".$BBC_IMAGES_PATH."favicon.ico\" />\n"
          ."<link rel=\"stylesheet\" href=\"".$BBC_CSS_PATH."bbclone.css\" type=\"text/css\" />\n"
          ."<meta http-equiv=\"pragma\" content=\"no-cache\" />\n"
          ."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$_['global_charset']."\" />\n"
    // set up the css files for the shadowed look and the stylesheet-switcher links in show_detailed  
          ."<link rel=\"stylesheet\" type=\"text/css\" href=\"".$BBC_CSS_PATH."global.css\" media=\"all\" title=\"default\" />\n"
          ."<link rel=\"alternate stylesheet\" type=\"text/css\" href=\"".$BBC_CSS_PATH."justhumans.css\" media=\"all\" title=\"humans\" />\n"
          ."<link rel=\"alternate stylesheet\" type=\"text/css\" href=\"".$BBC_CSS_PATH."justrobots.css\" media=\"all\" title=\"robots\" />\n"
          ."<style type=\"text/css\">\n"
					."@import \"css/general.css\";\n"
          ."<!--\n"
          ."  p {font-size: ".$BBC_TEXT_SIZE."pt}\n"
          ."  td {font-size: ".$BBC_TEXT_SIZE."pt}\n"
		      ."  a.navbar {font-size: ".$BBC_SUBTITLE_SIZE."pt;}\n"
          ."  a.navbar:hover {font-size: ".$BBC_SUBTITLE_SIZE."pt;}\n"
          ."  .navbar {font-size: ".$BBC_SUBTITLE_SIZE."pt;}\n"
          ."  .titlebar {font-size: ".$BBC_TITLE_SIZE."pt}\n"
          ."  .head {font-size: ".$BBC_TEXT_SIZE."pt;}\n"
          ."  .graph {font-size: ".$BBC_NUM_SIZE."pt;}\n"
          ."-->\n"
          ."</style>\n"
          ."<style type=\"text/css\">\n"
          ."<!--\n"
    // Body styles
          ."  body {margin: 0px; padding: 0px; background-color: #edf0f9}\n"
    // redefined tags
          ."  p {font-family: Arial, Helvetica, sans-serif; color: #606680; font-size: ".$BBC_TEXT_SIZE."pt}\n"
          ."  td {font-family: Arial, Helvetica, sans-serif; color: #606680; font-size: ".$BBC_TEXT_SIZE."pt}\n"
          ."  input {border: 1px #606680 solid; background-color: #edf0f9; vertical-align: middle}\n"
          ."  select {border: 1px #606680 solid; background-color: #edf0f9; vertical-align: middle}\n"
    // Links styles
          ."  a {text-decoration: underline; color: #cc7286}\n"
          ."  a:hover {text-decoration: none; color: #606680}\n"
    // Navbar
          ."  a.navbar {font-family: Arial, Helvetica, sans-serif; font-size: ".$BBC_SUBTITLE_SIZE."pt; "
          ."text-decoration: none; padding: 3px; color: #606680}\n"
          ."  a.navbar:hover  {font-family: Arial, Helvetica, sans-serif; font-size: ".$BBC_SUBTITLE_SIZE."pt; "
          ."text-decoration: none; padding: 2px; border: 1px solid #606680; background-color: #edf0f9}\n"
          ."  .navbar {font-family: Arial, Helvetica, sans-serif; font-size: ".$BBC_SUBTITLE_SIZE."pt; "
          ."color: #98a3d1; font-weight: bold; margin: 0px; padding: 10px; vertical-align: middle}\n"
          ."  .navbar img {vertical-align: middle}\n"
    // Titlebar
          ."  .titlebar {color: #ffffff; font-weight: bold; font-size: ".$BBC_TITLE_SIZE."pt}\n"
    // Stats
          ."  .head {font-family: Arial, Helvetica, sans-serif; font-size: ".$BBC_TEXT_SIZE."pt; text-align: center; "
          ."font-weight: bold; padding: 3px; white-space: nowrap}\n"
          ."  .graph {font-family: Arial, Helvetica, sans-serif; color: #606680; font-size: ".$BBC_NUM_SIZE."pt; "
          ."padding: 3px}\n"
          ."  .capt {font-weight: bold; color: #ffffff; white-space: nowrap}\n"
    // boxes
          ."  .cntbox {background-color:#ffffff; border: 1px #606680 solid}\n"
          ."  .cntbox tr td {white-space:nowrap;}\n"
          ."  .detbox {background-color:#ffffff; border: 1px #606680; border-style: solid none}\n"
          ."  .gridbox {margin: 0px; border: 1px #606680 solid}\n"
    // border madness
          ."  .brd {border-width: 1px; border-color: #606680}\n"
           // collapse where 1px borders are needed
          ."  .collapse {border-collapse: collapse}\n"
          ."  .rows {margin: 0px; border: 1px #ffffff solid}\n"
          ."  .sky {border-width: 1px; border-color: #e5f2f7}\n"
          ."  table {border-collapse: collapse}\n"
           // evil hack for Opera 7+
          ."  tab\\le {border-collapse: separate;}\n"
           // evil hack for IE5 Mac
          ."  /*\*//*/\n"
          ."  td table {width:97%; margin:0px 1px 0px 0px; padding:0px}\n"
          ."  /**/\n"
          ."//-->\n"
          ."</style>\n"
           // another evil IE hack which should never see the daylight :-)
          ."<!--[if IE]>\n"
          ."<style type=\"text/css\">\n"
          ."  table {border-collapse: collapse !important}\n"
          ."</style>\n"
          ."<![endif]-->\n"
          ."</head>\n"
          ."<body>\n"
    // BBClone copyright notice: Removal or modification of the copyright holder
    // will void any support by the BBClone team and may be a reason to deny
    // access to the BBClone site if detected.
          ."<!--\n"
          ."This is BBClone $BBC_VERSION\n"
          ."Homebase: http://bbclone.de/\n"
          ."Copyright: 2001-2007 The BBClone team\n"
          ."License:  GNU/GPL, version 2 or later\n"
          ."-->\n";
  }

  // End of all bbclone html documents
  function html_end() {
    return "</body>\n"
          ."</html>\n";
  }

  // Return the navigation toolbar
  //  if set to 0 $lang_sel turns off the navbar and $on_bottom the title
  function topbar($lang_sel = 1, $on_bottom = 0) {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    global $_, $BBC_IMAGES_PATH, $BBC_MAINSITE, $BBC_SHOW_CONFIG, $BBC_DEVELOPER_INSTALLATION;

    // needed for navigation bar to avoid rendering issues
    $rtl = (strpos($_['global_charset'], "indows-1256") !== false) ? true : false;
    $self = basename((_BBC_PHP < 410) ? $HTTP_SERVER_VARS['PHP_SELF'] : $_SERVER['PHP_SELF']);
    $self = htmlspecialchars(str_replace("index.php", ".", $self), ENT_QUOTES);
    $url_query = !empty($this->lang_tab[$this->lng]) ? "?lng=".$this->lng."" : "";
    // Navigation bar stuff
    $navbar_title[$BBC_MAINSITE] = !empty($BBC_MAINSITE) ? $_['navbar_Main_Site'] : "";
    $navbar_title["show_config.php".$url_query] = !empty($BBC_SHOW_CONFIG) ? $_['navbar_Configuration'] : "";
    $navbar_title["show_global.php".$url_query] = $_['navbar_Global_Stats'];
    $navbar_title["show_detailed.php".$url_query] = $_['navbar_Detailed_Stats'];
    $navbar_title["show_time.php".$url_query] = $_['navbar_Time_Stats'];

    $str = (empty($lang_sel) ? "" : "<form method=\"post\" action=\"$self\">\n")
          ."<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"100%\" "
          ."style=\"background-color: #c0cbeb"
          .(empty($on_bottom) ? "" : "; border-width:1px; border-color:#606680; border-style: solid none")."\">\n"
          ."<tr>\n"
          ."<td align=\"center\" height=\"30\" width=\"100%\">\n"
          ."<span class=\"navbar\">\n"
          .($rtl ? "<bdo dir=\"rtl\">\n" : "");

    $sep = "";
    $ico_nr = 1;

    foreach ($navbar_title as $url => $title) {
      if (!empty($title)) {
        $str .= "$sep<a class=\"navbar\" href=\"$url\"><img src=\"".$BBC_IMAGES_PATH."navbar_ico".$ico_nr
               .".png\" border=\"0\" height=\"14\" width=\"14\" alt=\"icon\" />&nbsp;$title</a>";
        $sep = "&nbsp;\n";
      }
      $ico_nr++;
    }

    if (!empty($lang_sel)) {
      $str .= "&nbsp;&nbsp;\n"
             ."<img src=\"".$BBC_IMAGES_PATH."navbar_lng.png\" border=\"0\" height=\"14\" width=\"14\" "
             ."alt=\"Language\" title=\"Language\" />&nbsp;\n"
             ."<select name=\"lng\" onchange=\"if (this.selectedIndex>0){location.href='$self?lng=' + "
             ."this.options[this.selectedIndex].value;}\">\n"
             ."<option value=\"\"".(empty($this->lng) ? " selected=\"selected\"" : "").">Language</option>\n";

      foreach ($this->lang_tab as $lang_id => $lang_name) {
        $str .= "<option value=\"$lang_id\"".(($this->lng == $lang_id) ? " selected=\"selected\"" : "")
               .">$lang_name</option>\n";
      }
      $lang_tab_lng = empty($this->lang_tab[$this->lng]) ? "" : $this->lang_tab[$this->lng];
      $str .= "</select>\n"
             ."&nbsp;<input type=\"submit\" value=\"Go\" />\n";
    }

    if ($BBC_DEVELOPER_INSTALLATION == 1) {
      $str .= "<br/><a class=\"navbar\" href=\"show_regression.php".$url_query."\"><img src=\"".$BBC_IMAGES_PATH."navbar_dev_regr.png\" border=\"0\" height=\"14\" width=\"14\" alt=\"icon\" />&nbsp;Regressions</a>&nbsp;"
              ."<a class=\"navbar\" href=\"show_language_todo.php".$url_query."\"><img src=\"".$BBC_IMAGES_PATH."navbar_dev_lng.png\" border=\"0\" height=\"14\" width=\"14\" alt=\"icon\" />&nbsp;Languages</a>&nbsp;"
              ."<a class=\"navbar\" href=\"show_user_agent.php".$url_query."\"><img src=\"".$BBC_IMAGES_PATH."navbar_dev_ua.png\" border=\"0\" height=\"14\" width=\"14\" alt=\"icon\" />&nbsp;User Agent</a>";
    }

    $str .= ($rtl ? "</bdo>\n" : "")
           ."</span>\n"
           ."</td>\n"
           ."</tr>\n"
           ."</table>\n"
           .((!empty($on_bottom)) ? "" :
            "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\" class=\"brd\" "
           ."style=\"background-color: #808ebf; border-style: solid none\">\n"
           ."<tr>\n"
           ."<td align=\"center\" class=\"titlebar\" height=\"30\" width=\"100%\">\n"
           .$this->set_title()."\n"
           ."</td>\n"
           ."</tr>\n"
           ."</table><br />\n")
           .(empty($lang_sel) ? "" : "</form>\n");

      return $str;
  }

  function last_reset($timestamp) {
    global $_;

    return "<p align=\"center\"><i>".$_['global_last_reset'].": ".date($_['global_date_format'], $timestamp)
          .".</i></p>\n";
  }

  function copyright() {
    global $BBC_IMAGES_PATH, $BBC_VERSION, $_;

    return "<p align=\"center\">\n"
          ."<a href=\"http://bbclone.de/\">BBClone $BBC_VERSION</a>"
          ." &copy; ".$_['global_bbclone_copyright']." "
          ."<a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>"
          ." <a href=\"http://validator.w3.org/check?url=referer\">"
          ."<img src=\"".$BBC_IMAGES_PATH."valid-xhtml10.png\" height=\"15\" width=\"80\" border=\"0\" "
          ."alt=\"Valid XHTML 1.0!\" title=\"Valid XHTML 1.0!\" align=\"middle\" />"
          ."</a>\n "
          ."<a href=\"http://jigsaw.w3.org/css-validator/check/referer\"><img src=\"".$BBC_IMAGES_PATH
          ."valid-css.png\" height=\"15\" width=\"80\" border=\"0\" alt=\"Valid CSS!\" title=\"Valid CSS!\" "
          ."align=\"middle\" /></a>\n"
          ."</p>\n";
  }

  // generates the explanation rows. The $val switch determines whether we show
  // the variable's value or just indicate its state
  function show_var($varname, $val = 1) {
    $caps = "BBC_".strtoupper($varname);

    global $$caps, $_;

    // Ugly hack to save some lines of typing
    $$caps = ($caps == "BBC_TITLEBAR") ? $this->set_title() : $$caps;

    return "<tr style=\"background-color: #e0e5f2\" onmouseover=\"this.style.backgroundColor='#e5f2f7'\" "
          ."onmouseout=\"this.style.backgroundColor='#e0e5f2'\">\n"
          ."<td align=\"left\" class=\"rows\" valign=\"middle\">\n"
          ."<b>\$$caps</b>\n"
          ."</td>\n"
          ."<td align=\"left\" class=\"rows\" valign=\"middle\">\n"
          .$_["config_bbc_".$varname]."\n"
          ."</td>\n"
          ."<td align=\"left\" class=\"rows\" valign=\"middle\">\n"
          ."<b>".(!empty($$caps) ? (empty($val) ? $_['global_yes'] : $$caps) : $_['global_no'])."</b>\n"
          ."</td>\n"
          ."</tr>\n";
  }

  // Color explanation
  function color_explain() {
    global $_, $BBC_MAXTIME, $BBC_MAXVISIBLE;

    return "<p align=\"center\"><i>\n"
          .$_['dstat_visible_rows'].": $BBC_MAXVISIBLE,\n"
          ."<span style=\"color: #61ae9d\">".$_['dstat_green_rows'].":</span> ".$_['dstat_last_visit']." &lt; $BBC_MAXTIME ".$_['misc_second_unit'].",\n"
          ."<span style=\"color: #808ebf\">".$_['dstat_blue_rows'].":</span> ". $_['dstat_last_visit']." &gt; $BBC_MAXTIME ".$_['misc_second_unit'].",\n"
          ."<span style=\"color: #cc7286\">".$_['dstat_red_rows'].":</span> ".$_['dstat_robots'].",\n"
          ."<span style=\"color: #da9405\">".$_['dstat_orange_rows'].":</span> ".$_['dstat_my_visit'].".\n"
          ."</i></p>\n";
  }

  // Determine the color of the connection
  function connect_code_color($connect) {
    global $BBC_MAXTIME, $BBC_TIMESTAMP, $BBC_TIME_OFFSET;
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    // It was you
    if (((_BBC_PHP < 410) ? $HTTP_SERVER_VARS["REMOTE_ADDR"] : $_SERVER["REMOTE_ADDR"]) == $connect['ip']) return '#feefd0';
    // else, it was an access within $BBC_TIME_OFFSET
    elseif ((($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60)) - $connect['time']) < $BBC_MAXTIME) return "#e5f2f7";
    // else, it is red if it is a robot
    elseif (!empty($connect['robot'])) return "#efe2ec";
    // or blue if something else
    else return "#e0e5f2";
  }

	/**
	 *
	 *
	 */
	function get_language_name($lang_var) {
		$lang = $this->lang_tab[$lang_var];
		return ($lang == NULL) ? "XXX" : $lang;
	}

  //constructor
  function bbc_html() {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    $this->lang_tab = array(
      "ar"    => "Arabic",
      "bs"    => "Bosnian",
      "bg"    => "Bulgarian",
      "ca"    => "Catalan",
      "cs"    => "Czech",
      "zh-cn" => "Chinese Simp",
      "zh-tw" => "Chinese Trad",
      "da"    => "Danish",
      "nl"    => "Dutch",
      "en"    => "English",
      "fi"    => "Finnish",
      "fr"    => "French",
      "de"    => "German",
      "el"    => "Greek",
      "et"    => "Estonian",
      "hu"    => "Hungarian",
      "id"    => "Indonesian",
      "it"    => "Italian",
      "ja"    => "Japanese",
      "ko"    => "Korean",
      "lt"    => "Lithuanian",
      "mk"    => "Macedonian",
      "nb"    => "Norwegian Bkm",
      "pl"    => "Polish",
      "pt"    => "Portuguese",
      "pt-br" => "Portuguese Br",
      "ro"    => "Romanian",
      "ru"    => "Russian",
      "sk"    => "Slovak",
      "sl"    => "Slovenian",
      "es"    => "Spanish",
      "sv"    => "Swedish",
      "th"    => "Thai",
      "tr"    => "Turkish",
      "uk"    => "Ukrainian"
    );

    $this->lng = $this->get_lng();
    $this->server = ((_BBC_PHP < 410) ? !empty($HTTP_SERVER_VARS['SERVER_NAME']) : !empty($_SERVER['SERVER_NAME'])) ?
                    htmlspecialchars(((_BBC_PHP < 410) ? $HTTP_SERVER_VARS['SERVER_NAME'] : $_SERVER['SERVER_NAME']),
                    ENT_QUOTES) : "noname";
  }
}
?>
