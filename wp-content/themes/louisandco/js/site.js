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

$container.imagesLoaded( function(){
  $container.isotope({
  	itemSelector : '.itemPack',
  });
})


  /* ========================================================================================================================
	
	Galleria
	
======================================================================================================================== */
if( $('.page-template-page-images-php').length == 1){                         

//left and right arrows control from keyboard
Galleria.ready(function() {
var gallery = this; 
 gallery.attachKeyboard({
        left: gallery.prev,
        right: gallery.next,
    });
 });

 //load theme                                                               
Galleria.loadTheme('http://addcarrots.com/wp-content/themes/louisandco/external/classic/galleria.classic.min.js');

 //configure
Galleria.configure({
		transition: false,
	  imageCrop: false,
	  responsive:true,
	  showInfo:false,
	  showCounter:true,
	  thumbnails:false,
	  trueFullscreen:true,
    thumbnails:'lazy',
    extend: function() {
			// create the button and append it
	    this.addElement('button').appendChild('container','button');
	    this.addElement('image').appendChild('loader','<i class="icon-spinner icon-spin icon-large fsl"></i>');
	
	    // Add text & click event using jQuery
	    this.$('button').append('<span class="icon-closeBtn"></span>').click(function() {
	        $('.isotope').show();
	        $('#galleria').fadeOut();
	    });
		}
});

var data = $('.itemPack').map(function(){
		    return {
		        image: $(this).children().attr('title')
		    };
			}).get();

//run and extend
Galleria.run('#galleria', {
	dataSource:data
});

var loaded = true;
Galleria.ready(function(){
    var gallery = this;
    var className;
    var iIndex;
    $('.itemPack').on( 'click', function(e){
    	//check if filtered
    	if( $('.secondMenu a').hasClass('selected') == true ){
	    	className = $('.secondMenu a.selected').text().toLowerCase();
	    	iIndex = $('.' + className).index(this);
	    	
	    	if(className == 'all'){
		    	className = 'itemPack'; // select all
		    	iIndex = $(this).index();
	    	}
    	}else{
    		className = 'itemPack'; // select all
    		iIndex = $(this).index();
	    	//className = $(this).attr('class').split(' ')[1];
			}
    	
		 	
		  var data = $('.' + className).map(function(){
		    return {
		        image: $(this).children().attr('title')
		    };
			}).get();
				
				gallery.setOptions('show',iIndex).load(data);
				$('#galleria').hide();
				$('#galleria').css('right',0); 
				$('#galleria').fadeIn();

		})
		
		
		
    
}); 
Galleria.on('data',function(){
    var gallery = this;
    window.setTimeout(function(){
        gallery.lazyLoadChunks(3);
    },10);
});
}
  /* ========================================================================================================================
	
	Galleria Events
	
======================================================================================================================== */
//Bind Keys
$(document).bind("keydown", function(e){
	if(e.keyCode== 27){																		// esc key		
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

if ( (loadPageVar('filter') == '') ) {														// check if pagevar has been sent
	$container.isotope({ filter: '*' });														// if no filter dont filter any
}else{
	$container.isotope({ filter: '.'+ loadPageVar('filter') });     // filter isotope via pagevar 
	$('.current-menu-item .sub-menu a:contains('+loadPageVar('filter').toUpperCase()+')' ).addClass('selected') //set the menu item to selected
}

function loadPageVar(sVar) {																			// returns pagevar is it exists
	return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
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
     hasFinished = true;
	 },
   error: function (errorThrown) {
     console.log(errorThrown);
   }
 });
}


var didScroll = false;
var hasFinished = true;
var trackCount = 10;
 
$(window).scroll(function() {
    didScroll = true;
});
 
setInterval(function() {
    if ( didScroll && $('body').hasClass('page-template-page-images-php') ) {
        didScroll = false;
        if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	        if(hasFinished){
	        	$('#ajax-more-galleries-insert').append('<div class="span12 txtC bg-white height1 loadingSpinner txt-pink mbm bb-grey"><i class="icon-spinner icon-spin icon-2x mtl"></i></span>');
	        	console.log('bottom')
						var pagename = $('.isotope').attr('data-pagename');
						galleryAjax(pagename ,trackCount );
						hasFinished = false;
					}
       }
       
        // Check your page position and then
        // Load in more results
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