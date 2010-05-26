<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_regression.php,v 1.14 2009/06/21 07:33:08 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_LIB_PATH."regression.php") as $i) {
  if (is_readable($i)) require_once($i);
  else {
    if (!empty($BBC_DEBUG)) exit(bbc_msg($i));
    else return;
  }
}

// Determine whether we are allowed to display development features
if (empty($BBC_DEVELOPER_INSTALLATION)) die("<h3>BBClone $BBC_VERSION</h3>\n<hr />\n".$_['error_cannot_see_development']."\n");

$all = 0;
$browser_ok = 0;
$browser_failed = 0;
$browser_todo = 0;
$os_ok = 0;
$os_failed = 0;
$os_todo = 0;
$robot_ok = 0;
$robot_failed = 0;
$robot_todo = 0;

define("markTODO", "TODO");
define("markCRAP", "crap");

function print_header() {
  return '<tr><td class="head">User Agent</td><td class="head">Status</td></tr>'.chr(13);
}

function summary_entry($name, $all, $ok, $todo, $failed, $post, $type) {
	$str = '<tr style="background-color: #e5f2f7" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'"><td class="rows">'.$name.':</td><td class="rows">'.$ok.' passed';
	if (isset($post[$type.'_ok'])) {
		$str .= ', last run: '.$post[$type.'_ok'];
	}
	$str .= '; '.$todo.' todo (='.number_format($todo/$all*100, 1).'%)';
	if (isset($post[$type.'_todo'])) {
		$str .= ', last run '.$post[$type.'_todo'];
	}
	$str .= '; '.$failed.' failed (='.number_format($failed/$all*100, 1).'%)';
	if (isset($post[$type.'_failed'])) {
		$str .= ', last run '.$post[$type.'_failed'];
	}
	$str .= '</td></tr>'.chr(13);
	return $str;
}

function print_summary() {
  if (_BBC_PHP < 410) global $HTTP_POST_VARS;
  global $all, $browser_ok, $browser_failed, $browser_todo, $os_ok, $os_failed, $os_todo, $robot_ok, $robot_failed, $robot_todo, $show_ok;
  $post = (_BBC_PHP < 410) ? $HTTP_POST_VARS : $_POST;
  return '<tr style="background-color: #e5f2f7" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'"><td class="rows">All:</td><td class="rows">'.$all.' (last run: '.$post['all'].')</td></tr>'.
  summary_entry('Browser', $all, $browser_ok, $browser_todo, $browser_failed, $post, 'browser').
  summary_entry('OS', $all, $os_ok, $os_todo, $os_failed, $post, 'os').
  summary_entry('Robot', $all, $robot_ok, $robot_todo, $robot_failed, $post, 'robot').
'<tr style="background-color: #e5f2f7" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'"><td class="rows" colspan="2">
<form action="'.((_BBC_PHP < 410) ? $_PHP_SELF : $_SERVER['PHP_SELF']).'?'.($show_ok == true ? 'show_ok=true' : '').'" method="post">
<input type="hidden" name="browser_ok" value="'.$browser_ok.'" />
<input type="hidden" name="browser_todo" value="'.$browser_todo.'" />
<input type="hidden" name="browser_failed" value="'.$browser_failed.'" />
<input type="hidden" name="os_ok" value="'.$os_ok.'" />
<input type="hidden" name="os_todo" value="'.$os_todo.'" />
<input type="hidden" name="os_failed" value="'.$os_failed.'" />
<input type="hidden" name="robot_ok" value="'.$robot_ok.'" />
<input type="hidden" name="robot_todo" value="'.$robot_todo.'" />
<input type="hidden" name="robot_failed" value="'.$robot_failed.'" />
<input type="hidden" name="all" value="'.$all.'" />
<input type="button" value="Rerun again" onclick="submit()" />
</form>
</td></tr>'.chr(13);
}

function add_row($user_agent, $marked, $typ, $i, $expected_name) {
	$retval = '<tr style="background-color: #e0e5f2" onmouseover="this.style.backgroundColor=\'#ffffff\'" onmouseout="this.style.backgroundColor=\'#e0e5f2\'">
<td class="rows">'.htmlentities($user_agent, ENT_QUOTES).'</td>
<td class="rows">';
	if ($expected_name == NULL) {
		$retval .= '<span style="color:'.$marked.';">'.$typ."</span></td>\n";
	} else {
		$retval .= '<span style="color:'.($marked ? ((($i == 'other') || ($i == 'robot')) ? 'yellow' : 'orange') : 'red').';">'.$typ.': Got \''.$i.'\', expected \''.$expected_name."'.</span></td>\n";
	}
	$retval .= "</tr>\n";
	return $retval;
}

if (is_readable($BBC_LIB_PATH."browser.php")) require_once($BBC_LIB_PATH."browser.php");
else return bbc_msg($BBC_LIB_PATH."browser.php");

$regression_keys = array_keys($regression);

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    ."<tr>\n<td class=\"detbox\" align=\"center\" valign=\"middle\">\n"
    ."<table class=\"collapse\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
    .print_header();

$get = (_BBC_PHP < 410) ? $HTTP_GET_VARS : $_GET;
$show_ok = (isset($get['show_ok']) && ($get['show_ok'] == 'true'));

$all = count($regression_keys);
for ($g=0; $g<count($regression_keys); $g++) {
  $user_agent = $regression_keys[$g];

  $expected_browser_name = $regression[$regression_keys[$g]]['browser'];
  $expected_os_name = $regression[$regression_keys[$g]]['os'];
  $expected_robot_name = $regression[$regression_keys[$g]]['robot'];

  foreach (array("robot", "browser", "os") as $i) {
    require_once($BBC_LIB_PATH.$i.".php");
    reset($$i);

    while (list(${$i."_name"}, ${$i."_elem"}) = each($$i)) {
      reset(${$i."_elem"}['rule']);

      while (list($pattern, $note) = each(${$i."_elem"}['rule'])) {
        if ((($i == "browser") && ($expected_browser_name == NULL)) ||
            (($i == "os") && ($expected_os_name == NULL)) ||
            (($i == "robot") && ($expected_robot_name == NULL)))
          break;

        // eregi() is intentionally used because some php installations don't
        // know the "i" switch of preg_match() and would generate phony compile
        // error messages
        //if (!eregi($pattern, $user_agent, $regs)) continue;
        // but we need that syntax, sigh
        if (!preg_match('~'.$pattern.'~i', $user_agent, $regs)) continue;

        $marked = (($expected_browser_name == markCRAP) || ($expected_browser_name == markTODO) ||
                   ($expected_os_name == markCRAP) || ($expected_os_name == markTODO) ||
                   ($expected_robot_name == markCRAP) || ($expected_robot_name == markTODO));


        if (($i == "browser") && (strcmp($expected_browser_name, ${$i."_name"}) != 0)) {
          echo add_row($user_agent, $marked, 'Browser', ${$i."_name"}, $expected_browser_name);
          if ($marked) ${$i.'_todo'}++; else ${$i.'_failed'}++;
        } elseif (($i == "os") && (strcmp($expected_os_name, ${$i."_name"}) != 0)) {
          echo add_row($user_agent, $marked, 'OS', ${$i."_name"}, $expected_os_name);
          if ($marked) ${$i.'_todo'}++; else ${$i.'_failed'}++;
        } elseif (($i == "robot") && (strcmp($expected_robot_name, ${$i."_name"}) != 0)) {
          echo add_row($user_agent, $marked, 'Robot', ${$i."_name"}, $expected_robot_name);
          if ($marked) ${$i.'_todo'}++; else ${$i.'_failed'}++;
        } else {
          if ($show_ok) echo add_row($user_agent, 'green', 'OK', NULL, NULL);
          ${$i.'_ok'}++;
        }
        flush();

        break 2;
      }
    }
    if (!empty($connect['robot'])) break;
  }
}

echo print_summary()."</table>\n"
    ."</td>\n</tr>\n</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();

?>
