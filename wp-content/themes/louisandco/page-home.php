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
				    'menu_class' => 'uppercase fsl df man mth transition front',
				    //'walker' 		 => new wp_bootstrap_navwalker()
				));
			?>
		</div>
	</div>
</div>

<div class="background-images back">
 <?php 
 $queryHome = new WP_Query(array(
  	'post_type'			 => 'page', 
  	'post_status'		 => 'publish',
  	'meta_query' => array( 
        array(
            'key'   => '_wp_page_template', 
            'value' => 'page-images.php'
						)
				)
     ) 
  );
	while ( $queryHome->have_posts() ) : $queryHome->the_post();
	$attr = array('class'	=> "bg opacity0 transition back page-". get_the_id());
	the_post_thumbnail( 'large', $attr );
	endwhile;
	?> 
 
</div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>