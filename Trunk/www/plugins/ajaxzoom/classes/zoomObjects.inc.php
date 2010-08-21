<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomObjects.inc.php
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

// INTRODUCTION:
// This file is responsible for generating a PHP array with images, that have to be zoomed.
// Basically allow arrays to store structured information in just one variable.
// If you had an opportunity to deal with any programing language you probaly know what it is.
// For more Information about PHP arrays please refere to the manual: http://de.php.net/manual/en/book.array.php


/*****************************************/
/*** STEP 1 - DEFINING THE IMAGE ARRAY ***/
/*****************************************/

// Define new array
// It should be filled with filenames like that: 
// $pic_list_array[zoomID] = imagename;
// e.g. $pic_list_array[1] = picture_a.jpg
// 		$pic_list_array[2] = anotherpicture.jpg
// 		...................................
// The key (zoomID) should be an integer > 0 and does not have to be 1,2,3... it could also be 1254, 5846, 352 - whatever...
$pic_list_array = array();

// $pic_list_data is a "multidimensional" array which contains more information about the source files
// It is needed it STEP 2 or can be incorporated in STEP 1, such as in Example 3
$pic_list_data = array(); 

$zoomTmp = array();

// Now it depends on your system and purpose how to generate $pic_list_array
// Following are couple examples


//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
///// Example 1. Generate an array for zooming picture or  ///////////////////////////////
///// gallery from a specific folder with all images in it ///////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

// In zoomConfig.php in var $zoom['config']['pic'] you should have defined the path for the folder containing the images
// $zoom['config']['picDir'] is composed from base dir: $zoom['config']['fpPP'] and $zoom['config']['pic']
// with this method: $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
// If $zoom['config']['fpPP'] = '/srv/www/htdocs/webXXX' and $zoom['config']['pic']='/images/products/',
// then $zoom['config']['picDir'] = '/srv/www/htdocs/webXXX/images/products/';
// With the method checkSlash the above string is just checked a little (for double slashes, end slash etc.)
// Here is the "last chance" to redefine $zoom['config']['pic'] from the default in the zoomConfig.inc.php
// If you redefine $zoom['config']['pic'] please type after your redefinition
// this line of code again: $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
// By the way: all images must be on the same server. You can not, although technically possible 
// read images over http from a differen system. Also all imeges in one gallery must be in the same directory.


// Example of dynamic generation of directory where images are located, not necessary for all examples!!!
// The parameter passed is zoomDir ($_GET['zoomDir'])
// In this example $zoom['config']['pic'] defined in zoomConfig.inc.php has to be understood at this point as "base folder" with subfolders (just one sublevel)
// $zoom['config']['pic'] AND $zoom['config']['picDir'] are adjusted accordingly to the passed value of zoomDir ($_GET['zoomDir'])
// There is no need to do that if all your original images are located in just one folder, 
// in this case it is enough to set $zoom['config']['pic'] in zoomConfig.inc.php
// Of course you can redefine the folder as you like to suit your needs, just make sure to put this line of code after it:
// $zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');

 
$zoomTmp['folderArray'] = array(); // Create empty array for folders

// Open the "base directory" $zoom['config']['picDir'] and choose only folders in it (GLOB_ONLYDIR)
$n=0; // Start counter
foreach (glob($axZmH->checkSlash($zoom['config']['picDir'],'add').'*', GLOB_ONLYDIR) as $folder){
	$n++; 
	// Fill folder array with subfolder names
	$zoomTmp['folderArray'][$n] = $axZmH->getl('/',$folder);
}

// If $_GET['zoomDir'] is not a number (the key in $zoomTmp['folderArray']),
// try to find the real numeric key and redefine $_GET['zoomDir'] if found
if (isset($_GET['zoomDir'])){
	if (!is_numeric($_GET['zoomDir']) AND !empty($zoomTmp['folderArray'])){
		// if urldecoded string can be found in the above defined array with folders
		if (in_array(urldecode($_GET['zoomDir']),$zoomTmp['folderArray'])){
			$flipedArray = array_flip($zoomTmp['folderArray']);
			$_GET['zoomDir'] = $flipedArray[urldecode($_GET['zoomDir'])];
		}else{
			unset ($_GET['zoomDir']);
		}
	}
}

// Choose the first folder if zoomDir ($_GET['zoomDir']) is not passed or has been unset above
if (!isset($_GET['zoomDir']) AND !empty($zoomTmp['folderArray'])){
	reset($zoomTmp['folderArray']);
	$_GET['zoomDir'] = key($zoomTmp['folderArray']);
}

// Adjust $zoom['config']['pic'] AND $zoom['config']['picDir']
if (isset($_GET['zoomDir'])){
	if (!empty($zoomTmp['folderArray']) AND array_key_exists($_GET['zoomDir'],$zoomTmp['folderArray'])){
		// Redefine base folder
		$zoom['config']['pic'] .= $axZmH->checkSlash($zoomTmp['folderArray'][$_GET['zoomDir']],'add');
		// Redefine server path for the pic directory
		$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
	}
}


// Open the above defined (in zoomConfig.php or here) directory with images
$handle = opendir($zoom['config']['picDir']);

// Loop through each file in $zoom['config']['picDir']
$n=0;
while (false !== ($file = readdir($handle))){ 
	// If filetype is jpg
	if ( strtolower( $axZmH->getl('.',$file) ) == 'jpg' ){
		// Add filename to the pic_list_array with the index $n ($n >= 1)
		$n++; $pic_list_array[$n] = $file;
	}
}
// Close directory
closedir($handle);

// Sort piclist by filename if you want, (not necessary)
$pic_list_array = $axZmH->natIndex($pic_list_array);


////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Example 2 & 3 ///////////////////////////////////////////////////////////////////////////////////////////
// Generating an array from MySQL //////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
// First you need to connect to MySQL database
// Make sure to replace localhost, mysql_user and mysql_password with your settings
$sqlConnect = mysql_connect('localhost', 'mysql_user', 'mysql_password');

// If connection fails trigger an error
if (!$sqlConnect){ die('Could not connect: ' . mysql_error());}

// Select the db name
$dbSelect = mysql_select_db ("your_db_name", $sqlConnect);

// If resorce is not available trigger an error
if (!$dbSelect) { die ('Can not use your_db_name: ' . mysql_error());}
*/  

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Example 2.  //////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Suppose following scenario: you have one relevant mysql table with products, called "products"
// It has this fields: id, title, description, pic1, pic2, pic3 and you want to display all three pictures in the gallery
// The parameter passed over the http query string is probaly something like "pID" (e.g. product.php?pID=12345) or "productID" or just "id"

/*
// If there is a connection to the database
if ($dbSelect){
	// Select picture fields from products table where the id is equals to the relevant parameter (e.g. pID) from http query string
	$row = mysql_fetch_assoc( mysql_query ("SELECT pic1, pic2, pic3 FROM products WHERE id='".(int)$_GET['pID']."' LIMIT 1") );
	
	// Loop through each field starting from 1 ($n=1), increasing $n by one ($n++) till it reaches 3 ($n<=3)  
	for ($n=1; $n<=3; $n++){
		// if there is a filename string in the field
		if ($row['pic'.$n]){
			// add the picture it to the array $pic_list_array
			$pic_list_array[$n] = $row['pic'.$n];
		}
	}
}
*/

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Example 3.  //////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
The above database layout (Example 2.) would allow only a couple pictures to be stored. 
In more advanced CMS there would be a separate table for infinite number of pictures. 
Suppose it is called "images" and has this fields: imgID, imgProdID, imgFileName, imgTitle, imgDescription, [imgOrder]. 
The main relevant parameter passed over http query string as in Example 2. is called "pID" (e.g. product.php?pID=12345)
Since we are only interested in pictures we do not need to join both tables. 
The field imgProdID in images table tells us, that the row belongs to a certain product with this id. 
Anotherwords all rows in "images" table with imgProdID that equals the ID in products table belong to this specific product.
*/

/*
// Select all fields from images table where the "identifier" imgProdID equals the query string parameter pID
// You could also cache the results by adding SQL_CACHE after SELECT (http://dev.mysql.com/doc/refman/4.1/en/query-cache-in-select.html) 
// The example query has no order, so if there is an order field like imgOrder add " ORDER BY imgOrder " to the query
$sql = mysql_query ("SELECT * FROM images WHERE imgProdID='".(int)$_GET['pID']."'");

// We do not know how many pictures there are, it could be 0 or whatever
// So we ask how many result or rows the $sql query has returned
$numRows = mysql_num_rows($sql);

// If we have at least one picture row
if ($numRows > 0){
	$n = 0; // Start counter
	// Loop through each row
	while ($row = mysql_fetch_assoc($sql)){
		
		// now you could add the field imgFileName to the array $pic_list_array
		// CODE: $pic_list_array[$n] = $row['imgFileName'];
		
		// but since images have a unique id (imgID) that can not be zero you could write it instead of the above as following:
		$pic_list_array[$row['imgID']] = $row['imgFileName'];
		
		// Also in this example there are fields with title and description of that specific image
		// $pic_list_data defined in the beginning can contain more information for image gallery
		// So we can write here the following:
		$pic_list_data[$row['imgID']]['thumbDescr'] = $row['imgTitle'];
		$pic_list_data[$row['imgID']]['fullDescr'] = $row['imgDescription'];
	}
}else{
	// do something
}

*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Example 4.  //////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
// You want to show just one image and pass the filename and the path manualy
// $_GET['zoomFile'] is the filename and $_GET['zoomDir'] is the abolute path starting with /
// You should then remove zoomFile from the exclude array of the option $zoom['config']['parToPass'] in zoomConfig.inc.php
// ( $zoom['config']['parToPass'] = $axZmH->zoomServerPar('str',array('zoomID','zoomFile','zoomLoadAjax','loadZoomAjaxSet'),false,$_GET); )

if (isset($_GET['zoomFile']) AND isset($_GET['zoomDir'])){
	// You should check the filename and the path strings for validity at this place, for instance:
	// $_GET['zoomFile'] = preg_replace('/[^0-9a-z\.\_\-]/i','', urldecode($_GET['zoomFile']));
	

	// Set pic_list_array
	$pic_list_array[1] = urldecode($_GET['zoomFile']);
	
	// Set the absolute path option completly overwriting it from  zoomConfig.inc.php
	$zoom['config']['pic'] = $axZmH->checkSlash(urldecode($_GET['zoomDir']),'add');
	
	// Redefine server path for the pic directory
	$zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');

}
*/

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Example 5.  //////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*
// For quick testing you could define the $pic_list_array manually

$pic_list_array[1] = 'some_file1.jpg';
$pic_list_array[2] = 'some_file2.jpg';
$pic_list_array[3] = 'some_file3.jpg';
$pic_list_array[4] = 'some_file4.jpg';
$pic_list_array[5] = 'some_file5.jpg';

*/

/*****************************************************/
/*** STEP 2 - COLLECT INFORMATION ***/
/*****************************************************/

// Loop through the $pic_list_array
// $k is the "zoomID" and $v is the source filename
foreach ($pic_list_array as $k=>$v){
	
	// Store filename under the key 'fileName'
	$pic_list_data[$k]['fileName'] = $v; 

	// We need this information only once at loading process, 
	// not for zooming into an image. AJAX-ZOOM passes the 
	// additional parameter 'str' which means,  
	// that this is a zoom request.
	if (!isset($_GET['str'])){
	
		// Store imagesize under the key 'imgSize' (necessary!!!)
		$pic_list_data[$k]['imgSize'] = 
		getimagesize($zoom['config']['picDir'].$pic_list_array[$k]);

		// Store filesize under the key 'fileSize' (not necessary, just for example)
		$pic_list_data[$k]['fileSize'] = 
		filesize($zoom['config']['picDir'].$pic_list_array[$k]);
		
		/* Under the key 'thumbDescr' you can store any short image information that will be shown under the thumb of image gallery
		This is just an example, if image size is important
		In Example 3. we have already defined thumb description from database field "imgTitle" */
		$pic_list_data[$k]['thumbDescr'] = 
		$pic_list_data[$k]['imgSize'][0].' x '.$pic_list_data[$k]['imgSize'][1];
		
		// Full description
		$pic_list_data[$k]['fullDescr'] = '';
	}
}


// Store information in $zoom['config']
$zoom['config']['pic_list_array'] = $pic_list_array;
$zoom['config']['pic_list_data'] = $pic_list_data;

// Check the existance of the files and generate everything needed on the fly
$proceed = $axZmH->proceedList($zoom, $zoomTmp);
$zoom = $proceed[0]; $zoomTmp = $proceed[1];
$pic_list_array = $zoom['config']['pic_list_array'];
$pic_list_data = $zoom['config']['pic_list_data'];

?>