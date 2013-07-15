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



/* ========================================================================================================================

	Packery

======================================================================================================================== */

/*
  var container = document.querySelector('.packery');
  var pckry = new Packery( container );
  
  eventie.bind( container, 'click', function( event ) {
    // don't proceed if item content was not clicked on
    var target = event.target;
    if ( !classie.has( target, 'item-content' )  ) {
      return;
    }
    var itemElem = target.parentNode;
    var isExpanded = classie.has( itemElem, 'is-expanded' );
    classie.toggleClass( itemElem, 'is-expanded' );
  
    if ( isExpanded ) {
      // if shrinking, just layout
      pckry.layout();
    } else {
      // if expanding, fit it
      pckry.fit( itemElem );
    }
  });
*/
  
  



 var container = document.querySelector('.packery');
  var pckry;
  
  imagesLoaded( container, function() {
    pckry = new Packery( container, {
      itemSelector: '.itemPack',
      gutter: 10
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
    }
  });



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