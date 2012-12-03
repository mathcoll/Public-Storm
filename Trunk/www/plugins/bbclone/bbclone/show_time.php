<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_time.php,v 1.68 2009/06/21 07:33:08 joku Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."html.php", $BBC_LIB_PATH."selectlang.php", $BBC_ACCESS_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// Functions

// optical correction of the graphical output
function bbc_graph_spacer($last, $nr, $values) {
  if ($nr == $last) $str = "none";
  else $str = ($values[$nr] > $values[($nr + 1)]) ? "solid" : "none";

  $str .= " none ";

  if ($nr === 0) $str .= "none";
  else $str .= ($values[$nr] >= $values[($nr - 1)]) ? "solid" : "none";

  return $str;
}

// Plot a positive sequence of integers $y in function of a sequence $x
// (whatever it is) in a box of size [$width * $height] in pixels
function bbc_plot($x, $y, $width, $height) {
  global $BBC_IMAGES_PATH;

  // Various sizes
  $nb_x = count($x);
  $nb_y = count($y);
  $nb = !empty($x) ? min($nb_x, $nb_y) : $nb_y;
  $bar_width = round($width / $nb);

  // Borik's Average Line Hack, part 1 of 3
  $s = array_sum($y);
  $nb_e = $nb;
  if ($nb_e == 12) {
  	for ($i = 0; $i < 12; $i++) {
      if ($y[$i] != 0) {
        $nb_e = $nb_e-$i;
        break;
      }
    }
  }
  $a=round($s/$nb_e);

  // Finding the maxima
  for ($k = 0, $max_y = 0; $k < $nb; $max_y = max($y[$k],$max_y), $k++);
  // The height of one unit
  $unit_height = !empty($max_y) ? (0.92 * ($height / $max_y)) : 0;

  // Borik's Average Line Hack, part 2 of 3
  $ah= round($max_y*$unit_height) - round($a*$unit_height)+17;
  $str = "<div><div style=\"position: relative; top:".$ah."px; left:2px; border-bottom:1px dashed #f08c8c; margin:0px; padding:0px; width:96%; background:none; \"><p align=\"left\" style=\"color:#df5959; padding:0px;margin:0px;\"><em>Average: ".$a."</em></p></div>";
  $str  .= "<table class=\"cntbox\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n"
         ."<tr style=\"background-color: #e5f2f7\">\n";

  for ($k = 0; $k < $nb; $k++) {
    $bar_height = round($y[$k] * $unit_height);

    $str .= "<td valign=\"bottom\" align=\"center\" width=\"$bar_width\" height=\"$height\">\n"
           ."<table align=\"center\" border=\"0\"  cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n"
           ."<tr>\n";

    if ($y[$k]) {
      $numb = ($y[$k] >= 1000) ? substr(($tmp = $y[$k] / 1000) ,0 , (strpos($tmp, ".") + 2))."k" : $y[$k];

      $bbc_column_color = "c0cbeb";  // original column color
      if ($nb > 27 || $nb == 7) {  // make sure it's a month and not a week, hour, et cetera
        $bbc_weekend = mktime(0, 0, 0, date("m"), date("d") - ($nb - $k - 1), date("Y"));
        if (date("w", $bbc_weekend) == 0 || date("w", $bbc_weekend) == 6) {  // 0 is Sunday and 6 is Saturday
          $bbc_column_color = "9EAACE";  // Hex color to display for weekends
        }
      } else if ($nb == 24) {
        $bbc_weekend = mktime(date("G") - ($nb - $k - 1), 0, 0, date("m"), date("d"), date("Y"));
      } else {
        $bbc_weekend = mktime(0, 0, 0, date("m") - ($nb - $k - 1), date("d"), date("Y"));
      }

      $str .= "<td align=\"center\" valign=\"bottom\" class=\"sky\" height=\"".($height - $bar_height)."\" "
           ."style=\"white-space: nowrap; border-style: none ".bbc_graph_spacer(($nb - 1), $k, $y)."\">"
           ."<span class=\"graph\">$numb</span>"
           ."</td>\n"
           ."</tr>\n"
           ."<tr style=\"background-color:#" . $bbc_column_color . "\">\n";
      if ($nb > 27 || $nb == 7) {  // make sure it's a month and not a week, hour, et cetera
        $str .= "<td title=\"".date("l M jS, Y", $bbc_weekend)."  &laquo;".$y[$k]."&raquo; \" height=\"$bar_height\" class=\"brd\" ";
      } else if ($nb == 24) {
        $str .= "<td title=\"".date("l M jS, Y g:00 A", $bbc_weekend)."  &laquo;".$y[$k]."&raquo; \" height=\"$bar_height\" class=\"brd\" ";  
      } else {
        $str .= "<td title=\"".date("F Y", $bbc_weekend)."  &laquo;".$y[$k]."&raquo; \" height=\"$bar_height\" class=\"brd\" ";  
      }
      $str .= "style=\"white-space: nowrap; border-style: solid ".bbc_graph_spacer(($nb - 1), $k, $y)."\"></td>\n";
    }
    else $str .= "<td style=\"white-space: nowrap;\" height=\"$height\"></td>\n";

    $str .= "</tr>\n"
           ."</table>\n"
           ."</td>\n";
  }

  $str .= "</tr>\n"
         ."<tr style=\"background-color: #808ebf\">\n";

  for ($k = 0; $k < $nb; $k++) {
    $str .= "<td valign=\"bottom\" align=\"center\" width=\"$bar_width\" height=\"15\">\n"
           ."<table class=\"brd\" style=\"border-style: solid none none\" align=\"center\" border=\"0\" "
           ."cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n"
           ."<tr>\n"
           ."<td align=\"center\" height=\"15\" class=\"capt\">".$x[$k]."</td>\n"
           ."</tr>\n"
           ."</table>\n"
           ."</td>\n";
  }

  $str .= "</tr>\n"
         ."</table>\n";

  // Borik's Average Line Hack, part 3 of 3
  $str .= "</div>";
  return $str;
}

function bbc_show_plot_time_type($time_type, $width, $height) {
  global $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $access, $_;

  $last_time = isset($access['time']['last']) ? $access['time']['last'] : 0;
  $current_time = $BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60);
  $nb_seconds_in_day  = 86400;
  $nb_seconds_in_week = 7 * $nb_seconds_in_day;
  $last_month = date("n", $last_time) - 1;
  $nb_seconds_in_last_year = (date("L", $last_time) ? 366 : 365) * $nb_seconds_in_day;

  switch ($time_type) {
    case "hour":
      $current_hour = date("G", $current_time);
      $last_hour    = date("G", $last_time);

      for ($k = $current_hour - 23; $k <= $current_hour; $x[] = ($k < 0) ? ($k + 24) : $k, $k++);
      for ($k = 0; $k < 24; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= $nb_seconds_in_day) {
        $elapsed = $current_hour - $last_hour;
        $elapsed = ($elapsed < 0) ? ($elapsed + 24) : $elapsed;

        for ($k = $elapsed; $k < 24; $k++) {
          $y[$k - $elapsed] = $access['time']['hour'][($last_hour + 1 + $k) % 24];
        }
      }
      break;

    case "wday":
      $day_name = array($_['tstat_Su'], $_['tstat_Mo'], $_['tstat_Tu'],
                        $_['tstat_We'], $_['tstat_Th'], $_['tstat_Fr'],
                        $_['tstat_Sa']);

      $current_wday = date("w", $current_time);
      $last_wday    = date("w", $last_time);

      for ($k = $current_wday - 6; $k <= $current_wday;
        $x[] = $day_name[($k < 0) ? $k + 7 : $k], $k++);
      for ($k = 0; $k < 7; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= $nb_seconds_in_week) {
        $elapsed = $current_wday - $last_wday;
        $elapsed = ($elapsed < 0) ? $elapsed + 7 : $elapsed;

        for ($k = $elapsed; $k < 7; $k++) {
          $y[$k - $elapsed] = $access['time']['wday'][($last_wday + 1 + $k) % 7];
        }
      }
      break;

    case "day":
      // We suppose that the first day of the month is 0 for array compatibility
      $current_day    = date("j", $current_time) - 1;
      $last_day       = date("j", $last_time) - 1;
      $time_in_prec_month = $current_time - ($current_day + 1) * $nb_seconds_in_day;
      $lg_prec_month  = date("t", $time_in_prec_month);
      $lg_prec_month  = ($current_day >= $lg_prec_month) ? ($current_day + 1) : $lg_prec_month;
      $current_month  = date("n", $current_time);
      $prec_month     = date("n", $time_in_prec_month);

      // Computing the $x
      for ($k = $current_day + 1; $k < $lg_prec_month; $x[] = ($k + 1), $k++);
      for ($k = 0; $k <= $current_day; $x[] = ($k + 1), $k++);
      // Computing the $y
      for ($k = 0; $k < 31; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= ($lg_prec_month * $nb_seconds_in_day)) {
        $elapsed = $current_day - $last_day;
        $elapsed = ($elapsed < 0) ? ($elapsed + $lg_prec_month) : $elapsed;

        for ($k = $elapsed; $k < $lg_prec_month; $k++) {
          $y[$k - $elapsed] = $access['time']['day'][($last_day + 1 + $k) % $lg_prec_month];
        }
      }
      break;

    case "month":
      $month_name = array($_['tstat_Jan'], $_['tstat_Feb'], $_['tstat_Mar'], $_['tstat_Apr'], $_['tstat_May'],
                          $_['tstat_Jun'], $_['tstat_Jul'], $_['tstat_Aug'], $_['tstat_Sep'], $_['tstat_Oct'],
                          $_['tstat_Nov'], $_['tstat_Dec']);

      $current_month = date("n", $current_time) - 1;
      $last_month    = date("n", $last_time) - 1;

      for ($k = $current_month - 11; $k <= $current_month; $x[] = $month_name[(($k < 0) ? ($k + 12) : $k)], $k++);
      for ($k = 0; $k < 12; $y[$k] = 0, $k++);

      if (($current_time - $last_time) <= $nb_seconds_in_last_year) {
        $elapsed = $current_month - $last_month;
        $elapsed = ($elapsed < 0) ? $elapsed + 12 : $elapsed;

        for ($k = $elapsed; $k < 12; $k++) {
          $y[$k - $elapsed] = $access['time']['month'][(($last_month + 1 + $k) % 12)];
        }
      }
      break;
  }

  return bbc_plot($x, $y, $width, $height);
}

// MAIN

echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    .(isset($access['time']['reset']) ? $bbc_html->last_reset($access['time']['reset']) : "")
    ."<table align=\"center\" border=\"0\" width=\"640\" class=\"cntbox\" cellpadding=\"15\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"head\" colspan=\"2\"><br />".$_['tstat_last_day']."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"center\" colspan=\"2\">\n"
    .bbc_show_plot_time_type("hour", 640, 200)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"head\">".$_['tstat_last_week']."</td>\n"
    ."<td class=\"head\">".$_['tstat_last_year']."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"center\">\n"
    .bbc_show_plot_time_type("wday", 203, 200)
    ."</td>\n"
    ."<td align=\"center\">\n"
    .bbc_show_plot_time_type("month", 407, 200)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"head\" colspan=\"2\">".$_['tstat_last_month']."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"center\" colspan=\"2\">\n"
    .bbc_show_plot_time_type("day", 640, 200)
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
?>
