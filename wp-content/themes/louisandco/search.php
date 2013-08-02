<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="container mth">
	<div class="row mtl">
		<?php if ( have_posts() ): ?>
			<div class="span12">
				<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
			</div>
		<?php while ( have_posts() ) : the_post(); ?>
				<div class="span4 mbm">
					<a href="<?php the_permalink();?>" target="_parent">
						<?php if(has_post_thumbnail()){ ?>
						<?php the_post_thumbnail('medium') ?>
						<?php } ?>
						<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php echo string_excerpt_length(get_the_excerpt(),200); ?>
						<hr>
					</a>
				</div>
		<?php endwhile; ?>
		<?php else: ?>
		<div class="span12">
			<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>