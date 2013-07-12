<?php
/**
 * Template Name: Contact
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container mth">
	<div class="row mtl">
	<?php
		$queryHome = new WP_Query(array(
    	'post_type'			 => 'page', 
    	'post_status'		 => 'publish',
    	'page_id'				 => get_the_id()
       ) 
    );
		while ( $queryHome->have_posts() ) : $queryHome->the_post();
		?>
		<div class="span4">
			<h2 class="uppercase pan"><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<h2 class="uppercase pan">Get in touch</h2>
			
			<form class="contactForm">
			  <fieldset>
			    <label>Name</label>
			    <input type="text" placeholder="Name" class="span4">
			    <label>Phone Number</label>
			    <input type="text" placeholder="Phone Number" class="span4">
			    <label>Email</label>
			    <input type="email" placeholder="Email" class="span4">
			    <label>Message</label>
			    <textarea rows="3" placeholder="Message" class="span4"></textarea>
			    <button type="submit" class="btn">Submit</button>
			  </fieldset>
			</form>
			
			
		</div>
		<?php endwhile; ?>
		<div class="span8">
			<iframe width="870" height="570" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=6%2F13+Kirketon+Rd,+Darlinghurst+New+South+Wales+2010,+Australia&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=32.445554,62.050781&amp;ie=UTF8&amp;geocode=FTMZ-_0dbHQDCQ&amp;split=0&amp;hq=&amp;hnear=6%2F13+Kirketon+Rd,+Darlinghurst+New+South+Wales+2010,+Australia&amp;ll=-33.875661,151.221356&amp;spn=0.008293,0.015149&amp;t=m&amp;z=14&amp;output=embed"></iframe>
		</div>
	

	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>