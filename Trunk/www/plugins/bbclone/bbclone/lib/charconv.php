<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/charconv.php,v 1.18 2009/06/21 07:33:09 joku Exp $
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

function bbc_get_encoding($str) {
  global $BBC_LANGUAGE;

  switch ($BBC_LANGUAGE) {
    case "bg":
    case "mk":
    case "ru":
    case "uk":
      return mb_detect_encoding($str, "UTF-8, KOI8-R, Windows-1251");

    case "ja":
      return mb_detect_encoding($str, "JIS, UTF-8, EUC-JP, SJIS");

    case "ko":
      return mb_detect_encoding($str, "UTF-8, EUC-KR, ISO-2022-KR");

    default:
      // note that iso-8859-1 is only a placeholder. The focus lies on detecting UTF-8...
      return (mb_detect_encoding($str, "UTF-8, iso-8859-1") == "UTF-8") ? "UTF-8" : false;
  }
}

function bbc_convert_keys($str, $from, $to) {
  if (($from !== false) && defined("_BBC_MBSTRING") && preg_match(":iso-8859-|EUC-(JP|KR)|gb2312:", $to) ||
      (!empty($BBC_CUSTOM_CHARSET) && stristr("UTF", $BBC_CUSTOM_CHARSET))) {
      return mb_convert_encoding($str, $to, $from);
  }
  elseif (($from !== false) && defined("_BBC_ICONV")) return iconv($from, $to."//TRANSLIT", $str);
  elseif (defined("_BBC_RECODE")) return recode_string($to, $str);
  // bail out with unmodified string
  else return $str;
}

// Note: A custom charset will overwrite the specified default. So you need not
// worry about your personal UTF-8 or whatever language file and change
// anything here. Just specify $BBC_CUSTOM_CHARSET and everything will be
// alright
function bbc_convert_lang($str, $from, $char) {
  global $BBC_LANGUAGE;

  if (!empty($char)) return bbc_convert_keys($str, $from, $char);

  switch ($BBC_LANGUAGE) {

// Cyrillic encodings
    case "bg":
    case "mk":
    case "ru":
    case "uk":
      return bbc_convert_keys($str, $from, "Windows-1251");

// Central and East European encodings
    case "bs":
    case "cs":
    case "hu":
    case "pl":
    case "ro":
    case "sk":
    case "sl":
      return bbc_convert_keys($str, $from, "iso-8859-2");

// various encodings
    case "ar":
      return bbc_convert_keys($str, $from, "Windows-1256");

    case "el":
      return bbc_convert_keys($str, $from, "iso-8859-7");

    case "ja":
      return bbc_convert_keys($str, $from, "EUC-JP");

    case "ko":
      return bbc_convert_keys($str, $from, "EUC-KR");

    case "lt":
      return bbc_convert_keys($str, $from, "Windows-1257");

    case "tr":
      return bbc_convert_keys($str, $from, "Windows-1254");

    case "zh-cn":
      return bbc_convert_keys($str, $from, "gb2312");

    case "zh-tw":
      return bbc_convert_keys($str, $from, "big5");

// All remaining languages not mentioned anywhere else
    default:
      return bbc_convert_keys($str, $from, "iso-8859-15");
  }
}
?>