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

if( $('.current-menu-item').index() >= 2 ){
	$("#menu-main li:eq(0)").after($('.current-menu-item'));
}

/* Zoom Images like old site hover */
$('.packery')



$('#menu-main').hover(
	function() {
	$("header").css('height', '400px');
},
function () {
    $("header").css('height', '113px');
  }
);


/* Filtering packery */
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





/* ========================================================================================================================

	Packery

======================================================================================================================== */


 var container = document.querySelector('.packery');
  var pckry;
  
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