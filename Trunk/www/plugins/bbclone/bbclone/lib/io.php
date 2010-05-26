<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/io.php,v 1.72 2009/09/27 11:49:59 joku Exp $
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

// remove unwanted stuff from user input
function bbc_clean($input, $sep = 0) {
  $sp = strpos($input, $sep);
  // only look for separator if really needed
  $input = (!empty($sep) && ($sp !== false)) ? substr($input, 0, $sp) : $input;
  $input = str_replace("\\", "/", strip_tags($input));
  $input = str_replace("$", "&#36;", htmlspecialchars($input, ENT_QUOTES));

  // Limit the maximum length to 1024 chars
  return trim(substr($input, 0, 1024));
}

// generates string output of an array
function bbc_array_to_str($tab) {
  static $indent = "";

  $oldindent = $indent;
  $indent   .= "  ";
  $sep       = "";
  $str = $indent."array(\n";
  $last_is_array = false;
  $k = 0;

  reset($tab);

  while (list($key, $val) = each($tab)) {
    // The separator treatment
    if (($last_is_array) || (is_array($val) && ($k !== 0))) {
      $str .= $sep."\n";
    }
    else $str .= $sep;

    // The key treatment
    if (preg_match("%^[\d]+$%", $key)) {
      if ($key !== $k) {
        $str .= (((is_array($val)) || ($k === 0) || ($last_is_array)) ? "$indent  " : "")
               ."$key =>".((is_array($val)) ? "\n" : " ");
      }
      else $str .= ($k === 0) ? (is_array($val) ? "" : "$indent  ") : "";
    }
    else {
      $str .= (((is_array($val)) || ($k === 0) || ($last_is_array)) ? "$indent  " : "")
             ."\"$key\" =>".((is_array($val)) ? "\n" : " ");
    }

    // The value treatment
    $last_is_array = false;
    if (is_array($val)) {
      $str .= bbc_array_to_str($val);
      $last_is_array = true;
      $sep = ",";
    }
    else {
      $str .= (preg_match("%^[\d]+$%", $val) ? $val : "\"$val\"");
      $sep = ", ";
    }
    $k++;
  }
  $str .= "\n$indent)";
  $indent = $oldindent;
  return $str;
}

// BBClone's ftok emulation for sem_get
function bbc_ftok($file) {
  $stat = stat($file);
  $dev = decbin($stat[0]);
  $inode = decbin($stat[1]);

  foreach (array("dev", "inode") as $what) {
    $lim = ($what == "inode") ? 16 : 8;

    if ($$what == $lim) continue;
    elseif ($$what < $lim) $$what = str_pad($$what, $lim, 0);
    else $$what = substr($$what, -$lim);
  }
  return bindec("1111000".$dev.$inode);
}

// returns the lock id
function bbc_semlock($file) {
  if (!$id = sem_get(bbc_ftok($file), 1) || !sem_acquire($id)) {
    if (is_resource($id)) {
      sem_release($id);
      @sem_remove($id);
    }
    return false;
  }
  return $id;
}

// write data, returns file pointer on success else false
function bbc_get_lock($file, $append = false) {
  $mode = !$append ? (defined("_BBC_DIO") ? O_RDWR : "rb+") : (defined("_BBC_DIO") ? O_WRONLY : "ab");
  $fp = defined("_BBC_DIO") ? dio_open($file, $mode | O_APPEND) : fopen($file, $mode);

  if (!is_resource($fp)) return false;

  if (defined("_BBC_SEM") && ($id = bbc_semlock($file))) return array($fp, $id);
  if (defined("_BBC_DIO") && (dio_fcntl($fp, F_SETLK, 1) !== -1)) return $fp;
  if (defined("_BBC_FLK") && flock($fp, LOCK_EX)) return $fp;

  defined("_BBC_DIO") ? dio_close($fp) : fclose($fp);
  return false;
}

// writes data or truncates file and returns file pointer on success
function bbc_write_data($fp, $data = false, $append = false) {
  if (defined("_BBC_SEM") && is_array($fp)) list($fp, $id) = $fp;
  if (!is_resource($fp)) return false;

  if (defined("_BBC_DIO")) {
    $append ? "" : dio_truncate($fp, 0);
    $data ? dio_write($fp, $data) : "";
    dio_fcntl($fp, F_SETLK, 0);
    dio_close($fp);

    return true;
  }

  set_file_buffer($fp, 0);
  $append ? "" : ftruncate($fp, 0);
  $data ? fwrite($fp, $data) : "";
  defined("_BBC_FLK") ? flock($fp, LOCK_UN) : "";

  if (defined("_BBC_SEM") && is_resource($id)) {
    sem_release($id);
    @sem_remove($id);
  }
  return fclose($fp);
}

//initialise the bbc_marker class
function bbc_exec_marker() {
  $bbc_marker = new bbc_marker;

  if ($bbc_marker->ignored === true) return bbc_msg(false, "i");
  else $msg = $bbc_marker->write_entry();

  switch ($msg[1]) {
    case "o":
      if (!defined("_OK")) define("_OK", 1);
      return bbc_msg($msg[0], "o");
    case "l":
      return bbc_msg($msg[0], "l");
    case "w":
      return bbc_msg($msg[0], "w");
    default:
      return bbc_msg($msg[0]);
  }
}

// kill stats if desired
function bbc_kill_stats() {
  global $BBC_ACCESS_FILE, $BBC_CACHE_PATH, $BBC_COUNTER_FILES, $BBC_COUNTER_PREFIX, $BBC_COUNTER_SUFFIX,
         $BBC_LAST_FILE;

  $paths = array($BBC_ACCESS_FILE, $BBC_LAST_FILE);

  for ($i = 0; $i < $BBC_COUNTER_FILES; $i++) $paths[] = $BBC_CACHE_PATH.$BBC_COUNTER_PREFIX.$i.$BBC_COUNTER_SUFFIX;

  foreach ($paths as $file) fclose(fopen($file, "wb"));
  return true;
}

// Parse all counter files of var/ and return an array of N rows,
// with N as amount of new connections, sorted in increasing time of connection.
// The counters files are emptied afterwards.
function bbc_counter_to_array() {
  global $BBC_CACHE_PATH, $BBC_COUNTER_PREFIX, $BBC_COUNTER_SUFFIX, $BBC_SEP, $BBC_COUNTER_COLUMNS,
         $BBC_COUNTER_COLUMN_NAMES, $BBC_COUNTER_FILES, $BBC_DEBUG;

  for ($i = 0, $new_cnt = 0; $i < $BBC_COUNTER_FILES; $i++) {
    $file = $BBC_CACHE_PATH.$BBC_COUNTER_PREFIX.$i.$BBC_COUNTER_SUFFIX;

    if (!is_readable($file)) {
      if (!empty($BBC_DEBUG)) print(bbc_msg($file));
      $no_acc = 1;
      continue;
    }

    if (!is_writable($file) && empty($no_acc)) {
      if (!empty($BBC_DEBUG)) print(bbc_msg($file, "w"));
      continue;
    }

    for ($j = 0, $data = file($file), $max = count($data); $j < $max; $j++) {
      $line = explode($BBC_SEP, trim($data[$j]));

      if (empty($line[0]) || !preg_match("%[\d]+%", $line[0])) continue;

      for ($k = 0; ($k < $BBC_COUNTER_COLUMNS); $k++) {
        $new_visits[$new_cnt][($BBC_COUNTER_COLUMN_NAMES[$k])] = trim($line[$k]);
      }
      $new_cnt++;
    }
    // reset the counter files
    fclose(fopen($file, "wb"));
  }
  if (!empty($new_visits)) usort($new_visits, "bbc_sort_time_sc");
  return (empty($new_visits) ? array() : $new_visits);
}
?>