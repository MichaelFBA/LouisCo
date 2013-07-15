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

<?php
$rows = get_field('image_gallery_lco');
if($rows){ ?>
	<ul>
 <?php foreach($rows as $row){?>
		<div class="itemPack" data-tag="<?php forEach($row['sub_taxonomy'] as $a){echo $a.' '; }; ?>">
  		<img  src="<?php echo $row['sub_images'] ?>" />
  	</div>
	<?php } ?>
	</ul>
<?php } ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>