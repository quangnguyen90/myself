/*-----------------------------------------------------------------------------------*/
/*	RETINA.JS
/*-----------------------------------------------------------------------------------*/
(function () {
    function t(e) {
        this.path = e;
        var t = this.path.split("."),
            n = t.slice(0, t.length - 1).join("."),
            r = t[t.length - 1];
        this.at_2x_path = n + "@2x." + r
    }
    function n(e) {
        this.el = e, this.path = new t(this.el.getAttribute("src"));
        var n = this;
        this.path.check_2x_variant(function (e) {
            e && n.swap()
        })
    }
    var e = typeof exports == "undefined" ? window : exports;
    e.RetinaImagePath = t, t.confirmed_paths = [], t.prototype.is_external = function () {
        return !!this.path.match(/^https?\:/i) && !this.path.match("//" + document.domain)
    }, t.prototype.check_2x_variant = function (e) {
        var n, r = this;
        if (this.is_external()) return e(!1);
        if (this.at_2x_path in t.confirmed_paths) return e(!0);
        n = new XMLHttpRequest, n.open("HEAD", this.at_2x_path), n.onreadystatechange = function () {
            return n.readyState != 4 ? e(!1) : n.status >= 200 && n.status <= 399 ? (t.confirmed_paths.push(r.at_2x_path), e(!0)) : e(!1)
        }, n.send()
    }, e.RetinaImage = n, n.prototype.swap = function (e) {
        function n() {
            t.el.complete ? (t.el.setAttribute("width", t.el.offsetWidth), t.el.setAttribute("height", t.el.offsetHeight), t.el.setAttribute("src", e)) : setTimeout(n, 5)
        }
        typeof e == "undefined" && (e = this.path.at_2x_path);
        var t = this;
        n()
    }, e.devicePixelRatio > 1 && (window.onload = function () {
        var e = document.getElementsByTagName("img"),
            t = [],
            r, i;
        for (r = 0; r < e.length; r++) i = e[r], t.push(new n(i))
    })
})();
/*-----------------------------------------------------------------------------------*/
/*	ANCHOR SCROLL
/*-----------------------------------------------------------------------------------*/
/**
* jQuery.LocalScroll - Animated scrolling navigation, using anchors.
* Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
* Dual licensed under MIT and GPL.
* Date: 3/11/2009
* @author Ariel Flesler
* @version 1.2.7
**/
(function($){var l=location.href.replace(/#.*/,'');var g=$.localScroll=function(a){$('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=$.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;$(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};$.fn.localScroll=function(b){b=$.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=$([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||$(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=$(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=$('<a> </a>').attr(j,d).css({position:'absolute',top:$(window).scrollTop(),left:$(window).scrollLeft()});f[j]='';$('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.5 BETA
 */
;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
$(document).ready(function(){ 
    $('.scroll,.nav-collapse .nav').localScroll({
	    offset: {top:-90, left:0}
    });
    $('.nav-collapse .nav a').click(function () { $(".nav-collapse").collapse("hide") });
  });

/*-----------------------------------------------------------------------------------*/
/*	FULLSCREEN SLIDER
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
	if ($.fn.cssOriginal != undefined) $.fn.css = $.fn.cssOriginal;
	$('.fullwidthbanner').revolution({
							delay:9000,
							startwidth:1170,
							startheight:750,

							onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

							thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
							thumbHeight:50,
							thumbAmount:3,

							hideThumbs:200,
							navigationType:"bullet",				// bullet, thumb, none
							navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

							navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


							navigationHAlign:"center",				// Vertical Align top,center,bottom
							navigationVAlign:"bottom",					// Horizontal Align left,center,right
							navigationHOffset:0,
							navigationVOffset:40,

							soloArrowLeftHalign:"left",
							soloArrowLeftValign:"center",
							soloArrowLeftHOffset:20,
							soloArrowLeftVOffset:0,

							soloArrowRightHalign:"right",
							soloArrowRightValign:"center",
							soloArrowRightHOffset:20,
							soloArrowRightVOffset:0,

							touchenabled:"on",						// Enable Swipe Function : on/off



							stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
							stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

							hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
							hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
							hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


							fullWidth:"on",

							shadow:0

	});	
});
/*-----------------------------------------------------------------------------------*/
/*	FORM
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    $('.forms').dcSlickForms();
});
$(document).ready(function () {
    $('.comment-form input[title], .comment-form textarea').each(function () {
        if ($(this).val() === '') {
            $(this).val($(this).attr('title'));
        }

        $(this).focus(function () {
            if ($(this).val() == $(this).attr('title')) {
                $(this).val('').addClass('focused');
            }
        });
        $(this).blur(function () {
            if ($(this).val() === '') {
                $(this).val($(this).attr('title')).removeClass('focused');
            }
        });
    });
});
/*-----------------------------------------------------------------------------------*/
/*	GRID BLOG
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    var $container = $('.grid-blog');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.post'
        });
    });
    $(window).on('resize', function(){
    	$('.grid-blog').isotope('reLayout')
	});
});
/*-----------------------------------------------------------------------------------*/
/*	SHOWCASE
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    var $container = $('.showcase-wrapper .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.showcase-wrapper .item',
            layoutMode: 'fitRows'
        });
    });

    $('.showcase-wrapper .filter li a').click(function () {

        $('.showcase-wrapper .filter li a').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	LIGHTBOX
/*-----------------------------------------------------------------------------------*/
$(document).ready(function () {
    var $container = $('.lightbox-wrapper .items');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.lightbox-wrapper .item',
            layoutMode: 'fitRows'
        });
    });

    $('.lightbox-wrapper .filter li a').click(function () {

        $('.lightbox-wrapper .filter li a').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });

        return false;
    });
});
/*-----------------------------------------------------------------------------------*/
/*	CONTENT SLIDER
/*-----------------------------------------------------------------------------------*/
/**************************************************************************
 * jQuery Plugin for Content Slider
 * @version: 1.0
 * @requires jQuery v1.8 or later
 * @author ThunderBudies
 **************************************************************************/

$(document).ready(function () {


	 var speed=600;			// SLIDE OUT THE MAIN CONTENT
	 var speed2=500;			// FADE IN THE NEW CONTENTS


	 jQuery.fn.extend({
        unwrapInner: function (selector) {
            return this.each(function () {
                var t = this,
                    c = $(t).children(selector);
                if (c.length === 1) {
                    c.contents().appendTo(t);
                    c.remove();
                }
            });
        }
    });
    
    jQuery('.dropdown-menu.filter a').each(function(i) {
    	jQuery(this).click(function() {
   	
			jQuery('.container.box.showcase-wrapper').css({minHeight:'0px'});
		});
    });




	///////////////////////////
	// GET THE URL PARAMETER //
	///////////////////////////
	function getUrlVars(hashdivider)
			{
				var vars = [], hash;
				var hashes = window.location.href.slice(window.location.href.indexOf(hashdivider) + 1).split('_');
				for(var i = 0; i < hashes.length; i++)
				{
					hashes[i] = hashes[i].replace('%3D',"=");
					hash = hashes[i].split('=');
					vars.push(hash[0]);
					vars[hash[0]] = hash[1];
				}
				return vars;
			}
	////////////////////////
	// GET THE BASIC URL  //
	///////////////////////
    function getAbsolutePath() {
		    var loc = window.location;
		    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
    }

    //////////////////////////
	// SET THE URL PARAMETER //
	///////////////////////////
    function updateURLParameter(paramVal){
	    	var baseurl = window.location.pathname.split("#")[0];
	    	var url = baseurl.split("#")[0];
	    	if (paramVal==undefined) paramVal="";

	  		par='#'+paramVal;

			if (par=="#") par=" ";
		    window.location.replace(url+par);
	}


    var items = jQuery('.showcase-wrapper .item a');
    var deeplink = getUrlVars("#");

	 jQuery.ajaxSetup({
        // Disable caching of AJAX responses */
        cache: false
    });


    // FIRST ADD THE HANDLING ON THE DIFFERENT PORTFOLIO ITEMS
    items.slice(0, items.length).each(function (i) {
        var item = jQuery(this);
        item.data('index', i);

		var hashy = window.pageYOffset;


        if (jQuery.support.leadingWhitespace == false){
        	var conurl = jQuery(this).data('contenturl');
        	item.attr('href',conurl);
        } else {

				// THE HANDLING IN CASE ITEM IS CLICKED
				item.click(function () {

					hashy = window.pageYOffset;

					jQuery('.portfolio-filter.btn-group.pull-right.open').removeClass("open");

					var cur = item.data('index');
					jQuery('body').data('curPortfolio',cur);

					var hashy = window.pageYOffset;

					var grid = jQuery('.showcase-wrapper');

					// PREPARE THE CONTAINER FOR LOAD / REMOVE ITEMS
					grid.css({'minHeight':grid.outerHeight()+"px",'maxHeight':grid.outerHeight()+"px", 'position':'relative','overfow':'hidden'});
					grid.wrapInner('<div class="grid-remove"></div>');

					// REMOVE THE GRID
					var gr = grid.find('.grid-remove');
					gr.css({width:grid.outerWidth()+"px",height:grid.height()});
					gr.animate({'marginLeft':'-120%'},{duration:speed,queue:false, easing:"easeInOutCubic"});
					gr.fadeOut(speed+500);

					grid.append('<div class="grid-newcontent"></div>');
					grid.find('.grid-newcontent').fadeOut(0);
					grid.append('<div class="grid-loader"></div>');



					 //ADD A NEW CONTENT WRAPPER
					var conurl = jQuery(this).data('contenturl');
					var concon = jQuery(this).data('contentcontainer');
					updateURLParameter(conurl);

					var extraclass = "";

					clearTimeout(jQuery('body').data('minhreset'));
					// PRELOAD THE NEW ITEM
					setTimeout(function () {
						if (conurl != undefined && conurl.length > 0) {

							jQuery('.grid-newcontent').load(conurl + " " + concon, function () {

								//alert(jQuery('body,html').scrollTop()+"  "+grid.offset().top-60);
								
								jQuery('body,html').animate({
									scrollTop: (grid.offset().top-60) + "px"
								}, {
									duration: 600,
									queue: false
								});


								var gnc = grid.find('.grid-newcontent');
								gnc.fadeIn(speed2);
								//grid.animate({'maxHeight':gnc.innerHeight()+"px"});
								grid.css({'maxHeight':'none'});
								jQuery('body').data('minhreset',setTimeout(function() {
									grid.transition({'minHeight':'0px','maxHeight':'none',duration:400});
								},1500));
								setTimeout(function() {
									var callback = new Function(item.data('callback'));
									callback();
								},speed2+100);
								jQuery('.grid-loader').fadeOut(speed2)
								setTimeout(function() {
									jQuery('.grid-loader').remove();
								},speed2);
							});
						}
					}, speed + 200);



					return false;

				});
			if (i==0) {
						// SET THE BASIC BUTTON FUNCTIONS
						jQuery('.btn.back').live("click",function() {
							updateURLParameter("!");
							jQuery('.portfolio-filter.btn-group.pull-right.open').removeClass("open");

							var grid = jQuery('.showcase-wrapper');
							clearTimeout(jQuery('body').data('minhreset'));

							//alert(jQuery('body,html').scrollTop()+"  "+grid.offset().top-60);
							jQuery('body,html').animate({
								scrollTop: (grid.offset().top-60) + "px"
							}, {
								duration: 300,
								queue: false
							});

							var gr = grid.find('.grid-remove');
							grid.find('.grid-newcontent').fadeOut(speed2);
							setTimeout(function() {
								grid.find('.grid-newcontent').remove();
								grid.find('.grid-remove').find('div').first().unwrap();
								grid.transition({'minHeight':'0px',duration:300});
								var $container = $('.items').isotope('reLayout');
							},speed2+100);
							grid.css({'minHeight':gr.height()+"px", 'maxHeight':'none'});
							gr.animate({'marginLeft':'0'},{duration:speed,queue:false, easing:"easeInOutCubic"});
							gr.fadeIn(speed+800);
							setTimeout(function() {
								var $container = $('.items').isotope('reLayout');
							},100);
							return false;
						});

						jQuery('.nav-next-item').live('click',function() {
								var cur = jQuery('body').data('curPortfolio');
								cur = cur + 1;
								if (cur > items.length) cur = 0;
								jQuery('body').data('curPortfolio',cur);
								var nextitem;
								items.slice(cur, cur + 1).each(function () {
									nextitem = jQuery(this);
								});
								swapContents(nextitem);
								return false;
						});

						jQuery('.nav-prev-item').live('click',function() {
								var cur = jQuery('body').data('curPortfolio');
								cur = cur - 1;
								if (cur < 0) cur = items.length - 1;
								jQuery('body').data('curPortfolio',cur);
								var nextitem;
								items.slice(cur, cur + 1).each(function () {
									nextitem = jQuery(this);
								});
								swapContents(nextitem);
								return false;
						});
					}
		}
	});

	var firstfound=0;
    items.slice(0, items.length).each(function (i) {
     var item=jQuery(this);
   	 if (deeplink!=undefined && deeplink.length>0 && deeplink == jQuery(this).data('contenturl')) {
		   	 	if (firstfound==0) {

	  	 			setTimeout(function() {item.click();},2000);
	  	 			firstfound=1;
	  	 		}
    	    }
   });

	function swapContents(nextitem) {

			clearTimeout(jQuery('body').data('minhreset'));

			var grid = jQuery('.showcase-wrapper');
			var gr = grid.find('.grid-remove');

			grid.append('<div class="grid-loader"></div>');

			grid.find('.grid-newcontent').fadeOut(speed2/2);
			grid.css({'minHeight':gr.height()+"px", 'maxHeight':'none'});

			setTimeout(function() {

					//ADD A NEW CONTENT WRAPPER
					var conurl = nextitem.data('contenturl');
					var concon = nextitem.data('contentcontainer');
					updateURLParameter(conurl);



					var extraclass = "";


					if (conurl != undefined && conurl.length > 0) {

							jQuery('.grid-newcontent').load(conurl + " " + concon, function () {
								var gnc = grid.find('.grid-newcontent');
								gnc.fadeIn(speed2);
								//grid.animate({'maxHeight':gnc.innerHeight()+"px"});
								grid.css({'maxHeight':'none'});
								jQuery('body').data('minhreset',setTimeout(function() {
									grid.css({'minHeight':'auto','maxHeight':'none'});
								},2500));

								setTimeout(function() {
									var callback = new Function(nextitem.data('callback'));
									callback();
								},speed2+100);
								jQuery('.grid-loader').fadeOut(speed2)
								setTimeout(function() {
									jQuery('.grid-loader').remove();
								},speed2);
							});
						}
			},speed2+100);
	}

});
/*-----------------------------------------------------------------------------------*/
/*	CALL PORTFOLIO SCRIPTS
/*-----------------------------------------------------------------------------------*/

function callPortfolioScripts() {

    jQuery('.player').fitVids();
    
    $('.portfolio-banner').revolution({
		delay: 9000,
		startheight: 600,
		startwidth: 1170,
		hideThumbs: 200,
		navigationType: "bullet",
		// bullet, thumb, none
		navigationArrows: "verticalcentered",
		// nexttobullets, solo (old name verticalcentered), none
		navigationStyle: "round",
		// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
		navigationHAlign: "center",
		// Vertical Align top,center,bottom
		navigationVAlign: "bottom",
		// Horizontal Align left,center,right
		navigationHOffset: 0,
		navigationVOffset: 20,
		soloArrowLeftHalign: "left",
		soloArrowLeftValign: "center",
		soloArrowLeftHOffset: 20,
		soloArrowLeftVOffset: 0,
		soloArrowRightHalign: "right",
		soloArrowRightValign: "center",
		soloArrowRightHOffset: 20,
		soloArrowRightVOffset: 0,
		touchenabled: "on",
		// Enable Swipe Function : on/off
		onHoverStop: "on",
		// Stop Banner Timet at Hover on Slide on/off
		stopAtSlide: -1,
		// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
		stopAfterLoops: -1,
		// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
		hideCaptionAtLimit: 0,
		// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
		hideAllCaptionAtLilmit: 0,
		// Hide all The Captions if Width of Browser is less then this value
		hideSliderAtLimit: 0,
		// Hide the whole slider, and stop also functions if Width of Browser is less than this value
		shadow: 0,
		//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
		fullWidth: "off" // Turns On or Off the Fullwidth Image Centering in FullWidth Modus
	});	

};
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO SLIDER
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
	if ($.fn.cssOriginal != undefined) $.fn.css = $.fn.cssOriginal;
	$('.portfolio-banner').revolution({
		delay: 9000,
		startheight: 600,
		startwidth: 1170,
		hideThumbs: 200,
		navigationType: "bullet",
		// bullet, thumb, none
		navigationArrows: "verticalcentered",
		// nexttobullets, solo (old name verticalcentered), none
		navigationStyle: "round",
		// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
		navigationHAlign: "center",
		// Vertical Align top,center,bottom
		navigationVAlign: "bottom",
		// Horizontal Align left,center,right
		navigationHOffset: 0,
		navigationVOffset: 20,
		soloArrowLeftHalign: "left",
		soloArrowLeftValign: "center",
		soloArrowLeftHOffset: 20,
		soloArrowLeftVOffset: 0,
		soloArrowRightHalign: "right",
		soloArrowRightValign: "center",
		soloArrowRightHOffset: 20,
		soloArrowRightVOffset: 0,
		touchenabled: "on",
		// Enable Swipe Function : on/off
		onHoverStop: "on",
		// Stop Banner Timet at Hover on Slide on/off
		stopAtSlide: -1,
		// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
		stopAfterLoops: -1,
		// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
		hideCaptionAtLimit: 0,
		// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
		hideAllCaptionAtLilmit: 0,
		// Hide all The Captions if Width of Browser is less then this value
		hideSliderAtLimit: 0,
		// Hide the whole slider, and stop also functions if Width of Browser is less than this value
		shadow: 0,
		//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
		fullWidth: "on" // Turns On or Off the Fullwidth Image Centering in FullWidth Modus
	});	
});
/*-----------------------------------------------------------------------------------*/
/*	DRIBBBLE
/*-----------------------------------------------------------------------------------*/

$(document).ready(function () {		
		
	$.jribbble.getShotsByPlayerId('gustavholtz', function (playerShots) {
		var html = [];
		
		$.each(playerShots.shots, function (i, shot) {
			html.push('<li class="thumb"><figure class="overlay"><a href="' + shot.url + '" target="_blank">');
			html.push('<img src="' + shot.image_url + '" ');
			html.push('alt="' + shot.title + '"></figure></a></li>');
		});
		
		$('.shots.thumbs').html(html.join(''));
		
		$('.overlay a').prepend('<span class="more"></span>');

	}, {page: 1, per_page: 8});
	
	
});
/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIALS
/*-----------------------------------------------------------------------------------*/  
 $(document).ready( function() {
      $('.testimonials-tab').easytabs({
	      animationSpeed: 500,
	      updateHash: false,
	      cycle: 5000
      });
      
    });
/*-----------------------------------------------------------------------------------*/
/*	SHOWBIZ
/*-----------------------------------------------------------------------------------*/   
jQuery(document).ready(function() {
          jQuery('.showbiz-container.landscape').showbizpro({
            dragAndScroll:"on",
            visibleElementsArray:[2,2,2,1],
            mediaMaxHeight:[0,0,0,0],
            carousel:"off",
            heightOffsetBottom:0,
            rewindFromEnd:"off",
            autoPlay:"off",
            delay:2000,           
            speed:250
          });
          
          jQuery('.showbiz-container.portrait').showbizpro({
            dragAndScroll:"on",
            visibleElementsArray:[4,3,3,2],
            mediaMaxHeight:[0,0,0,0],
            carousel:"off",
            heightOffsetBottom:0,
            rewindFromEnd:"off",
            autoPlay:"off",
            delay:2000,           
            speed:250
          });
});
/*-----------------------------------------------------------------------------------*/
/*	IMAGE HOVER
/*-----------------------------------------------------------------------------------*/				
$(document).ready(function() {
	$('.overlay a').prepend('<span class="more"></span>');
});
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
      $('.js-activated').dropdownHover().dropdown();
    });
/*-----------------------------------------------------------------------------------*/
/*	PRETTIFY
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function () {
window.prettyPrint && prettyPrint()
});
/*-----------------------------------------------------------------------------------*/
/*	PARALLAX MOBILE
/*-----------------------------------------------------------------------------------*/
$(document).ready(function() {
if( navigator.userAgent.match(/Android/i) || 
	navigator.userAgent.match(/webOS/i) ||
	navigator.userAgent.match(/iPhone/i) || 
	navigator.userAgent.match(/iPad/i)|| 
	navigator.userAgent.match(/iPod/i) || 
	navigator.userAgent.match(/BlackBerry/i)){
			$('.parallax').addClass('mobile');
}
});
/*-----------------------------------------------------------------------------------*/
/*	DATA REL
/*-----------------------------------------------------------------------------------*/
$('a[data-rel]').each(function() {
    $(this).attr('rel', $(this).data('rel'));
});