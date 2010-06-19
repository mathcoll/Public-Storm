<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomSess.php
* Copyright: Copyright (c) 2010 Vadim Jacobi
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/

error_reporting(0);

if(!session_id()){session_start();}

// Zoom out org
if (isset($_GET['resetSess'])){
	unset ($_SESSION['imageZoom']);
}

if (isset($_GET['reset'])){
	unset ($_SESSION['imageZoom']);
	// Only once at beginning
	if (isset($_GET['randNumber'])){
		$_SESSION['randNumber'] = $_GET['randNumber'];
		//unset ($_SESSION['imageZoomConf']); why there was is here?
		unset ($_SESSION['imageTraffic']);
	}
	
	if (isset($_GET['firstLoad'])){
		$noObjectsInclude = true;
		include("zoomInc.inc.php");
		
		// Delte zoom cashe files
		$axZmH->delteZoomCache($zoom['config']['tempDir'],$zoom['config']['cacheTime']);
		
		// Please do not remove
		echo $axZm->demoWtr($zoom);
	}else{
		echo "$.fn.axZm.zoomResetSession();";
	}
}


if (isset($_GET['sessionCheck'])){
	if ($_GET['sessionCheck'] != $_SESSION['randNumber']){
		?>
		if ($.axZm['useSess']){
			var zoomMsgWarning = 'Warning'
			var zoomMsgCookieWarning = 'The browser you are using is rejecting session cookies. Zoom may not work properly. Please turn on session cookies.';
			var zoomMsgWarningFb = "<span style=\"font-weight: bold; font-size: 125%;\">"+zoomMsgWarning+"</span><br>";
			zoomMsgWarningFb += zoomMsgCookieWarning;
			zoomMsgWarningFb = "<DIV class=\"zoomDialog\">"+zoomMsgWarningFb+"</DIV>";
			$.facebox(zoomMsgWarningFb);
		}
		<?php
	}else{
		/*echo "<script type=\"text/javascript\"></script>";	*/
	}
}

?>