<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="container mth">
	<div class="row mvl">
		<div class="span4 widget-sidebar">
			
			<!-- Sidebar Widget -->
			<?php 
				if ( dynamic_sidebar('News Sidebar') ) : 
			  endif; 
			  ?>
			
		</div>
		<div class="span8">
			<article>
				<p class="pan man fss uppercase"><?php the_date(); ?></p>
				<h2 class="uppercase pan mtn"><?php the_title(); ?></h2>
				<?php
				$attachments = get_posts(array(
		      'post_type' => 'attachment',
		      'posts_per_page' => -1,
		      'post_parent' => get_the_id()
		    ));
		    if ($attachments) {
		      foreach ($attachments as $attachment) {
		        $img = wp_get_attachment_image($attachment->ID, 'medium',0,array('class'=>'mbm'));
		        echo $img;
		      }
		    }
				?>
				<p><?php echo get_the_content(); ?></p>
			</article>
			<hr>
			<p class="pull-left"><?php previous_post('<i class="icon-arrow-left"></i> %', '', 'yes'); ?></p>
			<p class="pull-right"><?php next_post('% <i class="icon-arrow-right"></i>', '', 'yes'); ?></p>
		</div>
	</div>
</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>