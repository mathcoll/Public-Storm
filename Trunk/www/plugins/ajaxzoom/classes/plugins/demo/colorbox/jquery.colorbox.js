/*!	ColorBox v1.3.1 - a full featured, light-weight, customizable lightbox based on jQuery 1.3 */
//	(c) 2009 Jack Moore - www.colorpowered.com - jack@colorpowered.com
//	Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php

(function ($) {
	//Shortcuts (to increase compression)
	var colorbox = 'colorbox',
	hover = 'hover',
	TRUE = true,
	FALSE = false,
	cboxPublic,
	isIE = !$.support.opacity,
	isIE6 = isIE && !window.XMLHttpRequest,

	//Event Strings (to increase compression)
	cbox_click = 'click.colorbox',
	cbox_open = 'cbox_open',
	cbox_load = 'cbox_load',
	cbox_complete = 'cbox_complete',
	cbox_cleanup = 'cbox_cleanup',
	cbox_closed = 'cbox_closed',
	cbox_resize = 'resize.cbox_resize',
	cbox_ie6 = 'resize.cboxie6 scroll.cboxie6',

	//Cached jQuery Object Variables
	$overlay,
	$cbox,
	$wrap,
	$content,
	$topBorder,
	$leftBorder,
	$rightBorder,
	$bottomBorder,
	$related,
	$window,
	$loaded,
	$loadingOverlay,
	$loadingGraphic,
	$title,
	$current,
	$slideshow,
	$next,
	$prev,
	$close,

	//Variables for cached values or use across multiple functions
	interfaceHeight,
	interfaceWidth,
	loadedHeight,
	loadedWidth,
	maxWidth,
	maxHeight,
	element,
	index,
	settings,
	open,
	callback,
	
	// ColorBox Default Settings.	
	// See http://colorpowered.com/colorbox for details.
	defaults = {
		transition: "elastic",
		speed: 350,
		width: FALSE,
		height: FALSE,
		initialWidth: "400",
		initialHeight: "400",
		maxWidth: FALSE,
		maxHeight: FALSE,
		scalePhotos: TRUE,
		scrollbars: TRUE,
		inline: FALSE,
		html: FALSE,
		iframe: FALSE,
		photo: FALSE,
		href: FALSE,
		title: FALSE,
		rel: FALSE,
		opacity: 0.9,
		preloading: TRUE,
		current: "image {current} of {total}",
		previous: "previous",
		next: "next",
		close: "close",
		open: FALSE,
		overlayClose: TRUE,
		slideshow: FALSE,
		slideshowAuto: TRUE,
		slideshowSpeed: 2500,
		slideshowStart: "start slideshow",
		slideshowStop: "stop slideshow"
	};

	// ****************
	// HELPER FUNCTIONS
	// ****************
	
	// Set Navigation Key Bindings
	function cbox_key(e) {
		if (e.keyCode === 37) {
			e.preventDefault();
			$prev.click();
		} else if (e.keyCode === 39) {
			e.preventDefault();
			$next.click();
		}
	}
	
	// Convert % values to pixels
	function setSize (size, dimension) {
		dimension = dimension === 'x' ? document.documentElement.clientWidth : document.documentElement.clientHeight;
		return (typeof size === 'string') ? (size.match(/%/) ? (dimension / 100) * parseInt(size, 10) : parseInt(size, 10)) : size;
	}

	// Checks an href to see if it is a photo.
	// There is a force photo option (photo: true) for hrefs that cannot be matched by this regex.
	function isImage (url) {
		return settings.photo || url.match(/\.(gif|png|jpg|jpeg|bmp)(?:\?([^#]*))?(?:#(\.*))?$/i);
	}
	
	// Assigns functions results to their respective settings.  This allows functions to be used to set ColorBox options.
	function process () {
		for (var i in settings) {
			if (typeof(settings[i]) === 'function') {
			    settings[i] = settings[i].call(element);
			}
		}
	}

	// ****************
	// PUBLIC FUNCTIONS
	// Usage format: $.fn.colorbox.close();
	// Usage from within an iframe: parent.$.fn.colorbox.close();
	// ****************
	
	cboxPublic = $.fn.colorbox = function (options, custom_callback) {
		
		if (this.length) {
			this.each(function () {
				var data = $(this).data(colorbox) ? $.extend({},
					$(this).data(colorbox), options) : $.extend({}, defaults, options);
				$(this).data(colorbox, data).addClass("cboxelement");
			});
		} else {
			$(this).data(colorbox, $.extend({}, defaults, options));
		}
		
		$(this).unbind(cbox_click).bind(cbox_click, function (event) {
			
			element = this;
			
			settings = $(element).data(colorbox);
			
			process();//process settings functions
			
			$().bind("keydown.cbox_close", function (e) {
				if (e.keyCode === 27) {
					e.preventDefault();
					cboxPublic.close();
				}
			});
			if (settings.overlayClose) {
				$overlay.css({"cursor": "pointer"}).one('click', cboxPublic.close);
			}
			
			//remove the focus from the anchor to prevent accidentally calling
			//colorbox multiple times (by pressing the 'Enter' key
			//after colorbox has opened, but before the user has clicked on anything else)
			element.blur();
			
			callback = custom_callback || FALSE;
			
			var rel = settings.rel || element.rel;
			
			if (rel && rel !== 'nofollow') {
				$related = $('.cboxelement').filter(function () {
					var relRelated = $(this).data(colorbox).rel || this.rel;
					return (relRelated === rel);
				});
				index = $related.index(element);
				
				if (index < 0) { //this checks direct calls to colorbox
					$related = $related.add(element);
					index = $related.length - 1;
				}
			
			} else {
				$related = $(element);
				index = 0;
			}
			if (!open) {
				open = TRUE;
				$.event.trigger(cbox_open);
				$close.html(settings.close);
				$overlay.css({"opacity": settings.opacity}).show();
				cboxPublic.position(setSize(settings.initialWidth, 'x'), setSize(settings.initialHeight, 'y'), 0);
				if (isIE6) {
					$window.bind(cbox_ie6, function () {
						$overlay.css({width: $window.width(), height: $window.height(), top: $window.scrollTop(), left: $window.scrollLeft()});
					}).trigger(cbox_ie6);
				}
			}
			cboxPublic.slideshow();
			cboxPublic.load();
			
			event.preventDefault();
		});
		
		if (options && options.open) {
			$(this).triggerHandler(cbox_click);
		}
		
		return this;
	};

	// Initialize ColorBox: store common calculations, preload the interface graphics, append the html.
	// This preps colorbox for a speedy open when clicked, and lightens the burdon on the browser by only
	// having to run once, instead of each time colorbox is opened.
	cboxPublic.init = function () {
		
		// jQuery object generator to save a bit of space
		function $div(id) {
			return $('<div id="cbox' + id + '"/>');
		}
		
		// Create & Append jQuery Objects
		$window = $(window);
		$cbox = $('<div id="colorbox"/>');
		$overlay = $div("Overlay").hide();
		$wrap = $div("Wrapper");
		$content = $div("Content").append(
			$loaded = $div("LoadedContent").css({width: 0, height: 0}),
			$loadingOverlay = $div("LoadingOverlay"),
			$loadingGraphic = $div("LoadingGraphic"),
			$title = $div("Title"),
			$current = $div("Current"),
			$slideshow = $div("Slideshow"),
			$next = $div("Next"),
			$prev = $div("Previous"),
			$close = $div("Close")
		);
		$wrap.append( // The 3x3 Grid that makes up ColorBox
			$('<div/>').append(
				$div("TopLeft"),
				$topBorder = $div("TopCenter"),
				$div("TopRight")
			),
			$('<div/>').append(
				$leftBorder = $div("MiddleLeft"),
				$content,
				$rightBorder = $div("MiddleRight")
			),
			$('<div/>').append(
				$div("BottomLeft"),
				$bottomBorder = $div("BottomCenter"),
				$div("BottomRight")
			)
		).children().children().css({'float': 'left'});
		$('body').prepend($overlay, $cbox.append($wrap));
				//stopPropagation
		if (isIE) {
			$cbox.addClass('cboxIE');
			if (isIE6) {
				$overlay.css('position', 'absolute');
			}
		}
		
		// Add rollover event to navigation elements
		$content.children()
		.addClass(hover)
		.mouseover(function () { $(this).addClass(hover); })
		.mouseout(function () { $(this).removeClass(hover); })
		.hide();
		
		// Cache values needed for size calculations
		interfaceHeight = $topBorder.height() + $bottomBorder.height() + $content.outerHeight(TRUE) - $content.height();//Subtraction needed for IE6
		interfaceWidth = $leftBorder.width() + $rightBorder.width() + $content.outerWidth(TRUE) - $content.width();
		loadedHeight = $loaded.outerHeight(TRUE);
		loadedWidth = $loaded.outerWidth(TRUE);
		
		// Setting padding to remove the need to do size conversions during the animation step.
		$cbox.css({"padding-bottom": interfaceHeight, "padding-right": interfaceWidth}).hide();
		
		// Setup button & key events.
		$next.click(cboxPublic.next);
		$prev.click(cboxPublic.prev);
		$close.click(cboxPublic.close);
		
		// Adding the 'hover' class allowed the browser to load the hover-state
		// background graphics.  The class can now can be removed.
		$content.children().removeClass(hover);
	};

	cboxPublic.position = function (mWidth, mHeight, speed, loadedCallback) {
		var winHeight = document.documentElement.clientHeight,
		posTop = winHeight / 2 - mHeight / 2,
		posLeft = document.documentElement.clientWidth / 2 - mWidth / 2,
		animate_speed;
		
		//keeps the box from expanding to an inaccessible area offscreen.
		if (mHeight > winHeight) { posTop -=(mHeight - winHeight); }
		if (posTop < 0) { posTop = 0; } 
		if (posLeft < 0) { posLeft = 0; }
		
		posTop += $window.scrollTop();
		posLeft += $window.scrollLeft();
		
		mWidth = mWidth - interfaceWidth;
		mHeight = mHeight - interfaceHeight;
		
		//setting the speed to 0 to reduce the delay between same-sized content.
		animate_speed = ($cbox.width() === mWidth && $cbox.height() === mHeight) ? 0 : speed;
		
		//this gives the wrapper plenty of breathing room so it's floated contents can move around smoothly,
		//but it has to be shrank down around the size of div#colorbox when it's done.  If not,
		//it can invoke an obscure IE bug when using iframes.
		$wrap[0].style.width = $wrap[0].style.height = "9999px";
		
		function modalDimensions (that) {
			//loading overlay size has to be sure that IE6 uses the correct height.
			$topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = that.style.width;
			$loadingGraphic[0].style.height = $loadingOverlay[0].style.height = $content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = that.style.height;
		}
		
		$cbox.dequeue().animate({height:mHeight, width:mWidth, top:posTop, left:posLeft}, {duration: animate_speed,
			complete: function(){
				modalDimensions(this);
				
				//shrink the wrapper down to exactly the size of colorbox to avoid a bug in IE's iframe implementation.
				$wrap[0].style.width = (mWidth+interfaceWidth) + "px";
				$wrap[0].style.height = (mHeight+interfaceHeight) + "px";
				
				if (loadedCallback) {loadedCallback();}
			},
			step: function(){
				modalDimensions(this);
			}
		});
	};

	cboxPublic.resize = function (object) {
		if(!open){ return; }
		
		var width,
		height,
		topMargin,
		prev,
		prevSrc,
		next,
		nextSrc,
		photo,
		timeout,
		speed = settings.transition==="none" ? 0 : settings.speed;
		
		$window.unbind(cbox_resize);
		
		if(!object){
			timeout = setTimeout(function(){ //timer allows IE to render the dimensions before attempting to calculate the height
				height = $loaded.children().outerHeight(TRUE);
				$loaded[0].style.height = height + 'px';
				cboxPublic.position($loaded.width()+loadedWidth+interfaceWidth, height+loadedHeight+interfaceHeight, speed);
			}, 1);
			return;
		}
		
		$loaded.remove();
		$loaded = $(object);
		
		function getWidth(){
			width = settings.width ? maxWidth : maxWidth && maxWidth < $loaded.width() ? maxWidth : $loaded.width();
			return width;
		}
		function getHeight(){
			height = settings.height ? maxHeight : maxHeight && maxHeight < $loaded.height() ? maxHeight : $loaded.height();
			return height;
		}
		
		if(!settings.scrollbars){
			$loaded.css({overflow:'hidden'});
		}
		
		$loaded.hide().appendTo('body')
		.attr({id:'cboxLoadedContent'})
		.css({width:getWidth()})
		.css({height:getHeight()})//sets the height independently from the width in case the new width influences the value of height.
		.prependTo($content);
		
		// Hides 'select' form elements in IE6 because they would otherwise sit on top of the overlay.
		if (isIE6) {
			$('select:not(#colorbox select)').filter(function(){
				return $(this).css('visibility') !== 'hidden';
			}).css({'visibility':'hidden'}).one(cbox_cleanup, function(){
				$(this).css({'visibility':'inherit'});
			});
		}
		
		photo = $('#cboxPhoto')[0];
		if (photo && settings.height) {
			topMargin = (height - parseInt(photo.style.height, 10))/2;
			photo.style.marginTop = (topMargin > 0 ? topMargin : 0)+'px';
		}
		
		function setPosition (s) {
			var mWidth = width+loadedWidth+interfaceWidth,
			mHeight = height+loadedHeight+interfaceHeight;
			
			$().unbind('keydown', cbox_key);
			cboxPublic.position(mWidth, mHeight, s, function(){
				if (!open) { return; }
				
				if (isIE) {
					//This fadeIn helps the bicubic resampling to kick-in.
					if( photo ){$loaded.fadeIn(100);}
					//IE adds a filter when ColorBox fades in and out that can cause problems if the loaded content contains transparent pngs.
					$cbox[0].style.removeAttribute("filter");
				}
				
				$content.children().show();
				
				//Waited until the iframe is added to the DOM & it is visible before setting the src.
				//This increases compatability with pages using DOM dependent JavaScript.
				$('#cboxIframeTemp').after("<iframe id='cboxIframe' name='iframe_"+new Date().getTime()+"' frameborder=0 src='"+(settings.href || element.href)+"' />").remove();
				
				$loadingOverlay.hide();
				$loadingGraphic.hide();
				$slideshow.hide();
				
				if ($related.length>1) {
					$current.html(settings.current.replace(/\{current\}/, index+1).replace(/\{total\}/, $related.length));
					$next.html(settings.next);
					$prev.html(settings.previous);
					
					$().bind('keydown', cbox_key);
					
					if(settings.slideshow){
						$slideshow.show();
					}
				} else {
					$current.hide();
					$next.hide();
					$prev.hide();
				}
				
				$title.html(settings.title || element.title);
				
				$.event.trigger(cbox_complete);
				
				if (callback) {
					callback.call(element);
				}
				
				if (settings.transition === 'fade'){
					$cbox.fadeTo(speed, 1, function(){
						if(isIE){$cbox[0].style.removeAttribute("filter");}
					});
				}
				
				$window.bind(cbox_resize, function(){
					cboxPublic.position(mWidth, mHeight, 0);
				});
			});
		}
		
		if((settings.transition === 'fade' && $cbox.fadeTo(speed, 0, function(){setPosition(0);})) || setPosition(speed)){}
		
		// Preloads images within a rel group
		if (settings.preloading && $related.length>1) {
			prev = index > 0 ? $related[index-1] : $related[$related.length-1];
			next = index < $related.length-1 ? $related[index+1] : $related[0];
			nextSrc = $(next).data(colorbox).href || next.href;
			prevSrc = $(prev).data(colorbox).href || prev.href;
			
			if(isImage(nextSrc)){
				$('<img />').attr('src', nextSrc);
			}
			
			if(isImage(prevSrc)){
				$('<img />').attr('src', prevSrc);
			}
		}
	};

	cboxPublic.load = function () {
		var height, width, href, loadingElement, resize = cboxPublic.resize;
		
		element = $related[index];
		
		settings = $(element).data(colorbox);
		
		//convert functions to static values
		process();
		
		$.event.trigger(cbox_load);
		
		// Evaluate the height based on the optional height and width settings.
		height = settings.height ? setSize(settings.height, 'y') - loadedHeight - interfaceHeight : FALSE;
		width = settings.width ? setSize(settings.width, 'x') - loadedWidth - interfaceWidth : FALSE;
		
		href = settings.href || element.href;
		
		$loadingOverlay.show();
		$loadingGraphic.show();
		$close.show();
		
		//Re-evaluate the maximum dimensions based on the optional maxheight and maxwidth.
		if(settings.maxHeight){
			maxHeight = settings.maxHeight ? setSize(settings.maxHeight, 'y') - loadedHeight - interfaceHeight : FALSE;
			height = height && height < maxHeight ? height : maxHeight;
		}
		if(settings.maxWidth){
			maxWidth = settings.maxWidth ? setSize(settings.maxWidth, 'x') - loadedWidth - interfaceWidth : FALSE;
			width = width && width < maxWidth ? width : maxWidth;
		}
		
		maxHeight = height;
		maxWidth = width;
		
		if (settings.inline) {
			$('<div id="cboxInlineTemp" />').hide().insertBefore($(href)[0]).bind(cbox_load+' '+cbox_cleanup, function(){
				$loaded.children().insertBefore(this);
				$(this).remove();
			});
			resize($(href).wrapAll('<div/>').parent());
		} else if (settings.iframe) {
			resize($("<div><div id='cboxIframeTemp' /></div>"));
		} else if (settings.html) {
			resize($('<div/>').html(settings.html));
		} else if (isImage(href)){
			loadingElement = new Image();
			loadingElement.onload = function(){
				loadingElement.onload = null;
				
				if((maxHeight || maxWidth) && settings.scalePhotos){
					var width = this.width,
					height = this.height,
					percent = 0,
					that = this,
					setResize = function(){
						height += height * percent;
						width += width * percent;
						that.height = height;
						that.width = width;	
					};
					
					if( maxWidth && width > maxWidth ){
						percent = (maxWidth - width) / width;
						setResize();
					}
					if( maxHeight && height > maxHeight ){
						percent = (maxHeight - height) / height;
						setResize();
					}
				}
				
				resize($("<div />").css({width:this.width, height:this.height}).append($(this).css({width:this.width, height:this.height, display:"block", margin:"auto", border:0}).attr('id', 'cboxPhoto')));
				
				if($related.length > 1){
					$(this).css({cursor:'pointer'}).click(cboxPublic.next);
				}
				
				if(isIE){
					this.style.msInterpolationMode='bicubic';
				}
			};
			loadingElement.src = href;
		} else {
			$('<div />').load(href, '_=' + new Date().getTime(),function(data, textStatus){
				if(textStatus === "success"){
					resize($(this));
				} else {
					resize($("<p>Request unsuccessful.</p>"));
				}
			});
		}
	};

	//navigates to the next page/image in a set.
	cboxPublic.next = function () {
		index = index < $related.length-1 ? index+1 : 0;
		cboxPublic.load();
	};
	
	cboxPublic.prev = function () {
		index = index > 0 ? index-1 : $related.length-1;
		cboxPublic.load();
	};

	cboxPublic.slideshow = function () {
		var stop, timeOut, className = 'cboxSlideshow_';
		
		$slideshow.bind(cbox_cleanup, function(){
			clearTimeout(timeOut);
			$slideshow.unbind(cbox_complete+' '+cbox_load+" click");
		});
		
		function start(){
			$slideshow
			.text(settings.slideshowStop)
			.bind(cbox_complete, function(){
				timeOut = setTimeout(cboxPublic.next, settings.slideshowSpeed);
			})
			.bind(cbox_load, function(){
				clearTimeout(timeOut);	
			}).one("click", function(){
				stop();
				$(this).removeClass(hover);
			});
			$cbox.removeClass(className+"off").addClass(className+"on");
		}
		
		stop = function(){
			clearTimeout(timeOut);
			$slideshow
			.text(settings.slideshowStart)
			.unbind(cbox_complete+' '+cbox_load)
			.one("click", function(){
				start();
				timeOut = setTimeout(cboxPublic.next, settings.slideshowSpeed);
				$(this).removeClass(hover);
			});
			$cbox.removeClass(className+"on").addClass(className+"off");
		};
		
		if(settings.slideshow && $related.length>1){
			if(settings.slideshowAuto){
				start();
			} else {
				stop();
			}
		}
	};

	//Note: to use this within an iframe use the following format: parent.$.fn.colorbox.close();
	cboxPublic.close = function () {
		$.event.trigger(cbox_cleanup);
		open = FALSE;
		$().unbind('keydown', cbox_key).unbind("keydown.cbox_close");
		$window.unbind(cbox_resize+" "+cbox_ie6);
		$overlay.css({cursor: 'auto'}).fadeOut('fast');
		
		$cbox
		.stop(TRUE, FALSE)
		.fadeOut('fast', function () {
			$loaded.remove();
			$cbox.css({'opacity': 1});
			$content.children().hide();
			$.event.trigger(cbox_closed);
		});
	};

	cboxPublic.element = function(){ return element; };

	cboxPublic.settings = defaults;

	// Initializes ColorBox when the DOM has loaded
	$(cboxPublic.init);

}(jQuery));
