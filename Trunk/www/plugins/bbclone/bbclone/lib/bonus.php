<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/bonus.php,v 1.9 2009/06/21 07:33:09 joku Exp $
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

$bonus = array(

// Adware/Spyware
	"alexa-toolbar" => array(
		"icon" => "warning",
		"title" => "Alexa Toolbar",
		"rule" => array(
			"Alexa Toolbar" => ""
		),
		"description" => "this toolbar combines googles toolbar with alexa and amazon, sometimes referenced as spyware",
		"uri" => "http://download.alexa.com/"
	),
	"funweb" => array(
		"icon" => "warning",
		"title" => "FunWebProducts",
		"rule" => array(
			"FunWebProducts" => ""
		),
		"description" => "an adware from IWon that is hard to uninstall and changes your start page",
		"uri" => "http://www.funwebproducts.com/"
	),
	"hotbar" => array(
		"icon" => "warning",
		"title" => "Hotbar",
		"rule" => array(
			"Hotbar" => "",
			"HbTools" => ""
		),
		"description" => "an adware that collects information about your browsing and provides 'personal' marketing",
		"uri" => "http://www.hotbar.com/"
	),
	"peoplepal" => array(
		"icon" => "warning",
		"title" => "PeoplePal",
		"rule" => array(
			"PeoplePal" => ""
		),
		"description" => "an adware that collects information about your browsing and provides 'personal' marketing",
		"uri" => "http://home.peoplepc.com/peoplepal/"
	),

// Harmless and uninteresting
	"dotnet" => array(
		"icon" => "question",
		"title" => ".NET",
		"rule" => array(
			".NET CLR ([0-9.]{1,10})" => "\\1"
		),
		"description" => "a software for Windows to run programs written for the .NET-Framework",
		"uri" => "http://msdn.microsoft.com/netframework/"
	),
	"wow64" => array(
		"icon" => "question",
		"title" => "32bit IE",
		"rule" => array(
			"WOW64" => ""
		),
		"description" => "this indicates that an 32bit Internet Explorer is running on a 64 bit system",
		"uri" => "http://www.microsoft.com/"
	),
	"iopus" => array(
		"icon" => "question",
		"title" => "iOpus I-M",
		"rule" => array(
			"iOpus-I-M" => ""
		),
		"description" => "this indicates that the system has iOpus Internet Macros (an Internet-based macro recorder) installe",
		"uri" => "http://www.iopus.com/"
	),
	"stumbleupon" => array(
		"icon" => "question",
		"title" => "StumbleUpon",
		"rule" => array(
			"StumbleUpon" => ""
		),
		"description" => "this indicates that the toolbar from Stumble Upon is installed in this browser",
		"uri" => "http://www.iopus.com/"
	),
	"powermarks" => array(
		"icon" => "question",
		"title" => "Powermarks",
		"rule" => array(
			"Powermarks[ /]([0-9.]{1,10})" => "\\1"
		),
		"description" => "a benign Bookmark enhancement for most of the popular browsers",
		"uri" => "http://www.kaylon.com/power.html"
	),
	"vobsub" => array(
		"icon" => "question",
		"title" => "vobsub",
		"rule" => array(
			"vobsub" => ""
		),
		"description" => "a CD ripping plug-in",
		"uri" => "http://www.dawnload.net/video_software/dvd_tools/vobsub.cfm"
	),
	"netscapegold" => array(
		"icon" => "question",
		"title" => "Netscape Gold",
		"rule" => array(
			"([0-9.]{1,10})Gold" => ""
		),
		"description" => "this indicates that this version of netscape contains an HTML editor",
		"uri" => "http://www.netscape.com/"
	),
	"airf" => array(
		"icon" => "question",
		"title" => "AIRF",
		"rule" => array(
			" airf" => ""
		),
		"description" => "user agent w. AI RoboForm (AIRF) password manager",
		"uri" => "http://www.roboform.com/"
	),
	"netmanager" => array(
		"icon" => "question",
		"title" => "Netmanager",
		"rule" => array(
			"Net M@nager V([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent with Netmanager IE addon",
		"uri" => "http://www.vinn.com.au/"
	),
	"fdm" => array(
		"icon" => "question",
		"title" => "FDM",
		"rule" => array(
			"Free Download Manager (FDM)" => ""
		),
		"description" => "user agent with free download manager installed",
		"uri" => "http://www.freedownloadmanager.org/"
	),
	"mathplayer" => array(
		"icon" => "question",
		"title" => "MathPlayer",
		"rule" => array(
			"MathPlayer([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent with MathPlayer mathematical notation plugin",
		"uri" => "http://www.dessci.com/webmath/mathplayer/"
	),
	"cern" => array(
		"icon" => "question",
		"title" => "CERN",
		"rule" => array(
			"CERN-HTTPD[ /]([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent behind a CERN/W3C Proxy",
		"uri" => "http://www.w3.org/Daemon/"
	),
	"katiesoft" => array(
		"icon" => "question",
		"title" => "Katiesoft Scroll",
		"rule" => array(
			"Katiesoft[ /]([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent with katiesoft plugin installed",
		"uri" => "http://www.katiesoft.com/"
	),
	"simulbrowse" => array(
		"icon" => "question",
		"title" => "SimulBrowse",
		"rule" => array(
			"SimulBrowse[ /]([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent with simulbrowse plugin installed",
		"uri" => "http://www.simulbrowse.com/"
	),
	"infopath" => array(
		"icon" => "question",
		"title" => "InfoPath",
		"rule" => array(
			"InfoPath[ ./]([0-9.]{1,10})" => "\\1"
		),
		"description" => "user agent with Microsoft InfoPath installed",
		"uri" => "http://office.microsoft.com/en-us/fx010857921033.aspx"
	),
	"thesims" => array(
		"icon" => "question",
		"title" => "The Sims Toolbar",
		"rule" => array(
			"SIMBAR Enabled" => ""
		),
		"description" => "SimBar IE toolbar for accessing \"The Sims\" sites",
		"uri" => ""
	),
	"alpha" => array(
		"icon" => "question",
		"title" => "Alpha Server",
		"rule" => array(
			"AlphaServer" => ""
		),
		"description" => "The system is running on a Alpha Server from Digital Mars",
		"uri" => ""
	),
	//TODO: what means "SYMPA;" in an user agent?

	// Usefull
	"encU" => array(
		"icon" => "question",
		"title" => "Encryption U",
		"rule" => array(
			"; U;" => ""
		),
		"description" => "this 'U' stands for 'USA' (for the version with 128-bit encryption)",
		"uri" => "http://en.wikipedia.org/wiki/User_agent#Encryption_strength_.22U.22_.2F_.22I.22_.2F_.22N.22/"
	),
	"encI" => array(
		"icon" => "question",
		"title" => "Encryption I",
		"rule" => array(
			"; I;" => ""
		),
		"description" => "this 'I' stands for 'International' (for the version with 40-bit encryption)",
		"uri" => "http://en.wikipedia.org/wiki/User_agent#Encryption_strength_.22U.22_.2F_.22I.22_.2F_.22N.22/"
	),
	"lang" => array(
		"icon" => "language",
		"title" => "Language",
		"rule" => array(
			"; ([a-z]{2})[;})]" => "\\1",
			"; ([a-z]{2})-([A-Z]{2})[;})]" => "\\1",
			"\[([a-z]{2})\]" => "\\1",
			"\[([a-z]{2})-([A-Z]{2})\]" => "\\1"
		),
		"description" => "this is the language the user agent provides",
		"uri" => "http://en.wikipedia.org/wiki/User_agent"
	),
	"activex" => array(
		"icon" => "question",
		"title" => "ActiveX Plugin",
		"rule" => array(
			"\(ax\)" => ""
		),
		"description" => "this user agent has the ActiceX plugin installed",
		"uri" => "http://www.iol.ie/~locka/mozilla/plugin.htm"
	)
);
