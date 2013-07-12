<?php
/**
* Template Name: Home
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', ) ); ?>

<div class="container">
	<div class="row">
		<div class="span12">
			<?php 
				wp_nav_menu( array(
				    'menu'       => 'Main',
				    'depth'      => 2,
				    'container'  => false,
				    'menu_class' => 'uppercase fsl df man mth transition front'
				));
			?>
		</div>
	</div>
</div>


 <?php 
 $args = array('parent' => 11);
 $categories = get_categories( $args ); 
/*  print_r($categories); */
 
 foreach($categories as $a){
 	//echo $a->cat_ID;
 		$queryLatest = new WP_Query(array(
    	'post_per_page'	=> 1,
    	'order'					=> 'DESC',
    	'post_status'		=> 'publish',
    	'cat'				 		=> $a->cat_ID
       ) 
    );
		while ( $queryLatest->have_posts() ) : $queryLatest->the_post();
 	
		$attachments = get_posts(array(
		  'post_type' => 'attachment',
		  'posts_per_page' => 1,
		  'post_parent' => get_the_id()
		));
		//if ($attachments) {
		foreach ($attachments as $attachment) {
			$imageUrl =  wp_get_attachment_image_src($attachment->ID, 'large'); ?>
				<img class="bg back" src="<?php echo $imageUrl[0] ?>" />
		  <?php
		}
		endwhile;
		wp_reset_query();
	}
 
 ?> 
 






<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>