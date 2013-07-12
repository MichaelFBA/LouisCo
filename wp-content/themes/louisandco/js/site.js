jQuery(document).ready(function ($) {


/* ========================================================================================================================

	Menu

======================================================================================================================== */
/*
$('.menu-item-object-category').hover(
  function () {
  	$(this).stop(true,true).animate({padding:'20px 0 20px 0'}, 300,'swing')
    $(this).find('.sub-menu').slideToggle();
  },
  function () {
  	$(this).stop(true,true).animate({padding:'0px'}, 300,'swing')
    $(this).find('.sub-menu').slideToggle();
  }
);
*/



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