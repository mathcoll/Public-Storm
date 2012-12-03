<?php
/**
* Plugin: jQuery AJAX-ZOOM, jquery.axZm.js
* Copyright: Copyright (c) 2010 Vadim Jacobi
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/

/*
This is an example of how you can batch process a large amount of images (with just one file!).
With this file you can prepare any image on your site for ajax-zoom!
You can also easily bind this php file into your cms, e.g. in a iframe (<iframe src="thisFileSrc"></iframe>)
Since everything can be made on the fly during the use of ajax-zoom in the frontend this "step" is not required.
However some operations like tiling the images can take a considerable amount of time and server resources.
So please check, if you can use it, best of all at times, where server load is at least.
This example will not work as a crone job, since it uses ajax for iteration and "visual feedback".
Based on this example it is surely possible to make a cron job suited procedure. (feature versions?)

!! You schould adjust this example to suit your needs.
Especially $pic_list_array must be generated as you need it, see zoomObjects.inc.php for more examples!
Out of the box this basic example will batch process images from a admin-user selectable directory.

!! $_SESSION (session cookies) must be activated in your browser.
!! Please note, that in demoMode the Browserer can "freez", if any errors ocure. 
This have to do with demo mode limitation (e.g. img Size)
*/

ini_set("session.gc_maxlifetime", 3600); // 60 minutes
set_time_limit(720);

if(!session_id()){session_start();}


// Simple (very basic) password protection for this file
// Please modify or remove it
$yourSecretPassWord = mt_rand(); // change this password 

if (isset($_POST['pass'])){
	if ($_POST['pass'] == $yourSecretPassWord){
		$_SESSION['axZmProtect'] = true;
	}
}

if (!isset($_SESSION['axZmProtect'])){
	echo "
	<html><head>
	<title>Login</title>
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" /> 
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
	<meta http-equiv=\"imagetoolbar\" content=\"no\">
	</head>
	<body>
	<FORM method='POST'>
	<table width=100% height=100%><tr><td align='center' valign='middle'>
	<DIV style='width: 300px; padding: 30px 10px 30px 10px; border: #CCCCCC 1px solid; background-color: #F3F3F3'>
		Please enter password:<br>
		<input type='password' name='pass'>
	</DIV>
	</td></tr></table></FORM>
	</body></html>
	";	
	exit;
}

// End password protection


// Unset all Sessions in this document
// All Sessions here are stored in this var: $_SESSION['axZmBtch']
if ( ( empty($_GET) AND empty($_POST) ) OR isset($_GET['unsetBatch'])){
	unset ($_SESSION['axZmBtch']);
}

// packer script
include_once ('axZm.packer.class.php');

// main class
// uncomment one of the versions, either ioncube or sourceguardian
require ('axZm.class.ioncube.php'); // ioncube version
//require ('axZm.class.ixed.php'); // sourceguardian version

// helper class
include_once ('axZmH.class.php');

// new main object
$axZm = new axZm();

// new helper object
$axZmH = new axZmH();

// include configuration file
include_once ('zoomConfig.inc.php');

// Override errors etc...
$zoom['config']['visualConf'] = true;
$zoom['config']['errors'] = false;
$zoom['config']['warnings'] = false;
$zoom['config']['galleryDialog'] = false;
$zoom['config']['gPyramidDialog'] = false;
$zoom['config']['pyrDialog'] = false;
$zoom['config']['pyrProgErrorRemove'] = true;


// Override any other parameters set in zoomConfig.inc.php
$zoom['config']['makeFirstImage'] = true; // just adding this as new one
$zoom['config']['useFullGallery'] = true; // will generate inline gallery thumbs
$zoom['config']['useGallery'] = true; // will generate gallery thumbs
$zoom['config']['gPyramid'] = false; // will generate gPyramid
$zoom['config']['pyrTiles'] = true; // will generate tiles

$zoom['config']['pic'] = "/pic/"; // base directory, can be just /
$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');

/*
$zoom['config']['picDim'] = "600x400"; // string initial picture size
$zoom['config']['picX'] = intval($axZmH->getf('x',$zoom['config']['picDim']));
$zoom['config']['picY'] = intval($axZmH->getl('x',$zoom['config']['picDim']));

$zoom['config']['pyrProg'] = 'IM'; // IM or GD
$zoom['config']['pyrIMcacheLimit'] = 1000; // float (Mio Pixel), 1000 - 1 gigapix!
$zoom['config']['pyrProgImLimit']['memory'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['map'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['area'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['disk'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['threads'] = false; // false or integer (number of threads of execution)
$zoom['config']['pyrProgImLimit']['time'] = 300; // false or integer (maximum elapsed time in seconds)
*/

#######################################################################################
#################################### Batch parameters #################################
#######################################################################################

// PHP_SELF should be ok for iframe
// for includes /path/to/cms/zoomBatch.php
$zoom['batch']['selfFile'] = $_SERVER['PHP_SELF'];

// Define the start (home) directory where images are located (for dropdown option list)
$zoom['batch']['startPic'] = $zoom['config']['pic'];

// Preview image settings in the file list
$zoom['batch']['prevWidth'] = 300;
$zoom['batch']['prevHeight'] = 300;

// Enable thumbs for batch list (will be displayed to the right)
$zoom['batch']['enableBatchThumbs'] = false;

// Make many different thumbs for gallery ($zoom['config']['galleryPicDim'] will be replaced with the values specified in this array)
// $zoom['batch']['galRes'] = array(1=>'50x50', '60x60', '70x70', '80x80', '100x100', '120x120', '150x150', '180x180');

// Make many different initial pictures ($zoom['config']['picDim'] will be replaced with the values specified in this array)
// $zoom['batch']['initRes'] = array(1=>'420x280', '420x630', '480x360', '480x320', '480x480', '480x720', '600x400', '600x600', '780x520', '800x600');


// Pause between ajax requests
$zoom['batch']['pause'] = 1000; // ms (1000ms = 1sec)
$zoom['batch']['allowDelete'] = true; // boolean
$zoom['batch']['allowBatchDelete'] = true; // boolean
$zoom['batch']['confirmDelete'] = true; // boolean
$zoom['batch']['stopOnError'] = true; // boolean

// Do not change
$zoom['batch']['arrayMake']['In'] = $zoom['config']['makeFirstImage'] ? true : false;
$zoom['batch']['arrayMake']['Th'] = ( ($zoom['config']['useGallery'] OR $zoom['config']['useFullGallery']) ? true : false );
$zoom['batch']['arrayMake']['gP'] = $zoom['config']['gPyramid'] ? true : false;
$zoom['batch']['arrayMake']['Ti'] = $zoom['config']['pyrTiles'] ? true : false;

// Language vars
$zoom['batch']['arrayMakeName']['In'] = 'Initial Image';
$zoom['batch']['arrayMakeName']['Th'] = 'Thumbs';
$zoom['batch']['arrayMakeName']['gP'] = 'gPyramid';
$zoom['batch']['arrayMakeName']['Ti'] = 'Tiles';

// Icons
$zoom['batch']['iconNames']['Ok']='batch_ok.png';
$zoom['batch']['iconNames']['Error']='batch_error.png';
$zoom['batch']['iconNames']['n']='batch_n.png';
$zoom['batch']['iconNames']['Trash']='batch_trash.png';
$zoom['batch']['iconNames']['Smile']='batch_smile.png';
$zoom['batch']['iconNames']['Warning']='batch_alert.png';
$zoom['batch']['iconNames']['Info']='batch_info.png';

$zoom['batch']['iconOk'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Ok'].'" width="16" height="16" border="0" alt="">';
$zoom['batch']['iconError'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Error'].'" width="16" height="16" border="0" alt="">';
$zoom['batch']['iconN'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['n'].'" width="16" height="16" border="0" alt="">';

$zoom['batch']['iconTrash'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Trash'].'" style="cursor: pointer" width="16" height="16" border="0" title="Delete">';
$zoom['batch']['iconSmile'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Smile'].'" width="32" height="32" border="0" alt="" align="left" style="margin: 0px 5px 0px 0px">';
$zoom['batch']['iconWarning'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Warning'].'" width="32" height="32" border="0" alt="" align="left" style="margin: 0px 5px 0px 0px">';
$zoom['batch']['iconInfo'] = '<img src="'.$zoom['config']['icon'].$zoom['batch']['iconNames']['Info'].'" width="32" height="32" border="0" alt="" align="left" style="margin: 0px 5px 0px 0px">';

// End Batch parameters





// Generate a dropdown list with all subdirectories
if (!isset($_SESSION['axZmBtch']['dirTreeArray'])){
	$startTime = microtime(true);
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['pyrTilesPath'],'remove'));
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['gPyramidPath'],'remove'));
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['thumbs'],'remove'));
	//$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['temp'],'remove'));
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['gallery'],'remove'));
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['icon'],'remove'));
	$exclude[] = $axZmH->getl('/', $axZmH->checkSlash($zoom['config']['js'],'remove'));
	$_SESSION['axZmBtch']['dirTreeArray'] = $axZmH->getDirTree($zoom['batch']['startPic'], $zoom['config']['fpPP'], $exclude);
	$totalTime = sprintf('%.2f', (microtime(true) - $startTime));
}

// Change direcory and $zoom['config']['pic'], $zoom['config']['picDir'] respectively.
if (isset($_SESSION['axZmBtch']['currentDir']) AND !isset($_GET['dir'])){
	$_GET['dir']=$_SESSION['axZmBtch']['currentDir'];
}

if (isset($_GET['dir']) AND isset($_SESSION['axZmBtch']['dirTreeArray'])){
	if (!empty($_SESSION['axZmBtch']['dirTreeArray'])){
		if (is_array($_SESSION['axZmBtch']['dirTreeArray'][urldecode($_GET['dir'])])){
			$zoom['config']['pic'] = $axZmH->checkSlash($_SESSION['axZmBtch']['dirTreeArray'][urldecode($_GET['dir'])]['DIR_PATH'],'remove');
			$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
			
			$_SESSION['axZmBtch']['pic'] = $zoom['config']['pic'];
			$_SESSION['axZmBtch']['picDir'] = $zoom['config']['picDir'];
			$_SESSION['axZmBtch']['currentDir'] = urldecode($_GET['dir']);
		}
	}
}elseif (isset($_GET['dir']) AND !isset($_SESSION['axZmBtch']['dirTreeArray'])){
	unset ($_GET['dir']);
}

// Preview images are created on the fly
if (isset($_GET['previewPic'])){
	ob_start();
	$axZm->rawThumb($zoom['config']['picDir'],urldecode($_GET['previewPic']),$zoom['batch']['prevWidth'],$zoom['batch']['prevHeight'],$qual=100);
	ob_end_flush();
	exit;
}


// zoomObjects.inc.php is not included
// Define the $pic_list_array as we need it here
// The standard setting will allow to to browse through all directorys
if (!isset($_SESSION['axZmBtch']['batchJob'])){
	// write here how you want to retrieve your $pic_list_array
	$pic_list_array = array();
	$handle = opendir($zoom['config']['picDir']);
	while ($file = readdir ($handle)) {
		if ( strtolower( $axZmH->getl('.',$file) ) == 'jpg' ){
			array_push($pic_list_array, $file);
		}
	}
	closedir($handle);
	$pic_list_array = $axZmH->natIndex($pic_list_array);
	
	$pic_list_temp_array = array(); 
	$pic_list_data = array();
	$n=0;
	foreach ($pic_list_array as $k=>$v){
		$n++;
		$pic_list_temp_array[$n] = $pic_list_array[$k];
		$pic_list_data[$n]['imgSize'] = getimagesize($zoom['config']['picDir'].$pic_list_array[$k]);
		$pic_list_data[$n]['fileSize'] = filesize($zoom['config']['picDir'].$pic_list_array[$k]);
	}
	$pic_list_array = $pic_list_temp_array;
	$_SESSION['axZmBtch']['pclstdt'] = $pic_list_data;
}


// Set options from Session if they have been set dynamically
if (isset($_SESSION['axZmBtch']['arrayMake'])){
	$zoom['batch']['arrayMake']=$_SESSION['axZmBtch']['arrayMake'];
	if ($zoom['batch']['arrayMake']['Th'] AND !($zoom['config']['useFullGallery'] || $zoom['config']['useGallery'])){
		$zoom['config']['useFullGallery'] = true;
		$zoom['config']['useGallery'] = true;
	}
}

// Ajax change options
if ($_GET['switchBatch']){
	$retScript = '';
	$a = split('_',$_GET['switchBatch']);
	if (array_key_exists($a[0],$zoom['batch']['arrayMake'])){
		$zoom['batch']['arrayMake'][$a[0]] = (($a[1] == 'on') ? true : false);
		$_SESSION['axZmBtch']['arrayMake'] = $zoom['batch']['arrayMake'];	
		
		if ($zoom['batch']['arrayMake']['Th'] AND !$zoom['config']['useFullGallery'] AND !$zoom['config']['useGallery']){
			$zoom['config']['useFullGallery'] = true;
			$zoom['config']['useGallery'] = true;
		}
		
		if ($zoom['batch']['arrayMake']['Th'] AND $zoom['batch']['enableBatchThumbs']){
			if ($zoom['config']['useFullGallery']){
				$zoom['batch']['batchThumbs'] = 'galFullPic';
			}elseif($zoom['config']['useGallery']){
				$zoom['batch']['batchThumbs'] = 'galPic';
			}
		}

		$_SESSION['axZmBtch']['arrayMake'] = $zoom['batch']['arrayMake'];		
		$retScript .= "<script type=\"text/javascript\">";
		$retScript .= "
			$('#batchList').html('".$axZmH->batchList($zoom, $pic_list_array, $pic_list_data)."');
			$('#processTable').remove();
			$('#batchProcess').prepend('".$axZmH->batchProcess($zoom)."');
			$.zoomBatch.trOver();
		";
		$retScript .= "</script>";
		echo $retScript;
	}
	exit;
}

// Choose thumb size if thumbs should be shown in the batch process list
if ($zoom['batch']['enableBatchThumbs']){
	if ($zoom['config']['useFullGallery']){
		$zoom['batch']['batchThumbs'] = 'galFullPic';
	}elseif($zoom['config']['useGallery']){
		$zoom['batch']['batchThumbs'] = 'galPic';
	}
}

// Ajax change directory
if ($_GET['dir'] AND $_GET['dirReplace']){
	$retScript = "<script type=\"text/javascript\">";
	$retScript .= "
		$('#batchList').html('".$axZmH->batchList($zoom, $pic_list_array, $pic_list_data)."');
		$.zoomBatch.trOver();
	";
	$retScript .= "</script>";
	echo $retScript;
	exit;
}

// Ajax Delete all thumbs, initial image(s) etc
// The original file will not be deleted, unless you set the last parameter of the method removeAxZm to true!
if (isset($_GET['delPic']) AND $zoom['batch']['allowDelete']){
	ob_start();
	if (!empty($pic_list_array)){
		if ($pic_list_array[(int)$_GET['delPic']]){
			$axZmH -> removeAxZm($zoom, $pic_list_array[$_GET['delPic']], $arrDel = $zoom['batch']['arrayMake'], false);
			$retScript = "<script type=\"text/javascript\">";
			$retScript .= $zoom['batch']['arrayMake']['In'] ? "$('#In".$_GET['delPic']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
			$retScript .= $zoom['batch']['arrayMake']['Th'] ? "$('#Th".$_GET['delPic']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
			$retScript .= $zoom['batch']['arrayMake']['gP'] ? "$('#gP".$_GET['delPic']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
			$retScript .= $zoom['batch']['arrayMake']['Ti'] ? "$('#Ti".$_GET['delPic']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
			$retScript .= "</script>";
			echo $retScript;
		}
	}
	ob_end_flush();
	exit;
}

// Ajax Delete all thumbs, initial image(s) etc for selected files
if (isset($_GET['submitDelete']) AND $zoom['batch']['allowBatchDelete']){
	$retScript = "<script type=\"text/javascript\">";
	if (!empty($pic_list_array)){
		// list ist posted
		$del_array = array();
		foreach ($pic_list_array as $k=>$v){
			if (isset($_POST['f'.$k])){
				$del_array[$k] = $v;
			}
		}
		if (!empty($del_array)){
			$retScript = "<script type=\"text/javascript\">";
			foreach ($del_array as $k=>$v){
				$axZmH -> removeAxZm($zoom, $v, $arrDel = $zoom['batch']['arrayMake'], false);
				$retScript .= $zoom['batch']['arrayMake']['In'] ? "$('#In".$k."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
				$retScript .= $zoom['batch']['arrayMake']['Th'] ? "$('#Th".$k."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
				$retScript .= $zoom['batch']['arrayMake']['gP'] ? "$('#gP".$k."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';
				$retScript .= $zoom['batch']['arrayMake']['Ti'] ? "$('#Ti".$k."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');" : '';				
			}
		}
	}
	$retScript .= "$('.processMsg').remove();";
	$retScript .= "$('#batchProcess').append('<div class=\"processMsg\" id=\"processMsgNotice\">".$zoom['batch']['iconInfo']." Batch delete completed.</div>');";
	$retScript .= "$('#passFiles input').attr({disabled: false});";
	$retScript .= "$('#leftFrameFoot input').attr({disabled: false});";
	$retScript .= "</script>";
	echo $retScript;
	exit;
}

// This is for ajax batch process
if ((isset($_GET['zoomID']) AND !empty($_SESSION['axZmBtch']['batchJob'])) OR isset($_GET['submitList']) ){

	// Submited List of images evaluation
	if (isset($_GET['submitList'])){ 
	
		// Strip $pic_list_array from values, that have been unchecked
		$pic_list_temp_array = $pic_list_array;
		foreach ($pic_list_array as $k=>$v){
			if (!isset($_POST['f'.$k])){
				unset($pic_list_temp_array[$k]);
			}
		}
		$pic_list_array = $pic_list_temp_array;

			
		// Save $pic_list_array to session
		if (!empty($pic_list_array)){
			$_SESSION['axZmBtch']['batchJob'] = $pic_list_array;
			$_SESSION['axZmBtch']['batchJobCount']  = count($pic_list_array);
			$_SESSION['axZmBtch']['startTime'] = microtime(true);

			reset($_SESSION['axZmBtch']['batchJob']);
			
			// Init first image for further processing
			$_GET['zoomID'] = key ($_SESSION['axZmBtch']['batchJob']);
			
			echo "<script type=\"text/javascript\">
				$('#passFiles input').attr({disabled: true});
				$('#leftFrameFoot input').attr({disabled: true});
				$('.processMsg').remove();
				$('table.batchProcessTable tbody tr').remove();
				$('#batchProcess').append('<div class=\"processMsg\" style=\"height:20px; border: none; background-color: transparent; background-image: none;\"></div>');
				$('#processTable > tbody').append('<tr id=\"rowWait_".$_GET['zoomID']."\" style=\"background-color: #FFF7B1\"><td colspan=\"".(6+(isset($zoom['batch']['batchThumbs']) ? 0 : -1))."\" valign=\"middle\">Processing <strong>".$_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']]."</strong>, please wait...</td><td align=\"right\"><img src=\"".$zoom['config']['icon']."batch_process_loader.gif\" width=\"16\" height=\"16\"></td></tr>');
				$.ajax({
					url: '".$zoom['batch']['selfFile']."?zoomID=".$_GET['zoomID']."',
					timeout: 360000,
					cache: false,
					success: function (data){
						$('#batchOpr').html(data);
					},
					complete: function () {
					}
				});
			</script>";
			exit;
		}else{
			echo "<script type=\"text/javascript\">
				$('#passFiles input').attr({disabled: false}); 
				$('#leftFrameFoot input').attr({disabled: false}); 
				$('.processMsg').remove();
				$('#batchProcess').append('<div class=\"processMsg\" id=\"processMsgNotice\">".$zoom['batch']['iconWarning']." No images selected!</div>');
			</script>";
		}
	}
	
	// Iterate (with Ajax) until $_SESSION['axZmBtch']['batchJob'] (piclist_array) is empty
	if (isset($_GET['zoomID']) AND !empty($_SESSION['axZmBtch']['batchJob'])){
		
		settype ($_GET['zoomID'],'int');
		
		$startTime = microtime(true); 
		
		// Start counter for jobs made
		if (!isset($_SESSION['axZmBtch']['batchJobN'])){$_SESSION['axZmBtch']['batchJobN'] = 0;}
		
		// Srart counter for errors
		if (!isset($_SESSION['axZmBtch']['batchErrors'])){$_SESSION['axZmBtch']['batchErrors'] = 0;}
		
		$_SESSION['axZmBtch']['batchJobN']++;
		
		// Define some important parameter on the fly
		$zoom['config']['orgImgName'] = $_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']];
		$zoom['config']['orgImgSize'] = getimagesize($zoom['config']['picDir'].$zoom['config']['orgImgName']);
		$zoom['config']['smallImgName'] = $axZmH->composeFileName($_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']], $zoom['config']['picDim'], '_');
		
		// Make initial image
		if ($zoom['batch']['arrayMake']['In']){
			
			if (is_array($zoom['batch']['initRes']) AND !empty($zoom['batch']['initRes'])){
				$savePicDim = $zoom['config']['picDim'];
				foreach ($zoom['batch']['initRes'] as $k=>$v){
					$zoom['config']['picDim'] = $v;
					$zoom['config']['picX'] = intval($axZmH->getf('x',$zoom['config']['picDim']));
					$zoom['config']['picY'] = intval($axZmH->getl('x',$zoom['config']['picDim']));
					$zoom['config']['smallImgName'] = $axZmH->composeFileName($_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']], $zoom['config']['picDim'], '_');
					if (!file_exists($zoom['config']['thumbDir'].$zoom['config']['smallImgName'])){
						$makeFirstImage = $axZm->makeFirstImage($zoom); // will return true or false
					}else{
						$makeFirstImage = true; // already made
					}					
				}
				$zoom['config']['picDim'] = $savePicDim;
				$zoom['config']['picX'] = intval($axZmH->getf('x',$zoom['config']['picDim']));
				$zoom['config']['picY'] = intval($axZmH->getl('x',$zoom['config']['picDim']));
				$zoom['config']['smallImgName'] = $axZmH->composeFileName($_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']], $zoom['config']['picDim'], '_');

			} else {
				if (!file_exists($zoom['config']['thumbDir'].$zoom['config']['smallImgName'])){
					$makeFirstImage = $axZm->makeFirstImage($zoom); // will return true or false
				}else{
					$makeFirstImage = true; // already made
				}
			}
			// Define image size of initial image
			$zoom['config']['smallImgSize'] = getimagesize($zoom['config']['thumbDir'].$zoom['config']['smallImgName']);
		}else{
			$zoom['config']['smallImgSize'] =  $axZmH->virtualResize($zoom['config']['orgImgSize'],array($zoom['config']['picX'],$zoom['config']['picY']));
		}

		// Make thumbs
		if ($zoom['batch']['arrayMake']['Th']){

			if (is_array($zoom['batch']['galRes']) AND !empty($zoom['batch']['galRes'])){
				$saveGalleryPicDim = $zoom['config']['galleryPicDim'];
				
				$zoom['config']['useGallery'] = true;
				$zoom['config']['useFullGallery'] = false;
				$zoom['config']['useHorGallery'] = false;
				
				foreach ($zoom['batch']['galRes'] as $k=>$v){
					$zoom['config']['galleryPicDim'] = $v;
					$zoom['config']['galPicX'] = intval($axZmH->getf('x',$zoom['config']['galleryPicDim']));
					$zoom['config']['galPicY'] = intval($axZmH->getl('x',$zoom['config']['galleryPicDim']));
					$makeThumb = $axZm->makeThumb($zoom, $_SESSION['axZmBtch']['batchJob'], $_GET['zoomID']); // will return an array (0 => [(int) num images made], 1 => [(array) with errors])
				}
				$zoom['config']['galleryPicDim'] = $saveGalleryPicDim;
			}else{
				$makeThumb = $axZm->makeThumb($zoom,$_SESSION['axZmBtch']['batchJob'],$_GET['zoomID']); // will return an array (0 => [(int) num images made], 1 => [(array) with errors])
			}
		}
		
		// Make gPyramid
		if ($zoom['batch']['arrayMake']['gP']){
			$gPyramidPicDir = $zoom['config']['gPyramidDir'].$axZmH->getf('.',$zoom['config']['orgImgName']);
			if (!is_dir($gPyramidPicDir)){
				$gPyramid = $axZm->gPyramid($zoom); // will return true or false
			}else{
				$gPyramid = true;
			}
		}
		
		// Make tiles
		if ($zoom['batch']['arrayMake']['Ti']){
			$tilesPicDir = $zoom['config']['pyrTilesDir'].$axZmH->getf('.',$zoom['config']['orgImgName']);
			if (!file_exists($tilesPicDir.'/0-0-0.jpg')){
				$makeZoomTiles = $axZm->makeZoomTiles($zoom); // will return true or false
			}else{
				$makeZoomTiles = true;
			}
		}

		// Return ajax results with javascript into the batch table
		if (!isset($_SESSION['axZmBtch']['batchColor'])){$_SESSION['axZmBtch']['batchColor']='#FFFFFF';}
		if ($_SESSION['axZmBtch']['batchColor']=='#FFFFFF'){$_SESSION['axZmBtch']['batchColor']='#EEEEEE';}
		else {$_SESSION['axZmBtch']['batchColor']='#FFFFFF';}
		
		$error = false;
		$jsIcons = '';

		$returnRow = "<tr id=\"row_".$_GET['zoomID']."\" style=\"background-color: ".$_SESSION['axZmBtch']['batchColor'].";\">";
		
			$returnRow .= "<td style=\"text-align: left;\">".wordwrap($zoom['config']['orgImgName'],30,'<br>',true)."</td>";
			
			if (!isset($makeFirstImage)){
				$returnRow .= "<td>".$zoom['batch']['iconN']."</td>";
			}
			elseif ($makeFirstImage){
				$returnRow .= "<td>".$zoom['batch']['iconOk']."</td>";
				$jsIcons = "$('#In".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Ok']."');";
			}
			else {
				$returnRow .= "<td>".$zoom['batch']['iconError']."</td>"; 
				$jsIcons = "$('#In".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');";
				$_SESSION['axZmBtch']['batchErrors']++; 
				$error=true;
			}
			
			if (!isset($makeThumb)){
				$returnRow .= "<td>".$zoom['batch']['iconN']."</td>";
			}
			elseif (empty($makeThumb[1])){
				$returnRow .= "<td>".$zoom['batch']['iconOk']."</td>";
				$jsIcons .= "$('#Th".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Ok']."');";
			}
			else {
				$returnRow .= "<td>".$zoom['batch']['iconError']."</td>"; 
				$jsIcons .= "$('#Th".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');";
				$_SESSION['axZmBtch']['batchErrors']++; 
				$error = true;
			}
			
			if (!isset($gPyramid)){
				$returnRow .= "<td>".$zoom['batch']['iconN']."</td>";
			}
			elseif ($gPyramid){
				$returnRow .= "<td>".$zoom['batch']['iconOk']."</td>";
				$jsIcons .= "$('#gP".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Ok']."');";
			}
			else {
				$returnRow .= "<td>".$zoom['batch']['iconError']."</td>"; 
				$jsIcons .= "$('#gP".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');";
				$_SESSION['axZmBtch']['batchErrors']++; 
				$error=true;
			}
			
			if (!isset($makeZoomTiles)){
				$returnRow.="<td>".$zoom['batch']['iconN']."</td>";
			}
			elseif ($makeZoomTiles){
				$returnRow.="<td>".$zoom['batch']['iconOk']."</td>";
				$jsIcons .= "$('#Ti".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Ok']."');";
			}
			else {
				$returnRow.="<td>".$zoom['batch']['iconError']."</td>"; 
				$jsIcons .= "$('#Ti".$_GET['zoomID']."').attr('src','".$zoom['config']['icon'].$zoom['batch']['iconNames']['Error']."');";
				$_SESSION['axZmBtch']['batchErrors']++; 
				$error=true;
			}
			
			$returnRow.="<td>".sprintf('%.3f', (microtime(true) - $startTime))."</td>";
			
			if (isset($zoom['batch']['batchThumbs'])){
				if (empty($makeThumb[1])){
					$thumbNameGal = $axZmH->getf('.',$zoom['config']['orgImgName']).'_'.$zoom['config'][$zoom['batch']['batchThumbs'].'X'].'x'.$zoom['config'][$zoom['batch']['batchThumbs'].'Y'].'.'.$axZmH->getl('.',$zoom['config']['orgImgName']);
					$returnRow.='<td style="background-color:#484646">';
					$returnRow.='<div style="background-image: url('.$zoom['config']['gallery'].$thumbNameGal.'); background-position: center center; background-repeat: no-repeat; height: '.($zoom['config'][$zoom['batch']['batchThumbs'].'Y']+2).'px; margin:1px;"></div>';
					$returnRow.='</td>';
				}else{
					$returnRow.="<td>&nbsp;</td>";
				}
			}
			
		$returnRow.="</tr>";

		$prozessCountString='file '.$_SESSION['axZmBtch']['batchJobN'].' of '.$_SESSION['axZmBtch']['batchJobCount'].'';
		$progressBar="
		var headerW = parseInt($('#batchProcessHead').width());
		var progressBarW = Math.floor(headerW * (".$_SESSION['axZmBtch']['batchJobN']."/".$_SESSION['axZmBtch']['batchJobCount']."));
		$('#batchProgressBar').animate({width: progressBarW},{duration: 200, easing: 'linear'});
		";
		
		echo "<script type=\"text/javascript\">
			$('#rowWait_'+".$_GET['zoomID'].").remove();
			$('#processTable > tbody').append('".$returnRow."');
			".$jsIcons."
			".$progressBar."
			$('#batchProcess').scrollTo('#row_".$_GET['zoomID']."',{duration: 100});
			$('#batchList').scrollTo('#d".$_GET['zoomID']."',{duration: 100});
			if ($('#counterDiv').get()){
				$('#counterDiv').html('".$prozessCountString."');
			}
			";
			
			if ($error){
				echo "$('#row_".$_GET['zoomID']."').css('backgroundColor', '#EED4D4');";
				if ($zoom['batch']['stopOnError']){
					//unset
					$_SESSION['axZmBtch']['batchJob'] = array();
					echo "$.stopedOnError = true;";
				}
			}else{
				echo "$('#f".$_GET['zoomID']."').attr({checked: false});";
			}
		
		echo "</script>";

		// Unset current made zoomID from $_SESSION['axZmBtch']['batchJob']
		unset($_SESSION['axZmBtch']['batchJob'][$_GET['zoomID']]);
		
		// Triger next zoomID via Ajax, if available
		if (!empty($_SESSION['axZmBtch']['batchJob'])){
			reset($_SESSION['axZmBtch']['batchJob']);
			$nextJobID = key ($_SESSION['axZmBtch']['batchJob']);			
			
			// Add waiting dialog
			echo "<script type=\"text/javascript\">
				$('#processTable > tbody').append('<tr id=\"rowWait_".$nextJobID."\" style=\"background-color: #FFF7B1\"><td colspan=\"".(6+(isset($zoom['batch']['batchThumbs']) ? 0 : -1))."\" valign=\"middle\">Processing <strong>".$_SESSION['axZmBtch']['batchJob'][$nextJobID]."</strong>, please wait...</td><td align=\"right\"><img src=\"".$zoom['config']['icon']."batch_process_loader.gif\" width=\"16\" height=\"16\"></td></tr>');
				setTimeout(function(){
					$.ajax({
						url: '".$zoom['batch']['selfFile']."?zoomID=$nextJobID',
						timeout: 360000,
						cache: false,
						success: function (data){
							$('#batchOpr').html(data);
						},
						complete: function () {
						}
					});
				}, ".$zoom['batch']['pause'].");
			</script>";
			exit;
		}else{
			$_GET['showResults'] = 1;
		}
	}
	
	if ( isset($_GET['showResults'])){
		// Show overall results
		$endTime = microtime(true);
		$totalTime = sprintf('%.2f', ($endTime - $_SESSION['axZmBtch']['startTime'])); // 
		echo "<script type=\"text/javascript\">
			$('#passFiles input').attr({disabled: false});
			$('#leftFrameFoot input').attr({disabled: false}); 
			$('.processMsg').remove();
			var mmm = '<div class=\"processMsg\" id=\"processMsg\">';
				mmm += '<div style=\"float: right;\"><input type=\"button\" value=\"Clear\" onClick=\"$.zoomBatch.clearBatchResults();\"></div>';
				mmm += '".(($_SESSION['axZmBtch']['batchErrors'] == 0) ? $zoom['batch']['iconSmile'] : $zoom['batch']['iconWarning'])." Batch process completed ".(($_SESSION['axZmBtch']['batchErrors'] > 0) ? "<br>with ".$_SESSION['axZmBtch']['batchErrors']." errors" : '')."<br>in ".$axZmH->seconds2time($totalTime, 'string')."<br><br>';
				if ($.stopedOnError){
					$.stopedOnError = false;
					mmm += 'Please note, that the batch process has been stoped because of an error processing this image: ".$zoom['config']['orgImgName']."';
				}
			mmm += '</div>';
			mmm += '<div class=\"processMsg\" style=\"height:5px; border: none; background-color: transparent; background-image: none;\"></div>';
			
			$('#batchProcess').append(mmm).scrollTo('.processMsg');
			if ($('#counterDiv').get()){
				$('#counterDiv').html('finished');
				setTimeout(function(){
					$('#batchProgressBar').animate({width: 0},{duration: 500, easing: 'linear'});
				}, 1000);
			}
		</script>";
		unset($_SESSION['axZmBtch']['batchJobCount']);
		unset($_SESSION['axZmBtch']['batchJob']);
		unset($_SESSION['axZmBtch']['batchJobN']);
		unset($_SESSION['axZmBtch']['batchErrors']);
		unset($_SESSION['axZmBtch']['batchColor']);
		unset($_SESSION['axZmBtch']['startTime']);
	}
}

// Batch conversion list filenames
// This is what you sea at the beginning
else{
	echo $axZmH->setDoctype($zoom['config']['doctype']);
	echo "
	<head>
	<title>Batch Conversion Ajax-Zoom</title>
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" /> 
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
	<meta http-equiv=\"imagetoolbar\" content=\"no\">
	";
	
	// Javascripts
	//$exclude=array('ui.core','ui.draggable','effects.core','browser','mousewheel','jScrollPane','facebox','axZm','axZmDemo','colorpicker');
	//echo $axZmH->drawZoomJs($zoom, $min = false, $exclude); 
	echo "
		<script type=\"text/javascript\" src=\"".$zoom['config']['js']."plugins/jquery-1.4.2.min.js\"></script>\n
		<script type=\"text/javascript\" src=\"".$zoom['config']['js']."plugins/jquery.scrollTo.min.js\"></script>\n
		<script type=\"text/javascript\" src=\"".$zoom['config']['js']."plugins/demo/jquery.form.min.js\"></script>\n
	";
	
	// CSS
	echo '
	<style type="text/css" media="screen"> 
		body {margin:0px; padding:0px; overflow-x:hidden; background-color: #FFFFFF}
		html {margin:0px; padding:0px; overflow-y: scroll; overflow-x: hidden; border: 0; font-family: Tahoma, Arial; font-size: 10pt;}
		form {padding:0px; margin:0px}
		checkbox {padding:0px; margin:0px}
		.batchSelect {font-family: Tahoma, Arial; font-size: 9pt;}
		.opt_0 {background-color: #AEC6E7}
		.opt_1 {background-color: #FEFFBA}
		.opt_2 {background-color: #FFFFE2}
		.opt_3 {background-color: #E2E2E2}
		.opt_4 {background-color: #FFFFFF}
		.batchButton {font-family: Tahoma, Arial; font-size: 9pt;}
		
		.batchMainFrame {margin-top: 20px}
		.mainInnerFrame {margin: 0 auto; width: 1040px; overflow-x: hidden;}
		
		.leftFrameHead {width: 500px; height: 32px; float: left; font-size: 12pt; background-color: #000000;  border-left: 1px solid #454545; border-right: 1px solid #454545; color: #FFFFFF; background-image: url('.$zoom['config']['icon'].'batch_head.png); background-repeat: repeat-x;}
		.leftFrame {width:500px; height: 500px; clear: both; float: left;  overflow-y: scroll; overflow-x:hidden; border-left: 1px solid #454545; border-right: 1px solid #454545; background-color: #F9F9F9;}
		.leftFrameFoot {width: 490px; padding: 5px; clear: both; float: left; background-color: #C2C2C2; border: 1px solid #454545;}
		
		table.leftFrameTable {width: 485px;}
		table.leftFrameTable thead tr th {background-color: #C2C2C2; background-image: url('.$zoom['config']['icon'].'tbl_header.jpg); text-align: left; vertical-align: middle; font-weight: normal; font-family: Tahoma, Arial; font-size: 9pt; border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #FFFFFF; border-top: 1px solid #FFFFFF;}
		table.leftFrameTable tbody tr td {font-size: 8pt; border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #FFFFFF; border-top: 1px solid #FFFFFF; }

		.batchProcessHead {width: 500px; height: 32px; float: left; font-size: 12pt; background-color: #000000;  border-left: 1px solid #454545; border-right: 1px solid #454545; color: #FFFFFF; background-image: url('.$zoom['config']['icon'].'batch_head.png); background-repeat: repeat-x;}
		.batchProgressBar {position: absolute; z-index: 1; width: 0px; height: 32px; background-image: url('.$zoom['config']['icon'].'batch_progressbar.gif); background-position: bottom; background-repeat: repeat-x;}
		.batchProcessText {position: absolute; z-index: 2; margin: 5px;}

		.batchProcess {width: 500px; height: 572px; clear: both; float: left; overflow-y: scroll; overflow-x:hidden; border-left: 1px solid #454545; border-right: 1px solid #454545; border-bottom: 1px solid #454545; background-color: #F9F9F9;}


		table.batchProcessTable {width: 484px; font-size: 8pt;}
		table.batchProcessTable thead tr th {background-color: #C2C2C2; background-image: url('.$zoom['config']['icon'].'tbl_header.jpg); text-align: left; vertical-align: middle; font-weight: normal; font-family: Tahoma, Arial; font-size: 9pt; border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #FFFFFF; border-top: 1px solid #FFFFFF;}
		table.batchProcessTable tbody tr td {text-align: center; border-right: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: 1px solid #FFFFFF; border-top: 1px solid #FFFFFF;}

		.processMsg {min-height: 32px; padding:3px; margin:3px; border: 1px solid #7F7F7F; background-color: #EEEEEE; color: #000000; background-image: url('.$zoom['config']['icon'].'batch_bg.jpg);}
		
		.imgPrevDiv1 {border-left: 1px #9D9D9D solid; border-top: 1px #9D9D9D solid; position: absolute; z-index: 11; background-image: url('.$zoom['config']['icon'].'batch_loader.gif); background-position: center center; background-repeat: no-repeat; background-color: #F1F1F1;}
		.imgPrevDiv {position: absolute; z-index: 10; background-image: url('.$zoom['config']['icon'].'batch_shadow.png); background-position: bottom right; background-repeat: no-repeat;}
	</style>
	';
	
	// Some Javascript
	echo "
	<script type=\"text/javascript\">
		$.zoomBatch = {};
		
		$.zoomBatch.confirmDelete = ".$axZmH->ptj($zoom['batch']['confirmDelete']).";
		$.zoomBatch.allowBatchDelete = ".$axZmH->ptj($zoom['batch']['allowBatchDelete']).";

		$.zoomBatch.selectAllCheckbox = function(formID){
			$('#'+formID + ' input[type=checkbox]').attr({checked: true});
		}

		$.zoomBatch.deselectAllCheckbox = function(formID){
			$('#'+formID + ' input[type=checkbox]').attr({checked: false});
		}
		
		$.zoomBatch.toggleCheckBox = function (id){
			if ( $('#'+id).attr('checked') == true ){
				$('#'+id).attr({checked: false});
			}else{
				$('#'+id).attr({checked: true});
			}
		}
		
		$.zoomBatch.smartSelect = function (){
			$.zoomBatch.deselectAllCheckbox('passFiles');
			var n = m = 0;
			$('#leftFrameTable tbody tr').each(function(){
				var rowHtml = $(this).html();
				m++;
				if (rowHtml.indexOf('".$zoom['batch']['iconNames']['Error']."') > 0){
					var id = $(this).attr('id').split('d').join('');
					$('#f'+id).attr({checked: true});
					n++;
				}
			});
			if (n == 0 && m != 0){
				alert ('Everything has been done already!');
				return false;
			}
			else if (m == 0){
				alert ('No images in this folder or selection!');
				return false;
			}
			else{
				return true;
			}
		}

		$.zoomBatch.checkSelected = function(){
			var n = 0;
			$('#passFiles input[type=checkbox]').each(function(){
				if ($(this).attr('checked') == true){
					n++; return false;
				}
			});
			
			if (n == 0){
				alert ('No images selected!');
				return false;
			}else{
				return true;
			}	
		}
		
		$.zoomBatch.changeDir = function(id){
			$('#dirLoader').css('visibility','visible').fadeTo('fast',1);
			$.ajax({
				url: '".$zoom['batch']['selfFile']."?dirReplace=1&dir='+id,
				timeout: 360000,
				cache: false,
				success: function (data){
					$('#batchOpr').html(data);
				},
				complete: function () {
					$('#dirLoader').fadeTo('fast',0);
				}
			});
		}

		$.zoomBatch.deleteZoom = function(id){
			function delZoomConfirm(id){
				$.ajax({
					url: '".$zoom['batch']['selfFile']."?delPic='+id,
					timeout: 360000,
					cache: false,
					success: function (data){
						$('#batchOpr').html(data);
					},
					complete: function () {
					}
				});			
			}
			
			if ($.zoomBatch.confirmDelete){
				var check = confirm('Do you really want to delete all \\najax-zoom created files for this image?\\n\\nThe image itself will not be deleted!');
				if (check){
					delZoomConfirm(id);
				}						
			}else{
				delZoomConfirm(id);
			}
		}

		$.zoomBatch.batchDelete = function(){
			function delBatchConfirm(){
				$.zoomBatch.ajaxSubmitCustom('passFiles','batchOpr','".$zoom['batch']['selfFile']."?submitDelete=1');
				$('#passFiles input').attr({disabled: true});
				$('#leftFrameFoot input').attr({disabled: true});
				$('#batchProcess').append('<div class=\"processMsg\" id=\"processMsgNotice\">".$zoom['batch']['iconInfo']."Delete process started, please wait!</div>');
			}
			
			if (!$.zoomBatch.checkSelected()){
				return false;
			}
			
			if ($.zoomBatch.confirmDelete){
				var check = confirm('Do you really want to delete all \\najax-zoom created files for the selected images?\\n\\nThe images itself will not be deleted!');
				if (check){
					delBatchConfirm();
				}						
			}else{
				delBatchConfirm();
			}
		}
		
		$.zoomBatch.clearBatchResults = function(){
			$('.processMsg').remove();
			$('table.batchProcessTable tbody tr').remove();			
		}
		
		$.zoomBatch.ajaxSubmitCustom = function (formName, targetDiv, ajaxUrl){
			$('#'+formName).ajaxSubmit ({
				target: '#'+targetDiv,
				url: ajaxUrl,
				type: 'post'
			}); 
			return false; 
		}
		
		$.zoomBatch.batchSubmit = function(){
			if (!$.zoomBatch.checkSelected()){
				return false;
			}
			$.zoomBatch.ajaxSubmitCustom('passFiles','batchOpr','".$zoom['batch']['selfFile']."?submitList=1');
			$('#passFiles input').attr({disabled: true});
			$('#leftFrameFoot input').attr({disabled: true});
			$.zoomBatch.clearBatchResults();
			$('#batchProcess').append('<div class=\"processMsg\" id=\"processMsgNotice\">".$zoom['batch']['iconInfo']." Batch process started, please wait!</div>');
		}
		
		$.zoomBatch.switchBatch = function (what){
			if ( $('#batchSwitch'+what).attr('checked') == true ){
				var act = 'on';
			}else{
				var act = 'off';
			}
			$('#dirLoader').css('visibility','visible').fadeTo('fast',1);
			$('#leftFrameFoot input').attr({disabled: true}); 
			$.ajax({
				url: '".$zoom['batch']['selfFile']."?switchBatch='+what+'_'+act,
				timeout: 10000,
				cache: false,
				success: function (data){
					$('#batchOpr').html(data);
				},
				complete: function () {
					$('#dirLoader').fadeTo('fast',0);
					$('#leftFrameFoot input').attr({disabled: false}); 
				}
			});			
		}
		
		$.zoomBatch.adjHeights = function(time){
			setTimeout(function(){
				var parentDiv = $('#batchMainFrame').parent();
				// Set the following to fit of a height of a certain parent div
				// var windowHeight = parseInt(parentDiv.height());
				var windowHeight = parseInt($(window).height());
				var headerHeight = parseInt($('#batchProcessHead').height());
				var leftFrameFootHeight = parseInt($('#leftFrameFoot').height())+(parseInt($('#leftFrameFoot').css('padding-top'))*2);
				var mainFrameMargin = parseInt($('#batchMainFrame').css('margin-top'));
				$('#batchProcess').animate( {height: (windowHeight-headerHeight-(mainFrameMargin*2)-1)} , time, 'swing');
				$('#batchList').animate( {height: (windowHeight-headerHeight-(mainFrameMargin*2)-leftFrameFootHeight-2)} , time, 'swing');
			},250);
		};
		
		$.zoomBatch.trOver=function(){
			var trColor = {};
			$('#passFiles input[type=checkbox]').each(function(){
				var IDnum = $(this).attr('name').split('f').join('');
				
				if (IDnum){
					trColor[IDnum] = {};
					trColor[IDnum]['bg'] = $('#d'+IDnum).css('backgroundColor');
					trColor[IDnum]['borderTopColor'] = $('#fname'+IDnum).css('borderTopColor');
					trColor[IDnum]['borderRightColor'] = $('#fname'+IDnum).css('borderRightColor');
					trColor[IDnum]['borderBottomColor'] = $('#fname'+IDnum).css('borderBottomColor');
					trColor[IDnum]['borderLeftColor'] = $('#fname'+IDnum).css('borderLeftColor');
					trColor[IDnum]['color'] = $('#fname'+IDnum).css('color');
					
					$('#fname'+IDnum).bind('click', function(){
						$.zoomBatch.toggleCheckBox('f'+IDnum);
					});
					
					$('#fname'+IDnum).bind('mouseover', function(){
						$('#d'+IDnum).css({
							backgroundColor: '#BFC8FF', 
							cursor: 'pointer'
						});
						$('#d'+IDnum+' td').css({
							borderColor: '#BFC8FF',
							color: '#FFFFFF'
						});
					});
					
					$('#fname'+IDnum).bind('mouseout', function(){
						$('#d'+IDnum).css({
							backgroundColor: trColor[IDnum]['bg'], 
							cursor: 'default'
						});
						$('#d'+IDnum+' td').css({
							borderTopColor: trColor[IDnum]['borderTopColor'],
							borderRightColor: trColor[IDnum]['borderRightColor'],
							borderBottomColor: trColor[IDnum]['borderBottomColor'],
							borderLeftColor: trColor[IDnum]['borderLeftColor'],
							color: trColor[IDnum]['color']
						});
					});
				}
				
			}); 
		}
		
		$.zoomBatch.previewPic = function(id, pic, sw, sh){
			var pos = $('#prev' + id).position();
			var windowHeight = parseInt($(window).height());
			var w = ".$zoom['batch']['prevWidth']."; 
			var h = ".$zoom['batch']['prevHeight'].";
			var prc = ((w/sw)>(h/sh)) ? (h/sh) : (w/sw);
			w = Math.round(sw*prc);
			h = Math.round(sh*prc);
			pos.top = ((pos.top+h)>(windowHeight-40)) ? (windowHeight-40-h) : pos.top;
			var overl = '<DIV class=\"imgPrevDiv\" style=\"width: '+(w+20+7)+'px; height: '+(h+20+7)+'px; left: '+(pos.left+40)+'px; top: '+pos.top+'px;\" id=\"prv'+id+'\"><DIV class=\"imgPrevDiv1\" style=\"width: '+(w+20)+'px; height: '+(h+20)+'px;\"><img src=\"".$zoom['batch']['selfFile']."?previewPic='+pic+'\" id=\"prvImg'+id+'\" border=\"0\" style=\"width: auto; height: auto; margin: 10px 0px 0px 10px;\"></DIV></DIV>';
			$('body').append(overl);
			
			$('#prvImg' + id).mouseenter(function(){
				$(this).unbind('mouseenter');
				clearTimeout($.previewPicUnload);
			}).mouseleave(function(){
				$(this).unbind('mouseleave');
				$.previewPicUnload = setTimeout(function(){
					$('#prv' + id).fadeOut(200,function(){
						$('#prv' + id).remove();
					});
				}, 500);
			});
			
			$('#prev' + id).mouseleave(function(){
				$(this).unbind('mouseleave');
				$.previewPicUnload = setTimeout(function(){
					$('#prv' + id).fadeOut(200,function(){
						$('#prv' + id).remove();
					});
				}, 500);	
			});
		}
		
		$(window).load(function(){
			$('#passFiles').ajaxForm();
			
			$('#buttonSelectAll').click(function(){
				$.zoomBatch.selectAllCheckbox('passFiles');
			});
			
			$('#buttonDeselectAll').click(function(){
				$.zoomBatch.deselectAllCheckbox('passFiles');
			});
			
			$('#buttonBatch').click(function(){
				$.zoomBatch.batchSubmit();
			});
			
			if ($.zoomBatch.allowBatchDelete){
				$('#buttonDelete').click(function(){
					$.zoomBatch.batchDelete();
				});				
			}
			
			$('#buttonSmartSelect').click(function(){
				$.zoomBatch.smartSelect();
			});
			
			$.zoomBatch.adjHeights(200);

			$.zoomBatch.trOver();
			
		}).bind('resize', function(){
			$.zoomBatch.adjHeights(200);
		});
	</script>	
	
	</head>
	<body>
	";

		
		// Safe it to session and make available for ajax requests
		$dirTreeOptions = '';
		if (isset($_SESSION['axZmBtch']['dirTreeArray'])){
			if (is_array($_SESSION['axZmBtch']['dirTreeArray']) AND !empty($_SESSION['axZmBtch']['dirTreeArray'])){
				// Generate an option list with all folders
				$dirTreeOptions = $axZmH->directoryOptions((isset($dirTreeArray) ? $dirTreeArray : $_SESSION['axZmBtch']['dirTreeArray']), false );
				$dirTreeOptions = "
					<DIV style='margin: 5px 5px 0px 5px;'>
						<DIV id=\"dirLoader\" style=\"float: left; visibility: hidden; width: 20px; height: 16px; background-image: url(".$zoom['config']['icon']."batch_dir_loader.gif); background-repeat: no-repeat; background-position: bottom right;\"></DIV>
						<DIV style=\"float: right;\">
						<SELECT class=\"batchSelect\" name=\"dir\" onChange=\"$.zoomBatch.changeDir(this.value); this.blur();\">
							$dirTreeOptions
						</SELECT>
						</DIV>
					</DIV>
				";				
			}
		}

		echo "<DIV class=\"batchMainFrame\" id=\"batchMainFrame\">";
			echo "<DIV class=\"mainInnerFrame\">";
				
				echo "<DIV style=\"float:left; width: 410px\">";
					echo "<DIV class=\"leftFrameHead\">$dirTreeOptions</DIV>";
					echo "<FORM id=\"passFiles\" method=\"POST\" action=\"\" onsubmit=\"return false;\">";
						echo "<DIV class=\"leftFrame\" id=\"batchList\">";
						echo $axZmH->batchList($zoom, $pic_list_array, $pic_list_data);
						echo "</DIV>";
					echo "</FORM>";
					
					echo "<DIV class=\"leftFrameFoot\" id=\"leftFrameFoot\">";
						echo "<DIV style=\"border: #FFFFFF 1px solid; background-color: #E2E2E2; padding: 3px; margin-bottom: 3px;\">";
							echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><tr>";
								echo "<td><input type=\"button\" class=\"batchButton\" value=\"Select All\" id=\"buttonSelectAll\" style=\"width: 65px\"></td>";
								echo "<td><input type=\"button\" class=\"batchButton\" value=\"Deselect All\" id=\"buttonDeselectAll\" style=\"width: 79px\"></td>";
								echo "<td><input type=\"button\" class=\"batchButton\" value=\"Smart Select\" style=\"font-weight: bold; color: green;\" id=\"buttonSmartSelect\" style=\"width: 94px\"></td>";
								echo "<td><input type=\"button\" class=\"batchButton\" value=\"Batch Process\" style=\"font-weight: bold;\" id=\"buttonBatch\" style=\"width: 105px\"></td>";
								if ($zoom['batch']['allowBatchDelete'] === true){
									echo "<td><input type=\"button\" class=\"batchButton\" value=\"Delete\" id=\"buttonDelete\" style=\"font-weight: bold; color: red;\" style=\"width: 70px\"></td>";
								}
							echo "</table>";
							
						echo "</DIV>";
						echo "<DIV style=\"border: #FFFFFF 1px solid; background-color: #E2E2E2; padding: 3px;\">";
							foreach ($zoom['batch']['arrayMakeName'] as $k=>$v){
								echo "<input type=\"checkbox\" id=\"batchSwitch$k\" value=\"1\" onClick=\"$.zoomBatch.switchBatch('$k')\" style=\"vertical-align: middle;\"";
								if ($zoom['batch']['arrayMake'][$k]){ echo ' checked';}
								echo "> - $v&nbsp;&nbsp;";
							}
						echo "</DIV>";
					echo "</DIV>";
				
				echo "</DIV>";
				
				echo "<DIV style=\"width: 510px; float: right;\">";
					echo "<DIV class=\"batchProcessHead\" id=\"batchProcessHead\">
						<DIV class=\"batchProgressBar\" id=\"batchProgressBar\"></DIV>
						<DIV class=\"batchProcessText\">Batch process <SPAN id=\"counterDiv\"></SPAN></DIV>
					</DIV>";
					echo "<DIV class=\"batchProcess\" id=\"batchProcess\">";
						
						echo $axZmH->batchProcess($zoom);
						
						echo "<div class=\"processMsg\" id=\"processMsgNotice\">
							".$zoom['batch']['iconInfo']." Please select images out of the left table and press the button \"Batch Process\". 
							Depending on the number of images it can last hours! Processing a single image with 7-15 MP should not last much more, than 10 seconds. 
							Try a couple images first. If you have many images to process check your internet connection and go to bed. 
							Do not close this browser window!!! All images <u>must have</u> unique filenames!
						</div>";
					
					echo "</DIV>";
					echo "<DIV class='batchProcessFoot' id='batchResults'></DIV";
				echo "</DIV>";
				
			echo "</DIV>";
		echo "</DIV>";
	  
		echo "<DIV id='batchOpr'></DIV>";
	echo "</body>
	</html>";
}

?>
