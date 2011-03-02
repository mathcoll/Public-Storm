<?php
/**
 * Front controller for default Minify implementation
 * 
 * DO NOT EDIT! Configure this utility via config.php and groupsConfig.php
 * 
 * @package Minify
 */

define('MINIFY_MIN_DIR', dirname(__FILE__));


$uri = split('/', $_SERVER['REQUEST_URI']);
if( Settings::getVar('BASE_URL') != "" )
{
	$ind = 2;
}
else
{
	$ind = 1;
}

// load config
//require MINIFY_MIN_DIR . '/config.php';
require('./conf/compressor.php');
//$min_libPath = dirname(__FILE__) . '/classes/minify_2.1.3/min/lib/';
$min_libPath = dirname(__FILE__) . '/classes/minify_2.1.4_beta/min/lib/';

// setup include path
set_include_path($min_libPath . PATH_SEPARATOR . get_include_path());

require $min_libPath.'Minify.php';

Minify::$uploaderHoursBehind = $min_uploaderHoursBehind;
Minify::setCache(
    isset($min_cachePath) ? $min_cachePath : ''
    ,$min_cacheFileLocking
);

if ($min_documentRoot) {
    $_SERVER['DOCUMENT_ROOT'] = $min_documentRoot;
} elseif (0 === stripos(PHP_OS, 'win')) {
    Minify::setDocRoot(); // IIS may need help
}

$min_serveOptions['minifierOptions']['text/css']['symlinks'] = $min_symlinks;

if ( $min_allowDebugFlag && $uri[$ind+3] == "debug" ) {
    $min_serveOptions['debug'] = true;
}

if ( $min_errorLogger ) {
    require_once 'Minify/Logger.php';
    if (true === $min_errorLogger) {
        require_once 'FirePHP.php';
        Minify_Logger::setLogger(FirePHP::getInstance(true));
    } else {
        Minify_Logger::setLogger($min_errorLogger);
    }
}


if( $statuses['compressor'] == 1 )
{
	/* compression des Css */
	$csss = array();
	foreach( Settings::getCsss('screen', true) as $file )
	{
		//print_r(Settings::getCsss('screen', true))."\n";
		if ( $file['file'] == $uri[$ind+2] )
		{
			array_push(
				$csss,
				$file['stylesheet']
			);
			//print "/*".$file['stylesheet']."*/\n".file_get_contents($file['stylesheet'])."\n";
			Settings::removeCss($file['stylesheet']);
		}
	}
	//print_r($csss);
	/* compression des Js */
	$jss = array();
	foreach( Settings::getJss('text/javascript', true) as $file )
	{
		//print_r(Settings::getJss('text/javascript', true))."\n";
		//print $file['file']."-".$uri[$ind+2]."\n";
		if ( $file['file'] == $uri[$ind+2] )
		{
			array_push(
				$jss,
				$file['javascript']
			);
			Settings::removeJs($file['javascript']);
		}
	}
	//print_r($jss);
}

// check for URI versioning
if (preg_match('/&\\d/', $_SERVER['QUERY_STRING'])) {
    $min_serveOptions['maxAge'] = 2678400;
}
if ( false ) {
    $min_serveOptions['rewriteCssUris'] = true;
}
if ( true ) {
	$min_serveOptions['encodeOutput'] = false;
}

$content = $uri[$ind]=="js" ? $jss : $csss;
$content_type = $uri[$ind]=="js" ? "text/javascript" : "text/css";
//print $uri[$ind]." = ".$uri[$ind+1];
//print_r($content);
//print $uri[$ind+1];
if ( $uri[$ind+1] == "groups" )
{
	//well need groups config
	$min_serveOptions['minApp']['groups'] = array(
		$uri[$ind] => $content,
	);
	//print_r($min_serveOptions['minApp']['groups']);
	$_GET['g'] = $uri[$ind];
	//print_r($min_serveOptions);
	Minify::serve('MinApp', $min_serveOptions);
	exit();
} elseif ( $min_enableBuilder ) {
    header('Location: builder/');
    exit();
} else {
    errordocument::setError(501);
    exit();
}
