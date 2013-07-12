<?php
/**
 * Template Name: About
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
			<h2 class="uppercase pan mbn"><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
		<div class="span4">
			<h2 class="uppercase pan mbn">LOUIS MOLINES</h2>
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="span4">
			<h2 class="uppercase pan mbn">Services</h2>
			<?php the_content(); ?>
		</div>
		
		<?php endwhile; ?>
		</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>