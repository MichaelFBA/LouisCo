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

	Packery

======================================================================================================================== */
/*


 var container = document.querySelector('.packery');
  var pckry;
  
  if(container){
	  imagesLoaded( container, function() {
	    pckry = new Packery( container, {
	      itemSelector: '.itemPack',
	      gutter: 5,
	      transitionDuration:2
	    });
	  });
	 


  
  eventie.bind( container, 'click', function( event ) {
    // don't proceed if item content was not clicked on
    
    var target = event.target;
    console.log(target)
    if ( !classie.has( target.parentNode, 'itemPack' )  ) {
    	return;
    }
    
    var itemElem = target.parentNode;
    console.log(itemElem)
    var isExpanded = classie.has( itemElem, 'is-expanded' );
    classie.toggleClass( itemElem, 'is-expanded' );
  
    if ( isExpanded ) {
      // if shrinking, just layout
      pckry.layout();
    } else {
      // if expanding, fit it
      pckry.fit( itemElem );
      jQuery('html, body').stop().animate({scrollTop: $(target).offset().top}, 500);
    }
  });
} 


// Filtering packery 
$('.tax').on('click',function(e){
	pde(e); //Prevent Default
	var textValue = $(this).text(); //Detect text
	
	if( $(this).hasClass('label-info') ){
		$('.itemPack[data-tag*="'+textValue+'"]').hide();
		pckry.layout();
		$(this).removeClass('label-info');
	}else{
		$('.itemPack[data-tag*="'+textValue+'"]').show();
		pckry.layout();
		$(this).addClass('label-info');
	}
})

*/

/* 

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
var $container = $('.isotope');																		// initalise isotope
$container.imagesLoaded( function(){
  $container.isotope({
  	itemSelector : '.itemPack',
  });
  
  var $carousel = $('#carousel');
	var $wrapper = $('#wrapper');
	var $window = $(window);
 
	$window.resize(function() {
		$wrapper.height( $window.height() * 1 );
		$carousel.height( $window.height() * 1 );
	}).resize();
 
	$carousel.carouFredSel({
		width: '100%',
		scroll: 1,
		items: {
			visible: 'odd+2',
			start: -1,
			width: 'variable',
			height: 'variable'
		}
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


// change size of clicked element
/*
$container.delegate( '.itemPack', 'click', function(){
  $(this).toggleClass('is-expanded');
  $container.isotope('reLayout');
  jQuery('html, body').stop().animate({scrollTop: $(this).offset().top}, 500);
});
*/





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
//do nothing																											// if no filter pagevar do nothing
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