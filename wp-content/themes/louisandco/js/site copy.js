jQuery(document).ready(function ($) {

/* 
========================================================================================================================

	Homepage Images

======================================================================================================================== */

$('#menu-main > li').mouseover(function() {
	//remove all images
	$(".background-images img").removeClass('opacity100');
	//display feature image
	$(".background-images img."+ $(this).attr('id') ).addClass('opacity100');
})



/* Menu - move dom element for main menu  */
if($('.page-template-page-images-php')){
	if( $('#menu-main > .current-menu-item').index() >= 2 ){
		$("#menu-main li:eq(0)").after($('#menu-main > .current-menu-item'));
	}
}

/* Menu Hover */
$('#menu-main').hover(
	function() {
	$("header").css('height', '400px');
},
function () {
    $("header").css('height', '113px');
  }
);


/* ========================================================================================================================

	Scroll to 

======================================================================================================================== */

  jQuery('.scroll').bind('click', function (event) {
    var jQueryanchor = jQuery(this);
    jQuery('html, body').stop().animate({
      scrollTop: 0
    }, 1000, 'easeInOutExpo');

    if (event.preventDefault) {
      event.preventDefault();
    } else {
      event.returnValue = false;
    }
  });


  /* ========================================================================================================================
	
	Prevent Default //Function to prevent Default Events
	
======================================================================================================================== */

  function pde(e) {
    if (e.preventDefault)
      e.preventDefault();
    else
      e.returnValue = false;
  }

  $(".null").click(function (e) {
    pde(e);
  });



  /* ========================================================================================================================
	
	Isotope
	
======================================================================================================================== */
var $container = $('.isotope');	
var $window = $(window);																	// initalise isotope
var galleriaReady = false;

function isotopeSetup(){
	$container.imagesLoaded( function(){
	  $container.isotope({
	  	itemSelector : '.itemPack',
	  });
	  isotopeEvents();
	});
}

function isotopeEvents(){
	 // Galleria click Event
	 $('.itemPack').on( 'click', function(e){
	 	var index = $(this).index();
	 	$('#galleria').fadeIn('medium', function() {
			
			if(galleriaReady){
				$('#galleria').data('galleria').show( index );
				$('.isotope').hide();
			}else{
				runGalleria(index)
			}
		})
	 });
}

$('.secondMenu a').on('click',function(e){												// bind second menu click event
	var selector = $(this).text().toLowerCase();										// get menu text, this should relate to tag
	if(selector.search( 'download' ) != 0){													// check if download is included in text
		pde(e);																												// crossbrowser prevent defaultChecked
		$('.secondMenu a').removeClass('selected');										// remove all selected class
		$(this).addClass('selected');
		if(selector.search( 'all' ) == 0){
			$container.isotope({ filter: '*' });
		}else{
			$container.isotope({ filter: '.itemPack'+'.'+ selector });
		}
		
	}
  
});

function runGalleria(indexVar){



	Galleria.loadTheme('http://localhost/clients/louisandco/wp-content/themes/louisandco/external/classic/galleria.classic.min.js');
	Galleria.configure({
		transition: 'fade',
	  imageCrop: false,
	  responsive:true,
	  showInfo:false,
	  showCounter:true,
	  thumbnails:false,
	  trueFullscreen:true,
	  show:indexVar,
	  extend: function() {
			// create the button and append it
	    this.addElement('button').appendChild('container','button');
	
	    // Add text & click event using jQuery
	    this.$('button').append('<span class="icon-closeBtn"></span>').click(function() {
	      $('.isotope').show();
	      $('#galleria').fadeOut();
	    });
		}
	});
	Galleria.run('#galleria', {
    dataSource: ajaxData[0].large,
	});																																// this runs the first time an image is clicked
	
	galleriaReady = true;																					// boolean to check when gallery ready
	$('#galleria').css('bottom','0px').hide()											// change the position of the gallery
	$('#galleria').css('right','0px').fadeIn()										// fade in the gallery
	$('.isotope').hide();																					// hide the background

}

//Bind Keys
$(document).bind("keydown", function(e){
  if(e.keyCode== 37){
    $('#galleria').data('galleria').prev();
  }else if(e.keyCode== 38){
    $('#galleria').data('galleria').next();
  }else if(e.keyCode== 39){
    $('#galleria').data('galleria').next();
  }else if(e.keyCode== 40){
    $('#galleria').data('galleria').prev();
  }else if(e.keyCode== 27){																		// esc key		
  	$('.isotope').show();
    $('#galleria').fadeOut();
  }else{
    return true;
  }
  return false;
});






  /* ========================================================================================================================
	
	Sub Menu Filtering - homepage
	
======================================================================================================================== */



$('#menu-main .sub-menu a').on('click',function(e){					// only bind click event on homepage
	var str = $(this).text().toLowerCase();													// add text to string
	if(str.search( 'download' ) != 0){															// check if download is included in text
		pde(e); 																												// prevent default
		var innerText = $(this).text().toLowerCase(); 									// get inner text of a tag
		var url = $(this).parent().parent().parent().children('a').attr('href');
		url += '?filter=' + innerText; 																	// assign filter to url
		window.location.assign(url); 																		// load page with new url - includes filter
	}
})

function pageVarCheck(){

	if ( (loadPageVar('filter') == '') ) {														// check if pagevar has been sent
		$container.isotope({ filter: '*' });														// if no filter dont filter any
	}else{
		$container.isotope({ filter: '.'+ loadPageVar('filter') });     // filter isotope via pagevar 
		$('.current-menu-item .sub-menu a:contains('+loadPageVar('filter').toUpperCase()+')' ).addClass('selected') //set the menu item to selected
	}
	
	function loadPageVar(sVar) {																			// returns pagevar is it exists
		return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
	}
}




  /* ========================================================================================================================
	
	Ajax
	
======================================================================================================================== */



  function galleryAjax(pagename,trackCount) {
   
   jQuery.ajax({
     url: 'http://localhost/clients/louisandco/wp-admin/admin-ajax.php',
     data: {
       'action': 'do_ajax',
       'fn': 'get_images',
       'count': trackCount,
       'page':pagename
     },
     dataType: 'JSON',
     success: function (data) {
       console.log(data);
       ajaxData = data;  															//assign data to variable
       lazyLoad();																		// run first lazy load
       pageVarCheck();																// check if page var
       console.log(ajaxData[0].large);
     },
     error: function (errorThrown) {
       console.log(errorThrown);
     }
   });
  }
  
function lazyLoad(){
	console.log('lazy')
	
  var images='';
       
	 for(i = originalTrack; i < trackCount; i++){
	 	if(i < ajaxData[0].name.length){
			images += '<div class="itemPack '+ ajaxData[0].name[i] +'">'+ ajaxData[0].thumb[i] +'</div>';
		}
	 }
	 
	 originalTrack = trackCount;
   trackCount += 5; 
   
   if(firstSetup){
   		$('.isotope').append(images);
   		$('#galleria').append(imagesGalleria)
   		isotopeSetup();
   		isotopeEvents();
   		firstSetup = false;
   }else{
   	var $newItems = $(images);
	   $container.isotope( 'insert', $newItems );
	   isotopeEvents();
   }
   
   
   
   $('.loadingSpinner').remove();
}

var ajaxData;
var didScroll = false;
var hasFinished = true;
var trackCount = 10;
var originalTrack = 0;
var firstSetup = true;

var pagename = $('.isotope').attr('data-pagename')
galleryAjax(pagename ,trackCount );
 
$(window).scroll(function() {
    didScroll = true;
});
 
setInterval(function() {
    if ( didScroll && $('body').hasClass('page-template-page-images-php') ) {
        didScroll = false;
        if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	        	$('.isotope').append('<div class="span12 txtC bg-white height1 loadingSpinner txt-pink mbm bb-grey"><i class="icon-spinner icon-spin icon-2x mtl"></i></span>');
	        	lazyLoad();
				}
    }
}, 250);


  /* ========================================================================================================================
	
	Google Maps
	
======================================================================================================================== */


function initialize() {
var myLatlng = new google.maps.LatLng(-33.875661, 151.221356)
var styles = [
  {
    "stylers": [
      { "visibility": "on" },
      { "saturation": -100 }
    ]
  }
];

  var mapOptions = {
    center: myLatlng,
    zoom: 14,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  var map = new google.maps.Map(document.getElementById("map-canvas"),
      mapOptions);
  map.setOptions({styles: styles}); 
  
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Uluru (Ayers Rock)'
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
  
  function toggleBounce() {

	  if (marker.getAnimation() != null) {
	    marker.setAnimation(null);
	  } else {
	    marker.setAnimation(google.maps.Animation.BOUNCE);
	  }
	}
     
}
if($('.page-template-page-contact-php').length != 0){
	initialize();
}

  /* ========================================================================================================================
	
	END READY
	
======================================================================================================================== */


});