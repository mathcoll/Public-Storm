<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/regression.php,v 1.55 2009/06/21 07:33:10 joku Exp $
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

//Legend
//B: (Client) browser
//C: Link-, bookmark-, server- checking
//D: Downloading tool
//P: Proxy server, web filtering
//R: Robot, crawler, spider
//S: Spam or bad bot

$regression = array(
  "Science Traveller International 1X/1.0" => array(
    "robot" => "other",
    "browser" => "1X",
    "os" => "other",
    "description" => "1X on Windows"
  ),
  "amaya/9.51 libwww/5.4.0" => array(
    "robot" => "other",
    "browser" => "amaya",
    "os" => "other",
    "description" => "Amaya 9.51 on linux"
  ),
  "amaya/9.1 libwww/5.4.0" => array(
    "robot" => "other",
    "browser" => "amaya",
    "os" => "other",
    "description" => "Amaya 9.1"
  ),
  "amaya/6.2 libwww/5.3.1" => array(
    "robot" => "other",
    "browser" => "amaya",
    "os" => "other",
    "description" => "Amaya 6.2"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.1; Windows NT 5.1;)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windowsxp",
    "description" => "AOL 1.1 on Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.2; Windows NT 5.1;)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windowsxp",
    "description" => "AOL 1.2 on Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.5; Windows NT 5.1;)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windowsxp",
    "description" => "AOL 1.5 on Windows XP"
  ),
//  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; FDM)" => array(
//    "robot" => "other",
//    "browser" => "avantbrowser",
//    "os" => "windowsxp",
//    "description" => "Avant Browser (MSIE 6 clone) on XP with SP2 and .NET framework"
//  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com]; Hotbar 4.4.5.0)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windows2k",
    "description" => "Avant Browser (MSIE 6 clone) on Win 2K",
  ),
  "Advanced Browser (http://www.avantbrowser.com)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "other",
    "description" => "First version",
  ),
  "Avant Browser (http://www.avantbrowser.com)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "other",
    "description" => "Old version",
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Avant Browser [avantbrowser.com]; iOpus-I-M; QXW03416; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windowsxp",
    "description" => "Avant Browser (MSIE 6 clone) on XP with SP2 and .NET framework"
  ),
  "Mozilla/3.0 (compatible; AvantGo 3.2)" => array(
    "robot" => "other",
    "browser" => "avantgo",
    "os" => "other",
    "description" => "AvantGo v3.2 under PalmOS 3.0 on Treo 180"
  ),
  "Mozilla/5.0 (compatible; AvantGo 3.2; ProxiNet; Danger hiptop 1.0)" => array(
    "robot" => "other",
    "browser" => "avantgo",
    "os" => "hiptop",
    "description" => "AvantGo v3.2 on Danger HipTop 1.0 (ProxiNet' seems to be a proxy service used by 'hiptop')"
  ),
  "Amiga-AWeb/3.5.07 beta" => array(
    "robot" => "other",
    "browser" => "aweb",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/6.0; (Spoofed by Amiga-AWeb/3.5.07 beta)" => array(
    "robot" => "other",
    "browser" => "aweb",
    "os" => "amiga",
    "description" => ""
  ),
  "MSIE/6.0; (Spoofed by Amiga-AWeb/3.4APL)" => array(
    "robot" => "other",
    "browser" => "aweb",
    "os" => "amiga",
    "description" => ""
  ),
  "bluefish 0.6 HTML editor" => array(
    "robot" => "other",
    "browser" => "bluefish",
    "os" => "other",
    "description" => ""
  ),
  "noxtrumbot/1.0 (crawler@noxtrum.com)" => array(
    "robot" => "noxtrum",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "HiddenMarket-1.0-beta www.hiddenmarket.net/crawler.php" => array(
    "robot" => "hiddenmarket",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (ReactOS; U; ReactOS 0.3; en-US; rv:1.8) Gecko/20051107" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "reactos",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322) Babya Discoverer 8.0:" => array(
    "robot" => "other",
    "browser" => "babya",
    "os" => "windowsxp",
    "description" => ""
  ),
  "FDM 2.0" => array(
    "robot" => "fdm",
    "browser" => "other",
    "os" => "other",
    "description" => "Free Download Manager"
  ),
  "Mozilla/4.01 (Compatible; Acorn Phoenix 2.08 [intermediate]; RISC OS 4.39) Acorn-HTTP/0.84" => array(
    "robot" => "other",
    "browser" => "acorn",
    "os" => "risc",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; .NET CLR 2.0.50727; Media Center PC 4.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsmc",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20040913 Waterunicorn/0.10 StumbleUpon/1.998" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Yoono; http://www.yoono.com/)" => array(
    "robot" => "yoono",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "CazoodleBot/Nutch-0.9-dev (CazoodleBot Crawler; http://www.cazoodle.com; mqbot@cazoodle.com)" => array(
    "robot" => "cazoodle",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0; .NET CLR 2.0.50727)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsmc",
    "description" => "Internet Explorer 6.0 on Media Center Edition 2005 with .NET Framework 1.0, 1.1, and 2.0 installed"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 6.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsvista",
    "description" => "7.0 beta on Windows Vista"
  ),
  "Microsoft Internet Explorer/4.0b1 (Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 1.0 on Windows 95"
  ),
  "Mozilla/1.22 (compatible; MSIE 2.0; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 2.0 on Windows 95"
  ),
  "fmII URL validator/1.0" => array(
    "robot" => "freshmeat",
    "browser" => NULL,
    "os" => NULL,
    "description" => "freshmeat crawler"
  ),
  "GameSpyHTTP/1.0" => array(
    "robot" => "gamespy",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; grub-client-1.4.3; Crawl your own stuff with http://grub.org)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; grub-client-2.3)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "GurujiBot/1.0 (+http://www.guruji.com/WebmasterFAQ.html)" => array(
    "robot" => "guruji",
    "browser" => NULL,
    "os" => NULL,
    "description" => "guruji : the Indian search engine robot"
  ),
  "Mozilla/5.0 (compatible; iaskspider/1.0; MSIE 6.0)" => array(
    "robot" => "iask",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "InetURL:/1.0" => array(
    "robot" => "ineturl",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "ICRA_label_generator/1.0" => array(
    "robot" => "irca",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "ICRA_label_generator/0.9" => array(
    "robot" => "irca",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "\"iVia Site Checker\"/1.0" => array(
    "robot" => "ivia",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "lanshanbot/1.0" => array(
    "robot" => "lanshan",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Easten Network China"
  ),
  "Mozilla/4.0 (compatible; Mavicanet robot; www.mavicanet.org)" => array(
    "robot" => "mavicanet",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "NextopiaBOT (+http://www.nextopia.com) distributed crawler client beta v0.8" => array(
    "robot" => "nextopia",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "OutfoxMelonBot/0.5 (for internet experiments; http://; outfoxbot@gmail.com)" => array(
    "robot" => "outfox",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Chinanet (60.191.80.1)"
  ),
  "SanszBot_International_Tender_Search_Engine_Ver1.5_(WWW.SANSZ.ORG) sheridan@sansz.org" => array(
    "robot" => "sanszbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  " Syndic8/1.0 (http://www.syndic8.com/)" => array(
    "robot" => "syndic8",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "thumbshots-de-Bot (Version: 1.02, powered by www.thumbshots.de)" => array(
    "robot" => "thumbshot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ThumbShots website thumbnail service (Germany) robot",
    "type" => "D"
  ),
   "UltraSpider3000/1.0 (+http://www.search.ch/rim.html)" => array(
    "robot" => "ultraspider",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Waggr_Fetcher)" => array(
    "robot" => "wagger",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Online RSS Aggregator"
  ),
  "WeBoX/0.99" => array(
    "robot" => "webox",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Sqworm/2.9.85-BETA (beta_release; 20011115-775; i686-pc-linux" => array(
    "robot" => "websense",
    "browser" => NULL,
    "os" => NULL,
    "description" => "a crawler from Sqworm.com"
  ),
  "NetSprint -- 2.0" => array(
    "robot" => "wp",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "AtlocalBot/1.1 +(http://www.atlocal.com/local-web-site-owner.html)" => array(
    "robot" => "atlocal",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Atlocal local business search robot"
  ),
  "AutoMapIt Bot (http://www.automapit.com/bot.html)" => array(
    "robot" => "automapit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Automapit spider which builds a site map - should only be present if you have signed up to use the service"
  ),
  "Bigsearch.ca/Nutch-0.9-dev (Bigsearch.ca Internet Spider; http://www.bigsearch.ca/; info@enhancededge.com)" => array(
    "robot" => "bigsearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Blogshares.com Friends (Ricardo Blessed V1.34.0.1)" => array(
    "robot" => "blogshares",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Butch__2.1.1 agdm79@mail.ru" => array(
    "robot" => "butch",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "CFNetwork/129.18" => array(
    "robot" => "cfnetwork",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE is not me; EDI/1.6.6; Edacious & Intelligent Web Robot; Daum Communications Corp., Korea)" => array(
    "robot" => "daum",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "ES.NET Crawler/2.0 (http://search.innerprise.net/)" => array(
    "robot" => "esnet",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Snoopy v1.2" => array(
    "robot" => "snoopy",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Opera/9.02 (Windows NT 5.1; U; ru)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => ""
  ),
  "msnbot/1.0 (+http://search.msn.com/msnbot.htm)" => array(
    "robot" => "msnbot",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.23; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "Internet Explorer 5.2.3 on Mac OS"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; SunOS 5.9 sun4u; X11)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "sun",
    "description" => "Internet Explorer 5.0 on SunOS"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2003",
    "description" => "Internet Explorer 6.0 on Windows Server 2003 SP1 with .NET Framework 1.1 installed"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => "Internet Explorer 5.5 on Windows 2000"
  ),
  "Microsoft Internet Explorer/4.0b1 (Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 1.0 on Windows 95"
  ),
  "Mozilla/1.22 (compatible; MSIE 2.0; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 2.0 on Windows 95"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 6.0 on Windows XP SP 2"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 6.0 on Windows XP SP 2 with .NET Framework 1.1 installed"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 7.0 beta on Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0b; Win32)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows",
    "description" => "Internet Explorer 7.0 beta 1 on Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.17; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "Internet Explorer 5.1.7 on Mac OS 9"
  ),
  "Mozilla/1.22 (compatible; MSIE 1.5; Windows NT)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "Internet Explorer 1.5 on Windows NT"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.01; Windows 98)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows98",
    "description" => "Internet Explorer 3.01 on Windows 98"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; MSN 2.5; Windows 98)" => array(
    "robot" => "other",
    "browser" => "msn",
    "os" => "windows98",
    "description" => "Internet Explorer 6.0 in MSN 2.5 on Windows 98"
  ),
  "Mozilla/4.61 [en] (X11; U; ) - BrowseX (2.0.0 Windows)" => array(
    "robot" => "other",
    "browser" => "browsex",
    "os" => "windows",
    "description" => ""
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.0.1) Gecko/20060118 Camino/1.0b2+" => array(
    "robot" => "other",
    "browser" => "camino",
    "os" => "macosx",
    "description" => "Camino nightly build on Mac OS X"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.5b) Gecko/20030917 Camino/0.7+" => array(
    "robot" => "other",
    "browser" => "camino",
    "os" => "macosx",
    "description" => "Camino (formerly Chimera) nightly build on Mac OS X"
  ),
  "Mozilla/2.0 compatible; Check&Get 1.14 (Windows NT)" => array(
    "robot" => "other",
    "browser" => "checkandget",
    "os" => "windowsnt",
    "description" => "Check&Get Version 1.14 on NT 4.0"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US; rv:1.0.1) Gecko/20021104 Chimera/0.6"=> array(
    "robot" => "other",
    "browser" => "chimera",
    "os" => "macosx",
    "description" => "Chimera nightly build on Mac OS X"
  ),
  "Chimera/2.0alpha" => array(
    "robot" => "other",
    "browser" => "chimera",
    "os" => "other",
    "description" => "Chimera on Mac OS X"
  ),
  "Contiki/1.0 (Commodore 64; http://dunkels.com/adam/contiki/)" => array(
    "robot" => "other",
    "browser" => "contiki",
    "os" => "c64",
    "description" => "Contiki on Commodore 64"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => "Crazy Browser 1.0.5 on Windows XP"
  ),
  "curl/7.7.2 (powerpc-apple-darwin6.0) libcurl 7.7.2 (OpenSSL 0.9.6b)" => array(
    "robot" => "other",
    "browser" => "curl",
    "os" => "darwin",
    "description" => "cURL 7.10.5 on Mac OS X 10.2.6 with Darwin kernel 6.6"
  ),
  "\"CIS TE/1.0\" - Cute FTP Pro 3.3" => array(
    "robot" => "other",
    "browser" => "cuteftp",
    "os" => "other",
    "description" => "Cute FTP 3.3"
  ),
  "Democracy/0.8.1 (http://www.participatoryculture.org)" => array(
    "robot" => "other",
    "browser" => "democracy",
    "os" => "other",
    "description" => "Democracy TV Viewer"
  ),
  "Dillo/0.8.5-i18n-misc" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "Dillo on a DSL linux distro with QEMU",
  ),
  "Dillo/0.8.5-pre" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.3" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "Dillo on Mandrake 10.1 with kernel 2.6.7",
  ),
  "Dillo/0.8.2" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "Dillo under NetBSD",
  ),
  "Dillo/0.6.6" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "DivX Player 2.0" => array(
    "robot" => "other",
    "browser" => "divx",
    "os" => "other",
    "description" => ""
  ),
  "DocZilla/1.0 (Windows; U; WinNT4.0; en-US; rv:1.0.0) Gecko/20020804" => array(
    "robot" => "other",
    "browser" => "doczilla",
    "os" => "windowsnt",
    "description" => "DocZilla 1.0 RC1 on Windows NT"
  ),
  "edbrowse/2.2.10" => array(
    "robot" => "other",
    "browser" => "edbrowse",
    "os" => "other",
    "description" => ""
  ),
  "ELinks/0.10.4-7ubuntu1-debian (textmode; Linux 2.6.12-10-k7-smp i686; 80x24-2)" => array(
    "robot" => "other",
    "browser" => "elinks",
    "os" => "ubuntu",
    "description" => "ELinks 0.10.4 on ubuntu oldstable, linux 2.6 k7 SMP, standard terminal"
  ),
  "ELinks/0.10.5 (textmode; CYGWIN_NT-5.0 1.5.18(0.132/4/2) i686; 143x51-2)" => array(
    "robot" => "other",
    "browser" => "elinks",
    "os" => "windows",
    "description" => "Elinks 0.10.5 on Windows 2000 (SP4) using CYGWIN",
  ),
  "ELinks (0.4.2; Linux; )" => array(
    "robot" => "other",
    "browser" => "elinks",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FunWebProducts; (R1 1.5))" => array(
    "robot" => "other",
    "browser" => "realplayer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 6.0 on Windows XP with Spyware 'FunWebProducts' installed"
  ),
  "SquidClamAV_Redirector 1.8.2" => array(
    "robot" => "other",
    "browser" => "squid",
    "os" => "other",
    "description" => "SCAVR - Squid helper script for scanning download URLs for viruses"
  ),
  "Cafi/1.02 (OSIX; 128-bit)" => array(
    "robot" => "other",
    "browser" => "squid",
    "os" => "other",
    "description" => "Faked user agent by squid proxy"
  ),
  "West Wind Internet Protocols 4.55" => array(
    "robot" => "westwind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A library for Visual Fox Pro for webaccess, often used for crappy spiders"
  ),
  "NASA Search 1.0" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A spam haverster"
  ),
  "page_verifier http://www.securecomputing.com/goto/pv" => array(
    "robot" => "securecomputing",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "DataCha0s/2.0" => array(
    "robot" => "SPAM",
    "browser" => "other",
    "os" => "other",
    "description" => "robot trying to crash AWStats"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Nitro) Opera 8.50 [ja]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "other",
    "description" => "8.50 on Nintendo DS (Japanese)"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Nitro) Opera 8.50 [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "other",
    "description" => "8.50 on Nintendo DS (European)"
  ),
  "Accoona-AI-Agent/1.1.2 (aicrawler at accoonabot dot com)" => array(
    "robot" => "accoona",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "ia_archiver" => array(
    "robot" => "alexa",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/2.0 (compatible; Ask Jeeves/Teoma)" => array(
    "robot" => "ask",
    "browser" => "netscape",
    "os" => "other",
    "description" => ""
  ),
  "Baiduspider ( http://www.baidu.com/search/spider.htm)" => array(
    "robot" => "baidu",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "curl/7.13.1 (powerpc-apple-darwin8.0) libcurl/7.13.1 OpenSSL/0.9.7b zlib/1.2.2" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "darwin",
    "description" => ""
  ),
  "Gigabot/2.0" => array(
    "robot" => "gigabot",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Googlebot/2.1 (+http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Googlebot-Image/1.0" => array(
    "robot" => "google",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; grub-client-1.4.3; Crawl your own stuff with http://grub.org) Mozilla/4.0 (compatible; grub-client-2.3)" => array(
    "robot" => "grub",
    "browser" => "netscape",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/3.0 (Slurp/si; slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => "netscape",
    "os" => "other",
    "description" => ""
  ),
  "OmniExplorer_Bot/6.70 (+http://www.omni-explorer.com) WorldIndexer" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Scooter-3.2.EX" => array(
    "robot" => "altavista",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "W3C_Validator/1.432.2.10" => array(
    "robot" => "validator",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Jigsaw/2.2.5 W3C_CSS_Validator_JFouffa/2.0" => array(
    "robot" => "csscheck",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Wget/1.9" => array(
    "robot" => "wget",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Yahoo! Slurp;http://help.yahoo.com/help/us/ysearch/slurp)" => array(
    "robot" => "yahoo",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Yahoo! Slurp China; http://misc.yahoo.com.cn/help.html)" => array(
    "robot" => "yahoo",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (ReactOS; U; ReactOS 0.3; en-US; rv:1.8) Gecko/20051107 Firefox/1.5" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "reactos",
    "description" => ""
  ),
  "Opera/9.02 (Windows 98; U; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; FreeBSD i386; en-US; rv:1.8.1) Gecko/20061101 Firefox/2.0" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "freebsd",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.7) Gecko/20060405 SeaMonkey/1.0.5" => array(
    "robot" => "other",
    "browser" => "seamonkey",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; pl) Opera 9.02" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows NT 5.1; U; pl) Opera 9.02" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Opera/9.02 (Windows NT 5.1; U; pl)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; pl-PL; rv:1.8.0.6) Gecko/20060728 Firefox/1.5.0.6 (Debian-1.5.dfsg+1.5.0.6-2)" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "debian",
    "description" => ""
  ),
  "Opera/8.01 (J2ME/MIDP; Opera Mini/3.0.6307/1528; en; U; ssr)" => array(
    "robot" => "other",
    "browser" => "operamini",
    "os" => "java",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Kubuntu)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "ubuntu",
    "description" => ""
  ),
  "Sony-HTTPClient/1.0 [PS3 test]" => array(
    "robot" => "httpclient",
    "browser" => "other",
    "os" => "other",
    "description" => "PS3 in testing"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.7) Gecko/20060917 K-Ninja/2.0.4" => array(
    "robot" => "other",
    "browser" => "k-ninja",
    "os" => "windowsxp",
    "description" => ""
  ),
  "qtver=7.5.0;os=Windows 98" => array(
    "robot" => "other",
    "browser" => "quicktime",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Charlotte/1.0b; http://www.betaspider.com/)" => array(
    "robot" => "charlotte",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux ppc; en-US; rv:1.8.1) Gecko/20061024 Iceweasel/2.0 (Debian-2.0+dfsg-1)" => array(
    "robot" => "other",
    "browser" => "iceweasel",
    "os" => "debian",
    "description" => "Unbranded Firefox 2.0, GNU compatible, on Debian Linux"
  ),
  "Mozilla/5.0 (SymbianOS/9.1; U; [en-us]; Series60/3.0 NokiaE61/2.0618.06.05) AppleWebKit/413 (KHTML, like Gecko) Safari/413" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "symbian",
    "description" => ""
  ),
  "Szukacz/1.5 (robot; www.szukacz.pl/html/jak_dziala_robot.html; info@szukacz.pl)" => array(
    "robot" => "szukacz",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; Girafabot; girafabot at girafa dot com; http://www.girafa.com)" => array(
    "robot" => "girafabot",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => ""
  ),
  "QuickTime (qtver=6.3;os=Windows NT 5.1Service Pack 1)" => array(
    "robot" => "other",
    "browser" => "quicktime",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.5) Gecko/20060727 Galeon/2.0.1 Firefox/1.5.0.5" => array(
    "robot" => "other",
    "browser" => "galeon",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.4) Gecko/20060608 Firefox/1.5.0.4 Flock/0.7.0.16.2" => array(
    "robot" => "other",
    "browser" => "flock",
    "os" => "linux",
    "description" => ""
  ),
  "Lynx/2.8.5rel.1 libwww-FM/2.14 SSL-MM/1.4.1 OpenSSL/0.9.7i" => array(
    "robot" => "other",
    "browser" => "lynx",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.7 [en] (X11; I; SunOS 5.8 i86pc)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "sun",
    "description" => ""
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.8.0.1) Gecko/20060214 Camino/1.0" => array(
    "robot" => "other",
    "browser" => "camino",
    "os" => "macosx",
    "description" => ""
  ),
  "Links (2.1pre20; Linux 2.6.16-gentoo-r11 x86_64; x)" => array(
    "robot" => "other",
    "browser" => "links",
    "os" => "gentoo",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.5) Gecko/20031007 Firebird/0.7" => array(
    "robot" => "other",
    "browser" => "firebird",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.3a) Gecko/20021207 Phoenix/0.5" => array(
    "robot" => "other",
    "browser" => "phoenix",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/5.0 (BeOS; U; BeOS 5 PE Max Edition v3b1 BePC; pl-PL; rv:1.3) Firebird/0.8" => array(
    "robot" => "other",
    "browser" => "firebird",
    "os" => "beos",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; OpenBSD i386; en-US; rv:1.8.0.4) Gecko/20060717 Firefox/1.5.0.4" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "openbsd",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Win98; en-US; rv:1.8.0.5) Gecko/20060706 K-Meleon/1.0" => array(
    "robot" => "other",
    "browser" => "k-meleon",
    "os" => "windows98",
    "description" => ""
  ),
  "SonyEricssonV630iv/R1CE Browser/NetFront/3.3Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "mobile",
    "description" => ""
  ),
  "Space Bison/0.02 [fu] (Win67; X; SK)" => array(
    "robot" => "other",
    "browser" => "proxomitron",
    "os" => "windows",
    "description" => "a browser plug-in for filtering out pop-ups and customising page content"
  ),
  "Space Bison/0.02 [fu] (MacOS67; X; SK)" => array(
    "robot" => "other",
    "browser" => "proxomitron",
    "os" => "macos",
    "description" => "a browser plug-in for filtering out pop-ups and customising page content"
  ),
  "Space Bison/0.02 [fu] (Mindows; X; SK; en-GB)" => array(
    "robot" => "other",
    "browser" => "proxomitron",
    "os" => "other",
    "description" => "a browser plug-in for filtering out pop-ups and customising page content"
  ),
  "MOT-V300/0B.09.2ER MIB/2.2 Profile/MIDP-2.0 Configuration/CLDC-1.0" => array(
    "robot" => "other",
    "browser" => "mib",
    "os" => "mobile",
    "description" => ""
  ),
  "Nexus (W11; Multics GE-645; U; en)" => array(
    "robot" => "other",
    "browser" => "nexus",
    "os" => "NexT",
    "description" => "The first browser ... written by Tim Berners-Lee"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Maxthon; .NET CLR 2.0.50727)" => array(
    "robot" => "other",
    "browser" => "maxthon",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686 (x86_64); en-US; rv:1.8.0.6) Gecko/20060728 SUSE/1.5.0.6-0.1 Firefox/1.5.0.6" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "suse",
    "description" => ""
  ),
  "SoftBank/1.0/E02NK/NKJ001 Series60/3.0 NokiaE61/2.0618.06.05 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; BecomeBot/3.0; MSIE 6.0 compatible; +http://www.become.com/site_owners.html)" => array(
    "robot" => "become",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.0.5) Gecko/20060731 Ubuntu/dapper-security Turboyak/0.9.0.3" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "ubuntu",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.8) Gecko/20050524 Fedora/1.0.4-4 Firefox/1.0.4" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "fedora",
    "description" => ""
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US) AppleWebKit/125.4 (KHTML, like Gecko, Safari) OmniWeb/v563.15" => array(
    "robot" => "other",
    "browser" => "omniweb",
    "os" => "macosx",
    "description" => ""
  ),
  "Mozilla/5.0 (Nintendo DS v4; U; M3 Adapter CF + PassMe2; en-US; rv:1.8.0.6 ) Gecko/20060728 Firefox/1.5.0.6 (firefox.gba.ds)" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "nintendods",
    "description" => ""
  ),
  "Emacs-W3/4.0pre.46 URL/p4.0pre.46 (i686-pc-linux; X11)" => array(
    "robot" => "other",
    "browser" => "emacs",
    "os" => "linux",
    "description" => "Emacs/W3 on X-windows Linux"
  ),
  "Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2.1" => array(
    "robot" => "other",
    "browser" => "eudoraweb",
    "os" => "palm",
    "description" => "EudoraWeb 2.1 under PalmOS 3.0 on Treo 180",
    "type" => "B"
  ),
  "Microsoft Pocket Internet Explorer/0.6" => array(
    "robot" => "other",
    "browser" => "iexplorepocket",
    "os" => "windowsce",
    "description" => ""
  ),
  "Mozilla/1.1 (compatible; MSPIE 2.0; Windows CE)" => array(
    "robot" => "other",
    "browser" => "iexplorepocket",
    "os" => "windowsce",
    "description" => ""
  ),
  "iSiloX/4.01 Windows/32" => array(
    "robot" => "other",
    "browser" => "isilox",
    "os" => "windows",
    "description" => "iSiloX HTML Reader on Pockect PC"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.1-rc3; i686 Linux; 20020515)" => array(
    "robot" => "websense",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Websense with fakes user agent as Knoqueror 3.1 RC 3 on Linux"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.1; Linux 2.4.22-10mdk; X11; i686; fr, fr_FR)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Knoqueror 3.1 on Mandrake Linux (french)"
  ),
  "NSPlayer/9.0.0.2980 WMFSDK/9.0" => array(
    "robot" => "other",
    "browser" => "mediaplayer",
    "os" => "other",
    "description" => "Media Player 9"
  ),
  "Mozilla/5.0 (Windows; U; Windows CE 5.1; rv:1.8.1a3) Gecko/20060610 Minimo/0.016" => array(
    "robot" => "other",
    "browser" => "minimo",
    "os" => "windowsce",
    "description" => "Minimo under Windows CE Mobile 5.0 on Pocket PC"
  ),
  "Mozilla/5.0 (Windows; U; Windows CE 4.21; rv:1.8b4) Gecko/20050720 Minimo/0.007" => array(
    "robot" => "other",
    "browser" => "minimo",
    "os" => "windowsce",
    "description" => "Minimo under Windows Mobile 2003"
  ),
  "Media Player Classic" => array(
    "robot" => "other",
    "browser" => "mpc",
    "os" => "other",
    "description" => ""
  ),
  "MPlayer/1.0rc1-4.1.1" => array(
    "robot" => "other",
    "browser" => "mplayer",
    "os" => "other",
    "description" => "MPlayer 1.0 RC1 build with GCC 4.1.1"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; MSN 6.1; MSNbMSFT; MSNmen-us; MSNc00)" => array(
    "robot" => "other",
    "browser" => "msn",
    "os" => "windowsxp",
    "description" => "MSN Explorer 6.1"
  ),
  "OutfoxBot/0.5 (for internet experiments; http://; outfoxbot@gmail.com)" => array(
    "robot" => "outfox",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "OutfoxBot/0.3 (For internet experiments; http://; outfox.agent@gmail.com)" => array(
    "robot" => "outfox",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "OutfoxBot/0.1 (For internet experiments; http://www.outfox.com; outfoxbot@gmail.com)" => array(
    "robot" => "outfox",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "iaskspider2 iask@staff.sina.com.cn" => array(
    "robot" => "iask",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "gnome-vfs/2.16.2 neon/0.25.4" => array(
    "robot" => "other",
    "browser" => "nautilus",
    "os" => "other",
    "description" => "Nautilus from 2.16.2"
  ),
  "Mozilla/4.08 (Windows; Mobile Content Viewer/1.0) NetFront/3.2" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "windowsce",
    "description" => "NetFront simulator on XP SP2"
  ),
  "Mozilla/4.0 (PS2; PlayStation BB Navigator 1.0) NetFront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "playstation",
    "description" => "NetFront on Japanese PS 2"
  ),
  "Mozilla/4.0 (PDA; PalmOS/sony/model crdb/Revision:1.1.36(de)) NetFront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "palm",
    "description" => "NetFront on CLie(Palm 5.0)"
  ),
  "Mozilla/4.0 (PDA; PalmOS/sony/model prmr/Revision:1.1.54 (en)) NetFront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "palm",
    "description" => "NetFront on CLie(Palm 5.0) ?"
  ),
  "Mozilla/4.0 (PDA; Windows CE/0.9.3) NetFront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "windowsce",
    "description" => "NetFront under Widows CE 2003"
  ),
  "Mozilla/4.0 (PDA; Windows CE/1.0.1) NetFront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "windowsce",
    "description" => "NetFront under Widows CE 2003"
  ),
  "Mozilla/4.0 (PDA; SL-C750/1.0,Embedix/Qtopia/1.3.0) NetFront/3.0 Zaurus C750" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "embedix",
    "description" => "NetFront Sharp Zuarus Linux based SL-C750"
  ),
  "OPWV-SDK UP.Browser/7.0.2.3.119 (GUI) MMP/2.0 Push/PO" => array(
    "robot" => "other",
    "browser" => "openwave",
    "os" => "windowsxp",
    "description" => "OpenWave V7 simulator under Windows XP SP 2 on x86"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; PalmSource/Palm-D050; Blazer/4.3) 16;320x320)" => array(
    "robot" => "other",
    "browser" => "blazer",
    "os" => "palm",
    "description" => "Palm Blazer 4.3 on Palm TX PDA"
  ),
  "Mozilla/4.76 [en] (PalmOS; U; WebPro/3.0; Palm-Arz1)" => array(
    "robot" => "other",
    "browser" => "palmsource",
    "os" => "palm",
    "description" => "?"
  ),
  "Mozilla/4.76 (compatible; MSIE 6.0; U; Windows 95; PalmSource; PalmOS; WebPro; Tungsten Proxyless 1.1 320x320x16)" => array(
    "robot" => "other",
    "browser" => "palmsource",
    "os" => "palm",
    "description" => "Palm browser 2.0.1.1 on a Tungsten C"
  ),
  "Mozilla/4.0 (compatible;MSIE 6.0;Windows95;PalmSource) Netfront/3.0;8;320x320" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "palm",
    "description" => "PalmSource Web Browser 2.0 for OS5.1 (with depth and resolution)"
  ),
  "Mozilla/4.0 (compatible;MSIE 6.0;Windows95;PalmSource) Netfront/3.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "palm",
    "description" => "PalmSource Web Browser 2.0 for OS5.1"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; ca; rv:1.5) Gecko/20031007\nPlucker/Py-1.4\nMozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)" => array(
    "robot" => "other",
    "browser" => "plucker",
    "os" => "windowsxp",
    "description" => "OpenWave V7 simulator under Windows XP SP 2 on x86"
  ),
  "Mozilla/3.0 (compatible; PHPEd Version 3.2 (Build 3217))" => array(
    "robot" => "other",
    "browser" => "phped",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (PSP (PlayStation Portable); 2.00)" => array(
    "robot" => "other",
    "browser" => "psp",
    "os" => "psp",
    "description" => "PSP with firmware 2.00"
  ),
// Not sure if this is correct
//  "Xbox/2.0.2858.0 UPnP/1.0 Xbox/2.0.2858.0" => array(
//    "robot" => "other",
//    "browser" => "xbox",
//    "os" => "xbox",
//    "description" => ""
//  ),
  "Mozilla/5.0 (X11; U; OpenVMS AlphaServer_ES40; en-US; rv:1.4) Gecko/20030826 SWB/V1.4 (HP)" => array(
    "robot" => "other",
    "browser" => "securewebbrowser",
    "os" => "openvms",
    "description" => ""
  ),
  "WinampMPEG/5.0" => array(
    "robot" => "other",
    "browser" => "winamp",
    "os" => "windows",
    "description" => "Winamp 5",
  ),
  "Nullsoft Winamp3 version 3.0d build 488" => array(
    "robot" => "other",
    "browser" => "winamp",
    "os" => "windows",
    "description" => "Winamp 3"
  ),
  "Xiino/1.0.9E [en] (v. 4.1; 153x130; g4)" => array(
    "robot" => "other",
    "browser" => "xiino",
    "os" => "other",
    "description" => "Xiino 1.0.9E under PalmOS 4.1"
  ),
  "xine/1.1.3" => array(
    "robot" => "other",
    "browser" => "xine",
    "os" => "other",
    "description" => "xine-lib 1.1.3"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.8) Gecko/20050511" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "linux",
    "description" => "Mozilla 1.7.9 on Linux (american english)"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; cs-CZ; rv:1.7.12) Gecko/20050929" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "linux",
    "description" => "Mozilla 1.7.12 on Gentoo Linux"
  ),
  // Site: http://www.pgts.com.au/download/data/browser_list.txt
  "abot/0.1 (abot; http://www.abot.com; abot@abot.com)" => array(
    "robot" => "abot",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Ace Explorer" => array(
    "robot" => "other",
    "browser" => "ace",
    "os" => "other",
    "description" => ""
  ),
  "ACS-NF/3.0 NEC-c616/001.00" => array(
    "robot" => "TODO",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "ACS-NF/3.0 NEC-e616/001.01 (www.proxomitron.de)" => array(
    "robot" => "TODO",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; AI)" => array(
    "robot" => "ai",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "AIM" => array(
    "robot" => "aim",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "AIM/30 (Mozilla 1.24b; Windows; I; 32-bit)" => array(
    "robot" => "aim",
    "browser" => "other",
    "os" => "windows",
    "description" => ""
  ),
  "aipbot/1.0 (aipbot; http://www.aipbot.com; aipbot@aipbot.com)" => array(
    "robot" => "aipbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Alizee iPod 2005 (Beta; Mac OS X)" => array(
    "robot" => "other",
    "browser" => "other",
    "os" => "macosx",
    "description" => ""
  ),
  "Mozilla/5.5 (compatible; alpha/06; AmigaOS 1337)" => array(
    "robot" => "other",
    "browser" => "alpha06",
    "os" => "amiga",
    "description" => ""
  ),
  "ALPHA/06_(Win98)" => array(
    "robot" => "other",
    "browser" => "alpha06",
    "os" => "windows98",
    "description" => ""
  ),
  "alpha 06" => array(
    "robot" => "other",
    "browser" => "alpha06",
    "os" => "other",
    "description" => ""
  ),
  "amaya/8.3 libwww/5.4.0" => array(
    "robot" => "other",
    "browser" => "amaya",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/3.01 (compatible; AmigaVoyager/2.95; AmigaOS/MC680x0)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "AmigaVoyager/2.95 (compatible; MC680x0; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.6 (compatible; AmigaVoyager; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; Voyager; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "AmigaVoyager/3.4.4 (MorphOS/PPC native)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "morph",
    "description" => "AmigaVoyager 3.4.4 on PowerPC"
  ),
  "Arexx (AmigaVoyager/2.95; AmigaOS/MC680x0)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "AmigaVoyager/3.3.122 (AmigaOS/PPC)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "AmigaOS AmigaVoyager" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Amiga Voyager" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; ANTFresco 2.20; RISC OS 3.11)" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "risc",
    "description" => ""
  ),
  "Mozilla/3.04 (compatible; NCBrowser/2.35 (1.45.2.1); ANTFresco/2.17; RISC OS-NC 5.13 Laz1UK1802)" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "risc",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; ANTFresco 1.20; RISC OS 3.11)" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "risc",
    "description" => ""
  ),
  "Mozilla/3.04 (compatible; ANTFresco/2.13; RISC OS 4.02)" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "risc",
    "description" => ""
  ),
  "AOL/8.0 (Lindows 2003)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "other",
    "description" => ""
  ),
  "AOLserver-Tcl/3.5.6" => array(
    "robot" => "aol",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "AOL 8.0 (compatible; AOL 8.0; DOS; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "other",
    "description" => ""
  ),
  "aolbrowser/1.1 InterCon-Web-Library/1.2" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "other",
    "description" => ""
  ),
  "ArachnetAgent 2.3/4.78 (TuringOS; Turing Machine; 0.0)" => array(
    "robot" => "TODO",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Arexx (compatible; MSIE 6.0; AmigaOS5.0) IBrowse 4.0" => array(
    "robot" => "other",
    "browser" => "ibrowse",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx (compatible; AmigaVoyager/2.95; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx (AmigaVoyager/2.95; AmigaOS/MC680x0; Mod-X by Pe)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; ARexx; AmigaOS; Avant Browser [avantbrowser.com]; .NET CLR 1.1.4322; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx ( ; ; AmigaOS 3.0)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx (compatible; MSIE 6.0; AmigaOS5.0)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "ARexx (compatible; ARexx; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; arexx)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx (compatible; AmigaVoyager/2.95; AmigaOS" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "Arexx (compatible; AmigaVoyager/2.95; AmigaOS" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; ARexx; AmigaOS)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => ""
  ),
  "ArtfaceBot (compatible; MSIE 6.0; Mozilla/4.0; Windows NT 5.1;)" => array(
    "robot" => "artface",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/2.0 (compatible; Ask Jeeves/Teoma; +http://sp.ask.com/docs/about/tech_crawling.html)" => array(
    "robot" => "ask",
    "browser" => "netscape",
    "os" => "other",
    "description" => ""
  ),
  "Astra/1.0 (WinNT; I)" => array(
    "robot" => "astra",
    "browser" => "other",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Astra/2.0 (WinNT; I)" => array(
    "robot" => "astra",
    "browser" => "other",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Atari/2600b (compatible; 2port; Wood Grain)" => array(
    "robot" => "other",
    "browser" => "atari",
    "os" => "atari",
    "description" => ""
  ),
  "Atari/2600 (GalaxianOS; U; en-US) cartridge/$29.95" => array(
    "robot" => "other",
    "browser" => "atari",
    "os" => "atari",
    "description" => ""
  ),
  "Auto-Proxy Downloader" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "other",
    "description" => "MSIE 3.01 reports that when fetching the autoconfig file (i.e. from squid proxy)"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Avant Browser [avantbrowser.com])" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com]; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Avant Browser/1.2.789rel1 (http://www.avantbrowser.com)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Avant Browser [avantbrowser.com]; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Avant Browser [avantbrowser.com])" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com])" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Advanced Browser (http://www.avantbrowser.com)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "other",
    "description" => ""
  ),
  "Avant Browser (http://www.avantbrowser.com)" => array(
    "robot" => "other",
    "browser" => "avantbrowser",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; BecomeBot/2.2.1; MSIE 6.0 compatible; +http://www.become.com/webmasters.html)" => array(
    "robot" => "become",
    "browser" => "mozilla",
    "os" => "other",
    "description" => ""
  ),
  "BlackBerry7730/3.7.1 UP.Link/5.1.2.5" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "UPG1 UP/4.0 (compatible; Blazer 1.0)" => array(
    "robot" => "other",
    "browser" => "blazer",
    "os" => "other",
    "description" => ""
  ),
  "Bobby/3.3 RPT-HTTPClient/0.3-3E" => array(
    "robot" => "bobby",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "boitho.com-dc/0.70 ( http://www.boitho.com/dcbot.html )" => array(
    "robot" => "boitho",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "boitho.com-dc/0.71 ( http://www.boitho.com/dcbot.html )" => array(
    "robot" => "boitho",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Brain/1.0 [de] (Human RAW 1.1; U)" => array(
    "robot" => "brain",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Browsers Part 4" => array(
    "robot" => "crap",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Buscaplus Robi/1.0 (http://www.buscaplus.com/robi/)" => array(
    "robot" => "crap",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "BuyGet/1.0 Agent-Admin/webmaster@kfda.go.kr" => array(
    "robot" => "crap",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "CacheBot/0.445 (compatible, http://www.cachebot.com)" => array(
    "robot" => "crap",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "CDM-8900" => array(
    "robot" => "crap",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; Cerberian Drtrs Version-3.2-Build-1)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "cerberian",
    "description" => ""
  ),
  "Mozilla/2.0 (compatible; MSIE 3.0; Update a; AK; Windows 95) via proxy gateway CERN-HTTPD/3.0 libwww/2.17" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => ""
  ),
  "cfetch/1.0" => array(
    "robot" => "cosmix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cosmix project crawler (204.14.48.x / 38.113.234.xxx), s. also - voyager/1.x - carleson/1.x "
  ),
  "CFNetwork/1.1" => array(
    "robot" => "cfnetwork",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "SonyEricssonT610/R101 Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonP900/R102 Profile/MIDP-2.0 Configuration/CLDC-1.0 Rev/MR4" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonT610/R201 Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Link/5.1.2.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonT610/R201 Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonP900/R101 Profile/MIDP-2.0 Configuration/CLDC-1.0" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonT610/R401 Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Link/5.1.1.3 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonT610/R401 Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonZ600/R401 Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonK700i/R2AE SEMC-Browser/4.0.3 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.2.3.15.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonK700i/R2AA SEMC-Browser/4.0.2 Profile/MIDP-2.0 Configuration/CLDC-1.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonP910i/R3A SEMC-Browser/Symbian/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.0" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "symbian",
    "description" => ""
  ),
  "Clushbot/3.31-BinaryFury (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/2.0 (compatible; MSIE 2.0; Commodore64)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "c64",
    "description" => ""
  ),
  "Mozilla/2.0 (compatible; MSIE 1.0; Commodore64)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "c64",
    "description" => ""
  ),
  "ConveraMultiMediaCrawler/0.1 (+http://www.authoritativeweb.com/crawl)" => array(
    "robot" => "convera",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "CosmixCrawler/0.1" => array(
    "robot" => "cosmix",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "crawler (ISSpider-3.0; http://www.yoururlgoeshere.com)" => array(
    "robot" => "isspider",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Crawler0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Q312461; APCMAG; NetCaptor 6.5.0B7; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; FREE; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Q312461; Crazy Browser 1.0.5; Alexa Toolbar)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; T312461; Crazy Browser 1.0.5; Alexa Toolbar; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; MyIE2; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; (R1 1.5))" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Katiesoft 7; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; CDSource=vBB1c.00; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; OptusNetDSL6; Crazy Browser 1.0.5; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Texas Instruments; MyIE2; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; (R1 1.1); .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FunWebProducts-MyWay; SV1; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; GoogleBot; Crazy Browser 1.0.5; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; T312461; Crazy Browser 1.0.5; Tyco Electronics 01/2003)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FREE; FunWebProducts; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Crazy Browser 1.0.5; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsnt",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FunWebProducts-MyWay; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; H010818; Crazy Browser 1.0.5; iRider 2.20.0018)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; {A5020528-0A08-4436-8CD1-D02C46132E5A}; SV1; Crazy Browser 1.0.5; CustomExchangeBrowser; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Win 9x 4.90; 3305; Versatel.de ISDN 0404; Crazy Browser 1.0.5; onlineTV; www.cdesign.de)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsme",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Socantel; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; iebar; SV1; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Maxthon; Deepnet Explorer 1.3.2; Crazy Browser 2.0.0 Beta 1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/1.0 (compatible; Crazy Browser 1.0.1; FreeBSD 3.2-RELEASE i386)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "freebsd",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 2.0.0 Beta 1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; {4CBEAFB3-10C9-497A-B016-7FEBFBD707E9}; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; OptusIE55-31; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; MyIE2; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Q312461; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 2.0.0 Beta 1)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 2.0.0 Beta 1; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; brip1; RainBird 1.01/HT; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Crazy Browser 1.0.5; FDM)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Crazy Browser 2.0.0 Beta 1)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; iebar; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; iebar; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; DigExt; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Win 9x 4.90; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsme",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; FunWebProducts; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5; .NET CLR 1.0.3705; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 2.0.0 Beta 1)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 2.0.0 Beta 1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; H010818; YPC 3.0.1; yie6; Crazy Browser 2.0.0 Beta 1)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; SV1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; Crazy Browser 1.0.5; .NET CLR 1.1.4322; .NET CLR 2.0.40607)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2003",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FunWebProducts; Crazy Browser 1.0.5)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5; .NET CLR 1.1.4322; .NET CLR 2.0.40607)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; www.ASPSimply.com; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 2.0.0 Beta 1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Crazy Browser 1.0.5; .NET CLR 1.1.4322; FDM)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FunWebProducts-MyTotalSearch; Maxthon; Crazy Browser 2.0.0 Beta 1)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Crazy Browser 1.0.5; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crazy Browser 1.0.5; Alexa Toolbar)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windowsxp",
    "description" => ""
  ),
  "curl/7.7.3 (i686-pc-linux-gnu) libcurl 7.7.3 (OpenSSL 0.9.6)" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.7.3 (win32) libcurl 7.7.3 (OpenSSL 0.9.6)" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "windows",
    "description" => ""
  ),
  "curl/7.10.6 (i386-redhat-linux-gnu) libcurl/7.10.6 OpenSSL/0.9.7a ipv6 zlib/1.1.4" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.9.8 (i386-redhat-linux-gnu) libcurl 7.9.8 (OpenSSL 0.9.7a) (ipv6 enabled)" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.10.2 (powerpc-apple-darwin7.0) libcurl/7.10.2 OpenSSL/0.9.7b zlib/1.1.4" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "darwin",
    "description" => ""
  ),
  "curl/7.11.2 (i686-pc-linux-gnu) libcurl/7.10.2 OpenSSL/0.9.6i ipv6 zlib/1.1.4" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.9.5 (i386-redhat-linux-gnu) libcurl 7.9.5 (OpenSSL 0.9.6b) (ipv6 enabled)" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.10.6 (i386-redhat-linux-gnu) libcurl/7.10.6 OpenSSL/0.9.7a ipv6 zlib/1.2.0.7" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.12.0 (i686-pc-linux-gnu) libcurl/7.12.0 OpenSSL/0.9.7e ipv6 zlib/1.2.2" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "linux",
    "description" => ""
  ),
  "curl/7.9.3 (powerpc-ibm-aix4.3.3.0) libcurl 7.9.3 (OpenSSL 0.9.6m)" => array(
    "robot" => "curl",
    "browser" => "curl",
    "os" => "aix",
    "description" => ""
  ),
/*
DA 5.3
DA 5.0
daemon (AmigaOS; alpha/06; AmigaOS mod-x)
DataFountains/DMOZ Downloader
Mozilla/4.0 (compatible; DB Browse 4.3; DB OS 6.0)
deepak-USC/ISI
Deepnet Explorer 1.0.1.0
Deepnet Explorer*/
  "Dillo/0.8.0-pre" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.2-pre" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.2" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.3-rc2" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.6.4" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.1" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/27951.4" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.7.3" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.0" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.3" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.4" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
  "Dillo/0.8.5-pre" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "",
  ),
/*dloader(NaverRobot)/1.1
Mozilla/4.0 (compatible; DLW 2.0; Win32)*/
  "DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)" => array(
    "robot" => "goo",
    "browser" => "other",
    "os" => "other",
    "description" => "",
  ),
  "DoCoMo/1.0/D503iS/c10" => array(
    "robot" => "goo",
    "browser" => "other",
    "os" => "other",
    "description" => "",
  ),
  "DoCoMo/2.0 F900i(c100;TB;W22H12),gzip(gfe) (via translate.google.com)" => array(
    "robot" => "goo",
    "browser" => "other",
    "os" => "other",
    "description" => "",
  ),
  "DoCoMo/2.0 N900i(c100;TB;W24H12)" => array(
    "robot" => "goo",
    "browser" => "other",
    "os" => "other",
    "description" => "",
  ),
  "Doris/1.10 [en] (Symbian)" => array(
    "robot" => "other",
    "browser" => "doris",
    "os" => "symbian",
    "description" => "",
  ),
  "Doris/1.17 [en] (Symbian)" => array(
    "robot" => "other",
    "browser" => "doris",
    "os" => "symbian",
    "description" => "",
  ),
/*  "Download.exe(1.1) (+http://www.sql-und-xml.de/freeware-tools/)
Download Master
Download Ninja 7.0
EasyDL/3.04 http://keywen.com/Encyclopedia/Bot
ELinks (0.4pre5; Linux 2.6.0 i686; 176x66)
ELinks (0.4pre5; Linux 2.4.24 i686; 132x34)
ELinks (0.4.2; cygwin; 700)
ELinks (0.9.CVS; Linux 2.6.5 i686; 169x55)
ELinks/0.9.2rc2 (textmode; Linux 2.4.26-lck1 i486; 80x25)
ELinks (0.4.2; Linux; )
ELinks/0.9.1 (textmode; Linux; 80x25)
ELinks/0.9.CVS (textmode; Linux 2.4.18-1-386 i686; 80x25-3)
ELinks (0.4pre5; Linux 2.2.20-compact i586; 80x30)
ELinks (0.4pre5; Linux 2.2.20 i586; 138x44)
ELinks/0.9.1 (textmode; Linux 2.6.3-7mdksmp i686; 80x25)
ELinks/0.9.1 (textmode; Linux 2.6.6 i686; 128x54)
ELinks/0.9.1 (textmode; FreeBSD 4.10-PRERELEASE i386; 132x43)
ELinks/0.9.1 (textmode; FreeBSD 4.10-STABLE i386; 132x43)
ELinks/0.9.3 (textmode; Linux 2.6.8.1 i686; 118x82)
ELinks/0.9.2rc4 (textmode; Linux 2.4.20-8 i686; 105x46)
ELinks/0.9.2 (textmode; Linux; 157x52)
ELinks (0.10rc1; Linux 2.6.9-gentoo-r10 i686; 80x25)
ELinks (0.9.3)
ELinks/0.9.3 (textmode; Linux 2.6.7-20050106 i686; 80x34)
ELinks/0.9.3 (textmode; Linux 2.6.8-1-386 i686; 160x64)
ELinks/0.9.1 (textmode; Linux; 80x24)
ELinks/0.9.3 (textmode; Linux 2.6.8-mdp04 i686; 80x25)
ELinks/0.9.3
ELinks (0.4pre18; Linux 2.2.22 i686; 80x25)
ELinks/0.9.1 (textmode; Linux 2.4.26 i686; 128x48)
ELinks/0.9.2rc7 (textmode; Linux 2.4.29-1 i686; 190x75)
ELinks/0.9.3 (textmode; Linux 2.6.10 i686; 80x25)
ELinks (0.4pre5; Linux 2.4.23 i686; 114x27)
Enigma Browser
EricssonT68/R101 (;; ;; ;; Smartphone; SDA/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1)
Explorer /5.02 (Windows 95; U) [en]
Explorer /5.02 (Windows 95; U) [en]
Mozilla/4.0 (compatible; MSIE 6.0; FastWeb; Windows NT 5.1; OMEGA)
FavOrg
FDM 1.0*/
  "FindAnISP.com_ISP_Finder_v99a" => array(
    "robot" => "findanisp",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "findlinks/0.901e (+http://wortschatz.uni-leipzig.de/findlinks/)" => array(
    "robot" => "findlinks",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "FireFox (X11; Linux i686; pl-PL); slackware; FireFox;" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "linux",
    "description" => ""
  ),
  "Firefox/1.0 (Windows; U; Win98; en-US; Localization; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows98",
    "description" => ""
  ),
  "Firefox/1.0.1 (Windows NT 5.1; U; pl-PL)" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => ""
  ),
  "FlashGet" => array(
    "robot" => "flashget",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "FOOZWAK (zeep; 47.3; CheeseMatic 9.1; T312461; iOpus-I-M; BucketChunk 4.1; Shronk; .NET CLR 1.1.4322)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => ""
  ),
  "FreshDownload/4.40" =>  array(
    "robot" => "other",
    "browser" => "freshdownload",
    "os" => "other",
    "description" => ""
  ),
  "Funky Little Browser" =>  array(
    "robot" => "other",
    "browser" => "crap",
    "os" => "other",
    "description" => ""
  ),
  // Normal and verified user agents from here on
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9a1) Gecko/20061204 GranParadiso/3.0a1" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows;) NimbleCrawler 2.0.1 obeys UserAgent NimbleCrawler For problems contact: crawler@healthline.com" => array(
    "robot" => "nimble",
    "browser" => "mozilla",
    "os" => "windows",
    "description" => ""
  ),
  "TurnitinBot/2.1 (http://www.turnitin.com/robot/crawlerinfo.html)" => array(
    "robot" => "turnitin",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "ExaBotTest/3.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Win 9x 4.90) Gecko/20020502 CS 2000 7.0/7.0" => array(
    "robot" => "other",
    "browser" => "compuserve",
    "os" => "windowsme",
    "description" => "CompuServe packaged version of Mozilla browser (indicated by the the CS 2000)"
  ),
  "msnbot-media/1.0 (+http://search.msn.com/msnbot.htm)" => array(
    "robot" => "mslivebot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "IlseBot/1.0" => array(
    "robot" => "ilse",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Verzamelgids/2.2 (http://www.verzamelgids.nl)" => array(
    "robot" => "verzamelgids",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Windows-Media-Player/11.0.5721.5145" => array(
    "robot" => "other",
    "browser" => "mediaplayer",
    "os" => "windows",
    "description" => "Windows Media Player 11"
  ),
  "KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SIE-M65/50 UP.Browser/7.0.2.2.d.3(GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 (Siemens M65 phone)" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "Opera/8.01 (J2ME/MIDP; Opera Mini/1.2.2960; en; U; ssr)" => array(
    "robot" => "other",
    "browser" => "operamini",
    "os" => "java",
    "description" => "Opera Mini (english, U (strong security (USA))"
  ),
  "Opera/8.01 (J2ME/MIDP; Opera Mini/2.0.4719; en; U; ssr)" => array(
    "robot" => "other",
    "browser" => "operamini",
    "os" => "java",
    "description" => "2.0.4719 on J2ME on the Sony Ericsson W800i"
  ),
  "Opera/8.01 (J2ME/MIDP; Opera Mini/2.0.4509/1316; fi; U; ssr)" => array(
    "robot" => "other",
    "browser" => "operamini",
    "os" => "java",
    "description" => "2.0.4509 on J2ME on the Motorola RAZR V3"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.2; Linux 2.6.2) (KHTML, like Gecko)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.04 [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.0; de-DE; rv:1.6) Gecko/20040206 Firefox/1.0.1" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windows2k",
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => ""
  ),
  "Lynx/2.8.4rel.1 libwww-FM/2.14 SSL-MM/1.4.1 OpenSSL/0.9.6c" => array(
    "robot" => "other",
    "browser" => "lynx",
    "os" => "other",
    "description" => ""
  ),
  "LG/KU800/v1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "MOT-E1000/80.28.08I MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "mib",
    "os" => "mobile",
    "description" => ""
  ),
  "NokiaN73-1/2.0626.0.0.2 S60/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SHARP-TQ-GX30i/1.0 Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Browser/6.2.2.6.c.1.104 (GUI)" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SIE-SL65/25 UP.Browser/7.0.0.1.c.3 (GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonT68/R201A" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "SonyEricssonP910i/R2A SEMC-Browser/Symbian/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.0" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "symbian",
    "description" => ""
  ),
  "Thunderbird 1.5.0.7 (X11/20060927)" => array(
    "robot" => "thunderbird",
    "browser" => null,
    "os" => null,
    "description" => "A thunderbird running on X11/Linux"
  ),
  "Mutt/1.5.13 (2006-08-11)" => array(
    "robot" => "mutt",
    "browser" => null,
    "os" => null,
    "description" => "A mutt mail client"
  ),
  "Microsoft Outlook IMO, Build 9.0.6604 (9.0.2911.0)" => array(
    "robot" => "outlook",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "Miva (AlgoFeedback@miva.com)" => array(
    "robot" => "miva",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)" => array(
    "robot" => "goo",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "DoCoMo/J-PHONE/KDDI/1.0 (CROOZ)" => array(
    "robot" => "goo",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "Blogslive (info@blogslive.com)" => array(
    "robot" => "blogslife",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "MyApp/0.1 libwww-perl/5.76" => array(
    "robot" => "libwww",
    "browser" => null,
    "os" => null,
    "description" => "MyAPP/0.1 is default for the libwww-perl robot"
  ),
  "Slider/2.0" => array(
    "robot" => "slider",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "rssImagesBot/0.1 (+http://herbert.groot.jebbink.nl/?app=rssImages)" => array(
    "robot" => "rssimages",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "traycebot/0.2-alpha [http://trayce.com/traycebot.html]" => array(
    "robot" => "trayce",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "unido-bot, http://mobicom.cs.uni-dortmund.de/bot.html" => array(
    "robot" => "unido",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "eBay Relevance Ad Crawler powered by contentDetection (www.mindup.de)" => array(
    "robot" => "ebay",
    "browser" => null,
    "os" => null,
    "description" => ""
  ),
  "Nokia6820/2.0 (4.83) Profile/MIDP-1.0 Configuration/CLDC-1.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)" => array(
    "robot" => "googlemobile",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "R600 1.0 WAP1.2.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "BlackBerry7290/4.0.2 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "Nokia3200/1.0 () Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "wap",
    "os" => "mobile",
    "description" => ""
  ),
  "Nokia6610I/1.0 (3.10) Profile/MIDP-1.0 Configuration/CLDC-1.0 UP.Link/1.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "Nokia6630/1.0 (3.45.113) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "symbian",
    "description" => ""
  ),
  "UP.Browser/6.1.0.1.140 (Google CHTML Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => ""
  ),
  "FindLinks (http://wortschatz.uni-leipzig.de/findlinks/)" => array(
    "robot" => "findlinks",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "DomaindateiSpider/1.0 (http://www.domaindatei.de/spider.html * Deine Domain ist gespidert worden!!!" => array(
    "robot" => "domaindatei",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Microsoft Data Access Internet Publishing Provider Protocol Discovery" => array(
    "robot" => "other",
    "browser" => "office",
    "os" => "windows",
    "description" => "MS Office 2000 acting as WebDAV client",
    "type" => "B C"
  ),
  "Forex Trading Network Organization info@netforex.org" => array(
    "robot" => "forex",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "YodaoBot/1.0 (http://www.yodao.com/help/webmaster/spider/; )" => array(
    "robot" => "yodao",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yodao search (China)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; DepSpid/5.07; +http://about.depspid.net)" => array(
    "robot" => "depspid",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.7 (compatible; OffByOne; Windows 2000)" => array(
    "robot" => "other",
    "browser" => "offbyone",
    "os" => "windows2k",
    "description" => "Off-by-One browser on Windows XP (even if it reports to be in 2k)"
  ),
  "Mozilla/4.0 (compatible; MSIE is not me; DAUMOA/1.0.0; DAUM Web Robot; Daum Communications Corp., Korea)" => array(
    "robot" => "daum",
    "browser" => "explorer",
    "os" => "other",
    "description" => "Korean bot with better user agent than before"
  ),
  "Poodle predictor 1.0" => array(
    "robot" => "poodle",
    "browser" => "other",
    "os" => "other",
    "description" => "website to show how a site will look like in search-engine results"
  ),
  "GoGuidesBot/0.0.1 (GoGuides Indexing Spider; http://www.goguides.org/spider.html)" => array(
    "robot" => "goguides",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Pingdom GIGRIB v1.1 (http://www.pingdom.com)" => array(
    "robot" => "pingdom",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "FacebookFeedParser/1.0 (UniversalFeedParser/4.1;) +http://facebook.com/" => array(
    "robot" => "facebook",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "SMBot/1.1 (www.specificmedia.com)" => array(
    "robot" => "specificmedia",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Opera/9.00 (Nintendo Wii; U; 1309-9; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "wii",
    "description" => ""
  ),
  "Mozilla/3.0 (INGRID/3.0 MT; webcrawler@NOSPAMexperimental.net; http://webmaster.ilse.nl/jsp/webmaster.jsp)" => array(
    "robot" => "ilse",
    "browser" => "netscape",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.1-rc4; i686 Linux; 20020321)" => array(
    "robot" => "websense",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Websense with faked user agent"
  ),
  "HouxouCrawler/Nutch-0.8.2-dev (houxou.com's nutch-based crawler which serves special interest on-line communities; http://www.houxou.com/crawler; crawler at houxou dot com)" => array(
    "robot" => "houxou",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "SBIder/SBIder-0.8.2-dev (http://www.sitesell.com/sbider.html)" => array(
    "robot" => "sbider",
    "browser" => "other",
    "os" => "other",
    "description" => "Websense with faked user agent"
  ),
  "bot/1.0 (bot; http://; bot@bot.bot)" => array(
    "robot" => "robot",
    "browser" => "other",
    "os" => "other",
    "description" => "From 71.13.115.117 (71-13-115-117.static.mdsn.wi.charter.com)"
  ),
  "Twiceler www.cuill.com/twiceler/robot.html" => array(
    "robot" => "twiceler",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "ASPseek/1.2.11pre" => array(
    "robot" => "aspseek",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Jyxobot/1" => array(
    "robot" => "jyxo",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "MQbot http://metaquerier.cs.uiuc.edu/crawler" => array(
    "robot" => "mqbot",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "ping.blogug.ch aggregator 1.0" => array(
    "robot" => "TODO",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "bloxon/0.1" => array(
    "robot" => "bloxon",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "slug.ch crawl 1.10 (+www.slug.ch)" => array(
    "robot" => "slugch",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Feedfetcher-Google; (+http://www.google.com/feedfetcher.html)" => array(
    "robot" => "googlefeeds",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "MOZILLA/4.0 (COMPATIBLE; MSIE 6.0; WINDOWS NT 5.1; SV1; ACOO BROWSER)" => array(
    "robot" => "other",
    "browser" => "acoo",
    "os" => "windowsxp",
    "description" => ""
  ),
  "POE-Component-Client-HTTP/0.65 (perl; N; POE; en; rv:0.650000)" => array(
    "robot" => "poe",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "EmeraldShield.com WebBot (http://www.emeraldshield.com/webbot.aspx)" => array(
    "robot" => "emeraldshield",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A web filter"
  ),
  "DataFountains/DMOZ Downloader" => array(
    "robot" => "infomine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "INFOMINE Scholary Internet Resource Collections robot",
    "type" => "R"
  ),
  "MojeekBot/0.2 (archi; http://www.mojeek.com/bot.html)" => array(
    "robot" => "mojeekbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "aipbot/1.0 (aipbot; http://www.aipbot.com; [email]aipbot@aipbot.com[/email])" => array(
    "robot" => "aipbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "blinker/incremental0.62" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "a Perl module"
  ),
  "BlogzIce/1.0 +http://www.icerocket.com/" => array(
    "robot" => "icerocket",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "AIBOT/2.1 By +(www.21seek.com , A Real artificial intelligence search engine , China)" => array(
    "robot" => "aibot",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; fr-fr) AppleWebKit/125.5.6 (KHTML, like Gecko) SunriseBrowser/0.708" => array(
    "robot" => "other",
    "browser" => "sunrise",
    "os" => "macosx",
    "description" => ""
  ),
  "Tongco2/1.20 (http://ichigo.afz.jp/megu/megu.cgi)" => array(
    "robot" => "tongco",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "PROBE! (Probert Encyclopaedia Research Robot V1.0 http://www.probertencyclopaedia.com)" => array(
    "robot" => "probe",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 Dead Link Checker (wn.dlc@looksmart.net; http://www.WISEnutbot.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "YottaShopping_Bot/4.12 (+http://www.yottashopping.com) Shopping Search Engine" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "HooWWWer/2.1.0 (+http://cosco.hiit.fi/search/hoowwwer/ | mailto:crawler-infohiit.fi)" => array(
    "robot" => "hoowwwer",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Sopheus Project/0.01 (Nutch; http://www.thenetplanet.com; info@thenetplanet.com)" => array(
    "robot" => "sopheus",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (JemmaTheTourist;http://www.activtourist.com)" => array(
    "robot" => "jemma",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "WordPress/1.2.2 PHP/4.3.9" => array(
    "robot" => "wordpress",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Blogdex/0.1 (+http://blogdex.net/about)" => array(
    "robot" => "blogdex",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20040913 Thunderbird/0.8" => array(
    "robot" => "thunderbird",
    "browser" => "mozilla",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Aggreg8 RSS aggregator" => array(
    "robot" => "aggreg8",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "htdig" => array(
    "robot" => "htdig",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "jyte_fetcher/1.28 (see http://www.jyte.com/fetcher.html)" => array(
    "robot" => "jyte",
    "browser" => "other",
    "os" => "other",
    "description" => ""
  ),
  "Nokia6230i/. FAST Crawler" => array(
    "robot" => "robot",
    "browser" => "other",
    "os" => "mobile",
    "description" => ""
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.8.0.9) Gecko/20061206 Firefox/1.5.0.9" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => ""
  ),
  "Opera/9.10 (Windows 98; U; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows98",
    "description" => ""
  ),
  "Opera/9.00 (Nintendo Wii; U; ; 1038-58; Wii Shop Channel/1.0; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "wii",
    "description" => ""
  ),
  "Mozilla/5.0 (X11; U; Linux i686; PL; rv:1.8.0.8) Gecko/20060911 SUSE/1.0.6-0.1 SeaMonkey/1.0.6" => array(
    "robot" => "other",
    "browser" => "seamonkey",
    "os" => "suse",
    "description" => ""
  ),
  "IBrowse/2.3 (AmigaOS 3.9)" => array(
    "robot" => "other",
    "browser" => "ibrowse",
    "os" => "amiga",
    "description" => ""
  ),
  "SoftBank/1.0/705SC/SCJ001/SN352838010194543 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "mobile",
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.5; Linux 2.6.18-gentoo-r3; X11; i686; pl) KHTML/3.5.5 (like Gecko)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "gentoo",
    "description" => ""
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/521.25 (KHTML, like Gecko) Safari/521.24" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "macosx",
    "description" => ""
  ),
  "DA 7.0" => array(
    "robot" => "da",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "psbot/0.1 (+http://www.picsearch.com/bot.html)" => array(
    "robot" => "psbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Execrawl/1.0 (Execrawl; http://www.execrawl.com/; bot@execrawl.com)" => array(
    "robot" => "execrawl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Execrawl software search using nutch",
    "type" => "R"
  ),
  "Exabot-Test/1.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead (France) search robot (193.47.80.0x)",
    "type" => "R"
  ),
  "Exabot/3.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead (France) search robot (193.47.80.0x)",
    "type" => "R"
  ),
  "Feed24.com" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Feed24 news feed and blog search",
    "type" => "R"
  ),
  "Mac Finder 1.0.0x" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Mackster( http://www.ukwizz.com )" => array(
    "robot" => "ukwizz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UKWizz search robot",
    "type" => "R"
  ),
  "MagicWML/1.0 (forcewml)" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "All Magic/Wap wml service for mobile devices",
    "type" => "P"
  ),
  "Mag-Net" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wind.it client user-agent ?",
    "type" => ""
  ),
  "MagpieRSS/0.7x (+http://magpierss.sf.net)" => array(
    "robot" => "magpierss",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Magpie RSS - PHP RSS Parser",
    "type" => "B"
  ),
  "mailto:webcraft@bea.com" => array(
    "robot" => "bea",
    "browser" => "other",
    "os" => "other",
    "description" => "Unknown Bea robot",
    "type" => "R"
  ),
  "mammoth/1.0 ( http://www.sli-systems.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SLI Systems mammoth robot",
    "type" => "R"
  ),
  "MantraAgent" => array(
    "robot" => "looksmart",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Looksmart robot",
    "type" => "R"
  ),
  // Adding http://www.psychedelix.com/agents/index.shtml
  "!Susie (http://www.sync2it.com/susie)" => array(
    "robot" => "sync2it",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sync2It bookmark management & clustering engine",
    "type" => "C R"
  ),
  "<a href='http://www.unchaos.com/'> UnChaos </a> From Chaos To Order Hybrid Web Search Engine.(vadim_gonchar@unchaos.com)" => array(
    "robot" => "unchaos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UnCHAOS search robot",
    "type" => "R"
  ),
  "<a href='http://www.unchaos.com/'> UnChaos Bot Hybrid Web Search Engine. </a> (vadim_gonchar@unchaos.com)" => array(
    "robot" => "unchaos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UnCHAOS search robot",
    "type" => "R"
  ),
  "<b> UnChaosBot From Chaos To Order UnChaos Hybrid Web Search Engine at www.unchaos.com </b> (info@unchaos.com)" => array(
    "robot" => "unchaos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UnCHAOS search robot",
    "type" => "R"
  ),
  "<http://www.sygol.com/> http://www.sygol.com" => array(
    "robot" => "sygol",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sygol Search (Italy) robot",
    "type" => "R"
  ),
  "( Robots.txt Validator http://www.searchengineworld.com/cgi-bin/robotcheck.cgi )" => array(
    "robot" => "searchengineworld",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SearchEngineWorld's robots.txt validator",
    "type" => "C"
  ),
  "(DreamPassport/3.0; isao/MyDiGiRabi)" => array(
    "robot" => "other",
    "browser" => "dreampassport",
    "os" => "dreamcast",
    "description" => "DreamCast DreamPassport browser",
    "type" => "B"
  ),
  "(Privoxy/1.0)" => array(
    "robot" => "privoxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Privoxy web proxy",
    "type" => "P"
  ),
  ":robot/1.0 (linux) ( admin e-mail: undefined http://www.neofonie.de/loesungen/search/robot.html )" => array(
    "robot" => "neofonie",
    "browser" => NULL,
    "os" => NULL,
    "description" => "neofonie search robot Germany",
    "type" => "R"
  ),
  "+SitiDi.net/SitiDiBot/1.0 (+Have Good Day)" => array(
    "robot" => "sitidi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SitiDi.net search (Germany) robot",
    "type" => "R"
  ),
  "123spider-Bot (Version: 1.02, powered by www.123spider.de" => array(
    "robot" => "123spider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "123spider.de (Germany) web directory link checking",
    "type" => "C"
  ),
  "192.comAgent" => array(
    "robot" => "192com",
    "browser" => NULL,
    "os" => NULL,
    "description" => "192.com - UK web directory",
    "type" => "R"
  ),
  "1st ZipCommander (Net) - http://www.zipcommander.com/" => array(
    "robot" => "other",
    "browser" => "zipcommander",
    "os" => "other",
    "description" => "1st ZipCommander Net - IE based browser",
    "type" => "B"
  ),
  "2Bone_LinkChecker/1.0 libwww-perl/5.64" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "2Bone online link checker",
    "type" => "C"
  ),
  "4anything.com LinkChecker v2.0" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "4Anything robot",
    "type" => "R"
  ),
  "A1 Sitemap Generator/1.0 (+http://www.micro-sys.dk/products/sitemap-generator/) miggibot/2006.01.24" => array(
    "robot" => "a1sitemap",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MiggiBot website crawler engine - A1 Sitemap Generator",
    "type" => "R"
  ),
  "AbachoBOT" => array(
    "robot" => "abacho",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Abacho / Crawler.de robot",
    "type" => "R"
  ),
  "AbachoBOT (Mozilla compatible)" => array(
    "robot" => "abacho",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Abacho / Crawler.de robot",
    "type" => "R"
  ),
  "ABCdatos BotLink/5.00.000#BBL" => array(
    "robot" => "abcdatos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ABCdatos - Castilian program & tutorial directory",
    "type" => "R"
  ),
  "Aberja Checkomat" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Aberja Hybridsuchmaschine (Germany) link checking",
    "type" => "R"
  ),
  "About/0.1libwww-perl/5.47" => array(
    "robot" => "about",
    "browser" => NULL,
    "os" => NULL,
    "description" => "About robot",
    "type" => "R"
  ),
  "Accelatech RSSCrawler/0.4" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Accela Technology RSS feed crawler",
    "type" => "R"
  ),
  "accoona" => array(
    "robot" => "accoona",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Accoona Search robot (65.17.255.0x)",
    "type" => "R"
  ),
  "Accoona-AI-Agent/1.1.1 (crawler at accoona dot com)" => array(
    "robot" => "accoona",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Accoona Search robot (65.17.255.0x)",
    "type" => "R"
  ),
  "Ack (http://www.ackerm.com/)" => array(
    "robot" => "ackerm",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ackerm search robot",
    "type" => "R"
  ),
  "AcoiRobot" => array(
    "robot" => "acoi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Acoi picture finder robot",
    "type" => "R"
  ),
  "Acoon Robot v1.50.001" => array(
    "robot" => "acoon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Acoon.de robot",
    "type" => "R"
  ),
  "Acoon Robot v1.52 (http://www.acoon.de)" => array(
    "robot" => "acoon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Acoon.de robot",
    "type" => "R"
  ),
  "ActiveBookmark 1.0" => array(
    "robot" => "active",
    "browser" => NULL,
    "os" => NULL,
    "description" => "LibMaster.com Active Bookmark HTML page creator",
    "type" => "C B"
  ),
  "Activeworlds" => array(
    "robot" => "other",
    "browser" => "activeworlds",
    "os" => "other",
    "description" => "Activeworlds 3D homepage browser",
    "type" => "B"
  ),
  "ActiveWorlds/3.0x (xxx)" => array(
    "robot" => "other",
    "browser" => "activeworlds",
    "os" => "other",
    "description" => "Activeworlds 3D homepage browser",
    "type" => "B"
  ),
  "Ad Muncher v4.01.0" => array(
    "robot" => "admuncher",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ad Muncher - banner killer",
    "type" => "P"
  ),
  "Ad Muncher v41 Build 12345" => array(
    "robot" => "admuncher",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ad Muncher - banner killer",
    "type" => "P"
  ),
  "Adaxas Spider (http://www.adaxas.net/)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "website directory adaxas link checking",
    "type" => "C"
  ),
  "AESOP_com_SpiderMan" => array(
    "robot" => "aesop",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Aesop robot",
    "type" => "R"
  ),
  "agadine/1.0.0 (+http://www.agada.de)" => array(
    "robot" => "agada",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Agada search (Germany) robot",
    "type" => "R"
  ),
  "AgentName/0.1 libwww-perl/5.48" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkomatic submission verifier",
    "type" => "R"
  ),
  "Agent-SharewarePlazaFileCheckBot/2.0+(+http://www.SharewarePlaza.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SharewarePlaza link checking",
    "type" => "R"
  ),
  "AIBOT/2.1 By +(www.21seek.com A Real artificial intelligence search engine China)" => array(
    "robot" => "aibot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "21seek.com (China) robot (218.17.90.0xx)",
    "type" => "R"
  ),
  "aipbot/2-beta (aipbot dev; http://aipbot.com; aipbot@aipbot.com)" => array(
    "robot" => "aipbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nameprotect copyright search robot (24.177.134.0)",
    "type" => "R"
  ),
  "Aladin/3.324" => array(
    "robot" => "aladin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Aladin robot",
    "type" => "R"
  ),
  "Aleksika Spider/1.0 (+http://www.aleksika.com/)" => array(
    "robot" => "aleksika",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Aleksika Danmark - Search engine optimization spider",
    "type" => "R"
  ),
  "AlkalineBOT/1.3" => array(
    "robot" => "vestris",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vestris robot",
    "type" => "R"
  ),
  "AlkalineBOT/1.4 (1.4.0326.0 RTM)" => array(
    "robot" => "vestris",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vestris robot",
    "type" => "R"
  ),
  "Allesklar/0.1 libwww-perl/5.46" => array(
    "robot" => "allesklar",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Allesklar.de robot",
    "type" => "R"
  ),
  "Alligator 1.31 (www.nearsoftware.com)" => array(
    "robot" => "alligator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alligator download manager",
    "type" => "D"
  ),
  "AltaVista Intranet V2.0 AVS EVAL search@freeit.com" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "AltaVista Intranet V2.0 Compaq Altavista Eval sveand@altavista.net" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "AltaVista Intranet V2.0 evreka.com crawler@evreka.com" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "AltaVista V2.0B crawler@evreka.com" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "AmfibiBOT" => array(
    "robot" => "amfibi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amfibi Search robot",
    "type" => "R"
  ),
  "Amfibibot/0.06 (Amfibi Web Search; http://www.amfibi.com; agent@amfibi.com)" => array(
    "robot" => "amfibi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amfibi Search robot",
    "type" => "R"
  ),
  "Amfibibot/0.07 (Amfibi Robot; http://www.amfibi.com; agent@amfibi.com)" => array(
    "robot" => "amfibi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amfibi Search robot",
    "type" => "R"
  ),
  "amibot" => array(
    "robot" => "amidalla",
    "browser" => NULL,
    "os" => NULL,
    "description" => "amibot - Amidalla search engine robot (62.241.33.0x)",
    "type" => "R"
  ),
  "Amiga-AWeb/3.4.167SE" => array(
    "robot" => "other",
    "browser" => "aweb",
    "os" => "amiga",
    "description" => "AWeb Amiga browser",
    "type" => "B"
  ),
  "AmiTCP Miami (AmigaOS 2.04)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "amiga",
    "description" => "Amiga Miami TCP Stack",
    "type" => ""
  ),
  "amzn_assoc" => array(
    "robot" => "amazon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amazon.com robot for checking their affiliate sites",
    "type" => "C"
  ),
  "AnnoMille spider 0.1 alpha - http://www.annomille.it" => array(
    "robot" => "annomille",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Annomille Italian historical oriented robot",
    "type" => "R"
  ),
  "annotate_google; http://ponderer.org/download/annotate_google.user.js" => array(
    "robot" => "other",
    "browser" => "annotate_google",
    "os" => "other",
    "description" => "annotate Google - Firefox extension for annotating Google search results",
    "type" => "B"
  ),
  "Anonymized by ProxyOS: http://www.megaproxy.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Megaproxy user",
    "type" => "P"
  ),
  "Anonymizer/1.1" => array(
    "robot" => "other",
    "browser" => "other",
    "os" => "other",
    "description" => "faked user agent",
    "type" => ""
  ),
  "AnswerBus (http://www.answerbus.com/)" => array(
    "robot" => "answerbus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "AnswerBus natural language search using COLLATE technology",
    "type" => "R"
  ),
  "AnswerChase PROve 1.0" => array(
    "robot" => "answerchase",
    "browser" => NULL,
    "os" => NULL,
    "description" => "AnswerChase search tool",
    "type" => ""
  ),
  "AnswerChase 1.0" => array(
    "robot" => "answerchase",
    "browser" => NULL,
    "os" => NULL,
    "description" => "AnswerChase search tool",
    "type" => ""
  ),
  "ANTFresco/1.00" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "other",
    "description" => "ANT Fresco Browser",
    "type" => "B"
  ),
  "antibot-V1.1.5/i586-linux-2.2" => array(
    "robot" => "antibot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Antibot (discontinued) robot",
    "type" => "R"
  ),
  "AnzwersCrawl/2.0 (anzwerscrawl@anzwers.com.au;Engine)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Anzwers (Yahoo) Australia robot",
    "type" => "R"
  ),
  "A-Online Search" => array(
    "robot" => "aonline",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A-Online.at robot - now Jet2Web Search",
    "type" => "R"
  ),
  "Apexoo Spider 1.0" => array(
    "robot" => "apexoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Apexoo Search spider",
    "type" => "R"
  ),
  "Aplix HTTP/1.0.1" => array(
    "robot" => "other",
    "browser" => "aplix",
    "os" => "TODO",
    "description" => "JavaOS app. for SEGA Saturn Internet and Sanyo Internet-TV",
    "type" => "B"
  ),
  "Aplix_SANYO_browser/1.0 (Japanese)" => array(
    "robot" => "other",
    "browser" => "aplix",
    "os" => "TODO",
    "description" => "JavaOS app. for Sanyo Internet-TV",
    "type" => "B"
  ),
  "Aplix_SEGASATURN_browser/1.0 (Japanese)" => array(
    "robot" => "other",
    "browser" => "aplix",
    "os" => "TODO",
    "description" => "JavaOS app. for SEGA Saturn Internet",
    "type" => "B"
  ),
  "Aport" => array(
    "robot" => "aport",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Aport robot",
    "type" => "R"
  ),
  "appie 1.1 (www.walhello.com)" => array(
    "robot" => "appie",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Walhello Internet Search robot",
    "type" => "R"
  ),
  "Arachnoidea (arachnoidea@euroseek.com)" => array(
    "robot" => "euroseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Euroseek spider",
    "type" => "R"
  ),
  "aranhabot" => array(
    "robot" => "amazon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amazon.com robot for checking their affiliate sites",
    "type" => "C"
  ),
  "ArchitextSpider" => array(
    "robot" => "excite",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Excite spider",
    "type" => "R"
  ),
  "archive.org_bot" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix - The Internet Archive's open-source crawler (207.241.225.2xx)",
    "type" => "R"
  ),
  "Argus/1.1 (Nutch; http://www.simpy.com/bot.html; feedback at simpy dot com)" => array(
    "robot" => "simpy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Simpy Bookmarklet crawler (69.55.233.0x)",
    "type" => "C"
  ),
  "Arikus_Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Arikus inContext search engine software",
    "type" => "R"
  ),
  "Asahina-Antenna/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASAHINA Antenna information detecting agent",
    "type" => "R"
  ),
  "Asahina-Antenna/1.0 (libhina.pl/x.0 ; libtime.pl/x.0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASAHINA Antenna information detecting agent",
    "type" => "R"
  ),
  "ask.24x.info" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask 24x Info robot",
    "type" => "R"
  ),
  "AskAboutOil/0.06-rcp (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@askaboutoil.com)" => array(
    "robot" => "askaboutoil",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask About Oil - Petroleum related search (24.227.212.0xx) using Nutch",
    "type" => "R"
  ),
  "asked/Nutch-0.8 (web crawler; http://asked.jp; epicurus at gmail dot com)" => array(
    "robot" => "asked",
    "browser" => NULL,
    "os" => NULL,
    "description" => "askEd! / Inferret search (Japan) robot using Nutch",
    "type" => "R"
  ),
  "ASPSeek/1.2.5" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASPSeek search engine software -Yahoo-Inc. / Telecom Canada robot ",
    "type" => "R"
  ),
  "ASPseek/1.2.9d" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Swsoft.net robot using Aspseek",
    "type" => "R"
  ),
  "ASPSeek/1.2.0" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASPSeek search engine software",
    "type" => "R"
  ),
  "ASPSeek/1.2.0a" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASPSeek search engine software",
    "type" => "R"
  ),
  "ASPseek/1.2.0x" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASPSeek search engine software",
    "type" => "R"
  ),
  "ASPSeek/1.2.0xpre" => array(
    "robot" => "aspseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASPSeek search engine software",
    "type" => "R"
  ),
  "ASSORT/0.10" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Associative Sort robot",
    "type" => "R"
  ),
  "asterias/2.0" => array(
    "robot" => "singingfish",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Singingfish media spider (64.12.186.2xx) via AOL search",
    "type" => "R"
  ),
  "Atomz/1.0" => array(
    "robot" => "atomz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Atomz robot",
    "type" => "R"
  ),
  "atSpider/1.0" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "atSpider (ceased) email harvester / spambot",
    "type" => "S"
  ),
  "augurfind" => array(
    "robot" => "augurnfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Augurnet Swiss (was www.augurnet.ch) search robot",
    "type" => "R"
  ),
  "augurnfind V-1.0" => array(
    "robot" => "augurnfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Augurnet Swiss (was www.augurnet.ch) search robot",
    "type" => "R"
  ),
  "AU-MIC/2.0 MMP/2.0" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Samsung SPH-A660 phone with Sprint software",
    "type" => "B"
  ),
  "autoemailspider" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Auto Email Pro Email harvester",
    "type" => "S"
  ),
  "autohttp" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkscan tool from Elsop",
    "type" => "C"
  ),
  "AV Fetch 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot ??",
    "type" => "R"
  ),
  "AVSearch-1.0(peter.turney@nrc.ca)" => array(
    "robot" => "surfnet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "National Research Council Canada robot",
    "type" => "R"
  ),
  "AVSearch-2.0-fusionIdx-14-CompetitorWebSites" => array(
    "robot" => "surfnet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from 205.203.108.0x (telerate.com)",
    "type" => ""
  ),
  "AVSearch-3.0(AltaVista/AVC)" => array(
    "robot" => "surfnet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "AWeb" => array(
    "robot" => "other",
    "browser" => "aweb",
    "os" => "other",
    "description" => "AWeb Amiga browser",
    "type" => "B"
  ),
  "axadine/ (Axadine Crawler; http://www.axada.de/; )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Axada search Germany robot",
    "type" => "R"
  ),
  "AxmoRobot - Crawling your site for better indexing on www.axmo.com search engine." => array(
    "robot" => "axmo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Axmo search robot",
    "type" => "R"
  ),
  "Azureus 2.0.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Azureus Java BitTorrent Client",
    "type" => "D"
  ),
  "BaboomBot/1.0.0 (+http://www.baboom.us)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BaBoom Web Portal (ODP) robot (66.98.254.0x)",
    "type" => "R"
  ),
  "BackStreet Browser 3.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BackStreet Browser - Offline browser / website downloader",
    "type" => "D"
  ),
  "BaiDuSpider" => array(
    "robot" => "baidu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Baidu spidering engine - used by diff. IPs",
    "type" => "R"
  ),
  "Baiduspider+(+http://www.baidu.com/search/spider.htm)" => array(
    "robot" => "baidu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Baidu spidering engine - used by diff. IPs",
    "type" => "R"
  ),
  "BanBots/1.2 (spider@banbots.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Project BanBots Perl script robot",
    "type" => "C"
  ),
  "Barca/2.0.0000" => array(
    "robot" => "other",
    "browser" => "barca",
    "os" => "other",
    "description" => "Barca Pro email & PIM software",
    "type" => "B"
  ),
  "BarcaPro/1.4.0000" => array(
    "robot" => "other",
    "browser" => "barca",
    "os" => "other",
    "description" => "Barca Pro email & PIM software",
    "type" => "B"
  ),
  "BarraHomeCrawler (albertof@barrahome.org)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Barrahome (64.246.56.0x) crawler",
    "type" => ""
  ),
  "bCentral Billing Post-Process" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown user agent from Microsoft",
    "type" => ""
  ),
  "bdcindexer_2.6.2 (research@bdc)" => array(
    "robot" => "bdcindexer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Business.com robot (208.144.233.0xx)",
    "type" => "R"
  ),
  "BDFetch" => array(
    "robot" => "bdfetch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Brandimensions Brand Protection robot",
    "type" => "R"
  ),
  "BDNcentral Crawler v2.3 [en] (http://www.bdncentral.com/robot.html) (X11; I; Linux 2.0.44 i686)" => array(
    "robot" => "bdncentral",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bdncentral Sitesearch robot",
    "type" => "R"
  ),
  "BeamMachine/0.5 (dead link remover of www.beammachine.net)" => array(
    "robot" => "beammachine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "beammachine web directory (Germany) link checking",
    "type" => "R C"
  ),
  "beautybot/1.0 (+http://www.uchoose.de/crawler/beautybot/)" => array(
    "robot" => "cosmoty",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Beauty robot for Cosmoty - German beauty and wellness search",
    "type" => "R"
  ),
  "BebopBot/2.5.1 ( crawler http://www.apassion4jazz.net/bebopbot.html )" => array(
    "robot" => "apassion4jazz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A Passion for Jazz music related search robot",
    "type" => "R"
  ),
  "BeebwareDirectory/v0.01" => array(
    "robot" => "beebware",
    "browser" => NULL,
    "os" => NULL,
    "description" => "LinkcheckerBeebware (site is down) web directory link checking",
    "type" => "C"
  ),
  "Big Brother (http://pauillac.inria.fr/~fpottier/)" => array(
    "robot" => "bigbrother",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Big Brother link checking tool",
    "type" => "C"
  ),
  "Big Fish v1.0" => array(
    "robot" => "goongee",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoonGee.com link popularity checking",
    "type" => "C"
  ),
  "BigBrother/1.6e" => array(
    "robot" => "bigbrother",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BB4 network monitoring",
    "type" => ""
  ),
  "BigCliqueBOT/1.03-dev (bigclicbot; http://www.bigclique.com; bot@bigclique.com)" => array(
    "robot" => "bigclique",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BigClique Search robot",
    "type" => "R"
  ),
  "BIGLOTRON (Beta 2;GNU/Linux)" => array(
    "robot" => "biglotron",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Biglotron search (France) robot",
    "type" => "R"
  ),
  "Bilbo/2.3b-UNIX" => array(
    "robot" => "bilbo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bilbo - web frontend for the Nessus Security Scanner",
    "type" => ""
  ),
  "BilgiBetaBot/0.8-dev (bilgi.com (Beta) ; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)" => array(
    "robot" => "bilgi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bilgi.com (Beta) search robot - Turkey",
    "type" => "R"
  ),
  "billbot wjj@cs.cmu.edu" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Carnegie Mellon School robot/link checking ?",
    "type" => ""
  ),
  "Bitacle bot/1.1" => array(
    "robot" => "bitacle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bitacle Blog Search Archive robot",
    "type" => "R"
  ),
  "Bitacle Robot (V:1.0;) (http://www.bitacle.com)" => array(
    "robot" => "bitacle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bitacle Blog Search Archive robot",
    "type" => "R"
  ),
  "Biyubi/1.0 (Sistema Fenix; G11; Familia Toledo; es-mx)" => array(
    "robot" => "other",
    "browser" => "biyubi",
    "os" => "fenix",
    "description" => "Biyubi Navigator - Mexican browser for Fenix OS",
    "type" => "B"
  ),
  "BlackBerry7520/4.0.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/5.0.3.3 UP.Link/5.1.2.12 (Google WAP Proxy/1.0)" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => "Blackberry Wireless Internet browser via Google WAP Proxy",
    "type" => "B P"
  ),
  "BlackWidow" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BlackWidow web site scanner / downloading tool",
    "type" => "D"
  ),
  "BlackWidow" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FS Consulting (was www.fsconsult.net) Black Widow web crawler",
    "type" => "R"
  ),
  "Blaiz-Bee/1.0 (+http://www.blaiz.net)" => array(
    "robot" => "blaizbee",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blaiz Enterprises RawGrunt search",
    "type" => "R"
  ),
  "Blaiz-Bee/2.00.0000 (+http://www.blaiz.net)" => array(
    "robot" => "blaizbee",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blaiz Enterprises RawGrunt search",
    "type" => "R"
  ),
  "BlitzBOT@tricus.net" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blitzsuche Germany robot",
    "type" => "R"
  ),
  "BlitzBOT@tricus.net (Mozilla compatible)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blitzsuche Germany robot",
    "type" => "R"
  ),
  "BlogBot/1.0" => array(
    "robot" => "blogbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "blogdex robot from MIT.edu",
    "type" => "R"
  ),
  "BlogBridge 2.13 (http://www.blogbridge.com/)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "BlogBridge RSS reader",
    "type" => "B"
  ),
  "Bloglines Title Fetch/1.0 (http://www.bloglines.com)" => array(
    "robot" => "bloglines",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bloglines article search",
    "type" => "R"
  ),
  "BlogMap (http://www.feedmap.net)" => array(
    "robot" => "blogmap",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FeedMap / BlogMap geo coding service",
    "type" => "C"
  ),
  "Blogpulse (info@blogpulse.com)" => array(
    "robot" => "blogpulse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Intelliseek's BlogPulse blog search",
    "type" => "R"
  ),
  "BlogSearch/1.0 +http://www.icerocket.com/" => array(
    "robot" => "icerocket",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IceRocket Web search robot",
    "type" => "R"
  ),
  "BlogsNowBot, V 2.01 (+http://www.blogsnow.com/)" => array(
    "robot" => "blogsnow",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BlogsNow realtime link tracker robot",
    "type" => "R"
  ),
  "blogWatcher_Spider/0.1 (http://www.lr.pi.titech.ac.jp/blogWatcher/)" => array(
    "robot" => "blogwatcher",
    "browser" => NULL,
    "os" => NULL,
    "description" => "blogWatcher robot from Okumura Group Tokyo (131.112.182.0xx)",
    "type" => "R"
  ),
  "BlogzIce/1.0 (+http://icerocket.com; rhodes@icerocket.com)" => array(
    "robot" => "icerocket",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IceRocket Web search robot",
    "type" => "R"
  ),
  "BMCLIENT" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Part of ButtMan remote access tool",
    "type" => ""
  ),
  "BMLAUNCHER" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bookmark Express bookmark manager",
    "type" => "C"
  ),
  "Bobby/4.0.0 RPT-HTTPClient/0.3-3E" => array(
    "robot" => "bobby",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bobby web accessibility desktop testing tool",
    "type" => ""
  ),
  "boitho.com-dc/0.01 (http://www.boitho.com/dcbot.html)" => array(
    "robot" => "boitho",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Boitho search (Norway) robot via 80.202.212.0x / 80.80.111.0x",
    "type" => "R"
  ),
  "boitho.com-robot/1.0" => array(
    "robot" => "boitho",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Boitho search (Norway) robot via 80.202.212.0x / 80.80.111.0x",
    "type" => "R"
  ),
  "boitho.com-robot/1.0 (http://www.boitho.com/bot.html)" => array(
    "robot" => "boitho",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Boitho search (Norway) robot via 80.202.212.0x / 80.80.111.0x",
    "type" => "R"
  ),
  "Bookdog/3.0" => array(
    "robot" => "bookdog",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bookdog - Mac bookmark manager",
    "type" => "C"
  ),
  "Bookmark Buddy bookmark checker (http://www.bookmarkbuddy.net/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bookmark Buddy - favorite bookmark manager ",
    "type" => "C"
  ),
  "Bookmark Renewal Check Agent [http://www.bookmark.ne.jp/]" => array(
    "robot" => "book",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Favourites managing program",
    "type" => "C"
  ),
  "Bot mailto:craftbot@yahoo.com" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "cybercity.fr user robot / faked user agent ?",
    "type" => ""
  ),
  "BravoBrian bstop.bravobrian.it" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "BravoBrian bSTOP parental control",
    "type" => "P R"
  ),
  "BravoBrian SpiderEngine MarcoPolo" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Robot for BravoBrian bSTOP",
    "type" => "R"
  ),
  "BruinBot (+http://webarchive.cs.ucla.edu/bruinbot.html) " => array(
    "robot" => "bruinbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webarchive Project Bruinbot crawler",
    "type" => "R"
  ),
  "BSDSeek/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos NBCi) robot",
    "type" => "R"
  ),
  "BStop.BravoBrian.it Agent Detector" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "BravoBrian bSTOP parental control",
    "type" => "P R"
  ),
  "BTbot/0.0 (+http://www.btbot.com/btbot.html)" => array(
    "robot" => "btbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BitTorrent Search Engine btbot robot",
    "type" => "R"
  ),
  "Bulkfeeds/r1752 (http://bulkfeeds.net/)" => array(
    "robot" => "bulkfeeds",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bulkfeeds: RSS directory link checking",
    "type" => "C"
  ),
  "BullsEye" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BullsEye/Intelliseek robot",
    "type" => "R"
  ),
  "bumblebee@relevare.com" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Relevare Portal software robot",
    "type" => ""
  ),
  "BunnySlippers" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Microsoft server information robot (see link)",
    "type" => "C"
  ),
  "BurstFindCrawler/1.1 (crawler.burstfind.com; http://crawler.burstfind.com; crawler@burstfind.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BurstFind search crawler (64.34.172.0x)",
    "type" => "R"
  ),
  "CamelHttpStream/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Evolution integrated mail solution Camel TCP stream class",
    "type" => ""
  ),
  "Cancer Information and Support International;" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Some user agent",
    "type" => ""
  ),
  "carleson/1.0" => array(
    "robot" => "cosmix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cosmix project crawler (204.14.48.0 / 38.113.234.0xx)",
    "type" => "R"
  ),
  "Carnegie_Mellon_University_Research_WebBOT-->PLEASE READ-->http://www.andrew.cmu.edu/~brgordon/webbot/index.html http://www.andrew.cmu.edu/~brgordon/webbot/index.html" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Carnegie Mellon University WebBOT",
    "type" => "R"
  ),
  "Carnegie_Mellon_University_WebCrawler http://www.andrew.cmu.edu/~brgordon/webbot/index.html" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Carnegie Mellon University WebBOT",
    "type" => "R"
  ),
  "Catall Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Catall.de search & web directory (Germany)",
    "type" => "R"
  ),
  "ccubee/x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Empyreum Ccubee (Czech) search engine solution",
    "type" => "R"
  ),
  "CE-Preload" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cisco Content Engine",
    "type" => "P"
  ),
  "Ceramic Tile Installation Guide (http://www.floorstransformed.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Floortransformed.com robot (link ckecking ??)",
    "type" => "R"
  ),
  "CFNetwork/1.0" => array(
    "robot" => "cfnetwork",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "MaxOS X CoreFoundation CFNetwork API",
    "type" => ""
  ),
  "cg-eye interactive" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "cg-eye CGI checker",
    "type" => ""
  ),
  "Charon/1.0 (Amiga)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Charon Amiga download manager",
    "type" => "D"
  ),
  "Checkbot/1.0x LWP/5.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Checkbot link validation",
    "type" => "C"
  ),
  "CheckLinks/1.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Checklinks - Perl link checker",
    "type" => "C"
  ),
  "CheckUrl" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "NTL user agent",
    "type" => ""
  ),
  "CheckWeb" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CheckWeb link validation",
    "type" => "C"
  ),
  "Chilkat/1.0.0 (+http://www.chilkatsoft.com/ChilkatHttpUA.asp)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Chilkat HTTP component user-agent",
    "type" => ""
  ),
  "China Local Browse 2.6" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown spam bot from telekom.com.my (218.111.83.0xx)",
    "type" => "S"
  ),
  "ChristCRAWLER 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Christcentral.com Christcrawler (was www.christcrawler.com)",
    "type" => "R"
  ),
  "CipinetBot (http://www.cipinet.com/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CipinetBot -Cipinet Search Engine Web Crawler",
    "type" => "R"
  ),
  "CJ Spider/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Commision Junction link checking spider",
    "type" => "C"
  ),
  "CJB.NET Proxy" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CJB Net anonymous socks proxy service (216.194.70.0)",
    "type" => "P"
  ),
  "ClariaBot/1.0" => array(
    "robot" => "claria",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Claria (ex Gator) SearchScout robot (64.152.73.0x)",
    "type" => "R"
  ),
  "Claymont.com" => array(
    "robot" => "claymont",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Claymont Search robot",
    "type" => "R"
  ),
  "Clushbot/2.0 (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush clustered search robot",
    "type" => "R"
  ),
  "Clushbot/3.0-BinaryFury (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush clustered search robot",
    "type" => "R"
  ),
  "Clushbot/3.0x-Ajax (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush clustered search robot",
    "type" => "R"
  ),
  "Clushbot/3.0x-Hector (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush clustered search robot",
    "type" => "R"
  ),
  "Clushbot/3.0x-Peleus (+http://www.clush.com/bot.html)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush clustered search robot",
    "type" => "R"
  ),
  "COAST WebMaster Pro/4.0.0.00 (Windows NT)" => array(
    "robot" => "other",
    "browser" => "coast",
    "os" => "windowsnt",
    "description" => "COAST Webmaster - Web management and maintenance software",
    "type" => ""
  ),
  "CoBITSProbe" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Proposed Content-Based Image Tracking System (CoBITS) P2P crawler",
    "type" => "R C"
  ),
  "Cocoal.icio.us/1.0 (v36) (Mac OS X; http://www.scifihifi.com/cocoalicious)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cocoa del.icio.us (social bookmarks manager) client for Mac OS X",
    "type" => "C"
  ),
  "ColdFusion" => array(
    "robot" => "coldfusion",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cold Fusion server used by various IPs i.e.: - NetWORLD web catalogue link checking",
    "type" => "P C"
  ),
  "ColdFusion (BookmarkTracker.com)" => array(
    "robot" => "coldfusion",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cold Fusion server used by Bookmark Tracker - online favourites managment",
    "type" => "C"
  ),
  "collage.cgi/1.82" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "WebCollage Syndicator graphics crawler/collector",
    "type" => "R D"
  ),
  "combine/1.0" => array(
    "robot" => "combine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Combine harvesting & indexing robot",
    "type" => "R"
  ),
  "Combine/2.0 http://combine.it.lth.se/" => array(
    "robot" => "combine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Combine harvesting & indexing robot",
    "type" => "R"
  ),
  "Combine/3.0" => array(
    "robot" => "combine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Combine harvesting & indexing robot",
    "type" => "R"
  ),
  "cometrics-bot, http://www.cometrics.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "cometrics Web Content Mining solution - Germany",
    "type" => "R"
  ),
  "Commerce Browser Center" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Wildsoft Germany (closed) Internet client system user-agent (was www.oskarweb.de)",
    "type" => "B"
  ),
  "Computer_and_Automation_Research_Institute_Crawler crawler@ilab.sztaki.hu" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hungarian Academy of Sciences data mining search",
    "type" => "R"
  ),
  "Comrite/0.7.1 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)" => array(
    "robot" => "comrite",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ComRite Chinese Search Engine for Oversea Web Sites (69.248.26.0x)",
    "type" => "R"
  ),
  "Contact" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown",
    "type" => ""
  ),
  "ContentSmartz" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ContentSmartz e-mail harvesting tools",
    "type" => "S"
  ),
  "contype" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Internet Explorer versions 4.0 and 5 plugin content",
    "type" => "B"
  ),
  "Convera Internet Spider V6.0" => array(
    "robot" => "convera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Converas RetrievalWare Internet Spider (63.241.61.0)",
    "type" => "R"
  ),
  "ConveraCrawler/0.2" => array(
    "robot" => "convera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Converas RetrievalWare Internet Spider (63.241.61.0)",
    "type" => "R"
  ),
  "ConveraCrawler/0.9d (+http://www.authoritativeweb.com/crawl)" => array(
    "robot" => "convera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Converas RetrievalWare Internet Spider (63.241.61.0)",
    "type" => "R"
  ),
  "CoolBot" => array(
    "robot" => "coolbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Suchmaschine21 (Germany) robot",
    "type" => "R"
  ),
  "CoralWebPrx/0.1.17 (See http://coralcdn.org/)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Coral Content Distribution Network",
    "type" => "P C"
  ),
  "cosmos/0.8_(robot@xyleme.com)" => array(
    "robot" => "cosmos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xyleme SA France robot",
    "type" => "R"
  ),
  "cosmos/0.9_(robot@xyleme.com)" => array(
    "robot" => "cosmos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xyleme SA France robot",
    "type" => "R"
  ),
  "CougarSearch/0.0 (+http://www.cougarsearch.com/faq.shtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cougarsearch.com robot",
    "type" => "R"
  ),
  "Cowbot-0.1 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot",
    "type" => "R"
  ),
  "Cowbot-0.1.0 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot",
    "type" => "R"
  ),
  "CrawlConvera0.1 (CrawlConvera@yahoo.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Converas RetrievalWare Internet Spider",
    "type" => "R"
  ),
  "Crawler" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown.Level3.net robot",
    "type" => ""
  ),
  "Crawler (cometsearch@cometsystems.com)" => array(
    "robot" => "comet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cometsystems Comet Search robot via Findwhat (now Miva)",
    "type" => "R"
  ),
  "Crawler admin@crawler.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Crawler.de / Abacho robot",
    "type" => "R"
  ),
  "Crawler V 0.2.0 admin@crawler.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Crawler.de / Abacho robot",
    "type" => "R"
  ),
  "crawler@alexa.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alexa crawler",
    "type" => "R"
  ),
  "CrawlerBoy Pinpoint.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pinpoint WAP search robot",
    "type" => "R"
  ),
  "Crawllybot/0.1 (Crawllybot; +http://www.crawlly.com; crawler@crawlly.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Crawlly Beta search - Germany (72.232.194.2xx)",
    "type" => "R"
  ),
  "CreativeCommons/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)" => array(
    "robot" => "creativecommons",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Creatice Commons using Nutch open source robot",
    "type" => "R"
  ),
  "CrocCrawler vx.3 [en] (http://www.croccrawler.com) (X11; I; Linux 2.0.44 i686)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Croccrawler robot",
    "type" => "R"
  ),
  "csci_b659/0.13" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web mining project from CSCI 659 (computer science course) at Indiana Univerity",
    "type" => "R"
  ),
  "CSE HTML Validator Professional (http://www.htmlvalidator.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CSE HTML Validator for Windows",
    "type" => "C"
  ),
  "Cuam Ver0.050bx" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Cuam - IE based browser",
    "type" => "B"
  ),
  "Cuasarbot/0.9b http://www.cuasar.com/spider_beta/ " => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cuasar (Spain) music / ringtone search spider",
    "type" => "R"
  ),
  "curl/7.10.0 (i386-redhat-linux-gnu) libcurl/7.10.0 OpenSSL/0.9.7a ipv6 zlib/1.1.4" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Curl file transferring tool",
    "type" => "D"
  ),
  "curl/7.7.0 (i386--freebsd4.3) libcurl 7.7.0 (SSL 0.9.6) (ipv6 enabled)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Curl file transferring tool",
    "type" => "D"
  ),
  "curl/7.8 (i686-pc-linux-gnu) libcurl 7.8 (OpenSSL 0.9.6)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Curl file transferring tool",
    "type" => "D"
  ),
  "curl/7.9.0 (win32) libcurl 7.9.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Curl file transferring tool",
    "type" => "D"
  ),
  "CurryGuide SiteScan 1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CurryGuide UK link check robot",
    "type" => "R"
  ),
  "Custo 1.0 (www.netwu.com)" => array(
    "robot" => "custo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Custo web site spidering tool (link checking)",
    "type" => "C"
  ),
  "Custom Spider www.bisnisseek.com /1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Bisnisseek (was www.bisnisseek.com) robot",
    "type" => "R"
  ),
  "Cyberdog/2.0 (Macintosh; 68k)" => array(
    "robot" => "other",
    "browser" => "cyberdog",
    "os" => "mac",
    "description" => "Cyberdog Mac Browser (was www.cyberdog.org)",
    "type" => "B"
  ),
  "CyberSpyder Link Test/2.1.12 (admin@mspennyworth.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CyberSpyder Link Test software",
    "type" => "C"
  ),
  "CydralSpider/1.0 (Cydral Web Image Search; http://www.cydral.com)" => array(
    "robot" => "cydral",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cydral image & site search spider",
    "type" => "R"
  ),
  "DA 3.5 (www.lidan.com)" => array(
    "robot" => "da",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Downloadaccelerator download manager",
    "type" => "D"
  ),
  "DA 4.0" => array(
    "robot" => "da",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Downloadaccelerator download manager",
    "type" => "D"
  ),
  "DA 4.0 (www.downloadaccelerator.com)" => array(
    "robot" => "da",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Downloadaccelerator download manager",
    "type" => "D"
  ),
  "DA 5.0" => array(
    "robot" => "da",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Downloadaccelerator download manager",
    "type" => "D"
  ),
  "Dart Communications PowerTCP" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "PowerTCP ActiveX control tool",
    "type" => ""
  ),
  "DataparkSearch/4.0x (http://www.dataparksearch.org/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DataparkSearch open source search engine",
    "type" => "R"
  ),
  "DataSpear/1.0 (Spider; http://www.dataspear.com/spider.html; spider@dataspear.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DataSpear Directory robot (24.109.29.0x)",
    "type" => "R"
  ),
  "DataSpearSpiderBot/0.2 (DataSpear Spider Bot; http://dssb.dataspear.com/bot.html; dssb@dataspear.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DataSpear Directory robot (24.109.29.0x)",
    "type" => "R"
  ),
  "DatenBot( http://www.sicher-durchs-netz.de/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sicher-durchs-Netz German security related search (62.75.220.0xx)",
    "type" => "R"
  ),
  "DaviesBot/1.7 (www.wholeweb.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wholeweb robot",
    "type" => "R"
  ),
  "daypopbot/0.0" => array(
    "robot" => "daypop",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Daypop blog - weblog - online mag search spider",
    "type" => "R"
  ),
  "dbDig(http://www.prairielandconsulting.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "dbDig search engine",
    "type" => "R"
  ),
  "DBrowse 1.4b" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - wanweb.net (208.6.163.0xx) - cox.net (68.4.0xx.0xx)",
    "type" => "S"
  ),
  "DBrowse 1.4d" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - pacbell.net (67.112.0xx.0xx)",
    "type" => "S"
  ),
  "DC-Sakura/x.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DC-Sakura download manager",
    "type" => "D"
  ),
  "dCSbot/1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unknown divine/Openmarket.com robot",
    "type" => "R"
  ),
  "DDD" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some (website) downloading tool",
    "type" => "D"
  ),
  "dds explorer v1.0 beta" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "user agent",
    "type" => ""
  ),
  "de.searchengine.comBot 1.2 (http://de.searchengine.com/spider)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchengine.com (Germany) submission checking / robot (84.73.57.0x)",
    "type" => "R"
  ),
  "DeadLinkCheck/0.4.0 libwww-perl/5.0x" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DLC Perl HTTP link checking",
    "type" => "C"
  ),
  "Deep Link Calculator v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sootle Web Directory deep link checker",
    "type" => "C"
  ),
  "deepak-USC/ISI" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "deepak-USC/ISI robot from USC/Information Science Institute",
    "type" => "R"
  ),
  "DeepIndex" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Deepindex robot",
    "type" => "R"
  ),
  "DeepIndex ( http://www.zetbot.com )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zetbot search Belgium (213.41.128.0x) using Deepindex robot",
    "type" => "R"
  ),
  "DeepIndex (www.en.deepindex.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Deepindex robot",
    "type" => "R"
  ),
  "DeepIndexer.ca" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Deepindex robot (via Paragon.net Canada)",
    "type" => "R"
  ),
  "del.icio.us-thumbnails/1.0 Mozilla/5.0 (compatible; Konqueror/3.4; FreeBSD) KHTML/3.4.2 (like Gecko)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "del.icio.us picture robot for thumbnail preview via Yahoo",
    "type" => "D"
  ),
  "DeleGate/9.0.5-fix1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DeleGate application level gateway / proxy server",
    "type" => "P"
  ),
  "Demo Bot DOT 16b" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from 217.34.59.0xx (btopenworld.com)",
    "type" => "S"
  ),
  "Demo Bot Z 16b" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from 68.154.96.0x (bellsouth.net)",
    "type" => "S"
  ),
  "Denmex websearch (http://search.denmex.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Denmex Websearch robot/link checking",
    "type" => "R"
  ),
  "Der gro� BilderSauger 2.00u" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DataBecker Bilder Sauger (discontinued) web graphics downloader",
    "type" => "D"
  ),
  "DevComponents.com HtmlDocument Object" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "DevComponents HTMLDocument Class Library for Visual Studio.net",
    "type" => ""
  ),
  "dev-spider2.searchpsider.com/1.3b" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchspider.com robot (72.245.225.0xx)",
    "type" => "R"
  ),
  "DiaGem/1.1 (http://www.skyrocket.gr.jp/diagem.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DiaGem Japan web crawler",
    "type" => "R"
  ),
  "Diamond/x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Claria (ex Gator) SearchScout robot (64.152.73.0x)",
    "type" => "R"
  ),
  "DiamondBot" => array(
    "robot" => "claria",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Claria (ex Gator) SearchScout robot (64.152.73.0x)",
    "type" => "R"
  ),
  "-DIE-KRAEHE- META-SEARCH-ENGINE/1.1 http://www.die-kraehe.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Die Kraehe Meta-Search-Engine (Germany) link checking",
    "type" => "R"
  ),
  "Digger/1.0 JDK/1.3.0rc3" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Diggit! robot",
    "type" => "R"
  ),
  "DigOut4U" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OpenPortal4U robot",
    "type" => "R"
  ),
  "DIIbot/1.2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Findsame.com (site is offline) / Digital-Integrity robot",
    "type" => "R"
  ),
  "Dillo/0.0.0" => array(
    "robot" => "other",
    "browser" => "dillo",
    "os" => "other",
    "description" => "Dillo Web Browser",
    "type" => "B"
  ),
  "DISCo Pump 1.0" => array(
    "robot" => "discopump",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DISCo Pump offline browser / website ripper",
    "type" => "D"
  ),
  "DittoSpyder" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ditto picture search robot",
    "type" => "R"
  ),
  "dlman" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some download agent",
    "type" => "D"
  ),
  "dloader(NaverRobot)/1.0" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot",
    "type" => "R"
  ),
  "DoCoMo/1.0/Nxxxi/c10" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NTT DoCoMo (Japan) robot",
    "type" => "R"
  ),
  "DoCoMo/1.0/Nxxxi/c10/TB" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NTT DoCoMo (Japan) robot",
    "type" => "R"
  ),
  "DoCoMo/2.0 P900iV(c100;TB;W24H11) " => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NTT DoCoMo (Japan) robot",
    "type" => "R"
  ),
  "DoCoMo/2.0 SH901iS(c100;TB;W24H12),gzip(gfe) (via translate.google.com)" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NTT DoCoMo (Japan) proxy server (210.136.161.1xx)",
    "type" => "P"
  ),
  "DoCoMo/2.0/SO502i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Japan robot (203.216.197.0xx)",
    "type" => "R"
  ),
  "DonutP; Windows98SE" => array(
    "robot" => "other",
    "browser" => "donutp",
    "os" => "windows98",
    "description" => "Donut P - Japanese IE based browser",
    "type" => "B"
  ),
  "Download Demon/3.0.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Demon/Netzip download manager",
    "type" => "D"
  ),
  "Download Druid 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Druid IE plugin download manager",
    "type" => "D"
  ),
  "Download Express 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Express download manager",
    "type" => "D"
  ),
  "Download Master" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Master download manager",
    "type" => "D"
  ),
  "Download Ninja 3.0" => array(
    "robot" => "downloadninja",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Ninja download manager (Japan)",
    "type" => "D"
  ),
  "Download Wonder" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Wonder download manager",
    "type" => "D"
  ),
  "Download.exe(1.1) (+http://www.sql-und-xml.de/freeware-tools/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "download.exe .NET based downloading tool",
    "type" => "D"
  ),
  "Download-Tipp Linkcheck (http://download-tipp.de/)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download-Tipp Germany link checking",
    "type" => "R"
  ),
  "Dr.Web (R) online scanner: http://online.drweb.com/" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Dr.WEB online virus scanner",
    "type" => ""
  ),
  "Dragonfly File Reader" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Dragonfly CMS - Open Source content management system",
    "type" => "B"
  ),
  "Drecombot/1.0 (http://career.drecom.jp/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Drecom Japan (210.233.67.0xx) - Blog search ??",
    "type" => "R"
  ),
  "Drupal (+http://drupal.org/)" => array(
    "robot" => "drupal",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Drupal - open source content management platform",
    "type" => "C"
  ),
  "DSurf15a 01" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - cox.net (68.5.0xx.0xx) - pacbell.net (64.16x.0xx.0xx)",
    "type" => "S"
  ),
  "DSurf15a 71" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - cox.net (68.4.0xx.0xx)",
    "type" => "S"
  ),
  "DSurf15a 81" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - verizon.net (4.47.0xx.0xx)",
    "type" => "S"
  ),
  "DSurf15a VA" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - eastlink.ca (24.222.0xx.0xx) - cogeco.net (216.221.8x.0xx)",
    "type" => "S"
  ),
  "DTAAgent" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "DTAAgent Java object for data collecting",
    "type" => "R D"
  ),
  "dtSearchSpider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "dt Search Spider software",
    "type" => "R"
  ),
  "Dual Proxy" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fourelle Venturi proxy server",
    "type" => "P"
  ),
  "Dumbot(version 0.1 beta - dumbfind.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DumbFind.com robot",
    "type" => "R"
  ),
  "Dumbot(version 0.1 beta - http://www.dumbfind.com/dumbot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DumbFind.com robot",
    "type" => "R"
  ),
  "Dumbot(version 0.1 beta)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DumbFind.com robot",
    "type" => "R"
  ),
  "EARTHCOM.info/1.0 [www.earthcom.info]" => array(
    "robot" => "earthcom",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Earthcom (Czech Republic) search robot (194.108.39.0x)",
    "type" => "R"
  ),
  "EARTHCOM.info/1.0beta [www.earthcom.info]" => array(
    "robot" => "earthcom",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Earthcom (Czech Republic) search robot (194.108.39.0x)",
    "type" => "R"
  ),
  "EasyDL/3.0x" => array(
    "robot" => "keywen",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Keywen Encyclopedia Bot",
    "type" => "R"
  ),
  "EasyDL/3.0x http://keywen.com/Encyclopedia/Bot" => array(
    "robot" => "keywen",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Keywen Encyclopedia Bot",
    "type" => "R"
  ),
  "EBrowse 1.4b" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - swbell.net (65.66.0xx.0xx)",
    "type" => "S"
  ),
  "eCatch/3.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "eCatch (now Wysigot) offline browser",
    "type" => "B D"
  ),
  "EchO!/2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Echo.fr robot",
    "type" => "R"
  ),
  "Educate Search VxB" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - cox.net (68.4.0xx.0xx)",
    "type" => "S"
  ),
  "egothor/3.0a (+http://www.0define.org/robot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xdefine text search engine robot - based on Egothor open source crawler",
    "type" => "R"
  ),
  "EgotoBot/4.8 (+http://www.egoto.com/about.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Egoto Search robot",
    "type" => "R"
  ),
  "ejupiter.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "eJupiter searcg robot (206.191.49.0x)",
    "type" => "R"
  ),
  "EldoS TimelyWeb/3.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TimelyWeb web page monitoring tool",
    "type" => "C"
  ),
  "elfbot/1.0 (+http://www.uchoose.de/crawler/elfbot/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Elftales crawler for uChoose theme based search (Germany)",
    "type" => "R"
  ),
  "ELinks (0.0.0; Linux 2.4.20 i586; 132x60)" => array(
    "robot" => "other",
    "browser" => "elinks",
    "os" => "linux",
    "description" => "ELinks text mode browser",
    "type" => "B"
  ),
  "ELinks/0.0.0 (textmode; NetBSD 1.6.2 sparc; 132x43)" => array(
    "robot" => "other",
    "browser" => "elinks",
    "os" => "netbsd",
    "description" => "ELinks text mode browser",
    "type" => "B"
  ),
  "EmailSiphon" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sonic E-mail collector",
    "type" => "S"
  ),
  "EmailWolf 1.00" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Trellian EMailWolf E-mail collector",
    "type" => "S"
  ),
  "EmeraldShield.com WebBot" => array(
    "robot" => "emeraldshield",
    "browser" => NULL,
    "os" => NULL,
    "description" => "EmeraldShield spam and web filtration services",
    "type" => "P R"
  ),
  "EMPAS_ROBOT" => array(
    "robot" => "empas",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Empas search Korea robot (220.95.22x.0xx)",
    "type" => "R"
  ),
  "endo/1.0 (Mac OS X; ppc i386; http://kula.jp/endo)" => array(
    "robot" => "other",
    "browser" => "endo",
    "os" => "macosx",
    "description" => "endo - Mac news site and blog aggregator",
    "type" => "B"
  ),
  "Enfish Tracker" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enfish Personal search tool",
    "type" => "R"
  ),
  "Enterprise_Search/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search engine software (64.202.165.0xx)",
    "type" => "R"
  ),
  "Enterprise_Search/1.0.0xx" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search engine software (64.202.165.0xx)",
    "type" => "R"
  ),
  "Enterprise_Search/1.00.0xx;MSSQL (http://www.innerprise.net/es-spider.asp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search engine software (64.202.165.0xx)",
    "type" => "R"
  ),
  "envolk/1.7 (+http://www.envolk.com/envolkspiderinfo.php)" => array(
    "robot" => "envolk",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Envolk Web Search robot",
    "type" => "R"
  ),
  "envolk[ITS]spider/1.6(+http://www.envolk.com/envolkspider.html)" => array(
    "robot" => "envolk",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Envolk Web Search robot",
    "type" => "R"
  ),
  "EroCrawler" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "EroCrawler adult search robot",
    "type" => "R"
  ),
  "ES.NET_Crawler/2.0 (http://search.innerprise.net/)" => array(
    "robot" => "innerprise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search engine software (64.202.165.0xx)",
    "type" => "R"
  ),
  "eseek-larbin_2.6.2 (crawler@exactseek.com)" => array(
    "robot" => "exactseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ExactSEEK (Jayde Online) robot",
    "type" => "R"
  ),
  "e-sense 1.0 ea(www.vigiltech.com/esensedisclaim.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vigiltech e-Sense user research robot (website is offline)",
    "type" => "R"
  ),
  "ESISmartSpider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ESI Smart-Spider toolkit",
    "type" => "R"
  ),
  "e-SocietyRobot(http://www.yama.info.waseda.ac.jp/~yamana/es/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "e-Society Project (Japan) crawler (133.9.238.0x)",
    "type" => "R"
  ),
  "eStyleSearch 4 (compatible; MSIE 6.0; Windows NT 5.0)" => array(
    "robot" => "estyle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "e-Style ISP search (Russia) robot (217.174.103.0xx)",
    "type" => "R"
  ),
  "ESurf15a 15" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs",
    "type" => "S"
  ),
  "EuripBot/0.0 (+http://www.eurip.com) GetFile" => array(
    "robot" => "eurip",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eurip.com - European Internet Portal robot",
    "type" => "R"
  ),
  "EuripBot/0.0 (+http://www.eurip.com) GetRobots" => array(
    "robot" => "eurip",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eurip.com - European Internet Portal robot",
    "type" => "R"
  ),
  "EuripBot/0.0 (+http://www.eurip.com) PreCheck" => array(
    "robot" => "eurip",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eurip.com - European Internet Portal robot",
    "type" => "R"
  ),
  "EvaalSE - bot@evaal.com" => array(
    "robot" => "evaal",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Evaal Search Engine robot",
    "type" => "R"
  ),
  "eventax/1.3 (eventax; http://www.eventax.de/; info@eventax.de)" => array(
    "robot" => "eventax",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eventax event search (Germany)",
    "type" => "R"
  ),
  "Everest-Vulcan Inc./0.1 (R&D project; host=e-1-24; http://everest.vulcan.com/crawlerhelp)" => array(
    "robot" => "everest",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vulcan Inc. Everest crawler (in development)",
    "type" => "R"
  ),
  "Everest-Vulcan Inc./0.1 (R&D project; http://everest.vulcan.com/crawlerhelp)" => array(
    "robot" => "everest",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vulcan Inc. Everest crawler (in development)",
    "type" => "R"
  ),
  "Exabot/2.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead (France) search robot (193.47.80.0x)",
    "type" => "R"
  ),
  "Exabot-Images/1.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead Websearch image crawler (193.47.80.0x)",
    "type" => "R"
  ),
  "ExactSearch" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "eXact Search Bar for IE",
    "type" => "B"
  ),
  "ExactSeek Crawler/0.1" => array(
    "robot" => "exactseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ExactSEEK (Jayde Online) robot",
    "type" => "R"
  ),
  "exactseek.com" => array(
    "robot" => "exactseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ExactSEEK (Jayde Online) robot (69.9.181.1xx)",
    "type" => "R"
  ),
  "exactseek-crawler-2.63 (crawler@exactseek.com)" => array(
    "robot" => "exactseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ExactSEEK (Jayde Online) robot",
    "type" => "R"
  ),
  "exactseek-pagereaper-2.63 (crawler@exactseek.com)" => array(
    "robot" => "exactseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ExactSEEK (Jayde Online) robot",
    "type" => "R"
  ),
  "Exalead NG/MimeLive Client (convert/http/0.120)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead (France) search robot (193.47.80.0x)",
    "type" => "R"
  ),
  "Excalibur Internet Spider V6.5.4" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Excalibur (now Convera) spider software",
    "type" => "R"
  ),
  "ExperimentalHenrytheMiragoRobot" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago UK Robot",
    "type" => "R"
  ),
  "Expired Domain Sleuth" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Expired Domain Sleuth domain name tool",
    "type" => "R C"
  ),
  "Express WebPictures (www.express-soft.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Express Web Pictures image browser",
    "type" => "B D"
  ),
  "ExtractorPro" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Extractor Pro e-mail collector",
    "type" => "S"
  ),
  "Extreme Picture Finder" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exisoftware image grabber and downloading tool",
    "type" => "D"
  ),
  "EyeCatcher (Download-tipp.de)/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download-Tipp Germany robot",
    "type" => "R"
  ),
  "factbot : http://www.factbites.com/robots" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Factbites search robot",
    "type" => "R"
  ),
  "Factbot 1.09 (see http://www.factbites.com/webmasters.php)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Factbites search robot",
    "type" => "R"
  ),
  "FaEdit/2.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FaEdit Professional - Japanese bookmark manager",
    "type" => "C"
  ),
  "FairAd Client" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FairAd user",
    "type" => "P"
  ),
  "FANGCrawl/0.01" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Safe-t.net web filtering service",
    "type" => "P"
  ),
  "FARK.com link verifier" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Drew Curtis' FARK.com link checking",
    "type" => "C"
  ),
  "Fast Crawler Gold Edition" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 (Experimental)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 / Scirus scirus-crawler@fast.no; http://www.scirus.com/srsapp/contactus/" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast Enterprise Crawler (66.151.181.0x) for Scirus scienctific information search",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 used by Cobra Development (admin@fastsearch.com)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 used by FAST (FAST)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 used by Pages Jaunes (pvincent@pagesjaunes.fr)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pages Jaunes business search (France) robot using Fast Enterprise Crawler",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 used by Sensis.com.au Web Crawler (search_comments\at\sensis\dot\com\dot\au)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler for Sensis.com.au Australian search (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler 6 used by WWU (wardi@uni-muenster.de)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FAST Enterprise Crawler  used by WWU (University of Muenster - Germany)",
    "type" => "C"
  ),
  "FAST Enterprise Crawler/6 (www.fastsearch.com)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST Enterprise Crawler/6.4 (helpdesk at fast.no)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST FirstPage retriever (compatible; MSIE 5.5; Mozilla/4.0)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FAST MetaWeb Crawler (helpdesk at fastsearch dot com)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "Fast PartnerSite Crawler" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "fastbot crawler beta 2.0 (+http://www.fastbot.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fastbot search Germany crawler (80.252.104.1xx)",
    "type" => "R"
  ),
  "FastBug http://www.ay-up.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ay-Up geo sync search robot",
    "type" => "R"
  ),
  "FastCrawler 3.0.1 (crawler@1klik.dk)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler (66.151.181.0x)",
    "type" => "R"
  ),
  "FastSearch Web Crawler for Verizon SuperPages (kevin.watters@fastsearch.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler used by SuperPages.com",
    "type" => "R"
  ),
  "FAST-WebCrawler/2.2.10 (Multimedia Search) (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb multimedia crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/2.2.6 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/2.2.7 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)http://www.fast.no" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/2.2.8 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)http://www.fast.no" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.2 test" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.3 (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.4/Nirvana (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.4/PartnerSite (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.5 (atw-crawler at fast dot no; http://fast.no/support.php?c=faqs/crawler)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.6 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.6/FirstPage (crawler@fast.no; http://fast.no/support.php?c=faqs/crawler)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.7 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.7/FirstPage (atw-crawler at fast dot no;http://fast.no/support/crawler.asp)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.8 (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.8/Fresh (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.0 Multimedia" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb multimedia crawler",
    "type" => "R"
  ),
  "FAST-WebCrawler/3.0 Multimedia (mm dash crawler at fast dot no)" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb multimedia crawler",
    "type" => "R"
  ),
  "FavIconizer" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FavIconizer - IE favorites icons refreshing tool",
    "type" => "D"
  ),
  "favo.eu crawler/0.6 (http://www.favo.eu)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "favo.eu (Germany) search robot",
    "type" => "R"
  ),
  "FavOrg" => array(
    "robot" => "favorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ZD's FavOrg favourites managing program",
    "type" => "C"
  ),
  "Favorites Sweeper v.2.03" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Favorites Sweeper bookmark checker",
    "type" => "C"
  ),
  "Faxobot/1.0" => array(
    "robot" => "faxo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FaXo Search robot (69.152.89.0x)",
    "type" => "R"
  ),
  "FDM 1.0" => array(
    "robot" => "fdm",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Free Download Manager (FDM) download accelerator ",
    "type" => "D"
  ),
  "Feed Seeker Bot (RSS Feed Seeker http://www.MyNewFavoriteThing.com/fsb.php)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RSS Feed Seeker bot (68.225.95.2xx)",
    "type" => "R"
  ),
  "Feed::Find/0.0x" => array(
    "robot" => "feedfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Feed::Find - Syndication feed (RSS/Atom) auto-discovery",
    "type" => "D"
  ),
  "FeedChecker/0.01" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from the University of Tokyo (157.82.157.0x)",
    "type" => "R"
  ),
  "Feedshow/1.0 (http://www.feedshow.com; 1 subscriber)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "FeedShow online RSS feed reader",
    "type" => "B"
  ),
  "FeedshowOnline (http://www.feedshow.com)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "FeedShow online RSS feed reader",
    "type" => "B"
  ),
  "Feedster Crawler/3.0; Feedster, Inc." => array(
    "robot" => "feedster",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Feedster RSS feed search",
    "type" => "R"
  ),
  "Felix - Mixcat Crawler (+http://mixcat.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MixCat robot",
    "type" => "R"
  ),
  "fetch libfetch/2.0" => array(
    "robot" => "libfetch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FreeBSD download tool",
    "type" => "D"
  ),
  "FFC Trap Door Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Frequent Finders spider via Sitefusion.com",
    "type" => "R"
  ),
  "Filangy/0.01-beta (Filangy; http://www.nutch.org/docs/en/bot.html; filangy-agent@filangy.com)" => array(
    "robot" => "filangy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Filangy search and bookmark service",
    "type" => "R C"
  ),
  "Filangy/1.01 (Filangy; http://www.filangy.com/filangyinfo.jsp?inc=robots.jsp; filangy-agent@filangy.com)" => array(
    "robot" => "filangy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Filangy search and bookmark service",
    "type" => "R C"
  ),
  "Filangy/1.02 (Filangy; http://www.nutch.org/docs/en/bot.html; filangy-agent@filangy.com)" => array(
    "robot" => "filangy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Filangy search and bookmark service",
    "type" => "R C"
  ),
  "fileboost.net/1.0 (+http://www.fileboost.net)" => array(
    "robot" => "linkcheck",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "File Boost Network link checking",
    "type" => "R C"
  ),
  "FileHound 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FileHound download manager",
    "type" => "D"
  ),
  "Findexa Crawler (http://www.findexa.no/gulesider/article26548.ece)" => array(
    "robot" => "findexa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yelo.no business search (Norway) via Findexa",
    "type" => "R"
  ),
  "findlinks/x.0xx (+http://wortschatz.uni-leipzig.de/findlinks/) " => array(
    "robot" => "findlinks",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NextLinks - German vocabulary and hyperlink search",
    "type" => "R"
  ),
  "FineBot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Finesearch robot",
    "type" => "R"
  ),
  "Finjan-prefetch" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Finjan Vital Security Web Appliance security solution",
    "type" => "P"
  ),
  "Firefly/1.0" => array(
    "robot" => "firefly",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fireball.de robot",
    "type" => "R"
  ),
  "Firefly/1.0 (compatible; Mozilla 4.0; MSIE 5.5)" => array(
    "robot" => "firefly",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fireball.de robot",
    "type" => "R"
  ),
  "Firefox (kastaneta03@hotmail.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Czech Technical University Prague (147.32.141.0x)",
    "type" => "R"
  ),
  "Firefox_1.0.6 (kasparek@naparek.cz)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Czech Technical University Prague (147.32.141.0x)",
    "type" => "R"
  ),
  "FirstGov.gov Search - POC:firstgov.webmasters@gsa.gov" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "AT&T/Fast Search robot for FirstGov (U.S.Government) portal",
    "type" => "R"
  ),
  "firstsbot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Firstsfind Germany robot / link checking",
    "type" => "R"
  ),
  "Flapbot/0.7.2 (Flaptor Crawler; http://www.flaptor.com; crawler at flaptor period com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Flaptor information retrieval solutions robot",
    "type" => "R"
  ),
  "FLATARTS_FAVICO" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "FlatArts Favorites Icon Tool",
    "type" => "C D"
  ),
  "FlickBot 2.0 RPT-HTTPClient/0.3-3" => array(
    "robot" => "flickbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DivX.com Movie Find robot",
    "type" => "R"
  ),
  "flunky" => array(
    "robot" => "metacarta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Metacarta / Cogent robot",
    "type" => "R"
  ),
  "fly/6.01 libwww/4.0D" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown",
    "type" => ""
  ),
  "FocusedSampler/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IBM's Almaden Research robot",
    "type" => "R"
  ),
  "Fooky.com/ScorpionBot/ScoutOut; http://www.fooky.com/scorpionbots" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fooky search Scorpionbots robot (65.12.170.0xx)",
    "type" => "R"
  ),
  "Francis/1.0 (francis@neomo.de http://www.neomo.de/)" => array(
    "robot" => "neomo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Neomo Search (Germany) robot (85.10.197.1xx)",
    "type" => "R"
  ),
  "Franklin Locator 1.8" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "free-downloads.net download-link validator /0.1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Free Downloads shareware directory link checking",
    "type" => "C"
  ),
  "FreeFind.com-SiteSearchEngine/1.0 (http://freefind.com; spiderinfo@freefind.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FreeFind.com robot",
    "type" => "R"
  ),
  "FreshDownload/x.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fresh Download download manager",
    "type" => "D"
  ),
  "FreshNotes crawler< report problems to crawler-at-freshnotes-dot-com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FreshNotes - music related artist search (72.3.225.0x)",
    "type" => "R"
  ),
  "FSurf15a 01" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs",
    "type" => "S"
  ),
  "Full Web Bot 0416B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from diff. IPs i.e.: - 66.28.240.0x (cogentco.com) - 68.5.174.0x (cox.net)",
    "type" => "S"
  ),
  "Full Web Bot 0516B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool i.e. from - 68.154.96.0x (bellsouth.net)",
    "type" => "S"
  ),
  "Full Web Bot 2816B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from 66.255.6.0xx (uslec.com)",
    "type" => "S"
  ),
  "FyberSpider (+http://www.fybersearch.com/fyberspider.php)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FyberSearch FyberSpider robot",
    "type" => "R"
  ),
  "Gromit/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Australasian Legal Information Institute (AustLII) robot",
    "type" => "R"
  ),
  // Summary: Added 500 entries from http://www.psychedelix.com/agents/index.shtml
  // Adding http://www.psychedelix.com/agents/index.shtml?g_l
  "Gagglebot" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Some user from bbnplanet.net (4.63.218.2xx) using an Innerprise robot tool",
    "type" => "R C ?"
  ),
  "GAIS Robot/1.0B2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Seed Search robot",
    "type" => "R"
  ),
  "Gaisbot/3.0 (indexer@gais.cs.ccu.edu.tw; http://gais.cs.ccu.edu.tw/robot.php)" => array(
    "robot" => "gaisbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gaislab Taiwan robot",
    "type" => "R"
  ),
  "Gaisbot/3.0+(robot06@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)" => array(
    "robot" => "gaisbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gaislab Taiwan robot",
    "type" => "R"
  ),
  "GalaxyBot/1.0 (http://www.galaxy.com/galaxybot.html)" => array(
    "robot" => "galaxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Galaxy robot (63.121.41.0xx)",
    "type" => "R"
  ),
  "Gamespy_Arcade" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GameSpyHTTP/1.0",
    "type" => "D"
  ),
  "GammaSpider/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GammaWare GammaSpider",
    "type" => "R"
  ),
  "gazz/x.0 (gazz@nttrd.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "nttrd.com / Infobee.ne.jp robot",
    "type" => "R"
  ),
  "geckobot" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Geckobot user robot",
    "type" => ""
  ),
  "Generic Mobile Phone (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)" => array(
    "robot" => "googlemobile",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Mobile Search crawler",
    "type" => "R P"
  ),
  "generic_crawler/01.0217/" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from Carnegie Mellon University (128.2.211.0xx)",
    "type" => ""
  ),
  "genieBot (http://64.5.245.11/faq/faq.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GenieKnows.com search",
    "type" => "R"
  ),
  "geniebot wgao@genieknows.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GenieKnows.com search",
    "type" => "R"
  ),
  "GeoBot/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from wavepath.com (65.254.33.1xx)",
    "type" => ""
  ),
  "GeonaBot 1.0; http://www.geona.com/" => array(
    "robot" => "geona",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Geona Search robot / link checking",
    "type" => "R"
  ),
  "geourl/2.0b2" => array(
    "robot" => "geourl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GeoURL ICBM Address Server - a location-to-URL reverse directory",
    "type" => "C"
  ),
  "GeoURLBot 1.0 (http://geourl.org)" => array(
    "robot" => "geourl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GeoURL ICBM Address Server - a location-to-URL reverse directory",
    "type" => "C"
  ),
  "GetBot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Getbot web downloading tool / site grabber",
    "type" => "D"
  ),
  "GetRight/3.0.0" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "GetRight/4.5xx" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "GetRight/4.0" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "GetRight/4.0[a-e]" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "GetRightPro/6.0beta2" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "GetWeb/0.1 libwww-perl/5.16" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetWeb - web page to email service",
    "type" => "D"
  ),
  "GhostRouteHunter/20021130 (https://www.sixxs.net/tools/grh/; info@sixxs.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sixxs Ghost Route Hunter",
    "type" => "C"
  ),
  "gigabaz/3.1x (baz@gigabaz.com; http://gigabaz.com/gigabaz/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GigaBaz Brainbot (Germany) robot",
    "type" => "R"
  ),
  "Gigabot/2.0 (gigablast.com)" => array(
    "robot" => "gigabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gigablast robot (64.62.168.0x)",
    "type" => "R"
  ),
  "Gigabot/2.0/gigablast.com/spider.html" => array(
    "robot" => "gigabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gigablast robot",
    "type" => "R"
  ),
  "Gigabot/2.0; http://www.gigablast.com/spider.html" => array(
    "robot" => "gigabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gigablast robot",
    "type" => "R"
  ),
  "Gigabot/1.0" => array(
    "robot" => "gigabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gigablast robot (64.62.168.0x)",
    "type" => "R"
  ),
  "GigabotSiteSearch/2.0 (sitesearch.gigablast.com)" => array(
    "robot" => "gigabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gigablast robot (64.62.168.0x)",
    "type" => "R"
  ),
  "GNODSPIDER (www.gnod.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "www.gnod.net spider",
    "type" => "R"
  ),
  "Go!Zilla 3.0 (www.gozilla.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Go!Zilla download manager",
    "type" => "D"
  ),
  "Go!Zilla/4.0.0.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Go!Zilla download manager",
    "type" => "D"
  ),
  "Go-Ahead-Got-It/1.1" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "GotIt web accelerator (discontinued)",
    "type" => "P D"
  ),
  "Goblin/0.9 (http://www.goguides.org/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoGuides.Org (195.226.137.0x) robot",
    "type" => "R"
  ),
  "Goblin/0.9.0 (http://www.goguides.org/goblin-info.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoGuides.Org (195.226.137.0x) robot",
    "type" => "R"
  ),
  "GoForIt.com" => array(
    "robot" => "goforit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoForIt Search robot",
    "type" => "R"
  ),
  "GOFORITBOT ( http://www.goforit.com/about/ )" => array(
    "robot" => "goforit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoForIt Search robot",
    "type" => "R"
  ),
  "GoGuides.Org Link Check" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GoGuides.org directory & search link checking",
    "type" => "C"
  ),
  "Goldfire Server" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Invention Machines Goldfire Server",
    "type" => "P"
  ),
  "gonzo1[P] +http://www.suchen.de/popups/faq.jsp" => array(
    "robot" => "suchende",
    "browser" => NULL,
    "os" => NULL,
    "description" => "suchen.de German local search robot",
    "type" => "R"
  ),
  "Goofer/0.2" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Some private robot (Wanadoo.fr client)",
    "type" => ""
  ),
  "Google Talk" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Google instant messenger",
    "type" => "B"
  ),
  "googlebot (larbin2.6.0@unspecified.mail)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Packard Bell Net user robot (*not* Google)",
    "type" => ""
  ),
  "Googlebot/2.1 ( http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot 66.249.64.0XX",
    "type" => "R"
  ),
  "Googlebot/2.1 ( http://www.googlebot.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot 66.249.64.0XX",
    "type" => "R"
  ),
  "Googlebot/Test ( http://www.googlebot.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot 66.249.64.0XX",
    "type" => "R"
  ),
  "Googlebot-Image/1.0 ( http://www.googlebot.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google image crawler (66.249.72.0xx)",
    "type" => "R"
  ),
  "GrapeFX/0.3 libwww/5.4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grapeshot web search system API",
    "type" => "R"
  ),
  "GrigorBot 0.8 (http://www.grigor.biz/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grigor Search bot",
    "type" => "R"
  ),
  "grub crawler(http://www.grub.org)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grub open source crawler",
    "type" => "R"
  ),
  "grub-client" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grub open source crawler",
    "type" => "R"
  ),
  "gsa-crawler (Enterprise; GID-01422; jplastiras@google.com)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Search Appliance robot (216.239.0x.0x)",
    "type" => "R"
  ),
  "gsa-crawler (Enterprise; GID-01742;gsatesting@rediffmail.com)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Search Appliance robot (216.239.0x.0x)",
    "type" => "R"
  ),
  "gsa-crawler (Enterprise; GIX-03519; cknuetter@stubhub.com)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Enterprise Search Appliance used by IBM (129.41.20.1xx)",
    "type" => "R"
  ),
  "gsa-crawler (Enterprise; GIX-0xxxx; enterprise-training@google.com)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Search Appliance robot (216.239.0x.0x)",
    "type" => "R"
  ),
  "GSiteCrawler/v1.12 rev. 260 (http://gsitecrawler.com/)" => array(
    "robot" => "googlesitemaps",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GSiteCrawler - Google sitemap generator for Windows",
    "type" => "C"
  ),
  "Gulliver/1.3" => array(
    "robot" => "gulliver",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Northernlight robot",
    "type" => "R"
  ),
  "Gulper Web Bot 0.2.4 (www.ecsl.cs.sunysb.edu/~maxim/cgi-bin/Link/GulperBot)" => array(
    "robot" => "yuntis",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yuntis Collaborative Web Resource Categorization and Ranking Project robot",
    "type" => "R"
  ),
  "HappyFunBot/1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Happy Fun Search robot",
    "type" => "R"
  ),
  "Harvest-NG/1.0.2" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Harvest-NG web crawler used by search.yahoo.com",
    "type" => "R"
  ),
  "Haste/0.12 (HOME: http://haste.kytoon.com/)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Haste - web mapping and monitoring system",
    "type" => "R C"
  ),
  "Hatena Antenna/0.4 (http://a.hatena.ne.jp/help#robot)" => array(
    "robot" => "hatena",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hatena::Antenna Japan robot (221.186.146.0x)",
    "type" => "R"
  ),
  "Hatena Mobile Gateway/1.0" => array(
    "robot" => "hatena",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hatena Japan proxy for handheld/mobile clients",
    "type" => "P"
  ),
  "Hatena Pagetitle Agent/1.0" => array(
    "robot" => "hatena",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hatena Japan robot (221.186.146.0x)",
    "type" => "R"
  ),
  "HatenaScreenshot/1.0 (checker)" => array(
    "robot" => "hatena",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hatena::Diary (Japan) web page screenshot robot",
    "type" => "R D"
  ),
  "HeinrichderMiragoRobot" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago Germany robot",
    "type" => "R"
  ),
  "HeinrichderMiragoRobot (http://www.miragorobot.com/scripts/deinfo.asp)" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago Germany robot",
    "type" => "R"
  ),
  "Helix/1.0 ( http://www.sitesearch.ca/helix/)" => array(
    "robot" => "helix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Helix - The SiteSearch (Canada) web crawler",
    "type" => "R"
  ),
  "HenriLeRobotMirago (http://www.miragorobot.com/scripts/frinfo.asp)" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago France robot",
    "type" => "R"
  ),
  "HenrytheMiragoRobot" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago search (UK) robot",
    "type" => "R"
  ),
  "HenryTheMiragoRobot (http://www.miragorobot.com/scripts/mrinfo.asp)" => array(
    "robot" => "mirago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mirago search (UK) robot",
    "type" => "R"
  ),
  "hgrepurl/1.0" => array(
    "robot" => "other",
    "browser" => "hgrepurl",
    "os" => "other",
    "description" => "O'Reilly's Perl LWP example client program from Web Client Programming with Perl",
    "type" => ""
  ),
  "Hi! I'm CsCrawler my homepage: http://www.kde.cs.uni-kassel.de/lehre/ss2005/googlespam/crawler.html RPT-HTTPClient/0.3-3" => array(
    "robot" => "cscrawler",
    "browser" => NULL,
    "os" => NULL,
    "description" => "University of Kassel Germany CsCrawler using the HTTPClient library",
    "type" => "R"
  ),
  "HiDownload" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HiDownload download manager",
    "type" => "D"
  ),
  "Hippias/0.9 Beta" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hippias robot",
    "type" => "R"
  ),
  "HitList" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pilot Hitlist web analytics solution",
    "type" => "R"
  ),
  "Hitwise Spider v1.0 http://www.hitwise.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hitwise spider",
    "type" => "R"
  ),
  "HLoader" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "diff. IPs / unknown services",
    "type" => ""
  ),
  "holmes/3.9 (onet.pl)" => array(
    "robot" => "onet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Onet.pl (Poland) search robot",
    "type" => "R"
  ),
  "holmes/3.9 (OnetSzukaj/5.0; +http://szukaj.onet.pl)" => array(
    "robot" => "onet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Onet.pl (Poland) search robot",
    "type" => "R"
  ),
  "holmes/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Morfeo / Centrum Search (Czech Republic) robot from 65.102.46.0xx",
    "type" => "R"
  ),
  "HomePageSearch(hpsearch.uni-trier.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HomePageSearch robot",
    "type" => "R"
  ),
  "Homerbot: www.homerweb.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Homerweb search robot",
    "type" => "R"
  ),
  "Honda-Search/0.7.2 (Nutch; http://lucene.apache.org/nutch/bot.html; search@honda-search.com)" => array(
    "robot" => "honda",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Honda-Search.com - Honda cars related search robot",
    "type" => "R"
  ),
  "HooWWWer/2.1.3 (debugging run) (+http://cosco.hiit.fi/search/hoowwwer/ | mailto:crawler-info<at>hiit.fi)" => array(
    "robot" => "hoowwwer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HooWWer - Next Generation Information Retrieval robot ",
    "type" => "R"
  ),
  "HooWWWer/2.1.0 ( http://cosco.hiit.fi/search/hoowwwer/ | mailto:crawler-info<at>hiit.fi)" => array(
    "robot" => "hoowwwer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HooWWer - Next Generation Information Retrieval robot (128.214.112.0x)",
    "type" => "R"
  ),
  "HotJava/1.0.1/JRE1.1.0" => array(
    "robot" => "other",
    "browser" => "hotjava",
    "os" => "other",
    "description" => "HotJava browser plus HTML Component 1.1.0",
    "type" => "B"
  ),
  "Hotzonu/x.0" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Hotzuno - Japanese BBS reader client",
    "type" => "B"
  ),
  "htdig/3.1.6 (http://computerorgs.com)" => array(
    "robot" => "htdig",
    "browser" => NULL,
    "os" => NULL,
    "description" => "COMPUTERorgs.com robot (205.134.190.0xx) using htdig",
    "type" => "R"
  ),
  "htdig/3.1.6 (unconfigured@htdig.searchengine.maintainer)" => array(
    "robot" => "htdig",
    "browser" => NULL,
    "os" => NULL,
    "description" => "htdig used by the Acad�ie de Toulouse",
    "type" => "R"
  ),
  "htdig/3.1.0 (root@localhost)" => array(
    "robot" => "htdig",
    "browser" => NULL,
    "os" => NULL,
    "description" => "htdig search tool",
    "type" => "R"
  ),
  "Html Link Validator (www.lithopssoft.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lithops Software link validation tool",
    "type" => "C"
  ),
  "HTML2JPG Blackbox, http://www.html2jpg.com" => array(
    "robot" => "html2jpg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTML2JPG webpage to image converter",
    "type" => "D"
  ),
  "HTML2JPG Enterprise" => array(
    "robot" => "html2jpg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTML2JPG webpage to image converter",
    "type" => "D"
  ),
  "HTMLParser/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTML Parser Java library to parse HTML",
    "type" => "D"
  ),
  "HTTP Retriever" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "PHP HTTP client to access Web servers",
    "type" => "D"
  ),
  "http://Anonymouse.org/ (Unix)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Anonymous web proxy service",
    "type" => "P"
  ),
  "http://Ask.24x.Info/ (http://narres.it/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask 24x Info (Germany) DMOZ related robot",
    "type" => "R"
  ),
  "http://www.almaden.ibm.com/cs/crawler" => array(
    "robot" => "almaden",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IBM's Almaden Research robot",
    "type" => "R"
  ),
  "http://www.almaden.ibm.com/cs/crawler [rc1.wf.ibm.com]" => array(
    "robot" => "almaden",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IBM's Almaden Research robot",
    "type" => "R"
  ),
  "http://www.almaden.ibm.com/cs/crawler [wf216]" => array(
    "robot" => "almaden",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IBM's Almaden Research robot",
    "type" => "R"
  ),
  "http://www.istarthere.com_spider@istarthere.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Istarthere.com search robot",
    "type" => "R"
  ),
  "http://www.monogol.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Monogol - German open source search engine project (195.226.167.1xx)",
    "type" => "R"
  ),
  "http://www.trendtech.dk/spider.asp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TrendTech Search Engine (Denmark) robot",
    "type" => "R"
  ),
  "HTTP::Lite/2.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTTP::Lite - Standalone Perl module for retreiving HTTP documents",
    "type" => "D"
  ),
  "HTTPResume v. 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTTPResume Amiga download manager",
    "type" => "D"
  ),
  "httpunit/1.0" => array(
    "robot" => "httpunit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HttpUnit - Java browser behavior simulation tool",
    "type" => "B"
  ),
  "i1searchbot/2.0 (i1search web crawler; http://www.i1search.com; crawler@i1search.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "i1search robot",
    "type" => "R"
  ),
  "ia_archiver/1.6" => array(
    "robot" => "alexa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alexa / The Internet Archive (209.237.238.1xx)",
    "type" => "R"
  ),
  "ia_archiver-web.archive.org" => array(
    "robot" => "alexa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alexa / The Internet Archive (209.237.238.1xx)",
    "type" => "R"
  ),
  "IAArchiver-1.0" => array(
    "robot" => "alexa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alexa / The Internet Archive (209.237.238.1xx)",
    "type" => "R"
  ),
  "iaskspider" => array(
    "robot" => "iask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot (reads robots.txt) from chinatelecom (219.142.78.0x)",
    "type" => ""
  ),
  "iaskspider2 (iask@staff.sina.com.cn)" => array(
    "robot" => "iask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iask search / Sina portal robot (China)",
    "type" => "R"
  ),
  "IBrowse/2.2 (AmigaOS 3.5)" => array(
    "robot" => "other",
    "browser" => "ibrowse",
    "os" => "amiga",
    "description" => "IOSpirit iBrowse Amiga Browser",
    "type" => "B"
  ),
  "IBrowse/2.2 (Windows 3.1)" => array(
    "robot" => "other",
    "browser" => "ibrowse",
    "os" => "windows31",
    "description" => "IOSpirit iBrowse Amiga Browser",
    "type" => "B"
  ),
  "iCab/2.5.2 (Macintosh; I; PPC)" => array(
    "robot" => "other",
    "browser" => "icab",
    "os" => "macppc",
    "description" => "iCab MAC Web browser",
    "type" => "B"
  ),
  "ICCrawler - ICjobs (http://www.icjobs.de/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ICJobs - Intelligence Competence Center (Germany) robot",
    "type" => "R"
  ),
  "iCCrawler (http://www.iccenter.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ICJobs - Intelligence Competence Center (Germany) robot",
    "type" => "R"
  ),
  "ICE Browser/5.05 (Java 1.4.0; Windows 2000 5.0 x86)" => array(
    "robot" => "other",
    "browser" => "ice",
    "os" => "windows2k",
    "description" => "ICE Java browser",
    "type" => "B"
  ),
  "ichiro/2.0 (http://help.goo.ne.jp/door/crawler.html)" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Goo Japan / Inktomi robot (210.173.179.0x)",
    "type" => "R"
  ),
  "ichiro/2.0 (ichiro@nttr.co.jp)" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Goo Japan / Inktomi robot (210.173.179.0x)",
    "type" => "R"
  ),
  "ichiro/x.0 (ichiro@nttr.co.jp)" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Goo Japan / Inktomi robot (210.173.179.0x)",
    "type" => "R"
  ),
  "IconSurf/2.0 favicon finder (see http://iconsurf.com/robot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iconsurf.com - Visual Surf Engine / favicon finder",
    "type" => "R"
  ),
  "IconSurf/2.0 favicon monitor (see http://iconsurf.com/robot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iconsurf.com - Visual Surf Engine / favicon finder",
    "type" => "R"
  ),
  "ICOO Loader v.0.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "icooLoader download manager",
    "type" => "D"
  ),
  "ICRA_label_spider/x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ICRA (Internet Content Rating Association) label spider",
    "type" => "R"
  ),
  "icsbot-0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ICS Robot Search Engine (International Christian school of Seoul)",
    "type" => "R"
  ),
  "IDA" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Internet Download Accelerator",
    "type" => "D"
  ),
  "ideare - SignSite/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Janas (Ideare.com / Tiscali.it) robot",
    "type" => "R"
  ),
  "iearthworm/1.0, iearthworm@yahoo.com.cn" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown UA from Yahoo China",
    "type" => ""
  ),
  "IEFav172Free" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some bookmark manager",
    "type" => "C"
  ),
  "iGetter/1.0 (Macintosh;G;PPC)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "iGetter download manager",
    "type" => "D"
  ),
  "iGetter/2 (Macintosh; U; PPC Mac OS X; en)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "iGetter download manager",
    "type" => "D"
  ),
  "ilial/Nutch-0.9-dev" => array(
    "robot" => "ilial",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from UCLA using Nutch",
    "type" => "R"
  ),
  "IlTrovatore/1.2 (IlTrovatore; http://www.iltrovatore.it/bot.html; bot@iltrovatore.it)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "IlTrovatore-Setaccio ( http://www.iltrovatore.it)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "Iltrovatore-Setaccio/0.3-dev (Indexing; http://www.iltrovatore.it/bot.html; info@iltrovatore.it)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "IlTrovatore-Setaccio/1.2 ( http://www.iltrovatore.it/aiuto/faq.html)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "Iltrovatore-Setaccio/1.2 (It-bot; http://www.iltrovatore.it/bot.html; info@iltrovatore.it)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "iltrovatore-setaccio/1.2-dev (spidering; http://www.iltrovatore.it/aiuto/.....)" => array(
    "robot" => "iltrovatore",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Il Trovatore - Italian search engine robot",
    "type" => "R"
  ),
  "Incutio HttpClient v0.0" => array(
    "robot" => "httpclient",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HttpClient - a PHP Web Client Class",
    "type" => ""
  ),
  "IncyWincy data gatherer(webmaster@loopimprovements.com" => array(
    "robot" => "incywincy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IncyWincy search engine using DMOZ Open Directory database",
    "type" => "R"
  ),
  "IncyWincy page crawler(webmaster@loopimprovements.com" => array(
    "robot" => "incywincy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IncyWincy search engine using DMOZ Open Directory database",
    "type" => "R"
  ),
  "IncyWincy(http://www.look.com)" => array(
    "robot" => "look",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Look.com robot using IncyWincy search engine",
    "type" => "R"
  ),
  "IncyWincy(http://www.loopimprovements.com/robot.html)" => array(
    "robot" => "incywincy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IncyWincy search engine using DMOZ Open Directory database",
    "type" => "R"
  ),
  "IncyWincy/2.1(loopimprovements.com/robot.html)" => array(
    "robot" => "incywincy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IncyWincy search engine using DMOZ Open Directory database",
    "type" => "R"
  ),
  "IndexTheWeb.com Crawler7" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Index the Web (69.57.134.0x) crawler",
    "type" => "R"
  ),
  "Industry Program 1.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Spam bot from diff. IPs",
    "type" => "S"
  ),
  "Inet library" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inet Library Resource Center robot",
    "type" => "R"
  ),
  "InetURL/1.0" => array(
    "robot" => "ineturl",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "InetURL IVM (phone software) plugin for web server access ?",
    "type" => ""
  ),
  "infoConveraCrawler/0.8 ( http://www.authoritativeweb.com/crawl)" => array(
    "robot" => "convera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Converas RetrievalWare Internet Spider (63.241.61.0) ",
    "type" => "R S ?"
  ),
  "InfoFly/1.0 (http://www.versions-project.org/)" => array(
    "robot" => "versionsproject",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Versions-project.org Ingelin spider",
    "type" => "R"
  ),
  "InfoLink/1.0" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "InfoLink link checking tool",
    "type" => "C"
  ),
  "INFOMINE/8.0 Adders" => array(
    "robot" => "infomine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "INFOMINE Scholary Internet Resource Collection crawler",
    "type" => "R"
  ),
  "INFOMINE/8.0 RemoteServices" => array(
    "robot" => "infomine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "INFOMINE Scholary Internet Resource Collection crawler",
    "type" => "R"
  ),
  "INFOMINE/8.0 VLCrawler (http://infomine.ucr.edu/useragents)" => array(
    "robot" => "infomine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "INFOMINE Scholary Internet Resource Collection crawler",
    "type" => "R"
  ),
  "InfoNaviRobot(F107)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "164.71.1.1xx jp.co.fujitsu.t2 Robot",
    "type" => ""
  ),
  "InfoSeek Sidewinder/0.9" => array(
    "robot" => "infoseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek robot",
    "type" => "R"
  ),
  "InfoSeek Sidewinder/1.0A" => array(
    "robot" => "infoseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek robot",
    "type" => "R"
  ),
  "InfoSeek Sidewinder/1.1A" => array(
    "robot" => "infoseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek robot",
    "type" => "R"
  ),
  "Infoseek SideWinder/1.45 (Compatible; MSIE 10.0; UNIX)" => array(
    "robot" => "infoseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek robot",
    "type" => "R"
  ),
  "Infoseek SideWinder/2.0B (Linux 2.4 i686)" => array(
    "robot" => "infoseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek Japan robot",
    "type" => "R"
  ),
  "INGRID/3.0 MT (webcrawler@NOSPAMexperimental.net; http://webmaster.ilse.nl/jsp/webmaster.jsp)" => array(
    "robot" => "ilse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ilse Netherlands robot (62.69.178.0x)",
    "type" => "R"
  ),
  "Inktomi Search" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos NBCi etc.) robot",
    "type" => "R"
  ),
  "InnerpriseBot/1.0 (http://www.innerprise.com/)" => array(
    "robot" => "innerprise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search engine software (64.202.165.0xx) ",
    "type" => "R"
  ),
  "Insitor.com search and find world wide!" => array(
    "robot" => "insitor",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Insitor Search robot (80.67.20.1xx)",
    "type" => "R"
  ),
  "Insitornaut" => array(
    "robot" => "insitor",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Insitor Search robot (80.67.20.1xx)",
    "type" => "R"
  ),
  "InstallShield DigitalWizard" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "download manager",
    "type" => "D"
  ),
  "Interarchy/1.0.0 (InterarchyCrawler)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Interarchy file transfer software - SFTP/FTP client for Mac OS X",
    "type" => "D"
  ),
  "Internet Ninja 1.0" => array(
    "robot" => "internetninja",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dream Train (Japan) Internet search robot",
    "type" => "R"
  ),
  "InternetArchive/0.8-dev(Nutch;http://lucene.apache.org/nutch/bot.html;nutch-agent@lucene.apache" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix - The Internet Archive's open-source crawler based on Nutch (207.241.225.2xx)",
    "type" => "R"
  ),
  "InternetLinkAgent/3.1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Internet Link Agent - link checking tool",
    "type" => "C"
  ),
  "InternetSeer.com" => array(
    "robot" => "internetseer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Internetseer Web site monitoring / Claymont robot",
    "type" => "R"
  ),
  "intraVnews/1.0" => array(
    "robot" => "intravnews",
    "browser" => NULL,
    "os" => NULL,
    "description" => "intraVNews - Feed reader & RSS aggregator for Outlook",
    "type" => "B"
  ),
  "IP*Works! V5 HTTP/S Component - by /n software - www.nsoftware.com" => array(
    "robot" => "ipworks",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IP*Works! HTTP Component",
    "type" => ""
  ),
  "IP2LocationBot/1.0 <a href=\"http://www.ip2location.com\">http://www.ip2location.com</a>" => array(
    "robot" => "ip2location",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IP2Location - Reverse lookup geographical data and ISP by IP",
    "type" => "R C"
  ),
  "IP2MapBot/1.1 <a href=http://www.ip2map.com>http://www.ip2map.com</a>" => array(
    "robot" => "ip2location",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IP2Map - geographical IP mapping",
    "type" => "R C"
  ),
  "IPiumBot laurion(dot)com" => array(
    "robot" => "laurion",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Laurions Ipium robot",
    "type" => "R"
  ),
  "IpselonBot/0.0x-beta (Ipselon; http://www.ipselon.com; ipselonbot@ipselon.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ipselon Web Search robot",
    "type" => "R"
  ),
  "Iria/1.0xa" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iria download manager",
    "type" => "D"
  ),
  "IRLbot/1.0 ( http://irl.cs.tamu.edu/crawler)" => array(
    "robot" => "tamu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IRL-crawler - Texas A&M University research project crawler",
    "type" => "R"
  ),
  "IrssiUrlLog/0.2" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "url_log - Irssi Perl url grabber",
    "type" => ""
  ),
  "Irvine/1.0.0" => array(
    "robot" => "irvine",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Irvine downloading tool",
    "type" => "D"
  ),
  "ISC Systems iRc Search 2.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown spambot / harvester from diff. IPs",
    "type" => "S"
  ),
  "iSiloX/4.0x Windows/32" => array(
    "robot" => "other",
    "browser" => "isilox",
    "os" => "windows",
    "description" => "iSiloX document converter for iSilo reader",
    "type" => "B"
  ),
  "isurf (tszhu@canada.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown University of Alberta link-checking ?",
    "type" => "C"
  ),
  "IUPUI Research Bot v 1.9a" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot from 66.139.78.0x(x)",
    "type" => "S"
  ),
  "iVia Page Fetcher (http://ivia.ucr.edu/useragents.shtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "iVia robot - Open source Internet portal & virtual library system software",
    "type" => "D"
  ),
  "iVia/4.0 CanonizeUrl (http://infomine.ucr.edu/iVia/useragents.shtml" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "iVia robot - Open source Internet portal & virtual library system software",
    "type" => "D"
  ),
  "Jabot/6.0 (http://odin.ingrid.org/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ODIN Directory Japan robot (163.138.95.0x)",
    "type" => "R"
  ),
  "Jabot/7.0.0 (http://odin.ingrid.org/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ODIN Directory Japan robot (163.138.95.0x)",
    "type" => "R"
  ),
  "Jack" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "German Domanova (offline since Feb.02) robot",
    "type" => "R"
  ),
  "Jakarta Commons-HttpClient/2.0xxx" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Jakarta Commons (Java based) HTTP client",
    "type" => "B"
  ),
  "Jakarta Commons-HttpClient/3.0-rcx" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Jakarta Commons (Java based) HTTP client",
    "type" => "B"
  ),
  "Jambot/0.1.1 (Jambot; http://www.jambot.com/blog; crawler@jambot.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "JamBot search robot (70.146.82.0x)",
    "type" => "R"
  ),
  "Java 1.1" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => ""
  ),
  "Java/1.4.1_01" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => "R B D"
  ),
  "Java1.0.21.0" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => "B"
  ),
  "Java1.1.0x.0" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => ""
  ),
  "Java1.3.0rc1" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => ""
  ),
  "Java1.3.0" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => ""
  ),
  "Java1.4.0" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java VM",
    "type" => "R B D"
  ),
  "Jayde Crawler. http://www.jayde.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Jayde B2B Search robot (66.28.139.0x)",
    "type" => "R"
  ),
  "JBH Agent 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some site downloading tool ? via 61.77.51.0xx",
    "type" => "D"
  ),
  "jBrowser/J2ME Profile/MIDP-1.0 Configuration/CLDC-1.0 (Google WAP Proxy/1.0)" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "mobile",
    "description" => "WAP 2.0 / jBrowser for handhelds",
    "type" => "B"
  ),
  "JCheckLinks/0.1 RPT-HTTPClient/0.3-1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "JCheckLinks Java hyperlink validator",
    "type" => "C"
  ),
  "JDK/1.1" => array(
    "robot" => "java",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Java Development Kit",
    "type" => ""
  ),
  "Jeode/1.0.0" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Insignias Jeode (PDA) Java platform",
    "type" => "B"
  ),
  "Jetbot/1.0" => array(
    "robot" => "jeteye",
    "browser" => NULL,
    "os" => NULL,
    "description" => "JetEye Search robot (64.62.142.0xx / 64.71.144.0xx)",
    "type" => "R"
  ),
  "JetBrains Omea Reader 1.0.0 (http://www.jetbrains.com/omea_reader/)" => array(
    "robot" => "omea",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Omea RSS -  Atom - newsgroups web page reader ",
    "type" => "B"
  ),
  "JetBrains Omea Reader 2.0 Release Candidate 1 (http://www.jetbrains.com/omea_reader/)" => array(
    "robot" => "omea",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Omea RSS -  Atom - newsgroups web page reader ",
    "type" => "B"
  ),
  "JetCar" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "JetCar / Flashget download manager",
    "type" => "D"
  ),
  "Jigsaw/2.2.0 W3C_CSS_Validator_JFouffa/2.0" => array(
    "robot" => "csscheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Jigsaw - W3C's CSS Validator Server",
    "type" => "C"
  ),
  "JoBo/@JOBO_VERSION@(http://www.matuschek.net/jobo.html)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Jobo website downloading program",
    "type" => "D B"
  ),
  "JoBo/1.0 (http://www.matuschek.net/jobo.html)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Jobo website downloading program",
    "type" => "D B"
  ),
  "JobSpider_BA/1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Finacialbot.com - German (213.61.218.0x) job search JobRoboter",
    "type" => "R"
  ),
  "JOC Web Spider" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Jocsoft Web Spider - website downloading tool",
    "type" => "D B"
  ),
  "JordoMedia/1.0 RSS File Reader (http://www.jordomedia.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Jordo Media RSS / Atom feed directory link checking",
    "type" => "C"
  ),
  "Journster [alpha] (http://journster.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Journster.com RSS/Atom aggregator",
    "type" => "C"
  ),
  "Journster.com RSS/Atom aggregator 0.5 (http://www.journster.com/bot.phtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Journster.com RSS/Atom aggregator",
    "type" => "C"
  ),
  "J-PHONE/3.0/J-SH07" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Proxy message from jp-q.ne.jp",
    "type" => "P"
  ),
  "JRTS Check Favorites Utility" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Check Favorites bookmark checking",
    "type" => "C"
  ),
  "JRTwine Software Check Favorites Utility" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Check Favorites bookmark checking",
    "type" => "C"
  ),
  "Jyxobot/x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Jyxo search (Czech Republic) robot (212.71.128.0x)",
    "type" => "R"
  ),
  "k2spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Verity K2 Spider ( Network search software)",
    "type" => "R"
  ),
  "KakleBot - www.kakle.com/0.1 (KakleBot - www.kakle.com; http:// www.kakle.com/bot.html; support@kakle.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kakle ranked metasearch robot",
    "type" => "R"
  ),
  "Kapere (http://www.kapere.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kapere site grapper / web downloader",
    "type" => "D"
  ),
  "KDDI-SN22 UP.Browser/6.0.7 (GUI) MMP/1.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => "Google WAP Proxy (216.239.33.0)",
    "type" => "P"
  ),
  "KE_1.0/2.0 libwww/5.2.8" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Voila.fr robot",
    "type" => "R"
  ),
  "Kenjin Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kenjin Spider search agent",
    "type" => "R"
  ),
  "Kevin http://dznet.com/kevin/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dznet.com Kevin crawler (link checking ?) via 68.39.148.0x (nj.comcast.net)",
    "type" => "R"
  ),
  "Kevin http://websitealert.net/kevin/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Website AlertsKevin crawler (website monitoring) via 68.39.148.0x (nj.comcast.net)",
    "type" => "R"
  ),
  "KFSW-Bot (Version: 1.01 powered by KFSW www.kfsw.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some Perl search script from KFSW (Germany)",
    "type" => "R"
  ),
  "kinjabot (http://www.kinja.com)" => array(
    "robot" => "kinja",
    "browser" => NULL,
    "os" => NULL,
    "description" => "kinja weblog search robot",
    "type" => "R"
  ),
  "kinja-imagebot (http://www.kinja.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "kinja weblog search robot",
    "type" => "R"
  ),
  "KIT-Fireball/2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fireball search (Germany) robot",
    "type" => "R"
  ),
  "KIT-Fireball/2.0 (compatible; Mozilla 4.0; MSIE 5.5)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fireball search (Germany) robot",
    "type" => "R"
  ),
  "Klondike/1.50 (WSP Win32) (Google WAP Proxy/1.0)" => array(
    "robot" => "other",
    "browser" => "klondike",
    "os" => "windows",
    "description" => "Klondike WAP Browser",
    "type" => "B"
  ),
  "K-Meleon/0.6 (Windows; U; Windows NT 5.1; en-US; rv:0.9.5) Gecko/20011011" => array(
    "robot" => "other",
    "browser" => "k-meleon",
    "os" => "windowsxp",
    "description" => "K-meleon browser -  Windows 2000",
    "type" => "B"
  ),
  "KnowItAll(knowitall@cs.washington.edu)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "University of Washington KnowItAll - web information extraction",
    "type" => "R"
  ),
  "Knowledge.com/0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "The knowledge.com (ODP) directory robot",
    "type" => "R"
  ),
  "Kontiki Client 1.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kontiki Client download manager",
    "type" => "D"
  ),
  "Krugle/Krugle,Nutch/0.8+ (Krugle web crawler; http://www.krugle.com/crawler/info.html; webcrawler@krugle.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Krugle source code search engine for developers (64.71.164.1xx) ",
    "type" => "R"
  ),
  "KSbot/1.0 (KnowledgeStorm crawler; http://www.knowledgestorm.com/resources/content/crawler/index.html; crawleradmin@knowledgestorm.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "KnowledgeStorm technology industry crawler for Findtech.com",
    "type" => "R"
  ),
  "kulokobot www.kuloko.com kuloko@backweave.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kuloko contextual search robot",
    "type" => "R"
  ),
  "kuloko-bot/0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kuloko contextual search robot",
    "type" => "R"
  ),
  "kulturarw3/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "National Library of Sweden Heritage Project robot",
    "type" => "R"
  ),
  "KummHttp/1.1 (compatible; KummClient; Linux rulez)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Link or server checking from Sanoma Budapest (195.70.35.0xx)",
    "type" => "C R"
  ),
  "Lachesis" => array(
    "robot" => "lachesis",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Intels Lachesis web site response time monitoring tool",
    "type" => "C"
  ),
  "lanshanbot/1.0 (+http://search.msn.com/msnbot.htm)" => array(
    "robot" => "lanshan",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Easten Network China (202.96.51.1xx)",
    "type" => ""
  ),
  "LapozzBot/1.4 ( http://robot.lapozz.com)" => array(
    "robot" => "lapozz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lapozz search (Hungary) robot (82.131.195.0x)",
    "type" => "R"
  ),
  "larbin (samualt9@bigfoot.com)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Metacarta.com (66.28.0x.0xx) robot",
    "type" => "R"
  ),
  "larbin_2.1.1 larbin2.1.1@somewhere.com" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by Mitsubishi Electric Research Labs",
    "type" => "R"
  ),
  "larbin_2.2.0 (crawl@compete.com)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Compete.com crawler",
    "type" => "R"
  ),
  "larbin_2.2.1_de_Viennot (Laurent.Viennot@inria.fr)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Inria robot",
    "type" => "R"
  ),
  "larbin_2.2.2 (sugayama@lab7.kuis.kyoto-u.ac.jp)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Kyoto University robot",
    "type" => "R"
  ),
  "larbin_2.2.2_guillaume (guillaume@liafa.jussieu.fr)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Inria robot",
    "type" => "R"
  ),
  "larbin_2.6.0 (larbin2.6.0@unspecified.mail)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by an unknown dsl.net client",
    "type" => "R"
  ),
  "larbin_2.6.1 (larbin2.6.1@unspecified.mail)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by diff. IPs / services",
    "type" => "R"
  ),
  "larbin_2.6.2 (hamasaki@grad.nii.ac.jp)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by National Institut of Informatics (NII/Japan)",
    "type" => "R"
  ),
  "larbin_2.6.2 (larbin2.6.2@unspecified.mail)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by diff. IPs",
    "type" => "R"
  ),
  "larbin_2.6.2 (listonATccDOTgatechDOTedu)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as robot by Georgia Institute of Technology http://www.gatech.edu/",
    "type" => "R"
  ),
  "larbin_2.6.2 (pimenas@systems.tuc.gr)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by Technical University of Crete",
    "type" => "R"
  ),
  "larbin_2.6.2 (tom@lemurconsulting.com)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Lemur Consulting robot",
    "type" => "R"
  ),
  "larbin_2.6.2 (vitalbox1@hotmail.com)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as robot via cloud9.net (168.100.192.0xx)",
    "type" => "R"
  ),
  "larbin_2.6.3 (ltaa_web_crawler@groupes.epfl.ch)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from EPFL Lausanne Switzerland (128.178.155.1xx)",
    "type" => "R"
  ),
  "larbin_2.6.3 (wgao@genieknows.com)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by GenieKnows.com search",
    "type" => "R"
  ),
  "larbin_2.6.3_for_(http://cosco.hiit.fi/search/) tsilande@hiit.fi" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by Next Generation Information Retrieval (NGIR)",
    "type" => "R"
  ),
  "larbin_2.6_basileocaml (basile.starynkevitch@cea.fr)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used by CEA / DCom Rechercher",
    "type" => "R"
  ),
  "larbin_devel (http://pauillac.inria.fr/~ailleret/prog/larbin/)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Larbin indexer used as Inria robot",
    "type" => "R"
  ),
  "LARBIN-EXPERIMENTAL (efp@gmx.net)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from 66.230.140.0x (argon.oxeo.com)",
    "type" => "S"
  ),
  'lc/$ROADS::Version libwww-perl/5.00' => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "ROADS - Perl web based subject based gateway tool",
    "type" => ""
  ),
  "lcabotAccept: */*" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot via MTT.ca / Aliant.ca (142.177.168.0xx)",
    "type" => ""
  ),
  "LECodeChecker/3.0 libgetdoc/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkexchange crawler",
    "type" => "R"
  ),
  "LeechGet 200x (www.leechget.de)" => array(
    "robot" => "leechget",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Leechget download manager",
    "type" => "D"
  ),
  "LEIA/2.90" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gseek.com (site is offline) robot",
    "type" => "R"
  ),
  "LEIA/3.01pr (LEIAcrawler; [SNIP])" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gseek.com (site is offline) robot",
    "type" => "R"
  ),
  "LetsCrawl.com/1.0 +http://letscrawl.com/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Maybe logfile spamming for Lets crawl! search (Germany)",
    "type" => "S"
  ),
  "LexiBot/1.00" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lexibot (exMataHari) search software",
    "type" => "R"
  ),
  "LG/U8138/v1.0" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "mobile",
    "description" => "LG 8138 Mobile Phone browser",
    "type" => "B"
  ),
  "Libby_1.1/libwww-perl/5.47" => array(
    "robot" => "about",
    "browser" => NULL,
    "os" => NULL,
    "description" => "About.com robot",
    "type" => "R"
  ),
  "libcurl-agent/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "libcurl's (multiprotocol file transfer library) standard user-agent name",
    "type" => "D"
  ),
  "libWeb/clsHTTP -- hiongun@kt.co.kr" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Korea Telecom Search robot",
    "type" => "R"
  ),
  "libwww/5.3.2" => array(
    "robot" => "mediater",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mediater Rechercher robot",
    "type" => "R"
  ),
  "libwww-perl/5.41" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CMP United Media robot",
    "type" => "R"
  ),
  "libwww-perl/5.45" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SplatSearch robot (207.44.142.0x)",
    "type" => "R"
  ),
  "libwww-perl/5.48" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Alexa robot",
    "type" => "R"
  ),
  "libwww-perl/5.50" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services",
    "type" => "R C P"
  ),
  "libwww-perl/5.52 FP/2.1" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast Search robot",
    "type" => "R"
  ),
  "libwww-perl/5.52 FP/4.0" => array(
    "robot" => "fast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast Search robot",
    "type" => "R"
  ),
  "libwww-perl/5.53" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services",
    "type" => "R C P"
  ),
  "libwww-perl/5.63" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Profile for You internet profiling (?)",
    "type" => "R C"
  ),
  "libwww-perl/5.64" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unknown link checking from Wanadoo.fr (193.253.33.0xx)",
    "type" => "R C"
  ),
  "libwww-perl/5.65" => array(
    "robot" => "libwww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amidalla search engine robot (62.241.33.0x)",
    "type" => "R"
  ),
  "libwww-perl/5.800" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SplatSearch robot (72.36.210.0x)",
    "type" => "R"
  ),
  "Liferea/1.0.0 (Linux; en_US.UTF-8; http://liferea.sf.net/)" => array(
    "robot" => "other",
    "browser" => "liferea",
    "os" => "linux",
    "description" => "Liferea - Linux feed reader",
    "type" => "B"
  ),
  "LightningDownload/1.0beta2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lightning Download manager",
    "type" => "D"
  ),
  "LightningDownload/1.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lightning Download manager",
    "type" => "D"
  ),
  "LightningDownload/1.0.0 [Accelerated x]" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lightning Download manager",
    "type" => "D"
  ),
  "Lincoln State Web Browser" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Link Valet Online 1.0" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Link Valet online link checking",
    "type" => "C"
  ),
  "link_check3.plx libwww-perl/5.65" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "link check 3 - Perl HTML link checker (from Perl for Web Site Management)",
    "type" => "C"
  ),
  "LinkAlarm/2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkalarm link validation",
    "type" => "C"
  ),
  "linkbot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Rpsoft 2000 Site-Crawler",
    "type" => "R"
  ),
  "Linkbot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkbot Pro link checking software",
    "type" => "C"
  ),
  "Linkbot 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkbot Pro link checking software",
    "type" => "C"
  ),
  "LinkCheck (linkcheck@inter7.com http://www.inter7.com/linkcheck)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkcheck - linkchecking tool for Unix/Linux",
    "type" => "C"
  ),
  "LinkLint-checkonly/2.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linklint - Perl html link checker",
    "type" => "C"
  ),
  "LinkLint-spider/2.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linklint - Perl html link checker",
    "type" => "C"
  ),
  "linknzbot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linknz - The Kiwi Search Engine (New Zealand)",
    "type" => "R"
  ),
  "LinkPimpin v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Link-Pimp web directory link checking",
    "type" => "C"
  ),
  "LinkProver 2.1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TafWeb link checking program",
    "type" => "C"
  ),
  "Links - http://gossamer-threads.com/scripts/links/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Links SQL directory management program",
    "type" => "C"
  ),
  "Links (0.9x; Linux 2.4.7-10 i686)" => array(
    "robot" => "other",
    "browser" => "links",
    "os" => "linux",
    "description" => "Links text browser for Unix & OS/2",
    "type" => "B"
  ),
  "Links (0.9xpre12; Linux 2.2.14-5.0 i686; 80x24)" => array(
    "robot" => "other",
    "browser" => "links",
    "os" => "linux",
    "description" => "Links text browser for Unix & OS/2",
    "type" => "B"
  ),
  "Links (2.0pre7; Linux 2.4.18 i586; x)" => array(
    "robot" => "other",
    "browser" => "links",
    "os" => "linux",
    "description" => "Links text browser for Unix & OS/2",
    "type" => "B"
  ),
  "Links 2.0 (http://gossamer-threads.com/scripts/links/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Links SQL directory management program",
    "type" => "R"
  ),
  "Links SQL (http://gossamer-threads.com/scripts/links-sql/)" => array(
    "robot" => "linkssql",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Links SQL directory management program",
    "type" => "R"
  ),
  "Links4US-Crawler, (+http://links4us.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Links4us ODP based directory link checking",
    "type" => "C"
  ),
  "LinkScan/11.0beta2 UnixShareware robot from Elsop.com (used by Indiafocus/Indiainfo)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Shareware robot from Elsop.com (used by Indiafocus/Indiainfo and others)",
    "type" => "R"
  ),
  "LinkScan/9.0g Unix" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Shareware robot from Elsop.com (used by Indiafocus/Indiainfo and others)",
    "type" => "R"
  ),
  "LinkScan/x.0 Unix" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Shareware robot from Elsop.com",
    "type" => "R"
  ),
  "LinksManager.com (http://linksmanager.com/linkchecker.html)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linksmanager bookmark checking",
    "type" => "C"
  ),
  "LinkSonar/1.35" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "LinkSonar (Japan) link checking tool",
    "type" => "C"
  ),
  "LinkSweeper/1.0" => array(
    "robot" => "linksweeper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Left Side Software's LinkSweeper (ceased) bookmark utility",
    "type" => "C"
  ),
  "LinkWalker" => array(
    "robot" => "linkwalker",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Seventwentyfour link checking robot",
    "type" => "C"
  ),
  "ListBidBot (freelance job spider http://listbid.com)<a href=http://listbid.com>Freelance</a>" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Listbid.com / Directnic.com link checking ?",
    "type" => "R C"
  ),
  "Llaut/1.0 (http://mnm.uib.es/~gallir/llaut/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "llaut robot - Universitat de les Illes Balears (Spain)",
    "type" => "R"
  ),
  "lmspider (lmspider@scansoft.com)" => array(
    "robot" => "lmspider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "lmspider from Scansoft (192.133.61.0x) - Web text collector",
    "type" => "R"
  ),
  "LNSpiderguy" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lexis-Nexis robot",
    "type" => "R"
  ),
  "LocalBot/1.0 ( http://www.localbot.co.uk/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "LocalBot company information collector",
    "type" => "R"
  ),
  "LocalcomBot/1.2.0 ( http://www.local.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Local.com local search robot (216.52.252.0xx)",
    "type" => "R"
  ),
  "Lockstep Spider/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lockstep (website content protection tool) user agent",
    "type" => "R"
  ),
  "Look.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GlobalQueue spider (64.40.105.0xx)",
    "type" => "R"
  ),
  "LotusDiscovery/1.0 (compatible; Mozilla 4.0; MSIE 4.01; Windows NT)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "windowsnt",
    "description" => "IBM Lotus Discovery Server",
    "type" => ""
  ),
  "Lotus-Notes/4.5 ( Windows-NT )" => array(
    "robot" => "other",
    "browser" => "lotus",
    "os" => "windowsnt",
    "description" => "Lotus Notes browser",
    "type" => "B"
  ),
  "luchs.at URL checker" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Luchs.at (Linux Wiki) link checking",
    "type" => "C"
  ),
  "Lunascape" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Lunascape IE based browser (Japan)",
    "type" => "B"
  ),
  "LWP::Simple/5.22" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module",
    "type" => "R"
  ),
  "LWP::Simple/5.36" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module",
    "type" => "R"
  ),
  "LWP::Simple/5.48" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module - Linkomatic robot",
    "type" => "R"
  ),
  "LWP::Simple/5.50" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module - secure-netz.de link checking (in conjunction w. libwww-perl/5.50)",
    "type" => "R"
  ),
  "LWP::Simple/5.51" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module - Inktomi (62.253.64.0) robot",
    "type" => "R"
  ),
  "LWP::Simple/5.53" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module - Only.com ",
    "type" => "R"
  ),
  "LWP::Simple/5.63" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl LWP:Collective module",
    "type" => "R"
  ),
  "LWP::Simple/5.803" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ThePlanet/jaja-jak-globusy.com Google Adsense refferer spam bot from 70.85.116.* / 70.84.128.0xx / 70.85.193.0xx",
    "type" => "S"
  ),
  "lwp-trivial/1.32" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ultimate Search / Smartdesk (no website) robot",
    "type" => "R"
  ),
  "lwp-trivial/1.34" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search4free robot",
    "type" => "R"
  ),
  "lwp-trivial/1.34" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search4free robot",
    "type" => "R"
  ),
  "lwp-trivial/1.35" => array(
    "robot" => "lwp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Expert HTML online source viewer",
    "type" => "B"
  ),
  "Lycos_Spider_(modspider)" => array(
    "robot" => "lycos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lycos spider",
    "type" => "R"
  ),
  "Lycos_Spider_(T-Rex)" => array(
    "robot" => "lycos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lycos spider",
    "type" => "R"
  ),
  "Lynx/2.6 libwww-FM/2.14" => array(
    "robot" => "other",
    "browser" => "lynx",
    "os" => "other",
    "description" => "Lynx 2.0 text mode browser",
    "type" => "B"
  ),
  "Lynx/2.8.3dev.9 libwww-FM/2.14 SSL-MM/1.4.1 OpenSSL/0.9.6" => array(
    "robot" => "other",
    "browser" => "lynx",
    "os" => "other",
    "description" => "Lynx 2.0 text mode browser",
    "type" => "B"
  ),
  "Lynx/2.8.4rel.1 libwww-FM/2.14 SSL-MM/1.4.1 OpenSSL/0.9.6c (human-guided@lerly.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lynx 2.0 text mode browser used as robot via cogentco.com",
    "type" => "R"
  ),
  "Piffany_Web_Scraper_v0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Piffany targeted search web spider",
    "type" => "R"
  ),
  "Piffany_Web_Spider_v0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Piffany targeted search web spider",
    "type" => "R"
  ),
  // Summary: Added 365 entries from http://www.psychedelix.com/agents/index.shtml?g_l
  // Adding http://www.psychedelix.com/agents/index.shtml?m
  "MapoftheInternet.com ( http://MapoftheInternet.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Map of the Internet visual search engine index robot",
    "type" => "R"
  ),
  "Mariner/5.1b [de] (Win95; I ;Kolibri gncwebbot)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kolibri.de robot",
    "type" => "R"
  ),
  "Marketwave Hit List" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pilot Hitlist web site analysis",
    "type" => "R"
  ),
  "Martini" => array(
    "robot" => "looksmart",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Looksmart directory page analysis",
    "type" => "R"
  ),
  "MARTINI" => array(
    "robot" => "looksmart",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Looksmart directory page analysis",
    "type" => "R"
  ),
  "Marvin v0.3" => array(
    "robot" => "marvin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Marvin Medhunt robot",
    "type" => "R"
  ),
  "MaSagool/1.0 (MaSagool; http://sagool.jp/; info@sagool.jp)" => array(
    "robot" => "sagool",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sagool search Japan robot",
    "type" => "R"
  ),
  "Mass Downloader 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mass Downloader download manager",
    "type" => "D"
  ),
  "MasterSeek" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Masterseek (Scandinavia) Beta business search ?",
    "type" => "R"
  ),
  "Mata Hari/2.00 " => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lexibot (exMataHari) search software",
    "type" => "R"
  ),
  "Matrix S.p.A. - FAST Enterprise Crawler 6 (Unknown admin e-mail address)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Virgilio Italy robot (212.48.11.0xx) using Fast Enterprise Search",
    "type" => "R"
  ),
  "maxomobot/dev-20051201 (maxomo; http://67.102.134.34:4047/MAXOMO/MAXOMObot.html; maxomobot@maxomo.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Maxomo multimedia search robot",
    "type" => "R"
  ),
  "McBot/5.001 (windows; U; NT4.0; en-us)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from McAfee Austria (80.123.144.0x)",
    "type" => ""
  ),
  "MediaCrawler-1.0 (Experimental)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Media Find crawler",
    "type" => "R"
  ),
  "Mediapartners-Google/2.1 ( http://www.googlebot.com/bot.html)" => array(
    "robot" => "mediapartners",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google AdSense robot",
    "type" => "R"
  ),
  "MediaSearch/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WWW.fi Media Search",
    "type" => "R"
  ),
  "MegaSheep v1.0 (www.searchuk.com internet sheep)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search UK robot",
    "type" => "R"
  ),
  "Mercator-1.0" => array(
    "robot" => "mercator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mercator crawler software (used by Altavista)",
    "type" => "R"
  ),
  "Mercator-2.0" => array(
    "robot" => "mercator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mercator crawler software (used by Altavista)",
    "type" => "R"
  ),
  "Mercator-Scrub-1.1" => array(
    "robot" => "mercator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mercator crawler software (used by Altavista)",
    "type" => "R"
  ),
  "MetagerBot/0.8-dev (MetagerBot; http://metager.de;  )" => array(
    "robot" => "metager",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MetaGer search robot (Germany)",
    "type" => "R"
  ),
  "MetaGer-LinkChecker" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MetaGer search robot (Germany)",
    "type" => "R"
  ),
  "MetaProducts Download Express/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Express download manager",
    "type" => "D"
  ),
  "Metaspinner/0.01 (Metaspinner; http://www.meta-spinner.de/; support@meta-spinner.de/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Metaspinner search robot - Germany",
    "type" => "R"
  ),
  "MFC Foundation Class Library 4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Microsoft Foundation Class Library - i.e. used for e-mail harvesting from 68.154.96.0x (bellsouth.net)",
    "type" => "S"
  ),
  "MFC_Tear_Sample" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Microsoft.com user agent",
    "type" => ""
  ),
  "MFHttpScan" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Advanced Site Crawler web site ripper and extractor",
    "type" => "D"
  ),
  "MicroBaz" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GigaBaz Brainbot (Germany) robot (213.139.152.0x)",
    "type" => "R"
  ),
  "Microsoft Data Access Internet Publishing Provider Cache Manager" => array(
    "robot" => "other",
    "browser" => "office",
    "os" => "windows",
    "description" => "MS Office 2000 acting as WebDAV client",
    "type" => "B P"
  ),
  "Microsoft Data Access Internet Publishing Provider DAV" => array(
    "robot" => "other",
    "browser" => "office",
    "os" => "windows",
    "description" => "MS Office 2000 acting as WebDAV client",
    "type" => "B"
  ),
  "Microsoft Small Business Indexer" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MS Small Business Server content indexer",
    "type" => "R"
  ),
  "Microsoft URL Control - 6.00.8000" => array(
    "robot" => "urlcontr",
    "browser" => NULL,
    "os" => NULL,
    "description" => "user agent looks for form-mail components (spam-bot)",
    "type" => "S"
  ),
  "Microsoft_Internet_Explorer_5.00.438 (fjones@isd.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Secure Computing SmartFilterWhere  / Bess web filter (192.55.214.0x)",
    "type" => "P"
  ),
  "MicrosoftPrototypeCrawler (How's my crawling? mailto:newbiecrawler@hotmail.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from Microsoft.com (131.107.163.0x)",
    "type" => ""
  ),
  "MIIxpc/4.2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "xpc-mii.net HTTP server message",
    "type" => "P"
  ),
  "minibot" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot via Korea Telecom (211.218.0xx.0xx)",
    "type" => ""
  ),
  "miniRank/1.6 (Website ranking; www.minirank.com; robot)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "mini- Rank website popularity tool",
    "type" => "C"
  ),
  "MiracleAlphaTest" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot via nec.co.jp Telecom (210.143.35.0x)",
    "type" => ""
  ),
  "Missauga Locate 1.0.0" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Missigua Locator 1.9" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Missouri College Browse" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Mister Pix II 2.02a" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Mister PiX picture finding software",
    "type" => "D R"
  ),
  "Mister PiX version.dll" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Mister PiX  picture finding software",
    "type" => "D R"
  ),
  "Misterbot-Nutch/0.7.1 (Misterbot-Nutch; http://www.misterbot.fr; admin@misterbot.fr)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Misterbot search France robot",
    "type" => "R"
  ),
  "Mizzu Labs 2.2" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot from Jasmine Internet - Bangkok (203.147.0.0x)",
    "type" => "S"
  ),
  "MJ12bot/vx.0.0 (http://majestic12.co.uk/bot.php?+)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Majestic-12 DSearch MJ12bot (Experimental distributed crawler)",
    "type" => "R"
  ),
  "MJ12bot/vx.0.0 (http://www.majestic12.co.uk/projects/dsearch/mj12bot.php)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Majestic-12 DSearch MJ12bot (Experimental distributed crawler)",
    "type" => "R"
  ),
  "MnogoSearch/3.2.0x" => array(
    "robot" => "mnogo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "mnoGoSearch (ex UdmSearch) software robot",
    "type" => "R"
  ),
  "Mo College 1.9" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown bad bot - maybe guestbook spamming or email harvesting",
    "type" => "S"
  ),
  "moget/x.0 (moget@goo.ne.jp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Goo Japan / Inktomi robot (210.173.179.0x)",
    "type" => "R"
  ),
  "mogimogi/1.0" => array(
    "robot" => "goo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Goo Japan / Inktomi robot (210.173.179.0x)",
    "type" => "R"
  ),
  "moiNAG 0.02" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "moiNag - net.art generator",
    "type" => "R D"
  ),
  "MojeekBot/0.0 (archi; http://www.mojeek.com/bot.html)" => array(
    "robot" => "mojeekbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mojeek Search Preview robot (217.155.205.0x)",
    "type" => "R"
  ),
  "MoonBrowser (version 0.41 Beta4)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Moonbrowser - IE based browser (Japan)",
    "type" => "B"
  ),
  "Morris - Mixcat Crawler ( http://mixcat.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MixCat robot s. also Felix",
    "type" => "R"
  ),
  "Motoricerca-Robots.txt-Checker/1.0 (http://tool.motoricerca.info/robots-checker.phtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Robots.txt online checker",
    "type" => "C"
  ),
  "Mouse-House/7.4 (spider_monkey spider info at www.mobrien.com/sm.shtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MPRM Group Ltd. Spider Monkey robot",
    "type" => "R"
  ),
  "MovableType/1.0" => array(
    "robot" => "movabletype",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Movable Type  web-based personal publishing system",
    "type" => "B"
  ),
  "mozDex/0.0x-dev (mozDex; http://www.mozdex.com/en/bot.html; spider@mozdex.com)" => array(
    "robot" => "mozdex",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mozdex Open search engine spider (65.98.100.2xx)",
    "type" => "R"
  ),
  "Mozi!" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Bell Nexxia / Sympatico Canada user robot & spoofed referer from diff. IPs",
    "type" => ""
  ),
  "Mozilla" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robots from 64.5.216.0x 66.98.36.0x 148.74.255.0x",
    "type" => ""
  ),
  "Mozilla (Mozilla@somewhere.com)" => array(
    "robot" => "somewhere",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.somewhere.com robot",
    "type" => "R"
  ),
  "Mozilla/1.10 [en] (Compatible; RISC OS 3.70; Oregano 1.10)" => array(
    "robot" => "other",
    "browser" => "oregano",
    "os" => "risc",
    "description" => "Oregano browser for RISC OS",
    "type" => "B"
  ),
  "Mozilla/1.22 (compatible; MSIE 2.0d; Windows NT)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "IE 2.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/1.22 (compatible; MSIE 5.01; PalmOS 3.0) EudoraWeb 2" => array(
    "robot" => "other",
    "browser" => "eudoraweb",
    "os" => "palm",
    "description" => "EudoraWeb 2.0 browser (Eudora Internet Suite) for PalmOS",
    "type" => "B"
  ),
  "Mozilla/2.0" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Dummy user agent - i.e. used by Namo Web Editor",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; AOL 3.0; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "macppc",
    "description" => "AOL Mac",
    "type" => "B"
  ),
  "Mozilla/2.0 (Compatible; AOL-IWENG 3.0; Win16)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windows31",
    "description" => "AOL Win 3.0",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; Ask Jeeves)" => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask Jeeves /Teoma robot",
    "type" => "R"
  ),
  "Mozilla/2.0 (compatible; Ask Jeeves/Teoma; http://about.ask.com/en/docs/about/webmasters.shtml) " => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask Jeeves /Teoma robot",
    "type" => "R"
  ),
  "Mozilla/2.0 (compatible; Ask Jeeves/Teoma; http://sp.ask.com/docs/about/tech_crawling.html)" => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask Jeeves /Teoma robot",
    "type" => "R"
  ),
  "Mozilla/2.0 (compatible; EZResult -- Internet Search Engine)" => array(
    "robot" => "directhit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Direct Hit Robot",
    "type" => "R"
  ),
  "Mozilla/2.0 (compatible; MS FrontPage 1.0)" => array(
    "robot" => "other",
    "browser" => "frontpage",
    "os" => "other",
    "description" => "MS Frontpage 1.0 web editor",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 2.1; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "IE 2.0 Mac Power PC",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.0; AK; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "IE 3.0 Win95",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.0; Windows 3.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows31",
    "description" => "IE 3.0 Win 3.1",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.02; Update a; AK; Windows NT)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "IE 3.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.02; Update a; AOL 3.0; Windows 95)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windows95",
    "description" => "IE 3.0 AOL Win95",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.0B; Win32)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows",
    "description" => "IE 3.0 WinXP",
    "type" => "B"
  ),
  "Mozilla/2.0 (compatible; NEWT ActiveX; Win32)" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Borland Delphi .OCX component used by WebCollector email harverster",
    "type" => "S"
  ),
  "Mozilla/2.0 (compatible; T-H-U-N-D-E-R-S-T-O-N-E)" => array(
    "robot" => "thunderstone",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Thunderstone's Webinator Web indexing program",
    "type" => "R"
  ),
  "Mozilla/2.0 compatible; Check&Get 1.1x (Windows 98)" => array(
    "robot" => "checkandget",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Check&Get bookmark and link checking tool",
    "type" => "C"
  ),
  "Mozilla/2.01 (Win16; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows31",
    "description" => "Netscape 2.0 Win3.0 International",
    "type" => "B"
  ),
  "Mozilla/2.02Gold (Win95; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows95",
    "description" => "Netscape 2.0 Gold Win95",
    "type" => "B"
  ),
  "Mozilla/3.0 (compatible)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Faked user agent for diff. purposes i.e.: - some download manager - E-mail harvesting",
    "type" => "S D"
  ),
  "Mozilla/3.0 (compatible; Fluffy the spider; http://www.searchhippo.com/; info@searchhippo.com)" => array(
    "robot" => "searchhippo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchhippo robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; HP Web PrintSmart 04b0 1.0.1.34)" => array(
    "robot" => "other",
    "browser" => "printsmart",
    "os" => "other",
    "description" => "HP Web PrintSmart (discontinued) - web page printing software",
    "type" => "B D"
  ),
  "Mozilla/3.0 (compatible; Indy Library)" => array(
    "robot" => "indylibrary",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Internet Direct Library for Borland (often used as e-mail address collector and mass mailing tool)",
    "type" => "S"
  ),
  "Mozilla/3.0 (compatible; Linkman)" => array(
    "robot" => "linkman",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Outertechs Linkman bookmark tool",
    "type" => "C"
  ),
  "Mozilla/3.0 (compatible; MuscatFerret/1.5.4; claude@euroferret.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Euroferret robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; MuscatFerret/1.5; olly@muscat.co.uk)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Euroferret robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; MuscatFerret/1.6.0; claude@euroferret.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Euroferret robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; netart generator/1.0; libwww-perl/5.64)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Netart Generator - script generated random websites",
    "type" => "R D"
  ),
  "Mozilla/3.0 (compatible; NetPositive/2.2)" => array(
    "robot" => "other",
    "browser" => "netpositive",
    "os" => "other",
    "description" => "NetPositive BEOS browser",
    "type" => "B"
  ),
  "Mozilla/3.0 (compatible; Opera/3.0; Windows 3.1) v3.1" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows31",
    "description" => "Opera 3.0 Win3.0",
    "type" => "B"
  ),
  "Mozilla/3.0 (compatible; Opera/3.0; Windows 95/NT4) 3.2" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows95",
    "description" => "Opera 3.0 Win95/NT",
    "type" => "B"
  ),
  "Mozilla/3.0 (compatible; PerMan Surfer 3.0; Win95)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perman Surfer  bookmark tool",
    "type" => "C"
  ),
  "Mozilla/3.0 (compatible; REL Software Web Link Validator 2.0)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Link Validator link validation software",
    "type" => "C"
  ),
  "Mozilla/3.0 (compatible; scan4mail (advanced version) http://www.peterspages.net/?scan4mail)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Scan4Mail online mail extraction service",
    "type" => ""
  ),
  "Mozilla/3.0 (compatible; ScollSpider; http://www.webwobot.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebWobot UK search engine robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; Web Link Validator 2.0)Web Link Validator http://www.relsoftware.com/ link validation software" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Link Validator link validation software",
    "type" => "C"
  ),
  "Mozilla/3.0 (compatible; WebCapture 1.0; Auto; Windows)" => array(
    "robot" => "webcapture",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xelios Web Capture (now Wysigot) website downloading tool (Discontinued)",
    "type" => "D"
  ),
  "Mozilla/3.0 (compatible; Webinator-DEV01.home.iprospect.com/2.56)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iprospect search engine positioning using Thunderstone's Webinator",
    "type" => "R"
  ),
  "Mozilla/3.0 (compatible; Webinator-indexer.cyberalert.com/2.56)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CyberAlert's Media Monitor using Thunderstone's Webinator",
    "type" => "R"
  ),
  "Mozilla/3.0 (Compatible;Viking/1.8)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Viking server user/client",
    "type" => "P"
  ),
  "Mozilla/3.0 (DreamPassport/3.0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "One of DC-Sakuras download manager user-agent names",
    "type" => "D"
  ),
  "Mozilla/3.0 (INGRID/3.0 MT; webcrawler@NOSPAMexperimental.net; http://aanmelden.ilse.nl/?aanmeld_mode=webhints)" => array(
    "robot" => "ilse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ilse Netherlands robot (62.69.178.0x)",
    "type" => "R"
  ),
  "Mozilla/3.0 (Liberate DTV 1.1)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Liberate DTV server suite / TV-emulator",
    "type" => "B P"
  ),
  "Mozilla/3.0 (Planetweb/2.100 JS SSL US; Dreamcast US)" => array(
    "robot" => "other",
    "browser" => "dreampassport",
    "os" => "dreamcast",
    "description" => "Planetweb 2.1 Browser (discontinued) for Dreamcast",
    "type" => "B"
  ),
  "Mozilla/3.0 (Slurp.so/Goo; slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.goo.ne.jp /Inktomi robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (Slurp/cat; slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos-NBCi) robot - 72.30.61.0x(x)",
    "type" => "R"
  ),
  "Mozilla/3.0 (Vagabondo/1.1 MT; webcrawler@NOSPAMwise-guys.nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Mozilla/3.0 (Vagabondo/1.0 MT; webagent@wise-guys.nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Mozilla/3.0 (Vagabondo/2.0 MT; webcrawler@NOSPAMexperimental.net; http://aanmelden.ilse.nl/?aanmeld_mode=webhints)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ilse Netherlands robot",
    "type" => "R"
  ),
  "Mozilla/3.0 (Vagabondo/2.0 MT; webcrawler@NOSPAMwise-guys.nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Mozilla/3.0 (Win16; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows31",
    "description" => "Netscape 3.0 Win3.0",
    "type" => "B"
  ),
  "Mozilla/3.0 (Win95; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows95",
    "description" => "Netscape 3.0 Win95",
    "type" => "B"
  ),
  "Mozilla/3.0 (WinNT; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windowsnt",
    "description" => "Netscape 3.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/3.0 (WorldGate Gazelle 3.5.1 build 11; FreeBSD2.2.8-STABLE)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "freebsd",
    "description" => "Netscape 3.0 FreeBSD",
    "type" => "B"
  ),
  "Mozilla/3.0 (X11; I; OSF1 V4.0 alpha)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "digital",
    "description" => "Netscape 3.0 OSF1 V4.0 alpha ",
    "type" => "B"
  ),
  "Mozilla/3.0 NAVIO_AOLTV (11; 13; Philips; PH200; 1; R2.0C36_AOL.0110OPTIK; R2.0.0139d_OPTIK)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "AOL Web TV",
    "type" => "B"
  ),
  "Mozilla/3.0 WebTV/1.2 (compatible; MSIE 2.0)" => array(
    "robot" => "other",
    "browser" => "webtv",
    "os" => "other",
    "description" => "WebTV",
    "type" => "B"
  ),
  "Mozilla/3.01 (Compatible; Links2Go Similarity Engine)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Links2Go robot",
    "type" => "R"
  ),
  "Mozilla/3.01 (compatible; Netbox/3.5 R92; Linux 2.2)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "linux",
    "description" => "Netgem Netbox cable modem TV Box Linux",
    "type" => "B"
  ),
  "Mozilla/3.01-C-MACOS8 (Macintosh; I; PPC)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "macppc",
    "description" => "Netscape 3.0 Mac",
    "type" => "B"
  ),
  "Mozilla/3.01Gold (X11; I; Linux 2.0.32 i486)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "linux",
    "description" => "Netscape 3.0 Linux",
    "type" => "B"
  ),
  "Mozilla/3.01Gold (X11; I; SunOS 5.5.1 sun4m)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "sun",
    "description" => "Netscape 3.0 SunOS",
    "type" => "B"
  ),
  "Mozilla/3.01SGoldC-SGI (X11; I; IRIX 6.3 IP32)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "irix",
    "description" => "Netscape 3.0 Irix",
    "type" => "B"
  ),
  "Mozilla/3.04 (compatible; NCBrowser/2.35; ANTFresco/2.17; RISC OS-NC 5.13 Laz1UK1309)" => array(
    "robot" => "other",
    "browser" => "ant",
    "os" => "risc",
    "description" => "NCBrowser ANT Fresco Browser Risc OS",
    "type" => "B"
  ),
  "Mozilla/3.04 (compatible;QNX Voyager 2.03B ;Photon)" => array(
    "robot" => "other",
    "browser" => "voyager",
    "os" => "photon",
    "description" => "QNX OS Voyager embedded browser",
    "type" => "B"
  ),
  "Mozilla/3.0 (I-Opener 1.1; Netpliance)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "I-Opener (was www.netpliance.com/) web PC",
    "type" => "B"
  ),
  "Mozilla/4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Mindset: Intent-driven Search (66.228.182.1xx)",
    "type" => "R"
  ),
  "Mozilla/4.0 (agadine3.0) www.agada.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Agada search (Germany) robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (Compatible); URLBase 6" => array(
    "robot" => "urlbase",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URLBase 6 bookmark manager",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible: AstraSpider V.2.1 : astrafind.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Astrafind! adult search robot (66.98.252.0x)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible;  Vagabondo/2.2; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible;  Vagabondo/4.0Beta; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; Advanced Email Extractor v2.0x)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Advanced Email Extractor e-mail collector (spam bot)",
    "type" => "S"
  ),
  "Mozilla/4.0 (compatible; Arachmo)" => array(
    "robot" => "arachmo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Arachmo Spider - web site file extraction tool",
    "type" => "D"
  ),
  "Mozilla/4.0 (compatible; B_L_I_T_Z_B_O_T)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blitzsuche Germany robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; BorderManager 3.0)" => array(
    "robot" => "bordermanager",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Novell Border Manager security suite",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; Cerberian Drtrs Version-3.2-Build-0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Content Control from Blue Coat",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; Check&Get 3.0; Windows NT)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Check&Get bookmark manager, web change monitor and archiver",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; ChristCrawler.com ChristCrawler@ChristCENTRAL.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Christcentral.com Christcrawler (was www.christcrawler.com)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; crawlx, crawler@trd.overture.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Marketing crawler (68.142.211.1xx)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; DepSpid/5.0x; +http://about.depspid.net)" => array(
    "robot" => "depspid",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DepSpid distributed web crawler for link dependencies",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; DnloadMage 1.0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download Mage download manager",
    "type" => "D"
  ),
  "Mozilla/4.0 (compatible; FastCrawler3 support-fastcrawler3@fast.no)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast/Alltheweb crawler",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; FDSE robot)" => array(
    "robot" => "fdse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fluid Dynamics Search Engine (FDSE) robot used by Abadoor.de",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; GPU p2p crawler http://gpu.sourceforge.net/search_engine.php)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GPU Distributed Search Engine crawler",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; grub-client-0.2.0; Crawl your stuff with http://grub.org)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grub open source crawler",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; grub-client-0.3.0; Crawl your own stuff with http://grub.org)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grub open source crawler",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; grub-client-2.0)" => array(
    "robot" => "grub",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Grub open source crawler used by Looksmart ( 64.241.242.0x)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; ibisBrowser)" => array(
    "robot" => "other",
    "browser" => "ibis",
    "os" => "mobile",
    "description" => "ibisBrowser Japanese mobile browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; ICS 1.2.000)" => array(
    "robot" => "ics",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Novell iChain Cool Solutions caching",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; IE-Favorites-Check-0.5)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IE Favorites Check - Bookmark manager",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; Iplexx Spider/1.0 http://www.iplexx.at)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iplexx Austria (webhosting company) logfile spamming bot",
    "type" => "S"
  ),
  "Mozilla/4.0 (compatible; Link Utility; http://net-promoter.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NetPromoter Link Utility link checking tool",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; Lotus-Notes/5.0; Windows-NT)" => array(
    "robot" => "other",
    "browser" => "lotus",
    "os" => "windowsnt",
    "description" => "Lotus Notes 5.0 browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.0; Windows NT; Site Server 3.0 Robot) ACR" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from American College of Radiology (ACR) running MS Site Server",
    "type" => "R C"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.0; Windows NT; Site Server 3.0 Robot) Indonesia Interactive" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Indonesia Interactive Web-portal robot on MS Site Server",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.0; Windows NT; Site Server 3.0 Robot) WebQuest Designs" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Webquestdesigns hosting",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; AOL 4.0; Windows 98)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windows98",
    "description" => "IE 4.0 AOL Win98",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "IE 4.0 Mac Power PC",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; MSIECrawler; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 4.0 URL check",
    "type" => "B C"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Vonna.com b o t)" => array(
    "robot" => "vonna",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vonna search robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "IE 4.0 Win95",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows CE; MSN Companion 2.0; 800x600; Compaq)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsce",
    "description" => "IE PDA Browser Windows CE",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows NT Windows CE)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsce",
    "description" => "IE PDA Browser Windows CE",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows NT)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "IE 4.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows NT; MS Search 4.0 Robot) Microsoft" => array(
    "robot" => "msnbot",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "diff. IPs / services i.e.: - Microsoft server information robot (see link) - Okanagan Internet Junction web filter (robot)",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; AOL 5.0; Windows 95; DigExt; Gateway2000; sureseeker.com)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windows95",
    "description" => "IE 5.0 AOL Win95 Sureseeker search plugin",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC; AtHome021)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "IE 5.0 Mac PowerPC AtHome user",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; NetNose-Crawler 2.0; A New Search Experience: http://www.netnose.com)" => array(
    "robot" => "netnose",
    "browser" => NULL,
    "os" => NULL,
    "description" => "www.netnose.com crawler",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Win32) via proxy gateway CERN-HTTPD/3.0 libwww/2.17" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WinXP via CERN httpd proxy server ",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) TrueRobot; 1.5" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Echo.com robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot BETA 1.2 (http://www.voila.com/)" => array(
    "robot" => "voila",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Voila.fr robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot; 1.6" => array(
    "robot" => "voila",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Voila.fr robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows ME) Opera 5.11 [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsme",
    "description" => "WinME Opera 5.0",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows ME; Link Checker 2.0.0x http://www.kyosoft.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Kyosoft's Link Checker",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows NT; DigExt; DTS Agent" => array(
    "robot" => "dtsagent",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Beijing Express Email Address Extractor via DHCP Data Transport Services (DTS)",
    "type" => "S"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows NT; Girafabot; girafabot at girafa dot com; http://www.girafa.com)" => array(
    "robot" => "girafabot",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "Girafa (browser plug-in) robot",
    "type" => "B R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; www.galaxy.com; www.psychedelix.com)" => array(
    "robot" => "galaxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Galaxy robot (63.121.41.0xx) ",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; www.galaxy.com; www.psychedelix.com/; http://www.galaxy.com/info/crawler.html)" => array(
    "robot" => "galaxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Galaxy robot (63.121.41.0xx)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; YANDEX)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yandex Search Russia link checking (213.180.206.2xx)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.01; Windows 95) via <B>Avirt Gateway Server</B> v4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Avirt Gateway proxy server",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0) (samualt9@bigfoot.com)" => array(
    "robot" => "metacarta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Metacarta.com (66.28.0x.0xx) robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; NetCaptor 6.5.0RC1)" => array(
    "robot" => "other",
    "browser" => "netcaptor",
    "os" => "windows2k",
    "description" => "NetCaptor IE browser addon",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; AOL 4.0; Windows 98; GoBeez (www.gobeez.com))" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Gobeez starting page plugin",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 95; Transmission Segment; Hotbar 2.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "IE 5.5 Win95 Hotbar plug-in",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Crazy Browser 1.0.0)" => array(
    "robot" => "other",
    "browser" => "crazybrowser",
    "os" => "windows98",
    "description" => "Crazy Browser - IE based tabbed Browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; KITV4.7 Wanadoo)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Wanadoo Internet services",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; SAFEXPLORER TL)" => array(
    "robot" => "other",
    "browser" => "safexplorer",
    "os" => "windows98",
    "description" => "Safexplorer (safexplorer.com - site is offline) kids browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; SYMPA; Katiesoft 7; SimulBrowse 3.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows98",
    "description" => "Katiesoft Scroll (ex www.katiesoft.com now discarded) & SimulBrowse (ex www.simulbrowse.com now dead) IE browser plugins",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; BTinternet V8.1)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "windowsme",
    "description" => "Windows ME BTOpenworld Internet services",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; MSIECrawler)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows",
    "description" => "Windows ME Internet Explorer URL check",
    "type" => "B C"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; obot)" => array(
    "robot" => "cobion",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cobion Germany Brand Protection Services robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; QXW03018)" => array(
    "robot" => "cobion",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cobion Germany Brand Protection Services robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0) Active Cache Request" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => "IE 5.5 Win2000 / user agent",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0) Fetch API Request" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Maybe: - MS Internet Security & Acceleration Server (ISA) cache refreshing request (see link) or - IE 5.5 Win2000 probably with some (website) API request component (see 2nd link) - suspected as email-harvester / site scanning tool (see http://www.byte.com/documents/s=493/byt20010208s0001/index.htm",
    "type" => "P S ?"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; .NET CLR 1.0.3705)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => "IE 5.5 Win2000 with MS.NET SDK",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; AIRF)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => "IE 5.5 Win2000 / user agent w. AI RoboForm (AIRF) password manager",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; AspTear 1.5)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "AspTear URL fetching program component / Download32.com spider",
    "type" => "R D"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; N_o_k_i_a)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Nokia.com network",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; T312461) RPT-HTTPClient/0.3-3E" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown Object Sciences Corp. robot using the HTTPClient",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0 compatible; Asterias Crawler v4; +http://www.singingfish.com/help/spider.html; webmaster@singingfish.com); SpiderThread  Revision: 3.10" => array(
    "robot" => "singingfish",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Singingfish media spider (64.12.186.2xx) via AOL search",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; AOL 9.0; Windows NT 5.1; SV1; HbTools 4.7.2)" => array(
    "robot" => "other",
    "browser" => "aol",
    "os" => "windowsxp",
    "description" => "Hotbar IE graphical skin",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Skampy/0.9.0 [en]" => array(
    "robot" => "skaffe",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Skaffe.com directory link checker",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; TargetSeek/1.0; +http://www.targetgroups.net/TargetSeek.html)" => array(
    "robot" => "targetseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TargetSeek Crawler concerning electronics industry product announcements",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Win32) WebWasher 3.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "IE 6.0 WebWasher ad filter",
    "type" => "B P"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98) REL Software Web Link Validator 2.0)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Link Validator link validation software",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98) Web Link Validator 2.0)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Link Validator link validation software",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Net M@nager V3.02 - www.vinn.com.au)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows98",
    "description" => "IE 6.0 Netmanager IE add-on",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; support@illumit.com; http://www.illumit.com/Products/weblight/)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebLight web analyzer & link checker",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Win 9x 4.90; http://www.Abolimba.de)" => array(
    "robot" => "other",
    "browser" => "abolimba",
    "os" => "windowsme",
    "description" => "Abolimba Multibrowser - IE based browser",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; .NET CLR 1.1.4322; Lunascape 2.1.3)" => array(
    "robot" => "other",
    "browser" => "lunascape",
    "os" => "windows2k",
    "description" => "Lunascape IE based browser (Japan)",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; ODP entries t_st; http://tuezilla.de/t_st-odp-entries-agent.html)" => array(
    "robot" => "tuezilla",
    "browser" => NULL,
    "os" => NULL,
    "description" => "T�illa (Germany) - ODP link checking using Robozilla",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; ODP links test; http://tuezilla.de/test-odp-links-agent.html)" => array(
    "robot" => "tuezilla",
    "browser" => NULL,
    "os" => NULL,
    "description" => "T�illa (Germany) - ODP link checking using Robozilla",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; ZoomSpider.net bot; .NET CLR 1.1.4322)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ZoomSpider.Net indexing robot for several directorys",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1) (dns_admin@c-a-s-h.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from 64.246.44.0x",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Crayon Crawler; snprtz|T04056566514940; (R1 1.5))" => array(
    "robot" => "getnetwise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetNetWise Crayon Crawler web filter",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Deepnet Explorer)" => array(
    "robot" => "other",
    "browser" => "deepnet",
    "os" => "windowsxp",
    "description" => "Deepnet Explorer - IE based browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; heritrix/1.3.0 http://www.cs.washington.edu/research/networking/websys/)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix Internet Archive's open-source web project used by Analysis Projects at UW",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Hotbar 3.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 6x WinXP Hotbar plug-in",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; iOpus-I-M)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 6x WinXP iOpus Internet Macros - Internet-based macro recorder ",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; iRider 2.21.1108; FDM)" => array(
    "robot" => "other",
    "browser" => "irider",
    "os" => "windowsxp",
    "description" => "iRider - IE based browser / Free Download Manager (FDM)",
    "type" => "B D"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KKman3.0)" => array(
    "robot" => "other",
    "browser" => "kkman",
    "os" => "windowsxp",
    "description" => "KKman http://www.kkman.com/ - Japanese IE based browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; MathPlayer2.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 6x WinXP MathPlayer mathematical notation plugin",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Maxthon) " => array(
    "robot" => "other",
    "browser" => "maxthon",
    "os" => "windowsxp",
    "description" => "Maxton (ex MyIE2) - IE based browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; PeoplePal 3.0; MSIECrawler)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "TODO",
    "description" => "IE 6x WinXP peoplepc online PeoplePal IE toolbar",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Q312461; IOpener Release 1.1.04)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 6x WinXP / I-Opener (was www.netpliance.com/) web PC",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SIMBAR Enabled; InfoPath.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "SimBar IE toolbar for accessing \"The Sims\" sites / Infopath IE form & spreadsheet plugin",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; StumbleUpon.com 1.760; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 6x WinXP Stumble Upon IE toolbar",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; DX-Browser 5.0.0.0)" => array(
    "robot" => "other",
    "browser" => "dxbrowser",
    "os" => "windowsxp",
    "description" => "DX-Browser - German IE based browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; FunWebProducts; ezPeer+ v1.0 Beta (0.4.1.98); ezPeer+ v1.0 (0.5.0.00); .NET CLR 1.1.4322; MSIECrawler)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "ezPeer+ P2P IE addon",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; IBP; .NET CLR 1.1.4322)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Axandra IBP website promotion software ?",
    "type" => "C B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; MRA 4.3 (build 01218))" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "MRA = Mail.ru Agent - Instant Messenger / VoIP",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT; MS Search 4.0 Robot)" => array(
    "robot" => "msnbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MSN Search robot (207.46.89.0x)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; bgft)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "IE 7.0 - WinXP",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; NaverBot/1.0; http://help.naver.com/delete_main.asp)" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Search Korea Naverbot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; Netcraft Web Server Survey)" => array(
    "robot" => "netcraft",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netcraft webserver info",
    "type" => "R C"
  ),
  "Mozilla/4.0 (compatible; NetPromoter Spider;http://www.net-promoter.com/)" => array(
    "robot" => "netpromoter",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NetPromoter Link Utility link checking tool ",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; Opera/3.0; Windows 4.10) 3.51 [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsnt",
    "description" => "Opera 3.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; Powermarks/3.5; Windows 95/98/2000/NT)" => array(
    "robot" => "powermarks",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Powermarks bookmark manager",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; SiteKiosk 4.0; MSIE 5.0; Windows 98; SiteCoach 1.0)" => array(
    "robot" => "other",
    "browser" => "sitekiosk",
    "os" => "windows98",
    "description" => "SiteKiosk public terminal browser",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; SpeedySpider; www.entireweb.com)" => array(
    "robot" => "entireweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Entireweb Search Speedyspider (62.13.25.0xx)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; SPENG)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteProbe - website status checking",
    "type" => "R C"
  ),
  "Mozilla/4.0 (compatible; SuperCleaner 2.0x; Windows 98)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Super Cleaner privacy tool (bookmark checking)",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; Synapse)" => array(
    "robot" => "synapse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Synapse - Apache web service for processing XML documents",
    "type" => "P"
  ),
  "Mozilla/4.0 (compatible; Win32; WinHttp.WinHttpRequest.5)" => array(
    "robot" => "winhttp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Windows HTTP Services (WinHTTP / XML-parser)",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; www.euro-directory.com; urlchecker1.0)" => array(
    "robot" => "eurodirectory",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Euro Directory (German / Austrian) directory link checking",
    "type" => "R C"
  ),
  "Mozilla/4.0 (compatible; www.galaxy.com)" => array(
    "robot" => "galaxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Galaxy robot",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; www.linkguard.com Linkguard Online 1.0; Windows NT)" => array(
    "robot" => "linkguard",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linkguard.com link validation (service is offline)",
    "type" => "C"
  ),
  "Mozilla/4.0 (compatible; Y!J; for robot study; keyoshid)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Japan robot (203.141.52.)",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; Yahoo Japan; for robot study; kasugiya)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Japan robot (202.93.76.0x)",
    "type" => "R"
  ),
  "Mozilla/4.0 (fantomBrowser)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "spoofed referer by Fantomaster (Multiblocker) anonymity products",
    "type" => "P"
  ),
  "Mozilla/4.0 (fantomCrew Browser)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "spoofed referer by Fantomaster (Multiblocker) anonymity products",
    "type" => "P"
  ),
  "Mozilla/4.0 (hhjhj@yahoo.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from - 64.57.223.40 - 66.28.233.0xx (cogentco.com)",
    "type" => ""
  ),
  "Mozilla/4.0 (MobilePhone PM-8200/US/1.0) NetFront/3.0 MMP/2.0" => array(
    "robot" => "other",
    "browser" => "netfront",
    "os" => "mobile",
    "description" => "NetFront (v3.0) for Pocket PC (here on Sanyo PM-8200 cell phone)",
    "type" => "B"
  ),
  "Mozilla/4.0 (MobilePhone SCP-5500/US/1.0) NetFront/3.0 MMP/2.0 (compatible; Googlebot/2.1; http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot from 66.249.66.0xx ",
    "type" => "R"
  ),
  "Mozilla/4.0 (MobilePhone SCP-5500/US/1.0) NetFront/3.0 MMP/2.0 FAKE (compatible; Googlebot/2.1; http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot from 66.249.66.0xx ",
    "type" => "R"
  ),
  "Mozilla/4.0 (Mozilla; http://www.mozilla.org/docs/en/bot.html; master@mozilla.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Mozilla.org",
    "type" => "R"
  ),
  "Mozilla/4.0 (Sleek Spider/1.2)" => array(
    "robot" => "asinfo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ASI - Any Search Info robot",
    "type" => "R"
  ),
  "Mozilla/4.0 [en] (Ask Jeeves Corporate Spider)" => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ask / Ask Jeeves robot",
    "type" => "R"
  ),
  "Mozilla/4.0 compatible FurlBot/Furl Search 2.0 (FurlBot; http://www.furl.net; wn.furlbot@looksmart.net)" => array(
    "robot" => "looksmart",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Furl (Looksmart) online bookmark tool robot",
    "type" => "R"
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 (wn.zyborg@looksmart.net; http://www.WISEnutbot.com)" => array(
    "robot" => "zyborg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wisenut robot",
    "type" => "R"
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 (ZyBorg@WISEnutbot.com; http://www.WISEnutbot.com)" => array(
    "robot" => "zyborg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wisenut robot",
    "type" => "R"
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 Dead Link Checker (wn.zyborg@looksmart.net; http://www.WISEnutbot.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wisenut robot",
    "type" => "R"
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 for Homepage (ZyBorg@WISEnutbot.com; http://www.WISEnutbot.com)" => array(
    "robot" => "zyborg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wisenut robot",
    "type" => "R"
  ),
  "Mozilla/4.0 efp@gmx.net" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from 66.230.140.0x (argon.oxeo.com) maybe an e-mail collector",
    "type" => "S"
  ),
  "Mozilla/4.0 WebTV/2.6 (compatible; MSIE 4.0)" => array(
    "robot" => "other",
    "browser" => "webtv",
    "os" => "other",
    "description" => "WebTV",
    "type" => "B"
  ),
  "Mozilla/4.0(compatible; Zealbot 1.0)" => array(
    "robot" => "zealbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "LookSmart spider",
    "type" => "R"
  ),
  "Mozilla/4.0_(compatible;_MSIE_5.0;_Windows_95)_TrueRobot/1.4 libwww/5.2.8" => array(
    "robot" => "echo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Echo.com robot",
    "type" => "R"
  ),
  "Mozilla/4.0_(compatible;_MSIE_5.0;_Windows_95)_VoilaBot/1.6 libwww/5.3.2" => array(
    "robot" => "voila",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Voila.fr robot",
    "type" => "R"
  ),
  "Mozilla/4.01 [en](Win95;I)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some download manager spoofing Netscape 4.01",
    "type" => "D"
  ),
  "Mozilla/4.02 [en] (X11; I; SunOS 5.6 sun4u)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "sun",
    "description" => "Netscape 4.0 SunOS 5.6",
    "type" => "B"
  ),
  "Mozilla/4.04 (compatible; Dulance bot; +http://www.dulance.com/bot.jsp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dulance Bot - Dulance automated price comparison engine",
    "type" => "R"
  ),
  "Mozilla/4.04 [en] (X11; I; HP-UX B.10.20 9000/712)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "hpux",
    "description" => "Netscape 4.0 HP-Unix",
    "type" => "B"
  ),
  "Mozilla/4.04 [en] (X11; I; IRIX 5.3 IP22)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "irix",
    "description" => "Netscape 4.0 IRIX",
    "type" => "B"
  ),
  "Mozilla/4.05 (Macintosh; I; 68K Nav)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "mac",
    "description" => "Netscape 4.0 Macintosh 68k",
    "type" => "B"
  ),
  "Mozilla/4.05 (Macintosh; I; PPC Nav)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "macppc",
    "description" => "Netscape 4.0 Macintosh PowerPC",
    "type" => "B"
  ),
  "Mozilla/4.05 [en] (X11; I; SunOS 4.1.4 sun4m)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "sun",
    "description" => "Netscape 4.0 SunOS 4.1.4",
    "type" => "B"
  ),
  "Mozilla/4.08 [en] (Win98; U ;Nav)\" [Spaces are not mistakes]Help->About: \"Version 4.08 [en]-98306\"" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Someone copied the help function in the referrer field ?",
    "type" => ""
  ),
  "Mozilla/4.08 [en] (WinNT; U)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windowsnt",
    "description" => "Netscape 4.0 WinNT",
    "type" => "B"
  ),
  "Mozilla/4.5 (compatible; HTTrack 3.0x; Windows 98)" => array(
    "robot" => "httrack",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTTrack Offline Browser",
    "type" => "B D"
  ),
  "Mozilla/4.5 (compatible; iCab 2.5.3; Macintosh; I; PPC)" => array(
    "robot" => "other",
    "browser" => "icab",
    "os" => "macppc",
    "description" => "iCab MAC Web browser MAC Power PC",
    "type" => "B"
  ),
  "Mozilla/4.5 (compatible; OmniWeb/4.0.5; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "omniweb",
    "os" => "macppc",
    "description" => "OmniWeb 4.0.0 Mac browser",
    "type" => "B"
  ),
  "Mozilla/4.5 (compatible; OmniWeb/4.1-beta-1; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "omniweb",
    "os" => "macppc",
    "description" => "OmniWeb 4.0.0 Mac browser",
    "type" => "B"
  ),
  "Mozilla/4.5 [en]C-CCK-MCD {RuralNet} (Win98; I)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "RuralNet Internet Services",
    "type" => "B"
  ),
  "Mozilla/4.5 RPT-HTTPClient/0.3-2" => array(
    "robot" => "httpclient",
    "browser" => NULL,
    "os" => NULL,
    "description" => "different IPs using the HTTPClient library (mostly link checking)",
    "type" => "C R"
  ),
  "Mozilla/4.5b1 [en] (X11; I; Linux 2.0.35 i586)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "linux",
    "description" => "Netscape 4.0 Linux",
    "type" => "B"
  ),
  "Mozilla/4.6 [en] (http://www.cnet.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cnet robot for Search.com (216.239.114.0x)",
    "type" => "R"
  ),
  "Mozilla/4.61 [de] (OS/2; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "os2",
    "description" => "Netscape 4.0 OS/2",
    "type" => "B"
  ),
  "Mozilla/4.7" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nameprotect (12.148.196.128 - 12.148.196.255) snoopbot",
    "type" => "R"
  ),
  "Mozilla/4.7 (compatible; http://eidetica.com/spider)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eidetica earch and text mining spider",
    "type" => "R"
  ),
  "Mozilla/4.7 (compatible; Intelliseek; http://www.intelliseek.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Intelliseek (64.158.138.0x) robot",
    "type" => "R"
  ),
  "Mozilla/4.7 (compatible; OffByOne; Windows 98) Webster Pro V3.2" => array(
    "robot" => "other",
    "browser" => "offbyone",
    "os" => "windows98",
    "description" => "OffByOne Browser",
    "type" => "B"
  ),
  "Mozilla/4.7 (compatible; Whizbang)" => array(
    "robot" => "whizbang",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WhizBang! Labs information extraction robot",
    "type" => "R"
  ),
  "Mozilla/4.7 (compatible; WhizBang; http://www.whizbang.com/crawler)" => array(
    "robot" => "whizbang",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WhizBang! Labs information extraction robot",
    "type" => "R"
  ),
  "Mozilla/4.7 [en](BecomeBot@exava.com)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Becomecom shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/4.7 [en](Exabot@exava.com)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exabot - exava (now Becomecom) shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/4.7 [en]C-CCK-MCD {Yahoo;YIP052400} (Win95; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows95",
    "description" => "Netscape with Yahoo Toolbar ?",
    "type" => ""
  ),
  "Mozilla/4.72 [en] (BACS http://www.ba.be)" => array(
    "robot" => "babe",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.ba.be robot",
    "type" => "R"
  ),
  "Mozilla/4.72C-CCK-MCD Caldera Systems OpenLinux [en] (X11; U; Linux 2.2.14 i686)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "linux", //TODO: maybe add the caledra distribution
    "description" => "Netscpape 4.7x Caldera Open Linux Pentium III",
    "type" => "B"
  ),
  "Mozilla/4.75C-ja [ja] (X11; U; OSF1 V5.1 alpha)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "tru64",
    "description" => "Netscape 4.7x Japan OSF1 alpha",
    "type" => "B"
  ),
  "Mozilla/4.76 (Windows 98; U) Opera 5.12 [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows98",
    "description" => "Opera 5.0 Win 98",
    "type" => "B"
  ),
  "Mozilla/4.76 [en] (X11; U; FreeBSD 4.4-STABLE i386)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "freebsd",
    "description" => "Netscape 4.7x FreeBSD",
    "type" => "B"
  ),
  "Mozilla/4.76 [en] (X11; U; SunOS 5.7 sun4u)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "sun",
    "description" => "Netscape 4.7x SunOS",
    "type" => "B"
  ),
  "Mozilla/4.77C-SGI [en] (X11; U; IRIX 6.5 IP32)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "irix",
    "description" => "IRIX 6.5",
    "type" => "B"
  ),
  "Mozilla/5.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GigaMedia / NTT DoCoMo robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (+http://www.sli-systems.com/) Mammoth/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SLI Systems mammoth robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (Clustered-Search-Bot/1.0; support@clush.com; http://www.clush.com/)" => array(
    "robot" => "clush",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Clush search robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; AnsearchBot/1.0; +http://www.ansearch.com.au/)" => array(
    "robot" => "ansearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ansearch Australian search robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; archive.org_bot/1.5.0-200506132127 +http://crawler.archive.org) Hurricane Katrina" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix - The Internet Archive's open-source crawler",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BanBots/2.0b; Fetch; +http://www.banbots.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Project BanBots Perl script robot",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; BecomeBot/1.23; http://www.become.com/webmasters.html)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Become.com shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BecomeBot/1.0x; MSIE 6.0 compatible; http://www.become.com/webmasters.html)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Become.com shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BecomeBot/2.0beta; http://www.become.com/webmasters.html)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Become.com shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BecomeBot/2.0; MSIE 6.0 compatible; http://www.become.com/site_owners.html)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Become.com shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BecomeJPBot/2.3; MSIE 6.0 compatible; +http://www.become.co.jp/site_owners.html)" => array(
    "robot" => "become",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BecomeBot - Become.com shopping search (64.124.85.0x(x))",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; BuzzRankingBot/1.0; +http://www.buzzrankingbot.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BuzzRanking internet content analysis",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Charlotte/1.0b; charlotte@betaspider.com)" => array(
    "robot" => "charlotte",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Charlotte indexing spider for an upcoming application",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Crawling jpeg; http://www.yama.info.waseda.ac.jp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown graphics crawler or downloading agent from Yamana Laboratory - Waseda Univerity Japan (133.9.238.0x)",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Custo 3 (Netwu.com); Windows NT 5.1)" => array(
    "robot" => "custo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Custo web site spidering tool (link checking)",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; DNS-Digger/1.0; +http://www.dnsdigger.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "DNS-Digger - DNS server neighbourhood search",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; EARTHCOM.info/2.01; http://www.earthcom.info)" => array(
    "robot" => "earthcom",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Earthcom (Czech Republic) search robot (194.108.39.0x)",
    "type" => "R"
  ),
  "mozilla/5.0 (compatible; genevabot http://www.healthdash.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Geneva Single-Site Search Engine used by Healthdash health search",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Googlebot/2.1; http://www.google.com/bot.html)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google robot",
    "type" => "R"
  ),
  "mozilla/5.0 (compatible; heritrix/1.0.4 http://innovationblog.com)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot using Heritrix",
    "type" => "R"
  ),
  "mozilla/5.0 (compatible; heritrix/1.3.0 http://archive.crawler.org)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix Internet Archive's open-source web project ",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.4.0 +http://www.chepi.net)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Chepi Beta search Spain (194.116.240.1xx) using Heritrix",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.4t http://www.truveo.com/)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Truveo data mining robot using Heritrix",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.5.0 http://www.l3s.de/~kohlschuetter/projects/crawling/)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "L3S WebCrawling Project (Germany) using Heritrix",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.5.0-200506231921 http://pandora.nla.gov.au/crawl.html)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pandora Internet Archive crawler (Australia) using Heritrix",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.6.0 http://www.worio.com/)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WORIO (beta) search for computer scientists and programmers using Heritrix open-source crawler",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; heritrix/1.8.0 +http://www.accelobot.com)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Accelobot - Accelovation Market Discovery software robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; http://www.IsMySiteUp.Net/bot/ )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IsMySiteUp? - Online website monitoring service",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; http://www.UptimeAuditor.com/bot/ )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UptimeAuditor - real time web monitoring",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; InterseekWeb/3.0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Najdi.si (Slovenia) search using Interseek/Web Interseek/API Search Engine",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Konqueror/2.0.1; X11); Supports MD5-Digest; Supports gzip encoding" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "other",
    "description" => "Konqueror 2.0.0 X11",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; Konqueror/2.1.1; X11)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "other",
    "description" => "Konqueror 2.1.0 X11",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; Konqueror/2.2.2)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "other",
    "description" => "Konqueror 2.2.0",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; Konqueror/2.2.2; Linux 2.4.14-xfs; X11; i686)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Konqueror 2.2.0 Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; LemSpider 0.1)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lemur Consulting LemIR spider",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; LinksManager.com_bot http://linksmanager.com/linkchecker.html)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Linksmanager.com online link checking service",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; MojeekBot/2.0; http://www.mojeek.com/bot.html)" => array(
    "robot" => "mojeekbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mojeek Search Preview robot (217.155.205.0x)",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; OnetSzukaj/5.0; http://szukaj.onet.pl)" => array(
    "robot" => "onet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "onet.pl Szukaj (Search) robot (213.180.128.1xx)",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; PEAR HTTP_Request class; http://feed.moo.jp/)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "FeedMo feed search (Japan) using Pear HTTP",
    "type" => "C ?"
  ),
  "Mozilla/5.0 (compatible; pogodak.ba/3.0)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pogodak search (Slovenia) robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; robtexbot/1.0; http://www.robtex.com/ )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "robtex - Multi-RBL check and AS-numbercheck",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; Scrubby/2.2;  http://www.scrubtheweb.com/)" => array(
    "robot" => "scrubby",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Scrub the web robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; ShunixBot/1.0; http://www.shunix.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Shunixbot (France) beta / test semantic web indexing robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; SpurlBot/0.2) " => array(
    "robot" => "spurlbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Spurl.net bookmark service & search engine (84.40.30.0xx)",
    "type" => "R C"
  ),
  "Mozilla/5.0 (compatible; SYCLIKControl/LinkChecker;)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Syclik Control web content management system",
    "type" => "R C"
  ),
  "Mozilla/5.0 (compatible; Theophrastus/1.0; http://users.cs.cf.ac.uk/N.A.Smith/theophrastus.php)" => array(
    "robot" => "theophrastus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Theophrastus Internet Spider for a basic search engine project",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Vagabondo/2.1; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Windows NT 5.0; phpwebbrainBot/0.1 - http://www.monsterli.ch/phpwebbrain/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "phpwebbrain online bookmark service (Germany)",
    "type" => "C"
  ),
  "Mozilla/5.0 (compatible; Yahoo! DE Slurp; http://help.yahoo.com/help/us/ysearch/slurp)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo / Inktomi search robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi robot for Yahoo (via 66.196.0x.0xx)",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible;archive.org_bot/1.7.1; collectionId=316; Archive-It; +http://www.archive-it.org)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Heritrix - The Internet Archive's open-source crawler (207.241.225.2xx)",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible;archive.org_bot/heritrix-1.9.0-200608171144 +http://pandora.nla.gov.au/crawl.html)" => array(
    "robot" => "heritrix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wayback Machine Internet Archive crawler",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible;MAINSEEK_BOT)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mainseek search (Poland) robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.0.1) Gecko/20021219 Chimera/0.6 " => array(
    "robot" => "other",
    "browser" => "chimera",
    "os" => "macosx",
    "description" => "Chimera browser (Mozilla/Gecko engine) - now Camino Mac PowerPC",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.0.1) Gecko/20030306 Camino/0.7" => array(
    "robot" => "other",
    "browser" => "camino",
    "os" => "macosx",
    "description" => "Camino browser (Mozilla/Gecko engine) - ex Chimera Mac PowerPC",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US) AppleWebKit/12 (KHTML like Gecko) OmniWeb/v500.00" => array(
    "robot" => "other",
    "browser" => "omniweb",
    "os" => "macosx",
    "description" => "OmniWeb 5.0.0 Mac OS X browser",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-us) AppleWebKit/123.0 (KHTML like Gecko) Safari/12x.0" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "macosx",
    "description" => "Safari 1.2x browser (Mozilla/Gecko engine) MAC OS X",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC; en-US; rv:0.9.2) Gecko/20010726 Netscape6/6.1" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "macppc",
    "description" => "Netscape 6.0 Mac PowerPC",
    "type" => "B"
  ),
  "Mozilla/5.0 (research@mediatrec.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from gw.ocg-corp.com",
    "type" => ""
  ),
  "Mozilla/5.0 (Sage)" => array(
    "robot" => "other",
    "browser" => "sage",
    "os" => "other",
    "description" => "Sage - RSS and Atom feed reader extension for Mozilla Firefox",
    "type" => "B"
  ),
  "Mozilla/5.0 (Slurp/cat; slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos - NBCi etc.) robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (Slurp/si; slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos - NBCi etc.) robot",
    "type" => "R"
  ),
  "Mozilla/5.0 (SunOS 5.8 sun4u; U) Opera 5.0 [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "sun",
    "description" => "Opera 5.0 SunOS",
    "type" => "B"
  ),
  "Mozilla/5.0 (Version: xxxx Type:xx)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spambot from Romania (82.208.139.1xx & 86.123.65.0x) - Maybe email harvesting",
    "type" => "S"
  ),
  "Mozilla/5.0 (wgao@genieknows.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GenieKnows.com search robot (64.5.245.0x / 64.5.220.0xx)",
    "type" => "R"
  ),
  "Mozilla/5.0 (Windows; U; Win98; en-US; rv:0.9.2) Gecko/20010726 Netscape6/6.1" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows98",
    "description" => "Netscape 6.0 Win98",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Win98; en-US; rv:x.0x) Gecko/20030423 Firebird Browser/0.6" => array(
    "robot" => "other",
    "browser" => "firebird",
    "os" => "windows98",
    "description" => "Firebird browser (Mozilla/Gecko engine) - ex Phoenix Win98",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Win9x; en; Stable) Gecko/20020911 Beonex/0.8.1-stable" => array(
    "robot" => "other",
    "browser" => "beonex",
    "os" => "windows",
    "description" => "Beonex Communicator browser (Mozilla/Gecko engine)",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.7) NimbleCrawler 1.11 obeys UserAgent NimbleCrawler For problems contact: crawler_at_dataalchemy.com" => array(
    "robot" => "nimble",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Healthline health related search robot (72.5.115.0x)",
    "type" => "R"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.0.0) Gecko/20041107 Firefox/x.0" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => "Firefox browser (Mozilla/Gecko engine) - ex Firebird WinXP",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.000) Gecko/20030504 Mozilla Firebird/0.6" => array(
    "robot" => "other",
    "browser" => "firebird",
    "os" => "windowsxp",
    "description" => "Firebird browser (Mozilla/Gecko engine) - ex Phoenix WinXP",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.000) Gecko/20041027 Mnenhy/0.6.0.104" => array(
    "robot" => "other",
    "browser" => "mnenhy",
    "os" => "windowsxp",
    "description" => "Mnenhy - enhanced mail & news Mozilla based browser",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows;) NimbleCrawler 1.12 obeys UserAgent NimbleCrawler For problems contact: crawler@health" => array(
    "robot" => "nimble",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Healthline health related search robot (72.5.115.0x)",
    "type" => "R"
  ),
  "Mozilla/5.0 (Windows;) NimbleCrawler 1.12 obeys UserAgent NimbleCrawler For problems contact: crawler@healthline.com" => array(
    "robot" => "nimble",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Healthline health related search robot (72.5.115.0x)",
    "type" => "R"
  ),
  "Mozilla/5.0 (X11; U; Linux 2.4.2-2 i586; en-US; m18) Gecko/20010131 Netscape6/6.01" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "linux",
    "description" => "Netscape 6.0 Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; de-AT; rv:1.8.0.2) Gecko/20060309 SeaMonkey/1.0" => array(
    "robot" => "other",
    "browser" => "seamonkey",
    "os" => "linux",
    "description" => "SeaMonkey browser suite (ex Mozilla) on Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.7.6) Gecko/20050405 Epiphany/1.6.1 (Ubuntu) (Ubuntu package 1.0.2)" => array(
    "robot" => "other",
    "browser" => "epiphany",
    "os" => "ubuntu",
    "description" => "Epiphany (Mozilla/Gecko engine) browser Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; Nautilus/1.0Final) Gecko/20020408" => array(
    "robot" => "other",
    "browser" => "nautilus",
    "os" => "linux",
    "description" => "Nautilus (developed by Eazel.com) 1.0 Browser Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:0.9.3) Gecko/20010801" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "linux",
    "description" => "Mozilla (Gecko) 0.9x browser Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.2b) Gecko/20021007 Phoenix/0.3" => array(
    "robot" => "other",
    "browser" => "phoenix",
    "os" => "linux",
    "description" => "Phoenix 0.3 browser (Mozilla/Gecko engine) - now Firebird Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.6) Gecko/20040413 Epiphany/1.2.1" => array(
    "robot" => "other",
    "browser" => "epiphany",
    "os" => "linux",
    "description" => "Epiphany (Mozilla/Gecko engine) browser Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 [en] (compatible; Gulper Web Bot 0.2.4 www.ecsl.cs.sunysb.edu/~maxim/cgi-bin/Link/GulperBot)" => array(
    "robot" => "yuntis",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yuntis : Collaborative Web Resource Categorization and Ranking Project robot",
    "type" => "R"
  ),
  "Mozilla/5.0 Galeon/1.0.2 (X11; Linux i686; U;) Gecko/20011224" => array(
    "robot" => "other",
    "browser" => "galeon",
    "os" => "linux",
    "description" => "Galeon 1.0 Browser Linux",
    "type" => "B"
  ),
  "Mozilla/5.0 gURLChecker/0.0.0 (Linux)" => array(
    "robot" => "gurl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "gURLChecker - GNOME link checking tool",
    "type" => "C"
  ),
  "Mozilla/5.0 URL-Spider" => array(
    "robot" => "usww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URL Spider - used by usww.net",
    "type" => "R"
  ),
  "Mozilla/5.0 usww.com-Spider-for-w8.net" => array(
    "robot" => "usww",
    "browser" => NULL,
    "os" => NULL,
    "description" => "W8net spider",
    "type" => "R"
  ),
  "Mozilla/5.0 wgao@genieknows.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GenieKnows.com search robot (64.5.245.0x / 64.5.220.0xx)",
    "type" => "R"
  ),
  "Mozilla/5.0 whoiam [http://www.axxus.de/]" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "axxus.de German business directory",
    "type" => "R C"
  ),
  "MQbot metaquerier.cs.uiuc.edu/crawler" => array(
    "robot" => "mqbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MetaExplorer project's MetaQuerier robot",
    "type" => "R"
  ),
  "MQBOT/Nutch-0.9-dev (MQBOT Nutch Crawler; http://falcon.cs.uiuc.edu; mqbot@cs.uiuc.edu)" => array(
    "robot" => "mqbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MetaExplorer project's MetaQuerier robot",
    "type" => "R"
  ),
  "MSFrontPage/4.0" => array(
    "robot" => "other",
    "browser" => "frontpage",
    "os" => "other",
    "description" => "MS Frontpage 4.0",
    "type" => "B"
  ),
  "MSIE 4.0 (Win95)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some faked UA - maybe for a download manager",
    "type" => "D"
  ),
  "MSIE-5.13 (larbin@unspecified.mail)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from gw.ocg-corp.com (209.126.176.0) ",
    "type" => ""
  ),
  "MSNBOT/0.01 (http://search.msn.com/msnbot.htm)" => array(
    "robot" => "msnbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MSN Search robot - 131.107.0xx.0xx 204.95.96.0xx - 204.95.111.0xx 207.46.0xx.0xx",
    "type" => "R"
  ),
  "msnbot/1.01 ( http://search.msn.com/msnbot.htm)" => array(
    "robot" => "msnbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MSN Search robot - 131.107.0xx.0xx 204.95.96.0xx - 204.95.111.0xx 207.46.0xx.0xx",
    "type" => "R"
  ),
  "msnbot-Products/1.0 (+http://search.msn.com/msnbot.htm)" => array(
    "robot" => "mslivebot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Windows Live product search (Beta) robot",
    "type" => "R"
  ),
  "MSNPTC/1.0" => array(
    "robot" => "msnbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MSN Search robot - 131.107.0xx.0xx 204.95.96.0xx - 204.95.111.0xx 207.46.0xx.0xx",
    "type" => "R"
  ),
  "MSProxy/2.0" => array(
    "robot" => "msproxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Microsoft proxy server",
    "type" => "P"
  ),
  "MSRBOT" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "MacEdition CodeBitch link checking",
    "type" => "C"
  ),
  "Mulder, VCR-1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "StreamBox VCR user agent",
    "type" => "D"
  ),
  "multiBlocker browser" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Multiblocker (Fantomaster) anonymity software user",
    "type" => "P"
  ),
  "MultiText/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Virginia Tech Digital Library Research Laboratory robot",
    "type" => "R"
  ),
  "MusicWalker2.0 ( http://www.somusical.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SoMusical! musical directory link checking",
    "type" => "R"
  ),
  "MVAClient" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown bad bot from diff. Taiwanese IPs",
    "type" => "S"
  ),
  "My WinHTTP Connection" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Windows HTTP Services (WinHTTP)",
    "type" => ""
  ),
  "myDaemon" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown user robot (24.124.34.42)",
    "type" => ""
  ),
  "MyGetRight/1.0.0" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "MyGetRight/1.0b" => array(
    "robot" => "getright",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GetRight download manager",
    "type" => "D"
  ),
  "Mylinea.com Crawler 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Mylinea France web catalogue crawler",
    "type" => "R"
  ),
  "mylinkcheck/1.02" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "VDOG - SEO webdirecory (Germany) link checking",
    "type" => "C"
  ),
  // Summary: Added 442 entries from http://www.psychedelix.com/agents/index.shtml?m
  // Adding http://www.psychedelix.com/agents/index.shtml?n_s
  "gsa-crawler (Enterprise; GIX-02057; dm@enhesa.com)" => array(
    "robot" => "google",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google Enterprise Search Appliance used by Enhesa (212.35.100.1xx)",
    "type" => "R"
  ),
  "Naamah 1.0.1/Blogbot (http://blogbot.de/)" => array(
    "robot" => "blogbotde",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blogbot (Germany) robot",
    "type" => "R"
  ),
  "Naamah 1.0a/Blogbot (http://blogbot.de/)" => array(
    "robot" => "blogbotde",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Blogbot (Germany) robot",
    "type" => "R"
  ),
  "NABOT/5.0" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot ",
    "type" => "R"
  ),
  "nabot_1.0" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot ",
    "type" => "R"
  ),
  "naoFavicon4IE/1.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "naoFavicon4IE",
    "type" => "D"
  ),
  "NationalDirectoryAddURL/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nationaldirectory spider",
    "type" => "R"
  ),
  "NationalDirectory-WebSpider/1.3" => array(
    "robot" => "nationaldirectory",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nationaldirectory spider",
    "type" => "R"
  ),
  "NaverBot_dloader/1.5" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot",
    "type" => "R"
  ),
  "NaverBot-1.0 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)" => array(
    "robot" => "naverbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Naver Japan / Korea robot",
    "type" => "R"
  ),
  "NavissoBot" => array(
    "robot" => "navisso",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Navisso closed beta robot (69.41.162.1xx)",
    "type" => "R"
  ),
  "NavissoBot/1.7  (+http://navisso.com/)" => array(
    "robot" => "navisso",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Navisso closed beta robot (69.41.162.1xx)",
    "type" => "R"
  ),
  "NCSA Beta 1 (http://vias.ncsa.uiuc.edu/viasarchivinginformation.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vias Information Archival robot",
    "type" => "R"
  ),
  "NEC Research Agent -- compuman at research.nj.nec.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NEC Researchindex robot - now CiteSeer.IST scientific document index",
    "type" => "R"
  ),
  "NEC-Hayek/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "rcn.com user agent ? NEC Researchindex robot ?",
    "type" => ""
  ),
  "NetAnts/1.2x" => array(
    "robot" => "netants",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NetAnts download manager",
    "type" => "D"
  ),
  "NETCOMplete/1.01" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "NetComplete IE browser package",
    "type" => "B"
  ),
  "NetLookout/2.24" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netlookout internet notifier",
    "type" => "R"
  ),
  "Netluchs/0.8-dev ( ; http://www.netluchs.de/; ___don't___spam_me_@netluchs.de)" => array(
    "robot" => "netluchs",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netluchs (Germany) search (193.164.8.0x)",
    "type" => "R"
  ),
  "NetMechanic V1.0" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NetMechanic link checker",
    "type" => "C"
  ),
  "NetNewsWire/2.0 (Mac OS X; http://ranchero.com/netnewswire/)" => array(
    "robot" => "other",
    "browser" => "netnewswire",
    "os" => "macosx",
    "description" => "NewsGator NetNewsWire - Mac RSS feed reader",
    "type" => "B"
  ),
  "NetNoseCrawler/v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unknown InCom (216.0.107.0x) robot",
    "type" => "R"
  ),
  "Netprospector JavaCrawler" => array(
    "robot" => "netprospector",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netprospector metasearch software",
    "type" => "R"
  ),
  "NetPumper/1.00" => array(
    "robot" => "netpumper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netpumper download manager",
    "type" => "D"
  ),
  "NetResearchServer(http://www.look.com)" => array(
    "robot" => "look",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Look.com robot (209.87.232.0)",
    "type" => "R"
  ),
  "NetResearchServer/1.0(loopimprovements.com/robot.html)" => array(
    "robot" => "loop",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IncyWincy search engine using DMOZ database",
    "type" => "R"
  ),
  "NetWhatCrawler/0.06-dev (NetWhatCrawler from NetWhat.com; http://www.netwhat.com; support@netwhat.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NetWhat Search crawler (69.9.167.1xx)",
    "type" => "R"
  ),
  "NetZippy" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netzippy robot",
    "type" => "R"
  ),
  "NeuralBot/0.2" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown",
    "type" => ""
  ),
  "newsearchengine (ThisUser@unspecified.mail)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown (12.238.4.0xx) attbi.com client robot",
    "type" => ""
  ),
  "NextGenSearchBot 1 (for information visit http://www.eliyon.com/NextGenSearchBot)" => array(
    "robot" => "eliyon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Eliyon Crawler for Business People Search",
    "type" => "R"
  ),
  "NextopiaBOT (+http://www.nextopia.com) distributed crawler client beta v0.0" => array(
    "robot" => "nextopia",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nextopia crawler",
    "type" => "R"
  ),
  "NG/1.0" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead (France) search robot (193.47.80.0x)",
    "type" => "R"
  ),
  "NG/4.0.1229" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Exalead Websearch image crawler (193.47.80.0x)",
    "type" => "R"
  ),
  "NG-Search/0.90 (NG-SearchBot; http://www.ng-search.com;  )" => array(
    "robot" => "ngsearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "find your keywords - semantic search (Germany) robot",
    "type" => "R"
  ),
  "nicebot" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown UA from PlanetLab distributed network",
    "type" => ""
  ),
  "NICO/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "NicoZone childsafe search robot ",
    "type" => "R P"
  ),
  "NITLE Blog Spider/0.01" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Experimental LSI (?) robot from 140.233.69.0x (Middlebury.edu)",
    "type" => "R"
  ),
  "Nitro Downloader 1.0 (www.klsofttools.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Download manager",
    "type" => "D"
  ),
  "Noago Spider" => array(
    "robot" => "noago",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Noago spider",
    "type" => "R"
  ),
  "Nocilla/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "telefonica.es user robot",
    "type" => ""
  ),
  "Nokia7110/1.0 (05.01) (Google WAP Proxy/1.0)" => array(
    "robot" => "googlewap",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google WAP proxy",
    "type" => "P"
  ),
  "Nokia-WAPToolkit/1.2 googlebot(at)googlebot.com" => array(
    "robot" => "googlewap",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Google WAP robot",
    "type" => "R"
  ),
  "NokodoBot/1.0 (+http://nokodo.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nokodo public beta search robot (67.18.222.0x)",
    "type" => "R"
  ),
  "Norbert the Spider(Burf.com)" => array(
    "robot" => "burf",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Burf.com UK Search Engine robot",
    "type" => "R"
  ),
  "noyona_0_1" => array(
    "robot" => "noyona",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Noyona job search (preview)",
    "type" => "R"
  ),
  "NP/0.1 (NP; http://www.nameprotect.com; npbot@nameprotect.com)" => array(
    "robot" => "nameprotect",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nameprotect copyright search robot (24.177.134.0)",
    "type" => "R"
  ),
  "NPBot (http://www.nameprotect.com/botinfo.html)" => array(
    "robot" => "nameprotect",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nameprotect copyright search robot (24.177.134.0)",
    "type" => "R"
  ),
  "NPBot-1/2.0" => array(
    "robot" => "nameprotect",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nameprotect copyright search robot (24.177.134.0)",
    "type" => "R"
  ),
  "Nsauditor/1.0" => array(
    "robot" => "nsauditor",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nsauditor Network Security Auditor",
    "type" => "S"
  ),
  "NSPlayer/10.0.0.0000 WMFSDK/10.0" => array(
    "robot" => "other",
    "browser" => "mediaplayer",
    "os" => "other",
    "description" => "NetShow Media Player = Windows Media Player 10",
    "type" => "B"
  ),
  "nttdirectory_robot/0.9 (super-robot@super.navi.ocn.ne.jp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "NTT Directory robot",
    "type" => "R"
  ),
  "Nucleus SiteList LinkChecker/1.1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nucleus CMS SiteList link managing plugin",
    "type" => "C"
  ),
  "nuSearch Spider <a href='http://www.nusearch.com'>www.nusearch.com</a> (compatible; MSIE 4.01)" => array(
    "robot" => "nusearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "nuSearch spider (84.9.136.0xx)",
    "type" => "R"
  ),
  "NuSearch Spider (compatible; MSIE 6.0)" => array(
    "robot" => "nusearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "nuSearch spider (84.9.136.0xx)",
    "type" => "R"
  ),
  "NuSearch Spider www.nusearch.com" => array(
    "robot" => "nusearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "nuSearch spider (84.9.136.0xx)",
    "type" => "R"
  ),
  "Nutch" => array(
    "robot" => "nutchorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nutch open source robot",
    "type" => "R"
  ),
  "NutchCVS/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)" => array(
    "robot" => "nutchorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netsweeper content filtering engine (66.207.120.2xx) powered by Nutch",
    "type" => "P"
  ),
  "NutchCVS/0.01-dev (Nutch; http://www.nutch.org/docs/bot.html; nutch-agent@lists.sourceforge.net)" => array(
    "robot" => "nutchorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nutch open source robot",
    "type" => "R"
  ),
  "NutchCVS/0.7.1 (Nutch running at UW; http://www.nutch.org/docs/en/bot.html; sycrawl@cs.washington.edu)" => array(
    "robot" => "nutchorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Robot from University of Washington Computer Science & Engineering (128.208.6.2xx)",
    "type" => "R"
  ),
  "NutchEC2Test/Nutch-0.9-dev (Testing Nutch on Amazon EC2.; http://lucene.apache.org/nutch/bot.html; ec2test at lucene.com)" => array(
    "robot" => "amazon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amazon Elastic Compute Cloud (Amazon EC2) robot",
    "type" => "R"
  ),
  "NutchOrg/0.05-dev (Nutch; http://www.nutch.org/docs/bot.html; nutch-agent@lists.sourceforge.net)" => array(
    "robot" => "nutchorg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Nutch open source robot",
    "type" => "R"
  ),
  "NutchVinegarCrawl/Nutch-0.8.1 (Vinegar; http://www.cs.washington.edu; eytanadar at gmail dot com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown crawler from University of Washington - Computer science",
    "type" => "R"
  ),
  "obidos-bot (just looking for books.)" => array(
    "robot" => "obidosbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Weblog bookwatch robot",
    "type" => "R"
  ),
  "ObjectsSearch/0.01-dev (ObjectsSearch;http://www.ObjectsSearch.com/bot.html; support@thesoftwareobjects.com)" => array(
    "robot" => "objectssearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Objects Search robot",
    "type" => "R"
  ),
  "ObjectsSearch/0.01 (ObjectsSearch; http://www.ObjectsSearch.com/bot.html; support@thesoftwareobjects.com)" => array(
    "robot" => "objectssearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Objects Search robot",
    "type" => "R"
  ),
  "oBot ((compatible;Win32))" => array(
    "robot" => "obot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cobion Germany Brand Protection Services robot",
    "type" => "R"
  ),
  "Ocelli/1.0 (http://www.globalspec.com/Ocelli)" => array(
    "robot" => "globalspec",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GlobalSpec Engineering Search robot (66.194.55.0xx)",
    "type" => "R"
  ),
  "Octopus" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Octopus download manager",
    "type" => "D"
  ),
  "Octora Beta - www.octora.com" => array(
    "robot" => "octora",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Octora blog or RSS information crawler - beta (66.228.114.0x)",
    "type" => "R"
  ),
  "Octora Beta Bot - www.octora.com" => array(
    "robot" => "octora",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Octora RSS feed search",
    "type" => "R"
  ),
  "Offline Explorer 1.0" => array(
    "robot" => "offlineexplorer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Meta Products Offlinebrowser",
    "type" => "B D"
  ),
  "OliverPerry" => array(
    "robot" => "claymont",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Claymont robot / Internetseer Web Site Monitoring",
    "type" => "R C"
  ),
  "OmniExplorer_Bot/1.01 (+http://www.omni-explorer.com) Internet CategorizerOmniExplorer http://www.omni-explorer.com/ car & shopping search (64.62.175.0xx)" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OmniExplorer car & shopping search (64.62.175.0xx)",
    "type" => "R"
  ),
  "OmniExplorer_Bot/1.01 (+http://www.omni-explorer.com) Job Crawler" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OmniExplorer car & shopping search (64.62.175.0xx)",
    "type" => "R"
  ),
  "OmniExplorer_Bot/1.11 (+http://www.omni-explorer.com) Torrent Crawler" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OmniExplorer car & shopping search (64.62.175.0xx)",
    "type" => "R"
  ),
  "OmniExplorer_Bot/1.01 (+http://www.omni-explorer.com) WorldIndexer" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OmniExplorer car & shopping search (64.62.175.0xx)",
    "type" => "R"
  ),
  "onCHECK Linkchecker von www.scientec.de fuer www.onsinn.de" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "onsearch.de German web directory link checking ",
    "type" => "C"
  ),
  "onCHECK-Robot, www.onsearch.de" => array(
    "robot" => "onsearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "onsearch.de German web directory link checking ",
    "type" => "C"
  ),
  "Onet.pl SA- http://szukaj.onet.pl" => array(
    "robot" => "onet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "onet.pl Szukaj (Search) robot (213.180.128.1xx)",
    "type" => "R"
  ),
  "online link validator (http://www.dead-links.com/)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dead-Links.com link validation spider",
    "type" => "C"
  ),
  "Online24-Bot (Version: 1.01, powered by www.online24.de)" => array(
    "robot" => "online24",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Online24 shopping portal (Germany) link checking",
    "type" => "C"
  ),
  "OntoSpider/1.0 libwww-perl/5.65" => array(
    "robot" => "onto",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OntoSpider - Dutch robot for a research project. (195.11.244.0x)",
    "type" => "R"
  ),
  "Openbot/3.0+(robot-response@openfind.com.tw;+http://www.openfind.com.tw/robot.html)" => array(
    "robot" => "openfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Openfind.com.tw robot",
    "type" => "R"
  ),
  "Openfind data gatherer- Openbot/3.0+(robot-response@openfind.com.tw;+http://www.openfind.com.tw/robot.html)" => array(
    "robot" => "openfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Openfind.com.tw robot",
    "type" => "R"
  ),
  "Openfind Robot/1.1A2" => array(
    "robot" => "openfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Openfind.com.tw robot",
    "type" => "R"
  ),
  "OpenTaggerBot (http://www.opentagger.com/opentaggerbot.htm)" => array(
    "robot" => "opentagger",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Opentagger social bookmarking system",
    "type" => "R"
  ),
  "OpenTextSiteCrawler/2.9.2" => array(
    "robot" => "opentext",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OpenText crawler",
    "type" => "R"
  ),
  "OpenWebSpider/0.0.0 (http://www.openwebspider.org)" => array(
    "robot" => "openweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OpenWebSpider - Open Source web search engine",
    "type" => "R"
  ),
  "OpenWebSpider/1" => array(
    "robot" => "openweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "OpenWebSpider - Open Source web search engine",
    "type" => "R"
  ),
  "Opera/5.0 (Linux 2.0.38 i386; U) [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "linux",
    "description" => "Opera 5.0 Linux",
    "type" => "B"
  ),
  "Opera/5.11 (Windows ME; U) [ru]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsme",
    "description" => "Opera 5.11 faked WinME referer",
    "type" => "B"
  ),
  "Opera/5.12 (Windows 98; U) [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows98",
    "description" => "Opera 5.12 Win98",
    "type" => "B"
  ),
  "Opera/6.01 (larbin@unspecified.mail)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from gw.ocg-corp.com (209.126.176.0)",
    "type" => ""
  ),
  "Opera/6.0 (Linux 2.4.8-26mdk i686; U) [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "linux",
    "description" => "Opera 6.0- Mandrake Linux",
    "type" => "B"
  ),
  "Opera/6.0 (Windows NT 4.0; U) [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsnt",
    "description" => "Opera 6.0 WinNT",
    "type" => "B"
  ),
  "Opera/7.0 (Windows NT 5.1; U) [en]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 7.0 WinXP",
    "type" => "B"
  ),
  "Opera/8.0x (Windows NT 5.1; U; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 8.0 (Beta) WinXP",
    "type" => "B"
  ),
  "Opera/9.0 (Windows NT 5.1; U; en)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 9 (Beta) Browser",
    "type" => "B"
  ),
  "Opera/9.00 (Windows NT 5.1; U; de)" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 9 (final)",
    "type" => "B"
  ),
  "OpidooBOT (larbin2.6.3@unspecified.mail)" => array(
    "robot" => "larbin",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Opidoo Search Belgium robot (62.4.83.0xx)",
    "type" => "R"
  ),
  "Oracle Application Server Web Cache 10g" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Oracle Application Server cache",
    "type" => "P"
  ),
  "Oracle iMTCrawler" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Oracle interMedia Text - Text and web documents indexing",
    "type" => "D"
  ),
  "Oracle Ultra Search" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Oracle Search",
    "type" => "R"
  ),
  "OrangeSpider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Orangeslicer semantic search (Beta) Germany (193.201.52.1xx)",
    "type" => "R"
  ),
  "Orbiter/T-2.0 (+http://www.dailyorbit.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Orbiter - DailyOrbit search spider",
    "type" => "R"
  ),
  "Orca Browser (http://www.orcabrowser.com)" => array(
    "robot" => "other",
    "browser" => "orca",
    "os" => "other",
    "description" => "Avant Browser - IE based browser",
    "type" => "B"
  ),
  "OSSProxy 1.3.305.321 (Build 305.321 Win32 en-us)(Dec 21 2005 16:30:54)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Marketscore (was Netsetter) internet accelerator",
    "type" => "P"
  ),
  "OutfoxBot/0.0 (For internet experiments; http://; outfox.agent@gmail.com)" => array(
    "robot" => "outfox",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Chinanet (220.181.8.0xx)",
    "type" => ""
  ),
  "Overture-WebCrawler/3.8/Fresh (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)" => array(
    "robot" => "overture", //TODO: is this part of fast?
    "browser" => NULL,
    "os" => NULL,
    "description" => "Overture/Fast/Alltheweb crawler (66.77.73.0xx)",
    "type" => "R"
  ),
  "OWR_Crawler 0.1" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from 198.169.127.0x (innovationplace.com)",
    "type" => ""
  ),
  "ozelot/2.7.3 (Search engine indexer; www.flying-cat.de/ozelot; ozelot@flying-cat.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ozelot - Flying Cat's search engine robot (Germany)",
    "type" => "R"
  ),
  "page_verifier (http://www.securecomputing.com/goto/pv)" => array(
    "robot" => "securecomputing",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Secure Computing SmartFilter Tools - malware crawler",
    "type" => "R"
  ),
  "Pagebull http://www.pagebull.com/" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pagebull visual search engine",
    "type" => "R"
  ),
  "PagmIEDownload" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Downloadmanager ?",
    "type" => "D"
  ),
  "parallelContextFocusCrawler1.1parallelContextFocusCrawler1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CFC crawler used by Italian academic and research network (GARR)",
    "type" => "R"
  ),
  "ParaSite/1.0b (http://www.ianett.com/parasite/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.ianett.com robot",
    "type" => "R"
  ),
  "Patwebbot (http://www.herz-power.de/technik.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Patsearch (Germany) robot",
    "type" => "R"
  ),
  "pavuk/0.9pl29b i686-pc-linux-gnu" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pavuk web downloading program for Unix",
    "type" => "D"
  ),
  "PBrowse 1.4b" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: - cox.net (68.4.0xx.0xx)",
    "type" => "S"
  ),
  "pd02_1.0.0 pd02_1.0.0@dzimi@post.sk" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Post.sk / Eurotel.sk robot",
    "type" => "R"
  ),
  "PEAR HTTP_Request class ( http://pear.php.net/ )" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Pear HTTP_Request PHP extension package",
    "type" => ""
  ),
  "PEERbot www.peerbot.com" => array(
    "robot" => "peerbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Peerbot - favicon search robot",
    "type" => "R"
  ),
  "PeopleChat/Search_Engine" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from 64.5.48.0xx (Plethoric.net)",
    "type" => ""
  ),
  "PEval 1.4b" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs",
    "type" => "S"
  ),
  "PHP/3.0.0x" => array(
    "robot" => "php",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services",
    "type" => ""
  ),
  "PHP/4.0.4pl1" => array(
    "robot" => "php",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services",
    "type" => ""
  ),
  "PHP/4.0.6" => array(
    "robot" => "php",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services- i.e.: -NTT/Verio Inc. link checker",
    "type" => "C"
  ),
  "PHP/4.1.1" => array(
    "robot" => "php",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services- i.e.: - Phenominet.com link checking",
    "type" => ""
  ),
  "PHP/4.1.2" => array(
    "robot" => "php",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services- i.e.: - 209.114.200.0x = MyNetCrawler link checking - 216.139.207.0xx = Mixcat crawler",
    "type" => ""
  ),
  "PicoSearch/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pico Search robot",
    "type" => "R"
  ),
  "PigeonBot1.0 BETA" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Whois Source domain name information robot (66.249.26.0x)- s.also: - SurveyBot",
    "type" => "R C"
  ),
  "PingALink Monitoring Services 1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "PingALink website monitoring",
    "type" => "R C"
  ),
  "PingALink Monitoring Services 1.0 (http://www.pingalink.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "PingALink website monitoring",
    "type" => "R C"
  ),
  "pipeLiner/0.3a (PipeLine Spider;http://www.pipeline-search.com/webmaster.html; webmaster'at'pipeline-search.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "pipeline search (DMOZ based) search robot (24.106.39. xxx)",
    "type" => "R"
  ),
  "pipeLiner/0.0x (PipeLine Spider; http://www.pipeline-search.com/webmaster.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "pipeline search (DMOZ based) search robot (24.106.39. xxx)",
    "type" => "R"
  ),
  "Pita" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pita crawler",
    "type" => "R"
  ),
  "Pizilla++ ver 2.45" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Private user-agent via Hurricane Electric Internet Services",
    "type" => "B ?"
  ),
  "PJspider/3.0 (pjspider@portaljuice.com; http://www.portaljuice.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Portaljuice spider",
    "type" => "R"
  ),
  "Plagger/0.0.0x (http://plagger.org/)" => array(
    "robot" => "plagger",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Plagger - pluggable RSS/Atom feed aggregator written in Perl",
    "type" => "B"
  ),
  "PlagiarBot/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown ucsd.edu robot",
    "type" => ""
  ),
  "PlantyNet_WebRobot_V1.9 dhkang@plantynet.com" => array(
    "robot" => "plantynet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Plantynet web filtering services - Blacklist DB robot",
    "type" => "R P"
  ),
  "plinki/0.1 (you got plinked! (thats a good thing..); http://www.plinki.com; crawl@plinki.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown UA from 66.220.23.2xx",
    "type" => ""
  ),
  "PluckFeedCrawler/2.0 (compatible; Mozilla 4.0; MSIE 5.5; http://www.pluck.com; 1 subscribers)" => array(
    "robot" => "pluck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Pluck RSS feed crawler",
    "type" => "R"
  ),
  "Pockey/x.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yutaka Endo's Pockey / GetHTML / GetHTMLW - some downloading tool from Japan",
    "type" => "D"
  ),
  "Pockey7.0.0(WIN32GUI)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yutaka Endo's Pockey / GetHTML / GetHTMLW - some downloading tool from Japan",
    "type" => "D"
  ),
  "Pockey-GetHTML/4.12.0 (Win32; GUI; ix86)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yutaka Endo's Pockey / GetHTML / GetHTMLW - some downloading tool from Japan",
    "type" => "D"
  ),
  "Pockey-GetHTML/x.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yutaka Endo's Pockey / GetHTML / GetHTMLW - some downloading tool from Japan",
    "type" => "D"
  ),
  "POE-Component-Client-HTTP/0.64 (perl; N; POE; en; rv:0.640000)" => array(
    "robot" => "poe",
    "browser" => NULL,
    "os" => NULL,
    "description" => "HTTP user-agent for POE (portable networking framework for Perl )",
    "type" => ""
  ),
  "Poirot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ThePlanet/jaja-jak-globusy.com Google Adsense refferer spam bot from 70.85.116.* / 70.84.128.0xx / 70.85.193.0xx",
    "type" => "S"
  ),
  "polybot 1.0 (http://cis.poly.edu/polybot/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Polybot webcrawler",
    "type" => "R"
  ),
  "Pompos/1.0 http://dir.com/pompos.html" => array(
    "robot" => "pompos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dir.com / Iliad French recherche robot",
    "type" => "R"
  ),
  "Pompos/1.0 pompos@iliad.fr" => array(
    "robot" => "pompos",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Iliad / Free French recherche robot",
    "type" => "R"
  ),
  "Popdexter/1.0" => array(
    "robot" => "popdex",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Popdex - web site popularity crawler",
    "type" => "R"
  ),
  "Port Huron Labs" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown spam bot / harvester (63.223.10.***)",
    "type" => "S"
  ),
  "PortalBSpider/2.0 (spider@portalb.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "PortalB (now Alacra search) spider",
    "type" => "R"
  ),
  "portalmmm/2.0 S500i(c20;TB)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "portalmmm IMode mobile browser",
    "type" => "B"
  ),
  "PostFavorites" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo (66.94.237.1xx / 216.109.121.0x) favorites tracking robot",
    "type" => "C"
  ),
  "potbot 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Potbot http://sourceforge.net/projects/potbot/: A simple IRC bot written in Perl",
    "type" => "R"
  ),
  "PrivacyFinder Cache Bot v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CUPS robot for AT&T Privacy Bird Privacy Preferences (P3P) enhancements",
    "type" => "R"
  ),
  "PrivacyFinder/1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "CUPS robot for AT&T Privacy Bird Privacy Preferences (P3P) enhancements",
    "type" => "R"
  ),
  "Privoxy/3.0 (Anonymous)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Privoxy web proxy",
    "type" => "P"
  ),
  "Production Bot 0116B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from diff. IPs- i.e.: - 67.99.33.0 (lightningcon.broadwing.net)",
    "type" => "S"
  ),
  "Production Bot 2016B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from diff. IPs- i.e.: - 216.232.64.0x (telus.net)",
    "type" => "S"
  ),
  "Production Bot DOT 3016B" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool from diff. IPs- i.e.: - 141.154.181.0xx (east.verizon.net)",
    "type" => "S"
  ),
  "Program Shareware 1.0.2" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot",
    "type" => "S"
  ),
  "Progressive Download" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "",
    "type" => ""
  ),
  "Progressive Download HTTP check" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "",
    "type" => ""
  ),
  "Project XP5 [2.03.07-111203]" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "XP5 robot",
    "type" => "R"
  ),
  "PROve AnswerBot 4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Answerchase PROve Answerbot",
    "type" => "R"
  ),
  "ProWebGuide Link Checker (http://www.prowebguide.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ProWebguide robot",
    "type" => "R"
  ),
  "PSurf15a 11" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: -QWest Net",
    "type" => "S"
  ),
  "PSurf15a 51" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: -Optonline net (24.191.0xx.0xx)",
    "type" => "S"
  ),
  "PSurf15a VA" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: - choiceone.net (216.153.0xx.0xx) - attbi.com (12.250.0xx.0xx) - optonline.net (24.191.0xx.0xx)\"",
    "type" => "S"
  ),
  "psycheclone" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown website grabbing / ripping for unknown purposes from 208.66.195.0 - Digitalinfinity.org Russia",
    "type" => "S"
  ),
  "PubCrawl (pubcrawl.stanford.edu)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Some robot from Stanford University (171.64.75.0xx = PubCrawl.Stanford.EDU)",
    "type" => ""
  ),
  "puf/0.91beta6a (Linux 2.2.18; i686)" => array(
    "robot" => "other",
    "browser" => "puf",
    "os" => "linux",
    "description" => "Parallel URL Fetcher downloading tool",
    "type" => "D"
  ),
  "puf/0.93.2a (Linux 2.4.18; i686)" => array(
    "robot" => "other",
    "browser" => "puf",
    "os" => "linux",
    "description" => "Parallel URL Fetcher downloading tool",
    "type" => "D"
  ),
  "PureSight" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "PureSight Internet content filter",
    "type" => "P"
  ),
  "PuxaRapido v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Puxa Rapido download manager",
    "type" => "D"
  ),
  "PycURL" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Fast Search robot (using some Python component- s. below)",
    "type" => "R"
  ),
  "Python-urllib/1.1x" => array(
    "robot" => "pythonurl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Python URL fetcher - robot used by Naver Japan/Korea",
    "type" => "R"
  ),
  "Python-urllib/2.0a1" => array(
    "robot" => "pythonurl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Python URL fetcher - robot used by Google",
    "type" => "R"
  ),
  "Qango.com Web Directory (http://www.qango.com/)" => array(
    "robot" => "qango",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Qango.com Web Directory robot",
    "type" => "R"
  ),
  "QPCreep Test Rig ( We are not indexing- just testing )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Quepasa!com (Latin American search) robot",
    "type" => "R"
  ),
  "QuepasaCreep ( crawler@quepasacorp.com )" => array(
    "robot" => "quepasa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Quepasa!com (Latin American search) robot",
    "type" => "R"
  ),
  "QuepasaCreep v0.9.1x" => array(
    "robot" => "quepasa",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Quepasa!com (Latin American search) robot",
    "type" => "R"
  ),
  "QueryN Metasearch" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "QueryN Metasearch robot",
    "type" => "R"
  ),
  "QuickTime\xaa.7.0.4 (qtver=7.0.4;cpu=PPC;os=Mac 10.3.9)" => array(
    "robot" => "other",
    "browser" => "quicktime",
    "os" => "macosx",
    "description" => "Quicktime for Macintosh",
    "type" => "B"
  ),
  "rabaz (rabaz at gigabaz dot com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "gigaBaz - the brainbot (Germany) robot",
    "type" => "R"
  ),
  "RaBot/1.0 Agent-admin/phortse@hanmail.net" => array(
    "robot" => "daum",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Daum.net / teleoffice.co.kr robot",
    "type" => "R"
  ),
  "Rainbot1.1" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Bot Provider for the All Womans Bot Service?",
    "type" => ""
  ),
  "ramBot xtreme 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Intersearch.de (was www.intersearch.de) robot (Germany)",
    "type" => "R"
  ),
  "RAMPyBot - www.giveRAMP.com/0.1 (RAMPyBot - www.giveRAMP.com; http://www.giveramp.com/bot.html; support@giveRAMP.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "giveRAMP Search Engine robot (64.69.43.1xx)",
    "type" => "R"
  ),
  "RAMPyBot/0.8-dev (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "giveRAMP Search Engine robot (64.69.43.1xx)",
    "type" => "R"
  ),
  "Rank Exec (rankexec.com) Reciprocal Link Manager 1.0/bot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Rank Exec reciprocal link checking",
    "type" => "C"
  ),
  "Rational SiteCheck (Windows NT)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Innova/IBM Rational SiteCheck - Rational robot",
    "type" => "R"
  ),
  "RealDownload/4.0.0.4x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RealDownload download manager",
    "type" => "D"
  ),
  "Reaper [2.03.10-031204] (http://www.sitesearch.ca/reaper/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Reaper robot for SiteSearch",
    "type" => "R"
  ),
  "Reaper/2.0x (+http://www.sitesearch.ca/reaper)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Reaper robot for SiteSearch",
    "type" => "R"
  ),
  "REBOL Core 2.0.0.0.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "REBOL messaging language for distributed Internet apps",
    "type" => ""
  ),
  "RebusnetBot (+http://www.rebusnet.biz)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Rebusnet software site - link / submission checking",
    "type" => "R C"
  ),
  "RebusnetPADBot/1.5x (+http://www.rebusnet.biz)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Rebusnet software site - link / submission checking",
    "type" => "R C"
  ),
  "reciprocal links checker (http://www.recip-links.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Online reciprocal link checker",
    "type" => "C"
  ),
  "RedCarpet/1.2 (http://www.redcarpet-inc.com/robots.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RedCarpet crawler for Pronto price comparison search(66.179.107.1xx)",
    "type" => "R"
  ),
  "RedCell/0.1 (InfoSec Search Bot (Coming Soon); http://www.telegenetic.net/bot.html; lhall@telegenetic.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Der Bot for telegenetic.net's security related search (65.220.67.2xx)",
    "type" => "R"
  ),
  "RedCell/0.1 (RedCell; telegenetic.net/bot.html; lhall_at_telegenetic.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Der Bot for telegenetic.net's security related search (65.220.67.2xx)",
    "type" => "R"
  ),
  "RedKernel WWW-Spider 2/0 (+http://www-spider.redkernel-softwares.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RedKernel Softwares robot",
    "type" => "R"
  ),
  "REL Link Checker Lite 1.0" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "REL Link Checker Lite free version of Web Link Validator",
    "type" => "C"
  ),
  "RepoMonkey Bait & Tackle/v1.01" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown",
    "type" => ""
  ),
  "Rewebber/1.2 libwww-perl/5.41" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Rewebber proxy service",
    "type" => "P"
  ),
  "rico/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Applied Semantics Auto-Categorizer for QWestDex Direct",
    "type" => "R"
  ),
  "RixBot (http://babelserver.org/rix)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RixBot Rebol Indexer for the RIX - Rebol related search (195.204.121.0x)",
    "type" => "R"
  ),
  "RMA/1.0 (compatible; RealMedia)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Real Media server acting as client",
    "type" => "B P"
  ),
  "RMA/1.0 (compatible; RealMedia)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "StreamBox VCR user agent",
    "type" => "D"
  ),
  "RoboCrawl (http://www.canadiancontent.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Canadian Content search crawler",
    "type" => "R"
  ),
  "RoboCrawl (www.canadiancontent.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Canadian Content Search (207.44.220.0x) robot",
    "type" => "R"
  ),
  "RoboPal (http://www.findpal.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FindPal Australia metasearch robot (61.68.139.0x)",
    "type" => "R"
  ),
  "Robot/www.pj-search.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "PopJapanSearch robot",
    "type" => "R"
  ),
  "Robot: NutchCrawler- Owner: wdavies@acm.org" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Experimental robot using Wget via attbi.net",
    "type" => "R"
  ),
  "Robot@SuperSnooper.Com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Supersnooper robot",
    "type" => "R"
  ),
  "Robozilla/1.0" => array(
    "robot" => "robozilla",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netscape Directory / DMOZ Open Directory link crawler",
    "type" => "R"
  ),
  "Rotondo/3.1 libwww/5.3.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Qualigo.de robot",
    "type" => "R"
  ),
  "RPT-HTTPClient/0.3-x" => array(
    "robot" => "httpclient",
    "browser" => NULL,
    "os" => NULL,
    "description" => "different IPs using the HTTPClient library (mostly link checking)",
    "type" => "C"
  ),
  "RRC (crawler_admin@bigfoot.com)" => array(
    "robot" => "metacarter",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Metacarta.com (66.28.0x.0xx) robot",
    "type" => "R"
  ),
  "RssReader/1.0.88.0 (http://www.rssreader.com) Microsoft Windows NT 5.1.2600.0" => array(
    "robot" => "rssreader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ykoon RssReader news feed reader",
    "type" => "B"
  ),
  "RSurf15a 41" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: - dslx.net (208.35.1x.0xx) - Home.com",
    "type" => "S"
  ),
  "RSurf15a 51" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: - dslx.net (208.35.1x.0xx) - Home.com",
    "type" => "S"
  ),
  "RSurf15a 81" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs- i.e.: - dslx.net (208.35.1x.0xx) - Home.com",
    "type" => "S"
  ),
  "Rubbot/1.0 (+http://rubhub.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "rubhub blog spider",
    "type" => "C"
  ),
  "RufusBot (Rufus Web Miner; http://64.124.122.252/feedback.html)" => array(
    "robot" => "rufusbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from 64.124.122.252",
    "type" => "R"
  ),
  "Rumours-Agent" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from rumours.jp (202.214.69.0xx)",
    "type" => ""
  ),
  "RX Bar" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "RX (Reflexive Search) Bar for IE",
    "type" => "B"
  ),
  "S.T.A.L.K.E.R. (http://www.seo-tools.net/en/bot.aspx)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SEO-Tools.net link checking ?",
    "type" => "C"
  ),
  "SafariBookmarkChecker (+http://www.coriolis.ch/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SafariBookmarkChecker for Mac OS X",
    "type" => "C"
  ),
  "SandCrawler - Compatibility Testing" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sandcrawler robot from Microsoft (131.107.0.0x)",
    "type" => "R"
  ),
  "savvybot/0.2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebSavvy Directory robot",
    "type" => "R"
  ),
  "SBIder/0.7 (SBIder; http://www.sitesell.com/sbider.html; http://support.sitesell.com/contact-support.html)" => array(
    "robot" => "sbider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteSell SBIder Nutch based crawler",
    "type" => "R"
  ),
  "SBIder/0.8-dev (SBIder; http://www.sitesell.com/sbider.html; http://support.sitesell.com/contact-support.html)" => array(
    "robot" => "sbider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteSell SBIder Nutch based crawler",
    "type" => "R"
  ),
  "SBL-BOT (http://sbl.net)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Softbyte Labs Black Widow web site ripper",
    "type" => "D B"
  ),
  "ScanWeb" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ScanWeb - regular expression based web page searching tool",
    "type" => "R"
  ),
  "ScholarUniverse/0.8 (Nutch;+http://scholaruniverse.com/bot.jsp; fetch-agent@scholaruniverse.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ScholarUniverse - Scholarly experts search robot",
    "type" => "R"
  ),
  "schwarzmann.biz-Spider_for_paddel.org+(http://www.innerprise.net/usp-spider.asp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URL Spider Pro (\"USP\") used by German Schwarzmann GmbH",
    "type" => "R"
  ),
  "Scooter/1.0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/1.0 scooter@pa.dec.com" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/1.1 (custom)" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/2.0 G.R.A.B. V1.1.0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/2.0 G.R.A.B. X2.0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/3.3" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/3.3.QA.pczukor" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/3.3.vscooter" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter/3.3_SF" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter_bh0-3.0.3" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter_trk3-3.0.3" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter2_Mercator_x-x.0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista using Mercator robot",
    "type" => "R"
  ),
  "Scooter-3.0.EU" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.0.FS" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.0.HD" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.0.VNS" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.0QI" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.BT" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.DIL" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.JT" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.NIV" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.SF0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.2.snippet" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-3.3dev" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-ARS-1.1" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-ARS-1.1-ih" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "scooter-venus-3.0.vns" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-W3.1.2" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scooter-W3-1.0" => array(
    "robot" => "altavista",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Altavista robot",
    "type" => "R"
  ),
  "Scope (Mars+)" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Scope Navigator mobile browser (Japan)",
    "type" => "B"
  ),
  "ScoutAbout" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some nec.com robot using Research Republic ScoutAbout Research Tool",
    "type" => "R"
  ),
  "scoutmaster" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ScoutMaster information retrieval software",
    "type" => "R"
  ),
  "Scrubby/2.0 (http://www.scrubtheweb.com/)" => array(
    "robot" => "scrubby",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Scrub the web robot",
    "type" => "R"
  ),
  "search.ch V1.4" => array(
    "robot" => "searchch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search.ch robot",
    "type" => "R"
  ),
  "search.ch V1.4.2 (spiderman@search.ch; http://www.search.ch)" => array(
    "robot" => "searchch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search.ch robot",
    "type" => "R"
  ),
  "Search/1.0 (http://www.innerprise.net/es-spider.asp)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Enterprise Search web indexing / site searching tool",
    "type" => "R"
  ),
  "Search+" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URL Search+ search software",
    "type" => "R"
  ),
  "searchbot admin@google.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot  / website grabber from Chinatelecom (219.142.78.0xx)",
    "type" => "S"
  ),
  "SearchByUsa/2 (SearchByUsa; http://www.SearchByUsa.com/bot.html; info@SearchByUsa.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SearchByUSA robot (69.150.7.0xx)",
    "type" => "R"
  ),
  "SearchdayBot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchday (Germany) search robot",
    "type" => "R"
  ),
  "Search-Engine-Studio" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xtreem Search Engine Studio - SE software",
    "type" => "R"
  ),
  "SearchExpress Spider0.99" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchexpress spider",
    "type" => "R"
  ),
  "SearchGuild/DMOZ/Experiment (searchguild@gmail.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchguild forum & directory robot (81.3.75.0xx)",
    "type" => "R"
  ),
  "SearchGuild_DMOZ_Experiment (chris@searchguild.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchguild forum & directory robot (81.3.75.0xx)",
    "type" => "R"
  ),
  "Searchit-Now Robot/2.2 (+http://www.searchit-now.co.uk)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchit robot (69.93.107.0x)",
    "type" => "R"
  ),
  "Searchmee! Spider v0.98a" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Searchmee!  Search Engine (prototype) robot by findanisp.com",
    "type" => "R"
  ),
  "SearchSight/2.0 (http://SearchSight.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SearchSight search robot",
    "type" => "R"
  ),
  "SearchSpider.com/1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SearchSpider robot",
    "type" => "R"
  ),
  "Searchspider/1.2 (SearchSpider; http://www.searchspider.com; webmaster@searchspider.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SearchSpider robot",
    "type" => "R"
  ),
  "SearchTone2.0 - IDEARE" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Janas (Ideare.com / Tiscali.it) robot",
    "type" => "R"
  ),
  "Seekbot/1.0 (http://www.seekbot.net/bot.html) HTTPFetcher/0.3" => array(
    "robot" => "seekport",
    "browser" => NULL,
    "os" => NULL,
    "description" => "seekport. beta search (Germany) robot",
    "type" => "R"
  ),
  "Seekbot/1.0 (http://www.seekbot.net/bot.html) RobotsTxtFetcher/1.0 (XDF)" => array(
    "robot" => "seekport",
    "browser" => NULL,
    "os" => NULL,
    "description" => "seekport. beta search (Germany) robot",
    "type" => "R"
  ),
  "Seekbot/1.0 (http://www.seekbot.net/bot.html) RobotsTxtFetcher/1.2" => array(
    "robot" => "seekport",
    "browser" => NULL,
    "os" => NULL,
    "description" => "seekport. beta search (Germany) robot",
    "type" => "R"
  ),
  "Seeker.lookseek.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Lookseek search robot / link checking",
    "type" => "R"
  ),
  "semaforo.net" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "semaforo.net web filtering software",
    "type" => "P"
  ),
  "semanticdiscovery/1.0" => array(
    "robot" => "semanticdiscovery",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Semantic Discovery domain checking tool",
    "type" => "R C"
  ),
  "Sensis Web Crawler (search_comments\at\sensis\dot\com\dot\au)" => array(
    "robot" => "sensis",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sensis Australia search robot",
    "type" => "R"
  ),
  "Sensis.com.au Web Crawler (search_comments\at\sensis\dot\com\dot\au)" => array(
    "robot" => "sensis",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sensis Australia search robot",
    "type" => "R"
  ),
  "SeznamBot/1.0" => array(
    "robot" => "seznam",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Seznam Search (Czech Republic) robot (212.80.76.0x)",
    "type" => "R"
  ),
  "SeznamBot/1.0 (+http://fulltext.seznam.cz/)" => array(
    "robot" => "seznam",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Seznam Search (Czech Republic) robot (212.80.76.0x)",
    "type" => "R"
  ),
  "Shareaza v1.0.0.02" => array(
    "robot" => "other",
    "browser" => "shareaza",
    "os" => "other",
    "description" => "Shareaza P2P peer-to-peer download client",
    "type" => "D B"
  ),
  "SharewarePlazaFileCheckBot/1.0+(+http://www.SharewarePlaza.com)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SharewarePlaza File Check Bot - link checking",
    "type" => "R C"
  ),
  "Shim Crawler" => array(
    "robot" => "shim",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Chikayama-Taura Lab Shim-Crawler used for The Kototoi Project (Japan) - (133.11.36.0x)",
    "type" => "R"
  ),
  "Shim-Crawler(Mozilla-compatible; http://www.logos.ic.i.u-tokyo.ac.jp/crawler/; crawl@logos.ic.i.u-tokyo.ac.jp)" => array(
    "robot" => "shim",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Chikayama-Taura Lab Shim-Crawler used for The Kototoi Project (Japan) - (133.11.36.0x)",
    "type" => "R"
  ),
  "ShopWiki/1.0 ( +http://www.shopwiki.com/)" => array(
    "robot" => "shopwiki",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ShopWiki shopping search based on LittleWiki search",
    "type" => "R"
  ),
  "ShopWiki/1.0 ( +http://www.shopwiki.com/wiki/Help:Bot)" => array(
    "robot" => "shopwiki",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ShopWiki shopping search based on LittleWiki search",
    "type" => "R"
  ),
  "Shoula.com Crawler 2.0" => array(
    "robot" => "shoula",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Shoula Search Engine crawler",
    "type" => "R"
  ),
  "Siigle Orumcex v.001 Turkey (http://www.siigle.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Siigle search (Turkey) robot",
    "type" => "R"
  ),
  "silk/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slider Search directory robot (194.213.194.2xx)",
    "type" => "R"
  ),
  "silk/1.0 (+http://www.slider.com/silk.htm)/3.7" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slider Search directory robot (194.213.194.2xx)",
    "type" => "R"
  ),
  "SimpleFavPanel/1.2" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "SimpleFavPanel - IE newsfeed panel plugin",
    "type" => "B"
  ),
  "Simpy 1.0; http://www.simpy.com/" => array(
    "robot" => "simpy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Simpy bookmarking and personal search engine",
    "type" => "R C"
  ),
  "Simpy/1.0 (Simpy; http://www.simpy.com/?ref=bot; feedback at simpy dot com)" => array(
    "robot" => "simpy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Simpy bookmarking and personal search engine",
    "type" => "R C"
  ),
  "SiteBar/x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteBar bookmark server",
    "type" => "C"
  ),
  "SiteBar/x.0.0 (Bookmark Server; http://sitebar.org/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteBar bookmark server",
    "type" => "C"
  ),
  "sitecheck.internetseer.com" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Internetseer Web Site Monitoring / Claymont robot",
    "type" => "R C"
  ),
  "sitecheck.internetseer.com (For more info see: http://sitecheck.internetseer.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Internetseer Web Site Monitoring",
    "type" => "R C"
  ),
  "SiteRecon+(xx)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "SiteRecon website monitoring spider at xx minute intervals",
    "type" => "R C"
  ),
  "SiteSnagger" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "PC Magazin web site downloadmanager",
    "type" => "D"
  ),
  "SiteSpider +(http://www.SiteSpider.com/)" => array(
    "robot" => "sitespider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Site Spider robot (66.249.17.0x)",
    "type" => "R"
  ),
  "SiteSucker/1.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteSucker Mac website downloading tool",
    "type" => "D"
  ),
  "SiteTaggerBot (http://www.sitetagger.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SiteTagger.com bookmark organizer",
    "type" => "C"
  ),
  "SiteWinder" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Webwasher.com (217.146.159.0x) internet filter",
    "type" => "B P"
  ),
  "SiteXpert" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xtreeme SiteXpert sitemap & search engine builder",
    "type" => "R"
  ),
  "Skampy/0.9.0 (http://www.skaffe.com/skampy-info.html)" => array(
    "robot" => "skaffe",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Skaffe.com directory link checker",
    "type" => "R"
  ),
  "Skimpy/0.0 (http://www.skaffe.com/skampy-info.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Skaffe.com directory link checker",
    "type" => "R"
  ),
  "Skywalker/0.1 (Skywalker; anonymous; anonymous)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Visvo distributed website crawler based on Nutch",
    "type" => "R"
  ),
  "Slarp/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Only.com robot",
    "type" => "R"
  ),
  "Sleipnir" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Sleipnir - Japanese Explorer based browser & search bar",
    "type" => "B"
  ),
  "Sleipnir Version 1.01" => array(
    "robot" => "other",
    "browser" => "sleipnir",
    "os" => "other",
    "description" => "Sleipnir - Japanese Explorer based browser & search bar",
    "type" => "B"
  ),
  "Sleipnir/2.0x" => array(
    "robot" => "other",
    "browser" => "sleipnir",
    "os" => "other",
    "description" => "Sleipnir - Japanese Explorer based browser & search bar",
    "type" => "B"
  ),
  "Slider_Search_v1-de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slider Search directory robot (194.213.194.2xx)",
    "type" => "R"
  ),
  "SlimBrowser" => array(
    "robot" => "other",
    "browser" => "slimbrowser",
    "os" => "other",
    "description" => "Slim Browser (IE based browser) - uses this user agent for favicon.ico only",
    "type" => "B"
  ),
  "Slurp/2.0 (slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos-NBCi) robot",
    "type" => "R"
  ),
  "Slurp/2.0-KiteWeekly (slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos-NBCi) robot",
    "type" => "R"
  ),
  "Slurp/si (slurp@inktomi.com; http://www.inktomi.com/slurp.html)" => array(
    "robot" => "inktomi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos-NBCi) robot",
    "type" => "R"
  ),
  "Slurpy Verifier/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inktomi (Hotbot-Lycos-NBCi) robot - 72.30.61.0x(x)",
    "type" => "R"
  ),
  "SlySearch (slysearch@slysearch.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slysearch robot (now Turnitin robot)",
    "type" => "R"
  ),
  "SlySearch/1.0 http://www.plagiarism.org/crawler/robotinfo.html" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slysearch robot (now Turnitin robot)",
    "type" => "R"
  ),
  "SlySearch/1.0 http://www.slysearch.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Slysearch robot (now Turnitin robot)",
    "type" => "R"
  ),
  "SmartDownload/1.2.67 (Win32; Jan 12 1999)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netzip/Smartdownload download manager",
    "type" => "D"
  ),
  "SmartDownload/1.2.77 (Win32; Feb 1 2000)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netzip/Smartdownload download manager",
    "type" => "D"
  ),
  "SmartDownload/1.2.77 (Win32; Jun 19 2001)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Netzip/Smartdownload download manager",
    "type" => "D"
  ),
  "smartwit.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Loop Improvements NRS Enterprise search (69.44.155.0x[x])",
    "type" => "R"
  ),
  "sna-0.0.1 (mikemuzio@msn.com)" => array(
    "robot" => "snoopy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Snoopy PHP-client",
    "type" => ""
  ),
  "sna-0.0.1 mikeelliott@hotmail.com" => array(
    "robot" => "snoopy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Snoopy PHP-client",
    "type" => ""
  ),
  "snap.com beta crawler v0" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SPAM bot attacking forums, cms, etc. from 66.234.128.0/19 and 38.98.19.0/24 (as Snapbot/1.0)",
    "type" => "S"
  ),
  "Snapbot/1.0" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SPAM bot attacking forums, cms, etc. from 66.234.128.0/19 and 38.98.19.0/24",
    "type" => "S"
  ),
  "Snappy/1.1 ( http://www.urltrends.com/ )" => array(
    "robot" => "urltrends",
    "browser" => NULL,
    "os" => NULL,
    "description" => "My UrlTrends online web ranking service",
    "type" => "C"
  ),
  "SnoopRob/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from 217.229.156.0x (T-Online Germany)",
    "type" => ""
  ),
  "Snoopy v1.01" => array(
    "robot" => "snoopy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Snoopy PHP-client",
    "type" => ""
  ),
  "Snoopy v1.01- : User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; MyIE2)" => array(
    "robot" => "snoopy",
    "browser" => "myie2",
    "os" => "windowsxp",
    "description" => "Snoopy PHP-client",
    "type" => ""
  ),
  "Snoopy_v0.01" => array(
    "robot" => "snoopy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Snoopy PHP-client",
    "type" => ""
  ),
  "SnykeBot/0.6 (http://www.snyke.com)" => array(
    "robot" => "snyke",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Snyke.com France robot",
    "type" => "R"
  ),
  "SocSciBot ()" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Link crawler for the social sciences",
    "type" => "R"
  ),
  "SoftHypermarketFileCheckBot/1.0+(+http://www.softhypermaket.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Soft Hypermarket link checking",
    "type" => "R"
  ),
  "Softizerbot (http://www.softizer.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Softizer.com software directory link checking",
    "type" => "C"
  ),
  "sogou spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown UA from Chinanet (220.181.26.1xx) faking Sogou search robot",
    "type" => "S"
  ),
  "sohu agent" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown UA from Chinanet (220.181.26.1xx) faking Sogou search robot",
    "type" => "S"
  ),
  "sohu-search" => array(
    "robot" => "sohu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sohu (Search Fox) search robot China (61.135.131.0xx)",
    "type" => "R"
  ),
  "SpeedDownload/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Speed Download (Mac) download manager",
    "type" => "D"
  ),
  "speedfind ramBot xtreme 8.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Speedfind.de robot",
    "type" => "R"
  ),
  "Speedy Spider (Beta/x.0; speedy@entireweb.com)" => array(
    "robot" => "entireweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Entireweb search robot",
    "type" => "R"
  ),
  "Speedy Spider (Entireweb; Beta/1.0; http://www.entireweb.com/about/search_tech/speedyspider/)" => array(
    "robot" => "entireweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Entireweb search spider",
    "type" => "R"
  ),
  "Speedy_Spider (http://www.entireweb.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Entireweb search robot",
    "type" => "R"
  ),
  "Sphider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sphider - a lightweight search engine in PHP",
    "type" => "R"
  ),
  "Spida/0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Only.com robot",
    "type" => "R"
  ),
  "spider.batsch.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Batsch robot",
    "type" => "R"
  ),
  "Spider.TerraNautic.net - v:1.04" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TerraNautic spider for Schnellsuchen touristic search (Germany)",
    "type" => "C"
  ),
  "spider.yellopet.com - www.yellopet.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yellopet spider",
    "type" => "R"
  ),
  "Spider/maxbot.com admin@maxbot.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Maxbot .gov .mil .edu indexing robot",
    "type" => "R"
  ),
  "SpiderKU/0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from CPE at Kasetsart University (158.108.35.0xx)",
    "type" => "R"
  ),
  "SpiderMan" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search user agent or spider (202.165.102.0xx)",
    "type" => "R"
  ),
  "SpiderMonkey/7.0x (SpiderMonkey.ca info at http://spidermonkey.ca/sm.shtml)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SpiderMonkey Canada robot",
    "type" => "R"
  ),
  "Spider-Sleek/2.0 (+http://search-info.com/linktous.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search-Info ODP/DMOZ spider",
    "type" => "R"
  ),
  "Spinne/2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Spider.de robot",
    "type" => "R"
  ),
  "Spinne/2.0 med" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Medkatalog (medical catalogue) Austria robot",
    "type" => "R"
  ),
  "Spinne/2.0 med_AH" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Medkatalog (medical catalogue) Austria robot",
    "type" => "R"
  ),
  "sportsuchmaschine.de-Robot (Version: 1.02- powered by www.sportsuchmaschine.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sportsuchmaschine (German sports related search) link checking / robot",
    "type" => "R"
  ),
  "sproose/0.1-alpha (sproose crawler; http://www.sproose.com/bot.html; crawler@sproose.com)" => array(
    "robot" => "sproose",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sproose personalized search (38.100.225.0x)",
    "type" => "R"
  ),
  "SQ Webscanner" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SQ Webscanner Mac download manager",
    "type" => "D"
  ),
  "squidclam" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Squidclam is a replacement for SquidClamAV-Redirector",
    "type" => "P"
  ),
  "SquidClamAV_Redirector 1.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SCAVR - Squid helper script for scanning download URLs for viruses",
    "type" => "P"
  ),
  "Squid-Prefetch" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Simple page-prefetch for Squid web proxy",
    "type" => "P"
  ),
  "Sqworm/2.9.81-BETA (beta_release; 20011102-760; i686-pc-linux-gnu)" => array(
    "robot" => "websense",
    "browser" => NULL,
    "os" => NULL,
    "description" => "AOL Search / Pacific Internet Exchange robot",
    "type" => "R"
  ),
  "Sqworm/2.9.85-BETA (beta_release; 20011115-775; i686-pc-linux-gnu)" => array(
    "robot" => "websense",
    "browser" => NULL,
    "os" => NULL,
    "description" => "diff. IPs / services i.e.: - Inria.fr robot - Websense (Internet filtering) robot",
    "type" => "R"
  ),
  "Sqworm/2.9.89-BETA (beta_release; 20020130-839; i686-pc-linux-gnu) " => array(
    "robot" => "websense",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Time Warner Telecom user robot ?",
    "type" => ""
  ),
  "SSurf15a 11 " => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some site scanning tool via diff. IPs i.e.: - choiceone.net (216.153.0xx.0xx) - epix.net (216.108.198.0x)",
    "type" => "S"
  ),
  "StackRambler/x.0 " => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Rambler search (Russia) robot (81.19.6x.0x)",
    "type" => "R"
  ),
  "Stamina/1.4" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Stamina download manager",
    "type" => "D"
  ),
  "Star Downloader" => array(
    "robot" => "stardownloader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Star Downloader download manager",
    "type" => "D"
  ),
  "StarDownloader/1.0x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Star Downloader download manager",
    "type" => "D"
  ),
  "stat statcrawler@gmail.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Experimental search engine spider from 66.92.186.0xx",
    "type" => "R"
  ),
  "Steeler/1.0 (http://www.tkl.iis.u-tokyo.ac.jp/~crawler/)" => array(
    "robot" => "steeler",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Steeler crawler",
    "type" => "R"
  ),
  "Strategic Board Bot (+http://www.strategicboard.com)" => array(
    "robot" => "strategicboard",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Strategic Board blogs and news aggregator robot",
    "type" => "R"
  ),
  "Submission Spider at surfsafely.com" => array(
    "robot" => "surfsafely",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Surfsafely submission verifier",
    "type" => "R"
  ),
  "suchbaer.de" => array(
    "robot" => "suchbaer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Suchbaer.de (Germany) search robot",
    "type" => "R"
  ),
  "suchbaer.de (CrawlerAgent v0.103)" => array(
    "robot" => "suchbaer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Suchbaer.de (Germany) search robot",
    "type" => "R"
  ),
  "suchbot" => array(
    "robot" => "suchbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Suchbot Germany robot",
    "type" => "R"
  ),
  "Suchknecht.at-Robot" => array(
    "robot" => "suchknecht",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Suchknecht Austria robot",
    "type" => "R"
  ),
  "suchpadbot/1.0 (+http://www.suchpad.de)" => array(
    "robot" => "suchpad",
    "browser" => NULL,
    "os" => NULL,
    "description" => "suchpad search Germany robot (213.239.194.0x)",
    "type" => "R"
  ),
  "Sunrise/0.42g (Windows XP)" => array(
    "robot" => "other",
    "browser" => "sunrisefeeds", //NOT "sunrise"
    "os" => "windowsxp",
    "description" => "Sunrise XP web sites and newsfeeds converter and handheld reader",
    "type" => "B"
  ),
  "SuperBot/1.0 (Win32)" => array(
    "robot" => "superbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SuperBot website copier",
    "type" => "D"
  ),
  "Superdownloads Spiderman" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ubbi Superdownloads (Brazil) link checking",
    "type" => "C"
  ),
  "SURF " => array(
    "robot" => "SurfControl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SurfControl Web Filtering",
    "type" => "P"
  ),
  "SurferF3 1/0" => array(
    "robot" => "wanadoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wanadoo Rechereche robot",
    "type" => "R"
  ),
  "SurfMaster" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Maskbit Surfmaster bookmark tool",
    "type" => "C"
  ),
  "SurveyBot/2.2 <a href='http://www.whois.sc'>Whois Source</a>" => array(
    "robot" => "surveybot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Whois Source domain name information robot (66.249.26.0x)",
    "type" => "R C"
  ),
  "SurveyBot/2.3 (Whois Source)" => array(
    "robot" => "surveybot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Whois Source domain name information robot (66.249.26.0x)",
    "type" => "R C"
  ),
  "suzuran" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yokogao Search Engine robot (Kanazawa University)",
    "type" => "R"
  ),
  "SWB/V1.4 (HP)" => array(
    "robot" => "other",
    "browser" => "securewebbrowser",
    "os" => "other",
    "description" => "HP Secure Web Browser for OpenVMS",
    "type" => "B"
  ),
  "swbot/0.9c libwww/5.3.1" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown",
    "type" => ""
  ),
  "Swooglebot/2.0. (+http://swoogle.umbc.edu/swooglebot.htm)" => array(
    "robot" => "swoogle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Swooglebot Swoogle's semantic web crawler",
    "type" => "R"
  ),
  "SWSBot-Images/1.2 http://www.smartwaresoft.com/swsbot12.html" => array(
    "robot" => "smartware",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SWSBot - SmartWareSoft (85.186.255.0x) software search engine created for Playfuls.com",
    "type" => "R"
  ),
  "SygolBot http://www.sygol.net" => array(
    "robot" => "sygol",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sygol Search (Italy) robot",
    "type" => "R"
  ),
  "Sylera/1.2.0" => array(
    "robot" => "other",
    "browser" => "sylera",
    "os" => "other",
    "description" => "Sylera browser (Japan)",
    "type" => "B"
  ),
  "SyncBot" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Mindspring.com user robot",
    "type" => ""
  ),
  "SyncIT/1.0" => array(
    "robot" => "syncit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "SyncIT link validation",
    "type" => "C"
  ),
  "Syndirella/0.91pre" => array(
    "robot" => "other",
    "browser" => "syndirella",
    "os" => "other",
    "description" => "Syndirella desktop information aggregator (beta)",
    "type" => "B"
  ),
  "SynoBot" => array(
    "robot" => "synomia",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Synomia (France) robot",
    "type" => "R"
  ),
  "Syntryx ANT Scout Chassis Pheromone; Mozilla/4.0 compatible crawler" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Syntryx Solution Suite - domain / keyword crawler (216.7.179.0x)",
    "type" => "R"
  ),
  "Szukacz/1.0" => array(
    "robot" => "szukacz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Szukacz.pl (Polish search) robot",
    "type" => "R"
  ),
  "Szukacz/1.0 (robot; www.szukacz.pl/jakdzialarobot.html; szukacz@proszynski.pl)" => array(
    "robot" => "szukacz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Szukacz.pl (Polish search) robot",
    "type" => "R"
  ),
  // Summary: Added 437 entries from http://www.psychedelix.com/agents/index.shtml?n_s
  // Adding http://www.psychedelix.com/agents/index.shtml?t_z
  "S&L Spider (http://search.hirners.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Search & Links directory spider",
    "type" => "C"
  ),
  "Tagword (http://tagword.com/dmoz_survey.php)" => array(
    "robot" => "tagword",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TAGword DMOZ survey - ODP link checking robot",
    "type" => "R"
  ),
  "Tagyu Agent/1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Tagyu - del.icio.us bookmark collection online tag generator",
    "type" => ""
  ),
  "Talkro Web-Shot/1.0 (E-mail: webshot@daumsoft.com- Home: http://222.122.15.190/webshot)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Daumsoft Talkro IR robot",
    "type" => "R"
  ),
  "TAMU_CS_IRL_CRAWLER/1.0" => array(
    "robot" => "tamu",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Texas A&M University - Dept. of Computer Science crawler (server or link checking ?)",
    "type" => "R C"
  ),
  "targetblaster.com/0.9k" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Targetblaster user link validation ?",
    "type" => "R C"
  ),
  "TargetYourNews.com bot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Target Your News - user submitted links",
    "type" => "C"
  ),
  "TCDBOT/Nutch-0.8 (PhD student research;\"http://www.tcd.ie; mcgettrs at t c d dot IE)\"" => array(
    "robot" => "tcd",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Trinity College Dublin (Ireland) TCDBOT",
    "type" => "R"
  ),
  "TE" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "HTTP header for transfer encoding used as user agent name ?",
    "type" => ""
  ),
  "TeamSoft WinInet Component" => array(
    "robot" => "wininet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WinInet Internet client app.",
    "type" => ""
  ),
  "TECOMAC-Crawler/0.0" => array(
    "robot" => "arexera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tecomac Gmbh (Germany) crawler software - now Arexera Information Technologies",
    "type" => "R"
  ),
  "Tecomi Bot (http://www.tecomi.com/bot.htm)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tecomi (Germany) beta / test robot (84.201.65.0xx)",
    "type" => "R"
  ),
  "Teleport Pro/1.21(.1111)" => array(
    "robot" => "teleport",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teleport (website) downloading tool",
    "type" => "D"
  ),
  "Teoma MP" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teoma crawler (65.214.36.0x[x])",
    "type" => "R"
  ),
  "teoma_agent1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teoma crawler (65.214.36.0x[x])",
    "type" => "R"
  ),
  "teomaagent crawler-admin@teoma.com" => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teoma crawler (65.214.36.0x[x])",
    "type" => "R"
  ),
  "teomaagent1 [crawler-admin@teoma.com]" => array(
    "robot" => "ask",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teoma crawler (65.214.36.0x[x])",
    "type" => "R"
  ),
  "Teradex Mapper; mapper@teradex.com; http://www.teradex.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Teradex Directory robot",
    "type" => "R"
  ),
  "TeragramCrawler" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Teragram multilingual text & data processing software",
    "type" => "D ?"
  ),
  "TerrawizBot/1.0 (+http://www.terrawiz.com/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Terrawiz Indian Search Engine robot",
    "type" => "R"
  ),
  "Test spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Noceans Information Portfolio Manager (66.35.69.0)",
    "type" => "R"
  ),
  "The Expert HTML Source Viewer (http://www.expert-html.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Expert HTML online source viewer",
    "type" => "D B"
  ),
  "TheSuBot/0.1 (www.thesubot.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TheSuBot robot (Germany) for an unknown theme based search engine",
    "type" => "R"
  ),
  "thumbshots-de-Bot (Version: 1.02- powered by www.thumbshots.de)" => array(
    "robot" => "thumbshot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ThumbShots.de (Germany) robot",
    "type" => "R"
  ),
  "timboBot/0.9 http://www.breakingblogs.com/timbo_bot.html" => array(
    "robot" => "timbobot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Breaking Blogs timbo bot blog robot",
    "type" => "R"
  ),
  "TimelyWeb/4.1 ( <a href=\"http://www.timelyweb.com/\">EldoS TimelyWeb 4.1</a> )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TimelyWeb web page monitoring tool",
    "type" => "C"
  ),
  "tivraSpider/1.0 (crawler@tivra.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tivra spider from AT&T Labs Research",
    "type" => "R"
  ),
  "TJG/Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tjgroup spider",
    "type" => "R"
  ),
  "TJvMultiHttpGrabber Component" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "TJvHttpGrabber (JEDI Visual Component Library)",
    "type" => ""
  ),
  "Tkensaku/x.0(http://www.tkensaku.com/q.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tkensaku Search (Japan) robot from 210.239.46.0xx (www.tken.com)",
    "type" => "R"
  ),
  "toCrawl/UrlDispatcher" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from 195.68.98.0x (coltfrance.com)",
    "type" => ""
  ),
  "T-Online Browser" => array(
    "robot" => "other",
    "browser" => "tonline",
    "os" => "other",
    "description" => "German T-Online browser & internet suite ",
    "type" => "B"
  ),
  "TOPOS robot/1.1 (http://www.topos.com.ua/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Topos search (Russia) robot",
    "type" => "C"
  ),
  "Toutatis 1.0 (hoppa.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hoppa robot (81.4.78.0xx)",
    "type" => "R"
  ),
  "Toutatis 1.0-x" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hoppa robot (81.4.78.0xx)",
    "type" => "R"
  ),
  "Toutatis x-xx.0 (hoppa.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Hoppa robot (81.4.78.0xx)",
    "type" => "R"
  ),
  "traazibot/testengine (+http://www.traazi.de)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Traazi! search (Germany) robot",
    "type" => "R"
  ),
  "Trampelpfad-Spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Trampelpfad Webkatalog spider",
    "type" => "R"
  ),
  "Trampelpfad-Spider-v0.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Trampelpfad Webkatalog spider",
    "type" => "R"
  ),
  "tricosMetaCheck 1.2216-08-1999 (http://www.tricos.com/metacheck)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tricos meta tag validation",
    "type" => "C"
  ),
  "TSurf15a 11" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some bad user agent",
    "type" => "S"
  ),
  "TulipChain/5.0 (http://ostermiller.org/tulipchain/) Java/1.0.1_0x (http://java.sun.com/) Linux/2.4.17" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "linux",
    "description" => "Tulip Chain browser / link checker for Dmoz.org directory",
    "type" => "B C R"
  ),
  "TulipChain/5.0x (http://ostermiller.org/tulipchain/) Java/1.0.1_0x (http://apple.com/) Mac_OS_X/10.2.8" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "macosx",
    "description" => "Tulip Chain browser / link checker for Dmoz.org directory",
    "type" => "B C R"
  ),
  "TurnitinBot/x.0 (http://www.turnitin.com/robot/crawlerinfo.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Turnitin (ex SlySearch) robot for helping educational institutions prevent plagiarism",
    "type" => "R"
  ),
  "Turnpike Emporium LinkChecker/0.1" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TurnPike Emporium Directory (207.67.198.0) link checking",
    "type" => "R"
  ),
  "TutorGig/1.5 (+http://www.tutorgig.com/crawler)" => array(
    "robot" => "tutorgig",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TutorGig tutorial search robot",
    "type" => "R"
  ),
  "Tutorial Crawler 1.4 (http://www.tutorgig.com/crawler)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "TutorGig tutorial search robot",
    "type" => "R"
  ),
  "Twiceler www.cuill.com/robots.html" => array(
    "robot" => "twiceler",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Twiceler experimental web crawler (64.62.136.0xx)",
    "type" => "R"
  ),
  "Twisted PageGetter" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "File downloading component from Twisted Python",
    "type" => "D"
  ),
  "Twotrees Reactive Filter V2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Twotrees content filter",
    "type" => "P"
  ),
  "TygoBot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tygo Search robot",
    "type" => "R"
  ),
  "TygoProwler" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Tygo Search robot",
    "type" => "R"
  ),
  "UCmore" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "UCMore -  IE navigation and search plugin",
    "type" => "B"
  ),
  "UCMore Crawler App" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "UCMore -  IE navigation and search plugin",
    "type" => "B"
  ),
  "UDM" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "user agent- maybe UdmSearch (see UdmSearch) ?",
    "type" => ""
  ),
  "UdmSearch/3.1.0" => array(
    "robot" => "udmsearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UdmSearch / MySearch (now mnoGoSeach) offline browser/search client",
    "type" => "R B"
  ),
  "UIowaCrawler/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "University of Iowa Crawler- possibly MySpiders",
    "type" => "R"
  ),
  "UKWizz/Nutch-0.8.1 (UKWizz Nutch crawler; http://www.ukwizz.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UKWizz search robot",
    "type" => "R"
  ),
  "Ultraseek" => array(
    "robot" => "ultraseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Infoseek robot",
    "type" => "R"
  ),
  "Under the Rainbow 2.2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown mail harvester/spambot from 80.58.13.0xx (proxycache.rima-tde.net)",
    "type" => "S"
  ),
  "UofTDB_experiment (leehyun@cs.toronto.edu)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from University of Toronto (128.100.5.1xx)",
    "type" => ""
  ),
  "UP.Browser/3.01-IG01 UP.Link/3.2.3.4" => array(
    "robot" => "other",
    "browser" => "upbrowser",
    "os" => "mobile",
    "description" => "Mobile phone browser",
    "type" => "B"
  ),
  "updated/0.1-alpha (updated crawler; http://www.updated.com; crawler@updated.com)" => array(
    "robot" => "updated",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Updated! search robot",
    "type" => "R"
  ),
  "updated/0.1beta (updated.com; http://www.updated.com; crawler@updated.om)" => array(
    "robot" => "updated",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Updated! search robot",
    "type" => "R"
  ),
  "Uptimebot" => array(
    "robot" => "uptimebot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UptimeBot.com online link popularity check",
    "type" => "R"
  ),
  "UptimeBot(www.uptimebot.com)" => array(
    "robot" => "uptimebot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "UptimeBot.com online link popularity check",
    "type" => "R"
  ),
  "URI::Fetch/0.06" => array(
    "robot" => "urifetch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URI::Fetch - client for fetching HTTP pages and syndication feeds (RSS Atom)",
    "type" => "D"
  ),
  "URL Spider Pro/1.00 (innerprise.net)" => array(
    "robot" => "innerprise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Innerprise URL Spider Pro (now ES.NET) web indexing / site searching tool",
    "type" => "R"
  ),
  "URL_Spider_Pro/2.0" => array(
    "robot" => "innerprise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Innerprise URL Spider Pro (now ES.NET) web indexing / site searching tool",
    "type" => "R"
  ),
  "URL_Spider_Pro/2.0+(http://www.innerprise.net/usp-spider.asp)" => array(
    "robot" => "innerprise",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Innerprise URL Spider Pro (now ES.NET) web indexing / site searching tool",
    "type" => "R"
  ),
  "URLBase/6.0" => array(
    "robot" => "urlbase",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URLBase - Internet shortcut manager",
    "type" => "C"
  ),
  "URLBlaze" => array(
    "robot" => "urlblaze",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URLBlaze file sharing link toolkit",
    "type" => "C"
  ),
  "URLGetFile" => array(
    "robot" => "urlgetfile",
    "browser" => NULL,
    "os" => NULL,
    "description" => "URLGetFile downloading tool",
    "type" => "D"
  ),
  "User-Agent:  BoardReader Favicon Fetcher /1.0 info@boardreader.com" => array(
    "robot" => "boardreader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BoardReader search favicon fetcher ()",
    "type" => "D"
  ),
  "User-Agent:  BoardReader Image Fetcher /1.0 info@boardreader.com" => array(
    "robot" => "boardreader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "BoardReader search image fetcher",
    "type" => "D"
  ),
  "User-Agent:  LjSEEK Picture-Bot /1.0 contact@ljseek.com" => array(
    "robot" => "ljpic",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ljpic.com - LiveJournal picture feed search",
    "type" => "C"
  ),
  "User-Agent: FileHeap! file downloader (http://www.fileheap.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "FileHeap download manager",
    "type" => "D"
  ),
  "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Malformed UA header from some guestbook/forum spammer",
    "type" => "S"
  ),
  "User-Agent: Mozilla/4.0 (SKIZZLE! Distributed Internet Spider v1.0 - www.SKIZZLE.com)" => array(
    "robot" => "skizzle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Skizzle search robot",
    "type" => "R"
  ),
  "user-agent=Mozilla/3.01Gold" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot (reads robots.txt) or sitegrabber. From different IPs- ie.: 62.98.8.0x (wind.it)",
    "type" => "R D ?"
  ),
  "USyd-NLP-Spider (http://www.it.usyd.edu.au/~vinci/bot.html)" => array(
    "robot" => "usyd",
    "browser" => NULL,
    "os" => NULL,
    "description" => "University of Sydney NLP Spider for research in Natural Language Processing ",
    "type" => "R"
  ),
  "UtilMind HTTPGet" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Thief Site Grabber",
    "type" => "D"
  ),
  "Utopia WebWasher 3.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "WebWasher ad filter",
    "type" => "P B"
  ),
  "uTorrent/1500" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Torrent BitTorrent client",
    "type" => "D"
  ),
  "Vagabondo/1.0 MT (webagent@wise-guys.nl)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Vagabondo/2.0 MT" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Vagabondo/2.0 MT (webagent at wise-guys dot nl)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Vagabondo/2.0 MT (webagent@NOSPAMwise-guys.nl)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Vagabondo/3.0 (webagent at wise-guys dot nl)" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys robot Netherland - 82.94.216.2",
    "type" => "R"
  ),
  "Vagabondo-WAP/2.0 (webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)/1.0 Profile" => array(
    "robot" => "vagabondo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WiseGuys WAP pages robot",
    "type" => "R"
  ),
  "Vakes/0.01 (Vakes; http://www.vakes.com/; search@vakes.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Open Directory link checking from Vakes",
    "type" => "R"
  ),
  "Vayala|Creep-v0.0.1 (codepoet@wildties.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown level3.net (63.214.172.0xx) robot",
    "type" => ""
  ),
  "VayalaCreep-v0.0.1 (haploid@haploid.com)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown level3.net (63.214.172.0xx) robot",
    "type" => ""
  ),
  "vb wininet" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "iNet Grabber - Internet content grabber",
    "type" => "D"
  ),
  "versus 0.2 (+http://versus.integis.ch)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Versus Project robot - Comparing methods for near-uniform URL sampling",
    "type" => "R"
  ),
  "versus crawler eda.baykan@epfl.ch" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from EPFL University Switzerland (128.178.155.0xx)",
    "type" => "R"
  ),
  "VeryGoodSearch.com.DaddyLongLegs" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "VeryGoodSearch.com link submission checking",
    "type" => "R"
  ),
  "verzamelgids.nl - Networking4all Bot/x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Verzamelgids NL link checking robot",
    "type" => "R"
  ),
  "Vespa Crawler" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Yahoo Norway (217.144.236.0)",
    "type" => "R"
  ),
  "virus_detector (virus_harvester@securecomputing.com)" => array(
    "robot" => "securecomputing",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sidewinder G2 anti-virus and anti-spyware protection",
    "type" => "D"
  ),
  "Visicom Toolbar" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Some IE toolbar made with Visicom Media Dynamic Toolbar software",
    "type" => "B"
  ),
  "Vision Research Lab image spider at vision.ece.ucsb.edu" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vision research lab's Cortina - content based image retrieval (128.111.60.0x)",
    "type" => "R"
  ),
  "VLC media player - version 0.8.5 Janus - (c) 1996-2006 the VideoLAN team" => array(
    "robot" => "other",
    "browser" => "vlc",
    "os" => "other",
    "description" => "VLC - Cross-platform media player and streaming server",
    "type" => "B"
  ),
  "VMBot/0.7.2 (VMBot; http://www.VerticalMatch.com/; vmbot@tradedot.com)" => array(
    "robot" => "verticalmatch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "VM - Vertical Search Engine (China)",
    "type" => "R"
  ),
  "Vortex/2.2 (+http://marty.anstey.ca/robots/vortex/)" => array(
    "robot" => "vortex",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vortex Web Indexing Robot for a study on  internet link distribution",
    "type" => "R"
  ),
  "voyager/1.0" => array(
    "robot" => "cosmix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Cosmix project crawler (204.14.48.0 / 38.113.234.0xx)",
    "type" => "R"
  ),
  "VSE/1.0 (testcrawler@hotmail.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vivisimo search crawler (206.210.89.0xx)",
    "type" => "R"
  ),
  "VSE/1.0 (testcrawler@vivisimo.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Vivisimo search crawler (206.210.89.0xx)",
    "type" => "R"
  ),
  "vspider" => array(
    "robot" => "verity",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Verity vspider indexing software",
    "type" => "R"
  ),
  "vspider/3.0" => array(
    "robot" => "verity",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Verity vspider indexing software",
    "type" => "R"
  ),
  "W3C_Validator/1.0xx libwww-perl/5.0x" => array(
    "robot" => "validator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "W3C HTML-Code Validator",
    "type" => "C"
  ),
  "W3C-checklink/3.0.0.0 libwww-perl/5.0x" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "W3C Link Checker",
    "type" => "C"
  ),
  "W3C-checklink/4.0 [4.0x] libwww-perl/5.0xx" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "W3C Link Checker",
    "type" => "C"
  ),
  "W3CLineMode/5.4.0 libwww/5.0.0" => array(
    "robot" => "other",
    "browser" => "w3clinemode",
    "os" => "other",
    "description" => "W3C Line Mode (character based Web browser)",
    "type" => "B"
  ),
  "W3CRobot/5.4.0 libwww/5.4.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown link checking using Libwww via Korea Telecom (221.148.44.0xx)",
    "type" => "C"
  ),
  "W3C-WebCon/5.0.0 libwww/5.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCon - the Libwww command line tool",
    "type" => "D"
  ),
  "w3m/0.0.0x" => array(
    "robot" => "other",
    "browser" => "w3m",
    "os" => "other",
    "description" => "w3m Linux pager / text-based browser",
    "type" => "B"
  ),
  "W3SiteSearch Crawler_v1.1 http://www.w3sitesearch.de" => array(
    "robot" => "w3sitesearch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "W3 Site Search (Germany) search engine solution",
    "type" => "R"
  ),
  "wadaino.jp-crawler 0.2 (http://wadaino.jp/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wadain (Japan) Blog / RSS search crawler",
    "type" => "R"
  ),
  "WannaBe (Macintosh; PPC)" => array(
    "robot" => "other",
    "browser" => "wannabe",
    "os" => "macppc",
    "description" => "Wanna-Be text mode browser for Mac OS",
    "type" => "B"
  ),
  "WapOnWindows 1.0" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "windows",
    "description" => "WapOnWindows WAP browser for PCs",
    "type" => "B"
  ),
  "Watchfire WebXM 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Watchfire WebXM intranet solution",
    "type" => "P"
  ),
  "WAVcheck 1.0.0 (http://www.webbanalys.se/apps/WAVcheck/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WAVcheck - Simple Vendor Discovery Tool for detecting client-side tags from web analytics vendors",
    "type" => "C"
  ),
  "Wavefire/0.8-dev (Wavefire; http://www.wavefire.com; info@wavefire.com)" => array(
    "robot" => "wavefire",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wavefire local search community engine (64.141.15.1xx)",
    "type" => "R"
  ),
  "Waypath development crawler - info at waypath dot com" => array(
    "robot" => "waypath",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Waypath blog discovery engine robot",
    "type" => "R"
  ),
  "Waypath Scout v2.0 - info at waypath dot com" => array(
    "robot" => "waypath",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Waypath blog discovery engine robot",
    "type" => "R"
  ),
  "WDG_Validator/1.1" => array(
    "robot" => "wdg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WDG HTML-code validator",
    "type" => "C"
  ),
  "Web Image Collector" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Datafire.com's Web Image Collector (graphics downloading tool)",
    "type" => "D"
  ),
  "Web Link Validator 1.5" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Relsoft link checking software",
    "type" => "C"
  ),
  "Web Snooper" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "RankMeter ranking software",
    "type" => "R"
  ),
  "WebAlta Crawler/1.2.1 (http://www.webalta.ru/bot.html)" => array(
    "robot" => "webalta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebAlta search Russia crawler (85.21.201.0x)",
    "type" => "R"
  ),
  "WebarooBot (Webaroo Bot; http://64.124.122.252/feedback.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebarooBot / RufusBot from webaroo offline search service",
    "type" => "R"
  ),
  "WebAuto/3.4xxx (WinNT; I)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yanasoft WebAuto website copier / downloading tool",
    "type" => "D"
  ),
  "webbandit/4.0x.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Bandit personal search software",
    "type" => "R"
  ),
  "web-bekannt (Version: 1.02, powered by www.internetservice-franken.de)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web-bekannt German web directory link checking",
    "type" => "C"
  ),
  "web-bekannt (Version: 1.02, powered by www.web-bekannt.de)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web-bekannt German web directory link checking",
    "type" => "C"
  ),
  "Web-Bot V1.03" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unkown link or server checking from Wrzburg University Germany (132.187.10.0x)",
    "type" => "R C"
  ),
  "WebBug/5.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Amansoft WebBug web server protocol test",
    "type" => "C"
  ),
  "Webclipping.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebClipping.com - online news monitoring service",
    "type" => "R"
  ),
  "webcollage/1.0x" => array(
    "robot" => "webcollage",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCollage Syndicator graphics crawler/collector",
    "type" => "R D"
  ),
  "WebCompass 2.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Quarterdecks WebCompass search tool",
    "type" => "R"
  ),
  "WebCopier v1.0" => array(
    "robot" => "webcopier",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCopier offline browser",
    "type" => "D B"
  ),
  "WebCopier v1.0a" => array(
    "robot" => "webcopier",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCopier offline browser",
    "type" => "D B"
  ),
  "WebCorp/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCorp (UK) search robot",
    "type" => "R"
  ),
  "WebCorp/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebCorp linguistic search engine",
    "type" => "R"
  ),
  "webcrawl.net" => array(
    "robot" => "webcrawl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webcrawl Search robot (64.40.105.0xx)",
    "type" => "R"
  ),
  "WebDownloader for X 1.00" => array(
    "robot" => "d4x",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unix/Linux Web Downloader",
    "type" => "D"
  ),
  "Webdup/0.9" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from china-netcom.com",
    "type" => ""
  ),
  "WebFetch" => array(
    "robot" => "wingflyer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WingFlyer WebFetch website downloading tool",
    "type" => "D B"
  ),
  "webfetch/5.0.0" => array(
    "robot" => "webfetch",
    "browser" => NULL,
    "os" => NULL,
    "description" => "webfetch - command line tool to fetch files via HTTP",
    "type" => "D"
  ),
  "WebFilter Robot 1.0" => array(
    "robot" => "netspective",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Verso NetSpective WebFilter",
    "type" => "P"
  ),
  "WebFilter Robot 1.0" => array(
    "robot" => "netspective",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Telemate.net NetSpective WebFilter",
    "type" => "P"
  ),
  "WebFindBot(http://www.web-find.com)" => array(
    "robot" => "webfind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webfind search robot",
    "type" => "R"
  ),
  "Webglimpse 2.01.0 (http://webglimpse.net)" => array(
    "robot" => "webglimpse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webglimpse search engine software",
    "type" => "R"
  ),
  "webGobbler/1.0.0" => array(
    "robot" => "webgobbler",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "webGobbler - Online random image generator",
    "type" => "R D"
  ),
  "webhack" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "fake ?",
    "type" => ""
  ),
  "WebLight/4.0.0 (support@illumit.com; http://www.illumit.com/Products/weblight/)" => array(
    "robot" => "weblight",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebLight web analyzer & link checker",
    "type" => "C"
  ),
// FIXME: does not work because of escaping, I think
  "Weblink's checker/" => array(
    "robot" => "weblinks",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebLink's link management system for HTTP- FTP and Mail hyperlinks",
    "type" => "C"
  ),
  "webmeasurement-bot, http://rvs.informatik.uni-leipzig.de" => array(
    "robot" => "webmeasurement",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from Leipzig University (Germany) faculty for computer science",
    "type" => "R"
  ),
  "WebMiner/1.0 [en] (Win98; I)" => array(
    "robot" => "webminer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebMiner bulk file downloader",
    "type" => "D"
  ),
  "WeBoX/0.01" => array(
    "robot" => "webox",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WeBoX (Japan) - Browser and web collector",
    "type" => "B D"
  ),
  "WebPix 1.0 (www.netwu.com)" => array(
    "robot" => "webpix",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebPix - picture downloading tool",
    "type" => "D"
  ),
  "WebQL" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Caesius WebQL - Custom robot/agent generator / web extraction software",
    "type" => "B D"
  ),
  "WebRACE/1.1 (University of Cyprus- Distributed Crawler)" => array(
    "robot" => "webrace",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebRACE - HTTP retrieval- annotation and caching engine ",
    "type" => "P"
  ),
  "WebReaper [info@webreaper.net]" => array(
    "robot" => "webreaper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webreaper download manager",
    "type" => "D"
  ),
  "WebReaper [webreaper@webreaper.net]" => array(
    "robot" => "webreaper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webreaper download manager",
    "type" => "D"
  ),
  "WebReaper vx.0 - www.webreaper.net" => array(
    "robot" => "webreaper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webreaper download manager",
    "type" => "D"
  ),
  "Web-Robot/5.0 (en-US; web-robot.com/policy.html) Web-Robot Crawler/2.0.3" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Unknown robot from 69.50.233.0 (nectartech.com)",
    "type" => ""
  ),
  "WebSearch.COM.AU/3.0.1 (The Australian Search Engine; http://WebSearch.COM.AU; Search@WebSearch.COM.AU)" => array(
    "robot" => "websearchau",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Websearch Australia robot",
    "type" => "R"
  ),
  "WebSearchBench WebCrawler v0.1(Experimental)" => array(
    "robot" => "websearchbench",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dortmund University WebSearchBench - Open source search software",
    "type" => "R"
  ),
  "WebSearchBench WebCrawler V1.0 (Beta)- Prof. Dr.-Ing. Christoph Lindemann- Universit� Dortmund- cl@cs.uni-dortmund.de- http://websearchbench.cs.uni-dortmund.de/" => array(
    "robot" => "websearchbench",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Dortmund University WebSearchBench - Open source search software",
    "type" => "R"
  ),
  "Website Explorer/0.9.0.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web site downloading tool and offline browser (Japan)",
    "type" => "D"
  ),
  "Website eXtractor" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Website eXtractor web site downloading tool",
    "type" => "D"
  ),
  "WebsiteWorth v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Sootle web directory Website Worth ranking tool",
    "type" => "R"
  ),
  "Webspinne/1.0 webmaster@webspinne.de" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webspinne.de robot",
    "type" => "R"
  ),
  "Websquash.com (Add url robot)" => array(
    "robot" => "websquash",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Websquash.com Search Engine robot / link checking",
    "type" => "R"
  ),
  "WebStat/1.0 (Unix; beta; 20040314)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebStat - Java statistical computing environment for the web",
    "type" => "R"
  ),
  "Webster v0.3 ( http://webster.healeys.net/ )" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webster - Rev. Healeys web crawler",
    "type" => "R"
  ),
  "webster-internet.de pad browser" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Websters Webmaster Archive (Germany) submission / pad checking",
    "type" => "C B"
  ),
  "WebStripper/2.00" => array(
    "robot" => "webstripper",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebStripper download manager",
    "type" => "D"
  ),
  "WebTrafficExpress/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebTrafficExpress IBM server software",
    "type" => "P"
  ),
  "WebTrends/3.0 (WinNT)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Trends link analyzer",
    "type" => "C"
  ),
  "WebVac (webmaster@pita.stanford.edu)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "The Stanford WebBase Project crawler",
    "type" => "R"
  ),
  "WebVal/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "webval - Python link checking tool",
    "type" => "C"
  ),
  "Webverzeichnis.de - Telefon: 01908 / 26005" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Webverzeichnis.de (Germany) directory robot",
    "type" => "R"
  ),
  "WebVulnCrawl.blogspot.com/1.0 libwww-perl/5.803" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Web Vulnerability Crawler",
    "type" => "S"
  ),
  "WebWatcherMonitor/2.01" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Studio Net.Idea's Web Watcher Monitor robot",
    "type" => "R C"
  ),
  "WebZIP/1.0 (http://www.spidersoft.com)" => array(
    "robot" => "webzip",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebZip offline browser",
    "type" => "B D"
  ),
  "Wells Search II" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown spam bot / harvester (62.163.**.** / 62.194.**.*)",
    "type" => "S"
  ),
  "WEP Search 00" => array(
    "robot" => "wep",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some spam bot- see link",
    "type" => "S"
  ),
  "West Wind Internet Protocols 4.01" => array(
    "robot" => "westwind",
    "browser" => NULL,
    "os" => NULL,
    "description" => "wwIPStuff - Internet client tools for Visual FoxPro",
    "type" => "B D"
  ),
  "WFARC" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "IBM's Almaden Research robot (Clever search project)",
    "type" => "R"
  ),
  "Wget/1.0(.0)GNU wget http://www.gnu.org/software/wget/wget.html - file downloader" => array(
    "robot" => "wget",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GNU wget - file downloader",
    "type" => "D"
  ),
  "Wget/1.0.0+cvs" => array(
    "robot" => "wget",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GNU wget - file downloader",
    "type" => "D"
  ),
  "Wget/1.0+cvs-stable (Red Hat modified)" => array(
    "robot" => "wget",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GNU wget - file downloader",
    "type" => "D"
  ),
  "Whatsup/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Whatsup Gold network monitor",
    "type" => "C"
  ),
  "whatUseek_winona/3.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WhatUSeek / Chubba robot",
    "type" => "R"
  ),
  "WhizBang! Lab" => array(
    "robot" => "whizbang",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WhizBang! Labs (closed since May 2002) information extraction robot",
    "type" => "R"
  ),
  "Wildsoft Surfer" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some download agent",
    "type" => "D"
  ),
  "Willow Internet Crawler by Twotrees V2.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Twotrees crawler",
    "type" => "R"
  ),
  "WinampMPEG/2.00 (larbin@unspecified.mail)" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "unknown robot from gw.ocg-corp.com (209.126.176.0)",
    "type" => ""
  ),
  "WincerSong Agent v1.0" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Super Affiliate Tracker agent by Wincer Song",
    "type" => ""
  ),
  "Windows-Media-Player/10.00.00.0000" => array(
    "robot" => "other",
    "browser" => "mediaplayer",
    "os" => "windows",
    "description" => "Windows Media Player 10",
    "type" => "B"
  ),
  "WinHTTP Example/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Example code for a WinHTTP C++ library crawler",
    "type" => "R"
  ),
  "WinkBot/0.06 (Wink.com search engine web crawler; http://www.wink.com/Wink:WinkBot; winkbot@wink.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wink beta search robot (64.13.136.0)",
    "type" => "R"
  ),
  "WinWAP/3.0 (3.0.0.0x; Win32) (Google WAP Proxy/1.0)" => array(
    "robot" => "other",
    "browser" => "wap",
    "os" => "windows",
    "description" => "WinWap - Windows PC WAP browser",
    "type" => "B"
  ),
  "Wir sind die Borg (Version: 1.03, Sie wurden Assimiliert +http://www.yammba.com/suchmaschine/bot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yammba web directory (Germany) link checking",
    "type" => "C"
  ),
  "WIRE/0.11 (Linux; i686; Bot,Robot,Spider,Crawler,aromano@cli.di.unipi.it)" => array(
    "robot" => "wire",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WIRE crawler used by the University of Pisa - Italy",
    "type" => "R"
  ),
  "WIRE/0.0 (Linux; i686; Bot,Robot,Spider,Crawler)" => array(
    "robot" => "wire",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WIRE - Web information retrieval environment crawler",
    "type" => "R"
  ),
  "WISEbot/1.0 (WISEbot@koreawisenut.com; http://wisebot.koreawisenut.com)" => array(
    "robot" => "zyborg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Korea Wisenut robot",
    "type" => "R"
  ),
  "WiseWire-Spider2" => array(
    "robot" => "TODO",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "Wisewire domain checker (Discontinued)",
    "type" => "R C"
  ),
  "WordChampBot" => array(
    "robot" => "wordchamp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wordchamp web page vocabulary / translation robot",
    "type" => "B D"
  ),
  "WordPress/1.0.0.0 PHP/4.0.01" => array(
    "robot" => "wordpress",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WordPress personal Blog publishing platform",
    "type" => "R"
  ),
  "WorldLight" => array(
    "robot" => "worldlight",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Entireweb Search robot (62.13.25.0xx)",
    "type" => "R"
  ),
  "WorQmada/1.0" => array(
    "robot" => "worqmada",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unknown link checking (from 4.18.57.126) ?",
    "type" => "C"
  ),
  "Wotbox/alpha0.6 (bot@wotbox.com; http://www.wotbox.com)" => array(
    "robot" => "wotbox",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wotbox spider",
    "type" => "R"
  ),
  "Wotbox/alpha0.0.0 (bot@wotbox.com; http://www.wotbox.com) Java/1.4.1_02" => array(
    "robot" => "wotbox",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wotbox spider",
    "type" => "R"
  ),
  "WSB WebCrawler V1.0 (Beta)- cl@cs.uni-dortmund.de" => array(
    "robot" => "wsb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebSearchBench crawler from Dortmund University- Germany",
    "type" => "R"
  ),
  "WSB, http://websearchbench.cs.uni-dortmund.de" => array(
    "robot" => "wsb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WebSearchBench crawler from Dortmund University- Germany",
    "type" => "R"
  ),
  "wume_crawler/1.1 (http://wume.cse.lehigh.edu/~xiq204/crawler/)" => array(
    "robot" => "wume",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WUME Lab's web crawler (128.180.121.0xx)",
    "type" => "R"
  ),
  "Wusage/1.0@boutell.com" => array(
    "robot" => "wusage",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wusage log-file analysis",
    "type" => "R C"
  ),
  "Wwlib/Linux" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WWLib - Wolverhampton Univerity Web Library for classifying web documents",
    "type" => "R"
  ),
  "WWSBOT 1.0 [--- http://www.analyzer.nu ---]" => array(
    "robot" => "wws",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WWSBOT web server version checker",
    "type" => "C"
  ),
  "www.arianna.it" => array(
    "robot" => "arianna",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Arianna robot",
    "type" => "R"
  ),
  "www.business-socket.com registry verify/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Business-Socket.com link checking ?",
    "type" => "C"
  ),
  "www.doweb.co.uk crawler" => array(
    "robot" => "doweb",
    "browser" => NULL,
    "os" => NULL,
    "description" => "The DoWeb UK Business directory link checking",
    "type" => "C"
  ),
  "www4mail/2.0 libwww-FM/2.14 (Unix; I)" => array(
    "robot" => "www4mail",
    "browser" => NULL,
    "os" => NULL,
    "description" => "www4mail - web navigation & database search by e-mail",
    "type" => ""
  ),
  "WWWC/1.0x" => array(
    "robot" => "wwwc",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WWWC Updating check of Web pages. (Japanese only)",
    "type" => "C"
  ),
  "WWWeasel Robot v1.00 (http://wwweasel.de)" => array(
    "robot" => "wwweasel",
    "browser" => NULL,
    "os" => NULL,
    "description" => "World Wide Weasel Germany robot",
    "type" => "R"
  ),
  "WWW-Mechanize/1.11" => array(
    "robot" => "wwwmechanize",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Perl web page fetching module",
    "type" => "D"
  ),
  "WWWOFFLE/2.0" => array(
    "robot" => "wwwoffle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "WWWoffle download manager",
    "type" => "D"
  ),
  "wwwster/1.0 (Beta- mailto:gue@cis.uni-muenchen.de)" => array(
    "robot" => "wwwster",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown robot from CIS at Munich University (129.187.254.0xx)",
    "type" => ""
  ),
  "Xaldon WebSpider" => array(
    "robot" => "xaldon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xaldon WebSpider offline browser",
    "type" => "B D"
  ),
  "X-Crawler" => array(
    "robot" => "arexera",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Arexera (Germany) crawler software",
    "type" => "R"
  ),
  "Xenu Link Sleuth 1.0x" => array(
    "robot" => "xenu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xenu link checker",
    "type" => "C"
  ),
  "Xenu's Link Sleuth 1.0[a-z]" => array(
    "robot" => "xenu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Xenu link checker",
    "type" => "C"
  ),
  "Xerka WebBot v1.0.0 [UPVOpenDir]" => array(
    "robot" => "xerka",
    "browser" => NULL,
    "os" => NULL,
    "description" => "XerKa text mining and information retrieval software",
    "type" => "D"
  ),
  "xine/1.0" => array(
    "robot" => "other",
    "browser" => "xine",
    "os" => "other",
    "description" => "xine - free Linux / OS/2 multimedia player",
    "type" => ""
  ),
  "xirq/0.1-beta (xirq; http://www.xirq.com; xirq@xirq.com)" => array(
    "robot" => "xirq",
    "browser" => NULL,
    "os" => NULL,
    "description" => "XIRQ search (beta) robot (70.86.206.1xx)",
    "type" => "R"
  ),
  "XMLSlurp/0.1 libwww-perl/5.805" => array(
    "robot" => "xmlslurp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "GPath / XMLSlurp - Expression language for tree structured data",
    "type" => ""
  ),
  "XRL/2.00b1 (Linux; i686; en-us) (+http://metamark.net/about)" => array(
    "robot" => "metamark",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Metamark URL Shorten Service",
    "type" => "P"
  ),
  "xyro_(xcrawler@cosmos.inria.fr)" => array(
    "robot" => "inria",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Inria Crawler",
    "type" => "R"
  ),
  "Y!J/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Japan robot (211.14.8.2xx)",
    "type" => "R"
  ),
  "Y!J-BSC/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Japan robot (211.14.8.2xx)",
    "type" => "R"
  ),
  "Y!J-SRD/1.0" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search Japan robot (203.216.197.0xx)",
    "type" => "R"
  ),
  "Y!OASIS/TEST no-ad Mozilla/4.08 [en] (X11; I; FreeBSD 2.2.8-STABLE i386)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo picture service for mobiles (217.12.4.0x)",
    "type" => "P"
  ),
  "Y!TunnelPro" => array(
    "robot" => "other",
    "browser" => "yahoomessenger",
    "os" => "other",
    "description" => "Y!TunnelPro - Yahoo! Messenger companion user agent",
    "type" => "B"
  ),
  "yacy (www.yacy.net; v20040602; i386 Linux 2.4.26-gentoo-r13; java 1.4.2_06; MET/en)" => array(
    "robot" => "yacy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yacy distributed P2P web search engine robot",
    "type" => "R"
  ),
  "yacybot (x86 Windows XP 5.1; java 1.5.0_06; Europe/de) yacy.net" => array(
    "robot" => "yacy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yacy distributed P2P web search engine robot",
    "type" => "R"
  ),
  "Yahoo! Mindset" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Mindset: Intent-driven Search (66.228.182.1xx)",
    "type" => "R"
  ),
  "Yahoo-Blogs/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://help.yahoo.com/help/us/ysearch/crawling/crawling-02.html )" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo blog indexing robot (209.191.83.1xx)",
    "type" => "R"
  ),
  "YahooFeedSeeker/2.0 (compatible; Mozilla 4.0; MSIE 5.5; http://publisher.yahoo.com/rssguide)" => array(
    "robot" => "yahoo-feed",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Publisher Network RSS crawler",
    "type" => "R"
  ),
  "Yahoo-MMAudVid/1.0 (mms dash mmaudvidcrawler dash support at yahoo dash inc dot com)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo multimedia crawler (206.190.43.0x)",
    "type" => "R"
  ),
  "Yahoo-MMCrawler/3.0 (mm dash crawler at trd dot overture dot com)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo multimedia crawler via Fastsearch.net (66.77.73.0x)",
    "type" => "R"
  ),
  "YahooSeeker/1.0 (compatible; Mozilla 4.0; MSIE 5.5; http://help.yahoo.com/help/us/shop/merchant/)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Product Search crawler ( 66.196.93.0)",
    "type" => "R"
  ),
  "YahooSeeker/1.0 (compatible; Mozilla 4.0; MSIE 5.5; http://search.yahoo.com/yahooseeker.html)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Product Search crawler ( 66.196.93.0)",
    "type" => "R"
  ),
  "YahooSeeker/1.1 (compatible; Mozilla 4.0; MSIE 5.5; http://help.yahoo.com/help/us/shop/merchant/)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Product Search crawler ( 66.196.93.0)",
    "type" => "R"
  ),
  "YahooSeeker/bsv3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://help.yahoo.com/help/us/ysearch/crawling/crawling-02.html )" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Product Search crawler ( 68.142.195..0)",
    "type" => "R"
  ),
  "YahooSeeker/CafeKelsa-dev (compatible; Konqueror/3.2; FreeBSD ;cafekelsa-dev-webmaster@yahoo-inc.com )" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo robot (64.157.137.0xx)",
    "type" => "R"
  ),
  "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://search.yahoo.com/)" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Product Search crawler ( 68.142.195..0)",
    "type" => "R"
  ),
  "Yahoo-Test/4.0" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo Search robot",
    "type" => "R"
  ),
  "Yahoo-VerticalCrawler-FormerWebCrawler/3.9 crawler at trd dot overture dot com; http://www.alltheweb.com/help/webmaster/crawler" => array(
    "robot" => "yahoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yahoo crawler via Overture (66.77.73.3x)",
    "type" => "R"
  ),
  "Yandex/1.01.001 (compatible; Win16; I)" => array(
    "robot" => "yandex",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yandex Search Russia link checking (213.180.206.2xx)",
    "type" => "R"
  ),
  "yarienavoir.net/0.2" => array(
    "robot" => "yarienavoir",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yarienavoir search (Belgium) robot (217.71.121.0x)",
    "type" => "R"
  ),
  "Yeti" => array(
    "robot" => "1noon",
    "browser" => NULL,
    "os" => NULL,
    "description" => "1noon.com search Korea robot (222.231.21.0xx)",
    "type" => "R"
  ),
  "yoogliFetchAgent/0.1" => array(
    "robot" => "yoogli",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yoogli search (under development) agent",
    "type" => "R"
  ),
  "yoono/1.0 web-crawler/1.0" => array(
    "robot" => "yoono",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Yoono - community based search",
    "type" => "R"
  ),
  "YottaCars_Bot/4.12 (+http://www.yottacars.com) Car Search Engine" => array(
    "robot" => "yotta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "YottaCars bot - YottaCar car search engine ( 64.62.175.0xx)",
    "type" => "R"
  ),
  "YTunnelPro" => array(
    "robot" => "other",
    "browser" => "yahoomessenger",
    "os" => "other",
    "description" => "Y!TunnelPro - Yahoo! Messenger companion user agent",
    "type" => "B"
  ),
  "Z-Add Link Checker (http://w3.z-add.co.uk/linkcheck/)" => array(
    "robot" => "linkcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Z-Add online link checker",
    "type" => "C"
  ),
  "Zao/0.1 (http://www.kototoi.org/zao/)" => array(
    "robot" => "zao",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zao crawler for Kototoi Project",
    "type" => "R"
  ),
  "Zao-Crawler" => array(
    "robot" => "zao",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zao crawler for Kototoi Project",
    "type" => "R"
  ),
  "Zao-Crawler 0.2b" => array(
    "robot" => "zao",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zao crawler for Kototoi Project",
    "type" => "R"
  ),
  "ZBot/1.00 (icaulfield@zeus.com)" => array(
    "robot" => "zeus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zeus Internet Marketing Robot based on Webster Pro component",
    "type" => "R"
  ),
  "Zearchit" => array(
    "robot" => "zearchit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zearchit German search / directory (212.227.109.1xx)",
    "type" => "R"
  ),
  "ZeBot_lseek.net (bot@ze.bz)" => array(
    "robot" => "zebz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ze.bz Moteur de Recherche robot (213.251.135.0x)",
    "type" => "R"
  ),
  "ZeBot_www.ze.bz (ze.bz@hotmail.com)" => array(
    "robot" => "zebz",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Ze.bz Moteur de Recherche robot (213.251.135.0x)",
    "type" => "R"
  ),
  "zedzo.digest/0.1 (http://www.zedzo.com/)" => array(
    "robot" => "zedzo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "ZedZo Search (beta) robot - 24.62.50.1xx",
    "type" => "R"
  ),
  "zerxbot/Version 0.6 libwww-perl/5.79" => array(
    "robot" => "zerx",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zerx search robot (138.88.147.0xx) ?",
    "type" => "R"
  ),
  "Zeus ThemeSite Viewer Webster Pro V2.9 Win32" => array(
    "robot" => "zeus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zeus Internet Marketing Robot (based on Webster Pro)",
    "type" => "R"
  ),
  "Zeus xxxxx Webster Pro V2.9 Win32" => array(
    "robot" => "zeus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zeus Internet Marketing Robot (based on Webster Pro)",
    "type" => "R"
  ),
  "Zeusbot/0.07 (Ulysseek's web-crawling robot; http://www.zeusbot.com; agent@zeusbot.com)" => array(
    "robot" => "zeus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zeusbot robot for building the Ulsysseek.com index",
    "type" => "R"
  ),
  "Ziggy -- The Clown From Hell!!" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Unknown agent (server- or link checking ?) from 198.173.158.0x",
    "type" => "C"
  ),
  "ZipppBot/0.0x (ZipppBot; http://www.zippp.net; webmaster@zippp.net)" => array(
    "robot" => "zippp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zipp.net web search robot",
    "type" => "R"
  ),
  "ZIPPPCVS/0.0x (ZipppBot/.0x;http://www.zippp.net; webmaster@zippp.net)" => array(
    "robot" => "zippp",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zipp.net web search robot",
    "type" => "R"
  ),
  "Zippy v2.0 - Zippyfinder.com" => array(
    "robot" => "zippy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zippyfinder robot",
    "type" => "R"
  ),
  "Zoo Tycoon 2 Client -- http://www.zootycoon.com" => array(
    "robot" => "other",
    "browser" => "zootycoon2",
    "os" => "other",
    "description" => "Microsoft Zoo Tycoon 2 game client",
    "type" => "B"
  ),
  "ZoomSpider - wrensoft.com" => array(
    "robot" => "zoom",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Zoom Search Engine software spider",
    "type" => "R"
  ),
  "zspider/0.9-dev http://feedback.redkolibri.com/" => array(
    "robot" => "zspider",
    "browser" => NULL,
    "os" => NULL,
    "description" => "zspider robot for a new search engine",
    "type" => "R"
  ),
  "ZyBorg/1.0 (ZyBorg@WISEnut.com; http://www.WISEnut.com)" => array(
    "robot" => "zyborg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Wisenut robot",
    "type" => "R"
  ),
  // Summary: Added 294 entries from http://www.psychedelix.com/agents/index.shtml?t_z
  "HotJava 3.0 (x86 [de] Windows 95 4.90; Sun)" => array(
    "robot" => "other",
    "browser" => "hotjava",
    "os" => "windows95",
    "description" => "",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "A system with InfoPath installed",
    "type" => ""
  ),
  "Vienna/2.1.0.2108" => array(
    "robot" => "other",
    "browser" => "vienna",
    "os" => "other",
    "description" => "An RSS Reader for Mac OS X"
  ),
  "WDG_Validator/1.6.3" => array(
    "robot" => "wdg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "An HTML validator"
  ),
  "Mozilla/3.01Gold (Macintosh; I; 68K)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "mac",
    "description" => "Netscape 3.01 Gold on Mac OS"
  ),
  "Mozilla/4.08 (Win95; I)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows95",
    "description" => "Netscape 4.08 on Windows 95"
  ),
  "Mozilla/4.61 [de] (OS/2; U)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "os2",
    "description" => "Netscape 4.61 on OS/2"
  ),
  "Mozilla/4.78 [en] (X11; U; Linux 2.4.10-4GB i686)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "linux",
    "description" => "Netscape 4.61 on Linux 2.4 (this 4GB might indicate that it was a SuSE Linux ...)"
  ),
  "Mozilla/2.0 (compatible; MSIE 3.0; Windows 95)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows95",
    "description" => "Internet Explorer 3.0 on Windows 95"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows98",
    "description" => "Internet Explorer 4.01 on Windows 98"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows2k",
    "description" => "Internet Explorer 5.01 on Windows 2000"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.17; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "Internet Explorer 5.17 on Mac Power PC"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.23; Mac_PowerPC)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "macppc",
    "description" => "Internet Explorer 5.23 on Mac Power PC"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsme",
    "description" => "Internet Explorer 5.5 on Windows ME"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 6.0 on Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "Internet Explorer 7.0 on Windows XP"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; de-AT; rv:1.2.1) Gecko/20021204" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "linux",
    "description" => "Mozilla 1.2.1 on Linux"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.0; de-AT; rv:1.7) Gecko/20040608" => array(
    "robot" => "other",
    "browser" => "mozilla",
    "os" => "windows2k",
    "description" => "Mozilla 1.7 on Windows 2000"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.0.7) Gecko/20060910 SeaMonkey/1.0.5" => array(
    "robot" => "other",
    "browser" => "seamonkey",
    "os" => "windows2k",
    "description" => "Mozilla 1.7 on Windows 2000"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.5) Gecko/20031007 Firebird/0.7" => array(
    "robot" => "other",
    "browser" => "firebird",
    "os" => "linux",
    "description" => "Firebird 0.7 on englisch Linux"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7) Gecko/20040803 Firefox/0.9.3" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => "Firefox 0.9.3 on englisch Windows XP"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.8.0.1) Gecko/20060111 Firefox/1.5.0.1" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "windowsxp",
    "description" => "Firefox 1.5.0.1 on german Windows XP"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.0; de-DE; rv:0.9.4.1) Gecko/20020508 Netscape6/6.2.3" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windows2k",
    "description" => "Netscape 6.2.3 on german Windows 2000"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; de-DE; rv:1.4) Gecko/20030619 Netscape/7.1 (ax)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windowsxp",
    "description" => "Netscape 7.1 on german Windows XP with ActiveX plugin installed"
  ),
  "Mozilla/5.0 Galeon/1.2.7 (X11; Linux i686; U;) Gecko/20030131" => array(
    "robot" => "other",
    "browser" => "galeon",
    "os" => "linux",
    "description" => "Galeon 1.2.7 on Linux"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.7) Gecko/20040517 Camino/0.8b" => array(
    "robot" => "other",
    "browser" => "camino",
    "os" => "macosx",
    "description" => "Camino 0.8b on Mac OS X"
  ),
  "Mozilla/5.0 (compatible; Konqueror/2.2.1; Linux)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Konqueror 2.2.1 on Linux"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.2; Linux) (KHTML, like Gecko)" => array(
    "robot" => "other",
    "browser" => "konqueror",
    "os" => "linux",
    "description" => "Konqueror 3.2 on Linux"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.7" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "macosx",
    "description" => "Safari 85.7 on german Mac OS X"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/125.2 (KHTML, like Gecko) Safari/125.8" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "macosx",
    "description" => "Safari 125.8 on Mac OS X"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; de-de) AppleWebKit/417.9 (KHTML, like Gecko) Safari/417.8" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "macosx",
    "description" => "Safari 417.8 on Mac OS X"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US) AppleWebKit/85 (KHTML, like Gecko) OmniWeb/v558.46" => array(
    "robot" => "other",
    "browser" => "omniweb",
    "os" => "macosx",
    "description" => "OmniWeb 558.46 on Mac OS X"
  ),
  "Mozilla/5.0 (PC; U; Intel; Windows; en) AppleWebKit/420+ (KHTML, like Gecko)" => array(
    "robot" => "other",
    "browser" => "webkit",
    "os" => "windows",
    "description" => "Swift on Windows, will be detected as plain webkit because developers forgot the user agent"
  ),
  "Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 5.12 [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windows98",
    "description" => "Opera 5.12 on german Windows 98"
  ),
  "Opera/6.05 (Windows XP; U) [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 6.05 on german Windows XP"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; X11; Linux i686) Opera 7.23 [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "linux",
    "description" => "Opera 7.23 on german Linux"
  ),
  "Opera/7.51 (X11; SunOS sun4u; U) [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "sun",
    "description" => "Opera 7.51 on german Sun OS"
  ),
  "Mozilla/5.0 (Windows NT 5.1; U) Opera 8.51 [de]" => array(
    "robot" => "other",
    "browser" => "opera",
    "os" => "windowsxp",
    "description" => "Opera 8.51 on german Windows XP"
  ),
  "Lynx/2.8.3rel.1 libwww-FM/2.14FM" => array(
    "robot" => "other",
    "browser" => "lynx",
    "os" => "other",
    "description" => "Lynx 2.8.3"
  ),
  "amaya/8.2+ libwww/5.4.0" => array(
    "robot" => "other",
    "browser" => "amaya",
    "os" => "other",
    "description" => "amaya 8.2"
  ),
  "iCab/2.9.6 (Macintosh; U; PPC)" => array(
    "robot" => "other",
    "browser" => "icab",
    "os" => "macppc",
    "description" => "iCab 2.9.6"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; Win64; x64; SV1)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp64",
    "description" => "64-Bit Internet Explorer on Windows XP 64"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; WOW64; SV1; .NET CLR 1.1.4322)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp64",
    "description" => "32-Bit Internet Explorer on Windows XP 64"
  ),
  "Mozilla/5.0 (compatible; Webbot/0.1; http://www.webbot.ru/bot.html)" => array(
    "robot" => "webbotru",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Some Russian bot"
  ),
  "Sphere Scout&v4.0 (beta) - scout at sphere dot com" => array(
    "robot" => "spherescout",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A blogsearch robot"
  ),
  "Windows-RSS-Platform/1.0 (MSIE 7.0; Windows NT 5.1)" => array(
    "robot" => "explorerrss",
    "browser" => NULL,
    "os" => NULL,
    "description" => "The RSS reader in IE7"
  ),
  "User-Agent: BoardReader-Image-Fetcher /1.0 info@boardreader.com" => array(
    "robot" => "boardreader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "A blogsearch robot"
  ),
  "BilgiBot/1.0(beta) (http://www.bilgi.com/; bilgi at bilgi dot com)" => array(
    "robot" => "bilgi",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Acme.Spider" => array(
    "robot" => "acme",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Sensis Web Crawler (search_comments/at/sensis/dot/com/dot/au)" => array(
    "robot" => "sensis",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; QihooBot 1.0))" => array(
    "robot" => "qihoo",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "hl_ftien_spider_v1.1" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unkown bot from 221.238.251.3 (China)"
  ),
  "sogou spider" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "unkown bot from 220.181.26.103 (China)"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8; Diffbot http://www.diffbot.com) Gecko/20051111 Firefox/1.5" => array(
    "robot" => "diffbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "WebPatrol/2.0" => array(
    "robot" => "webpatrol",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "vBSEO (http://www.vbseo.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Birddoctors.net Spider v1.0 - Verifying your website" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "RI Checker" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Plagger/0.7.17 (http://plagger.org/)" => array(
    "robot" => "plagger",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "ICC-Crawler(Mozilla-compatible; http://kc.nict.go.jp/icc/crawl.html; icc-crawl(at)ml(dot)nict(dot)go(dot)jp)" => array(
    "robot" => "icc",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Mozilla/5.0 (compatible; DNS-Digger-Explorer/1.0; +http://www.dnsdigger.com)" => array(
    "robot" => "dnsdigger",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "Webagogo" => array(
    "robot" => "webagogo",
    "browser" => NULL,
    "os" => NULL,
    "description" => ""
  ),
  "MOT-TA02/06.04.2FR MIB/1.2.1 (Google WAP Proxy/1.0)" => array(
    "robot" => "other",
    "browser" => "mib",
    "os" => "mobile",
    "description" => "A motorola mobile phone (nothing to do with google)"
  ),
  "Guestbook Auto Submitter" => array(
    "robot" => "SPAM",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Guestbook spamming tool",
    "type" => "S"
  ),
  "InelaBot/0.2 (+http://inelegant.org/bot)" => array(
    "robot" => "inela",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Web Downloader/6.5" => array(
    "robot" => "webdownloader",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "D"
  ),
  "umai/0.1 libwww-perl/5.803" => array(
    "robot" => "umai",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "PubSub Feed Discover/0.1 ejen@pubsub.com;" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => ""
  ),
  "Mozilla/6.0 (compatible; arameda.com Spider)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => ""
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; UrlMonitor)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.internetsupervision.com/urlmonitor",
    "type" => ""
  ),
  "Schmozilla/v9.14 Platinum" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://iis1.cps.unizar.es/Oreilly/perl/cookbook/ch20_02.htm",
    "type" => ""
  ),
  "LB-Crawler/1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Could this be another Hungarian bot?",
    "type" => ""
  ),
  "SBL-BOT (http://sbl.net)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Could this be another Hungarian bot?",
    "type" => ""
  ),
  "Mozilla/4.0 compatible ZyBorg/1.0 Dead Link Checker (wn.dlc@looksmart.net; http://www.WISEnutbot.com)" => array(
    "robot" => "wisenut",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => ""
  ),
  "PlantyNet_WebRobot_V1.9 dhkang@plantynet.com" => array(
    "robot" => "plantynet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "appears to be similiar to Websense and friends, that is a corporate filtering solution",
    "type" => ""
  ),
  "CCGCrawl/1.43 (CCGCrawl; http://www.myworkbase.com/bot.html; bot at myworkbase dot com)" => array(
    "robot" => "ccgcrawl",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "IconSurf/2.0 favicon finder (see http://iconsurf.com/robot.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "From what I've seen it seems to be similiar to peerbot, which is also specialised on favicons",
    "type" => "R"
  ),
  "ScSpider/0.2" => array(
    "robot" => "surfcontrol",
    "browser" => NULL,
    "os" => NULL,
    "description" => "From what I've seen it seems to be similiar to peerbot, which is also specialised on favicons",
    "type" => "R"
  ),
  "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; fr-fr) AppleWebKit/125.5 (KHTML, like Gecko)" => array(
    "robot" => "other",
    "browser" => "webkit",
    "os" => "macosx",
    "description" => "Swift on Mac OS X, but we will detect it as webkit",
    "type" => "B"
  ),
  "Wapalizer/1.2" => array(
    "robot" => "wapalizer",
    "browser" => NULL,
    "os" => NULL,
    "description" => "some sort of an emulator, you type an url into a form and then a popup shows how it looks like from a mobile device",
    "type" => ""
  ),
  "f-bot test pilot" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "a Japanese bot",
    "type" => ""
  ),
  "Under the Rainbow 2.2" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "SSM Agent 1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "flumpcakes.co.uk CSS Optimizer" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Akregator/1.2.3; librss/remnants" => array(
    "robot" => "other",
    "browser" => "akregator",
    "os" => "other",
    "description" => "",
    "type" => ""
  ),
  "Pingdom GIGRIB (http://www.pingdom.com)" => array(
    "robot" => "pingdom",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "sproose/1.0beta (sproose bot; http://www.sproose.com/bot.html; crawler@sproose.com)" => array(
    "robot" => "sproose",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "QweeryBot/3.02 ( http://qweerybot.qweery.nl)" => array(
    "robot" => "qweery",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "freshmeat.net URL validator/1.1" => array(
    "robot" => "freshmeat",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "ICC-Crawler(Mozilla-compatible; http://kc.nict.go.jp/icc/crawl.html; icc-crawl(at)ml(dot)nict(dot)go(dot)jp)" => array(
    "robot" => "icc",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Najdi.si Spider (+http://www.najdi.si)" => array(
    "robot" => "najdi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
    "Interseek (+http://www.interseek.com)" => array(
    "robot" => "interseek",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; jobs.de-Robot +http://www.jobs.de)" => array(
    "robot" => "jobsde",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "ICRA_Semantic_spider/0.9" => array(
    "robot" => "icra",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "www.fi crawler, contact crawler@www.fi" => array(
    "robot" => "wwwfi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "WebsiteWorth v1.0" => array(
    "robot" => "websiteworth",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Twiceler-0.9 http://www.cuill.com/twiceler/robot.html" => array(
    "robot" => "twiceler",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Visbot/1.0 (+http://www.visvo.com/bot.html;bot@visvo.com)" => array(
    "robot" => "visvo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "VisBot/2.0 (Visvo.com Crawler; http://www.visvo.com/bot.html; bot@visvo.com)" => array(
    "robot" => "visvo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "favorstarbot/1.0 (+http://favorstar.com/bot.html)" => array(
    "robot" => "favorstar",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "eert spdr 0.3.1 - http://bot.eert.net" => array(
    "robot" => "eert",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "PHP version tracker (http://www.nexen.net/phpversion/bot.php)" => array(
    "robot" => "phpversiontracker",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Sogou web spider/3.0(+http://www.sogou.com/docs/help/webmasters.htm#07)" => array(
    "robot" => "sogou",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/6.0 (MSIE 6.0; Windows NT 5.1; RSSMicro.com RSS/Atom Feed Robot)" => array(
    "robot" => "rssmicro",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (Twiceler-0.9 http://www.cuill.com/twiceler/robot.html" => array(
    "robot" => "twiceler",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Quantcastbot/1.0; www.quantcast.com)" => array(
    "robot" => "quantcast",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "WDG_Validator/1.6.4" => array(
    "robot" => "wdg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "WDG_SiteValidator/1.6.4" => array(
    "robot" => "wdg",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "BrowserEmulator/0.9 see http://dejavu.org" => array(
    "robot" => "browseremulator",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Browsershots URL Check" => array(
    "robot" => "browsershots",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "WebAlta Crawler/1.3.33 (http://www.webalta.net/ru/about_webmaster.html) (Windows; U; Windows NT 5.1; ru-RU)" => array(
    "robot" => "webalta",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Sirketcebot/v.01 (http://www.sirketce.com/bot.html)" => array(
    "robot" => "sirketce",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 4.01; Digital AlphaServer 1000A 4/233; Windows NT; Powered By 64-Bit Alpha Processor)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsnt",
    "description" => "",
    "type" => "B"
  ),
  "Swift/0.3 (PC; U; Intel; Windows NT 6.0; en) ID:20070603-1803" => array(
    "robot" => "other",
    "browser" => "swift",
    "os" => "windowsvista",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (PC; U; Intel; Windows NT 6.0; en) AppleWebKit/420+ (KHTML, like Gecko) Swift/0.3 ID:20070603-1803" => array(
    "robot" => "other",
    "browser" => "swift",
    "os" => "windowsvista",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (MorphOS; U; [en]; PPC) AppleWebKit/413 (KHTML, like Gecko) Sputnik/005" => array(
    "robot" => "other",
    "browser" => "sputnik",
    "os" => "morphos",
    "description" => "",
    "type" => "B"
  ),
  "WebImages 0.3 ( http://herbert.groot.jebbink.nl/?app=WebImages )" => array(
    "robot" => "webimages",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; LiteFinder/1.0; +http://www.litefinder.net/about.html)" => array(
    "robot" => "litefinder",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "CazoodleBot/CazoodleBot-0.1 (CazoodleBot Crawler; http://www.cazoodle.com/cazoodlebot; cazoodlebot@cazoodle.com)" => array(
    "robot" => "cazoodle",
    "browser" => NULL,
    "os" => NULL,
    "description" => "new user agent of cazoodle",
    "type" => "BR"
  ),
  "multicrawler (+http://sw.deri.org/2006/04/multicrawler/robots.html)" => array(
    "robot" => "swse",
    "browser" => NULL,
    "os" => NULL,
    "description" => "Robot of the Semantic Web Search Engine",
    "type" => "R"
  ),
  "RedBot/redbot-1.0 (Rediff.com Crawler; redbot at rediff dot com)" => array(
    "robot" => "rediff",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "MJ12bot (mini)/1.0.0 (DIRECT SUBMIT VERSION!) (http://majestic12.co.uk/bot.php?+)" => array(
    "robot" => "mj12",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "PWeBot/1.2 Inspector (http://www.programacionweb.net/robot.php)" => array(
    "robot" => "pwebotxy",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "eert spdr 0.3.1 - http://bot.eert.net" => array(
    "robot" => "eert",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Blogcensus.de (http://blogcensus.de, powered by SimplePie)" => array(
    "robot" => "blogcensus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Blogcensus (http://blogcensus.de/bot/)" => array(
    "robot" => "blogcensus",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "MSRBOT (http://research.microsoft.com/research/sv/msrbot/" => array(
    "robot" => "msrbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; fr) AppleWebKit/523.12.2 (KHTML, like Gecko) Vienna/2.2.2.2212" => array(
    "robot" => "other",
    "browser" => "vienna",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "Trailfire-bot/0.7.1 (Trailfire page content analyzer; http://trailfire.com; info@trailfire.com)" => array(
    "robot" => "trailfire",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.9) Gecko/20071105 IceWeasel/2.0.0.9 (Zenwalk GNU Linux)" => array(
    "robot" => "other",
    "browser" => "iceweasel",
    "os" => "zenwalk",
    "description" => "",
    "type" => "B"
  ),
  "disco/Nutch-1.0-dev (experimental crawler; www.discoveryengine.com; disco-crawl@discoveryengine.com)" => array(
    "robot" => "disco",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible;YodaoBot-Image/1.0;http://www.yodao.com/help/webmaster/spider/;)" => array(
    "robot" => "yodao",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.4; en-US; rv:1.9a9pre) Gecko/2007110108 prism/0.8" => array(
    "robot" => "other",
    "browser" => "prism",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "SUNPlex 4.1 (Trusted Solaris 8 OE; Sun Fire 15K) Gecko/20070914 Firefox/2.0.0.10" => array(
    "robot" => "other",
    "browser" => "firefox",
    "os" => "sun",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.7pre) Gecko/20070815 Firefox/2.0.0.6 Navigator/9.0b3" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "windowsxp",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; fr) AppleWebKit/523.12.2 (KHTML, like Gecko) Shiira Safari/125" => array(
    "robot" => "other",
    "browser" => "shiira",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; fr-FR) AppleWebKit/523.15 (KHTML, like Gecko) Version/3.0 Safari/523.15" => array(
    "robot" => "other",
    "browser" => "safari",
    "os" => "windowsxp",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.12; ips-agent) Gecko/20050922 Fedora/1.0.7-1.1.fc4 Firefox/1.0.7" => array(
    "robot" => "ips-agent",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "MSNBOT_Mobile MSMOBOT Mozilla/2.0 (compatible; MSIE 4.02; Windows CE; Default)" => array(
    "robot" => "msnbot-mobile",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (Windows; U; Windows NT 5.1; ja; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7/Mozilla/5.0 (MaSagool; http://sagool.jp/)" => array(
    "robot" => "sagool",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Runnk RSS finder: http://www.runnk.com/il/law : Israeli legal : Mishpat : &#x5e2;&#x5d5;&#x5e8;&#x5db;&#x5d9; &#x5d3;&#x5d9;&#x5df; : &#x5d7;&#x5d5;&#x5e7; &#x5d5;&#x5de;&#x5e9;&#x5e4;&#x5d8; hybridwse@runnk.com" => array(
    "robot" => "runnk",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; fr) AppleWebKit/523.12.2 (KHTML, like Gecko) iCab/4.0.1" => array(
    "robot" => "other",
    "browser" => "icab",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "iCab/4.0 (Macintosh; U; PPC Mac OS X)" => array(
    "robot" => "other",
    "browser" => "icab",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US; rv:1.8.1.12) Gecko/20080211 Firefox/2.0.0.12 Sulfur/1.2a2pre" => array(
    "robot" => "other",
    "browser" => "flock",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; fr) AppleWebKit/523.12.2 (KHTML, like Gecko) Sunrise/1.5.9" => array(
    "robot" => "other",
    "browser" => "sunrise",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "wauuu engine/Wauuu 0.1 (wauuu engine; http://www.wauuu.com; wauuu@wauuu.com)" => array(
    "robot" => "wawuuu",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "kalooga/kalooga-4.0-dev-datahouse (Kalooga; http://www.kalooga.com; info@kalooga.com)" => array(
    "robot" => "kalooga",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; WOW64; Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1) ; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; Media Center PC 5.0; .NET CLR 3.5.21022; MAXTHON 2.0)" => array(
    "robot" => "other",
    "browser" => "maxthon",
    "os" => "windowsvista",
    "description" => "Maxthon 2.0 (on IE 7.0) + Windows Vista x64 Ultimate",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; MAXTHON 2.0)" => array(
    "robot" => "other",
    "browser" => "maxthon",
    "os" => "windowsxp",
    "description" => "Maxthon 2.0 (on IE6.0) + Windows XP Professional",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; ScoutJet; +http://www.scoutjet.com/)" => array(
    "robot" => "scoutjet",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; discobot/1.0; +http://discoveryengine.com/discobot.html)" => array(
    "robot" => "disco",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; fr-fr) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) epiphany-webkit" => array(
    "robot" => "other",
    "browser" => "epiphany",
    "os" => "linux",
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; fr-fr) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) kazehakase" => array(
    "robot" => "other",
    "browser" => "kazehakase",
    "os" => "linux",
    "description" => "",
    "type" => "R"
  ),
  "OnlineWebCheck.com (http://onlinewebcheck.com)" => array(
    "robot" => "onlinewebcheck",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "PHPot Verispider v0.1 - http://www.projecthoneypot.org/" => array(
    "robot" => "projecthoneypot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; TERAPETA)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "RPT-HTTPClient/0.3-3" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "gzip(gfe) (via translate.google.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "EnaBot/1.2 (http://www.enaball.com/crawler.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.04506)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsvista",
    "description" => "",
    "type" => "R"
  ),
  "australia-au.org/0.8 (+http://australia-au.org/directory/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "australia-au.org/0.8 (+http://australia-au.org/directory/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "SpiderKU/0.9" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.08 [en] (X11; U; IRIX 5.3 IP5; Nav)" => array(
    "robot" => "other",
    "browser" => "netscape",
    "os" => "irix",
    "description" => "",
    "type" => "B"
  ),
  "Microsoft-WebDAV-MiniRedir/5.1.2600" => array(
    "robot" => "other",
    "browser" => "TODO",
    "os" => "TODO",
    "description" => "",
    "type" => "B"
  ),
  "shelob v1.0" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "ImperialCollegeSearch" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "LTI/LemurProject Nutch Spider/Nutch-1.0-dev (lti crawler for CMU; http://www.lti.cs.cmu.edu; changkuk at cmu dot edu)    -- grit1170.yahooresearchcluster.com" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "findlinks/1.1.3-beta9 (+http://wortschatz.uni-leipzig.de/findlinks/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "dragonfly(ebingbong#playstarmusic.com)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Nokia6682/2.0 (3.01.1) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "VadixBot_Exp" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Pathtraq/0.1 (+http://pathtraq.com/)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Pathtraq/0.1 Gungho/0.09005" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "TinEye/1.1 (http://tineye.com/crawler.html)" => array(
    "robot" => "TODO",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "MLBot (www.metadatalabs.com/mlbot)" => array(
    "robot" => "mlbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (X11; U; Linux i686; fr-fr) AppleWebKit/525.1+ (KHTML, like Gecko, Safari/525.1+) midori" => array(
    "robot" => "other",
    "browser" => "midori",
    "os" => "linux",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_4_11; fr) AppleWebKit/525.18 (KHTML, like Gecko) Demeter/1.0.9 Safari/125" => array(
    "robot" => "other",
    "browser" => "demeter",
    "os" => "macosx",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Win 9x 4.90; Compaq; YComp 5.0.0.0)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windows98",
    "description" => "",
    "type" => "B"
  ),
  "Mozilla/5.0 (compatible; http://www.whoisde.de/2.1; +http://www.whoisde.de)" => array(
    "robot" => "whoisde",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon; .NET CLR 1.1.4322; .NET CLR 2.0.50727; ImageShack Toolbar 3.0.3; IEMB3; .NET CLR 3.0.04506.30; IEMB3)" => array(
    "robot" => "other",
    "browser" => "explorer",
    "os" => "windowsxp",
    "description" => "",
    "type" => "B"
  ),
  "ESISmartSpider" => array(
    "robot" => "esi",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Microsoft-WebDAV-MiniRedir/6.0.6000" => array(
    "robot" => "other",
    "browser" => "office",
    "os" => "windows",
    "description" => "MS Office 2000 acting as WebDAV client",
    "type" => "B"
  ),
  "DotBot/1.0.1 (http://www.dotnetdotcom.org/#info, crawler@dotnetdotcom.org)" => array(
    "robot" => "dotbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; AdShadow +http://adshadow.de)" => array(
    "robot" => "adshadow",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "infometrics-bot, http://www.infometrics.de" => array(
    "robot" => "infometrics",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "8bo Crawler Bot" => array(
    "robot" => "8bo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; WebDataCentreBot/1.0; +http://WebDataCentre.com/)" => array(
    "robot" => "webdatacentre",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "kalooga/KaloogaBot (Kalooga; http://www.kalooga.com/info.html?page=crawler)" => array(
    "robot" => "kaloogo",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "renlifangbot/1.0 (+http://search.msn.com/msnbot.htm)" => array(
    "robot" => "msnbot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "http://www.webmasterworld.com/search_engine_spiders/3864938.htm",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)" => array(
    "robot" => "exabot",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "SiteSucker/2.2.4" => array(
    "robot" => "sitesucker",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "robotgenius (http://robotgenius.net)" => array(
    "robot" => "robotgenius",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "Mozilla/5.0 (compatible; DBLBot/1.0; +http://www.dontbuylists.com/)" => array(
    "robot" => "dontbuylists",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "snookit/Snookit (domains@snookit.com)" => array(
    "robot" => "snookit",
    "browser" => NULL,
    "os" => NULL,
    "description" => "",
    "type" => "R"
  ),
  "iTunes/4.7.1 (Linux; N; Linux; armv5tejl-linux; EN; utf8) SqueezeCenter/7.2.1/23630" => array(
    "robot" => "other",
    "browser" => "squeezecenter",
    "os" => "linux",
    "description" => "Logitech Squeezebox uses SqueezeCenter software to play either local music",
    "type" => "B"
  ),
)
?>
