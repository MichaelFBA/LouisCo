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


<div class="isotope">
	<?php
	$rows = get_field('image_gallery_lco');
	//Sort via taxonomy
	/*
function sortTax($a, $b) {
  	return $a["sub_taxonomy"] - $b["sub_taxonomy"];
	}
	usort($rows, "sortTax");
*/
	if($rows){ ?>
	 <?php foreach($rows as $row){?>
	 	<?php $tag = get_tag($row['sub_taxonomy']); ?> 
			<div class="itemPack <?php echo strtolower($tag->name) . ' ';  ?>">
			<?php echo wp_get_attachment_image( $row['sub_images'], 'full'); ?>
	  	</div>
		<?php } ?>
	<?php } ?>
</div>

<div id="galleria">
<?php
	if($rows){ ?>
	 <?php foreach($rows as $row){?>
      	<img src="<?php $imageURL = wp_get_attachment_image_src( $row['sub_images'], 'full'); echo $imageURL[0]; ?>"/>
		<?php } ?>
	<?php } ?> 
</div>






<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>