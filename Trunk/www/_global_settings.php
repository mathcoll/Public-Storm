<?php
/*
    Public-Storm
    Copyright (C) 2008-2010 Mathieu Lory <mathieu@internetcollaboratif.info>
    This file is part of Public-Storm.

    Public-Storm is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Public-Storm is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Public-Storm. If not, see <http://www.gnu.org/licenses/>.
    
    Project started on 2008-11-22 with help from Serg Podtynnyi
    <shtirlic@users.sourceforge.net>
 */

if (basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__))die();


@require('./_specific.php');
Settings::setVar('BASE_URL', $BASE_URL);



// Site name
Settings::setVar('SITE_NAME', 'Public-Storm', 'admin', 'Site name, also defined in the languages files');

// Site baseline
Settings::setVar('SITE_BASELINE', '', 'admin', 'Site baseline, also defined in the languages files');

// Site description
Settings::setVar('SITE_DESCRIPTION', '', 'admin', 'Site description, also defined in the languages files');

// Current version
Settings::setVar('SITE_VERSION', '10.6.21');

// Debug switch. Set it to true for output additional information.
define('DEBUG', false);

// Theme name
Settings::setVar('SITE_THEME', 'ps', 'admin', 'Website theme name (css theme folder)');

// Default language if nothing specified
define('LANG', 'fr_FR.utf8');

// Timezone
Settings::setVar('timezone', 'Europe/Paris', 'admin', 'Website timezone');

// define list of available periods
$periodes = array(1, 7, 15, 30, 60, 182, 365); 

/* viewer_smarty or viewer_default */
Settings::$VIEWER_TYPE = 'viewer_smarty';

// Number of columns in list pages
Settings::setVar('nbCol', '6', 'Number of columns in list pages');

/* DB conf vars */
define('DB_CONF_FILE', '_global_db.php');
@require_once(DB_CONF_FILE);
Settings::$DB_TYPE = DB_TYPE;
Settings::setVar('DB_HOST', DB_HOST, 'admin', 'Database Host (for Mysql Db)');
Settings::setVar('DB_USER', DB_USER, 'admin', 'Database user (for Mysql Db)');
Settings::setVar('DB_PASS', DB_PASS, 'admin', 'Database password (for Mysql Db)');
Settings::setVar('DB_NAME', DB_NAME, 'admin', 'Database name (for Mysql Db)');
Settings::setVar('DB_PREFIX', DB_PREFIX, 'admin', 'Database table prefix');

/* emails config */
Settings::setVar('FROMNAME', 'Public-Storm', 'admin', 'Email from name');
Settings::setVar('FROM', 'contact@internetcollaboratif.info', 'admin', 'Email from email');
Settings::setVar('HOST', 'smtp.free.fr', 'admin', 'Email smtp host');
Settings::setVar('MAILER', $MAILER, 'admin', 'smtp or mail'); // smtp or mail

/* */
/* */
/* */
/* */
/* */
/* Do not change config after this line, calculated vars */
/* */
/* */
/* */
/* */
global $qdirs, $page, $query;
/* others global configs */
Settings::setVar('BASE_URL', $BASE_URL);
Settings::setVar('ROOT', $_SERVER['DOCUMENT_ROOT'] . ltrim(Settings::getVar('BASE_URL'), '/').'/');
Settings::setVar('BASE_URL_HTTP', 'http://'.$_SERVER["HTTP_HOST"].Settings::getVar('BASE_URL'));
Settings::setVar('BASE_URL_HTTPS', 'https://'.$_SERVER["HTTP_HOST"].Settings::getVar('BASE_URL'));
Settings::setVar('REQ_URL', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

//$request_uri = rtrim($_SERVER['REQUEST_URI'], '/');
$request_uri = $_SERVER['REQUEST_URI'];
if ( strpos(Settings::getVar('BASE_URL'), '/') )
{
	$query = str_replace(Settings::getVar('BASE_URL') . "/", "", $request_uri);
}
else
{
	$query = str_replace(Settings::getVar('BASE_URL'), "", $request_uri);
}
$query = ltrim($query, '/');
$qdirs = split("/", $query);
$page = array_pop($qdirs);
$page = $page != NULL ? $page : "index.php";

if ( $pos = strpos($page, '?') )
{
	$page = substr($page, 0, $pos);
}

$prefix = "";

/*
print $query.'<pre>';
print_r($qdirs);
print sizeOf($qdirs).'</pre>';
*/

for($n=0; $n<sizeOf($qdirs); $n++)
{
	$prefix .= "../";
}
$prefix = $prefix != NULL ? $prefix : './';

$f = new file($prefix . $query);
if ( !$f->Exists() )
{
	$prefix = './';
}

Settings::setVar('breadcrumb', array());
Settings::setVar('prefix', $prefix);
Settings::setVar('theme_dir', Settings::getVar('BASE_URL_HTTP') . '/themes/' . Settings::getVar('SITE_THEME') . '/templates/');
Settings::setVar('page_templates_path', Settings::getVar('ROOT') . '/themes/' . Settings::getVar('SITE_THEME') . '/templates/');
Settings::setVar('theme_mail_dir', Settings::getVar('ROOT') . '/themes/' . Settings::getVar('SITE_THEME') . '/templates/mails/');
Settings::setVar('mail_templates_path', Settings::getVar('theme_mail_dir'));
Settings::setVar('page_templates_path_c', Settings::getVar('prefix') . 'cache/');
Settings::setVar('cache_dir', Settings::getVar('prefix') . 'cache/');
Settings::setVar('cache_dir_http', Settings::getVar('BASE_URL_HTTP') . '/cache/');
Settings::setVar('inc_dir', Settings::getVar('ROOT') . '/include/');
Settings::setVar('conf_dir', Settings::getVar('prefix'));
Settings::setVar('plug_dir', Settings::getVar('ROOT') . 'plugins/');
Settings::setVar('plug_path', Settings::getVar('ROOT') . 'themes/' . Settings::getVar('SITE_THEME') . '/templates/plugins/');

/* default stylesheet */
Settings::setVar('styles', array());

/* default javascripts */
Settings::setVar('javascripts', array());

/* Smarty config */
Settings::setVar('SMARTY_DIR', Settings::getVar('inc_dir') . '/Smarty/libs/');
if ( !defined('DIRECTORY_SEPARATOR') ) define('DIRECTORY_SEPARATOR', '/');


?>
