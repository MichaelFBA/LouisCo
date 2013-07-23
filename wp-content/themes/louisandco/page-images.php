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

<!--
<div class="packery isotope">
	<?php
	$rows = get_field('image_gallery_lco');
	if($rows){ ?>
	 <?php foreach($rows as $row){?>
			<div class="itemPack <?php forEach($row['sub_taxonomy'] as $a){$taxName = get_term_by( 'id', $a, 'post_tag' );echo strtolower($taxName->name) . ' ';}  ?>">
			<?php echo wp_get_attachment_image( $row['sub_images'], 'thumbnail'); ?>
	  	</div>
		<?php } ?>
	<?php } ?>
</div>
-->


<div id="wrapper">
	<div id="carousel">
		<?php
			$rows = get_field('image_gallery_lco');
			if($rows){ ?>
			 <?php foreach($rows as $row){?>
		      <?php echo wp_get_attachment_image( $row['sub_images'], 'large'); ?>
				<?php } ?>
			<?php } ?>  
	</div>
	
</div>


<!--
<div class="container-fluid fill">
<div id="homeCarousel" class="carousel slide">
  <div class="carousel-inner">
			<?php
			$active = true;
			$rows = get_field('image_gallery_lco');
			if($rows){ ?>
			 <?php foreach($rows as $row){?>
				<div class="<?php if($active){echo 'active ';$active=false;} ?> item">
		      <?php echo wp_get_attachment_image( $row['sub_images'], 'large'); ?>
		    </div>
				<?php } ?>
			<?php } ?>  
    
    
  </div>
  <div class="pull-center">
	<a class="carousel-control left" href="#homeCarousel" data-slide="prev">‹</a>
	<a class="carousel-control right" href="#homeCarousel" data-slide="next">›</a>
  </div>
</div>
</div>
-->






<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>