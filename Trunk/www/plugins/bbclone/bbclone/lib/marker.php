<?php
/* This file is part of BBClone (A PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/marker.php,v 1.61 2009/06/21 07:33:09 joku Exp $
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

// Main Class Counter
class bbc_marker {
  var $sep, $filename, $ignored, $string;

  // randomly choose a counter file to write to
  function counter_file($cache_path, $counter_pre, $counter_suf) {
    global $BBC_COUNTER_FILES;

    mt_srand((double) microtime() * 1000000);
    return ($cache_path.$counter_pre.mt_rand(0, ($BBC_COUNTER_FILES - 1)).$counter_suf);
  }

  function known_range($addr, $class_a) {
    // look up whether an address is registerred
    global $BBC_IP2EXT_PATH;

    $long = sprintf("%u", ip2long($addr));
    $file = $BBC_IP2EXT_PATH.$class_a.".inc";
    $is_valid = false;

    if (!is_readable($file)) return false;

    $fp = fopen($file, "rb");

    while (($range = fgetcsv($fp, 24, "|")) !== false) {
      if (($long >= $range[1]) && ($long < ($range[1] + $range[2]))) {
        $is_valid = true;
        break;
      }
    }
    fclose($fp);
    return ($is_valid ? true : false);
  }

  // validates a hostname or ip address
  function valid_ip($addr, $prx = 0) {
    $iptest = explode(".", $addr);
    $iptest = defined("_rev") ? array_reverse($iptest) : $iptest;
    $oct = count($iptest);

    if ($oct != 4) return false;

    for ($i = 0; $i < $oct; $i++) {
      $iptest[$i] = trim($iptest[$i]);

      if ((!preg_match(":^[\d]{1,3}$:", $iptest[$i])) || ($iptest[$i] > 255)) return false;
    }

    if (($iptest[0] === 0) || ($iptest[0] == 10) || ($iptest[0] == 127) || ($iptest[0] > 223) ||
        ($iptest[1] > 255) || ($iptest[2] > 255) || ($iptest[3] === 0) || ($iptest[3] > 254) ||
        (($iptest[0] == 169) && ($iptest[1] == 254)) ||
        (($iptest[0] == 172) && ($iptest[1] > 15) && ($iptest[1] < 32)) ||
        (($iptest[0] == 192) && ($iptest[1] === 0) && ($iptest[2] == 2)) ||
        (($iptest[0] == 192) && ($iptest[1] == 168)) ||
        (($iptest[0] == 198) && ($iptest[1] > 17) && ($iptest[1] < 20)) ||
        (($prx) && ($this->known_range($addr, $iptest[0]) === false))) return false;

    return (defined("_rev") ? implode(".", $iptest) : $addr);
  }

  // converts a hexadecimal ip address to the dotted format if applicable
  function hex2ip($str) {
    if (!preg_match(":[a-fA-F\d]{8}:", $str)) return $str;

    $arr = explode(".", wordwrap($str, 2, ".", 1));

    for ($i = 0, $k = count($arr); $i < $k; $i++) $arr[$i] = trim(hexdec($arr[$i]));

    return ($arr[0].".".$arr[1].".".$arr[2].".".$arr[3]);
  }

  // returns the first valid host
  function select_host($array) {
    arsort($array, SORT_NUMERIC);

    foreach ($array as $key => $val) {
      $key = $this->hex2ip(trim($key));

      if (($prx = $this->valid_ip($key, 1)) !== false) return $prx;
    }
    return false;
  }

  // extract the first valid address from a chain
  function unchain_addr($val) {
    if (strpos($val, ",") === false) return $val;

    for ($i = 0, $array = explode(",", $val), $max = count($array); $i < $max; $i++) $array[$i] = trim($array[$i]);
    return $this->select_host(array_flip($array));
  }

  // return the correct remote address
  function get_remote_addr($addr, $reverse) {
    $addr = $this->unchain_addr($addr);
    $reverse = $this->unchain_addr($reverse);

    if ((!empty($reverse)) && ($this->valid_ip($addr, 1) === false)) return $reverse;
    if (empty($addr)) return "127.0.0.1";

    return ((substr($addr, 0, strpos($addr, ".")) == 127) ? "127.0.0.1" : $addr);
  }

  // get the right server address (needed for determining local referrers)
  function get_srv_addr($srv_addr, $loc_addr) {
    $srv_addr = empty($srv_addr) ? $loc_addr : $srv_addr;

    return $this->valid_ip($srv_addr) ? $srv_addr : "127.0.0.1";
  }

  // check for client in proxy headers
  function parse_headers() {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    foreach (((_BBC_PHP < 410) ? $HTTP_SERVER_VARS : $_SERVER) as $key => $val) {
      if (!(substr($key, 0, strpos($key, "_")) == "HTTP")) continue;

      if ((stristr($val, " for ") !== false)) {
        $tmp = explode(" for ", strtolower($val));
        $tmpval = trim($tmp[count($tmp) - 1]);
        $tmpval = $this->unchain_addr($tmpval);
        $chk[$tmpval] = isset($chk[$tmpval]) ? ++$chk[$tmpval] : 1;
      }
      if ((strpos($key, "_CLIENT") !== false) || (substr($key, -4) == "_FOR")) {
        $val = $this->unchain_addr($val);
        $chk[$val] = isset($chk[$val]) ? ++$chk[$val] : 1;
      }
      // If we find this, the client's ip address needs to be reversed
      if (($key == "HTTP_VIA") && (eregi("Traffic[ \-]?Server/5\.2\.0", $val))) {
        !defined("_rev") ? define("_rev", 1) : "";
      }
    }
    return (!empty($chk) ? $this->select_host($chk) : false);
  }

  // Check if an ip address is matching up against the blacklist
  function is_ignored($blacklist, $client) {
    $ipmatch = (empty($blacklist) ? "" : explode(",", $blacklist));

    if (empty($ipmatch)) return false;

    for($i = count($ipmatch) - 1; $i >= 0; $i--) {
      $test = trim($ipmatch[$i]);

      if (substr($client, 0, strlen($test)) === $test) return true;
    }
    return false;
  }

  // checking for matching hosts which we have to ignore. We assume that a
  // keyword with leading slash implies an uri and everything else a hostname
  function ignore_ref($array) {
    global $BBC_IGNORE_REFER;

    if (!empty($BBC_IGNORE_REFER)) {
      foreach(explode(",", $BBC_IGNORE_REFER) as $test) {
        $test = trim($test);
        $is_path = ($test[0] == "/") ? true : false;

        if (stristr(($is_path ? $array[2] : $array[1]), $test) !== false) return true;
      }
    }
    return false;
  }

  // checks for a valid url format
  function valid_ref($ref) {
    for ($i = 0, $tmp = explode(":", $ref), $k = count($tmp); $i < $k; $i++) $tmp[$i] = trim($tmp[$i]);
    return (((($tmp[0] == "http") || ($tmp[0] == "https")) && (substr($tmp[1], 0, 2) == "//")) ? true : false);
  }

  //converts a referrer to an array with the hostname, ip address and the full referrer
  function parse_ref($ref) {
    if (!$this->valid_ref($ref)) return false;

    // getting rid of stupid user input
    $ref = str_replace(":/", "://", preg_replace(":/+:", "/", $ref));
    $ref = preg_replace(":\.+(/|$):", "\\1", $ref);
    $ref = substr(strstr($ref, "://"), 3);

    $uri = (($slash = strpos($ref, "/")) !== false) ? substr($ref, $slash) : "/";
    $host_raw = strtolower((($slash !== false) ? substr($ref, 0, $slash) : $ref));
    $host_raw = preg_replace("%^www[\d]+\.%", "www.", $host_raw);
    $host = (($port = strpos($host_raw, ":")) !== false) ? substr($host_raw, 0, $port) : $host_raw;

    return (preg_match("|^[\w.\-]{2,64}$|", $host) ? array("http://".$host_raw.$uri, $host, $uri) : false);
  }

  // determine and filter stuff which came from the local server
  function filter_ref($srvhost, $ref, $srvaddr) {
    $ref_array = $this->parse_ref($ref);

    if (is_array($ref_array) && ($this->ignore_ref($ref_array) !== false)) return -1;

    if (!$ref_array || ($ref_array[1] == $srvaddr) ||
        ((substr($ref_array[1], 0, 4) == "127.") || (substr($ref_array[1], 0, 2) == "0.")) ||
        (!empty($srvhost) && (($srvhost == $ref_array[1]) ||
         ((substr($srvhost, 0, 4) == "www.") && (substr($srvhost, 4) == $ref_array[1])) ||
         ((substr($ref_array[1], 0, 4) == "www.") && (substr($ref_array[1], 4) == $srvhost))))) {
      return "unknown";
    }
    return $ref_array[0];
  }

  // avoid trails of query strings which aren't relevant for page counting
  function filter_uri($script, $pinfo, $uri) {
    // getting rid of stupid user input
    foreach (array("pinfo", "uri") as $path) {
      ${$path} = str_replace(":/", "://", preg_replace(":/+:", "/", ${$path}));
      ${$path} = preg_replace(":\.+(/|$):", "\\1", ${$path});
    }

    // On some systems path info is just an alias for the script uri
    $pinfo = ($uri == $pinfo) ? 0 : $pinfo;

    $uri = !empty($pinfo) ? substr($uri, 0, (strlen($uri) - strlen($pinfo))) : $uri;
    $uri = (basename($uri) !== $script) ? (((($dir = dirname($uri)) == ".") || (empty($dir))) ? "/" : $dir."/")
           .$script : $uri;

    $test = explode(".", $script);
    $tmp = strtolower(trim($test[0]));
    $tmp = ((count($test) == 2) && (($tmp == "index") || ($tmp == "default"))) ? true : false;

    return (($tmp !== false) ? substr($uri, 0, (strrpos($uri, "/") + 1)) : (empty($uri) ? "/" : $uri));
  }

  // automatic page name generation in case of not being specified
  function auto_page_name($uri) {
    if (!is_string($uri) || empty($uri) || ($uri == "/")) return "index";

    $uri = (substr($uri, -1) == "/") ? substr($uri, 1, -1) : ((($dot = strrpos($uri, ".")) !== false) ?
           substr($uri, 1, --$dot) : substr($uri, 1));
    $uri = strtr($uri, array("/" => " -&gt; ", "_" => " "));

    return ucwords($uri);
  }

  // write the entry
  function write_entry() {
    global $BBC_CACHE_PATH;

    $file = $this->filename;
    $base = basename($file);

    if (!is_readable($file)) return array($base, "r");
    if (!is_writable($file)) return array($base, "w");

    if ($fp = bbc_get_lock($file, 1)) {
      bbc_write_data($fp, $this->string, 1);
      $ok = 1;
    }
    return (isset($ok) ? array($base, "o") : array($base, "l"));
  }

  // constructor
  function bbc_marker() {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    global $BBC_CACHE_PATH, $BBC_COUNTER_PREFIX, $BBC_COUNTER_SUFFIX, $BBC_IGNORE_IP, $BBC_SEP, $BBC_TIMESTAMP,
           $BBC_TIME_OFFSET;

    $this->sep = $BBC_SEP;
    $this->ignored = false;
    $this->filename = $this->counter_file($BBC_CACHE_PATH, $BBC_COUNTER_PREFIX, $BBC_COUNTER_SUFFIX);
    $time = $BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60);

    // loads of initialisations
    $hdr = array("DOCUMENT_ROOT", "HTTP_USER_AGENT", "LOCAL_ADDR", "REMOTE_HOST", "REMOTE_ADDR", "HTTP_HOST",
                 "HTTP_REFERER", "HTTP_X_REMOTECLIENT_IP", "ORIG_PATH_INFO", "ORIG_PATH_TRANSLATED",
                 "ORIG_SCRIPT_FILENAME", "PATH_INFO", "PATH_TRANSLATED", "HTTP_PC_REMOTE_ADDR", "PHP_SELF",
                 "SCRIPT_FILENAME", "SERVER_NAME", "SERVER_ADDR");

    foreach ($hdr as $str) {
      $$str = ((_BBC_PHP < 410) ? !empty($HTTP_SERVER_VARS[$str]) : !empty($_SERVER[$str])) ?
               bbc_clean(((_BBC_PHP < 410) ? $HTTP_SERVER_VARS[$str] : $_SERVER[$str]), $BBC_SEP) : false;
      $$str = !empty(${"ORIG_".$str}) ? ${"ORIG_".$str} : $$str;
    }

    $SERVER_ADDR = $this->get_srv_addr($SERVER_ADDR, $LOCAL_ADDR);
    $HTTP_HOST = !$HTTP_HOST ? $SERVER_NAME : $HTTP_HOST;
    $HTTP_REFERER = !$HTTP_REFERER ? "unknown" : $this->filter_ref($HTTP_HOST, $HTTP_REFERER, $SERVER_ADDR);

    // Stop processing if there's a referrer match
    if ($HTTP_REFERER == -1) return;

    $REMOTE_ADDR = (stristr(PHP_OS, "darwin") && $HTTP_PC_REMOTE_ADDR) ? $HTTP_PC_REMOTE_ADDR : $REMOTE_ADDR;
    $prx = $this->parse_headers();

    if ($prx) {
      $prx_addr = $this->get_remote_addr($REMOTE_ADDR, $HTTP_X_REMOTECLIENT_IP);
      // stop processing if there's a proxy ip match
      if (($this->ignored = $this->is_ignored($BBC_IGNORE_IP, $prx_addr)) !== false) return;
      else $REMOTE_ADDR = bbc_clean($prx, $BBC_SEP);
    }
    else {
      $prx_addr = "unknown";
      $REMOTE_ADDR = $this->get_remote_addr($REMOTE_ADDR, $HTTP_X_REMOTECLIENT_IP);
    }

    // stop processing if there's an ip match
    if (($this->ignored = $this->is_ignored($BBC_IGNORE_IP, $REMOTE_ADDR)) !== false) return;

    // remaining initialisations
    $filename = (!$PATH_TRANSLATED || ($PATH_TRANSLATED == $DOCUMENT_ROOT)) ? basename($SCRIPT_FILENAME) :
                 basename($PATH_TRANSLATED);
    $REQUEST_URI = $this->filter_uri($filename, $PATH_INFO , $PHP_SELF);
    $HTTP_USER_AGENT = !$HTTP_USER_AGENT ? "unknown" : $HTTP_USER_AGENT;
    // Use a page name even if the user didn't specify it
    $page = defined("_BBC_PAGE_NAME") ? bbc_clean(_BBC_PAGE_NAME, $BBC_SEP) : $this->auto_page_name($REQUEST_URI);

    // "unknown" is meant as placeholder for the hostname, which will be processed at a different location
    $this->string = $time.$this->sep.$prx_addr.$this->sep.$REMOTE_ADDR.$this->sep."unknown".$this->sep
                   .$HTTP_USER_AGENT.$this->sep.$HTTP_REFERER.$this->sep.$REQUEST_URI.$this->sep.$page."\n";
  }
}
?>
