var QueryLoader = {
	/*
	 * QueryLoader		Preload your site before displaying it!
	 * Author:			Gaya Kessler
	 * Date:			23-09-09
	 * URL:				http://www.gayadesign.com
	 * Version:			1.0
	 * 
	 * A simple jQuery powered preloader to load every image on the page and in the CSS
	 * before displaying the page to the user.
	 */
	
	overlay: "",
	loadBar: "",
	preloader: "",
	items: new Array(),
        tmp_items: new Array(),
	doneStatus: 0,
	doneNow: 0,
	selectorPreload: "body",
	ieLoadFixTime: 2000,
	ieTimeout: "",
		
	init: function() {
		if (navigator.userAgent.match(/MSIE (\d+(?:\.\d+)+(?:b\d*)?)/) == "MSIE 6.0,6.0") {
			//break if IE6			
			return false;
		}
		if (QueryLoader.selectorPreload == "body") {
			QueryLoader.spawnLoader();
			QueryLoader.getImages(QueryLoader.selectorPreload);
			QueryLoader.createPreloading();
		} else {
			$(document).ready(function() {
				QueryLoader.spawnLoader();
				QueryLoader.getImages(QueryLoader.selectorPreload);
				QueryLoader.createPreloading();
			});
		}
		
		//help IE drown if it is trying to die :)
		QueryLoader.ieTimeout = setTimeout("QueryLoader.ieLoadFix()", QueryLoader.ieLoadFixTime);
	},
	
	ieLoadFix: function() {
		var ie = navigator.userAgent.match(/MSIE (\d+(?:\.\d+)+(?:b\d*)?)/);
		if (ie[0].match("MSIE")) {
			while ((100 / QueryLoader.doneStatus) * QueryLoader.doneNow < 100) {
				QueryLoader.imgCallback();
			}
		}
	},
	
	imgCallback: function() {
		QueryLoader.doneNow ++;
		QueryLoader.animateLoader();
	},
	
	getImages: function(selector) {
		var everything = $(selector).find("*:not(script)").each(function() {
			var url = "";
			var obj = new Object();
                        
			if ($(this).css("background-image") != "none") {
				url = $(this).css("background-image");
			} else if (typeof($(this).attr("src")) != "undefined") {
				url = $(this).attr("src");
			}
			
			url = url.replace("url(\"", "");
			url = url.replace("url(", "");
			url = url.replace("\")", "");
			url = url.replace(")", "");
			if (url.length > 0) {
                                obj['url'] = url;
				QueryLoader.items .push(obj);
			}
		});
	},
	
	createPreloading: function() {
		QueryLoader.preloader = $("<div></div>").appendTo(QueryLoader.selectorPreload);
		$(QueryLoader.preloader).css({
			height: 	"0px",
			width:		"0px",
			overflow:	"hidden"
		});
		
		var length = QueryLoader.items.length; 
		QueryLoader.doneStatus = length;
                for (var i = 0; i < length; i++) {
			var imgLoad = $("<img></img>");
			$(imgLoad).attr("src", QueryLoader.items[i]['url']);
			$(imgLoad).unbind("load");
			$(imgLoad).bind("load", function() { 
				QueryLoader.imgCallback();
			});
			$(imgLoad).appendTo($(QueryLoader.preloader));
		}
	},

	spawnLoader: function() {
		if (QueryLoader.selectorPreload == "body") {
			var height = $(window).height();
			var width = $(window).width();
			var position = "fixed";
		} else {
			var height = $(QueryLoader.selectorPreload).outerHeight();
			var width = $(QueryLoader.selectorPreload).outerWidth();
			var position = "absolute";
		}
		var left = $(QueryLoader.selectorPreload).offset()['left'];
		var top = $(QueryLoader.selectorPreload).offset()['top'];
		
		QueryLoader.overlay = $("<div></div>").appendTo($(QueryLoader.selectorPreload));
		$(QueryLoader.overlay).addClass("QOverlay");
		$(QueryLoader.overlay).css({
			position: position,
			top: top,
			left: left,
			width: width + "px",
			height: height + "px"
		});
		
		QueryLoader.loadBar = $("<div></div>").appendTo($(QueryLoader.overlay));
		$(QueryLoader.loadBar).addClass("QLoader");
		
		$(QueryLoader.loadBar).css({
			position: "relative",
			top: "50%",
			width: "0%"
		});
		
		QueryLoader.loadAmt = $("<div>0%</div>").appendTo($(QueryLoader.overlay));
		$(QueryLoader.loadAmt).addClass("QAmt");
		
		$(QueryLoader.loadAmt).css({
			position: "relative",
			top: "50%",
			left: "50%"
		});
	},
	
	animateLoader: function() {
		var perc = (100 / QueryLoader.doneStatus) * QueryLoader.doneNow;
		if (perc > 99) {
			$(QueryLoader.loadAmt).html("100%");
			$(QueryLoader.loadBar).stop().animate({
				width: perc + "%"
			}, 500, "linear", function() { 
				QueryLoader.doneLoad();
			});
		} else {
			$(QueryLoader.loadBar).stop().animate({
				width: perc + "%"
			}, 500, "linear", function() { });
			$(QueryLoader.loadAmt).html(Math.floor(perc)+"%");
		}
	},
	
	doneLoad: function() {
		//prevent IE from calling the fix
		clearTimeout(QueryLoader.ieTimeout);
		var height;
		//determine the height of the preloader for the effect
		if (QueryLoader.selectorPreload == "body") {
			height = $(window).height();
		} else {
			height = $(QueryLoader.selectorPreload).outerHeight();
		}
		
		//The end animation, adjust to your likings
		$(QueryLoader.loadBar).animate({
			height: height + "px",
			top: 0
		}, 140, "linear", function() {
			$(QueryLoader.overlay).fadeOut(120);
			$(QueryLoader.preloader).remove();
		}); 
}
}
