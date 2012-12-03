<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/da.php,v 1.52 2009/06/21 07:33:08 joku Exp $
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
 *
 * originally translated by: Jonathan Fromer, jf(at)sof.dk
 * updated by: Nanna Ellegaard, Paul Bischoff
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d-m-Y",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensed under the",
"global_last_reset" => "Statistik siden den",
"global_yes" => "Ja",
"global_no" => "Nej",

// The error messages
"error_cannot_see_config" =>
"Du har ikke tilladelse til at se BBClone konfigurationen p&aring; denne server.",

// Address Extensions
"ac" => "Ascens i&oacute;n",
"ad" => "Andorra",
"ae" => "Forenede Arabiske Emirater",
"aero" => "Aero",
"af" => "Afghanistan",
"ag" => "Antigua og Barbuda",
"ai" => "Anguilla",
"al" => "Albanien",
"am" => "Armenien",
"an" => "Nederlandske Antiller",
"ao" => "Angola",
"aq" => "Antarktis",
"ar" => "Argentina",
"arpa" => "Arpanet",
"as" => "Amerikansk Samoa",
"at" => "&Oslash;strig",
"au" => "Australien",
"aw" => "Aruba",
"az" => "Aserbajdsjan",
"ba" => "Bosnien &amp; Hercegovina",
"bb" => "Barbados",
"bd" => "Bangladesh",
"be" => "Belgien",
"bf" => "Burkina",
"bg" => "Bulgarien",
"bh" => "Bahrain",
"bi" => "Burundi",
"biz" => "Business",
"bj" => "Benin",
"bm" => "Bermuda",
"bn" => "Brunei",
"bo" => "Bolivia",
"br" => "Brasilien",
"bs" => "Bahamas",
"bt" => "Bhutan",
"bv" => "Bouvet&oslash;ya",
"bw" => "Botswana",
"by" => "Hviderusland",
"bz" => "Belize",
"ca" => "Canada",
"cc" => "Cocos &Oslash;erne",
"cd" => "Demokratiske Republik Congo",
"cf" => "Centralafrikanske Republik",
"cg" => "Congo",
"ch" => "Schweiz",
"ci" => "Elfenbenskysten",
"ck" => "Cook &Oslash;erne",
"cl" => "Chile",
"cm" => "Cameroun",
"cn" => "Kina",
"co" => "Colombia",
"com" => "Kommerciel",
"coop" => "Coop",
"cr" => "Costa Rica",
"cs" => "Serbien &amp; Montenegro",
"cu" => "Cuba",
"cv" => "Kap Verde",
"cx" => "Jule&oslash;en",
"cy" => "Cypern",
"cz" => "Tjekkiet",
"de" => "Tyskland",
"dj" => "Djibouti",
"dk" => "Danmark",
"dm" => "Dominica",
"do" => "Dominikanske Republik",
"dz" => "Algeriet",
"ec" => "Ecuador",
"edu" => "Uddannelsesinstitution",
"ee" => "Estland",
"eg" => "Egypten",
"eh" => "Vest Sahara",
"er" => "Eritrea",
"es" => "Spanien",
"et" => "Etiopien",
"eu" => "Europ&aelig;iske Union",
"fi" => "Finland",
"fj" => "Fiji",
"fk" => "Falklands&oslash;erne",
"fm" => "Mikronesien",
"fo" => "F&aelig;r&oslash;erne",
"fr" => "Frankrig",
"ga" => "Gabon",
"gb" => "Storbritannien",
"gd" => "Grenada",
"ge" => "Georgien",
"gf" => "Fransk Guyana",
"gg" => "Guernsey",
"gh" => "Ghana",
"gi" => "Gibraltar",
"gl" => "Gr&oslash;nland",
"gm" => "Gambia",
"gn" => "Guinea",
"gov" => "De Forenede Staters regering",
"gp" => "Guadeloupe",
"gq" => "&Aelig;kvatorial Guinea",
"gr" => "Gr&aelig;kenland",
"gs" => "South Georgia &amp; South Sandwich &Oslash;erne",
"gt" => "Guatemala",
"gu" => "Guam",
"gw" => "Guinea-Bissau",
"gy" => "Guyana",
"hk" => "Hong Kong",
"hm" => "Heard &amp; Mc Donald &Oslash;erne",
"hn" => "Honduras",
"hr" => "Kroatien",
"ht" => "Haiti",
"hu" => "Ungarn",
"id" => "Indonesien",
"ie" => "Irland",
"il" => "Israel",
"im" => "Isle of Man",
"in" => "Indien",
"info" => "Information",
"int" => "Internationale organisationer",
"io" => "Britisk Territorium i det Indiske Ocean",
"iq" => "Irak",
"ir" => "Iran",
"is" => "Island",
"it" => "Italien",
"je" => "Jersey",
"jm" => "Jamaica",
"jo" => "Jordan",
"jp" => "Japan",
"ke" => "Kenya",
"kg" => "Kirgisistan",
"kh" => "Cambodia",
"ki" => "Kiribati",
"km" => "Comorerne",
"kn" => "Saint Christopher &amp; Nevis",
"kp" => "Nord Korea",
"kr" => "Korea",
"kw" => "Kuwait",
"ky" => "Cayman &Oslash;erne",
"kz" => "Kazakhstan",
"la" => "Laos",
"lb" => "Libanon",
"lc" => "Saint Lucia",
"li" => "Liechtenstein",
"lk" => "Sri Lanka",
"lr" => "Liberia",
"ls" => "Lesotho",
"lt" => "Litauen",
"lu" => "Luxembourg",
"lv" => "Letland",
"ly" => "Libyen",
"ma" => "Marokko",
"mc" => "Monaco",
"md" => "Moldova",
"mg" => "Madagaskar",
"mh" => "Marshall&oslash;erne",
"mil" => "De Forenede Staters milit&aelig;r",
"mk" => "Makedonien",
"ml" => "Mali",
"mm" => "Myanmar",
"mn" => "Mongoliet",
"mo" => "Macau",
"mp" => "Nordmarianerne",
"mq" => "Martinique",
"mr" => "Mauretanien",
"ms" => "Montserrat",
"mt" => "Malta",
"mu" => "Mauritius",
"museum" => "Museum",
"mv" => "Maldiverne",
"mw" => "Malawi",
"mx" => "Mexico",
"my" => "Malaysia",
"mz" => "Mo&ccedil;ambique",
"na" => "Namibia",
"name" => "Personlig",
"nc" => "Ny Caledonien",
"ne" => "Niger",
"net" => "Netv&aelig;rk",
"nf" => "Norfolk &Oslash;en",
"ng" => "Nigeria",
"ni" => "Nicaragua",
"nl" => "Holland",
"no" => "Norge",
"np" => "Nepal",
"nr" => "Nauru",
"nu" => "Niue",
"numeric" => "Numerisk",
"nz" => "New Zealand",
"om" => "Oman",
"org" => "Organisationer",
"pa" => "Panama",
"pe" => "Peru",
"pf" => "Fransk Polynesien",
"pg" => "Papua Ny Guinea",
"ph" => "Filippinerne",
"pk" => "Pakistan",
"pl" => "Polen",
"pm" => "Saint Pierre et Miquelon",
"pn" => "Pitcairn",
"pr" => "Puerto Rico",
"pro" => "Professionel",
"ps" => "Palestina",
"pt" => "Portugal",
"pw" => "Palau",
"py" => "Paraguay",
"qa" => "Qatar",
"re" => "R&eacute;union",
"ro" => "Rum&aelig;nien",
"ru" => "Rusland",
"rw" => "Rwanda",
"sa" => "Saudi Arabien",
"sb" => "Salomon &Oslash;erne",
"sc" => "Seychellerne",
"sd" => "Sudan",
"se" => "Sverige",
"sg" => "Singapore",
"sh" => "Saint Helena",
"si" => "Slovenien",
"sj" => "Svalbard og Jan Mayen",
"sk" => "Slovakiet",
"sl" => "Sierra Leone",
"sm" => "San Marino",
"sn" => "Senegal",
"so" => "Somalia",
"sr" => "Surinam",
"st" => "S&atilde;o Tom&eacute; &amp; Pr&iacute;ncipe",
"su" => "Sovjetunionen",
"sv" => "El Salvador",
"sy" => "Syrien",
"sz" => "Swaziland",
"tc" => "Turks og Caicos &Oslash;er",
"td" => "Tchad",
"tf" => "Franske Territorier i Sydhavet og Antarktis",
"tg" => "Togo",
"th" => "Thailand",
"tj" => "Tadsjikistan",
"tk" => "Tokelau",
"tl" => "&Oslash;ttimor",
"tm" => "Turkmenistan",
"tn" => "Tunesien",
"to" => "Tonga",
"tp" => "&Oslash;ttimor",
"tr" => "Tyrkiet",
"tt" => "Trinidad og Tobago",
"tv" => "Tuvalu",
"tw" => "Taiwan",
"tz" => "Tanzania",
"ua" => "Ukraine",
"ug" => "Uganda",
"uk" => "Storbritannien",
"um" => "US mindre &oslash;er i Oceanien og Vestindien",
"unknown" => "Ukendt",
"us" => "De Forenede Stater",
"uy" => "Uruguay",
"uz" => "Usbekistan",
"va" => "Vatikanstaten",
"vc" => "Saint Vincent og Grenadinerne",
"ve" => "Venezuela",
"vg" => "Britiske Jomfru&oslash;er",
"vi" => "Amerikanske Jomfru&oslash;er",
"vn" => "Vietnam",
"vu" => "Vanuatu",
"wf" => "Wallis og Futuna",
"ws" => "Samoa",
"ye" => "Yemen",
"yt" => "Mayotte",
"yu" => "Serbien og Montenegro",
"za" => "Sydafrika",
"zm" => "Zambia",
"zr" => "Zaire",
"zw" => "Zimbabwe",

// Miscellaneous translations
"misc_other" => "Andre",
"misc_unknown" => "Ukendt",
"misc_second_unit" => "sek.",
"misc_ignored" => "Udeladt",

// The Navigation Bar
"navbar_Main_Site" => "Hovedside",
"navbar_Configuration" => "Konfiguration",
"navbar_Global_Stats" => "Generel Statistik",
"navbar_Detailed_Stats" => "Detaljeret Statistik",
"navbar_Time_Stats" => "Grafisk historik",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tidspunkt",
"dstat_visits" => "Antal bes&oslash;g",
"dstat_extension" => "Topdom&aelig;ne",
"dstat_dns" => "V&aelig;rtsnavn",
"dstat_from" => "Kommer fra",
"dstat_os" => "OS",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Synlige bes&oslash;g",
"dstat_green_rows" => "gr&oslash;nne r&aelig;kker",
"dstat_blue_rows" => "bl&aring; r&aelig;kker",
"dstat_red_rows" => "r&oslash;de r&aelig;kker",
"dstat_search" => "S&oslash;g",
"dstat_last_page" => "Sidste side",
"dstat_last_visit" => "senest bes&oslash;gt",
"dstat_robots" => "robotter",
"dstat_no_data" => "Ingen tilg&aelig;ngelige data",
"dstat_prx" => "Proxy server",
"dstat_ip" => "IP-adresse",
"dstat_user_agent" => "User agent",
"dstat_nr" => "Nr.",
"dstat_pages" => "Sider",
"dstat_visit_length" => "Tid pr. side",
"dstat_reloads" => "Sideopdateringer",

// Global stats words
"gstat_Accesses" => "Samlet oversigt over bes&oslash;gende",
"gstat_Total_visits" => "Samlede hits",
"gstat_Total_unique" => "Samlede unikke hits",
"gstat_Operating_systems" => "Top %d operativsystemer",
"gstat_Browsers" => "Top %d browsere",
"gstat_extensions" => "%d f&oslash;rste topdom&aelig;ner",
"gstat_Robots" => "Top %d robotter",
"gstat_pages" => "%d f&oslash;rste sider",
"gstat_origins" => "%d f&oslash;rste oprindelser",
"gstat_hosts" => "Top %d internetudbydere",
"gstat_keys" => "Top %d s&oslash;geord",
"gstat_Total" => "I alt",
"gstat_Not_specified" => "Ikke specificeret",

// Time stats words
"tstat_Su" => "S&oslash;n",
"tstat_Mo" => "Man",
"tstat_Tu" => "Tir",
"tstat_We" => "Ons",
"tstat_Th" => "Tor",
"tstat_Fr" => "Fri",
"tstat_Sa" => "L&oslash;r",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Maj",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Forl&oslash;bne d&oslash;gn",
"tstat_last_week" => "Forl&oslash;bne uge",
"tstat_last_month" => "Sidste m&aring;ned",
"tstat_last_year" => "Sidste &aring;r",

// Configuration page words and sentences
"config_Variable_name" => "Variabelnavn",
"config_Variable_value" => "Variabelv&aelig;rdi pt.",
"config_Explanations" => "Forklaring",

"config_bbc_mainsite" =>
"Hvis denne variabel er sat, vil et link til den angivne placering blive genereret.
Standardv&aelig;rdien vil pege mod rodbiblioteket. I tilf&aelig;lde af at websitet
er placeret et andet sted, kan du angive en specifik sti eller url.<br />
Eksempler:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot; => (Standard)<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone viser konfigurationsindstillingerne som standard. Hvis det ikke &oslash;nskeses
kan du forhindre adgang ved at deaktivere denne mulighed.<br />
Eksempler:<br />
\$BBC_SHOW_CONFIG = 1; => Vis show_config.php (standard)<br />
\$BBC_SHOW_CONFIG = &quot;&quot;; => Vis ikke show_config.php",

"config_bbc_titlebar" =>
"Titlen p&aring; alle BBClone siderne.<br />
Flg. makroer kan bruges:<br />
<ul>
<li>%SERVER: servernavn,</li>
<li>%DATE: nuv&aelig;rende dato.</li>
</ul>
HTML-tags m&aring; ogs&aring; bruges.<br />
Eksempler:<br />
\$BBC_TITLEBAR = &quot;Statistik for %SERVER genereret den %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Min Statistik fra den %DATE er:&quot;;<br />",

"config_bbc_language" =>
"BBClones standardsprog, hvis ikke det er blevet specificeret af browseren.
F&oslash;lgende sprog underst&oslash;ttes:
<p>ar, bg, bs, ca, cs, da, de, el, en, es, fi, fr, hu, id, it, ja, ko, lt, mk, nb, nl, pl, pt, pt-br, ro, ru,
sk, sl, sv, th, tr, ua, zh-cn and zh-tw</p>",

"config_bbc_maxtime" =>
"Denne variabel definerer l&aelig;ngden af et unikt bes&oslash;g i sekunder. Hvert hit fra
den samme bes&oslash;gende inden for denne tidsperiode vil blive talt som eet bes&oslash;g, s&aring;
l&aelig;nge de to efterf&oslash;lgende hits ikke overskrider den angivne tidsperiode.
Webstandarden er 30 minutter (1800 sekunder), men denne tidsperiode kan &aelig;ndres efter
behov.<br />
Eksempler:<br />
\$BBC_MAXTIME = 0;  => Alle hits behandles som unikke<br />
\$BBC_MAXTIME = 1800;  => Alle hits af den samme bes&oslash;gende inden for 30 min. behandles som unikke",

"config_bbc_maxvisible" =>
"Hvor mange poster skal vises i den detaljerede statistik ad gangen? Standard er 100.
Det anbefales ikke at s&aelig;tte v&aelig;rdien h&oslash;jere for at undg&aring; tunge sider.",

"config_bbc_detailed_stat_fields" =>
"Variablen \$BBC_DETAILED_STAT_FIELDS bestemmer hvilke s&oslash;jler der skal vises i
den detaljerede statistik. Mulighederne er:
<ul>
<li>id&nbsp;=&gt;&nbsp;Bes&oslash;gende nr. x siden begyndelsen</li>
<li>time&nbsp;=&gt;&nbsp;Tiden hvor hittet blev registreret</li>
<li>visits&nbsp;=&gt;&nbsp;Antal unikke bes&oslash;g</li>
<li>dns&nbsp;=&gt;&nbsp;Den bes&oslash;gendes internetudbyder</li>
<li>ip&nbsp;=&gt;&nbsp;Den bes&oslash;gendes IP-adresse</li>
<li>os&nbsp;=&gt;&nbsp;Operativsystemet (hvis tilg&aelig;ngeligt og/eller hvis det ikke er en robot)</li>
<li>browser&nbsp;=&gt;&nbsp;Software der er blevet brugt. (browsertype.)
</li>
<li>ext&nbsp;=&gt;&nbsp;Det land den bes&oslash;gende kommer fra eller den extension, han/hun har</li>
<li>referer&nbsp;=&gt;&nbsp;Det link, den bes&oslash;gende kommer fra (hvis tilg&aelig;ngeligt)
</li>
<li>page&nbsp;=&gt;&nbsp;Sidst bes&oslash;gte side</li>
<li>search&nbsp;=&gt;&nbsp;De s&oslash;geord, den bes&oslash;gende brugte (hvis tilg&aelig;ngeligt)</li>
</ul>
Den r&aelig;kkef&oslash;lge, s&oslash;jlerne angives i, vil blive brugt i visningen af statistikken.br />
Eksempler:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Hvis serverens tidszone ikke passer med din egen lokale tid, kan du her tilpasse
tiden i minutter ved at bruge denne variabel. Negative v&aelig;rdier s&aelig;tter tiden tilbage,
positiver s&aelig;tter den frem.<br />
Eksempler:<br />
\$BBC_TIME_OFFSET = 300; => S&aelig;t tiden 5 timer frem. (5 x 60 min)<br />
\$BBC_TIME_OFFSET = -300; => S&aelig;t tiden 5 timer tilbage. (5 x 60 min)<br />
\$BBC_TIME_OFFSET = 0; => Ingen tidsforskel.",

"config_bbc_no_dns" =>
"Denne variabel bestemmer om IP-adresser skal omdannes til navnet p&aring; internet-
udbyderen. Navnet p&aring; udbyderen vil give mere information omkring den bes&oslash;gende,
men samtidig m&aring;ske sl&oslash;ve websiden, hvis de DNS-servere, der benyttes til opslag er langsomme,
begr&aelig;nsede i deres kapacitet er p&aring; andre m&aring;der up&aring;lidelige. Du kan sl&aring; denne mulighed
til eller fra.<br />
Eksempler:<br />
\$BBC_NO_DNS = 1; => IP-adresser vises som internetudbyder (standard)<br />
\$BBC_NO_DNS = &quot;&quot;; => Sl&aring; funktionen fra.",

"config_bbc_no_hits" =>
"BBClone viser som standard alle hits i tidsstatistikken (historikken), fordi
det giver et realistisk indtryk af servertrafikken. Men du kan ogs&aring; v&aelig;lge kun at
f&aring; vist unikke bes&oslash;g ved at &aelig;ndre denne variabel.<br />
Examples:<br />
\$BBC_NO_HITS = 1; => Vis alle hits i historik (standard)<br />
\$BBC_NO_HITS = &quot;&quot;; => Vis unikke bes&oslash;g i historik.",

"config_bbc_ignore_ip" =>
"Med denne mulighed kan du ekskludere bestemte IP-adresser eller hele r&aelig;kker
af adresser fra at blive talt med i statistikken. Hvis der angives flere adresser,
bruges komma som separator.<br />
Eksempler:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Hvis du vil forhindre bestemte referrers fra dine bes&oslash;ende i at blive
oplistet i statistikken, kan du specificere et eller flere ord i
variablen nedenfor. Komma bruges som separator.<br />
Eksempler:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;; => (Standard)",

"config_bbc_ignore_bots" =>
"Du kan bestemme hvordan webrobotter skal behandles i statistikken. Standard
er at ignorere dem i udbyderstatistikken, men at lade dem optr&aelig;de i resten.
Hvis du ikke vil t&aelig;lle robotter overhovedet, kan du s&aelig;tte variablen til 2.
S&aring; vil kun menneskelige bes&oslash;gende tages i betragtning.<br />
Examples:<br />
\$BBC_IGNORE_BOTS = 2; => Ignor&eacute;r robotter helt.<br />
\$BBC_IGNORE_BOTS = 1; => Oplist ikke robotter under hosts.<br />
\$BBC_IGNORE_BOTS = &quot;&quot;; => Robotter regnes som alm. bes&oslash;gende.",

"config_bbc_ignore_agent" =>
"Denne indstilling definerer hvordan BBClone adskliller de bes&oslash;gende fra
hinanden. Standard er udelukkende at bruge IP-adressen, hvilket i de fleste tilf&aelig;lde
give helt realistiske tal. Hvis dine bes&oslash;gende er skjult bag proxy servere, kan deaktivering
af denne variabel give de mest realistiske tal, idet en ny bes&oslash;gende vil blive
bestemt jvf. &aelig;ndringer i systemoplysninger, etc.<br />
Eksempler:<br />
\$BBC_IGNORE_AGENT = 1; => Ignor&eacute;r en bes&oslash;gendes forskellige browsere<br />
\$BBC_IGNORE_AGENT = &quot;&quot;; => Hver &aelig;ndring i en bes&oslash;gendes browser skal opfattes som et seperat bes&oslash;g. (Standard)",

"config_bbc_kill_stats" =>
"N&aring;r du &oslash;nsker at nulstille statistikken kan du aktivere denne variabel, hvorved alt
nulstilles ved n&aelig;ste bes&oslash;g. Husk dog at s&aelig;tte variablen tilbage bagefter, da man ellers vil
opleve us&aelig;dvanlig lav traffik! ;)<br />
Eksempler:<br />
\$BBC_KILL_STATS = 1; => Slet alle data<br />
\$BBC_KILL_STATS = &quot;&quot;; => Behold alle indsamlede data. (Standard)",

"config_bbc_purge_single" =>
"Udbyder og referrer-statistik kan generere store m&aelig;ngder data, som oftest
skyldes engangs-bes&oslash;gende. Med denne variabel kan du t&oslash;mme disse poster
og g&oslash;re access.php betydeligt lettere uden at p&aring;virke den faktiske udbyder-
og referrer-statistik. Antallet af hits vil dermed blive lagt til
&quot;not_specified&quot;-posterne for at opretholde den overordnede score.<br />
Eksempler:<br />
\$BBC_PURGE_SINGLE = 1; => T&oslash;m udbydere and referrer poster.<br />
\$BBC_PURGE_SINGLE = &quot;&quot;; => behold alle poster (standard)"

);
?>