<?php
/*
    Public-Storm
    Copyright (C) 2008-2012 Mathieu Lory <mathieu@internetcollaboratif.info>
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

if (basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__))die(gettext("You musn't call this page directly ! please, go away !"));


@require_once('./_specific.php');
$settings = new Settings();
$settings->setVar('BASE_URL', $BASE_URL);
// Site name
$settings->setVar('SITE_NAME', 'Public-Storm', 'global_settings', 'Site name, also defined in the languages files');

// Site baseline
$settings->setVar('SITE_BASELINE', '', 'global_settings', 'Site baseline, also defined in the languages files');

// Site description
$settings->setVar('SITE_DESCRIPTION', '', 'global_settings', 'Site description, also defined in the languages files');

// Current version
$settings->setVar('SITE_VERSION', '14.08.05', 'global_settings', 'version of the source code');

// Site name
$settings->setVar('fb_app_id', '21015190410', 'global_settings', 'Facebook, préciser les administrateurs dans une balise méta fb:app_id');

// Debug switch. Set it to true for output additional information.
if( @$_GET["DEBUG"] == "true" ) {
	@define('DEBUG', true);
} else {
	@define('DEBUG', false);
}

// Theme name
$settings->setVar('SITE_THEME', 'ps2', 'global_settings', 'Website theme name (css theme folder)');

// Default language if nothing specified
@define('LANG', 'fr_FR.utf8');

// Timezone
$settings->setVar('timezone', 'Europe/Paris', 'global_settings', 'Website timezone');

/* viewer_smarty or viewer_default */
$settings->setViewerType('viewer_smarty');

// Number of columns in list pages
$settings->setVar('nbCol', '6', 'global_settings', 'Number of columns in list pages');

/* DB conf vars */
@define('DB_CONF_FILE', '_global_db.php');
@require_once(DB_CONF_FILE);
$settings->setDbType(DB_TYPE);
$settings->setVar('DB_HOST', DB_HOST, 'global_settings', 'Database Host (for Mysql Db)');
$settings->setVar('DB_USER', DB_USER, 'global_settings', 'Database user (for Mysql Db)');
$settings->setVar('DB_PASS', DB_PASS, 'global_settings', 'Database password (for Mysql Db)');
$settings->setVar('DB_NAME', DB_NAME, 'global_settings', 'Database name (for Mysql Db)');
$settings->setVar('DB_PREFIX', DB_PREFIX, 'global_settings', 'Database table prefix');

/* emails config */
$settings->setVar('FROMNAME', 'Public-Storm', 'global_settings', 'Email from name');
$settings->setVar('FROM', 'contact@internetcollaboratif.info', 'global_settings', 'Email from email');
$settings->setVar('HOST', 'smtp.free.fr', 'global_settings', 'Email smtp host');
$settings->setVar('MAILER', $MAILER, 'global_settings', 'smtp or mail'); // smtp or mail

/* */
/* */
/* */
/* */
/* */
/* Do not change config after this line, computed vars */
/* */
/* */
/* */
/* */
global $qdirs, $page, $query;
/* others global configs */
$settings->setVar('BASE_URL', $BASE_URL);
if( DEV ) {
	$settings->setVar('ROOT', $_SERVER['DOCUMENT_ROOT'] . ltrim($settings->getVar('BASE_URL'), '/').'/');
} else {
	$settings->setVar('ROOT', $_SERVER['DOCUMENT_ROOT'] . ltrim($settings->getVar('BASE_URL'), '/'));
}
$settings->setVar('BASE_URL_HTTP', 'http://'.$_SERVER["HTTP_HOST"].$settings->getVar('BASE_URL'));
$settings->setVar('BASE_URL_HTTPS', 'https://'.$_SERVER["HTTP_HOST"].$settings->getVar('BASE_URL'));
$settings->setVar('REQ_URL', $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

/*
print strpos($_SERVER['REQUEST_URI'], "?");
exit;
*/
//$request_uri = rtrim($_SERVER['REQUEST_URI'], '/');
$pos = (strpos($_SERVER['REQUEST_URI'], "?") > 0) ? strpos($_SERVER['REQUEST_URI'], "?") : strlen($_SERVER['REQUEST_URI']);
$request_uri = substr($_SERVER['REQUEST_URI'], 0, $pos);
//print $request_uri."----".$pos;
if ( strpos($settings->getVar('BASE_URL'), '/') )
{
	$query = str_replace($settings->getVar('BASE_URL') . "/", "", $request_uri);
}
else
{
	$query = str_replace($settings->getVar('BASE_URL'), "", $request_uri);
}
$query = ltrim($query, '/');
$qdirs = split("/", $query);
$page = array_pop($qdirs);
$page = $page != NULL ? $page : "index.php";

if ( $pos = strpos($page, '?') ) {
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

$settings->setVar('breadcrumb', array());
$settings->setVar('prefix', $prefix);
$settings->setVar('theme_dir', $settings->getVar('BASE_URL') . '/themes/' . $settings->getVar('SITE_THEME') . '/templates/');
$settings->setVar('theme_plug_dir', $settings->getVar('BASE_URL') . '/themes/' . $settings->getVar('SITE_THEME') . '/templates/plugins/');
$settings->setVar('theme_dir_http', $settings->getVar('BASE_URL_HTTP') . '/themes/' . $settings->getVar('SITE_THEME') . '/templates/');
$settings->setVar('page_templates_path', $settings->getVar('ROOT') . '/themes/' . $settings->getVar('SITE_THEME') . '/templates/');
$settings->setVar('theme_mail_dir', $settings->getVar('ROOT') . '/themes/' . $settings->getVar('SITE_THEME') . '/templates/mails/');
$settings->setVar('mail_templates_path', $settings->getVar('theme_mail_dir'));
$settings->setVar('page_templates_path_c', $settings->getVar('prefix') . 'cache/');
$settings->setVar('cache_dir', $settings->getVar('prefix') . 'cache/');
$settings->setVar('cache_dir_http', $settings->getVar('BASE_URL_HTTP') . '/cache/');
$settings->setVar('inc_dir', $settings->getVar('ROOT') . '/include/');
$settings->setVar('conf_dir', $settings->getVar('prefix'));
$settings->setVar('plug_dir', $settings->getVar('ROOT') . 'plugins/');
$settings->setVar('plug_path', $settings->getVar('ROOT') . 'themes/' . $settings->getVar('SITE_THEME') . '/templates/plugins/');

/* default stylesheet */
$settings->setVar('styles', array());

/* default javascripts */
$settings->setVar('javascripts', array());

/* Smarty config */
$settings->setVar('SMARTY_DIR', $settings->getVar('inc_dir') . '/Smarty/libs/');
if ( !defined('DIRECTORY_SEPARATOR') ) define('DIRECTORY_SEPARATOR', '/');



?>
