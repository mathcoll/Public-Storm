<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/timecalc.php,v 1.15 2009/06/21 07:33:11 joku Exp $
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

// FIXME: One common class instead of two functions

function bbc_time_offset() {
  global $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $access, $last;

  $cfg_offset = !empty($BBC_TIME_OFFSET) ? $BBC_TIME_OFFSET : 0;
  $sav_offset = isset($access['time']['offset']) ? $access['time']['offset'] : 0;
  $diff_offset = $cfg_offset - $sav_offset;

  if (empty($diff_offset)) return;

  $diff_hours = -round($diff_offset / 60);
  $new_time = $BBC_TIMESTAMP + ($cfg_offset * 60);
  $old_time = $BBC_TIMESTAMP + ($sav_offset * 60);
  $access['time']['last'] += $diff_offset * 60;
  $access['time']['offset'] = $cfg_offset;

  // Shift the last reset marker as well if available
  if (!empty($access['time']['reset'])) $access['time']['reset'] += $diff_offset * 60;

  // shifting the detailed stats
  for ($i = 0, $max = count($last['traffic']); $i < $max; $i++) $last['traffic'][$i]['time'] += $diff_offset * 60;

  $last_day_in_month = $access['time']['day'][(count($access['time']['day']) - 1)];
  $today = date("w", $new_time);
  $yesterday = empty($today) ? ($today + 6) : ($today - 1);
  $days_diff = ($today != date("w", $old_time)) ? 1 : 0;

  $this_day = date("j", $new_time) - 1;
  $last_day = empty($this_day) ? $last_day_in_month : ($this_day - 1);

  $this_month = date("n", $new_time) - 1;
  $last_month = empty($this_month) ? ($this_month + 11) : ($this_month - 1);

  // shifting hourly stats to get the amount "this day - previous day" we need to modify
  $shift = array_splice($access['time']['hour'], $diff_hours, 24);
  $diff = ($diff_hours < 0) ? array_sum($shift) : array_sum($access['time']['hour']);
  $access['time']['hour'] = array_merge($shift, $access['time']['hour']);

  for ($i = 0, $hits = 0, $max = date("G", $new_time); $i <= $max; $i++) $hits += $access['time']['hour'][$i];
  for ($i = ($max + 1), $rest = 0; $i < 24; $i++) $rest += $access['time']['hour'][$i];

  if ($diff_hours < 0) {
    //set time forth
    $access['time']['wday'][$today] = $hits;
    $access['time']['day'][$this_day] = $hits;
    $access['time']['wday'][$yesterday] -= ($access['time']['wday'][$yesterday] < $diff) ? $hits : $diff;
    $access['time']['day'][$last_day] -= ($access['time']['day'][$last_day] < $diff) ? $hits : $diff;

    if ($access['time']['day'][$this_day] == $last_day_in_month) {
      $access['time']['month'][$this_month] = $hits;
      $access['time']['month'][$last_month] -= ($access['time']['month'][$last_month] < $diff) ? $hits : $diff;
    }
  }
  else {
    // set time back
    $access['time']['wday'][$yesterday] += $days_diff ? $rest : $diff;
    $access['time']['day'][$last_day] += $days_diff ? $rest : $diff;
    $access['time']['wday'][$today] = $hits;
    $access['time']['day'][$this_day] = $hits;

    if ($access['time']['day'][$this_day] == $access['time']['day'][0]) {
      $access['time']['month'][$last_month] += $days_diff ? $rest : $diff;
      $access['time']['month'][$this_month] = $hits;
    }
  }
}

// Update the time stats in $access['time']
function bbc_update_time_stat($new_time, $last_time) {
  global $access;

  // Independent variables
  static $nb_seconds_in_day  = 86400;
  static $nb_seconds_in_week = 604800;

  // Variables for the new time
  $new_hour = date("G", $new_time);
  $new_wday = date("w", $new_time);
  $new_day = date("j", $new_time) - 1;
  $new_month = date("n", $new_time) - 1;

  // Variables for the last time
  $last_hour = date("G", $last_time);
  $last_wday = date("w", $last_time);
  $last_day = date("j", $last_time) - 1;
  $last_month = date("n", $last_time) - 1;
  $last_lgmonth = date("t", $last_time);

  $nb_seconds_in_last_month = $last_lgmonth * $nb_seconds_in_day;
  $nb_seconds_in_last_year = (date("L", $last_time) ? 366 : 365) * $nb_seconds_in_day;
  // Updating the last connection time to the new one
  // for the next call of bbc_update_time_stat
  $access['time']['last'] = $new_time;

  // Updating the hourly time stats (in a day)
  // Setting to zero the time-counters present between the last connections
  // and the new one, and incrementing the new time-counter
  // Last day, there are 24 hours = 86400 seconds
  if (($new_time - $last_time) > $nb_seconds_in_day) {
    for ($k = 0; $k < 24; $k++) $access['time']['hour'][$k] = 0;
  }
  else {
    $elapsed = $new_hour - $last_hour;
    $elapsed = ($elapsed < 0) ? $elapsed + 24 : $elapsed;

    for ($k = 1; $k <= $elapsed; $k++) $access['time']['hour'][($last_hour + $k) % 24] = 0;
  }
  $access['time']['hour'][$new_hour]++;

  // Updating the daily time stats (in a week)
  // Last week, there are 7 days = 604800 seconds
  if (($new_time - $last_time) > $nb_seconds_in_week) {
    for ($k = 0; $k < 7; $k++) $access['time']['wday'][$k] = 0;
  }
  else {
    $elapsed = $new_wday - $last_wday;
    $elapsed = ($elapsed < 0) ? $elapsed + 7 : $elapsed;

    for ($k = 1; $k <= $elapsed; $k++) $access['time']['wday'][($last_wday + $k) % 7] = 0;
  }

  $access['time']['wday'][$new_wday]++;

  // Updating the daily time stats (in a month)
  // Last month, there are 28, 29, 30 or 31 days
  // Note: we have to reset 31 days even if we are a month with less days
  if (($new_time - $last_time) > $nb_seconds_in_last_month) {
    for ($k = 0; $k < 31; $k++) $access['time']['day'][$k] = 0;
  }
  else {
    $elapsed = $new_day - $last_day;
    $elapsed = ($elapsed < 0) ? $elapsed + $last_lgmonth : $elapsed;

    for ($k = 1; $k <= $elapsed; $k++) $access['time']['day'][($last_day + $k) % $last_lgmonth] = 0;
  }

  $access['time']['day'][$new_day]++;

  // Updating the monthly time stats (in a year)
  // Last year, there are 12 months
  if (($new_time - $last_time) > $nb_seconds_in_last_year) {
    for ($k = 0; $k < 12; $k++) $access['time']['month'][$k] = 0;
  }
  else {
    $elapsed = $new_month - $last_month;
    $elapsed = ($elapsed < 0) ? $elapsed + 12 : $elapsed;

    for ($k = 1; $k <= $elapsed; $k++) $access['time']['month'][($last_month + $k) % 12] = 0;
  }
  $access['time']['month'][$new_month]++;
}
?>