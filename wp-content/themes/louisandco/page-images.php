<?php
/**
 * Template Name: Photographer
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

<div class="packery">
	
	<?php if ( have_posts() ): ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php
	$attachments = get_posts(array(
	      'post_type' => 'attachment',
	      'posts_per_page' => -1,
	      'post_parent' => get_the_id()
	    ));
	    //if ($attachments) {
	    foreach ($attachments as $attachment) {
	    	$imageUrl =  wp_get_attachment_image_src($attachment->ID, 'large'); ?>
	    	<div class="itemPack">
	    		<img src="<?php echo $imageUrl[0] ?>" />
	    	</div>
	      <?php
	    }
	?>

<?php endwhile; ?>
</div>


<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>