<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomLoad.php
* Copyright: Copyright (c) 2010 Vadim Jacobi
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/

// turn error reporting off!
error_reporting(0);

if (!headers_sent()){
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}else{
	exit;
}

ignore_user_abort(true);

// Do not inlude objects if $zoom['config']['cropNoObj'] = true;
if ( isset($_GET['zoomPath']) AND isset($_GET['zoomImage']) AND isset($_GET['zoomID']) AND isset($_GET['str']) ){
	$noObjectsInclude = true;
}

include_once ("zoomInc.inc.php");

if (!is_object($axZm)){
	$text = "The Ajax-Zoom class has not been initialized.";		
	echo "<script type=\"text/javascript\">
		try{
		$.fn.axZm.zoomAlert('".$text."','Error',false);
		}catch(e){
			alert('Error: ".$text."');
		}
	</script>";
	exit;
}

elseif ( isset($_GET['setHW']) AND isset($_GET['zoomID']) ){
	$setHW = true;
}

elseif ( isset($_GET['zoomLoadAjax']) ){
	echo $axZmH->drawZoomBox($zoom, $zoomTmp);
	echo $axZmH->drawZoomJsConf($zoom, $rn = false, $pack = true);
}

elseif ( isset($_GET['loadZoomAjaxSet']) ){
	echo $axZmH->drawZoomJsGallerySet($zoom, $rn = false, $pack = true);
}

elseif ( isset($_GET['zoomID']) AND isset($_GET['str']) ){
	ignore_user_abort(false);
	ob_start();
	echo $axZm -> zoomReturnCrop($zoom);
	ob_end_flush();
}

else{
	echo "<TABLE WIDTH='100%' HEIGHT='100%'><TR><TD valign='middle' align='center'><DIV style='width: 500px; border: #000000 3px double; padding: 10px; font-size: 18px; text-align: left;'>";
	echo "ERROR<BR /><BR />";
	echo "This file is a part of a program and can not be called directly.<BR />";
	echo "For security reasons some information has been logged. <UL><LI>IP Address: <SPAN STYLE='color:red'>".$_SERVER['REMOTE_ADDR']."</SPAN></LI><LI>Date: ".date('Y-m-d')."</LI><LI>Time: ".date('H:i:s')."</LI></UL>";
	echo "</DIV></TD></TR></TABLE>";
	// You can log it to db, file or whatever...
}

?>
