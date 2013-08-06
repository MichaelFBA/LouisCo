<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>

<div class="container mobilePadding">
	<div class="row">
		<div class="span4 widget-sidebar">
			
			<!-- Sidebar Widget -->
			<?php 
				if ( dynamic_sidebar('News Sidebar') ) : 
			  endif; 
			  ?>
			
		</div>
		<div class="span8">

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="post">
				<p class="pan man fss uppercase"><?php the_date(); ?></p>
				<a href="<?php the_permalink();?>" target="_parent">
					<h2 class="uppercase pan mtn veryTight"><?php the_title(); ?></h2>
					<?php the_post_thumbnail('medium'); ?>
				</a>
				
				<p class="mtm"><?php echo get_the_excerpt(); ?><a href="<?php the_permalink();?>" target="_parent"> Read More <i class="icon-chevron-right fss"></i></a></p>
			</div>
			<hr>
		<?php endwhile; ?>
		</div>
		
		<?php else: ?>
		<h2>No posts to display</h2>	
		<?php endif; ?>
		
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>