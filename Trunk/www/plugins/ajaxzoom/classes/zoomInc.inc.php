<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomInc.inc.php
* Copyright: Copyright (c) 2010 Vadim Jacobi
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/


if(!session_id()){session_start();}
// include the three classes
//include_once ('zoomFunctions.inc.php');


// Javascript Packer Class
// With this class it is possible to pack and obfuscate output javascripts
require ('axZm.packer.class.php');

/*
	Major class axZm (Ajax Zoom) PHP 5 only
	This class is encrypted
	Do not edit it, it will not work then
	
	Public (final) methods:
	$axZm -> makeFirstImage($zoom); // will generate initial image
	$axZm -> makeAllThumbs($zoom); // will make thumbs for image gallery.
	$axZm -> makeThumb($zoom,$pic_list_array,$zoomID); // will make only specific thumb with $zoomID, which is the key from $pic_list_array
	$axZm -> gPyramid ($zoom); // will create image pyramid from source image
	$axZm -> makeZoomTiles ($zoom); // will create image pyramid with tiles from source image
	$axZm -> zoomReturnCrop ($zoom); // will return the zoomed image via ajax, used in zoomLoad.php
*/


// uncomment one of the versions, either ioncube or sourceguardian
require ('axZm.class.ioncube.php'); // ioncube version
//require ('axZm.class.ixed.php'); // sourceguardian version


$axZm = new axZm();


/* Helper class axZmH
This class is opensource
You can edit it if you are knowing, what you are doing
Watch inside for methods and comments
*/
require ('axZmH.class.php');
$axZmH = new axZmH($axZm);


// Include configuration file	
require_once ('zoomConfig.inc.php');

// Include the file wich defines pictures
if (!isset($noObjectsInclude)){
	require_once ('zoomObjects.inc.php');
}
?>
