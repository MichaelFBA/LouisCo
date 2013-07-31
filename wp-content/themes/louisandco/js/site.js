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

if( $('#menu-main > .current-menu-item').index() >= 2 ){
	$("#menu-main li:eq(0)").after($('#menu-main > .current-menu-item'));
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
var $carousel = $('#carousel');
var $wrapper = $('#wrapper');
var $window = $(window);																	// initalise isotope
var galleriaReady = false;
	
$container.imagesLoaded( function(){
  $container.isotope({
  	itemSelector : '.itemPack',
  });
	

 // change size of clicked element

 $('.itemPack').on( 'click', function(e){
 	var index = $(this).index();
 	$('#galleria').fadeIn('medium', function() {
		
		if(galleriaReady){
			$('#galleria').data('galleria').show( indexVar );
		}else{
			runGalleria(index)
		}
		
	})
 });
 	 
});

$('.secondMenu a').on('click',function(e){												// bind second menu click event
	var selector = $(this).text().toLowerCase();										// get menu text, this should relate to tag
	pde(e);																													// crossbrowser prevent default
  
  
  if($(this).hasClass('color2')){
	  $(this).toggleClass('color2');
	  console.log($(this).siblings());
	  $container.isotope({ filter: '*' });
  }else{
	  $(this).toggleClass('color2');
	  $container.isotope({ filter: '.itemPack'+':not(.'+ selector +')' });
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
  show:indexVar
});
Galleria.run('#galleria');

galleriaReady = true;																					// boolean to check when gallery ready
$('#galleria').css('bottom','0px').hide()
$('#galleria').css('right','0px').fadeIn()
}






  /* ========================================================================================================================
	
	Sub Menu Filtering - homepage
	
======================================================================================================================== */

$('.home #menu-main .sub-menu a').on('click',function(e){					// only bind click event on homepage
	pde(e); 																												// prevent default
	var innerText = $(this).text().toLowerCase(); 									// get inner text of a tag
	var url = $(this).parent().parent().parent().children('a').attr('href');
	url += '?filter=' + innerText; 																	// assign filter to url
	window.location.assign(url); 																		// load page with new url - includes filter
})

if ( (loadPageVar('filter') == '') ) {														// check if pagevar has been sent
	$container.isotope({ filter: '*' });														// if no filter dont filter any
}else{
	$container.isotope({ filter: '.'+ loadPageVar('filter') });     // filter isotope via pagevar 
}

function loadPageVar(sVar) {																			// returns pagevar is it exists
	return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
}

      
      
    



  /* ========================================================================================================================
	
	Ajax
	
======================================================================================================================== */


  /*  Uncomment to use

  function recentPostsAjax() {
   
   jQuery.ajax({
     url: '/wp-admin/admin-ajax.php',
     data: {
       'action': 'do_ajax',
       'fn': 'get_latest_posts',
       'count': 10
     },
     dataType: 'JSON',
     success: function (data) {
       console.log(data);
       // our handler function will go here
       // this part is very important!
       // it's what happens with the JSON data 
       // after it is fetched via AJAX!
     },
     error: function (errorThrown) {
       alert('error');
       console.log(errorThrown);
     }
   });
  }

*/


  /* ========================================================================================================================
	
	END READY
	
======================================================================================================================== */




});