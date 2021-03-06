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

<div class="container mobilePadding">
	<div class="row">
	<?php
		$queryHome = new WP_Query(array(
    	'post_type'			 => 'page', 
    	'post_status'		 => 'publish',
    	'page_id'				 => get_the_id()
       ) 
    );
		while ( $queryHome->have_posts() ) : $queryHome->the_post();
		?>
		<div class="span4 mbm">
			<h2 class="uppercase pan mbn"><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
		<div class="span4 mbm">
			<h2 class="uppercase pan mbn">LOUIS MOLINES</h2>
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="span4 mbm">
			<h2 class="uppercase pan mbn">Services</h2>
			<?php the_field('services_copy'); ?>
		 <ul class="unstyled">
		 <?php 
		 $rows = get_field('service_items');
		 if($rows){ ?>
		 <?php foreach($rows as $row){?>
		 	 <?php $image = wp_get_attachment_image_src($row['service_item_image']); ?>
		 	 <li class="mbs"><img src="<?php echo $image[0]; ?>" class="mrs"/><?php echo $row['service_item_text']; ?> </li>

			<?php } ?>
		<?php } ?>
		 </ul>
		</div>
		
		<?php endwhile; ?>
		</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>