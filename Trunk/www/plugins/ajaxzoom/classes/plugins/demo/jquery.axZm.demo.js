/**
* Plugin: jQuery AJAX-ZOOM, jquery.axZm.demo.js
* Copyright: Copyright (c) 2010 Vadim Jacobi
* Licence: Commercial, free for personal use (demo version)
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 2.0.0
* Date: 2010-06-10
* URL: http://www.ajax-zoom.com
* Description: jQuery AJAX-ZOOM plugin - adds zoom & pan functionality to images and image galleries with javascript & PHP
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
*/


/***************************************************/
/////////////////////////////////////////////////////
//////////////// DEMO FUNCTIONS /////////////////////
/////////////////////////////////////////////////////
/***************************************************/



$.ajaxSubmitCustom = function (formName,targetDiv,ajaxUrl){
	$('#'+formName).ajaxSubmit ({
		target: '#'+targetDiv,
		url: ajaxUrl,
		type: 'get'
	}); 
	return false; 
}

$.optSubmit = function(){
	$.ajaxSubmitCustom('demoOptions','zoomOpr','/axZm/zoomVisualConf.inc.php');
}

$.colPick=function(fld,ff){
	$('#'+fld).ColorPicker({
		onShow: function (colpkr) {
			$(colpkr).fadeIn('fast');
			demoColorDisable();
			return false;
		},
		onBeforeShow: function(){
			demoColorDisable();
			$(this).ColorPickerSetColor(this.value);
		},
		onHide: function (colpkr) {
			var atr=$('#'+fld).attr('value');
			eval (ff+'(\'#'+atr+'\')');
			demoColorDisable();
			$(colpkr).fadeOut('fast');
			return false;
		},
		onSubmit: function(hsb, hex, rgb) {
			$('#'+fld).val(hex);
			eval (ff+'(\'#'+hex+'\')');
			sclTo(1000);
			$('#'+fld).ColorPickerHide();
		},
		onChange: function (hsb, hex, rgb) {
			eval (ff+'(\'#'+hex+'\')');
		}
	})
	.bind('keyup', function(){
		demoColorDisable();
		$(this).ColorPickerSetColor(this.value);
	});			
}

function sclTo(tOut){
	$(window).scrollTo('#zoomAll', {
		duration: 300, 
		onAfter:function(){
			setTimeout(function(){
				demoColorDisable();
			}, tOut);
		}
	});
}

function demoShowSwitch(){
	if ($('#motionSwitch:checked').val() == 1){
		$.demoAnm=true;
	}else{
		$.demoAnm=false;
	}
}

function demoDisableForm(formName){
	$('#'+formName).attr("disabled", "disabled");
}

function demoEnableForm(formName){
	$('#'+formName).removeAttr("disabled");
}

function demoDisableForms(){
	demoDisableForm('aniForm');
	demoDisableForm('selForm');
	demoDisableForm('demoOptions');
}

function demoEnableForms(){
	demoEnableForm('aniForm');
	demoEnableForm('selForm');
	demoEnableForm('demoOptions');	
}
	
$.demoAnimate = function(options) {
	var settings = {
		layer: $.axZm['picLayer'], 
		backLayer: $.axZm['backLayer'],
		speed: $.axZm['zoomSpeed'],
		motion: $.axZm['zoomEaseIn'],
		factor: $.axZm['pZoom'],
		move: $.axZm['pMove'],
		moveSpeed: $.axZm['moveSpeed'],
		moveMotion: $.axZm['zoomEaseMove'],
		outSpeed: $.axZm['restoreSpeed'],
		outMotion: $.axZm['zoomEaseRestore'],
		pause: 1000,
		// functions
		zoomIn: false,
		zoomSelect: false,
		zoomPan: false,
		// for zoom pan
		zoomPanDir: false
	};
	// save defaults for zoom in, if zoom out
	var b = settings; 
	
	// extend defaults settings
	a = jQuery.extend(settings, options);
	
	var mapSwitched=false;
	
	// reaktivated map if it has been switched off for demo
	function reaktivateMap(){
		if (mapSwitched && $.axZm['zoomMap']){
			if ($.axZm['zoomMapButton']){
				$.fn.axZm.zoomMapSwitchButton('zoomMapButton');
			}else{
				$.fn.axZm.zoomMapToggle('show');
			}
		}
	}
	
	// Initial Position bevore animation
	function resetPic(){
		if ($.axZm['zoomMap']){
			if ($.axZm['zoomMapButton']){
				if ($('#zoomMapHolder').css('display') != 'none'){
					$.fn.axZm.zoomMapSwitchButton('zoomMapButton');
					mapSwitched=true;
				}
			}else{
				if ($('#zoomMapHolder').css('zIndex')!=1){
					$.fn.axZm.zoomMapToggle('hide');
					mapSwitched=true;
				}
			}
		}
		
		$('#'+a.layer).attr('src', $.axZm['smallImg']);
		$('#'+a.layer).css({left:$.axZm['zmLeftOffset'],top:$.axZm['zmTopOffset'],width:$.axZm['iw'],height:$.axZm['ih']});
		$('#'+a.backLayer).attr('src', $.axZm['smallImg']);
		$('#'+a.backLayer).css({left:$.axZm['zmLeftOffset'],top:$.axZm['zmTopOffset'],width:$.axZm['iw'],height:$.axZm['ih']});
		$('#'+a.layer).show();
		$('#'+a.backLayer).show();
		$('#'+a.layer).css('position','absolute');
		$('#'+a.backLayer).css('position','absolute');
	}
	
	// Initial position after animation
	function demoReset(){
		$('#'+a.layer).fadeTo('fast',0.0,function(){
			$('#'+a.backLayer).animate( {
				width: $.axZm['iw'], 
				height: $.axZm['ih'], 
				left: $.axZm['zmLeftOffset'],
				top: $.axZm['zmTopOffset']
				},a.outSpeed, a.outMotion, function(){
					$('#'+$.axZm['picLayer']).css({left:$.axZm['zmLeftOffset'],top:$.axZm['zmTopOffset'],width: $.axZm['iw'],height: $.axZm['ih']});
					$('#'+$.axZm['picLayer']).fadeTo('fast',1,function(){
						$.fn.axZm.resetBack();
						demoEnableForms();				
						$.fn.axZm.areaRestart();
						reaktivateMap();
						return true;
					});
			});
		});		
	}

	// Zoom in v = vars = a|b, rst = reset true, false
	function demoZoomIN(v, rst){
		var zoomRatio=((100 + v.factor)/100);
		$('#'+v.layer).animate( {
				width: Math.ceil($.axZm['iw']*zoomRatio), 
				height: Math.ceil($.axZm['ih']*zoomRatio), 		
				left: - Math.ceil((($.axZm['iw']*zoomRatio)-$.axZm['boxW'])/2),
				top: - Math.ceil((($.axZm['ih']*zoomRatio)-$.axZm['boxH'])/2)
			}, 
			v.speed, v.motion, function(){
		}); 

		$('#'+v.backLayer).animate( {
				width: Math.ceil($.axZm['iw']*zoomRatio), 
				height: Math.ceil($.axZm['ih']*zoomRatio), 		
				left: - Math.ceil((($.axZm['iw']*zoomRatio)-$.axZm['boxW'])/2),
				top: - Math.ceil((($.axZm['ih']*zoomRatio)-$.axZm['boxH'])/2)
			}, 
			v.speed, v.motion, function(){
				if (rst){
					setTimeout(function(){
						demoReset();
					}, 500);
				}else{
					return true;
				}				
		}); 		
	}
	
	function demoZoomPAN(v){
		var zoomRatio=((100 + v.factor)/100);
		$('#'+v.layer).animate( {
				width: Math.ceil($.axZm['iw']*zoomRatio), 
				height: Math.ceil($.axZm['ih']*zoomRatio), 		
				left: 0,
				top: - Math.ceil((($.axZm['ih']*zoomRatio)-$.axZm['boxH'])/2)
			}, 
			v.speed, v.motion, function(){
		}); 

		$('#'+v.backLayer).animate( {
				width: Math.ceil($.axZm['iw']*zoomRatio), 
				height: Math.ceil($.axZm['ih']*zoomRatio), 		
				left: 0,
				top: - Math.ceil((($.axZm['ih']*zoomRatio)-$.axZm['boxH'])/2)
			}, 
			v.speed, v.motion, function(){
				setTimeout(function(){
					// start sidewards motion
					var mT=0;
					var mL=Math.round(($.axZm['boxW']*((v.move+100)/100))-$.axZm['boxW']);
					if (mL>($.axZm['iw']*zoomRatio-$.axZm['boxW'])){mL=$.axZm['iw']*zoomRatio-$.axZm['boxW'];}
					if (v.zoomPanDir){
						mT = Math.round(($.axZm['boxH']*((v.move+100)/100))-$.axZm['boxH']);
					}
					$('#'+v.layer).animate( {
							left: '-=' + mL,
							top: '-=' + mT
						}, 
						v.moveSpeed, v.moveMotion, function(){
					}); 
					$('#'+v.backLayer).animate( {
							left: '-=' + mL,
							top: '-=' + mT
						}, 
						v.moveSpeed, v.moveMotion, function(){
						if (v.zoomPanDir){
							setTimeout(function(){
								$('#'+v.layer).animate( {
										left: '-=' + mL,
										top: '+=' + mT
									}, 
									v.moveSpeed, v.moveMotion, function(){
								});
								$('#'+v.backLayer).animate( {
										left: '-=' + mL,
										top: '+=' + mT
									}, 
									v.moveSpeed, v.moveMotion, function(){
									setTimeout(function(){
										demoReset();
									}, 500);									
								});
							}, v.pause);
						}else{
							setTimeout(function(){
								demoReset();
							}, 500);
						}
					}); 					
				}, v.pause);
	
		}); 		
	}

	function demoShowSelect1(){
		var width = Math.round($.axZm['iw']/((a.factor+100)/100));
		var height = Math.round($.axZm['ih']/((a.factor+100)/100));
		var left = Math.round(($.axZm['iw']-width)/2);
		var top = Math.round(($.axZm['ih']-height)/2);
		$.fn.axZm.areaDisable(false);
		$.fn.axZm.areaResize(false,{x1: left, y1: top, x2: (width+left), y2: (height+top)});
		//$('#'+$.axZm['overLayer']).imgAreaSelect({x1: left, y1: top, x2: (width+left), y2: (height+top), parent: '#zoomLayer', enable: true, hide: false});
	}
	
	$(window).scrollTo('#zoomAll', {
		duration: 300, 
		onAfter:function(){
			setTimeout(function(){
				resetPic();
				demoDisableForms();
				
				//if ($.zoomHEIGHT && $.zoomWIDTH){$('#zoomOpr').load('zoom_load_session.php?reset=1');}
				
				if (a.zoomIn == true){
					demoZoomIN(a, true);
				}
				else if (a.zoomPan == true){
					demoZoomPAN(a);		
				}
				else if (a.zoomSelect == true){
					demoShowSelect1();
					setTimeout(function(){
						demoColorDisable();
						demoZoomIN(a, true);
					}, 1500);
				}				
			}, 500);
		}
	});
	


}


// Visual area creation
function demoShowSelect(){
	var width = Math.round($.axZm['iw']/2);
	var height = Math.round($.axZm['ih']/2);
	var a = $.axZm['iw']-width-30;
	var b = $.axZm['ih']-height-30;
	var c = a + width;
	var d = b + height;

	$.fn.axZm.areaDisable(false);
	$.fn.axZm.areaResize(false,{x1: a, y1: b, x2: c, y2: d});
}

function demoColorDisable(){
	$.fn.axZm.areaDisable();
	$.fn.axZm.areaRestart();
	/*
	$('#zoomAll').mousemove(function(){
		$('#zoomAll').unbind('mousemove');
		$.fn.axZm.areaRestart();
	});
	*/
}

function demoColorArea(color){
	$.axZm.zoomSelectionColor = color;
	demoShowSelect();
}

function demoColorOuter(color){
	$.axZm['zoomOuterColor']=color;
	demoShowSelect();
}


function demoColorBorder(color){
	$.axZm['zoomBorderColor'] = color;
	demoShowSelect();
}


function demoBorder(thickness){
	$.axZm['zoomBorderWidth']=parseInt(thickness);
	$(window).scrollTo('#zoomAll', {
		duration: 300, 
		onAfter:function(){
			setTimeout(function(){
				demoShowSelect();
				setTimeout(function(){
					demoColorDisable();
				}, 2000);
			}, 500);
		}
	});
}

function demoSelOpacity(opacity){
	$.axZm['zoomSelectionOpacity']=(parseInt(opacity))/10;

	$(window).scrollTo('#zoomAll', {
		duration: 300, 
		onAfter:function(){
			setTimeout(function(){
				demoShowSelect();
				setTimeout(function(){
					demoColorDisable();
				}, 2000);
			}, 500);
		}
	});
}

function demoOuterOpacity(opacity){
	$.axZm['zoomOuterOpacity']=(parseInt(opacity))/10;

	$(window).scrollTo('#zoomAll', {
		duration: 300, 
		onAfter:function(){
			setTimeout(function(){
				demoShowSelect();
				setTimeout(function(){
					demoColorDisable();
				}, 2000);
			}, 500);
		}
	});
}

// Demo Motions
function demoClickRatio(percent,play){
	$.axZm['pZoom']=(parseInt(percent)); // Percent
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: $.axZm['zoomSpeed'], motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoClickOutRatio(percent,play){
	$.axZm['pZoomOut']=(parseInt(percent)); // Percent
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 20, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoomOut'], outSpeed: $.axZm['zoomOutSpeed'], outMotion: $.axZm['zoomEaseOut'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

// xxx
function demoClickZoomOut(speed,play){
	$.axZm['zoomOutSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 20, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], outSpeed: $.axZm['zoomOutSpeed'], outMotion: $.axZm['zoomEaseOut'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoClickSpeed(speed,play){
	$.axZm['zoomSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: $.axZm['zoomSpeed'], motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMoveRatio(percent,play){
	$.axZm['pMove']=(parseInt(percent)); // Percent
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomPan: true});
			$.fn.axZm.loadingEnd();
		});		
	}
}

function demoMoveSpeed(speed,play){
	$.axZm['moveSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomPan: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoTraverseSpeed(speed,play){
	$.axZm['traverseSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			var fact = Math.min(($.axZm['ow']/$.axZm['iw']),($.axZm['oh']/$.axZm['ih']));
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: Math.round(fact*100), move: 55, moveSpeed: $.axZm['traverseSpeed'], moveMotion: $.axZm['zoomEaseTraverse'], zoomPanDir: 1, zoomPan: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoCropSpeed(speed,play){
	$.axZm['cropSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: $.axZm['cropSpeed'], motion: $.axZm['zoomEaseCrop'], factor: $.axZm['pZoom'], zoomSelect: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoRestoreSpeed(speed,play){
	$.axZm['restoreSpeed']=(parseInt(speed)); // ms
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

// Motion Functions

function demoMotionIn(mfunction,play){
	$.axZm['zoomEaseIn']=mfunction;
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: $.axZm['zoomSpeed'], motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMotionCrop(mfunction,play){
	$.axZm['zoomEaseCrop']=mfunction;
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: $.axZm['cropSpeed'], motion: $.axZm['zoomEaseCrop'], factor: $.axZm['pZoom'], zoomSelect: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMotionOut(mfunction,play){
	$.axZm['zoomEaseOut']=mfunction;
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 20, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], outSpeed: $.axZm['zoomOutSpeed'], outMotion: $.axZm['zoomEaseOut'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMotionMove(mfunction,play){
	$.axZm['zoomEaseMove']=mfunction;
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomPan: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMotionTraverse(mfunction,play){
	$.axZm['zoomEaseTraverse']=mfunction;

	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			var fact = Math.min(($.axZm['ow']/$.axZm['iw']),($.axZm['oh']/$.axZm['ih']));
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: Math.round(fact*100), move: 55, moveSpeed: $.axZm['traverseSpeed'], moveMotion: $.axZm['zoomEaseTraverse'], zoomPanDir: 1, zoomPan: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoMotionRestore(mfunction,play){
	$.axZm['zoomEaseRestore']=mfunction;
	if ($.demoAnm==true || play){
		$.fn.axZm.zoomReset(false,function(){
			$.demoAnimate({speed: 50, motion: $.axZm['zoomEaseIn'], factor: $.axZm['pZoom'], zoomIn: true});
			$.fn.axZm.loadingEnd();
		});
	}
}

function demoLoaderPos(p){
	$.axZm['zoomLoaderPos'] = p;
	demoLoaderTransp($.axZm['zoomLoaderTransp']*100);
}

function demoLoaderTransp(t){
	$.axZm['zoomLoaderTransp']=(parseInt(t)/100);
	if ($.demoAnm==true || play){
		$(window).scrollTo('#zoomAll', {
			duration: 300, 
			onAfter:function(){
				setTimeout(function(){
					demoDisableForms();
					$.fn.axZm.loadingStart(true);
					setTimeout(function(){
						$.fn.axZm.loadingEnd();
						demoEnableForms()
					}, 2000);
				}, 500);
			}
		});
	}
}


function demoColorStage(color){
	$('#zoomContainer').css('backgroundColor',color);
}

function demoBodyColor(color){
	$('body').css({'backgroundColor': color, 'background-image': 'none'});
}

function demoBodyBack(backg){
	if (!backg){
		$('body').css({'background-image': 'none'});
		return;
	}
	var imgPfad = $.axZm.iconDir + 'bg_' + backg;
	$('<img />').load(function(){
		$('body').css({'background-image': 'url(' + imgPfad + ')'});
	}).attr('src', imgPfad);
	
}

function demoPhys(val){
	$.axZm['zoomDragPhysics'] = val;
}

function demoIeInterp(val){
	$.axZm['msInterp'] = val;
}

function subOpt(id,block){
	if ($('#'+id+':checked').val() != undefined){
		$('#'+block).css('display','block');
	}else{
		$('#'+block).css('display','none');
	}
}

