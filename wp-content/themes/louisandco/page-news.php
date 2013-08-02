<?php
/**
 * Template Name: News
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
		<div class="span4 widget-sidebar">
			
			<!-- Sidebar Widget -->
			<?php 
				if ( dynamic_sidebar('News Sidebar') ) : 
			  endif; 
			  ?>
			
		</div>
		<div class="span8">
	<?php
		$queryHome = new WP_Query(array(
    	'posts_per_page' => '10',
    	'category_name'	 => 'news',
    	'post_status'		 => 'publish',
       ) 
    );
		while ( $queryHome->have_posts() ) : $queryHome->the_post();
		?>
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
	</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>