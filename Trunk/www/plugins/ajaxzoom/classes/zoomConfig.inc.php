<?php
/**
* Plugin: jQuery AJAX-ZOOM, zoomConfig.inc.php
* Copyright: Copyright (c) 2010 Jacobi Vadim
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/


/**
ATTENTION PLEASE !!!!!!
By using GD Library you should be abble to set memory_limit!
Some shared hosts set safe_mode = on, so you can't do it through a php script (on runtime).
The default memory_limit of 8M ("8M" before PHP 5.2.0, "16M" in PHP 5.2.0, "128M" in PHP 5.2.1 and after) 
is defenetly not enough to deal with large images.
Even 16M or some more will not be enough for a 10 MegaPix image or so.
We have achieved quite stable results with demo images by setting memory_limit to 256M !!!
Surely more is better and quicker, especially on larger images.
So if you decide to use this program please check first if safe_mode is turned off, 
[type: echo ini_get('safe_mode'); in some empty php file and call it your browser]
and you are allowed to set the memory_limit to 128M or more! Or memory_limit is alredy set to a higher value
[type: echo ini_get('memory_limit'); to see the value which set in php.ini] 
Otherwise PHP can return errors like:
"Allowed memory size of 8388608 bytes exhausted (tried to allocate 17184 bytes) in [...] on line [...]"

Also there are same cases, where you need max_execution_time prolonged with set_time_limit(int) from default 30 seconds.
This is especially the case by making tiles for an image with over 30 MP or so... In order to use set_time_limit it is also 
required, that the safe_mode is turned off.

Solution for all problems: many providers offer "Virtual Server" at low costs where you can use this script
e.g. in Germany you can rent an appropriate virtual server from 10 EUR per month or even less.
*/

if(!session_id()){session_start();}

unset ($zoom, $zoomTmp); 
$zoom = $zoomTmp = array();

// Set memory limit to whatever you need
ini_set ('memory_limit', '512M');

/////////////////////////////////////////////////////////////////////////
////////////////////////  Start configuration ///////////////////////////
/////////////////////////////////////////////////////////////////////////

// Type in the Licence Key or 'demo'
$zoom['config']['licenceKey'] = 'demo'; // string

// Type of the licence: Partner, Basic, Standard, Business, Corporate or Unlimited, use Basic for demo
$zoom['config']['licenceType'] = 'Basic'; // string

// Version number of this config file
$zoom['config']['version'] = '2.0.0';

// Domain (set it to false in this version)
$zoom['config']['domain'] = false; // string or false

// Fixes some (not all) problematic issues with Internet Explorer
// Set it to true, if your page doctype (the line obove the html tag) is:
// 1. Invalid, like <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
// 2. Not specified at all
// 3. HTML 2.0 - <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
// 4. HTML 3.2 - <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN"> 
// For more information please refere to: http://www.w3.org/QA/2002/04/valid-dtd-list.html
$zoom['config']['quirks'] = false; // boolean

/*
This one is important!
$zoom['config']['parToPass'] are parameters, that will be passed to zoomLoad.php
zoomLoad.php generates the zoomed image. It needs to know, which image has to be cropped.
Along with zoomID, which determins the desired image of the array (see zoomObjects.inc.php),
your parameters can be important in order to generate this specific array of images for the page.
The method zoomServerPar() will take the query string (e.g. productID=12345&catID=123&smthElse=blabla&zoomID=5) 
or an array of key/value type like $_GET, 
exclude the parameter zoomID, zoomFile, zoomLoadAjax and loadZoomAjaxSet from it (in order to not define it twice)
and finaly append the remaining parameters to the query string, that will be passed to zoomLoad.php 
Watch inside axZmH.class.php for detailed description of the method zoomServerPar
You do not have to use this method, as long as the image array determining parameter in zoomObjects.inc.php is passed!
If it is just one, for example productID, then you can write,
$zoom['config']['parToPass'] = 'productID='.(int)$_GET['productID'];
Using the method zoomServerPar make sure to exclude zoomID, zoomFile, zoomLoadAjax and loadZoomAjaxSet to be passed (twice)
*/
$zoom['config']['parToPass'] = $axZmH->zoomServerPar('str',array('zoomID','zoomFile','zoomLoadAjax','loadZoomAjaxSet'),false,$_GET);

/* Each time AJAX-ZOOM requests a portion of an image, it passes (along with the parToPass - see above) 
the query string parameter zoomID to the file zoomLoad.php; 
zoomID serves as identifier to choose the desired image out of the array with images (see defining the images), 
whereas zoomID is the numeric key in this image array.

In some cases it could be not preferable to generate the image array for each zoom request. 
Setting this option to true  will skip the generation of the image array and pass the image filename and it's absolute path instead of zoomID. 
The advantage of enabling this option is a slight speed enhancement, the disadvanage is that anyone could see the location of the original image. 
(The directory with original images can however be .htpasswd protected) 
*/
$zoom['config']['cropNoObj'] = false;

/*
Append visual configuration under the zoom for testing purposes. 
This option is experimental and besides demonstration it is meant to be in the backend of a larger system for dynamic configuration. 
It should be expanded in the feature versions. 
As for now it is a quick & dirty solution to demonstrate some options.
*/
$zoom['config']['visualConf'] = false; // boolen

// Extensions for original images, array with filetypes
// Currently only jpg are supported
// This var is a dummi for future versions
$zoom['config']['pic_ext_allow'] = array('jpg'); // array

// Max dimensions for initial images
// Initial images are images, that are displayed first
// [int max width]x[int max height], e.g. 420x280, 480x320, 480x360, 600x400, 480x720, 480x480, 600x600, 780x520, 800x600
// $zoom['config']['posRes']=array(1=>'420x280',2=>'420x630',3=>'480x360', 4=>'480x320', 5=>'480x480', 6=>'480x720', 7=>'600x400', 8=>'600x600', 9=>'780x520', 10=>'800x600');
$zoom['config']['picDim'] = "600x400"; // string

// Keep stage dimensions as $zoom['config']['picDim']
// Note that if you use gallery or load pictures otherwise via javascript, you should set both to true!
$zoom['config']['keepBoxW'] = true; // boolean; true - if you want to keep max width for the layout.
$zoom['config']['keepBoxH'] = true; // boolean; true - if you want to keep max height for the layout.

// The viewpoint (viewport) when the user clicks or scrolls into the image
$zoom['config']['gravity'] = 'viewPoint'; // string, , possible values: 'viewPoint' or 'center'

// What happens if the user clicks somewhere on max zoom (100%)
// "center" will move the clicked point to the center
// "adverse" will flip the clicked point to the other side
// just change the setting to sea the difference, both make sense
$zoom['config']['traveseGravity'] = 'center'; // string, possible values: 'adverse' or 'center'

// Use Imagemagick to crop images, make intitial images and thumbs
// If set to false, GD will be used, else ImageMagick
$zoom['config']['im'] = false; // boolean

// Only for ImageMagick: limit memory and other settings
// By default they are set to a very high value and automatically adjusted to abailable system resources
// http://www.imagemagick.org/script/command-line-options.php#limit
$zoom['config']['imLimit']['memory'] = false; // false or integer (MB)
$zoom['config']['imLimit']['map'] = false; // false or integer (MB)
$zoom['config']['imLimit']['area'] = false; // false or integer (MB)
$zoom['config']['imLimit']['disk'] = false; // false or integer (MB)
$zoom['config']['imLimit']['threads'] = false; // false or integer (number of threads of execution)
$zoom['config']['imLimit']['time'] = false; // false or integer (maximum elapsed time in seconds)

 
// Server path to imagemagick convert ver. 6+, if you have one... like "/usr/bin/convert"
// You do not need to use imageMagick, it is optional!
$zoom['config']['imPath'] = '/usr/local/bin/convert'; 
 
// Output JPG quality for zoomed images, 80 is ok
// More is better quality, but bigger filesize
$zoom['config']['qual'] = 80; // int, max 100

// Alternatively you can set a quality range depending on users internet connection.
// However the speed is measured on the fly with images, that are downloaded anyway.
// So the measured speed can be regarded as rough orientation and is mostly below the actual internet connection.
// Also a slow client or webserver performance can lead to decreased measurements.

$zoom['config']['qualRange'][1] = false; // low range jpg quallity, integer, < 100, e.g. 50
$zoom['config']['qualRange'][2] = false; // upper range jpg quallity, integer, max. 100, e.g. 90
$zoom['config']['qualRange'][3] = false; // low range kbit/s, integer, e.g. 128
$zoom['config']['qualRange'][4] = false; // upper range kbit/s, integer, e.g. 768


// Output JPG quality for initial images
$zoom['config']['initPicQual'] = 90; // int, max 100

///////////////////////////////////////////////
/// Major directories and filenames////////////
///////////////////////////////////////////////

// Full server path to base dir, e.g. /srv/www/htdocs/webXXX
// Usually it is $_SERVER['DOCUMENT_ROOT']; without slash at the end !!!
$zoom['config']['fpPP'] = $_SERVER['DOCUMENT_ROOT']; // string

// Filenames, absolute path
$zoom['config']['zoomLoadFile'] = '/axZm/zoomLoad.php';
$zoom['config']['zoomLoadSess'] = '/axZm/zoomSess.php';

// Folder where icons are located, absolute path
// With a slash at the end!
// This folder should not be password protected!
$zoom['config']['icon'] = "/axZm/icons/"; // string

// Folder where javascript files are located
// With a slash at the end!
// This folder should not be password protected!
$zoom['config']['js'] = "/axZm/"; // string

/* 
Dynamic load of all necessary jquery plugins and css files
After a check weather plugins have aleredy been loaded the js and css files are loaded instantly on start
If true there is no need to use the php class method drawZoomStyle and drawZoomJs,
just include:

<link rel="stylesheet" href="/axZm/axZm.css" type="text/css">
<script type="text/javascript" src="/axZm/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/axZm/jquery.axZm.js"></script>

into the head section of your html
*/

$zoom['config']['jsDynLoad'] = true; // bool

// If jsMin is true the minified versions of the plugins will be loaded
$zoom['config']['jsMin'] = true; // bool

// Fonts directory, all font have to be in the same directory
$zoom['config']['fontPath'] = '/axZm/fonts/'; 

// Folder where original images are located
// Overwrite this value by your script if you use different folders each time.
// Also update $zoom['config']['picDir']: 
// $zoom['config']['picDir'] = $axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
// This folder can be in a http password protected directory!
// Please make sure, that PHP can open the files (chmod)
// With a slash at the end!
$zoom['config']['pic'] = "/pic/zoom/"; // string

// Folder where initial images will be written
// They will be named as pictureFileName+'_'+$zoom['config']['picDim']+'.jpg'
// This folder should not be password protected!
// With a slash at the end!
$zoom['config']['thumbs'] = "/pic/zoomthumb/"; // string

// Folder where to write temporary zoomed images
// This folder should not be password protected!
// With a slash at the end!
$zoom['config']['temp'] = "/pic/temp/"; // string


// Folder where to write the thumbs for gallery images
// They will be named as pictureFileName+'_'+$zoom['config']['galleryPicDim']+'.jpg'
// or 					 pictureFileName+'_'+$zoom['config']['galleryFullPicDim']+'.jpg' if they differ in size
$zoom['config']['gallery'] = "/pic/zoomgallery/"; // string

///////////////////////////////////////////////
//////////////////// MAP //////////////////////
///////////////////////////////////////////////

// "Image map" is a small image, where the user can navigate if the image is zoomed.

// Use image map or not, geneneral switch
$zoom['config']['useMap'] = true; // boolean

// Map draggable or not
$zoom['config']['dragMap'] = true; // boolean

// Drag handle height if map $zoom['config']['dragMap'] is set to true
// css class: .zoomMapHandle
$zoom['config']['mapHolderHeight'] = 12; // integer (px)

// Text on handle
$zoom['config']['mapHolderText'] = 'Zoom Map'; // string (px)

// Opacity while draging
$zoom['config']['zoomMapDragOpacity'] = 0.7; // float [0.0 - 1.0]

// Opacity of the selector, css: .zoomMapSelArea for color
$zoom['config']['zoomMapSelOpacity'] = 0.25; // float [0.0 - 1.0]

// Constrain draging image map within a certain div or element
// false or 'parent', 'window' or other div id starting with # (eg. '#zoomAll')
$zoom['config']['zoomMapContainment'] = 'window'; // string or false

// Animate map while switching
$zoom['config']['zoomMapAnimate'] = false;

// Autohide image map if image is not zoomed
// Map will appear after the user zoomes into an image
// Use false for autohide, true for map visible from the beginning
$zoom['config']['zoomMapVis'] = true; // boolean

// Image map size in percentage of $zoom['config']['picDim'] width
// If you choose fraction bigger than 40% consider placing zoomMapHolder div not above the actual zooming picture
// In this case adjust layout in function drawZoomBox() of class axZmH in axZmH.class.php
// Also set in case of placing the map outside the actual zooming picture: 
// 1. $zoom['config']['zoomMapVis']=true, 
// 2. $zoom['config']['zoomMapAnimate']=false, 
// 3. $zoom['config']['dragMap']=false
// 4. $zoom['config']['zoomMapContainment']=false

// %, 1 = 100%, 0.2=20% Dimensions for picture Map
$zoom['config']['mapFract'] = 0.25; // float [0.0 - 1.0]

// Show button for switching image map on and off
$zoom['config']['mapButton'] = true; // boolean

// Border width
$zoom['config']['mapBorder']['top'] = 0; // int (px)
$zoom['config']['mapBorder']['right'] = 1; // int (px)
$zoom['config']['mapBorder']['bottom'] = 1; // int (px)
$zoom['config']['mapBorder']['left'] = 0; // int (px)

// Restore speed of the image (and map) if the image is zoomed and the image is changed over gallery
$zoom['config']['zoomMapSwitchSpeed'] = 1000; // int, ms

// Restore position of the map on window resize
$zoom['config']['zoomMapRest'] = true; // boolean

// Position of the map, not implemented yet!
$zoom['config']['mapPos'] = 'topLeft'; // topLeft, topRight, bottomLeft, bottomRight, 

// Smooth the flow of zoom while dragging the selector inside the map.
$zoom['config']['mapSelSmoothDrag'] = true; // boolean

// Smoothness speed of map selector dragging
$zoom['config']['mapSelSmoothDragSpeed'] = 1000; // integer (ms)

// Time, after which the image loads instantly if the user stucks at one point while dragging the map selector
$zoom['config']['mapSelZoomSpeed'] = 400; // integer (ms) or false (switch off)

///////////////////////////////////////////////
/////////// Description area //////////////////
///////////////////////////////////////////////

// Instead of using tooltips information will be shown in this description area
// css: .zoomDescr

// Description for navigation buttons on mouseover
$zoom['config']['zoomShowButtonDescr'] = true; //  boolen

// Description area transparency
$zoom['config']['descrAreaTransp'] = 0.50; // float [0.0 - 1.0]

// Showing animation time
$zoom['config']['descrAreaShowTime'] = 200; // integer (ms)

// Hiding animation time
$zoom['config']['descrAreaHideTime'] = 200; // integer (ms)

// Time after the description hides, if mouse is not over an object any more
$zoom['config']['descrAreaHideTimeOut'] = 750; // integer (ms)

// Time after the description shows up, if mouse over an object
$zoom['config']['descrAreaShowTimeOut'] = 500;

// Description area minimal! height in px
// Settung this value to a small integer like 0, 2, or 5 will produce nice animation
// The final height depends on content length and is determined automatically.
$zoom['config']['descrAreaHeight'] = 0; // integer (px)

// Description motion
$zoom['config']['descrAreaMotion'] = 'swing'; // integer (px)


//////////////////////////////////////////////////////
//////////////////  Gallery all //////////////////////
//////////////////////////////////////////////////////

/**
There are three types of galleries you can choose from: vertical, horizontal and inline.
Each of this three types has it's own settings. You can use all three types at the same time, if it does make sense to your application.
*/

// JPG quality for gallery thumbs
$zoom['config']['galleryPicQual'] = 90; // integer, max 100

// Display modal dialog (only once) if thumbs have been generated by PHP
$zoom['config']['galleryDialog'] = true; // boolean

// Fadeout speed in ms for previous image, e.g. 300
$zoom['config']['galleryFadeOutSpeed'] = 300; // int (ms)

// Fadein speed of new image
$zoom['config']['galleryFadeInSpeed'] = 300; // int (ms)

// Fadein animation motion
$zoom['config']['galleryFadeInMotion'] = 'easeOutCirc'; // string

// Fadein starting opacity
$zoom['config']['galleryFadeInOpacity'] = 0; // float <=1

// Fadein starting size multiplier, 
// e.g. 1 - no change, 0.5 - twice as small as original, 2 - twice bigger than original
// This option gives a nice zoom in or zoom out effect during switching
$zoom['config']['galleryFadeInSize'] = 1.2; // float > 0

// Fadein starting animation position, possible values: 'Center', 'Top',' Right', 'Bottom', 'Left', 'StretchVert', 'StretchHorz'
$zoom['config']['galleryFadeInAnm'] = 'Center'; // String

// "Innerfade" between pictures during switching
// Overrides galleryFadeOutSpeed and galleryFadeInSpeed during switching
// $zoom['config']['galleryFadeInSpeed'] still valid for first loading image in the gallery
// Set to false to disable innerfade
$zoom['config']['galleryInnerFade'] = 1000; // mixed int (ms) or false

/*
"Innerfade" or "Crossfade" between images looks nice, 
if images are equal in size or have the same background matching with the stage color.  
Fading a smaller image over a bigger one with different backgrounds does not look nice at all.
Enabling this option will "crop" the previous image to the size of the fading in new image, so it looks nice :-)
This option sets the speed in ms of the "shutter" that will be pushed from the sides or top and bottom of the image. 
For disabling this option set it to false.
*/
$zoom['config']['galleryInnerFadeCut'] = 300; // true, false or int > 0(ms) for speed

// Motion type of the above
$zoom['config']['galleryInnerFadeMotion'] = 'swing';


// Scrollbar replacement - ScrollPane (jScrollPane.js) for inline and vertical galleries
$zoom['config']['scrollPane'] = true; // boolean

// Mouseover animation parameters between different colors of the gallery thumbs
// css .zoomGalleryBox to .zoomGalleryBoxOver AND .zoomFullGalleryBox to .zoomFullGalleryBoxOver

// Fade animation between the to css classes for the gallery thumbs general switch
$zoom['config']['galleryThumbFadeOn'] = true;

// Speed of animation mouseover and mouseout if $zoom['config']['galleryThumbFadeOn'] = true
$zoom['config']['galleryThumbOverSpeed'] = 150; // int [ms] > 0
$zoom['config']['galleryThumbOutSpeed'] = 1250; // int [ms] > 0

// Opacity animation mouseover and mouseout (only vertival and horizontal gallery!)
// Set both parameters to 1 in order to disable if $zoom['config']['galleryThumbFadeOn'] = true
$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1





//////////////////////////////////////////////////////
///////////// Horizontal Gallery /////////////////////
//////////////////////////////////////////////////////

// Horizontal gallery general switch
$zoom['config']['useHorGallery'] = false; // boolean

// $zoom['config']['galHorPicX'], $zoom['config']['galHorPicY']
// Thumb size in horizontal gallery
$zoom['config']['galleryHorPicDim'] = '70x70'; // string

/* Position of the horizontal gallery
// top2: above the zoom image
// bottom1: before navigation and after zoom image
// bottom2: after navigation and after zoom image
top1 - above the image, above navigation
top2 - above the image, under navigation
bottom1 - under the image, above navigation
bottom2 - under the image, under navigation
*/

$zoom['config']['galHorPosition'] = 'bottom1'; // string (top1, top2, bottom1, bottom2)

// Height of the gallery container
$zoom['config']['galHorHeight'] = 94; // integer (px) //94

// Top margin thumbs
$zoom['config']['galHorCssMarginTop'] = 6; // integer (px)

// Distance between thumb "frames" (css: .zoomHorGalleryBox, .zoomHorGalleryBoxSelected, .zoomHorGalleryBoxOver)
$zoom['config']['galHorCssMarginBetween'] = 6; // integer (px)

// Margins gallery container
$zoom['config']['galHorMarginTop'] = 0; // integer (px)
$zoom['config']['galHorMarginBottom'] = 5; // integer (px)

// "Flow" scroll. Scrolling happens depending on mouse position within the container
$zoom['config']['galHorFlow'] = false;

// Arrows (left and right) as horizontal scroll navigation
$zoom['config']['galHorArrows'] = true;

// Mousewheel scrolling support
$zoom['config']['galHorMouse'] = true;

// Width of the arrow images of horizontal scroll navigation
$zoom['config']['galHorArrowWidth'] = 35; // integer (px)

// Space between the thumb and outer frame (css: .zoomHorGalleryImg)
$zoom['config']['galHorCssPadding'] = 4; // integer (px)

// Border width outer frame (css: .zoomHorGalleryBox, .zoomHorGalleryBoxSelected, .zoomHorGalleryBoxOver)
$zoom['config']['galHorCssBorderWidth'] = 1; // integer (px)

// Height of description under the thumb (css: .zoomGalleryDescr)
$zoom['config']['galHorCssDescrHeight'] = 0; // integer (px)

// Padding of the description div (css: .zoomHorGalleryDescr)
$zoom['config']['galHorCssDescrPadding'] = 2; // integer (px)

// Scroll gallery after click to the point, where the clicked image thumb is left or middle in the visible area
$zoom['config']['galHorScrollPos'] = 'center'; // string (left, center)

// Scroll to the first loaded image thumb on the beginning
$zoom['config']['galHorScrollToCurrent'] = true;

// Possible motions types: 
// 'swing', 'linear', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 
// 'easeOutQuart','easeInOutQuart', 'easeInQuint','easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 
// 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic',
// 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'

// Motion type for scroll
$zoom['config']['galHorScrollMotion'] = 'easeOutSine';

// Scroll speed
$zoom['config']['galHorScrollSpeed'] = 1000;

// Scroll by number of thumbs
$zoom['config']['galHorScrollBy'] = 3;

// Inner rounded corners
$zoom['config']['galHorInnerCorner'] = true;
$zoom['config']['galHorInnerCornerImage'] = 'inner_corner_black_5.png';
$zoom['config']['galHorInnerCornerWidth'] = 5; // interger px




//////////////////////////////////////////////////////
///////////// Vertical Gallery ///////////////////////
//////////////////////////////////////////////////////

// Use vertical gallery general switch
// Image thums will be generated instantly on first call
// If true, image thums will be generated
$zoom['config']['useGallery'] = true; // boolean

// Vertical gallery thumbs size 
// Keep it, even if you do not use gallery ... e.g. 70x70, 100x100, 120x120, 150x150
$zoom['config']['galleryPicDim'] = '100x100'; // string

// Gallery position
$zoom['config']['galleryPos'] = 'right'; // string (left, right)

// Number of columns vertical gallery
// limited by users resolution and your layout
$zoom['config']['galleryLines'] = 1; // integer

// Margin in px to the right from thumbs in vertical gallery (space for scrolling bar)
// If something should not fit increase or decrease this value
$zoom['config']['galleryScrollbarWidth'] = 15; // integer (px)

// Mousewheel speed
$zoom['config']['galleryWheelSpeed'] = 35; // integer (px)

// Scroll gallery to the point, where the clicked image thumb is on top of visible area
$zoom['config']['galleryScrollTop'] = true;

// Scroll to the loaded image thumb on the beginning
$zoom['config']['galleryScrollToCurrent'] = true;

// Margin to the zooming image only if $zoom['config']['galleryPos'] = 'right';
$zoom['config']['galleryMarginLeft'] = 5; // integer (px)

// Thumbs Css: [.zoomGalleryBox, .zoomGalleryBoxSelected], .zoomGalleryBoxOver, .zoomGalleryImg, .zoomGalleryDescr
// Please do not use any width, margin or padding properties for this css in stylesheet file

// Space between the thumb and outer frame (css: .zoomGalleryImg)
$zoom['config']['galleryCssPadding'] = 8; // integer (px)

// Border width of the outer thumb frame in px (css: .zoomGalleryBox, .zoomGalleryBoxSelected, .zoomGalleryBoxOver)
$zoom['config']['galleryCssBorderWidth'] = 1; // integer (px)

// Height of description under the thumb (css: .zoomGalleryDescr)
$zoom['config']['galleryCssDescrHeight'] = 12; // integer (px)

// Padding within the description div (css: .zoomGalleryDescr)
$zoom['config']['galleryCssDescrPadding'] = 2; // integer (px)

// Distance between thumb "frames" (css: .zoomGalleryBox, .zoomGalleryBoxSelected, .zoomGalleryBoxOver)
$zoom['config']['galleryCssMargin'] = 6; // integer (px)




//////////////////////////////////////////////////////
///////////// Inline Gallery /////////////////////////
//////////////////////////////////////////////////////

// "Inline Gallery" is shown by clicking an a button in navigation
// Can also be used in combination with vertical gallery if you want
// If true, image thums will be generated
$zoom['config']['useFullGallery'] = true; // boolean

// Gallery Thumbs size for "Inline Gallery", 
// Adjust css classes accordingly: 
// .zoomFullGalleryBox, .zoomFullGalleryBoxOver, .zoomFullGalleryBoxSelected, .zoomFullGalleryDescr
$zoom['config']['galleryFullPicDim'] = "70x70"; // string

// "Inline Gallery" Button
$zoom['config']['galFullButton'] = true; // boolean

// If set to true it will be scrolled to the current selected image
$zoom['config']['galFullScrollCurrent'] = true; // boolean

// Mousewheel speed for scrolling
$zoom['config']['galFullWheelSpeed'] = 20; // integer (px)

// Autostart and autoshow "Inline Gallery" after initialization of AJAX-ZOOM.
$zoom['config']['galFullAutoStart'] = false; // boolean

// Description tooltip for "Inline Gallery" general switch
$zoom['config']['galFullTooltip'] = true; // boolean

// Tooltip offset from the thumb in px
$zoom['config']['galFullTooltipOffset'] = 5; // integer (px)

// Tooltip fadein speed in ms OR 'fast','slow','medium'
$zoom['config']['galFullTooltipSpeed'] = 'fast'; // integer (ms) / string 

// Tooltip transparency
$zoom['config']['galFullTooltipTransp'] = 0.93; // float [0.0 - 1.0]

// Thumbs Css: [.zoomFullGalleryBox, .zoomFullGalleryBoxSelected], .zoomFullGalleryBoxOver, .zoomFullGalleryImg, .zoomFullGalleryDescr
// Please do not use any width, margin or padding properties for this css in stylesheet file

// Space between the thumb and outer frame (css: zoomFullGalleryImg)
$zoom['config']['galFullCssPadding'] = 5; // integer (px)

// Border width outer frame (css: .zoomGalleryBox, .zoomFullGalleryBoxSelected, .zoomFullGalleryBoxOver)
$zoom['config']['galFullCssBorderWidth'] = 1; // integer (px)

// Height of description under the thumb (css: .zoomFullGalleryDescr)
$zoom['config']['galFullCssDescrHeight'] = 10; // integer (px)

// Padding within the description (css: .zoomFullGalleryDescr)
$zoom['config']['galFullCssDescrPadding'] = 2; // integer (px)

// Distance between thumb frames (css: .zoomFullGalleryBox, .zoomFullGalleryBoxSelected, .zoomFullGalleryBoxOver)
$zoom['config']['galFullCssMargin'] = 5; // integer (px)




//////////////////////////////////////////////////////
///////////// Gallery Navigation /////////////////////
//////////////////////////////////////////////////////

// Prev, Next buttons for the gallery general switch
$zoom['config']['galleryNavi'] = true; // boolean

// Prev, Next buttons position
// Top and bottom refere to vertical gallery
$zoom['config']['galleryNaviPos'] = 'bottom'; // string [top, bottom, navi]

// Prev, Next circular
$zoom['config']['galleryNaviCirc'] = true;  // boolean

// Prev, Next buttons container margin.
$zoom['config']['galleryNaviMargin'] = array(2, 25, 5, 0); // array (top, right, bottom, left) px

// Space between buttons
$zoom['config']['galleryButtonSpace'] = 5;

// Play, pause button
$zoom['config']['galleryPlayButton'] = true; // boolean

// Autoplay on start
$zoom['config']['galleryAutoPlay'] = false; // boolean

// Interval for diashow
$zoom['config']['galleryPlayInterval'] = 3500; // int (ms)



///////////////////////////////////////////////
//////////// Zoom Navigation //////////////////
///////////////////////////////////////////////

// Navi position
$zoom['config']['naviPos'] = 'bottom'; // string (bottom, top)

// Navi gravity
$zoom['config']['naviFloat'] = 'right'; // string (left, right)

// Height of navigation container in px (where buttnos are located)
// Do not configure this value it in css file!
$zoom['config']['naviHeight'] = 48; // integer (px)

// Space between buttons of one group
$zoom['config']['naviSpace'] = 5; // integer (px)

// Space between groups of buttons
$zoom['config']['naviGroupSpace'] = 15; // integer (px)

// Minimal padding left and right
$zoom['config']['naviMinPadding'] = 5; // integer (px)

// Top margin of navigation
$zoom['config']['naviTopMargin'] = 2; // integer (px)

// Big buttons for zoomIn, Out
$zoom['config']['naviBigZoom'] = true;

// Display zoom in and zoom out buttons
$zoom['config']['naviZoomBut'] = true; // boolean 

// Display pan button set (the left, top, right and bottom arrows)
$zoom['config']['naviPanBut'] = true; // boolean

// Diplay the zoom level and optionally: time needed to generate the zoomed picture, traffic 
// CSS: zoomLogHolder, zoomLog
$zoom['config']['zoomLogInfo'] = true; // boolean 

// Diplay only zoom level, if true - disable $zoom['config']['zoomLogInfo'] above
// CSS: zoomLogHolder, zoomLogJustLevel
$zoom['config']['zoomLogJustLevel'] = false; // boolean 

// Opacity for deaktivated bottons
$zoom['config']['deaktTransp'] = 0.5; // float [0.0 - 1.0]

// Language vars for the above info
$zoom['config']['zoomLogLevel'] = "Zoom Level:"; // string
$zoom['config']['zoomLogTime'] = "Zoom Time:"; // string
$zoom['config']['zoomLogTraffic'] = "Zoom Traffic:"; // string
$zoom['config']['zoomLogSeconds'] = "seconds"; // string
$zoom['config']['zoomLogLoading'] = "Loading..."; // string


///////////////////////////////////////////////
///////// Help button and content /////////////
///////////////////////////////////////////////

// Help (Info) button general switch
$zoom['config']['help'] = true; // boolean

// Opacity of Help (Info) container
$zoom['config']['helpTransp'] = 0.95; // float [0.0 - 1.0]

// Help (Info) container transition time
$zoom['config']['helpTime'] = 300; // integer (ms)

// Margin of help container within the stage
$zoom['config']['helpMargin'] = 20; // integer (px >= 0);

/*
This is a html wich is shown on clicking the info button
Write whatever you want in it. 
Feel free to generate this var dynamically with PHP or Javascript
Javascript: $('#zoomedHelp').html('Your content goes hier');
PHP: $zoom['config']['helpTxt'] = $yourContentVar;
*/
$zoom['config']['helpTxt'] = '
<DIV style="float: left; margin: 5px;">
	<DIV style="float: right; margin: 0px 0px 5px 5px; width: 139px"><img src="'.$zoom['config']['icon'].'mouse_icon.png" width="139" height="117"></DIV>
	<DIV style="float: left">
		<DIV style="font-size: 125%; margin-bottom: 3px;">Navigation Help</DIV>
		<DIV><ul style="margin-bottom: 3px"><li>Left mouse click zooms in</li><li>Right mouse click zooms out</li><li>Shift + left mouse click zooms out</li><li>Mousewheel zooms in and out</li></ul></DIV>
		<DIV>
		<table cellspacing="5" cellpadding="0" border="0"><tbody>
			<tr><tr><td valign="top"><img title="" height="30" alt="" src="'.$zoom['config']['icon'].'mouse_sel.jpg" width="30"></td>
			<td valign="top">Tool selection: select area for zoom in</td></tr>
			<tr><td valign="top"><img title="" height="30" alt="" src="'.$zoom['config']['icon'].'mouse_move.jpg" width="30"></td>
			<td valign="top">Tool selection: pan within the zoomified image. </td></tr>
		</tbody></table>
		</DIV>
	</DIV>
	<DIV style="float: left">
		<DIV style="font-size: 125%; margin-bottom: 3px;">Browser Compatibility</DIV>
		<table cellspacing="5" cellpadding="0" border="0"><tbody><tr>
		<td><img title="" height="32" width="32" alt="" src="'.$zoom['config']['icon'].'browser_ie.png"></td><td valign="middle">6.0+</td>
		<td><img title="" height="32" width="32" alt="" src="'.$zoom['config']['icon'].'browser_firefox.png"></td><td valign="middle">2.0+</td>
		<td><img title="" height="32" width="32" alt="" src="'.$zoom['config']['icon'].'browser_safari.png"></td><td valign="middle">1.0+</td>
		<td><img title="" height="32" width="32" alt="" src="'.$zoom['config']['icon'].'browser_chrome.png"></td><td valign="middle">1.0+</td>
		<td><img title="" height="32" width="32" alt="" src="'.$zoom['config']['icon'].'browser_opera.png"></td><td valign="middle">9.5+</td>
		</tr></tbody></table>
	</DIV>
</DIV>
'; // string


// Instead of $zoom['config']['helpTxt']
// you can load an external url into the help (iframe)
$zoom['config']['helpUrl'] = false; // string


// Folder under the icons directory ($zoom['config']['icon']), where buttons are located
$zoom['config']['buttonSet'] = "default"; // string

///////////////////////////////////////////////
/////////////////// Buttons  //////////////////
///////////////////////////////////////////////
// Three state filename, filename + _over (mouseover), filename + _down (mousedown), [filename + _switched (aktive)]
$zoom['config']['icons']['pan'] = array('file'=>'zoombutton_move', 'ext'=>'jpg', 'w'=>31, 'h'=>31); // also _switched
$zoom['config']['icons']['crop'] = array('file'=>'zoombutton_crop', 'ext'=>'jpg', 'w'=>31, 'h'=>31); // also _switched

$zoom['config']['icons']['zoomIn'] = array('file'=>'zoombutton_plus', 'ext'=>'jpg', 'w'=>21, 'h'=>18);
$zoom['config']['icons']['zoomOut'] = array('file'=>'zoombutton_minus', 'ext'=>'jpg', 'w'=>21, 'h'=>18);
$zoom['config']['icons']['zoomInBig'] = array('file'=>'zoombutton_in', 'ext'=>'jpg', 'w'=>31, 'h'=>31);
$zoom['config']['icons']['zoomOutBig'] = array('file'=>'zoombutton_out', 'ext'=>'jpg', 'w'=>31, 'h'=>31);

$zoom['config']['icons']['moveTop'] = array('file'=>'zoombutton_mt', 'ext'=>'jpg', 'w'=>21, 'h'=>18);
$zoom['config']['icons']['moveRight'] = array('file'=>'zoombutton_mr', 'ext'=>'jpg', 'w'=>21, 'h'=>18);
$zoom['config']['icons']['moveBottom'] = array('file'=>'zoombutton_mb', 'ext'=>'jpg', 'w'=>21, 'h'=>18);
$zoom['config']['icons']['moveLeft'] = array('file'=>'zoombutton_ml', 'ext'=>'jpg', 'w'=>21, 'h'=>18);

$zoom['config']['icons']['reset'] = array('file'=>'zoombutton_100', 'ext'=>'jpg', 'w'=>31, 'h'=>31);

$zoom['config']['icons']['gallery'] = array('file'=>'zoombutton_gal', 'ext'=>'jpg', 'w'=>31, 'h'=>31);
$zoom['config']['icons']['map'] = array('file'=>'zoombutton_map', 'ext'=>'jpg', 'w'=>31, 'h'=>31); // also _switched, _on, _off
$zoom['config']['icons']['close'] = array('file'=>'zoombutton_close', 'ext'=>'jpg', 'w'=>13, 'h'=>10);
$zoom['config']['icons']['help'] = array('file'=>'zoombutton_help', 'ext'=>'jpg', 'w'=>31, 'h'=>31);

$zoom['config']['icons']['next'] = array('file'=>'zoombutton_next', 'ext'=>'jpg', 'w'=>31, 'h'=>31);
$zoom['config']['icons']['prev'] = array('file'=>'zoombutton_prev', 'ext'=>'jpg', 'w'=>31, 'h'=>31);
$zoom['config']['icons']['play'] = array('file'=>'zoombutton_play', 'ext'=>'jpg', 'w'=>31, 'h'=>31);
$zoom['config']['icons']['pause'] = array('file'=>'zoombutton_pause', 'ext'=>'jpg', 'w'=>31, 'h'=>31);

$zoom['config']['icons']['arrowLeft'] = array('file'=>'zoombutton_arrow_left', 'ext'=>'jpg', 'w'=>31, 'h'=>94);
$zoom['config']['icons']['arrowRight'] = array('file'=>'zoombutton_arrow_right', 'ext'=>'jpg', 'w'=>31, 'h'=>94);


///////////////////////////////////////////////
///////////// Buttons titles //////////////////
///////////////////////////////////////////////

// Write whatever you want or replace values with language varibales ;-)
// If $zoom['config']['zoomShowButtonDescr'] set to true this values will be showed in Description area
$zoom['config']['mapButTitle']['pan'] = "Pan"; // string
$zoom['config']['mapButTitle']['crop'] = "Draw zoom rectangle"; // string

$zoom['config']['mapButTitle']['zoomIn'] = "Zoom in"; // string
$zoom['config']['mapButTitle']['zoomOut'] = "Zoom out"; // string
$zoom['config']['mapButTitle']['zoomInBig'] = "Zoom in"; // string
$zoom['config']['mapButTitle']['zoomOutBig'] = "Zoom out"; // string

$zoom['config']['mapButTitle']['moveTop'] = "Move up"; // string
$zoom['config']['mapButTitle']['moveRight'] = "Move to the right"; // string
$zoom['config']['mapButTitle']['moveBottom'] = "Move down"; // string
$zoom['config']['mapButTitle']['moveLeft'] = "Move to the left"; // string

$zoom['config']['mapButTitle']['reset'] = "Reset to initial size"; // string

$zoom['config']['mapButTitle']['gallery'] = "Display gallery"; // string
$zoom['config']['mapButTitle']['map'] = "Show / hide map"; // string
$zoom['config']['mapButTitle']['close'] = "Close map"; // string
$zoom['config']['mapButTitle']['help'] = "Help"; // string

$zoom['config']['mapButTitle']['next'] = "Next picture"; // string
$zoom['config']['mapButTitle']['prev'] = "Previous picture"; // string
$zoom['config']['mapButTitle']['play'] = "Start diashow"; // string
$zoom['config']['mapButTitle']['pause'] = "Stop diashow"; // string

$zoom['config']['mapButTitle']['arrowLeft'] = ""; // string
$zoom['config']['mapButTitle']['arrowRight'] = ""; // string


//////////////////////////////////////////////////////
///////////////// Motion /////////////////////////////
//////////////////////////////////////////////////////

// Move (pan) buttons in persentage of image width or height 
// on clicking on arrows in navigation
$zoom['config']['pMove']= 75; // integer (%)

// Percentage of zoomin on left mouse clicking the image or plus button in navigation 
$zoom['config']['pZoom'] = 100; // integer (%)

// Percentage of zoom out on right clicking (not aktivated by default in opera browser)
// the image or minus button in navigation 
$zoom['config']['pZoomOut'] = 100; // integer (%)

// Default speed for motions ms
$zoom['config']['zoomSpeedGlobal'] = 500; // integer (ms) or string: 'fast', 'slow', 'medium'

// Motion speed by clicking on arrows in navigation
$zoom['config']['moveSpeed'] = 750; // integer (ms) or string: 'fast', 'slow', 'medium'

// Motion speed by clicking on plus in navigation or left clicking the image
$zoom['config']['zoomSpeed'] = 750; // integer (ms) or string: 'fast', 'slow', 'medium'

// Motion speed by clicking on minus in navigation or right clicking the image
$zoom['config']['zoomOutSpeed'] = 750; // integer (ms) or string: 'fast', 'slow', 'medium'

// Motion spped for zoom in by selecting an image area
$zoom['config']['cropSpeed'] = 750; // integer (ms) or string: 'fast', 'slow', 'medium'

// Motion spped by clicking on restore button
$zoom['config']['restoreSpeed'] = 750; // integer (ms) or string: 'fast', 'slow', 'medium'

// Sidewords motion speed when reached 100% zoom and left clicked on image
$zoom['config']['traverseSpeed'] = 300; // integer (ms) or string: 'fast', 'slow', 'medium'

// Fade in time of zoomed image after loading
$zoom['config']['zoomFade'] = 250; // integer (ms) or string: 'fast', 'slow', 'medium'

// Fade in time first picture
$zoom['config']['zoomFadeIn'] = 300; // integer (ms) or string: 'fast', 'slow', 'medium'

// Time after which the pic is starting to load when the user clicks on any button in navigation. 
// Setting this to 0 will not allow to click twice on a button
$zoom['config']['buttonAjax'] = 750;

// Possible motions types: 
// 'swing', 'linear', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 
// 'easeOutQuart','easeInOutQuart', 'easeInQuint','easeOutQuint', 'easeInOutQuint', 'easeInSine', 'easeOutSine', 'easeInOutSine', 
// 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic',
// 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'

// Default motion type
$zoom['config']['zoomEaseGlobal'] = 'easeOutCirc'; // string

// Motion for zoomin on clicking plus or the image
$zoom['config']['zoomEaseIn'] = 'easeOutQuad'; // string

// Motion zoomout on clicking minus or right click the image
$zoom['config']['zoomEaseOut'] = 'easeOutQuad'; // string

// Motion for zoomin by selecting an image area
$zoom['config']['zoomEaseCrop'] = 'easeInQuad'; // string

// Sideward motion on clicking the arrows buttons in navigation
$zoom['config']['zoomEaseMove'] = 'easeOutQuad'; // buttons

// Motion on clicking the restore button
$zoom['config']['zoomEaseRestore'] = 'easeOutCirc'; // string

// Motion when reached 100% zoom and clicking the image
$zoom['config']['zoomEaseTraverse'] = 'easeOutCirc'; // string

///////////////////////////////////////////////
////// Mousewheel zoomin, zoomout  ////////////
///////////////////////////////////////////////

// Mousewheel zooming general switch
$zoom['config']['scroll'] = true;

// Enables / disables animation during mousewheel zoom in and out
// If disabled the options scrollSpeed, scrollMotion, scrollPause - no effect!
$zoom['config']['scrollAnm'] = false;

// Percentage of zoom in / out on each mousewheel scroll. 
// 16 is a good value, if scrollAnm is false and 
// 35 if scrollAnm is true. 
$zoom['config']['scrollZoom'] = 16; // integer (%) // 35

// Time after the last wheel action the ajax call is triggered
$zoom['config']['scrollAjax'] = 500; // integer (ms) // 1250

// If scrollAnm is true the duration of animation effect
$zoom['config']['scrollSpeed'] = 1500; // integer (ms) //1500

// If scrollAnm is true the animation motion type
$zoom['config']['scrollMotion'] = 'easeOutQuad'; // integer (ms)

// Disables scroll tick for this time perios to prevent to fast scrolling
$zoom['config']['scrollPause'] = 50; // integer (ms)

/*
	The scrollAnm works well in some browsers like mozilla firefox or safari, 
	but has relative poor performance in microsoft explorer, even on newer computers. 
	If scrollAnm is set to true you can exclude some browsers from scroll animation. 
	Define a multidimensional array like 
	$zoom['config']['scrollBrowserExcl'][0] = array('browser'=>'msie','minVer'=>8.0);
	$zoom['config']['scrollBrowserExcl'][1] = array('browser'=>'chrome','minVer'=>false);
	This example would exclude internet explorer prior to version 8.0 and any version of google chrom browsers
	// Possible browser values: 'gecko','mozilla','mosaic','webkit','opera','msie','firefox','chrome','safari'
*/

$zoom['config']['scrollBrowserExcl'] = array(); // do note delete
$zoom['config']['scrollBrowserExcl'][0] = array('browser'=>'msie', 'minVer'=>false);
$zoom['config']['scrollBrowserExcl'][1] = array('browser'=>'chrome', 'minVer'=>false);

// Percentage of zoom in / out on each mousewheel scroll for the from animation excluded browsers
$zoom['config']['scrollBrowserExclPar']['scrollZoom'] = 16;

// Time after the last wheel action the ajax call is triggered for the from animation excluded browsers
$zoom['config']['scrollBrowserExclPar']['scrollAjax'] = 500;


/*
When reached max zoom level (100) scroll has the same effect as "click - pan". 
However the mousewheel is real fast, so the user will get away from the desired crop to fast. 
You can reduce the normal click distance by this factor. 
1 - means no effect in comparison to "click - pan"
false - means no "scroll - pan" at all
any number > 1 will "soften" this problem, whereas a bigger number means less pan each scroll
*/ 
$zoom['config']['scrollPanR'] = 4; // mixed, integer > 1 or false;


///////////////////////////////////////////////
//////////////// Pan / Drag ///////////////////
///////////////////////////////////////////////
// Incorporate acceleration of the mouse while dragging resulting in a throw effect.
$zoom['config']['zoomDragPhysics'] = false; // boolean

// Animate dragging (Ver. 2+)
$zoom['config']['zoomDragAnm'] = true; // boolean

// Time im ms the image needs to fully reach the mouse position on drag.
$zoom['config']['zoomDragSpeed'] = 1000; // boolean

// Time im ms after the last drag action the ajax call is triggered. 
$zoom['config']['zoomDragAjax'] = 750;

// Type of drag motion
$zoom['config']['zoomDragMotion'] = 'easeOutCirc';


///////////////////////////////////////////////
///////////// Image Area Selector  ////////////
///////////////////////////////////////////////

// Selector color inside, false to disable - makes image area selector a bit faster.
$zoom['config']['zoomSelectionColor'] = 'green'; // string (named color e.g. green or html color, e.g. #000000 for black)

// Selector opacity
$zoom['config']['zoomSelectionOpacity'] = 0.0; // float [0.0 - 1.0]

// Color outside the selector, false to disable - makes image area selector a bit faster.
$zoom['config']['zoomOuterColor'] = '#000000'; // string (named color e.g. green or html color, e.g. #000000 for black)

// Outside the selector opacity
$zoom['config']['zoomOuterOpacity'] = 0.4; // float [0.0 - 1.0]

// Selector border color
$zoom['config']['zoomBorderColor'] = 'red';  // string (named color e.g. green or html color, e.g. #000000 for black)

// Selector border width in px
$zoom['config']['zoomBorderWidth'] = 1; // integer (px)

// Expand effect after the selection of imagearea
$zoom['config']['zoomSelectionAnm'] = false; // boolean

// Div with a background in the middle of selection area, e.g. a cross
$zoom['config']['zoomSelectionCross'] = true; // boolean

// Cross opacity
$zoom['config']['zoomSelectionCrossOp'] = 1; // float [0.0 - 1.0]

///////////////////////////////////////////////
//////////////// PROGRESSBAR //////////////////
///////////////////////////////////////////////

// Progressbar general switch
$zoom['config']['pssBar'] = true;

// Progressbar position
$zoom['config']['pssBarP'] = 'bottom'; // string (bottom, top, center)

// Progressbar height (css class .zoomBar)
$zoom['config']['pssBarH'] = 2; // integer (px)

// Progressbar margin from top or bottom
$zoom['config']['pssBarM'] = 0; // integer (px)

/*
Progressbar margin from left and right. 
While pssBarM option value would shift the progressbar vertically, 
this option will cut the progressbar from both sides.
*/
$zoom['config']['pssBarMS'] = 0; // integer (px)

// Progressbar opacity
$zoom['config']['pssBarO'] = 0.9; // float (max 1)

///////////////////////////////////////////////
//////////////// AJAX LOADER //////////////////
///////////////////////////////////////////////
// Enable / Disable Loader
$zoom['config']['zoomLoaderEnable'] = true;

// css Class of the loader with an animated gif as a background
$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';

// Final loader transparancy
$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]

// Fade in speed of the loader
$zoom['config']['zoomLoaderFadeIn'] = 500; // int (ms)

// Fade out speed of the loader
$zoom['config']['zoomLoaderFadeOut'] = 500; // int (ms)

// Position of the loader, possible values:
// 'Center', 'TopLeft', 'TopRight', 'BottomLeft', 'BottomRight'
$zoom['config']['zoomLoaderPos'] = 'Center';  // String

// Margin for loader gravity
$zoom['config']['zoomLoaderMargin'] = 0;  // integer (px)

/*
Instead of using a gif animation you can use any png image like a film stripe. 
This option defines the number of frames, e.g. 12
All frames have to be equal in size and located under each other in one png image.
*/
$zoom['config']['zoomLoaderFrames'] = 12;

// Loop time
$zoom['config']['zoomLoaderCycle'] = 1000; // int (ms)


///////////////////////////////////////////////
///////////// Mixed options //////////////////
///////////////////////////////////////////////

// System wait cursor on image load
$zoom['config']['cursorWait'] = false;

/*
expends to max size if:
e.g. 1.1 = expand to 100% (original image size), 
if only 10% from zoomed image left...
this prevents things like 99,2% zoom
*/
$zoom['config']['fullZoomBorder'] = 1.1; // float (>=1)

// expends to min size if:
// e.g. 1.1 = expand to initial picture size, 
// if only 10% from zoomed image left...
$zoom['config']['fullZoomOutBorder'] = 1.1; // float (>=1)

// Timeout for ajax zoom request
$zoom['config']['zoomTimeOut'] = false; // false or integer (ms)

// Display warning for not supported browsers
$zoom['config']['zoomWarningBrowser'] = true; // boolean

// Use bicubic interpolation for IE Ver. prior to 8
$zoom['config']['msInterp'] = false;

// Display errors
$zoom['config']['errors'] = true; // boolean (true, false); 

// Display warnings
$zoom['config']['warnings'] = true; // boolean (true, false);

// Use session cookies for storing some imformation.
$zoom['config']['useSess'] = false; // boolean (true, false);

// Use cached image files for user zooming session. 
// If set to true, the scipt will not generate a zooming image, if it is alredy generated
$zoom['config']['cache'] = true; // boolean (true, false)

// Cache time - how long zoomed images should stay in cache folder ($zoom['config']['temp'])
// The script will instantly delete all jpg files in $zoom['config']['temp'] if they are older than this value in seconds
// Should be at least 30 seconds
$zoom['config']['cacheTime'] = 300; // integer, in seconds !!! 



///////////////////////////////////////////////
///////////////// Layout //////////////////////
///////////////////////////////////////////////

// Layers
$zoom['config']['backLayer'] = 'zoomedBackImg';
$zoom['config']['backDiv'] = 'zoomedBack';
$zoom['config']['backInnerDiv'] = 'zoomedBackImage';
$zoom['config']['picLayer'] = 'zoomedImg';
$zoom['config']['overLayer'] = 'zoomLayerImg';


/*
Build in rounded corners in px, default 5. Other values need css changes: 
.zoom-top-left, .zoom-top-right, .zoom-bottom-left, .zoom-bottom-right
and also a different background-image (defaul: 'black-corner-5.png'). 
For deaktivating set this option to 0.
*/
$zoom['config']['cornerRadius'] = 5; // interger (px)

/*
Margin around the picture in px. If build in rounded corners (cornerRadius) are used set it to the same value,  e.g. <span class="int">5</span>. 
If no build in counded corners are required, set this value to build border around the zoom picture. 
*/
$zoom['config']['innerMargin'] = 5; // interger (px)

/*
Append a div under navigation to display some information, mainly framerate during zoom, for testing purposes. 
Switch it off after testing! 
*/
$zoom['config']['zoomStat'] = false; // boolean

// Height of the appended div
$zoom['config']['zoomStatHeight'] = 20; // integer (px)

// Center AJAX-ZOOM horizontally within the parent container
$zoom['config']['layHorCenter'] = true; // boolean

// Center AJAX-ZOOM vertically, an integer sets margin-top
// True will center in the parent container
$zoom['config']['layVertCenter'] = true; // boolean, interger

// Margin Bottom, an integer sets margin-bottom
$zoom['config']['layVertBotMrg'] = false; // boolean, integer


///////////////////////////////////////////////
///////////////// WATERMARK ///////////////////
///////////////////////////////////////////////

// Watermark with an image, general switch
$zoom['config']['watermark'] = false; // boolean

// Position (Gravity)
// Possible values: NorthWest, North, NorthEast, West, Center, East, SouthWest, South, SouthEast 
$zoom['config']['wtrmrk']['gravity'] = 'Center'; // string

// PNG 24 Bit with transparancy 
$zoom['config']['wtrmrk']['file'] = 'copyright.png'; // string watermark-40.png

// For Imagemagick only, overlay style
// Possible values: 'screen','overlay','multiply','darken','lighten','linear-light','color-dodge','color-burn','hard-light','soft-light','plus','minus','subtract','difference','exclusion'
// If you just want transparency, save your png watermark file with transparancy and set $zoom['config']['wtrmrk']['composeStyle'] to false
$zoom['config']['wtrmrk']['composeStyle'] = false;  // boolean

// Watermark all over the image with $zoom['config']['wtrmrk']['file']
// Consider also making a png image as big as $zoom['config']['picDim'] 
// if this settings slows down the performance or the results do not satisfy you
$zoom['config']['wtrmrk']['fill'] = false; // boolean 

// Place watermark on initial picture
$zoom['config']['wtrmrk']['initPic'] = false; // boolean 

///////////////////////////////////////////////
//////////////////// Text /////////////////////
///////////////////////////////////////////////

// This is a general switch for puting text on the image
$zoom['config']['text'] = false; // boolean 

// Following is only needed if above is set to true

// Font text, 
// Use \n for line break
// If you pass the string as UTF-8, there should be no problems, provided ttf font file supports the language...
// $axZmH->numeric_to_utf8(#1056;&#1091;...) for example will convert all numeric encoded letters to utf8 
// further usefull functions: html_entity_decode, htmlspecialchars_decode,... iconv
$zoom['config']['txt'][0]['fontText'] = $axZmH->numeric_to_utf8(("Copyright 2001-2010\n\"Your Company\"\n")); //  

// $zoom['config']['txt'][int] is an array of configurations for the text
// You can specify as much texts as you like
// Define a new key like $zoom['config']['txt'][2]['string']...$zoom['config']['txt'][5]['string']

// Font ttf file
$zoom['config']['txt'][0]['fontFile'] = 'teen_light.ttf'; // string

// Font size pt
$zoom['config']['txt'][0]['fontSize'] = 12; // integer, float

// Font color array R (Red), G (Green), B (Blue)
// Look up from youe favorit image editor
$zoom['config']['txt'][0]['fontColor']=array('R' => 255, 'G' => 255, 'B' => 255);

// Text transparancy
$zoom['config']['txt'][0]['fontTransp'] = 100; // integer (1 - 100)

// Font gravity, array for multiple positions of the same text
// Possible values: 'NorthWest','North','NorthEast','West','Center','East','SouthWest','South','SouthEast'
// e.g. $zoom['config']['txt'][0]['fontGravity'] = array('NorthWest', 'NorthEast', 'SouthWest', 'SouthEast');
// will put $zoom['config']['txt'][0]['fontText'] in all four corners of the image
$zoom['config']['txt'][0]['fontGravity'] = array('NorthEast'); // array of directions

// Font margin from the edges of the image
$zoom['config']['txt'][0]['fontMargin'] = 7; // integer, px

// Font angle deg.
$zoom['config']['txt'][0]['fontAngle'] = 0; // integer 

// Background box general switch
$zoom['config']['txt'][0]['fontBox'] = true;

// Background box Color
$zoom['config']['txt'][0]['fontBoxColor']=array('R' => 0, 'G' => 0, 'B' => 0);

// Background box opacity
$zoom['config']['txt'][0]['fontBoxTransp']= 50; // integer (1 - 100)

// Background box padding
$zoom['config']['txt'][0]['fontBoxPadding'] = 7; // integer, px

// This could be the second text....
// uncomment if needed
$zoom['config']['txt'][1]['fontText'] = " http://www.ajax-zoom.com ";
$zoom['config']['txt'][1]['fontFile'] = 'teen.ttf';
$zoom['config']['txt'][1]['fontSize'] = 10; //pt
$zoom['config']['txt'][1]['fontColor'] = array('R'=>255,'G'=>255,'B'=>255);
$zoom['config']['txt'][1]['fontTransp'] = 100;
$zoom['config']['txt'][1]['fontMargin'] = 3; // px
$zoom['config']['txt'][1]['fontAngle'] = -90; // degree
$zoom['config']['txt'][1]['fontGravity'] = array('SouthWest');
$zoom['config']['txt'][1]['fontBox'] = true;
$zoom['config']['txt'][1]['fontBoxColor']=array('R' => 0, 'G' => 0, 'B' => 0);
$zoom['config']['txt'][1]['fontBoxTransp']= 100; // integer (1 - 100)
$zoom['config']['txt'][1]['fontBoxPadding'] = 3; // integer, px



// Virtual watermark as an layer over the image. 
// Does not provide any real protection to the images!
// css class, e.g. 'zoomWtrmrk' with a background png image or false to disable
$zoom['config']['vWtrmrk'] = false; // string or false

////////////////////////////////////////////////////////////
////////////////// Image pyramid with tiles ////////////////
////////////////////////////////////////////////////////////

// Please use $zoom['config']['pyrTiles'] OR $zoom['config']['gPyramid']

// General switch
$zoom['config']['pyrTiles'] = true; // boolean 

// Display info dialog after tiles have been made on the fly. Happens only once for each image.
$zoom['config']['pyrDialog'] = true; // boolean

// JPG quality of the generated tiles
// If you have some discspace use 100 for perfect results
$zoom['config']['pyrQual'] = 100;

// Tiles size,
$zoom['config']['tileSize'] = 384; // int (px) min: 128, max:768, 384

/*
This option should only be set to if there are different tilesizes in the image collection with zoom functionality. 
Different tilesizes arise out of changing the tileSize after some image tiles pyramids have already been generated. 
So in case tileSize values are going to be changed afterwards, consider rebuilding all tiles too and disable this option.
*/
$zoom['config']['pyrAutoDetect'] = false;

/*
Folder where tiles will be saved. Can be a http password protected direcotry (.htaccess, .htpasswd). 
A subfolder with the name if the pic without .jpg will be made in this folder
Make the $zoom['config']['pyrTilesDir'] with FTP or however
PHP should be able to write to this folder!
*/

$zoom['config']['pyrTilesPath'] = '/pic/zoomtiles/'; //string

// Chmod for the new created subfolders, where the tiles will be stored separately for each image.
$zoom['config']['pyrChmod'] = 0777; 

/*
Chmod all existing subfolders with tiles. 
This might be useful if the created files need to be accessed over FTP and the above chmod will not give enough permission rights for a FTP user. 
Change 'pyrChmod' to 0777 and run AJAX-ZOOM just once. After that change this option to false again.
*/
$zoom['config']['pyrChmodAll'] = false; // boolean

// With which imaging library make image tiles, possible values: 'GD' or 'IM'. 
// GD stands for native PHP GD2 and IM for ImageMagick.
$zoom['config']['pyrProg'] = 'GD'; // string

// Only for imagemagick: limit memory and other settings for tiles making.
// http://www.imagemagick.org/script/command-line-options.php#limit
$zoom['config']['pyrProgImLimit']['memory'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['map'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['area'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['disk'] = false; // false or integer (MB)
$zoom['config']['pyrProgImLimit']['threads'] = false; // false or integer (number of threads of execution)
$zoom['config']['pyrProgImLimit']['time'] = false; // false or integer (maximum elapsed time in seconds)

/*
In case, that ImageMagick or GD can not allocate sufficient RAM (especially on very large images), 
not all tiles for an image might be generated. If pyrProgErrorRemove is set to true the program will 
delete the tiles and the created folder for this unsuccessful attempt. 
If you use GD make sure, that memory_limit ( e.g. ini_set ('memory_limit', '512M') ) or even more is possible!
If you have imageMagick installed please notice $zoom['config']['pyrIMcacheLimit'] and  $zoom['config']['pyrProgImLimit'] options.
*/
$zoom['config']['pyrProgErrorRemove'] = true; // boolean

/*
With ImageMagick ($zoom['config']['pyrProg'] = 'IM') it is possible to proceed 
very large images (100 Mio Pixel e.g. 20.000px x 5.000) with relative low RAM. 
This setting will force to cache the image to disk (and not RAM) if  
image dimensions (width * height) exceed this settings value, 
e.g. imagesize: 5.200 x 3.700 = 19.24 Mio Pixel.
However this procedure is much slower, so be patient!
With 512mb RAM we found a limit from around 50 Mio Pixel
(Will override any $zoom['config']['pyrProgImLimit']['memory'] and ['map'] settings)
Set $zoom['config']['pyrDialog'] = true for testing purposes.
*/
$zoom['config']['pyrIMcacheLimit'] = 650; // float (Mio Pixel)

// With which programme stitch tiles?
// 'GD' OR 'IM' 
$zoom['config']['pyrStitchProg'] = 'GD'; // string

// Only for imagemagick: limit memory and other settings, only for stitching tiles !!!
// http://www.imagemagick.org/script/command-line-options.php#limit
$zoom['config']['pyrStitchImLimit']['memory'] = 256; // false or integer (MB)
$zoom['config']['pyrStitchImLimit']['map'] = 256; // false or integer (MB)
$zoom['config']['pyrStitchImLimit']['area'] = false; // false or integer (MB)
$zoom['config']['pyrStitchImLimit']['disk'] = false; // false or integer (MB)
$zoom['config']['pyrStitchImLimit']['threads'] = false; // false or integer (number of threads of execution)
$zoom['config']['pyrStitchImLimit']['time'] = false; // false or integer (maximum elapsed time in seconds)

/*
Which level to select during zoom. Value equal or bigger than 1.0;  
1.2 means that the stitched image has to be at least 20% larger or equal, than outputted cropped size. 
If not, the next bigger level will be chosen and scaled down to the needed output size. 
*/
$zoom['config']['pyrStitchSel'] = 1.0; // float >= 1

// Load tiles directly (Ver. 2+)
$zoom['config']['pyrLoadTiles'] = false;

// Tiles fadein speed (Ver. 2+)
$zoom['config']['pyrTilesFadeInSpeed'] = 1000; // integer

// Tiles fadein speed (Ver. 2+)
$zoom['config']['pyrTilesFadeLoad'] = 250; // integer

///////////////////////////////////////////////
//////////// Image Pyramid "Imitation" ////////
///////////////////////////////////////////////

// Please use $zoom['config']['pyrTiles'] OR $zoom['config']['gPyramid']
// "gPyramid" will generate full images in different sizes, which are smaller, than the original
// If $zoom['config']['gPyramidFaktor'] set to 2, and original image is 4000x2000, than following images will be generated:
// 2000x1000, 1000x500 and may be 500x250
// If $zoom['config']['gPyramidFaktor'] set to 1,5, then 2667x1333, .. and some more images
// Depending on zoom level an appropriate image will be taken for cropping from
// This will reduce the time your server needs to generate a zoomed image
// Since at full zoom still the original image will be taken, consider using the real image tile function $zoom['config']['pyrTiles']
// It takes longer to generate the tiles than full pyramid images, but once generated the tiles can be stitched 
// regardless of zooming level very very quickly ;-) 
// all images will be generated on the fly when you first call the image in frontend

// set to true, if you want to use image pyramid.
$zoom['config']['gPyramid'] = false; // boolean

// Following is only needed if above is set to true

// Folder, where image pyramid files will be stored
// Can be http password protected
// A subfolder with the name if the pic without .jpg will be made in this folder
// Make the $zoom['config']['gPyramidPath'] over FTP or however
// PHP should be able to write to this folder
$zoom['config']['gPyramidPath'] = '/pic/zoompyramid/';

// Display info message after pyramid has been made
$zoom['config']['gPyramidDialog'] = true; // boolean

// Chmod new directory (e.g. 0775)
// Possible values: 0600, 0644 ,0755, 0750, 0777
$zoom['config']['gPyramidChmod'] = 0777; 

// If set to true, it will change all folder chmod to $zoom['config']['gPyramidChmod'].
$zoom['config']['gPyramidChmodAll'] = false; // boolean 

// With which programm make pyramid files?
// Possible values: 'GD' OR 'IM'
$zoom['config']['gPyramidProg'] = 'GD'; // string, 'GD' OR 'IM'; 

// Only for imagemagick: limit memory and other settings
// http://www.imagemagick.org/script/command-line-options.php#limit
$zoom['config']['gPyramidImLimit']['memory'] = false; // false or integer (MB)
$zoom['config']['gPyramidImLimit']['map'] = false; // false or integer (MB)
$zoom['config']['gPyramidImLimit']['area'] = false; // false or integer (MB)
$zoom['config']['gPyramidImLimit']['disk'] = false; // false or integer (MB)
$zoom['config']['gPyramidImLimit']['threads'] = false; // false or integer (number of threads of execution)
$zoom['config']['gPyramidImLimit']['time'] = false; // false or integer (maximum elapsed time in seconds)

// Force cach to disk from this size
$zoom['config']['gPyramidIMcacheLimit'] = 450; // integer (Mio Pixel)

// value between 1.3 and 2.0
// 2 is normal, leass then 2 will generate more images and require more diskspace! 
$zoom['config']['gPyramidFaktor'] = 2; // float

// value equal or bigger than 1.0
// which pyramid file to select during zoom. 1.2 means have to be at least 20% larger or equal, than outputed crop size
$zoom['config']['gPyramidSel'] = 1.2; // float >= 1.0

// Output JPG quality for image pyramid;
$zoom['config']['gPyramidQual'] = 100; // integer, max 100

// Rebuld gPyramid
// Overwrite existing pyramid images on called image general switch
$zoom['config']['gPyramidOverwrite'] = false; // boolean

// Overwrite existing pyramid images if the are older than this value...
$zoom['config']['gPyramidTime'] = 5; // integer

// $zoom['config']['gPyramidTime'] measured in 'seconds','minutes','hours' or 'days'
$zoom['config']['gPyramidTimeDim'] = 'hours'; // string



$zoom['config']['n'] = count($zoom['config']);


// Following configurations are for the examples provided in "examples" folder.
// Some of the above settings are overridden depending on $_GET['example'] custom value
if ($_GET['example'] == 1){
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = true; // boolean
	$zoom['config']['layVertCenter'] = true; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}
elseif ($_GET['example'] == 2){
	$zoom['config']['useFullGallery'] = true; // boolean
	$zoom['config']['galleryFullPicDim'] = "100x100"; // string
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['useGallery'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['galleryAutoPlay'] = false;
	$zoom['config']['help'] = false;
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 1;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['zoomMapVis'] = false; // boolean
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}
elseif ($_GET['example'] == 3){
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['help'] = true;
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = true;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['zoomMapAnimate'] = true;
	$zoom['config']['zoomMapVis'] = true; // boolean
	$zoom['config']['galleryPicDim'] = '80x80'; // string
	$zoom['config']['galleryLines'] = 3; // integer
	$zoom['config']['layHorCenter'] = true; // boolean
	$zoom['config']['layVertCenter'] = true; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}
elseif ($_GET['example'] == 4){
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = true;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}
elseif ($_GET['example'] == 5){
	//$zoom['config']['picDim'] = '780x520';
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['useGallery'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['galleryAutoPlay'] = false;
	$zoom['config']['galFullAutoStart'] = true;
	$zoom['config']['help'] = false;
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['zoomMapVis'] = false; // boolean
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}
elseif ($_GET['example'] == 6){
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['help'] = true;
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = true;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['zoomMapAnimate'] = true;
	$zoom['config']['zoomMapVis'] = true; // boolean
	$zoom['config']['galleryPicDim'] = '70x70'; // string
	$zoom['config']['galleryLines'] = 3; // integer
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}

elseif ($_GET['example'] == 7){
	$zoom['config']['picDim'] = "480x320"; // string
	$zoom['config']['naviPos'] = "top"; // string
	$zoom['config']['naviFloat'] = "right"; // string
	$zoom['config']['useHorGallery'] = true;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['help'] = false;
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['zoomMapAnimate'] = true;
	$zoom['config']['zoomMapVis'] = false; // boolean
	$zoom['config']['useGallery'] = false; // boolean
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 1; // int <= 1
}

elseif ($_GET['example'] == 8){
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['scrollPane'] = true;
	$zoom['config']['galleryPicDim'] = '100x100';
	$zoom['config']['galleryFullPicDim'] = '75x60';
	$zoom['config']['galleryNavi'] = true; // boolean
	$zoom['config']['galleryNaviPos'] = 'bottom'; // string [top, bottom, navi]
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = true;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1

	//$zoom['config']['zoomStat'] = true; // boolean
	
	// Height of the appended div
	//$zoom['config']['zoomStatHeight'] = 20; // integer (px)
}
elseif ($_GET['example'] == 9){
	$zoom['config']['buttonSet'] = 'flat';
	$zoom['config']['picDim'] = '320x480'; //320
	$zoom['config']['help'] = false;
	$zoom['config']['galFullButton'] = false; // disable button for inline gallery
	$zoom['config']['naviGroupSpace'] = 10;
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['useGallery'] = false;
	$zoom['config']['galleryPicDim'] = '70x70';
	$zoom['config']['galleryPos'] = 'left';
	$zoom['config']['visualConf'] = false;
	$zoom['config']['scrollPane'] = true;
	$zoom['config']['galleryFullPicDim'] = '70x70';
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['galleryNaviPos'] = 'bottom'; // string [top, bottom, navi]
	$zoom['config']['zoomMapRest'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['mapBorder']['top'] = 1; // int (px)
	$zoom['config']['mapBorder']['right'] = 1; // int (px)
	$zoom['config']['mapBorder']['bottom'] = 1; // int (px)
	$zoom['config']['mapBorder']['left'] = 1; // int (px)
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['zoomMapVis'] = false;
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 1;
	$zoom['config']['naviMinPadding'] = 0;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['mapButton'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1
}

elseif ($_GET['example'] == 10){
	$zoom['config']['visualConf'] = true;
}

elseif ($_GET['example'] == 11){
	$zoom['config']['picDim'] = '420x280'; //320
	$zoom['config']['useHorGallery'] = true;
	$zoom['config']['galHorPosition'] = 'bottom2';
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['help'] = false;
	$zoom['config']['useGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['scrollPane'] = true;
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['zoomMapRest'] = true;
	$zoom['config']['zoomMapVis'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1
	$zoom['config']['naviBigZoom'] = false;
}

elseif ($_GET['example'] == 12){
	$zoom['config']['picDim'] = '420x280'; //320
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['help'] = false;
	$zoom['config']['useGallery'] = true;
	$zoom['config']['galleryPicDim'] = '70x70';
	$zoom['config']['visualConf'] = false;
	$zoom['config']['scrollPane'] = true;
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['zoomMapRest'] = true;
	$zoom['config']['zoomMapVis'] = false;
	$zoom['config']['zoomMapContainment'] = '#zoomAll';
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['cornerRadius'] = 5;
	$zoom['config']['innerMargin'] = 5;
	$zoom['config']['dragMap'] = false;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1
	$zoom['config']['naviBigZoom'] = false;
	$zoom['config']['pssBar'] = false;
	
	$zoom['config']['scrollAnm'] = true;
	$zoom['config']['scrollZoom'] = 40; // integer (%) // 35
	$zoom['config']['scrollAjax'] = 750; // integer (ms) // 1250
	$zoom['config']['scrollSpeed'] = 500; // integer (ms) //1500
	$zoom['config']['scrollPause'] = false; // integer (ms) //100
	$zoom['config']['scrollBrowserExcl'] = array(); // do note delete
	$zoom['config']['scrollBrowserExcl'][0] = array('browser'=>'msie', 'minVer'=>false);
	//$zoom['config']['scrollBrowserExcl'][1] = array('browser'=>'chrome', 'minVer'=>false);
	$zoom['config']['scrollBrowserExclPar']['scrollZoom'] = 16;
	$zoom['config']['scrollBrowserExclPar']['scrollAjax'] = 750;
	
	$zoom['config']['pyrStitchSel'] = 1.3;
}

elseif ($_GET['example'] == 13){
	$zoom['config']['picDim'] = '420x280'; //320
	$zoom['config']['useHorGallery'] = false;
	$zoom['config']['galHorPosition'] = 'bottom2';
	$zoom['config']['useFullGallery'] = false;
	$zoom['config']['help'] = false;
	$zoom['config']['useGallery'] = false;
	$zoom['config']['visualConf'] = false;
	$zoom['config']['scrollPane'] = false;
	$zoom['config']['galleryNavi'] = false; // boolean
	$zoom['config']['useMap'] = true; // boolean
	$zoom['config']['dragMap'] = false; // boolean
	$zoom['config']['zoomMapRest'] = true;
	$zoom['config']['zoomMapVis'] = false;
	$zoom['config']['zoomMapContainment'] = 'body';
	$zoom['config']['zoomMapAnimate'] = false;
	$zoom['config']['cornerRadius'] = 0;
	$zoom['config']['innerMargin'] = 1;
	$zoom['config']['zoomLogInfo'] = false; // boolean 
	$zoom['config']['zoomLogJustLevel'] = true; // boolean 
	$zoom['config']['zoomLoaderClass'] = 'zoomLoader3';
	$zoom['config']['zoomLoaderTransp'] = 1; // float [0.0 - 1.0]
	$zoom['config']['zoomLoaderPos'] = 'Center';  // String
	$zoom['config']['layHorCenter'] = false; // boolean
	$zoom['config']['layVertCenter'] = false; // boolean, interger
	$zoom['config']['layVertBotMrg'] = false; // boolean, integer
	$zoom['config']['galleryThumbOverOpaque'] = 1; // int <= 1
	$zoom['config']['galleryThumbOutOpaque'] = 0.8; // int <= 1
	$zoom['config']['naviBigZoom'] = false;
	$zoom['config']['zoomLoaderEnable'] = false;
	
	$zoom['config']['scrollAnm'] = true;
	$zoom['config']['scrollZoom'] = 35; // integer (%) // 35
	$zoom['config']['scrollAjax'] = 750; // integer (ms) // 1250
	$zoom['config']['scrollSpeed'] = 1000; // integer (ms) //1500
	$zoom['config']['scrollPause'] = 10; // integer (ms) //100
	$zoom['config']['scrollBrowserExcl'] = array(); // do note delete
	$zoom['config']['scrollBrowserExcl'][0] = array('browser'=>'msie', 'minVer'=>false);
	$zoom['config']['scrollBrowserExcl'][1] = array('browser'=>'chrome', 'minVer'=>false);
	$zoom['config']['scrollBrowserExclPar']['scrollZoom'] = 16;
	$zoom['config']['scrollBrowserExclPar']['scrollAjax'] = 750;
}


////////////////////////////////////////////////////////////
////////////// Dynamic settings for the Demo ///////////////
////////////////////////////////////////////////////////////

if ($zoom['config']['visualConf']){
	include_once("zoomVisualConf.inc.php");
}


////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////  CONFIGURATION END, proceed to zoomObjects.inc.php ////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////


// DO NOT EDIT THE FOLLOWING CODE !
$zoom['config']['fpPP'] = 			$axZmH->checkSlash($zoom['config']['fpPP'],'remove');
$zoom['config']['iconDir'] =	 	$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['icon'],'add');
$zoom['config']['picDir'] = 		$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pic'],'add');
$zoom['config']['thumbDir'] = 		$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['thumbs'],'add');
$zoom['config']['tempDir'] = 		$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['temp'],'add');
$zoom['config']['galleryDir'] = 	$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['gallery'],'add');
$zoom['config']['fontDir'] = 		$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['fontPath'],'add');
$zoom['config']['gPyramidDir'] = 	$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['gPyramidPath'],'add'); 
$zoom['config']['pyrTilesDir'] = 	$axZmH->checkSlash($zoom['config']['fpPP'].$zoom['config']['pyrTilesPath'],'add');

$zoom['config']['picX'] = 			intval($axZmH->getf('x',$zoom['config']['picDim']));
$zoom['config']['picY'] = 			intval($axZmH->getl('x',$zoom['config']['picDim']));
$zoom['config']['galPicX'] = 		intval($axZmH->getf('x',$zoom['config']['galleryPicDim']));
$zoom['config']['galPicY'] = 		intval($axZmH->getl('x',$zoom['config']['galleryPicDim']));
$zoom['config']['galFullPicX'] = 	intval($axZmH->getf('x',$zoom['config']['galleryFullPicDim']));
$zoom['config']['galFullPicY'] = 	intval($axZmH->getl('x',$zoom['config']['galleryFullPicDim']));
$zoom['config']['galHorPicX'] = 	intval($axZmH->getf('x',$zoom['config']['galleryHorPicDim']));
$zoom['config']['galHorPicY'] = 	intval($axZmH->getl('x',$zoom['config']['galleryHorPicDim']));

foreach ($zoom['config']['icons'] as $k=>$v){
	$zoom['config']['icons'][$k]['file'] = $zoom['config']['buttonSet'].'/'.$v['file'];
}

// More then one picture requires $zoom['config']['keepBoxW'] AND $zoom['config']['keepBoxH']
if ($zoom['config']['useGallery'] OR $zoom['config']['useFullGallery'] OR $zoom['config']['useHorGallery']){
	$zoom['config']['keepBoxW'] = true;
	$zoom['config']['keepBoxH'] = true;
}

if ($zoom['config']['galleryNavi'] AND !$zoom['config']['useGallery'] AND ($zoom['config']['galleryNaviPos'] == 'top' OR $zoom['config']['galleryNaviPos'] == 'bottom')){
	$zoom['config']['galleryNaviPos'] = 'navi';
}
?>