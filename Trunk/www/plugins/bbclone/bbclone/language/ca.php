<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/ca.php,v 1.54 2009/06/21 07:33:08 joku Exp $
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
 * Traduit al Catala per Gregori Arjona Toledo garjona@menta.net
 * Revisat i actualitzat per Lacetani traduccions@lacetani.net
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "L&#8217;equip de BBClone - Llicenciat sota la",
"global_last_reset" => "Estad&iacute;stiques des de",
"global_yes" => "s&iacute;",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"No es pot mostrar la configuraci&oacute; de BBClone en aquest servidor.",

// Address Extensions
"ac" => "Illes de l'assumpci&oacute;",
"ad" => "Andorra",
"ae" => "Emirats &Agrave;rabs",
"aero" => "Aero",
"af" => "Afganistan",
"ag" => "Antigua i Barbuda",
"ai" => "Anguilla",
"al" => "Alb&agrave;nia",
"am" => "Arm&egrave;nia",
"an" => "Antilles Holandeses",
"ao" => "Angola",
"aq" => "Ant&agrave;rtica",
"ar" => "Argentina",
"arpa" => "Arpa",
"as" => "Samoa Americana",
"at" => "&Agrave;ustria",
"au" => "Austr&agrave;lia",
"aw" => "Aruba",
"az" => "Azerbaidjan",
"ba" => "B&ograve;snia Hercegovina",
"bb" => "Barbados",
"bd" => "Bangladesh",
"be" => "B&egrave;lgica",
"bf" => "Burkina Faso",
"bg" => "Bulg&agrave;ria",
"bh" => "Bahrain",
"bi" => "Burundi",
"biz" => "Empreses",
"bj" => "Ben&iacute;n",
"bm" => "Bermudes",
"bn" => "Brunei",
"bo" => "Bol&iacute;via",
"br" => "Brasil",
"bs" => "Bahames",
"bt" => "Bhutan",
"bv" => "Illes Bouvet",
"bw" => "Botswana",
"by" => "Bielorr&uacute;ssia",
"bz" => "Belize",
"ca" => "Canad&agrave;",
"cc" => "Illes Cocos",
"cd" => "Congo",
"cf" => "Rep&uacute;blica centre africana",
"cg" => "Rep&uacute;blica del Congo",
"ch" => "Su&iuml;ssa",
"ci" => "Costa d&#8217;ivori",
"ck" => "Illes Cook",
"cl" => "Xile",
"cm" => "Camerun",
"cn" => "Xina",
"co" => "Col&ograve;mbia",
"com" => "Comercial",
"coop" => "Coop",
"cr" => "Costa Rica",
"cs" => "Serbia and Montenegro",
"cu" => "Cuba",
"cv" => "Cap Verd",
"cx" => "Illes de Navidad",
"cy" => "Xipre",
"cz" => "Rep&uacute;blica Txeca",
"de" => "Alemanya",
"dj" => "Djibouti",
"dk" => "Dinamarca",
"dm" => "Dominica",
"do" => "Rep&uacute;blica Dominicana",
"dz" => "Alg&egrave;ria",
"ec" => "Equador",
"edu" => "Educaci&oacute;",
"ee" => "Est&ograve;nia",
"eg" => "Egipte",
"eh" => "Western Sahara",
"er" => "Eritrea",
"es" => "Espanya",
"et" => "Eti&ograve;pia",
"eu" => "European Union",
"fi" => "Finl&agrave;ndia",
"fj" => "Fiji",
"fk" => "Illes Falkland (Malvines)",
"fm" => "Micron&egrave;sia",
"fo" => "Illes F&egrave;roe",
"fr" => "Fran&ccedil;a",
"ga" => "Gabon",
"gb" => "Gabon",
"gd" => "Granada",
"ge" => "Ge&ograve;rgia",
"gf" => "Guinea francesa",
"gg" => "Guernsey",
"gh" => "Ghana",
"gi" => "Gibraltar",
"gl" => "Terra Verda",
"gm" => "G&agrave;mbia",
"gn" => "Guinea",
"gov" => "Govern d&#8217;Estats Units",
"gp" => "Guadalupe",
"gq" => "Guinea equatorial",
"gr" => "Gr&egrave;cia",
"gs" => "Sud de Ge&ograve;rgia i illes Sandwich",
"gt" => "Guatemala",
"gu" => "Guam",
"gw" => "Guinea-Bissau",
"gy" => "Guyana",
"hk" => "Hong Kong",
"hm" => "Illes Heard i Mc Donald",
"hn" => "Hondures",
"hr" => "Cro&agrave;cia",
"ht" => "Hait&iacute;",
"hu" => "Hongria",
"id" => "Indon&egrave;sia",
"ie" => "Irlanda",
"il" => "Israel",
"im" => "Illa de Man",
"in" => "&Iacute;ndia",
"info" => "Informaci&oacute;",
"int" => "Organitzacions",
"io" => "Territori brit&agrave;nic de l&#8217;oce&agrave; &iacute;ndic",
"iq" => "Irak",
"ir" => "Iran",
"is" => "Isl&agrave;ndia",
"it" => "It&agrave;lia",
"je" => "Jersey",
"jm" => "Jamaica",
"jo" => "Jord&agrave;nia",
"jp" => "Jap&oacute;",
"ke" => "Kenya",
"kg" => "Kirguizistan",
"kh" => "Cambodja",
"ki" => "Kiribati",
"km" => "Comores",
"kn" => "Sant Kitts i Nevis",
"kp" => "North Korea",
"kr" => "Corea",
"kw" => "Kuwait",
"ky" => "Illes Caiman",
"kz" => "Kazakhstan",
"la" => "Laos",
"lb" => "L&iacute;ban",
"lc" => "Saint Lucia",
"li" => "Liechtenstein",
"lk" => "Sri Lanka",
"lr" => "Lib&egrave;ria",
"ls" => "Lesotho",
"lt" => "Litu&agrave;nia",
"lu" => "Luxemburg",
"lv" => "Let&ograve;nia",
"ly" => "L&iacute;bia",
"ma" => "Marroc",
"mc" => "M&ograve;naco",
"md" => "Mold&agrave;via",
"mg" => "Madagascar",
"mh" => "Illes Marshall",
"mil" => "Ex&egrave;rcit dels Estats Units",
"mk" => "Maced&ograve;nia",
"ml" => "Mali",
"mm" => "Myanmar",
"mn" => "Mong&ograve;lia",
"mo" => "Macau",
"mp" => "Illes marines del nord",
"mq" => "Martinica",
"mr" => "Maurit&agrave;nia",
"ms" => "Montserrat",
"mt" => "Malta",
"mu" => "Maurit&agrave;nia",
"museum" => "Museum",
"mv" => "Maldives",
"mw" => "Malawi",
"mx" => "M&egrave;xic",
"my" => "Mal&agrave;isia",
"mz" => "Mo&ccedil;ambic",
"na" => "Nam&iacute;bia",
"name" => "Personal",
"nc" => "Nova Caled&ograve;nia",
"ne" => "Nig&egrave;ria",
"net" => "Xarxes",
"nf" => "Illes Norfolk",
"ng" => "Nig&egrave;ria",
"ni" => "Nicaragua",
"nl" => "Holanda",
"no" => "Noruega",
"np" => "Nepal",
"nr" => "Nauru",
"nu" => "Niue",
"numeric" => "Adre&ccedil;a IP",
"nz" => "Nova Zelanda",
"om" => "Oman",
"org" => "Organitzacions",
"pa" => "Panam&agrave;",
"pe" => "Per&uacute;",
"pf" => "Polin&egrave;sia francesa",
"pg" => "Papua Nova Guinea",
"ph" => "Filipines",
"pk" => "Pakistan",
"pl" => "Pol&ograve;nia",
"pm" => "Saint-Pierre-et-Miquelon",
"pn" => "Pitcairn",
"pr" => "Puerto Rico",
"pro" => "Professional",
"ps" => "Palestina",
"pt" => "Portugal",
"pw" => "Illes Palau",
"py" => "Paraguai",
"qa" => "Qatar",
"re" => "Illa de la reuni&oacute;",
"ro" => "Romania",
"ru" => "R&uacute;ssia",
"rw" => "Rwanda",
"sa" => "Ar&agrave;bia Saudita",
"sb" => "Illes Salom&oacute;",
"sc" => "Seychelles",
"sd" => "Sudan",
"se" => "Su&egrave;cia",
"sg" => "Singapur",
"sh" => "Saint Helena",
"si" => "Eslov&egrave;nia",
"sj" => "Illes Svalbard i Jan Mayen",
"sk" => "Eslov&agrave;quia",
"sl" => "Sierra Leone",
"sm" => "San Marino",
"sn" => "Senegal",
"so" => "Som&agrave;lia",
"sr" => "Surinam",
"st" => "S&atilde;o Tom&eacute; i Pr&iacute;ncep",
"su" => "Uni&oacute; sovi&egrave;tica",
"sv" => "El Salvador",
"sy" => "S&iacute;ria",
"sz" => "Swazil&agrave;ndia",
"tc" => "Illes Turks i Caicos",
"td" => "Txad",
"tf" => "Territoris del sud de Fran&ccedil;a",
"tg" => "Togo",
"th" => "Tail&agrave;ndia",
"tj" => "Tadjikistan",
"tk" => "Tokelau",
"tl" => "Timor est",
"tm" => "Turkmenistan",
"tn" => "Tun&iacute;sia",
"to" => "Tonga",
"tp" => "Timor est",
"tr" => "Turquia",
"tt" => "Trinitat i Tobago",
"tv" => "Tuvalu",
"tw" => "Taiwan",
"tz" => "Tanz&agrave;nia",
"ua" => "Ucra&iuml;na",
"ug" => "Uganda",
"uk" => "Regne Unit",
"um" => "Illes menors dels Estats Units",
"unknown" => "Desconegut",
"us" => "Estats Units",
"uy" => "Uruguai",
"uz" => "Uzbekistan",
"va" => "Estat del vatic&agrave;",
"vc" => "Saint Vincent i les Grenadines ",
"ve" => "Vene&ccedil;uela",
"vg" => "Illes verges (Anglaterra)",
"vi" => "Illes Verges",
"vn" => "Vietnam",
"vu" => "Vanuatu",
"wf" => "Wallis i illes Futuna",
"ws" => "Samoa",
"ye" => "Iemen",
"yt" => "Mayotte",
"yu" => "Servia i Montenegro",
"za" => "Sud &Agrave;frica",
"zm" => "Z&agrave;mbia",
"zr" => "Zaire",
"zw" => "Zimbabwe",

// Miscellaneous translations
"misc_other" => "Altres",
"misc_unknown" => "Desconegut",
"misc_second_unit" => "s",
"misc_ignored" => "Ignorat",

// The Navigation Bar
"navbar_Main_Site" => "Lloc principal",
"navbar_Configuration" => "Configuraci&oacute;",
"navbar_Global_Stats" => "Estad&iacute;stiques globals",
"navbar_Detailed_Stats" => "Estad&iacute;stiques detallades",
"navbar_Time_Stats" => "Estad&iacute;stiques temporals",

// Detailed stats words
"dstat_id" => "Identificador",
"dstat_time" => "Data",
"dstat_visits" => "Visites",
"dstat_extension" => "Extensi&oacute;",
"dstat_dns" => "Nom del host",
"dstat_from" => "Des d'on ha arribat",
"dstat_os" => "Sistema operatiu",
"dstat_browser" => "Navegador",
"dstat_visible_rows" => "Accessos visibles",
"dstat_green_rows" => "Files verdes",
"dstat_blue_rows" => "Files blaves",
"dstat_red_rows" => "Files vermelles",
"dstat_search" => "B&uacute;squeda",
"dstat_last_page" => "&Uacute;ltima p&agrave;gina",
"dstat_last_visit" => "&Uacute;ltima visita",
"dstat_robots" => "Robots",
"dstat_no_data" => "Dades no disponibles",
"dstat_prx" => "Servidor Proxy",
"dstat_ip" => "Adre&ccedil;a IP",
"dstat_user_agent" => "Agent d'usuari",
"dstat_nr" => "Nr",
"dstat_pages" => "P&agrave;gines",
"dstat_visit_length" => "Durada de la visita",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Accessos",
"gstat_Total_visits" => "Visites totals",
"gstat_Total_unique" => "Totals &uacute;niques",
"gstat_Operating_systems" => "Sistemes operatius",
"gstat_Browsers" => "Navegadors",
"gstat_extensions" => "%d primeres extensions",
"gstat_Robots" => "Robots",
"gstat_pages" => "%d primeres p&agrave;gines",
"gstat_origins" => "%d primers or&iacute;gens",
"gstat_hosts" => "%d hosts amb m&eacute;s visites",
"gstat_keys" => "%d primeres paraules clau",
"gstat_Total" => "Total",
"gstat_Not_specified" => "sense especificar",

// Time stats words
"tstat_Su" => "Dium",
"tstat_Mo" => "Dill",
"tstat_Tu" => "Dima",
"tstat_We" => "Dime",
"tstat_Th" => "Dijo",
"tstat_Fr" => "Dive",
"tstat_Sa" => "Diss",

"tstat_Jan" => "Gen",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Abr",
"tstat_May" => "Mai",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Ago",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Des",

"tstat_last_day" => "&Uacute;ltim dia",
"tstat_last_week" => "&Uacute;ltima setmana",
"tstat_last_month" => "&Uacute;ltim mes",
"tstat_last_year" => "&Uacute;ltim any",

// Configuration page words and sentences
"config_Variable_name" => "Nom de la variable",
"config_Variable_value" => "Valor de la variable",
"config_Explanations" => "Explicacions",

"config_bbc_mainsite" =>
"Si aquesta variable s&#8217;ha establert, es generar&agrave; un enlla&ccedil; al lloc especificat. El valor per defecte &eacute;s un enlla&ccedil; al directori pare. En el cas que la teva p&agrave;gina web estigui localitzada en un altre lloc, probablement voldr&agrave;s ajustar el valor per satisfer les teves necessitats.<br />
Exemples:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Per defecte, BBClone mostra la configuraci&oacute;. Si no t&#8217;agrada, pots desactivar aquesta opci&oacute;.<br />
Examples:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Text que apareixer&agrave; a la barra de t&iacute;tol de totes les p&agrave;gines de BBClone.<br />
Les macros admeses s&oacute;n:<br />
<ul>
<li>%SERVER: nom del servidor,</li>
<li>%DATE: data actual.</li>
</ul>
S&#8217;accepten etiquetes HTML.<br />
Exemples:<br />
\$BBC_TITLEBAR = &quot;Estad&iacute;stiques per %SERVER generades al %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Les meves estad&iacute;stiques al %DATE s&oacute;n aquestes:&quot;;<br />",

"config_bbc_language" =>
"Idioma per defecte del BBClone en el cas que no estigui especificat pel navegador.
Els seg&uuml;ents idiomes estan suportats:
<p>ar, bg, bs, ca, cs, da, de, el, en, es, fi, fr, hu, id, it, ja, ko, lt, mk, nb, nl, pl, pt, pt-br, ro, ru,
sk, sl, sv, th, tr, zh-cn i zh-tw</p>",

"config_bbc_maxtime" =>
"Aquesta variable defineix la durada d&#8217;una visita &uacute;nica. Cada visita del mateix visitant separada un temps superior a l&#8217;especificat ser&agrave; considerada una nova visita. El valor per defecte &eacute;s de 30 minuts (1800 segons).<br />
Exemples:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Quantes visites vols que siguin llistades a les visites detallades? El valor per defecte &eacute;s 100. Es recomana no superar el valor de 500 per no alentir el proc&eacute;s de c&agrave;rrega de la p&agrave;gina.",

"config_bbc_detailed_stat_fields" =>
"La variable \$BBC_DETAILED_STAT_FIELDS determina les columnes que es mostraran a les estad&iacute;stiques detallades. Columnes possibles s&oacute;n:
<ul>
<li>id&nbsp;=&gt;&nbsp;N&uacute;mero de visitants des de l&#8217;inici del comptador </li>
<li>time&nbsp;=&gt;&nbsp;Hora en que l&#8217;&uacute;ltima visita va ser registrada </li>
<li>visits&nbsp;=&gt;&nbsp;Els clics de visitants &uacute;nics </li>
<li>dns&nbsp;=&gt;&nbsp;Nom del servidor dels visitants </li>
<li>ip&nbsp;=&gt;&nbsp;Adre&ccedil;a IP dels visitants </li>
<li>os&nbsp;=&gt;&nbsp;El sistema operatiu (si est&agrave; disponible i no &eacute;s un robot) </li>
<li>browser&nbsp;=&gt;&nbsp;El programari utilitzat per establir la connexi&oacute;</li>
<li>ext&nbsp;=&gt;&nbsp;Pa&iacute;s o extensi&oacute; del visitant </li>
<li>referer&nbsp;=&gt;&nbsp;Enlla&ccedil; des d&#8217;on ve el visitant (si est&agrave; disponible)
</li>
<li>page&nbsp;=&gt;&nbsp;&Uacute;ltima p&agrave;gina visitada</li>
<li>search&nbsp;=&gt;&nbsp;La cadena de b&uacute;squeda utilitzada per un visitant (si est&agrave; disponible)</li>
</ul>
Les columnes es mostraran en el mateix ordre que les especifiquis.<br />
Exemples:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"En el cas que l&#8217;hora del servidor no sigui la mateixa que la teva hora local, pots ajustar-ho amb aquesta variable. Valors negatius endarreriran el temps i valors positius l&#8217;avan&ccedil;aran.<br />
Exemples:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Aquesta opci&oacute; defineix quan una adre&ccedil;a IP ha de ser resolta per trobar el nom del servidor. El nom del servidor d&oacute;na molta m&eacute;s informaci&oacute; del visitant per&ograve; fa que la p&agrave;gina web vagi m&eacute;s lenta.<br />
Exemples:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Per defecte, BBClone basa les estad&iacute;stiques a partir de les visites per&ograve;, si vols, aqu&iacute; pots fer que les basi en les visites &uacute;niques.<br />
Exemples:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Aquesta opci&oacute; exclou una adre&ccedil;a o un rang d&#8217;adreces de les estad&iacute;stiques. Si vols utilitzar m&eacute;s d&#8217;una expressi&oacute;, separa-les amb una coma.<br />
Exemples:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Si no vols que apareguin alguns dels or&iacute;gens dels teus visitants, pots especificar-los aqu&iacute;. Si vols especificar-ne m&eacute;s d&#8217;un, utilitza la coma com a separador.<br />
Exemples:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Aqu&iacute; pots especificar el tractament dels robots. El valor per defecte &eacute;s ignorar-los en el r&agrave;nquing de servidors per&ograve; mantenir-los en la resta d&#8217;estad&iacute;stiques. Si no vols que apareguin enlloc, pots posar un &quot;2&quot;, i aleshores nom&eacute;s apareixeran les visites humanes.<br />
Exemples:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Aquesta opci&oacute; especifica com el BBClone identifica un usuari. Per defecte nom&eacute;s s&#8217;utilitza l&#8217;adre&ccedil;a IP per&ograve; alguns visitants s&#8217;amaguen darrera un proxy i desactivar aquesta opci&oacute; proporcionar&agrave; unes estad&iacute;stiques m&eacute;s reals en aquests casos.<br />
Exemples:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Quan vulguis esborrar totes les estad&iacute;stiques, activa aquesta opci&oacute; i quan entri el seg&uuml;ent visitant, aquest esborrar&agrave; les estad&iacute;stiques. No oblidis de tornar-ho a desactivar si no vols experimentar un tr&agrave;fic molt redu&iuml;t ;).<br />
Exemples:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Les estad&iacute;stiques poden generar una gran quantitat de dades. Activant aquesta opci&oacute; s&#8217;eliminen els detalls de les visites menys rellevants i s&#8217;aconsegueix aix&iacute; reduir considerablement el fitxer access.php. Les visites que s&#8217;eliminin s&#8217;afegiran a entrades &quot;sense especificar&quot; per mantenir el nombre de visites intacte.<br />
Exemples:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>
